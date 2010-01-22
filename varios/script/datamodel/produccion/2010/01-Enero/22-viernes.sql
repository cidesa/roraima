-----------------------------------------------------------------------------
-- npconsuelaporet Requerimientos de Logicasa
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconsuelaporet" CASCADE;

DROP SEQUENCE IF EXISTS "npconsuelaporet_seq";

CREATE SEQUENCE "npconsuelaporet_seq";


CREATE TABLE "npconsuelaporet"
(
  "codtipapo" VARCHAR(4)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "tipo" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npconsuelaporet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconsuelaporet" IS '';


COMMENT ON COLUMN "npconsuelaporet"."id" IS 'Identificador Único del registro';