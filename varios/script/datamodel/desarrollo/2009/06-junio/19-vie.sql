-----------------------------------------------------------------------------
-- bnrevact Tabla para guardar la revalorización de Activos Módulo Bienes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnrevact" CASCADE;

DROP SEQUENCE IF EXISTS "bnrevact_seq";

CREATE SEQUENCE "bnrevact_seq";


CREATE TABLE "bnrevact"
(
  "fecrev" DATE,
  "monmuerev" NUMERIC(14,2),
  "moninmrev" NUMERIC(14,2),
  "monsemrev" NUMERIC(14,2),
  "monimnrev" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnrevact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnrevact" IS '';

ALTER TABLE bndisinm
ADD COLUMN vidutil numeric(4, 0);
COMMENT ON TABLE "bnrevact" IS '';

--------------------------------------------------------------
----Gerana Espinoza, Codtipsen: Campo para guardar la Codificacion del Seniat en la tabla Optipret
ALTER TABLE "optipret"
  ADD COLUMN "codtipsen" varchar(3);
