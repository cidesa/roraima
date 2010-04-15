--Requerimiento Barcelona Solicitud de Pago con su respectivo Correlativo  Desireé Martínez
ALTER TABLE "cacorrel"
  ADD COLUMN "corpag" VARCHAR(8);

--DROP TABLE IF EXISTS "casolpag" CASCADE;

--DROP SEQUENCE IF EXISTS "casolpag_seq";

CREATE SEQUENCE "casolpag_seq";


CREATE TABLE "casolpag"
(
  "solpag" VARCHAR(8)  NOT NULL,
  "fecsol" DATE  NOT NULL,
  "dessol" VARCHAR(1000),
  "tipcom" VARCHAR(4)  NOT NULL,
  "cedrif" VARCHAR(15),
  "monsol" NUMERIC(14,2)  NOT NULL,
  "stasol" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('casolpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "casolpag" IS 'Solicitud de Pagos';


-----------------------------------------------------------------------------
-- cadetpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadetpag" CASCADE;

DROP SEQUENCE IF EXISTS "cadetpag_seq";

CREATE SEQUENCE "cadetpag_seq";


CREATE TABLE "cadetpag"
(
  "solpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "moncom" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cadetpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadetpag" IS 'Detalle Solicitud de Pagos';

--- ====== Catastro  =====
DROP TABLE IF EXISTS "catnivcat" CASCADE;

DROP SEQUENCE IF EXISTS "catnivcat_seq";

CREATE SEQUENCE "catnivcat_seq";


CREATE TABLE "catnivcat"
(
  "catpar" VARCHAR(1)  NOT NULL,
  "lonniv" VARCHAR(3)  NOT NULL,
  "nomabr" VARCHAR(10)  NOT NULL,
  "forcodcat" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catnivcat_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catnivcat" IS '';

ALTER TABLE "catreginm"
  ADD COLUMN "nroinc" varchar(100);

ALTER TABLE "catreginm"
  ADD COLUMN "asireg" varchar(250);

ALTER TABLE "catreginm"
  ADD COLUMN "folio" varchar(1000);

ALTER TABLE "catreginm"
  ADD COLUMN "nromat" varchar(100);

ALTER TABLE "catreginm"
  ADD COLUMN "codcatant" varchar(100);

ALTER TABLE "catreginm"
  ADD COLUMN "fecregant" date;

ALTER TABLE "catreginm"
  ADD COLUMN "numregant" varchar(100);

ALTER TABLE "catreginm"
  ADD COLUMN "folioant" varchar(1000);

ALTER TABLE "catreginm"
  ADD COLUMN "triant" varchar(250);

ALTER TABLE "catreginm"
  ADD COLUMN "proant" varchar(100);

ALTER TABLE "catreginm"
  ADD COLUMN "proant" varchar(100);


--------=======