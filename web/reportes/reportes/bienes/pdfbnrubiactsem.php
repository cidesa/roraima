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
			$this->fpdf("p","mm","Letter");
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

			$this->sql="SELECT c.codsem, c.dessem,
				to_char(c.feccom,'dd/mm/yyyy') as feccom,
				to_char(c.fecreg,'dd/mm/yyyy') as fecreg, trim(c.codact) as codact, b.desact,
				c.sexsem, c.razsem, c.valini, c.codubi, a.desubi
				FROM bnregsem c, bnubibie as a, bndefact as b
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
				$this->titulos[2]="F. Compra ";
				$this->titulos[3]="F. Registro ";
				$this->titulos[4]="Sexo ";
				$this->titulos[5]="Raza ";
				$this->titulos[6]="Valor Inicial ";

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

					$aux=$tb->fields["dessem"];
					$cantt=$cantt +1;
					$cant=$cant+1;
					$this->cell($this->anchos[0],5,$tb->fields["codsem"]);
					$this->cell($this->anchos[1],5," ");
					$this->cell($this->anchos[2],5,$tb->fields["feccom"]);
					$this->cell($this->anchos[3],5,$tb->fields["fecreg"]);
					$this->cell($this->anchos[4],5,$tb->fields["sexsem"]);
  					$this->cell($this->anchos[5],5,$tb->fields["razsem"]);
					$this->cell($this->anchos[6],5,number_format($tb->fields["valini"],2,'.',','));
					$this->SetX(30);
					$this->Multicell($this->anchos[1],5,$aux);
					$this->ln();
					$tb->MoveNext();
					}
					$this->setFont("Arial","",9);
					$this->setX(50);
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
				$this->setX(50);
				$this->cell(20,10," Cantidad de activos por : ".$dubi." : ".$cantt);
				$this->ln();
				}

				}//WHILE END OF FILE


			}

		}
?>