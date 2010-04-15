<?
require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/contabilidad/Concatcue.class.php");
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
	var $filtro;
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
	 $this->cod1=H::GetPost("cod1");
	 $this->cod2=H::GetPost("cod2");
	 $this->filtro=H::GetPost("filtro");
     $this->concatue= new Concatcue();
     $this->arrp=$this->concatue->sqlp($this->cod1,$this->cod2,$this->filtro);
	 $this->llenartitulosmaestro();
	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="CODIGO. CUENTA";
	 $this->titulos[1]="DESCRIPCION";
	 //$this->titulos[2]="SALDO";
	 $this->titulos[2]="CARGABLE";
	 $this->anchos[0]=40;
	 $this->anchos[1]=90;
	 //$this->anchos[2]=30;
	 $this->anchos[2]=40;

	}

	function Header()
	{
	 $dir = parse_url($_SERVER["HTTP_REFERER"]);
	 $parte = explode("/",$dir["path"]);
	 $ubica = count($parte)-2;
	 $this->getCabecera(H::GetPost("titulo"),"");
	 $this->setFont("Arial","B",9);
	 $ncampos=count($this->titulos);
	 $ncampos2=count($this->titulos2);
	 for($i=0;$i<$ncampos;$i++)
	 {
		$this->cell($this->anchos[$i],10,$this->titulos[$i]);
	 }
	 $this->ln();
	 $this->ln();
	 $this->Line(10,47,200,47);
	 $this->ln(-8);
	}

	function Cuerpo()
	{
     $this->setFont("Arial","",7);
	 $ncampos=count($this->titulos);
  	 foreach($this->arrp as $datos)
     {
	  $this->cell($this->anchos[0],5,$datos["codcta"]);
	  //$this->Setx(150);
	  //$this->cell($this->anchos[2],5,H::FormatoMonto($datos["salant"]));
	  $this->Setx(140);
	  $this->cell($this->anchos[2],5,"          ".$datos["cargable"]);
	  $this->Setx(50);
	  $this->multicell(130,3,$datos["descta"],0,100);
	   $this->ln(4);
	}
   }
}
?>
