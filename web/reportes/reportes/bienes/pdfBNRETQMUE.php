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



				$this->sql="SELECT A.CODUBI as acodubi, SUBSTR(A.CODACT,1,10) as acodact, A.CODMUE as acodmue, A.DESMUE as adesmue,
							B.DESUBI as adesubi FROM BNREGMUE A,BNUBIBIE B WHERE
							RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND
							RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') AND
							RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND
							RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND A.STAMUE!='a' AND
							RTRIM(A.CODUBI) = RTRIM(B.CODUBI) ORDER BY A.CODACT,  A.CODMUE";


			$this->SetAutoPageBreak(true,32);

		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
            $x=50;
            $y=11;

			while(!$tb->EOF)
			{

		 		 $this->setFont("Arial","",8);
				 $aux=$tb->fields["adesmue"];
				 $this->ln();
		  	     $this->cell(20,4," ".$tb->fields["acodact"]."-".$tb->fields["acodmue"]);
				 $this->ln();
				 $this->cell(20,4," ".substr($aux,0,20));
				 $this->ln();
				 $this->ln();
				 $this->cell(18,4," Ubicación");
		 		 $this->setFont("Arial","",8);
				 $this->cell(18,4,$tb->fields["acodubi"]);
				 $this->ln();  $this->Image("../../img/logo_1.jpg",$x,$y,18);
				 $this->Line(10,$this->GetY()-16,69,$this->GetY()-16);
 		  	     $this->Line(10,$this->GetY(),69,$this->GetY());
				 $this->Line(10,$this->GetY()-4,49,$this->GetY()-4);
 		  	     $this->Line(10,$this->GetY()-16,10,$this->GetY());
				 $this->Line(69,$this->GetY()-16,69,$this->GetY());
				 $this->Line(49,$this->GetY()-16,49,$this->GetY());
				 $y=$this->GetY()+5;
				 if ($this->GetY()>230){ $this->addpage();   $y=11+5;}
				 $tb->MoveNext();
				}

		}


	}
?>