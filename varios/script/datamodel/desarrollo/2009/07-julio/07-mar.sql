---     Catastro
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
