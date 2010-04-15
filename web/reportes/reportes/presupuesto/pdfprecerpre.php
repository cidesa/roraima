<?
//<!--  Programado  por Jaime Su�rez -->
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/funciones.php");


	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sqla;
		var $sqlb;
		var $sqlc;
		var $refprdes;
		var $refprchas;
		var $ph_fechad;
		var $ph_fechah;
		var $gaceta;
		var $copias;
		var $firmacontabilidad;
		var $firmaunidad;
		var $comodin;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();


//*********************** variables **************************************
 			$this->refprdes=$_POST["refprdes"];
 			$this->refprchas=$_POST["refprchas"];
 			$this->ph_fechad=$_POST["ph_fechad"];
 			$this->ph_fechah=$_POST["ph_fechah"];
 			$this->gaceta=$_POST["gaceta"];
 			$this->copias=$_POST["copias"];
 			$this->firmacontabilidad=$_POST["firmacontabilidad"];
 			$this->firmaunidad=$_POST["firmaunidad"];
 			$this->comodin=$_POST["comodin"];

//*********************** fin de variables *******************************
//*********************** inicio de sql *******************************
			$this->sql="";
			$this->sql="SELECT
							A.REFPRC,
							to_char(A.FECPRC,'dd/mm/yy') as fecprc,
							A.DESPRC,
							A.MONPRC,
							A.CEDRIF,
							B.CODPRE,
							B.MONIMP,
							C.NOMEXT,
							SUBSTR(B.CODPRE,1,2) AS SECTOR,
						--	SUBSTR(B.CODPRE,4,2) AS PROGRAMA,
							SUBSTR(B.CODPRE,4,2) AS PROYECTO,
							SUBSTR(B.CODPRE,7,2) AS ACTIVIDAD,
							SUBSTR(B.CODPRE,10,3) AS PARTIDA,
							SUBSTR(B.CODPRE,14,2) AS GENERICA,
							SUBSTR(B.CODPRE,17,2) AS ESPECIFICA,
							SUBSTR(B.CODPRE,20,2) AS SUBESPECIFICA
							
						FROM
							CPPRECOM A,
							CPIMPPRC B,
							CPDOCPRC C
						WHERE
							 A.REFPRC = B.REFPRC AND
						--	 A.TIPPRC = C.TIPPRC  AND
							 A.REFPRC>=RTRIM('".$this->refprdes."') AND
							 A.REFPRC<=RTRIM('".$this->refprchas."') AND
							 A.FECPRC>='".$this->ph_fechad."' AND
							 A.FECPRC<='".$this->ph_fechah."' AND
							 RTRIM(B.CODPRE) LIKE RTRIM('".$this->comodin."')
						ORDER BY
						A.REFPRC,
						B.CODPRE
						LIMIT 200";
					//print '<pre>'; print $this->sql;
		}

//*********************** fin de sql *******************************
		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->setFont("Arial","B",9);

		}
		function Cuerpo()
		{
	    $tb=$this->bd->select($this->sql);
		while (!$tb->EOF)
			{
							$this->SetTextColor(0,0,0);
////////////////////////////////////////planilla completa////////////////////////////////////////////////////////////////////
						////cuadro uno
								$this->setFont("Arial","",8);
								$this->cell(155,5,"");
								$this->cell(10,5,"Numero: ".trim($tb->fields["refprc"]));//Cabecera derecha superior
								$this->ln(10);
								$this->sqla="";
								$this->sqla="Select cedrif,nomben  from opbenefi where trim(cedrif)='".trim($tb->fields["cedrif"])."'";
								$tba=$this->bd->select($this->sqla);
								$this->cell(80,-18,"Beneficiario: ".$tba->fields["nomben"]);
								//$this->cell(80,-18,"Beneficiario: ".$tba->fields["cedrif"]);
								//$this->cell(80,-18,$tba->fields["cedrif"]);
								$this->ln(1);
								$this->cell(80,-12,"Tipo:".strtoupper($tb->fields["nomext"]));
								$this->Line($this->GetX()-80,$this->GetY()+1,$this->GetX()-80,$this->GetY()+210);//verical MARCO
								$this->ln(1);
								$this->Line($this->GetX(),$this->GetY(),$this->GetX()+195,$this->GetY());//horizontal
								$this->Line($this->GetX()+115,$this->GetY()+4,$this->GetX()+195,$this->GetY()+4);//horizontal
								$this->Line($this->GetX()+115,$this->GetY()+8,$this->GetX()+195,$this->GetY()+8);//horizontal
								$this->Line($this->GetX()+195,$this->GetY(),$this->GetX()+195,$this->GetY()+209);//verical MARCO
								$this->ln(9);
								$this->cell(-83,-13,"                                                                                                                                                                                              Monto");
								$this->ln(4);
								$this->cell(-83,-13,"                                                                                                                               Unidad de                      Estimado                                    Definitivo");
								$this->ln(4);
								$this->cell(-83,-13," Cant.                             Descripcion                                                                        Medida         Unidad              Total                Unidad                Total");
								$this->cell(80,1,"");
								$this->Line($this->GetX()+3,$this->GetY()-5,$this->GetX()+198,$this->GetY()-5);//horizontal
								$this->Line($this->GetX()+13,$this->GetY()-5,$this->GetX()+13,$this->GetY()+84);//verical
								$this->Line($this->GetX()+103,$this->GetY()-17,$this->GetX()+103,$this->GetY()+84);//verical
								$this->Line($this->GetX()+118,$this->GetY()-17,$this->GetX()+118,$this->GetY()+84);//verical

 								$this->Line($this->GetX()+135,$this->GetY()-9,$this->GetX()+135,$this->GetY()+84);//verical
								$this->Line($this->GetX()+157,$this->GetY()-13,$this->GetX()+157,$this->GetY()+84);//verical
 								$this->Line($this->GetX()+172,$this->GetY()-9,$this->GetX()+172,$this->GetY()+84);//verical

   								$this->cell(175,6,"");
								$this->cell(5,6,number_format($tb->fields["monimp"],2,'.',','));//FORMATO MONTO NUMERO
								$this->ln(1);
   								$this->cell(12,6,"");
								$this->multicell(80,3,strtoupper($tb->fields["desprc"]),0,'l');// DESCRIPCION
								$this->ln(5);
   								$this->cell(12,6,"");
								$this->multicell(80,3,montoescrito($tb->fields["monimp"],$this->bd),0,'l');//MONTO ESCRITO
								$this->ln(5);
   								$this->cell(12,6,"");
								$this->multicell(80,3,strtoupper($this->gaceta),0,'l');//
								$this->ln(1);
								$this->Line(10,150,205,150);//horizontal
								$this->Line(10,165,205,165);//horizontal
								$this->Line(10,170,205,170);//horizontal

								$this->Line(40,173,175,173);//horizontal
								$this->Line(40,177,175,177);//horizontal
								$this->Line(40,182,175,182);//horizontal
								$this->Line(10,192,205,192);//horizontal

								$this->Line(10,258,205,258);//horizontal
								$this->Line(10,186,205,186);//horizontal

   								//$this->cell(12,6,"");
								$this->SetXY(10,-120);
								$this->cell(100,-13,"                                                                                                                                                                                              Sub Total Bs:  ".number_format($tb->fields["monimp"],2,'.',','));
								$this->SetXY(10,-115);
								$this->cell(100,-13,"                                                                                                                                                                                              I.V.A:");
								$this->SetXY(10,-110);
								$this->cell(100,-13,"                                                                                                                                                                                              Total Bs:         ".number_format($tb->fields["monimp"],2,'.',','));
								$this->SetXY(10,-105);
								$this->cell(100,-13,"                                                                                                          CODIGO PRESUPUESTARIO");
								//$this->SetY(110);
								$this->Line(40,182,40,173);//verical
								$this->Line(55,182,55,173);//verical
								$this->Line(70,182,70,173);//verical
								$this->Line(85,182,85,173);//verical

								$this->Line(100,182,100,173);//verical
								$this->Line(115,182,115,173);//verical
								$this->Line(130,182,130,173);//verical

								$this->Line(145,182,145,173);//verical
								$this->Line(160,182,160,173);//verical
								$this->Line(175,182,175,173);//verical

								$this->Line(55,258,55,192);//verical
								$this->Line(105,258,105,192);//verical
								$this->Line(155,258,155,192);//verical

								//$this->Line(205,258,205,192);//verical
								//$this->Line(255,258,255,192);//verical


								$this->setFont("Arial","",6);
								$this->SetXY(40,-97);
								$this->cell(10,-13,"   SECTOR          PROYECTO     ACTIVIDAD       PARTIDAD       GENERICA      ESPECIFICA    SUB-ESPEC      ");
								$this->setFont("Arial","",8);
								$this->SetXY(45,-147);
								$this->cell(5,94,$tb->fields["sector"]);//FORMATO MONTO NUMERO
								//$this->cell(10,-79,"");
								//$this->cell(5,94,$tb->fields["programa"]);//FORMATO MONTO NUMERO
								$this->cell(10,-79,"");
								$this->cell(5,94,$tb->fields["proyecto"]);//FORMATO MONTO NUMERO
								$this->cell(10,-79,"");
								$this->cell(5,94,$tb->fields["actividad"]);//FORMATO MONTO NUMERO
								$this->cell(10,-79,"");
								$this->cell(5,94,$tb->fields["partida"]);//FORMATO MONTO NUMERO
								$this->cell(10,-79,"");
								$this->cell(5,94,$tb->fields["generica"]);//FORMATO MONTO NUMERO
								$this->cell(10,-79,"");
								$this->cell(5,94,$tb->fields["especifica"]);//FORMATO MONTO NUMERO
								$this->cell(10,-79,"");
								$this->cell(5,94,$tb->fields["subespecifica"]);//FORMATO MONTO NUMERO
								
								$this->SetXY(20,187);
								$this->cell(30,5,"         DPTO. DE CONTABILIDAD                                  SECRETARIA SOLICTANTE                                                   ");
							    $this->setFont("Arial","B",7);
								$this->SetXY(3,193);
								$this->cell(10,5,"                              Registrado                                            Unidad Administrativa                                             Autorizado");
								$this->SetXY(1,210);
								$this->cell(10,5,"                    _____________________                       _____________________________ ");
								$this->SetXY(1,215);
								$this->cell(10,5,"                                      Nombre                                                     Nombre");

								$this->SetXY(1,240);
								$this->cell(10,5,"                    _____________________                       _____________________________                 _____________________________                 _____________________________ ");
								$this->SetXY(1,245);
								$this->cell(10,5,"                              Firma y Sello                                                  Firma y Sello                                                   Firma y Sello                                                      Firma y Sello");
								$this->SetXY(1,250);
								$this->cell(100,5,"                         Fecha:                                                               Fecha: ".$tb->fields["fecprc"]."                                              Fecha  ".$tb->fields["fecprc"]."                                                 Fecha:");
								$this->setFont("Arial","",9);
								$this->addpage();
				$tb->MoveNext();
			}//ciclo
		////////////////////////////////fin del  ciclo////////////////////////////////
		}//cuerpo
	}//clase
?>
