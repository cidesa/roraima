<?
//<!--  Programado  por Jaime Suàrez -->
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	
	class pdfreporte extends fpdf
	{
		
		var $bd;
		var $titulos;
		var $banco;
		var $nombre_banco;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql;
		var $sqla;
		var $sqlb;
		var $sqlc;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $bancodes;
		var $bancohas;
		var $codcatdes;
		var $codconhas;
		var $pernomdes;
		var $pernomhas;
		var $conf;
		var $nombre;
		var $saldo_total;
		var $cont;
				
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
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcardes=$_POST["codcardes"];
			$this->codcarhas=$_POST["codcarhas"];
			$this->bancodes=$_POST["bancodes"];
			$this->bancohas=$_POST["bancohas"];
			$this->codcatdes=$_POST["codcatdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcathas=$_POST["codcathas"];
			$this->codconhas=$_POST["codconhas"];
			$this->pernomdes=$_POST["pernomdes"];
			$this->pernomhas=$_POST["pernomhas"];
			//echo $this->codcathas;

//*********************** fin de variables *******************************
//*********************** inicio de sql *******************************
			$this->sql="";
			$this->sql="SELECT
					DISTINCT
						H.CODBAN
					FROM 
						NPNOMCAL A, 
						NPCARGOS B, 
						NPHOJINT C, 
						NPDEFCPT D, 
						NPASICAREMP E, 
						NPCATPRE F, 
						NPEMPLEADOS_BANCO H
						LEFT OUTER JOIN NPBANCOS G ON (H.CODBAN = G.CODBAN)
					WHERE
						A.CODCON=D.CODCON AND
						A.CODEMP=C.CODEMP AND
						A.CODCAR=B.CODCAR AND
						A.CODEMP=E.CODEMP AND
						A.CODCAR=E.CODCAR AND
						E.CODCAT=F.CODCAT AND
						H.CODNOM=A.CODNOM AND
						H.CODEMP=A.CODEMP AND
						A.SALDO<>0.00 AND
						D.CONACT='S' AND
						D.IMPCPT='S' AND
						RTRIM(A.CODEMP) >= TRIM('".$this->codempdes."') AND
						RTRIM(A.CODEMP) <= TRIM('".$this->codemphas."') AND
						RTRIM(A.CODCAR) >= TRIM('".$this->codcardes."') AND
						RTRIM(A.CODCAR) <= TRIM('".$this->codcarhas."') AND
						RTRIM(A.CODCON) = '".$this->codconhas."' AND
						RTRIM(E.CODCAT) >= TRIM('".$this->codcatdes."') AND
						RTRIM(E.CODCAT) <= TRIM('".$this->codcathas."') AND
						G.CODBAN>= TRIM('".$this->bancodes."') AND
						G.CODBAN <= TRIM('".$this->bancohas."') AND
						A.CODNOM='009' 
					group by 
						H.CODBAN
					ORDER BY 
						H.CODBAN";
						//print $this->sql;			
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

				$this->entrada=0;


		//////////////////////////////////ciclo////////////////////////////////////////////
	    $tb=$this->bd->select($this->sql);
		while (!$tb->EOF)
			{ 
			$this->sqlc="SELECT
					DISTINCT
						A.CODEMP,  
						A.NOMCON,
						A.CODCON,
						A.CODCAR,
						E.CODCAT,
						F.NOMCAT,
						A.SALDO,   
						A.CODNOM,      
						C.NOMEMP,
						C.CEDEMP,
						H.CUENTA_BANCO,
						H.CODBAN,
						G.NOMBAN,
						B.NOMCAR,
						D.OPECON,
						D.CODCON,
						D.IMPCPT
					FROM 
						NPNOMCAL A, 
						NPCARGOS B, 
						NPHOJINT C, 
						NPDEFCPT D, 
						NPASICAREMP E, 
						NPCATPRE F, 
						NPEMPLEADOS_BANCO H
						LEFT OUTER JOIN NPBANCOS G ON (H.CODBAN = G.CODBAN)
					WHERE
						A.CODCON=D.CODCON AND
						A.CODEMP=C.CODEMP AND
						A.CODCAR=B.CODCAR AND
						A.CODEMP=E.CODEMP AND
						A.CODCAR=E.CODCAR AND
						E.CODCAT=F.CODCAT AND
						H.CODNOM=A.CODNOM AND
						H.CODEMP=A.CODEMP AND
						A.SALDO<>0.00 AND
						D.CONACT='S' AND
						D.IMPCPT='S' AND
						RTRIM(A.CODEMP) >= TRIM('".$this->codempdes."') AND
						RTRIM(A.CODEMP) <= TRIM('".$this->codemphas."') AND
						RTRIM(A.CODCAR) >= TRIM('".$this->codcardes."') AND
						RTRIM(A.CODCAR) <= TRIM('".$this->codcarhas."') AND
						RTRIM(A.CODCON) = '".$this->codconhas."' AND
						RTRIM(E.CODCAT) >= TRIM('".$this->codcatdes."') AND
						RTRIM(E.CODCAT) <= TRIM('".$this->codcathas."') AND
						G.CODBAN = TRIM('".$tb->fields["codban"]."') AND
						A.CODNOM='009' 
					group by 
						A.CODEMP, 
						A.NOMCON, 
						A.CODCON, 
						A.CODCAR, 
						E.CODCAT, 
						F.NOMCAT, 
						A.SALDO, 
						A.CODNOM, 
						C.NOMEMP, 
						C.CEDEMP, 
						H.CUENTA_BANCO, 
						H.CODBAN, 
						G.NOMBAN, 
						B.NOMCAR, 
						D.OPECON, 
						D.CODCON, 
						D.IMPCPT 
					ORDER BY 
						H.CODBAN,
						A.CODCON,
						A.CODEMP";
						//print $this->sql;			
						$this->banco=0;

		    $tb2=$this->bd->select($this->sqlc);
				while (!$tb2->EOF)
					{
						//despues de la linea
						//$this->cell(45,5,$this->banco);
						//$this->cell(45,5,$this->entrada);
	 					if ($this->banco==0):	
								if ($this->entrada<>0):
										$this->ln(10);
										$this->cell(80,5,"");
										$this->cell(45,5,"Total Centro de Pago: ".$this->nombre_banco."    ".$this->saldo_total);
										$this->ln(10);
										$this->cell(45,5,"Cantidad de Trabajadores: ".$this->cont);
										$this->saldo_total=0;
										$this->cont=0;
									$this->AddPage();
								endif;
								///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
								$this->sqla="";
								$this->sqla="SELECT nomnom FROM npnomina WHERE codnom='009'";
								$tba=$this->bd->select($this->sqla);
								//$this->cell(5,5,"");
								$this->cell(35,5,"Nomina:   ".$tba->fields["nomnom"]);
								$this->ln(3);
								$this->sqla="";
								$this->sqla="SELECT codcon,nomcon FROM npdefcpt WHERE codcon='".$this->codconhas."'";
								$tba=$this->bd->select($this->sqla);
								$this->cell(45,5,"Codigo  Concepto: ".$tba->fields["codcon"]."     Descripcion del Concepto: ".$tba->fields["nomcon"]);
								//$this->ln(2);
								// lineas horizontales
								$this->Line($this->GetX()-45,$this->GetY()+8,$this->GetX()+145,$this->GetY()+8);
								/////////////////////////////////////////////////////////////////////////////////////////////////
								$this->ln(10);
								$this->sqla="";
								$this->sqla="SELECT codcat,nomcat FROM npcatpre WHERE rtrim(codcat) >= trim('".$this->codcatdes."') and rtrim(codcat) <= trim('".$this->codcathas."') ";
								//print $this->sqla;                                                          
								$tba=$this->bd->select($this->sqla);
								//$this->cell(5,5,"");
								$this->cell(35,5,"Categoria Presupuestaria:   ".$tba->fields["codcat"]."  Descripción de Categoria:   ".$tba->fields["nomcat"]);
								$this->ln(3);
								$this->sqla="";
								$this->sqla="SELECT codban,nomban FROM npbancos WHERE codban='".$tb->fields["codban"]."'";
								$tba=$this->bd->select($this->sqla);
								$this->nombre_banco=$tba->fields["nomban"];
								$this->cell(45,5,"Código de Centro de pago: ".$tba->fields["codban"]."     Centro de Pago: ".$tba->fields["nomban"]);
								/////////////////////////////////////////////////////////////////////////////////////////////////
								$this->ln(5);
								$this->SetFillColor(190,175,175);
								$this->Rect(10,$this->GetY(),195,4,"DF");
								$this->SetTextColor(0,0,0);
								$this->setFont("Arial","B",7);
								//fin de cuadro
								$this->SetTextColor(0,0,0);
								$this->cell(8,5,"");
								$this->cell(37,5,"Cédula");
								$this->cell(40,5,"Nombre");
								$this->cell(9,5,"");
								$this->cell(30,5,"Cargo");
								$this->cell(20,5,"");
								$this->cell(29,5,"Cuenta Bancaria");
								$this->cell(30,5,"Monto Concepto");
						endif;
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						//cuadro
 					if 	(trim($tb->fields["codban"])==($tb2->fields["codban"])):	
						$this->banco=1;
						$this->entrada=1;
							$this->ln(3);
							// lineas horizontales
							$this->Line($this->GetX(),$this->GetY()-3,$this->GetX()+195,$this->GetY()-3);
							//if ($this->GetY()  > 200):
								//$this->AddPage();
							//endif;
							$this->ln(1);
							$this->cell(5,5,"");
			
							//lineas verticales
							$this->Line($this->GetX()-5,$this->GetY(),$this->GetX()-5,$this->GetY()+4);
							$this->cell(20,5,$tb2->fields["codemp"]);
			
							//lineas verticales
							$this->Line($this->GetX()-4,$this->GetY(),$this->GetX()-4,$this->GetY()+4);
							$this->cell(56,5,strtoupper($tb2->fields["nomemp"]));
			
							//lineas verticales
							$this->Line($this->GetX()-4,$this->GetY(),$this->GetX()-4,$this->GetY()+4);
							$this->cell(60,5,strtoupper($tb2->fields["nomcar"]));
			
							//lineas verticales
							$this->Line($this->GetX()-4,$this->GetY(),$this->GetX()-4,$this->GetY()+4);
							$this->cell(5,5,"");
							$this->cell(30,5,strtoupper($tb2->fields["cuenta_banco"]));
			
							//lineas verticales
							$this->Line($this->GetX()-4,$this->GetY(),$this->GetX()-4,$this->GetY()+4);
							$this->cell(19,5,strtoupper($tb2->fields["saldo"]));

							$this->saldo_total=$this->saldo_total+$tb2->fields["saldo"];
							$this->Line(10,$this->GetY()+4,205,$this->GetY()+4);
		
							//lineas verticales
							$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+4);
							$this->cont=$this->cont+1;
						else:
								$this->banco=0;
								$this->entrada=1;
						endif;
						$tb2->MoveNext();
					}
				$tb->MoveNext();
			}
			$this->ln(10);
			$this->cell(80,5,"");
			$this->cell(45,5,"Total Centro de Pago: ".$this->nombre_banco."    ".$this->saldo_total);
			$this->ln(10);
			$this->cell(45,5,"Cantidad de Trabajadores: ".$this->cont);
			$this->saldo_total=0;
			$this->cont=0;

		////////////////////////////////fin del  ciclo////////////////////////////////
		}//cuerpo
	}//clase
?>
