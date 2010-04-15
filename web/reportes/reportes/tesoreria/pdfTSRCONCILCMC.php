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
		var $sql;
		var $sql1;
		var $sql1b;
		var $sql1c;
		var $sql2;
		var $sql3;
		var $sql4;
		var $sqlb;
		var $sqlnom;
		var $mes2;
		var $numcue;
		var $salant;
		var $antban;
		var $salban;
		var $bancost;
		var $sallib;
		var $librost;
		var $rep;
		var $numero;
		var $cab;
		var $cta1;
		var $cta2;
		var $mov1;
		var $mov2;
		var $mes;
		var $ano;
		var $apro;
		var $ela;
		var $cod1;
		var $cod2;
		var $deb;
		var $cre;
		var $status;
		var $auxd=0;
		var $car;
		var $acumsalant=0;
		var $acumdeb=0;	
		var $acumlib=0;	
		var $acumban=0;
		var $acumlib2=0;	
		var $acumban2=0;
		var $sal=0;
		var $fecha;	
				
		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cta1=$_POST["cta1"];
			$this->cta2=$_POST["cta2"];
			$this->mes=$_POST["mes"];
			$this->ano=$_POST["ano"];
			$this->apro=$_POST["apro"];
			$this->ela=$_POST["ela"];

				$this->sql="select rtrim(numcue) as cueban,nomcue,antlib as sallib,antban as salban
						from tsdefban 
						where rtrim(numcue) >= rtrim('".$this->cta1."') and rtrim(numcue) <= rtrim('".$this->cta2."') 
						order by rtrim(numcue)";
			
				$this->sqlb="select to_char(b.fechas,'dd/mm/yyyy') as fecha
							from contaba a, contaba1 b
							where a.fecini=b.fecini and
							a.feccie=b.feccie and
							b.fecdes=to_date('01/'||'".$this->mes."'||'/'||'".$this->ano."','dd/mm/yyyy')";
			
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="";
				$this->titulos[1]="Cuenta";
				$this->titulos[2]="Uso";
				$this->titulos[3]="Saldo Anterior";
				$this->titulos[4]="Dbitos";
				$this->titulos[5]="Crditos";
				$this->titulos[6]="Saldo Segun Libros";

		}
		
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
		
		}
		function Cuerpo()
		{
			
			$this->SetLineWidth(0.5);
			$this->Line(10,$this->GetY()-2,200,$this->GetY()-2);
			$this->SetLineWidth(0.2);
		    $tb=$this->bd->select($this->sql);
			
			$tbb=$this->bd->select($this->sqlb);
			$this->fecha=$tbb->fields["fecha"];
			
			$this->ln(2);
			
			
			//------------------------------------------------------------------------------------------------
			while (!$tb->EOF)//
			{
			//$this->cell(10,5,$this->GetY());
			if ($this->GetY()>200)
			{
			$this->ln(100);
			$this->cell(5,5,"");
			$this->ln(-1);
			$this->ln(1);
			}
			$this->numcue=$tb->fields["cueban"];
			$this->salban=0;
			$this->salban=$tb->fields["salban"];
			$this->sallib=0;
			$this->sallib=$tb->fields["sallib"];
			$this->acumlib=0;
			$this->acumban=0;
			
			$this->sql1="select coalesce(sum((CASE WHEN a.debcre='D' THEN b.monmov ELSE 0 END)),0) as debbanpos,
						coalesce(sum((CASE WHEN a.debcre='C' THEN b.monmov ELSE 0 END)),0) as crebanpos
					     from tstipmov a, tsmovban b, contaba c
					     where 
						 rtrim(a.codtip) = rtrim(b.tipmov) and
						 rtrim(b.numcue) = rtrim('".$this->numcue."') and
						 b.fecban<=to_date('".$this->fecha."','dd/mm/yyyy') and b.fecban>=c.fecini";  
			$tb1=$this->bd->select($this->sql1);
			$bancos=$this->salban+$tb1->fields["debbanpos"]-$tb1->fields["crebanpos"];
			$this->bancost=$bancos;
			
			$this->sql1b="select coalesce(sum((CASE WHEN a.debcre='D' THEN b.monmov ELSE 0 END)),0) as deblibpos,
						coalesce(sum((CASE WHEN a.debcre='C' THEN b.monmov ELSE 0 END)),0) as crelibpos
					     from tstipmov a, tsmovlib b, contaba c
					     where rtrim(a.codtip) = rtrim(b.tipmov) and
						 rtrim(b.numcue) = rtrim('".$this->numcue."') and
						 b.feclib<=to_date('".$this->fecha."','dd/mm/yyyy') and b.feclib>=c.fecini";  
			$tb1b=$this->bd->select($this->sql1b);
			$libros=$this->sallib+$tb1b->fields["deblibpos"]-$tb1b->fields["crelibpos"];
			$this->librost=$libros;
			$error=0;
			$this->sql1c="select coalesce(sum((CASE WHEN a.debcre='D' THEN b.monmov ELSE 0 END)),0) as debbanpos,
						 coalesce(sum((CASE WHEN a.debcre='C' THEN b.monmov ELSE 0 END)),0) as crebanpos
					     from tstipmov a, tsmovban b
					     where rtrim(a.codtip) = rtrim(b.tipmov) and
						 rtrim(b.numcue) = rtrim('".$this->numcue."') and
						 b.fecban<=to_date('".$this->fecha."','dd/mm/yyyy') and b.stacon1 is not null";  
			$tb1c=$this->bd->select($this->sql1c);
			$error=$tb1c->fields["debbanpos"]-$tb1c->fields["crebanpos"];
			//------------------------------
			if ($this->mes=='01'){$this->mes2="Enero";}
			if ($this->mes=='02'){$this->mes2="Febrero";}
			if ($this->mes=='03'){$this->mes2="Marzo";}
			if ($this->mes=='04'){$this->mes2="Abril";}
			if ($this->mes=='05'){$this->mes2="Mayo";}
			if ($this->mes=='06'){$this->mes2="Junio";}
			if ($this->mes=='07'){$this->mes2="Julio";}
			if ($this->mes=='08'){$this->mes2="Agosto";}
			if ($this->mes=='09'){$this->mes2="Septiembre";}
			if ($this->mes=='10'){$this->mes2="Octubre";}
			if ($this->mes=='11'){$this->mes2="Noviembre";}
			if ($this->mes=='12'){$this->mes2="Diciembre";}
			//------------------------------
			$this->Line(128,$this->GetY(),198,$this->GetY());
			$this->Line(128,$this->GetY()+4,198,$this->GetY()+4);
			$this->Line(128,$this->GetY()+20,198,$this->GetY()+20);
			$this->Line(128,$this->GetY(),128,$this->GetY()+20);
			$this->Line(198,$this->GetY(),198,$this->GetY()+20);
			$this->Line(163,$this->GetY()+4,163,$this->GetY()+20);
			
			$this->setFont("Arial","B",7);
			$this->cell(128,5,"Banco        ".strtoupper($tb->fields["nomcue"]));
			$this->cell(37,5,"Saldos al Mes de,  ".$this->mes2);
			$this->cell(100,5,"de ".$this->ano);
			$this->ln();
			$this->setFont("Arial","B",7);
			$this->cell(128,5,"Nro. Cuenta   ".$tb->fields["cueban"]);
			$this->cell(100,5,"BANCOS                                    LIBROS");
			$this->ln();
			$this->cell(113,5,"");
			$this->cell(35,5,number_format($bancos,2,'.',','),0,0,'R');
			$this->cell(35,5,number_format($libros,2,'.',','),0,0,'R');
			//------------------------------
			
			$this->ln();
			$this->ln();
			$this->ln();
			$this->Line(10,$this->GetY(),198,$this->GetY());
			$this->Line(10,$this->GetY()+5,198,$this->GetY()+5);
			$this->cell(1,5,"");
			$this->cell(12,5,"Tipo");
			$this->cell(30,5,"Referencia");
			$this->cell(70,5,"Descripcin");
			$this->cell(30,5,"Fecha");
			$this->cell(30,5,"Libros");
			$this->cell(30,5,"Bancos");
			
				$this->sql2="select rtrim(a.numcue) as numcue,a.refere,
					(CASE WHEN a.monlib=0 THEN to_char(a.fecban,'dd/mm/yyyy') ELSE to_char(a.feclib,'dd/mm/yyyy') END) as fecmov,
					--(CASE WHEN a.monlib=0 THEN to_char(a.fecban,'dd/mm/yyyy') ELSE to_char(a.feclib,'dd/mm/yyyy') END) as tipmov,
					A.MOVLIB as tipmov,
					rtrim(a.desref) as desmov,
					coalesce((CASE WHEN c.debcre='D' THEN a.monban ELSE a.monban*-(1) END),0) as libros,
					coalesce((CASE WHEN c.debcre='D' THEN a.monlib ELSE a.monlib*-(1) END),0) as bancos,
					(CASE WHEN a.monlib=0 THEN a.monban ELSE a.monlib END) as monmov,
					coalesce((CASE WHEN c.debcre='D' THEN a.monlib ELSE a.monlib*-(1) END),0) as scrlibros,
					coalesce((CASE WHEN c.debcre='D' THEN a.monban ELSE a.monban*-(1) END),0) as scrbancos,
					a.result,c.debcre
					from tsconcil a,tstipmov c
					where rtrim(CASE WHEN a.monlib=0 THEN a.movban ELSE a.movlib END)=rtrim(c.codtip) and
					rtrim(a.numcue) = rtrim('".$this->numcue."') and
					(CASE WHEN a.monlib=0 THEN a.fecban ELSE a.feclib END) <= to_date('".$this->fecha."','dd/mm/yyyy') and
					rtrim(UPPER(a.result)) <> 'CONCILIADO'
					order by rtrim(a.numcue),a.feclib,a.refere,a.movlib";	
					$tb2=$this->bd->select($this->sql2);
					$this->acumlib2=0;
					$this->acumban2=0;
					//print $this->sql2; EXIT;
					while (!$tb2->EOF)
					{
					
					$this->setX(10);
					$this->ln();
					$this->cell(15,5,$tb2->fields["tipmov"]);
					$tipmov=$tb2->fields["tipmov"];
					$this->cell(25,5,$tb2->fields["refere"]);
					$refere=$tb2->fields["refere"];
					/*if (strtoupper($tipmov)=='CHEQ')
					{
					$this->sqlnom="select nomben as nombre
								from opbenefi 
								where rtrim(cedrif) = (select rtrim(cedrif)
								from tscheemi
								where rtrim(numche)=rtrim('".$this->refere."'))";
					$tbnom=$this->bd->select($this->sqlnom);
					$nom=$tbnom->fields["nombre"];
					$this->cell(70,5,$nom);
					}
					else
					{
					$this->cell(70,5,$tb2->fields["desmov"]);
					}*/
					$this->setX(120);
					$this->cell(30,5,$tb2->fields["fecmov"]);
					$this->cell(30,5,number_format($tb2->fields["scrlibros"],2,'.',','));    
					$this->acumlib=$this->acumlib+$tb2->fields["scrlibros"];
					$this->cell(30,5,$tb2->fields["scrbancos"]);
					$this->acumban=$this->acumban+$tb2->fields["scrbancos"];

					if (strtoupper($tipmov)=='CHQ' OR strtoupper($tipmov)=='CHQF' OR strtoupper($tipmov)=='CHEQ')
					{
					$this->sqlnom="select nomben as nombre
								from opbenefi 
								where rtrim(cedrif) = (select rtrim(cedrif)
								from tscheemi
								where rtrim(numche)=rtrim('".$tb2->fields["refere"]."'))";
								//print $this->sqlnom; EXIT;
					$tbnom=$this->bd->select($this->sqlnom);
					$nom=$tbnom->fields["nombre"];
					$y=$this->getY();
					$this->setX(50);
					$this->multicell(75,3,$nom);
					}
					else
					{
					$y=$this->getY();
					$this->setX(50);
					$this->multicell(70,3,$tb2->fields["desmov"]);
					}

					//-------
					$this->acumlib2=$this->acumlib2+$tb2->fields["libros"];
					$this->acumban2=$this->acumban2+$tb2->fields["bancos"];
					//--------
					$this->ln();
					$tb2->MoveNext();
					}
					$this->ln(6);
					$this->SetLineWidth(0.5);
					$this->Line(133,$this->GetY(),198,$this->GetY());
					$this->cell(5,5,"");
					$this->cell(100,5,"RESUMEN");
					$this->cell(33,5,"TOTALES");
					$this->cell(33,5,number_format($this->acumlib,2,'.',','));
					$this->cell(30,5,number_format($this->acumban,2,'.',','));
					$this->ln(7);
					$this->Line(10,$this->GetY()+2,200,$this->GetY()+2);
					$this->ln();
					//------Linea Uno del cuadrito
					$this->setFont("Arial","",6);
					$this->cell(19,5,"Saldo Bancos");
					$this->cell(25,5,number_format($this->bancost,2,'.',','));
					$this->ln(2);
					$this->cell(39,5,"");
					$this->cell(5,5,"+");
					$this->ln(-2);
					$this->cell(43,5,"");
					$this->cell(17,5,"Saldo Libros");
					$this->cell(25,5,number_format($this->librost,2,'.',','));
					$this->ln(2);
					$this->cell(80,5,"");
					$this->cell(5,5,"+");
					$this->ln(-2);
					$this->ln(3);
					$this->cell(94,5,"");
					$this->cell(26,5,"Total Bancos");
					$this->cell(27,5,"Total Libros");
					$this->cell(30,5,"Bancos");
					$this->ln(-3);
					$this->cell(146,5,"");
					$this->cell(30,5,"Error de");
					$this->ln(3);
					$this->cell(169,5,"");
					$this->cell(20,5,"Diferencia");
					$this->ln(-3);
					//------
					$this->ln();
					$this->cell(20,5,"PNC Bancos");
					$this->cell(25,5,number_format(abs($this->acumban2),2,'.',','));
					$this->ln(3);
					$this->ln(-3);
					$this->cell(43,5,"");
					$this->cell(17,5,"PNC Libros");
					$this->cell(25,5,number_format(abs($this->acumlib2),2,'.',','));
					$this->SetLineWidth(0.2);
					$this->Line(27,$this->GetY()+4,47,$this->GetY()+4);
					$this->Line(68,$this->GetY()+4,88,$this->GetY()+4);
					$this->SetLineWidth(0.5);
					//------
					$this->ln();
					$totalb=$this->bancost+$this->acumban2;
					$totall=$this->librost+$this->acumlib2;
					$this->cell(19,5,"Total Bancos");
					$this->cell(25,5,number_format($totalb,2,'.',','));
					$this->ln(3);
					$this->ln(-3);
					$this->cell(43,5,"");
					$this->cell(17,5,"Total Libros");
					$this->cell(25,5,number_format($totall,2,'.',','));
					$this->ln(-3);
					$this->cell(92,5,"");
					$this->cell(21,5,number_format($totalb,2,'.',','));
					$this->cell(5,5,"-");
					$this->cell(21,5,number_format($totall,2,'.',','));
					$this->cell(5,5,"-");
					$this->cell(21,5,number_format($error,2,'.',','));
					$this->cell(5,5,"=");
					$dif=abs($totalb-$totall-$error);
					$this->cell(21,5,number_format($dif,2,'.',','));
					$this->ln(3);
					
					//AKIIIIIIIIIIIIIIIIIII VOYYYYYYYYYYYYYYYYYYYYY!!!!!!!!
					//------
					$this->Line(10,$this->GetY()-13,10,$this->GetY()+7);
					$this->Line(200,$this->GetY()-13,200,$this->GetY()+7);
					$this->Line(10,$this->GetY()+7,200,$this->GetY()+7);
					$this->SetLineWidth(0.2);
					
						
			$this->ln();		
			$this->ln();
			$this->ln();			
			$tb->MoveNext();
			}
			//------------------------------------------------------------------------------------------------
			$this->setFont("Arial","B",8);
				$this->ln();
				$this->ln();
				$this->ln();
				$this->ln();
				$this->ln(5);
				$this->cell(90,7,"                                       Elaborado por ");
				$this->cell(40,7,"Revisado por                                          Aprobado por");
				
				$this->Line(30,$this->GetY(),70,$this->GetY());
				$this->Line(90,$this->GetY(),130,$this->GetY());
				$this->Line(140,$this->GetY(),180,$this->GetY());
				
				//$this->Line(10,$this->GetY()-25,200,$this->GetY()-25);
				$this->setFont("Arial","B",15);
				$this->setFont("Arial","B",8);
				$this->ln();
				$this->ln();
				$this->ln();
			
		
				
		}
	}
?>
