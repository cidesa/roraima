<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $acum=0;
		var $bd;
		var $titulos;
		var $titulos2;
		var $ancho;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;
		var $nrodisinm1;
		var $nrodisinm2;
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
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->ancho=array();
			$this->anchos2=array();
			$this->codact1=$_POST["codact1"];
			$this->codact2=$_POST["codact2"];
			$this->codmue1=$_POST["codmue1"];
			$this->codmue2=$_POST["codmue2"];
			$this->nrodisinm1=$_POST["nrodisinm1"];
			$this->nrodisinm2=$_POST["nrodisinm2"];
			$this->fecdis1=$_POST["fecdis1"];
			$this->fecdis2=$_POST["fecdis2"];
			$this->codubiori1=$_POST["codubiori1"];
			$this->codubiori2=$_POST["codubiori2"];
			$this->tipdisinm1=$_POST["tipdisinm1"];
			$this->tipdisinm2=$_POST["tipdisinm2"];
			$this->prenom=$_POST["prenom"];
			$this->precar=$_POST["precar"];
			$this->confnom=$_POST["confnom"];
			$this->confcar=$_POST["confcar"];
			$this->apronom=$_POST["apronom"];
			$this->aprocar=$_POST["aprocar"];




				$this->sql="SELECT A.CODACT as acodact,A.CODMUE as acodmue,B.DESINM as adesinm,A.NRODISINM as anrodisinm,A.MONDISINM as amondisinm,A.TIPDISINM as atipdisinm,
							A.FECDISINM as afecdisinm,A.FECDEVDIS as afecdevdis,A.MOTDISINM as amotdisinm,A.DETDISINM as adetdisinm,
							A.CODUBIORI as acodubiori,A.CODUBIDES as acodubides,A.OBSDISINM as aobsdisinm FROM BNDISINM A, BNREGINM B
							WHERE RTRIM(A.CODACT)=RTRIM(B.CODACT) AND RTRIM(A.CODMUE)=RTRIM(B.CODINM) AND
							RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND
							RTRIM(A.NRODISINM) >= RTRIM('".$this->nrodisinm1."') AND RTRIM(A.NRODISINM) <= RTRIM('".$this->nrodisinm2."') AND
							A.CODACT >= '".$this->codact1."' AND A.CODACT <= '".$this->codact2."'";

			//$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			$this->ancho();
			$this->cab=new cabecera();

		}

		function llenartitulosdetalle()
		{
				$this->titulos2[0]="DETALLES";
				$this->titulos2[1]="ORIGEN";
				$this->titulos2[2]="DESTINO";

		}

	function ancho()
		{
				$this->ancho[0]=10;
				$this->ancho[1]=10;
				$this->ancho[2]=60;
				$this->ancho[3]=15;
				$this->ancho[4]=20;
				$this->ancho[5]=15;
				$this->ancho[6]=15;
				$this->ancho[7]=20;
				$this->ancho[8]=15;
		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
			$this->ln();
			for($i=0;$i<$ncampos2;$i++)
			{
				$this->cell($this->anchos2[$i],10,$this->titulos2[$i]);
			}
			$this->ln();
			$this->Line(10,55,270,55);
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);
			$this->SetXY(10,40);
			$this->SetFont("Arial","B",9);
			$this->cell(20,3,"CODIGO DEL ACTIVO");
			$this->SetXY(50,40);
			$this->cell(50,3,"DESCRIPCION");
			$this->SetXY(100,40);
			$this->cell(15,3,"Nro DISPOSICION");
			$this->SetXY(135,40);
			$this->cell(15,3,"TIPO");
			$this->SetXY(155,40);
			$this->cell(30,3,"MOTIVO");
			$this->SetXY(185,40);
			$this->cell(20,3,"MONTO");
			$this->SetXY(210,40);
			$this->cell(20,3,"FECHA DISP INM");
			$this->SetXY(245,40);
			$this->cell(20,3,"FECHA DEV INM");

			while(!$tb->EOF)
			{

				$this->setFont("Arial","",8);
				 $this->cell($this->ancho[0]+10,$tb->fields["acodact"]);
				 $this->cell($this->ancho[1],$tb->fields["acodmue"]);
				 $x=$this->Getx();
				 $this->cell(60);
				 //$this->cell($this->anchos[2],7,substr($tb->fields["adesinm"],0,40));
				 $this->cell($this->ancho[3],$tb->fields["anrodisinm"]);
				 $this->cell($this->ancho[4],$tb->fields["atipdisinm"]);
				 $this->cell($this->ancho[5],$tb->fields["amotdisinm"]);
				 $this->cell($this->ancho[6],$tb->fields["amondisinm"]);
				 $this->cell($this->ancho[7],$tb->fields["afecdisinm"]);
				 $this->cell($this->ancho[8],$tb->fields["afecdevdis"]);
				 $this->SetX($x);
				 $this->MultiCell($this->ancho[2],substr($tb->fields["adesinm"],0,40));
			 	 $this->ln();
				 $aux=$tb->fields["adetdisinm"];
				 $this->cell($this->anchos2[0],3,substr($aux,0,20));
				 //$this->cell($this->anchos2[1],3,$tb->fields["amondisinm"]);
				 $this->cell($this->anchos2[1],3,$tb->fields["acodubiori"]);
				 $this->cell($this->anchos2[2],3,$tb->fields["acodubides"]);
				 //$this->cell($this->anchos2[4],3,$tb->fields["aobsdisinm"]);
				 $this->acum=($this->acum+$tb->fields["amondisinm"]);
				 $this->ln();
				 $y=$this->GetY();
				$tb->MoveNext();
				if ($y>=170)
				{
					$this->AddPage();
				}
			}
				$y=$this->GetY();
				$this->SetXY(180,$y+20);
			    $this->setFont("Arial","B",8);
				$this->cell(20,10,"Total General     ".number_format($this->acum,2,',','.'));
				if ($y>=170)

				{
					$this->SetY(-20);
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
				else
				{
					$this->SetY(-50);
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
		//	}
		}
	}
?>