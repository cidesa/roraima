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
		var $sqlb;
		var $sqlc;
		var $sqlx;
		var $rep;
		var $numero;
		var $cab;

		var $niv2;

		var $fechae1;
		var $fechae2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;
		var $empdes;
var $emphas;
var $fecnomdes;
var $fecnomhas;
var $condes;
var $conhas;
var $tipnomdes;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->empdes=$_POST["empdes"];
			$this->emphas=$_POST["emphas"];
			$this->fecnomdes=$_POST["fecnomdes"];
			$this->fecnomhas=$_POST["fecnomhas"];
			$this->condes=$_POST["condes"];
			$this->conhas=$_POST["conhas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->especial=$_POST["especial"];

			$this->sql="select (rtrim(a.codcat)||'-'||rtrim(c.codpar)) as codpre,
				sum((CASE WHEN c.opecon='A' THEN a.monto ELSE 0 END)) as asigna,
				sum((CASE WHEN c.opecon='D' THEN a.monto ELSE 0 END)) as deduci,
				sum((CASE WHEN c.opecon='P' THEN a.monto ELSE 0 END)) as aporte
				from nphiscon a,npdefcpt c
				where
				a.codcon=c.codcon and
				a.codemp >= ('".$this->empdes."') and a.codemp <= ('".$this->emphas."') and
				a.codcon >= ('".$this->condes."') and a.codcon <= ('".$this->conhas."') and
				a.codnom = ('".$this->tipnomdes."') and a.monto>0
				and fecnom>=to_date('".$this->fecnomdes."','dd/mm/yyyy') and fecnom<=to_date('".$this->fecnomhas."','dd/mm/yyyy')
				and a.codcon not in(select codcon from npconceptoscategoria)
				group by (rtrim(a.codcat)||'-'||rtrim(c.codpar))
				union
				select (rtrim(a.codcat)||'-'||rtrim(c.codpar)) as codpre,
				sum((CASE WHEN c.opecon='A' THEN a.monto ELSE 0 END)) as asigna2,
				sum((CASE WHEN c.opecon='D' THEN a.monto ELSE 0 END)) as deduci2,
				sum((CASE WHEN c.opecon='P' THEN a.monto ELSE 0 END)) as aporte2
				from nphiscon a,npdefcpt c,npconceptoscategoria d
				where
				a.codcon=c.codcon and c.codcon=d.codcon and a.codcon=d.codcon and
                a.especial='".$this->especial."' AND
				a.codemp >= ('".$this->empdes."') and a.codemp <= ('".$this->emphas."') and
				a.codcon >= ('".$this->condes."') and a.codcon <= ('".$this->conhas."') and
				a.codnom = ('".$this->tipnomdes."') and a.monto>0
				and fecnom>=to_date('".$this->fecnomdes."','dd/mm/yyyy') and fecnom<=to_date('".$this->fecnomhas."','dd/mm/yyyy')
				group by (rtrim(a.codcat)||'-'||rtrim(c.codpar))
				order by codpre";
//print '<pre>'; print $this->sql; exit;

			/*$this->llenartitulosmaestro();
			$this->llenartitulosmaestro2();*/
			$this->cab=new cabecera();

		}


		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		//	print $this->sql;

			$this->sqlx="select codnom, nomnom, ultfec, profec from npnomina where codnom='".$this->tipnomdes."'";
			$tbx=$this->bd->select($this->sqlx);
		//	print $this->sqlx;
				$this->setFont("Arial","B",9);
				$this->SetTextColor(0,0,128);
				$codigo=strtoupper($tbx->fields["codnom"]);
				$nombre=strtoupper($tbx->fields["nomnom"]);
				$this->cell(20,5,"Nómina: ".$codigo." - ".$nombre);
				$this->ln();
				$this->cell(20,5,"DESDE:   : ".$this->fecnomdes."       HASTA:   ".$this->fecnomhas);
				$this->ln();
				$this->SetTextColor(0,0,0);
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->SetLineWidth(0.4);
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$this->SetLineWidth(0.2);
				$this->setFont("Arial","B",8);
				//$this->cell(2,5,"");
				$this->cell(46,5,"Código Presupuestario");
				$this->cell(75,5,"Descripción");
				$this->cell(30,5,"Asignación");
				$this->cell(30,5,"Deducción");
				$this->cell(30,5,"    Aportes");
				$this->ln();
				$asig=0;
				$dedu=0;
				$apor=0;
				while (!$tb->EOF)
				{
				$this->setFont("Arial","",7);
				$this->cell(3,5,"");
				$this->cell(33,5,$tb->fields["codpre"]);
				$codpre=$tb->fields["codpre"];
				//---
				$this->sql2="select nompre as nombre
							from cpdeftit where codpre=rtrim('".$codpre."')";
				$tb2=$this->bd->select($this->sql2);
			//	print $this->sql2;

				$this->setX(110);
				$this->cell(30,5,number_format($tb->fields["asigna"],2,'.',','),0,0,"R");
				$asig=$asig+$tb->fields["asigna"];
				$this->cell(30,5,number_format($tb->fields["deduci"],2,'.',','),0,0,"R");
				$dedu=$dedu+$tb->fields["deduci"];
				$this->cell(30,5,number_format($tb->fields["aporte"],2,'.',','),0,0,"R");
				$apor=$apor+$tb->fields["aporte"];
				$this->setX(55);
				$this->Multicell(60,5,$tb2->fields["nombre"],0,'L',0);

				$this->ln();
				$tb->MoveNext();
				}
				$this->ln(1);
				$this->SetLineWidth(0.4);
				$this->Line(110,$this->GetY(),200,$this->GetY());
				$this->SetLineWidth(0.4);
				$this->setFont("Arial","B",7);
				$this->cell(85,5,"");
				$this->cell(16,5,"TOTALES");
				$this->cell(30,5,number_format($asig,2,'.',','),0,0,"R");
				$this->cell(30,5,number_format($dedu,2,'.',','),0,0,"R");
				$this->cell(30,5,number_format($apor,2,'.',','),0,0,"R");


		}
	}
?>
