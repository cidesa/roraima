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
			$this->conf="l";
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
							A.CODEMP,
							B.CEDEMP,
							B.NOMEMP,
							A.NOMEMP as EMPRESA,
							CODCAR,
							DESCAR,
							to_char(FECINI,'dd/mm/yyyy') as fecini,
							to_char(FECTER,'dd/mm/yyyy') as fecter,
							SUEOBT,
							STACAR,
							DUREXP,
							TIPORG
						FROM
							NPEXPLAB A, NPHOJINT B
						WHERE
							(A.CODEMP)=(B.CODEMP) AND
							(A.CODEMP) >= RPAD('".$this->codesde."',16,' ') AND
							(A.CODEMP) <= RPAD('".$this->codhasta."',16,' ')
						ORDER BY A.CODEMP,B.NOMEMP";
						//print $this->sql;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",9);
			$this->cell(30,10,'Código Empleado');
			$this->cell(30,10,'Códula Empleado');
			$this->cell(50,10,'Nombre Empleado');
			$this->ln(5);
			$this->setFont("Arial","I",9);
			$this->cell(80,10,'Organismo o Empresa');
			$this->cell(85,10,'Cargo Ocupado');
			$this->cell(30,10,'Tipo de Organismo');
			$this->cell(25,10,'Fecha Inicio');
			$this->cell(25,10,'Fecha Culminación');
			$this->ln(3);
			$this->line(10,$this->getY()+5,270,$this->getY()+5);
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
				 $this->cell(80,10,$tb->fields["empresa"]);
				 $this->cell(85,10,$tb->fields["descar"]);
				 $this->cell(30,10,$tb->fields["tiporg"]);
				 $this->cell(25,10,$tb->fields["fecini"]);
				 $this->cell(25,10,$tb->fields["fecter"]);
				 $this->ln(3);
				}
			  $tb->MoveNext();
			}
		}
	}
?>