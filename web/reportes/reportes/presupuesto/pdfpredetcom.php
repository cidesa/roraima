<?
//Definiciones de Funciones
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

/*
AYUDA:
Cell(with,healt,Texto,border,linea,align,fillm-Fondo,link)
AddFont(family,style,file)
ln() -> Salto de Linea
$this->GetY()  -> Posicion del cursor
$this->GetX()  -> Posicion del cursor
*/

	class pdfreporte extends fpdf
	{
		//Def de Variables a utilizar
		var $bd;
		var $titulos;
		var $numcomp1;
		var $numcomp2;
		var $fechcomp1;
		var $fechcomp2;
		var $tipcomp1;
		var $tipcomp2;
		var $status;
		var $codpresu1;
		var $codpresu2;
		var $comodin;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");  //constructor
			$this->bd=new basedatosAdo();

			//Recibir las variables por el Post
			$this->numcomp1=$_POST["numcomp1"];
			$this->numcomp2=$_POST["numcomp2"];
			$this->fechcomp1=$_POST["fechcomp1"];
			$this->fechcomp2=$_POST["fechcomp2"];
			$this->tipcomp1=$_POST["tipcomp1"];
			$this->tipcomp2=$_POST["tipcomp2"];
			$this->status=$_POST["status"];
			$this->codpresu1=$_POST["codpresu1"];
			$this->codpresu2=$_POST["codpresu2"];
			$this->comodin=$_POST["comodin"];
			$this->cab=new cabecera();
		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera_f_b($this," DETALLE DE COMPROMISOS A LA FECHA","l","s","s");

			$this->Cell(0,10,'DEL: '.$this->fechcomp1.' AL: '.$this->fechcomp2,0,0,'C');
			//$this->Cell(10,10,'                                    DEL:                        AL:');
			//$this->Cell(3,3,'AL');
			$this->ln(6);

			//$fecha=date("d/m/Y");
			//$this->Cell(15,0,'                                                                                                          FECHA:   '.$fecha);//,0,0,'C');
			$this->ln(10);
			//$this->Line(10,47,270,47);

			$this->ln(-16);
			$this->cell(70,10, ' ');
			if ($this->status=='A')
			{
				//$this->cell(40,10, 'Activo',0,0,'C');
			}
			else
			{
				$this->cell(40,10, 'Anulado',0,0,'C');
			}
			//$this->line();
	//		$this->Cell(0,10,'DEL: '.$this->fechcomp1.' AL: '.$this->fechcomp2,0,0,'C');
			//$this->cell(30,10,$this->fechcomp1,0,0,'C');
			$this->cell(4,10, ' ');
			//$this->cell(40,10,$this->fechcomp2);
			$this->ln(16);
			$this->setFont("Arial","B",9);
			$this->ln(-2);
			//$this->line(10,56,270,56);
		    $this->cell(40,10,"CODIGO PRESUPUESTARIO",0,0,'C');
			$this->cell(118,10,"BENEFICIARIO",0,0,'C');
			$this->cell(35,10,"                           # COMPROMISO",0,0,'C');
			$this->cell(30,10,"                       FECHA");
			$this->cell(35,10,"                            MONTO");
			$this->GetY();
			$this->Line(10,$this->GetY()+10,270,$this->GetY()+10);
			$this->ln(9);$this->setFont("Arial","",9);
		}

		function Cuerpo()
		{
			$this->setFont("Arial","",9);
			$tb1=$this->bd->select("SELECT A.refcom, A.tipcom, to_char(A.feccom,'dd/mm/yyyy')as fecha, A.descom, B.CodPre, C.NomPre, B.monimp, B.moncau, B.monpag, B.monaju, A.cedrif, (B.monimp-B.monaju) as Mon_Aju FROM CPCOMPRO A, CPIMPCOM B, CPDEFTIT C WHERE A.refcom = B.refcom AND B.codpre = C.codpre  AND A.refcom>=('".$this->numcomp1."')  AND A.refcom <=('".$this->numcomp2."')  AND A.feccom>=to_date('".$this->fechcomp1."','dd-mm-yyy') AND A.feccom<=to_date('".$this->fechcomp2."','dd-mm-yyyy') AND B.codpre >=('".$this->codpresu1."') AND B.CODPRE <= ('".$this->codpresu2."') AND A.TIPCOM >= ('".$this->tipcomp1."') AND A.TIPCOM <= ('".$this->tipcomp2."') AND A.STACOM=('".$this->status."') AND  B.codpre LIKE ('".$this->comodin."') ORDER BY B.codpre,A.feccom");// AND  B.codpre LIKE ('".$this->comodin."')
			$total=0;
			while(!$tb1->EOF)
			{$this->setFont("Arial","",9);
				$cont=$cont+1;
				$this->ln(4);
				$this->cell(62,4,$tb1->fields["codpre"]);
				//$this->cell(118,10,substr($tb1->fields["nompre"],0,60));
				$this->cell(118,4,"");$y=$this->gety();
                           	$this->cell(28,4,substr($tb1->fields["refcom"],0,30));
				$this->cell(20,4,substr($tb1->fields["fecha"],0,60));
				$this->cell(30,4,number_format($tb1->fields["monimp"],2,',','.'),0,0,'R');
				//esto es si quieren una linea despues de cada fila
				//$this->ln(4);
				//$this->Line(10,$this->GetY()+4,270,$this->GetY()+4);
				$total=$total+$tb1->fields["monimp"];
				$tb2=$this->bd->select("SELECT nomben FROM opbenefi WHERE trim(cedrif)=trim('".$tb1->fields["cedrif"]."')");
				while(!$tb2->EOF)
				{	$this->setFont("Arial","",9);
					//$this->ln(4);
					//$this->cell(62+30,10,' ');
					$this->setxy(56,$y);
					$this->multicell(118,4,strtoupper($tb2->fields["nomben"]));
					$tb2->MoveNext();
				}

				$tb1->MoveNext();
			}
				$this->setFont("Arial","B",9);
			$this->ln(4);
			$this->Line(10,$this->GetY()+4,270,$this->GetY()+4);
			$this->ln(4);
			$this->cell(212,10,"");
			$this->cell(17,10,"TOTAL");
			$this->cell(30,10,number_format($total,2,',','.'),0,0,'C');
 			// $this->cell(35,10,number_format($this->total,2,'.',','));
 			$this->setFont("Arial","",9);
		}


	}
?>