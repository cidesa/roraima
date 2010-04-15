
-----------------------------------------------------------------------------
-- grcliente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "grcliente" CASCADE;

DROP SEQUENCE IF EXISTS "grcliente_seq";

CREATE SEQUENCE "grcliente_seq";


CREATE TABLE "grcliente"
(
  "codcli" VARCHAR(20)  NOT NULL,
  "nomcli" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('grcliente_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "grcliente" IS '';


-----------------------------------------------------------------------------
-- grtecnico
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "grtecnico" CASCADE;

DROP SEQUENCE IF EXISTS "grtecnico_seq";

CREATE SEQUENCE "grtecnico_seq";


CREATE TABLE "grtecnico"
(
  "codtec" VARCHAR(20)  NOT NULL,
  "nomtec" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('grtecnico_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "grtecnico" IS '';


-----------------------------------------------------------------------------
-- grregreq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "grregreq" CASCADE;

DROP SEQUENCE IF EXISTS "grregreq_seq";

CREATE SEQUENCE "grregreq_seq";


CREATE TABLE "grregreq"
(
  "numreq" VARCHAR(20)  NOT NULL,
  "codcli" VARCHAR(20)  NOT NULL,
  "codtec" VARCHAR(20)  NOT NULL,
  "fecreq" DATE,
  "codapl" VARCHAR(3)  NOT NULL,
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('grregreq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "grregreq" IS '';


-----------------------------------------------------------------------------
-- grdetreq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "grdetreq" CASCADE;

DROP SEQUENCE IF EXISTS "grdetreq_seq";

CREATE SEQUENCE "grdetreq_seq";


CREATE TABLE "grdetreq"
(
  "numreq" VARCHAR(20)  NOT NULL,
  "nomopc" VARCHAR(50),
  "desreq" VARCHAR(100)  NOT NULL,
  "usureq" VARCHAR(50),
  "status" VARCHAR(1),
  "observapr" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('grdetreq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "grdetreq" IS '';


-----------------------------------------------------------------------------
-- granareq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "granareq" CASCADE;

DROP SEQUENCE IF EXISTS "granareq_seq";

CREATE SEQUENCE "granareq_seq";


CREATE TABLE "granareq"
(
  "numreq" VARCHAR(20)  NOT NULL,
  "grdetreq_id" INTEGER,
  "anotaciones" VARCHAR  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('granareq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "granareq" IS '';


ALTER TABLE "granareq" ADD CONSTRAINT "granareq_FK_1" FOREIGN KEY ("grdetreq_id") REFERENCES "grdetreq" ("id");

-----------------------------------------------------------------------------
-- grplandesreq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "grplandesreq" CASCADE;

DROP SEQUENCE IF EXISTS "grplandesreq_seq";

CREATE SEQUENCE "grplandesreq_seq";


CREATE TABLE "grplandesreq"
(
  "numreq" VARCHAR(20)  NOT NULL,
  "grdetreq_id" INTEGER,
  "codtec" VARCHAR(20)  NOT NULL,
  "nrohor" VARCHAR(20),
  "fecest" DATE,
  "fecreal" DATE,
  "observaciones" VARCHAR(150),
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('grplandesreq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "grplandesreq" IS '';


ALTER TABLE "grplandesreq" ADD CONSTRAINT "grplandesreq_FK_1" FOREIGN KEY ("grdetreq_id") REFERENCES "grdetreq" ("id");

-----------------------------------------------------------------------------
-- grdesreq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "grdesreq" CASCADE;

DROP SEQUENCE IF EXISTS "grdesreq_seq";

CREATE SEQUENCE "grdesreq_seq";


CREATE TABLE "grdesreq"
(
  "numreq" VARCHAR(20)  NOT NULL,
  "grdetreq_id" INTEGER,
  "anotaciones" VARCHAR  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('grdesreq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "grdesreq" IS '';


ALTER TABLE "grdesreq" ADD CONSTRAINT "grdesreq_FK_1" FOREIGN KEY ("grdetreq_id") REFERENCES "grdetreq" ("id");
