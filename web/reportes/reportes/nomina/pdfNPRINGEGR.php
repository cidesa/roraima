<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $sqla;
		var $sqlc;
		var $rep;
		var $numero;
		var $cab;
		var $per1;
		var $per2;
		var $emp1;
		var $emp2;
		var $niv1;
		var $niv2;
		var $fechai1;
		var $fechai2;
		var $fechae1;
		var $fechae2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->emp1=$_POST["emp1"];
			$this->emp2=$_POST["emp2"];
			$this->fechai1=$_POST["fechai1"];
			$this->fechai2=$_POST["fechai2"];
			$this->fechae1=$_POST["fechae1"];
			$this->fechae2=$_POST["fechae2"];
			$this->niv1=$_POST["niv1"];
			$this->niv2=$_POST["niv2"];


			$this->sql="select a.codemp as codemping, a.nomemp as nomemping,to_char(a.fecing,'dd/mm/yyyy') as fecing,
					b.codnom,d.nomnom,b.codcar,b.nomcar,
					a.codniv,c.desniv
					from nphojint a, npasicaremp b, npestorg c,npnomina d
					where
					a.codemp >= rpad('".$this->emp1."',16,' ') and a.codemp <= rpad('".$this->emp2."',16,' ') and
					a.fecing >= to_date('".$this->fechai1."','dd/mm/yyyy') and a.fecing <= to_date('".$this->fechai2."','dd/mm/yyyy') and
					a.codniv >= '".$this->niv1."' and a.codniv <= '".$this->niv2."' and
					a.codemp=b.codemp and a.codniv=c.codniv and b.codnom=d.codnom
					order by b.codnom,a.codniv,a.codemp";

			$this->sql2="select distinct a.codemp as codempegr,a.nomemp,to_char(b.fecing,'dd/mm/yyyy') as fechaing,
					to_char(b.fecegr,'dd/mm/yyyy') as fecegr, b.observ, c.codnom as codnomhis,
					c.codcar as codcarhis, c.codniv as codnivhis
					from nphiineg b, nphojint a LEFT OUTER JOIN nphiscon c ON (a.codemp=c.codemp)
					where
					b.codemp= a.codemp and
					a.codemp >= rpad('".$this->emp1."',16,' ') and a.codemp <= rpad('".$this->emp2."',16,' ') and
					b.fecegr >= to_date('".$this->fechae1."','dd/mm/yyyy') and b.fecegr <= to_date('".$this->fechae2."','dd/mm/yyyy') and
					a.codemp=c.codemp and
					c.codniv >= '".$this->niv1."' and c.codniv <= '".$this->niv2."'
					order by c.codnom,c.codniv,a.codemp";//print $this->sql2;exit;

			$this->llenartitulosmaestro();
			$this->llenartitulosmaestro2();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código";
				$this->titulos[1]="Nombre Empleado";
				$this->titulos[2]="Fecha";
				$this->titulos[3]="Nómina";
				$this->titulos[4]="Cargo";
				$this->titulos[5]="Nivel Organizacional";
		}

		function llenartitulosmaestro2()
		{
				$this->titulos2[0]="Empleado";
				$this->titulos2[1]="";
				$this->titulos2[2]="Ingreso";
				$this->titulos2[3]="";
				$this->titulos2[4]="";
				$this->titulos2[5]="";
		}
		function Header()
		{
			$this->SetTextColor(0,0,0);
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			/*for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
			}
			$this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],5,$this->titulos2[$i]);
			}
			$this->ln();
			$this->Line(10,50,270,50);*/
			$this->ln(3);

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql2);

			//--------------INGRESOS-----------
			//$this->ln(3);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->cell(205,5,"INGRESOS");
			$this->setFont("Arial","B",8);
			$this->cell(25,5,"Del ".$this->fechai1);
			$this->cell(20,5,"Al ".$this->fechai2);
			$this->SetTextColor(0,0,0);
			$this->ln(8);
			$this->SetLineWidth(0.5);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,$this->GetY()+9,270,$this->GetY()+9);
			$this->SetLineWidth(0.2);
			$this->setFont("Arial","B",8);
			$this->cell(1,5,"");
			$this->cell(70,5,"Código");
			$this->cell(78,5,"Fecha");
			$this->ln(4);
			$this->cell(20,5,"Empleado");
			$this->cell(50,5,"Nombre del Empleado");
			$this->cell(20,5,"Ingreso");
			$this->cell(55,5,"Nómina");
			$this->cell(55,5,"Cargo");
			$this->cell(55,5,"Nivel Organizacional");
			$this->ln();

			while (!$tb->EOF)
			{
				$this->setFont("Arial","",7);
				$this->cell(20,5,$tb->fields["codemping"]);
				$this->cell(50,5,substr($tb->fields["nomemping"],0,120));
				$this->cell(20,5,$tb->fields["fecing"]);
				$this->cell(55,5,substr($tb->fields["nomnom"],0,32));
				$this->cell(55,5,substr($tb->fields["nomcar"],0,32));
				$codniv=$tb->fields["codniv"];
				//----
				$this->sqla="select desniv as nomniv
						  from npestorg where codniv='".$codniv."' ";
				$tba=$this->bd->select($this->sqla);
				//----
				$this->cell(55,5,$tba->fields["nomniv"]);
				$this->ln();
				$tb->MoveNext();
			}
			//--------------INGRESOS-----------
			$this->SetTextColor(0,0,0);
			$this->SetLineWidth(0.2);
			//--------------EGRESOS------------
			$this->ln(200);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->cell(205,5,"EGRESOS");
			$this->setFont("Arial","B",8);
			$this->cell(25,5,"Del ".$this->fechae1);
			$this->cell(20,5,"Al ".$this->fechae2);
			$this->SetTextColor(0,0,0);
			$this->ln(8);
			$this->SetLineWidth(0.5);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,$this->GetY()+9,270,$this->GetY()+9);
			$this->SetLineWidth(0.2);
			$this->setFont("Arial","B",8);
			$this->cell(1,5,"");
			$this->cell(69,5,"Código");
			$this->cell(18,5,"Fecha");
			$this->cell(91,5,"Fecha");
			$this->cell(10,5,"Nivel");
			$this->ln(4);
			$this->cell(20,5,"Empleado");
			$this->cell(50,5,"Nombre del Empleado");
			$this->cell(18,5,"Ingreso");
			$this->cell(18,5,"Egreso");
			$this->cell(53,5,"Nómina");
			$this->cell(15,5,"Cargo");
			$this->cell(30,5,"Organizacional");
			$this->cell(45,5,"Causa del Egreso");
			$this->ln();

			while (!$tb2->EOF)
			{
				$this->setFont("Arial","",7);
				$this->cell(20,5,$tb2->fields["codempegr"]);
				$this->cell(50,5,substr($tb2->fields["nomemp"],0,120));
				$this->cell(18,5,$tb2->fields["fechaing"]);
				$this->cell(18,5,$tb2->fields["fecegr"]);
				$codnomhis=$tb2->fields["codnomhis"];
				//----
				$this->sqlc="select nomnom as nombre
						 from npnomina
						 where codnom='".$codnomhis."'";
				$tbc=$this->bd->select($this->sqlc);
				//----
				$this->cell(55,5,substr($tbc->fields["nombre"],0,32));
				$this->cell(14,5,$tb2->fields["codcarhis"]);
				$this->cell(30,5,$tb2->fields["codnivhis"]);
				$this->cell(45,5,$tb2->fields["observ"]);
				$this->ln();
				$tb2->MoveNext();
			}
			//--------------EGRESOS------------

		}
	}
?>
