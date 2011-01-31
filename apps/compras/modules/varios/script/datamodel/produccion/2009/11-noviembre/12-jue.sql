-- Actualizacion de la Funcion categoria empleado
-- DROP FUNCTION categoriaemp(character varying, character varying, character varying, character varying);

CREATE OR REPLACE FUNCTION categoriaemp(nomina character varying, empleado character varying, cargo character varying, concepto character varying)
  RETURNS character varying AS
$BODY$
DECLARE
   categoria VARCHAR(32);
BEGIN
select coalesce(w.codcat,lacategoria) into categoria from
(select concepto as codigocon, coalesce(B.CODCAT,A.CODCAT) as lacategoria from NPASICAREMP A left outer join
npasiCATconemp B on (A.CODNOM=B.CODNOM  AND A.CODEMP=B.CODEMP AND A.CODCAR=B.CODCAR AND B.CODCON=concepto)
WHERE
A.CODNOM=nomina
AND A.CODCAR=cargo
AND A.CODEMP=empleado) z left outer join npconceptoscategoria w
on (w.codcon=z.codigocon and
w.codcon=concepto);
return(categoria);
end;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION categoriaemp(character varying, character varying, character varying, character varying) OWNER TO postgres;