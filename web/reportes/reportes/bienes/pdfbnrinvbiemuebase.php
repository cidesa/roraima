<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/Cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/sqls/bienes/Bnrinvbiemuebase.class.php");

	class pdfreporte extends fpdf
	{

		var $total_activo=0;
		var $acum_activo=0;
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
		var $codactdes;
		var $codacthas;
		var $codmuedes;
		var $codmuehas;
		var $fecregdes;
		var $fecreghas;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;

		function pdfreporte()
		{
			//$this->fpdf("l","mm","Letter");
			parent::FPDF("L");
			$this->bd        = new basedatosAdo();
			$this->titulos   = array();
			$this->titulos2  = array();
			$this->campos    = array();
			$this->anchos    = array();
			$this->anchos2   = array();
			//$this->codubi    = H::GetPost("codubi");
			$this->codactdes = H::GetPost("codactdes");
			$this->codacthas = H::GetPost("codacthas");
			$this->codmuedes = H::GetPost("codmuedes");
			$this->codmuehas = H::GetPost("codmuehas");
			$this->fecdes = H::GetPost("fecdes");
			$this->fechas = H::GetPost("fechas");
			$this->prepardes = H::GetPost("prepardes");
			$this->preparhas = H::GetPost("preparhas");
			$this->confordes = H::GetPost("confordes");
			$this->conforhas = H::GetPost("conforhas");
			$this->aprobades = H::GetPost("aprobades");
			$this->aprobahas = H::GetPost("aprobahas");

			$this->bnrinvbiemue = new Bnrinvbiemuebase();
		    $this->arrp=$this->bnrinvbiemue->sqlp($this->codactdes, $this->codacthas,$this->codmuedes,$this->codmuehas,$this->fecdes,$this->fechas);

		    //h::printR($this->arrp);

			$this->llenartitulosmaestro();
			$this->cab = new cabecera();
			$this->SetAutoPageBreak(true,40);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Codigo del Activo";
				$this->titulos[1]="Gru  SGR  SEC  NOM";
				$this->titulos[2]="Identif.";
				$this->titulos[3]="Descripcion";
				$this->titulos[4]="Ubicacion";
				$this->titulos[5]="Monto del Mueble";
		}

		function Header()
		{
			$this->SetTextColor(0,0,150);
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setFont("Arial","B",10);
			$this->SetTextColor(150,0,0);


		}

		function Footer()
		{
			$this->SetY(-30);
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->Line(10,$this->GetY(),10,$this->GetY()+25);
			$this->Line(100,$this->GetY(),100,$this->GetY()+25);
			$this->Line(180,$this->GetY(),180,$this->GetY()+25);
			$this->Line(270,$this->GetY(),270,$this->GetY()+25);
			$this->SetTextColor(150,0,0);
			$this->setFont("Arial","",11);
			$this->cell(0,5,"Preparacion                                                                             Conformacion                                                 Aprobacion");
			$this->ln();
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",10);
			$this->cell(80,5,"Nombre:                       ".$this->prepardes);
			$this->cell(80,5,"    	".$this->confordes,0,0,'R');
			$this->cell(80,5,"		".$this->aprobades,0,0,'R');
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->cell(80,7,"Cargo:                               ".$this->preparhas);
			$this->cell(70,7,"  	".$this->conforhas,0,0,'R');
			$this->cell(70,7,"		".$this->aprobahas,0,0,'R');
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
			$this->cell(0,8,"Firma:");
			$this->ln();
			$this->Line(10,$this->GetY(),270,$this->GetY());
		}

		function Cuerpo()
		{
			$this->setFont("Arial","B",8);

			$this->setWidths(array(30,30,100,60,30));
			$this->setaligns(array("L","C","C","C","C"));
			$acodubi="";
			foreach($this->arrp as $arrp)
			{
				if ($acodubi!=$arrp["acodubi"])
				{
					if ($acodubi)   //Fin de la linea del tipo del Mueble
					{
						 $this->ln();
			 			 $this->Line(235,$this->GetY(),270,$this->GetY());
				 		 $this->setFont("Arial","B",8);
				 		 $this->SetTextColor(0,0,150);
				 		 $this->SetX(200);
		 			     $this->cell(45,6,"Total Tipo de Activo:");
		 			     $this->cell(20,5,H::FormatoMonto($this->total_activo),0,0,'R');
				 		 $this->setFont("Arial","",8);
				 		 $this->SetTextColor(0,0,150);
				 		  $this->ln();
				 		 $this->SetX(200);
						 $this->cell(45,6,"Cantidad de Activo:");
						 $this->cell(20,5,$this->acum_activo,0,0,'R');
						 $this->total_activo = 0;
						 $this->acum_activo  = 0;

						$this->AddPage();
					}
					 $acodubi    = $arrp["acodubi"];
	     			 $ref2       = $arrp["acodact"];
					 $this->SetLineWidth(0.2);
					 $this->setFont("Arial","B",9);
			 		 $this->SetTextColor(150,0,0);
					 $this->cell(20,4,"Unidad de Trabajo:   ");
					 $this->SetTextColor(0,0,0);
			 		 $this->setFont("Arial","B",8);
					 $this->cell(20,4,"                           ".$arrp["acodubi"]);
			 		 $this->cell(20,4,"                                       ".$arrp["bdesubi"]);
			 		 $this->ln(4);
			 		 $this->setFont("Arial","B",9);
			 		 $this->SetTextColor(150,0,0);
					 $this->cell(20,4,"Ubicacion Administrativa:   ");
					 $this->SetTextColor(0,0,0);
			 		 $this->setFont("Arial","B",8);
					 $this->cell(20,4,"                           ".$arrp["acodubi"]);
			 		 $this->cell(20,4,"                                       ".$arrp["bdesubi"]);
			 		 //$this->cell(190,4,"   Jefa de la Unidad:  "./*debe venir de la base de datos=>*/"",0,0,"R");
					 $this->ln();

 					 $this->setFont("Arial","B",9);
					 $this->SetTextColor(150,0,0);
					 $this->cell(20,4,"Ubicacion Geografica:   ");
					 $this->SetTextColor(0,0,0);
					 $this->SetTextColor(0,0,0);
			 		 $this->setFont("Arial","",8);
					 $this->cell(20,4,"                           ".$arrp["adirubi"]);//DEBE SER DIRUBI PERO EL CAMPO NO EXISTE
					 $this->ln();
			  		 $this->Line(10,$this->GetY(),270,$this->GetY());
					 $this->ln(4);

					 $this->SetTextColor(150,0,0);
					 $this->Row(array($this->titulos[1],$this->titulos[2],$this->titulos[3],$this->titulos[4],$this->titulos[5]));
					 $this->ln(3);
					 $this->cell(0,7,$this->titulos[8]);
					 $this->SetTextColor(0,0,0);
					 $this->ln(5);
					  $this->Line(10,$this->GetY()-3,270,$this->GetY()-3);
				}

				///Detalles
				 $this->SetLineWidth(0.2);
 				 $this->setFont("Arial","",8);
 				 $this->setaligns(array("L","C","L","L","R"));
 				 $this->Row(array(substr($arrp["acodact"],0,1)."      ".substr($arrp["acodact"],2,2)."      ".substr($arrp["acodact"],3,1)."       ".substr($arrp["acodact"],7,3),
				 				 "     ".$arrp["acodmue"],$arrp["adesmue"],$arrp["bdesubi"],H::FormatoMonto($arrp["avalini"])));
				 /*$this->cell(7,5,substr($arrp["acodact"],0,1));
				 $this->cell(9,5,substr($arrp["acodact"],2,2));
				 $this->cell(7,5,substr($arrp["acodact"],3,1));
				 $this->cell(12,5,substr($arrp["acodact"],7,3));
				 $this->cell($this->anchos[1],5,$arrp["acodmue"]);
 				 $this->cell($this->anchos[2],5,substr($arrp["bdisubi"],0,20));
				 $this->cell($this->anchos[7],5,H::FormatoMonto($arrp["avalini"]),0,0,'R');*/
 				 $this->total_activo=($this->total_activo+$arrp["avalini"]);
 				 $this->acum_activo++;
			}

			 $this->ln();
 			 $this->Line(235,$this->GetY(),270,$this->GetY());
	 		 $this->setFont("Arial","B",8);
	 		 $this->SetTextColor(0,0,150);
	 		 $this->SetX(200);
		     $this->cell(45,6,"Total Tipo de Activo:");
		     $this->cell(20,5,H::FormatoMonto($this->total_activo),0,0,'R');
	 		 $this->setFont("Arial","",8);
	 		 $this->SetTextColor(0,0,150);
	 		  $this->ln();
	 		 $this->SetX(200);
			 $this->cell(45,6,"Cantidad de Activo:");
			 $this->cell(20,5,$this->acum_activo,0,0,'R');
			 $this->total_activo = 0;
			 $this->acum_activo  = 0;

		}

	}

?>