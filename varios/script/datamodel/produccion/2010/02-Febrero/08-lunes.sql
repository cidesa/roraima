--Carlos Ramirez
--Funcion para el calculo de cestatickets
CREATE OR REPLACE FUNCTION diaslaborados(codnom character varying, jornada character varying, fecini date, fecfin date, idejor character varying)
  RETURNS integer AS
$BODY$
/* New function body */
DECLARE
   DIAS INTEGER;
   FECACT DATE;
   DIALAB VARCHAR;
BEGIN
   DIAS=0;
   FECACT:=fecini;
   LOOP

     SELECT INTO DIALAB
     (CASE WHEN TO_CHAR(FECACT,'d')='1' THEN coalesce(domingo,'N')
           WHEN TO_CHAR(FECACT,'d')='2' THEN coalesce(lunes,'N')
           WHEN TO_CHAR(FECACT,'d')='3' THEN coalesce(martes,'N')
           WHEN TO_CHAR(FECACT,'d')='4' THEN coalesce(miercoles,'N')
           WHEN TO_CHAR(FECACT,'d')='5' THEN coalesce(jueves,'N')
           WHEN TO_CHAR(FECACT,'d')='6' THEN coalesce(viernes,'N')
           WHEN TO_CHAR(FECACT,'d')='7' THEN coalesce(sabado,'N')
      END)
      FROM NPDEFJORLAB  LEFT OUTER JOIN NPVACDIAFER ON
            CASE WHEN jornada='S' THEN TO_NUMBER(TO_CHAR(FECACT,'DD'),'99') ELSE 0 END=dia AND
            CASE WHEN jornada='S' THEN TO_NUMBER(TO_CHAR(FECACT,'MM'),'99') ELSE 0 END=mes
      WHERE CODNOM=codnom AND IDEJOR=idejor AND 
      dia IS NULL;

     IF DIALAB='S' THEN
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
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION diaslaborados(character varying,character varying , date, date, character varying) OWNER TO postgres;
