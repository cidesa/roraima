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
	 $this->fecmin=H::GetPost("fecmin");
	 $this->fecmax=H::GetPost("fecmax");
	 $this->tipdes=H::GetPost("tipdes");
	 $this->tiphas=H::GetPost("tiphas");
	 $this->nivel=H::GetPost("nivel");


	 $this->sql="select distinct b.codpre, to_char(a.fecing,'dd/mm/yyyy') as fecingstr, a.refing, a.desing, a.moning, a.mondes, a.montot, a.codtip, a.fecing
	 		    from
				cireging a, ciimping b
				where
				a.refing>='".$this->refdes."'  and
				a.refing<='".$this->refhas."'  and
				a.fecing>=to_date('".$this->fecmin."','dd/mm/yyyy') and
				a.fecing<=to_date('".$this->fecmax."','dd/mm/yyyy') and
				a.codtip >= '".$this->tipdes."' and
				a.codtip <= '".$this->tiphas."' and
				a.refing = b.refing and
				a.fecing = b.fecing
				order by b.codpre, a.refing, a.fecing, a.codtip";
	 //print $this->sql;exit;
	 $this->tb=$this->bd->select($this->sql);
	 if(!$this->tb->EOF)
	 $this->arrp=array("no vacio");
	 $this->cab=new cabecera();
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,$_POST["titulo"],"l","s","n");
	 $this->setFont("Arial","B",9);
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
	 $this->cell(270,5,'Tipo(s) de Ingreso: '.$nombres);
	 $this->ln(5);
	 $this->nombreniv=$this->bd->select("select nomext from ciniveles where consec = '".$this->nivel."'")->fields["nomext"];
	 $this->cell(270,5,'Agrupado Por: '.$this->nombreniv);
	 $this->ln(6);
	 $this->Line(10,$this->getY(),270,$this->getY());
	 $this->ln(5);
	 $this->SetWidths(array(25,70,25,50,30,30,30));
	 $this->SetBorder(true);
	 $this->Setaligns(array('C','C','C','C','C','C','C'));
	 $this->Row(array('Referencia de Ingreso','Descripcion','Fecha','Tipo','Monto','Descuento','Monto Total'));
	 $this->Setaligns(array('C','L','C','L','R','R','R'));
	}

	function Cuerpo()
	{
		while(!$this->tb->EOF)
		{
			$parte=explode("-",$this->tb->fields["codpre"]);
			$ref="";
			for($i=0;$i<$this->nivel;$i++)
			{
				$ref.=$parte[$i];
				if(($i+1)<$this->nivel)
				{
					$ref.="-";
				}
			}
			$cod=$ref;
			$desniv=$this->bd->select("select nompre from cideftit where trim(codpre)=trim('".$cod."')")->fields["nompre"];
			$this->MultiCell(260,4,$this->nombreniv.": ".trim($desniv),1);
			$tot1=0;
			$tot2=0;
			$tot3=0;
			while(!$this->tb->EOF and $ref==$cod)
			{
				$nomtip=$this->bd->select("select destip from citiping where codtip = '".$this->tb->fields["codtip"]."'")->fields["destip"];
				$this->Row(array(trim($this->tb->fields["refing"]),trim($this->tb->fields["desing"]),$this->tb->fields["fecingstr"],$nomtip,H::FormatoMonto($this->tb->fields["moning"]),H::FormatoMonto($this->tb->fields["mondes"]),H::FormatoMonto($this->tb->fields["montot"])));
				$tot1+=$this->tb->fields["moning"];
				$tot2+=$this->tb->fields["mondes"];
				$tot3+=$this->tb->fields["montot"];
				$this->tb->MoveNext();
				$parte=explode("-",$this->tb->fields["codpre"]);
				$cod="";
				for($i=0;$i<$this->nivel;$i++)
				{
					$cod.=$parte[$i];
					if(($i+1)<$this->nivel)
					{
						$cod.="-";
					}
				}
			}
			$this->Cell(170,5,"TOTAL POR ".trim($desniv),1,0,'R');
			$this->Cell(30,5,H::FormatoMonto($tot1),1,0,'R');
			$this->Cell(30,5,H::FormatoMonto($tot2),1,0,'R');
			$this->Cell(30,5,H::FormatoMonto($tot3),1,0,'R');
			if(!$this->tb->EOF)
			{
				$this->AddPage();
			}

		}
    }
}
?>