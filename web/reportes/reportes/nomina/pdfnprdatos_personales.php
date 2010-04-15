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
			$this->estado=$_POST["estado"];
			$this->sql="SELECT
							A.CODEMP as codemp,
							A.NOMEMP as nomemp,
							A.CEDEMP as cedemp,
							A.NUMCON as numcon,
							(CASE WHEN A.EDOCIV='V' THEN 'Soltero' WHEN A.EDOCIV='C' THEN 'Casado' WHEN A.EDOCIV='D' THEN 'Divorciado' WHEN A.EDOCIV='V' THEN 'Viudo' ELSE 'Otros' END) as edociv,
							(CASE WHEN A.NACEMP='V' THEN 'Venezolano' ELSE 'Extranjero' END) as nacemp,
							(CASE WHEN A.SEXEMP='F' THEN 'Femenino' ELSE 'Masculino' END) as sexemp,
							to_char(A.FECNAC,'dd/mm/yyyy') as fecnac,
							A.EDAEMP as edaemp,
							A.LUGNAC as lugnac,
							substr(A.DIRHAB,1,45) as dirhab,
							A.CODCIU as codciu,
							A.TELHAB as telhab,
							A.CELEMP as celemp,
							A.EMAEMP as emaemp,
							A.CODPOS as codpos,
							A.TALPAN as talpan,
							A.TALCAM as talcam,
							A.TALCAL as talcal,
							(CASE WHEN A.DERZUR='D' THEN 'Derecho' ELSE 'Izquierdo' END) as derzur,
							to_char(A.FECING,'dd/mm/yyyy') as fecing,
							A.FECRET as fecret,
							A.FECREI as fecrei,
							A.FECADMPUB as fecadmpub,
							A.STAEMP as staemp,
							A.FOTEMP as fotemp,
							A.NUMSSO as numsso,
							A.NUMPOLSEG as numpolseg,
							to_char(A.FECCOTSSO,'dd/mm/yyyy') as feccotsso,
							A.ANOADMPUB as anoadmpub,
							A.CODTIPPAG as codtippag,
							A.CODBAN as codban,
							A.TIPCUE as tipcue,
							A.NUMCUE as numcue,
							A.OBSEMP as obsemp,
							(CASE WHEN A.TIEFID='S' THEN 'Si' ELSE 'No' END) as tipo
						FROM NPHOJINT A
						WHERE
							RTRIM(A.CODEMP) >= RTRIM('".$this->codesde."') AND
							RTRIM(A.CODEMP) <= RTRIM('".$this->codhasta."')
						ORDER BY A.CODEMP";
						//print $this->sql;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",9);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			while(!$tb->EOF)
			{
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Código Empleado');
				 $this->cell(45,10,'Nombre Empleado');
				 $this->cell(30,10,'Cédula Empleado');
				 $this->cell(60,10,'Número Contrato');
				 $this->cell(30,10,'Estado Civil');
				 $this->cell(35,10,'Nacionalidad');
				 $this->cell(25,10,'Sexo');
				 $this->ln(3);
				 $this->setFont("Arial","",8);
				 $this->cell(35,10,$tb->fields["codemp"]);
				 $this->setFont("Arial","",6);
				 $this->cell(45,10,$tb->fields["nomemp"]);
				 $this->setFont("Arial","",8);
				 $this->cell(30,10,$tb->fields["cedemp"]);
				 $this->cell(60,10,$tb->fields["numcon"]);
				 $this->cell(30,10,$tb->fields["edociv"]);
				 $this->cell(35,10,$tb->fields["nacemp"]);
				 $this->cell(25,10,$tb->fields["sexemp"]);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Fecha Nacimiento');
				 $this->cell(45,10,'Edad');
				 $this->cell(30,10,'Lugar de Nacimiento');
				 $this->cell(60,10,'Dirección');
				 $this->cell(30,10,'Código Ciudad');
				 $this->cell(35,10,'Telefono');
				 $this->cell(25,10,'Celular');
				 $this->ln(3);
				 $this->setFont("Arial","",8);
				 $this->cell(35,10,$tb->fields["fecnac"]);
				 $this->cell(45,10,$tb->fields["edaemp"]);
				 $this->setFont("Arial","",6);
				 $this->cell(30,10,$tb->fields["lugnac"]);
				 $this->cell(60,10,$tb->fields["dirhab"]);
				 $this->setFont("Arial","",8);
				 $this->cell(30,10,$tb->fields["codciu"]);
				 $this->cell(35,10,$tb->fields["telhab"]);
				 $this->cell(25,10,$tb->fields["celemp"]);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Email');
				 $this->cell(45,10,'Código Postal');
				 $this->cell(30,10,'Talla Pantalón');
				 $this->cell(60,10,'Fecha SSO');
				 $this->cell(30,10,'Años Adm.Pública');
				 $this->cell(35,10,'Fideicomiso');
				 $this->cell(25,10,'Talla Camisa');
				 $this->ln(3);
				 $this->setFont("Arial","",6);
				 $this->cell(35,10,$tb->fields["emaemp"]);
				 $this->setFont("Arial","",8);
				 $this->cell(45,10,$tb->fields["codpos"]);
				 $this->cell(30,10,$tb->fields["talpan"]);
				 $this->cell(60,10,$tb->fields["feccotsso"]);
				 $this->cell(30,10,$tb->fields["anoadmpub"]);
				 $this->cell(35,10,$tb->fields["tipo"]);
				 $this->cell(25,10,$tb->fields["talcal"]);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Talla Calzado');
				 $this->cell(45,10,'Derecho/Zurdo');
				 $this->cell(30,10,'Fecha Ingreso');
				 $this->ln(3);
				 $this->setFont("Arial","",8);
				 $this->cell(35,10,$tb->fields["talcal"]);
				 $this->cell(45,10,$tb->fields["derzur"]);
				 $this->cell(30,10,$tb->fields["fecing"]);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Número S.S.O.');
				 $this->cell(45,10,'Número Poliza Seguro');
				 $this->cell(30,10,'');
				 $this->cell(60,10,'Código Tipo Pago');
				 $this->cell(30,10,'Código Banco');
				 $this->cell(35,10,'Número Cuenta');
				 $this->cell(25,10,'Tipo Cuenta');
				 $this->ln(3);
				 $this->setFont("Arial","",8);
				 $this->cell(35,10,$tb->fields["numsso"]);
				 $this->cell(45,10,$tb->fields["numpolseg"]);
				 $this->cell(30,10,'');
				 $this->cell(60,10,$tb->fields["codtippag"]);
				 $this->cell(30,10,$tb->fields["codban"]);
				 $this->cell(35,10,$tb->fields["numcue"]);
				 $this->cell(25,10,$tb->fields["tipcue"]);
				 $this->ln(10);
				 $this->line(10,$this->getY(),270,$this->getY());
				 $tb->MoveNext();
			     $this->ln(3);
			}
		}
	}
?>