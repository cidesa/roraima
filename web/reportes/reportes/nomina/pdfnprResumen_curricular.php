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
		var $codesde;
		var $codhasta;
		var $estado;
		var $conf;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codesde=$_POST["coddesde"];
			$this->codhasta=$_POST["codhasta"];
			$this->estado=$_POST["estado"];
			$this->sql="SELECT
						distinct	A.CODEMP as codemp,
							A.NOMEMP as nomemp,
							A.CEDEMP as cedemp,
							A.NUMCON as numcon, B.nomcar as nomcar,
							(CASE WHEN A.EDOCIV='S' THEN 'Soltero' WHEN A.EDOCIV='C' THEN 'Casado' WHEN A.EDOCIV='D' THEN 'Divorciado' WHEN A.EDOCIV='V' THEN 'Viudo' ELSE '' END) as edociv,
							(CASE WHEN A.NACEMP='V' THEN 'Venezolano' ELSE 'Extranjero' END) as nacemp,
							(CASE WHEN A.SEXEMP='F' THEN 'Femenino' ELSE 'Masculino' END) as sexemp,
							to_char(A.FECNAC,'dd/mm/yyyy') as fecnac,
							A.EDAEMP as edaemp,
							A.LUGNAC as lugnac,
							substr(A.DIRHAB,1,45) as dirhab,
							A.CODCIU as codciu,
							--C.nompai AS codpai,
									A.CODPAI AS codpai,
							A.TELHAB as telhab,
							A.CELEMP as celemp,
							A.EMAEMP as emaemp,
							A.CODPOS as codpos,
							A.TALPAN as talpan,
							A.TALCAM as talcam,
							A.TALCAL as talcal,
							(CASE WHEN A.DERZUR='D' THEN 'Derecho' ELSE 'Izquierdo' END) as derzur,
							to_char(A.FECING,'dd/mm/yyyy') as fecing,
							A.FECRET as fecret,
							A.FECREI as fecrei,
							to_char(A.FECADMPUB,'dd/mm/yyyy') as fecadmpub,
							A.STAEMP as staemp,
							A.FOTEMP as fotemp,
							A.NUMSSO as numsso,
							A.NUMPOLSEG as numpolseg,
							to_char(A.FECCOTSSO,'dd/mm/yyyy') as feccotsso,
							A.ANOADMPUB as anoadmpub,
							A.CODTIPPAG as codtippag,
							A.CODBAN as codban,
							A.TIPCUE as tipcue,
							A.NUMCUE as numcue,
							A.OBSEMP as obsemp,
							(CASE WHEN A.TIEFID='S' THEN 'Si' ELSE 'No' END) as tipo,
							B.nomcat as ubica
						FROM NPHOJINT A, NPASICAREMP B--, NPPAIS C
						WHERE
							RTRIM(A.CODEMP) >= RTRIM('".$this->codesde."') AND
							RTRIM(A.CODEMP) <= RTRIM('".$this->codhasta."') AND A.codemp=B.codemp --and A.CODPAI=C.CODPAI
						ORDER BY A.CODEMP";
						//print '<pre>';print $this->sql;

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			//Marco de la P�gina

			while(!$tb->EOF)
			{
			    $this->Rect(10,35,260,170);
				 //DATOS PERSONALES
				  $this->SetY(34);
				 $this->setFont("Arial","B",10);
				// $this->SetTextColor(0,0,128);
                 $this->Cell(270,10,"DATOS PERSONALES",0,0,'C',0);
 				// $this->SetTextColor(0,0,0);
				 $this->ln(7);
 				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Codigo Empleado');
				 $this->cell(45,10,'Nombre Empleado');
				 $this->cell(30,10,'Cedula Empleado');
				 $this->cell(60,10,'Numero Resolución Ingreso');
				 $this->cell(30,10,'Estado Civil');
				 $this->cell(35,10,'Nacionalidad');
				 $this->cell(25,10,'Sexo');
				 $this->ln(3);
				 $this->setFont("Arial","",8);
				 $this->cell(35,10,$tb->fields["codemp"]);
				 $this->setFont("Arial","",6);
				 $this->cell(45,10,$tb->fields["nomemp"]);
				 $this->setFont("Arial","",8);
				 $this->cell(30,10,$tb->fields["cedemp"]);
				 $this->cell(60,10,$tb->fields["numcon"]);
				 $this->cell(30,10,$tb->fields["edociv"]);
				 $this->cell(35,10,$tb->fields["nacemp"]);
				 $this->cell(25,10,$tb->fields["sexemp"]);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Fecha Nacimiento');
				 $this->cell(45,10,'Edad');
				 $this->cell(30,10,'Lugar de Nacimiento');
				 $this->cell(60,10,'Direccion de Habitación');
				 $this->cell(30,10,'Codigo Ciudad');
				 $this->cell(35,10,'Telefono');
				 $this->cell(25,10,'Celular');
				 $this->ln(3);
				 $this->setFont("Arial","",8);
				 $this->cell(35,10,$tb->fields["fecnac"]);
				 $this->cell(45,10,$tb->fields["edaemp"]);
				 $this->setFont("Arial","",6);
				 $this->cell(30,10,$tb->fields["lugnac"]);
				 $this->cell(60,10,$tb->fields["dirhab"]);
				 $this->setFont("Arial","",8);
				 $this->cell(30,10,$tb->fields["codpai"]);
				 $this->cell(35,10,$tb->fields["telhab"]);
				 $this->cell(25,10,$tb->fields["celemp"]);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Email');
				 $this->cell(45,10,'Codigo Postal');
				 $this->cell(30,10,'Talla Pantalon');
				 $this->cell(30,10,'Fecha SSO');
				 $this->cell(30,10,'Años Adm.Publica');
				 $this->cell(30,10,'Años Contraloria');
				 $this->cell(35,10,'Fideicomiso');
				 $this->cell(25,10,'Talla Camisa');
				 $this->ln(3);
				 $this->setFont("Arial","",6);
				 $this->cell(35,10,$tb->fields["emaemp"]);
				 $this->setFont("Arial","",8);
				 $this->cell(45,10,$tb->fields["codpos"]);
				 $this->cell(30,10,$tb->fields["talpan"]);
				 $this->cell(30,10,$tb->fields["feccotsso"]);
				 //años en la contraloria o en la empresa
				 $this->sql2="select antpub('A',codemp,date(now()),'S') as ano,
							antpub('M',codemp,date(now()),'N') as mes,
							antpub('D',codemp,date(now()),'N') as dias
							from nphojint
							where codemp=RTRIM('".$tb->fields["codemp"]."') ";//H::PrintR($this->sql2);exit;
							 $tb2=$this->bd->select($this->sql2);
				//años en la administracion publica
							  $this->sql222="select antpub('A',codemp,date(now()),'S') as ano,
							antpub('M',codemp,date(now()),'S') as mes,
							antpub('D',codemp,date(now()),'S') as dias
							from nphojint
							where codemp=RTRIM('".$tb->fields["codemp"]."') ";//H::PrintR($this->sql2);exit;
							 $tb222=$this->bd->select($this->sql222);
                 //   SELECT fecing,fecadmpub, *    FROM nphojint where fecadmpub is not null and fecing<>fecadmpub
                 $this->cell(30,10,'A:'.$tb222->fields["ano"].'/M:'.$tb222->fields["mes"].'/D:'.$tb222->fields["dias"]);
				 //$this->cell(30,10,'A:'.$tb2->fields["ano"].'/M:'.$tb2->fields["mes"].'/D:'.$tb2->fields["dias"]);
				 $this->cell(30,10,"");
				 $this->cell(35,10,$tb->fields["tipo"]);
				 $this->cell(25,10,$tb->fields["talcam"]);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Talla Calzado');
				 $this->cell(45,10,'Derecho/Zurdo');
				 $this->cell(30,10,'Fecha Ingreso');
				 $this->cell(30,10,'Cargo:');
				 $this->cell(35,10,'');
				 $this->cell(35,10,'Ubicación Administrativa:');
				 $this->ln(3);
				 $this->setFont("Arial","",8);
				 $this->cell(35,10,$tb->fields["talcal"]);
				 $this->cell(45,10,$tb->fields["derzur"]);
				 $this->cell(30,10,$tb->fields["fecing"]); $y=$this->gety();
				  $this->setxy(120,$y+3);
				 $this->multicell(60,3,$tb->fields["nomcar"]);
				 $this->cell(35,10,'');
				 $this->cell(30,10,"");
				 $this->setxy(185,$y+3);
				  $this->multicell(80,3,$tb->fields["ubica"]);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(35,10,'Numero S.S.O.');
				 $this->cell(45,10,'Numero Poliza Seguro');
				 $this->cell(30,10,'');
				// $this->cell(60,10,'Codigo Tipo Pago');
			//	 $this->cell(30,10,'Codigo Banco');
				 $this->cell(60,10,'');
				 $this->cell(30,10,'');
				 $this->cell(35,10,'Numero Cuenta');
				 $this->cell(25,10,'Tipo Cuenta');
				 $this->ln(3);
				 $this->setFont("Arial","",8);
				 $this->cell(35,10,$tb->fields["numsso"]);
				 $this->cell(45,10,$tb->fields["numpolseg"]);
				 $this->cell(30,10,'');
			//	 $this->cell(60,10,$tb->fields["codtippag"]);
				// $this->cell(30,10,$tb->fields["codban"]);
				$this->cell(60,10,'');
				$this->cell(30,10,'');
				 $this->cell(35,10,$tb->fields["numcue"]);
				 $this->cell(25,10,$tb->fields["tipcue"]);
				 $this->ln(10);
				 $this->line(10,$this->getY(),270,$this->getY());

				 ///DATOS FAMILIARES
				 $sql="SELECT A.CEDFAM as cedfam,
							A.NOMFAM as nomfam,
							(CASE WHEN A.SEXFAM ='F' THEN 'Femenino' ELSE 'Masculino' END) as sexfam,
							to_char(A.FECNAC,'dd/mm/yyyy') as fecnac,
							A.EDAFAM as edafam,
							A.PARFAM as parfam,
							(CASE WHEN A.SEGHCM ='S' THEN 'SI' ELSE 'NO' END) as seghcm,
							C.DESPAR as despar
						FROM
							NPINFFAM A, NPTIPPAR C
						WHERE
							(A.PARFAM) = (C.TIPPAR) AND
							(A.CODEMP) = '".$tb->fields["codemp"]."'
						ORDER BY A.CEDFAM";


//print '<pre>';print $sql;exit;
			     $tbInfFam=$this->bd->select($sql);

				 if (!$tbInfFam->EOF)
				 {
					//DATOS PERSONALES
				    $this->setFont("Arial","B",10);
				   // $this->SetTextColor(0,0,128);
                    $this->Cell(270,10,"DATOS FAMILIARES",0,0,'C',0);
				   // $this->SetTextColor(0,0,0);
					$this->ln(6);
 				    $this->setFont("Arial","B",8);
					$this->cell(8,10,'');
					$this->cell(25,10,'C.I. Familiar');
					$this->cell(55,10,'Nombre Familiar');
					$this->cell(30,10,'Fec. Nacimiento');
					$this->cell(30,10,'Edad');
					$this->cell(30,10,'Sexo');
					$this->cell(55,10,'Parentesco');
					$this->cell(20,10,'HCM');
					$this->ln(3);
					$this->line(10,$this->getY()+5,270,$this->getY()+5);
					$this->ln(3);


						 while(!$tbInfFam->EOF)
						 {
							 $this->setFont("Arial","",8);
		 					 $this->cell(8,10,'');
							 $this->cell(25,10,$tbInfFam->fields["cedfam"]);
							 $this->cell(55,10,$tbInfFam->fields["nomfam"]);
 							 $this->cell(3,10,'');
							 $this->cell(30,10,$tbInfFam->fields["fecnac"]);
							 $this->cell(30,10,$tbInfFam->fields["edafam"]);
							 $this->cell(28,10,$tbInfFam->fields["sexfam"]);
							 $this->cell(55,10,$tbInfFam->fields["despar"]);
							 $this->cell(20,10,$tbInfFam->fields["seghcm"]);
							 $this->ln(3);
							 $tbInfFam->MoveNext();
						 }
				  $this->ln(6);
				  $this->line(10,$this->getY(),270,$this->getY());
				 } // if (!$tbInfFam->EOF)

				 ////////////////////////////
				 	///INFORMACION CURRICULAR
				 $sql="SELECT
							CODEMP as codemp,
							NOMTIT as nomtit,
							DESCUR as descur,
							INSTIT as instit,
							DURCUR as durcur,
							anocul
							--to_char(feccur,'dd/mm/yyyy') as feccur
						FROM
							NPINFCUR
						WHERE
							CODEMP = '".$tb->fields["codemp"]."'
						ORDER BY CODEMP";
//print '<pre>';print $sql; exit;
			     $tbInfCurr=$this->bd->select($sql);

				 if (!$tbInfCurr->EOF)
				 {
					$this->setFont("Arial","B",10);
				//	$this->SetTextColor(0,0,128);
                    $this->Cell(270,10,"ESTUDIOS REALIZADOS",0,0,'C',0);
				//	$this->SetTextColor(0,0,0);
					$this->ln(6);
 				    $this->setFont("Arial","B",8);
					$this->cell(8,10,'');
					$this->cell(75,10,'Titulo Obtenido');
					$this->cell(70,10,'Descripcion');
					$this->cell(65,10,'Instituto');
					$this->cell(15,10,'Duracion');
					$this->cell(30,10,'Año Culminación');
					$this->ln(3);
					$this->line(10,$this->getY()+5,270,$this->getY()+5);
					$this->ln(3);

					 while(!$tbInfCurr->EOF)
					 {
						 $this->setFont("Arial","",8);
						 $this->cell(8,10,'');
						 $this->cell(75,10,$tbInfCurr->fields["nomtit"]);
				 		 $this->cell(70,10,$tbInfCurr->fields["descur"]);
				 		 	$x=$this->getx(); 	$y=$this->gety();
						 $this->cell(65,10,"");
						 $this->cell(20,10,$tbInfCurr->fields["durcur"]);
						 $this->cell(30,10,$tbInfCurr->fields["anocul"]);
						 	 $this->setxy($x,$y+3);
						  $this->multicell(60,3,$tbInfCurr->fields["instit"]);
						 $this->ln(1);
						 $tbInfCurr->MoveNext();
					 }
				   $this->ln(6);
				   $this->line(10,$this->getY(),270,$this->getY());
				 } // if (!$tbInfCurr->EOF)
				 /////////////////////////////////

				  ///EXPERIENCIA LABORAL
				 $sql="SELECT  NOMEMP as EMPRESA,
						CODCAR,
						DESCAR,
						to_char(FECINI,'dd/mm/yyyy') as fecini,
						to_char(FECTER,'dd/mm/yyyy') as fecter, SUBSTR(fecter,1,4) as ano,
						SUEOBT,
						STACAR
						FROM
							NPEXPLAB
						WHERE
							CODEMP = '".$tb->fields["codemp"]."'
						ORDER BY ano desc";
						//print '<pre>';print $sql; exit;

			     $tbExpLab=$this->bd->select($sql);

				 if (!$tbExpLab->EOF)
				 {
					$this->setFont("Arial","B",10);
                    $this->Cell(270,10,"EXPERIENCIA LABORAL",0,0,'C',0);
					$this->ln(6);
 				    $this->setFont("Arial","B",8);
					$this->cell(8,10,'');
					$this->cell(110,10,'Organismo o Empresa');
					$this->cell(60,10,'Cargo Ocupado');
					$this->cell(30,10,'Sueldo Obtenido');
					$this->cell(25,10,'Fecha Inicio');
					$this->cell(25,10,'Fecha Culminacion');
					$this->ln(3);
					$this->line(10,$this->getY()+5,270,$this->getY()+5);
					$this->ln(3);

					 while(!$tbExpLab->EOF)
					 {
						 $this->setFont("Arial","",8);
						 $this->cell(8,10,'');
						 $this->cell(110,10,$tbExpLab->fields["empresa"]);
						// $this->cell(100,10,'');
						$x=$this->getx(); 	$y=$this->gety();
						 $this->cell(60,10,"");
						 $this->cell(23,10,number_format($tbExpLab->fields["sueobt"],2,'.',','),0,0,'R');
						 $this->cell(8,10,'');
						 $this->cell(25,10,$tbExpLab->fields["fecini"]);
						 $this->cell(25,10,$tbExpLab->fields["fecter"]);
						 $this->setxy($x,$y+3);
						 $this->multicell(60,3,$tbExpLab->fields["descar"]);
						 $this->ln(1);
						 $tbExpLab->MoveNext();
					 }
				   $this->ln(6);
				 //  $this->line(10,$this->getY(),270,$this->getY());
				 } // if (!$tbExpLab->EOF)
				 /////////////////////////////////

				 $tb->MoveNext();
				 if (!$tb->EOF)  {$this->AddPage();}
			     $this->ln(3);
			}
		}
	}
?>