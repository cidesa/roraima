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
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codesp1;
		var $codesp2;


		function pdfreporte()
		{
			$this->fpdf("p","mm","letter");

				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->codesp1=$_POST["cod1"];
			$this->codesp2=$_POST["cod2"];


				$this->sql= "SELECT A.CODESP,B.desesp FROM INDETESP AS A, INREGESP AS B
				WHERE RTRIM(A.CODESP) >= RTRIM('".$this->codesp1."') AND RTRIM(A.CODESP) <= RTRIM('".$this->codesp2."')
				AND RTRIM(A.CODESP) = RTRIM(B.CODESP) GROUP BY A.CODESP,B.desesp";


			$this->cab=new cabecera();
	$this->SetAutoPageBreak(true,20);

		}

		function Header()
		{


			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			/*$ncampos=count($this->titulos);
			for($i=0;$i<5;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}*/
			$this->ln();
			$this->Line(10,50,200,50);
		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		    $this->tb2=$tb;
		    $tb2=$tb;
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->SetY(35);
			$this->cell(8,5,"Al  ".date('d/m/Y'));
			$this->ln();
			$this->SetTextColor(0,0,0);
			$this->SetXY(10,45);
			$this->setFont("Arial","B",8);
			$this->cell(20,3,"Código Especie");
			$this->cell(7);
			$this->cell(60,3,"Descripcion");
			$this->cell(30,3,"Unidades Vendidas");
			$this->cell(5);
			$this->cell(35,3,"Monto Vendido");
			$this->ln(5);
			$this->setFont("Arial","",8);
			$this->codigo = $tb2->fields["codesp"];
			//$this->acum1=0;
			//$this->acum2=0;
			/*$this->cell(20,5,$tb2->fields["codesp"]);
			$y=$this->GetY();
			$x=$this->GetX();
			$this->cell(60);
			$this->SetX($x);
			$this->cell(7);
			$this->MultiCell(60,5,$tb2->fields["desesp"]);

			$this->ln();
			//$this->cantvend=0;
			//$this->monventas=0;*/

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
    						$this->cell(10,5,number_format($tb4->fields["monventas"]));
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
 		 	 $this->cell(20,3,"".number_format($this->acum2));

		}
}

?>
