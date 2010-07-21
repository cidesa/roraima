set search_path to "SIMA003";

-- View: "SIMA002".npanos

-- DROP VIEW "SIMA002".npanos;

CREATE OR REPLACE VIEW NPANOS AS
(select ano::numeric from generate_series(1970,to_number(to_char(now(),'yyyy'),'9999')::integer+1) as ano);



--Drop table Nppartidas;

CREATE OR REPLACE VIEW nppartidas AS
 SELECT substr(a.codpre::text, b.longitud::integer) AS codpar, max(a.nompre::text) AS nompar, max(a.id) AS id
   FROM  cpdeftit a, ( SELECT sum(cpniveles.lonniv + 1::numeric) + 1::numeric AS longitud
           FROM  cpniveles
          WHERE cpniveles.catpar::text = 'C'::text) b, ( SELECT sum(cpniveles.lonniv + 1::numeric) - 1::numeric AS longtot
           FROM  cpniveles) c
  WHERE length(rtrim(a.codpre::text))::numeric = c.longtot
  GROUP BY substr(a.codpre::text, b.longitud::integer);


--drop table npcatpre;

create or replace view npcatpre as
(select substr(a.codpre,1,b.longitud::integer) as codcat,max(nompre) as nomcat, a.id as id
from cpdeftit a,
(select sum(lonniv+1)-1 as longitud from cpniveles where catpar='C') b
where length(rtrim(a.codpre))<=b.longitud
group by substr(a.codpre,1,b.longitud::integer),a.id);


--drop table cpcategoria;
create or replace view cpcategoria as
(select substr(a.codpre,1,b.longitud::integer) as codcat,max(nompre) as nomcat, a.id as id
from cpdeftit a,
(select sum(lonniv+1)-1 as longitud from cpniveles where catpar='C') b
where length(rtrim(a.codpre))=b.longitud
group by substr(a.codpre,1,b.longitud::integer),a.id);







CREATE OR REPLACE VIEW NPPRESTACIONES AS
(SELECT A.CODEMP,A.NOMEMP,A.FECING,A.FECINI,A.FECFIN,
A.MONTO,A.SALNOR,
ROUND(A.MONTO/30,2) +
(COALESCE((CASE WHEN C.ALICUOCON=0 THEN 0
 ELSE (SELECT COALESCE(DIAUTI,0)
        FROM NPBONOCONT
        WHERE ANOVIG<=A.FECINI
        AND ANOVIGHAS>=A.FECFIN
        AND CODTIPCON=A.CODTIPCON
        AND DESDE<=(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)
        AND HASTA>=(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END))
  END),0)/30/12)*ROUND(A.MONTO/30,2) +
 (COALESCE((CASE WHEN C.ALICUOCON=0 THEN 0
 ELSE (SELECT COALESCE(DIAVAC,0)
        FROM NPBONOCONT
        WHERE ANOVIG<=A.FECINI
        AND ANOVIGHAS>=A.FECFIN
        AND CODTIPCON=A.CODTIPCON
        AND DESDE<=(CASE WHEN COALESCE(B.ANTAPVAC,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)
        AND HASTA>=(CASE WHEN COALESCE(B.ANTAPVAC,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END))
  END),0)/30/12)*ROUND(A.MONTO/30,2) AS MONDIA,
ROUND(A.SALNOR,2) +
(COALESCE((SELECT COALESCE(DIAUTI,0)
        FROM NPBONOCONT
        WHERE ANOVIG<=A.FECINI
        AND ANOVIGHAS>=A.FECFIN
        AND CODTIPCON=A.CODTIPCON
        AND DESDE<=(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)
        AND HASTA>=(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)),0)/12)*ROUND(A.SALNOR/30,2) +
 (COALESCE((SELECT COALESCE(DIAVAC,0)
        FROM NPBONOCONT
        WHERE ANOVIG<=A.FECINI
        AND ANOVIGHAS>=A.FECFIN
        AND CODTIPCON=A.CODTIPCON
        AND DESDE<=(CASE WHEN COALESCE(B.ANTAPVAC,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)
        AND HASTA>=(CASE WHEN COALESCE(B.ANTAPVAC,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)),0)/12)*ROUND(A.SALNOR/30,2) AS SALINT,
A.CODTIPCON,
(CASE WHEN TO_CHAR(A.FECING,'MM')=TO_CHAR(A.FECFIN,'MM')
 AND (CASE WHEN B.ANTAP='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END) >=2
 THEN 5+(CASE WHEN (((CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)-1)*2)<=30
         THEN (((CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)-1)*2)
         ELSE
         30
         END)
 ELSE
 5
 END) AS DIAS,
 5*(ROUND(A.MONTO/30,2) +
(COALESCE((CASE WHEN C.ALICUOCON=0 THEN 0
 ELSE (SELECT COALESCE(DIAUTI,0)
        FROM NPBONOCONT
        WHERE ANOVIG<=A.FECINI
        AND ANOVIGHAS>=A.FECFIN
        AND CODTIPCON=A.CODTIPCON
        AND DESDE<=(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)
        AND HASTA>=(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END))
  END),0)/30/12)*ROUND(A.MONTO/30,2) +
 (COALESCE((CASE WHEN C.ALICUOCON=0 THEN 0
 ELSE (SELECT COALESCE(DIAVAC,0)
        FROM NPBONOCONT
        WHERE ANOVIG<=A.FECINI
        AND ANOVIGHAS>=A.FECFIN
        AND CODTIPCON=A.CODTIPCON
        AND DESDE<=(CASE WHEN COALESCE(B.ANTAPVAC,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)
        AND HASTA>=(CASE WHEN COALESCE(B.ANTAPVAC,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END))
  END),0)/30/12)*ROUND(A.MONTO/30,2)) AS MONPRES,
 B.ANTAP,B.ANTAPVAC,C.ALICUOCON,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END) AS ANNOANTIG,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.MESANTIG ELSE A.MESANTIGPUB END) AS MESANTIG,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.DIAANTIG ELSE A.DIAANTIGPUB END) AS DIAANTIG,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIGTOT ELSE A.ANNOANTIGPUBTOT END) AS ANNOANTIGTOT,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.MESANTIGTOT ELSE A.MESANTIGPUBTOT END) AS MESANTIGTOT,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.DIAANTIGTOT ELSE A.DIAANTIGPUBTOT END) AS DIAANTIGTOT,
A.ID
FROM
(SELECT A.CODEMP,A.NOMEMP,
antpub('A',A.CODEMP,B.FECFIN,'S') AS ANNOANTIGPUB,
antpub('A',A.CODEMP,B.FECFIN,'N') AS ANNOANTIG,
antpub('M',A.CODEMP,B.FECFIN,'S') AS MESANTIGPUB,
antpub('M',A.CODEMP,B.FECFIN,'N') AS MESANTIG,
antpub('D',A.CODEMP,B.FECFIN,'S') AS DIAANTIGPUB,
antpub('D',A.CODEMP,B.FECFIN,'N') AS DIAANTIG,
antpub('A',A.CODEMP,COALESCE(A.FECRET,B.FECFIN),'S') AS ANNOANTIGPUBTOT,
antpub('A',A.CODEMP,COALESCE(A.FECRET,B.FECFIN),'N') AS ANNOANTIGTOT,
antpub('M',A.CODEMP,COALESCE(A.FECRET,B.FECFIN),'S') AS MESANTIGPUBTOT,
antpub('M',A.CODEMP,COALESCE(A.FECRET,B.FECFIN),'N') AS MESANTIGTOT,
antpub('D',A.CODEMP,COALESCE(A.FECRET,B.FECFIN),'S') AS DIAANTIGPUBTOT,
antpub('D',A.CODEMP,COALESCE(A.FECRET,B.FECFIN),'N') AS DIAANTIGTOT,
A.FECING,
B.FECINI,
B.FECFIN,
COALESCE((CASE WHEN (SELECT SUM(MONASI)
           FROM NPSALINT
           WHERE CODEMP=A.CODEMP
           AND FECINICON=B.FECINI
           AND FECFINCON=B.FECFIN) IS NOT NULL THEN
           (SELECT SUM(MONASI)
           FROM NPSALINT
           WHERE CODEMP=A.CODEMP
           AND FECINICON=B.FECINI
           AND FECFINCON=B.FECFIN)
           ELSE
           (SELECT SUM(CASE WHEN W.OPECON='A' THEN X.MONTO ELSE X.MONTO*-1 END)
           FROM NPHISCON X,NPASIEMPCONT Y,NPCONASI Z,NPDEFCPT W
           WHERE X.CODEMP=A.CODEMP
           AND X.FECNOM>=B.FECINI
           AND X.FECNOM<=B.FECFIN
           AND Y.CODEMP=X.CODEMP
           AND Y.CODNOM=X.CODNOM
           AND Z.CODCON=Y.CODTIPCON
           AND X.CODCON=Z.CODCPT
           AND X.CODCON=W.CODCON) END),0) AS MONTO,
COALESCE((CASE WHEN (SELECT SUM(X.MONASI)
           FROM NPSALINT X,NPASIPRE Y
           WHERE X.CODEMP=A.CODEMP
           AND Y.CODCON=X.CODCON
           AND Y.TIPASI='S'
           AND X.CODASI=Y.CODASI
           AND X.FECINICON=B.FECINI
           AND X.FECFINCON=B.FECFIN) IS NOT NULL THEN
           (SELECT SUM(X.MONASI)
           FROM NPSALINT X,NPASIPRE Y
           WHERE X.CODEMP=A.CODEMP
           AND Y.CODCON=X.CODCON
           AND Y.TIPASI='S'
           AND X.CODASI=Y.CODASI
           AND X.FECINICON=B.FECINI
           AND X.FECFINCON=B.FECFIN)
           ELSE
           (SELECT SUM(CASE WHEN W.OPECON='A' THEN X.MONTO ELSE X.MONTO*-1 END)
           FROM NPHISCON X,NPASIEMPCONT Y,NPCONASI Z,NPDEFCPT W,NPASIPRE V
           WHERE X.CODEMP=A.CODEMP
           AND X.FECNOM>=B.FECINI
           AND X.FECNOM<=B.FECFIN
           AND Y.CODEMP=X.CODEMP
           AND Y.CODNOM=X.CODNOM
           AND X.FECNOM>=Y.FECDES
           AND X.FECNOM<=Y.FECHAS
           AND Y.CODTIPCON=V.CODCON
           AND V.TIPASI='S'
           AND Z.CODASI=V.CODASI
           AND Z.CODCON=Y.CODTIPCON
           AND X.CODCON=Z.CODCPT
           AND X.CODCON=W.CODCON) END),0) AS SALNOR,
(CASE WHEN (SELECT CODTIPCON FROM NPASIEMPCONT
            WHERE CODEMP=A.CODEMP
            AND FECDES<=B.FECFIN
            AND FECHAS>=B.FECFIN) IS NOT NULL THEN
            (SELECT CODTIPCON FROM NPASIEMPCONT
            WHERE CODEMP=A.CODEMP
            AND FECDES<=B.FECFIN
            AND FECHAS>=B.FECFIN)
            ELSE
	      (CASE WHEN (SELECT SUM(MONASI)
           		  FROM NPSALINT
           		  WHERE CODEMP=A.CODEMP
           		  AND CODASI='001'
           		  AND FECINICON=B.FECINI
           		  AND FECFINCON=B.FECFIN) IS NOT NULL THEN
            		  (SELECT CODCON
             		   FROM NPSALINT
             		   WHERE CODEMP=A.CODEMP
             		   AND FECINICON>=B.FECINI
             		   AND FECFINCON<=B.FECFIN
             		   AND CODASI='001')
                       ELSE
			     (CASE WHEN (SELECT MAX(Y.CODTIPCON)
				        FROM NPHISCON X,NPASIEMPCONT Y
				        WHERE X.CODEMP=A.CODEMP
				        AND X.FECNOM>=B.FECINI
				        AND X.FECNOM<=B.FECFIN
				        AND Y.CODEMP=X.CODEMP
				        AND Y.CODNOM=X.CODNOM) IS NOT NULL THEN
				        (SELECT MAX(Y.CODTIPCON)
				        FROM NPHISCON X,NPASIEMPCONT Y
				        WHERE X.CODEMP=A.CODEMP
				        AND X.FECNOM>=B.FECINI
				        AND X.FECNOM<=B.FECFIN
				        AND Y.CODEMP=X.CODEMP
				        AND Y.CODNOM=X.CODNOM)
			      ELSE
				  (SELECT CODTIPCON FROM NPASIEMPCONT
				  WHERE CODEMP=A.CODEMP
				  AND FECCAL=(SELECT MAX(FECCAL) FROM NPASIEMPCONT WHERE CODEMP=A.CODEMP))
			      END)
			   END) END) AS CODTIPCON,
B.ID
FROM NPHOJINT A,
  (select
   add_months((select to_date('01/01/'||to_char(min(ano),'9999'),'dd/mm/yyyy') from npanos),id-1) as fecini,
   last_day(add_months((select to_date('01/01/'||to_char(min(ano),'9999'),'dd/mm/yyyy') from npanos),id-1)) as fecfin,
   id
   from generate_series(1,(SELECT count(*)
			   FROM npanos a,
			  (select '01/'||lpad(trim(to_char(fecdes,'99')),2,'0') as fecdes
			  from generate_series(1,12) as fecdes) b)) as id
   order by id) B
 WHERE  B.FECFIN>=(CASE WHEN TO_CHAR(A.FECING,'DD')>'01' THEN ADD_MONTHS(A.FECING,4)
                  ELSE ADD_MONTHS(A.FECING,4)-1 END)
 AND B.FECINI>COALESCE(A.FECCORACU,A.FECING)
 AND B.FECFIN<=(SELECT COALESCE(MAX(FECFINCON),NOW()) FROM NPSALINT WHERE CODEMP=A.CODEMP)) A LEFT OUTER JOIN
                       (SELECT ANOVIG,ANOVIGHAS,CODTIPCON,MAX(ANTAP) AS ANTAP,
                        MAX(ANTAPVAC) AS ANTAPVAC
                        FROM NPBONOCONT B
                        GROUP BY ANOVIG,ANOVIGHAS,CODTIPCON) B ON
                        A.FECINI>=B.ANOVIG
                        AND A.FECFIN<=B.ANOVIGHAS
                        AND A.CODTIPCON=B.CODTIPCON,NPTIPCON C
WHERE A.CODTIPCON=C.CODTIPCON
AND A.FECINI>=C.FECINIREG)
ORDER BY A.CODEMP,A.FECFIN,A.ID;


CREATE OR REPLACE VIEW  npliqvacacion AS
 SELECT
        CASE
            WHEN sum(a.hist) = 0 THEN 'NO'::text
            ELSE 'SI'::text
        END AS historico, sum(a.antiguedad) AS antiguedad, a.desde, a.hasta, sum(a.disfrutados) AS disfrutados,
        CASE
            WHEN sum(a.hist) = 0 THEN sum(a.corresponde)
            ELSE sum(a.correspondehis)
        END AS corresponde, a.codemp, a.fecret, round(
        CASE
            WHEN
            CASE
                WHEN to_date(to_char(a.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= a.fecing THEN to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric
                ELSE to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text)
            END >= to_number(a.desde::text, '9999'::text) AND
            CASE
                WHEN to_date(to_char(a.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= a.fecing THEN to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric
                ELSE to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text)
            END < to_number(a.hasta::text, '9999'::text) THEN
            CASE
                WHEN (
                CASE
                    WHEN COALESCE(a.numdiames, 0) = 0 THEN
                    CASE
                        WHEN sum(a.hist) = 0 THEN sum( dcontinuos(a.corresponde,  obtenerjornada(a.codemp, a.antiguedad), a.codtipcon))
                        ELSE sum( dcontinuos(a.correspondehis,  obtenerjornada(a.codemp, a.antiguedad), a.codtipcon))
                    END / 12::numeric
                    ELSE a.numdiames::numeric
                END *  cuantotiempo(
                CASE
                    WHEN to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecret::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) > a.fecret THEN to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || (to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric)::text, 'DD/MM/YYYY'::text)
                    ELSE to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecret::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text)
                END, a.fecret, 'CM'::character varying, '0'::character varying)) <= COALESCE(a.numdiamaxano, 0)::numeric OR COALESCE(a.numdiames, 0) = 0 THEN
                CASE
                    WHEN COALESCE(a.numdiames, 0) = 0 THEN
                    CASE
                        WHEN sum(a.hist) = 0 THEN sum( dcontinuos(a.corresponde,  obtenerjornada(a.codemp, a.antiguedad), a.codtipcon))
                        ELSE sum( dcontinuos(a.correspondehis,  obtenerjornada(a.codemp, a.antiguedad), a.codtipcon))
                    END / 12::numeric
                    ELSE a.numdiames::numeric
                END *  cuantotiempo(
                CASE
                    WHEN to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecret::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) > a.fecret THEN to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || (to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric)::text, 'DD/MM/YYYY'::text)
                    ELSE to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecret::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text)
                END, a.fecret, 'CM'::character varying, '0'::character varying)
                ELSE COALESCE(a.numdiamaxano, 0)::numeric
            END
            ELSE 0::numeric
        END, 2) AS fracciondia, round(
        CASE
            WHEN
            CASE
                WHEN to_date(to_char(a.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= a.fecing THEN to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric
                ELSE to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text)
            END >= to_number(a.desde::text, '9999'::text) AND
            CASE
                WHEN to_date(to_char(a.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= a.fecing THEN to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric
                ELSE to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text)
            END < to_number(a.hasta::text, '9999'::text) THEN
            CASE
                WHEN COALESCE(a.numdiames, 0) = 0 THEN max(COALESCE(b.diavac, 0::numeric) / 12::numeric)
                ELSE 0::numeric
            END *  cuantotiempo(
            CASE
                WHEN to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecret::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) > a.fecret THEN to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || (to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric)::text, 'DD/MM/YYYY'::text)
                ELSE to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecret::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text)
            END, a.fecret, 'CM'::character varying, '0'::character varying)
            ELSE sum(a.bonopendiente)
        END, 2) AS fraccionbono,
        CASE
            WHEN
            CASE
                WHEN to_date(to_char(a.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= a.fecing THEN to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric
                ELSE to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text)
            END >= to_number(a.desde::text, '9999'::text) AND
            CASE
                WHEN to_date(to_char(a.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(a.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= a.fecing THEN to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric
                ELSE to_number(to_char(a.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text)
            END < to_number(a.hasta::text, '9999'::text) THEN 'SI'::text
            ELSE 'NO'::text
        END AS fraccion, a.codtipcon,
        CASE
            WHEN COALESCE(avg(d.monhis), 0::numeric) = 0::numeric THEN avg(c.monasi)
            ELSE avg(d.monhis)
        END AS salnor,
        CASE
            WHEN max(COALESCE(b.calinc, 'N'::character varying)::text) = 'N'::text THEN
            CASE
                WHEN COALESCE(avg(d.monhis), 0::numeric) = 0::numeric THEN avg(c.monasi)
                ELSE avg(d.monhis)
            END
            ELSE
            CASE
                WHEN COALESCE(avg(d.monhis), 0::numeric) = 0::numeric THEN avg(c.monasi)
                ELSE avg(d.monhis)
            END +
            CASE
                WHEN COALESCE(avg(d.monhisbv), 0::numeric) = 0::numeric THEN avg(c.monasi)
                ELSE avg(d.monhisbv)
            END / 30::numeric * round(max(COALESCE(b.diavac, 0::numeric) / 12::numeric), 2) +
            CASE
                WHEN COALESCE(avg(d.monhisbf), 0::numeric) = 0::numeric THEN avg(c.monasi)
                ELSE avg(d.monhisbf)
            END / 30::numeric * round(max(COALESCE(b.diauti, 0::numeric) / 12::numeric), 2)
        END AS salint, a.numdiames, a.numdiamaxano
   FROM ( SELECT 0 AS bonopendiente, 0 AS hist,  antpub2('A'::bpchar, c.codemp, to_date(to_char(c.fecret::timestamp with time zone, 'DD/MM/'::text) || (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 1::numeric)::character varying::text, 'dd/mm/yyyy'::text), 'S'::bpchar)::numeric AS antiguedad,
                CASE
                    WHEN to_date(to_char(c.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(c.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= c.fecing THEN (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano - 1::numeric) - 2::numeric)::character varying
                    ELSE (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano - 1::numeric) - 1::numeric)::character varying
                END AS desde,
                CASE
                    WHEN to_date(to_char(c.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(c.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= c.fecing THEN (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 2::numeric)::character varying
                    ELSE (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 1::numeric)::character varying
                END AS hasta, 0 AS disfrutados, a.diadis AS corresponde, 0 AS correspondehis, c.codemp, c.fecret, c.fecing, d.codtipcon, f.numdiames, f.numdiamaxano
           FROM  npvacdiadis a
      LEFT JOIN  npdefespparpre f ON a.codnom::text = f.codnom::text,  npanos b,  nphojint c,  npasinomcont d
     WHERE a.codnom::text = COALESCE(( SELECT npasiempcont.codnom
              FROM  npasiempcont
             WHERE npasiempcont.codemp::text = c.codemp::text AND npasiempcont.fecdes <= to_date(to_char(c.fecing::timestamp with time zone, 'DD/MM/'::text) ||
                   CASE
                       WHEN to_date(to_char(c.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(c.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= c.fecing THEN (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 2::numeric)::character varying
                       ELSE (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 1::numeric)::character varying
                   END::text, 'DD/MM/YYYY'::text) AND npasiempcont.fechas >= to_date(to_char(c.fecing::timestamp with time zone, 'DD/MM/'::text) ||
                   CASE
                       WHEN to_date(to_char(c.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(c.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) <= c.fecing THEN (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 2::numeric)::character varying
                       ELSE (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 1::numeric)::character varying
                   END::text, 'DD/MM/YYYY'::text)), (( SELECT max(nphiscon.codnom::text) AS max
              FROM  nphiscon
             WHERE nphiscon.codemp::text = c.codemp::text AND nphiscon.fecnom = (( SELECT max(nphiscon.fecnom) AS max
                      FROM  nphiscon
                     WHERE nphiscon.codemp::text = c.codemp::text AND to_char(nphiscon.fecnom::timestamp with time zone, 'YYYY'::text) = to_char(to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 1::numeric, '9999'::text)))))::character varying, COALESCE(( SELECT max(nphiscon.codnom::text) AS max
              FROM  nphiscon
             WHERE nphiscon.codemp::text = c.codemp::text AND nphiscon.fecnom = (( SELECT max(nphiscon.fecnom) AS max
                      FROM  nphiscon
                     WHERE nphiscon.codemp::text = c.codemp::text))))::character varying)::text AND b.ano >= to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) AND b.ano <=
           CASE
               WHEN to_date(to_char(c.fecret::timestamp with time zone, 'DD/MM/'::text) || to_char(c.fecing::timestamp with time zone, 'YYYY'::text), 'DD/MM/YYYY'::text) > c.fecing THEN to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text)
               ELSE to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) - 1::numeric
           END AND c.fecret IS NOT NULL AND  antpub2('A'::bpchar, c.codemp, to_date(to_char(c.fecret::timestamp with time zone, 'DD/MM/'::text) || (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 1::numeric)::character varying::text, 'dd/mm/yyyy'::text), 'S'::bpchar)::numeric >= a.rangodesde AND  antpub2('A'::bpchar, c.codemp, to_date(to_char(c.fecret::timestamp with time zone, 'DD/MM/'::text) || (to_number(to_char(c.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(c.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 1::numeric)::character varying::text, 'dd/mm/yyyy'::text), 'S'::bpchar)::numeric <= a.rangohasta AND a.codnom::text = d.codnom::text
UNION ALL
         SELECT c.diasbonovac - c.diasbonovacpag AS bonopendiente, 1 AS hist, 0 AS antiguedad, c.perini AS desde, c.perfin AS hasta, c.diasdisfrutados AS disfrutados, 0 AS corresponde, c.diasdisfutar AS correspondehis, d.codemp, d.fecret, d.fecing, e.codtipcon, f.numdiames, f.numdiamaxano
           FROM  npvacdiadis a
      LEFT JOIN  npdefespparpre f ON a.codnom::text = f.codnom::text,  npanos b,  npvacdisfrute c,  nphojint d,  npasinomcont e
     WHERE a.codnom::text = COALESCE(( SELECT npasiempcont.codnom
              FROM  npasiempcont
             WHERE npasiempcont.codemp::text = c.codemp::text AND npasiempcont.fecdes <= to_date(to_char(d.fecing::timestamp with time zone, 'DD/MM/'::text) || c.perfin::text, 'DD/MM/YYYY'::text) AND npasiempcont.fechas >= to_date(to_char(d.fecing::timestamp with time zone, 'DD/MM/'::text) || c.perfin::text, 'DD/MM/YYYY'::text)), (( SELECT max(nphiscon.codnom::text) AS max
              FROM  nphiscon
             WHERE nphiscon.codemp::text = c.codemp::text AND nphiscon.fecnom = (( SELECT max(nphiscon.fecnom) AS max
                      FROM  nphiscon
                     WHERE nphiscon.codemp::text = c.codemp::text AND to_char(nphiscon.fecnom::timestamp with time zone, 'YYYY'::text) = to_char(to_number(to_char(d.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric + (to_number(to_char(d.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) - 1::numeric, '9999'::text)))))::character varying, COALESCE(( SELECT max(nphiscon.codnom::text) AS max
              FROM  nphiscon
             WHERE nphiscon.codemp::text = c.codemp::text AND nphiscon.fecnom = (( SELECT max(nphiscon.fecnom) AS max
                      FROM  nphiscon
                     WHERE nphiscon.codemp::text = c.codemp::text))))::character varying)::text AND b.ano >= to_number(to_char(d.fecing::timestamp with time zone, 'YYYY'::text), '9999'::text) AND b.ano <= (to_number(to_char(d.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric) AND (to_number(to_char(d.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) >= a.rangodesde AND (to_number(to_char(d.fecret::timestamp with time zone, 'YYYY'::text), '9999'::text) + 1::numeric - b.ano) <= a.rangohasta AND c.perini::text = b.ano::character varying::text AND d.fecret IS NOT NULL AND c.codemp::text = d.codemp::text AND a.codnom::text = e.codnom::text) a
   LEFT JOIN  npbonocont b ON a.codtipcon::text = b.codtipcon::text AND a.antiguedad >= b.desde AND a.antiguedad <= b.hasta AND
   CASE
       WHEN to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || a.hasta::text, 'DD/MM/YYYY'::text) > a.fecret THEN a.fecret
       ELSE to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || a.hasta::text, 'DD/MM/YYYY'::text)
   END >= b.anovig AND
   CASE
       WHEN to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || a.hasta::text, 'DD/MM/YYYY'::text) > a.fecret THEN a.fecret
       ELSE to_date(to_char(a.fecing::timestamp with time zone, 'DD/MM/'::text) || a.hasta::text, 'DD/MM/YYYY'::text)
   END <= b.anovighas
   LEFT JOIN ( SELECT w.codemp, sum(
           CASE
               WHEN v.tipasi::text = 'S'::text THEN w.monasi
               ELSE 0::numeric
           END) AS monasi, sum(
           CASE
               WHEN v.afealibv::text = 'S'::text THEN w.monasi
               ELSE 0::numeric
           END) AS monbv, sum(
           CASE
               WHEN v.afealibf::text = 'S'::text THEN w.monasi
               ELSE 0::numeric
           END) AS monbf
      FROM  npsalint w,  npasipre v
     WHERE w.codcon::text = ((( SELECT npasiempcont.codtipcon
              FROM  npasiempcont
             WHERE npasiempcont.codemp::text = w.codemp::text AND npasiempcont.status::text = 'A'::text))::text) AND to_char(w.fecfincon::timestamp with time zone, 'mm/yyyy'::text) = (( SELECT to_char(max(npimppresoc.fecfin)::timestamp with time zone, 'mm/yyyy'::text) AS to_char
              FROM  npimppresoc
             WHERE npimppresoc.codemp::text = w.codemp::text AND npimppresoc.valart108 > 0::numeric AND npimppresoc.tipo::text = ''::text)) AND v.codcon::text = w.codcon::text AND w.codasi::text = v.codasi::text
     GROUP BY w.codemp) c ON a.codemp::text = c.codemp::text
   LEFT JOIN ( SELECT w.codemp, sum(
        CASE
            WHEN v.tipasi::text = 'S'::text THEN w.monto
            ELSE 0::numeric
        END) AS monhis, sum(
        CASE
            WHEN t.afealibv::text = 'S'::text THEN w.monto
            ELSE 0::numeric
        END) AS monhisbv, sum(
        CASE
            WHEN t.afealibf::text = 'S'::text THEN w.monto
            ELSE 0::numeric
        END) AS monhisbf
   FROM  nphiscon w,  npasipre v,  npconasi t,  npasinomcont r
  WHERE to_char(w.fecnom::timestamp with time zone, 'mm/yyyy'::text) = (( SELECT to_char(max(npimppresoc.fecfin)::timestamp with time zone, 'mm/yyyy'::text) AS to_char
           FROM  npimppresoc
          WHERE npimppresoc.codemp::text = w.codemp::text AND npimppresoc.valart108 > 0::numeric AND npimppresoc.tipo::text = ''::text)) AND v.codcon::text = ((( SELECT npasiempcont.codtipcon
           FROM  npasiempcont
          WHERE npasiempcont.codemp::text = w.codemp::text AND npasiempcont.status::text = 'A'::text))::text) AND v.tipasi::text = 'S'::text AND v.codcon::text = t.codcon::text AND v.codasi::text = t.codasi::text AND r.codtipcon::text = v.codcon::text AND w.codnom::text = r.codnom::text AND w.codcon::text = t.codcpt::text
  GROUP BY w.codemp) d ON a.codemp::text = d.codemp::text
  GROUP BY a.codemp, a.desde, a.hasta, a.fecret, a.fecing, a.codtipcon, a.numdiames, a.numdiamaxano
  ORDER BY a.codemp, a.desde;







--VISTA NPLIQUIDACION
create or replace view npliquidacion as
(select
  A.CODEMP as cedula,
  D.NOMEMP as Nombre,
  D.FECING as FechaIngreso,
  a.feccal as FechaCorte ,
  a.feccor as FechaEgreso,
  coalesce(a.anoser,0) as  AnoActual,
  coalesce(a.messer,0) as  MesActual,
  coalesce(a.diaser,0) as  DiasActual,
  coalesce(b.anoser,0) as  AnoAnterior,
  coalesce(b.messer,0) as  MesAnterior,
  coalesce(b.diaser,0) as  DiasAnterior,
  coalesce(a.anotra ,0) as  AnoEfectivo,
  coalesce(a.mestra ,0) as MesEfectivo,
  coalesce(a.diatra ,0) as DiasEfectivo,
  b.antacu as Monto666A,
  b.bontra as Monto666B ,
  a.antacu as Monto108,
  b.intacu as Int666A,
  a.intacu as Int108,
  max(c.intacum) as Int668,
  coalesce(A.ADEPRE,0) as Anticipos
 from (nppresoc a left outer join NPHOJINT D on (a.codemp=D.codemp))
 left outer join nppresocant b on (a.codemp=b.codemp)
 left outer join npimppresoc1 c on (a.codemp=c.codemp)
group by
  A.CODEMP,
  D.NOMEMP,
  D.FECING,
  a.feccal,
  a.feccor,
  a.anoser,
  a.messer,
  a.diaser,
  b.anoser,
  b.messer,
  b.diaser,
  a.anotra,
  a.mestra,
  a.diatra,
  b.antacu,
  b.bontra,
  a.antacu,
  b.intacu,
  a.intacu,
<<<<<<< .mine
  coalesce(A.ADEPRE,0));

=======
  coalesce(A.ADEPRE,0));

>>>>>>> .r33604
 CREATE OR REPLACE VIEW NPPRESREGANT AS
(SELECT A.CODEMP,A.NOMEMP,A.FECING,A.FECRET AS FECEGR,
(CASE WHEN TO_CHAR(A.FECFIN,'MM')=TO_CHAR(A.FECING,'MM') THEN TO_DATE(TO_CHAR(A.FECING,'DD/')||TO_CHAR(A.FECINI,'MM/YYYY'),'DD/MM/YYYY') ELSE A.FECINI END) AS FECINI,
A.FECFIN,
A.MONTO,
ROUND(A.MONTO/30,2) +
(COALESCE((CASE WHEN C.ALICUOCON=0 THEN 0
 ELSE (SELECT COALESCE(DIAUTI,0)
        FROM NPBONOCONT
        WHERE ANOVIG<=A.FECINI
        AND ANOVIGHAS>=A.FECFIN
        AND CODTIPCON=A.CODTIPCON
        AND DESDE<=(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)
        AND HASTA>=(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END))
  END),0)/30/12)*ROUND(A.MONTO/30,2) +
 (COALESCE((CASE WHEN C.ALICUOCON=0 THEN 0
 ELSE (SELECT COALESCE(DIAVAC,0)
        FROM NPBONOCONT
        WHERE ANOVIG<=A.FECINI
        AND ANOVIGHAS>=A.FECFIN
        AND CODTIPCON=A.CODTIPCON
        AND DESDE<=(CASE WHEN COALESCE(B.ANTAPVAC,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END)
        AND HASTA>=(CASE WHEN COALESCE(B.ANTAPVAC,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END))
  END),0)/30/12)*ROUND(A.MONTO/30,2) AS MONDIA,
A.CODTIPCON,
D.TIPTAS,
COALESCE((CASE WHEN D.TIPTAS='P' THEN E.TASINTPRO
 WHEN D.TIPTAS='A' THEN E.TASINTACT
 WHEN D.TIPTAS='S' THEN E.TASINTPAS END),0) AS TASINT,
 B.ANTAP,B.ANTAPVAC,C.ALICUOCON,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.ANNOANTIG ELSE A.ANNOANTIGPUB END) AS ANNOANTIG,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.MESANTIG ELSE A.MESANTIGPUB END) AS MESANTIG,
(CASE WHEN COALESCE(B.ANTAP,'N')='N' THEN A.DIAANTIG ELSE A.DIAANTIGPUB END) AS DIAANTIG,
(CASE WHEN TO_CHAR(A.FECFIN,'MM')=TO_CHAR(A.FECING,'MM') THEN TO_DATE(TO_CHAR(A.FECING,'DD/')||TO_CHAR(A.FECINI,'MM/YYYY'),'DD/MM/YYYY') END) AS ANNOINI,
(CASE WHEN TO_CHAR(A.FECFIN,'MM')=TO_CHAR(A.FECING,'MM') THEN ADD_MONTHS(TO_DATE(TO_CHAR(A.FECING,'DD/')||TO_CHAR(A.FECINI,'MM/YYYY'),'DD/MM/YYYY'),12)-1 END) AS ANNOFIN,
A.ID
FROM
(SELECT A.CODEMP,A.NOMEMP,
antpub('A',A.CODEMP,B.FECFIN,'S') AS ANNOANTIGPUB,
antpub('A',A.CODEMP,B.FECFIN,'N') AS ANNOANTIG,
antpub('M',A.CODEMP,B.FECFIN,'S') AS MESANTIGPUB,
antpub('M',A.CODEMP,B.FECFIN,'N') AS MESANTIG,
antpub('D',A.CODEMP,B.FECFIN,'S') AS DIAANTIGPUB,
antpub('D',A.CODEMP,B.FECFIN,'N') AS DIAANTIG,
A.FECING,
A.FECRET,
B.FECINI,
B.FECFIN,
(CASE WHEN (SELECT SUM(MONASI)
           FROM NPSALINT
           WHERE CODEMP=A.CODEMP
           AND FECINICON=B.FECINI
           AND FECFINCON=B.FECFIN) IS NOT NULL THEN
           (SELECT SUM(MONASI)
           FROM NPSALINT
           WHERE CODEMP=A.CODEMP
           AND FECINICON=B.FECINI
           AND FECFINCON=B.FECFIN)
           ELSE
           (SELECT SUM(CASE WHEN W.OPECON='A' THEN X.MONTO ELSE X.MONTO*-1 END)
           FROM NPHISCON X,NPASIEMPCONT Y,NPCONASI Z,NPDEFCPT W
           WHERE X.CODEMP=A.CODEMP
           AND X.FECNOM>=B.FECINI
           AND X.FECNOM<=B.FECFIN
           AND Y.CODEMP=X.CODEMP
           AND Y.CODNOM=X.CODNOM
           AND Z.CODCON=Y.CODTIPCON
           AND X.CODCON=Z.CODCPT
           AND X.CODCON=W.CODCON) END) AS MONTO,
(CASE WHEN (SELECT SUM(MONASI)
           FROM NPSALINT
           WHERE CODEMP=A.CODEMP
           AND CODASI='001'
           AND FECINICON=B.FECINI
           AND FECFINCON=B.FECFIN) IS NOT NULL THEN
            (SELECT CODCON
             FROM NPSALINT
             WHERE CODEMP=A.CODEMP
             AND FECINICON>=B.FECINI
             AND FECFINCON<=B.FECFIN
             AND CODASI='001')
           ELSE
            (SELECT MAX(Y.CODTIPCON)
             FROM NPHISCON X,NPASIEMPCONT Y
             WHERE X.CODEMP=A.CODEMP
             AND X.FECNOM>=B.FECINI
             AND X.FECNOM<=B.FECFIN
             AND Y.CODEMP=X.CODEMP
             AND Y.CODNOM=X.CODNOM) END) AS CODTIPCON,
B.ID
FROM NPHOJINT A,
(select
   add_months((select to_date('01/01/'||to_char(min(ano),'9999'),'dd/mm/yyyy') from npanos),id-1) as fecini,
   last_day(add_months((select to_date('01/01/'||to_char(min(ano),'9999'),'dd/mm/yyyy') from npanos),id-1)) as fecfin,
   id,null as CodEmp
   from generate_series(1,(SELECT count(*)
			   FROM npanos a,
			  (select '01/'||lpad(trim(to_char(fecdes,'99')),2,'0') as fecdes
			  from generate_series(1,12) as fecdes) b)) as id
   order by id) B
 WHERE B.FECFIN<=NOW()) A LEFT OUTER JOIN
                       (SELECT ANOVIG,ANOVIGHAS,CODTIPCON,MAX(ANTAP) AS ANTAP,
                        MAX(ANTAPVAC) AS ANTAPVAC
                        FROM NPBONOCONT B
                        GROUP BY ANOVIG,ANOVIGHAS,CODTIPCON) B ON
                        A.FECINI>=B.ANOVIG
                        AND A.FECFIN<=B.ANOVIGHAS
                        AND A.CODTIPCON=B.CODTIPCON
                        LEFT OUTER JOIN NPINTFECREF E ON
                        A.FECFIN>=E.FECINIREF AND
                        A.FECFIN<=E.FECFINREF
                        ,NPTIPCON C,NPINTCON D
WHERE A.CODTIPCON=C.CODTIPCON
AND A.FECINI<C.FECINIREG
AND A.CODTIPCON=D.CODCON
AND A.FECFIN>=D.FECDES
AND A.FECFIN<=D.FECHAS)
ORDER BY A.CODEMP,A.FECFIN,A.ID;
