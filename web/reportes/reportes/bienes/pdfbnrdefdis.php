<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

class pdfreporte extends fpdf
{

	var $bd;
	var $titulos;
	var $anchos;
	var $campos;
	var $sql;
	var $rep;
	var $numero;
	var $cab;
	var $coddis1;
	var $coddis2;

	function pdfreporte()
	{
		$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
			$this->cab=new cabecera();
		$this->bd=new basedatosAdo();
		$this->titulos=array();
		$this->campos=array();
		$this->anchos=array();
		$this->coddis1=H::GetPost("coddis1");
		$this->coddis2=H::GetPost("coddis2");
		$this->sql="SELECT DISTINCT coddis as coddis,desdis as desdis, (case when afecon='S' then 'SI' else 'NO' end) as afecon, (case when desinc='S' then 'SI' else 'NO' end) as desinc, (case when adimej='S' then 'SI' else 'NO' end) as adimej
					FROM BNDISBIE
					WHERE ( coddis >='".$this->coddis1."' AND coddis <='".$this->coddis2."' )
					ORDER BY coddis";
		$this->llenartitulosmaestro();

	}

	function llenartitulosmaestro()
	{
		$this->titulos[0]="Código de Disposición";
		$this->titulos[1]="Descripcion";
		$this->titulos[2]="   Afecta Contabilidad";
		$this->titulos[3]="        Desincorpora";
		$this->titulos[4]="       Mejora el bien";
		$this->anchos[0]=40;
		$this->anchos[1]=80;
		$this->anchos[2]=40;
		$this->anchos[3]=40;
		$this->anchos[4]=40;
	}

	function Header()
	{
		$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s","Letter");
		$this->setFont("Arial","B",9);
		$ncampos=count($this->titulos);
		for($i=0;$i<$ncampos;$i++)
		{
			$this->cell($this->anchos[$i],10,$this->titulos[$i]);
		}
		$this->ln(4);
		$this->Line(10,$this->GetY()+5,270,$this->GetY()+5);
		$this->ln(5);
	}

	function Cuerpo()
	{
		$this->setFont("Arial","B",7);
	    $tb=$this->bd->select($this->sql);
	    $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3],$this->anchos[4]));
	    $this->SetAligns(array('L','L','C','C','C'));
		while(!$tb->EOF)
		{
		  $this->setFont("Arial","",8);
		  $this->Row(array($tb->fields["coddis"],$tb->fields["desdis"],$tb->fields["afecon"],$tb->fields["desinc"],$tb->fields["adimej"]));
		  $this->ln();
		  $tb->MoveNext();
		}
	}
}
?>