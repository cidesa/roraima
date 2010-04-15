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
							A.CEDFAM as cedfam,         
							A.NOMFAM as nomfam,         
							(CASE WHEN A.SEXFAM ='F' THEN 'Femenino' ELSE 'Masculino' END) as sexfam,         
							to_char(A.FECNAC,'dd/mm/yyyy') as fecnac,         
							A.EDAFAM as edafam,         
							A.PARFAM as parfam,
							(CASE WHEN A.SEGHCM ='S' THEN 'SI' ELSE 'NO' END) as seghcm,
							C.DESPAR as despar
						FROM 
							NPINFFAM A, NPHOJINT B, NPTIPPAR C
						WHERE
							(A.CODEMP) = (B.CODEMP) AND
							(A.PARFAM) = (C.TIPPAR) AND 
							(A.CODEMP) >= RPAD('".$this->codesde."',16,' ') AND
							(A.CODEMP) <= RPAD('".$this->codhasta."',16,' ')
						ORDER BY A.CODEMP";
						//print $this->sql;			
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$this->cell(30,10,'Código Empleado');
			$this->cell(30,10,'Cédula Empleado');
			$this->cell(50,10,'Nombre Empleado');
			$this->ln(5);
			$this->setFont("Arial","I",8);
			$this->cell(30,10,'Cédula Familiar');
			$this->cell(50,10,'Nombre Familiar');
			$this->cell(30,10,'Fecha de Nacimiento');
			$this->cell(25,10,'Sexo Familiar');
			$this->cell(30,10,'Parentesco Familiar');
			$this->cell(15,10,'HCM');
			$this->ln(5);
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
				 $this->cell(50,10,$tb->fields["nomemp"]);
				 $ref=$tb->fields["codemp"];
			     $this->ln(4);
			    }
				else
				{
			     $this->setFont("Arial","I",8);
				 $this->cell(30,10,$tb->fields["cedfam"]);
				 $this->cell(50,10,$tb->fields["nomfam"]);
				 $this->cell(30,10,$tb->fields["fecnac"]);
				 $this->cell(25,10,$tb->fields["sexfam"]);
				 $this->cell(30,10,$tb->fields["despar"]);
				 $this->cell(15,10,$tb->fields["seghcm"]);
				 $this->ln(3);
				}	 
			  $tb->MoveNext();
			}
		}
	}
?>