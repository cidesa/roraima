---// Jesus Matriz de Cidesa

--DROP TABLE "caproret" CASCADE;

--DROP SEQUENCE "caproret_seq";

CREATE SEQUENCE "caproret_seq";

--// Jesus
CREATE TABLE "caproret"
(
  "codpro" VARCHAR(15)  NOT NULL,
  "codret" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caproret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caproret" IS '';

ALTER TABLE "caprovee"
  ADD COLUMN "estpro" varchar(1) default ('A');

ALTER TABLE "cacorrel"
  ADD COLUMN "corpro" numeric(8);

ALTER TABLE "caprovee"
  ADD COLUMN "codban" varchar(4);

ALTER TABLE "caprovee"
  ADD COLUMN "numcue" varchar(20);

ALTER TABLE "caprovee"
  ADD COLUMN "codtip" varchar(3);

CREATE SEQUENCE "cabanco_seq";


CREATE TABLE "cabanco"
(
  "codban" VARCHAR(4)  NOT NULL,
  "desban" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cabanco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cabanco" IS '';

---//



