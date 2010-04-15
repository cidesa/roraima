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
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codact1=$_POST["codact1"];
			$this->codact2=$_POST["codact2"];
			$this->codmue1=$_POST["codmue1"];
			$this->codmue2=$_POST["codmue2"];





				$this->sql="SELECT SUBSTR(A.CODACT,1,10) as acodact,A.CODMUE as acodmue,generar_descripcion(a.CODMUE) as adesmue,A.VALINI as avalini,A.VIDUTI as aviduti,A.VALREX as avalrex,A.STAMUE as astamue
						FROM BNREGMUE A WHERE RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') AND
						RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') ORDER BY A.CODMUE, A.CODACT";
	 //print $this->sql;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO DEL ACTIVO";
				$this->titulos[1]="DESCRIPCION";
				$this->titulos[2]="MONTO REVALORIZADO";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
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
			$this->Line(10,50,200,50);
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
				 $aux=$tb->fields["adesmue"];
				 $this->cell($this->anchos[0]-13,4,$tb->fields["acodact"]."-".$tb->fields["acodmue"]);
				 $this->cell($this->anchos[1]+30,4,substr($aux,0,65));
				 $this->cell($this->anchos[2],4,$tb->fields["avalrex"]);
				 $this->acum=($this->acum+$tb->fields["avalrex"]);
				 $this->ln();
				 $tb->MoveNext();
				}
				$this->setFont("Arial","B",8);
				$this->cell(20,10,"                                                                                                                                                                              Totales      ������  ".number_format($this->acum,2,'.',''));

		//	}
		}

	}
?>