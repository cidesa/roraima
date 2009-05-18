
-----------------------------------------------------------------------------
-- ciadidis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciadidis" CASCADE;

DROP SEQUENCE IF EXISTS "ciadidis_seq";

CREATE SEQUENCE "ciadidis_seq";


CREATE TABLE "ciadidis"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "fecadi" DATE  NOT NULL,
  "anoadi" VARCHAR(4),
  "desadi" VARCHAR(250),
  "desanu" VARCHAR(250),
  "adidis" VARCHAR(1),
  "totadi" NUMERIC(14,2),
  "staadi" VARCHAR(1),
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('ciadidis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciadidis" IS '';


-----------------------------------------------------------------------------
-- ciajuste
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciajuste" CASCADE;

DROP SEQUENCE IF EXISTS "ciajuste_seq";

CREATE SEQUENCE "ciajuste_seq";


CREATE TABLE "ciajuste"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "fecaju" DATE  NOT NULL,
  "anoaju" VARCHAR(4)  NOT NULL,
  "refere" VARCHAR(8),
  "desaju" VARCHAR(250),
  "desanu" VARCHAR(250),
  "totaju" NUMERIC(14,2),
  "staaju" VARCHAR(1),
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('ciajuste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciajuste" IS '';


-----------------------------------------------------------------------------
-- ciasiini
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciasiini" CASCADE;

DROP SEQUENCE IF EXISTS "ciasiini_seq";

CREATE SEQUENCE "ciasiini_seq";


CREATE TABLE "ciasiini"
(
  "codpre" VARCHAR(34)  NOT NULL,
  "nompre" VARCHAR(100),
  "perpre" VARCHAR(2)  NOT NULL,
  "anopre" VARCHAR(4)  NOT NULL,
  "monasi" NUMERIC(14,2),
  "monprc" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "montra" NUMERIC(14,2),
  "montrn" NUMERIC(14,2),
  "monadi" NUMERIC(14,2),
  "mondim" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "mondis" NUMERIC(14,2),
  "difere" NUMERIC(14,2),
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciasiini_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciasiini" IS '';


-----------------------------------------------------------------------------
-- ciconrep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciconrep" CASCADE;

DROP SEQUENCE IF EXISTS "ciconrep_seq";

CREATE SEQUENCE "ciconrep_seq";


CREATE TABLE "ciconrep"
(
  "rifcon" VARCHAR(14)  NOT NULL,
  "repcon" VARCHAR(1)  NOT NULL,
  "nitcon" VARCHAR(14),
  "nomcon" VARCHAR(50)  NOT NULL,
  "naccon" VARCHAR(1)  NOT NULL,
  "dircon" VARCHAR(50),
  "codpar" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "tipcon" VARCHAR(1)  NOT NULL,
  "telcon" VARCHAR(30),
  "faxcon" VARCHAR(15),
  "emacon" VARCHAR(50),
  "urlcon" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciconrep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciconrep" IS '';


-----------------------------------------------------------------------------
-- cidefniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cidefniv" CASCADE;

DROP SEQUENCE IF EXISTS "cidefniv_seq";

CREATE SEQUENCE "cidefniv_seq";


CREATE TABLE "cidefniv"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "loncod" NUMERIC(2)  NOT NULL,
  "rupcat" NUMERIC(2)  NOT NULL,
  "ruppar" NUMERIC(2)  NOT NULL,
  "nivdis" NUMERIC(2)  NOT NULL,
  "forpre" VARCHAR(32)  NOT NULL,
  "asiper" VARCHAR(1)  NOT NULL,
  "numper" NUMERIC(2)  NOT NULL,
  "peract" VARCHAR(2)  NOT NULL,
  "fecper" DATE,
  "fecini" DATE,
  "feccie" DATE,
  "etadef" VARCHAR(1),
  "staprc" VARCHAR(1),
  "coraep" VARCHAR(8),
  "cortras" VARCHAR(8),
  "coraju" VARCHAR(8),
  "coradi" VARCHAR(8),
  "coring" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cidefniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cidefniv" IS '';


-----------------------------------------------------------------------------
-- cideftit
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cideftit" CASCADE;

DROP SEQUENCE IF EXISTS "cideftit_seq";

CREATE SEQUENCE "cideftit_seq";


CREATE TABLE "cideftit"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "nompre" VARCHAR(100)  NOT NULL,
  "codcta" VARCHAR(32),
  "stacod" VARCHAR(1),
  "coduni" VARCHAR(4),
  "estatus" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cideftit_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cideftit" IS '';


-----------------------------------------------------------------------------
-- cidisniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cidisniv" CASCADE;

DROP SEQUENCE IF EXISTS "cidisniv_seq";

CREATE SEQUENCE "cidisniv_seq";


CREATE TABLE "cidisniv"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "monasi" NUMERIC(14,2),
  "modificacion" NUMERIC(14,2),
  "asigactual" NUMERIC(14,2),
  "monprc" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "mondis" NUMERIC(14,2),
  "deuda" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cidisniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cidisniv" IS '';


-----------------------------------------------------------------------------
-- cierre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cierre" CASCADE;

DROP SEQUENCE IF EXISTS "cierre_seq";

CREATE SEQUENCE "cierre_seq";


CREATE TABLE "cierre"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "fecnom" DATE  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "monto" NUMERIC(14,2)  NOT NULL,
  "asided" VARCHAR(1),
  "codtipgas" VARCHAR(16),
  "cantidad" NUMERIC(14,2),
  "codban" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('cierre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cierre" IS '';


-----------------------------------------------------------------------------
-- ciimping
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciimping" CASCADE;

DROP SEQUENCE IF EXISTS "ciimping_seq";

CREATE SEQUENCE "ciimping_seq";


CREATE TABLE "ciimping"
(
  "refing" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "codtiprub" VARCHAR(3),
  "moning" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "mondes" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "fecing" DATE,
  "staimp" VARCHAR(1),
  "monaju" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciimping_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciimping" IS '';


-----------------------------------------------------------------------------
-- cimovadi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cimovadi" CASCADE;

DROP SEQUENCE IF EXISTS "cimovadi_seq";

CREATE SEQUENCE "cimovadi_seq";


CREATE TABLE "cimovadi"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cimovadi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cimovadi" IS '';


-----------------------------------------------------------------------------
-- cimovaju
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cimovaju" CASCADE;

DROP SEQUENCE IF EXISTS "cimovaju_seq";

CREATE SEQUENCE "cimovaju_seq";


CREATE TABLE "cimovaju"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monaju" NUMERIC(14,2)  NOT NULL,
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cimovaju_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cimovaju" IS '';


-----------------------------------------------------------------------------
-- cimovtra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cimovtra" CASCADE;

DROP SEQUENCE IF EXISTS "cimovtra_seq";

CREATE SEQUENCE "cimovtra_seq";


CREATE TABLE "cimovtra"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "codori" VARCHAR(32)  NOT NULL,
  "coddes" VARCHAR(32)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cimovtra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cimovtra" IS '';


-----------------------------------------------------------------------------
-- ciniveles
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciniveles" CASCADE;

DROP SEQUENCE IF EXISTS "ciniveles_seq";

CREATE SEQUENCE "ciniveles_seq";


CREATE TABLE "ciniveles"
(
  "catpar" VARCHAR(1)  NOT NULL,
  "consec" NUMERIC(2)  NOT NULL,
  "nomabr" VARCHAR(10)  NOT NULL,
  "nomext" VARCHAR(50)  NOT NULL,
  "lonniv" NUMERIC(2),
  "staniv" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciniveles_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciniveles" IS '';


-----------------------------------------------------------------------------
-- cipereje
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cipereje" CASCADE;

DROP SEQUENCE IF EXISTS "cipereje_seq";

CREATE SEQUENCE "cipereje_seq";


CREATE TABLE "cipereje"
(
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "fechas" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cipereje_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cipereje" IS '';


-----------------------------------------------------------------------------
-- cireging
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cireging" CASCADE;

DROP SEQUENCE IF EXISTS "cireging_seq";

CREATE SEQUENCE "cireging_seq";


CREATE TABLE "cireging"
(
  "refing" VARCHAR(8)  NOT NULL,
  "fecing" DATE  NOT NULL,
  "desing" VARCHAR(500)  NOT NULL,
  "codtip" VARCHAR(3)  NOT NULL,
  "rifcon" VARCHAR(15),
  "moning" NUMERIC(14,2)  NOT NULL,
  "monrec" NUMERIC(14,2),
  "mondes" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "desanu" VARCHAR(250),
  "fecanu" DATE,
  "staing" VARCHAR(1),
  "ctaban" VARCHAR(20),
  "tipmov" VARCHAR(4),
  "previs" VARCHAR(1),
  "anoing" VARCHAR(4),
  "numdep" VARCHAR(50),
  "numofi" VARCHAR(50),
  "numcom" VARCHAR(8),
  "reflib" VARCHAR(20),
  "staliq" VARCHAR(1),
  "fecliq" DATE,
  "refliq" VARCHAR(10),
  "desliq" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('cireging_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cireging" IS '';


-----------------------------------------------------------------------------
-- ciregingr
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciregingr" CASCADE;

DROP SEQUENCE IF EXISTS "ciregingr_seq";

CREATE SEQUENCE "ciregingr_seq";


CREATE TABLE "ciregingr"
(
  "refing" VARCHAR(8)  NOT NULL,
  "fecing" DATE  NOT NULL,
  "desing" VARCHAR(250),
  "codtip" VARCHAR(3),
  "rifcon" VARCHAR(15),
  "moning" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "mondes" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "desanu" VARCHAR(250),
  "fecanu" DATE,
  "staing" VARCHAR(1),
  "ctaban" VARCHAR(20),
  "tipmov" VARCHAR(4),
  "previs" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciregingr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciregingr" IS '';


-----------------------------------------------------------------------------
-- citiping
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "citiping" CASCADE;

DROP SEQUENCE IF EXISTS "citiping_seq";

CREATE SEQUENCE "citiping_seq";


CREATE TABLE "citiping"
(
  "codtip" VARCHAR(3)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('citiping_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "citiping" IS '';


-----------------------------------------------------------------------------
-- citrasla
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "citrasla" CASCADE;

DROP SEQUENCE IF EXISTS "citrasla_seq";

CREATE SEQUENCE "citrasla_seq";


CREATE TABLE "citrasla"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "anotra" VARCHAR(4),
  "pertra" VARCHAR(2)  NOT NULL,
  "destra" VARCHAR(250),
  "desanu" VARCHAR(250),
  "tottra" NUMERIC(14,2),
  "statra" VARCHAR(1),
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('citrasla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "citrasla" IS '';


-----------------------------------------------------------------------------
-- citiprub
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "citiprub" CASCADE;

DROP SEQUENCE IF EXISTS "citiprub_seq";

CREATE SEQUENCE "citiprub_seq";


CREATE TABLE "citiprub"
(
  "codtiprub" VARCHAR(3)  NOT NULL,
  "destiprub" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('citiprub_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "citiprub" IS '';

