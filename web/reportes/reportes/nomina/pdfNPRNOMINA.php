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
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];


			$this->sql="select distinct a.codnom, a.nomnom, a.frecal, to_char(a.ultfec,'dd/mm/yyyy') as ultfec,
					 to_char(a.profec,'dd/mm/yyyy') as profec, a.numsem, a.ordpag, a.tipcau, a.refcau, a.tipprc,
			         a.refprc, a.tipcom, a.refcom,count(codemp) as canemp
					 from npnomina a left outer join npasicaremp b on (rtrim(a.codnom) = rtrim(b.codnom))
					 where a.codnom>='".$this->cod1."' and a.codnom<='".$this->cod2."'
					 group by  a.codnom, a.nomnom, a.frecal, to_char(a.ultfec,'dd/mm/yyyy'),
					 to_char(a.profec,'dd/mm/yyyy'), a.numsem, a.ordpag, a.tipcau, a.refcau, a.tipprc,
			         a.refprc, a.tipcom, a.refcom ";




			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			for($i=0;$i<count($this->titulos);$i++)
			{
				$this->anchos[$i]=$this->getAncho($i);
			}
for($i=0;$i<count($this->titulos);$i++)
			{
				$this->anchos[$i]=$this->getAncho($i);
			}
		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo";
				$this->titulos[1]="Nombre Nomina";
				$this->titulos[2]="Frecuencia Calculo";
				$this->titulos[3]="Ultima Fecha";
				$this->titulos[4]="Proxima Fecha";
				$this->titulos[5]="Numero Semana";
			//	$this->titulos[6]="Empleados";
		}
		function getAncho($pos)
		{
			$anchos=array();
			$anchos[0]=20;
			$anchos[1]=80;
			$anchos[2]=40;
			$anchos[3]=30;
			$anchos[4]=30;
			$anchos[5]=30;
			$anchos[6]=25;

			return $anchos[$pos];
		}
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			$this->setwidths($this->anchos);
			$this->setAligns(array("C","C","C","C","C","C","C"));
			$this->Row($this->titulos);
			$this->setAligns(array("C","L","C","C","C","C","C"));
			$this->ln();
			$this->SetLineWidth(0.5);
			$this->Line(10,43,270,43);
			$this->SetLineWidth(0.2);
			$this->ln(2);
			for($i=0;$i<count($this->titulos);$i++)
			{
				$this->anchos[$i]=$this->getAncho($i);
			}
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",8);
			$totemp=0;
			while (!$tb->EOF)
			{
				if (strtoupper($tb->fields["frecal"])=='S'){$frecal="Semanal";}
				if (strtoupper($tb->fields["frecal"])=='Q'){$frecal="Quincenal";}
				if (strtoupper($tb->fields["frecal"])=='M'){$frecal="Mensual";}
				if (strtoupper($tb->fields["frecal"])=='A'){$frecal="Anual";}
				$this->setwidths($this->anchos);
				$this->setAligns(array("C","L","C","C","C","C","C"));
				$this->Row(array($tb->fields["codnom"],$tb->fields["nomnom"],$frecal,$tb->fields["ultfec"],$tb->fields["profec"],$tb->fields["numsem"]));
				$totemp+=$tb->fields["canemp"];
				$tb->MoveNext();
			}
			$this->ln(4);
		//	$this->MCplus(180,4,' <@TOTAL EMPLEADOS :  '.$totemp.'<,>arial,B,9,155,0,0@>');
		}
	}
?>
