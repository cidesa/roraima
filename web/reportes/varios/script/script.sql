--Funcion para buscar la partida de un concepto 24/02/2008 utilizada en nprrelconc y similares
CREATE OR REPLACE FUNCTION "SIMA002"."partidaconcepto" (concepto varchar, nomina varchar, cargo varchar) RETURNS varchar AS
$body$
DECLARE
   lapartida VARCHAR(32);
BEGIN
select coalesce(X.codpar,Y.partida) into lapartida from npasiparcon X right outer join
(select B.codcon, coalesce(A.codpre,B.codpar) as partida, A.codnom  from npasicodpre A right outer join npdefcpt B on A.codcon = B.codcon and A.codnom = nomina where B.codcon = concepto) Y
on Y.codcon = X.codcon and coalesce(Y.codnom,X.codnom) = X.codnom and X.codnom = nomina and X.codcar = cargo where Y.codcon = concepto ;
RETURN lapartida;
END;
$body$
LANGUAGE 'plpgsql' VOLATILE CALLED ON NULL INPUT SECURITY INVOKER;