<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/cabecera.php");

class pdfreporte extends fpdf
{

	var $bd;
	var $titulos;
	var $titulos2;
	var $anchos;
	var $anchos2;
	var $campos;
	var $sql;
	var $rep;
	var $numero;
	var $cab;
	var $numing1;
	var $numing2;
	var $rifcon1;
	var $rifcon2;
	var $fecing1;
	var $fecing2;
	var $tiping1;
	var $tiping2;
	var $codpre1;
	var $codpre2;
	var $comodin;

	function pdfreporte()
	{
	 $this->fpdf("p","mm","Letter");
	 $this->bd=new basedatosAdo();
	 $this->titulos=array();
	 $this->titulos2=array();
	 $this->campos=array();
	 $this->anchos=array();
	 $this->anchos2=array();
	 $this->codpredes=H::GetPost("codpredes");
	 $this->codprehas=H::GetPost("codprehas");
	 $this->nivel=H::GetPost("nivel");

	 $this->sql="select
	 			 a.codpre,
	 			 a.nompre,
	 			 a.codcta
	 			 from cideftit a
	 			 where
	 			 a.codpre>='".$this->codpredes."' and
	 			 a.codpre<='".$this->codprehas."'
	 			 order by a.codpre";
	 //print $this->sql;exit;
	 $this->tb=$this->bd->select($this->sql);
	 if(!$this->tb->EOF)
	 $this->arrp=array("no vacio");
	 $this->cab=new cabecera();
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,$_POST["titulo"],"p","s","n");
	 $this->setFont("Arial","B",9);
	 $this->cell(270,5,'Codigo Presupuestario Desde '.$this->codpredes.' Hasta '.$this->codprehas);
	 $this->ln(6);
	 $this->Line(10,$this->getY(),200,$this->getY());
	 $this->ln(5);
	 $this->SetWidths(array(40,110,40));
	 $this->SetBorder(true);
	 $this->Setaligns(array('C','C','C'));
	 $this->Row(array('Codigo Presupuestario','Nombre Codigo Presupuestario','Cuenta Contable'));
	 $this->Setaligns(array('L','L','L'));
	}

	function Cuerpo()
	{
		while(!$this->tb->EOF)
		{
			$this->RowM(array(trim($this->tb->fields["codpre"]),trim($this->tb->fields["nompre"]),trim($this->tb->fields["codcta"])));
			$this->tb->MoveNext();
		}
    }
}
?>