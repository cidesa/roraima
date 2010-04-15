<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");


/*
AYUDA:
Cell(with,healt,Texto,border,linea,align,fillm-Fondo,link)
AddFont(family,style,file)
ln() -> Salto de Linea
*/

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $ancho;
		var $campos;
		var $sql;

		var $disco;
		var $codempdes;
		var $codemphas;
		var $tipnomhas;

		var $cont_trab;
		var $sueldo_total;
		var $retenciones;
		var $aportes;

		var $fechades;
		var $fechahas;


		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->acum_mon=0;
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->ancho=array();
			$this->disco=$_POST["disco"];
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->tipnomhas=$_POST["tipnomhas"];
			$this->fechades=$_POST["fechades"];
			$this->fechahas=$_POST["fechahas"];
			$this->especial = $_POST["especial"];
            $this->tipnomesp=$_POST["tipnomesp"];

             if ($this->especial == 'S')
            {
            	$especial = " h.especial = 'S' AND 	(h.CODNOMESP) = TRIM('".$this->tipnomesp."') AND ";
            }
            else
            {  if ($this->especial == 'N')       	$especial = " h.especial = 'N' AND "; else
               if ($this->especial == 'T') $especial = "";
            }

			$this->sql="SELECT
						DISTINCT
						trim(H.CODEMP) as CODEMP,
						A.CODTIPAPO,
						A.DESTIPAPO,
						A.PORAPO,
						A.PORRET,
						B.CODNOM AS CODNOMAPO,
						SUM(H.monto) AS CF_MONRETENCION,
						C.NOMNOM,
						rtrim(H.CODCAR) as codcar,
						to_char(E.FECING,'dd/mm/yyyy') as FECING,
						E.NOMEMP, e.sexemp, e.fecnac
						FROM
						NPTIPAPORTES A,
						NPCONTIPAPORET B,
						NPNOMINA C,
						npcargos F,
						NPHOJINT E,
						NPhiscon H
						WHERE
						H.codcar=F.codcar AND
						E.CODEMP=H.CODEMP AND
						E.CODEMP >=  ('".$this->codempdes."') AND
						E.CODEMP <= ('".$this->codemphas."') AND
						H.CODCON = B.CODCON AND
						upper(B.TIPO)='R'  AND  ".$especial."
						H.FECNOM>=to_date('".$this->fechades."','dd/mm/yyyy') AND
						H.FECNOM<=to_date('".$this->fechahas."','dd/mm/yyyy') AND
						B.CODNOM=H.CODNOM AND
						A.CODTIPAPO=B.CODTIPAPO AND
						B.CODNOM=C.CODNOM AND
						A.CODTIPAPO=B.CODTIPAPO AND
						A.CODTIPAPO='0003' AND
						B.CODNOM>='".$this->tipnomdes."' AND
						B.CODNOM<='".$this->tipnomhas."'
						GROUP BY
						A.CODTIPAPO,H.CODEMP,H.CODCAR,E.NOMEMP,E.FECING,A.DESTIPAPO,A.PORAPO,A.PORRET,C.NOMNOM,B.CODNOM,H.monto, e.sexemp, e.fecnac
						ORDER BY B.CODNOM,E.nomEMP";
						//print '<pre>'; print $this->sql;

//NO CONSIGO EL CODTIPAPODES Y NI HAS
			$this->cab=new cabecera();
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}
		}


		function Cuerpo()
		{   $this->setFont("Arial","B",9);
			$tb=$this->bd->select($this->sql);
			$sw=0;
			//$cod_nom=$tb->fields["codnomapo"];
			while (!$tb->EOF){

			   if ($cod_nom!=$tb->fields["codnomapo"]){
   	 			    $cod_nom=$tb->fields["codnomapo"];
  				   if ($sw==1){
					   $this->ln();
					   $this->Imprimir_Totales();
				   		}
				   else{
 				    $sw=1; }

						$this->cont_trab=0;
						$this->sueldo_total=0;
						$this->retenciones=0;
						$this->aportes=0;

					$this->cell(15,10,"Nómina: ");
					$this->cell(7,10,$tb->fields["codnomapo"]);
					$this->cell(30,10,strtoupper($tb->fields["nomnom"]));
					$this->ln(4);
					$this->cell(23,10,"Fecha Desde: ");
					$this->cell(20,10,$this->fechades);
					$this->cell(12,10,"Hasta: ");
					$this->cell(15,10,$this->fechahas);
					$this->ln();
					$this->Line(10,$this->GetY(),270,$this->GetY());
					$this->cell(20,10,"Cédula",0,0,"C");
					$this->cell(60,10,"Empleado",0,0,"C");
					$this->setX(95);
					$this->cell(20,10,"Sexo",0,0,"C");
					$this->cell(20,10,"Fec. Nac",0,0,"C");
					$this->setX(132);
					$this->cell(30,10,"Sueldo",0,0,"C");
					$this->cell(30,10,"Fecha de Ingreso",0,0,"C");
					$this->cell(30,10,"Retención 1%",0,0,"C");
					$this->cell(30,10,"Aporte 2%",0,0,"C");
					$this->cell(30,10,"Total",0,0,"C");
					$this->ln();
					$this->Line(10,$this->GetY(),270,$this->GetY());
					}
					/////////////  Detalles  ////////////
					$this->setFont("Arial","",9);
					 if ($tb->fields["codemp"]!="" and $ced_emp!=$tb->fields["codemp"]){
					 //if ($tb->fields["codemp"]!="" and $tb->fields["codtipapo"]=='0002'){
					 //CODTIPAPO
 					    $ced_emp=$tb->fields["codemp"];
						$this->cell(20,10,$tb->fields["codemp"]);
						$this->cell(60,10,ucwords($tb->fields["nomemp"]));
						$this->setX(95);
						if ($tb->fields["sexemp"]=='F'){ $tb->fields["sexemp"]='Femenino'; }
						if ($tb->fields["sexemp"]=='M'){ $tb->fields["sexemp"]='Masculino'; }
						$this->cell(20,10,$tb->fields["sexemp"]);
						$this->cell(20,10,ucwords($tb->fields["fecnac"]));
  						 $tb2=$this->bd->select("SELECT
														coalesce(SUM(MONTO),0) as VALOR
													FROM
														NPHISCON A,
														NPCONSALINT B
													WHERE
													  (CODEMP)=('".$tb->fields["codemp"]."') AND
													  (CODCAR)=('".$tb->fields["codcar"]."') AND
													  A.CODCON=B.CODCON and
													  A.FECNOM >= to_date('".$this->fechades."','dd/mm/yyyy') AND
													  A.FECNOM <= to_date('".$this->fechahas."','dd/mm/yyyy')");

 						$this->setX(129);
						$this->cell(30,10,number_format($tb2->fields["valor"],2,',','.'),0,0,'R');
						$this->cell(20,10,$tb->fields["fecing"],0,0,'R');
						$this->cell(30,10,number_format($tb->fields["cf_monretencion"],2,',','.'),0,0,'R');
							$tb1=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as ELMONTO FROM NPHISCON A, NPHOJINT B, NPCONTIPAPORET C  WHERE trim(C.CODTIPAPO)='0003' AND  A.CODNOM=C.CODNOM AND A.CODCON=C.CODCON AND trim(C.TIPO)='A' AND  trim(B.CODEMP)=trim(A.CODEMP) AND  trim(B.CODEMP)=trim('".$tb->fields["codemp"]."') AND A.FECNOM >= to_date('".$this->fechades."','dd/mm/yyyy') AND A.FECNOM <= to_date('".$this->fechahas."','dd/mm/yyyy')");
							//print "SELECT coalesce(SUM(MONTO),0) as ELMONTO FROM NPHISCON A, NPHOJINT B, NPCONTIPAPORET C                 WHERE trim(C.CODTIPAPO)='0002' AND  A.CODNOM=C.CODNOM AND A.CODCON=C.CODCON AND trim(C.TIPO)='a' AND  trim(B.CODEMP)=trim(A.CODEMP) AND  trim(B.CODEMP)=trim('".$tb->fields["codemp"]."') AND A.FECNOM >= to_date('".$this->fechades."','dd/mm/yyyy') AND A.FECNOM <= to_date('".$this->fechahas."','dd/mm/yyyy')";

						 $this->cell(30,10,number_format($tb1->fields["elmonto"],2,',','.'),0,0,'R');
						 $this->cell(30,10,number_format($tb1->fields["elmonto"]+$tb->fields["cf_monretencion"],2,',','.'),0,0,'R');

						$this->ln(4);

						$this->cont_trab=$this->cont_trab + 1;
						$this->sueldo_total=$this->sueldo_total+$tb2->fields["valor"];
						$this->retenciones=$this->retenciones+$tb->fields["cf_monretencion"];
						$this->aportes=$this->aportes+$tb1->fields["elmonto"];
						}//EndIf
			  $tb->MoveNext();
			}
			if($tb->EOF){
			$this->ln(4);
				$this->Imprimir_Totales();
				$this->Imprimir_Totales_General();  }
		}

	function Imprimir_Totales(){
						$this->cont_trab1=$this->cont_trab1 + $this->cont_trab;
						$this->sueldo_total1=$this->sueldo_total1+$this->sueldo_total;
						$this->retenciones1=$this->retenciones1+$this->retenciones;
						$this->aportes1=$this->aportes1+$this->aportes;

		$this->setFont("Arial","B",9);
		$this->cell(250,10,"RESUMEN DE TOTALES",0,0,'C');
		$this->ln();
		$this->Line(100,$this->GetY(),270,$this->GetY());
		//$this->cell(90,10,"TOTAL",0,0,'R');
		$this->cell(100,10,"");
		$this->cell(50,10,"TRABAJADORES",0,0,'C');
		$this->cell(33,10,number_format($this->cont_trab),0,0,'R');
		$this->ln(4);
		$this->cell(100,10,"");
		$this->cell(50,10,"SUELDO TOTAL",0,0,'C');
		$this->cell(33,10,number_format($this->sueldo_total,2,',','.'),0,0,'R');
		$this->ln(4);
		$this->cell(100,10,"");
		$this->cell(50,10,"RETENCIONES",0,0,'C');
		$this->cell(33,10,number_format($this->retenciones,2,',','.'),0,0,'R');
		$this->ln(4);
		$this->cell(100,10,"");
		$this->cell(50,10,"APORTES",0,0,'C');
		$this->cell(33,10,number_format($this->aportes,2,',','.'),0,0,'R');
		$this->ln();
		$this->Line(10,$this->GetY(),270,$this->GetY());	}

	function Imprimir_Totales_General(){

		$this->setFont("Arial","B",9);
		$this->cell(250,10,"RESUMEN GENERAL DE TOTALES",0,0,'C');
		$this->ln();
		$this->Line(100,$this->GetY(),270,$this->GetY());
		//$this->cell(90,10,"TOTAL",0,0,'R');
		$this->cell(100,10,"");
		$this->cell(50,10,"TRABAJADORES",0,0,'C');
		$this->cell(33,10,number_format($this->cont_trab1),0,0,'R');
		$this->ln(4);
		$this->cell(100,10,"");
		$this->cell(50,10,"SUELDO TOTAL",0,0,'C');
		$this->cell(33,10,number_format($this->sueldo_total1,2,',','.'),0,0,'R');
		$this->ln(4);
		$this->cell(100,10,"");
		$this->cell(50,10,"RETENCIONES",0,0,'C');
		$this->cell(33,10,number_format($this->retenciones1,2,',','.'),0,0,'R');
		$this->ln(4);
		$this->cell(100,10,"");
		$this->cell(50,10,"APORTES",0,0,'C');
		$this->cell(33,10,number_format($this->aportes1,2,',','.'),0,0,'R');
		$this->ln();
		$this->Line(10,$this->GetY(),270,$this->GetY());	}
	}
?>