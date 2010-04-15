<?
	require_once("../../lib/general/fpdf/fpdf.php");
    require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	//require_once("../../lib/general/negociorpresupuesto.php");
	require_once("../../lib/general/obtener_mascara.php");

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

		var $perdesde;
		var $perhasta;
		var $nivdesde;
		var $nivhasta;
		var $codpredes;
		var $codprehas;
		var $tippre;
		var $filtro;

		var $LONNIVHAS;
		var $LONNIVDES;
		var $lenmascara;
		var	$MASCARA;
		var $cont;

// que hace esta calse¡

		function pdfreporte()
		{
			$this->fpdf("l","mm","Legal");
			$this->bd=new basedatosAdo();
		//	$this->clasepresup=new negociorpresupuesto;
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();

			$this->perdesde=$_POST["perdesde"];
			$this->perhasta=$_POST["perhasta"];

			$this->nivdesde=$_POST["nivdesde"];
			$this->nivhasta=$_POST["nivhasta"];

			$this->codpredes=$_POST["codpredes"];
			$this->codprehas=$_POST["codprehas"];

		 	$this->filtro=$_POST["filtro"];

$this->afterparam();
$this->beforereport();


			$this->sql="SELECT SUBSTR(A.CODPRE,1,2) as sector,
						SUBSTR(A.CODPRE,1,5) as programa ,
						SUBSTR(A.CODPRE,1,11) as actividad ,
						A.CODPRE as codpre,
						RTRIM(B.Nompre) as NomPre,
						A.Modificacion as modificacion, A.MonPrc, A.MonCom,
						A.MonCau, A.MonPag,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->LONNIVHAS."' then A.MODIFICACION else 0 end) as monmodult,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->LONNIVHAS."' then A.MONPRC else 0 end) as MONPRCULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->LONNIVHAS."' then A.MONCOM else 0 end) as MONCOMULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->LONNIVHAS."' then A.MONCAU else 0 end) as MONCAUULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->LONNIVHAS."' then A.MONPAG else 0 end) as MONPAGULT
						FROM cpdisniv".$this->aleatorio." A, CPDEFTIT B WHERE RTRIM(B.CODPRE)=RTRIM(A.CODPRE) AND
            			LENGTH(RTRIM(A.CODPRE))>= '".$this->LONNIVDES."' AND
            			LENGTH(RTRIM(A.CODPRE))<= '".$this->LONNIVHAS."' AND
            			RTRIM(B.CODPRE) >= RTRIM('".$this->codpredes."') AND
            			RTRIM(B.CODPRE) <= RTRIM('".$this->codprehas."')
            		GROUP BY SUBSTR(A.CODPRE,1,2), A.CODPRE, B.NOMPRE, A.MODIFICACION, A.MONPRC, A.MONCOM, A.MONCAU, A.MONPAG
					ORDER BY A.CODPRE";
					//print $this->sql;
					//exit;

		$this->cab=new cabecera();

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

				function afterparam()
					{
				  	 $this->sql1=" SELECT SUM(coalesce(LENGTH(RTRIM(NOMABR)),0)) as LONNIVDES
				  	 				FROM CPNIVELES
				   					WHERE CONSEC <= '".$this->nivdesde."'"; //4
				   	 $tb1=$this->bd->select($this->sql1);
				   	$this->LONNIVDES=$tb1->fields["lonnivdes"]+($this->nivdesde-1);


				    $this->sql02= "SELECT SUM(COALESCE(LENGTH(RTRIM(NOMABR)), 0)) as LONNIVHAS
				    					FROM CPNIVELES WHERE CONSEC <= '".$this->nivhasta."'";
				    		$tb02=$this->bd->select($this->sql02);
				  	 $this->LONNIVHAS=$tb02->fields["lonnivhas"]+($this->nivhasta-1);
					}

				function beforereport(){
							$this->MASCARA=$this->MASCARA();
							$this->sql3="select consec as consec,
									            lonniv as lonniv from cpniveles
				  								where consec<='".$this->nivhasta."' order by consec desc";
				  			$tb3=$this->bd->select($this->sql3);


							$this->sql5="select sum(lonniv) as lenmascara from cpniveles
				  						where consec<='".$this->nivhasta."'";
				  			$tb5=$this->bd->select($this->sql5);
							$this->lenmascara=$tb5->fields["lenmascara"]+($this->nivhasta-1); // 48

							$this->crearTablaTemporal();

					while(!$tb3->EOF)
					{
						$this->Temporal($this->lenmascara);
				       	$this->cont=$tb3->fields["lonniv"];

						 if ($tb3->fields["consec"] <> 1) {
				       			$this->lenmascara=($this->lenmascara)-($this->cont-1);}
				    		else{
				       		$this->lenmascara=($this->lenmascara)-($this->cont);}

					$tb3->MoveNext();

				    }// end del while tb3

						}


				function crearTablaTemporal(){
							$this->aleatorio=rand(1,1000);
							//".$this->aleatorio."
					$this->sqlT2="CREATE TEMPORARY TABLE cpdisniv".$this->aleatorio." (codpre VARCHAR(32) NOT NULL,
		  							monasi NUMERIC(14,2),
		  							modificacion NUMERIC(20,2),
		  							asigactual NUMERIC(20,2),
		  							monprc NUMERIC(20,2),
		  							moncom NUMERIC(14,2),
		  							moncau NUMERIC(14,2),
		  							monpag NUMERIC(14,2),
		  							monaju NUMERIC(14,2),
		  							mondis NUMERIC(14,2),
		  							deuda NUMERIC(20,2)
								) WITHOUT OIDS";
						$tbT2=$this->bd->select($this->sqlT2);

					}

					function Temporal($mascara){
						$this->sqlT1="SELECT substr(A.codpre,1,".$mascara.") as codpre,
			 					sum(A.MonAsi) as Monasi,
			 					(sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) as Modificacion,
			 					(sum(A.MonAsi)+sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) as AsigActual,
			  					sum(A.MonPrc) as Monprc,
			  					sum(A.MonCom) as moncom,
			  					sum(A.MonDis) as mondis,
			  					sum(A.MonCau) as moncau,
			  					sum(A.MonPag) as monpag,
			  					(sum(A.MonCau)-sum(A.MonPag)) as Deuda
								FROM CPASIINI A,
			     					 CPDEFNIV B
								WHERE
			   						B.CodEmp = '001' AND
			   						A.PerPre >= '".$this->perdesde."' AND
			   						A.PerPre <= '".$this->perhasta."' AND
			   						A.AnoPre >= RTRIM(TO_CHAR(B.FecIni,'YYYY')) And
			   						A.AnoPre <= RTRIM(TO_CHAR(B.FecCie,'YYYY')) And
			   						RTRIM(A.codpre) >= '".$this->codpredes."' AND
			   						RTRIM(A.codpre) <= '".$this->codprehas."' AND
			   						substr(A.codpre,1,".$mascara.") LIKE substr(A.codpre,1,".$mascara.")||'%' AND
			   						RTRIM(A.codpre) LIKE '".$this->filtro."'
			   						group by substr(A.codpre,1,".$mascara.");";
						//print $this->sqlT1;

			   			$tbT1=$this->bd->select($this->sqlT1);

						while(!$tbT1->EOF){
							$this->sqlT3="insert into cpdisniv".$this->aleatorio." (codpre,monasi,modificacion,asigactual,monprc,moncom,moncau,monpag,mondis,deuda) values ('".$tbT1->fields["codpre"]."','".$tbT1->fields["monasi"]."','".$tbT1->fields["modificacion"]."','".$tbT1->fields["asigactual"]."','".$tbT1->fields["monprc"]."','".$tbT1->fields["moncom"]."','".$tbT1->fields["moncau"]."','".$tbT1->fields["monpag"]."','".$tbT1->fields["mondis"]."','".$tbT1->fields["deuda"]."')";
									$tbT3=$this->bd->select($this->sqlT3);
							$tbT1->MoveNext();
						}
					}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"l","s",$parte[$ubica]);

			/*$this->Image("../../img/logo_1.jpg",10,8,33);
			$this->SetX(300);
			$this->Cell(50,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
			$fecha=date("d/m/Y");
			$this->SetX(300);
			$this->Cell(50,10,'Fecha: '.$fecha,0,0,'C');
			$this->setFont("Arial","",7);*/

			if (trim($this->tippre) == "I" or "F"){
	   			$tipopresup = "General";
      						}
  			if (trim($this->tippre) == "I"){
  	   			$tipopresup = "Inversión";
      			  			}
  			if (trim($this->tippre) == "F")
  			{
  	   			$tipopresup = "Funcionamiento";
  				}
			$this->sql03= "SELECT TO_CHAR(FECPER,'YYYY') as ANO  FROM CPDEFNIV";
			$tb03=$this->bd->select($this->sql03);
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			$this->SetXY(230,30);
			$this->SetTextColor(0,0,0);
			$this->cell(35,5,"Periodo: ".$this->perdesde. " Al ".$this->perhasta."   ",0,0,'R');
			$this->setFont("Arial","B",9);
			$this->SetXY(70,10);
			$this->SetTextColor(0,0,128);
			$this->cell(200,12,"EJECUCION PRESUPUESTARIA COORDINADA (DISP. COMPROMISOS)",0,0,'C');
			$this->SetXY(70,20);
			$this->cell(200,5,STRTOUPPER($tipopresup),0,0,'C');
			$this->SetXY(70,25);
			$this->cell(200,5,"(En Bolivares)",0,0,'C');

			$tbe=$this->bd->select("select * from empresa where codemp='001'");
			if(!$tbe->EOF)
			{
				$this->SetXY(45,25);
				$nombre=$tbe->fields["nomemp"];
				$this->cell(50,5,STRTOUPPER($nombre),0,0,'C');
			}



			$this->SetXY(40,30);
			$this->SetTextColor(0,0,0);
			$this->cell(15,5,"Año",0,0,'R');
			$this->cell(15,5,$tb03->fields["ano"],0,0,'L');
			$this->sety(38);
// cabeza
			$this->Line(10,35,340,35);
			$this->setFont("Arial","B",8);
			$this->SetTextColor(128,0,0);
					$this->SetX(10);
					$this->cell(30,3,"Cod.Presupuestario",0,0,'C');
					$this->cell(30,3,"Descripcion",0,0,'C');
					$this->cell(30,3,"Asignado",0,0,'C');
					$this->cell(30,3,"Reformulado",0,0,'C');
					$this->cell(30,3,"Asignacion",0,0,'C');
					$this->cell(30,3,"Compromisos",0,0,'C');
					$this->cell(30,3,"Disponibilidad",0,0,'C');

					$this->cell(30,3,"Causados",0,0,'C');
					$this->cell(30,3,"Disponibilidad",0,0,'C');
					$this->cell(30,3,"Pagado",0,0,'C');
					$this->cell(30,3,"Disponibilidad",0,0,'C');

					$this->ln();
					$this->SetX(130);
					$this->cell(30,3,"Actual",0,0,'C');
					$this->SetX(190);
					$this->cell(30,3,"Presupuestaria",0,0,'C');

					$this->SetX(250);
					$this->cell(30,3,"Bruta",0,0,'C');

					$this->SetX(310);
					$this->cell(30,3,"Financiera",0,0,'C');

					$this->SetX(6);
					$this->setFont("Arial","B",6);
					$this->multicell(33,3,$this->MASCARA,0,0,'C');
					$this->Line(10,$this->gety(),340,$this->gety());
					$this->ln();
					$this->sety($this->gety()+10);
					$this->SetTextColor(0,0,0);

		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);

			$programa=$tb->fields["programa"];

		//	print $actividad;

			while(!$tb->EOF and !$tbT1->EOF)
			{


			if ($tb->fields["programa"]!=$programa)
					{
				
					$this->setFont("Arial","BU",8);
					$this->ln(5);

					$this->cell(30,4,"TOTAL POR PROGRAMA:"); // titulo

					$this->SetX(60);
					$this->cell(30,4,number_format($asigna,2,'.',','),0,0,'R'); // asignacion inicail

					$this->SetX(100);
					$this->cell(23,4,number_format($modi,2,'.',','),0,0,'R'); // modificacion

					$this->SetX(130);
					$this->cell(23,4,number_format($cred,2,'.',','),0,0,'R');// credito

					$this->SetX(160);
					$this->cell(23,4,number_format($precom,2,'.',','),0,0,'R'); // precompromisos

					$this->SetX(190);
					$this->cell(23,4,number_format($saldo2,2,'.',','),0,0,'R');// saldo por precomprometer

					$this->SetX(220);
					$this->cell(23,4,number_format($compromisos,2,'.',','),0,0,'R'); // compromisos

					$this->SetX(250);
					$this->cell(23,4,number_format($causados,2,'.',','),0,0,'R'); // causado

					$this->SetX(280);
					$this->cell(23,4,number_format($pagado,2,'.',','),0,0,'R');

					$this->SetX(310);
					$this->cell(23,4,number_format($actual,2,'.',','),0,0,'R');
					$this->ln(5);

				$tasigna+=$asigna;
				$tmodi+=$modi;
				$tcred+=$cred;
				$tprecom+=$precom;
				$tsaldo2+=$saldo2;
				$tcompromisos+=$compromisos;
				$tcausados+=$causados;
				$tpagado+=$pagado;
				$tactual+=$actual;


				$asigna=0.0;
				$modi=0.0;
				$cred=0.0;
				$precom=0.0;
				$saldo2=0.0;
				$compromisos=0.0;
				$causados=0.0;
				$pagado=0.0;
				$actual=0.0;

				$programa=$tb->fields["programa"];
				}

				// detalle
				$this->setFont("Arial","",6);
		    	$this->SetX(10);
		    	$this->cell(30,5,$tb->fields["codpre"]);
		    	$this->sqls="SELECT SUM(MONASI) as asig FROM CPASIINI WHERE CODPRE=RTRIM('".$tb->fields["codpre"]."') AND PERPRE='00'";
				$tbs=$this->bd->select($this->sqls);

				//para acumular $monto=$tb->fields["monto"];
				$this->SetX(70);
				$this->cell(30,4,number_format($tbT1->fields["monasi"],2,'.',','),0,0,'R'); // asignada   
				$this->SetX(100);
				$this->cell(23,4,number_format($tb->fields["modificacion"],2,'.',','),0,0,'R'); //reformulado

				$credito=$tb->fields["asig"]+$tb->fields["modificacion"];
				$this->SetX(130);
				$this->cell(23,4,number_format($credito,2,'.',','),0,0,'R');// asignacion actual

				$this->SetX(160);
				$this->cell(23,4,number_format($tb->fields["moncom"],2,'.',','),0,0,'R'); // compromisos

				//diponibilidad presupuestaria
				$this->SetX(190);
				$dipopres=($credito-$tb->fields["moncom"]);
				$this->cell(23,4,number_format($dipopres,2,'.',','),0,0,'R'); //diponibilidad presupuestaria

				$this->SetX(220);
				$this->cell(23,4,number_format($tb->fields["moncau"],2,'.',','),0,0,'R'); // causado

				$bruta=($credito-$tb->fields["moncau"]);
				$this->SetX(250);
				$this->cell(23,4,number_format($bruta,2,'.',','),0,0,'R'); // bruta

				$this->SetX(280);
				$this->cell(23,4,number_format($tb->fields["monpag"],2,'.',','),0,0,'R'); // cpagado

				$financiera=($credito-$tb->fields["monpag"]);

				$this->SetX(310);
				$this->cell(23,4,number_format($financiera,2,'.',','),0,0,'R');// dsiponibilidad financiaria

// descripcion del codigo presupestario

				$this->setFont("Arial","",5);
				$this->SetX(40);
		    	$this->multicell(35,3,$tb->fields["nompre"]);

				// acumuladores
				$asigna+=$tbT1->fields["monasi"];
				$modi+=$tb->fields["modificacion"];
				$cred+=$credito;
				$precom+=$tb->fields["moncom"]; // compromisos
				$saldo2+=$dipopres;				//disponibilidad prespueustaria
				$compromisos+=$tb->fields["moncau"];// causados
				$causados+=$bruta; // dispo bruta
				$pagado+=$tb->fields["monpag"]; // pagado
				$actual+=$financiera; // dsipo financiera

			$tb->MoveNext();// este es el ciclo grande
			}//while
					$this->ln(5);
					$this->setFont("Arial","BU",8);
					$this->cell(30,4,"TOTAL GENERAL:"); // titulo

					$this->SetX(60);
					$this->cell(30,4,number_format($tasigna,2,'.',','),0,0,'R'); // asignacion inicail

					$this->SetX(100);
					$this->cell(23,4,number_format($tmodi,2,'.',','),0,0,'R');

					$this->SetX(130);
					$this->cell(23,4,number_format($tcred,2,'.',','),0,0,'R');// credito

					$this->SetX(160);
					$this->cell(23,4,number_format($tprecom,2,'.',','),0,0,'R'); // precompromisos

					$this->SetX(190);
					$this->cell(23,4,number_format($tsaldo2,2,'.',','),0,0,'R');// saldo por precomprometer

					$this->SetX(220);
					$this->cell(23,4,number_format($tcompromisos,2,'.',','),0,0,'R'); // compromisos

					$this->SetX(250);
					$this->cell(23,4,number_format($tcausados,2,'.',','),0,0,'R'); // causado

					$this->SetX(280);
					$this->cell(23,4,number_format($tpagado,2,'.',','),0,0,'R');

					$this->SetX(310);
					$this->cell(23,4,number_format($tactual,2,'.',','),0,0,'R');


			$tb->Close();


	}
	}
?>
