
-----------------------------------------------------------------------------
-- lidefemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "lidefemp_seq";


CREATE TABLE "lidefemp"
(
  "codemp" VARCHAR(15)  NOT NULL,
  "nomemp" VARCHAR(100)  NOT NULL,
  "diremp" VARCHAR(100)  NOT NULL,
  "telemp" VARCHAR(30)  NOT NULL,
  "faxemp" VARCHAR(30),
  "emaemp" VARCHAR(100),
  "unitri" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('lidefemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "lidefemp" IS '';


-----------------------------------------------------------------------------
-- lisicact
-----------------------------------------------------------------------------

CREATE SEQUENCE "lisicact_seq";


CREATE TABLE "lisicact"
(
  "dessicact" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('lisicact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "lisicact" IS '';


-----------------------------------------------------------------------------
-- litipste
-----------------------------------------------------------------------------

CREATE SEQUENCE "litipste_seq";


CREATE TABLE "litipste"
(
  "desste" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('litipste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "litipste" IS '';


-----------------------------------------------------------------------------
-- lidatste
-----------------------------------------------------------------------------

CREATE SEQUENCE "lidatste_seq";


CREATE TABLE "lidatste"
(
  "coduniste" VARCHAR(4)  NOT NULL,
  "desuniste" VARCHAR(100)  NOT NULL,
  "litipste_id" INTEGER  NOT NULL,
  "dirste" VARCHAR(100),
  "telste" VARCHAR(30),
  "faxste" VARCHAR(30),
  "emaste" VARCHAR(100),
  "codemp" VARCHAR(16),
  "codpai" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codmun" VARCHAR(4),
  "codpar" VARCHAR(4),
  "codsec" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('lidatste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "lidatste" IS '';


ALTER TABLE "lidatste" ADD CONSTRAINT "lidatste_FK_1" FOREIGN KEY ("litipste_id") REFERENCES "litipste" ("id");

-----------------------------------------------------------------------------
-- litipsol
-----------------------------------------------------------------------------

CREATE SEQUENCE "litipsol_seq";


CREATE TABLE "litipsol"
(
  "dessol" VARCHAR(100)  NOT NULL,
  "tipsol" VARCHAR(1),
  "maxdia" VARCHAR(4),
  "stasol" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('litipsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "litipsol" IS '';


-----------------------------------------------------------------------------
-- licomlic
-----------------------------------------------------------------------------

CREATE SEQUENCE "licomlic_seq";


CREATE TABLE "licomlic"
(
  "codcom" VARCHAR(4)  NOT NULL,
  "descom" VARCHAR(500)  NOT NULL,
  "fecnom" DATE,
  "decret" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('licomlic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "licomlic" IS '';


-----------------------------------------------------------------------------
-- lidetcom
-----------------------------------------------------------------------------

CREATE SEQUENCE "lidetcom_seq";


CREATE TABLE "lidetcom"
(
  "licomlic_id" INTEGER  NOT NULL,
  "codemp" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('lidetcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "lidetcom" IS '';


ALTER TABLE "lidetcom" ADD CONSTRAINT "lidetcom_FK_1" FOREIGN KEY ("licomlic_id") REFERENCES "licomlic" ("id");

-----------------------------------------------------------------------------
-- liregsol
-----------------------------------------------------------------------------

CREATE SEQUENCE "liregsol_seq";


CREATE TABLE "liregsol"
(
  "numsol" VARCHAR(8)  NOT NULL,
  "dessol" VARCHAR(500)  NOT NULL,
  "lidatste_id" INTEGER  NOT NULL,
  "litipsol_id" INTEGER  NOT NULL,
  "fecsol" DATE  NOT NULL,
  "fecres" DATE,
  "obssol" VARCHAR(1000),
  "licomlic_id" INTEGER,
  "codemp" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('liregsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liregsol" IS '';


ALTER TABLE "liregsol" ADD CONSTRAINT "liregsol_FK_1" FOREIGN KEY ("lidatste_id") REFERENCES "lidatste" ("id");

ALTER TABLE "liregsol" ADD CONSTRAINT "liregsol_FK_2" FOREIGN KEY ("litipsol_id") REFERENCES "litipsol" ("id");

ALTER TABLE "liregsol" ADD CONSTRAINT "liregsol_FK_3" FOREIGN KEY ("licomlic_id") REFERENCES "licomlic" ("id");

-----------------------------------------------------------------------------
-- liressol
-----------------------------------------------------------------------------

CREATE SEQUENCE "liressol_seq";


CREATE TABLE "liressol"
(
  "liregsol_id" INTEGER  NOT NULL,
  "numsol" VARCHAR(8)  NOT NULL,
  "numcor" VARCHAR(12)  NOT NULL,
  "codempemi" VARCHAR(16)  NOT NULL,
  "codempfir" VARCHAR(16)  NOT NULL,
  "ubiarc" VARCHAR(250),
  "fecres" DATE,
  "fecfir" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('liressol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liressol" IS '';


ALTER TABLE "liressol" ADD CONSTRAINT "liressol_FK_1" FOREIGN KEY ("liregsol_id") REFERENCES "liregsol" ("id");

-----------------------------------------------------------------------------
-- litiplic
-----------------------------------------------------------------------------

CREATE SEQUENCE "litiplic_seq";


CREATE TABLE "litiplic"
(
  "destiplic" VARCHAR(500)  NOT NULL,
  "maxunitri" NUMERIC(14,2),
  "artley" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('litiplic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "litiplic" IS '';


-----------------------------------------------------------------------------
-- lireglic
-----------------------------------------------------------------------------

CREATE SEQUENCE "lireglic_seq";


CREATE TABLE "lireglic"
(
  "codlic" VARCHAR(32)  NOT NULL,
  "deslic" VARCHAR(1000)  NOT NULL,
  "litiplic_id" INTEGER  NOT NULL,
  "lisicact_id" INTEGER,
  "fecreg" DATE  NOT NULL,
  "fecedi" DATE,
  "liregsol_id" INTEGER  NOT NULL,
  "plamodifi" INTEGER,
  "plaaclara" INTEGER,
  "plaprorro" INTEGER,
  "fecdisdes" DATE  NOT NULL,
  "fecdishas" DATE  NOT NULL,
  "costo" NUMERIC(14,2)  NOT NULL,
  "forpag" VARCHAR(1000),
  "decretos" VARCHAR(1000),
  "dirret" VARCHAR(1000),
  "percontac" VARCHAR(1000),
  "horaret" VARCHAR(1000),
  "periodico" VARCHAR(1000),
  "fecpub" DATE,
  "pagina" VARCHAR(3),
  "cuerpo" VARCHAR(1000),
  "mes" VARCHAR(1000),
  "codpaiefec" VARCHAR(4),
  "codpairecep" VARCHAR(4),
  "codfin" VARCHAR(4),
  "fecofer" DATE,
  "horaofer" VARCHAR(1000),
  "dirofer" VARCHAR(1000),
  "percontacofer" VARCHAR(1000),
  "codclacomp" VARCHAR(5),
  "observaciones" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('lireglic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "lireglic" IS '';


ALTER TABLE "lireglic" ADD CONSTRAINT "lireglic_FK_1" FOREIGN KEY ("litiplic_id") REFERENCES "litiplic" ("id");

ALTER TABLE "lireglic" ADD CONSTRAINT "lireglic_FK_2" FOREIGN KEY ("lisicact_id") REFERENCES "lisicact" ("id");

ALTER TABLE "lireglic" ADD CONSTRAINT "lireglic_FK_3" FOREIGN KEY ("liregsol_id") REFERENCES "liregsol" ("id");

-----------------------------------------------------------------------------
-- lilichis
-----------------------------------------------------------------------------

CREATE SEQUENCE "lilichis_seq";


CREATE TABLE "lilichis"
(
  "codlic" VARCHAR(32)  NOT NULL,
  "histproc" VARCHAR(1000),
  "periodico" VARCHAR(1000),
  "fecpub" DATE,
  "pagina" VARCHAR(3),
  "cuerpo" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('lilichis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "lilichis" IS '';


-----------------------------------------------------------------------------
-- liemppar
-----------------------------------------------------------------------------

CREATE SEQUENCE "liemppar_seq";


CREATE TABLE "liemppar"
(
  "lireglic_id" INTEGER  NOT NULL,
  "codlic" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "fecins" DATE,
  "observaciones" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('liemppar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liemppar" IS '';


ALTER TABLE "liemppar" ADD CONSTRAINT "liemppar_FK_1" FOREIGN KEY ("lireglic_id") REFERENCES "lireglic" ("id");

-----------------------------------------------------------------------------
-- liempofe
-----------------------------------------------------------------------------

CREATE SEQUENCE "liempofe_seq";


CREATE TABLE "liempofe"
(
  "lireglic_id" INTEGER  NOT NULL,
  "codlic" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "fecins" DATE,
  "precal" VARCHAR(1),
  "montot" NUMERIC(14,2)  NOT NULL,
  "observaciones" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('liempofe_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liempofe" IS '';


ALTER TABLE "liempofe" ADD CONSTRAINT "liempofe_FK_1" FOREIGN KEY ("lireglic_id") REFERENCES "lireglic" ("id");

-----------------------------------------------------------------------------
-- lioferpre
-----------------------------------------------------------------------------

CREATE SEQUENCE "lioferpre_seq";


CREATE TABLE "lioferpre"
(
  "lireglic_id" INTEGER  NOT NULL,
  "codlic" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "codpar" VARCHAR(32)  NOT NULL,
  "cant" NUMERIC(14,2)  NOT NULL,
  "precio" NUMERIC(14,2)  NOT NULL,
  "monsiniva" NUMERIC(14,2)  NOT NULL,
  "iva" NUMERIC(14,2),
  "montot" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('lioferpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "lioferpre" IS '';


ALTER TABLE "lioferpre" ADD CONSTRAINT "lioferpre_FK_1" FOREIGN KEY ("lireglic_id") REFERENCES "lireglic" ("id");

-----------------------------------------------------------------------------
-- lirecaud
-----------------------------------------------------------------------------

CREATE SEQUENCE "lirecaud_seq";


CREATE TABLE "lirecaud"
(
  "codrec" VARCHAR(4)  NOT NULL,
  "desrec" VARCHAR(100)  NOT NULL,
  "requerido" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('lirecaud_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "lirecaud" IS '';


-----------------------------------------------------------------------------
-- liasplegcrieva
-----------------------------------------------------------------------------

CREATE SEQUENCE "liasplegcrieva_seq";


CREATE TABLE "liasplegcrieva"
(
  "lireglic_id" INTEGER  NOT NULL,
  "codlic" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "lirecaud_id" INTEGER  NOT NULL,
  "puntaje" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('liasplegcrieva_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liasplegcrieva" IS '';


ALTER TABLE "liasplegcrieva" ADD CONSTRAINT "liasplegcrieva_FK_1" FOREIGN KEY ("lireglic_id") REFERENCES "lireglic" ("id");

ALTER TABLE "liasplegcrieva" ADD CONSTRAINT "liasplegcrieva_FK_2" FOREIGN KEY ("lirecaud_id") REFERENCES "lirecaud" ("id");

-----------------------------------------------------------------------------
-- liaspteccrieva
-----------------------------------------------------------------------------

CREATE SEQUENCE "liaspteccrieva_seq";


CREATE TABLE "liaspteccrieva"
(
  "codcri" VARCHAR(4)  NOT NULL,
  "descri" VARCHAR(100)  NOT NULL,
  "puntaje" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('liaspteccrieva_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liaspteccrieva" IS '';


-----------------------------------------------------------------------------
-- liaspfincrieva
-----------------------------------------------------------------------------

CREATE SEQUENCE "liaspfincrieva_seq";


CREATE TABLE "liaspfincrieva"
(
  "codcri" VARCHAR(4)  NOT NULL,
  "descri" VARCHAR(100)  NOT NULL,
  "puntaje" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('liaspfincrieva_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liaspfincrieva" IS '';


-----------------------------------------------------------------------------
-- liasptecanalis
-----------------------------------------------------------------------------

CREATE SEQUENCE "liasptecanalis_seq";


CREATE TABLE "liasptecanalis"
(
  "lireglic_id" INTEGER  NOT NULL,
  "codlic" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "liaspteccrieva_id" INTEGER  NOT NULL,
  "puntaje" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('liasptecanalis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liasptecanalis" IS '';


ALTER TABLE "liasptecanalis" ADD CONSTRAINT "liasptecanalis_FK_1" FOREIGN KEY ("lireglic_id") REFERENCES "lireglic" ("id");

ALTER TABLE "liasptecanalis" ADD CONSTRAINT "liasptecanalis_FK_2" FOREIGN KEY ("liaspteccrieva_id") REFERENCES "liaspteccrieva" ("id");

-----------------------------------------------------------------------------
-- liaspfinanalis
-----------------------------------------------------------------------------

CREATE SEQUENCE "liaspfinanalis_seq";


CREATE TABLE "liaspfinanalis"
(
  "lireglic_id" INTEGER  NOT NULL,
  "codlic" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "liaspfincrieva_id" INTEGER  NOT NULL,
  "puntaje" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('liaspfinanalis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "liaspfinanalis" IS '';


ALTER TABLE "liaspfinanalis" ADD CONSTRAINT "liaspfinanalis_FK_1" FOREIGN KEY ("lireglic_id") REFERENCES "lireglic" ("id");

ALTER TABLE "liaspfinanalis" ADD CONSTRAINT "liaspfinanalis_FK_2" FOREIGN KEY ("liaspfincrieva_id") REFERENCES "liaspfincrieva" ("id");

-----------------------------------------------------------------------------
-- licalvan
-----------------------------------------------------------------------------

CREATE SEQUENCE "licalvan_seq";


CREATE TABLE "licalvan"
(
  "lireglic_id" INTEGER  NOT NULL,
  "codlic" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "vandecla" NUMERIC(14,2),
  "vanmayor" NUMERIC(14,2),
  "vanprefer" NUMERIC(14,2),
  "preadipym" NUMERIC(14,2),
  "preportot" NUMERIC(14,2),
  "preevaofe" NUMERIC(14,2),
  "preajusta" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('licalvan_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "licalvan" IS '';


ALTER TABLE "licalvan" ADD CONSTRAINT "licalvan_FK_1" FOREIGN KEY ("lireglic_id") REFERENCES "lireglic" ("id");

-----MODIFICAR LA TABLA LILICHIS
ALTER TABLE lilichis DROP COLUMN histproc;
ALTER TABLE lilichis ADD COLUMN mes varchar(2);

DROP TABLE IF EXISTS "occlacomp" CASCADE;
------------------------------------------------


CREATE SEQUENCE "occlacomp_seq";


CREATE TABLE "occlacomp"
(
  "codclacomp" VARCHAR(5)  NOT NULL,
  "desclacomp" VARCHAR(1000)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('occlacomp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "occlacomp" IS '';