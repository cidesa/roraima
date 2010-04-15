<?
require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Precatpar.class.php");


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
	var $codpre1;
	var $codpre2;
	var $comodin;
	var $conf;

	function pdfreporte()
	{
		$this->conf="p";
		$this->fpdf($this->conf,"mm","Letter");
		$this->bd=new basedatosAdo();
		$this->titulos=array();
		$this->titulos2=array();
		$this->campos=array();
		$this->anchos=array();
		$this->anchos2=array();
		$this->codpre1=H::GetPost("codpre1");
		$this->codpre2=H::GetPost("codpre2");
		$this->comodin=H::GetPost("comodin");
        $this->precatpar= new Precatpar();
		$this->arrp=$this->precatpar->sqlp($this->codpre1,$this->codpre2,$this->comodin);
		$this->llenartitulosmaestro();

	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="Codigo Presupuestario";
	 $this->titulos[1]="Descripción";
	 $this->titulos[2]="Cuenta Contable";
	 $this->anchos[0]=60;
	 $this->anchos[1]=95;
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
	 for($i=0;$i<$ncampos;$i++)
	 {
	   $this->cell($this->anchos[$i],10,$this->titulos[$i]);
	 }
	 $this->ln(4);
	 $this->Line(10,48,200,48);
	 $this->ln(8);
	}

	function Cuerpo()
	{
	 $this->setFont("Arial","B",8);
     $ref="";
	 foreach($this->arrp as $datos)
	 {
 	  $this->setFont("Arial","",8);
	  $this->cell($this->anchos[0],4,$datos["codigo"]);
	  $x = $this->GetX();
	  $this->cell($this->anchos[1]);
	  $this->cell($this->anchos[2],4,$datos["cuenta"]);
	  $this->SetX($x);
	  $this->MultiCell($this->anchos[1]-5,4,strtoupper($datos["descripcion"]));
	 }
	 $this->ln(2);
	}
}
?>