<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $numorddes;
		var $numordhas;
		var $bendes;
		var $benhas;
		var $fechades;
		var $fechahas;
		var $tipcaudes;
		var $tipcauhas;
		var $estatus;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->numorddes=$_POST["numorddes"];
			$this->numordhas=$_POST["numordhas"];
			$this->bendes=$_POST["bendes"];
			$this->benhas=$_POST["benhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->tipcaudes=$_POST["tipcaudes"];
			$this->tipcauhas=$_POST["tipcauhas"];
			$this->estatus=$_POST["estatus"];

			///Verificar Status
			$this->verificar_status();
			///
			$this->sql="select
						numord as numord,
						numord,
						cedrif,
						nomben,
						substr(desord,1,length(rtrim(desord))-2) as desord,
						to_char(fecemi,'dd/mm/yyyy') as fecemi,
						monord,
						monret,
						mondes,
						coduni,
						numche,
						(case when status='I' then 'pagadas'
						  when status='N' then 'pendiente por pagar'
						  when status='A' then 'anuladas'
						  when status='R' then 'elaborada'
						  when status='C' then 'contraloria' end) as status
					from
						opordpag
					where
						trim(numord)>= trim('".$this->numorddes."') and
						trim(numord) <= trim('".$this->numordhas."') and
						trim(cedrif) >= trim('".$this->bendes."') and
						trim(cedrif) <= trim('".$this->benhas."') and
						trim(tipcau) >= trim('".$this->tipcaudes."') and
						trim(tipcau) <= trim('".$this->tipcauhas."') and
						fecemi >= to_date('".$this->fechades."','dd/mm/yyyy') and
						fecemi <= to_date('".$this->fechahas."','dd/mm/yyyy') and
						( status = '".$this->sta1."' or
						  status = '".$this->sta2."' or
						  status = '".$this->sta3."'  or
						  status = '".$this->sta4."' or
						  status = '".$this->sta5."')
						order by fecemi,numord";

		///	print $this->sql;
		}


		function verificar_status()
		{

		if ($this->estatus=='I'){  //Pagadas
			  $this->sta1='I';
			  $this->sta2='I';
			  $this->sta3='I';
			  $this->sta4='I';
 			  $this->sta5='I';
		}else if ($this->estatus=='PP'){  //Pendiente por Pagar
			  $this->sta1='N';
			  $this->sta2='N';
			  $this->sta3='N';
			  $this->sta4='N';
 			  $this->sta5='N';
		}else if ($this->estatus=='A'){ //Anuladas
			  $this->sta1='A';
			  $this->sta2='A';
			  $this->sta3='A';
			  $this->sta4='A';
 			  $this->sta5='A';
		}else if ($this->estatus=='C'){  //Contralor�a
			  $this->sta1='C';
			  $this->sta2='C';
			  $this->sta3='C';
			  $this->sta4='C';
 			  $this->sta5='C';
		}else if ($this->estatus=='E'){ //Elaborada
			 $this->sta1='E';
			 $this->sta2='E';
			 $this->sta3='E';
			 $this->sta4='E';
			 $this->sta5='E';
		}else if ($this->estatus=='T'){ //Todas
			 $this->sta1='I';
			 $this->sta2='N';
			 $this->sta3='A';
			 $this->sta4='C';
			 $this->sta5='E';

		}
		return true;
		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->cell(270,3,'Del: '.$this->fechades.' Al '.$this->fechahas,0,0,'C');
			$this->ln(4);
			$this->setFont("Arial","B",8);
			$this->line(10,$this->getY(),270,$this->getY());
			$this->cell(15,5,'Numero');
			$this->cell(80,5,'Beneficiario');
			$this->cell(60,5,'Concepto');
			$this->cell(20,5,'Fecha',0,0,'R');
			$this->cell(25,5,'Monto',0,0,'R');
			$this->cell(25,5,'Monto',0,0,'R');
			$this->cell(25,5,'Total',0,0,'R');
			$this->ln(4);
			$this->cell(15,5,'Orden');
			$this->cell(80,5,' ');
			$this->cell(60,5,' ');
			$this->cell(20,5,'Emision',0,0,'R');
			$this->cell(25,5,'Original',0,0,'R');
			$this->cell(25,5,'Retenido',0,0,'R');
		    $this->ln(4);
			$this->line(10,$this->getY(),270,$this->getY());
		}
		function Cuerpo()
		{
			$this->setFont("Arial","",8);
		    $tb=$this->bd->select($this->sql);

			 while(!$tb->EOF){
			 		 $y=$this->GetY();
			 		 if ($y>=178){
			 		 	$this->AddPage();
			 		 	$y=50;
			 		 }
					$this->SetY($y);
					 $this->cell(15,4,$tb->fields["numord"]);
					 $this->cell(80,4," ");
					 $this->cell(60,4," ");
					 $this->cell(20,4,$tb->fields["fecemi"],0,0,'R');
					 $this->cell(28,4,number_format($tb->fields["monord"],2,'.',','),0,'R',0);
					 $this->cell(25,4,number_format($tb->fields["monret"],2,'.',','),0,'R',0);
					 $tot=$tb->fields["monord"]-$tb->fields["monret"]-$tb->fields["mondes"];
					 $this->cell(28,4,number_format($tot,2,'.',','),0,'R',0);

					 $this->setXY(25,$y);
					 $this->Multicell(50,4,substr($tb->fields["nomben"],0,60)); //Beneficiario
					 $this->setY($y);
					 $this->setX(75);
					 $this->Multicell(90,4,$tb->fields["desord"]); //Concepto
					 //Acumuladores//
						 $sum_monord=$sum_monord+$tb->fields["monord"];
						 $sum_monret=$sum_monret+$tb->fields["monret"];
						 $sum_tot=$sum_tot+$tot;
					 ///////////////

			  $tb->MoveNext();
  			  $this->ln();
  		  	}
			$this->line(10,$this->getY(),270,$this->getY());
			// Impresion de Totales
					 $this->cell(175,6," ");
					 $this->cell(28,6,number_format($sum_monord,2,'.',','),0,'R',0);
					 $this->cell(25,6,number_format($sum_monret,2,'.',','),0,'R',0);
					 $this->cell(28,6,number_format($sum_tot,2,'.',','),0,'R',0);
			//
		}
	}
?>