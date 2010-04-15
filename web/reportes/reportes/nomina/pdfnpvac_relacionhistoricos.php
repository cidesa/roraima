<?
//<!--  Programado  por Jaime Suàrez -->
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
		var $sql;
		var $sqla;
		var $sqlb;
		var $sqlc;
		var $rep;
		var $numero;
		var $cab;

		var $codempdes;
		var $codemphas;
		var $codnivdes;
		var $codnivhas;
		var $tipnomdes;

		var $conf;
		var $nombre;
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
			$this->codnivdes=$_POST["codnivdes"];
			$this->codnivhas=$_POST["codnivhas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			//echo $this->codcathas;

//*********************** fin de variables *******************************
//*********************** inicio de sql *******************************
			$this->sql="";
			$this->sql="SELECT
						DISTINCT
							C.CODNIV,
							D.DESNIV
						FROM  
							NPCATPRE E,NPVACREGSAL A,NPHOJINT C, NPASICAREMP B, NPESTORG D
						WHERE
							B.CODNOM = TRIM('".$this->tipnomdes."') AND
							B.CODNOM = A.CODNOM AND
							B.CODCAT = E.CODCAT AND
							B.CODCAR = A.CODCAR AND
							B.CODEMP = C.CODEMP AND
							B.CODEMP = A.CODEMP AND
							C.CODNIV = D.CODNIV AND
							B.CODEMP >= RPAD(TRIM('".$this->codempdes."'),16,' ') AND
							B.CODEMP <= RPAD(TRIM('".$this->codemphas."'),16,' ') AND 
							C.CODNIV >= RPAD('".$this->codnivdes."',16,' ') AND
							C.CODNIV <= RPAD('".$this->codnivhas."',16,' ') AND 
							B.STATUS='V' AND
							A.STAVAC='S'
						ORDER BY
							C.CODNIV";
		}
//*********************** fin de sql *******************************
		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",9);
			
		}
		function Cuerpo()
		{

		$this->entrada=0;
		$this->SetTextColor(0,0,0);
		$this->setFont("Arial","",8);
		$this->Line($this->GetX(),$this->GetY(),$this->GetX()+195,$this->GetY());//horizontal
		$this->cell(5,5,"");
		$this->Line($this->GetX()-80,$this->GetY(),$this->GetX()-80,$this->GetY()+5);//verical
		$this->sqla="";
		$this->sqlc="SELECT codnom, nomnom FROM npnomina WHERE codnom='".$this->tipnomdes."'";
		$tb3=$this->bd->select($this->sqlc);
		$this->SetTextColor(0,0,128);
		$this->cell(37,5,"Nomina: ".$tb3->fields["codnom"]."  -  ".$tb3->fields["nomnom"]);
		$this->SetTextColor(0,0,0);
		$this->Line($this->GetX()-42,$this->GetY()+4,$this->GetX()+153,$this->GetY()+4);//horizontal
		$this->ln(4);
	    $tb=$this->bd->select($this->sql);
		while (!$tb->EOF)
			{ 
			$this->sqla="";
			$this->sqla="SELECT
						 DISTINCT
							C.CODEMP,         
							C.NOMEMP,
							C.FECING,
							C.FECRET,
							C.CEDEMP,
							A.CODCAR,         
							B.NOMCAR,
							B.CODCAT,
							E.NOMCAT,
							C.CODNIV,
							D.DESNIV
						FROM  
							NPCATPRE E,NPVACREGSAL A,NPHOJINT C, NPASICAREMP B, NPESTORG D
						WHERE
							B.CODNOM = TRIM('".$this->tipnomdes."') AND
							B.CODNOM = A.CODNOM AND
							B.CODCAT = E.CODCAT AND
							B.CODCAR = A.CODCAR AND
							B.CODEMP = C.CODEMP AND
							B.CODEMP = A.CODEMP AND
							C.CODNIV = D.CODNIV AND
							B.CODEMP >= RPAD(TRIM('".$this->codempdes."'),16,' ') AND
							B.CODEMP <= RPAD(TRIM('".$this->codemphas."'),16,' ') AND 
							C.CODNIV = RPAD('".$tb->fields["codniv"]."',16,' ') AND
							B.STATUS='V' AND
							A.STAVAC='S'
							ORDER BY
							C.CODEMP";


								$this->ln(3);
								$this->cell(5,5,"");
								$this->SetTextColor(0,0,128);
								$this->cell(65,5,"Nivel Organizacional: ".$tb->fields["desniv"]);
								$this->SetTextColor(0,0,0);
								$this->Line($this->GetX()-70,$this->GetY()+5,$this->GetX()+125,$this->GetY()+5);//horizontal
								$this->cell(5,5,"");
								$this->setFont("Arial","B",7);
								$this->ln(5);
								$this->cell(50,5,"Cèdula        Apellido y Nombres del Trabajador  F.Ingreso     Cargo del Trabajador                                      Periodo          F. Salida            F. Llegada            D. Bono");
								$this->ln(3);
								$this->setFont("Arial","",7);
		    $tb2=$this->bd->select($this->sqla);
				while (!$tb2->EOF)
					{
								$this->setFont("Arial","",6);
								$this->ln(1);
								$this->cell(14,5,strtoupper($tb2->fields["codemp"]));
								$this->cell(42,5,strtoupper($tb2->fields["nomemp"]));
								$this->cell(15,5,strtoupper($tb2->fields["fecing"]));
								$this->cell(50,5,strtoupper($tb2->fields["nomcar"]));


								//periodo ultimo ciclo
								$this->sqlb="SELECT
									to_char(FECHASALIDA,'dd/mm/yy') as fechasalida,
									to_char(FECHAENTRADA,'dd/mm/yy') as fechaentrada,
									PERINI,
									PERFIN,
									DIASBONO
								FROM
									NPNOMINA H, 
									NPCATPRE E,
									NPVACREGSAL A,
									NPHOJINT C, 
									NPASICAREMP B, 
									NPESTORG D
								WHERE
									B.CODNOM = TRIM('".$this->tipnomdes."') AND
									B.CODNOM=A.CODNOM AND
									B.CODNOM=H.CODNOM AND
									B.CODCAT=E.CODCAT AND
									B.CODCAR=A.CODCAR AND
									B.CODEMP=C.CODEMP AND
									B.CODEMP=A.CODEMP AND
									C.CODNIV=D.CODNIV AND
									B.CODEMP = RPAD(TRIM('".$tb2->fields["codemp"]."'),16,' ') AND
									B.STATUS='V' AND
									A.STAVAC='S'
								ORDER BY
									C.CODEMP ASC,
									PERINI";
							$tb3=$this->bd->select($this->sqlb);
								$this->cont=0;
								while (!$tb3->EOF)
									{
								$this->cont=$this->cont+1;
								if ($this->cont>1):
									$this->cell(121,5,"");
								endif;
								$this->cell(17,5,strtoupper($tb3->fields["perini"])."/".strtoupper($tb3->fields["perfin"]));
								$this->cell(20,5,strtoupper($tb3->fields["fechaentrada"]));
								$this->cell(22,5,strtoupper($tb3->fields["fechasalida"]));
								$this->cell(40,5,strtoupper($tb3->fields["diasbono"]));
								$this->ln(3);
								///////////////////////
							$tb3->MoveNext();
							}	
								$this->cell(5,5,"");
								$this->cell(40,5,strtoupper($tb->fields["fecing"]));
								$this->cell(50,5,strtoupper($tb->fields["nomcar"]));
						$tb2->MoveNext();
					}
				$tb->MoveNext();
				$this->setFont("Arial","",9);
			}
		////////////////////////////////fin del  ciclo////////////////////////////////
		}//cuerpo
	}//clase
?>
