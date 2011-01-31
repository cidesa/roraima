
-----------------------------------------------------------------------------
-- fatippag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fatippag" CASCADE;

DROP SEQUENCE IF EXISTS "fatippag_seq";

CREATE SEQUENCE "fatippag_seq";


CREATE TABLE "fatippag"
(
  "destippag" VARCHAR(30)  NOT NULL,
  "tipcan" VARCHAR(1),
  "genmov" VARCHAR(1),
  "gening" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fatippag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fatippag" IS '';


-----------------------------------------------------------------------------
-- fatipmov
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fatipmov" CASCADE;

DROP SEQUENCE IF EXISTS "fatipmov_seq";

CREATE SEQUENCE "fatipmov_seq";


CREATE TABLE "fatipmov"
(
  "desmov" VARCHAR(50)  NOT NULL,
  "nomabr" VARCHAR(4)  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fatipmov_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fatipmov" IS '';


-----------------------------------------------------------------------------
-- cobdesdoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobdesdoc" CASCADE;

DROP SEQUENCE IF EXISTS "cobdesdoc_seq";

CREATE SEQUENCE "cobdesdoc_seq";


CREATE TABLE "cobdesdoc"
(
  "refdoc" VARCHAR(10)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "coddes" VARCHAR(4)  NOT NULL,
  "fecdes" DATE,
  "mondes" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobdesdoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobdesdoc" IS '';


-----------------------------------------------------------------------------
-- cobdestra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobdestra" CASCADE;

DROP SEQUENCE IF EXISTS "cobdestra_seq";

CREATE SEQUENCE "cobdestra_seq";


CREATE TABLE "cobdestra"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "refdoc" VARCHAR(10)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "coddes" VARCHAR(4)  NOT NULL,
  "fecdes" DATE,
  "mondes" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobdestra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobdestra" IS '';


-----------------------------------------------------------------------------
-- cobdetfor
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobdetfor" CASCADE;

DROP SEQUENCE IF EXISTS "cobdetfor_seq";

CREATE SEQUENCE "cobdetfor_seq";


CREATE TABLE "cobdetfor"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "correl" VARCHAR(3)  NOT NULL,
  "numide" VARCHAR(20),
  "codban" VARCHAR(20),
  "monpag" NUMERIC(14,2),
  "fatippag_id" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cobdetfor_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobdetfor" IS '';


ALTER TABLE "cobdetfor" ADD CONSTRAINT "cobdetfor_FK_1" FOREIGN KEY ("fatippag_id") REFERENCES "fatippag" ("id");

-----------------------------------------------------------------------------
-- cobdettra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobdettra" CASCADE;

DROP SEQUENCE IF EXISTS "cobdettra_seq";

CREATE SEQUENCE "cobdettra_seq";


CREATE TABLE "cobdettra"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "refdoc" VARCHAR(10)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "correl" VARCHAR(3)  NOT NULL,
  "monpag" NUMERIC(14,2),
  "mondsc" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "totpag" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobdettra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobdettra" IS '';


-----------------------------------------------------------------------------
-- cobdocume
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobdocume" CASCADE;

DROP SEQUENCE IF EXISTS "cobdocume_seq";

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
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobdocume" IS '';


ALTER TABLE "cobdocume" ADD CONSTRAINT "cobdocume_FK_1" FOREIGN KEY ("fatipmov_id") REFERENCES "fatipmov" ("id");

-----------------------------------------------------------------------------
-- cobpagban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobpagban" CASCADE;

DROP SEQUENCE IF EXISTS "cobpagban_seq";

CREATE SEQUENCE "cobpagban_seq";


CREATE TABLE "cobpagban"
(
  "codban" VARCHAR(3)  NOT NULL,
  "nomban" VARCHAR(50),
  "dirban" VARCHAR(100),
  "telban" VARCHAR(15),
  "faxban" VARCHAR(15),
  "emaban" VARCHAR(40),
  "conban" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobpagban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobpagban" IS '';


-----------------------------------------------------------------------------
-- cobpagemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobpagemp" CASCADE;

DROP SEQUENCE IF EXISTS "cobpagemp_seq";

CREATE SEQUENCE "cobpagemp_seq";


CREATE TABLE "cobpagemp"
(
  "codemp" VARCHAR(3),
  "faxemp" VARCHAR(15),
  "ctacob" VARCHAR(32),
  "ctapag" VARCHAR(32),
  "codiva" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobpagemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobpagemp" IS '';


-----------------------------------------------------------------------------
-- cobreccli
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobreccli" CASCADE;

DROP SEQUENCE IF EXISTS "cobreccli_seq";

CREATE SEQUENCE "cobreccli_seq";


CREATE TABLE "cobreccli"
(
  "codcli" VARCHAR(10)  NOT NULL,
  "codrec" VARCHAR(10)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cobreccli_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobreccli" IS '';


-----------------------------------------------------------------------------
-- cobrecdoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobrecdoc" CASCADE;

DROP SEQUENCE IF EXISTS "cobrecdoc_seq";

CREATE SEQUENCE "cobrecdoc_seq";


CREATE TABLE "cobrecdoc"
(
  "refdoc" VARCHAR(10)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "codrec" VARCHAR(4)  NOT NULL,
  "fecrec" DATE,
  "monrec" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobrecdoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobrecdoc" IS '';


-----------------------------------------------------------------------------
-- cobrectra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobrectra" CASCADE;

DROP SEQUENCE IF EXISTS "cobrectra_seq";

CREATE SEQUENCE "cobrectra_seq";


CREATE TABLE "cobrectra"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "refdoc" VARCHAR(10)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "codrec" VARCHAR(4)  NOT NULL,
  "fecrec" DATE,
  "monrec" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobrectra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobrectra" IS '';


-----------------------------------------------------------------------------
-- cobregges
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobregges" CASCADE;

DROP SEQUENCE IF EXISTS "cobregges_seq";

CREATE SEQUENCE "cobregges_seq";


CREATE TABLE "cobregges"
(
  "codcli" VARCHAR(10)  NOT NULL,
  "numges" VARCHAR(3)  NOT NULL,
  "fecges" DATE,
  "nomcon" VARCHAR(50),
  "obsges" VARCHAR(4000),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobregges_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobregges" IS '';


-----------------------------------------------------------------------------
-- cobtipdes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobtipdes" CASCADE;

DROP SEQUENCE IF EXISTS "cobtipdes_seq";

CREATE SEQUENCE "cobtipdes_seq";


CREATE TABLE "cobtipdes"
(
  "coddes" VARCHAR(3)  NOT NULL,
  "desdes" VARCHAR(50)  NOT NULL,
  "codcon" VARCHAR(32)  NOT NULL,
  "tipdes" VARCHAR(1)  NOT NULL,
  "valdes" NUMERIC(14,2)  NOT NULL,
  "diades" NUMERIC(14)  NOT NULL,
  "estret" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobtipdes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobtipdes" IS '';


-----------------------------------------------------------------------------
-- cobtipmov
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobtipmov" CASCADE;

DROP SEQUENCE IF EXISTS "cobtipmov_seq";

CREATE SEQUENCE "cobtipmov_seq";


CREATE TABLE "cobtipmov"
(
  "codmov" VARCHAR(3)  NOT NULL,
  "desmov" VARCHAR(50),
  "nomabr" VARCHAR(4),
  "debcre" VARCHAR(1),
  "ctacon" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('cobtipmov_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobtipmov" IS '';


-----------------------------------------------------------------------------
-- cobtiprec
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobtiprec" CASCADE;

DROP SEQUENCE IF EXISTS "cobtiprec_seq";

CREATE SEQUENCE "cobtiprec_seq";


CREATE TABLE "cobtiprec"
(
  "codrec" VARCHAR(3)  NOT NULL,
  "desrec" VARCHAR(50)  NOT NULL,
  "codcon" VARCHAR(32)  NOT NULL,
  "tiprec" VARCHAR(1)  NOT NULL,
  "valrec" NUMERIC(14,2)  NOT NULL,
  "diarec" NUMERIC(14)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cobtiprec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobtiprec" IS '';


-----------------------------------------------------------------------------
-- cobtransa
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cobtransa" CASCADE;

DROP SEQUENCE IF EXISTS "cobtransa_seq";

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
  "fecanu" DATE,
  "desanu" VARCHAR(250),
  "fatipmov_id" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cobtransa_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cobtransa" IS '';


ALTER TABLE "cobtransa" ADD CONSTRAINT "cobtransa_FK_1" FOREIGN KEY ("fatipmov_id") REFERENCES "fatipmov" ("id");
