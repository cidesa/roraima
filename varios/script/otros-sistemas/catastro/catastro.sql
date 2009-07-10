
-----------------------------------------------------------------------------
-- catdivgeo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catdivgeo" CASCADE;

DROP SEQUENCE IF EXISTS "catdivgeo_seq";

CREATE SEQUENCE "catdivgeo_seq";


CREATE TABLE "catdivgeo"
(
  "coddivgeo" VARCHAR(50)  NOT NULL,
  "desdivgeo" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catdivgeo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catdivgeo" IS '';


-----------------------------------------------------------------------------
-- catbarurb
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catbarurb" CASCADE;

DROP SEQUENCE IF EXISTS "catbarurb_seq";

CREATE SEQUENCE "catbarurb_seq";


CREATE TABLE "catbarurb"
(
  "catdivgeo_id" INTEGER,
  "nombarurb" VARCHAR(50),
  "alibarurb" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('catbarurb_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catbarurb" IS '';


ALTER TABLE "catbarurb" ADD CONSTRAINT "catbarurb_FK_1" FOREIGN KEY ("catdivgeo_id") REFERENCES "catdivgeo" ("id");

-----------------------------------------------------------------------------
-- catcarcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catcarcon" CASCADE;

DROP SEQUENCE IF EXISTS "catcarcon_seq";

CREATE SEQUENCE "catcarcon_seq";


CREATE TABLE "catcarcon"
(
  "tipo" VARCHAR(2)  NOT NULL,
  "nomcarcon" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catcarcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catcarcon" IS '';


-----------------------------------------------------------------------------
-- catcarconinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catcarconinm" CASCADE;

DROP SEQUENCE IF EXISTS "catcarconinm_seq";

CREATE SEQUENCE "catcarconinm_seq";


CREATE TABLE "catcarconinm"
(
  "catreginm_id" INTEGER,
  "catcarcon_id" INTEGER,
  "cancar" NUMERIC(6,2)  NOT NULL,
  "metare" NUMERIC(12,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catcarconinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catcarconinm" IS '';


ALTER TABLE "catcarconinm" ADD CONSTRAINT "catcarconinm_FK_1" FOREIGN KEY ("catreginm_id") REFERENCES "catreginm" ("id");

ALTER TABLE "catcarconinm" ADD CONSTRAINT "catcarconinm_FK_2" FOREIGN KEY ("catcarcon_id") REFERENCES "catcarcon" ("id");

-----------------------------------------------------------------------------
-- catcarinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catcarinm" CASCADE;

DROP SEQUENCE IF EXISTS "catcarinm_seq";

CREATE SEQUENCE "catcarinm_seq";


CREATE TABLE "catcarinm"
(
  "descar" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catcarinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catcarinm" IS '';


-----------------------------------------------------------------------------
-- catcarter
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catcarter" CASCADE;

DROP SEQUENCE IF EXISTS "catcarter_seq";

CREATE SEQUENCE "catcarter_seq";


CREATE TABLE "catcarter"
(
  "tertip" VARCHAR(2),
  "dester" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('catcarter_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catcarter" IS '';


-----------------------------------------------------------------------------
-- catcarterinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catcarterinm" CASCADE;

DROP SEQUENCE IF EXISTS "catcarterinm_seq";

CREATE SEQUENCE "catcarterinm_seq";


CREATE TABLE "catcarterinm"
(
  "catreginm_id" INTEGER,
  "catcarter_id" INTEGER,
  "dimensiones" VARCHAR,
  "valor" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('catcarterinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catcarterinm" IS '';


ALTER TABLE "catcarterinm" ADD CONSTRAINT "catcarterinm_FK_1" FOREIGN KEY ("catreginm_id") REFERENCES "catreginm" ("id");

ALTER TABLE "catcarterinm" ADD CONSTRAINT "catcarterinm_FK_2" FOREIGN KEY ("catcarter_id") REFERENCES "catcarter" ("id");

-----------------------------------------------------------------------------
-- catciu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catciu" CASCADE;

DROP SEQUENCE IF EXISTS "catciu_seq";

CREATE SEQUENCE "catciu_seq";


CREATE TABLE "catciu"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catciu_seq'::regclass),
  "catest_id" INTEGER  NOT NULL,
  "nomciu" VARCHAR(50),
  "aliciu" VARCHAR(50),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catciu" IS '';


ALTER TABLE "catciu" ADD CONSTRAINT "catciu_FK_1" FOREIGN KEY ("catest_id") REFERENCES "catest" ("id") ON UPDATE RESTRICT ON DELETE RESTRICT;

-----------------------------------------------------------------------------
-- catcodpos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catcodpos" CASCADE;

DROP SEQUENCE IF EXISTS "catcodpos_seq";

CREATE SEQUENCE "catcodpos_seq";


CREATE TABLE "catcodpos"
(
  "despos" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catcodpos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catcodpos" IS '';


-----------------------------------------------------------------------------
-- catconent
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catconent" CASCADE;

DROP SEQUENCE IF EXISTS "catconent_seq";

CREATE SEQUENCE "catconent_seq";


CREATE TABLE "catconent"
(
  "descon" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catconent_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catconent" IS '';


-----------------------------------------------------------------------------
-- catconinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catconinm" CASCADE;

DROP SEQUENCE IF EXISTS "catconinm_seq";

CREATE SEQUENCE "catconinm_seq";


CREATE TABLE "catconinm"
(
  "desconinm" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catconinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catconinm" IS '';


-----------------------------------------------------------------------------
-- catconsoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catconsoc" CASCADE;

DROP SEQUENCE IF EXISTS "catconsoc_seq";

CREATE SEQUENCE "catconsoc_seq";


CREATE TABLE "catconsoc"
(
  "desconsoc" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catconsoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catconsoc" IS '';


-----------------------------------------------------------------------------
-- catdirvia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catdirvia" CASCADE;

DROP SEQUENCE IF EXISTS "catdirvia_seq";

CREATE SEQUENCE "catdirvia_seq";


CREATE TABLE "catdirvia"
(
  "desdir" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catdirvia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catdirvia" IS '';


-----------------------------------------------------------------------------
-- catest
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catest" CASCADE;

DROP SEQUENCE IF EXISTS "catest_seq";

CREATE SEQUENCE "catest_seq";


CREATE TABLE "catest"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catest_seq'::regclass),
  "nomest" VARCHAR(50),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catest" IS '';


-----------------------------------------------------------------------------
-- catinmcar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catinmcar" CASCADE;

DROP SEQUENCE IF EXISTS "catinmcar_seq";

CREATE SEQUENCE "catinmcar_seq";


CREATE TABLE "catinmcar"
(
  "catcarinm_id" INTEGER,
  "cancar" NUMERIC(4,2)  NOT NULL,
  "metare" NUMERIC(12,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catinmcar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catinmcar" IS '';


ALTER TABLE "catinmcar" ADD CONSTRAINT "catinmcar_FK_1" FOREIGN KEY ("catcarinm_id") REFERENCES "catcarinm" ("id");

-----------------------------------------------------------------------------
-- catman
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catman" CASCADE;

DROP SEQUENCE IF EXISTS "catman_seq";

CREATE SEQUENCE "catman_seq";


CREATE TABLE "catman"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catman_seq'::regclass),
  "catdivgeo_id" INTEGER,
  "nomman" VARCHAR(50),
  "aliman" VARCHAR(50),
  "cattramonor_id" INTEGER,
  "tiplinnor_id" INTEGER,
  "cattramosur_id" INTEGER,
  "tiplinsur_id" INTEGER,
  "cattramoest_id" INTEGER,
  "tiplinest_id" INTEGER,
  "cattramooes_id" INTEGER,
  "tiplinoes_id" INTEGER,
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catman" IS '';


ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_1" FOREIGN KEY ("catdivgeo_id") REFERENCES "catdivgeo" ("id");

ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_2" FOREIGN KEY ("cattramonor_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_3" FOREIGN KEY ("tiplinnor_id") REFERENCES "cattipvia" ("id");

ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_4" FOREIGN KEY ("cattramosur_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_5" FOREIGN KEY ("tiplinsur_id") REFERENCES "cattipvia" ("id");

ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_6" FOREIGN KEY ("cattramoest_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_7" FOREIGN KEY ("tiplinest_id") REFERENCES "cattipvia" ("id");

ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_8" FOREIGN KEY ("cattramooes_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catman" ADD CONSTRAINT "catman_FK_9" FOREIGN KEY ("tiplinoes_id") REFERENCES "cattipvia" ("id");

-----------------------------------------------------------------------------
-- catmun
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catmun" CASCADE;

DROP SEQUENCE IF EXISTS "catmun_seq";

CREATE SEQUENCE "catmun_seq";


CREATE TABLE "catmun"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catmun_seq'::regclass),
  "catciu_id" INTEGER,
  "catest_id" INTEGER,
  "nommun" VARCHAR(50),
  "alimun" VARCHAR(50),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catmun" IS '';


ALTER TABLE "catmun" ADD CONSTRAINT "catmun_FK_1" FOREIGN KEY ("catciu_id") REFERENCES "catciu" ("id");

ALTER TABLE "catmun" ADD CONSTRAINT "catmun_FK_2" FOREIGN KEY ("catest_id") REFERENCES "catest" ("id");

-----------------------------------------------------------------------------
-- catpai
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catpai" CASCADE;

DROP SEQUENCE IF EXISTS "catpai_seq";

CREATE SEQUENCE "catpai_seq";


CREATE TABLE "catpai"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catpai_seq'::regclass),
  "nompai" VARCHAR(50),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catpai" IS '';


-----------------------------------------------------------------------------
-- catpar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catpar" CASCADE;

DROP SEQUENCE IF EXISTS "catpar_seq";

CREATE SEQUENCE "catpar_seq";


CREATE TABLE "catpar"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catpar_seq'::regclass),
  "catmun_id" INTEGER,
  "catciu_id" INTEGER,
  "catest_id" INTEGER,
  "nompar" VARCHAR(50),
  "alipar" VARCHAR(50),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catpar" IS '';


ALTER TABLE "catpar" ADD CONSTRAINT "catpar_FK_1" FOREIGN KEY ("catmun_id") REFERENCES "catmun" ("id");

ALTER TABLE "catpar" ADD CONSTRAINT "catpar_FK_2" FOREIGN KEY ("catciu_id") REFERENCES "catciu" ("id");

ALTER TABLE "catpar" ADD CONSTRAINT "catpar_FK_3" FOREIGN KEY ("catest_id") REFERENCES "catest" ("id");

-----------------------------------------------------------------------------
-- catperinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catperinm" CASCADE;

DROP SEQUENCE IF EXISTS "catperinm_seq";

CREATE SEQUENCE "catperinm_seq";


CREATE TABLE "catperinm"
(
  "catreginm_id" INTEGER,
  "catregper_id" INTEGER,
  "conocu" VARCHAR(2)  NOT NULL,
  "tipper" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('catperinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catperinm" IS '';


ALTER TABLE "catperinm" ADD CONSTRAINT "catperinm_FK_1" FOREIGN KEY ("catreginm_id") REFERENCES "catreginm" ("id");

ALTER TABLE "catperinm" ADD CONSTRAINT "catperinm_FK_2" FOREIGN KEY ("catregper_id") REFERENCES "catregper" ("id");

-----------------------------------------------------------------------------
-- catprc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catprc" CASCADE;

DROP SEQUENCE IF EXISTS "catprc_seq";

CREATE SEQUENCE "catprc_seq";


CREATE TABLE "catprc"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catprc_seq'::regclass),
  "catsec_id" INTEGER,
  "catpar_id" INTEGER,
  "catmun_id" INTEGER,
  "catciu_id" INTEGER,
  "catest_id" INTEGER,
  "nomprc" VARCHAR(50),
  "aliprc" VARCHAR(50),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catprc" IS '';


ALTER TABLE "catprc" ADD CONSTRAINT "catprc_FK_1" FOREIGN KEY ("catsec_id") REFERENCES "catsec" ("id");

ALTER TABLE "catprc" ADD CONSTRAINT "catprc_FK_2" FOREIGN KEY ("catpar_id") REFERENCES "catpar" ("id");

ALTER TABLE "catprc" ADD CONSTRAINT "catprc_FK_3" FOREIGN KEY ("catmun_id") REFERENCES "catmun" ("id");

ALTER TABLE "catprc" ADD CONSTRAINT "catprc_FK_4" FOREIGN KEY ("catciu_id") REFERENCES "catciu" ("id");

ALTER TABLE "catprc" ADD CONSTRAINT "catprc_FK_5" FOREIGN KEY ("catest_id") REFERENCES "catest" ("id");

-----------------------------------------------------------------------------
-- catproter
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catproter" CASCADE;

DROP SEQUENCE IF EXISTS "catproter_seq";

CREATE SEQUENCE "catproter_seq";


CREATE TABLE "catproter"
(
  "descatproter" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('catproter_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catproter" IS '';


-----------------------------------------------------------------------------
-- catreginm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catreginm" CASCADE;

DROP SEQUENCE IF EXISTS "catreginm_seq";

CREATE SEQUENCE "catreginm_seq";


CREATE TABLE "catreginm"
(
  "catsubprc_id" INTEGER,
  "catprc_id" INTEGER,
  "catman_id" INTEGER,
  "catsec_id" INTEGER,
  "catpar_id" INTEGER,
  "catmun_id" INTEGER,
  "catciu_id" INTEGER,
  "catest_id" INTEGER,
  "catbarurb_id" INTEGER,
  "cattramofro_id" INTEGER,
  "cattramolat_id" INTEGER,
  "cattramolat2_id" INTEGER,
  "catcodpos_id" INTEGER,
  "cattipviv_id" INTEGER,
  "catconinm_id" INTEGER,
  "catusoesp_id" INTEGER,
  "catconsoc_id" INTEGER,
  "catrut_id" INTEGER,
  "catcarterinm_id" INTEGER,
  "catproter_id" INTEGER,
  "coddivgeo" VARCHAR(40),
  "nrocas" VARCHAR(30),
  "fecreg" DATE,
  "nroinc" VARCHAR(100),
  "asireg" VARCHAR(250),
  "folio" VARCHAR(1000),
  "nromat" VARCHAR(100),
  "codcatant" VARCHAR(100),
  "fecregant" DATE,
  "numregant" VARCHAR(100),
  "folioant" VARCHAR(1000),
  "triant" VARCHAR(250),
  "proant" VARCHAR(100),
  "nivinm" VARCHAR(8),
  "unihab" VARCHAR(8),
  "edicas" VARCHAR(25),
  "pisinm" VARCHAR(2),
  "numinm" VARCHAR(4),
  "ubigex" VARCHAR(10),
  "ubigey" VARCHAR(10),
  "ubigez" VARCHAR(10),
  "numhab" VARCHAR(3),
  "numper" VARCHAR(3),
  "numsan" VARCHAR(3),
  "numtom" VARCHAR(3),
  "arever" VARCHAR(3),
  "loccom" VARCHAR(3),
  "locind" VARCHAR(3),
  "captan" VARCHAR(10),
  "cappis" VARCHAR(10),
  "trapis" VARCHAR(1),
  "numtel" VARCHAR(15),
  "nomarccro" VARCHAR(254),
  "oficom" VARCHAR(3),
  "fotinm" VARCHAR(100),
  "lineste" VARCHAR(1000),
  "linnor" VARCHAR(1000),
  "linoes" VARCHAR(1000),
  "linsur" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('catreginm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catreginm" IS '';


ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_1" FOREIGN KEY ("catsubprc_id") REFERENCES "catsubprc" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_2" FOREIGN KEY ("catprc_id") REFERENCES "catprc" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_3" FOREIGN KEY ("catman_id") REFERENCES "catman" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_4" FOREIGN KEY ("catsec_id") REFERENCES "catsec" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_5" FOREIGN KEY ("catpar_id") REFERENCES "catpar" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_6" FOREIGN KEY ("catmun_id") REFERENCES "catmun" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_7" FOREIGN KEY ("catciu_id") REFERENCES "catciu" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_8" FOREIGN KEY ("catest_id") REFERENCES "catest" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_9" FOREIGN KEY ("catbarurb_id") REFERENCES "catbarurb" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_10" FOREIGN KEY ("cattramofro_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_11" FOREIGN KEY ("cattramolat_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_12" FOREIGN KEY ("cattramolat2_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_13" FOREIGN KEY ("catcodpos_id") REFERENCES "catcodpos" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_14" FOREIGN KEY ("cattipviv_id") REFERENCES "cattipviv" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_15" FOREIGN KEY ("catconinm_id") REFERENCES "catconinm" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_16" FOREIGN KEY ("catusoesp_id") REFERENCES "catusoesp" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_17" FOREIGN KEY ("catconsoc_id") REFERENCES "catconsoc" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_18" FOREIGN KEY ("catrut_id") REFERENCES "catrut" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_19" FOREIGN KEY ("catcarterinm_id") REFERENCES "catcarterinm" ("id");

ALTER TABLE "catreginm" ADD CONSTRAINT "catreginm_FK_20" FOREIGN KEY ("catproter_id") REFERENCES "catproter" ("id");

-----------------------------------------------------------------------------
-- catregper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catregper" CASCADE;

DROP SEQUENCE IF EXISTS "catregper_seq";

CREATE SEQUENCE "catregper_seq";


CREATE TABLE "catregper"
(
  "catbarurb_id" INTEGER,
  "catsec_id" INTEGER,
  "catpar_id" INTEGER,
  "catmun_id" INTEGER,
  "catdivgeo_id" INTEGER,
  "catest_id" INTEGER,
  "cattramofro_id" INTEGER,
  "cattramolat_id" INTEGER,
  "cattramolat2_id" INTEGER,
  "catcodpos_id" INTEGER,
  "cedrif" VARCHAR(15)  NOT NULL,
  "fecper" DATE  NOT NULL,
  "nomper" VARCHAR(80),
  "prinom" VARCHAR(20),
  "segnom" VARCHAR(20),
  "priape" VARCHAR(20),
  "segape" VARCHAR(20),
  "relemp" VARCHAR(3),
  "nacper" VARCHAR(1),
  "tipper" VARCHAR(1),
  "telper" VARCHAR(15),
  "faxper" VARCHAR(15),
  "apaposper" VARCHAR(10),
  "emaper" VARCHAR(50),
  "dirper" VARCHAR(254),
  "edicas" VARCHAR(10),
  "pishab" VARCHAR(10),
  "numhab" VARCHAR(10),
  "codofi" VARCHAR(3),
  "staper" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('catregper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catregper" IS '';


ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_1" FOREIGN KEY ("catbarurb_id") REFERENCES "catbarurb" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_2" FOREIGN KEY ("catsec_id") REFERENCES "catsec" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_3" FOREIGN KEY ("catpar_id") REFERENCES "catpar" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_4" FOREIGN KEY ("catmun_id") REFERENCES "catmun" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_5" FOREIGN KEY ("catdivgeo_id") REFERENCES "catdivgeo" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_6" FOREIGN KEY ("catest_id") REFERENCES "catest" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_7" FOREIGN KEY ("cattramofro_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_8" FOREIGN KEY ("cattramolat_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_9" FOREIGN KEY ("cattramolat2_id") REFERENCES "cattramo" ("id");

ALTER TABLE "catregper" ADD CONSTRAINT "catregper_FK_10" FOREIGN KEY ("catcodpos_id") REFERENCES "catcodpos" ("id");

-----------------------------------------------------------------------------
-- catrut
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catrut" CASCADE;

DROP SEQUENCE IF EXISTS "catrut_seq";

CREATE SEQUENCE "catrut_seq";


CREATE TABLE "catrut"
(
  "desrut" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catrut_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catrut" IS '';


-----------------------------------------------------------------------------
-- catsec
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catsec" CASCADE;

DROP SEQUENCE IF EXISTS "catsec_seq";

CREATE SEQUENCE "catsec_seq";


CREATE TABLE "catsec"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catsec_seq'::regclass),
  "catpar_id" INTEGER,
  "catmun_id" INTEGER,
  "catciu_id" INTEGER,
  "catest_id" INTEGER,
  "nomsec" VARCHAR(50),
  "alisec" VARCHAR(50),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catsec" IS '';


ALTER TABLE "catsec" ADD CONSTRAINT "catsec_FK_1" FOREIGN KEY ("catpar_id") REFERENCES "catpar" ("id");

ALTER TABLE "catsec" ADD CONSTRAINT "catsec_FK_2" FOREIGN KEY ("catmun_id") REFERENCES "catmun" ("id");

ALTER TABLE "catsec" ADD CONSTRAINT "catsec_FK_3" FOREIGN KEY ("catciu_id") REFERENCES "catciu" ("id");

ALTER TABLE "catsec" ADD CONSTRAINT "catsec_FK_4" FOREIGN KEY ("catest_id") REFERENCES "catest" ("id");

-----------------------------------------------------------------------------
-- catsenvia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catsenvia" CASCADE;

DROP SEQUENCE IF EXISTS "catsenvia_seq";

CREATE SEQUENCE "catsenvia_seq";


CREATE TABLE "catsenvia"
(
  "dessen" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catsenvia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catsenvia" IS '';


-----------------------------------------------------------------------------
-- catsubprc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catsubprc" CASCADE;

DROP SEQUENCE IF EXISTS "catsubprc_seq";

CREATE SEQUENCE "catsubprc_seq";


CREATE TABLE "catsubprc"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('catsubprc_seq'::regclass),
  "catprc_id" INTEGER,
  "catman_id" INTEGER,
  "catsec_id" INTEGER,
  "catpar_id" INTEGER,
  "catmun_id" INTEGER,
  "catciu_id" INTEGER,
  "catest_id" INTEGER,
  "nomsubprc" VARCHAR(50),
  "alisubprc" VARCHAR(50),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catsubprc" IS '';


ALTER TABLE "catsubprc" ADD CONSTRAINT "catsubprc_FK_1" FOREIGN KEY ("catprc_id") REFERENCES "catprc" ("id");

ALTER TABLE "catsubprc" ADD CONSTRAINT "catsubprc_FK_2" FOREIGN KEY ("catman_id") REFERENCES "catman" ("id");

ALTER TABLE "catsubprc" ADD CONSTRAINT "catsubprc_FK_3" FOREIGN KEY ("catsec_id") REFERENCES "catsec" ("id");

ALTER TABLE "catsubprc" ADD CONSTRAINT "catsubprc_FK_4" FOREIGN KEY ("catpar_id") REFERENCES "catpar" ("id");

ALTER TABLE "catsubprc" ADD CONSTRAINT "catsubprc_FK_5" FOREIGN KEY ("catmun_id") REFERENCES "catmun" ("id");

ALTER TABLE "catsubprc" ADD CONSTRAINT "catsubprc_FK_6" FOREIGN KEY ("catciu_id") REFERENCES "catciu" ("id");

ALTER TABLE "catsubprc" ADD CONSTRAINT "catsubprc_FK_7" FOREIGN KEY ("catest_id") REFERENCES "catest" ("id");

-----------------------------------------------------------------------------
-- cattipvia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cattipvia" CASCADE;

DROP SEQUENCE IF EXISTS "cattipvia_seq";

CREATE SEQUENCE "cattipvia_seq";


CREATE TABLE "cattipvia"
(
  "desvia" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cattipvia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cattipvia" IS '';


-----------------------------------------------------------------------------
-- cattipviv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cattipviv" CASCADE;

DROP SEQUENCE IF EXISTS "cattipviv_seq";

CREATE SEQUENCE "cattipviv_seq";


CREATE TABLE "cattipviv"
(
  "destipviv" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cattipviv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cattipviv" IS '';


-----------------------------------------------------------------------------
-- cattramo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cattramo" CASCADE;

DROP SEQUENCE IF EXISTS "cattramo_seq";

CREATE SEQUENCE "cattramo_seq";


CREATE TABLE "cattramo"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('cattramo_seq'::regclass),
  "catdivgeo_id" INTEGER,
  "nomtramo" VARCHAR(50)  NOT NULL,
  "alitramo" VARCHAR(50),
  "cattipvia_id" INTEGER,
  "catsenvia_id" INTEGER,
  "catdirvia_id" INTEGER,
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cattramo" IS '';


ALTER TABLE "cattramo" ADD CONSTRAINT "cattramo_FK_1" FOREIGN KEY ("catdivgeo_id") REFERENCES "catdivgeo" ("id");

ALTER TABLE "cattramo" ADD CONSTRAINT "cattramo_FK_2" FOREIGN KEY ("cattipvia_id") REFERENCES "cattipvia" ("id");

ALTER TABLE "cattramo" ADD CONSTRAINT "cattramo_FK_3" FOREIGN KEY ("catsenvia_id") REFERENCES "catsenvia" ("id");

ALTER TABLE "cattramo" ADD CONSTRAINT "cattramo_FK_4" FOREIGN KEY ("catdirvia_id") REFERENCES "catdirvia" ("id");

-----------------------------------------------------------------------------
-- catusoesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catusoesp" CASCADE;

DROP SEQUENCE IF EXISTS "catusoesp_seq";

CREATE SEQUENCE "catusoesp_seq";


CREATE TABLE "catusoesp"
(
  "desuso" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catusoesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catusoesp" IS '';


-----------------------------------------------------------------------------
-- catnivcat
-----------------------------------------------------------------------------

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


-----------------------------------------------------------------------------
-- catusoespinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catusoespinm" CASCADE;

DROP SEQUENCE IF EXISTS "catusoespinm_seq";

CREATE SEQUENCE "catusoespinm_seq";


CREATE TABLE "catusoespinm"
(
  "catreginm_id" INTEGER,
  "catusoesp_id" INTEGER,
  "tipo" VARCHAR(2),
  "valor" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('catusoespinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catusoespinm" IS '';


ALTER TABLE "catusoespinm" ADD CONSTRAINT "catusoespinm_FK_1" FOREIGN KEY ("catreginm_id") REFERENCES "catreginm" ("id");

ALTER TABLE "catusoespinm" ADD CONSTRAINT "catusoespinm_FK_2" FOREIGN KEY ("catusoesp_id") REFERENCES "catusoesp" ("id");
