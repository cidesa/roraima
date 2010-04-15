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
	 $this->fpdf("l","mm","Letter");
	 $this->bd=new basedatosAdo();
	 $this->titulos=array();
	 $this->titulos2=array();
	 $this->campos=array();
	 $this->anchos=array();
	 $this->anchos2=array();
	 $this->refdes=H::GetPost("refdes");
	 $this->refhas=H::GetPost("refhas");
	 $this->rifcondes=H::GetPost("rifcondes");
	 $this->rifconhas=H::GetPost("rifconhas");
	 $this->fecmin=H::GetPost("fecmin");
	 $this->fecmax=H::GetPost("fecmax");
	 $this->tipdes=H::GetPost("tipdes");
	 $this->tiphas=H::GetPost("tiphas");
	 $this->ctabandes=H::GetPost("ctabandes");
	 $this->ctabanhas=H::GetPost("ctabanhas");
	 $this->vartotgen="moning";

	 $this->sql="SELECT A.refing as refing, to_char(A.fecing,'dd/mm/yyyy') as fecing, c.destip as destip, trim(D.nomcon) as nomcon,TRIM(A.desing) as desing,
				trim(b.desenl), trim(a.reflib) as reflib,formatonum(A.montot) as moning FROM
				CIREGING A left outer join citiping c on (a.codtip=c.codtip) left outer join  CICONREP D  on (a.rifcon=d.rifcon),
				tsdefban b
				WHERE
				trim(A.REFING)>=trim('".$this->refdes."')  AND
				trim(A.REFING)<=trim('".$this->refhas."')  AND
				A.FECING>=to_date('".$this->fecmin."','dd/mm/yyyy') AND
				A.FECING<=to_date('".$this->fecmax."','dd/mm/yyyy') AND
				trim(D.RIFCON)>=trim('".$this->rifcondes."') AND
				trim(D.RIFCON)<=trim('".$this->rifconhas."') AND
				A.CODTIP >= '".$this->tipdes."' AND
				A.CODTIP <= '".$this->tiphas."' AND
				substr(a.ctaban,1,4)='".$this->ctabandes."' and
				substr(a.ctaban,1,4)='".$this->ctabanhas."' and
				a.ctaban=b.numcue
				ORDER BY A.REFING,A.FECING,A.codtip";

	 $this->llenartitulosmaestro();
	 $this->cab=new cabecera();
	 $arrp=$this->bd->select($this->sql);
	 $this->arrp = $arrp->getArray();
	 $this->setAutoPageBreak(true,25);
	}

	function llenartitulosmaestro()
	{
	 $this->titulos[]="REFERENCIA";
	 $this->titulos[]="FECHA";
	 $this->titulos[]="TIPO";
	 $this->titulos[]="CONTRIBUYENTE";
	 $this->titulos[]="DESCRIPCION";
	 $this->titulos[]="BANCO";
	 $this->titulos[]="DEPOSITO";
	 $this->titulos[]="MONTO";
	 $this->anchos[]=22;
	 $this->anchos[]=20;
	 $this->anchos[]=20;
	 $this->anchos[]=60;
	 $this->anchos[]=60;
	 $this->anchos[]=30;
	 $this->anchos[]=20;
	 $this->anchos[]=25;
	 $this->align[]="C";
	 $this->align[]="C";
	 $this->align[]="C";
	 $this->align[]="C";
	 $this->align[]="C";
	 $this->align[]="C";
	 $this->align[]="C";
	 $this->align[]="C";
	 $this->align2[]="C";
	 $this->align2[]="C";
	 $this->align2[]="C";
	 $this->align2[]="L";
	 $this->align2[]="L";
	 $this->align2[]="C";
	 $this->align2[]="C";
	 $this->align2[]="R";
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,$_POST["titulo"],"l","s","n");
	 $this->setFont("Arial","B",8);
	 $this->cell(270,5,'Del '.$this->fecmin.' Al '.$this->fecmax,0,0,'C');
	 $this->ln(5);
	 $this->setWidths($this->anchos);
	 $this->setAligns($this->align);
	 $this->setBorder(true);
	 $this->row($this->titulos);
	 $this->setAligns($this->align2);
	}

	function Cuerpo()
	{
  	 $this->setFont("Arial","",8);
	 $vartotgen=0;
	 foreach ($this->arrp as $arr)
	 {		//Detalle
		$this->rowM($arr);
		$vartotgen+=H::FormatoNum($arr[$this->vartotgen]);
	 }
	 //totales
	 $this->setAutoPageBreak(false);
	 $auxtot = implode("+",$this->anchos);
	 eval('$ancho = '.$auxtot.';');
	 $this->setFont("Arial","B",9);
	 $this->multicell($ancho,5,"TOTAL GENERAL :  ".H::FormatoMonto($vartotgen),0,"R");


   }
}
?>