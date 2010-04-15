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
		var $per1;
		var $per2;
		var $con1;
		var $con2;
		var $cod1;
		var $cod2;
		var $tipg;
		var $conf;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->per1=$_POST["per1"];
			$this->per2=$_POST["per2"];
			$this->con1=$_POST["con1"];
			$this->con2=$_POST["con2"];
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->tipg=$_POST["tipg"];
			$this->filtro=$_POST["filtro"];


			if (trim($this->tipg) == "General"){
	   			$tipogasto1 = "I";
      			$tipogasto2 = "F";
			}
  			if (trim($this->tippre) == "Inversión"){
  	   			$tipogasto1 = "I";
      			$tipogasto2 = "I";
  			}
  			if (trim($this->tippre) == "Funcionamiento")
  			{
  	   			$tipogasto1 = "F";
  				$tipogasto2 = "F";
  			}


			$this->despuesParametro();
			$this->antesreporte();


			$this->sql="SELECT SUBSTR(A.CODPRE,1,2) as sector,
						SUBSTR(A.CODPRE,1,5) as programa ,
						SUBSTR(A.CODPRE,1,14) as actividad ,
						A.CODPRE as codpre,
						RTRIM(B.Nompre) as NomPre,
						A.Modificacion, A.MonPrc, A.MonCom,
						A.MonCau, A.MonPag,A.monasi as monto,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MODIFICACION else 0 end) as monmodult,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MONPRC else 0 end) as MONPRCULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MONCOM else 0 end) as MONCOMULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MONCAU else 0 end) as MONCAUULT,
						(case when LENGTH(RTRIM(A.CODPRE))='".$this->lonnivhas."' then A.MONPAG else 0 end) as MONPAGULT
						FROM cpdisniv".$this->aleatorio." A, CPDEFTIT B WHERE RTRIM(B.CODPRE)=RTRIM(A.CODPRE) AND
            			LENGTH(RTRIM(A.CODPRE))>= '".$this->lonnivdes."' AND
            			LENGTH(RTRIM(A.CODPRE))<= '".$this->lonnivhas."' AND
            			(A.MONASI+A.MODIFICACION)>0
						group by actividad, sector, programa, a.codpre,NomPre, Modificacion, MonPrc, MonCom, MonCau,MonPag,A.monasi";


				$this->cab=new cabecera();
		}


		function mascara()
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

 		function despuesParametro(){

  			$this->sql01 ="SELECT SUM(coalesce(LENGTH(RTRIM(NOMABR)), 0)) as lonnivdes
    						FROM CPNIVELES WHERE CONSEC <=('".$this->con1."')";
    		$tb01=$this->bd->select($this->sql01);
   			$this->lonnivdes=$tb01->fields["lonnivdes"]+($this->con1-1)-1;

  			$this->sql02="SELECT SUM(coalesce(LENGTH(RTRIM(NOMABR)), 0)) as lonnivhas
        				FROM CPNIVELES WHERE CONSEC <=('".$this->con2."')";
        	$tb02=$this->bd->select($this->sql02);
        	$this->sql02;

             if ($this->nivel2>=11)
                  $this->lonnivhas=$tb02->fields["lonnivhas"]+($this->con2)+1;
	        else
        	     $this->lonnivhas=$tb02->fields["lonnivhas"]+($this->con2-1)+1;

		}

		function antesreporte()
		{
			$this->mascara=$this->mascara();
			$this->sql3="select consec as consec,
						lonniv as lonniv from cpniveles
				  		where consec<='".$this->con2."' order by consec desc";
			$tb3=$this->bd->select($this->sql3);

			$this->sql5="select sum(lonniv) as lenmascara from cpniveles
				  		 where consec<='".$this->con2."'";
			$tb5=$this->bd->select($this->sql5);
			$this->lenmascara=$tb5->fields["lenmascara"]+($this->con2-1);

			$this->crearTablaTemporal();

			while(!$tb3->EOF)
			{
		 		if (($this->tipog=='F') or ($this->tipog=='I')) {
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
			$this->sqlT2="CREATE TEMPORARY TABLE cpdisniv".$this->aleatorio." (codpre VARCHAR(50) NOT NULL,
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
			$this->sqlT1="insert into cpdisniv".$this->aleatorio."  (SELECT substr(A.codpre,1,".$mascara.") as codpre,
 					sum(A.MonAsi) as Monasi,
 					(sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) as Modificacion,
 					(sum(A.MonAsi)+sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) as AsigActual,
  					sum(A.MonPrc) as Monprc,
  					sum(A.MonCom) as moncom,
  					sum(A.MonCau) as moncau,
  					sum(A.MonPag) as monpag,
  					sum(A.MonDis) as mondis,
  					(sum(A.MonCau)-sum(A.MonPag)) as Deuda
					FROM CPASIINI A,
     					 CPDEFNIV B
					WHERE
   						B.CodEmp = '001' AND
   						A.PerPre >= '".$this->per1."' AND
   						A.PerPre <= '".$this->per2."' AND
   						A.AnoPre >= RTRIM(TO_CHAR(B.FecIni,'YYYY')) And
   						A.AnoPre <= RTRIM(TO_CHAR(B.FecCie,'YYYY')) And
   						RTRIM(A.codpre) >= rtrim('".$this->cod1."') AND
   						RTRIM(A.codpre) <= rtrim('".$this->cod2."') AND
   						substr(A.codpre,1,".$mascara.") LIKE substr(A.codpre,1,".$mascara.")||'%' AND
   						RTRIM(A.codpre) LIKE '".$this->filtro."'
   						group by substr(A.codpre,1,".$mascara.") )";


   			$tbT1=$this->bd->select($this->sqlT1);

			/*while(!$tbT1->EOF){
				$this->sqlT3="insert into cpdisniv".$this->aleatorio." (codpre,monasi,modificacion,asigactual,monprc,moncom,moncau,monpag,mondis,deuda) values ('".$tbT1->fields["codpre"]."','".$tbT1->fields["monasi"]."','".$tbT1->fields["modificacion"]."','".$tbT1->fields["asigactual"]."','".$tbT1->fields["monprc"]."','".$tbT1->fields["moncom"]."','".$tbT1->fields["moncau"]."','".$tbT1->fields["monpag"]."','".$tbT1->fields["mondis"]."','".$tbT1->fields["deuda"]."')";
						$tbT3=$this->bd->select($this->sqlT3);
				$tbT1->MoveNext();
			}*/
		}
		function Temporaltipgas($mascara){

			$this->sqlT1="insert into cpdisniv".$this->aleatorio." ( 	SELECT substr(A.codpre,1,".$mascara.") as codpre,
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
   								A.PerPre >= '".$this->per1."' AND
   								A.PerPre <= '".$this->per2."' AND
   								A.AnoPre >= RTRIM(TO_CHAR(B.FecIni,'YYYY')) And
   								A.AnoPre <= RTRIM(TO_CHAR(B.FecCie,'YYYY')) And
   								A.CODPRE = C.CODPRE AND
   								--C.ESTATUS = '".$this->tipog."' AND
   								RTRIM(A.codpre) >= '".$this->cod1."' AND
   								RTRIM(A.codpre) <= '".$this->cod2."' AND
   								substr(A.codpre,1,".$mascara.") LIKE substr(A.codpre,1,".$mascara.")||'%' AND
   								RTRIM(A.codpre) LIKE '".$this->filtro."'
		   						group by substr(A.codpre,1,".$mascara.") )";

		   	$tbT1=$this->bd->select($this->sqlT1);

			/*while(!$tbT1->EOF){
				$this->sqlT3="insert into cpdisniv".$this->aleatorio." (codpre,monasi,modificacion,asigactual,monprc,moncom,moncau,monpag,mondis,deuda) values ('".$tbT1->fields["codpre"]."','".$tbT1->fields["monasi"]."','".$tbT1->fields["modificacion"]."','".$tbT1->fields["asigactual"]."','".$tbT1->fields["monprc"]."','".$tbT1->fields["moncom"]."','".$tbT1->fields["moncau"]."','".$tbT1->fields["monpag"]."','".$tbT1->fields["mondis"]."','".$tbT1->fields["deuda"]."')";
						$tbT3=$this->bd->select($this->sqlT3);
				$tbT1->MoveNext();
			}*/
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
			$objeto->Image("../../img/logo_1.jpg",10,8,18);
			//fecha actual
			$fecha=date("d/m/Y");
			$objeto->Cell(350,10,'Fecha: '.$fecha,0,0,'C');
			$objeto->ln(5);
			//Paginas
			if($pagina=="s")
			{
				$objeto->Cell(350,10,'Pagina '.$objeto->PageNo().' de {nb}',0,0,'C');
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
			$objeto->Cell(180,10,$rep,0,0,'C',0);
			$objeto->ln(10);
	}

		function Header()
		{
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
			$this->SetXY(173,22);
			$this->cell(35,5,"Periodo:  ".$_POST["per1"]. "  Al  ".$_POST["per2"]."   ",0,0,'');
			$this->ln(5);
			$this->SetXY(173,27);
			$this->cell(5,5,"Al:");
			$fecha=date("d/m/Y");
			$this->cell(15,5,"$fecha");
			$this->cell(20,5);
			$this->setFont("Arial","B",8);

			//$this->SetXY(70,30);
			$this->SetXY(90,35);
			$this->SetTextColor(128,0,0);
			$this->setFont("Arial","B",9);
			$this->cell(200,5,"(En Bolivares)",0,0,'');
			$this->ln(6);
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",8);
			$this->cell(10,7,"Año");
			$this->sqlF="SELECT TO_CHAR(FECPER,'YYYY') as ANO
    					 FROM CPDEFNIV";
    		$tbF=$this->bd->select($this->sqlF);
			$this->cell(15,7,$tbF->fields["ano"]);
			$this->SetXY(10,43);
			$this->cell(180,5,STRTOUPPER($tipog),0,0,'C');
			$this->SetXY(10,50);
			$this->SetTextColor(128,0,0);
			$this->setFont("Arial","B",8);
			$this->cell(55,5,"Código Presupuestario",0,0,'C');
			$x1=$this->GetX();
			$y1=$this->GetY();
			$this->cell(40,5,"Descripción",0,0,'C');
			$this->cell(35,5,"Asignación Inicial",0,0,'C');
			$x3=$this->GetX();
			$this->cell(30,5,"Modificaciones",0,0,'C');
			$x4=$this->GetX();
			$this->cell(30,5,"Asignación Actual",0,0,'C');
			$x5=$this->GetX();
			$this->SetXY($x1,$y1+3);
			$this->cell(45,5,"Código Presupuestario",0,0,'C');
			$x2=$this->GetX();
			$this->line(10,50,200,50);
			$this->line(10,60,200,60);
			$this->line(10,50,10,260);
			$this->line($x1-2,50,$x1-2,260);
			$this->line($x2,50,$x2,260);
			$this->line($x3,50,$x3,260);
			$this->line($x4,50,$x4,260);
			$this->line($x5,50,$x5,260);
			$this->line(10,260,200,260);
			$this->ln(8);
		}

		function Cuerpo(){
			$tb=$this->bd->select($this->sql);
			$actividad=$tb->fields["actividad"];
			$programa=$tb->fields["programa"];
			$sector=$tb->fields["sector"];
			$asignaA=0;
			$modiA=0;
			$aactualA=0;
			while(!$tb->EOF)
			{

				if ($tb->fields["actividad"]!=$actividad and strlen($actividad)==14) //grupo actividad
				{
					$this->setFont("Arial","BU",8);

					$this->ln(10);
					$this->SetX(65);
					$this->cell(30,4,"Total por Actividad:"); // titulo

					$this->SetX(105);
					$this->cell(30,4,H::FormatoMonto($asignaA),0,0,'R'); // asignacion inicail
					//$asignaA=($this->$asignaA+$tb->fields["monasiult"]);

					$this->SetX(140);
					$this->cell(30,4,H::FormatoMonto($modiA),0,0,'R');
					//$modiA=($this->$asignaA+$tb->fields["monmodult"]);

					$this->SetX(170);
					$this->cell(30,4,H::FormatoMonto($aactualA),0,0,'R');
					//$aactualAA=($this->$asignaA+$tb->fields["asiactult"]);
				$this->ln(5);



				// a cero los acumuladores
				$asignaA=0;
				$modiA=0;
				$aactualA=0;



				}
				if ($tb->fields["programa"]!=$programa and strlen($programa)==5) //grupo programa
				{
					$this->setFont("Arial","BU",8);
					$this->ln(5);
					$this->SetX(65);
					$this->cell(30,4,"Total por programa:"); // titulo

					$this->SetX(105);
					$this->cell(30,4,H::FormatoMonto($tasignaP),0,0,'R'); // asignacion inicail

					$this->SetX(140);
					$this->cell(30,4,H::FormatoMonto($tmodiP),0,0,'R');
					$this->SetX(170);
					$this->cell(30,4,H::FormatoMonto($taactualP),0,0,'R');
					$this->ln(5);


					$asignaA=0;
					$modiA=0;
					$aactualA=0;
					$tasignaP=0;
					$tmodiP=0;
					$taactualP=0;


			}

			 if ($tb->fields["sector"]!=$sector and strlen($sector)==2) //grupo sector
				{
					$this->setFont("Arial","BU",8);

					$this->ln(5);
					$this->SetX(65);
					$this->cell(30,4,"Total por Sector:"); // titulo

					$this->SetX(105);
					$this->cell(30,4,H::FormatoMonto($ttasignaS),0,0,'R'); // asignacion inicail

					$this->SetX(140);
					$this->cell(30,4,H::FormatoMonto($ttmodiS),0,0,'R');

					$this->SetX(170);
					$this->cell(30,4,H::FormatoMonto($ttaactualS),0,0,'R');

				$this->ln(5);

				$asignaA=0;
				$modiA=0;
				$aactualA=0;
				$tasignaP=0;
				$tmodiP=0;
				$taactualP=0;
				$ttasignaS=0;
				$ttmodiS=0;
				$ttaactualS=0;


		}

		$this->setFont("Arial","",8);
		$this->SetX(10);
		$this->cell(45,3,$tb->fields["codpre"],0,0,'');
		$xx=$this->GetX()+10;
		$this->cell(50);
		//$this->sqls="SELECT SUM(MONASI) as monto FROM CPASIINI WHERE rtrim(CODPRE)=RTRIM('".$tb->fields["codpre"]."') AND PERPRE='00'";
		//$tbs=$this->bd->select($this->sqls);
		//para acumular $monto=$tb->fields["monto"];
		$this->SetX(110);
		$this->cell(25,3,H::FormatoMonto($tb->fields["monto"]),0,0,'R'); // asignacion inicail
		$this->SetX(145);
		$this->cell(25,3,H::FormatoMonto($tb->fields["modificacion"]),0,0,'R');
		$this->SetX(175);
		$this->cell(25,3,H::FormatoMonto($tb->fields["monto"] + $tb->fields["modificacion"]),0,0,'R');
		$this->SetX($xx);
		$this->MultiCell(40,3,$tb->fields["nompre"],0,"J");

		if(strlen(trim($tb->fields["codpre"]))>=02)
		{
			//ACTIVIDAD
			$asignaA+=$tb->fields["monto"];
			$modiA+=$tb->fields["modificacion"];
			$aactualA+=$tb->fields["monto"]+$tb->fields["modificacion"];
			//PROGRAMA
			$tasignaP+=$tb->fields["monto"];
			$tmodiP+=$tb->fields["modificacion"];
			$taactualP+=$tb->fields["monto"]+$tb->fields["modificacion"];
			//SECTOR
			$ttasignaS+=$tb->fields["monto"];
			$ttmodiS+=$tb->fields["modificacion"];
			$ttaactualS+=$tb->fields["monto"]+$tb->fields["modificacion"];
			//TOTAL GENERAL
			$tttasigna+=$tb->fields["monto"];
			$tttmodi+=$tb->fields["modificacion"];
			$tttaactual+=$tb->fields["monto"]+$tb->fields["modificacion"];
		}

		// acumuladores
	/*	if(strlen($tb->fields["codpre"])==34)
		{
			$asignaA+=$tb->fields["monto"];
			$modiA+=$tb->fields["modificacion"];
			$aactualA+=$tb->fields["monasi"]+$tb->fields["modificacion"];
		}*/

		$y=$this->GetY();


		$actividad=$tb->fields["actividad"];
		$programa=$tb->fields["programa"];
		$sector=$tb->fields["sector"];
        $tb->MoveNext();
			/*if ($y>=220)
			{
				$this->AddPage();
			}*/

		}
		$this->setFont("Arial","BU",8);
		$this->ln(10);
		$this->SetX(65);
		$this->cell(30,4,"Total por Actividad:"); // titulo

		$this->SetX(105);
		$this->cell(30,4,H::FormatoMonto($asignaA/10),0,0,'R'); // asignacion inicail

		$this->SetX(140);
		$this->cell(30,4,H::FormatoMonto($modiA/10),0,0,'R');

		$this->SetX(170);
		$this->cell(30,4,H::FormatoMonto($aactualA/10),0,0,'R');
		$this->ln(5);

		$this->SetX(65);
		$this->cell(30,4,"Total por programa:"); // titulo

		$this->SetX(105);
		$this->cell(30,4,H::FormatoMonto($tasignaP/10),0,0,'R'); // asignacion inicail

		$this->SetX(140);
		$this->cell(30,4,H::FormatoMonto($tmodiP/10),0,0,'R');
		$this->SetX(170);
		$this->cell(30,4,H::FormatoMonto($taactualP/10),0,0,'R');
		$this->ln(5);

		$this->SetX(65);
		$this->cell(30,4,"Total por Sector:"); // titulo

		$this->SetX(105);
		$this->cell(30,4,H::FormatoMonto($ttasignaS/10),0,0,'R'); // asignacion inicail

		$this->SetX(140);
		$this->cell(30,4,H::FormatoMonto($ttmodiS/10),0,0,'R');

		$this->SetX(170);
		$this->cell(30,4,H::FormatoMonto($ttaactualS/10),0,0,'R');


		$this->ln(8);
		$this->SetX(65);
		$this->setFont("Arial","BU",8);
		$this->cell(30,4,"TOTAL GENERAL:"); // titulo

		$this->SetX(105);
		$this->cell(30,4,H::FormatoMonto($tttasigna/10),0,0,'R'); // asignacion inicail

		$this->SetX(140);
		$this->cell(30,4,H::FormatoMonto($tttmodi/10),0,0,'R');


		$this->SetX(170);
		$this->cell(30,4,H::FormatoMonto($tttaactual/10),0,0,'R');
		//$yy=$this->GetY();


			}
	}
?>