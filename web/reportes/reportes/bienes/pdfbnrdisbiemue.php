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
		var $anchos;
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
		var $nrodismue1;
		var $nrodismue2;
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
			$this->anchos=array();
			$this->anchos2=array();
			$this->codact1=$_POST["codact1"];
			$this->codact2=$_POST["codact2"];
			$this->codmue1=$_POST["codmue1"];
			$this->codmue2=$_POST["codmue2"];
			$this->nrodismue1=$_POST["nrodismue1"];
			$this->nrodismue2=$_POST["nrodismue2"];
			$this->fecdis1=$_POST["fecdis1"];
			$this->fecdis2=$_POST["fecdis2"];
			$this->codubiori1=$_POST["codubiori1"];
			$this->codubiori2=$_POST["codubiori2"];
			$this->tipdismue1=$_POST["tipdismue1"];
			$this->tipdismue2=$_POST["tipdismue2"];
			$this->prenom=$_POST["prenom"];
			$this->precar=$_POST["precar"];
			$this->confnom=$_POST["confnom"];
			$this->confcar=$_POST["confcar"];
			$this->apronom=$_POST["apronom"];
			$this->aprocar=$_POST["aprocar"];


				$this->sql="SELECT A.CODACT as acodact,A.CODMUE as acodmue,generar_descripcion(A.CODMUE) as adesmue,A.NRODISMUE as anrodismue,A.MOTDISMUE as amotdismue,A.TIPDISMUE as atipdismue,
							to_char(A.FECDISMUE,'DD/MM/YYYY') as afecdismue,to_char(A.FECDEVDIS,'DD/MM/YYYY') as afecdevdis,A.MONDISMUE as amondismue,A.DETDISMUE as adetdismue,
							A.CODUBIORI as acodubiori,A.CODUBIDES as acodubides,A.OBSDISMUE as aobsdismue FROM BNDISMUE A, BNREGMUE B
							WHERE A.CODACT=B.CODACT AND A.CODMUE=B.CODMUE AND
							RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND
							RTRIM(A.NRODISMUE) >= RTRIM('".$this->nrodismue1."') AND RTRIM(A.NRODISMUE) <= RTRIM('".$this->nrodismue2."') AND
							RTRIM(A.CODUBIORI) >= RTRIM('".$this->codubiori1."') AND RTRIM(A.CODUBIORI) <= RTRIM('".$this->codubiori2."') AND
							RTRIM(A.TIPDISMUE) >= RTRIM('".$this->tipdismue1."') AND RTRIM(A.TIPDISMUE) <= RTRIM('".$this->tipdismue2."') AND
							A.CODACT >= RTRIM('".$this->codact1."') AND A.CODACT <= RTRIM('".$this->codact2."') ORDER BY A.NRODISMUE";
//print '<pre>'; print $this->sql;
			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO DEL ACTIVO";
				$this->titulos[1]="DESCRIPCION";
				$this->titulos[2]="TIPO";
				$this->titulos[3]="FECHA DISPOSICION";
				$this->titulos[4]="FECHA DEVOLUCION";
		}
		function llenartitulosdetalle()
		{
				$this->titulos2[0]="CODIGO";
				$this->titulos2[1]="DETALLES";
				$this->titulos2[2]="MONTO";
				$this->titulos2[3]="ORIGEN";
				$this->titulos2[4]="DESTINO";
				$this->titulos2[5]="Nro. DISP";
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
		    $tb2=$tb;
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

//			if(!$tb->EOF)
	//		{
			while(!$tb->EOF)
			{

				$this->setFont("Arial","",8);
				 $this->cell($this->anchos[0],3,$tb->fields["acodact"]);
				 $x=$this->GetX();
				 $y=$this->GetY();
				 $this->cell(60);
				 $xx=$this->GetX();
				// $this->cell($this->anchos[1],7,$tb->fields["adesmue"]);
				$this->cell(60);

				 //$this->cell($this->anchos[2],3,$tb->fields["atipdismue"]);
				 $this->cell(20);
				 $this->cell($this->anchos[3],3,$tb->fields["afecdismue"]);
				 $this->cell($this->anchos[4],3,$tb->fields["afecdevdis"]);
				 $this->SetX($x);
				 $this->MultiCell($this->anchos[1]-25,3,$tb->fields["adesmue"]);
				 $this->SetXY($xx,$y);
				 $this->MultiCell($this->anchos[2],3,$tb->fields["atipdismue"]);
			 	 $this->ln();
				 $aux=$tb->fields["adetdismue"];
				 $this->cell($this->anchos2[0],7," ");
				 $this->cell($this->anchos2[1],7,substr($aux,0,20));
				 $this->cell($this->anchos2[2],7,number_format($tb->fields["amondismue"],2,',','.'));
				 $this->cell($this->anchos2[3],7,$tb->fields["acodubiori"]);
				 $this->cell($this->anchos2[4],7,$tb->fields["acodubides"]);
				 $this->cell($this->anchos2[5],7,$tb->fields["anrodismue"]);
				 $this->acum=($this->acum+$tb->fields["amondismue"]);
				 $this->ln(10);
				 $y=$this->GetY();
				$tb->MoveNext();
				if ($y>=170)
				{
					$this->AddPage();
				}
			}
				$this->setFont("Arial","B",10);
				$this->line(10,$y,270,$y);
				$this->SetX(80);
				$this->cell(20,5,"Total General  ".number_format($this->acum,2,',','.'),0,0,"");
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