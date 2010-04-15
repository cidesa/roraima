<?
require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Cabecera.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/modelo/sqls/presupuesto/Precatpag.class.php");

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
	var $tippag1;
	var $tippag2;
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
		$this->tippag1=H::GetPost("tippag1");
		$this->tippag2=H::GetPost("tippag2");
		$this->precatpag= new Precatpag();
        $this->arrp=$this->precatpag->sqlp($this->tippag1,$this->tippag2);
		$this->llenartitulosmaestro();
	}

	function llenartitulosmaestro()
	{
		$this->titulos[0]="Tipo";
		$this->titulos[1]="Descripcion";
		$this->titulos[2]="Abrev.";
		$this->titulos[3]="Ref.Causado";
		$this->titulos[4]="Afecta Precompromiso";
		$this->titulos[5]="Afecta Compromiso";
		$this->titulos[6]="Afecta Causado";
		$this->titulos[7]="Afecta Pagado";
		$this->titulos[8]="Afecta Disponibilidad";
		$this->anchos[0]=14;
		$this->anchos[1]=45;
		$this->anchos[2]=20;
		$this->anchos[3]=22;
		$this->anchos[4]=38;
		$this->anchos[5]=33;
		$this->anchos[6]=27;
		$this->anchos[7]=27;
		$this->anchos[8]=30;
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
	 $this->cell($this->anchos[7],3,$datos["afepag"]);
	 $this->cell($this->anchos[8],3,$datos["afedis"]);
	 $this->SetX($x);
	 $this->MultiCell($this->anchos[1],3,$datos["nombre"]);
	 $this->ln(2);
	}

	}
}
?>