SET SEARCH_PATH TO "SIMA002";
-----------------------------------------------------------------------------
-- cobdetfor
-----------------------------------------------------------------------------

DROP TABLE "cobdetfor" CASCADE;


CREATE SEQUENCE "cobdetfor_seq";


CREATE TABLE "cobdetfor"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "correl" VARCHAR(3)  NOT NULL,
  "numide" VARCHAR(20),
  "codban" VARCHAR(3),
  "monpag" NUMERIC(14,2),
  "fatippag_id" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cobdetfor_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobdetfor" IS '';


ALTER TABLE "cobdetfor" ADD CONSTRAINT "cobdetfor_FK_1" FOREIGN KEY ("fatippag_id") REFERENCES "fatippag" ("id");

-----------------------------------------------------------------------------
-- cobdocume
-----------------------------------------------------------------------------

DROP TABLE  "cobdocume" CASCADE;

DROP SEQUENCE  "cobdocume_seq";

CREATE SEQUENCE "cobdocume_seq";


CREATE TABLE "cobdocume"
(
  "refdoc" VARCHAR(10)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "fecven" DATE,
  "oridoc" VARCHAR(3),
  "desdoc" VARCHAR(100),
  "mondoc" NUMERIC(14,2),
  "recdoc" NUMERIC(14,2),
  "dscdoc" NUMERIC(14,2),
  "abodoc" NUMERIC(14,2),
  "saldoc" NUMERIC(14,2),
  "desanu" VARCHAR(100),
  "fecanu" DATE,
  "stadoc" VARCHAR(1),
  "numcom" VARCHAR(8),
  "feccom" DATE,
  "reffac" VARCHAR(8),
  "fatipmov_id" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cobdocume_seq'::regclass),
  PRIMARY KEY ("refdoc","codcli")
);

COMMENT ON TABLE "cobdocume" IS '';


ALTER TABLE "cobdocume" ADD CONSTRAINT "cobdocume_FK_1" FOREIGN KEY ("fatipmov_id") REFERENCES "fatipmov" ("id");

-----------------------------------------------------------------------------
-- cobtransa
-----------------------------------------------------------------------------
DROP TABLE "cobtransa" CASCADE;


CREATE SEQUENCE "cobtransa_seq";


CREATE TABLE "cobtransa"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "destra" VARCHAR(100),
  "montra" NUMERIC(14,2),
  "totdsc" NUMERIC(14,2),
  "totrec" NUMERIC(14,2),
  "tottra" NUMERIC(14,2),
  "status" VARCHAR(1),
  "numcom" VARCHAR(8),
  "feccom" DATE,
  "fatipmov_id" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cobtransa_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobtransa" IS '';


ALTER TABLE "cobtransa" ADD CONSTRAINT "cobtransa_FK_1" FOREIGN KEY ("fatipmov_id") REFERENCES "fatipmov" ("id");


