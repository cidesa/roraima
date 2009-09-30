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
 THEN (CASE WHEN (CASE WHEN COALESCE(A.NUMDIAMES,0)=0 THEN ((CASE WHEN SUM(A.HIST)=0 THEN SUM(A.CORRESPONDE) ELSE SUM(A.CORRESPONDEHIS) END)/12) ELSE A.NUMDIAMES END)*
      cuantotiempo((CASE WHEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')>A.FECRET
                    THEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1,'YYYY'),'DD/MM/YYYY')
                    ELSE
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')
                    END),A.FECRET,'CM','0')<= COALESCE(A.NUMDIAMAXANO,0) OR A.NUMDIAMES IS NULL THEN 
       (CASE WHEN COALESCE(A.NUMDIAMES,0)=0 THEN ((CASE WHEN SUM(A.HIST)=0 THEN SUM(A.CORRESPONDE) ELSE SUM(A.CORRESPONDEHIS) END)/12) ELSE A.NUMDIAMES END)*
      cuantotiempo((CASE WHEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')>A.FECRET
                    THEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1,'YYYY'),'DD/MM/YYYY')
                    ELSE
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')
                    END),A.FECRET,'CM','0')
       ELSE COALESCE(A.NUMDIAMAXANO,0) END)
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
 THEN (CASE WHEN COALESCE(A.NUMDIAMES,0)=0 THEN MAX(COALESCE(B.DIAVAC,0)/12) ELSE 0 END)*
      cuantotiempo((CASE WHEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')>A.FECRET
                    THEN
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1,'YYYY'),'DD/MM/YYYY')
                    ELSE
                    TO_DATE(TO_CHAR(A.FECING,'DD/MM/')||TO_CHAR(A.FECRET,'YYYY'),'DD/MM/YYYY')
                    END),A.FECRET,'CM','0')
 ELSE 0  END),2) AS FRACCIONBONO,
(CASE WHEN 
         (CASE WHEN TO_DATE(TO_CHAR(A.FECRET,'DD/MM/')||TO_CHAR(A.FECING,'YYYY'),'DD/MM/YYYY')<=A.FECING THEN   
          TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1
          ELSE 
          TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999') END)>=TO_NUMBER(A.DESDE,'9999')
       AND (CASE WHEN TO_DATE(TO_CHAR(A.FECRET,'DD/MM/')||TO_CHAR(A.FECING,'YYYY'),'DD/MM/YYYY')<=A.FECING THEN   
            TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999')-1
            ELSE 
            TO_NUMBER(TO_CHAR(A.FECRET,'YYYY'),'9999') END)<TO_NUMBER(A.HASTA,'9999')
 THEN 'SI'
 ELSE 'NO'  END) as Fraccion,
A.CodTipCon,(Case When Coalesce(AVG(D.MonHis),0)=0 then AVG(C.MonAsi) else AVG(D.MonHis) end) as SalNor,
(CASE WHEN MAX(COALESCE(B.CalInc,'N'))='N' THEN (Case When Coalesce(AVG(D.MonHis),0)=0 then AVG(C.MonAsi) else AVG(D.MonHis) end)
 ELSE (Case When Coalesce(AVG(D.MonHis),0)=0 then AVG(C.MonAsi) else AVG(D.MonHis) end)+
      ((Case When Coalesce(AVG(D.MonHisBV),0)=0 then AVG(C.MonAsi) else AVG(D.MonHisBV) end)/30)*ROUND(MAX(COALESCE(B.DIAVAC,0)/12),2)+
      ((Case When Coalesce(AVG(D.MonHisBF),0)=0 then AVG(C.MonAsi) else AVG(D.MonHisBF) end)/30)*ROUND(MAX(COALESCE(B.DIAUTI,0)/12),2) END) AS SalInt,
A.NumDiaMes,A.NumDiaMaxAno
FROM  (Select 0 AS HIST,
              antpub('A',C.CODEMP,to_date(TO_CHAR(C.FECRET,'DD/MM/')||((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-1)::VARCHAR,'dd/mm/yyyy'),'S')::NUMERIC AS Antiguedad,
              (CASE WHEN TO_DATE(TO_CHAR(C.FECRET,'DD/MM/')||TO_CHAR(C.FECING,'YYYY'),'DD/MM/YYYY')<=C.FECING THEN
              ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano-1)-2)::VARCHAR
              ELSE ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano-1)-1)::VARCHAR END) as Desde,
              (CASE WHEN TO_DATE(TO_CHAR(C.FECRET,'DD/MM/')||TO_CHAR(C.FECING,'YYYY'),'DD/MM/YYYY')<=C.FECING THEN
                ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-2)::VARCHAR
              ELSE
              ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-1)::VARCHAR END) as Hasta,0 as Disfrutados,
              A.DIADIS as CORRESPONDE,0 as CORRESPONDEHIS,C.CodEmp,C.FecRet,C.FecIng,D.CodTipCon,F.NumDiaMes,F.NumDiaMaxAno
       from NPvacdiadis A left outer join NPDefEspParPre F on A.CodNom=F.CodNom,NPAnos B,NPHojInt C,NPASINOMCONT D
       Where A.codnom=COALESCE((SELECT CODNOM FROM NPASIEMPCONT WHERE CODEMP=C.CODEMP
                       AND FECDES<=TO_DATE(TO_CHAR(C.FECING,'DD/MM/')||
                       (CASE WHEN TO_DATE(TO_CHAR(C.FECRET,'DD/MM/')||TO_CHAR(C.FECING,'YYYY'),'DD/MM/YYYY')<=C.FECING 
 THEN ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-2)::VARCHAR
 ELSE ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-1)::VARCHAR END),'DD/MM/YYYY')
                       AND FECHAS>=TO_DATE(TO_CHAR(C.FECING,'DD/MM/')||
                       (CASE WHEN TO_DATE(TO_CHAR(C.FECRET,'DD/MM/')||TO_CHAR(C.FECING,'YYYY'),'DD/MM/YYYY')<=C.FECING 
 THEN ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-2)::VARCHAR
 ELSE ((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-1)::VARCHAR END),'DD/MM/YYYY')),
                       (SELECT MAX(CODNOM) FROM NPHISCON                       
                       WHERE CODEMP=C.CODEMP
                       AND FECNOM=(SELECT MAX(FECNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP
                       AND TO_CHAR(FECNOM,'YYYY')=TO_CHAR((TO_NUMBER(TO_CHAR(C.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(C.FecRet,'YYYY'),'9999')+1)-B.Ano)-1,'9999'))), 
                       COALESCE((SELECT MAX(CODNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP
                       AND FECNOM=(SELECT MAX(FECNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP))))
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
              0 as CORRESPONDE,C.diasdisfutar AS CORRESPONDEHIS,D.CodEmp,D.FecRet,D.FecIng,E.CodTipCon,F.NumDiaMes,F.NumDiaMaxAno
       from NPvacdiadis A left outer join NPDefEspParPre F on A.CodNom=F.CodNom,NPAnos B,Npvacdisfrute C,NPHojInt D,NPAsiNomCont E
       Where A.codnom=COALESCE((SELECT CODNOM FROM NPASIEMPCONT WHERE CODEMP=C.CODEMP
                       AND FECDES<=TO_DATE(TO_CHAR(D.FECING,'DD/MM/')||C.PERFIN,'DD/MM/YYYY')
                       AND FECHAS>=TO_DATE(TO_CHAR(D.FECING,'DD/MM/')||C.PERFIN,'DD/MM/YYYY')),
                       (SELECT MAX(CODNOM) FROM NPHISCON
                       WHERE CODEMP=C.CODEMP
                       AND FECNOM=(SELECT MAX(FECNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP
                       AND TO_CHAR(FECNOM,'YYYY')=TO_CHAR((TO_NUMBER(TO_CHAR(D.FecIng,'YYYY'),'9999')+1)+((TO_NUMBER(TO_CHAR(D.FecRet,'YYYY'),'9999')+1)-B.Ano)-1,'9999'))),
                       COALESCE((SELECT MAX(CODNOM) FROM NPHISCON
                       WHERE CODEMP=C.CODEMP
                       AND FECNOM=(SELECT MAX(FECNOM) FROM NPHISCON WHERE CODEMP=C.CODEMP))))
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
             BETWEEN B.AnoVig and B.AnoVigHas left outer join 
             (Select w.CodEmp,Sum((CASE WHEN v.TipAsi='S' then w.MONASI else 0 end)) as MONASI,
	      Sum((CASE WHEN v.AfeAliBV='S' then w.MONASI else 0 end)) as MONBV,
	      Sum((CASE WHEN v.AfeAliBF='S' then w.MONASI else 0 end)) as MONBF 
              from NPSalInt w, NPAsiPre v 
              where w.CodCon=(Select CodTipCon from NPAsiEmpCont where CodEmp=w.CodEmp and Status='A')
              And to_char(w.FecFinCon,'mm/yyyy')=(Select to_char(MAX(FecFin),'mm/yyyy') From NPImpPreSoc where CodEmp=w.CodEmp and ValArt108>0 and Tipo='')
              And v.CodCon=w.CodCon AND w.CodAsi=v.CodAsi
              group by w.CodEmp) C on A.CodEmp=C.CodEmp left outer join
             (Select w.CodEmp,SUM((CASE WHEN v.TipAsi='S' THEN w.Monto ELSE 0 END)) as MonHis,
	      SUM((CASE WHEN t.AfeAliBV='S' THEN w.Monto ELSE 0 END)) as MonHisBV, 
	      SUM((CASE WHEN t.AfeAliBF='S' THEN w.Monto ELSE 0 END)) as MonHisBF 
	      from NPHisCon w,NPAsiPre v,NPConAsi t,NPAsiNomCont r
	      where to_char(w.FecNom,'mm/yyyy')=(Select to_char(MAX(FecFin),'mm/yyyy') From NPImpPreSoc where CodEmp=w.CodEmp and ValArt108>0 and Tipo='')
	      And v.CodCon=(Select CodTipCon from NPAsiEmpCont where CodEmp=w.CodEmp and Status='A')
	      and v.TipAsi='S'
	      and v.CodCon=t.CodCon
	      and v.CodAsi=t.CodAsi
	      And r.CodTipCon=v.CodCon
	      And w.CodNom=r.CodNom
	      AND w.CodCon=t.CodCpt
	      group by w.CodEmp) D on A.CodEmp=D.CodEmp
GROUP BY A.DESDE,A.HASTA,A.CODEMP,A.FECRET,A.FECING,A.CodTipCon,A.NumDiaMes,A.NumDiaMaxAno
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
  coalesce(A.ADEPRE,0));
  
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
ORDER BY A.CODEMP,A.FECFIN,A.ID
  