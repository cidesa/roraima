<?
	require_once("../../lib/general/fpdf/fpdf.php");
    require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/general/negociorpresupuesto.php");



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
			$this->fpdf("l","mm","Legal");
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
			$this->consepar=$_POST["consepar"];
			$this->nivdesde=$_POST["nivdesde"];
			$this->nivhasta=$_POST["nivhasta"];
			$this->asignacion=$_POST["asignacion"];
			$this->agrupar=$_POST["agrupar"];
			$this->codpredes=$_POST["codpredes"];
			$this->codprehas=$_POST["codprehas"];
			$this->comodin=$_POST["comodin"];
			$this->titulo=$_POST["titulo"];
			$t=$this->bd->select("select to_char(fecper,'yyyy') as perfis from cpdefniv");
			$this->perfis=$t->fields["perfis"];

			if ($this->nivdesde==10 and $this->nivhasta!=10){ $this->nivhasta=10;}

			if($this->nivdesde!=1){
				$this->cadena= " and length(b.codpre)=(select sum(lonniv+1)-1 from cpniveles where consec<='".$this->nivhasta."')";

			}else{
				$this->cadena= " and length(b.codpre)<=(select sum(lonniv+1)-1 from cpniveles where consec<='".$this->nivhasta."')";
			}

			if($this->asignacion=="Acumulados")
			{
			$this->perasi=$this->perhasta;
			}
			else
			{
			$this->perasi="12";
			}

			$this->cuantos=strpos($this->agrupar, "-")-1;
			$this->consec=substr($this->agrupar,0,$this->cuantos);
			$this->nivel=substr($this->agrupar,$this->cuantos+1);
			$this->sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)-1) as LONGRUPO FROM CPNIVELES WHERE CATPAR='C' AND CONSEC<=".$this->consec.";";
		    $tb=$this->bd->select($this->sql);
		    if (!empty($tb->fields["longrupo"]))
				$longrupo=$tb->fields["longrupo"];
			else
				$longrupo=0;

			$this->sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)-1) as LONPARTIDA FROM CPNIVELES WHERE CATPAR='P' AND CONSEC<=".$this->nivhasta.";";
		    $tb=$this->bd->select($this->sql);
			if (!empty($tb->fields["lonpartida"]))
				$lonpartida=$tb->fields["lonpartida"];
			else
				$lonpartida=0;

			$this->sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)-1) as TPARTIDA FROM CPNIVELES WHERE CATPAR='P' AND CONSEC<=".$this->consepar.";";
		    $tb=$this->bd->select($this->sql);
			if (!empty($tb->fields["tpartida"]))
				$tpartida=$tb->fields["tpartida"];
			else
				$tpartida=0;

			$this->sql="SELECT (SUM(LONNIV)+COUNT(CATPAR)+1) as inipartida FROM CPNIVELES WHERE CATPAR='C';";
		    $tb=$this->bd->select($this->sql);
			$inipartida=$tb->fields["inipartida"];

			$this->lonpartida=$lonpartida;
			if ($longrupo!=0 && $lonpartida!=0)
			{
				$parchesql="SUBSTR(EJECUCION.CODPRE,1,".$longrupo.") AS CATEGORIA,SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$tpartida.") AS partida,
			SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$lonpartida.") AS CODPRE,";
				$parchesqlg="SUBSTR(EJECUCION.CODPRE,1,".$longrupo."),SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$tpartida."),
			SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$lonpartida.")";
			}
			elseif ($longrupo==0)
			{
				$parchesql="SUBSTR(EJECUCION.CODPRE,1,".$longrupo.") AS CATEGORIA,SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$tpartida.") AS partida,
			SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$lonpartida.") AS CODPRE,";
				$parchesqlg="SUBSTR(EJECUCION.CODPRE,1,".$longrupo."),SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$tpartida."),
			SUBSTR(EJECUCION.CODPRE,".$inipartida.",".$lonpartida.")";
			}
			else
			{
				$parchesql=" '' AS CATEGORIA,'' as partida,
			SUBSTR(EJECUCION.CODPRE,1,".$longrupo.") AS CODPRE,";
				$parchesqlg="SUBSTR(EJECUCION.CODPRE,1,".$longrupo.")";
			}


$this->sql="select B.CODPRE,SUM(asignacion) AS ASIGNACION,SUM(PRECOMPROMISO) AS PRECOMPROMISO,SUM(COMPROMISO) AS COMPROMISO, SUM(CAUSADO) AS CAUSADO, SUM(PAGADO) AS PAGADO, SUM(MODIFICADO) AS MODIFICADO  FROM (
		SELECT ".$parchesql." MIN(CPDEFTIT.NOMPRE) AS NOMPRE, SUM(MONASI) AS ASIGNACION,SUM(PRECOMPROMISO) AS PRECOMPROMISO,SUM(COMPROMISO) AS COMPROMISO, SUM(CAUSADO) AS CAUSADO, SUM(PAGADO) AS PAGADO, SUM(MODIFICACION) AS MODIFICADO  FROM
			(

			SELECT CODPRE, PERPRE AS PERMOV,SUM(MONASI) AS MONASI ,0 AS PRECOMPROMISO,0 AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION   FROM CPASIINI
			WHERE  PERPRE = '00'
			GROUP BY CODPRE,PERPRE
			UNION ALL

			SELECT CODPRE, TO_CHAR(FECMOV,'MM') AS PERMOV,0 AS MONASI, SUM(MONTO) AS PRECOMPROMISO,0 AS COMPROMISO ,0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION  FROM
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


			SELECT CODPRE, TO_CHAR(FECMOV,'MM') AS PERMOV,0 AS MONASI,0 AS PRECOMPROMISO,SUM(MONTO) AS COMPROMISO, 0 AS CAUSADO, 0 AS PAGADO, 0 AS MODIFICACION  FROM
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

			SELECT CODPRE, TO_CHAR(FECMOV,'MM') AS PERMOV, 0 AS MONASI,0 AS PRECOMPROMISO, 0 AS COMPROMISO, 0 AS CAUSADO, SUM(MONTO) AS PAGADO, 0 AS MODIFICACION  FROM
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
			EJECUCION, CPDEFTIT WHERE EJECUCION.CODPRE=CPDEFTIT.CODPRE AND EJECUCION.CODPRE>=('".$this->codpredes."') AND EJECUCION.CODPRE<=('".$this->codprehas."') AND EJECUCION.CODPRE LIKE '".$this->comodin."'
			 GROUP BY ".$parchesqlg."
			 ORDER BY ".$parchesqlg." )a, cpdeftit b where
            INSTR(a.categoria||'-'||a.codpre,b.codpre,1,1)=1".$this->cadena."
            group by b.codpre
            ORDER BY b.codpre";

//print '<pre>'; print $this->sql;exit;
			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->arrp=$this->bd->select($this->sql);

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Cod.Presupuestario";
				$this->titulos[1]="Descripción Cod.Presupuestario";
				$this->titulos[2]="Asignación Inicial";
				$this->titulos[3]="Modificaciones";
				$this->titulos[4]="Credito Presupuestario Monto Actual";
				$this->titulos[5]="Precompromisos";
				$this->titulos[6]="Disponibilidad Presupuestaria";
				$this->titulos[7]="Compromisos";
				$this->titulos[8]="Gasto Causados";
				$this->titulos[9]="Gasto Pagado";
				$this->titulos[10]="Saldo Pendiente Por Pagar";

				$this->anchos[0]=26;
				$this->anchos[1]=46;
				$this->anchos[2]=25;
				$this->anchos[3]=23;
				$this->anchos[4]=23;
				$this->anchos[5]=23;
				$this->anchos[6]=23;
				$this->anchos[7]=23;
				$this->anchos[8]=23;
				$this->anchos[9]=23;
				$this->anchos[10]=23;

		}


		function Header()
		{

			$this->cab->poner_cabecera_f_b($this,$_POST["titulo"],"ll","s","s");

			$aux = split("-",$this->agrupar);
			if(strtoupper(trim($aux[1]))=="SECTOR" && $this->nivhasta=="")
			{
				$this->titulo.="  Por Sectores";
			}elseif($this->nivhasta=="6" && trim($this->agrupar)=="")
			{
				$this->titulo.="  Por Partidas";
			}


			//$this->cab->poner_cabecera($this,'',"l","s");
			$this->setFont("Arial","B",7);
			$y=$this->getY();
			$this->setXY(40,28);
			$this->cell(40,4,"Período Fiscal: ".$this->perfis);
			$this->setXY(40,31);
			$this->cell(40,4,"Desde:  ".$this->periodo($this->perdesde,1)."   Hasta:  ".$this->periodo($this->perhasta,2));
			$this->setY($y);
			//$this->ln(10);
			$this->setY(22);
			$this->setFont("Arial","B",12);
		//	$this->cell(340,4,"Disponibilidad Presupuestaria",0,0,'C');
			$this->setFont("Arial","B",8);
			$this->setY(38);
			$ncampos=count($this->titulos);
			/*for($i=0;$i<$ncampos;$i++)
			{
  				$this->cell($this->anchos[$i],5,$this->titulos[$i],0,0,'C');
			}*/
			$this->setBorder(1);
			$this->setWidths(array(38,43,28,28,28,28,28,28,28,28,28));
			$this->setAligns(array("L","C","C","C","C","C","C","C","C","C","C"));
			$this->rowM(array($this->titulos[0]." ".$this->MASCARA(),$this->titulos[1],$this->titulos[2],$this->titulos[3],$this->titulos[4],$this->titulos[5],$this->titulos[6],$this->titulos[7],$this->titulos[8],$this->titulos[9],$this->titulos[10]));
			$this->ln(3);
			$this->Line(10,37,340,37);
			$this->Line(10,50,340,50);
			$this->ln(5);
		}

		function periodo($periodo,$inifin)
		{
			if($inifin==1)
				return "01/".$periodo."/".$this->perfis;
			else
			{
				if($periodo=="01"||$periodo=="03"||$periodo=="05"||$periodo=="07"||$periodo=="08"||$periodo=="10"||$periodo=="12")
					return "31/".$periodo."/".$this->perfis;
				elseif($periodo=="04"||$periodo=="06"||$periodo=="09"||$periodo=="11")
				    return "30/".$periodo."/".$this->perfis;
				else
				    return "29/".$periodo."/".$this->perfis;
			}

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

		function Cuerpo()
		{
//			$this->bd->actualizar('SET search_path TO "SIMA055"');
		    $tb=$this->arrp;
		    $contpar=0;
			$contcat=0;
			$conttot=0;

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

			$totalprcpar=0;
            $totalcompar=0;
	        $totalcaupar=0;
	 	    $totalpagpar=0;
 	        $totalmodpar=0;
            $totalasipar=0;
            $totalacopar=0;
	        $totaldeupar=0;
	 	    $totaldispar=0;
	 	    $totalejepar=0;

			$totalprccat=0;
            $totalcomcat=0;
	        $totalcaucat=0;
	 	    $totalpagcat=0;
 	        $totalmodcat=0;
            $totalasicat=0;
            $totalacocat=0;
	        $totaldeucat=0;
	 	    $totaldiscat=0;
	 	    $totalejecat=0;
			$categoria="-1";
			$partida="-1";
			while(!$tb->EOF)
			{

				$this->setFont("Arial","",7);
				$categoria=$tb->fields["categoria"];
				$partida=$tb->fields["partida"];

				//Detalle
				$contpar++;
				$contcat++;
				$conttot++;
				$this->setFont("Arial","",6.5);
				$this->cell(50,4,$tb->fields["codpre"]);
                $this->SetX(88);
				$this->cell(28,4,H::FormatoMonto($tb->fields["asignacion"]),0,0,'R');
				$this->cell(28,4,H::FormatoMonto($tb->fields["modificado"]),0,0,'R');
				$this->cell(28,4,H::FormatoMonto($tb->fields["asignacion"]+$tb->fields["modificado"]),0,0,'R');
				$this->cell(28,4,H::FormatoMonto($tb->fields["precompromiso"]),0,0,'R');
				$this->cell(28,4,H::FormatoMonto($tb->fields["asignacion"]+$tb->fields["modificado"]-$tb->fields["precompromiso"]),0,0,'R');
				$this->cell(28,4,H::FormatoMonto($tb->fields["compromiso"]),0,0,'R');
				$this->cell(28,4,H::FormatoMonto($tb->fields["causado"]),0,0,'R');
				$this->cell(28,4,H::FormatoMonto($tb->fields["pagado"]),0,0,'R');
				$this->cell(28,4,H::FormatoMonto($tb->fields["causado"]-$tb->fields["pagado"]),0,0,'R');
				/*$acordado=$tb->fields["asignacion"]+$tb->fields["modificado"];
				if (($acordado)==0)
					$this->cell(23,4,H::FormatoMonto(0),0,0,'R');
				else
					$this->cell(23,4,H::FormatoMonto(($tb->fields["causado"]/($acordado))*100),0,0,'R');*/

                $this->SetX(48);
                if($this->lonpartida==0 )
                   $tbcod=$this->bd->select("select upper(nompre) as nompre from cpdeftit where trim(codpre) = '".$tb->fields["codpre"]."'");
                else {
                	$this->dig="select max(nompre) as nompre from cpdeftit where trim(codpre) like '".$tb->fields["codpre"]."'";
                   $tbcod=$this->bd->select($this->dig);
                //  $tbcod=$this->bd->select("select (nompre) as nompre from cpdeftit where trim(codpre) like '%".$tb->fields["categoria"]."%%".$tb->fields["codpre"]."'");

//print '<pre>'; print $this->dig;
                }

//print '<pre>'; print $tbcod;
				$this->multicell(40,4,(strtoupper($tbcod->fields["nompre"])));

				//ACUMULADOR GENERAL
				$tblong=$this->bd->select("select sum(lonniv+1)-1 as suma from cpniveles where consec<='".$this->nivhasta."'");
				//print strlen($tb->fields["codpre"]);
				$long=$tblong->fields["suma"];
				if (strlen($tb->fields["codpre"])==$long){
				$totalprc=$totalprc+$tb->fields["precompromiso"];
		        $totalcom=$totalcom+$tb->fields["compromiso"];
		        $totalcau=$totalcau+$tb->fields["causado"];
	  		    $totalpag=$totalpag+$tb->fields["pagado"];
 		        $totalmod=$totalmod+$tb->fields["modificado"];
		        $totalasi=$totalasi+$tb->fields["asignacion"];
		        $totalaco=$totalaco+$tb->fields["asignacion"]+$tb->fields["modificado"];
	  		    $totaldis=$totaldis+$tb->fields["asignacion"]+$tb->fields["modificado"]-$tb->fields["compromiso"];
 		        //$totaldeu=$totaldeu+$tb->fields["causado"]-$tb->fields["pagado"];
				$acordado=$tb->fields["asignacion"]+$tb->fields["modificado"];
					if($acordado!=0)
						$totaleje+=($tb->fields["causado"]/($acordado))*100;
				}
				$tb->MoveNext();
				if ($this->GetY()>=170){
					$this->AddPage();
				}
			}//while
			$tb->Close();
			$this->setFont("Arial","B",6.5);
			//AHORA EL TOTAL GENERAL
			$this->ln();
			$this->Line(10,$this->GetY(),340,$this->GetY());
			$this->cell(78,7,"TOTAL GENERAL",0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalasi),0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalmod),0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalasi+$totalmod),0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalprc),0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalasi+$totalmod-$totalprc),0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalcom),0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalcau),0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalpag),0,0,'R');
			$this->cell(28,7,H::FormatoMonto($totalcau-$totalpag),0,0,'R');
			//$this->cell(23,7,H::FormatoMonto(($totalcau/$totalaco)*100),0,0,'R');
            $this->setFont("Arial","",7);
            $this->bd->closed();
		}
	}
?>