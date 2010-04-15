<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $sql1;
		var $sql2;
		var $rep;
		var $cab;
		var $titulo;
		var $cat1;
		var $cat2;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->cat1=$_POST["cat1"];
			$this->cat2=$_POST["cat2"];
            $this->titulo=$_POST["titulo"];


			$this->sql="select trim(codcat) as codcat, trim(nomcat) as nomcat, trim(descat) as descat,
						trim(mision) as mision, trim(vision) as vision, trim(objesp) as objesp
						from fordefcatpre
						where codcat >= '".$this->cat1."' and codcat <= '".$this->cat2."'
						order by codcat";//H::PrintR($this->sql);exit;

	//	print $this->sql;

			//$this->cab=new cabecera();

		}

		function Header()
		{
			$this->Image("../../img/logo_1.jpg",10,12,18);
			/////////////////////
			$this->Rect(10,10,190,30);
			$this->setFont("Arial","",6);
			$this->SetY(11);
			$this->SetX(45);
			//$this->cell(5,5,"JOSE FELIX RIBAS");
			$this->SetY(13);
			$this->SetX(45);
			//$this->cell(5,5,"DIRECCION DE PRESUPUESTO");
			$this->setFont("Arial","",7);
			$this->SetY(11);
			$this->SetX(175);
			$this->cell(10,5,"FECHA");
			$this->setFont("Arial","",7);
			//$this->SetY(15);
			//$this->SetX(183);
			$this->cell(20,5,date('d/m/y'));
			$this->setFont("Arial","B",14);
			$this->SetY(25);
			$this->SetX(62);
			$this->cell(5,5,$this->titulo);
			$this->setFont("Arial","",7);
			$this->SetY(35);
			$this->SetX(80);
			$this->cell(5,5,"PRESUPUESTO   ");
			$this->setFont("Arial","B",7);
			$this->SetX(100);
			$this->cell(5,5,date('Y'));
			$this->setFont("Arial","",7);

			$this->SetY(16);
			$this->SetX(175);
			$this->cell(5,5,'Pagina ' . $this->PageNo() . ' de {nb}');


			/////////////////////
			$this->ln(25);


		}
		function Cuerpo()
		{
			$sqla="select count(*) as cont from forniveles where catpar='C'";
			$tba=$this->bd->select($sqla);
			$cont=$tba->fields["cont"];

		    $tb=$this->bd->select($this->sql);
			$primera="S";
			while (!$tb->EOF)
			{
				if ($primera!="S")
				{
					$this->ln(500);
					$this->cell(1,5,"");
				}
				else
				{
					$this->cell(1,5,"");
					$primera="N";
				}

				$cat= array();
				$cat=split("-",$tb->fields["codcat"]);
				$piece=count($cat);
					//si es ultimo nivel
					if ($piece!=$cont)
					{
						$this->Rect(10,45,190,5);
						$this->SetTextColor(0,0,149);
						$this->setFont("Arial","B",7);
						$this->cell(15,5,"CODIGO: ");
						$this->SetTextColor(0,0,0);
						$this->setFont("Arial","",7);
						$this->cell(50,5,$tb->fields["codcat"]);//H::PrintR($tb->fields["descat"]);exit;
						$this->setFont("Arial","B",7);
						$this->SetTextColor(0,0,149);
						$this->cell(15,5,"NOMBRE: ");
						$this->setFont("Arial","",7);
						$this->SetTextColor(0,0,0);
						$this->cell(60,5,$tb->fields["nomcat"]);
						$this->ln(10);
						//////
						$this->Rect(10,52,190,32);
						$this->setFont("Arial","B",7);
						$this->SetTextColor(140,0,0);
						//$this->SetX(66);
						$this->SetY(52);
						$this->cell(15,5,"OBJETIVO GENERAL: ");
						$this->ln(5);
						$this->setFont("Arial","",7);
						$this->cell(5,5,"");
						$this->SetTextColor(0,0,0);
						$this->Multicell(185,3,"".substr($tb->fields["descat"],0,250),0,"L");
					}
					else
					{
						$this->Rect(10,45,190,5);
						$this->SetTextColor(0,0,149);
						$this->setFont("Arial","B",7);
						$this->cell(15,5,"CODIGO: ");
						$this->SetTextColor(0,0,0);
						$this->setFont("Arial","",7);
						$this->cell(50,5,$tb->fields["codcat"]);
						$this->setFont("Arial","B",7);
						$this->SetTextColor(0,0,149);
						$this->cell(15,5,"NOMBRE: ");
						$this->setFont("Arial","",7);
						$this->SetTextColor(0,0,0);
						$this->cell(60,5,$tb->fields["nomcat"]);
						$this->ln(10);
						//////
						$this->Rect(10,52,190,32);
						$this->setFont("Arial","B",7);
						$this->SetTextColor(140,0,0);
						//$this->SetX(66);
						$this->SetY(52);
						$this->cell(15,5,"OBJETIVO GENERAL: ");
						$this->ln(5);
						$this->setFont("Arial","",7);
						$this->cell(5,5,"");
						$this->SetTextColor(0,0,0);
						$this->Multicell(185,3,"".substr($tb->fields["descat"],0,250),0,"L");
						$this->ln(25);
						/////
						$this->Rect(10,86,190,32);
						$this->setFont("Arial","B",7);
						$this->SetTextColor(140,0,0);
						$this->SetY(86);
						$this->cell(15,5,"MISION: ");
						$this->ln(5);
						$this->setFont("Arial","",7);
						$this->SetTextColor(0,0,0);
						$this->cell(5,5,"");
						$this->Multicell(185,3,"".$tb->fields["mision"],0,"L");
						$this->ln(15);
						/////
						$this->Rect(10,120,190,32);
						$this->setFont("Arial","B",7);
						$this->SetTextColor(140,0,0);
						$this->SetY(120);
						$this->cell(15,5,"VISION: ");
						$this->ln(5);
						$this->setFont("Arial","",7);
						$this->cell(5,5,"");
						$this->SetTextColor(0,0,0);
						$this->Multicell(185,3,"".$tb->fields["vision"],0,"L");
						$this->ln(15);
						/////
						$this->Rect(10,154,190,60);
						$this->setFont("Arial","B",7);
						$this->SetTextColor(140,0,0);
						$this->SetY(154);
						$this->cell(15,5,"OBJETIVOS ESPECIFICOS: ");
						$this->ln(5);
						$this->setFont("Arial","",7);
						$this->cell(5,5,"");
						$this->SetTextColor(0,0,0);
						$this->Multicell(185,3,"".$tb->fields["objesp"],0,"L");
						/////
					}

			//$this->ln(4);
			$tb->MoveNext();
			}

		}
	}
?>
