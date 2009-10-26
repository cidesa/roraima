--Matriz de UNERMB TESORERIA
ALTER TABLE "tscheemi"
  ADD COLUMN "numcomegr" VARCHAR(8);

-----------------------------------------------------------------------------
-- tscomegrmes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tscomegrmes" CASCADE;

DROP SEQUENCE IF EXISTS "tscomegrmes_seq";

CREATE SEQUENCE "tscomegrmes_seq";


CREATE TABLE "tscomegrmes"
(
  "mes1" VARCHAR(2)  NOT NULL,
  "cormes1" INTEGER,
  "mes2" VARCHAR(2)  NOT NULL,
  "cormes2" INTEGER,
  "mes3" VARCHAR(2)  NOT NULL,
  "cormes3" INTEGER,
  "mes4" VARCHAR(2)  NOT NULL,
  "cormes4" INTEGER,
  "mes5" VARCHAR(2)  NOT NULL,
  "cormes5" INTEGER,
  "mes6" VARCHAR(2)  NOT NULL,
  "cormes6" INTEGER,
  "mes7" VARCHAR(2)  NOT NULL,
  "cormes7" INTEGER,
  "mes8" VARCHAR(2)  NOT NULL,
  "cormes8" INTEGER,
  "mes9" VARCHAR(2)  NOT NULL,
  "cormes9" INTEGER,
  "mes10" VARCHAR(2)  NOT NULL,
  "cormes10" INTEGER,
  "mes11" VARCHAR(2)  NOT NULL,
  "cormes11" INTEGER,
  "mes12" VARCHAR(2)  NOT NULL,
  "cormes12" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('tscomegrmes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tscomegrmes" IS 'Tabla para establecer correlativos de Comprobantes por mes';
