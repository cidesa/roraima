<?
require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Precatprc.class.php");

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
	var $tipcom1;
	var $tipcom2;
	var $comodin;
	var $usuario;
	var $modulo;

	function pdfreporte()
	{
	 $this->fpdf("p","mm","Letter");
	 $this->bd=new basedatosAdo();
	 $this->titulos=array();
	 $this->titulos2=array();
	 $this->campos=array();
	 $this->anchos=array();
	 $this->anchos2=array();
	 $this->tipprc1=H::GetPost("tipprc1");
	 $this->tipprc2=H::GetPost("tipprc2");
	 $this->usuario=H::GetPost("usuario");
	 $this->modulo=H::GetPost("modulo");
	 $this->precatprc= new Precatprc();
     $this->arrp=$this->precatprc->sqlp($this->tipprc1,$this->tipprc2);
	 $this->llenartitulosmaestro();
	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="Tipo Precompromiso";
	 $this->titulos[1]="Descripción";
	 $this->titulos[2]="Abrev.";
	 $this->anchos[0]=40;
	 $this->anchos[1]=120;
	 $this->anchos[2]=45;
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
	 $this->Line(10,48,270,48);
     $this->ln(9);
	}

	function Cuerpo()
	{
	 $this->setFont("Arial","B",7);
	 $ref="";
	 foreach($this->arrp as $datos)
	 {
	  $this->setFont("Arial","",8);
	  $this->cell($this->anchos[0],3,$datos["tipprc"]);
	  $x=$this->GetX();
	  $this->cell($this->anchos[1]);
	  $this->cell($this->anchos[2],3,$datos["abrev"]);
	  $this->SetX($x);
	  $this->MultiCell($this->anchos[1],3,$datos["nombre"]);
	  $this->ln(1);
	 }

	}
}
?>