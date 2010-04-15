<?
	require_once("../../lib/general/fpdf/fpdf.php");
    require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	//require_once("../../lib/general/negociorpresupuesto.php");
	require_once("../../lib/general/obtener_mascara.php");
	require_once("../../lib/general/Herramientas.class.php");

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

		var $refcompdesd;
		var $refcomphast;

		var $fecdes;
		var $fechast;

		var $tipocomdes;
		var $tipocomhas;

		var $status;

		var $codpredesde;
		var $codprehasta;

		var $comodin;



		var	$MASCARA;
		var $cont;

// que hace esta calse¡

		function pdfreporte()
		{
			$this->fpdf("l","mm","Legal");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->arrp=array('no-vacio');


			$this->refcompdesd=trim(H::GetPost("refcompdesd"));
			$this->refcomphast=trim(H::GetPost("refcomphast"));

			$this->fecdes=trim(H::GetPost("fecdes"));
			$this->fechast=trim(H::GetPost("fechast"));

			$this->tipocomdes=trim(H::GetPost("tipocomdes"));
			$this->tipocomhas=trim(H::GetPost("tipocomhas"));

			$this->status=strtoupper(trim(H::GetPost("status")));

			$this->codpredesde=trim(H::GetPost("codpredesde"));
			$this->codprehasta=trim(H::GetPost("codprehasta"));

			$this->cedrifdes=trim(H::GetPost("cedrifdes"));
			$this->cedrifhas=trim(H::GetPost("cedrifhas"));

			$this->comodin=trim(H::GetPost("comodin"));

			if($this->status=='A')
			{
				$sql=" (A.STACOM='".$this->status."' OR (A.STACOM='N' AND A.FECANU>to_date('".$this->fechast."','dd/mm/yyyy'))) AND";
				$this->nomsta='Activos';
			}else
			{
				$sql=" A.STACOM='".$this->status."'and A.FECANU <= to_date('".$this->fechast."','dd/mm/yyyy') AND ";
				$this->nomsta='Anulados';
			}



			$this->sql="SELECT
					A.refcom as refcom,
					A.tipcom as tipcom,
					A.feccom as  feccom,
					A.descom as  descom,
					B.CodPre as codpre,
					C.NomPre as nompre,
					B.monimp as monimp,
					B.moncau as moncau,
					B.monpag as monpag,
					B.monaju as ajuste,
					A.CEDRIF as cedrif,
					A.MONCOM as moncom,
					(b.monimp-b.monaju) as mon_aju,
					(A.MONCOM-A.SALCAU) as salcom,
					(B.monimp-B.monaju)as mon_aju,coalesce(d.nomben,'NO DEFINIDO') as nomben
				FROM
					CPCOMPRO A left outer join opbenefi d on (a.cedrif=d.cedrif),
					CPIMPCOM B,
					CPDEFTIT C
				WHERE
     			   A.REFCOM = B.REFCOM AND
	               B.CodPre = C.CodPre  AND
	               A.refcom>='".$this->refcompdesd."'  and
				   A.refcom <='".$this->refcomphast."' and
				   A.feccom>=to_date('".$this->fecdes."','dd/mm/yyyy') and
				   A.feccom<=to_date('".$this->fechast."','dd/mm/yyyy') and
				   B.codpre >=('".$this->codpredesde."') and
				   B.codpre <=('".$this->codprehasta."') and
				   a.cedrif >=('".$this->cedrifdes."') and
				   a.cedrif <=('".$this->cedrifhas."') and
				   A.tipcom >= '".$this->tipocomdes."' and
				   A.tipcom <= '".$this->tipocomhas."' and
					".$sql."
	               B.CODPRE LIKE ('".$this->comodin."')
				   ORDER BY B.codpre,A.feccom";

				//	print $this->sql;


//print $this->sql;exit;
//exit;

		$this->cab=new cabecera();
		$this->MASCARA=$this->MASCARA();
		$this->tb=$this->bd->select($this->sql);
		}

		function MASCARA()
			  {
				$this->sqlmas="SELECT NOMABR as nomabr FROM CPNIVELES ORDER BY CONSEC";
				$tbmas=$this->bd->select($this->sqlmas);
				$cont=1;
				$tira="";
				while(!$tbmas->EOF)
			  	{
			  	if ($cont==1){

			  		 $tira=$tira.$tbmas->fields["nomabr"];
			  		 }

			  		 else{

			  		 $tira=$tira."-".$tbmas->fields["nomabr"];
			  		 }
			  	$cont++;
			  	 $tbmas->MoveNext();
			  	}

				return $tira;
			}

		function Header()
		{
			$this->cab->poner_cabecera_f_b($this,strtoupper("Relacion Diaria de Compromisos")." (".$this->nomsta.")","ll","s","s");

			/*$this->Image("../../img/logo_1.jpg",10,8,33);
			$this->SetX(300);
			$this->Cell(50,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
			$fecha=date("d/m/Y");
			$this->SetX(300);
			$this->Cell(50,10,'Fecha: '.$fecha,0,0,'C');
			$this->setFont("Arial","",7);*/


			$this->sql03= "SELECT TO_CHAR(FECPER,'YYYY') as ANO  FROM CPDEFNIV";
			$tb03=$this->bd->select($this->sql03);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->SetXY(230,30);
			$this->SetTextColor(0,0,0);
			$fecha=date("d/m/Y");
			$this->cell(200,5,"Al :     ".$fecha,0,0,'R');
			$this->setFont("Arial","B",9);
			$this->SetXY(70,20);
			$this->SetTextColor(0,0,128);
		//	$this->cell(200,12,strtoupper("Relación Diaria de Compromisos")." (".$this->nomsta.")",0,0,'C');
			$this->SetXY(70,25);
			//$this->cell(200,5,STRTOUPPER($tipopresup),0,0,'C');
			$this->SetXY(70,30);
		//	$this->cell(200,5,"(En Bolivares)",0,0,'C');




			$this->SetXY(20,30);
			$this->SetTextColor(0,0,0);
			$this->cell(15,5,"Año",0,0,'R');
			$this->cell(15,5,$tb03->fields["ano"],0,0,'L');
			$this->cell(30,5,"Desde  ".$this->fecdes."   Hasta   ".$this->fechast,0,0,'L');
			$this->sety(38);
// cabeza
			$this->Line(10,35,340,35);
			$this->setFont("Arial","B",8);
			$this->SetTextColor(128,0,0);
					/*$this->SetX(10);
					$this->cell(40,3,"Cod.Presupuestario",0,0,'C');

					$this->SetX(60);
					$this->cell(30,3,"Numero",0,0,'C');

					$this->SetX(90);
					$this->cell(30,3,"Fecha",0,0,'C');

					$this->SetX(120);
					$this->cell(60,3,"Razon Social/ Beneficiaro",0,0,'C');

					$this->SetX(180);
					$this->cell(100,3,"Descripcion",0,0,'C');

					$this->SetX(290);
					$this->cell(30,3,"Monto",0,0,'C');

					$this->ln();
					$this->SetX(290);
					$this->cell(30,3,"Comprometido",0,0,'C');

					$this->SetX(10);
					$this->setFont("Arial","B",7);
					$this->multicell(33,3,$this->MASCARA,0,0,'C');*/

					$this->setWidths(array(60,20,30,80,100,30));
					$this->setAligns(array("C","C","C","C","C","C"));
					$this->row(array("Cod.Presupuestario ".$this->MASCARA,"Numero","Fecha","Razon Social/ Beneficiaro","Descripcion","Monto Comprometido"));
					$this->setAligns(array("C","C","C","L","L","R"));


					$this->Line(10,$this->gety(),340,$this->gety());
					$this->ln(3);
					$this->SetTextColor(0,0,0);
		}


		function Cuerpo()
		{

		    $tb=$this->tb;

			$programa=$tb->fields["programa"];
		//	print $actividad;

			while(!$tb->EOF)
			{
			/*if ($tb->fields["programa"]!=$programa)
					{
					$this->setFont("Arial","BU",8);
					$this->ln(5);
					$this->SetX(180);
					$this->cell(30,4,"TOTAL POR PROGRAMA:".$tb->fields["programa"]); // titulo

					$this->SetX(290);
					$this->cell(30,4,H::FormatoMonto($TSALDOCOM),0,0,'R'); // asignacion inicail


				$TTSALDOCOM+=$TSALDOCOM;

				$TSALDOCOM=0.0;

				$programa=$tb->fields["programa"];
				}
*/
				// detalle
/*				$this->setFont("Arial","",6);
		    	$this->SetX(10);
		    	$this->cell(30,5,$tb->fields["codpre"]);

				$this->SetX(60);
				$this->cell(23,4,$tb->fields["refcom"],0,0,'R');

				$this->SetX(90);
				$this->cell(23,4,($tb->fields["feccom"]),0,0,'R');

				$this->SetX(180);
				$this->cell(100,4,$tb->fields["descom"],0,0,'l'); //*/

/////////////formulas para calcular el saldo
					$this->sql2="SELECT coalesce(SUM(B.MONIMP),0) as saldocau
								  FROM CPCAUSAD A,CPIMPCAU B
								  WHERE A.REFCAU=B.REFCAU AND
								        B.REFERE='".$tb->fields["refcon"]."' AND
								        A.FECCAU<=to_date('".$this->fechast."','dd/mm/yyyy')  AND
								         A.FECCAU>=to_date('".$this->fecdes."','dd/mm/yyyy')  AND
								        (A.stacau='A' Or (A.StaCau='N' And FecAnu>to_date('".$this->fechast."','dd/mm/yyyy')) And
								         B.CODPRE=('".$tb->fields["codpre"]."')";
						$tb2=$this->bd->select($this->sql2);
						$this->salcau=$tb2->fields["saldocau"];
						if ($this->salcau==0){
								$this->salcau=0.00;
						}

					$this->sql3="SELECT coalesce(SUM(B.MONAJU),0) as saldoaju
		    				FROM CPAJUSTE A,CPMOVAJU B,CPDOCAJU C
		   					WHERE A.REFAJU=B.REFAJU AND
		         			A.REFERE='".$tb->fields["refcon"]."'  AND
		         			A.FECAJU<=to_date('".$this->fechast."','dd/mm/yyyy')  AND
		         			A.FECAJU>=to_date('".$this->fecdes."','dd/mm/yyyy')  AND
		         			(A.STAAJU='A' OR (A.STAAJU='N' AND A.FECANU>to_date('".$this->fechast."','dd/mm/yyyy'))) AND
		         			A.TIPAJU=C.TIPAJU AND
		         			C.REFIER='C' AND
		         			B.CODPRE=('".$tb->fields["codpre"]."')";
					   $tb3=$this->bd->select($this->sql3);
						$this->salaju=$tb3->fields["saldoaju"];
						if ($this->salaju==0){
								$this->salaju=0.00;
						}

				  $this->sql4="SELECT coalesce(SUM(B.MONAJU),0) as ajustecau
				    			FROM CPAJUSTE A,CPMOVAJU B,CPIMPCAU C,CPDOCAJU D
				   			WHERE A.REFAJU=B.REFAJU AND
				         		C.REFCAU=A.REFERE AND
				         	C.REFERE='".$tb->fields["refcon"]."' AND
				         	D.TIPAJU=A.TIPAJU AND
				         	D.REFIER='A' AND
				         	A.FECAJU>=to_date('".$this->fecdes."','dd/mm/yyyy') AND
				         A.FECAJU<=to_date('".$this->fechast."','dd/mm/yyyy')  AND
				        (A.STAAJU='A' OR (A.STAAJU='N' AND FECANU>to_date('".$this->fechast."','dd/mm/yyyy'))) AND
				         B.CODPRE=('".$tb->fields["codpre"]."')";
								$tb4=$this->bd->select($this->sql4);
								$this->aju=$tb4->fields["ajustecau"];
								if ($this->aju==0){
										$this->aju=0.00;
								}
				//$SALDOCOM=($tb->fields["monimp"]-$this->salaju)-($this->salcau-$this->aju); // PURA PAJA ESTA FORMULA
				$SALDOCOM=$tb->fields["mon_aju"];


				/*$this->SetX(290);
				$this->cell(23,4,H::FormatoMonto($SALDOCOM),0,0,'R');*/

			/*	$this->sqls="SELECT NOMBEN as NOMBREBENEFI FROM OPBENEFI WHERE CEDRIF=RPAD('".$tb->fields["cedrif"]."',15,' ')";
				$tbs=$this->bd->select($this->sqls);*/
				/*$this->SetX(120);
				$this->multicell(60,3,H::FormatoMonto($tbs->fields["nombrebenefi"]),0,0,'R');// largo*/

				$this->row(array($tb->fields["codpre"],$tb->fields["refcom"],$tb->fields["feccom"],trim($tb->fields["nomben"]),trim($tb->fields["descom"]),H::FormatoMonto($SALDOCOM)));

// descripcion del codigo presupestario

			/*	$this->setFont("Arial","",5);
				$this->SetX(40);
		    	$this->multicell(35,3,$tb->fields["nompre"]);*/

				// acumuladores
				$TSALDOCOM+=$SALDOCOM;


			$tb->MoveNext();// este es el ciclo grande
			}//while
					$this->ln(5);
					$this->setFont("Arial","BU",8);
					$this->SetX(180);
					$this->cell(30,4,"TOTAL GENERAL DE COMPROMETIDOS:"); // titulo

					$this->SetX(300);
					$this->cell(30,4,H::FormatoMonto($TSALDOCOM),0,0,'R'); // asignacion inicail

			$this->bd->Closed();


	}
	}
?>
