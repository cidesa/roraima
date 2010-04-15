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
		var $tipnomdes;

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
			$this->tipnomdes=$_POST["tipnomdes"];
			//echo $this->codcathas;

//*********************** fin de variables *******************************
//*********************** inicio de sql *******************************
			$this->sql="";
			$this->sql="SELECT
						DISTINCT
							A.CODNOM,
							H.NOMNOM AS NOMINA,
							C.CODEMP,         
							C.NOMEMP,
							to_char(C.FECING,'dd/mm/yy') as fecing,
							A.CODCAR ,         
							B.NOMCAR,
							C.CODNIV,
							D.DESNIV
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
							B.CODEMP >= RPAD(TRIM('".$this->codempdes."'),16,' ') AND
							B.CODEMP <= RPAD(TRIM('".$this->codemphas."'),16,' ') AND 
							B.STATUS='V' AND
							A.STAVAC='S' 
						ORDER BY
							C.CODEMP ASC";
						//print $this->sql;			
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

		//////////////////////////////////ciclo////////////////////////////////////////////
	    $tb=$this->bd->select($this->sql);
		while (!$tb->EOF)
			{ 
			$this->sqlc="";
			$this->sqlc="SELECT
							to_char(FECHASALIDA,'dd/mm/yy') as fechasalida,
							to_char(FECHAENTRADA,'dd/mm/yy') as fechaentrada,
							PERINI,
							PERFIN 
						FROM
							NPNOMINA H, 
							NPCATPRE E,
							NPVACREGSAL A,
							NPHOJINT C, 
							NPASICAREMP B, 
							NPESTORG D
						WHERE
							B.CODNOM = TRIM('".$tb->fields["codnom"]."') AND
							B.CODNOM=A.CODNOM AND
							B.CODNOM=H.CODNOM AND
							B.CODCAT=E.CODCAT AND
							B.CODCAR=A.CODCAR AND
							B.CODEMP=C.CODEMP AND
							B.CODEMP=A.CODEMP AND
							C.CODNIV=D.CODNIV AND
							B.CODEMP = RPAD(TRIM('".$tb->fields["codemp"]."'),16,' ') AND
							B.STATUS='V' AND
							A.STAVAC='S'
						ORDER BY
							C.CODEMP ASC,
							PERINI";
						//print $this->sqlc;			
						$this->banco=0;
								$this->SetTextColor(0,0,0);
								$this->Line($this->GetX(),$this->GetY(),$this->GetX()+195,$this->GetY());//horizontal
								$this->cell(80,5,"");
								$this->Line($this->GetX()-80,$this->GetY(),$this->GetX()-80,$this->GetY()+5);//verical
								$this->cell(37,5,"Datos del Trabajador");
								$this->Line($this->GetX()+78,$this->GetY(),$this->GetX()+78,$this->GetY()+5);
								$this->Line($this->GetX()-117,$this->GetY()+4,$this->GetX()+78,$this->GetY()+4);//horizontal
								$this->ln(4);


								$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+5);//vertical
								$this->cell(15,5,"");
								$this->cell(65,5,"Cédula");
								$this->Line($this->GetX()-30,$this->GetY(),$this->GetX()-30,$this->GetY()+5);//verical
								$this->cell(65,5,"Apellidos y Nombre");
								$this->Line($this->GetX()-5,$this->GetY(),$this->GetX()-5,$this->GetY()+5);//verical
								$this->cell(30,5,"Tipo de Nomina");
								$this->Line($this->GetX()+20,$this->GetY(),$this->GetX()+20,$this->GetY()+5);//vertical
								$this->Line($this->GetX()-175,$this->GetY()+5,$this->GetX()+20,$this->GetY()+5);//horizontal

								$this->ln(4);
								$this->setFont("Arial","",7);
								$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+5);//vertical
								$this->cell(14,5,"");
								$this->cell(60,5,strtoupper($tb->fields["codemp"]));
								$this->Line($this->GetX()-24,$this->GetY(),$this->GetX()-24,$this->GetY()+5);//verical
								$this->cell(67,5,strtoupper($tb->fields["nomemp"]));
								$this->Line($this->GetX()-1,$this->GetY(),$this->GetX()-1,$this->GetY()+5);//verical
								$this->cell(30,5,strtoupper($tb->fields["nomina"]));
								$this->Line($this->GetX()+24,$this->GetY(),$this->GetX()+24,$this->GetY()+5);//vertical
								$this->Line($this->GetX()-171,$this->GetY()+5,$this->GetX()+24,$this->GetY()+5);//horizontal
								$this->setFont("Arial","B",9);

								$this->ln(4);
								$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+5);//vertical
								$this->cell(5,5,"");
								$this->cell(50,5,"Fecha de Ingreso");
								$this->Line($this->GetX()-20,$this->GetY()+1,$this->GetX()-20,$this->GetY()+5);//verical
								$this->cell(50,5,"Cargo del Trabajador");
								$this->Line($this->GetX()-1,$this->GetY()+1,$this->GetX()-1,$this->GetY()+5);//verical
								$this->cell(15,5,"");
								$this->cell(30,5,"Ubicación Administrativa");
								$this->Line($this->GetX()+45,$this->GetY()+1,$this->GetX()+45,$this->GetY()+5);//vertical
								$this->Line($this->GetX()-150,$this->GetY()+5,$this->GetX()+45,$this->GetY()+5);//horizontal


								$this->ln(4);
								$this->setFont("Arial","",7);
								$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+5);//vertical
								$this->cell(5,5,"");
								$this->cell(40,5,strtoupper($tb->fields["fecing"]));
								$this->Line($this->GetX()-10,$this->GetY()+1,$this->GetX()-10,$this->GetY()+5);//verical
								$this->cell(50,5,strtoupper($tb->fields["nomcar"]));
								$this->Line($this->GetX()+9,$this->GetY()+1,$this->GetX()+9,$this->GetY()+5);//verical
								$this->cell(12,5,"");
								$this->cell(30,5,strtoupper($tb->fields["desniv"]));
								$this->setFont("Arial","B",9);
								$this->Line($this->GetX()+58,$this->GetY()+1,$this->GetX()+58,$this->GetY()+5);//vertical
								$this->Line($this->GetX()-137,$this->GetY()+5,$this->GetX()+58,$this->GetY()+5);//horizontal

								$this->ln(4);
								$this->cell(70,5,"");
								$this->Line($this->GetX()-70,$this->GetY(),$this->GetX()-70,$this->GetY()+5);//verical
								$this->cell(37,5,"Histórico de Vacaciones Disfrutadas");
								$this->Line($this->GetX()+88,$this->GetY(),$this->GetX()+88,$this->GetY()+5);//vertical
								$this->Line($this->GetX()-107,$this->GetY()+5,$this->GetX()+88,$this->GetY()+5);//horizontal
								$this->ln(15);

								$this->SetFillColor(190,175,175);
								$this->Rect(10,$this->GetY(),195,4,"DF");
								$this->SetTextColor(0,0,0);
								$this->cell(8,5,"");
								$this->cell(30,5,"Periodo Desde");
								$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+4);//verical
								$this->cell(9,5,"");
								$this->cell(50,5,"Periodo Hasta");
								$this->Line($this->GetX()-10,$this->GetY(),$this->GetX()-10,$this->GetY()+4);//verical
								$this->cell(1,5,"");
								$this->Line($this->GetX()+40,$this->GetY(),$this->GetX()+40,$this->GetY()+4);//verical
								$this->cell(40,5,"Fecha de Salida");
								$this->cell(15,5,"");
								$this->cell(30,5,"Fecha de Regreso");

		    $tb2=$this->bd->select($this->sqlc);
				while (!$tb2->EOF)
					{

						///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						//cuadro
							$this->ln(3);
							$this->setFont("Arial","",8);
							$this->Line($this->GetX(),$this->GetY()-3,$this->GetX()+195,$this->GetY()-3);
							$this->ln(1);
							$this->cell(5,5,"");

							$this->Line($this->GetX()-5,$this->GetY(),$this->GetX()-5,$this->GetY()+4);
							$this->cell(8,5,"");
							$this->cell(30,5,$tb2->fields["perini"]);
			
							$this->Line($this->GetX()-5,$this->GetY(),$this->GetX()-5,$this->GetY()+4);
							$this->cell(10,5,"");
							$this->cell(30,5,strtoupper($tb2->fields["perfin"]));
			
							$this->Line($this->GetX()+4,$this->GetY(),$this->GetX()+4,$this->GetY()+4);
							$this->cell(22,5,"");
							$this->cell(16,5,strtoupper($tb2->fields["fechasalida"]));
							$this->Line($this->GetX()+17,$this->GetY(),$this->GetX()+17,$this->GetY()+4);

							$this->cell(40,5,"");
							$this->cell(30,5,strtoupper($tb2->fields["fechaentrada"]));
							$this->Line(10,$this->GetY()+4,205,$this->GetY()+4);
							$this->setFont("Arial","B",9);
							//lineas verticales
							$this->Line($this->GetX()+4,$this->GetY(),$this->GetX()+4,$this->GetY()+4);
							$this->cont=$this->cont+1;
						$tb2->MoveNext();
					}
				$tb->MoveNext();
			if (!$tb->EOF):
				$this->AddPage();
			endif;

			}
		////////////////////////////////fin del  ciclo////////////////////////////////
		}//cuerpo
	}//clase
?>
