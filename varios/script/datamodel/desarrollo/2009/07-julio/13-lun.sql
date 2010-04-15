--NIVELES DE APROBACION (OC y OP) Desireé Martínez NOTA: ESTOS SCRIPT ES PARA CORRERLOS EN EL SIMA_USER
ALTER TABLE "usuarios"
  ADD COLUMN "codniv" VARCHAR(3);

-----------------------------------------------------------------------------
-- segnivapr  NOTA: ESTOS SCRIPT ES PARA CORRERLOS EN EL SIMA_USER
-----------------------------------------------------------------------------

--DROP TABLE IF EXISTS "segnivapr" CASCADE;

--DROP SEQUENCE IF EXISTS "segnivapr_seq";

CREATE SEQUENCE "segnivapr_seq";


CREATE TABLE "segnivapr"
(
  "codniv" VARCHAR(3)  NOT NULL,
  "desniv" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('segnivapr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "segnivapr" IS 'Tabla para definir Niveles de Aprobación';


-----------------------------------------------------------------------------
-- segranapr  NOTA: ESTOS SCRIPT ES PARA CORRERLOS EN EL SIMA_USER
-----------------------------------------------------------------------------

--DROP TABLE IF EXISTS "segranapr" CASCADE;

--DROP SEQUENCE IF EXISTS "segranapr_seq";

CREATE SEQUENCE "segranapr_seq";


CREATE TABLE "segranapr"
(
  "randes" NUMERIC(14,2)  NOT NULL,
  "ranhas" NUMERIC(14,2)  NOT NULL,
  "codniv" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('segranapr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "segranapr" IS 'Tabla para definir rangos(UT) x Niveles de Aprobación';