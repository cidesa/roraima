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