set search_path to "SIMA002";

-- View: "SIMA002".npanos

-- DROP VIEW "SIMA002".npanos;

CREATE OR REPLACE VIEW npanos AS
(SELECT 1972::numeric + to_number(cppereje.pereje::text, '99'::text) AS ano
   FROM cppereje
UNION all

 SELECT 1984::numeric + to_number(cppereje.pereje::text, '99'::text) AS ano
   FROM cppereje

UNION
 SELECT 1996::numeric + to_number(cppereje.pereje::text, '99'::text) AS ano
   FROM cppereje

UNION
SELECT DISTINCT to_number(to_char(npsalint.fecinicon::timestamp with time zone, 'YYYY'::text), '9999'::text) AS ano
   FROM npsalint

UNION
 SELECT max(to_number(to_char(npsalint.fecinicon::timestamp with time zone, 'YYYY'::text), '9999'::text)) + 1::numeric AS ano
   FROM npsalint);

ALTER TABLE npanos OWNER TO postgres;



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
           AND Z.CODASI='001'
           AND Z.CODCON=Y.CODTIPCON
           AND X.CODCON=Z.CODCPT
           AND X.CODCON=W.CODCON) END) AS SALNOR,
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
(SELECT
 to_date(substr(to_char(B.fecdes,'dd/mm/yyyy'),1,6)||a.ano,'dd/mm/yyyy')::date as fecini,
 LAST_DAY(to_date(substr(to_char(B.fecdes,'dd/mm/yyyy'),1,6)||a.ano,'dd/mm/yyyy')::date) as fecfin,
 (SELECT
  Count(*)
  FROM NPANOS X,CPPEREJE Y
  WHERE to_date(substr(to_char(Y.fecdes,'dd/mm/yyyy'),1,6)||X.ano,'dd/mm/yyyy')::date<
  to_date(substr(to_char(B.fecdes,'dd/mm/yyyy'),1,6)||a.ano,'dd/mm/yyyy')::date) AS ID
 FROM NPANOS A,CPPEREJE B
 ORDER BY A.ano,B.fecdes,B.fechas) B
 WHERE  B.FECFIN>=(CASE WHEN TO_CHAR(A.FECING,'DD')>'01' THEN ADD_MONTHS(A.FECING,4)
                  ELSE ADD_MONTHS(A.FECING,4)-1 END)
 AND B.FECFIN<=NOW()) A LEFT OUTER JOIN
                       (SELECT ANOVIG,ANOVIGHAS,CODTIPCON,MAX(ANTAP) AS ANTAP,
                        MAX(ANTAPVAC) AS ANTAPVAC
                        FROM NPBONOCONT B
                        GROUP BY ANOVIG,ANOVIGHAS,CODTIPCON) B ON
                        A.FECINI>=B.ANOVIG
                        AND A.FECFIN<=B.ANOVIGHAS
                        AND A.CODTIPCON=B.CODTIPCON,NPTIPCON C
WHERE A.CODTIPCON=C.CODTIPCON)
ORDER BY A.CODEMP,A.FECFIN,A.ID;







CREATE OR REPLACE VIEW NPLIQVACACION AS
(SELECT
(CASE WHEN SUM(A.HIST)=0 THEN 'NO' ELSE 'SI' END) AS HISTORICO,SUM(A.ANTIGUEDAD) AS ANTIGUEDAD,
A.DESDE,A.HASTA,SUM(A.DISFRUTADOS) AS DISFRUTADOS,
(CASE WHEN SUM(A.HIST)=0 THEN SUM(A.CORRESPONDE) ELSE SUM(A.CORRESPONDEHIS) END) AS CORRESPONDE,
A.CODEMP,A.FECRET,
ROUND((CASE WHEN
         (CASE WHEN TO_DATE(TO_CHAR(A.FECRET,'DD/MM/')||TO_CHAR(A.FECING,'YYYY'),'DD/MM/YYYY')<=A.FECING THEN
          TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1
          ELSE
          TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999') END)>=TO_NUMBER(A.DESDE,'9999')
       AND (CASE WHEN TO_DATE(TO_CHAR(A.FECRET,'DD/MM/')||TO_CHAR(A.FECING,'YYYY'),'DD/MM/YYYY')<=A.FECING THEN
            TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1
            ELSE
            TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999') END)<TO_NUMBER(A.HASTA,'9999')
 THEN ((CASE WHEN SUM(A.HIST)=0 THEN SUM(A.CORRESPONDE) ELSE SUM(A.CORRESPONDEHIS) END)/12)*
      cuantotiempo((CASE WHEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')>A.FECRET
                    THEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1,'YYYY'),'DD/MM/YYYY')
                    ELSE
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')
                    END),A.FECRET,'CM','0')
 ELSE 0  END),2) AS FRACCIONDIA,
ROUND((CASE WHEN
         (CASE WHEN TO_DATE(TO_CHAR(A.FECRET,'DD/MM/')||TO_CHAR(A.FECING,'YYYY'),'DD/MM/YYYY')<=A.FECING THEN
          TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1
          ELSE
          TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999') END)>=TO_NUMBER(A.DESDE,'9999')
       AND (CASE WHEN TO_DATE(TO_CHAR(A.FECRET,'DD/MM/')||TO_CHAR(A.FECING,'YYYY'),'DD/MM/YYYY')<=A.FECING THEN
            TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1
            ELSE
            TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999') END)<TO_NUMBER(A.HASTA,'9999')
 THEN MAX(COALESCE(B.DIAVAC,0)/12)*
      cuantotiempo((CASE WHEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')>A.FECRET
                    THEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1,'YYYY'),'DD/MM/YYYY')
                    ELSE
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')
                    END),A.FECRET,'CM','0')
 ELSE 0  END),2) AS FRACCIONBONO,A.CodTipCon,AVG(C.MonAsi) as SalNor,
(CASE WHEN MAX(COALESCE(B.CalInc,'N'))='N' THEN AVG(C.MonAsi)
 ELSE AVG(C.MonAsi)*ROUND((MAX(COALESCE(B.DIAVAC,0))+MAX(COALESCE(B.DIAUTI,0))+360)/30,4)/12 END) AS SalInt
FROM  (Select 0 AS HIST,
              antpub('A',C.CODEMP,to_date(TO_CHAR(C.FECRET,'DD/MM/')||((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-1)::VARCHAR,'dd/mm/yyyy'),'S')::NUMERIC AS Antiguedad,
              (CASE WHEN TO_DATE(TO_CHAR(C.FECRET,'DD/MM/')||TO_CHAR(C.FECING,'YYYY'),'DD/MM/YYYY')<=C.FECING THEN
              ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano-1)-2)::VARCHAR
              ELSE ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano-1)-1)::VARCHAR END) as Desde,
              (CASE WHEN TO_DATE(TO_CHAR(C.FECRET,'DD/MM/')||TO_CHAR(C.FECING,'YYYY'),'DD/MM/YYYY')<=C.FECING THEN
                ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-2)::VARCHAR
              ELSE
              ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-1)::VARCHAR END) as Hasta,0 as Disfrutados,
              A.DIADIS as CORRESPONDE,0 as CORRESPONDEHIS,C.CodEmp,C.FecRet,C.FecIng,D.CodTipCon
       from NPvacdiadis A,NPAnos B,NPHojInt C,NPASINOMCONT D
       Where A.codnom=COALESCE((SELECT MAX(CODNOM) FROM NPHISCON
                                WHERE CODEMP=C.CODEMP
                                AND FECNOM=(SELECT MAX(FECNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP
                                AND TO_CHAR(FECNOM,'YYYY')=TO_CHAR((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-1,'9999'))),                       COALESCE((SELECT MAX(CODNOM) FROM NPHISCON
                       WHERE CODEMP=C.CODEMP
                       AND FECNOM=(SELECT MAX(FECNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP)),
                       (SELECT MAX(CODNOM) FROM NPASIEMPCONT WHERE CODEMP=C.CODEMP)))
             And B.Ano Between TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')
                       and (CASE WHEN TO_DATE(TO_CHAR(C.FECRET,'DD/MM/')||TO_CHAR(C.FECING,'YYYY'),'DD/MM/YYYY')>C.FECING THEN TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')
                            ELSE TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')-1 END)
             And C.FecRet is Not NUll
             And antpub('A',C.CODEMP,to_date(TO_CHAR(C.FECRET,'DD/MM/')||((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano))::VARCHAR,'dd/mm/yyyy'),'S')
             between A.rangodesde and A.rangohasta
             And A.CODNOM=D.CODNOM
       UNION ALL
       Select 1 AS HIST, 0 AS Antiguedad,C.PERINI as Desde,C.PERFIN as Hasta,
              C.DIASDISFRUTADOS as Disfrutados,
              0 as CORRESPONDE,C.diasdisfutar AS CORRESPONDEHIS,D.CodEmp,D.FecRet,D.FecIng,E.CodTipCon
       from NPvacdiadis A,NPAnos B,Npvacdisfrute C,NPHojInt D,NPAsiNomCont E
       Where A.codnom=COALESCE((SELECT MAX(CODNOM) FROM NPHISCON
                       WHERE CODEMP=C.CODEMP
                       AND FECNOM=(SELECT MAX(FECNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP
                       AND TO_CHAR(FECNOM,'YYYY')=TO_CHAR((TO_NUMBER(TO_CHAR(D.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(D.FecRet,'YYYY'),'9999')+1)-B.Ano)-1,'9999'))),
                       COALESCE((SELECT MAX(CODNOM) FROM NPHISCON
                       WHERE CODEMP=C.CODEMP
                       AND FECNOM=(SELECT MAX(FECNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP)),
                       (SELECT MAX(CODNOM) FROM NPASIEMPCONT WHERE CODEMP=C.CODEMP)))
             And B.Ano Between TO_NUMBER(TO_CHAR(D.FecIng,'YYYY'),'9999') and (TO_NUMBER(TO_CHAR(D.FecRet,'YYYY'),'9999')+1)
             And (TO_NUMBER(TO_CHAR(D.FecRet,'YYYY'),'9999')+1)-B.ano between A.rangodesde and A.rangohasta
             And C.PERINI=B.ANO::VARCHAR And D.FecRet is Not NUll And C.CODEMP=D.CodEmp
             And A.CodNom=E.CodNom) AS A LEFT OUTER JOIN NPBONOCONT B ON
             A.CodTipCon=B.CodTipCon
             And A.Antiguedad between B.Desde and B.Hasta
             And (CASE WHEN TO_DATE(TO_CHAR(A.FecIng,'DD/MM/')||A.Hasta::VARCHAR,'DD/MM/YYYY')>A.FECRET THEN
                      A.FECRET
                  ELSE
                      TO_DATE(TO_CHAR(A.FecIng,'DD/MM/')||A.Hasta::VARCHAR,'DD/MM/YYYY')
                  END)
             BETWEEN B.AnoVig and B.AnoVigHas left outer join NPSalInt C on A.CodEmp=C.CodEmp
             And A.CodTipCon=C.CodCon
             And C.CodAsi='001'
             And C.FecFinCon=(Select max(X.FecFinCon) from NPSalInt X,NPHojInt Y where X.CodEmp=C.CodEmp and X.CodEmp=Y.CodEmp
                              and X.FecFinCon<=(CASE WHEN last_day(Y.FecRet)-Y.FecRet<=1 then last_day(Y.FecRet) ELSE Y.FecRet End))
GROUP BY A.DESDE,A.HASTA,A.CODEMP,A.FECRET,A.FECING,A.CodTipCon
ORDER BY A.CODEMP,A.DESDE);


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
  coalesce(A.ADEPRE,0))