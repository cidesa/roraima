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
		var $sql3;
		var $sqla;
		var $sqlb;		
		var $sqlc;
		var $sqlx;		
		var $rep;
		var $numero;
		var $cab;
		var $car1;
		var $car2;
		var $emp1;
		var $emp2;
		var $mes;
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
			$this->nom=$_POST["nom"];


			
			$this->sql="select a.codniv,d.desniv,a.codemp, a.nomemp, a.cedemp, to_char(a.fecnac,'dd/mm') as fecnac,         
						a.edaemp, b.codcat,  b.nomcat
						from nphojint a,npasicaremp b,npcatpre c,npestorg d
						where
						b.status='V' and a.codniv=d.codniv and b.codcat=c.codcat and a.codemp=b.codemp and
						a.codemp >= rpad('".$this->emp1."',16,' ') and a.codemp <= rpad('".$this->emp2."',16,' ')  and
						to_char(fecnac,'mm')='".$this->nom."' 
						order by a.codniv,fecnac,a.nomemp";
					

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
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B","9");
			if ($this->nom=='01'){$mes="Enero";}
			if ($this->nom=='02'){$mes="Febrero";}
			if ($this->nom=='03'){$mes="Marzo";}
			if ($this->nom=='04'){$mes="Abril";}
			if ($this->nom=='05'){$mes="Mayo";}
			if ($this->nom=='06'){$mes="Junio";}
			if ($this->nom=='07'){$mes="Julio";}
			if ($this->nom=='08'){$mes="Agosto";}
			if ($this->nom=='09'){$mes="Septiembre";}
			if ($this->nom=='10'){$mes="Octubre";}
			if ($this->nom=='11'){$mes="Noviembre";}
			if ($this->nom=='12'){$mes="Diciembre";}
			
			$this->SetTextColor(0,0,128);			
			$this->cell(10,5,"CUMPLEAÑOS DEL MES  ".$mes);
			$this->ln();
			$this->ln(); 
			$this->SetLineWidth(0.2);
					$this->Line(10,$this->GetY()-1,200,$this->GetY()-1);
					$this->Line(10,$this->GetY()+6,200,$this->GetY()+6);
					$this->SetLineWidth(0.5);
					$this->Line(10,$this->GetY()+13,200,$this->GetY()+13);
					$this->SetLineWidth(0.2);
			//$this->Line(10,50,200,50);
			
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);


				if (!$tb2->EOF)
				{
					$ref=$tb2->fields["codniv"];
					if ($this->GetY()>240){$this->ln(100);}
					
					$this->SetLineWidth(0.2);
					$this->Line(10,$this->GetY()-1,200,$this->GetY()-1);
					$this->Line(10,$this->GetY()+6,200,$this->GetY()+6);
					$this->SetLineWidth(0.5);
					$this->Line(10,$this->GetY()+13,200,$this->GetY()+13);
					$this->SetLineWidth(0.2);
					
					$this->setFont("Arial","B","8");	
					$this->SetTextColor(0,0,128);
					$this->cell(14,5,"Unidad:");
					$this->cell(30,5,$tb->fields["codniv"]);
					$this->cell(30,5,strtoupper($tb->fields["desniv"]));
					$this->ln(8);
					$this->SetTextColor(0,0,0);
					$this->cell(30,5,"Código Empleado");
					$this->cell(50,5,"Nombre Empleado");
					$this->cell(25,5,"Fecha Nac.");
					$this->cell(25,5,"Categoría");
					$this->ln(6);				
				}
	
				while (!$tb->EOF)
				{
					if ($tb->fields["codniv"]!=$ref)	
					{
					$this->ln();
					if ($this->GetY()>240){$this->ln(100);}
					
					$this->SetLineWidth(0.2);
					$this->Line(10,$this->GetY()-1,200,$this->GetY()-1);
					$this->Line(10,$this->GetY()+6,200,$this->GetY()+6);
					$this->SetLineWidth(0.5);
					$this->Line(10,$this->GetY()+13,200,$this->GetY()+13);
					$this->SetLineWidth(0.2);
				
					$this->setFont("Arial","B","8");	
					$this->SetTextColor(0,0,128);
					$this->cell(14,5,"Unidad:");
					$this->cell(30,5,$tb->fields["codniv"]);
					$this->cell(30,5,strtoupper($tb->fields["desniv"]));
					$this->ln(8);
					$this->SetTextColor(0,0,0);
					$this->cell(30,5,"Código Empleado");
					$this->cell(50,5,"Nombre Empleado");
					$this->cell(25,5,"Fecha Nac.");
					$this->cell(25,5,"Categoría");
					$this->ln(6);
					}
				//Detalle
				$ref=$tb->fields["codniv"];
				$this->setFont("Arial","","7");
				$this->cell(30,5,"      ".$tb->fields["cedemp"]);
				$this->cell(50,5,strtoupper($tb->fields["nomemp"]));	
				$this->cell(25,5,"    ".$tb->fields["fecnac"]);
				$this->cell(25,5,strtoupper($tb->fields["nomcat"]));
			
				$this->ln();
				$tb->MoveNext();
				}
		}
	}
?>
