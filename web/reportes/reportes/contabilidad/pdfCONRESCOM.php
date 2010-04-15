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
		var $fecha1;
		var $fecha2;
		var $com1;
		var $com2;
		var $estado;
		var $auxd=0;
		var $auxa=0;
		var $auxcon=0;
		var $auxmon=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->fecha1=$_POST["fecha1"];
			$this->fecha2=$_POST["fecha2"];
			$this->com1=$_POST["com1"];
			$this->com2=$_POST["com2"];
			$this->estado=strtoupper($_POST["estado"]);

			if(strtoupper($this->estado)=="T")
			{
			$this->sql="select to_char(feccom,'dd/mm/yyyy') as feccom, numcom, ltrim(rtrim(descom)) as descripcion, moncom, stacom as estado, tipcom
						from contabc
						where rtrim(numcom) >= rtrim('".$this->com1."') and rtrim(numcom) <= rtrim('".$this->com2."')  and
						feccom>=to_date('".$this->fecha1."','dd/mm/yyyy') and feccom<=to_date('".$this->fecha2."','dd/mm/yyyy')
						order by numcom,feccom";
			}
			else
			{
			$this->sql="select to_char(feccom,'dd/mm/yyyy') as feccom, numcom, ltrim(rtrim(descom)) as descripcion, moncom, stacom as estado, tipcom
						from contabc
						where rtrim(numcom) >= rtrim('".$this->com1."') and rtrim(numcom) <= rtrim('".$this->com2."')  and
						feccom>=to_date('".$this->fecha1."','dd/mm/yyyy') and feccom<=to_date('".$this->fecha2."','dd/mm/yyyy') and
    					(stacom='".$this->estado."')
						order by numcom,feccom";
			}

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="FECHA";
				$this->titulos[1]="NUMERO";
				$this->titulos[2]="TIPO";
				$this->titulos[3]="DESCRIPCION DEL COMPROBANTE";
				$this->titulos[4]="ESTATUS";
				$this->titulos[5]="MONTO";
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","",8);
			$x=$this->GetX();
			$y=$this->GetY();

			$this->SetXY(140,27);
			$this->cell(25,10,"Desde :".$this->fecha1);
			$this->cell(25,10,"Hasta :".$this->fecha2);
			$this->SetXY($x,$y);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			/*for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}*/
			$this->ln();
			$this->SetLineWidth(0.5);
			$this->Line(10,47,200,47);
			$this->SetLineWidth(0.2);
			$this->ln(-6);
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","",7);
			$ncampos=count($this->titulos);

			while(!$tb->EOF)
			{
				//$this->setFont("Arial","B",8);
				$this->cell($this->anchos[0],3,$tb->fields["feccom"]);
				$this->cell($this->anchos[1],3,$tb->fields["numcom"]);
				$this->cell($this->anchos[2],3,$tb->fields["tipcom"]);
				$x=$this->GetX();
				$this->cell($this->anchos[3]);
				if (strtoupper($tb->fields["estado"])=='A'){
				$aux="Actualizado";
				$this->auxa=$this->auxa+$tb->fields["moncom"];
				}
				if (strtoupper($tb->fields["estado"])=='D'){
				$aux="Diferido";
				$this->auxd=$this->auxd+$tb->fields["moncom"];
				}
				if (strtoupper($tb->fields["estado"])=='N'){$aux="Anulado";}
				if (strtoupper($tb->fields["estado"])=='R'){$aux="Reversado";}
				$this->cell($this->anchos[4],3,$aux);
				$this->cell($this->anchos[5],3,number_format($tb->fields["moncom"],2,',','.'),0,0,"R");
				$this->SetX($x);
				$this->MultiCell($this->anchos[3],3,$tb->fields["descripcion"]);
				$this->auxmon=$this->auxmon + $tb->fields["moncom"];
				$this->auxcon=$this->auxcon + 1;
				$this->ln();
				$tb->MoveNext();
			}
				$this->ln();
				$this->Line(80,$this->GetY(),200,$this->GetY());
			    $this->setFont("Arial","B",8);
				$this->cell(40,5,"                               Total Comprobantes: ".number_format($this->auxcon,0,'.',','));
				$this->cell(105,5,"");
				$this->cell(40,5,"                                                                                    Total Comprobantes Actualizados:            	 ".number_format($this->auxa,2,',','.'),0,0,"R");
				$this->ln();
				$this->cell(155,5,"");
				$this->cell(30,5,"                                                                                                                                       Total Comprobantes Diferidos:                                      ".number_format($this->auxd,2,',','.'),0,0,"R");
				$this->ln();
				$this->cell(155,5,"");
				$this->Line(160,$this->GetY(),200,$this->GetY());
				$this->cell(30,5,"                                                                                                                                       Total General:                                                 ".number_format($this->auxmon,2,',','.'),0,0,"R");
		}
	}
?>
