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
			$this->car1=$_POST["car1"];
			$this->car2=$_POST["car2"];
			$this->nom=$_POST["nom"];


			
			$this->sql="select a.codemp, a.nomemp,a.codnom,a.nomnom,b.cedemp,coalesce(b.dirhab,' ') as dirhab,
						coalesce(b.dirotr,' ') as dirotr, coalesce(b.telhab,' ') as telhab, coalesce(b.telotr,' ') as telotr,
						coalesce(b.emaemp,' ') as emaemp
					from npasicaremp a,  nphojint b 
					where
					(a.codnom) = ('".$this->nom."') and (a.codemp)   = (b.codemp) and
					(a.codemp) >= rpad('".$this->emp1."',16,' ') and (a.codemp) <= rpad('".$this->emp2."',16,' ') and
					(a.codcar) >= rpad('".$this->car1."',16,' ') and (a.codcar) <= rpad('".$this->car2."',16,' ') and
					(b.staemp)   =  'A'
					order by (b.nomemp)";
					

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
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			
			//$this->Line(10,$this->GetY(),200,$this->GetY());	
			//$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
			$this->ln(); 
			$this->Line(10,$this->GetY(),85,$this->GetY());
				$this->Line(10,$this->GetY()+25,85,$this->GetY()+25);
				$this->Line(10,$this->GetY(),10,$this->GetY()+25);
				$this->Line(85,$this->GetY(),85,$this->GetY()+25);
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
	
				while (!$tb->EOF)
				{
				if ($this->GetY()>240){$this->ln(100);}
				
				$this->Line(10,$this->GetY(),85,$this->GetY());
				$this->Line(10,$this->GetY()+25,85,$this->GetY()+25);
				$this->Line(10,$this->GetY(),10,$this->GetY()+25);
				$this->Line(85,$this->GetY(),85,$this->GetY()+25);
				
				$this->setFont("Arial","B","9");
				$this->cell(25,5,strtoupper($tb->fields["nomemp"]));
				$this->ln();
				$this->setFont("Arial","","6");
				//----
				if ($tb->fields["dirhab"]==' ')
				{
					$dir="* NO TIENE DIRECCION";
				}
				else
				{
					$dir="- ".$tb->fields["dirhab"];
				}
				$this->cell(25,5,substr(strtoupper($dir),0,55));
				$this->ln();
				//----
				if ($tb->fields["dirotr"]==' ')
				{
					$dirotr="* NO POSEE OTRA DIRECCION";
				}
				else
				{
					$dirotr="- ".$tb->fields["dirotr"];
				}
				$this->cell(25,5,substr(strtoupper($dirotr),0,55));
				$this->ln();
				//----
				if ($tb->fields["telhab"]==' ')
				{
					$telhab="* NO POSEE TELEFONO";
				}
				else
				{
					$telhab="- ".$tb->fields["telhab"];
				}
				$this->cell(33,5,$telhab);
				if ($tb->fields["telotr"]==' ')
				{
					$telotr="* NO POSEE OTRO TELEFONO";
				}
				else
				{
					$telotr="- ".$tb->fields["telotr"];
				}
				$this->cell(25,5,$telotr);
				$this->ln();
				//----
				if ($tb->fields["emaemp"]==' ')
				{
					$emaemp="* NO TIENE E-MAIL";
				}
				else
				{
					$emaemp="- ".$tb->fields["emaemp"];
				}
				$this->cell(25,5,$emaemp);

				
				$this->ln();
				$this->ln();
				$tb->MoveNext();
				}
		}
	}
?>
