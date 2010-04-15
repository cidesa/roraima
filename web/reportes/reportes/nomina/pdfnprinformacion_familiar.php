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
			$this->codesde=$_POST["coddesde"];
			$this->codhasta=$_POST["codhasta"];
			$this->nom=$_POST["nom"];
			$this->sql="select DISTINCT b.codemp,a.cedfam,a.nomfam,
			B.CEDEMP as cedemp,
			B.NOMEMP as nomemp,to_char(B.FECNAC,'dd/mm/yyyy') as fecnac1,  B.EDAEMP as edademp,
			(CASE WHEN B.SEXEMP ='F' THEN 'F' ELSE 'M' END)  as sexemp,
			A.CEDFAM as cedfam,
			A.NOMFAM as nomfam,
			(CASE WHEN A.SEXFAM ='F' THEN 'Femenino' WHEN A.SEXFAM ='M' then 'Masculino' END) as sexfam,
			to_char(A.FECNAC,'dd/mm/yyyy') as fecnac,
			A.EDAFAM as edafam,
			A.PARFAM as parfam,
			(CASE WHEN A.SEGHCM ='S' THEN 'SI' WHEN A.SEGHCM ='N' THEN 'NO' END) as seghcm,
			(select C.DESPAR from NPTIPPAR C where A.PARFAM = C.TIPPAR) as despar

			from NPASICAREMP C, nphojint b left outer join npinffam a on (a.codemp=b.codemp)
						WHERE C.CODEMP=B.CODEMP AND C.CODNOM='".$this->nom."'  AND
								trim(B.CODEMP) >= trim('".$this->codesde."') AND
							trim(B.CODEMP) <= trim('".$this->codhasta."') and b.staemp='A'
						ORDER BY B.CODEMP

							 ";
					//H::PrintR($this->sql);exit;

					//	 Extract(year from age(now(),fecnac)) as edad from nphojint
					//	print '<pre>';print $this->sql;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$this->cell(40,10,'Código Empleado',0,0,'C');
			$this->cell(40,10,'Cédula Empleado',0,0,'C');
			$this->cell(70,10,'Nombre Empleado',0,0,'C');
			$this->cell(40,10,'Fecha de Nacimiento',0,0,'C');
			$this->cell(30,10,'Sexo ',0,0,'C');
			$this->cell(40,10,'Edad',0,0,'C');
			$this->ln(5);
			$this->setFont("Arial","I",8);
			$this->cell(35,10,'Cédula Familiar');
			$this->cell(60,10,'Nombre Familiar');
			$this->cell(35,10,'Fecha de Nacimiento');
			$this->cell(35,10,'Sexo Familiar');
			$this->cell(35,10,'Edad');
			$this->cell(35,10,'Parentesco Familiar');
			$this->cell(35,10,'HCM');
			$this->ln(5);
			$this->line(10,$this->getY()+5,270,$this->getY()+5);
			$this->ln(5);
		}
		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
			$ref=" ";
			$fecha=date("d/m/Y");
			while(!$tb->EOF)
			{
			   if($tb->fields["codemp"]!=$ref)
			    {

			     $this->ln();
			     //print $tb->fields["codemp"];
			     //print $tb->fields["cedemp"];exit;

			     $this->ln();

			     $this->setFont("Arial","B",8);
				 $this->cell(40,5,$tb->fields["codemp"],1,0,'C');
				 $this->cell(40,5,$tb->fields["cedemp"],1,0,'C');
				 $this->cell(70,5,$tb->fields["nomemp"],1,0,'C');
				 $this->cell(40,5,$tb->fields["fecnac1"],1,0,'C');
				 $this->cell(30,5,$tb->fields["sexemp"],1,0,'C');
				 $this->cell(40,5,$tb->fields["edademp"],1,0,'C');
				 $ref=$tb->fields["codemp"];
                 $this->ln();

			    }


			     $this->setFont("Arial","I",8);
				 $this->cell(35,10,$tb->fields["cedfam"]);
				 $this->cell(60,10,$tb->fields["nomfam"]);
				 $this->cell(35,10,$tb->fields["fecnac"]);
				 $this->cell(35,10,$tb->fields["sexfam"]);
				 $this->cell(35,10, $tb->fields["edafam"]);
				 $this->cell(35,10,$tb->fields["despar"]);
				 $this->cell(35,10,$tb->fields["seghcm"]);
				 $this->ln(4);
		        $tb->MoveNext();
			}
		}
	}
?>