<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

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
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];


			$this->sql="select a.cedrif, rtrim(a.nomben) as nomben, a.dirben, a.telben, a.codcta, a.nitben, b.descta as bdescta
					from opbenefi a, contabb b
					where (a.codcta=b.codcta) and
					(a.cedrif >='".$this->cod1."') and (a.cedrif <= '".$this->cod2."')
					order by cedrif,nomben";


			$this->llenartitulosmaestro();
			$this->llenar2();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Cedula/RIF";
				$this->titulos[1]="    NIT";
				$this->titulos[2]=" Nombre Beneficiario";
				$this->titulos[3]="                  Telefono";
				$this->titulos[4]="       Cuenta Contable";
		}
		function llenar2()
		{
				$this->titulos2[0]="";
				$this->titulos2[1]="                   Beneficiario";
				$this->titulos2[2]="           Codigo";
				$this->titulos2[3]="         Nombre";
		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
			}
			$this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],5,$this->titulos2[$i]);
			}
			$this->ln();
			$this->Line(10,50,200,50);
			$this->ln();

		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",6);
			$ncampos=count($this->titulos);

			while (!$tb->EOF)
			{
				$Y= $this->GetY();
				if ($Y>=240) {
					$this->AddPage();
					$Y = 55;
				}
				$this->SetY($Y);
				$this->cell($this->anchos[0],3,$tb->fields["cedrif"]);
				$this->cell($this->anchos[1]+1,3,substr($tb->fields["nitben"],0,60));
				$this->Multicell($this->anchos[2]+15,3,substr($tb->fields["nomben"],0,45),0,'L',0);
				$this->SetXY($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+20,$Y);
				$this->cell($this->anchos[3]-25,3,$tb->fields["telben"]);
				$this->SetXY($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+$this->anchos[3],$Y);
				$this->cell($this->anchos[4]-3,3,$tb->fields["codcta"]);
				$this->Multicell(80,3,substr($tb->fields["bdescta"],0,50),0,'L',0);
				$this->ln();
				$tb->MoveNext();
			}
$this->bd->closed();
		}

	}


?>
