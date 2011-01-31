---Script para correr en el Sima_User
-----------------------------------------------------------------------------
-- apernueper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "apernueper" CASCADE;

DROP SEQUENCE IF EXISTS "apernueper_seq";

CREATE SEQUENCE "apernueper_seq";


CREATE TABLE "apernueper"
(
  "nomtab" VARCHAR(255)  NOT NULL,
  "orden" INTEGER  NOT NULL,
  "codmod" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('apernueper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "apernueper" IS '';