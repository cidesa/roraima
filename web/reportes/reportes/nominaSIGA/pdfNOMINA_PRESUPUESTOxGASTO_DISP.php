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
		var $niv1;
		var $niv2;
		var $emp1;
		var $emp2;
		var $gas1;
		var $gas2;
		var $nom;
		var $nombre;
		var $elab;
		var $rev;
		var $auto;
		
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
			$this->fpdf("l","mm","Letter");
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
			$this->gas1=$_POST["gas1"];
			$this->gas2=$_POST["gas2"];
			$this->nom=$_POST["nom"];
			$this->elab=$_POST["elab"];
			$this->rev=$_POST["rev"];
			$this->auto=$_POST["auto"];

			/*$this->sqlb="select * from nptipgas 
						where
						codtipgas>='".$this->gas1."' and
						codtipgas<='".$this->gas2."'
						order by codtipgas";*/
//						--b.codtipgas='".$tbb->fields["codtipgas"]."' and

			$this->sqlb="select distinct(b.codtipgas) as codtipgas, c.destipgas
						from npnomcal a,npasicaremp b,nptipgas c
						where
						(a.codnom) = rpad('".$this->nom."',3,' ') and
						b.codtipgas=c.codtipgas
						order by b.codtipgas";
			

			$this->cab=new cabecera();
			
		}
		
		
		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
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
			$this->ln(10);
			
			
		}
		function Cuerpo()
		{
			
			$cont2=0;
			$acumasigna4=0;
			$acumdeduc4=0;
			$acumaporte4=0;
			
			$tbb=$this->bd->select($this->sqlb);
			while (!$tbb->EOF)
			{
			$acumasigna3=0;
			$acumdeduc3=0;
			$acumaporte3=0;
			if ($this->GetY()>175)
			{
			$this->ln(300);
			}
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->cell(5,5,"");
			$this->sqlx="select * from nptipgas 
						where
						codtipgas='".$tbb->fields["codtipgas"]."' ";

			$tbx=$this->bd->select($this->sqlx);
			$this->cell(5,5,"TIPO DE GASTO: ".strtoupper($tbx->fields["destipgas"]));
			$this->SetTextColor(0,0,0);
			$this->Line(14,$this->GetY()+7,270,$this->GetY()+7);
			$this->SetLineWidth(0.5);
			$this->Line(14,$this->GetY()+12,270,$this->GetY()+12);
			$this->SetLineWidth(0.2);
			$this->SetTextColor(0,0,0);
			$this->ln(7);
			$this->cell(4,5,"");
			$this->cell(62,5,"Código Presupuestario");
			$this->cell(65,5,"Descripción");
			$this->cell(35,5,"Asignación");
			$this->cell(35,5,"Deducción");
			$this->cell(28,5,"Aportes");
			$this->cell(35,5,"Disponibilidad");
			$this->ln(6);
			
			//--
			$this->sql="select substr(rtrim(b.codcat)||'-'||rtrim(c.codpar)||'                                ',1,50) as codpre,
						sum(CASE WHEN a.asided='A' THEN a.saldo ELSE 0 END) as asigna,
						sum(CASE WHEN a.asided='D' THEN a.saldo ELSE 0 END) as deduci,
						sum(CASE WHEN a.asided='P' THEN a.saldo ELSE 0 END) as aporte,
						b.codtipgas as tipogasto1
						from npnomcal a,npasicaremp b,npdefcpt c
						where 
						(a.codnom) = rpad('".$this->nom."',3,' ') and
						b.codtipgas='".$tbb->fields["codtipgas"]."' and
						(b.codemp)=(a.codemp) and
						(b.codcar)=(a.codcar) and
						 b.codnom=a.codnom and
						 c.codcon=a.codcon and
						 (b.status)='V' and
						 (a.codcar) >= rpad('".$this->car1."',16,' ') and (a.codcar) <= rpad('".$this->car2."',16,' ') and
						 (a.codemp) >= rpad('".$this->emp1."',16,' ') and (a.codemp) <= rpad('".$this->emp2."',16,' ') and
						 (a.codcon) >= rpad('".$this->con1."',3,' ') and (a.codcon) <= rpad('".$this->con2."',3,' ') and
						 (impcpt) = 'S' and (opecon) <> 'P' and a.saldo>0 and a.codcon<>'XXX' 
						 and a.codcon not in (select codcon from npconceptoscategoria)
						 group by substr(rtrim(b.codcat)||'-'||rtrim(c.codpar)||'                                ',1,50),a.codnom,b.codtipgas";

			$tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			while (!$tb->EOF)
			{
			$this->cell(4,5,"");
			$this->cell(50,5,"   ".$tb->fields["codpre"]);
			$this->sqla="select nompre as nombre
						from cpdeftit
						where (codpre)=rpad('".$tb->fields["codpre"]."',50,' ')";
			$tba=$this->bd->select($this->sqla);
			if ($tba->fields["nombre"]==' ')
			{$nom=$tba->fields["nombre"];}
			else
			{$nom="Titulo Presupuestario no Existe";}
			$this->cell(62,5,strtoupper($nom));
			$this->cell(35,5,number_format($tb->fields["asigna"],2,'.',','),0,0,"R");
			$this->cell(35,5,number_format($tb->fields["deduci"],2,'.',','),0,0,"R");
			$this->cell(35,5,number_format($tb->fields["aporte"],2,'.',','),0,0,"R");
			$this->sqlc="select coalesce(mondis,0) as monto 
						 from cpasiini where perpre='00' and codpre='".$tb->fields["codpre"]."'";
			$tbc=$this->bd->select($this->sqlc);
			if ( $tb->fields["asigna"]+	$tb->fields["deduci"]+$tb->fields["aporte"] > $tbc->fields["monto"])
			{
				$disp="SIN DISPONIBILIDAD";
			}
			else
			{
				$disp=" ";
			}
			$this->setFont("Arial","B",8);
			$this->cell(37,5,$disp,0,0,"R");
			$this->setFont("Arial","",8);
			$acumasigna3=$acumasigna3+$tb->fields["asigna"];
			$acumdeduc3=$acumdeduc3+$tb->fields["deduci"];
			$acumaporte3=$acumaporte3+$tb->fields["aporte"];
			$acumasigna4=$acumasigna4+$tb->fields["asigna"];
			$acumdeduc4=$acumdeduc4+$tb->fields["deduci"];
			$acumaporte4=$acumaporte4+$tb->fields["aporte"];
			$this->ln(4);
			$tb->MoveNext();
			}
			
			$this->SetLineWidth(0.5);
			$this->Line(108,$this->GetY()+2,270,$this->GetY()+2);
			$this->SetLineWidth(0.2);
			$this->ln(2);
			$this->setFont("Arial","B",9);
			$this->cell(99,5,"");
			$this->cell(17,5,"TOTAL GASTO");
			$this->setFont("Arial","",8);
			$this->cell(35,5,number_format($acumasigna3,2,'.',','),0,0,"R");
			$this->cell(35,5,number_format($acumdeduc3,2,'.',','),0,0,"R");
			$this->cell(35,5,number_format($acumaporte3,2,'.',','),0,0,"R");
			
			$this->ln(9);
			$tbb->MoveNext();
			}
			$this->SetLineWidth(0.5);
			$this->Line(113,$this->GetY(),270,$this->GetY());
			$this->SetLineWidth(0.2);
			$this->setFont("Arial","B",9);
			$this->cell(107,5,"");
			$this->cell(10,5,"TOTALES");
			$this->setFont("Arial","",8);
			$this->cell(35,5,number_format($acumasigna4,2,'.',','),0,0,"R");
			$this->cell(35,5,number_format($acumdeduc4,2,'.',','),0,0,"R");
			$this->cell(35,5,number_format($acumaporte4,2,'.',','),0,0,"R");
			
			$this->SetY(180);
			$this->Line(20,$this->GetY(),60,$this->GetY());
			$this->Line(120,$this->GetY(),160,$this->GetY());
			$this->Line(220,$this->GetY(),260,$this->GetY());
			$this->SetTextColor(0,0,128);
			$this->ln(1);
			$this->cell(11,5,"");
			$this->cell(40,5,strtoupper($this->elab),0,0,"C");
			$this->ln(1);
			$this->ln(-1);
			$this->cell(110,5,"");
			$this->cell(40,5,strtoupper($this->rev),0,0,"C");
			$this->ln(1);
			$this->ln(-1);
			$this->cell(210,5,"");
			$this->cell(40,5,strtoupper($this->auto),0,0,"C");
			$this->ln(5);
			$this->cell(10,5,"");
			$this->cell(40,5,"Elaborado",0,0,"C");
			$this->ln(1);
			$this->ln(-1);
			$this->cell(110,5,"");
			$this->cell(40,5,"Revisado",0,0,"C");
			$this->ln(1);
			$this->ln(-1);
			$this->cell(210,5,"");
			$this->cell(40,5,"Autorizado",0,0,"C");

		}
	}
?>
