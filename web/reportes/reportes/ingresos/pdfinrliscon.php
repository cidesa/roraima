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
	 $this->rifdes=H::GetPost("rifdes");
	 $this->rifhas=H::GetPost("rifhas");
	 $this->tipo=H::GetPost("tipo");


	 $this->sql="select distinct a.rifcon, a.nomcon, a.dircon, a.telcon
	 		    from ";
	 		    if($this->tipo=="0")
	 		    {
					$this->sql.="ciconrep a where ";
	 		    }
	 		    else
	 		    {
					$this->sql.="ciconrep a, cireging b where
							    a.rifcon=b.rifcon and ";
	 		    }
	 $this->sql.="a.rifcon>='".$this->rifdes."'  and
				a.rifcon<='".$this->rifhas."'
				ORDER BY a.rifcon";
	 //print $this->sql;exit;
	 $this->llenartitulomaestro();
	 $tb=$this->bd->select($this->sql);
	 $this->tb=$tb->getArray();
	 if(!$this->tb->EOF)
	 $this->arrp=array("no vacio");
	 $this->cab=new cabecera();
	}

	function llenartitulomaestro()
	{
		$this->anchos = array(25,70,70,25);
		$this->titulos = array('Rif/Cedula','Nombre','Direccion','Telefono');
		$this->aligns1 = array('C','C','C','C');
		$this->aligns2 = array('L','L','L','L');
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,$_POST["titulo"],"p","s","n");
	 $this->setFont("Arial","B",9);
	 $this->SetWidths($this->anchos);
	 $this->SetBorder(true);
	 $this->Setaligns($this->aligns1);
	 $this->RowM($this->titulos);
	 $this->Setaligns($this->aligns2);
	}

	function Cuerpo()
	{
		foreach($this->tb as $registro)
		{
			$this->RowM($registro);
		}
    }
}
?>