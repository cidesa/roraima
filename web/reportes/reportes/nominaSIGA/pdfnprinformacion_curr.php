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
		var $codesde;
		var $codhasta;
		var $estado;
		var $conf;
				
		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codesde=$_POST["codesde"];
			$this->codhasta=$_POST["codhasta"];
			$this->sql="SELECT 
							A.CODEMP as codemp,         
							B.CEDEMP as cedemp,
							B.NOMEMP as nomemp,
							NOMTIT as nomtit, 
							DESCUR as descur, 
							INSTIT as instit, 
							DURCUR as durcur, 
							ANOCUL as anocul 
						FROM 
							NPINFCUR A, NPHOJINT B
						WHERE
							(A.CODEMP) =(B.CODEMP) AND 
							(A.CODEMP) >= RPAD('".$this->codesde."',16,' ') AND
							(A.CODEMP) <= RPAD('".$this->codhasta."',16,' ')
						ORDER BY A.CODEMP";
						//print $this->sql;			
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",9);
			$this->cell(30,10,'Código Empleado');
			$this->cell(30,10,'Cédula Empleado');
			$this->cell(50,10,'Nombre Empleado');
			$this->ln(5);
			$this->setFont("Arial","I",9);
			$this->cell(60,10,'Titulo Obtenido');
			$this->cell(50,10,'Instituto');
			$this->cell(30,10,'Duración');
			$this->cell(30,10,'Año de Culminación');
			$this->ln(3);
			$this->line(10,$this->getY()+5,200,$this->getY()+5);
			$this->ln(3);
		}
		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
			$ref=" ";
			while(!$tb->EOF)
			{
			   if($tb->fields["codemp"]!=$ref)
			    {
			     $this->setFont("Arial","B",8);
				 $this->cell(30,10,$tb->fields["codemp"]);
				 $this->cell(30,10,$tb->fields["cedemp"]);
			     $this->setFont("Arial","B",7);
				 $this->cell(50,10,$tb->fields["nomemp"]);
				 $ref=$tb->fields["codemp"];
			     $this->ln(4);
			    }
				else
				{
			     $this->setFont("Arial","I",6);
				 $this->cell(60,10,$tb->fields["nomtit"]);
			     $this->setFont("Arial","I",7);
				 $this->cell(50,10,$tb->fields["instit"]);
			     $this->setFont("Arial","I",8);
				 $this->cell(30,10,$tb->fields["durcur"]);
				 $this->cell(30,10,$tb->fields["anocul"]);
				 $this->ln(3);
				}	 
			  $tb->MoveNext();
			}
		}
	}
?>