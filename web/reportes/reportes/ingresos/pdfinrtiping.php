<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

class pdfreporte extends fpdf
{
	var $bd;
	var $titulos;
	var $anchos;
	var $campos;
	var $sql1;
	var $rep;
	var $numero;
	var $cab;
	var $codtip1;
	var $codtip2;

	function pdfreporte()
	{
	 $this->fpdf("l","mm","Letter");
	 $this->cab=new cabecera();
	 $this->bd=new basedatosAdo();
	 $this->titulos=array();
	 $this->campos=array();
	 $this->anchos=array();
	 $this->codtip1=$_POST["tiping1"];
	 $this->codtip2=$_POST["tiping2"];
	 $this->sql="SELECT DISTINCT codtip as codtip,destip as destip
				FROM citiping
				WHERE ( codtip >='".$this->codtip1."' AND codtip <='".$this->codtip2."' )
				ORDER BY codtip";
	 $this->llenartitulosmaestro();
	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="Tipo Ingreso";
	 $this->titulos[1]="Descripcion";
	 $this->anchos[0]=10;
	 $this->anchos[1]=30;
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,$_POST["titulo"],"l","s","s");
	 $this->setFont("Arial","B",10);
	 $ncampos=count($this->titulos);
	 for($i=0;$i<$ncampos;$i++)
	 {
	  $this->cell($this->anchos[$i]+40,10,$this->titulos[$i]);
	 }
	 $this->ln(4);
	 $this->Line(10,45,270,45);
	 $this->ln(5);
	}

	function Cuerpo()
	{
	 $this->setFont("Arial","B",8);
     $tb=$this->bd->select($this->sql);
	 while(!$tb->EOF)
	 {
	  $this->setFont("Arial","",8);
	  $this->cell($this->anchos[0]+40,5,$tb->fields["codtip"]);
	  $this->MultiCell($this->anchos[1]+175,5,$tb->fields["destip"]);
	  $tb->MoveNext();
     }
	}
}
?>