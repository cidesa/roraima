<?
	require_once("../../lib/general/fpdf/fpdf.php");
    require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/Cabecera.php");
    require_once("../../lib/general/negociorpresupuesto.php");
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
		var $perdesde;
		var $perhasta;
		var $nivdesde;
		var $nivhasta;
		var $agrupar;
		var $asignacion;
		var $codpredes;
		var $codprehas;
		var $comodin;
		var $totalprc;
		var $totalcom;
		var $totalcau;
		var $totalpag;
		var $totalmod;
   	    var $totalaco;
		var $totaldeu;
		var $totaldis;
		var $perasi;
		var $consec;
        var $grupo;
		var $cuantos;
		var $longrupo;
		var $lonpartida;
		var $cadena;
		var $totalprccat;
		var $totalcomcat;
		var $totalcaucat;
		var $totalpagcat;
		var $totalmodcat;
   	    var $totalacocat;
		var $totaldeucat;
		var $totaldiscat;
		var $categoria;
		var $nivel;
		var $posY;
		var $inipartida;
		var $nomcat;
		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
//			$this->bd->validar();
			$this->clasepresup=new negociorpresupuesto;
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->perdesde=$_POST["perdesde"];
			$this->perhasta=$_POST["perhasta"];
//			$this->nivdesde=$_POST["nivdesde"];
			$this->nivhasta=$_POST["nivhasta"];
			$this->asignacion=$_POST["asignacion"];
			$this->agrupar=$_POST["agrupar"];
			$this->cuantos=strpos($this->agrupar, "-")-1;
			$this->codpredes=$_POST["codpredes"];
			$this->codprehas=$_POST["codprehas"];
			$this->comodin=$_POST["comodin"];
			if($this->asignacion=="Acumulados")
			{
			$this->perasi=$this->perhasta;
			}
			else
			{
			$this->perasi="12";
			}

			$this->consec=substr($this->agrupar,0,$this->cuantos);
			$this->nivel=substr($this->agrupar,$this->cuantos+1);
			$this->sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)-1) as LONGRUPO FROM CPNIVELES WHERE CATPAR='C' AND CONSEC<=".$this->consec.";";
		    $tb=$this->bd->select($this->sql);
			$longrupo=$tb->fields["longrupo"];

			$this->sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)-1) as LONPARTIDA FROM CPNIVELES WHERE CATPAR='P' AND CONSEC<=".$this->nivhasta.";";
		    $tb=$this->bd->select($this->sql);
			$lonpartida=$tb->fields["lonpartida"];

			$this->sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)+1) as inipartida FROM CPNIVELES WHERE CATPAR='C';";
		    $tb=$this->bd->select($this->sql);
			$inipartida=$tb->fields["inipartida"];

$this->sql="SELECT SUBSTR(EJECUCION.CODPRE,1,".$longrupo.") AS CATEGORIA,SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$lonpartida.") AS CODPRE,MAX(CPDEFTIT.NOMPRE) AS NOMPRE, SUM(MONASI) AS ASIGNACION,SUM(PRECOMPROMISO) AS PRECOMPROMISO,SUM(COMPROMISO) AS COMPROMISO, SUM(CAUSADO) AS CAUSADO, SUM(PAGADO) AS PAGADO, SUM(MODIFICACION) AS MODIFICADO FROM
			(

			SELECT CODPRE, PERPRE AS PERMOV,SUM(MONASI) AS MONASI ,0 AS PRECOMPROMISO,0 AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION  FROM CPASIINI
			WHERE  PERPRE >= '".$this->perdesde."' AND PERPRE <='".$this->perasi."'  GROUP BY CODPRE,PERPRE
			UNION ALL

			SELECT CODPRE, TO_CHAR(FECMOV,'MM') AS PERMOV,0 AS MONASI, SUM(MONTO) AS PRECOMPROMISO,0 AS COMPROMISO ,0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION FROM
			(
			SELECT 'PRC' AS TIPO,A.CODPRE, B.FECPRC AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP) as Monto FROM CPIMPPRC A, CPPRECOM B
			WHERE
			A.REFPRC=B.REFPRC AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECPRC, A.STAIMP, B.FECANU
			UNION ALL
			SELECT 'COM' AS TIPO,A.CODPRE, B.FECCOM AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP) as Monto FROM CPIMPCOM A, CPCOMPRO B,CPDOCCOM C
			WHERE C.AFEPRC='S' AND
			B.TIPCOM=C.TIPCOM AND
			A.REFCOM=B.REFCOM AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECCOM, A.STAIMP, B.FECANU
			UNION ALL
			SELECT 'CAU' as TIPO,A.CODPRE, B.FECCAU AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP) as Monto FROM CPIMPCAU A, CPCAUSAD B, CPDOCCAU C
			WHERE C.AFEPRC='S' AND
			B.TIPCAU=C.TIPCAU AND
			A.REFCAU=B.REFCAU AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECCAU, A.STAIMP, B.FECANU
			UNION ALL
			SELECT 'PAG' AS TIPO,A.CODPRE, B.FECPAG AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP) as Monto FROM CPIMPPAG A, CPPAGOS B, CPDOCPAG C
			WHERE C.AFEPRC='S' AND
			B.TIPPAG=C.TIPPAG AND
			A.REFPAG=B.REFPAG AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECPAG, A.STAIMP, B.FECANU
			UNION ALL
			SELECT 'AJPR' AS TIPO,A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 as MONTO FROM CPIMPPRC A, CPPRECOM B, CPAJUSTE C, CPMOVAJU D, CPDOCAJU E
			WHERE
			A.REFPRC=B.REFPRC AND
			A.REFPRC=C.REFERE AND
			C.REFAJU=D.REFAJU AND
			E.TIPAJU=C.TIPAJU AND
			A.CODPRE=D.CODPRE AND
			E.REFIER='P' AND
			((C.STAAJU='A') OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."'))  AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'AJCO' AS TIPO,A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 as MONTO FROM CPIMPCOM A, CPCOMPRO B, CPAJUSTE C, CPMOVAJU D, CPDOCCOM E,CPDOCAJU F
			WHERE
			A.REFCOM=B.REFCOM AND
			A.REFCOM=C.REFERE AND
			C.REFAJU=D.REFAJU AND
			B.TIPCOM=E.TIPCOM AND
			A.CODPRE=D.CODPRE AND
			C.TIPAJU=F.TIPAJU AND
			F.REFIER='C' AND
			E.AFEPRC='S' AND
			((C.STAAJU='A') OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."'))  AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'AJCA' AS TIPO,A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 as MONTO FROM CPIMPCAU A, CPCAUSAD B, CPAJUSTE C, CPMOVAJU D, CPDOCCAU E,CPDOCAJU F
			WHERE A.REFCAU=B.REFCAU AND
			A.REFCAU=C.REFERE AND
			A.REFERE=D.REFCOM AND
			C.REFAJU=D.REFAJU AND
			B.TIPCAU=E.TIPCAU AND
			A.CODPRE=D.CODPRE AND
			C.TIPAJU=F.TIPAJU AND
			F.REFIER='A' AND
			E.AFEPRC='S' AND
			(C.STAAJU='A' OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."')) AND
			(A.STAIMP='A'OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'AJPA' as TIPO, A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 as MONTO FROM CPIMPPAG A, CPPAGOS B, CPAJUSTE C, CPMOVAJU D,CPDOCPAG E, CPDOCAJU F
			WHERE A.REFPAG=B.REFPAG AND
			A.REFPAG=C.REFERE AND
			A.REFCOM=D.REFCOM AND
			A.CODPRE=D.CODPRE AND
			C.REFAJU=D.REFAJU AND
			B.TIPPAG=E.TIPPAG AND
			F.TIPAJU=C.TIPAJU AND
			F.REFIER='G' and
			E.AFEPRC='S' AND
			((C.STAAJU='A') OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."')) AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU) COMPROMISO
			WHERE TO_CHAR(FECMOV,'MM')>='".$this->perdesde."' AND TO_CHAR(FECMOV,'MM')<='".$this->perhasta."'
			GROUP BY CODPRE,FECMOV
			UNION ALL

			SELECT CODPRE, TO_CHAR(FECMOV,'MM') AS PERMOV,0 AS MONASI,0 AS PRECOMPROMISO,SUM(MONTO) AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION FROM
			(
			SELECT 'COM' AS TIPO,A.CODPRE, B.FECCOM AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP) as Monto FROM CPIMPCOM A, CPCOMPRO B,CPDOCCOM C
			WHERE C.AFECOM='S' AND
			B.TIPCOM=C.TIPCOM AND
			A.REFCOM=B.REFCOM AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECCOM, A.STAIMP, B.FECANU
			UNION ALL
			SELECT 'CAU' as TIPO,A.CODPRE, B.FECCAU AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP) as Monto FROM CPIMPCAU A, CPCAUSAD B, CPDOCCAU C
			WHERE C.AFECOM='S' AND
			B.TIPCAU=C.TIPCAU AND
			A.REFCAU=B.REFCAU AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECCAU, A.STAIMP, B.FECANU
			UNION ALL
			SELECT 'PAG' AS TIPO,A.CODPRE, B.FECPAG AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP) as Monto FROM CPIMPPAG A, CPPAGOS B, CPDOCPAG C
			WHERE C.AFECOM='S' AND
			B.TIPPAG=C.TIPPAG AND
			A.REFPAG=B.REFPAG AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECPAG, A.STAIMP, B.FECANU
			UNION ALL
			SELECT 'AJCO' AS TIPO,A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 as MONTO FROM CPIMPCOM A, CPCOMPRO B, CPAJUSTE C, CPMOVAJU D, CPDOCAJU E
			WHERE
			A.REFCOM=B.REFCOM AND
			A.REFCOM=C.REFERE AND
			C.REFAJU=D.REFAJU AND
			E.TIPAJU=C.TIPAJU AND
			A.CODPRE=D.CODPRE AND
			E.REFIER='C' AND
			((C.STAAJU='A') OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."'))  AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'AJCA' AS TIPO,A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 as MONTO FROM CPIMPCAU A, CPCAUSAD B, CPAJUSTE C, CPMOVAJU D, CPDOCCAU E,CPDOCAJU F
			WHERE A.REFCAU=B.REFCAU AND
			A.REFCAU=C.REFERE AND
			A.REFERE=D.REFCOM AND
			C.REFAJU=D.REFAJU AND
			B.TIPCAU=E.TIPCAU AND
			A.CODPRE=D.CODPRE AND
			C.TIPAJU=F.TIPAJU AND
			F.REFIER='A' AND
			E.AFECOM='S' AND
			(C.STAAJU='A' OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."')) AND
			(A.STAIMP='A'OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'AJPA' as TIPO, A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 as MONTO FROM CPIMPPAG A, CPPAGOS B, CPAJUSTE C, CPMOVAJU D,CPDOCPAG E, CPDOCAJU F
			WHERE A.REFPAG=B.REFPAG AND
			A.REFPAG=C.REFERE AND
			A.REFCOM=D.REFCOM AND
			A.CODPRE=D.CODPRE AND
			C.REFAJU=D.REFAJU AND
			B.TIPPAG=E.TIPPAG AND
			F.TIPAJU=C.TIPAJU AND
			F.REFIER='G' and
			E.AFECOM='S' AND
			((C.STAAJU='A') OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."')) AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU) COMPROMISO
			WHERE TO_CHAR(FECMOV,'MM')>='".$this->perdesde."' AND TO_CHAR(FECMOV,'MM')<='".$this->perhasta."'
			GROUP BY CODPRE,FECMOV
			UNION ALL

			SELECT CODPRE, TO_CHAR(FECMOV,'MM') AS PERMOV, 0 AS MONASI,0 AS PRECOMPROMISO, 0 AS COMPROMISO, SUM(MONTO) AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION  FROM
			(
			SELECT 'CAU' AS TIPO,A.CODPRE, B.FECCAU AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP)  AS Monto FROM CPIMPCAU A, CPCAUSAD B,CPDOCCAU C
			WHERE C.AFECAU='S' AND
			B.TIPCAU=C.TIPCAU AND
			A.REFCAU=B.REFCAU AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,B.FECCAU,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'PAG' AS TIPO,A.CODPRE, B.FECPAG AS FECMOV, A.STAIMP, B.FECANU, SUM(A.MONIMP) AS  Monto FROM CPIMPPAG A, CPPAGOS B, CPDOCPAG C
			WHERE C.AFECAU='S' AND
			B.TIPPAG=C.TIPPAG AND
			A.REFPAG=B.REFPAG AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,B.FECPAG,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'AJCA' AS TIPO,A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 AS Monto FROM CPIMPCAU A, CPCAUSAD B, CPAJUSTE C, CPMOVAJU D, CPDOCAJU E
			WHERE
			A.REFCAU=B.REFCAU AND
			A.REFCAU=C.REFERE AND
			A.REFERE=D.REFCOM AND
			A.CODPRE=D.CODPRE AND
			C.REFAJU=D.REFAJU AND
			E.TIPAJU=C.TIPAJU AND
			E.REFIER='A' AND
			((C.STAAJU='A') OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."')) AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'AJPA' AS TIPO,A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU,SUM(D.MONAJU)*-1 AS Monto FROM CPIMPPAG A, CPPAGOS B, CPAJUSTE C, CPMOVAJU D, CPDOCPAG E, CPDOCAJU F
			WHERE  A.REFPAG=B.REFPAG AND
			A.REFPAG=C.REFERE AND
			A.REFCOM=D.REFCOM AND
			A.CODPRE=D.CODPRE AND
			C.REFAJU=D.REFAJU AND
			B.TIPPAG=E.TIPPAG AND
			F.TIPAJU=C.TIPAJU AND
			F.REFIER='G' and
			E.AFECAU='S' AND
			((C.STAAJU='A') OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."')) AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU) CAUSADOS
			WHERE TO_CHAR(FECMOV,'MM')>='".$this->perdesde."' AND TO_CHAR(FECMOV,'MM')<='".$this->perhasta."'
			GROUP BY CODPRE,FECMOV
			UNION ALL

			SELECT CODPRE, TO_CHAR(FECMOV,'MM') AS PERMOV, 0 AS MONASI,0 AS PRECOMPROMISO, 0 AS COMPROMISO, 0 AS CAUSADO, SUM(MONTO) AS PAGADO, 0 AS MODIFICACION FROM
			(
			SELECT 'PAG' AS TIPO,A.CODPRE, B.FECPAG AS FECMOV, A.STAIMP, B.FECANU,SUM(A.MONIMP) AS Monto FROM CPIMPPAG A, CPPAGOS B, CPDOCPAG C
			WHERE C.AFEPAG='S' AND
			B.TIPPAG=C.TIPPAG AND
			A.REFPAG=B.REFPAG AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,B.FECPAG,A.STAIMP,B.FECANU
			UNION ALL
			SELECT 'AJPA' AS TIPO, A.CODPRE, C.FECAJU AS FECMOV, A.STAIMP, B.FECANU, SUM(D.MONAJU)*-1 AS Monto FROM CPIMPPAG A, CPPAGOS B, CPAJUSTE C, CPMOVAJU D, CPDOCAJU E
			WHERE A.REFPAG=B.REFPAG AND
			A.REFPAG=C.REFERE AND
			A.CODPRE=D.CODPRE AND
			C.REFAJU=D.REFAJU AND
			E.TIPAJU=C.TIPAJU AND
			E.REFIER='G' AND
			((C.STAAJU='A') OR (C.STAAJU='N' AND TO_CHAR(C.FECANU,'MM')>'".$this->perhasta."')) AND
			((A.STAIMP='A') OR (A.STAIMP='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE,C.FECAJU,A.STAIMP,B.FECANU) PAGADOS
			WHERE TO_CHAR(FECMOV,'MM')>='".$this->perdesde."' AND TO_CHAR(FECMOV,'MM')<='".$this->perhasta."'
			GROUP BY CODPRE,FECMOV
			UNION ALL

			SELECT CODPRE, TO_CHAR(FECMOV,'MM') AS PERMOV, 0 AS MONASI,0 AS PRECOMPROMISO, 0 AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, SUM(MONTO) AS MODIFICACION FROM
			(
			SELECT 'TRN' AS TIPO, A.CODORI AS CODPRE,B.FECTRA AS FECMOV, A.STAMOV, B.FECANU,SUM(A.MONMOV)*-1 AS MONTO FROM CPMOVTRA A, CPTRASLA B
			WHERE A.REFTRA=B.REFTRA AND
			B.PERTRA>='".$this->perdesde."' AND
			B.PERTRA<='".$this->perhasta."' AND
			((B.STATRA='A') OR (B.STATRA='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODORI, B.FECTRA, A.STAMOV, B.FECANU
			UNION ALL
			SELECT 'TRA' AS TIPO,A.CODDES AS CODPRE, B.FECTRA AS FECMOV, A.STAMOV, B.FECANU,SUM(A.MONMOV) AS MONTO FROM CPMOVTRA A, CPTRASLA B
			WHERE A.REFTRA=B.REFTRA AND
			B.PERTRA>='".$this->perdesde."' AND
			B.PERTRA<='".$this->perhasta."' AND
			((B.STATRA='A') OR (B.STATRA='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODDES, B.FECTRA, A.STAMOV, B.FECANU
			UNION ALL
			SELECT 'ADI' AS TIPO, A.CODPRE,B.FECADI AS FECMOV, A.STAMOV, B.FECANU ,SUM(A.MONMOV) AS MONTO FROM CPMOVADI A, CPADIDIS B
			WHERE B.ADIDIS='A' AND
			A.REFADI=B.REFADI AND
			A.PERPRE>='".$this->perdesde."' AND
			A.PERPRE<='".$this->perhasta."' AND
			((B.STAADI='A') OR (B.STAADI='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECADI, A.STAMOV, B.FECANU
			UNION ALL
			SELECT 'DIS' AS TIPO, A.CODPRE, B.FECADI AS FECMOV, A.STAMOV, B.FECANU,SUM(A.MONMOV)*-1 AS MONTO FROM CPMOVADI A, CPADIDIS B
			WHERE B.ADIDIS='D' AND
			A.REFADI=B.REFADI AND
			A.PERPRE>='".$this->perdesde."' AND
			A.PERPRE<='".$this->perhasta."' AND
			((B.STAADI='A') OR (B.STAADI='N' AND TO_CHAR(B.FECANU,'MM')>'".$this->perhasta."'))
			GROUP BY A.CODPRE, B.FECADI, A.STAMOV, B.FECANU)  MODIFICACION GROUP BY CODPRE,FECMOV
			)
			EJECUCION, CPDEFTIT WHERE EJECUCION.CODPRE=CPDEFTIT.CODPRE AND EJECUCION.CODPRE>='".$this->codpredes."' AND EJECUCION.CODPRE<='".$this->codprehas."' AND EJECUCION.CODPRE LIKE '".$this->comodin."'  GROUP BY SUBSTR(EJECUCION.CODPRE,1,".$longrupo."),SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$lonpartida.") ORDER BY SUBSTR(EJECUCION.CODPRE,1,".$longrupo."),SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$lonpartida.");";

//print $this->sql;
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
		 $this->titulos[0]="CODIGO";
		 $this->titulos[1]="DENOMINACION";
		 $this->titulos[2]="ASIGANADO 2008";
		 $this->titulos[3]="MODIFICACION(+/-)";
		 $this->titulos[4]="MODIFICADO";
		 $this->titulos[5]="COMPROMISO";
		 $this->titulos[6]="DISPONIBILIDAD";
		 $this->titulos[7]="CAUSADO";
		 $this->titulos[8]="PAGADO";
		 $this->titulos[9]="DEUDA";
		 $this->anchos[0]=40;//codigo
		 $this->anchos[1]=35;//denominacion
	     $this->anchos[2]=25;//ley asignacion inicial
		 $this->anchos[3]=25;//modificaciones
	     $this->anchos[4]=25;//asignacion actualizada (gasto acordado)
	     $this->anchos[5]=20;//compromisos
	     $this->anchos[6]=27;//disponibilidad
		 $this->anchos[7]=24;//causado
	     $this->anchos[8]=25;//pagado
	     $this->anchos[9]=21;//deuda

		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->getCabecera(H::GetPost("titulo"),"");
			$this->setXY(231,25);
			$this->setFont("Arial","B",7);
			$this->cell(125,0,"  Periodo : ".$this->perdesde."   Al   ".$this->perhasta);
			$this->ln(12);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
  				$this->cell($this->anchos[$i],5,$this->titulos[$i]);
			}
			$this->ln(3);
			$this->Line(10,45,270,45);
			$this->ln(5);
		}

		function Cuerpo()
		{
//			$this->bd->actualizar('SET search_path TO "SIMA055"');
		    $tb=$this->bd->select($this->sql);


			$ref="";
			$totalprc=0;
            $totalcom=0;
	        $totalcau=0;
	 	    $totalpag=0;
 	        $totalmod=0;
            $totalasi=0;
            $totalaco=0;
	        $totaldeu=0;
	 	    $totaldis=0;

			$totalprccat=0;
            $totalcomcat=0;
	        $totalcaucat=0;
	 	    $totalpagcat=0;
 	        $totalmodcat=0;
            $totalasicat=0;
            $totalacocat=0;
	        $totaldeucat=0;
	 	    $totaldiscat=0;
			$categoria="";
			while(!$tb->EOF)
			{

				//Total por Categoria esto lo puedo mejorar, me parece que hay mucho codigo. despues le doy la vuelta
				//mostramos el titulo del primer prograna
                if ($categoria=="")
				{
  				 $this->setFont("Arial","B",7);

  				 $this->sqlN="SELECT nompre from cpdeftit where trim(codpre) = trim('".$tb->fields["categoria"]."')";
                 $tb0=$this->bd->select($this->sqlN);
				// $this->cell(24,4,$tb->fields["categoria"]."                                  ".substr($tb0->fields["nompre"],0,30),0,0,'L');
				 $this->cell(24,4,$tb->fields["categoria"],0,0,'L');
				 $this->SetX(36);
				 $this->cell(23,4,$this->clasepresup->nombrecodigo($tb->fields["categoria"]),0,0,'L');
				 $this->ln(6);
				}
				$this->setFont("Arial","",7);
				if (($categoria!=$tb->fields["categoria"])&&($categoria!="") )
				{
				    $this->nomcat=$this->clasepresup->nombrecodigo($categoria);
				    $this->setFont("Arial","B",7);
					$this->ln(2);
					$this->cell(68,4,"TOTAL ".substr($this->nomcat,0,35)." ",0,0,'R');
					$this->cell(27,4,number_format($totalasicat,2,'.',','),0,0,'R');
					$this->cell(23,4,number_format($totalmodcat,2,'.',','),0,0,'R');
					$this->cell(23,4,number_format($totalacocat,2,'.',','),0,0,'R');
					$this->cell(23,4,number_format($totalcomcat,2,'.',','),0,0,'R');
					$this->cell(23,4,number_format($totaldiscat,2,'.',','),0,0,'R');
					$this->cell(23,4,number_format($totalcaucat,2,'.',','),0,0,'R');
					$this->cell(23,4,number_format($totalpagcat,2,'.',','),0,0,'R');
					$this->cell(23,4,number_format($totaldeucat,2,'.',','),0,0,'R');
					$this->ln(6);
 				   // $this->sqlN="SELECT nompre from cpdeftit where trim(codpre) = trim('".$tb->fields["categoria"]."')";
                   // $tb0=$this->bd->select($this->sqlN);
				    $this->cell(24,4,$tb->fields["categoria"],0,0,'L');
				    $this->SetX(36);
				    $this->cell(23,4,$this->clasepresup->nombrecodigo($tb->fields["categoria"]),0,0,'L');
				    $this->ln(6);
					$this->setFont("Arial","",7);
					$totalprccat=$tb->fields["precompromiso"];
					$totalcomcat=$tb->fields["compromiso"];
					$totalcaucat=$tb->fields["causado"];
					$totalpagcat=$tb->fields["pagado"];
					$totalmodcat=$tb->fields["modificado"];
					$totalasicat=$tb->fields["asignacion"];
					$totalacocat=$tb->fields["asignacion"]+$tb->fields["modificado"];
					$totaldiscat=$tb->fields["asignacion"]+$tb->fields["modificado"]-$tb->fields["precompromiso"];
					$totaldeucat=$tb->fields["causado"]-$tb->fields["pagado"];
				}
				else
				{
					//ACUMULADOR POR CATEGORIAS
					$totalprccat=$totalprccat+$tb->fields["precompromiso"];
					$totalcomcat=$totalcomcat+$tb->fields["compromiso"];
					$totalcaucat=$totalcaucat+$tb->fields["causado"];
					$totalpagcat=$totalpagcat+$tb->fields["pagado"];
					$totalmodcat=$totalmodcat+$tb->fields["modificado"];
					$totalasicat=$totalasicat+$tb->fields["asignacion"];
					$totalacocat=$totalacocat+$tb->fields["asignacion"]+$tb->fields["modificado"];
					$totaldiscat=$totaldiscat+$tb->fields["asignacion"]+$tb->fields["modificado"]-$tb->fields["precompromiso"];
					$totaldeucat=$totaldeucat+$tb->fields["causado"]-$tb->fields["pagado"];
				}
				$categoria=$tb->fields["categoria"];

				//Detalle
				$this->cell(35,4,$tb->fields["codpre"]);
                $this->SetX(82);
				$this->cell(23,4,number_format($tb->fields["asignacion"],2,'.',','),0,0,'R');
				$this->cell(23,4,number_format($tb->fields["modificado"],2,'.',','),0,0,'R');
				$this->cell(23,4,number_format($tb->fields["asignacion"]+$tb->fields["modificado"],2,'.',','),0,0,'R');
				$this->cell(23,4,number_format($tb->fields["compromiso"],2,'.',','),0,0,'R');
				$this->cell(23,4,number_format($tb->fields["asignacion"]+$tb->fields["modificado"]-$tb->fields["precompromiso"],2,'.',','),0,0,'R');
				$this->cell(23,4,number_format($tb->fields["causado"],2,'.',','),0,0,'R');
				$this->cell(23,4,number_format($tb->fields["pagado"],2,'.',','),0,0,'R');
				$this->cell(22,4,number_format(($tb->fields["causado"]-$tb->fields["pagado"]),2,'.',','),0,0,'R');
                $this->SetX(36);
				$this->multicell(47,4,$tb->fields["nompre"]);


				//ACUMULADOR GENERAL
				$totalprc=$totalprc+$tb->fields["precompromiso"];
		        $totalcom=$totalcom+$tb->fields["compromiso"];
		        $totalcau=$totalcau+$tb->fields["causado"];
	  		    $totalpag=$totalpag+$tb->fields["pagado"];
 		        $totalmod=$totalmod+$tb->fields["modificado"];
		        $totalasi=$totalasi+$tb->fields["asignacion"];
		        $totalaco=$totalaco+$tb->fields["asignacion"]+$tb->fields["modificado"];
	  		    $totaldis=$totaldis+$tb->fields["asignacion"]+$tb->fields["modificado"]-$tb->fields["precompromiso"];
 		        $totaldeu=$totaldeu+$tb->fields["causado"]-$tb->fields["pagado"];
				$tb->MoveNext();
				if ($this->GetY()>=170){
					$this->AddPage();
				}
			}//while
			$tb->Close();
			$this->setFont("Arial","B",7);
			//IMPRIMO EL ULTIMO TOTAL DE CAT
		    $this->nomcat=$this->clasepresup->nombrecodigo($categoria);
  		    $this->cell(68,4,"TOTAL ".substr($this->nomcat,0,60)."     ",0,0,'R');
			$this->cell(27,4,number_format($totalasicat,2,'.',','),0,0,'R');
 			$this->cell(23,4,number_format($totalmodcat,2,'.',','),0,0,'R');
			$this->cell(23,4,number_format($totalacocat,2,'.',','),0,0,'R');
			$this->cell(23,4,number_format($totalcomcat,2,'.',','),0,0,'R');
			$this->cell(23,4,number_format($totaldiscat,2,'.',','),0,0,'R');
			$this->cell(23,4,number_format($totalcaucat,2,'.',','),0,0,'R');
			$this->cell(23,4,number_format($totalpagcat,2,'.',','),0,0,'R');
			$this->cell(22,4,number_format($totaldeucat,2,'.',','),0,0,'R');
			$this->ln();

			//AHORA EL TOTAL GENERAL
			$this->Line(10,$this->GetY(),270,$this->GetY());

			$this->cell(68,7,"TOTAL GENERAL",0,0,'R');
			$this->cell(27,7,number_format($totalasi,2,'.',','),0,0,'R');
			$this->cell(23,7,number_format($totalmod,2,'.',','),0,0,'R');
			$this->cell(23,7,number_format($totalaco,2,'.',','),0,0,'R');
			$this->cell(23,7,number_format($totalcom,2,'.',','),0,0,'R');
			$this->cell(23,7,number_format($totaldis,2,'.',','),0,0,'R');
			$this->cell(23,7,number_format($totalcau,2,'.',','),0,0,'R');
			$this->cell(23,7,number_format($totalpag,2,'.',','),0,0,'R');
			$this->cell(22,7,number_format($totaldeu,2,'.',','),0,0,'R');
            $this->setFont("Arial","",7);
            $this->bd->closed();
		}
	}
?>