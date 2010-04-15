<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->bd->validar();
			$this->numcue1 = $_POST["numcue1"];
			$this->numcue2 = $_POST["numcue2"];
			//
			$this->calculos();
			///
			$this->sql="select numcue,nomcue,antban from tsdefban where numcue >= '".$this->numcue1."' and numcue <= '".$this->numcue2."'";
		}


		function calculos()
		{
		$fecha=date("d-m-Y");
		$this->sql2="select
			  sum (c.monimp - c.monpag) as deud30
			  from
			  opordpag a,cpcausad b, cpimpcau c
			  where
			  rtrim(a.numord) = rtrim(b.refcau) and
			  rtrim(b.refcau) = rtrim(c.refcau) and
			  (to_date('".$fecha."','dd/mm/yyyy') - a.fecemi ) >= 0 and
			  (to_date('".$fecha."','dd/mm/yyyy') - a.fecemi) < 30";

			  $tb=$this->bd->select($this->sql2);
			  $this->deud30=$tb->fields["deud30"];

			$this->sql2="select
			  sum (c.monimp - c.monpag) as deud60
			  from opordpag a,cpcausad b, cpimpcau c
			  where rtrim(a.numord) = rtrim(b.refcau) and
			  rtrim(b.refcau) = rtrim(c.refcau) and
			  (to_date('".$fecha."','dd/mm/yyyy') - a.fecemi) >= 30 and
			  (to_date('".$fecha."','dd/mm/yyyy') - a.fecemi) < 60";

			  $tb=$this->bd->select($this->sql2);
			  $this->deud60=$tb->fields["deud60"];

			$this->sql2="select
			  sum (c.monimp - c.monpag) as deud120
			  from opordpag a,cpcausad b, cpimpcau c
			  where rtrim(a.numord) = rtrim(b.refcau) and
			  rtrim(b.refcau) = rtrim(c.refcau) and
			  (to_date('".$fecha."','dd/mm/yyyy') - a.fecemi) >= 60 and
			  (to_date('".$fecha."','dd/mm/yyyy') - a.fecemi) < 120";

			  $tb=$this->bd->select($this->sql2);
			  $this->deud120=$tb->fields["deud120"];


			$this->sql2="select
			  sum (c.monimp - c.monpag) as mas120
			  from opordpag a,cpcausad b, cpimpcau c
			  where rtrim(a.numord) = rtrim(b.refcau) and
			  rtrim(b.refcau) = rtrim(c.refcau) and
			  (to_date('".$fecha."','dd/mm/yyyy') - a.fecemi) >= 120";

			  $tb=$this->bd->select($this->sql2);
			  $this->mas120=$tb->fields["mas120"];

	//		:totdeu:=nvl(:deud30,0)+nvl(:deud60,0)+nvl(:deud120,0)+nvl(:mas120,0);
			$this->totdeu=$this->deud30+$this->deud60+$this->deud120+$this->mas120;

		return true;
		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->cell(40,5,'Cuenta Bancaria');
			$this->cell(120,5,'Banco');
			$this->cell(30,5,'Monto',0,0,'R');
			$this->ln(4);
			$this->line(10,$this->getY(),210,$this->getY());

		}

		function Cuerpo()
		{
			$this->setFont("Arial","",8);
		    $tb=$this->bd->select($this->sql);
			$this->tb2=$tb;
			 while(!$tb->EOF){
				 $this->cell(40,5,$tb->fields["numcue"],0,0,'L');
				 $this->cell(120,5,$tb->fields["nomcue"],0,0,'L');
				 $this->cell(30,5,number_format($tb->fields["antban"],2,'.',','),0,0,'R');
				 $tot_antban=$tot_antban+$tb->fields["antban"];
				 $this->ln();
			  $tb->MoveNext();

  		  	}
			$this->ln();
			$this->ln();
			$this->cell(60,5,' ',0,0,'R');
			$this->cell(70,5,'DEUDAS',0,0,'R');
			$this->cell(60,5,'TOTALES',0,0,'R');
			$this->ln();
			$this->cell(190,5,'DISPONIBILIDAD',0,0,'R');
			$this->ln();
			$this->line(10,$this->getY(),210,$this->getY());
			$this->cell(25,5,'30 D�as',0,0,'R');
			$this->cell(20,5,'60 D�as',0,0,'R');
			$this->cell(25,5,'90 D�as',0,0,'R');
			$this->cell(30,5,'120 D�as',0,0,'R');
			$this->cell(40,5,'Mas de 120 D�as',0,0,'R');
		    $this->ln();
			$this->line(10,$this->getY(),210,$this->getY());

			$this->ln();
			$this->cell(25,5,number_format($this->deud30,2,'.',','),0,0,'R');
			$this->cell(20,5,number_format($this->deud60,2,'.',','),0,0,'R');
			$this->cell(25,5,number_format($this->deud90,2,'.',','),0,0,'R');
			$this->cell(30,5,number_format($this->deud120,2,'.',','),0,0,'R');
			$this->cell(40,5,number_format($this->mas120,2,'.',','),0,0,'R');
			$this->cell(50,5,number_format($tot_antban,2,'.',','),0,0,'R');
			$this->ln();
			$this->cell(190,5,"DEUDA",0,0,'R');
			$this->ln();
			$this->cell(190,5,number_format($this->totdeu,2,'.',','),0,0,'R');

			$this->bd->closed();
		}

	}
?>