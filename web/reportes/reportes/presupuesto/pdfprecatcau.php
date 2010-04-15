<?
require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Precatcau.class.php");

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
	var $tipcau1;
	var $tipcau2;
	var $comodin;

	function pdfreporte()
	{
		$this->fpdf("l","mm","Letter");
		$this->bd=new basedatosAdo();
		$this->titulos=array();
		$this->titulos2=array();
		$this->campos=array();
		$this->anchos=array();
		$this->anchos2=array();
		$this->tipcau1=H::GetPost("tipcau1");
		$this->tipcau2=H::GetPost("tipcau2");
        $this->precatcau= new Precatcau();
        $this->arrp=$this->precatcau->sqlp($this->tipcau1,$this->tipcau2);
		$this->llenartitulosmaestro();

	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="Codigo";
	 $this->titulos[1]="Descripción";
	 $this->titulos[2]="Abrev.";
	 $this->titulos[3]="Refiere a ";
	 $this->titulos[4]="Afecta Precompromiso";
	 $this->titulos[5]="Afecta Compromiso";
	 $this->titulos[6]="Afecta Causado";
	 $this->titulos[7]="Afecta Disponibilidad";
	 $this->anchos[0]=25;
	 $this->anchos[1]=55;
	 $this->anchos[2]=20;
	 $this->anchos[3]=25;
	 $this->anchos[4]=38;
	 $this->anchos[5]=35;
	 $this->anchos[6]=30;
	 $this->anchos[7]=30;
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
	 $this->Line(10,45,270,45);
 	 $this->ln(5);
	}

	function Cuerpo()
	{
	 $this->setFont("Arial","B",8);
	 $ref="";
	 foreach($this->arrp as $datos)
	 {
	  $this->setFont("Arial","",8);
	  $this->cell($this->anchos[0],3,$datos["tipo"]);
	  $x = $this->GetX();
	  $this->cell($this->anchos[1]);
	  $this->cell($this->anchos[2],3,$datos["abrev"]);
	  $this->cell($this->anchos[3],3,$datos["refier"]);
	  $this->cell($this->anchos[4],3,$datos["afeprc"]);
	  $this->cell($this->anchos[5],3,$datos["afecom"]);
	  $this->cell($this->anchos[6],3,$datos["afecau"]);
	  $this->cell($this->anchos[7],3,$datos["afedis"]);
	  $this->SetX($x);
	  $this->MultiCell($this->anchos[1],3,$datos["nombre"]);
	  $this->ln(2);
	 }
	}
	}
?>