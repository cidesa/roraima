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
		var $fecdesde;
		var $fechasta;
		var $conf;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->maxcodalm2=H::GetPost("maxcodalm2");
			$this->mincodalm=H::GetPost("mincodalm");
				$this->maxcodart=H::GetPost("maxcodart");
			$this->mincodart=H::GetPost("mincodart");
			$this->sql="
SELECT

							A.CODALM as codalm,
							B.NOMALM as nomalm,
							A.CODART as codart,
							C.DESART as desart,
							C.COSULT as cosult,
							A.EXIACT as exiact
						FROM CAARTALM A, CADEFALM B, CAREGART C
						WHERE
							(A.CODALM)=(B.CODALM) AND
							(A.CODART)=(C.CODART)   and
		                    a.codalm>= ('".$this->mincodalm."') and
                            a.codalm<= ('".$this->maxcodalm2."') and
                            a.codart>= ('".$this->mincodart."') and
                            a.codart<= ('".$this->maxcodart."')
						ORDER BY A.CODALM, C.codart
					";
//						print '<pre>'; print $this->sql;

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo Recaudo";
				$this->titulos[1]="Descripción del Recaudo";
				$this->anchos[0]=40;
				$this->anchos[1]=100;
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s");
			$this->setFont("Arial","B",9);
			$this->ln(5);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$num=0;
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			if(!$tb2->EOF)
			{
					//	 $this->cell(30,-5,'Fecha Inventario:');
			$this->cell(30,-5,'');
				 $this->Line(10,45,200,45);
				 $this->setFont("Arial","",8);
			//	 $this->cell(15,-5,$tb->fields["fecha"]);
				 $this->cell(15,-5,"");
				 $this->ln(1);
				 $this->setFont("Arial","B",8);
				 $this->cell(30,10,'Código Unidad');
				 $this->cell(50,10,'Descripción Unidad');
				 $this->ln(5);
				 $this->setFont("Arial","",8);
				 $this->cell(30,10,$tb2->fields["codalm"]);
				 $this->cell(50,10,$tb2->fields["nomalm"]);
				 $this->Line(10,55,200,55);
				 $this->setFont("Arial","B",8);
				 $this->ln(6);
			/*	 $this->cell(25,8,'Código Artículo');
				 $this->cell(60,8,'Descripción Artículos');
				 $this->cell(30,8,'Existencia Actual',0,0,'R');
				 $this->cell(30,8,'Costo Unitario',0,0,'R');
				 $this->cell(30,8,'Costo Total',0,0,'R');*/
				  $this->ln(2);
				  $this->setwidths(array(30,55,30,30,30));
			 $this->setaligns(array("C","C","C","C","C"));
			 $this->rowm(array('Código Artículo','Descripción Artículos','Existencia Actual','Costo Unitario','Costo Total'));
				 $this->ln();
				 $this->Line(10,$this->getY(),200,$this->getY());
				 $ref=$tb2->fields["codalm"];
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codalm"]!=$ref)
				{
				 //Subtotales
				 $this->ln(2);
				 $this->line(85,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'');
				 $this->cell(60,5,'SubTotales:',0,0,'R');
				 $this->cell(30,5,H::FormatoMonto($acum1),0,0,'R');
				 $totacum1=$totacum1 + $acum1;
				 $this->cell(30,5,H::FormatoMonto($acum2),0,0,'R');
				 $totacum2=$totacum2 + $acum2;
				 $this->cell(30,5,H::FormatoMonto($acum3),0,0,'R');
				 $totacum3=$totacum3 + $acum3;
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 $this->ln(5);
				 //
			//	 $this->cell(30,-5,'Fecha Inventario:');
			$this->cell(30,-5,'');
				 $this->Line(10,45,200,45);

				 $this->setFont("Arial","",8);
			//	 $this->cell(15,-5,$tb->fields["fecha"]);
				 $this->cell(15,-5,"");
				 $this->ln(1);
				 $this->setFont("Arial","B",8);
				 $this->cell(30,10,'Código Unidad');
				 $this->cell(50,10,'Descripción Unidad');
				 $this->ln(5);
				 $this->setFont("Arial","",8);
				 $this->cell(30,10,$tb->fields["codalm"]);
				 $this->cell(50,10,$tb->fields["nomalm"]);
				 $this->Line(10,55,200,55);
				 $this->setFont("Arial","B",8);
				 $this->ln();
				/* $this->cell(25,8,'Código Artículo');
				 $this->cell(60,8,'Descripción Artículos');
				 $this->cell(30,8,'Existencia Actual',0,0,'R');
				 $this->cell(30,8,'Costo Unitario',0,0,'R');
				 $this->cell(30,8,'Costo Total',0,0,'R');*/
			     $this->setwidths(array(30,55,30,30,30));
			     $this->setaligns(array("C","C","C","C","C"));
			     $this->rowm(array('Código Artículo','Descripción Artículos','Existencia Actual','Costo Unitario','Costo Total'));

			//	 $this->ln();
				 $this->Line(10,$this->getY(),200,$this->getY());
				 }
				 //detalle
				 $ref=$tb->fields["codalm"];
				 $this->setFont("Arial","",8);
			//	 $this->cell(25,5,$tb->fields["codart"]);
			//	 $this->cell(60,5,$tb->fields["desart"]);
			//	 $this->cell(30,5,H::FormatoMonto($tb->fields["exiact"]),0,0,'R');
				 $acum1=$acum1 + $tb->fields["exiact"];
			//	 $this->cell(30,5,H::FormatoMonto($tb->fields["cosult"]),0,0,'R');
				 $acum2=$acum2 + $tb->fields["cosult"];
			//	 $this->cell(30,5,H::FormatoMonto($tb->fields["cosult"]*$tb->fields["exiact"]),0,0,'R');
				 $acum3=$acum3 + ($tb->fields["cosult"]*$tb->fields["exiact"]);

				 $this->setwidths(array(25,60,30,30,30));
		    	 $this->setaligns(array("L","L","R","R","R"));
			     $this->rowm(array($tb->fields["codart"],$tb->fields["desart"],H::FormatoMonto($tb->fields["exiact"]),H::FormatoMonto($tb->fields["cosult"]),H::FormatoMonto($tb->fields["cosult"]*$tb->fields["exiact"])));
                   if ($this->gety()>230){
                   	$this->addpage();
                   	 $this->setFont("Arial","B",8);
                   	 $this->setwidths(array(30,55,30,30,30));
			     $this->setaligns(array("C","C","C","C","C"));
			     $this->rowm(array('Código Artículo','Descripción Artículos','Existencia Actual','Costo Unitario','Costo Total'));
			      $this->Line(10,$this->getY(),200,$this->getY());
			     $this->setFont("Arial","",8);
                   }

				 $tb->MoveNext();
			     $this->ln(3);
			}
				 //Subtotales
				 $this->ln(2);
				 $this->line(85,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'');
				 $this->cell(60,5,'SubTotales:',0,0,'R');
				 $this->cell(30,5,H::FormatoMonto($acum1),0,0,'R');
				 $totacum1=$totacum1 + $acum1;
				 $this->cell(30,5,H::FormatoMonto($acum2),0,0,'R');
				 $totacum2=$totacum2 + $acum2;
				 $this->cell(30,5,H::FormatoMonto($acum3),0,0,'R');
				 $totacum3=$totacum3 + $acum3;
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 $this->ln(5);
				 //
				 //Totales
				 $this->ln(2);
				 $this->line(85,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'');
				 $this->cell(60,5,'Totales:',0,0,'R');
				 $this->cell(30,5,H::FormatoMonto($totacum1),0,0,'R');
				 $totacum1=0;
				 $this->cell(30,5,H::FormatoMonto($totacum2),0,0,'R');
				 $totacum2=0;
				 $this->cell(30,5,H::FormatoMonto($totacum3),0,0,'R');
				 $totacum3=0;
				 //
		}
	}
?>