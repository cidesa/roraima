<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
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
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];



				$this->sql="SELECT RTRIM(A.CODACT) as acodact, A.CODMUE as acodmue, A.DESMUE as adesmue, A.FECCOM as afeccom,
							to_char(A.FECREG,'dd/mm/yyyy') as afecreg, to_char(A.FECEXP,'dd/mm/yyyy') as afecexp, A.VALINI as avalini,
							A.DEPMEN as adepmen,A.VIDUTI as aviduti, A.MESDEP as amesdep, A.DEPACU as adepacu, (A.VALINI-A.DEPACU) as aresult
							FROM BNREGMUE A WHERE
							RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND
							RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') AND
							RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND
							RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND A.STAMUE='A' and
							A.feccom>=to_date('".$this->fecha1."','dd/mm/yyyy') and A.feccom<=to_date('".$this->fecha2."','dd/mm/yyyy')
							ORDER BY A.CODACT,  A.CODMUE";

//print $this->sql;exit;



			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,15);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código del Activo";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="Monto Compra";
				$this->titulos[3]="Fecha Calculo";
				$this->titulos[4]="Fecha Exp.";
				$this->titulos[5]="Vida Util";
				$this->titulos[6]="Meses Dep.";
				$this->titulos[7]="Deprec. Acu.";
				$this->titulos[8]="Valor Neto";
				$this->titulos[9]="Monto Dep.";

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
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
			$this->Line(10,50,270,50);
		}



		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);


			while(!$tb->EOF)
			{

		 		 $this->setFont("Arial","",8);
				 $aux=$tb->fields["adesmue"];
				 $this->cell($this->anchos[0],7,$tb->fields["acodact"]."-".$tb->fields["acodmue"]);
				 $this->cell($this->anchos[1],7,"                          ");
				 $this->cell($this->anchos[2],7,number_format($tb->fields["avalini"],2,'.',','),0,0,'C');
				 $this->cell($this->anchos[3],7,$tb->fields["afecreg"]);
				 $this->cell($this->anchos[4],7,$tb->fields["afecexp"]);
				 $this->cell($this->anchos[5]+3,7,$tb->fields["aviduti"]);
				 $this->cell($this->anchos[6],7,number_format($tb->fields["amesdep"],2,'.',','),0,0,'C');
				 $this->cell($this->anchos[7],7,number_format($tb->fields["adepacu"],2,'.',','),0,0,'C');
				 $this->cell($this->anchos[8],7,number_format($tb->fields["aresult"],2,'.',','),0,0,'C');
				 $this->cell($this->anchos[9],7,$tb->fields["adepmen"]);
				 $this->SetX(50);
				 $this->multicell(30,5,$aux);

				 $this->acum1=($this->acum1+$tb->fields["avalini"]);
				 $this->acum2=($this->acum2+$tb->fields["adepacu"]);
				 $this->acum3=($this->acum3+$tb->fields["aresult"]);
				 $this->acum4=($this->acum4+$tb->fields["adepmen"]);
				 $this->ln();
				 $tb->MoveNext();
				}

				$this->setFont("Arial","B",8);
     			$this->Line(85,$this->GetY(),270,$this->GetY());
				$this->cell(20,10,"                                                                              Totales     ".number_format($this->acum1,2,'.',''));
				$this->cell(20,10,"                                                                                                                                                                                                                   ".number_format($this->acum2,2,'.',''));
				$this->cell(20,10,"                                                                                                                                                                                                                        ".number_format($this->acum3,2,'.',''));
				$this->cell(20,10,"                                                                                                                                                                                                                                      ".number_format($this->acum4,2,'.',''));


		}


	}
?>