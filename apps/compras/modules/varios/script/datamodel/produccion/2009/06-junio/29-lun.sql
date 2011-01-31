--Se agregarón Campos a la tabla opordpag y opfactur  Formulario Generar Retenciones
ALTER TABLE "opordpag"
  ADD COLUMN "fecret" DATE,
  ADD COLUMN "numcue" VARCHAR(20);

ALTER TABLE "opfactur"
  ADD COLUMN "observacion" VARCHAR(250);

-----------------------------------------------------------------------------
-- caproret
-----------------------------------------------------------------------------
CREATE SEQUENCE "caproret_seq";

CREATE TABLE "caproret"
(
  "codpro" VARCHAR(15)  NOT NULL,
  "codret" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caproret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caproret" IS '';