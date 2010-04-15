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
		var $ubides;
		var $ubihas;
		var $actdes;
		var $acthas;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->ubides=$_POST["ubides"];
			$this->ubihas=$_POST["ubihas"];
			$this->actdes=$_POST["actdes"];
			$this->acthas=$_POST["acthas"];

			$this->sql="SELECT c.CODMUE, c.DESMUE, c.ORDCOM,
				to_char(c.feccom,'dd/mm/yyyy') as feccom,
				to_char(c.fecreg,'dd/mm/yyyy') as fecreg, trim(c.codact) as codact, b.desact,
				c.marmue, c.sermue, c.viduti, c.valini, c.stamue, c.codubi, a.desubi
				FROM bnregmue c, bnubibie as a, bndefact as b
				whERE RTRIM(c.codubi) >= RTRIM('".$this->ubides."') AND
				RTRIM(c.CODUBI) <= RTRIM('".$this->ubihas."') and
 				rtrim(c.codact)>= rtrim('".$this->actdes."') and
 				rtrim(c.codact)<= rtrim ('".$this->acthas."') and
 				c.codubi=a.codubi and
 				c.codact=b.codact ORDER BY c.codubi, c.codact";


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código ";
				$this->titulos[1]="Descripción";
				$this->titulos[2]="O/C ";
				$this->titulos[3]="Fecha ";
				$this->titulos[4]="F. Registro ";
				$this->titulos[5]="Marca ";
				$this->titulos[6]="Serial ";
				$this->titulos[7]="Vida Util ";
				$this->titulos[8]="Valor Inicial ";
				$this->titulos[9]="Status ";

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

		//	$this->Line(10,50,200,50);
		}



		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		// print $this->sql;
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

			$this->setFont("Arial","",10);
			$ubi=$tb->fields["codubi"];
			$dubi=$tb->fields["desubi"];
			$this->cell(100,5,'Ubicación: '.$tb->fields["codubi"].'  '.$tb->fields["desubi"]);
			$this->ln();
			$this->setFont("Arial","",8);
			$cantt=0;

			while(!$tb->EOF)
			{
				if ($ubi==$tb->fields["codubi"])
				{
					$this->setFont("Arial","",10);
					$act=$tb->fields["codact"];
					$dact=$tb->fields["desact"];
					$cant=0;
					$this->cell(100,5,'Activos: '.$tb->fields["codact"].'  '.$tb->fields["desact"]);
					$this->ln();
					$this->setFont("Arial","",8);
					while ($act==$tb->fields["codact"])
					{

					$aux=$tb->fields["desmue"];
					$cantt=$cantt +1;
					$cant=$cant+1;
					$this->cell($this->anchos[0],5,$tb->fields["codmue"]);
					$this->cell($this->anchos[1],5," ");
					$this->cell($this->anchos[0],5,$tb->fields["ordcom"]);
					$this->cell($this->anchos[0],5,$tb->fields["feccom"]);
					$this->cell($this->anchos[0],5,$tb->fields["fecreg"]);
					$this->cell($this->anchos[0],5,$tb->fields["marmue"]);
					$this->cell($this->anchos[0]+10,5,$tb->fields["sermue"]);
					$this->cell($this->anchos[0]-10,5,$tb->fields["viduti"]);
					$this->cell($this->anchos[0],5,number_format($tb->fields["valini"],2,'.',','));
					$this->cell($this->anchos[0],5,$tb->fields["stamue"]);
					$this->SetX(30);
					$this->Multicell($this->anchos[1],5,$aux);
					$this->ln();
					$tb->MoveNext();
					}
					$this->setFont("Arial","",9);
					$this->setX(100);
					$this->cell(20,10," Cantidad de : ".$dact." : ".$cant);
					$this->ln();
				}
				else
					{
					$this->setFont("Arial","",10);
					$ubi=$tb->fields["codubi"];
					$dubi=$tb->fields["desubi"];
					$cantt=0;
					$this->cell(100,5,'Ubicación: '.$tb->fields["codubi"].'  '.$tb->fields["desubi"]);
					$this->ln();
					$this->setFont("Arial","",8);
					}

				if ($cantt!=0)
				{
				$this->setFont("Arial","",9);
				$this->setX(100);
				$this->cell(20,10," Cantidad de activos por : ".$dubi." : ".$cantt);
				$this->ln();
				}

				}//WHILE END OF FILE


			}

		}
?>