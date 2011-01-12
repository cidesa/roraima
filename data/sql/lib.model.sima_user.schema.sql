
-----------------------------------------------------------------------------
-- apli_user
-----------------------------------------------------------------------------

CREATE SEQUENCE "apli_user_seq";


CREATE TABLE "apli_user"
(
  "codapl" VARCHAR(3)  NOT NULL,
  "loguse" VARCHAR(50)  NOT NULL,
  "codemp" VARCHAR(3)  NOT NULL,
  "nomopc" VARCHAR(50),
  "priuse" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('apli_user_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "apli_user" IS '';


ALTER TABLE "empresa" ALTER nomemp TYPE character varying(50);
        
ALTER TABLE "empresa" ALTER diremp TYPE character varying(50);
        
ALTER TABLE "empresa" ADD "passemp" VARCHAR(10);
        
-----------------------------------------------------------------------------
-- aplifor
-----------------------------------------------------------------------------

CREATE SEQUENCE "aplifor_seq";


CREATE TABLE "aplifor"
(
  "codapl" VARCHAR(3)  NOT NULL,
  "coddiv" VARCHAR(3)  NOT NULL,
  "nomopc" VARCHAR(50)  NOT NULL,
  "desocp" VARCHAR(1000)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('aplifor_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "aplifor" IS '';


-----------------------------------------------------------------------------
-- aplicacion
-----------------------------------------------------------------------------

CREATE SEQUENCE "aplicacion_seq";


CREATE TABLE "aplicacion"
(
  "codapl" VARCHAR(3)  NOT NULL,
  "nomapl" VARCHAR(50)  NOT NULL,
  "nomuse" VARCHAR(30)  NOT NULL,
  "aplact" VARCHAR(1)  NOT NULL,
  "aplpri" VARCHAR(1)  NOT NULL,
  "nomyml" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('aplicacion_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "aplicacion" IS '';


-----------------------------------------------------------------------------
-- division
-----------------------------------------------------------------------------

CREATE SEQUENCE "division_seq";


CREATE TABLE "division"
(
  "coddiv" VARCHAR(3)  NOT NULL,
  "desdiv" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('division_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "division" IS '';


-----------------------------------------------------------------------------
-- segbitaco
-----------------------------------------------------------------------------

CREATE SEQUENCE "segbitaco_seq";


CREATE TABLE "segbitaco"
(
  "refmov" VARCHAR(10)  NOT NULL,
  "codofi" VARCHAR(3),
  "codapl" VARCHAR(3),
  "codintusu" VARCHAR(8),
  "fecope" DATE,
  "horope" TIMESTAMP,
  "valcla" VARCHAR(50),
  "codmod" VARCHAR(50),
  "tipope" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('segbitaco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "segbitaco" IS '';


-----------------------------------------------------------------------------
-- segnivapr
-----------------------------------------------------------------------------

CREATE SEQUENCE "segnivapr_seq";


CREATE TABLE "segnivapr"
(
  "codniv" VARCHAR(3)  NOT NULL,
  "desniv" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('segnivapr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "segnivapr" IS '';


COMMENT ON COLUMN "segnivapr"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- segranapr
-----------------------------------------------------------------------------

CREATE SEQUENCE "segranapr_seq";


CREATE TABLE "segranapr"
(
  "randes" NUMERIC(14,2)  NOT NULL,
  "ranhas" NUMERIC(14,2)  NOT NULL,
  "codniv" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('segranapr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "segranapr" IS '';


-----------------------------------------------------------------------------
-- apernueper
-----------------------------------------------------------------------------

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

