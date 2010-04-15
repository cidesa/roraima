<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $acum=0;
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
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;
		var $numdis1;
		var $numdis2;
		var $fecreg1;
		var $fecreg2;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codact1=$_POST["cat1"];
			$this->codact2=$_POST["cat2"];
			$this->codmue1=$_POST["cat3"];
			$this->codmue2=$_POST["cat4"];
			$this->coddis1=$_POST["cat5"];
			$this->coddis2=$_POST["cat6"];
			$this->fecdis1=$_POST["cat7"];
			$this->fecdis2=$_POST["cat8"];
			$this->tipdisinm1=$_POST["cat9"];
			$this->tipdisinm2=$_POST["cat10"];
			$this->codubi1=$_POST["cat11"];
			$this->codubi2=$_POST["cat12"];

			$this->prenom=$_POST["prenom"];
			$this->precar=$_POST["precar"];
			$this->confnom=$_POST["confnom"];
			$this->confcar=$_POST["confcar"];
			$this->apronom=$_POST["apronom"];
			$this->aprocar=$_POST["aprocar"];




				$this->sql="SELECT A.CODACT as acodact,A.CODMUE as acodmue,B.DESINM as adesinm,A.NRODISINM as anrodisinm,A.MONDISINM as amondisinm,A.TIPDISINM as atipdisinm,
							A.FECDISINM as afecdisinm,A.FECDEVDIS as afecdevdis,A.MONDISINM as amondisinm,A.DETDISINM as adetdisinm,
							A.CODUBIORI as acodubiori,A.CODUBIDES as acodubides,A.OBSDISINM as aobsdisinm FROM BNDISINM A, BNREGINM B
							WHERE RTRIM(A.CODACT)=RTRIM(B.CODACT) AND RTRIM(A.CODMUE)=RTRIM(B.CODINM) AND
							RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND
							RTRIM(A.NRODISINM) >= RTRIM('".$this->coddis1."') AND RTRIM(A.NRODISINM) <= RTRIM('".$this->coddis2."') AND
							A.CODACT >= '".$this->codact1."' AND A.CODACT <= '".$this->codact2."'";

			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO DEL ACTIVO";
				$this->titulos[1]="CODIGO DEL MUEBLE";
				$this->titulos[2]="DESCRIPCION";
				$this->titulos[3]="Nro DISPOSICION�";
				$this->titulos[4]="FECHA DISP INM�";
				$this->titulos[5]="FECHA DEV INM�";
		}
		function llenartitulosdetalle()
		{
				$this->titulos2[0]="�";
				$this->titulos2[1]="�";
				$this->titulos2[2]="�";
				$this->titulos2[3]="�";
				$this->titulos2[4]="�";
				$this->titulos2[5]="�";
		}



		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln();
			$this->Line(10,55,270,55);
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

//			if(!$tb->EOF)
	//		{
			while(!$tb->EOF)
			{

				$this->setFont("Arial","",8);
				 $this->cell($this->anchos[0],7,$tb->fields["acodact"]);
				 $this->cell($this->anchos[1],7,$tb->fields["acodmue"]);
				 $this->cell($this->anchos[2],7,substr($tb->fields["adesinm"],0,40));
				 $this->cell($this->anchos[3],7,$tb->fields["anrodisinm"]);
				 $this->cell($this->anchos[4],7,$tb->fields["afecdisinm"]);
				 $this->cell($this->anchos[4],7,$tb->fields["afecdevdis"]);
			 	 $this->ln();
				 $aux=$tb->fields["adetdisinm"];
				 $this->cell($this->anchos2[0],7,substr($aux,0,20));
				 $this->cell($this->anchos2[1],7,$tb->fields["amondisinm"]);
				 $this->cell($this->anchos2[2],7,$tb->fields["acodubiori"]);
				 $this->cell($this->anchos2[3],7,$tb->fields["acodubides"]);
				 $this->cell($this->anchos2[4],7,$tb->fields["aobsdisinm"]);
				 $this->acum=($this->acum+$tb->fields["amondisinm"]);
				 $this->ln();
				$tb->MoveNext();
				}
								$this->setFont("Arial","B",8);
				$this->cell(20,10,"                                                Total General     ".number_format($this->acum,2,'.',''));
		//	}
		}
	}
?>