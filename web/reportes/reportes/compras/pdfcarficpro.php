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
		var $codprodesde;
		var $codprohasta;
		var $rifdesde;
		var $rifhasta;
		var $nombdesde;
		var $nombhasta;
		var $ramodesde;
		var $ramohasta;
		var $orden;
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
			$this->codprodesde=$_POST["codprodesde"];
			$this->codprohasta=$_POST["codprohasta"];
			$this->rifdesde=$_POST["rifdesde"];
			$this->rifhasta=$_POST["rifhasta"];
			$this->nombdesde=$_POST["nombdesde"];
			$this->nombhasta=$_POST["nombhasta"];
			$this->ramodesde=$_POST["ramodesde"];
			$this->ramohasta=$_POST["ramohasta"];
			$this->sql="SELECT
							A.CODPRO as codpro,
							A.NOMPRO as nompro,
							A.RIFPRO as rifpro,
							A.NITPRO as nitpro,
							substr(A.DIRPRO,1,80) as dirpro,
							A.TELPRO as telpro,
							A.FAXPRO as faxpro,
							A.EMAIL as email,
							A.LIMCRE as lincre,
							A.CODCTA as codcta,
							A.REGMER as regmer,
							to_char(A.FECREG,'dd/mm/yyyy') as fecreg,
							A.TOMREG as tomreg,
							A.FOLREG as folreg,
							A.CAPSUS as capsus,
							A.CAPPAG as cappag,
							A.RIFREPLEG as rifrep,
							A.NOMREPLEG as nomrep,
							A.DIRREPLEG as dirrep,
							A.NUMINSCIR as numins,
							to_char(A.FECINSCIR,'dd/mm/yyyy') as fecins,
							A.NROCEI as numero,
							B.RAMART as rama,
							B.NOMRAM as nomram
						FROM CAPROVEE A ,CARAMART B
						WHERE
							A.CODRAM=B.RAMART AND
							RTRIM(A.CODPRO) >= RTRIM('".$this->codprodesde."') AND
							RTRIM(A.CODPRO) <= RTRIM('".$this->codprohasta."') AND
							RTRIM(A.RIFPRO) >= RTRIM('".$this->rifdesde."') AND
							RTRIM(A.RIFPRO) <= RTRIM('".$this->rifhasta."') AND
							RTRIM(A.CODRAM) >= RTRIM('".$this->ramodesde."') AND
							RTRIM(A.CODRAM) <= RTRIM('".$this->ramohasta."') AND
							RTRIM(A.NOMPRO) >= RTRIM('".$this->nombdesde."') AND
							RTRIM(A.NOMPRO) <= RTRIM('".$this->nombhasta."')
						ORDER BY A.CODPRO";
						//print $this->sql;
			//$this->llenartitulosmaestro();

		}

		function Header()
		{
    		$this->setTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->Line(10,35,10,160);
			$this->Line(200,35,200,160);
			$this->Line(10,160,200,160);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			while(!$tb->EOF)
			{
				 $this->setTextColor(0,0,0);
				 $this->setFont("Arial","B",9);
				 $this->setTextColor(0,0,255);
				 $this->cell(25,5,'DATOS DEL PROVEEDOR');
				 $this->setTextColor(0,0,0);
			     $this->ln(5);
				 $this->cell(15,10,'Código:');
				 $this->setFont("Arial","",9);
				 $this->cell(20,10,$tb->fields["codpro"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(10,10,'RIF:');
				 $this->setFont("Arial","",9);
				 $this->cell(30,10,$tb->fields["rifpro"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(10,10,'NIT:');
				 $this->setFont("Arial","",9);
				 $this->cell(45,10,$tb->fields["nitpro"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(40,10,'Fecha de Inscripción:');
				 $this->setFont("Arial","",9);
				 $this->cell(30,10,$tb->fields["fecins"]);
				 $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(20,10,'Nombre:');
				 $this->setFont("Arial","",9);
				 $this->cell(50,10,$tb->fields["nompro"]);
				 $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(15,10,'Telefono:');
				 $this->setFont("Arial","",9);
				 $this->cell(50,10,$tb->fields["telpro"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(10,10,'Fax:');
				 $this->setFont("Arial","",9);
				 $this->cell(30,10,$tb->fields["faxpro"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(10,5,'Email:');
				 $this->setFont("Arial","",9);
				 $this->multicell(75,5,$tb->fields["email"]);
				 $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(20,10,'Dirección:');
				 $this->setFont("Arial","",9);
				 $this->cell(70,10,$tb->fields["dirpro"]);
				 $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(15,10,'SNC:');
				 $this->setFont("Arial","",9);
				 $this->cell(50,10,$tb->fields["numero"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(30,10,'Cuenta Contable:');
				 $this->setFont("Arial","",8);
				 $this->cell(25,10,$tb->fields["codcta"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(30,10,'Limite de Crédito:');
				 $this->setFont("Arial","",9);
				 $this->cell(20,10,$tb->fields["lincre"]);
				 $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(23,10,'Código Ramo:');
				 $this->setFont("Arial","",9);
				 $this->cell(20,10,$tb->fields["rama"]);
				 $this->setxy(60,$this->gety()+2);
				 $this->multicell(140,5,$tb->fields["nomram"]);
				 $this->Line(10,$this->gety()+3,200,$this->gety()+3);
				 $this->ln(3);
				 $this->setFont("Arial","B",9);
				 $this->setTextColor(0,0,255);
				 $this->cell(50,10,'DATOS DEL REPRESENTANTE LEGAL');
				 $this->setTextColor(0,0,0);
			     $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(20,10,'Nombre:');
				 $this->setFont("Arial","",9);
				 $this->cell(60,10,$tb->fields["nomrep"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(20,10,'Cédula/Rif:');
				 $this->setFont("Arial","",9);
				 $this->cell(25,10,$tb->fields["rifrep"]);
				 $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(25,10,'Dirección:');
				 $this->setFont("Arial","",9);
				 $this->cell(70,10,$tb->fields["dirrep"]);
				 $this->ln(5);
				 $this->Line(10,$this->gety()+3,200,$this->gety()+3);
 				 $this->setFont("Arial","B",9);
				 $this->setTextColor(0,0,255);
				 $this->cell(50,10,'DATOS DEL REGISTRO MERCANTIL');
				 $this->setTextColor(0,0,0);
			     $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(30,10,'Registro Mercantil:');
				 $this->setFont("Arial","",9);
				 $this->cell(50,10,$tb->fields["regmer"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(30,10,'Fecha de Registro:');
				 $this->setFont("Arial","",9);
				 $this->cell(25,10,$tb->fields["fecreg"]);
				 $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(30,10,'Tomo del Registro:');
				 $this->setFont("Arial","",9);
				 $this->cell(50,10,$tb->fields["tomreg"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(30,10,'Folio del Registro:');
				 $this->setFont("Arial","",9);
				 $this->cell(25,10,$tb->fields["folreg"]);
				 $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(30,10,'Capital Suscrito:');
				 $this->setFont("Arial","",9);
				 $this->cell(50,10,$tb->fields["capsus"]);
				 $this->setFont("Arial","B",9);
				 $this->cell(30,10,'Capital Pagado:');
				 $this->setFont("Arial","",9);
				 $this->cell(25,10,$tb->fields["cappag"]);
				 $this->ln(5);
				 $this->Line(10,$this->gety()+3,200,$this->gety()+3);
 				 $this->setFont("Arial","B",9);
				 $this->setTextColor(0,0,255);
				 $this->cell(50,10,'DOCUMENTOS CONSIGNADOS');
				 $this->setTextColor(0,0,0);
			     $this->ln(5);
				 $this->setFont("Arial","B",9);
				 $this->cell(40,10,'Código');
				 $this->cell(40,10,'Documento');
				 $this->cell(40,10,'Fecha Emisión');
				 $this->cell(40,10,'Fecha Vencimiento');
				 $this->setFont("Arial","",9);
				 $this->ln(5);
				 $a=$this->bd->select("SELECT B.CODREC, C.DESREC FROM  CARECPRO B, CARECAUD C WHERE B.CODREC=C.CODREC AND B.CODPRO='".$tb->fields["codpro"]."' ORDER BY C.CODREC");
				 while(!$a->EOF)
				 {
				 	$this->cell(40,10,$a->fields["codrec"]);
				 	$this->cell(40,10,$a->fields["desrec"]);
					$this->ln(3);
					$a->MoveNext();
				 }
				$tb->MoveNext();
			    $this->ln(250);
			}
		}
	}
?>
