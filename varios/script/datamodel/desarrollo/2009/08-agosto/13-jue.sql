-- Función que se creo para el Cierre de la Nómina. Trae la partida exacta que va a guardar en Nphiscon(Históricos)

-- Function: partidaconcepto(character varying, character varying, character varying)

-- DROP FUNCTION partidaconcepto(character varying, character varying, character varying);

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
ALTER FUNCTION partidaconcepto(character varying, character varying, character varying) OWNER TO postgres;


-- Function: categoriaemp(character varying, character varying, character varying, character varying)

-- DROP FUNCTION categoriaemp(character varying, character varying, character varying, character varying);

CREATE OR REPLACE FUNCTION categoriaemp(nomina character varying, empleado character varying, cargo character varying, concepto character varying)
  RETURNS character varying AS
$BODY$
DECLARE
   lacategoria VARCHAR(32);
BEGIN
select  coalesce(b.codcat,a.codcat) into lacategoria
from npasicaremp a left outer join npconceptoscategoria b
on (b.codcon=concepto) where codnom=nomina and codemp=empleado and codcar=cargo;
return(lacategoria);
end;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION categoriaemp(character varying, character varying, character varying, character varying) OWNER TO postgres;
