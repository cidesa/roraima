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
		var $codesde;
		var $codhasta;
		var $fecinv;
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
			$this->codesde=H::GetPost("codartdes");
			$this->codhasta=H::GetPost("codarthas");
			$this->fecinv=H::GetPost("fecinv");
			$this->maxcodalm=H::GetPost("maxcodalm");
			$this->mincodalm=H::GetPost("mincodalm");

			$this->sql="SELECT
							A.CODART as codart,
							A.DESART as desart,
							C.exiact as exitot,
							A.COSPRO as cospro,
							B.EXIACT as exiact
						FROM CAREGART A, CAINVFIS B,CAARTALM C
						WHERE
							(A.CODART) = (B.CODART) AND
							(A.CODART) >= ('".$this->codesde."') AND
							(A.CODART) <= ('".$this->codhasta."') AND
							B.FECINV = to_date('".$this->fecinv."','dd/mm/yyyy')  and
							B.codalm>= ('".$this->mincodalm."') and B.codalm<= ('".$this->maxcodalm."') AND
							A.CODART=C.CODART AND
							B.CODALM=C.CODALM
						ORDER BY A.CODART";
							//print '<pre>';print $this->sql;
			$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código Artículo";
				$this->titulos[1]="Descripción Artículo";
				$this->titulos[2]="Cantidad";
				$this->titulos[3]="Costo Promedio";
				$this->titulos[4]="            Valor Total";
				$this->titulos[5]="  Cantidad";
				$this->titulos[6]="            Valor Total";
				$this->titulos[7]="  Cantidad";
				$this->titulos[8]="            Valor Total";
				$this->anchos[0]=40;
				$this->anchos[1]=60;
				$this->anchos[2]=15;
				$this->anchos[3]=25;
				$this->anchos[4]=30;
				$this->anchos[5]=15;
				$this->anchos[6]=30;
				$this->anchos[7]=15;
				$this->anchos[8]=30;

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s");
			/*$this->cell($this->anchos[0],5,'  ');
			$this->cell($this->anchos[1],5,'  ');
			$this->setFont("Arial","BU",9);
			$this->cell($this->anchos[2],5,'                       ');
			$this->cell($this->anchos[3],5,'    LOGICO(A)          ');
			$this->cell($this->anchos[4],5,'                               ');
			$this->cell($this->anchos[5],5,'        FISICO(B)         ');
			$this->cell($this->anchos[6],5,'                               ');
			$this->cell($this->anchos[7],5,'  DIFERENCIA(A - B)        ');
			$this->cell($this->anchos[7],5,'                               ');*/
		//	$this->ln(1);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);


           //  $this->ln();
			 $this->setwidths(array(40,80,40,40,40));
			 $this->setaligns(array("L","L","R","R","R","R","R","R","R"));
			 $this->rowm(array("Código Artículo","Descripción Artículo","Cantidad LOGICO(A)","Cantidad FISICO(B)"," DIFERENCIA(A - B)"));

/*
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}*/
			$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(4);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$acum4=0;
			$acum5=0;
			$acum6=0;
			$acum7=0;
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);
/* $this->cell($this->anchos[0],10,$tb->fields["codart"]);
 $this->cell($this->anchos[1],10,$tb->fields["desart"]);
 $this->cell($this->anchos[2],10,$tb->fields["exitot"],0,0,'R');
 $this->cell($this->anchos[3],10,H::FormatoMonto($tb->fields["cospro"]),0,0,'R');
 $this->cell($this->anchos[4],10,H::FormatoMonto($tb->fields["exitot"]*$tb->fields["cospro"]),0,0,'R');
 $this->cell($this->anchos[5],10,$tb->fields["exiact"],0,0,'R');
 $this->cell($this->anchos[6],10,H::FormatoMonto($tb->fields["exiact"]*$tb->fields["cospro"]),0,0,'R');
 $this->cell($this->anchos[7],10,$tb->fields["exiact"]-$tb->fields["exitot"],0,0,'R');
 $this->cell($this->anchos[8],10,H::FormatoMonto(($tb->fields["exiact"]-$tb->fields["exitot"])*$tb->fields["cospro"]),0,0,'R');*/


			 $this->setwidths(array(40,80,40,40,40));
			 $this->setaligns(array("L","L","R","R","R","R","R","R","R"));
			 $this->rowm(array($tb->fields["codart"],$tb->fields["desart"],$tb->fields["exitot"],$tb->fields["exiact"],H::FormatoMonto($tb->fields["exiact"]-$tb->fields["exitot"])));


				 $acum1=$acum1+	$tb->fields["exitot"];
				 $acum2=$acum2+ $tb->fields["cospro"];
				 $acum3=$acum3+ ($tb->fields["exitot"]);
				 $acum4=$acum4+ $tb->fields["exiact"];
				 $acum5=$acum5+ ($tb->fields["exiact"]);
				 $acum6=$acum6+ ($tb->fields["exiact"]-$tb->fields["exitot"]);
				 $acum7=$acum7+ (($tb->fields["exiact"]-$tb->fields["exitot"]));
				$tb->MoveNext();
			    $this->ln(3);
			}
				$this->ln(4);
				$this->line(10,$this->getY(),270,$this->getY());
				//$this->ln(1);
				 $this->cell($this->anchos[0],10,'TOTALES ');
				 $this->cell($this->anchos[1],10,'        ');
				 $this->cell($this->anchos[2],10,'',0,0,'R');
				 $this->cell($this->anchos[3]-10,10,'',0,0,'R');
				 $this->cell($this->anchos[4],10,H::FormatoMonto($acum3),0,0,'R');
				 $this->cell($this->anchos[5],10,'',0,0,'R');
				 $this->cell($this->anchos[6],10,H::FormatoMonto($acum5),0,0,'R');
				 $this->cell($this->anchos[7],10,'',0,0,'R');
				 $this->cell($this->anchos[8],10,H::FormatoMonto($acum7),0,0,'R');
		}
	}
?>