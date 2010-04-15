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
	 $this->refdes=H::GetPost("refdes");
	 $this->refhas=H::GetPost("refhas");
	 $this->fecmin=H::GetPost("fecmin");
	 $this->fecmax=H::GetPost("fecmax");
	 $this->tipdes=H::GetPost("tipdes");
	 $this->tiphas=H::GetPost("tiphas");
	 $this->codpredes=H::GetPost("codpredes");
	 $this->codprehas=H::GetPost("codprehas");
	 $this->nivel=H::GetPost("nivel");

	 $niveles=$this->bd->select("select * from ciniveles where consec<='".$this->nivel."' order by consec");
	 $caract=0;
	 while(!$niveles->EOF)
	 {
	 	$caract+=$niveles->fields["lonniv"];
	 	$niveles->MoveNext();
	 	//if(!$niveles->EOF)
	 	$caract++;
	 }

	 $this->sql="select distinct
	 			 a.codpre,
	 			 a.nompre,
	 			 coalesce(sum(c.moning),0) as totaling,
	 			 coalesce(sum(c.mondes),0) as totaldes,
	 			 coalesce(sum(c.montot),0) as totaltot
	 			 from cideftit a left outer join ciimping b on
	 			 (b.codpre like trim(a.codpre)||'%') left outer join cireging c on
	 			 (
	 			 b.refing=c.refing and
	 			 b.fecing=c.fecing and
	 			 c.refing>='".$this->refdes."' and
	 			 c.refing<='".$this->refhas."' and
				 c.fecing>=to_date('".$this->fecmin."','dd/mm/yyyy') and
				 c.fecing<=to_date('".$this->fecmax."','dd/mm/yyyy') and
				 c.codtip>='".$this->tipdes."' and
				 c.codtip<='".$this->tiphas."'
	 			 )
	 			 where
	 			 substr(a.codpre,".$caract.",1) = ' ' and
	 			 a.codpre>='".$this->codpredes."' and
	 			 a.codpre<='".$this->codprehas."'
	 			 group by a.codpre, a.nompre order by a.codpre";
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
	 $this->ln(5);
	 $this->cell(270,5,'Codigo de Referencia Desde '.$this->refdes.' Hasta '.$this->refhas);
	 $this->ln(5);
	 $this->cell(270,5,'Fecha del Ingreso Desde '.$this->fecmin.' Hasta '.$this->fecmax);
	 $this->ln(5);
	 $nomtip=$this->bd->select("select destip from citiping where codtip >= '".$this->tipdes."' and codtip <= '".$this->tiphas."'");
	 $nombres="";
	 while(!$nomtip->EOF)
	 {
	 	$nombres.=trim($nomtip->fields["destip"]);
	 	$nomtip->MoveNext();
	 	if(!$nomtip->EOF)
	 	{
	 		$nombres.=", ";
	 	}
	 	else
	 	{
	 		$nombres.=".";
	 	}
	 }
	 $this->Multicell(270,5,'Tipo(s) de Ingreso: '.$nombres);
	 $this->ln(1);
	 $this->Line(10,$this->getY(),200,$this->getY());
	 $this->ln(5);
	 $this->SetWidths(array(25,75,30,30,30));
	 $this->SetBorder(true);
	 $this->Setaligns(array('C','C','C','C','C'));
	 $this->Row(array('Codigo Presupuestario','Nombre','Total Ingreso','Total Descuento','Monto Total'));
	 $this->Setaligns(array('L','L','R','R','R'));
	}

	function Cuerpo()
	{
		while(!$this->tb->EOF)
		{
			$this->RowM(array(trim($this->tb->fields["codpre"]),trim($this->tb->fields["nompre"]),H::FormatoMonto($this->tb->fields["totaling"]),H::FormatoMonto($this->tb->fields["totaldes"]),H::FormatoMonto($this->tb->fields["totaltot"])));
			$this->tb->MoveNext();
		}
    }
}
?>