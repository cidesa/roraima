<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum=0;
		var $result=0;
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
		var $codubi;
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;
		var $numord1;
		var $numord2;
		var $cedrif1;
		var $cedrif2;
		var $fecdis1;
		var $fecdis2;
		var $numcue1;
		var $numcue2;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numord1=$_POST["numord1"];
			$this->numord2=$_POST["numord2"];
			$this->cedrif1=$_POST["cedrif1"];
			$this->cedrif2=$_POST["cedrif2"];
			$this->fecdis1=$_POST["fecdis1"];
			$this->fecdis2=$_POST["fecdis2"];
			$this->numcue1=$_POST["numcue1"];
			$this->numcue2=$_POST["numcue2"];


				$this->sql= "SELECT A.NUMORD,A.NUMORD2,to_char(A.FECEMI,'dd/mm/yyyy') as afecemi,
						A.CEDRIF,A.DESORD,A.CTABAN,A.MONORD-A.MONRET as MONORD,
						SUBSTR(A.CODUNI,1,2) as SECTOR,SUBSTR(A.CODUNI,4,2) as PROGRAMA,
						SUBSTR(A.CODUNI,10,2) as ACTIVIDAD,B.NOMBEN,C.DESENL
						FROM OPORDPAG A,OPBENEFI B,TSDEFBAN C
						WHERE A.CEDRIF= B.CEDRIF AND A.CTABAN   = C.NUMCUE AND
						A.STATUS = 'N'  AND coalesce(A.MONPAG,0)=0 AND A.NUMORD>=('".$this->numord1."')
						AND A.NUMORD<=('".$this->numord2."') AND A.CTABAN>=('".$this->numcue1."') AND
						A.CTABAN<=('".$this->numcue2."') AND A.CEDRIF >=('".$this->cedrif1."') AND
						A.CEDRIF <=('".$this->cedrif2."') AND A.FECEMI >= to_date('".$this->fecdis1."','dd/mm/yyyy') AND
						A.FECEMI <= to_date('".$this->fecdis2."','dd/mm/yyyy') ORDER BY A.NUMORD2";




			//$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(false,32);

		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$titulo1="SECRETARIA DE ADMINISTRACION";
			$titulo2="              Y FINANZAS";
			$titulo3="DIRECCION DE FINANZAS Y TESORERIA";
			$this->cell(10,3,$titulo1);
			$this->ln();
			$this->cell(10,3,$titulo2);
			$this->ln();
			$this->cell(10,3,$titulo3);
			$this->Line(10,62,270,62);
		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$this->SetTextColor(0,0,128);
			$this->ln(8);
			$this->cell(20,3,$_POST["fecdis1"]);
			$this->cell(10,3,"Al");
			$this->cell(20,3,$_POST["fecdis2"]);
			$this->ln(6);
			$this->SetTextColor(0,0,0);
			$this->cell(45,3,"Número de Orden");
			$this->cell(40,3,"Beneficiario");
			$this->cell(30,3,"Banco");
			$this->cell(40,3,"Número Cuenta");
			$this->cell(20,3,"Monto Orden");
			$this->cell(20,3,"Sector");
			$this->cell(20,3,"Prog.");
			$this->cell(17,3,"Activ.");
			$this->cell(20,3,"Detalle de la Orden");
			$acum1=0;

			while(!$tb->EOF)
			{

				$this->SetX(10);
				$this->setFont("Arial","",8);
				$this->cell(45,5,$tb->fields["numord2"]);
				$x=$this->GetX();
				$this->cell(40);
				//$this->cell(20,5,$tb->fields["nomben"]);
				$this->cell(30,5,$tb->fields["desenl"]);
				$this->cell(40,5,$tb->fields["ctabanc"]);
				$x1=$this->GetX();
				$this->cell(20,5,$tb->fields["monord"]);
				$this->acum1=($this->acum1+$tb->fields["monord"]);
				$this->cell(20,5,$tb->fields["sector"]);
				$this->cell(20,5,$tb->fields["programa"]);
				$this->cell(17,5,$tb5->fields["actividad"]);
				$this->cell(20,5,$tb->fields["desord"]);
				$this->MultiCell(40,3,$tb->fields["nomben"]);
				$y1=$this->GetY();
				$this->ln(10);
				$y=$this->GetY();
				$tb->MoveNext();
				if ($y>=170)
				{
					$this->AddPage();
				}


			}
				//$this->SetY($y1);
				//$this->line(10,$y1+3,270,$y1+3);
				//$this->SetXY($x1,$y1+3);
				$this->SetX(130);
				$this->cell(25,30,"TOTAL MONTO ORDEN: ");
				$this->ln(13);
				$this->SetX(165);
				$this->cell(20,3,"".number_format($this->acum1));
				//$this->cell();
		}


	}
?>