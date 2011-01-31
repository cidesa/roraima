-----------------------------------------------------------------------------
-- fanotcre  Desiree Martínez Script para el Modulo Facturacion/fafactur(Procedimiento ANular)
-----------------------------------------------------------------------------
CREATE SEQUENCE "fanotcre_seq";

CREATE TABLE "fanotcre"
(
  "reffac" VARCHAR(8)  NOT NULL,
  "correl" VARCHAR(8),
  "fecnot" DATE  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fanotcre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fanotcre" IS 'Notas de Credito por Anulaciones';