<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
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
	 $this->numing1=$_POST["numing1"];
	 $this->numing2=$_POST["numing2"];
	 $this->rifcon1=$_POST["rifcon1"];
	 $this->rifcon2=$_POST["rifcon2"];
	 $this->fecing1=$_POST["fecing1"];
	 $this->fecing2=$_POST["fecing2"];
	 $this->tiping1=$_POST["tiping1"];
	 $this->tiping2=$_POST["tiping2"];
	 $this->codpre1=$_POST["codpre1"];
	 $this->codpre2=$_POST["codpre2"];
	 $this->comodin=$_POST["comodin"];

	 $this->sql="SELECT A.refing as refing, A.tipMOV as tipmov, to_char(A.fecing,'dd/mm/yyyy') as fecing, A.RIFCON as rifcon, D.nomcon as nomcon,TRIM(A.desing) as desing, TRIM(B.CodPre ) as codpre, TRIM(C.NomPre) as nompre,
				B.moning as moning,b.monrec as monrec,b.mondes as mondes,(B.moning+B.monrec-b.mondes) as monaju FROM
				CIREGING A,CIIMPING B, CIDEFTIT C,CICONREP D WHERE
				A.REFING>='".$this->numing1."'  AND
				A.REFING<='".$this->numing2."'  AND
				A.FECING>=to_date('".$this->fecing1."','dd/mm/yyyy') AND
				A.FECING<=to_date('".$this->fecing2."','dd/mm/yyyy') AND
				D.RIFCON>='".$this->rifcon1."' AND
				D.RIFCON<='".$this->rifcon2."' AND
				trim(B.CODPRE) >=trim('".$this->codpre1."') AND
				trim(B.CODPRE) <=trim('".$this->codpre2."') AND
				A.CODTIP >= '".$this->tiping1."' AND
				A.CODTIP <= '".$this->tiping2."' AND
				B.CODPRE LIKE RTRIM('".$this->comodin."') AND
				A.REFING= B.REFING AND
				A.FECING=B.FECING AND
				B.CodPre = C.CodPre  AND
				A.RIFCON=D.RIFCON
				ORDER BY A.REFING,B.CODPRE,A.FECING,A.TIPMOV";

	 $this->llenartitulosmaestro();
	 $this->llenartitulosdetalle();
	 $this->cab=new cabecera();
	}

	function llenartitulosmaestro()
	{
	 $this->titulos[0]="REFERENCIA";
	 $this->titulos[1]="TIPO";
	 $this->titulos[2]="FECHA";
	 $this->titulos[3]="DESCRIPCION";
	 $this->titulos[4]="CONTRIBUYENTE";
	 $this->anchos[0]=25;
	 $this->anchos[1]=15;
	 $this->anchos[2]=20;
	 $this->anchos[3]=100;
	 $this->anchos[4]=80;
	 $this->anchos[5]=30;
	}

	function llenartitulosdetalle()
	{
	 $this->titulos2[0]="				               Imputaciones Presupuestarias";
	 $this->titulos2[1]="				";
	 $this->titulos2[2]="Monto";
	 $this->titulos2[3]="Recargo";
	 $this->titulos2[4]="Descuento";
	 $this->titulos2[5]="Neto";
	 $this->anchos2[0]=43;
	 $this->anchos2[1]=80;
	 $this->anchos2[2]=30;
	 $this->anchos2[3]=30;
	 $this->anchos2[4]=30;
	 $this->anchos2[5]=30;
	}

	function Header()
	{
	 $this->cab->poner_cabecera($this,$_POST["titulo"],"l","s","n");
	 $this->setFont("Arial","B",9);
	 $this->cell(270,5,'Del '.$this->fecing1.' Al '.$this->fecing2,0,0,'C');
	 $this->ln(5);
	 $this->Line(10,$this->getY(),270,$this->getY());
	 $ncampos=count($this->titulos);
	 $ncampos2=count($this->titulos2);
	 for($i=0;$i<$ncampos;$i++)
	 {
		$this->cell($this->anchos[$i],10,$this->titulos[$i]);
	 }
	 $this->ln(5);
	 for($i=0;$i<$ncampos2;$i++)
	 {
		$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
	 }
	 $this->ln(8);
	 $this->Line(10,$this->getY(),270,$this->getY());
	 $this->ln(5);
	}

	function Cuerpo()
	{
  	 $this->setFont("Arial","B",8);
	 $tb=$this->bd->select($this->sql);
	 $tb2=$this->bd->select($this->sql);
	 $ref="";
	 $acum1=0;
	 $acum2=0;
	 $acum3=0;
	 $acum4=0;
	 $totacum1=0;
	 $totacum2=0;
	 $totacum3=0;
	 $totacum4=0;
	 if(!$tb2->EOF)
	 {
	  $this->setFont("Arial","B",8);
	  $ref=$tb2->fields["refing"];
	  $this->cell($this->anchos[0],4,$tb2->fields["refing"]);
	  $this->cell($this->anchos[1],4,$tb2->fields["tipmov"]);
	  $this->cell($this->anchos[2],4,$tb2->fields["fecing"]);
	  $y=$this->getY();
	  $x=$this->getX();
	  $this->Multicell($this->anchos[3],4,$tb2->fields["desing"]);
	  $y1=$this->getY();
	  $this->SetXY($x+$this->anchos[3],$y);
	  $this->Multicell($this->anchos[4],4,$tb2->fields["nomcon"]);
	  $y2=$this->getY();
	  if ($y1>$y2){$this->SetY($y1);}
	  else {$this->SetY($y2);}
	  $this->ln(3);
	 }
	 while(!$tb->EOF)
	 {
	   if($tb->fields["refing"]!=$ref)
	   {
		//Totales
		 $this->ln(3);
		 $this->line(100,$this->getY(),270,$this->getY());
		 $this->ln(2);
		 $this->cell($this->anchos2[0]+3,5,'');
		 $this->cell($this->anchos2[1],4,'');
		 $this->cell(13,4,number_format($acum1,2,'.',','),0,0,'R');
		 $totacum1=$totacum1+$acum1;
		 $this->cell($this->anchos2[3]-7,4,number_format($acum2,2,'.',','),0,0,'R');
		 $totacum2=$totacum2+$acum2;
		 $this->cell($this->anchos2[4],4,number_format($acum3,2,'.',','),0,0,'R');
		 $totacum3=$totacum3+$acum3;
		 $this->cell($this->anchos2[5]+4,4,number_format($acum4,2,'.',','),0,0,'R');
		 $totacum4=$totacum4+$acum4;
		 $acum1=0;
		 $acum2=0;
		 $acum3=0;
		 $acum4=0;

		 $this->ln(8);
		 $this->setFont("Arial","B",8);
		 $this->cell($this->anchos[0],4,$tb->fields["refing"]);
		 $this->cell($this->anchos[1],4,$tb->fields["tipmov"]);
		 $this->cell($this->anchos[2],4,$tb->fields["fecing"]);
		 $this->cell($this->anchos[3],4,$tb->fields["desing"]);
		 $this->cell($this->anchos[4],4,$tb->fields["nomcon"]);
		 $this->ln(6);
	    }
	     $this->ln(3);
		$ref=$tb->fields["refing"];
		$this->setFont("Arial","",8);
		//Detalle
		$this->cell($this->anchos2[0]+3,4,$tb->fields["codpre"].'    '.$tb->fields["nompre"]);
		$x=$this->GetX();
		$this->cell($this->anchos2[1]);
		$this->cell(13,4,number_format($tb->fields["moning"],2,'.',','),0,0,'R');
		$acum1=$acum1+$tb->fields["moning"];
		$this->cell($this->anchos2[3]-7,4,number_format($tb->fields["monrec"],2,'.',','),0,0,'R');
		$acum2=$acum2+$tb->fields["monrec"];
		$this->cell($this->anchos2[4],4,number_format($tb->fields["mondes"],2,'.',','),0,0,'R');
		$acum3=$acum3+($tb->fields["mondes"]);
		$this->cell($this->anchos2[5]+4,4,number_format($tb->fields["monaju"],2,'.',','),0,0,'R');
		$acum4=$acum4+$tb->fields["monaju"];
		$this->SetX($x);
		//$this->Multicell($this->anchos2[1],4,$tb->fields["nompre"]);
		$tb->MoveNext();
	    $this->ln(3);
	  }
     //Totales
	 $this->ln(3);
	 $this->line(100,$this->getY(),270,$this->getY());
	  $this->ln(2);
	 $this->cell($this->anchos2[0]+3,5,'');
	 $this->cell($this->anchos2[1],4,'');
	 $this->cell(13,4,number_format($acum1,2,'.',','),0,0,'R');
	 $totacum1=$totacum1+$acum1;
	 $this->cell($this->anchos2[3]-7,4,number_format($acum2,2,'.',','),0,0,'R');
	 $totacum2=$totacum2+$acum2;
	 $this->cell($this->anchos2[4],4,number_format($acum3,2,'.',','),0,0,'R');
	 $totacum3=$totacum3+$acum3;
	 $this->cell($this->anchos2[5]+4,4,number_format($acum4,2,'.',','),0,0,'R');
	 $totacum4=$totacum4+$acum4;
	 $acum1=0;
	 $acum2=0;
	 $acum3=0;
	 $acum4=0;
	 $this->ln(5);
	 $this->line(100,$this->getY(),270,$this->getY());
	 $this->ln(4);
	 $this->cell($this->anchos2[0]+3,5,'TOTALES');
	 $this->cell($this->anchos2[1],4,'');
	 $this->cell(13,4,number_format($totacum1,2,'.',','),0,0,'R');
	 $this->cell($this->anchos2[3]-7,4,number_format($totacum2,2,'.',','),0,0,'R');
	 $this->cell($this->anchos2[4],4,number_format($totacum3,2,'.',','),0,0,'R');
	 $this->cell($this->anchos2[5]+4,4,number_format($totacum4,2,'.',','),0,0,'R');
	 $this->ln(10);
   }
}
?>