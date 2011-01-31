----------------------------------------------------------------------------
-- tsdefcajchi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsdefcajchi" CASCADE;

DROP SEQUENCE IF EXISTS "tsdefcajchi_seq";

CREATE SEQUENCE "tsdefcajchi_seq";


CREATE TABLE "tsdefcajchi"
(
  "codcaj" VARCHAR(3)  NOT NULL,
  "descaj" VARCHAR(250)  NOT NULL,
  "cedrif" VARCHAR(15)  NOT NULL,
  "codcat" VARCHAR(32)  NOT NULL,
  "numcue" VARCHAR(20)  NOT NULL,
  "codtip" VARCHAR(4)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "monape" NUMERIC(14,2),
  "porrep" NUMERIC(14,2),
  "numini" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdefcajchi_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "unique_tsdefcajchi_codcaj" UNIQUE ("codcaj")
);

COMMENT ON TABLE "tsdefcajchi" IS '';


COMMENT ON COLUMN "tsdefcajchi"."id" IS 'Identificador Único del registro';


ALTER TABLE "opordpag"
  ADD COLUMN codcajchi character varying(3);
