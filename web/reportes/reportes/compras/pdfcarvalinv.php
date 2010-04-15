<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $titulos22;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $perdesde;
		var $perhasta;
		var $nivdesde;
		var $nivhasta;
		var $codpredes;
		var $codprehas;
		var $tippre;
		var $conf;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","letter");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->cab=new cabecera();
			$this->titulos=array();
			$this->titulos2=array();
			$this->titulos22=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codartdes=H::GetPost("codartdes");
			$this->codarthas=H::GetPost("codarthas");
			$this->fechainv=H::GetPost("fechainv");


			$this->sql="SELECT
						A.CODART,
						A.DESART,
						A.EXITOT,
						A.COSPRO,
						B.EXIACT
						FROM CAREGART A, CAINVFIS B
						WHERE
							(A.CODART) = (B.CODART) AND
							(A.CODART) >= ('".$this->codartdes."') AND
							(A.CODART) <= ('".$this->codarthas."') AND
							B.FECINV=TO_DATE('".$this->fechainv."','dd/mm/yyyy')
						ORDER BY A.CODART";


			$this->llenartitulos();
			$this->llenartitulos2();
			$this->llenartitulos22();
	for($i=0;$i<count($this->titulos);$i++)
	{
		$this->anchos[$i]=$this->getAncho($i);
	}
	for($i=0;$i<count($this->titulos2);$i++)
	{
		$this->anchos2[$i]=$this->getAncho2($i);
	}
		}

function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=85;
		$anchos[1]=75;
		$anchos[2]=50;
		$anchos[3]=50;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=25;
		$anchos2[1]=60;
		$anchos2[2]=25;
		$anchos2[3]=25;
		$anchos2[4]=25;
		$anchos2[5]=25;
		$anchos2[6]=25;
		$anchos2[7]=25;
		$anchos2[8]=25;

		return $anchos2[$pos];
	}



		function llenartitulos(){
			$this->titulos[0]="";
			$this->titulos[1]="LOGICO(A)";
			$this->titulos[2]="FISICO(B)";
			$this->titulos[3]="DIFERENCIA (B)-(A)";
		}


		function llenartitulos2(){
			$this->titulos2[0]="Código";
			$this->titulos2[1]="Descripción";
			$this->titulos2[2]="";
			$this->titulos2[3]="Costo";
			$this->titulos2[4]="Valor";
			$this->titulos2[5]="";
			$this->titulos2[6]="Valor";
			$this->titulos2[7]="";
			$this->titulos2[8]="Valor";
		}

		function llenartitulos22(){
			$this->titulos22[0]="Artículo";
			$this->titulos22[1]="Artículo";
			$this->titulos22[2]="Cantidad";
			$this->titulos22[3]="Promedio";
			$this->titulos22[4]="Total";
			$this->titulos22[5]="Cantidad";
			$this->titulos22[6]="Total";
			$this->titulos22[7]="Cantidad";
			$this->titulos22[8]="Total";
		}


		function Header(){
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s");
			$ncampos=count($this->titulos);
			$this->SetFont("Arial","B",8);
			for($i=0;$i<=$ncampos;$i++)
			{
				if ($this->titulos[$i]!="")
				$this->Line($this->GetX()+2,$this->GetY()+5,$this->GetX()+$this->anchos[$i]-2,$this->GetY()+5);
				$this->cell($this->anchos[$i],5,$this->titulos[$i],0,0,'C');

			}
			$this->ln(5);
				$ncampos2=count($this->titulos2);
			$this->SetFont("Arial","B",8);
			for($i=0;$i<=$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],5,$this->titulos2[$i],0,0,'C');
			}
			$this->ln(3);
			$ncampos22=count($this->titulos22);
			for($i=0;$i<=$ncampos22;$i++)
			{
				$this->cell($this->anchos2[$i],5,$this->titulos22[$i],0,0,'C');
			}
			$this->ln();
			$this->Line(10,$this->Gety(),270,$this->Gety());

		}

		function Cuerpo(){
			$tb=$this->bd->select($this->sql);
			//$this->ln();
			$this->SetFont("Arial","",8);
			$acumvalpro=0;
			$acumvalutl=0;
			$acumdifmon=0;
			while (!$tb->EOF){
				$this->cell($this->anchos2[0],5,$tb->fields["codart"]);
				$this->cell($this->anchos2[1],5,"");
				$this->cell($this->anchos2[2],5,H::FormatoMonto($tb->fields["exitot"]),0,0,'R');
				$this->cell($this->anchos2[3],5,H::FormatoMonto($tb->fields["cospro"]),0,0,'R');
				$valpro=$tb->fields["exitot"]*$tb->fields["cospro"];
				$this->cell($this->anchos2[4],5,H::FormatoMonto($valpro),0,0,'R');
				$this->cell($this->anchos2[5],5,H::FormatoMonto($tb->fields["exiact"]),0,0,'R');
				$valult=$tb->fields["exiact"]*$tb->fields["cospro"];
				$this->cell($this->anchos2[6],5,H::FormatoMonto($valult),0,0,'R');
				$difcan=$tb->fields["exiact"]-$tb->fields["exiatot"];
				$this->cell($this->anchos2[7],5,H::FormatoMonto($difcan),0,0,'R');
				$difmon=$difcan*$tb->fields["cospro"];
				$this->cell($this->anchos2[8],5,H::FormatoMonto($difmon),0,0,'R');
				$this->SetX($this->anchos2[0]+10);
				$this->Multicell($this->anchos2[1],5,$tb->fields["desart"]);
				$acumvalpro=$acumvalpro+$valpro;
				$acumvalult=$acumvalult+$valult;
				$acumdifmon=$acumdifmon+$difmon;
				$tb->MoveNext();
				if ($this->GetY()>=170){
					$this->AddPage();
				}

			}

			//TOTALES
			$this->ln(5 );
			$this->Line($this->anchos2[0]+$this->anchos2[1]/2+20,$this->GetY(),270,$this->GetY());
			$this->SetFont("Arial","B",8);
			$this->SetX($this->anchos2[0]+10);
			$this->cell($this->anchos2[1],5,"TOTALES",0,0,'R');
			$this->cell($this->anchos2[2],5,"");
			$this->cell($this->anchos2[3],5,"");
			$this->cell($this->anchos2[4],5,H::FormatoMonto($acumvalpro),0,0,'R');
			$this->cell($this->anchos2[5],5,"");
			$this->cell($this->anchos2[6],5,H::FormatoMonto($acumvalult),0,0,'R');
			$this->cell($this->anchos2[7],5,"");
			$this->cell($this->anchos2[8],5,H::FormatoMonto($acumdifmon),0,0,'R');
		}

	}

?>