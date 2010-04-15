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
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codprodesde;
		var $codprohasta;
		var $ordcomdes;
		var $ordcomhas;
		var $fecorddes;
		var $fecordhas;
		var $status;
		var $condicion;
		var $conf;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			if($_GET["ordcomdes"]!="")
			{
				$this->ordcomdes=trim(str_replace('*',' ',$_GET["ordcomdes"]));
				$this->ordcomhas=trim(str_replace('*',' ',$_GET["ordcomhas"]));
				$this->sql=		"Select
								A.ORDCOM,
								TO_CHAR(A.FECORD,'DD/MM/YYYY') AS FECORD,
								SUBSTR(B.NOMPRO,1,38) AS NOMPRO,
								SUBSTR(A.DESORD,1,55) AS DESORD,
								A.MONORD,
								(CASE WHEN A.STAORD='A' THEN 'ACTIVA'
								 WHEN A.STAORD='N' THEN 'ANULADA' END) AS STATUS ,
								A.STAORD,
								A.REFSOL
								FROM CAORDCOM A,CAPROVEE B
								WHERE
								A.ORDCOM >= ('".$this->ordcomdes."') AND
								A.ORDCOM <= ('".$this->ordcomhas."') AND
								A.CODPRO=B.CODPRO
							ORDER BY A.FECORD,A.ORDCOM";
			}
			else
			{
				$this->codprodesde=H::GetPost("codprodesde");
				$this->codprohasta=H::GetPost("codprohasta");
				$this->ordcomdes=H::GetPost("ordcomdes");
				$this->ordcomhas=H::GetPost("ordcomhas");
				$this->fecorddes=H::GetPost("fecorddes");
				$this->fecordhas=H::GetPost("fecordhas");
				$this->status=H::GetPost("status");
				if($this->status=="Activas")
				{
					$this->condicion=" A.STAORD='A' AND ";
				}
				else
				{
				    if($this->status=="Anuladas")
					{
					   $this->condicion=" A.STAORD='N' AND ";
					}
					else
					{
					   $this->condicion=" (A.STAORD='A' OR A.STAORD='N') AND ";
					}
				}
				$this->sql=		"Select
								A.ORDCOM,
								TO_CHAR(A.FECORD,'DD/MM/YYYY') AS FECORD,
								B.NOMPRO AS NOMPRO,
								A.DESORD AS DESORD,
								A.MONORD,
								(CASE WHEN A.STAORD='A' THEN 'ACTIVA'
								 WHEN A.STAORD='N' THEN 'ANULADA' END) AS STATUS ,
								A.STAORD,
								A.REFSOL
								FROM CAORDCOM A,CAPROVEE B
								WHERE
								A.ORDCOM >= ('".$this->ordcomdes."') AND
								A.ORDCOM <= ('".$this->ordcomhas."') AND
								A.FECORD >= TO_DATE('".$this->fecorddes."','DD/MM/YYYY') AND
								A.FECORD <= TO_DATE('".$this->fecordhas."','DD/MM/YYYY') AND
								(B.rifpro) >= ('".$this->codprodesde."') AND
								(B.rifpro) <= ('".$this->codprohasta."') AND
								".$this->condicion."
								A.CODPRO=B.CODPRO
							ORDER BY A.FECORD,A.ORDCOM";


			}
			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Orden";
				$this->titulos[1]="Fecha";
				$this->titulos[2]="Proveedor";
				$this->titulos[3]="Descripcion";
				$this->titulos[4]="Monto";
				$this->titulos[5]="Status";
				$this->titulos[6]="Referencia";
				$this->anchos[0]=17;
				$this->anchos[1]=17;
				$this->anchos[2]=65;
				$this->anchos[3]=100;
				$this->anchos[4]=22;
				$this->anchos[5]=15;
				$this->anchos[6]=17;

		}

		function Header()
		{
			$this->settextcolor(0,0,150);
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$this->settextcolor(150,0,0);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->settextcolor(0,0,150);
			$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(5);
			$x=$this->GetX();
			$y=$this->GetY();
			$this->SetXY(210,22);
			$this->cell(50,10,"Desde el ".$this->fecorddes." al ".$this->fecordhas);
			$this->SetXY(210,27);
			$this->cell(50,10,"Status : ".$this->status);
			$this->SetXY($x,$y);
			$this->settextcolor(0,0,0);
		}
		function Cuerpo()
		{
			$this->Setwidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3],$this->anchos[4],$this->anchos[5]+3,$this->anchos[6]+5));
			$this->SetAligns(array('C','C','J','J','R','C','C'));
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			$acuact=0;
			$acuanu=0;
			while(!$tb->EOF)
			{
				 $this->setFont("Arial","",8);
				 $this->RowM(array($tb->fields["ordcom"],$tb->fields["fecord"],trim($tb->fields["nompro"]),trim($tb->fields["desord"]),H::FormatoMonto($tb->fields["monord"]),$tb->fields["status"],$tb->fields["refsol"]));
#				 $this->cell($this->anchos[0],10,);
#				 $this->cell($this->anchos[1],10,);
#				 $this->cell($this->anchos[2],10,);
#				 $this->cell($this->anchos[3],10,);
#				 $this->cell($this->anchos[4],10,,0,0,"R");
#				 $this->cell($this->anchos[5],10,);
#				 $this->cell($this->anchos[6],10,);
				 if ($tb->fields["staord"]=="A")
				 {
				     $acuact=$acuact+$tb->fields["monord"];
				 }
				 else
				 {
				     $acuanu=$acuanu+$tb->fields["monord"];
				 }
				$tb->MoveNext();
			    $this->ln(1);
			}
			$this->ln(10);
			$this->setFont("Arial","B",12);
			$this->settextcolor(0,0,150);
            $this->cell(100,10,"Total Activas: ".H::FormatoMonto($acuact),0,0,"R");
			$this->cell(100,10,"Total Anuladas: ".H::FormatoMonto($acuanu),0,0,"R");
		}
	}
?>