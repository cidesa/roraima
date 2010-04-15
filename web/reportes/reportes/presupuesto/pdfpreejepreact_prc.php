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
		var $sql;
		var $perdesde;
		var $perhasta;
		var $nivdesde;
		var $nivhasta;
		var $codpredes;
		var $codprehas;
		var $tippre;
		var $conf;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Legal");
			$this->bd=new basedatosAdo();
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
			$this->tippre=$_POST["tippre"];
			$this->filtro=$_POST["filtro"];


			if (trim($this->tippre) == "General"){
	   			$tipopresup1 = "I";
      			$tipopresup2 = "F";
			}
  			if (trim($this->tippre) == "Inversión"){
  	   			$tipopresup1 = "I";
      			$tipopresup2 = "I";
  			}
  			if (trim($this->tippre) == "Funcionamiento")
  			{
  	   			$tipopresup1 = "F";
  				$tipopresup2 = "F";
  			}


			$this->despuesParametro();
			$this->antesreporte();


			$this->sql="SELECT SUBSTR(A.CODPRE,1,2) as sector,
						SUBSTR(A.CODPRE,1,5) as programa ,
						SUBSTR(A.CODPRE,1,11) as actividad ,
						A.CODPRE as codpre,
						RTRIM(B.Nompre) as NomPre,
						A.Modificacion, A.MonPrc, A.MonCom,
						A.MonCau, A.MonPag,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MODIFICACION else 0 end) as monmodult,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MONPRC else 0 end) as MONPRCULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MONCOM else 0 end) as MONCOMULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MONCAU else 0 end) as MONCAUULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MONPAG else 0 end) as MONPAGULT
						FROM cpdisniv".$this->aleatorio." A, CPDEFTIT B WHERE RTRIM(B.CODPRE)=RTRIM(A.CODPRE) AND
            			LENGTH(RTRIM(A.CODPRE))>= '".$this->lonnivdes."' AND
            			LENGTH(RTRIM(A.CODPRE))<= '".$this->lonnivhas."' AND
            			RTRIM(B.CODPRE) >= RTRIM('".$this->codpredes."') AND
            			RTRIM(B.CODPRE) <= RTRIM('".$this->codprehas."') -- AND
            			--(B.ESTATUS = '".$tipopresup1."' OR
            			--B.ESTATUS = '".$tipopresup2."')
						ORDER BY A.CODPRE";

		//print $this->sql;
		//exit;
		}

	function despuesParametro(){

  			$this->sql01 =  "SELECT SUM(COALESCE(LENGTH(RTRIM(NOMABR)), 0)) as LONNIVDES
    						FROM CPNIVELES WHERE CONSEC <= '".$this->nivdesde."'";
    		$tb01=$this->bd->select($this->sql01);
   			$this->lonnivdes=$tb01->fields["lonnivdes"]+($this->nivdesde-1);

  			$this->sql02= "SELECT SUM(COALESCE(LENGTH(RTRIM(NOMABR)), 0)) as LONNIVHAS
    					  FROM CPNIVELES WHERE CONSEC <= '".$this->nivhasta."'";
     		$tb02=$this->bd->select($this->sql02);
    		$this->sql02;
			$this->lonnivhas=$tb02->fields["lonnivhas"]+($this->nivhasta-1);
		}

		function antesreporte(){

			$this->sql3="select consec as consec,
					            lonniv as lonniv from cpniveles
  								where consec <= '".$this->nivhasta."' order by consec desc";
  			$tb3=$this->bd->select($this->sql3);


			$this->sql5="select sum(lonniv) as lenmascara from cpniveles
  						where consec<='".$this->nivhasta."'";

  			$tb5=$this->bd->select($this->sql5);
			$this->lenmascara= $tb5->fields["lenmascara"]+$this->nivhasta-1;

			$this->crearTablaTemporal();
			while(!$tb3->EOF)
			{
		 		if (($this->tipopresup1=='F') or ($this->tipopresup1=='I')) {
					$this->Temporaltipgas($this->lenmascara);
		 		}
       			else $this->Temporal($this->lenmascara);

    			$this->cont=$tb3->fields["lonniv"];

		 		if ($tb3->fields["consec"] <> 1) {
       				$this->lenmascara=($this->lenmascara-$this->cont-1);
		 		}
    	 		else{
       				$this->lenmascara=($this->lenmascara-$this->cont);
    			}
				$tb3->MoveNext();
    		}
		}



		function crearTablaTemporal(){
					$this->aleatorio=rand(1,1000);
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
   						group by substr(A.codpre,1,".$mascara.")";


   			$tbT1=$this->bd->select($this->sqlT1);

			while(!$tbT1->EOF){
				$this->sqlT3="insert into cpdisniv".$this->aleatorio." (codpre,monasi,modificacion,asigactual,monprc,moncom,moncau,monpag,mondis,deuda) values ('".$tbT1->fields["codpre"]."','".$tbT1->fields["monasi"]."','".$tbT1->fields["modificacion"]."','".$tbT1->fields["asigactual"]."','".$tbT1->fields["monprc"]."','".$tbT1->fields["moncom"]."','".$tbT1->fields["moncau"]."','".$tbT1->fields["monpag"]."','".$tbT1->fields["mondis"]."','".$tbT1->fields["deuda"]."')";
						$tbT3=$this->bd->select($this->sqlT3);
				$tbT1->MoveNext();
			}
		}

		function Temporaltipgas($mascara){

			$this->sqlT1=" 	SELECT substr(A.codpre,1,".$mascara.") as codpre,
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
     							CPDEFNIV B,
     							CPDEFTIT C
							WHERE
   								B.CodEmp = '001' AND
   								A.PerPre >= '".$this->perdesde."' AND
   								A.PerPre <= '".$this->perhasta."' AND
   								A.AnoPre >= RTRIM(TO_CHAR(B.FecIni,'YYYY')) And
   								A.AnoPre <= RTRIM(TO_CHAR(B.FecCie,'YYYY')) And
   								A.CODPRE = C.CODPRE AND
   								--C.ESTATUS = '".$this->tipopresup1."' AND
   								RTRIM(A.codpre) >= '".$this->codpredes."' AND
   								RTRIM(A.codpre) <= '".$this->codprehas."' AND
   								substr(A.codpre,1,".$mascara.") LIKE substr(A.codpre,1,".$mascara.")||'%' AND
   								RTRIM(A.codpre) LIKE '".$this->filtro."'
		   						group by substr(A.codpre,1,".$mascara.")";

		   	$tbT1=$this->bd->select($this->sqlT1);

			while(!$tbT1->EOF){
				$this->sqlT3="insert into cpdisniv".$this->aleatorio." (codpre,monasi,modificacion,asigactual,monprc,moncom,moncau,monpag,mondis,deuda) values ('".$tbT1->fields["codpre"]."','".$tbT1->fields["monasi"]."','".$tbT1->fields["modificacion"]."','".$tbT1->fields["asigactual"]."','".$tbT1->fields["monprc"]."','".$tbT1->fields["moncom"]."','".$tbT1->fields["moncau"]."','".$tbT1->fields["monpag"]."','".$tbT1->fields["mondis"]."','".$tbT1->fields["deuda"]."')";
						$tbT3=$this->bd->select($this->sqlT3);
				$tbT1->MoveNext();
			}
		}

	function poner_cabecera($objeto,$rep,$configuracion,$pagina)
	{
		//configuro la pagina con Orientacion Horizontal
		//busco la descripcion y direccion de la empresa
		$tb3=$this->bd->select("select * from empresa where codemp='001'");
			if(!$tb3->EOF)
			{
				$nombre=$tb3->fields["nomemp"];
				$direccion=$tb3->fields["diremp"];
				$telef=$tb3->fields["tlfemp"];
				$fax=$tb3->fields["faxemp"];
			}
			$objeto->setFont("Arial","B",8);
			//Logo de la Empresa
			$objeto->Image("../../img/logo_1.jpg",10,8,33);
			//fecha actual
			$fecha=date("d/m/Y");
			$this->SetX(300);
			$objeto->Cell(30,10,'Fecha: '.$fecha);
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$this->SetX(300);
				$objeto->Cell(20,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
				$this->ln(5);
			}
	    	//Titulo Descripcion de la Empresa

			$objeto->Ln(-5);
    		$objeto->Cell(180,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,'',0,0,'C');
			$objeto->Ln(3);
    		$objeto->Cell(180,5,'',0,0,'C');
    		$objeto->ln(4);
			//Titulo del Reporte
			$objeto->setFont("Arial","B",12);
			$objeto->Cell(300,10,$rep,0,0,'C',0);
			$objeto->ln(10);
	}


	function Header(){

			$this->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->ln();
			if (trim($this->tippre) == "I" or "F"){
	   			$tipog = "General";
      						}
  			if (trim($this->tippre) == "I"){
  	   			$tipog = "Inversión";
      			  			}
  			if (trim($this->tippre) == "F")
  			{
  	   			$tipog = "Funcionamiento";
  			}

			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			$this->SetTextColor(0,0,0);
			$this->SetXY(300,22);
			$this->cell(35,5,"Periodo:  ".$_POST["perdesde"]. "  Al  ".$_POST["perhasta"]."   ",0,0,'');
			$this->ln(5);
			$this->SetXY(300,27);
			$this->cell(5,5,"Al:");
			$fecha=date("d/m/Y");
			$this->cell(15,5,"$fecha");
			$this->cell(20,5);
			$this->setFont("Arial","B",8);

			//$this->SetXY(70,30);
			$this->SetXY(200,35);
			$this->SetTextColor(128,0,0);
			$this->setFont("Arial","B",9);
			$this->SetX(145);
			$this->cell(30,5,"(En Bolivares)",0,0,'C');
			$this->ln(6);
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",8);
			$this->cell(10,5,"Año");
			$this->sqlF="SELECT TO_CHAR(FECPER,'YYYY') as ANO
    					 FROM CPDEFNIV";
    		$tbF=$this->bd->select($this->sqlF);
			$this->cell(15,5,$tbF->fields["ano"]);
			$this->SetXY(300,43);
			$this->cell(25,5,STRTOUPPER($tipog),0,0,'');
			$this->SetXY(10,50);
			$this->SetTextColor(128,0,0);
			$this->setFont("Arial","B",8);
			$this->cell(35,5,"Código Presupuestario",0,0,'C');
			$x1=$this->GetX();
			$this->cell(35,5,"Descripción",0,0,'C');
			$x2=$this->GetX();
			$this->cell(40,5,"Créditos Presupuestarios",0,0,'C');
			$x3=$this->GetX();
			$this->cell(30,5,"Gasto",0,0,'C');
			$x4=$this->GetX();
			$this->cell(20,5,"%",0,0,'C');
			$x5=$this->GetX();
			$this->cell(30,5,"Gasto Comprometido",0,0,'C');
			$x7=$this->GetX();
			$this->cell(20,5,"%",0,0,'C');
			$x6=$this->GetX();
			$this->cell(25,5,"Saldo por",0,0,'C');
			$x12=$this->GetX();
			$this->cell(23,5,"Gasto Causado",0,0,'C');
			$x8=$this->GetX();
			$this->cell(20,5,"%",0,0,'C');
			$x9=$this->GetX();
			$this->cell(20,5,"Gasto Pagado",0,0,'C');
			$x10=$this->GetX();
			$this->cell(20,5,"%",0,0,'C');
			$x11=$this->GetX();
			$this->cell(20,5,"Saldo Pendiente",0,0,'C');
			$this->line(10,50,353,50);
			$this->line(10,60,353,60);
			$this->line(353,50,353,160);
			$this->line(10,50,10,160);
			$this->line($x1,50,$x1,160);
			$this->line($x2,50,$x2,160);
			$this->line($x3,50,$x3,160);
			$this->line($x4,50,$x4,160);
			$this->line($x5,50,$x5,160);
			$this->line($x6,50,$x6,160);
			$this->line($x7,50,$x7,160);
			$this->line($x8,50,$x8,160);
			$this->line($x9,50,$x9,160);
			$this->line($x10,50,$x10,160);
			$this->line($x11-2,50,$x11-2,160);
			$this->line($x12,50,$x12,160);
			$this->ln();
			$this->SetX(80);
			$this->cell(40,5,"Monto Actual",0,0,'C');
			$this->SetX($x1);
			$this->cell(35,5,"Código Presupuestario",0,0,'C');
			$this->SetX($x5);
			$this->cell(30,5,"por Pagar",0,0,'C');
			$this->SetX($x6);
			$this->cell(25,5,"Precomprometer",0,0,'C');
			$this->SetX($x3);
			$this->cell(30,5,"Precomprometido",0,0,'C');

	}

	function Cuerpo(){
		$tb=$this->bd->select($this->sql);
		$actividad=$tb->fields["actividad"];
		$programa=$tb->fields["programa"];
		$sector=$tb->fields["sector"];
		while(!$tb->EOF){

				if ($tb->fields["actividad"]!=$actividad)
				{
					$this->setFont("Arial","BU",8);

					$this->ln(10);
					$this->SetX(50);
					$this->cell(30,4,"Total por Actividad:"); // titulo

					$this->SetX(100);
					$this->cell(40,4,number_format($asiactultA,2,'.',','),0,0,'R'); // asignacion inicail


					$this->SetX(140);
					$this->cell(30,4,number_format($monprcultA,2,'.',','),0,0,'R');


					$this->cell(20,4,number_format($tporprc,2,'.',','),0,0,'R');

					$this->cell(30,4,number_format($moncomultA,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($tporcom,2,'.',','),0,0,'R');

					$this->cell(25,4,number_format($monnetultA,2,'.',','),0,0,'R');

					$this->cell(23,4,number_format($moncauultA,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($tporcau,2,'.',','),0,0,'R');

  					$this->cell(20,4,number_format($monpagultA,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($tporpag,2,'.',','),0,0,'R');

					$this->SetX(170);
					$this->cell(20,4,number_format($monpenultA,2,'.',','),0,0,'R');

					$this->ln(5);



				// a cero los acumuladores
				$asiactultA=0.0;
				$monprcultA=0.0;
				$tporprc=0.0;
				$moncomultA=0.0;
				$tporcom=0.0;
				$monnetultA=0.0;
				$moncauultA=0.0;
				$tporcau=0.0;
				$monpagultA=0.0;
				$tporpag=0.0;
				$monpenultA=0.0;


				$actividad=$tb->fields["actividad"];

				}

				if ($tb->fields["programa"]!=$programa)
					{
					$this->setFont("Arial","BU",8);
					$this->ln(5);
					$this->SetX(50);
					$this->cell(30,4,"Total por programa:"); // titulo

					$this->SetX(100);
					$this->cell(40,4,number_format($tasiactultP,2,'.',','),0,0,'R'); // asignacion inicail


					//$this->SetX(140);
					$this->cell(30,4,number_format($tmonprcultP,2,'.',','),0,0,'R');


					$this->cell(20,4,number_format($ttporprc,2,'.',','),0,0,'R');

					$this->cell(30,4,number_format($tmoncomultP,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($ttporcom,2,'.',','),0,0,'R');

					$this->cell(25,4,number_format($tmonnetultP,2,'.',','),0,0,'R');

					$this->cell(23,4,number_format($tmoncauultP,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($ttporcau,2,'.',','),0,0,'R');

  					$this->cell(20,4,number_format($tmonpagultP,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($ttporpag,2,'.',','),0,0,'R');

					$this->SetX(170);
					$this->cell(20,4,number_format($tmonpenultP,2,'.',','),0,0,'R');

					$this->ln(5);
				//a cero los acumuladores

				$tasiactultP=0.0;
				$tmonprcultP=0.0;
				$ttporprc=0.0;
				$tmoncomultP=0.0;
				$ttporcom=0.0;
				$tmonnetultP=0.0;
				$tmoncauultP=0.0;
				$ttporcau=0.0;
				$tmonpagultP=0.0;
				$ttporpag=0.0;
				$tmonpenultP=0.0;

				$programa=$tb->fields["programa"];
			}

			if ($tb->fields["sector"]!=$sector)
				{
					$this->setFont("Arial","BU",8);

					$this->ln(5);
					$this->SetX(50);
					$this->cell(30,4,"Total por Sector:"); // titulo


					$this->SetX(100);
					$this->cell(40,4,number_format($ttasiactultS,2,'.',','),0,0,'R'); // asignacion inicail


					$this->SetX(140);
					$this->cell(30,4,number_format($ttmonprcultS,2,'.',','),0,0,'R');


					$this->cell(20,4,number_format($tttporprc,2,'.',','),0,0,'R');

					$this->cell(30,4,number_format($ttmoncomultP,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($tttporcom,2,'.',','),0,0,'R');

					$this->cell(25,4,number_format($ttmonnetultS,2,'.',','),0,0,'R');

					$this->cell(23,4,number_format($ttmoncauultS,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($tttporcau,2,'.',','),0,0,'R');

  					$this->cell(20,4,number_format($ttmonpagultS,2,'.',','),0,0,'R');


  					$this->cell(20,4,number_format($tttporpag,2,'.',','),0,0,'R');

					$this->SetX(170);
					$this->cell(20,4,number_format($ttmonpenultP,2,'.',','),0,0,'R');

					$this->ln(5);
				//a cero los acumuladores

				$ttasiactultS=0.0;
				$ttmonprcultS=0.0;
				$tttporprc=0.0;
				$ttmoncomultS=0.0;
				$tttporcom=0.0;
				$ttmonnetultS=0.0;
				$ttmoncauultS=0.0;
				$tttporcau=0.0;
				$ttmonpagultS=0.0;
				$tttporpag=0.0;
				$ttmonpenultS=0.0;

			$sector=$tb->fields["sector"];
		}

		$this->setFont("Arial","",8);
		$this->ln(12);
		$this->SetX(10);
		$this->cell(45,3,$tb->fields["codpre"],0,0,'');
		$xx=$this->GetX();
		$this->cell(40);
		/*$this->sqls="SELECT SUM(MONASI) as monto FROM CPASIINI WHERE CODPRE=RTRIM('".$tb->fields["codpre"]."') AND PERPRE='00'";
		$tbs=$this->bd->select($this->sqls);*/
		//para acumular $monto=$tb->fields["monto"];
		$this->SetX(100);
		$asigactual=$this->cell(30,3,number_format($tb->fields["monasi"] + $tb->fields["modificacion"],2,'.',','),0,0,'R');
		$this->cell(30,3,number_format($tb->fields["monprc"],2,'.',','),0,0,'R');

		if ($tb->fields["asigactual"]!=0)
     			$porprc=(($tb->fields["monprc"]*100)/$tb->fields["asigactual"]);
  		else
  			$porprc=0;

		$this->SetX(140);
		$this->cell(30,4,number_format($porprc,2,'.',','),0,0,'R');
		$this->cell(30,3,number_format($tb->fields["moncom"],2,'.',','),0,0,'R');
		if ($tb->fields["monprc"]!=0)
     			$porcom=(($tb->fields["moncom"]*100)/$tb->fields["monprc"]);
  		else
  			$porcom=0;

		$this->SetX(170);
		$this->cell(30,4,number_format($porcom,2,'.',','),0,0,'R');
		$neto=$this->cell(30,3,number_format($tb->fields["asigactual"] - $tb->fields["monprc"],2,'.',','),0,0,'R');
		$this->cell(30,4,number_format($neto,2,'.',','),0,0,'R');
		$this->cell(30,3,number_format($tb->fields["moncau"],2,'.',','),0,0,'R');
		if ($tb->fields["moncom"]!=0)
     			$porcau=(($tb->fields["moncau"]*100)/$tb->fields["moncom"]);
  		else
  			$porcau=0;
  		$this->cell(30,4,number_format($porcau,2,'.',','),0,0,'R');
  		$this->cell(30,3,number_format($tb->fields["monpag"],2,'.',','),0,0,'R');
  		if ($tb->fields["moncau"]!=0)
     			$porpag=(($tb->fields["monpag"]*100)/$tb->fields["moncau"]);
  		else
  			$porpag=0;
  		$this->cell(30,4,number_format($porpag,2,'.',','),0,0,'R');
  		$asigactual=$this->cell(30,3,number_format($tb->fields["moncau"] - $tb->fields["monpag"],2,'.',','),0,0,'R');
		$this->SetX(45);
		$this->MultiCell(35,3,$tb->fields["nompre"]);

		// acumuladores
		$asiactultA+=$tb->fields["monto"];
		$monprcultA+=$tb->fields["monprcult"];
		if ($tb->fields["asiactultA"]!=0)
     		$tporprc=(($tb->fields["monprcultA"]*100)/$tb->fields["asiactultA"]);
  		else
  			 $tporprc=0;
		$moncomultA+=$tb->fields["moncomult"];
		if ($tb->fields["monprcultA"]!=0)
     		$tporcom=(($tb->fields["moncomultA"]*100)/$tb->fields["monprcultA"]);
  		else
  			$tporcom=0;
		$monnetultA+=$tb->fields["monnetult"];
		$moncauultA+=$tb->fields["moncauult"];
		if ($tb->fields["moncomultA"]!=0)
     		$tporcau=(($tb->fields["moncauultA"]*100)/$tb->fields["moncomultA"]);
  		else
  			$tporcau=0;
		$monpagultA+=$tb->fields["monpagult"];
		if ($tb->fields["moncauultA"]!=0)
     						$tporpag=(($tb->fields["monpagultA"]*100)/$tb->fields["moncauultA"]);
  					else
  						$tporpag=0;
		$monpenultA+=$tb->fields["monpenult"];
		$y=$this->GetY();
        $tb->MoveNext();

			if ($y>=170)
			{
				$this->AddPage();
			}
		//acumuladores
		$tasiactultP+=$asiactultA;
		$tmonprcultP+=$monprcultA;
		$ttporprc+=$tporprc;
		$tmoncomultP+=$moncomultA;
		$ttporcom+=$tporcom;
		$tmonnetultP+=$monnetultA;
		$tmoncauultP=$moncauultA;
		$ttporcau=$tporcau;
		$tmonpagultP=$monpagultA;
		$ttporpag+=$tporpag;
		$tmonpenultP+=$monpenultA;
		$ttasiactultS+=$tasiactultP;
		$ttmonprcultS+=$tmonprcultP;
		$tttporprc+=$ttporprc;
		$ttmoncomultS+=$tmoncomultP;
		$tttporcom+=$ttporcom;
		$ttmonnetultS+=$tmonnetultP;
		$ttmoncauultS+=$tmoncauultP;
		$tttporcau+=$ttporcau;
		$ttmonpagultS+=$tmonpagultP;
		$tttporpag=$ttporpag;
		$ttmonpenultS=$tmonpenultP;
		$tttasiactult+=$ttasiactultS;
		$tttmonprcult+=$ttmonprcultS;
		$ttttporprc+=$tttporprc;
		$tttmoncomult+=$ttmoncomultS;
		$ttttporcom+=$tttporcom;
		$tttmonnetult+=$ttmonnetultS;
		$tttmoncauult+=$ttmoncauultS;
		$ttttporcau+=$tttporcau;
		$tttmonpagult+=$ttmonpagultS;
		$ttttporpag+=$tttporpag;
		$tttmonpenult+=$ttmonpenultS;


		}
		$this->setFont("Arial","BU",8);

		$this->ln(10);
		$this->SetX(50);
		$this->cell(30,4,"Total por Actividad:"); // titulo

		$this->SetX(100);
		$this->cell(40,4,number_format($asiactultA,2,'.',','),0,0,'R'); // asignacion inicail


		$this->SetX(140);
		$this->cell(30,4,number_format($monprcultA,2,'.',','),0,0,'R');


		$this->cell(20,4,number_format($tporprc,2,'.',','),0,0,'R');
		$this->cell(30,4,number_format($moncomultA,2,'.',','),0,0,'R');

  		$this->cell(20,4,number_format($tporcom,2,'.',','),0,0,'R');
		$this->cell(25,4,number_format($monnetultA,2,'.',','),0,0,'R');

		$this->cell(23,4,number_format($moncauultA,2,'.',','),0,0,'R');
  		$this->cell(20,4,number_format($tporcau,2,'.',','),0,0,'R');

  		$this->cell(20,4,number_format($monpagultA,2,'.',','),0,0,'R');
  		$this->cell(20,4,number_format($tporpag,2,'.',','),0,0,'R');
		$this->cell(20,4,number_format($monpenultA,2,'.',','),0,0,'R');

		$this->ln(5);

		$this->SetX(50);
		$this->cell(30,4,"Total por programa:"); // titulo

		$this->SetX(100);
		$this->cell(40,4,number_format($tasiactultP,2,'.',','),0,0,'R'); // asignacion inicail

		$this->cell(30,4,number_format($tmonprcultP,2,'.',','),0,0,'R');
		$this->cell(20,4,number_format($ttporprc,2,'.',','),0,0,'R');

		$this->cell(30,4,number_format($tmoncomultP,2,'.',','),0,0,'R');
  		$this->cell(20,4,number_format($ttporcom,2,'.',','),0,0,'R');

		$this->cell(25,4,number_format($tmonnetultP,2,'.',','),0,0,'R');
		$this->cell(23,4,number_format($tmoncauultP,2,'.',','),0,0,'R');

  		$this->cell(20,4,number_format($ttporcau,2,'.',','),0,0,'R');
  		$this->cell(20,4,number_format($tmonpagultP,2,'.',','),0,0,'R');

  		$this->cell(20,4,number_format($ttporpag,2,'.',','),0,0,'R');
		$this->SetX(170);
		$this->cell(20,4,number_format($tmonpenultP,2,'.',','),0,0,'R');

		$this->ln(5);

		$this->SetX(50);
		$this->cell(30,4,"Total por Sector:"); // titulo

		$this->SetX(100);
		$this->cell(40,4,number_format($ttasiactultS,2,'.',','),0,0,'R'); // asignacion inicail

		$this->SetX(140);
		$this->cell(30,4,number_format($ttmonprcultS,2,'.',','),0,0,'R');

		$this->cell(20,4,number_format($tttporprc,2,'.',','),0,0,'R');
		$this->cell(30,4,number_format($ttmoncomultP,2,'.',','),0,0,'R');

  		$this->cell(20,4,number_format($tttporcom,2,'.',','),0,0,'R');
		$this->cell(25,4,number_format($ttmonnetultS,2,'.',','),0,0,'R');

		$this->cell(23,4,number_format($ttmoncauultS,2,'.',','),0,0,'R');
  		$this->cell(20,4,number_format($tttporcau,2,'.',','),0,0,'R');

  		$this->cell(20,4,number_format($ttmonpagultS,2,'.',','),0,0,'R');
  		$this->cell(20,4,number_format($tttporpag,2,'.',','),0,0,'R');

		$this->SetX(170);
		$this->cell(20,4,number_format($ttmonpenultP,2,'.',','),0,0,'R');

		$this->ln(5);

		$this->ln(8);
		$this->SetX(50);
		$this->setFont("Arial","BU",8);
		$this->cell(30,4,"TOTAL GENERAL:"); // titulo

		$this->SetX(100);
		$this->cell(40,4,number_format($tttasiactult,2,'.',','),0,0,'R'); // asignacion inicail

		$this->SetX(140);
		$this->cell(30,4,number_format($tttmonprcult,2,'.',','),0,0,'R');

		$this->cell(20,4,number_format($ttttporprc,2,'.',','),0,0,'R');
		$this->cell(30,4,number_format($tttmoncomult,2,'.',','),0,0,'R');

  		$this->cell(20,4,number_format($ttttporcom,2,'.',','),0,0,'R');
		$this->cell(25,4,number_format($tttmonnetult,2,'.',','),0,0,'R');

		$this->cell(23,4,number_format($tttmoncauult,2,'.',','),0,0,'R');
  		$this->cell(20,4,number_format($ttttporcau,2,'.',','),0,0,'R');

  		$this->cell(20,4,number_format($tttmonpagult,2,'.',','),0,0,'R');
  		$this->cell(20,4,number_format($ttttporpag,2,'.',','),0,0,'R');

		$this->SetX(170);
		$this->cell(20,4,number_format($tttmonpenult,2,'.',','),0,0,'R');

	}
}
?>