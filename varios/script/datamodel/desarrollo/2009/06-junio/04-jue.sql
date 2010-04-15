--DROP TABLE IF EXISTS "caconpro" CASCADE;

--DROP SEQUENCE IF EXISTS "caconpro_seq";

CREATE SEQUENCE "caconpro_seq";


CREATE TABLE "caconpro"
(
  "codpro" VARCHAR(15)  NOT NULL,
  "cedcon" VARCHAR(15)  NOT NULL,
  "nomcon" VARCHAR(250),
  "dircon" VARCHAR(250),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(100),
  "relcon" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('caconpro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caconpro" IS '';


--DROP TABLE IF EXISTS "carampro" CASCADE;

--DROP SEQUENCE IF EXISTS "carampro_seq";

CREATE SEQUENCE "carampro_seq";


CREATE TABLE "carampro"
(
  "codpro" VARCHAR(15)  NOT NULL,
  "ramart" VARCHAR(6)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('carampro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "carampro" IS '';


ALTER TABLE "caprovee"
  ADD COLUMN "ramgen" varchar(1000);

