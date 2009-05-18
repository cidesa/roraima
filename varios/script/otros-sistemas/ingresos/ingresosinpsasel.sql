-----------------------------------------------------------------------------
-- indefdes
-----------------------------------------------------------------------------

CREATE SEQUENCE "indefdes_seq";


CREATE TABLE "indefdes"
(
  "coddes" VARCHAR(4)  NOT NULL,
  "desdes" VARCHAR(250)  NOT NULL,
  "tipdes" VARCHAR(1)  NOT NULL,
  "valdes" NUMERIC(14,2)  NOT NULL,
  "diades" INTEGER  NOT NULL,
  "tipret" VARCHAR(250)  NOT NULL,
  "cuecon" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('indefdes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "indefdes" IS '';



-----------------------------------------------------------------------------
-- intipcli
-----------------------------------------------------------------------------

CREATE SEQUENCE "intipcli_seq";


CREATE TABLE "intipcli"
(
  "codtipcli" VARCHAR(4)  NOT NULL,
  "destipcli" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('intipcli_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "intipcli" IS '';

-----------------------------------------------------------------------------
-- inestado
-----------------------------------------------------------------------------

CREATE SEQUENCE "inestado_seq";


CREATE TABLE "inestado"
(
  "codedo" VARCHAR(4)  NOT NULL,
  "nomedo" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inestado_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inestado" IS '';


-----------------------------------------------------------------------------
-- inmunicipio
-----------------------------------------------------------------------------

CREATE SEQUENCE "inmunicipio_seq";


CREATE TABLE "inmunicipio"
(
  "inestado_id" INTEGER,
  "codmun" VARCHAR(4)  NOT NULL,
  "nommun" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inmunicipio_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inmunicipio" IS '';


ALTER TABLE "inmunicipio" ADD CONSTRAINT "inmunicipio_FK_1" FOREIGN KEY ("inestado_id") REFERENCES "inestado" ("id");

-----------------------------------------------------------------------------
-- inparroquia
-----------------------------------------------------------------------------

CREATE SEQUENCE "inparroquia_seq";


CREATE TABLE "inparroquia"
(
  "inestado_id" INTEGER,
  "inmunicipio_id" INTEGER,
  "codpar" VARCHAR(4)  NOT NULL,
  "nompar" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inparroquia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inparroquia" IS '';


ALTER TABLE "inparroquia" ADD CONSTRAINT "inparroquia_FK_1" FOREIGN KEY ("inestado_id") REFERENCES "inestado" ("id");

ALTER TABLE "inparroquia" ADD CONSTRAINT "inparroquia_FK_2" FOREIGN KEY ("inmunicipio_id") REFERENCES "inmunicipio" ("id");

-----------------------------------------------------------------------------
-- intippag
-----------------------------------------------------------------------------

CREATE SEQUENCE "intippag_seq";


CREATE TABLE "intippag"
(
  "codtippag" VARCHAR(4)  NOT NULL,
  "destippag" VARCHAR(200)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('intippag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "intippag" IS '';


-----------------------------------------------------------------------------
-- ingruprec
-----------------------------------------------------------------------------

CREATE SEQUENCE "ingruprec_seq";


CREATE TABLE "ingruprec"
(
  "codgrup" VARCHAR(4)  NOT NULL,
  "desgrup" VARCHAR(200)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ingruprec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ingruprec" IS '';


-----------------------------------------------------------------------------
-- indefban
-----------------------------------------------------------------------------

CREATE SEQUENCE "indefban_seq";


CREATE TABLE "indefban"
(
  "codban" VARCHAR(4)  NOT NULL,
  "desban" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('indefban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "indefban" IS '';


-----------------------------------------------------------------------------
-- indefcaj
-----------------------------------------------------------------------------

CREATE SEQUENCE "indefcaj_seq";


CREATE TABLE "indefcaj"
(
  "codcaj" VARCHAR(4)  NOT NULL,
  "descaj" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('indefcaj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "indefcaj" IS '';


-----------------------------------------------------------------------------
-- inrecaud
-----------------------------------------------------------------------------

CREATE SEQUENCE "inrecaud_seq";


CREATE TABLE "inrecaud"
(
  "ingruprec_id" INTEGER,
  "codrec" VARCHAR(4)  NOT NULL,
  "desrec" VARCHAR(30)  NOT NULL,
  "limita" BOOLEAN  NOT NULL,
  "unitri" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inrecaud_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inrecaud" IS '';


ALTER TABLE "inrecaud" ADD CONSTRAINT "inrecaud_FK_1" FOREIGN KEY ("ingruprec_id") REFERENCES "ingruprec" ("id");

-----------------------------------------------------------------------------
-- indestipcli
-----------------------------------------------------------------------------

CREATE SEQUENCE "indestipcli_seq";


CREATE TABLE "indestipcli"
(
  "indefdes_id" INTEGER,
  "intipcli_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('indestipcli_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "indestipcli" IS '';


ALTER TABLE "indestipcli" ADD CONSTRAINT "indestipcli_FK_1" FOREIGN KEY ("indefdes_id") REFERENCES "indefdes" ("id");

ALTER TABLE "indestipcli" ADD CONSTRAINT "indestipcli_FK_2" FOREIGN KEY ("intipcli_id") REFERENCES "intipcli" ("id");

-----------------------------------------------------------------------------
-- incondpag
-----------------------------------------------------------------------------

CREATE SEQUENCE "incondpag_seq";


CREATE TABLE "incondpag"
(
  "codcond" VARCHAR(4)  NOT NULL,
  "descond" VARCHAR(250)  NOT NULL,
  "tipcond" VARCHAR(100)  NOT NULL,
  "genord" VARCHAR(200)  NOT NULL,
  "diascond" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('incondpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "incondpag" IS '';


-----------------------------------------------------------------------------
-- incliente
-----------------------------------------------------------------------------

CREATE SEQUENCE "incliente_seq";


CREATE TABLE "incliente"
(
  "codcli" VARCHAR(15)  NOT NULL,
  "nomcli" VARCHAR(250)  NOT NULL,
  "rifcli" VARCHAR(15)  NOT NULL,
  "dircli" VARCHAR(100),
  "telcli" VARCHAR(30),
  "faxcli" VARCHAR(15),
  "email" VARCHAR(100),
  "limcre" NUMERIC(14,2),
  "codctacon" VARCHAR(32),
  "codctaord" VARCHAR(32),
  "codctaper" VARCHAR(32),
  "fecreg" DATE,
  "cirjud" VARCHAR(30),
  "regmer" VARCHAR(15),
  "tomreg" VARCHAR(15),
  "folreg" VARCHAR(15),
  "capsus" NUMERIC(14,2),
  "cappag" NUMERIC(14,2),
  "rifrepleg" VARCHAR(15),
  "nomrepleg" VARCHAR(50),
  "dirrepleg" VARCHAR(100),
  "telrepleg" VARCHAR(30),
  "emailrepleg" VARCHAR(100),
  "rifpercon" VARCHAR(15),
  "nompercon" VARCHAR(50),
  "dirpercon" VARCHAR(100),
  "telpercon" VARCHAR(30),
  "emailpercon" VARCHAR(100),
  "fecvenreg" DATE,
  "codgruprec" VARCHAR(4),
  "ctaconasoc" VARCHAR(32),
  "ctaordasoc" VARCHAR(32),
  "ctaperasoc" VARCHAR(32),
  "ctaordart" VARCHAR(32),
  "ctaperart" VARCHAR(32),
  "ctaordcont" VARCHAR(32),
  "ctapercont" VARCHAR(32),
  "nacpro" VARCHAR(1),
  "actprof" VARCHAR(1),
  "codtipemp" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('incliente_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "incliente" IS '';


-----------------------------------------------------------------------------
-- infactura
-----------------------------------------------------------------------------

CREATE SEQUENCE "infactura_seq";


CREATE TABLE "infactura"
(
  "numfac" VARCHAR(12)  NOT NULL,
  "tipper" VARCHAR(1)  NOT NULL,
  "cedrif" VARCHAR(12)  NOT NULL,
  "tipconc" VARCHAR(1)  NOT NULL,
  "idconc" INTEGER  NOT NULL,
  "moncan" NUMERIC(14,2)  NOT NULL,
  "indefban_id" INTEGER,
  "numdep" VARCHAR(100),
  "fecemi" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('infactura_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "infactura" IS '';


ALTER TABLE "infactura" ADD CONSTRAINT "infactura_FK_1" FOREIGN KEY ("indefban_id") REFERENCES "indefban" ("id");

-----------------------------------------------------------------------------
-- ingruprub
-----------------------------------------------------------------------------

CREATE SEQUENCE "ingruprub_seq";


CREATE TABLE "ingruprub"
(
  "codgruprub" VARCHAR(4)  NOT NULL,
  "desgruprub" VARCHAR(200)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ingruprub_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ingruprub" IS '';


-----------------------------------------------------------------------------
-- inrubro
-----------------------------------------------------------------------------

CREATE SEQUENCE "inrubro_seq";


CREATE TABLE "inrubro"
(
  "ingruprub_id" INTEGER,
  "codrub" VARCHAR(4)  NOT NULL,
  "desrub" VARCHAR(200)  NOT NULL,
  "monrub" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inrubro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inrubro" IS '';


ALTER TABLE "inrubro" ADD CONSTRAINT "inrubro_FK_1" FOREIGN KEY ("ingruprub_id") REFERENCES "ingruprub" ("id");




-----------------------------------------------------------------------------
-- inarticulo
-----------------------------------------------------------------------------

CREATE SEQUENCE "inarticulo_seq";


CREATE TABLE "inarticulo"
(
  "codart" VARCHAR(4)  NOT NULL,
  "desart" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inarticulo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inarticulo" IS '';


-----------------------------------------------------------------------------
-- indetfac
-----------------------------------------------------------------------------

CREATE SEQUENCE "indetfac_seq";


CREATE TABLE "indetfac"
(
  "infactura_id" INTEGER,
  "inarticulo_id" INTEGER,
  "canart" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('indetfac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "indetfac" IS '';


ALTER TABLE "indetfac" ADD CONSTRAINT "indetfac_FK_1" FOREIGN KEY ("infactura_id") REFERENCES "infactura" ("id");

ALTER TABLE "indetfac" ADD CONSTRAINT "indetfac_FK_2" FOREIGN KEY ("inarticulo_id") REFERENCES "inarticulo" ("id");










-----------------------------------------------------------------------------
-- inforpag
-----------------------------------------------------------------------------

CREATE SEQUENCE "inforpag_seq";


CREATE TABLE "inforpag"
(
  "codforpag" VARCHAR(4)  NOT NULL,
  "desforpag" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inforpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inforpag" IS '';


-----------------------------------------------------------------------------
-- insancion
-----------------------------------------------------------------------------

CREATE SEQUENCE "insancion_seq";


CREATE TABLE "insancion"
(
  "codsan" VARCHAR(4)  NOT NULL,
  "dessan" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('insancion_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "insancion" IS '';


-----------------------------------------------------------------------------
-- inmulta
-----------------------------------------------------------------------------

CREATE SEQUENCE "inmulta_seq";


CREATE TABLE "inmulta"
(
  "insancion_id" INTEGER,
  "codmul" VARCHAR(4)  NOT NULL,
  "desmul" VARCHAR(250)  NOT NULL,
  "unitri" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inmulta_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inmulta" IS '';


ALTER TABLE "inmulta" ADD CONSTRAINT "inmulta_FK_1" FOREIGN KEY ("insancion_id") REFERENCES "insancion" ("id");

-----------------------------------------------------------------------------
-- intipmul
-----------------------------------------------------------------------------

CREATE SEQUENCE "intipmul_seq";


CREATE TABLE "intipmul"
(
  "codtipmul" VARCHAR(4)  NOT NULL,
  "destipmul" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('intipmul_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "intipmul" IS '';


-----------------------------------------------------------------------------
-- intipprof
-----------------------------------------------------------------------------

CREATE SEQUENCE "intipprof_seq";


CREATE TABLE "intipprof"
(
  "codtipprof" VARCHAR(4)  NOT NULL,
  "destipprof" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('intipprof_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "intipprof" IS '';


-----------------------------------------------------------------------------
-- inespeci
-----------------------------------------------------------------------------

CREATE SEQUENCE "inespeci_seq";


CREATE TABLE "inespeci"
(
  "codespeci" VARCHAR(4)  NOT NULL,
  "desespeci" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('inespeci_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inespeci" IS '';


-----------------------------------------------------------------------------
-- intipemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "intipemp_seq";


CREATE TABLE "intipemp"
(
  "codtipemp" VARCHAR(4)  NOT NULL,
  "destipemp" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('intipemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "intipemp" IS '';


-----------------------------------------------------------------------------
-- informsol
-----------------------------------------------------------------------------

CREATE SEQUENCE "informsol_seq";


CREATE TABLE "informsol"
(
  "codformsol" VARCHAR(4)  NOT NULL,
  "desformsol" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('informsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "informsol" IS '';


-----------------------------------------------------------------------------
-- inprofes
-----------------------------------------------------------------------------

CREATE SEQUENCE "inprofes_seq";


CREATE TABLE "inprofes"
(
  "venext" VARCHAR(1)  NOT NULL,
  "cedprof" VARCHAR(12)  NOT NULL,
  "nomprof" VARCHAR(50)  NOT NULL,
  "apeprof" VARCHAR(50)  NOT NULL,
  "nacprof" VARCHAR(50)  NOT NULL,
  "pais" VARCHAR(50),
  "lugnac" VARCHAR(100),
  "sexo" VARCHAR(1),
  "fecnac" DATE,
  "dirnac" VARCHAR(100),
  "estciv" VARCHAR(1),
  "telhab" VARCHAR(25),
  "telcel" VARCHAR(25),
  "inestado_id" INTEGER,
  "inmunicipio_id" INTEGER,
  "inparroquia_id" INTEGER,
  "inespeci_id" INTEGER,
  "dirhab" VARCHAR(100),
  "codpost" VARCHAR(50),
  "email" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('inprofes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inprofes" IS '';


ALTER TABLE "inprofes" ADD CONSTRAINT "inprofes_FK_1" FOREIGN KEY ("inestado_id") REFERENCES "inestado" ("id");

ALTER TABLE "inprofes" ADD CONSTRAINT "inprofes_FK_2" FOREIGN KEY ("inmunicipio_id") REFERENCES "inmunicipio" ("id");

ALTER TABLE "inprofes" ADD CONSTRAINT "inprofes_FK_3" FOREIGN KEY ("inparroquia_id") REFERENCES "inparroquia" ("id");

ALTER TABLE "inprofes" ADD CONSTRAINT "inprofes_FK_4" FOREIGN KEY ("inespeci_id") REFERENCES "inespeci" ("id");

-----------------------------------------------------------------------------
-- inempresa
-----------------------------------------------------------------------------

CREATE SEQUENCE "inempresa_seq";


CREATE TABLE "inempresa"
(
  "rifemp" VARCHAR(12)  NOT NULL,
  "razsoc" VARCHAR(50)  NOT NULL,
  "intipemp_id" INTEGER,
  "inestado_id" INTEGER,
  "inmunicipio_id" INTEGER,
  "inparroquia_id" INTEGER,
  "diremp" VARCHAR(100),
  "codpost" VARCHAR(50),
  "telemp" VARCHAR(25),
  "email" VARCHAR(50),
  "cedrepleg" VARCHAR(12)  NOT NULL,
  "venextrepleg" VARCHAR(1)  NOT NULL,
  "nomrepleg" VARCHAR(50)  NOT NULL,
  "aperepleg" VARCHAR(50)  NOT NULL,
  "sexo" VARCHAR(1),
  "fecnac" DATE,
  "estciv" VARCHAR(1),
  "telhab" VARCHAR(25),
  "telcel" VARCHAR(25),
  "emailrepleg" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('inempresa_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inempresa" IS '';


ALTER TABLE "inempresa" ADD CONSTRAINT "inempresa_FK_1" FOREIGN KEY ("intipemp_id") REFERENCES "intipemp" ("id");

ALTER TABLE "inempresa" ADD CONSTRAINT "inempresa_FK_2" FOREIGN KEY ("inestado_id") REFERENCES "inestado" ("id");

ALTER TABLE "inempresa" ADD CONSTRAINT "inempresa_FK_3" FOREIGN KEY ("inmunicipio_id") REFERENCES "inmunicipio" ("id");

ALTER TABLE "inempresa" ADD CONSTRAINT "inempresa_FK_4" FOREIGN KEY ("inparroquia_id") REFERENCES "inparroquia" ("id");

-----------------------------------------------------------------------------
-- intipsol
-----------------------------------------------------------------------------

CREATE SEQUENCE "intipsol_seq";


CREATE TABLE "intipsol"
(
  "codtipsol" VARCHAR(4)  NOT NULL,
  "destipsol" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('intipsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "intipsol" IS '';


-----------------------------------------------------------------------------
-- iningprof
-----------------------------------------------------------------------------

CREATE SEQUENCE "iningprof_seq";


CREATE TABLE "iningprof"
(
  "intipsol_id" INTEGER,
  "codingprof" VARCHAR(4)  NOT NULL,
  "desingprof" VARCHAR(250)  NOT NULL,
  "unitri" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('iningprof_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "iningprof" IS '';


ALTER TABLE "iningprof" ADD CONSTRAINT "iningprof_FK_1" FOREIGN KEY ("intipsol_id") REFERENCES "intipsol" ("id");
