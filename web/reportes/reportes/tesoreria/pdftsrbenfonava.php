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
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codesp1=$_POST["cod1"];
			$this->codesp2=$_POST["cod2"];
			$this->nom1=$_POST["nomben1"];
			$this->nom2=$_POST["nomben2"];


				$this->sql= "select a.cedrif,a.codcta,c.descta,a.nomben,
			dirben,telben,nitben,codtipben,
			CASE WHEN tipper='N' THEN 'NATURAL'	ELSE 'JURIDICA' END,
			CASE WHEN nacionalidad='V' THEN 'VENEZOLANO' ELSE 'EXTRANJERO' END,
			CASE WHEN residente='S' THEN 'SI'ELSE 'NO' END,
			CASE WHEN constituida='S' THEN 'SI' ELSE 'NO' END,
			codord,codpercon
			from opbenefi a, opbenfonava b,contabb c
			where a.cedrif=b.cedrif and
			a.codcta=c.codcta and
			a.cedrif>=rtrim('".$this->cod1."') and a.cedrif<=rtrim('".$this->codbenhas."')
			AND A.NOMBEN>=rtrim('".$this->nom1."') AND A.NOMBEN<=rtrim('".$this->NOMBENHAS."')";

			$this->cab=new cabecera();
			//$this->SetAutoPageBreak(false,32);

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
		    $tb2=$tb;
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->SetY(35);
			$this->cell(8,5,"Al  ".date('d/m/Y'));
			$this->ln();
			$this->line(10,30,200,30);
			$this->line(10,30,10,90);
			$this->line(10,90,200,90);
			$this->line(200,30,200,90);

			while(!$tb2->EOF)
			{
					$this->codigo = $tb2->fields["codesp"];
					$this->setFont("Arial","",8);
					$this->cell(20,5,$tb2->fields["codesp"]);
					$y=$this->GetY();
					$x=$this->GetX();
					$this->cell(60);
					$this->SetX($x);
					$this->cell(7);
					$this->MultiCell(60,5,$tb2->fields["desesp"]);

					if ($tb2->fields["codesp"]=$this->codigo)
						{

							$this->sql2="SELECT SUM(CANTIDAD) as CANTVEND
     									FROM INDETESP WHERE RTRIM(CODESP) = RTRIM('".$this->codigo."');";


    						$tb3=$this->bd->select($this->sql2);

    						$this->sql3="SELECT SUM(VENTA) as MONVENTAS
    									 FROM INDETESP WHERE RTRIM(CODESP) = RTRIM('".$this->codigo."');";

							$tb4=$this->bd->select($this->sql3);

							$this->SetXY(97,$y);
    						$this->cell(10,5,number_format($tb3->fields["cantvend"]));
    						$this->cell(25);
    						$this->cell(10,5,number_format($tb4->fields["monventas"],2,',','.'));
    						$this->acum1=($this->acum1+$tb3->fields["cantvend"]);
    						$this->acum2=($this->acum2+$tb4->fields["monventas"]);
    						$this->ln();

						}

				$tb2->MoveNext();
				$yy=$this->GetY();
				if ($yy>=170)
				{
					$this->AddPage();
				}

			}
			 $this->SetLineWidth(0.3);
 		 	 $this->setFont("Arial","",8);
 		 	 $this->line(10,$yy,200,$yy);
 		 	 $this->ln();
 		 	 $this->SetX(75);
 		 	 $this->cell(22,3,"TOTALES");
 		 	 $this->cell(20,3,"".number_format($this->acum1));
 		 	 $this->cell(15);
 		 	 $this->cell(20,3,"".number_format($this->acum2,2,',','.'));

		}
}

?>