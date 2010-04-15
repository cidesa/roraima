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
		var $sql;
		var $sql2;
		var $sql3;
		var $sqla;
		var $sqlax;
		var $sqlb;		
		var $sqlc;
		var $sqlx;
		var $sqlt;		
		var $rep;
		var $numero;
		var $cab;
		var $con1;
		var $con2;
		var $car1;
		var $car2;
		var $fecha1;
		var $fecha2;
		var $niv1;
		var $niv2;
		var $per1;
		var $per2;
		var $emp1;
		var $emp2;
		var $nom;
		var $nombre;
		var $elab;
		var $rev;
		var $auto;
		var $tipcon;
		var $fechae1;
		var $fechae2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;	
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->emp1=$_POST["emp1"];
			$this->emp2=$_POST["emp2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->car1=$_POST["car1"];
			$this->car2=$_POST["car2"];
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->nom=$_POST["nom"];
			$this->tipcon=strtoupper($_POST["tipcon"]);

			if ($this->tipcon=='T')
			{
			$this->sql1="select a.codemp,d.nomcon,a.codcon,a.codcar,sum(a.monto) as saldo,a.codnom,c.nomemp,c.cedemp,c.codban,
						e.nomban,b.nomcar,d.opecon,d.codcon,d.impcpt
						from nphiscon a, npcargos b, npdefcpt d, nphojint c LEFT OUTER JOIN npbancos e ON (c.codban=e.codban)
						where
						a.codcon=d.codcon and
						a.codemp=c.codemp and
						a.codcar=b.codcar and
						c.codban=e.codban and
						a.monto<>0.00 and d.conact='S' and d.impcpt='S' and
						rtrim(a.codemp) >= rtrim('".$this->emp1."') and rtrim(a.codemp) <= rtrim('".$this->emp2."') and
						rtrim(a.codcar) >= rtrim('".$this->car1."') and rtrim(a.codcar) <= rtrim('".$this->car2."') and
						rtrim(a.codcon) >= rtrim('".$this->con1."') and rtrim(a.codcon) <= rtrim('".$this->con2."') and
						fecnom>=to_date('".$this->fecha1."','dd/mm/yyyy') and fecnom<=to_date('".$this->fecha2."','dd/mm/yyyy') and
						a.codnom='".$this->nom."'
						group by a.codemp,d.nomcon,a.codcon,a.codcar,a.codnom,c.nomemp,c.cedemp,c.codban,e.nomban,
						b.nomcar,d.opecon,d.codcon,d.impcpt
						order by a.codcon,a.codemp";
			}
			else
			{
			$this->sql1="select a.codemp,d.nomcon,a.codcon,a.codcar,sum(a.monto) as saldo,a.codnom,c.nomemp,c.cedemp,c.codban,
						e.nomban,b.nomcar,d.opecon,d.codcon,d.impcpt
						from nphiscon a, npcargos b, npdefcpt d, nphojint c LEFT OUTER JOIN npbancos e ON (c.codban=e.codban)
						where
						a.codcon=d.codcon and
						a.codemp=c.codemp and
						a.codcar=b.codcar and
						c.codban=e.codban and
						a.monto<>0.00 and d.conact='S' and d.impcpt='S' and
						rtrim(a.codemp) >= rtrim('".$this->emp1."') and rtrim(a.codemp) <= rtrim('".$this->emp2."') and
						rtrim(a.codcar) >= rtrim('".$this->car1."') and rtrim(a.codcar) <= rtrim('".$this->car2."') and
						rtrim(a.codcon) >= rtrim('".$this->con1."') and rtrim(a.codcon) <= rtrim('".$this->con2."') and
						fecnom>=to_date('".$this->fecha1."','dd/mm/yyyy') and fecnom<=to_date('".$this->fecha2."','dd/mm/yyyy') and
						a.codnom='".$this->nom."' and
						d.opecon = '".$this->tipcon."'
						group by a.codemp,d.nomcon,a.codcon,a.codcar,a.codnom,c.nomemp,c.cedemp,c.codban,e.nomban,
						b.nomcar,d.opecon,d.codcon,d.impcpt
						order by a.codcon,a.codemp";
			}
			

			$this->cab=new cabecera();
			
		}
		
		
		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",8);
			$this->ln(-1);
			$this->sqlx="select codnom, nomnom, to_char(ultfec,'dd/mm/yyyy') as ultfec, to_char(profec,'dd/mm/yyyy') as profec 
						from npnomina where codnom='".$this->nom."'";
			$tbx=$this->bd->select($this->sqlx);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$codigo=strtoupper($tbx->fields["codnom"]);
			$nombre=strtoupper($tbx->fields["nomnom"]);
			$this->nombre=$nombre;
			$this->cell(17,5,"NOMINA:");
			$this->cell(80,5,$codigo."   -   ".$nombre);
			$this->ln();
			$this->SetTextColor(0,0,128);
			$this->cell(14,5,"Desde:                                  Hasta:                 ");
			$this->cell(20,5,$tbx->fields["ultfec"]."                 	         ".$tbx->fields["profec"]);
			$this->SetTextColor(0,0,0);
			$this->ln(7);
			
			
		}
		function Cuerpo()
		{
			
			$tb=$this->bd->select($this->sql1);
			$tb2=$this->bd->select($this->sql1);
			
			if (!$tb2->EOF)
			{
			$ref=$tb2->fields["codcon"];
			$cont=0;
			$acum=0;
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",8);
			$this->cell(4,5,"");
			$this->cell(45,5,"Código Concepto");
			$this->cell(70,5,"Descripción Concepto");
			$this->ln();
			$this->cell(4,5,"");
			$this->cell(45,5,"    ".strtoupper($tb2->fields["codcon"]));
			$this->cell(70,5,strtoupper($tb2->fields["nomcon"]));
			$this->Line(10,$this->GetY()-5,200,$this->GetY()-5);
			$this->Line(10,$this->GetY()+7,200,$this->GetY()+7);
			$this->SetLineWidth(0.2);
			$this->ln(7);
			$this->cell(25,5,"Cédula");
			$this->cell(60,5,"Nombre");
			$this->cell(80,5,"Cargo");
			$this->cell(35,5,"Monto Concepto");
			$this->SetLineWidth(0.5);
			$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->SetLineWidth(0.2);
			$this->ln();
			}
			
			while (!$tb->EOF)
			{
				if ($tb->fields["codcon"]!=$ref)
				{
				$this->ln(1);
				$this->setFont("Arial","B",8);
				$this->Line(177,$this->GetY(),198,$this->GetY());
				$this->cell(45,5,"");
				$this->cell(113,5,"TOTAL CONCEPTO:   ".strtoupper($cod)."       ".substr(strtoupper($con),0,45));
				$this->cell(30,5,number_format($acum,2,'.',','),0,0,"R");
				$this->ln();
				$this->cell(45,5,"");
				$this->cell(5,5,"CANTIDAD TRABAJADORES:   ".$cont);
			
				$this->ln(300);
				$cont=0;
				$acum=0;
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","B",8);
				$this->cell(4,5,"");
				$this->cell(45,5,"Código Concepto");
				$this->cell(70,5,"Descripción Concepto");
				$this->ln();
				$this->cell(4,5,"");
				$this->cell(45,5,"    ".strtoupper($tb->fields["codcon"]));
				$this->cell(70,5,strtoupper($tb->fields["nomcon"]));
				$this->Line(10,$this->GetY()-5,200,$this->GetY()-5);
				$this->Line(10,$this->GetY()+7,200,$this->GetY()+7);
				$this->SetLineWidth(0.2);
				$this->ln(7);
				$this->cell(25,5,"Cédula");
				$this->cell(60,5,"Nombre");
				$this->cell(80,5,"Cargo");
				$this->cell(35,5,"Monto Concepto");
				$this->SetLineWidth(0.5);
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$this->SetLineWidth(0.2);
				$this->ln();
				}
			//Detalle
			$cod=$tb->fields["codcon"];
			$con=$tb->fields["nomcon"];
			$this->setFont("Arial","",7);
			$ref=$tb->fields["codcon"];
			$cont=$cont+1;
			$this->cell(25,5,$tb->fields["codemp"]);
			$this->cell(60,5,strtoupper($tb->fields["nomemp"]));
			$this->cell(75,5,strtoupper($tb->fields["nomcar"]));
			$this->cell(28,5,number_format($tb->fields["saldo"],2,'.',','),0,0,"R");
			$acum=$acum+$tb->fields["saldo"];
			$this->ln(4);
			$tb->MoveNext();
			}
			$this->ln(1);
			$this->setFont("Arial","B",8);
			$this->Line(177,$this->GetY(),198,$this->GetY());
			$this->cell(45,5,"");
			$this->cell(113,5,"TOTAL CONCEPTO:   ".strtoupper($cod)."       ".substr(strtoupper($con),0,45));
			$this->cell(30,5,number_format($acum,2,'.',','),0,0,"R");
			$this->ln();
			$this->cell(45,5,"");
			$this->cell(5,5,"CANTIDAD TRABAJADORES:   ".$cont);

		}
	}
?>
