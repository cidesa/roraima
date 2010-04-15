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
		var $car1;
		var $car2;
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
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->emp1=$_POST["emp1"];
			$this->emp2=$_POST["emp2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->car1=$_POST["car1"];
			$this->car2=$_POST["car2"];
			$this->cat1=$_POST["cat1"];
			$this->cat2=$_POST["cat2"];
			$this->per1=$_POST["per1"];
			$this->per2=$_POST["per2"];
			$this->nom=$_POST["nom"];
			$this->nomesp=$_POST["nomesp"];
			$this->tipcon=strtoupper($_POST["tipcon"]);
			  if ($this->tipcon=='T')
			  {
			     $EST1='A';
			     $EST2='D';
			     $EST3='P';
			  }
			  if ($this->tipcon=='A')
			  {
			     $EST1='A';
			     $EST2='A';
			     $EST3='A';
			  }
			  if ($this->tipcon=='D')
			  {
			     $EST1='D';
			     $EST2='D';
			     $EST3='D';
			  }
			  if ($this->tipcon=='P')
			  {
			     $EST1='P';
			     $EST2='P';
			     $EST3='P';
			  }
			$this->sql="SELECT DISTINCT
				A.CODEMP,  
				D.NOMCON,
				A.CODCON,
				A.CODCAR,
				E.CODCAT,
				RTRIM(F.NOMCAT) AS NOMCAT,
				A.SALDO,   
				A.CODNOM,      
				C.NOMEMP,
				C.CEDEMP,
				B.NOMCAR,
				D.OPECON,
				D.IMPCPT
				FROM NPNOMCAL A, NPCARGOS B, NPHOJINT C, NPDEFCPT D, NPASICAREMP E, NPCATPRE F
				WHERE
				A.CODNOM='".$this->nom."' AND 
				TRIM(A.ESPECIAL) = CASE WHEN TRIM('".$this->nomesp."') = '' THEN 'N' ELSE 'S' END AND
				COALESCE(TRIM(A.CODNOMESP),' ') = CASE WHEN TRIM('".$this->nomesp."')='' THEN ' ' ELSE TRIM('".$this->nomesp."') END AND
				TRIM(A.CODEMP) >= TRIM('".$this->emp1."') AND
				TRIM(A.CODEMP) <= TRIM('".$this->emp2."') AND
				TRIM(A.CODCAR) >= TRIM('".$this->car1."') AND
				TRIM(A.CODCAR) <= TRIM('".$this->car2."') AND
				TRIM(A.CODCON) >= TRIM('".$this->con1."') AND
				TRIM(A.CODCON) <= TRIM('".$this->con2."') AND
				A.CODCON=D.CODCON AND
				A.CODEMP=C.CODEMP AND
				A.CODCAR=B.CODCAR AND
				A.CODEMP=E.CODEMP AND
				A.CODCAR=E.CODCAR AND
				A.CODNOM=E.CODNOM AND
				E.CODCAT=F.CODCAT AND
				A.SALDO<>0.00 AND
				D.CONACT='S' AND
				TRIM(E.CODCAT) >= TRIM('".$this->cat1."') AND
				TRIM(E.CODCAT) <= TRIM('".$this->cat2."') AND
				E.STATUS='V' AND
				(D.OPECON = '".$EST1."'  OR
				 D.OPECON = '".$EST2."'  OR
				 D.OPECON = '".$EST3."')
				ORDER BY A.CODCON,A.CODEMP";
			//echo $this->sql;exit;
			$this->cab=new cabecera();
			
		}
		
		
		function Header()
		{
			$this->SetTextColor(0,0,0);
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",8);
			$this->ln(-1);
			$this->sqlx="select codnom, nomnom, to_char(ultfec,'dd/mm/yyyy') as ultfec, to_char(profec,'dd/mm/yyyy') as profec from npnomina where codnom='".$this->nom."'";
			$tbx=$this->bd->select($this->sqlx);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$codigo=strtoupper($tbx->fields["codnom"]);
			$nombre=strtoupper($tbx->fields["nomnom"]);
			$ultfec=strtoupper($tbx->fields["ultfec"]);
			$profec=strtoupper($tbx->fields["profec"]);
			$this->nombre=$nombre;
			$this->cell(17,5,"NOMINA: ".$codigo."   -   ".$nombre."    del $ultfec    al $profec");
			$this->Line(10,$this->GetY()+6,200,$this->GetY()+6);
			$this->ln();
			$this->Ln(2);
		}
		function Cuerpo()
		{
			$tbg=$this->bd->select($this->sql);
			while(!$tbg->EOF)
			{
				$this->cell(60,5,"Código Concepto");
				$this->Cell(50,5,"Descripción Concepto");
				$this->ln();
				$this->SetFillColor(220,220,220);
				$this->cell(55,5,$tbg->fields["codcon"],0,0,'L',1);
				$codigo=$tbg->fields["codcon"];
				$this->Cell(5);
				$this->MultiCell(135,5,$tbg->fields["nomcon"],0,"J",1);
				$descripcion=$tbg->fields["nomcon"];
				$this->SetFillColor(255,255,255);
				$this->Ln(2);
				$cs_totcon=0;
				$cs_saldoprestamo=0;
				$totalemp=0;
				$concepto = $tbg->fields["codcon"]; 
				while((!$tbg->EOF) and ($concepto == $tbg->fields["codcon"]))
				{
					$this->Cell(1,5,"Categoria Presupuestaria");
					$this->Ln();
					$this->Cell(60,5,$tbg->fields["codcat"]);
					$this->Cell(135,5,$tbg->fields["nomcat"]);
					$this->Ln(8);
					$this->Line(10,$this->GetY(),206,$this->GetY());
					$this->Cell(20,5,"Cédula",0,0,'C');
					$this->Cell(60,5,"Nombre");
					$this->Cell(60,5,"Cargo");
					$this->Cell(30,5,"Monto Concepto");
					$this->Cell(30,5,"Saldo Crediticia");
					$this->Line(10,$this->GetY()+5,206,$this->GetY()+5);
					$this->Ln(8);
					$categoria=$tbg->fields["codcat"];
					$totalcat=0;
					$contaremp=0;
					while((!$tbg->EOF) and ($categoria == $tbg->fields["codcat"]) and ($concepto == $tbg->fields["codcon"]))
					{
						$this->Cell(20,5,$tbg->fields["codemp"],0,0,'C');
						$nomx=$this->GetX();
						$this->Cell(60);
						$this->Cell(57,5,$tbg->fields["nomcar"]);
						$this->Cell(30,5,number_format($tbg->fields["saldo"],2,'.',','),0,0,'R');
						$tipoprestamo = $this->bd->select("SELECT CODTIPPRE AS VALOR 
															FROM NPTIPPRE 
															WHERE TRIM(CODCON)=TRIM('".$tbg->fields["codcon"]."')");
						if($tipoprestamo->EOF)
						{
							$crediticia=0;
						}
						else
						{
							$acum=$this->bd->select("  SELECT COALESCE(ACUMULADO,0) AS SALDO
															FROM NPASICONEMP
															WHERE TRIM(CODCAR) = TRIM('".$tbg->fields["codcar"]."') AND 
															TRIM(CODEMP)=TRIM('".$tbg->fields["codemp"]."') AND 
															TRIM(CODCON)=TRIM('".$tbg->fields["codcon"]."')");
							if(!$acum->EOF)
							{
								$acumulado=0;
							}
							else
							{
								$acumulado=$acum->fields["saldo"];
							}
							$crediticia=$acumulado-$tbg->fields["saldo"];
							$cs_saldoprestamo+=$crediticia;
							
						}
						$this->Cell(30,5,number_format($crediticia,2,'.',','),0,0,'R');
						$this->SetX($nomx);
						$this->MultiCell(50,4,$tbg->fields["nomemp"]);
						$this->Ln(4);
						$totalcat+=$tbg->fields["saldo"];
						$contaremp++;
						$tbg->MoveNext();
					}
					$this->Ln(4);
					$this->Line(145,$this->GetY()-3,180,$this->GetY()-3);
					$this->SetX(45);
					$this->Cell(60,5,"TOTAL & NOMCAT:");
					$this->Cell(72,5,number_format($totalcat,2,'.',','),0,0,'R');
					$this->Ln(7);
					$this->SetX(45);
					$this->Cell(60,5,"TOTAL EMPLEADOS & NOMCAT:");
					$this->Cell(72,5,$contaremp,0,0,'R');
					$this->Ln(12);
					$cs_totcon+=$totalcat;
					$totalemp+=$contaremp;
				}
				$this->Cell(137,5,"TOTAL CONCEPTO:   ".$codigo."   ".$descripcion);
				$this->Cell(30,5,number_format($cs_totcon,2,'.',','),0,0,'R');
				$this->Cell(30,5,number_format($cs_saldoprestamo),0,0,'R');
				$this->Ln(8);
				$this->Cell(30,5,"CANTIDAD TRABAJADORES: ".$totalemp);
				if(!$tbg->EOF)
				{
					//$this->Ln(12);
					$this->Addpage();
				}
			}
			
		}
	}
?>
