-----------------------------------------------------------------------------
-- npdefubi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefubi" CASCADE;

DROP SEQUENCE IF EXISTS "npdefubi_seq";

CREATE SEQUENCE "npdefubi_seq";


CREATE TABLE "npdefubi"
(
  "codubi" VARCHAR(4)  NOT NULL,
  "desubi" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefubi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefubi" IS '';