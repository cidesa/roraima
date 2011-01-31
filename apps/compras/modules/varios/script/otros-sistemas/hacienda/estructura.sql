
-----------------------------------------------------------------------------
-- fcabonos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcabonos" CASCADE;

DROP SEQUENCE IF EXISTS "fcabonos_seq";

CREATE SEQUENCE "fcabonos_seq";


CREATE TABLE "fcabonos"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "fueing" VARCHAR(2)  NOT NULL,
  "despag" VARCHAR(250),
  "monpag" NUMERIC(14,2),
  "monefe" NUMERIC(14,2),
  "funpag" VARCHAR(40)  NOT NULL,
  "codrec" VARCHAR(10),
  "salpag" NUMERIC(14,2),
  "stapag" VARCHAR(1),
  "fecrec" DATE,
  "numpag2" VARCHAR(10),
  "numref" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcabonos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcabonos" IS '';


-----------------------------------------------------------------------------
-- fcacceso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcacceso" CASCADE;

DROP SEQUENCE IF EXISTS "fcacceso_seq";

CREATE SEQUENCE "fcacceso_seq";


CREATE TABLE "fcacceso"
(
  "cedula" VARCHAR(14),
  "nomusu" VARCHAR(100),
  "pasusu" VARCHAR(8),
  "autsol" VARCHAR(1),
  "anupag" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcacceso_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcacceso" IS '';


-----------------------------------------------------------------------------
-- fcactcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcactcom" CASCADE;

DROP SEQUENCE IF EXISTS "fcactcom_seq";

CREATE SEQUENCE "fcactcom_seq";


CREATE TABLE "fcactcom"
(
  "codact" VARCHAR(16),
  "desact" VARCHAR(255)  NOT NULL,
  "mintri" NUMERIC(14,2)  NOT NULL,
  "exoner" VARCHAR(1),
  "minofac" VARCHAR(1),
  "tipali" VARCHAR(1),
  "porreb" NUMERIC(14,6),
  "exepto" VARCHAR(1),
  "rebaja" VARCHAR(1),
  "exento" VARCHAR(1),
  "tem" NUMERIC(14,2),
  "afoact" NUMERIC(20,4),
  "anoact" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcactcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcactcom" IS '';


-----------------------------------------------------------------------------
-- fcactcom_hc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcactcom_hc" CASCADE;

DROP SEQUENCE IF EXISTS "fcactcom_hc_seq";

CREATE SEQUENCE "fcactcom_hc_seq";


CREATE TABLE "fcactcom_hc"
(
  "codact" VARCHAR(16),
  "desact" VARCHAR(255)  NOT NULL,
  "mintri" NUMERIC(14,2)  NOT NULL,
  "exoner" VARCHAR(1),
  "minofac" VARCHAR(1),
  "tipali" VARCHAR(1),
  "porreb" NUMERIC(14,6),
  "exepto" VARCHAR(1),
  "rebaja" VARCHAR(1),
  "exento" VARCHAR(1),
  "tem" NUMERIC(14,2),
  "afoact" NUMERIC(20,4),
  "anoact" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcactcom_hc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcactcom_hc" IS '';


-----------------------------------------------------------------------------
-- fcactpic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcactpic" CASCADE;

DROP SEQUENCE IF EXISTS "fcactpic_seq";

CREATE SEQUENCE "fcactpic_seq";


CREATE TABLE "fcactpic"
(
  "numdoc" VARCHAR(10),
  "codact" VARCHAR(16),
  "exoner" VARCHAR(1),
  "monact" NUMERIC(32,2),
  "porexo" NUMERIC(14,2),
  "estact" VARCHAR(1),
  "exento" VARCHAR(1),
  "rebaja" VARCHAR(1),
  "porreb" NUMERIC(14,2),
  "monant" NUMERIC(32,2),
  "impuesto" NUMERIC(14,2),
  "fecven" DATE,
  "anodec" VARCHAR(4),
  "modo" VARCHAR(1),
  "monreb" NUMERIC(32,2) default 0,
  "monexo" NUMERIC(32,2) default 0,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcactpic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcactpic" IS '';


-----------------------------------------------------------------------------
-- fcajuste
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcajuste" CASCADE;

DROP SEQUENCE IF EXISTS "fcajuste_seq";

CREATE SEQUENCE "fcajuste_seq";


CREATE TABLE "fcajuste"
(
  "numaju" VARCHAR(10),
  "fecaju" DATE,
  "desaju" VARCHAR(250),
  "numdec" VARCHAR(10),
  "staaju" VARCHAR(1),
  "monaju" NUMERIC(32,2),
  "monreb" NUMERIC(32,2),
  "monexo" NUMERIC(32,2),
  "monimp" NUMERIC(32,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcajuste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcajuste" IS '';


-----------------------------------------------------------------------------
-- fcaliinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcaliinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcaliinm_seq";

CREATE SEQUENCE "fcaliinm_seq";


CREATE TABLE "fcaliinm"
(
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "valorm" NUMERIC(14,2)  NOT NULL,
  "porvf" NUMERIC(14,2)  NOT NULL,
  "aliter" NUMERIC(14,2)  NOT NULL,
  "alicon" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcaliinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcaliinm" IS '';


-----------------------------------------------------------------------------
-- fcaliuso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcaliuso" CASCADE;

DROP SEQUENCE IF EXISTS "fcaliuso_seq";

CREATE SEQUENCE "fcaliuso_seq";


CREATE TABLE "fcaliuso"
(
  "coduso" VARCHAR(3)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "nomuso" VARCHAR(250)  NOT NULL,
  "alimon" NUMERIC(14,2),
  "pormon" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcaliuso_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcaliuso" IS '';


-----------------------------------------------------------------------------
-- fcapulic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcapulic" CASCADE;

DROP SEQUENCE IF EXISTS "fcapulic_seq";

CREATE SEQUENCE "fcapulic_seq";


CREATE TABLE "fcapulic"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "tipapu" VARCHAR(10),
  "desapu" VARCHAR(250),
  "dirapu" VARCHAR(250),
  "monapu" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "rifrep" VARCHAR(14),
  "staapu" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "semdia" NUMERIC(14,2),
  "exoapu" VARCHAR(1),
  "texexo" VARCHAR(300),
  "fecapu" DATE,
  "serapui" VARCHAR(20),
  "serapuf" VARCHAR(20),
  "horapu" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcapulic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcapulic" IS '';


-----------------------------------------------------------------------------
-- fcapulicdet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcapulicdet" CASCADE;

DROP SEQUENCE IF EXISTS "fcapulicdet_seq";

CREATE SEQUENCE "fcapulicdet_seq";


CREATE TABLE "fcapulicdet"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "tipapu" VARCHAR(10)  NOT NULL,
  "campo" VARCHAR(50)  NOT NULL,
  "valor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcapulicdet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcapulicdet" IS '';


-----------------------------------------------------------------------------
-- fcbanent
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcbanent" CASCADE;

DROP SEQUENCE IF EXISTS "fcbanent_seq";

CREATE SEQUENCE "fcbanent_seq";


CREATE TABLE "fcbanent"
(
  "coddoc" VARCHAR(5)  NOT NULL,
  "codfun" VARCHAR(3)  NOT NULL,
  "codentext" VARCHAR(3)  NOT NULL,
  "codtipdoc" VARCHAR(3)  NOT NULL,
  "fecdoc" DATE,
  "hordoc" DATE,
  "fecres" DATE,
  "asunto" VARCHAR(100),
  "codubifis" VARCHAR(16),
  "fecubifis" DATE,
  "horubifis" DATE,
  "codubimag" VARCHAR(16),
  "fecubimag" DATE,
  "horubimag" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcbanent_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcbanent" IS '';


-----------------------------------------------------------------------------
-- fcbansal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcbansal" CASCADE;

DROP SEQUENCE IF EXISTS "fcbansal_seq";

CREATE SEQUENCE "fcbansal_seq";


CREATE TABLE "fcbansal"
(
  "coddoc" VARCHAR(5)  NOT NULL,
  "codfun" VARCHAR(3)  NOT NULL,
  "codentext" VARCHAR(3)  NOT NULL,
  "codtipdoc" VARCHAR(3)  NOT NULL,
  "fecdoc" DATE,
  "hordoc" DATE,
  "asunto" VARCHAR(100),
  "codubifis" VARCHAR(16),
  "fecubifis" DATE,
  "horubifis" DATE,
  "codubimag" VARCHAR(16),
  "fecubimag" DATE,
  "horubimag" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcbansal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcbansal" IS '';


-----------------------------------------------------------------------------
-- fccajero
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccajero" CASCADE;

DROP SEQUENCE IF EXISTS "fccajero_seq";

CREATE SEQUENCE "fccajero_seq";


CREATE TABLE "fccajero"
(
  "codcaj" VARCHAR(3)  NOT NULL,
  "cedcaj" VARCHAR(15)  NOT NULL,
  "nomcaj" VARCHAR(30)  NOT NULL,
  "dircaj" VARCHAR(50),
  "telcaj" VARCHAR(11),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccajero_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccajero" IS '';


-----------------------------------------------------------------------------
-- fccarinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccarinm" CASCADE;

DROP SEQUENCE IF EXISTS "fccarinm_seq";

CREATE SEQUENCE "fccarinm_seq";


CREATE TABLE "fccarinm"
(
  "codcarinm" VARCHAR(3)  NOT NULL,
  "nomcarinm" VARCHAR(250)  NOT NULL,
  "stacarinm" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fccarinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccarinm" IS '';


-----------------------------------------------------------------------------
-- fccatfis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccatfis" CASCADE;

DROP SEQUENCE IF EXISTS "fccatfis_seq";

CREATE SEQUENCE "fccatfis_seq";


CREATE TABLE "fccatfis"
(
  "codcatfis" VARCHAR(30)  NOT NULL,
  "nomcatfis" VARCHAR(250)  NOT NULL,
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccatfis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccatfis" IS '';


-----------------------------------------------------------------------------
-- fcclaesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcclaesp" CASCADE;

DROP SEQUENCE IF EXISTS "fcclaesp_seq";

CREATE SEQUENCE "fcclaesp_seq";


CREATE TABLE "fcclaesp"
(
  "codcla" VARCHAR(4)  NOT NULL,
  "descla" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcclaesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcclaesp" IS '';


-----------------------------------------------------------------------------
-- fccobrad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccobrad" CASCADE;

DROP SEQUENCE IF EXISTS "fccobrad_seq";

CREATE SEQUENCE "fccobrad_seq";


CREATE TABLE "fccobrad"
(
  "codcob" VARCHAR(3)  NOT NULL,
  "cedcob" VARCHAR(15)  NOT NULL,
  "nomcob" VARCHAR(30)  NOT NULL,
  "dircob" VARCHAR(50),
  "telcob" VARCHAR(11),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccobrad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccobrad" IS '';


-----------------------------------------------------------------------------
-- fccominm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccominm" CASCADE;

DROP SEQUENCE IF EXISTS "fccominm_seq";

CREATE SEQUENCE "fccominm_seq";


CREATE TABLE "fccominm"
(
  "anovig" VARCHAR(4)  NOT NULL,
  "codcom" VARCHAR(6)  NOT NULL,
  "descom" VARCHAR(1000),
  "afeinm" VARCHAR(1),
  "opecom" VARCHAR(1),
  "valcom" NUMERIC(32,3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccominm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccominm" IS '';


-----------------------------------------------------------------------------
-- fccon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccon" CASCADE;

DROP SEQUENCE IF EXISTS "fccon_seq";

CREATE SEQUENCE "fccon_seq";


CREATE TABLE "fccon"
(
  "rifcon" VARCHAR(14),
  "repcon" VARCHAR(1),
  "nitcon" VARCHAR(14),
  "nomcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "dircon" VARCHAR(50),
  "codpar" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "tipcon" VARCHAR(1),
  "telcon" VARCHAR(30),
  "faxcon" VARCHAR(15),
  "emacon" VARCHAR(50),
  "urlcon" VARCHAR(50),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccon" IS '';


-----------------------------------------------------------------------------
-- fcconpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconpag" CASCADE;

DROP SEQUENCE IF EXISTS "fcconpag_seq";

CREATE SEQUENCE "fcconpag_seq";


CREATE TABLE "fcconpag"
(
  "refcon" VARCHAR(15)  NOT NULL,
  "feccon" DATE  NOT NULL,
  "moncon" NUMERIC(14,2)  NOT NULL,
  "estcon" VARCHAR(1),
  "rifcon" VARCHAR(14)  NOT NULL,
  "obscon" VARCHAR(250),
  "funrec" VARCHAR(100),
  "fecrec" DATE,
  "numcuo" NUMERIC(14,2)  NOT NULL,
  "moncuo" NUMERIC(14,2)  NOT NULL,
  "totcuo" NUMERIC(14,2)  NOT NULL,
  "porini" NUMERIC(14,2)  NOT NULL,
  "monini" NUMERIC(14,2)  NOT NULL,
  "porfin" NUMERIC(14,2)  NOT NULL,
  "monfin" NUMERIC(14,2)  NOT NULL,
  "datced" VARCHAR(14),
  "datnac" VARCHAR(14),
  "datnom" VARCHAR(50),
  "datdir" VARCHAR(60),
  "dattel" VARCHAR(14),
  "datcar" VARCHAR(60),
  "datreg" VARCHAR(300),
  "datcon" VARCHAR(300),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconpag" IS '';


-----------------------------------------------------------------------------
-- fcconrep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrep" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrep_seq";

CREATE SEQUENCE "fcconrep_seq";


CREATE TABLE "fcconrep"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "tem" NUMERIC(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrep" IS '';


-----------------------------------------------------------------------------
-- fcconrep1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrep1" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrep1_seq";

CREATE SEQUENCE "fcconrep1_seq";


CREATE TABLE "fcconrep1"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrep1" IS '';


-----------------------------------------------------------------------------
-- fcconrep2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrep2" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrep2_seq";

CREATE SEQUENCE "fcconrep2_seq";


CREATE TABLE "fcconrep2"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrep2" IS '';


-----------------------------------------------------------------------------
-- fcconrepco
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrepco" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrepco_seq";

CREATE SEQUENCE "fcconrepco_seq";


CREATE TABLE "fcconrepco"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(14),
  "nomcon" VARCHAR(120),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(80),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrepco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrepco" IS '';


-----------------------------------------------------------------------------
-- fcconrepres1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrepres1" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrepres1_seq";

CREATE SEQUENCE "fcconrepres1_seq";


CREATE TABLE "fcconrepres1"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrepres1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrepres1" IS '';


-----------------------------------------------------------------------------
-- fcconrepresp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrepresp" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrepresp_seq";

CREATE SEQUENCE "fcconrepresp_seq";


CREATE TABLE "fcconrepresp"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "tem" NUMERIC(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrepresp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrepresp" IS '';


-----------------------------------------------------------------------------
-- fcdecatp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdecatp" CASCADE;

DROP SEQUENCE IF EXISTS "fcdecatp_seq";

CREATE SEQUENCE "fcdecatp_seq";


CREATE TABLE "fcdecatp"
(
  "numdec" VARCHAR(10)  NOT NULL,
  "numsol" VARCHAR(10)  NOT NULL,
  "numlic" VARCHAR(10)  NOT NULL,
  "fecdec" DATE  NOT NULL,
  "mondec" NUMERIC(14,2)  NOT NULL,
  "fundec" VARCHAR(40)  NOT NULL,
  "edodec" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdecatp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdecatp" IS '';


-----------------------------------------------------------------------------
-- fcdeclar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeclar" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeclar_seq";

CREATE SEQUENCE "fcdeclar_seq";


CREATE TABLE "fcdeclar"
(
  "numdec" VARCHAR(10),
  "fecven" DATE,
  "fueing" VARCHAR(3),
  "fecdec" DATE,
  "rifcon" VARCHAR(20),
  "tipo" VARCHAR(3),
  "numref" VARCHAR(30),
  "nombre" VARCHAR(500),
  "mondec" NUMERIC(14,2),
  "edodec" VARCHAR(1),
  "mora" NUMERIC(14,2),
  "prontopg" NUMERIC(14,2),
  "autliq" NUMERIC(14,2),
  "fundec" VARCHAR(40),
  "codrec" VARCHAR(10),
  "modo" VARCHAR(1),
  "numero" VARCHAR(2),
  "conpag" VARCHAR(1) default '',
  "monabo" NUMERIC(14,2) default 0,
  "numabo" VARCHAR(10),
  "nomcon" VARCHAR(255),
  "otro" VARCHAR(30),
  "miginc" VARCHAR(1),
  "anodec" VARCHAR(4),
  "fecultpag" DATE,
  "fecini" DATE,
  "feccie" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeclar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeclar" IS '';


-----------------------------------------------------------------------------
-- fcdeclar2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeclar2" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeclar2_seq";

CREATE SEQUENCE "fcdeclar2_seq";


CREATE TABLE "fcdeclar2"
(
  "numdec" VARCHAR(10),
  "fecven" DATE,
  "fueing" VARCHAR(3),
  "fecdec" DATE,
  "rifcon" VARCHAR(20),
  "tipo" VARCHAR(3),
  "numref" VARCHAR(15),
  "nombre" VARCHAR(100),
  "mondec" NUMERIC(14,2),
  "edodec" VARCHAR(1),
  "mora" NUMERIC(14,2),
  "prontopg" NUMERIC(14,2),
  "autliq" NUMERIC(14,2),
  "fundec" VARCHAR(40),
  "codrec" VARCHAR(10),
  "modo" VARCHAR(1),
  "numero" VARCHAR(2),
  "conpag" VARCHAR(1),
  "monabo" NUMERIC(14,2),
  "numabo" VARCHAR(10),
  "nomcon" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeclar2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeclar2" IS '';


-----------------------------------------------------------------------------
-- fcdecpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdecpag" CASCADE;

DROP SEQUENCE IF EXISTS "fcdecpag_seq";

CREATE SEQUENCE "fcdecpag_seq";


CREATE TABLE "fcdecpag"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "numdec" VARCHAR(10),
  "numref" VARCHAR(32),
  "fecven" DATE  NOT NULL,
  "mondec" NUMERIC(14,2),
  "numero" VARCHAR(2),
  "fueing" VARCHAR(2),
  "monpag" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdecpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdecpag" IS '';


-----------------------------------------------------------------------------
-- fcdefdesc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefdesc" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefdesc_seq";

CREATE SEQUENCE "fcdefdesc_seq";


CREATE TABLE "fcdefdesc"
(
  "coddes" VARCHAR(4)  NOT NULL,
  "nomdes" VARCHAR(250),
  "codfue" VARCHAR(2),
  "tipo" VARCHAR(1),
  "modo" VARCHAR(1),
  "limita" VARCHAR(1),
  "auto" VARCHAR(1),
  "anoact" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdesc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefdesc" IS '';


-----------------------------------------------------------------------------
-- fcdefdetsol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefdetsol" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefdetsol_seq";

CREATE SEQUENCE "fcdefdetsol_seq";


CREATE TABLE "fcdefdetsol"
(
  "codsol" VARCHAR(2),
  "tipo" VARCHAR(1),
  "cuantos" VARCHAR(1),
  "propie" VARCHAR(1),
  "imprim" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdetsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefdetsol" IS '';


-----------------------------------------------------------------------------
-- fcdefdetsol2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefdetsol2" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefdetsol2_seq";

CREATE SEQUENCE "fcdefdetsol2_seq";


CREATE TABLE "fcdefdetsol2"
(
  "codsol" VARCHAR(2),
  "tipo" VARCHAR(1),
  "cuantos" VARCHAR(1),
  "propie" VARCHAR(1),
  "imprim" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdetsol2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefdetsol2" IS '';


-----------------------------------------------------------------------------
-- fcdefentext
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefentext" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefentext_seq";

CREATE SEQUENCE "fcdefentext_seq";


CREATE TABLE "fcdefentext"
(
  "codentext" VARCHAR(3)  NOT NULL,
  "nomentext" VARCHAR(50)  NOT NULL,
  "pernatjur" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefentext_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefentext" IS '';


-----------------------------------------------------------------------------
-- fcdeffun
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeffun" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeffun_seq";

CREATE SEQUENCE "fcdeffun_seq";


CREATE TABLE "fcdeffun"
(
  "codfun" VARCHAR(3)  NOT NULL,
  "nomfun" VARCHAR(50)  NOT NULL,
  "coduniadm" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeffun_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeffun" IS '';


-----------------------------------------------------------------------------
-- fcdefins
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefins" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefins_seq";

CREATE SEQUENCE "fcdefins_seq";


CREATE TABLE "fcdefins"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "loncodact" NUMERIC(2),
  "loncodveh" NUMERIC(2),
  "loncodcat" NUMERIC(2),
  "loncodubifis" NUMERIC(2),
  "loncodubimag" NUMERIC(2),
  "rupact" NUMERIC(2),
  "rupveh" NUMERIC(2),
  "rupcat" NUMERIC(2),
  "rupubifis" NUMERIC(2),
  "rupubimag" NUMERIC(2),
  "foract" VARCHAR(16)  NOT NULL,
  "forveh" VARCHAR(16)  NOT NULL,
  "forcat" VARCHAR(20)  NOT NULL,
  "forubifis" VARCHAR(16)  NOT NULL,
  "forubimag" VARCHAR(16)  NOT NULL,
  "porpic" VARCHAR(1)  NOT NULL,
  "porveh" VARCHAR(1)  NOT NULL,
  "porinm" VARCHAR(1)  NOT NULL,
  "unipic" VARCHAR(1)  NOT NULL,
  "valunitri" NUMERIC(19,3),
  "unitas" VARCHAR(1),
  "codpic" VARCHAR(2),
  "codveh" VARCHAR(2),
  "codinm" VARCHAR(2),
  "codpro" VARCHAR(2),
  "codesp" VARCHAR(2),
  "codapu" VARCHAR(2),
  "codajupic" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefins_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefins" IS '';


-----------------------------------------------------------------------------
-- fcdefnca
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefnca" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefnca_seq";

CREATE SEQUENCE "fcdefnca_seq";


CREATE TABLE "fcdefnca"
(
  "codpar" VARCHAR(4),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "numniv" NUMERIC(2)  NOT NULL,
  "nomext1" VARCHAR(210)  NOT NULL,
  "nomabr1" VARCHAR(9)  NOT NULL,
  "tamano1" NUMERIC(1)  NOT NULL,
  "nomext2" VARCHAR(210),
  "nomabr2" VARCHAR(9),
  "tamano2" NUMERIC(1),
  "nomext3" VARCHAR(210),
  "nomabr3" VARCHAR(9),
  "tamano3" NUMERIC(1),
  "nomext4" VARCHAR(210),
  "nomabr4" VARCHAR(9),
  "tamano4" NUMERIC(1),
  "nomext5" VARCHAR(210),
  "nomabr5" VARCHAR(9),
  "tamano5" NUMERIC(1),
  "nomext6" VARCHAR(210),
  "nomabr6" VARCHAR(9),
  "tamano6" NUMERIC(1),
  "nomext7" VARCHAR(210),
  "nomabr7" VARCHAR(9),
  "tamano7" NUMERIC(1),
  "nomext8" VARCHAR(210),
  "nomabr8" VARCHAR(9),
  "tamano8" NUMERIC(1),
  "nomext9" VARCHAR(210),
  "nomabr9" VARCHAR(9),
  "tamano9" NUMERIC(1),
  "nomext10" VARCHAR(210),
  "nomabr10" VARCHAR(9),
  "tamano10" NUMERIC(10),
  "nivinm" VARCHAR(2),
  "numper" NUMERIC(3),
  "denumper" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefnca_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefnca" IS '';


-----------------------------------------------------------------------------
-- fcdefpgi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefpgi" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefpgi_seq";

CREATE SEQUENCE "fcdefpgi_seq";


CREATE TABLE "fcdefpgi"
(
  "mondes" NUMERIC(14,2)  NOT NULL,
  "monhas" NUMERIC(14,2)  NOT NULL,
  "monpag" NUMERIC(14,2)  NOT NULL,
  "numpor" VARCHAR(3),
  "despgi" VARCHAR(20),
  "desabr" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefpgi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefpgi" IS '';


-----------------------------------------------------------------------------
-- fcdefrecdes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefrecdes" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefrecdes_seq";

CREATE SEQUENCE "fcdefrecdes_seq";


CREATE TABLE "fcdefrecdes"
(
  "coddes" VARCHAR(4),
  "codrec" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefrecdes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefrecdes" IS '';


-----------------------------------------------------------------------------
-- fcdefrecint
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefrecint" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefrecint_seq";

CREATE SEQUENCE "fcdefrecint_seq";


CREATE TABLE "fcdefrecint"
(
  "codrec" VARCHAR(4),
  "nomrec" VARCHAR(250),
  "tipo" VARCHAR(1),
  "modo" VARCHAR(1),
  "periodo" VARCHAR(1) default '',
  "promedio" VARCHAR(1) default '',
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefrecint_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefrecint" IS '';


-----------------------------------------------------------------------------
-- fcdeftipdoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeftipdoc" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeftipdoc_seq";

CREATE SEQUENCE "fcdeftipdoc_seq";


CREATE TABLE "fcdeftipdoc"
(
  "codtipdoc" VARCHAR(3)  NOT NULL,
  "nomtipdoc" VARCHAR(50)  NOT NULL,
  "temtipdoc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeftipdoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeftipdoc" IS '';


-----------------------------------------------------------------------------
-- fcdefubifis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefubifis" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefubifis_seq";

CREATE SEQUENCE "fcdefubifis_seq";


CREATE TABLE "fcdefubifis"
(
  "codubifis" VARCHAR(16)  NOT NULL,
  "nomubifis" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefubifis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefubifis" IS '';


-----------------------------------------------------------------------------
-- fcdefubimag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefubimag" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefubimag_seq";

CREATE SEQUENCE "fcdefubimag_seq";


CREATE TABLE "fcdefubimag"
(
  "codubimag" VARCHAR(16)  NOT NULL,
  "nomubimag" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefubimag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefubimag" IS '';


-----------------------------------------------------------------------------
-- fcdefuniadm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefuniadm" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefuniadm_seq";

CREATE SEQUENCE "fcdefuniadm_seq";


CREATE TABLE "fcdefuniadm"
(
  "coduniadm" VARCHAR(3)  NOT NULL,
  "nomuniadm" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefuniadm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefuniadm" IS '';


-----------------------------------------------------------------------------
-- fcdesveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdesveh" CASCADE;

DROP SEQUENCE IF EXISTS "fcdesveh_seq";

CREATE SEQUENCE "fcdesveh_seq";


CREATE TABLE "fcdesveh"
(
  "numdes" VARCHAR(10)  NOT NULL,
  "plaveh" VARCHAR(8)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "motdes" VARCHAR(200)  NOT NULL,
  "funrec" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdesveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdesveh" IS '';


-----------------------------------------------------------------------------
-- fcdetabo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetabo" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetabo_seq";

CREATE SEQUENCE "fcdetabo_seq";


CREATE TABLE "fcdetabo"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "nrodet" VARCHAR(30)  NOT NULL,
  "monpag" NUMERIC(14,2),
  "tippag" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetabo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetabo" IS '';


-----------------------------------------------------------------------------
-- fcdetcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetcon" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetcon_seq";

CREATE SEQUENCE "fcdetcon_seq";


CREATE TABLE "fcdetcon"
(
  "refcon" VARCHAR(15)  NOT NULL,
  "numdec" VARCHAR(10)  NOT NULL,
  "moncuo" NUMERIC(14,2),
  "numcuo" VARCHAR(2),
  "monpag" NUMERIC(14,2),
  "obscuo" VARCHAR(100),
  "fecven" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetcon" IS '';


-----------------------------------------------------------------------------
-- fcdetconfue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetconfue" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetconfue_seq";

CREATE SEQUENCE "fcdetconfue_seq";


CREATE TABLE "fcdetconfue"
(
  "refcon" VARCHAR(15)  NOT NULL,
  "numdec" VARCHAR(10)  NOT NULL,
  "moncuo" NUMERIC(14,2),
  "numcuo" VARCHAR(2),
  "monpag" NUMERIC(14,2),
  "obscuo" VARCHAR(100),
  "fecven" DATE,
  "fuente" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetconfue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetconfue" IS '';


-----------------------------------------------------------------------------
-- fcdetinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetinm_seq";

CREATE SEQUENCE "fcdetinm_seq";


CREATE TABLE "fcdetinm"
(
  "nroinm" VARCHAR(15),
  "anoava" VARCHAR(4),
  "codest" VARCHAR(6),
  "codzon" VARCHAR(3),
  "codtip" VARCHAR(3),
  "anocon" VARCHAR(4),
  "valter" NUMERIC(32,3),
  "valcon" NUMERIC(32,3),
  "mtrter" NUMERIC(32,3),
  "mtrcon" NUMERIC(32,3),
  "dprcon" NUMERIC(32,3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetinm" IS '';


-----------------------------------------------------------------------------
-- fcdetpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetpag" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetpag_seq";

CREATE SEQUENCE "fcdetpag_seq";


CREATE TABLE "fcdetpag"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "nrodet" VARCHAR(30)  NOT NULL,
  "monpag" NUMERIC(14,2),
  "tippag" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetpag" IS '';


-----------------------------------------------------------------------------
-- fcdetreccob
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetreccob" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetreccob_seq";

CREATE SEQUENCE "fcdetreccob_seq";


CREATE TABLE "fcdetreccob"
(
  "nument" VARCHAR(10)  NOT NULL,
  "codrec" VARCHAR(10)  NOT NULL,
  "codcob" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetreccob_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetreccob" IS '';


-----------------------------------------------------------------------------
-- fcdetrep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetrep" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetrep_seq";

CREATE SEQUENCE "fcdetrep_seq";


CREATE TABLE "fcdetrep"
(
  "numrep" VARCHAR(15),
  "descrip" VARCHAR(150),
  "tipo" VARCHAR(3),
  "monto" NUMERIC(14,2),
  "fecha" DATE,
  "fuente" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetrep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetrep" IS '';


-----------------------------------------------------------------------------
-- fcdetret
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetret" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetret_seq";

CREATE SEQUENCE "fcdetret_seq";


CREATE TABLE "fcdetret"
(
  "numret" VARCHAR(10)  NOT NULL,
  "numref" VARCHAR(15)  NOT NULL,
  "monasi" NUMERIC(14,2) default 0,
  "monabo" NUMERIC(14,2) default 0,
  "mondeu" NUMERIC(14,2) default 0,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetret" IS '';


-----------------------------------------------------------------------------
-- fcdeucon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeucon" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeucon_seq";

CREATE SEQUENCE "fcdeucon_seq";


CREATE TABLE "fcdeucon"
(
  "refcon" VARCHAR(15)  NOT NULL,
  "numdec" VARCHAR(10)  NOT NULL,
  "numero" VARCHAR(2),
  "fecven" DATE,
  "fueing" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeucon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeucon" IS '';


-----------------------------------------------------------------------------
-- fcdprinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdprinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcdprinm_seq";

CREATE SEQUENCE "fcdprinm_seq";


CREATE TABLE "fcdprinm"
(
  "anovig" VARCHAR(4)  NOT NULL,
  "antinm" NUMERIC  NOT NULL,
  "codestinm" VARCHAR(6)  NOT NULL,
  "mondpr" NUMERIC(32,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdprinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdprinm" IS '';


-----------------------------------------------------------------------------
-- fcesplic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcesplic" CASCADE;

DROP SEQUENCE IF EXISTS "fcesplic_seq";

CREATE SEQUENCE "fcesplic_seq";


CREATE TABLE "fcesplic"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "tipesp" VARCHAR(10),
  "desesp" VARCHAR(250),
  "diresp" VARCHAR(250),
  "monesp" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "rifrep" VARCHAR(14),
  "staesp" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "semdia" NUMERIC(14,2),
  "texexo" VARCHAR(300),
  "fecesp" DATE,
  "horespi" VARCHAR(20),
  "nroent" NUMERIC(14,2),
  "monent" NUMERIC(14,2),
  "exoesp" VARCHAR(1),
  "horespf" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcesplic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcesplic" IS '';


-----------------------------------------------------------------------------
-- fcesplicdet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcesplicdet" CASCADE;

DROP SEQUENCE IF EXISTS "fcesplicdet_seq";

CREATE SEQUENCE "fcesplicdet_seq";


CREATE TABLE "fcesplicdet"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "tipesp" VARCHAR(10)  NOT NULL,
  "campo" VARCHAR(50)  NOT NULL,
  "valor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcesplicdet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcesplicdet" IS '';


-----------------------------------------------------------------------------
-- fcesppub
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcesppub" CASCADE;

DROP SEQUENCE IF EXISTS "fcesppub_seq";

CREATE SEQUENCE "fcesppub_seq";


CREATE TABLE "fcesppub"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "rifrep" VARCHAR(14),
  "nomesp" VARCHAR(100),
  "diresp" VARCHAR(100),
  "fecesp" DATE,
  "horesp" VARCHAR(20),
  "tipesp" VARCHAR(10),
  "nroent" NUMERIC(14,2),
  "monent" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "nomres" VARCHAR(250),
  "dirres" VARCHAR(100),
  "telres" VARCHAR(15),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "staesp" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcesppub_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcesppub" IS '';


-----------------------------------------------------------------------------
-- fcestado
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcestado" CASCADE;

DROP SEQUENCE IF EXISTS "fcestado_seq";

CREATE SEQUENCE "fcestado_seq";


CREATE TABLE "fcestado"
(
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nomedo" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcestado_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcestado" IS '';


-----------------------------------------------------------------------------
-- fcesting
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcesting" CASCADE;

DROP SEQUENCE IF EXISTS "fcesting_seq";

CREATE SEQUENCE "fcesting_seq";


CREATE TABLE "fcesting"
(
  "codpar" VARCHAR(16)  NOT NULL,
  "ano" VARCHAR(4)  NOT NULL,
  "perest" VARCHAR(2)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcesting_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcesting" IS '';


-----------------------------------------------------------------------------
-- fcestinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcestinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcestinm_seq";

CREATE SEQUENCE "fcestinm_seq";


CREATE TABLE "fcestinm"
(
  "codestinm" VARCHAR(6)  NOT NULL,
  "desestinm" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcestinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcestinm" IS '';


-----------------------------------------------------------------------------
-- fcfuentesmul
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcfuentesmul" CASCADE;

DROP SEQUENCE IF EXISTS "fcfuentesmul_seq";

CREATE SEQUENCE "fcfuentesmul_seq";


CREATE TABLE "fcfuentesmul"
(
  "codmul" VARCHAR(4),
  "codfue" VARCHAR(2),
  "codfuegen" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcfuentesmul_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcfuentesmul" IS '';


-----------------------------------------------------------------------------
-- fcfuentesrec
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcfuentesrec" CASCADE;

DROP SEQUENCE IF EXISTS "fcfuentesrec_seq";

CREATE SEQUENCE "fcfuentesrec_seq";


CREATE TABLE "fcfuentesrec"
(
  "codrec" VARCHAR(4),
  "codfue" VARCHAR(2),
  "codfuegen" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcfuentesrec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcfuentesrec" IS '';


-----------------------------------------------------------------------------
-- fcfuepre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcfuepre" CASCADE;

DROP SEQUENCE IF EXISTS "fcfuepre_seq";

CREATE SEQUENCE "fcfuepre_seq";


CREATE TABLE "fcfuepre"
(
  "codfue" VARCHAR(2)  NOT NULL,
  "nomfue" VARCHAR(100)  NOT NULL,
  "nomabr" VARCHAR(3)  NOT NULL,
  "frecob" NUMERIC(3),
  "monmor" NUMERIC(14,2),
  "permor" NUMERIC(3),
  "propag" NUMERIC(14,2),
  "perppg" NUMERIC(3),
  "liqact" NUMERIC(15),
  "deufec" NUMERIC(14,2),
  "recfec" NUMERIC(14,2),
  "fecufa" DATE,
  "ingrec" VARCHAR(18),
  "fueing" VARCHAR(32),
  "inieje" DATE,
  "fineje" DATE,
  "diavso" NUMERIC(3),
  "codprei" VARCHAR(16),
  "deufra" VARCHAR(1)  NOT NULL,
  "autliq" VARCHAR(1)  NOT NULL,
  "simpre" VARCHAR(1)  NOT NULL,
  "feccie" DATE,
  "tipmul" VARCHAR(1),
  "fecest" DATE,
  "diaven" NUMERIC(10) default 0,
  "tipven" VARCHAR(1) default 'I',
  "tipfue" CHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcfuepre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcfuepre" IS '';


-----------------------------------------------------------------------------
-- fcinmcam
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcinmcam" CASCADE;

DROP SEQUENCE IF EXISTS "fcinmcam_seq";

CREATE SEQUENCE "fcinmcam_seq";


CREATE TABLE "fcinmcam"
(
  "nroinm" VARCHAR(255),
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3),
  "codcarinm" VARCHAR(3),
  "codsitinm" VARCHAR(3),
  "rifcon" VARCHAR(14),
  "fecpag" DATE,
  "feccal" DATE,
  "fecreg" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "mtrter" NUMERIC(14,2),
  "mtrcon" NUMERIC(14,2),
  "bster" NUMERIC(14,2),
  "bscon" NUMERIC(14,2),
  "docpro" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "funrec" VARCHAR(40),
  "fecrec" DATE,
  "estinm" VARCHAR(1),
  "estdec" VARCHAR(1),
  "codcatinm" VARCHAR(30),
  "nomcon" VARCHAR(120),
  "dircon" VARCHAR(250),
  "clacon" VARCHAR(12),
  "fecadq" DATE,
  "valinm" NUMERIC(14,2),
  "codman" VARCHAR(4),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nroinmant" VARCHAR(15),
  "totter" NUMERIC(14,2),
  "totcon" NUMERIC(14,2),
  "total" NUMERIC(14,2),
  "codtip" VARCHAR(2),
  "codzon" NUMERIC(14,2),
  "destip" VARCHAR(150),
  "deszon" VARCHAR(50),
  "anual" NUMERIC(14,2),
  "folio" VARCHAR(10),
  "tomo" VARCHAR(1),
  "numdoc" NUMERIC(14,2),
  "fecdoc" DATE,
  "usoinm" VARCHAR(50),
  "desde" VARCHAR(50),
  "hasta" VARCHAR(50),
  "ord" VARCHAR(4),
  "art" VARCHAR(10),
  "fecdir" DATE,
  "fecava" DATE,
  "dirinm1" VARCHAR(255),
  "fecela" DATE,
  "tri" VARCHAR(20),
  "prot" VARCHAR(20),
  "tipobol" VARCHAR(150),
  "nomsitinm" VARCHAR(255),
  "impanu" NUMERIC(14,2),
  "imptri" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcinmcam_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcinmcam" IS '';


-----------------------------------------------------------------------------
-- fcinmcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcinmcom" CASCADE;

DROP SEQUENCE IF EXISTS "fcinmcom_seq";

CREATE SEQUENCE "fcinmcom_seq";


CREATE TABLE "fcinmcom"
(
  "nroinm" VARCHAR(15),
  "anoava" VARCHAR(4),
  "codcom" VARCHAR(6),
  "valcom" NUMERIC(32,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcinmcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcinmcom" IS '';


-----------------------------------------------------------------------------
-- fcinmmod
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcinmmod" CASCADE;

DROP SEQUENCE IF EXISTS "fcinmmod_seq";

CREATE SEQUENCE "fcinmmod_seq";


CREATE TABLE "fcinmmod"
(
  "nroinm" VARCHAR(255),
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3),
  "codcarinm" VARCHAR(3),
  "codsitinm" VARCHAR(3),
  "rifcon" VARCHAR(14),
  "fecpag" DATE,
  "feccal" DATE,
  "fecreg" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "mtrter" NUMERIC(14,2),
  "mtrcon" NUMERIC(14,2),
  "bster" NUMERIC(14,2),
  "bscon" NUMERIC(14,2),
  "docpro" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "funrec" VARCHAR(40),
  "fecrec" DATE,
  "estinm" VARCHAR(1),
  "estdec" VARCHAR(1),
  "codcatinm" VARCHAR(30),
  "nomcon" VARCHAR(120),
  "dircon" VARCHAR(250),
  "clacon" VARCHAR(12),
  "fecadq" DATE,
  "valinm" NUMERIC(14,2),
  "codman" VARCHAR(4),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nroinmant" VARCHAR(15),
  "totter" NUMERIC(14,2),
  "totcon" NUMERIC(14,2),
  "total" NUMERIC(14,2),
  "codtip" VARCHAR(2),
  "codzon" NUMERIC(14,2),
  "destip" VARCHAR(150),
  "deszon" VARCHAR(50),
  "anual" NUMERIC(14,2),
  "folio" VARCHAR(10),
  "tomo" VARCHAR(1),
  "numdoc" NUMERIC(14,2),
  "fecdoc" DATE,
  "usoinm" VARCHAR(50),
  "desde" VARCHAR(50),
  "hasta" VARCHAR(50),
  "ord" VARCHAR(4),
  "art" VARCHAR(10),
  "fecdir" DATE,
  "fecava" DATE,
  "dirinm1" VARCHAR(255),
  "fecela" DATE,
  "tri" VARCHAR(20),
  "prot" VARCHAR(20),
  "tipobol" VARCHAR(150),
  "nomsitinm" VARCHAR(255),
  "impanu" NUMERIC(14,2),
  "imptri" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcinmmod_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcinmmod" IS '';


-----------------------------------------------------------------------------
-- fcmodapu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodapu" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodapu_seq";

CREATE SEQUENCE "fcmodapu_seq";


CREATE TABLE "fcmodapu"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "tipapu" VARCHAR(4),
  "desapu" VARCHAR(250),
  "monapu" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "tipapuant" VARCHAR(4),
  "desapuant" VARCHAR(250),
  "monapuant" NUMERIC(14,2),
  "monimpant" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodapu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodapu" IS '';


-----------------------------------------------------------------------------
-- fcmodesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodesp" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodesp_seq";

CREATE SEQUENCE "fcmodesp_seq";


CREATE TABLE "fcmodesp"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "nomesp" VARCHAR(100),
  "diresp" VARCHAR(100),
  "fecesp" DATE,
  "horesp" VARCHAR(20),
  "tipesp" VARCHAR(4),
  "nroent" NUMERIC(14,2),
  "monent" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "nomres" VARCHAR(250),
  "dirres" VARCHAR(100),
  "telres" VARCHAR(15),
  "nomespant" VARCHAR(100),
  "direspant" VARCHAR(100),
  "fecespant" DATE,
  "horespant" VARCHAR(20),
  "tipespant" VARCHAR(4),
  "nroentant" NUMERIC(14,2),
  "monentant" NUMERIC(14,2),
  "monimpant" NUMERIC(14,2),
  "nomresant" VARCHAR(250),
  "dirresant" VARCHAR(100),
  "telresant" VARCHAR(15),
  "funrec" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodesp" IS '';


-----------------------------------------------------------------------------
-- fcmodinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodinm_seq";

CREATE SEQUENCE "fcmodinm_seq";


CREATE TABLE "fcmodinm"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "nroinm" VARCHAR(15)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3)  NOT NULL,
  "codcarinm" VARCHAR(3)  NOT NULL,
  "codsitinm" VARCHAR(3),
  "fecpag" DATE,
  "feccal" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(30),
  "linsur" VARCHAR(30),
  "linest" VARCHAR(30),
  "linoes" VARCHAR(30),
  "mtrter" NUMERIC(14,2),
  "mtrcon" NUMERIC(14,2),
  "bster" NUMERIC(14,2),
  "bscon" NUMERIC(14,2),
  "docpro" VARCHAR(200),
  "codcatfisant" VARCHAR(30)  NOT NULL,
  "codusoant" VARCHAR(3)  NOT NULL,
  "codcarinmant" VARCHAR(3)  NOT NULL,
  "codsitinmant" VARCHAR(3),
  "fecpagant" DATE,
  "feccalant" DATE,
  "dirinmant" VARCHAR(255),
  "linnorant" VARCHAR(30),
  "linsurant" VARCHAR(30),
  "linestant" VARCHAR(30),
  "linoesant" VARCHAR(30),
  "mtrterant" NUMERIC(14,2),
  "mtrconant" NUMERIC(14,2),
  "bsterant" NUMERIC(14,2),
  "bsconant" NUMERIC(14,2),
  "docproant" VARCHAR(200),
  "funrec" VARCHAR(40),
  "codcatinm" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodinm" IS '';


-----------------------------------------------------------------------------
-- fcmodlic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodlic" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodlic_seq";

CREATE SEQUENCE "fcmodlic_seq";


CREATE TABLE "fcmodlic"
(
  "refmod" VARCHAR(12),
  "fecmod" DATE,
  "motmod" VARCHAR(300),
  "numsol" VARCHAR(12),
  "numlic" VARCHAR(12),
  "fecsol" DATE,
  "feclic" DATE,
  "rifcon" VARCHAR(20),
  "catcon" VARCHAR(30),
  "rifrep" VARCHAR(20),
  "nomneg" VARCHAR(120),
  "tipinm" VARCHAR(1),
  "tipest" VARCHAR(1),
  "dirpri" VARCHAR(255),
  "codrut" VARCHAR(6),
  "capsoc" NUMERIC(15),
  "horini" DATE,
  "horcie" DATE,
  "fecini" DATE,
  "fecfin" DATE,
  "discli" NUMERIC(10),
  "disbar" NUMERIC(10),
  "disdis" NUMERIC(10),
  "disins" NUMERIC(10),
  "disfun" NUMERIC(10),
  "disest" NUMERIC(10),
  "funres" VARCHAR(60),
  "funrel" VARCHAR(40),
  "fecres" DATE,
  "fecapr" DATE,
  "fecven" DATE,
  "tomo" VARCHAR(8),
  "folio" VARCHAR(8),
  "numero" VARCHAR(8),
  "taslic" NUMERIC(15),
  "deuanl" NUMERIC(15),
  "deuacl" NUMERIC(15),
  "implic" NUMERIC(15),
  "deuanp" NUMERIC(15),
  "deuacp" NUMERIC(15),
  "stasol" VARCHAR(1),
  "stalic" VARCHAR(1),
  "stadec" VARCHAR(1),
  "staliq" VARCHAR(1),
  "nomcon" VARCHAR(255),
  "dircon" VARCHAR(255),
  "tipo" VARCHAR(1),
  "estser" VARCHAR(1) default '',
  "telneg" VARCHAR(15),
  "clacon" VARCHAR(12),
  "capact" NUMERIC(15),
  "numsol1" VARCHAR(12),
  "numlic1" VARCHAR(12),
  "horainie" DATE,
  "horaciee" DATE,
  "unitri" NUMERIC(14,2),
  "tipsol" VARCHAR(1),
  "unitrialc" NUMERIC(14,2),
  "unitriotr" NUMERIC(14,2),
  "licant" VARCHAR(12),
  "dueant" VARCHAR(14),
  "dirant" VARCHAR(50),
  "impext" NUMERIC(15),
  "imptotal" NUMERIC(15),
  "codact" VARCHAR(16),
  "codtiplic" VARCHAR(6),
  "fecinilic" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodlic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodlic" IS '';


-----------------------------------------------------------------------------
-- fcmodpro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodpro" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodpro_seq";

CREATE SEQUENCE "fcmodpro_seq";


CREATE TABLE "fcmodpro"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "tippro" VARCHAR(4),
  "despro" VARCHAR(250),
  "dirpro" VARCHAR(250),
  "monpro" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "tipproant" VARCHAR(4),
  "desproant" VARCHAR(250),
  "dirproant" VARCHAR(250),
  "monproant" NUMERIC(14,2),
  "monimpant" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodpro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodpro" IS '';


-----------------------------------------------------------------------------
-- fcmodveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodveh" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodveh_seq";

CREATE SEQUENCE "fcmodveh_seq";


CREATE TABLE "fcmodveh"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "plaveh" VARCHAR(8)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "coduso" VARCHAR(16)  NOT NULL,
  "anoveh" NUMERIC(4)  NOT NULL,
  "sermot" VARCHAR(15),
  "sercar" VARCHAR(15),
  "marveh" VARCHAR(20),
  "colveh" VARCHAR(20),
  "valori" NUMERIC(14,2),
  "modveh" VARCHAR(20)  NOT NULL,
  "dueant" VARCHAR(50),
  "dirant" VARCHAR(50),
  "plaant" VARCHAR(8),
  "codusoant" VARCHAR(16)  NOT NULL,
  "anovehant" NUMERIC(4)  NOT NULL,
  "sermotant" VARCHAR(15),
  "sercarant" VARCHAR(15),
  "marvehant" VARCHAR(20),
  "colvehant" VARCHAR(20),
  "valoriant" NUMERIC(14,2),
  "modvehant" VARCHAR(20)  NOT NULL,
  "dueantant" VARCHAR(50),
  "dirantant" VARCHAR(50),
  "plaantant" VARCHAR(8),
  "funrec" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodveh" IS '';


-----------------------------------------------------------------------------
-- fcmultas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmultas" CASCADE;

DROP SEQUENCE IF EXISTS "fcmultas_seq";

CREATE SEQUENCE "fcmultas_seq";


CREATE TABLE "fcmultas"
(
  "codmul" VARCHAR(4),
  "nommul" VARCHAR(250),
  "tipo" VARCHAR(1),
  "modo" VARCHAR(1),
  "monpro" VARCHAR(1),
  "tipdec" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmultas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmultas" IS '';


-----------------------------------------------------------------------------
-- fcmunici
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmunici" CASCADE;

DROP SEQUENCE IF EXISTS "fcmunici_seq";

CREATE SEQUENCE "fcmunici_seq";


CREATE TABLE "fcmunici"
(
  "codmun" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nommun" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmunici_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmunici" IS '';


-----------------------------------------------------------------------------
-- fcnomneg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcnomneg" CASCADE;

DROP SEQUENCE IF EXISTS "fcnomneg_seq";

CREATE SEQUENCE "fcnomneg_seq";


CREATE TABLE "fcnomneg"
(
  "numlic" VARCHAR(10),
  "rifcon" VARCHAR(14),
  "nomneg" VARCHAR(1000),
  "dirpri" VARCHAR(2000),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcnomneg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcnomneg" IS '';


-----------------------------------------------------------------------------
-- fconrep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fconrep" CASCADE;

DROP SEQUENCE IF EXISTS "fconrep_seq";

CREATE SEQUENCE "fconrep_seq";


CREATE TABLE "fconrep"
(
  "cedcon" VARCHAR(10),
  "rifcon" VARCHAR(11),
  "nomcon" VARCHAR(80),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(80),
  "feccon" DATE,
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('fconrep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fconrep" IS '';


-----------------------------------------------------------------------------
-- fcotring
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcotring" CASCADE;

DROP SEQUENCE IF EXISTS "fcotring_seq";

CREATE SEQUENCE "fcotring_seq";


CREATE TABLE "fcotring"
(
  "nrocon" VARCHAR(10)  NOT NULL,
  "codfue" VARCHAR(2)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "desing" VARCHAR(250),
  "monimp" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "rifrep" VARCHAR(14),
  "staapu" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(500),
  "dircon" VARCHAR(500),
  "monsal" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcotring_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcotring" IS '';


-----------------------------------------------------------------------------
-- fcpaging
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcpaging" CASCADE;

DROP SEQUENCE IF EXISTS "fcpaging_seq";

CREATE SEQUENCE "fcpaging_seq";


CREATE TABLE "fcpaging"
(
  "refere" VARCHAR(10)  NOT NULL,
  "tippag" VARCHAR(2),
  "moning" NUMERIC(14,2),
  "numref" VARCHAR(10),
  "nomref" VARCHAR(40),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcpaging_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcpaging" IS '';


-----------------------------------------------------------------------------
-- fcpagos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcpagos" CASCADE;

DROP SEQUENCE IF EXISTS "fcpagos_seq";

CREATE SEQUENCE "fcpagos_seq";


CREATE TABLE "fcpagos"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "rifcon" VARCHAR(20)  NOT NULL,
  "despag" VARCHAR(250),
  "monpag" NUMERIC(14,2),
  "monefe" NUMERIC(14,2),
  "funpag" VARCHAR(40)  NOT NULL,
  "codrec" VARCHAR(10),
  "numpagold" VARCHAR(10),
  "edopag" VARCHAR(1),
  "fecanu" DATE,
  "motanu" VARCHAR(250),
  "cedanu" VARCHAR(14),
  "nomcon" VARCHAR(500),
  "dircon" VARCHAR(3000),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcpagos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcpagos" IS '';


-----------------------------------------------------------------------------
-- fcpais
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcpais" CASCADE;

DROP SEQUENCE IF EXISTS "fcpais_seq";

CREATE SEQUENCE "fcpais_seq";


CREATE TABLE "fcpais"
(
  "codpai" VARCHAR(4)  NOT NULL,
  "nompai" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcpais_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcpais" IS '';


-----------------------------------------------------------------------------
-- fcparroq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcparroq" CASCADE;

DROP SEQUENCE IF EXISTS "fcparroq_seq";

CREATE SEQUENCE "fcparroq_seq";


CREATE TABLE "fcparroq"
(
  "codpar" VARCHAR(4)  NOT NULL,
  "codmun" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nompar" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcparroq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcparroq" IS '';


-----------------------------------------------------------------------------
-- fcpreing
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcpreing" CASCADE;

DROP SEQUENCE IF EXISTS "fcpreing_seq";

CREATE SEQUENCE "fcpreing_seq";


CREATE TABLE "fcpreing"
(
  "codpar" VARCHAR(16)  NOT NULL,
  "nompar" VARCHAR(250)  NOT NULL,
  "estima" VARCHAR(1),
  "estcie" VARCHAR(1),
  "acum" VARCHAR(1) default '',
  "id" INTEGER  NOT NULL DEFAULT nextval('fcpreing_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcpreing" IS '';


-----------------------------------------------------------------------------
-- fcprolic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcprolic" CASCADE;

DROP SEQUENCE IF EXISTS "fcprolic_seq";

CREATE SEQUENCE "fcprolic_seq";


CREATE TABLE "fcprolic"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "tippro" VARCHAR(4),
  "despro" VARCHAR(250),
  "dirpro" VARCHAR(250),
  "monpro" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "rifrep" VARCHAR(14),
  "stapro" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "semdia" NUMERIC(14,2),
  "texpub" VARCHAR(300),
  "protip" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcprolic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcprolic" IS '';


-----------------------------------------------------------------------------
-- fcprolicdet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcprolicdet" CASCADE;

DROP SEQUENCE IF EXISTS "fcprolicdet_seq";

CREATE SEQUENCE "fcprolicdet_seq";


CREATE TABLE "fcprolicdet"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "tippro" VARCHAR(4)  NOT NULL,
  "campo" VARCHAR(50)  NOT NULL,
  "valor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcprolicdet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcprolicdet" IS '';


-----------------------------------------------------------------------------
-- fcrangosdes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrangosdes" CASCADE;

DROP SEQUENCE IF EXISTS "fcrangosdes_seq";

CREATE SEQUENCE "fcrangosdes_seq";


CREATE TABLE "fcrangosdes"
(
  "coddes" VARCHAR(4),
  "diasdesde" NUMERIC,
  "diashasta" NUMERIC,
  "valor" NUMERIC,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosdes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrangosdes" IS '';


-----------------------------------------------------------------------------
-- fcrangosmul
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrangosmul" CASCADE;

DROP SEQUENCE IF EXISTS "fcrangosmul_seq";

CREATE SEQUENCE "fcrangosmul_seq";


CREATE TABLE "fcrangosmul"
(
  "codmul" VARCHAR(4),
  "diasdesde" NUMERIC default 0,
  "diashasta" NUMERIC default 0,
  "valor" NUMERIC default 0,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosmul_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrangosmul" IS '';


-----------------------------------------------------------------------------
-- fcrangosrec
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrangosrec" CASCADE;

DROP SEQUENCE IF EXISTS "fcrangosrec_seq";

CREATE SEQUENCE "fcrangosrec_seq";


CREATE TABLE "fcrangosrec"
(
  "codrec" VARCHAR(4),
  "diasdesde" NUMERIC default 0,
  "diashasta" NUMERIC default 0,
  "valor" NUMERIC default 0,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosrec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrangosrec" IS '';


-----------------------------------------------------------------------------
-- fcreccob
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreccob" CASCADE;

DROP SEQUENCE IF EXISTS "fcreccob_seq";

CREATE SEQUENCE "fcreccob_seq";


CREATE TABLE "fcreccob"
(
  "nument" VARCHAR(10)  NOT NULL,
  "fecent" DATE  NOT NULL,
  "codcob" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreccob_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreccob" IS '';


-----------------------------------------------------------------------------
-- fcreccon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreccon" CASCADE;

DROP SEQUENCE IF EXISTS "fcreccon_seq";

CREATE SEQUENCE "fcreccon_seq";


CREATE TABLE "fcreccon"
(
  "codrec" VARCHAR(10)  NOT NULL,
  "fecent" DATE,
  "fecven" DATE,
  "rifcon" VARCHAR(14),
  "numlic" VARCHAR(12),
  "numsol" VARCHAR(12),
  "tipsol" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreccon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreccon" IS '';


-----------------------------------------------------------------------------
-- fcrecdes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecdes" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecdes_seq";

CREATE SEQUENCE "fcrecdes_seq";


CREATE TABLE "fcrecdes"
(
  "codrede" VARCHAR(2)  NOT NULL,
  "recdes" VARCHAR(1)  NOT NULL,
  "desrede" VARCHAR(30)  NOT NULL,
  "codcta" VARCHAR(18),
  "porrede" VARCHAR(1)  NOT NULL,
  "codfue" VARCHAR(2),
  "dias" NUMERIC(3),
  "porcien" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecdes" IS '';


-----------------------------------------------------------------------------
-- fcrecdesg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecdesg" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecdesg_seq";

CREATE SEQUENCE "fcrecdesg_seq";


CREATE TABLE "fcrecdesg"
(
  "codrede" VARCHAR(2)  NOT NULL,
  "dias" NUMERIC(3),
  "porcien" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdesg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecdesg" IS '';


-----------------------------------------------------------------------------
-- fcrecdespag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecdespag" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecdespag_seq";

CREATE SEQUENCE "fcrecdespag_seq";


CREATE TABLE "fcrecdespag"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "codrede" VARCHAR(4)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdespag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecdespag" IS '';


-----------------------------------------------------------------------------
-- fcrecibo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecibo" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecibo_seq";

CREATE SEQUENCE "fcrecibo_seq";


CREATE TABLE "fcrecibo"
(
  "codrec" VARCHAR(10)  NOT NULL,
  "fecrec" DATE  NOT NULL,
  "desrec" VARCHAR(250)  NOT NULL,
  "numlic" VARCHAR(10)  NOT NULL,
  "rifcon" VARCHAR(15)  NOT NULL,
  "monrec" NUMERIC(14,2)  NOT NULL,
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "fecha" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecibo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecibo" IS '';


-----------------------------------------------------------------------------
-- fcrecurso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecurso" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecurso_seq";

CREATE SEQUENCE "fcrecurso_seq";


CREATE TABLE "fcrecurso"
(
  "coding" VARCHAR(10)  NOT NULL,
  "desing" VARCHAR(100),
  "moning" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecurso_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecurso" IS '';


-----------------------------------------------------------------------------
-- fcreginm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreginm" CASCADE;

DROP SEQUENCE IF EXISTS "fcreginm_seq";

CREATE SEQUENCE "fcreginm_seq";


CREATE TABLE "fcreginm"
(
  "nroinm" VARCHAR(15),
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3),
  "codcarinm" VARCHAR(3),
  "codsitinm" VARCHAR(3),
  "rifcon" VARCHAR(14),
  "fecpag" DATE,
  "feccal" DATE,
  "fecreg" DATE,
  "dirinm" VARCHAR(1000),
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "mtrter" NUMERIC(20,2),
  "mtrcon" NUMERIC(20,2),
  "bster" NUMERIC(20,2),
  "bscon" NUMERIC(20,2),
  "rifrep" VARCHAR(14),
  "funrec" VARCHAR(40),
  "fecrec" DATE,
  "estinm" VARCHAR(1),
  "estdec" VARCHAR(1),
  "codcatinm" VARCHAR(30),
  "nomcon" VARCHAR(120),
  "dircon" VARCHAR(250),
  "valinm" NUMERIC(20,2),
  "folio" VARCHAR(10),
  "tomo" VARCHAR(5),
  "numdoc" NUMERIC(20,2),
  "fecdoc" DATE,
  "usoinm" VARCHAR(50),
  "aveinm" VARCHAR(1000),
  "nrociv" VARCHAR(100),
  "urbinm" VARCHAR(100),
  "tipope" VARCHAR(100),
  "prodoc" VARCHAR(100),
  "tridoc" VARCHAR(50),
  "aredoc" NUMERIC(32,2),
  "linnordoc" VARCHAR(250),
  "linsurdoc" VARCHAR(250),
  "linestdoc" VARCHAR(250),
  "linoesdoc" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreginm" IS '';


-----------------------------------------------------------------------------
-- fcreginm1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreginm1" CASCADE;

DROP SEQUENCE IF EXISTS "fcreginm1_seq";

CREATE SEQUENCE "fcreginm1_seq";


CREATE TABLE "fcreginm1"
(
  "serial" NUMERIC(14),
  "tipo_bolet" VARCHAR(255),
  "nombre_pro" VARCHAR(255),
  "ci_rif_pro" VARCHAR(255),
  "dir_inmueb" VARCHAR(255),
  "telefono" VARCHAR(255),
  "telefono2" VARCHAR(255),
  "nomb_ad_ec" VARCHAR(255),
  "dir_adm_en" VARCHAR(255),
  "n_document" NUMERIC(14),
  "fecha_docu" DATE,
  "uso_inmueb" VARCHAR(20),
  "tenencia" VARCHAR(10),
  "area" NUMERIC(14,2),
  "area2" NUMERIC(14,2),
  "ubicacion" NUMERIC(14),
  "ubicacion2" NUMERIC(14),
  "tipo" VARCHAR(3),
  "tipo2" VARCHAR(3),
  "imp_anual" NUMERIC(14,2),
  "imp_anual2" NUMERIC(14,2),
  "imp_trim" NUMERIC(14,2),
  "imp_trim2" NUMERIC(14,2),
  "mont_imp" NUMERIC(14,2),
  "observacio" VARCHAR(110),
  "cod_catast" VARCHAR(20),
  "fecha_elab" DATE,
  "ubi_inmueb" VARCHAR(110),
  "norte" VARCHAR(80),
  "sur" VARCHAR(80),
  "este" VARCHAR(80),
  "oeste" VARCHAR(80),
  "adquiere" VARCHAR(110),
  "f_inscripc" DATE,
  "folios" VARCHAR(10),
  "tomo" VARCHAR(10),
  "trim" VARCHAR(10),
  "prot" VARCHAR(10),
  "frente" VARCHAR(1),
  "fondo" VARCHAR(1),
  "precio" NUMERIC(14,2),
  "dir_propie" VARCHAR(110),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreginm1" IS '';


-----------------------------------------------------------------------------
-- fcreginm2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreginm2" CASCADE;

DROP SEQUENCE IF EXISTS "fcreginm2_seq";

CREATE SEQUENCE "fcreginm2_seq";


CREATE TABLE "fcreginm2"
(
  "nroinm" VARCHAR(15)  NOT NULL,
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3),
  "codcarinm" VARCHAR(3),
  "codsitinm" VARCHAR(3),
  "rifcon" VARCHAR(14),
  "fecpag" DATE,
  "feccal" DATE,
  "fecreg" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "mtrter" NUMERIC(14,2),
  "mtrcon" NUMERIC(14,2),
  "bster" NUMERIC(14,2),
  "bscon" NUMERIC(14,2),
  "docpro" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "funrec" VARCHAR(40),
  "fecrec" DATE,
  "estinm" VARCHAR(1),
  "estdec" VARCHAR(1),
  "codcatinm" VARCHAR(30),
  "nomcon" VARCHAR(120),
  "dircon" VARCHAR(250),
  "clacon" VARCHAR(12),
  "fecadq" DATE,
  "valinm" NUMERIC(14,2),
  "codman" VARCHAR(4),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nroinmant" VARCHAR(15),
  "totter" NUMERIC(14,2),
  "totcon" NUMERIC(14,2),
  "total" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreginm2" IS '';


-----------------------------------------------------------------------------
-- fcreginm3
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreginm3" CASCADE;

DROP SEQUENCE IF EXISTS "fcreginm3_seq";

CREATE SEQUENCE "fcreginm3_seq";


CREATE TABLE "fcreginm3"
(
  "codcatfis" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm3_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreginm3" IS '';


-----------------------------------------------------------------------------
-- fcregveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcregveh" CASCADE;

DROP SEQUENCE IF EXISTS "fcregveh_seq";

CREATE SEQUENCE "fcregveh_seq";


CREATE TABLE "fcregveh"
(
  "plaveh" VARCHAR(10)  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "anoveh" NUMERIC(4)  NOT NULL,
  "fecreg" DATE,
  "sermot" VARCHAR(15),
  "sercar" VARCHAR(30),
  "marveh" VARCHAR(30),
  "colveh" VARCHAR(20),
  "coduso" VARCHAR(16)  NOT NULL,
  "impveh" NUMERIC(14,2),
  "salact" NUMERIC(14,2),
  "salant" NUMERIC(14,2),
  "valori" NUMERIC(14,2),
  "aboveh" NUMERIC(14,2),
  "morveh" NUMERIC(14,2),
  "desveh" NUMERIC(14,2),
  "estveh" VARCHAR(1),
  "funrec" VARCHAR(40),
  "obsveh" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "modveh" VARCHAR(20)  NOT NULL,
  "fecrec" DATE,
  "dueant" VARCHAR(50),
  "dirant" VARCHAR(50),
  "plaant" VARCHAR(8),
  "estdec" VARCHAR(1)  NOT NULL,
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "clacon" VARCHAR(12),
  "capveh" NUMERIC,
  "pesveh" NUMERIC,
  "tipveh" NUMERIC,
  "fecact" DATE,
  "marcod" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcregveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcregveh" IS '';


-----------------------------------------------------------------------------
-- fcregveh1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcregveh1" CASCADE;

DROP SEQUENCE IF EXISTS "fcregveh1_seq";

CREATE SEQUENCE "fcregveh1_seq";


CREATE TABLE "fcregveh1"
(
  "plaveh" VARCHAR(10)  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "anoveh" NUMERIC(4)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "sermot" VARCHAR(15),
  "sercar" VARCHAR(30),
  "marveh" VARCHAR(20),
  "colveh" VARCHAR(20),
  "coduso" VARCHAR(16)  NOT NULL,
  "impveh" NUMERIC(14,2),
  "salact" NUMERIC(14,2),
  "salant" NUMERIC(14,2),
  "valori" NUMERIC(14,2),
  "aboveh" NUMERIC(14,2),
  "morveh" NUMERIC(14,2),
  "desveh" NUMERIC(14,2),
  "estveh" VARCHAR(1),
  "funrec" VARCHAR(40),
  "obsveh" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "modveh" VARCHAR(20)  NOT NULL,
  "fecrec" DATE  NOT NULL,
  "dueant" VARCHAR(50),
  "dirant" VARCHAR(50),
  "plaant" VARCHAR(8),
  "estdec" VARCHAR(1)  NOT NULL,
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "clacon" VARCHAR(12),
  "capveh" NUMERIC,
  "pesveh" NUMERIC,
  "tipveh" NUMERIC,
  "fecact" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcregveh1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcregveh1" IS '';


-----------------------------------------------------------------------------
-- fcrenlic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrenlic" CASCADE;

DROP SEQUENCE IF EXISTS "fcrenlic_seq";

CREATE SEQUENCE "fcrenlic_seq";


CREATE TABLE "fcrenlic"
(
  "numlic" VARCHAR(10)  NOT NULL,
  "fecven" DATE  NOT NULL,
  "fecren" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrenlic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrenlic" IS '';


-----------------------------------------------------------------------------
-- fcrepfis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrepfis" CASCADE;

DROP SEQUENCE IF EXISTS "fcrepfis_seq";

CREATE SEQUENCE "fcrepfis_seq";


CREATE TABLE "fcrepfis"
(
  "numlic" VARCHAR(10)  NOT NULL,
  "funrec" VARCHAR(50)  NOT NULL,
  "fecrep" DATE  NOT NULL,
  "numrep" VARCHAR(15)  NOT NULL,
  "monrep" NUMERIC(14,2)  NOT NULL,
  "conrep" VARCHAR(250),
  "modo" VARCHAR(1),
  "monadi" NUMERIC(14,2),
  "fuerep" VARCHAR(2),
  "fuesan" VARCHAR(2),
  "fecrec" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrepfis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrepfis" IS '';


-----------------------------------------------------------------------------
-- fcrepliq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrepliq" CASCADE;

DROP SEQUENCE IF EXISTS "fcrepliq_seq";

CREATE SEQUENCE "fcrepliq_seq";


CREATE TABLE "fcrepliq"
(
  "numrep" VARCHAR(15),
  "ano" VARCHAR(10),
  "codact" VARCHAR(10),
  "moning" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "monfis" NUMERIC(14,2),
  "porali" NUMERIC(14,2),
  "monliq" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrepliq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrepliq" IS '';


-----------------------------------------------------------------------------
-- fcretencion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcretencion" CASCADE;

DROP SEQUENCE IF EXISTS "fcretencion_seq";

CREATE SEQUENCE "fcretencion_seq";


CREATE TABLE "fcretencion"
(
  "numret" VARCHAR(15)  NOT NULL,
  "fueing" VARCHAR(2)  NOT NULL,
  "fecret" DATE,
  "fecreg" DATE,
  "monret" NUMERIC(14,2),
  "numrel" VARCHAR(10),
  "desret" VARCHAR(1000),
  "monsal" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcretencion_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcretencion" IS '';


-----------------------------------------------------------------------------
-- fcrutas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrutas" CASCADE;

DROP SEQUENCE IF EXISTS "fcrutas_seq";

CREATE SEQUENCE "fcrutas_seq";


CREATE TABLE "fcrutas"
(
  "codrut" VARCHAR(6)  NOT NULL,
  "desrut" VARCHAR(120)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrutas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrutas" IS '';


-----------------------------------------------------------------------------
-- fcrutcob
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrutcob" CASCADE;

DROP SEQUENCE IF EXISTS "fcrutcob_seq";

CREATE SEQUENCE "fcrutcob_seq";


CREATE TABLE "fcrutcob"
(
  "codcob" VARCHAR(3)  NOT NULL,
  "codrut" VARCHAR(6)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrutcob_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrutcob" IS '';


-----------------------------------------------------------------------------
-- fcsitjurinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsitjurinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcsitjurinm_seq";

CREATE SEQUENCE "fcsitjurinm_seq";


CREATE TABLE "fcsitjurinm"
(
  "codsitinm" VARCHAR(3)  NOT NULL,
  "nomsitinm" VARCHAR(250)  NOT NULL,
  "stasitinm" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsitjurinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsitjurinm" IS '';


-----------------------------------------------------------------------------
-- fcsoldet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsoldet" CASCADE;

DROP SEQUENCE IF EXISTS "fcsoldet_seq";

CREATE SEQUENCE "fcsoldet_seq";


CREATE TABLE "fcsoldet"
(
  "codsol" VARCHAR(10),
  "codfue" VARCHAR(2),
  "nomfue" VARCHAR(60),
  "objeto" VARCHAR(45),
  "fecven" DATE,
  "edodec" VARCHAR(12),
  "fecultpag" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsoldet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsoldet" IS '';


-----------------------------------------------------------------------------
-- fcsoldet2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsoldet2" CASCADE;

DROP SEQUENCE IF EXISTS "fcsoldet2_seq";

CREATE SEQUENCE "fcsoldet2_seq";


CREATE TABLE "fcsoldet2"
(
  "codsol" VARCHAR(10),
  "codfue" VARCHAR(2),
  "nomfue" VARCHAR(60),
  "objeto" VARCHAR(45),
  "fecven" DATE,
  "edodec" VARCHAR(12),
  "conpag" VARCHAR(2),
  "fecultpag" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsoldet2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsoldet2" IS '';


-----------------------------------------------------------------------------
-- fcsollic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsollic" CASCADE;

DROP SEQUENCE IF EXISTS "fcsollic_seq";

CREATE SEQUENCE "fcsollic_seq";


CREATE TABLE "fcsollic"
(
  "numsol" VARCHAR(12),
  "numlic" VARCHAR(12),
  "fecsol" DATE,
  "feclic" DATE,
  "rifcon" VARCHAR(20),
  "catcon" VARCHAR(30),
  "rifrep" VARCHAR(20),
  "nomneg" VARCHAR(120),
  "tipinm" VARCHAR(1),
  "tipest" VARCHAR(1),
  "dirpri" VARCHAR(255),
  "codrut" VARCHAR(6),
  "capsoc" NUMERIC(15),
  "horini" DATE,
  "horcie" DATE,
  "fecini" DATE,
  "fecfin" DATE,
  "discli" NUMERIC(10),
  "disbar" NUMERIC(10),
  "disdis" NUMERIC(10),
  "disins" NUMERIC(10),
  "disfun" NUMERIC(10),
  "disest" NUMERIC(10),
  "funres" VARCHAR(60),
  "funrel" VARCHAR(40),
  "fecres" DATE,
  "fecapr" DATE,
  "fecven" DATE,
  "tomo" VARCHAR(8),
  "folio" VARCHAR(8),
  "numero" VARCHAR(8),
  "taslic" NUMERIC(15),
  "deuanl" NUMERIC(15),
  "deuacl" NUMERIC(15),
  "implic" NUMERIC(15),
  "deuanp" NUMERIC(15),
  "deuacp" NUMERIC(15),
  "stasol" VARCHAR(1),
  "stalic" VARCHAR(1),
  "stadec" VARCHAR(1),
  "staliq" VARCHAR(1),
  "nomcon" VARCHAR(255),
  "dircon" VARCHAR(255),
  "tipo" VARCHAR(1),
  "estser" VARCHAR(1) default '',
  "telneg" VARCHAR(15),
  "clacon" VARCHAR(12),
  "capact" NUMERIC(15),
  "numsol1" VARCHAR(12),
  "numlic1" VARCHAR(12),
  "horainie" DATE,
  "horaciee" DATE,
  "unitri" NUMERIC(14,2),
  "tipsol" VARCHAR(1),
  "unitrialc" NUMERIC(14,2),
  "unitriotr" NUMERIC(14,2),
  "licant" VARCHAR(12),
  "dueant" VARCHAR(14),
  "dirant" VARCHAR(50),
  "impext" NUMERIC(15),
  "imptotal" NUMERIC(15),
  "codact" VARCHAR(16),
  "codtiplic" VARCHAR(6),
  "fecinilic" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsollic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsollic" IS '';


-----------------------------------------------------------------------------
-- fcsollic1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsollic1" CASCADE;

DROP SEQUENCE IF EXISTS "fcsollic1_seq";

CREATE SEQUENCE "fcsollic1_seq";


CREATE TABLE "fcsollic1"
(
  "numsol" VARCHAR(12),
  "numlic" VARCHAR(10),
  "fecsol" DATE,
  "feclic" DATE,
  "rifcon" VARCHAR(14),
  "catcon" VARCHAR(21),
  "rifrep" VARCHAR(14),
  "nomneg" VARCHAR(120),
  "tipinm" VARCHAR(1),
  "tipest" VARCHAR(1),
  "dirpri" VARCHAR(120),
  "codrut" VARCHAR(6),
  "capsoc" NUMERIC(15),
  "horini" DATE,
  "horcie" DATE,
  "fecini" DATE,
  "fecfin" DATE,
  "discli" NUMERIC(10),
  "disbar" NUMERIC(10),
  "disdis" NUMERIC(10),
  "disins" NUMERIC(10),
  "disfun" NUMERIC(10),
  "disest" NUMERIC(10),
  "funres" VARCHAR(60),
  "funrel" VARCHAR(40),
  "fecres" DATE,
  "fecapr" DATE,
  "fecven" DATE,
  "tomo" VARCHAR(8),
  "folio" VARCHAR(8),
  "numero" VARCHAR(8),
  "taslic" NUMERIC(15),
  "deuanl" NUMERIC(15),
  "deuacl" NUMERIC(15),
  "implic" NUMERIC(15),
  "deuanp" NUMERIC(15),
  "deuacp" NUMERIC(15),
  "stasol" VARCHAR(1),
  "stalic" VARCHAR(1),
  "stadec" VARCHAR(1),
  "staliq" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "tipo" VARCHAR(1),
  "estser" VARCHAR(1)  NOT NULL,
  "telneg" VARCHAR(15),
  "clacon" VARCHAR(12),
  "capact" NUMERIC(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsollic1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsollic1" IS '';


-----------------------------------------------------------------------------
-- fcsolneg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsolneg" CASCADE;

DROP SEQUENCE IF EXISTS "fcsolneg_seq";

CREATE SEQUENCE "fcsolneg_seq";


CREATE TABLE "fcsolneg"
(
  "numneg" VARCHAR(10)  NOT NULL,
  "numsol" VARCHAR(10)  NOT NULL,
  "motneg" VARCHAR(210),
  "fecneg" DATE  NOT NULL,
  "resolu" VARCHAR(10),
  "tomon" VARCHAR(8),
  "folion" VARCHAR(8),
  "numeron" VARCHAR(8),
  "funneg" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsolneg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsolneg" IS '';


-----------------------------------------------------------------------------
-- fcsolvencia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsolvencia" CASCADE;

DROP SEQUENCE IF EXISTS "fcsolvencia_seq";

CREATE SEQUENCE "fcsolvencia_seq";


CREATE TABLE "fcsolvencia"
(
  "codsol" VARCHAR(10)  NOT NULL,
  "codtip" VARCHAR(2)  NOT NULL,
  "fecexp" DATE  NOT NULL,
  "fecven" DATE  NOT NULL,
  "numlic" VARCHAR(10),
  "rifcon" VARCHAR(14)  NOT NULL,
  "codcat" VARCHAR(30),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(255),
  "codfue" VARCHAR(2),
  "stasol" VARCHAR(1),
  "motivo" VARCHAR(254),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsolvencia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsolvencia" IS '';


-----------------------------------------------------------------------------
-- fcsuscan
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsuscan" CASCADE;

DROP SEQUENCE IF EXISTS "fcsuscan_seq";

CREATE SEQUENCE "fcsuscan_seq";


CREATE TABLE "fcsuscan"
(
  "numsus" VARCHAR(10)  NOT NULL,
  "numsol" VARCHAR(10)  NOT NULL,
  "numlic" VARCHAR(10)  NOT NULL,
  "estlic" VARCHAR(1)  NOT NULL,
  "motsus" VARCHAR(210)  NOT NULL,
  "fecsus" DATE  NOT NULL,
  "resolu" VARCHAR(100),
  "tomo" VARCHAR(100),
  "folio" VARCHAR(100),
  "numero" VARCHAR(100),
  "funsus" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsuscan_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsuscan" IS '';


-----------------------------------------------------------------------------
-- fctasban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctasban" CASCADE;

DROP SEQUENCE IF EXISTS "fctasban_seq";

CREATE SEQUENCE "fctasban_seq";


CREATE TABLE "fctasban"
(
  "tasano" VARCHAR(2004),
  "taspor" NUMERIC(32,2),
  "tasmes" NUMERIC(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctasban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctasban" IS '';


-----------------------------------------------------------------------------
-- fctipapu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipapu" CASCADE;

DROP SEQUENCE IF EXISTS "fctipapu_seq";

CREATE SEQUENCE "fctipapu_seq";


CREATE TABLE "fctipapu"
(
  "tipapu" VARCHAR(10)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "pormon" VARCHAR(1)  NOT NULL,
  "alimon" NUMERIC(14,2),
  "statip" VARCHAR(1),
  "unipar" VARCHAR(50),
  "frepar" INTEGER,
  "parapu" VARCHAR(300),
  "exoapu" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipapu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipapu" IS '';


-----------------------------------------------------------------------------
-- fctipapudet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipapudet" CASCADE;

DROP SEQUENCE IF EXISTS "fctipapudet_seq";

CREATE SEQUENCE "fctipapudet_seq";


CREATE TABLE "fctipapudet"
(
  "tipvar" VARCHAR(500),
  "tipo" VARCHAR(1),
  "valor" VARCHAR(14),
  "tipapu" VARCHAR(10)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipapudet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipapudet" IS '';


-----------------------------------------------------------------------------
-- fctipesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipesp" CASCADE;

DROP SEQUENCE IF EXISTS "fctipesp_seq";

CREATE SEQUENCE "fctipesp_seq";


CREATE TABLE "fctipesp"
(
  "tipesp" VARCHAR(10)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "pormon" VARCHAR(1)  NOT NULL,
  "alimon" NUMERIC(14,2),
  "statip" VARCHAR(1),
  "unipar" VARCHAR(50),
  "frepar" INTEGER,
  "paresp" VARCHAR(300),
  "exoesp" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipesp" IS '';


-----------------------------------------------------------------------------
-- fctipespdet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipespdet" CASCADE;

DROP SEQUENCE IF EXISTS "fctipespdet_seq";

CREATE SEQUENCE "fctipespdet_seq";


CREATE TABLE "fctipespdet"
(
  "tipvar" VARCHAR(500),
  "tipo" VARCHAR(1),
  "valor" VARCHAR(14),
  "tipesp" VARCHAR(10)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipespdet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipespdet" IS '';


-----------------------------------------------------------------------------
-- fctiplic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctiplic" CASCADE;

DROP SEQUENCE IF EXISTS "fctiplic_seq";

CREATE SEQUENCE "fctiplic_seq";


CREATE TABLE "fctiplic"
(
  "codtiplic" VARCHAR(6)  NOT NULL,
  "destiplic" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctiplic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctiplic" IS '';


-----------------------------------------------------------------------------
-- fctippag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctippag" CASCADE;

DROP SEQUENCE IF EXISTS "fctippag_seq";

CREATE SEQUENCE "fctippag_seq";


CREATE TABLE "fctippag"
(
  "tippag" VARCHAR(3)  NOT NULL,
  "despag" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctippag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctippag" IS '';


-----------------------------------------------------------------------------
-- fctippro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctippro" CASCADE;

DROP SEQUENCE IF EXISTS "fctippro_seq";

CREATE SEQUENCE "fctippro_seq";


CREATE TABLE "fctippro"
(
  "tippro" VARCHAR(4)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "pormon" VARCHAR(1)  NOT NULL,
  "alimon" NUMERIC(14,2),
  "statip" VARCHAR(1),
  "unipar" VARCHAR(50),
  "frepar" INTEGER,
  "parpro" VARCHAR(300),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctippro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctippro" IS '';


-----------------------------------------------------------------------------
-- fctipprodet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipprodet" CASCADE;

DROP SEQUENCE IF EXISTS "fctipprodet_seq";

CREATE SEQUENCE "fctipprodet_seq";


CREATE TABLE "fctipprodet"
(
  "tipvar" VARCHAR(500),
  "tipo" VARCHAR(1),
  "valor" VARCHAR(14),
  "tippro" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipprodet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipprodet" IS '';


-----------------------------------------------------------------------------
-- fctipsol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipsol" CASCADE;

DROP SEQUENCE IF EXISTS "fctipsol_seq";

CREATE SEQUENCE "fctipsol_seq";


CREATE TABLE "fctipsol"
(
  "codtip" VARCHAR(2)  NOT NULL,
  "destip" VARCHAR(100),
  "monsol" NUMERIC(14,2),
  "valsol" NUMERIC(14,2),
  "privdeu" VARCHAR(1),
  "privmsg" VARCHAR(3000),
  "anocom" VARCHAR(1),
  "fueing" VARCHAR(2),
  "gendeu" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipsol" IS '';


-----------------------------------------------------------------------------
-- fctrainm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctrainm" CASCADE;

DROP SEQUENCE IF EXISTS "fctrainm_seq";

CREATE SEQUENCE "fctrainm_seq";


CREATE TABLE "fctrainm"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "nroinm" VARCHAR(8)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "rifrep" VARCHAR(14),
  "rifconant" VARCHAR(14)  NOT NULL,
  "rifrepant" VARCHAR(14),
  "funrec" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctrainm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctrainm" IS '';


-----------------------------------------------------------------------------
-- fctralic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctralic" CASCADE;

DROP SEQUENCE IF EXISTS "fctralic_seq";

CREATE SEQUENCE "fctralic_seq";


CREATE TABLE "fctralic"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "rifrep" VARCHAR(14),
  "rifconant" VARCHAR(14)  NOT NULL,
  "rifrepant" VARCHAR(14),
  "funrec" VARCHAR(40)  NOT NULL,
  "numlic" VARCHAR(12),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctralic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctralic" IS '';


-----------------------------------------------------------------------------
-- fctraveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctraveh" CASCADE;

DROP SEQUENCE IF EXISTS "fctraveh_seq";

CREATE SEQUENCE "fctraveh_seq";


CREATE TABLE "fctraveh"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "plaveh" VARCHAR(8)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "rifrep" VARCHAR(14),
  "rifconant" VARCHAR(14)  NOT NULL,
  "rifrepant" VARCHAR(14),
  "funrec" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctraveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctraveh" IS '';


-----------------------------------------------------------------------------
-- fcunimon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcunimon" CASCADE;

DROP SEQUENCE IF EXISTS "fcunimon_seq";

CREATE SEQUENCE "fcunimon_seq";


CREATE TABLE "fcunimon"
(
  "codunimon" VARCHAR(4)  NOT NULL,
  "nomunimon" VARCHAR(30)  NOT NULL,
  "valunimon" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcunimon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcunimon" IS '';


-----------------------------------------------------------------------------
-- fcusoinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcusoinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcusoinm_seq";

CREATE SEQUENCE "fcusoinm_seq";


CREATE TABLE "fcusoinm"
(
  "codusoinm" VARCHAR(3)  NOT NULL,
  "nomusoinm" VARCHAR(250)  NOT NULL,
  "factor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcusoinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcusoinm" IS '';


-----------------------------------------------------------------------------
-- fcusoveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcusoveh" CASCADE;

DROP SEQUENCE IF EXISTS "fcusoveh_seq";

CREATE SEQUENCE "fcusoveh_seq";


CREATE TABLE "fcusoveh"
(
  "coduso" VARCHAR(16)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "desuso" VARCHAR(250)  NOT NULL,
  "monafo" NUMERIC(14,2)  NOT NULL,
  "porali" NUMERIC(14,2)  NOT NULL,
  "anolim" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcusoveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcusoveh" IS '';


-----------------------------------------------------------------------------
-- fcvalinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcvalinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcvalinm_seq";

CREATE SEQUENCE "fcvalinm_seq";


CREATE TABLE "fcvalinm"
(
  "codzon" VARCHAR(3),
  "deszon" VARCHAR(50),
  "codtip" VARCHAR(3),
  "destip" VARCHAR(150),
  "valmtr" NUMERIC(22,3),
  "valfis" NUMERIC(22,3),
  "alitip" NUMERIC(22,3),
  "anual" NUMERIC(22,3),
  "alitipt" NUMERIC(22,3),
  "anualt" NUMERIC(22,3),
  "anovig" VARCHAR(4),
  "porvalfis" NUMERIC(22,3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcvalinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcvalinm" IS '';


-----------------------------------------------------------------------------
-- fcvalinm1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcvalinm1" CASCADE;

DROP SEQUENCE IF EXISTS "fcvalinm1_seq";

CREATE SEQUENCE "fcvalinm1_seq";


CREATE TABLE "fcvalinm1"
(
  "coduso" VARCHAR(3),
  "valini" NUMERIC(20,2),
  "valfin" NUMERIC(20,2),
  "aliinm" NUMERIC(5,3),
  "anovig" VARCHAR(4),
  "deduc" NUMERIC(14,2),
  "codref" VARCHAR(3),
  "zoni" VARCHAR(50),
  "manz" VARCHAR(30),
  "parmts" VARCHAR(30),
  "valor" NUMERIC(14,3),
  "tipedi" VARCHAR(3),
  "desedi" VARCHAR(60),
  "nivel" VARCHAR(30),
  "tipo" VARCHAR(3),
  "monto" NUMERIC(14,3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcvalinm1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcvalinm1" IS '';


-----------------------------------------------------------------------------
-- fcvalinmold
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcvalinmold" CASCADE;

DROP SEQUENCE IF EXISTS "fcvalinmold_seq";

CREATE SEQUENCE "fcvalinmold_seq";


CREATE TABLE "fcvalinmold"
(
  "codzon" VARCHAR(3),
  "deszon" VARCHAR(50),
  "codtip" VARCHAR(3),
  "destip" VARCHAR(150),
  "valmtr" NUMERIC(22,3),
  "valfis" NUMERIC(22,3),
  "alitip" NUMERIC(22,3),
  "anual" NUMERIC(22,3),
  "alitipt" NUMERIC(22,3),
  "anualt" NUMERIC(22,3),
  "anovig" VARCHAR(4),
  "porvalfis" NUMERIC(22,3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcvalinmold_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcvalinmold" IS '';

