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
		var $con1;
		var $con2;
		var $emp1;
		var $emp2;
		var $nom;
		var $niv2;
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
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->nom=$_POST["nom"];


			
			$this->sql="select rpad(rtrim(a.codcat)||'-'||rtrim(c.codpar),32,' ') as codpre,
				sum((CASE WHEN c.opecon='A' THEN a.monto ELSE 0 END)) as asigna,
				sum((CASE WHEN c.opecon='D' THEN a.monto ELSE 0 END)) as deduci,
				sum((CASE WHEN c.opecon='P' THEN a.monto ELSE 0 END)) as aporte
				from nphiscon a,npdefcpt c
				where 
				a.codcon=c.codcon and
				a.codemp >= rpad('".$this->emp1."',16,' ') and a.codemp <= rpad('".$this->emp2."',16,' ') and
				a.codcon >= rpad('".$this->con1."',3,' ') and a.codcon <= rpad('".$this->con2."',3,' ') and
				a.codnom = rpad('".$this->nom."',3,' ') and a.monto>0 
				and fecnom>=to_date('".$this->fecha1."','dd/mm/yyyy') and fecnom<=to_date('".$this->fecha2."','dd/mm/yyyy')
				and a.codcon not in(select codcon from npconceptoscategoria)
				group by rpad(rtrim(a.codcat)||'-'||rtrim(c.codpar),32,' ')
				union
				select rpad(rtrim(a.codcat)||'-'||rtrim(c.codpar),32,' ') as codpre,
				sum((CASE WHEN c.opecon='A' THEN a.monto ELSE 0 END)) as asigna2,
				sum((CASE WHEN c.opecon='D' THEN a.monto ELSE 0 END)) as deduci2,
				sum((CASE WHEN c.opecon='P' THEN a.monto ELSE 0 END)) as aporte2
				from nphiscon a,npdefcpt c,npconceptoscategoria d
				where
				a.codcon=c.codcon and c.codcon=d.codcon and a.codcon=d.codcon and
				a.codemp >= rpad('".$this->emp1."',16,' ') and a.codemp <= rpad('".$this->emp2."',16,' ') and
				a.codcon >= rpad('".$this->con1."',3,' ') and a.codcon <= rpad('".$this->con2."',3,' ') and
				a.codnom = rpad('".$this->nom."',3,' ') and a.monto>0  
				and fecnom>=to_date('".$this->fecha1."','dd/mm/yyyy') and fecnom<=to_date('".$this->fecha2."','dd/mm/yyyy')
				group by rpad(rtrim(a.codcat)||'-'||rtrim(c.codpar),32,' ')
				order by codpre";
					

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
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
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
			
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			
			
			$this->sqlx="select codnom, nomnom, ultfec, profec from npnomina where codnom='".$this->nom."'";
			$tbx=$this->bd->select($this->sqlx);
				$this->setFont("Arial","B",9);
				$this->SetTextColor(0,0,128);
				$codigo=strtoupper($tbx->fields["codnom"]);
				$nombre=strtoupper($tbx->fields["nomnom"]);
				$this->cell(20,5,"Nómina: ".$codigo." - ".$nombre);
				$this->ln();
				$this->cell(20,5,"DESDE:   : ".$this->fecha1."       HASTA:   ".$this->fecha2);
				$this->ln();
				$this->SetTextColor(0,0,0);
				$this->Line(10,$this->GetY(),200,$this->GetY());
				$this->SetLineWidth(0.4);
				$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
				$this->SetLineWidth(0.2);
				$this->setFont("Arial","B",8);
				//$this->cell(2,5,"");
				$this->cell(36,5,"Código Presupuestario");
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
							from cpdeftit where codpre=rpad('".$codpre."',32,' ')";
				$tb2=$this->bd->select($this->sql2);
				//---
				$this->cell(64,5,substr($tb2->fields["nombre"],0,45));
				$this->cell(30,5,number_format($tb->fields["asigna"],2,'.',','),0,0,"R");
				$asig=$asig+$tb->fields["asigna"];
				$this->cell(30,5,number_format($tb->fields["deduci"],2,'.',','),0,0,"R");
				$dedu=$dedu+$tb->fields["deduci"];
				$this->cell(30,5,number_format($tb->fields["aporte"],2,'.',','),0,0,"R");
				$apor=$apor+$tb->fields["aporte"];
				$this->ln();
				$tb->MoveNext();
				}
				$this->ln(2);
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
