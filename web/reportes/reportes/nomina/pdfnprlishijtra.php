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
		var $sql;
		var $sql2;
		var $sql3;
		var $sqla;
		var $sqlax;
		var $sqlb;
		var $sqlc;
		var $sqlx;
		var $sqlt;
		var $rep;
		var $numero;
		var $cab;
		var $con1;
		var $con2;
		var $edad1;
		var $edad2;
		var $cat1;
		var $cat2;
		var $niv1;
		var $niv2;
		var $per1;
		var $per2;
		var $emp1;
		var $emp2;
		var $nom;
		var $nomesp;
		var $nombre;
		var $elab;
		var $rev;
		var $auto;
		var $tipcon;
		var $fecha1;
		var $fecha2;
		var $fechae1;
		var $fechae2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("P","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->emp1=$_POST["emp1"];
			$this->emp2=$_POST["emp2"];
			$this->edad1=$_POST["edad1"];
			$this->edad2=$_POST["edad2"];
			$this->fecorddes=$_POST["fecorddes"];
			$this->fecordhas=$_POST["fecordhas"];
			$this->cat1=$_POST["cat1"];
			$this->cat2=$_POST["cat2"];
			$this->per1=$_POST["per1"];
			$this->per2=$_POST["per2"];
			$this->nom=$_POST["nom"];
			$this->nomesp=$_POST["nomesp"];

			$this->sql="SELECT DISTINCT
				C.CODEMP,
                            C.STAEMP,
            			E.CODCAR,
				E.CODNOM,
				E.NOMNOM,
				E.NOMEMP,
				C.CEDEMP,
				E.NOMCAR,
				C.NUMCUE,
				F.CODNIV, F.DESNIV,
                to_char(C.FECING,'dd/mm/yyyy') as fecing,
				to_char(C.FECNAC,'dd/mm/yyyy') as fecha,
				B.NOMFAM,
				to_char(B.FECNAC,'dd/mm/yyyy') as fechijo,
				B.EDAFAM, B.sexfam as sexo
				FROM
				NPINFFAM B,NPHOJINT C,NPASICAREMP E,NPESTORG F, NPTIPPAR G
				WHERE
				(C.FECNAC) >= to_date('".$this->fecorddes."','dd/mm/yyyy') AND
				(C.FECNAC) <= to_date('".$this->fecordhas."','dd/mm/yyyy') AND
				TRIM(C.CODEMP) >= TRIM('".$this->emp1."') AND
				TRIM(C.CODEMP) <= TRIM('".$this->emp2."') AND
				C.CODEMP=E.CODEMP AND
                            C.STAEMP='A' AND
                            TRIM(F.CODNIV) >= TRIM('".$this->cat1."') AND
				TRIM(F.CODNIV) <= TRIM('".$this->cat2."') AND
				(B.EDAFAM) >= ".$this->edad1." AND
				(B.EDAFAM) <= ".$this->edad2." AND
				E.STATUS='V'
				AND C.CODNIV=F.CODNIV
				AND C.CODEMP=B.CODEMP
				AND B.PARFAM = '004'

				ORDER BY C.CODEMP";
			//echo "<pre>".$this->sql;exit; algo prueba
			$this->cab=new cabecera();

		}


		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",8);

		}
		function Cuerpo()
		{
			$tbg=$this->bd->select($this->sql);
			$this->setFont("Arial","B",7);
			$refemp="";
			$conthijo=0;
			$cont=0;
			$this->sw=false;
			while(!$tbg->EOF)
			{
				if($refemp!=$tbg->fields["cedemp"])
				{
					//TOTALES
					if($this->sw)
					{
						$this->ln(3);
						$this->cell(10);
						$this->multicell(100,4,'TOTAL NRO DE HIJOS: '.$conthijo);
						$conthijo=0;
						$this->ln(2);
						$this->Line(10,$this->GetY(),200,$this->GetY());
						$this->ln(2);
					}
					$this->sw=true;
					$this->setFont("Arial","B",9);
					$this->SetTextColor(0,0,128);
					$this->Cell(15,4,"Cedula:",0,0,'C');
					$this->SetTextColor(0,0,0);
					$this->Cell(30,4,$tbg->fields["cedemp"],0,0,'C');
					$this->SetTextColor(0,0,128);
					$this->Cell(30,4,"Nombre Empleado:",0,0,'C');
					$this->SetTextColor(0,0,0);
					$this->multiCell(90,4,$tbg->fields["nomemp"]);
					$this->SetTextColor(0,0,128);
					$this->Cell(30,4,"Ubicacion Admin.:");
					$this->SetTextColor(0,0,0);
					$y=$this->gety();
					$x=$this->getx();
					$this->cell(50,4,"");
					$this->SetTextColor(0,0,128);
					$this->Cell(30,4,"Tipo de personal:",0,0,'C');
					$this->SetTextColor(0,0,0);
					$this->Cell(25,4,ucfirst(strtolower($tbg->fields["nomnom"])));
					$this->setxy($x,$y);
					$this->multicell(50,4,ucfirst(strtolower($tbg->fields["desniv"])));
					$this->Line(10,$this->GetY()+5,200,$this->GetY()+5);
					$this->SetTextColor(0,0,0);
					$this->Ln(4);
				    $this->SetTextColor(128,0,0);
					$this->Ln(4);
					$this->Cell(10);
					$this->Cell(60,5,"Nombre hijo(a)",0,0,'C');
					$this->Cell(45,5,"Fec. Nacimiento hijo(a)",0,0,'C');
					$this->Cell(30,5,"Edad hijo(a)",0,0,'C');
					$this->Cell(15,5,"Sexo hijo(a)",0,0,'C');
					$this->SetTextColor(0,0,0);
					$this->ln(4);
				}
				//DETALLE
				$this->Cell(10);
			    $this->Cell(60,5,$tbg->fields["nomfam"]);
				$this->cell(45,5,$tbg->fields["fechijo"],0,0,'C');
			    $this->Cell(30,5,$tbg->fields["edafam"],0,0,'C');
			    if ($tbg->fields["sexo"]=='F') $tbg->fields["sexo"]='Femenino'; else $tbg->fields["sexo"]='Masculino';
			    $this->Cell(15,5,$tbg->fields["sexo"],0,0,'L');
			    $this->ln(4);
				$conthijo++;
				$cont++;
				$refemp=$tbg->fields["cedemp"];
				$tbg->MoveNext();

			}
			//TOTALES
			$this->setautopagebreak(false);
			$this->ln(3);
			$this->cell(10);
			$this->multicell(100,4,'TOTAL NRO DE HIJOS: '.$conthijo);
			$this->ln(2);
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->ln(3);
			$this->cell(10);
			$this->multicell(100,4,'TOTAL GENERAL DE HIJOS DE EMPLEADOS: '.$cont);
			$conthijo=0;
			$this->ln(2);
			$this->Line(10,$this->GetY(),200,$this->GetY());

		}

		}

?>
