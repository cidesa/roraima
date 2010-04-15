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
		var $cat1;
		var $cat2;
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
		var $fecha1;
		var $fecha2;
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
			$this->cat1=$_POST["cat1"];
			$this->cat2=$_POST["cat2"];
			$this->per1=$_POST["per1"];
			$this->per2=$_POST["per2"];
			$this->nom=$_POST["nom"];
			$this->tipcon=strtoupper($_POST["tipcon"]);

			if ($this->tipcon=='T')
			{
			$this->sql1="select distinct(a.codcon),a.nomcon 
						from npnomcal a,npasicaremp e, npcatpre f, npdefcpt d
						where
						rtrim(a.codcon) >= rtrim('".$this->con1."') and rtrim(a.codcon) <= rtrim('".$this->con2."') and
						a.codnom='".$this->nom."' and
						e.codcat=f.codcat and
						a.codcar=e.codcar and
						a.codemp = e.codemp and
						a.saldo<>0.00 and 
						d.conact='S' 
						order by a.codcon";
			}
			else
			{
			$this->sql1="select distinct(a.codcon),a.nomcon 
						from npnomcal a,npasicaremp e, npcatpre f, npdefcpt d
						where
						rtrim(a.codcon) >= rtrim('".$this->con1."') and rtrim(a.codcon) <= rtrim('".$this->con2."') and
						a.codnom='".$this->nom."' and
						e.codcat=f.codcat and
						a.codcar=e.codcar and
						a.codemp = e.codemp and
						a.saldo<>0.00 and 
						d.conact='S' and
						d.opecon='".$this->tipcon."'
						order by a.codcon";
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
			
			$tb1=$this->bd->select($this->sql1);
			
			while (!$tb1->EOF)
			{
				$cont=0;
				$acum=0;
				$acum2=0;
				$this->SetTextColor(0,0,0);
				$this->setFont("Arial","B",8);
				$this->cell(4,5,"");
				$this->cell(45,5,"Código Concepto");
				$this->cell(70,5,"Descripción Concepto");
				$this->ln();
				$this->cell(4,5,"");
				$this->cell(45,5,"    ".strtoupper($tb1->fields["codcon"]));
				$this->cell(70,5,strtoupper($tb1->fields["nomcon"]));
				$this->ln();
			//--
			$this->sql2="select distinct(e.codcat),f.nomcat 
						from npnomcal a, npasicaremp e, npcatpre f
						where
						rtrim(a.codcon) = rtrim('".$tb1->fields["codcon"]."') and
						rtrim(e.codcat) >= rtrim('".$this->cat1."') and rtrim(e.codcat) <= rtrim('".$this->cat2."') and
						a.codnom='".$this->nom."' and
						e.codcat=f.codcat and
						a.codcar=e.codcar and
						a.codemp = e.codemp
						
						order by e.codcat";
			
			$tb2=$this->bd->select($this->sql2);
			
			while (!$tb2->EOF)
			{
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,80,0);
			$this->cell(15,5,"");
			$this->cell(45,5,$tb2->fields["codcat"]);
			$this->cell(70,5,strtoupper($tb2->fields["nomcat"]));
			$this->Line(10,$this->GetY()+6,200,$this->GetY()+6);
			$this->Line(10,$this->GetY()+11,200,$this->GetY()+11);
			$this->ln(6);
			$this->SetTextColor(0,0,0);
			$this->cell(25,5,"Cédula");
			$this->cell(50,5,"Nombre");
			$this->cell(55,5,"Cargo");
			$this->cell(35,5,"Monto Concepto");
			$this->cell(35,5,"Saldo Crediticia");
			$this->ln();
			$this->sql3="select distinct(a.codemp) as codemp,a.codcon,a.saldo
					--,a.codcar,a.saldo,a.codnom,c.nomemp,
					--c.cedemp,b.nomcar,d.opecon,d.impcpt
						from npnomcal a
						, npcargos b
						--, nphojint c
						, npdefcpt d
						, npasicaremp e 
						where
						a.codcon=d.codcon and
						a.codemp=e.codemp and
						a.codcar=b.codcar and
						a.codcar=e.codcar and
						rtrim(a.codcon) = rtrim('".$tb1->fields["codcon"]."') and
					    rtrim(e.codcat) = rtrim('".$tb2->fields["codcat"]."') and
						
						--a.codemp=c.codemp and
						
						a.saldo<>0.00 and 
						d.conact='S' and
						rtrim(a.codemp) >= rtrim('".$this->emp1."') and rtrim(a.codemp) <= rtrim('".$this->emp2."') and
						rtrim(a.codcar) >= rtrim('".$this->car1."') and rtrim(a.codcar) <= rtrim('".$this->car2."') and
						a.codnom='".$this->nom."'
						order by a.codcon,a.codemp";
						
			$tb3=$this->bd->select($this->sql3);			
			
			while (!$tb3->EOF)
			{
			$cont=$cont+1;
			$this->setFont("Arial","",7);
			$this->cell(25,5,$tb3->fields["codemp"]);
			$tb4=$this->bd->select("select nomemp from nphojint where codemp='".$tb3->fields["codemp"]."' ");			
			$this->cell(50,5,strtoupper($tb4->fields["nomemp"]));
			$tb5=$this->bd->select("select a.nomcar, a.codcar
									from npcargos a, npnomcal c 
									where 
									c.codemp='".$tb3->fields["codemp"]."'
									and a.codcar=c.codcar");
			$this->cell(55,5,strtoupper($tb5->fields["nomcar"]));
			//$tb6=$this->bd->select("select saldo from npnomcal where codemp='".$tb3->fields["codemp"]."' ");
			$this->cell(23,5,number_format($tb3->fields["saldo"],2,'.',','),0,0,"R");
			//$acum=$acum+$tb6->fields["saldo"];
			$acum=$acum+$tb3->fields["saldo"];
			//--
			$this->sqla="select codtippre as valor
						from nptippre 
						where rtrim(codcon)=rtrim('".$tb1->fields["codcon"]."') ";
			$tba=$this->bd->select($this->sqla);
			$this->sqlb="select coalesce(acumulado,0) as saldo 
						from npasiconemp 
						where codcar = rpad('".$tb5->fields["codcar"]."',16,' ') and codemp=rpad('".$tb3->fields["codemp"]."',16,' ')
						and codcon='".$tb1->fields["codcon"]."'";
			$tbb=$this->bd->select($this->sqlb);
			if ($tba->fields["valor"]==NULL)
			{$valor=0;}
			else
			{$valor=$tba->fields["valor"];}
			
			if (!$tba->EOF)
			{
				$ret=$tbb->fields["saldo"];
			}
			else
			{
				$ret=0;
			}
			//--
			$this->cell(35,5,number_format($ret,2,'.',','),0,0,"R");
			$acum2=$acum2+$ret;
			$this->ln(4);
			$tb3->MoveNext();
			}
			
			
			$this->ln(8);
			$tb2->MoveNext();
			}
			//SUBTOTALES
			$this->Line(135,$this->GetY(),200,$this->GetY());
			$this->setFont("Arial","B",7);
			$this->cell(5,5,"");
			$this->cell(27,5,"TOTAL CONCEPTO ");
			$this->cell(20,5,"    ".strtoupper($tb1->fields["codcon"]));
			$this->cell(61,5,strtoupper($tb1->fields["nomcon"]));
			$this->cell(41,5,number_format($acum,2,'.',','),0,0,"R");
			$this->cell(35,5,number_format($acum2,2,'.',','),0,0,"R");
			$this->ln();
			$this->cell(5,5,"");
			$this->cell(27,5,"CANTIDAD TRABAJADORES     ".$cont);
			$this->ln(300);
			$tb1->MoveNext();
			}
			
			

		}
	}
?>
