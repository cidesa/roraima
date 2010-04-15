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
		var $rep;
		var $numero;
		var $cab;
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
		var $nom1;
		var $nom2;
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
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->nom1=$_POST["nom1"];
			$this->nom2=$_POST["nom2"];

			
			$this->sql="select b.codnom as bcodnom, c.nomnom as cnomnom, b.codcar as bcodcar, a.nomcar as anomcar, a.suecar as asuecar
					from npcargos a,npasicarnom b,npnomina c
					where b.codnom>= '".$this->nom1."' and b.codnom<= '".$this->nom2."' and
					(b.codcar) >= rpad('".$this->cod1."',16,' ') and (b.codcar) <= rpad('".$this->cod2."',16,' ')  and
					b.codnom=c.codnom and
					b.codcar=a.codcar
					order by b.codnom,b.codcar";

			//$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código Cargo";
				$this->titulos[1]="Descripción Cargo";
				$this->titulos[2]="Sueldo Cargo";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			/*for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln(); 
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			//$this->ln(); 
			//$this->Line(10,50,200,50);
			
		}
		function Cuerpo()
		{
			
		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$ncampos=count($this->titulos);
			
			if (!$tb2->EOF)
			{
				$ref=$tb2->fields["bcodnom"];
				$this->setFont("Arial","B",8);
				$this->SetTextColor(0,0,128);
				$this->cell(20,5,"Nómina: ");
				$this->cell(20,5,"".$tb2->fields["bcodnom"]);
				$this->cell(20,5,"".$tb2->fields["cnomnom"]);
				$this->ln();
				$this->SetTextColor(0,0,0);
				$this->Line(15,$this->Gety(),175,$this->Gety());
				$this->cell(5,5,"");
				$this->cell(30,5,"Código Cargo ");
				$this->cell(110,5,"Descripción Cargo ");
				$this->cell(20,5,"Sueldo Cargo ");
				$this->ln();
				$this->SetLineWidth(0.3);
				$this->Line(15,$this->Gety(),175,$this->Gety());
			}
			while (!$tb->EOF)
			{
				if ($tb->fields["bcodnom"]!=$ref)
				{
				$this->ln();
				$this->setFont("Arial","B",8);
				$this->SetTextColor(0,0,128);
				$this->cell(20,5,"Nómina: ");
				$this->cell(20,5,"".$tb->fields["bcodnom"]);
				$this->cell(20,5,"".$tb->fields["cnomnom"]);
				$this->SetTextColor(0,0,0);
				$this->ln();
				$this->Line(15,$this->Gety(),175,$this->Gety());
				$this->cell(5,5,"");
				$this->cell(30,5,"Código Cargo ");
				$this->cell(110,5,"Descripción Cargo ");
				$this->cell(20,5,"Sueldo Cargo ");
				$this->ln();
				$this->SetLineWidth(0.3);
				$this->Line(15,$this->Gety(),175,$this->Gety());
				}
			
				$ref=$tb->fields["bcodnom"];
				
				//Detalle
				$this->setFont("Arial","",8);
				$this->cell(10,5,"");
				$this->cell(25,5,"".$tb->fields["bcodcar"]);
				$this->cell(110,5,substr($tb->fields["anomcar"],0,120));
				$this->cell(20,5,"  ".number_format($tb->fields["asuecar"],2,'.',','),0,0,"R");

				$this->ln();
				$tb->MoveNext();
			}
		}
	}
?>
ll(20,5,"  ".number_format($tb->fields["asuecar"],2,'.',','),0,0,"R");

				$this->ln();
				$tb->MoveNext();
			}
		}
	}
?>
