<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum=0;
		var $acum2=0;
		var $acum3=0;
		var $result=0;
		var $result2=0;
		var $result3=0;
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
		var $codubi;
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;
		var $fecreg1;
		var $fecreg2;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codubi=H::GetPost("codubi");
			$this->codact1=H::GetPost("codact1");//activo
			$this->codact2=H::GetPost("codact2");
			$this->codmue1=H::GetPost("codmue1");//bien
			$this->codmue2=H::GetPost("codmue2");
			$this->fecreg1=H::GetPost("fecreg1");
			$this->fecreg2=H::GetPost("fecreg2");
			$this->prenom=H::GetPost("prenom");
			$this->precar=H::GetPost("precar");
			$this->confnom=H::GetPost("confnom");
			$this->confcar=H::GetPost("confcar");
			$this->apronom=H::GetPost("apronom");
			$this->aprocar=H::GetPost("aprocar");




$this->sql="SELECT A.CODUBI  as acodubi,SUBSTR(A.CODACT,1,10) as acodact,A.CODMUE as acodmue,A.DESMUE as adesmue,generar_descripcion
(A.CODMUE) as adesmue1,A.FECCOM as afeccom,A.FECREG as afecreg,A.VALINI as avalini,A.VIDUTI as aviduti, c.desact as desact,
A.MODMUE as amodmue,A.STAMUE as astamue,A.ORDCOM as aordcom,A.MARMUE as amarmue,A.SERMUE as asermue,A.DETMUE as adetmue,B.DESUBI as bdesubi FROM BNREGMUE A,BNUBIBIE B, bndefact c
WHERE RTRIM(A.CODUBI)=RTRIM(B.CODUBI) AND RTRIM(A.CODACT) >= RTRIM('".$this->codact1."') AND
RTRIM(A.CODACT) <= RTRIM('".$this->codact2."') AND RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND
RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') and a.codact=c.codact ORDER BY A.CODUBI, A.CODACT";
// print '<pre>'; print $this->sql;exit;
/*WHERE AND
						 AND RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND RTRIM(A.CODUBI) = RTRIM('".$this->codubi."')
						AND  A.FECREG >= to_date('".$this->fecreg1."','dd/mm/yyyy') AND A.FECREG <= to_date('".$this->fecreg2."','dd/mm/yyyy') AND A.STAMUE<>'D' AND RTRIM(A.CODUBI)=RTRIM(B.CODUBI) ORDER BY A.CODMUE, A.CODACT

	*/
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,32);

	for($i=0;$i<count($this->titulos);$i++)
	{
		$this->anchos[$i]=$this->getAncho($i);
	}
		}

	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=35;
		$anchos[1]=30;
		$anchos[2]=40;
		$anchos[3]=25;
		$anchos[4]=27;
		$anchos[5]=35;
		$anchos[6]=35;
		$anchos[7]=30;
		$anchos[8]=30;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=50;
		$anchos2[1]=50;
		$anchos2[2]=50;
		$anchos2[3]=20;
		$anchos2[4]=40;
		$anchos2[5]=30;
		$anchos2[6]=30;
		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;
		$anchos2[11]=30;

		return $anchos2[$pos];
	}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código del Activo";
				$this->titulos[1]="Nro Del Registro";
				$this->titulos[2]="Descripción";
				$this->titulos[3]="";
				$this->titulos[4]="";
				$this->titulos[5]="";
				$this->titulos[6]="Monto Unitario";
				$this->titulos[7]="Observaciones";

		}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],7,$this->titulos2[$i]);
			}
			$this->Line(10,46,270,46);
   		    $this->ln();

		}


			function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$tb2=$this->bd->select($this->sql);
			$tb3=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			if(!$tb2->EOF)
			{
				$ref=$tb2->fields["acodubi"];
     			 $ref2=$tb2->fields["acodact"];
				 $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"CODIGO DE UBICACION:   ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                           ".$tb2->fields["acodubi"]);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                       ".$tb2->fields["bdesubi"]);
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->ln();
				 $this->cell(20,4,"TIPO DE ACTIVO:   ");
				 $this->cell(20,4,"                           ".$tb->fields["acodact"]);
				 $this->cell(20,4,"                                       ".$tb->fields["desact"]);
				 $this->ln();
		  		 $this->Line(10,$this->GetY(),270,$this->GetY());
			}
			while(!$tb->EOF)
			{
				if($tb->fields["acodubi"]!=$ref)
				{
				$x=1;
			    $this->SetLineWidth(0.2);
		 		 $this->setFont("Arial","B",8);

 			     $this->cell(20,6,"                                                                                                                                                                                                            Total Tipo de Activo:   ");
				 $this->cell(20,6,"                                                                                                                                                                                                                           ".H::FormatoMonto($this->acum));
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,6,"                                                                                                                                                                                                                                               Cantidad:   ");
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,6,"                                                                                                                                                                                                                                                  ".$this->result);
				 $this->ln();
				 $this->SetLineWidth(0.3);
 		 		 $this->setFont("Arial","B",8);
				 $this->ln();
				 $this->cell(20,4,"                                                                                                                                                                                                                     Total Ubicación:   ");
				 $this->cell(20,4,"                                                                                                                                                                                                                           ".H::FormatoMonto($this->acum2));
				 $this->cell(20,4,"                                                                                                                                                                                                                                           Cant. por Ubic:");
				 $this->cell(20,4,"                                                                                                                                                                                                                                                  ".$this->result2);
			 	 $this->ln();
				 $this->cont=0;
				 $this->acum2=0;
				 $this->result2=0;
 		  		 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->ln();
	 			 $this->Line(202,$this->GetY()-19,230,$this->GetY()-19);
	 			 $this->Line(235,$this->GetY()-19,270,$this->GetY()-19);
 		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"CODIGO DE UBICACION:   ");
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,4,"                           ".$tb->fields["acodubi"]);
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,4,"                                       ".$tb->fields["bdesubi"]);
				 $this->ln();
 		  		 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $this->ln();
 		        }
				$ref=$tb->fields["acodubi"];
				$this->setFont("Arial","",8);
				//Detalle

				if($tb->fields["acodact"]!=$ref2)
				{
	 			 if($x==1)
				 {
				 $this->result=0;
				 $this->acum=0;
				 $this->ln();
 				 $aux=$tb->fields["desact"];
 		 		 $this->setFont("Arial","B",8);
 				 $this->cell(20,4,"TIPO DE ACTIVO:   ");
				 $this->cell(20,4,"                           ".$tb->fields["acodact"]);
				 $this->cell(20,4,"                                       ".$tb->fields["desact"]);
	 			 $this->ln();
 		  		 $this->Line(10,$this->GetY(),270,$this->GetY());
				 $x=0;
				 }
				 else
				 {
				 $this->Line(202,$this->GetY(),230,$this->GetY());
	 			 $this->Line(235,$this->GetY(),270,$this->GetY());
		 		 $this->setFont("Arial","B",8);
 			     $this->cell(20,6,"                                                                                                                                                                                                            Total Tipo de Activo:   ");
				 $this->cell(20,6,"                                                                                                                                                                                                                           ".H::FormatoMonto($this->acum));
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,6,"                                                                                                                                                                                                                                               Cantidad:   ");
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,6,"                                                                                                                                                                                                                                                  ".$this->result);
				 $this->result=0;
				 $this->acum=0;
				 $this->ln();
 				 $aux=$tb->fields["desact"];
 		 		 $this->setFont("Arial","B",8);
 				 $this->cell(20,4,"TIPO DE ACTIVO:   ");
				 $this->cell(20,4,"                           ".$tb->fields["acodact"]);
				 $this->cell(20,4,"                                       ".$tb->fields["desact"]);
	 			 $this->ln();
 		  		 $this->Line(10,$this->GetY(),270,$this->GetY());
//				 $this->ln();
				}

				}
 		 		 $this->setFont("Arial","",8);
 		 		  $this->SetAutoPageBreak(false);
			/*	 $this->cell($this->anchos[0],5,$tb->fields["acodact"]);
				 $this->cell($this->anchos[1],4,$tb->fields["acodmue"]);
				 $yy=$this->GetY();
 				 $this->Multicell($this->anchos[2],5,$aux);
 				 $y1=$this->GetY();
 				 $this->SetXY($this->anchos[0]+$this->anchos[1]+$this->anchos[2]+10,$yy);
				 $this->cell($this->anchos[3],5,$tb->fields["amarmue"],0,0,'');
				 $y6=$this->GetY();
				 //$this->cell($this->anchos[4],5,$tb->fields["amodmue"],0,0,'');
				  $this->cell($this->anchos[4],5,'',0,0,'');
				 $x5=$this->GetX();
				 $this->Multicell($this->anchos[5]-5,3,$tb->fields["asermue"]);
				 $this->SetXY($x5+35,$y6);
				 $this->cell($this->anchos[6],5,$tb->fields["avalini"],0,0,'');
				 $this->SetXY(230,$y6);
				 $this->Multicell($this->anchos[7],5,$tb->fields["adetmue"],0,0,'');
				  $this->SetXY(130,$y6);
				 $this->Multicell($this->anchos[4],5,$tb->fields["amodmue"]);*/
				 	 $this->SetXY(10,$this->GetY());
				 $this->setaligns(array("L","L","L","L","L","L","L"));
                 $this->setwidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2]+$this->anchos[3]+$this->anchos[4]+$this->anchos[5],$this->anchos[6]));
                 $this->rowm(array($tb->fields["acodact"],$tb->fields["acodmue"],$tb->fields["adesmue1"],H::FormatoMonto($tb->fields["avalini"])));
                 $this->ln();
				 $y2=$this->GetY();
                 $this->SetAutoPageBreak(true);
 				 $this->acum=($this->acum+$tb->fields["avalini"]);
 				 $this->result=($this->result+1);
 				 $this->result2=($this->result2+1);
 				 $this->result3=($this->result3+1);
 				 $this->acum2=($this->acum2+$tb->fields["avalini"]);
 				 $this->acum3=($this->acum3+$tb->fields["avalini"]);
				 if ($y1>$y2){
				 $this->SetY($y1);}
				 else $this->SetY($y2);
				 $this->ln();
				   if ($this->GetY()>=170){
				 	$this->AddPage();
				 }
				 $ref2=$tb->fields["acodact"];
				 $tb->MoveNext();

			}
		 		 $this->setFont("Arial","B",8);
 				 $this->Line(202,$this->GetY(),230,$this->GetY());
	 			 $this->Line(235,$this->GetY(),270,$this->GetY());
 			     $this->cell(20,6,"                                                                                                                                                                                                            Total Tipo de Activo:   ");
				 $this->cell(20,6,"                                                                                                                                                                                                                           ".H::FormatoMonto($this->acum));
		 		 $this->setFont("Arial","",8);
				 $this->cell(20,6,"                                                                                                                                                                                                                                               Cantidad:   ");
		 		 $this->setFont("Arial","B",8);
				 $this->cell(20,6,"                                                                                                                                                                                                                                                  ".$this->result);
				 $this->ln();
				 $this->ln();
		 		 $this->setFont("Arial","",8);
				 $this->Line(202,$this->GetY(),230,$this->GetY());
	 			 $this->Line(235,$this->GetY(),270,$this->GetY());
		 		 $this->setFont("Arial","B",8);
 				 $this->cell(20,6,"                                                                                                                                                                                                            Total Ubicación:            ".H::FormatoMonto($this->acum2));
 				 $this->cell(20,6,"                                                                                                                                                                                                                                                                        Cant. por Ubic:  ".$this->result2);
				 $this->SetLineWidth(0.5);
				 $this->ln();
				 $this->ln();
		 		 $this->setFont("Arial","B",8);
				 $this->Line(202,$this->GetY(),230,$this->GetY());
	 			 $this->Line(235,$this->GetY(),270,$this->GetY());
 				 $this->cell(20,6,"                                                                                                                                                                                                            Total General:               ".H::FormatoMonto($this->acum3));
 				 $this->cell(20,6,"                                                                                                                                                                                                                                                                        Cantidad Total:  ".$this->result3);
				 $this->SetLineWidth(0.2);
				$this->SetY(-30);
				$this->Line(10,$this->GetY(),270,$this->GetY());
				$this->Line(10,$this->GetY(),10,$this->GetY()+25);
				$this->Line(100,$this->GetY(),100,$this->GetY()+25);
				$this->Line(180,$this->GetY(),180,$this->GetY()+25);
				$this->Line(270,$this->GetY(),270,$this->GetY()+25);
				$this->cell(90,5,"Preparación",0,0,'L');
				$this->cell(81,5,"Conformación",0,0,'L');
				$this->cell(90,5,"Aprobación",0,0,'L');
				$this->ln();
				$this->setFont("Arial","",8);
				$this->cell(90,5,"Nombre:  ".$this->prenom);
				$this->cell(81,5,"".$this->confnom);
				$this->cell(90,5,"".$this->apronom);
				$this->ln();
				$this->Line(10,$this->GetY(),270,$this->GetY());
				$this->cell(90,7,"Cargo:     ".$this->precar);
				$this->cell(81,7,$this->confcar);
				$this->cell(90,7,$this->aprocar);
				$this->ln();
				$this->Line(10,$this->GetY(),270,$this->GetY());
				$this->cell(0,8,"Firma:");
				$this->ln();
				$this->Line(10,$this->GetY(),270,$this->GetY());
		}

	}

?>