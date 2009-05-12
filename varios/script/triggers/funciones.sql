set search_path to "SIMA002";

CREATE OR REPLACE FUNCTION instr(character varying, character varying, integer, integer)
  RETURNS integer AS
$BODY$
DECLARE
  string ALIAS FOR $1;
  string_to_search ALIAS FOR $2;
  beg_index ALIAS FOR $3;
  occur_index ALIAS FOR $4;
  pos integer NOT NULL DEFAULT 0;
  occur_number INTEGER NOT NULL DEFAULT 0;
  temp_str VARCHAR;
  beg INTEGER;
  i INTEGER;
  length INTEGER;
  ss_length INTEGER;
BEGIN
  IF beg_index > 0 THEN
     beg := beg_index;
     temp_str := substring(string FROM beg_index);

     FOR i IN 1..occur_index LOOP
         pos := position(string_to_search IN temp_str);

         IF i = 1 THEN
            beg := beg + pos - 1;
         ELSE
            beg := beg + pos;
         END IF;

         temp_str := substring(string FROM beg + 1);
     END LOOP;

     IF pos = 0 THEN
        RETURN 0;
     ELSE
        RETURN beg;
     END IF;
  ELSE
     ss_length := char_length(string_to_search);
     length := char_length(string);
     beg := length + beg_index - ss_length + 2;

     WHILE beg > 0 LOOP
           temp_str := substring(string FROM beg FOR ss_length);
           pos := position(string_to_search IN temp_str);

           IF pos > 0 THEN
              occur_number := occur_number + 1;

              IF occur_number = occur_index THEN
                 RETURN beg;
              END IF;
           END IF;

           beg := beg - 1;
     END LOOP;

     RETURN 0;
  END IF;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION instr(character varying, character varying, integer, integer) OWNER TO postgres;


CREATE OR REPLACE FUNCTION instr1(character varying, character varying)
  RETURNS integer AS
$BODY$
DECLARE
  pos integer;
BEGIN
  pos:= instr2($1,$2,1);
RETURN pos;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION instr1(character varying, character varying) OWNER TO postgres;


CREATE OR REPLACE FUNCTION instr2(character varying, character varying, integer)
  RETURNS integer AS
$BODY$
DECLARE
  string ALIAS FOR $1;
  string_to_search ALIAS FOR $2;
  beg_index ALIAS FOR $3;
  pos integer NOT NULL DEFAULT 0;
  temp_str VARCHAR;
  beg INTEGER;
  length INTEGER;
  ss_length INTEGER;
BEGIN
  IF beg_index > 0 THEN
     temp_str := substring(string FROM beg_index);
     pos := position(string_to_search IN temp_str);

    IF pos = 0 THEN
       RETURN 0;
    ELSE
       RETURN pos + beg_index - 1;
    END IF;
  ELSE
    ss_length := char_length(string_to_search);
    length := char_length(string);
    beg := length + beg_index - ss_length + 2;

    WHILE beg > 0 LOOP
      temp_str := substring(string FROM beg FOR ss_length);
      pos := position(string_to_search IN temp_str);

      IF pos > 0 THEN
         RETURN beg;
      END IF;

      beg := beg - 1;
    END LOOP;

    RETURN 0;
  END IF;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION instr2(character varying, character varying, integer) OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".obtener_ejecucion(codigopre bpchar, perdes bpchar, perhas bpchar, anno bpchar, tipo bpchar)
  RETURNS numeric AS
$BODY$
DECLARE
MONPRC NUMERIC(32,2);
MONCOM NUMERIC(32,2);
MONCAU NUMERIC(32,2);
MONPAG NUMERIC(32,2);
MONTRN NUMERIC(32,2);
MONTRA NUMERIC(32,2);
MONADI NUMERIC(32,2);
MONDIS NUMERIC(32,2);
BEGIN

IF TIPO='PRC' THEN
SELECT SUM(MONTO) INTO MONPRC FROM
(select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPPRECOM A,CPIMPPRC B
WHERE A.ANOPRC=ANNO
AND TO_CHAR(A.FECPRC,'MM')<=PERHAS
AND TO_CHAR(A.FECPRC,'MM')>=PERDES
AND A.REFPRC=B.REFPRC
AND B.CodPre LIKE CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY')))) --PRECOMPROMISOS
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPPRECOM A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D
WHERE A.ANOPRC=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.REFPRC=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='P'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY')))) --AJUSTES A PRECOMPROMISOS
UNION ALL
select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPCOMPRO A,CPIMPCOM B,CPDOCCOM C
WHERE A.ANOCOM=ANNO
AND TO_CHAR(A.FECCOM,'MM')<=PERHAS
AND TO_CHAR(A.FECCOM,'MM')>=PERDES
AND A.TIPCOM=C.TIPCOM
AND C.AFEPRC='S'
AND A.REFCOM=B.REFCOM
AND B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY')))) --COMPROMISOS QUE PRECOMPROMETEN
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPCOMPRO A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D,CPDOCCOM E
WHERE A.ANOCOM=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.TIPCOM=E.TIPCOM
AND E.AFEPRC='S'
AND A.REFCOM=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='C'
AND B.REFAJU=C.REFAJU AND
C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
 OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY')))) -- AJUSTES A COMPROMISOS QUE PRECOMPROMETEN
UNION ALL
select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPCAUSAD A,CPIMPCAU B,CPDOCCAU C
WHERE A.ANOCAU=ANNO
AND TO_CHAR(A.FECCAU,'MM')<=PERHAS
AND TO_CHAR(A.FECCAU,'MM')>=PERDES
AND A.TIPCAU=C.TIPCAU
AND C.AFEPRC='S'
AND A.REFCAU=B.REFCAU
AND B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY')))) --CAUSADOS QUE PRECOMPROMETEN
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPCAUSAD A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D,CPDOCCAU E
WHERE A.ANOCAU=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.TIPCAU=E.TIPCAU
AND E.AFEPRC='S'
AND A.REFCAU=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='A'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY')))) --AJUSTES A CAUSADOS QUE PRECOMPROMETEN
UNION ALL
select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPPAGOS A,CPIMPPAG B,CPDOCPAG C
WHERE A.ANOPAG=ANNO
AND TO_CHAR(A.FECPAG,'MM')<=PERHAS
AND TO_CHAR(A.FECPAG,'MM')>=PERDES
AND A.TIPPAG=C.TIPPAG
AND C.AFEPRC='S'
AND A.REFPAG=B.REFPAG
AND B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY')))) --PAGADOS QUE PRECOMPROMETEN
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPPAGOS A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D,CPDOCPAG E
WHERE A.ANOPAG=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.TIPPAG=E.TIPPAG
AND E.AFEPRC='S'
AND A.REFPAG=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='G'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))) --AJUSTES A PAGADOS QUE PRECOMPROMETEN
AS PRECOM;


RETURN(MONPRC);
END IF;

IF TIPO='COM' THEN
SELECT SUM(MONTO) INTO MONCOM FROM
(select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPCOMPRO A,CPIMPCOM B
WHERE A.ANOCOM=ANNO
AND TO_CHAR(A.FECCOM,'MM')<=PERHAS
AND TO_CHAR(A.FECCOM,'MM')>=PERDES
AND A.REFCOM=B.REFCOM AND
B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPCOMPRO A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D
WHERE A.ANOCOM=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.REFCOM=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='C'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPCAUSAD A,CPIMPCAU B,CPDOCCAU C
WHERE A.ANOCAU=ANNO
AND TO_CHAR(A.FECCAU,'MM')<=PERHAS
AND TO_CHAR(A.FECCAU,'MM')>=PERDES
AND A.TIPCAU=C.TIPCAU
AND C.AFECOM='S'
AND A.REFCAU=B.REFCAU
AND B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPCAUSAD A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D,CPDOCCAU E
WHERE A.ANOCAU=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.TIPCAU=E.TIPCAU
AND E.AFECOM='S'
AND A.REFCAU=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='A'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPPAGOS A,CPIMPPAG B,CPDOCPAG C
WHERE A.ANOPAG=ANNO
AND TO_CHAR(A.FECPAG,'MM')<=PERHAS
AND TO_CHAR(A.FECPAG,'MM')>=PERDES
AND A.TIPPAG=C.TIPPAG
AND C.AFECOM='S'
AND A.REFPAG=B.REFPAG
AND B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPPAGOS A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D,CPDOCPAG E
WHERE A.ANOPAG=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.TIPPAG=E.TIPPAG
AND E.AFECOM='S'
AND A.REFPAG=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='G'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))) AS COMPRO;
RETURN(MONCOM);
END IF;


IF TIPO='CAU' THEN
SELECT SUM(MONTO) INTO MONCAU FROM
(select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPCAUSAD A,CPIMPCAU B
WHERE A.ANOCAU=ANNO
AND TO_CHAR(A.FECCAU,'MM')<=PERHAS
AND TO_CHAR(A.FECCAU,'MM')>=PERDES
AND A.REFCAU=B.REFCAU
AND B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPCAUSAD A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D
WHERE A.ANOCAU=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.REFCAU=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='A'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPPAGOS A,CPIMPPAG B,CPDOCPAG C
WHERE A.ANOPAG=ANNO
AND TO_CHAR(A.FECPAG,'MM')<=PERHAS
AND TO_CHAR(A.FECPAG,'MM')>=PERDES
AND A.TIPPAG=C.TIPPAG
AND C.AFECAU='S'
AND A.REFPAG=B.REFPAG
AND B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPPAGOS A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D,CPDOCPAG E
WHERE A.ANOPAG=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.TIPPAG=E.TIPPAG
AND E.AFECAU='S'
AND A.REFPAG=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='G'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))) AS CAUSAD;
RETURN(MONCAU);
END IF;

IF TIPO='PAG' THEN
SELECT SUM(MONTO) INTO MONPAG FROM
(select COALESCE(SUM(B.MONIMP),0) AS MONTO
from CPPAGOS A,CPIMPPAG B
WHERE A.ANOPAG=ANNO
AND TO_CHAR(A.FECPAG,'MM')<=PERHAS
AND TO_CHAR(A.FECPAG,'MM')>=PERDES
AND A.REFPAG=B.REFPAG
AND B.CodPre Like CODIGOPRE||'%'
AND (B.STAIMP<>'N'
OR (B.STAIMP='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))
UNION ALL
select COALESCE(SUM(C.MONAJU*(-1)),0) AS MONTO
from CPPAGOS A,CPAJUSTE B,CPMOVAJU C,CPDOCAJU D
WHERE A.ANOPAG=ANNO
AND TO_CHAR(B.FECAJU,'MM')<=PERHAS
AND TO_CHAR(B.FECAJU,'MM')>=PERDES
AND A.REFPAG=B.REFERE
AND B.TIPAJU=D.TIPAJU
AND D.REFIER='G'
AND B.REFAJU=C.REFAJU
AND C.CodPre Like CODIGOPRE||'%'
AND (C.STAMOV<>'N'
OR (C.STAMOV='N'
AND A.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))))) AS PAGADO;
RETURN(MONPAG);
END IF;

IF TIPO='TRA' THEN
SELECT SUM(A.MONMOV) INTO MONTRA
         FROM CPMOVTRA A,CPTRASLA B
         WHERE PERTRA<=PERHAS
         AND   PERTRA>=PERDES
     AND A.REFTRA=B.REFTRA
     AND A.CodDES Like CODIGOPRE||'%'
     AND (STAMOV<>'N'
          OR (STAMOV='N'
          AND B.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))));
RETURN(MONTRA);
END IF;

IF TIPO='TRN' THEN
SELECT SUM(A.MONMOV) INTO MONTRN
         FROM CPMOVTRA A,CPTRASLA B
         WHERE PERTRA<=PERHAS
         AND   PERTRA>=PERDES
     AND A.REFTRA=B.REFTRA
     AND A.CodORI Like CODIGOPRE||'%'
     AND (STAMOV<>'N'
              OR (STAMOV='N'
          AND B.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))));
RETURN(MONTRN);
END IF;

IF TIPO='ADI' THEN
SELECT SUM(A.MONMOV) INTO MONADI
     FROM CPMOVADI A,CPADIDIS B
     WHERE TO_CHAR(B.FECADI,'MM')<=PERHAS
   AND TO_CHAR(B.FECADI,'MM')>=PERDES
     AND B.ANOADI=ANNO
     AND B.ADIDIS='A'
     AND A.REFADI=B.REFADI
     AND A.CodPRE Like CODIGOPRE||'%'
     AND (STAMOV<>'N'
          OR (STAMOV='N'
          AND B.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))));
RETURN(MONADI);
END IF;

IF TIPO='DIS' THEN
SELECT SUM(A.MONMOV) INTO MONDIS
         FROM CPMOVADI A,CPADIDIS B
     WHERE TO_CHAR(B.FECADI,'MM')<=PERHAS
   AND TO_CHAR(B.FECADI,'MM')>=PERDES
     AND B.ANOADI=ANNO
     AND B.ADIDIS='D'
     AND A.REFADI=B.REFADI
     AND A.CodPRE Like CODIGOPRE||'%'
     AND (STAMOV<>'N'
          OR (STAMOV='N'
          AND B.FECANU>LAST_DAY(TO_DATE(PERHAS||'/'||ANNO,'MM/YYYY'))));
   RETURN(MONDIS);
END IF;

END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".obtener_ejecucion(bpchar, bpchar, bpchar, bpchar, bpchar) OWNER TO postgres;


CREATE OR REPLACE FUNCTION partidaconcepto(concepto character varying, nomina character varying, cargo character varying)
  RETURNS character varying AS
$BODY$
DECLARE
   lapartida VARCHAR(32);
BEGIN
select coalesce(X.codpar,Y.partida) into lapartida from npasiparcon X right outer join
(select B.codcon, coalesce(A.codpre,B.codpar) as partida, A.codnom  from npasicodpre A right outer join npdefcpt B on A.codcon = B.codcon and A.codnom = nomina where B.codcon = concepto) Y
on Y.codcon = X.codcon and coalesce(Y.codnom,X.codnom) = X.codnom and X.codnom = nomina and X.codcar = cargo where Y.codcon = concepto ;
RETURN lapartida;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION partidaconcepto(concepto character varying, nomina character varying, cargo character varying) OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".actualizar_saldosnew(codigo_cta character varying, fecha_ini date, fecha_cie date, periodo character varying, debcre character varying, monto numeric)
  RETURNS integer AS
$BODY$
DECLARE
   REGISTRO RECORD;
   --SALDO_ANT NUMERIC (14,2);
   SALDO_ANT NUMERIC;
   --SALDO_ACT NUMERIC (14,2);
   SALDO_ACT NUMERIC;
   PERIODO_ANT VARCHAR;
   DEBITO_CREDITO VARCHAR;
   SALDOS CURSOR IS SELECT * FROM CONTABB1 WHERE CODCTA = CODIGO_CTA
              AND FECINI = FECHA_INI
                                             AND FECCIE = FECHA_CIE
                                             ORDER BY PEREJE;
   --MONDEB NUMERIC(14,2);
   MONDEB NUMERIC;
   --MONCRE NUMERIC(14,2);
   MONCRE NUMERIC;
BEGIN
   SELECT  INTO SALDO_ANT SALANT
     FROM CONTABB
    WHERE CODCTA = CODIGO_CTA AND
                 FECINI = FECHA_INI AND
                 FECCIE = FECHA_CIE;
   PERIODO_ANT := '00';
   OPEN SALDOS;
   FETCH SALDOS INTO REGISTRO;
   IF FOUND THEN
     LOOP
         IF REGISTRO.PEREJE=RTRIM(PERIODO) THEN
            IF RTRIM(DEBCRE)='D' THEN
               MONDEB:=MONTO;
               MONCRE:=0;
            ELSE
               MONDEB:=0;
               MONCRE:=MONTO;
            END IF;
         ELSE
            MONDEB:=0;
            MONCRE:=0;
         END IF;
         UPDATE CONTABB1
            SET SALACT = ((REGISTRO.TOTDEB+MONDEB)  + SALDO_ANT) -
(REGISTRO.TOTCRE+MONCRE),
                TOTDEB = TOTDEB+MONDEB,
                TOTCRE = TOTCRE+MONCRE
          WHERE CODCTA = REGISTRO.CODCTA AND
                FECINI = REGISTRO.FECINI AND
                FECCIE = REGISTRO.FECCIE AND
                PEREJE = REGISTRO.PEREJE;
      PERIODO_ANT := LPAD(LTRIM(TO_CHAR(TO_NUMBER(PERIODO_ANT,99)+1,'99')),2,'0');
      SELECT INTO SALDO_ANT SALACT
        FROM CONTABB1
       WHERE CODCTA = CODIGO_CTA AND
                    FECINI = FECHA_INI AND
                    FECCIE = FECHA_CIE AND
                    PEREJE = PERIODO_ANT;
        FETCH SALDOS INTO REGISTRO;
        IF NOT FOUND THEN
           EXIT;
        END IF;
     END LOOP;
   END IF;
   CLOSE SALDOS;
   RETURN 0;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".actualizar_saldosnew(character varying, date, date, character varying, character varying, numeric) OWNER TO postgres;


CREATE OR REPLACE FUNCTION cuantotiempo(fecini date, fecfin date, frecuencia character varying, modo character varying)
  RETURNS numeric AS
$BODY$
--Fecuencia
----DD Dias
----MM Meses
----YY A??os
----CD Tiempo Completo Fracci??n de Dias
----CM Tiempo Completo Fracci??n de Meses
----CY Tiempo Completo Fracci??n de A??os
--Modo
----0 Redondeado al Siguiente Entero
----1 Truncada parte entera
---------------------------------------------------------------------------------------------------------------
DECLARE
  Result numeric;
  CuantosMeses numeric;
  Dias numeric;
  Meses numeric;
  Anos numeric;
  FraccionM numeric;
  FraccionA numeric;
  FraccionD numeric;
  AdicionalD numeric;
  AdicionalM numeric;
  AdicionalA numeric;
  DiaResta numeric;
  DiaResta2 numeric;
  Diasr numeric;
BEGIN
 --Este Estuvo facil
  If Frecuencia='DD' then
     Result:=FecFin-FecIni;
  else
  --Aqui se Complica un tanto
      AdicionalA:=0;
      AdicionalM:=0;
      AdicionalD:=0;
      CuantosMeses:=Months_between(FecFin, FecIni);
    --  FraccionM:=CuantosMeses-trunc(CuantosMeses);
      Diasr=extract(day from (age(FecFin, FecIni)));
      FraccionM=Diasr/30;
      DiaResta2:=0;
      --caso especial mes anterior a la fecha final es febrero
--      If To_Char(Add_months(FecFin, -1),'MM')='02' Then
--        If To_Char(Last_Day(Add_months(FecFin, -1)),'DD')='29' Then--bisiesto
--           if To_char(FecFin,'DD')<'08' Then
--              DiaResta2:=1;
--           End If;
--        else
--           if To_char(FecFin,'DD')<'10' Then
--              DiaResta2:=1;
--           End If;
--        End If;
--      End If;


      IF To_Number(To_char(FecFin,'DD'),'99')<To_Number(To_char(FecIni,'DD'),'99') Then
         DiaResta:=-1;
      Else
         DiaResta:=0;
      End if;

      Anos:=CuantosMeses/12;
      FraccionA:=Anos-Trunc(Anos);

       Dias:=0;
      --Dias:=ROUND(FraccionM*(To_Number(To_Char(Last_Day(Add_months(FecFin, DiaResta)),'DD'),99)));
      --FraccionD:=Dias-Trunc(Dias);
       IF To_Number(To_char(FecFin,'DD'),'99')<To_Number(To_char(FecIni,'DD'),'99') Then
            Dias:=To_Number(To_Char(Last_Day(Add_months(FecFin, DiaResta)),'DD'),'99')-To_number(TO_CHAR(FecIni,'DD'),'99');
            Dias=Dias + To_number(TO_CHAR(FecFin,'DD'),'99');
       END IF;
       FraccionD:=Dias-Trunc(Dias);

      --PRIMERO SE EVALUA EL CASO DONDE  SE ENTRO EL PRIMER DIA DE UN MES
      IF TO_CHAR(FECINI,'DD')='01'  THEN
      --EN CASO DE SER ULTIMO DE MES SE REDONDEA A 0 DIAS Y SE SUMA 1 AL MES
        IF (TO_CHAR(FECFIN,'DD')>='30' OR TO_CHAR(FECFIN,'MMDD')='0228' OR TO_CHAR(FECFIN,'MMDD')='0229') THEN
         AdicionalM:=AdicionalM+1;
         If Frecuencia='CD' then
            AdicionalD:=0-trunc(Dias);
         END IF;
        ELSE
       --SI NO ES ULTIMO DE MES PERO LA FECHA DE INICIO ES 01/XX/YYYY ENTONCES DIAS = DIA DE FECHA FIN
        DIAS:=TO_NUMBER(TO_CHAR(FECFIN,'DD'),'99');
        END IF;
      ELSE
         IF TO_CHAR(FECINI,'DD')<TO_CHAR(FECFIN,'DD') THEN
            Dias:=To_NumBer(TO_CHAR(FECFIN,'DD'),'99')-To_number(TO_CHAR(FECINI,'DD'),'99');
         END IF;
      END IF;


      If Anos>=1 Then
         Meses:=Trunc(CuantosMeses)-(TRUNC(Anos)*12);
      else
         Meses:=Trunc(CuantosMeses);
      End If;

      if FraccionA>0 then
         AdicionalA:=1;
      end if;
      if FraccionD>0 then
         AdicionalD:=1;
      end if;

      If Frecuencia='MM' then
         if Modo=0 then
            Result:=Trunc(CuantosMeses)+AdicionalM;
         else
            Result:=Trunc(CuantosMeses);
         end if;
      else
          If Frecuencia='YY' then
             if Modo='0' then
                Result:=trunc(Anos)+AdicionalA;
             else
                Result:=trunc(Anos);
             end if;
          else
             If Frecuencia='CD' then
                if Modo='0' then
                    Result:=trunc(Dias)+AdicionalD;
                else
                    Result:=trunc(Dias);
                end if;
                --Result:=Result-Diaresta2;
             else
                If Frecuencia='CM' then
                   Result:=Meses+AdicionalM;
                else--'CA'
                   Result:=trunc(Anos);
                end if;
             end if;
          end if;
      end if;
  end if;
    return (Result);
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION cuantotiempo(date, date, character varying, character varying) OWNER TO postgres;


CREATE OR REPLACE FUNCTION last_day(date)
  RETURNS date AS
$BODY$
select ((date_trunc('month', $1) + interval '1 month') - interval '1 day')::date;
$BODY$
  LANGUAGE 'sql' VOLATILE;
ALTER FUNCTION last_day(date) OWNER TO postgres;


CREATE OR REPLACE FUNCTION obtener_ano_cierre()
  RETURNS character varying AS
$BODY$
DECLARE
   ANOCIERRE VARCHAR(4);
   FECHACIE DATE;
BEGIN
   SELECT INTO FECHACIE FECCIE
     FROM CPDEFNIV
    WHERE CODEMP='001';
   ANOCIERRE := TO_CHAR(FECHACIE,'YYYY');
   RETURN ANOCIERRE;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION obtener_ano_cierre() OWNER TO postgres;


CREATE OR REPLACE FUNCTION obtener_mascara()
  RETURNS character varying AS
$BODY$
DECLARE
  TIRA VARCHAR(36);
  CONTADOR INTEGER;
  REG RECORD;
  MASCARA CURSOR IS SELECT NOMABR FROM CPNIVELES ORDER BY CONSEC;
BEGIN
  CONTADOR:=1;
  TIRA:='';

   OPEN MASCARA;
   FETCH MASCARA INTO REG;
   IF FOUND THEN
     LOOP
          IF CONTADOR = 1 THEN
              TIRA := TIRA || REG.NOMABR;
          ELSE
              TIRA := TIRA || '-' || REG.NOMABR;
          END IF;
          CONTADOR:=CONTADOR+1;
          FETCH MASCARA INTO REG;
          IF NOT FOUND THEN
             EXIT;
          END IF;
     END LOOP;
   END IF;
   CLOSE MASCARA;
   RETURN TIRA;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION obtener_mascara() OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".obtener_periodo(fecha date)
  RETURNS character varying AS
$BODY$
DECLARE
   FECHAINI DATE;
   FECHACIE DATE;
   PERIODO VARCHAR(2);
BEGIN
   SELECT
     INTO FECHAINI,
          FECHACIE
          FECINI,
          FECCIE
     FROM CPDEFNIV
    WHERE CODEMP = '001';

   SELECT INTO PERIODO PEREJE
     FROM CPPEREJE
    WHERE FECINI = FECHAINI AND
          FECCIE = FECHACIE AND
          FECHA >= FECDES AND
          FECHA <= FECHAS;
   RETURN PERIODO;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".obtener_periodo(date) OWNER TO postgres;


CREATE OR REPLACE FUNCTION antpub (tipo char, empleado varchar, fecha date, publica char) RETURNS integer AS
$body$
/* New function body */
DECLARE
   ANNO INTEGER;
   DIAS INTEGER;
   MESES INTEGER;
   ANNODEN INTEGER;
   DIASDEN INTEGER;
   MESESDEN INTEGER;
   ANNOPUB INTEGER;
   DIASPUB INTEGER;
   MESESPUB INTEGER;
   ANNOTOT INTEGER;
   DIASTOT INTEGER;
   MESESTOT INTEGER;
   FECHING DATE;
   STATUS VARCHAR;
BEGIN

   SELECT INTO FECHING,STATUS FECING,STAEMP
   FROM nphojint
   WHERE CODEMP=empleado;

   select
   INTO DIAS,MESES,ANNO coalesce(cuantotiempo(FECHING,fecha,'CD','0'),0),
   coalesce(cuantotiempo(FECHING,fecha,'CM','0'),0),
   coalesce(cuantotiempo(FECHING,fecha,'CY','0'),0)
   From Empresa;

   select
   INTO DIASDEN,MESESDEN,ANNODEN SUM(coalesce(cuantotiempo(A.FECING,A.FECEGR,'CD','0'),0)),
   SUM(coalesce(cuantotiempo(A.FECING,A.FECEGR,'CM','0'),0)),
   SUM(coalesce(cuantotiempo(A.FECING,A.FECEGR,'CY','0'),0))
   FROM NPHIINEG A,NPHOJINT B
   WHERE A.CodEmp = empleado
   AND A.CodEmp=B.CodEmp
   AND A.FecIng<B.FecIng;

   IF DIASDEN IS NULL THEN
        DIASDEN:=0;
   END IF;

   IF MESESDEN IS NULL THEN
        MESESDEN:=0;
   END IF;

   IF ANNODEN IS NULL THEN
        ANNODEN:=0;
   END IF;

   IF DIASDEN > 30 THEN
      MESESDEN:= MESESDEN + trunc(DIASDEN/30);
      DIASDEN:= DIASDEN - (trunc(DIASDEN/30)*30);
   END IF;

   If MESESDEN > 11 Then
       ANNODEN = ANNODEN + trunc(MESESDEN / 12);
       MESESDEN = MESESDEN - (trunc(MESESDEN / 12) * 12);
   End If;

   ANNO:=ANNO+ANNODEN;
   MESES:=MESES+MESESDEN;
   DIAS:=DIAS+DIASDEN;

   IF DIAS > 30 THEN
      MESES:= MESES + trunc(DIAS/30);
      DIAS:= DIAS - (trunc(DIAS/30)*30);
   END IF;

   If MESES > 11 Then
       ANNO = ANNO + trunc(MESES / 12);
       MESES = MESES - (trunc(MESES / 12) * 12);
   End If;

   IF DIAS >= 30 THEN
      DIAS:=0;
      IF MESES<11 THEN
         MESES:=MESES+1;
      ELSE
         MESES:=0;
         ANNO:=ANNO+1;
      END IF;
   END IF;
   IF MESES=12 THEN
      MESES:=0;
      ANNO:=ANNO+1;
   END IF;


   IF publica='S' THEN
    select
    INTO DIASPUB,MESESPUB,ANNOPUB SUM(coalesce(cuantotiempo(FECINI,FECTER,'CD','0'),0)),
    SUM(coalesce(cuantotiempo(FECINI,FECTER,'CM','0'),0)),
    SUM(coalesce(cuantotiempo(FECINI,FECTER,'CY','0'),0))
    FROM NPEXPLAB WHERE CodEmp = empleado
    AND STACAR = 'F' AND TIPORG = 'Publico';

    IF DIASPUB IS NULL THEN
          DIASPUB:=0;
    END IF;

    IF MESESPUB IS NULL THEN
          MESESPUB:=0;
    END IF;

    IF ANNOPUB IS NULL THEN
          ANNOPUB:=0;
    END IF;
   ELSE
        DIASPUB:=0;
        MESESPUB:=0;
        ANNOPUB:=0;
   END IF;
   IF DIASPUB > 30 THEN
      MESESPUB:= MESESPUB + trunc(DIASPUB/30);
      DIASPUB:= DIASPUB - (trunc(DIASPUB/30)*30);
   END IF;

   If MESESPUB > 11 Then
       ANNOPUB = ANNOPUB + trunc(MESESPUB / 12);
       MESESPUB = MESESPUB - (trunc(MESESPUB / 12) * 12);
   End If;

   ANNOTOT:=ANNO+ANNOPUB;
   MESESTOT:=MESES+MESESPUB;
   DIASTOT:=DIAS+DIASPUB;

   IF DIASTOT > 30 THEN
      MESESTOT:= MESESTOT + trunc(DIASTOT/30);
      DIASTOT:= DIASTOT - (trunc(DIASTOT/30)*30);
   END IF;

   If MESESTOT > 11 Then
       ANNOTOT = ANNOTOT + trunc(MESESTOT / 12);
       MESESTOT = MESESTOT - (trunc(MESESTOT / 12) * 12);
   End If;

   IF DIASTOT >= 30 THEN
      DIASTOT:=0;
      IF MESESTOT<11 THEN
         MESESTOT:=MESESTOT+1;
      ELSE
         MESESTOT:=0;
         ANNOTOT:=ANNOTOT+1;
      END IF;
   END IF;
   IF MESESTOT=12 THEN
      MESESTOT:=0;
      ANNOTOT:=ANNOTOT+1;
   END IF;

   IF tipo='A' THEN
      RETURN ANNOTOT;
   ELSE
      IF tipo='M' THEN
         RETURN MESESTOT;
      ELSE
         RETURN DIASTOT;
      END IF;
   END IF;
END;
$body$
LANGUAGE 'plpgsql' VOLATILE CALLED ON NULL INPUT SECURITY INVOKER;


CREATE OR REPLACE FUNCTION add_months(date, numeric)
  RETURNS date AS
$BODY$
DECLARE
  feFecha ALIAS FOR $1;
  inMeses ALIAS FOR $2;
    feFechFin    DATE;
    sbIntervalo  INTERVAL;
    interval__units VARCHAR;
BEGIN
  interval__units := 'month';
  sbIntervalo := ('''' || inMeses || ' ' ||
interval__units || '''')::INTERVAL;
  SELECT feFecha + sbIntervalo  into feFechFin;
  RETURN feFechFin;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION add_months(date, numeric) OWNER TO postgres;



CREATE OR REPLACE FUNCTION calculopres(codigo character varying, fecha character varying, capitalizacion bpchar)
  RETURNS SETOF regprestaciones AS
$BODY$
DECLARE
recordSalida REGPRESTACIONES%ROWTYPE;
capital numeric;
tasa numeric;
interesacum numeric;
BEGIN
capital:=0;
interesacum:=0;
for recordSalida in
EXECUTE 'SELECT A.CODEMP::VARCHAR,A.NOMEMP::VARCHAR,
A.CODTIPCON::VARCHAR,A.FECING::DATE,A.FECINI::DATE,A.FECFIN::DATE,
A.MONTO::NUMERIC,A.MONDIA::NUMERIC,
(CASE WHEN A.DIAS<>5 THEN
(SELECT ROUND(AVG(MONDIA),2) FROM NPPRESTACIONES
 WHERE CODEMP='''||codigo||'''
 AND ID<=A.ID
 AND ID>=A.ID-11)
ELSE
0
END)::NUMERIC AS MONDIAPRO,
A.DIAS::INTEGER,A.MONPRES+((CASE WHEN A.DIAS<>5 THEN
                  (SELECT ROUND(AVG(MONDIA),2) FROM NPPRESTACIONES
                   WHERE CODEMP='''||codigo||'''
                   AND ID<=A.ID
                   AND ID>=A.ID-11)
                 ELSE
                   0
                 END)*(A.DIAS-5))::NUMERIC AS MONPRES,
(SELECT COALESCE(SUM(MONANT),0) FROM NPANTPRE
 WHERE CODEMP='''||codigo||'''
 AND TO_CHAR(FECANT,''MM/YYYY'')=TO_CHAR(A.FECFIN,''MM/YYYY''))::NUMERIC AS MONANT,
A.ID::INTEGER,''DEPOSITADOS''::VARCHAR AS TIPO,0::NUMERIC AS CAPITAL,
0::NUMERIC AS CAPITALACT,0::NUMERIC AS TASA,0::NUMERIC AS MONINT,0::NUMERIC AS INTACU,
0::NUMERIC AS MONADEINT,A.ANNOANTIG::NUMERIC AS ANTANNOS,
A.MESANTIG::NUMERIC AS ANTMESES,A.DIAANTIG::NUMERIC AS ANTDIAS
FROM NPPRESTACIONES A
where A.CODEMP='''||codigo||'''
AND A.FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY'')
UNION ALL
SELECT A.CODEMP::VARCHAR,A.NOMEMP::VARCHAR,A.CODTIPCON::VARCHAR,
A.FECING::DATE,A.FECINI::DATE,A.FECFIN::DATE,
(CASE WHEN A.ALICUOCON<>0 THEN A.MONTO
 ELSE A.SALNOR END)::NUMERIC AS MONTO,
(CASE WHEN A.ALICUOCON<>0 THEN A.MONDIA
 ELSE ROUND(A.SALNOR/30,2) END)::NUMERIC AS MONDIA,0::NUMERIC AS MONDIAPRO,
COALESCE((CASE WHEN A.ANNOANTIG>0 THEN
      (CASE WHEN A.MESANTIG>=6 AND A.DIAANTIG>0
       THEN 60-(SELECT COALESCE(SUM(5),0)
                FROM NPPRESTACIONES
                WHERE CODEMP='''||codigo||'''
                AND FECINI > (CASE WHEN TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                                 SUBSTR('''||fecha||''',7),''DD/MM/YYYY'')<=
                                         TO_DATE('''||fecha||''',''DD/MM/YYYY'')
                               THEN (CASE WHEN TO_CHAR(FECING,''MM'')=SUBSTR('''||fecha||''',4,2)
                                     THEN
                                          TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                          TO_CHAR(TO_NUMBER(SUBSTR('''||fecha||''',7),''9999'')-1,''9999''),''DD/MM/YYYY'')
                                     ELSE TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                          SUBSTR('''||fecha||''',7),''DD/MM/YYYY'')
                                     END)
                               ELSE TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                            TO_CHAR(TO_NUMBER(SUBSTR('''||fecha||''',7),''9999'')-1,''9999''),''DD/MM/YYYY'')
                               END)
                AND FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY''))
       ELSE 0 END)
 ELSE (CASE WHEN A.MESANTIG>=6 AND A.DIAANTIG>0
       THEN 45-(SELECT COALESCE(SUM(5),0)
                FROM NPPRESTACIONES
                WHERE CODEMP='''||codigo||'''
                AND FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY''))
       WHEN (A.MESANTIG=6 AND A.DIAANTIG=0) OR
            A.MESANTIG<6
       THEN 15-(SELECT COALESCE(SUM(5),0)
                FROM NPPRESTACIONES
                WHERE CODEMP='''||codigo||'''
                AND FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY'')) END) END),0)::INTEGER AS DIAS,
 (CASE WHEN A.ANNOANTIG>0 THEN
      (CASE WHEN A.MESANTIG>=6
       THEN 60-(SELECT COALESCE(SUM(5),0)
                FROM NPPRESTACIONES
                WHERE CODEMP='''||codigo||'''
                AND FECINI > (CASE WHEN TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                                 SUBSTR('''||fecha||''',7),''DD/MM/YYYY'')<=
                                         TO_DATE('''||fecha||''',''DD/MM/YYYY'')
                               THEN (CASE WHEN TO_CHAR(FECING,''MM'')=SUBSTR('''||fecha||''',4,2)
                                     THEN
                                          TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                          TO_CHAR(TO_NUMBER(SUBSTR('''||fecha||''',7),''9999'')-1,''9999''),''DD/MM/YYYY'')
                                     ELSE TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                          SUBSTR('''||fecha||''',7),''DD/MM/YYYY'')
                                     END)
                               ELSE TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                            TO_CHAR(TO_NUMBER(SUBSTR('''||fecha||''',7),''9999'')-1,''9999''),''DD/MM/YYYY'')
                               END)
                AND FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY''))
       ELSE 0 END)
 ELSE (CASE WHEN A.MESANTIG>=6 AND A.DIAANTIG>0
       THEN 45-(SELECT COALESCE(SUM(5),0)
                FROM NPPRESTACIONES
                WHERE CODEMP='''||codigo||'''
                AND FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY''))
       WHEN (A.MESANTIG=6 AND A.DIAANTIG=0) OR
            A.MESANTIG<6
       THEN 15-(SELECT SUM(5)
                FROM NPPRESTACIONES
                WHERE CODEMP='''||codigo||'''
                AND FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY'')) END) END)*
                (CASE WHEN A.ALICUOCON<>0 THEN A.MONDIA
                 ELSE ROUND(A.SALNOR/30,2) END)::NUMERIC AS MONPRES,
0::NUMERIC AS MONANT,
A.ID+1::INTEGER AS ID,''AJUSTE DIAS NO DEPOSITADOS''::VARCHAR AS TIPO,
0::NUMERIC AS CAPITAL,0::NUMERIC AS CAPITALACT,
0::NUMERIC AS TASA,0::NUMERIC AS MONINT,0::NUMERIC AS INTACU,
0::NUMERIC AS MONADEINT,A.ANNOANTIG::NUMERIC AS ANTANNOS,
A.MESANTIG::NUMERIC AS ANTMESES,A.DIAANTIG::NUMERIC AS ANTDIAS
FROM NPPRESTACIONES A
where A.CODEMP='''||codigo||'''
AND A.ID = (SELECT MAX(ID) FROM NPPRESTACIONES
          WHERE CODEMP='''||codigo||'''
          AND FECFIN<=TO_DATE('''||fecha||''',''DD/MM/YYYY''))
UNION ALL
SELECT A.CODEMP::VARCHAR,A.NOMEMP::VARCHAR,A.CODTIPCON::VARCHAR,
A.FECING::DATE,A.FECINI::DATE,A.FECFIN::DATE,
A.MONTO::NUMERIC,A.MONDIA::NUMERIC,
COALESCE((SELECT ROUND(AVG(MONDIA),2) FROM NPPRESTACIONES
 WHERE CODEMP='''||codigo||'''
 AND FECINI > (CASE WHEN TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                  SUBSTR('''||fecha||''',7),''DD/MM/YYYY'')<=
                          TO_DATE('''||fecha||''',''DD/MM/YYYY'')
                THEN TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                             SUBSTR('''||fecha||''',7),''DD/MM/YYYY'')
                ELSE TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                             TO_CHAR(TO_NUMBER(SUBSTR('''||fecha||''',7),''9999'')-1,''9999''),''DD/MM/YYYY'')
                END)
AND FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY'')),0)::NUMERIC AS MONDIAPRO,
(CASE WHEN (A.ANNOANTIG>=1 AND A.MESANTIG=6 AND A.DIAANTIG>0) OR
           (A.ANNOANTIG>=1 AND A.MESANTIG>6) THEN
     A.ANNOANTIG*2
 ELSE
    0
 END)::INTEGER AS DIAS,
COALESCE((SELECT ROUND(AVG(MONDIA),2) FROM NPPRESTACIONES
 WHERE CODEMP='''||codigo||'''
 AND FECINI > (CASE WHEN TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                                  SUBSTR('''||fecha||''',7),''DD/MM/YYYY'')<=
                          TO_DATE('''||fecha||''',''DD/MM/YYYY'')
                THEN TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                             SUBSTR('''||fecha||''',7),''DD/MM/YYYY'')
                ELSE TO_DATE(TO_CHAR(FECING,''DD/MM/'')||
                             TO_CHAR(TO_NUMBER(SUBSTR('''||fecha||''',7),''9999'')-1,''9999''),''DD/MM/YYYY'')
                END)
AND FECFIN <= TO_DATE('''||fecha||''',''DD/MM/YYYY'')) *
(CASE WHEN (A.ANNOANTIG>=1 AND A.MESANTIG=6 AND A.DIAANTIG>0) OR
           (A.ANNOANTIG>=1 AND A.MESANTIG>6) THEN
     A.ANNOANTIG*2
 ELSE
    0
 END),0)::NUMERIC  AS MONPRES,
0::NUMERIC AS MONANT,
A.ID+2::INTEGER AS ID,''AJUSTE DIAS ADICIONALES NO DEPOSITADOS''::VARCHAR AS TIPO,
0::NUMERIC AS CAPITAL,0::NUMERIC AS CAPITALACT,
0::NUMERIC AS TASA,0::NUMERIC AS MONINT,0::NUMERIC AS INTACU,
0::NUMERIC AS MONADEINT,A.ANNOANTIG::NUMERIC AS ANTANNOS,
A.MESANTIG::NUMERIC AS ANTMESES,A.DIAANTIG::NUMERIC AS ANTDIAS
FROM NPPRESTACIONES A
where A.CODEMP='''||codigo||'''
AND A.ID = (SELECT MAX(ID) FROM NPPRESTACIONES
          WHERE CODEMP='''||codigo||'''
          AND FECFIN<=TO_DATE('''||fecha||''',''DD/MM/YYYY''))
order by FECINI,ID'

loop
  SELECT INTO tasa COALESCE(TASINTPRO,0)
  FROM NPINTFECREF
  WHERE FECINIREF<=recordSalida.fecini
  AND FECFINREF>=recordSalida.fecfin;
  IF tasa IS NULL THEN
     tasa:=0;
  END IF;
  IF  capitalizacion='A' THEN
     IF TO_CHAR(recordSalida.fecing,'MM')=TO_CHAR(recordSalida.fecfin,'MM')
        AND recordSalida.antannos>=1 THEN
        capital:=capital+recordSalida.monpres-recordSalida.monant+interesacum;
        interesacum:=0;
     ELSE
        capital:=capital+recordSalida.monpres-recordSalida.monant;
     END IF;
  ELSE
     IF capitalizacion='M' THEN
        capital:=capital+recordSalida.monpres-recordSalida.monant+interesacum;
        interesacum:=0;
     ELSE
        capital:=capital+recordSalida.monpres-recordSalida.monant;
     END IF;
  END IF;
  recordSalida.capital:=capital-recordSalida.monpres+recordSalida.monant;
  recordSalida.tasa:=tasa;
  IF recordSalida.tipo='DEPOSITADOS' THEN
     recordSalida.monint:=round((recordSalida.capital* (tasa/100) / 12 /30 * 30),2);
  ELSE
     recordSalida.monint:=0;
  END IF;
  interesacum:=interesacum+recordSalida.monint-recordSalida.monadeint;
  recordSalida.intacu=interesacum;
  recordSalida.capitalact:=capital;
  return next recordSalida;
end loop;

return;


END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION calculopres(character varying, character varying, bpchar) OWNER TO postgres;




CREATE OR REPLACE FUNCTION "SIMA002".months_between(date, date)
  RETURNS integer AS
$BODY$
/* New function body */
DECLARE
       mes INTEGER;
       mes1 INTEGER;
       mes2 INTEGER;
       ano INTEGER;
       ano1 INTEGER;
       ano2 INTEGER;
begin
     mes=extract(month from (age($1,$2)));
     ano=extract(year from (age($1,$2)));

     mes1=abs((ano*12) + mes);
     return mes1;

end
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".months_between(date, date) OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".saldoctareal(tipo character varying, cta character varying, periodo character varying)
  RETURNS numeric AS
$BODY$
DECLARE
SALDO NUMERIC(14,2);
monto NUMERIC(14,2);
FEC1 VARCHAR(2);
FEC2 VARCHAR(2);
ANOS VARCHAR(4);
FECHAINICIAL VARCHAR(2);
FECHACIERRE VARCHAR(2);
ANO VARCHAR(4);

BEGIN
IF tipo = 'C' THEN
   SELECT sum(salprgper) into monto from "SIMA002".contabb1  where codcta = cta and pereje = '12';
   SALDO = monto;

END IF;

--VERIFICAR EL CAMPO MONING SI ES EL CORRECTO
IF tipo = 'I' THEN
  SELECT sum(moning) into monto from "SIMA002".ciimping a where refing like cta||'%';
  SALDO = monto;

END IF;
IF tipo = 'P' THEN
   SELECT INTO
      FECHAINICIAL, FECHACIERRE, ANO
      TO_CHAR(FECINI,'MM'),
      TO_CHAR(FECCIE,'MM'),
      TO_CHAR(FECINI,'YYYY')
   FROM
      "SIMA002".CPDEFNIV;

   IF periodo = '00' THEN
  FEC1 := FECHAINICIAL;
  FEC2 := FECHACIERRE;
  ANOS := ANO;
   ELSE
  FEC1 := periodo;  --//MM
  FEC2 := periodo; -- //MM
  ANOS := ANO;
   END IF;

    select
     coalesce("SIMA002".obtener_ejecucion(cta||'%',FEC1,FEC2,ANOS ,'COM'),0) into monto FROM
    "SIMA002".empresa;

   SALDO = monto;

END IF;

RETURN SALDO;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".saldoctareal(character varying, character varying, character varying) OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".saldocta(tipo character varying, cta character varying, periodo character varying)
  RETURNS numeric AS
$BODY$
DECLARE
SALDO NUMERIC(14,2);
monto NUMERIC(14,2);

BEGIN

 IF tipo = 'C' THEN
   IF periodo = '00' THEN
  SELECT sum(salprgper) into monto from "SIMA002".contabb1  where codcta = cta;
   ELSE
  SELECT sum(salprgper) into monto from "SIMA002".contabb1  where codcta = cta and pereje = periodo;
   END IF;

   SALDO = monto;

  ELSEIF tipo = 'I' THEN
  SELECT sum(monasi) into monto from "SIMA002".ciasiini a where codpre like cta||'%' and perpre = periodo;
  SALDO = monto;

 ELSEIF tipo = 'P' THEN
   SELECT sum(monasi) into monto from "SIMA002".cpasiini where codpre like cta||'%' and perpre = periodo;
   SALDO = monto;

 END IF;

RETURN SALDO;

END;

$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".saldocta(character varying, character varying, character varying) OWNER TO postgres;


CREATE OR REPLACE FUNCTION diashab(codnom varchar,fecini date,fecfin date)
  RETURNS integer AS
$BODY$
/* New function body */
DECLARE
   DIAS INTEGER;
   FECACT DATE;
   DIAHABIL VARCHAR;
BEGIN
   DIAS=0;
   FECACT:=fecini;
   LOOP

     SELECT INTO DIAHABIL
     (CASE WHEN TO_CHAR(FECACT,'d')='1' THEN coalesce(domingo,'N')
           WHEN TO_CHAR(FECACT,'d')='2' THEN coalesce(lunes,'N')
           WHEN TO_CHAR(FECACT,'d')='3' THEN coalesce(martes,'N')
           WHEN TO_CHAR(FECACT,'d')='4' THEN coalesce(miercoles,'N')
           WHEN TO_CHAR(FECACT,'d')='5' THEN coalesce(jueves,'N')
           WHEN TO_CHAR(FECACT,'d')='6' THEN coalesce(viernes,'N')
           WHEN TO_CHAR(FECACT,'d')='7' THEN coalesce(sabado,'N')
      END)
      FROM NPVACJORLAB  LEFT OUTER JOIN NPVACDIAFER
                       ON TO_NUMBER(TO_CHAR(FECACT,'DD'),'99')=dia
                       AND TO_NUMBER(TO_CHAR(FECACT,'MM'),'99')=mes
      WHERE CODNOM=codnom
      AND dia IS NULL ;

     IF DIAHABIL='S' THEN
        DIAS=DIAS+1;
     END IF;
     FECACT:=FECACT+1;
     IF FECACT>fecfin THEN
        EXIT;
     END IF;
   END LOOP;
   RETURN DIAS;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;

  --26/02/2009
  CREATE OR REPLACE FUNCTION "SIMA002".reindexar(tabla text, campo text)
  RETURNS boolean AS
$BODY$
DECLARE
   registro RECORD;
   indice NUMERIC;
   textoq TEXT;
BEGIN
   indice:=1;
   FOR registro IN EXECUTE 'SELECT '|| campo ||' as campo,id FROM  '|| tabla || ' ORDER BY  '|| campo
   LOOP
        textoq:= 'update  '|| tabla ||'  set id='||indice||' where '|| campo ||'='''||registro.campo||'''';
        EXECUTE textoq;
        indice:=indice+1;
   END LOOP;
   textoq:='ALTER SEQUENCE '|| tabla ||'_seq
   INCREMENT 1  MINVALUE 1
   MAXVALUE 9223372036854775807  RESTART '|| indice ||
   ' CACHE 1  NO CYCLE;';
   EXECUTE textoq;
   RETURN true;
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE STRICT;
ALTER FUNCTION "SIMA002".reindexar(text, text) OWNER TO postgres;



CREATE OR REPLACE FUNCTION "SIMA002".pc_chartoint(chartoconvert character varying)
  RETURNS integer AS
$BODY$
SELECT CASE WHEN trim($1) SIMILAR TO '[0-9]+'
        THEN CAST(trim($1) AS integer)
    ELSE NULL END;

$BODY$
  LANGUAGE 'sql' IMMUTABLE STRICT;

