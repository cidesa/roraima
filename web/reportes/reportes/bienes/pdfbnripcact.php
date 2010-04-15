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
			$this->anoipc1=$_POST["anoipc1"];
			$this->anoipc2=$_POST["anoipc2"];


				$this->sql= "SELECT A.ANOIPC,A.IPCENE,A.IPCFEB,A.IPCMAR,
				A.IPCABR,A.IPCMAY,A.IPCJUN,A.IPCJUL,A.IPCAGO,A.IPCSEP,
				A.IPCOCT,A.IPCNOV,A.IPCDIC,A.STAIPC FROM BNIPCACT A
				WHERE RTRIM(A.ANOIPC) >= RTRIM('".$this->anoipc1."') AND
				RTRIM(A.ANOIPC) <= RTRIM('".$this->anoipc2."') ORDER BY A.ANOIPC";




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
			/*$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln();*/
			$this->Line(10,50,270,50);
		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$this->SetXY(10,45);
			$this->cell(25,3,"AÑO");
			$this->SetXY(35,45);
			$this->cell(25,3,"Ene.");
			$this->SetXY(50,45);
			$this->cell(25,3,"Feb.");
			$this->SetXY(70,45);
			$this->cell(25,3,"Mar.");
			$this->SetXY(90,45);
			$this->cell(25,3,"Abr.");
			$this->SetXY(110,45);
			$this->cell(25,3,"May.");
			$this->SetXY(130,45);
			$this->cell(25,3,"Jun.");
			$this->SetXY(150,45);
			$this->cell(25,3,"Jul.");
			$this->SetXY(170,45);
			$this->cell(25,3,"Ago.");
			$this->SetXY(190,45);
			$this->cell(25,3,"Sep.");
			$this->SetXY(210,45);
			$this->cell(25,3,"Oct.");
			$this->SetXY(230,45);
			$this->cell(25,3,"Nov.");
			$this->SetXY(250,45);
			$this->cell(25,3,"Dic.");
			$this->ln(10);


			while(!$tb->EOF)
			{

				$this->SetX(10);
				$this->setFont("Arial","",8);
				$this->cell(20,5,$tb->fields["anoipc"]);
				$this->cell(20,5,$tb->fields["ipcene"]);
				$this->cell(20,5,$tb->fields["ipcfeb"]);
				$this->cell(20,5,$tb->fields["ipcmar"]);
				$this->cell(20,5,$tb->fields["ipcabr"]);
				$this->cell(20,5,$tb->fields["ipcmay"]);
				$this->cell(20,5,$tb->fields["ipcjun"]);
				$this->cell(20,5,$tb5->fields["ipcago"]);
				$this->cell(20,5,$tb->fields["ipcsep"]);
				$this->cell(20,5,$tb->fields["ipcoct"]);
				$this->cell(20,5,$tb->fields["ipcnov"]);
				$this->cell(20,5,$tb->fields["ipcdic"]);
				$this->ln(10);
				$y=$this->GetY();
				$tb->MoveNext();
				if ($y>=170)
				{
					$this->AddPage();
				}


				}
		}


	}
?>