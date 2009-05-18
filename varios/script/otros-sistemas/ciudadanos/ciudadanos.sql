set search_path to "SIMA002";
-----------------------------------------------------------------------------
-- attipayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "attipayu" CASCADE;

DROP SEQUENCE IF EXISTS "attipayu_seq";

CREATE SEQUENCE "attipayu_seq";


CREATE TABLE "attipayu"
(
  "codayu" VARCHAR(8)  NOT NULL,
  "desayu" VARCHAR(50)  NOT NULL,
  "codpre" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('attipayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "attipayu" IS '';


-----------------------------------------------------------------------------
-- atrecaud
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atrecaud" CASCADE;

DROP SEQUENCE IF EXISTS "atrecaud_seq";

CREATE SEQUENCE "atrecaud_seq";


CREATE TABLE "atrecaud"
(
  "codrec" VARCHAR(8)  NOT NULL,
  "desrec" VARCHAR(50)  NOT NULL,
  "requerido" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atrecaud_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atrecaud" IS '';


-----------------------------------------------------------------------------
-- atrecayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atrecayu" CASCADE;

DROP SEQUENCE IF EXISTS "atrecayu_seq";

CREATE SEQUENCE "atrecayu_seq";


CREATE TABLE "atrecayu"
(
  "attipayu_id" INTEGER,
  "atrecaud_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('atrecayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atrecayu" IS '';


ALTER TABLE "atrecayu" ADD CONSTRAINT "atrecayu_FK_1" FOREIGN KEY ("attipayu_id") REFERENCES "attipayu" ("id");

ALTER TABLE "atrecayu" ADD CONSTRAINT "atrecayu_FK_2" FOREIGN KEY ("atrecaud_id") REFERENCES "atrecaud" ("id");

-----------------------------------------------------------------------------
-- atestados
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atestados" CASCADE;

DROP SEQUENCE IF EXISTS "atestados_seq";

CREATE SEQUENCE "atestados_seq";


CREATE TABLE "atestados"
(
  "desest" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atestados_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atestados" IS '';


-----------------------------------------------------------------------------
-- atmunicipios
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atmunicipios" CASCADE;

DROP SEQUENCE IF EXISTS "atmunicipios_seq";

CREATE SEQUENCE "atmunicipios_seq";


CREATE TABLE "atmunicipios"
(
  "atestados_id" INTEGER,
  "desmun" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atmunicipios_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atmunicipios" IS '';


ALTER TABLE "atmunicipios" ADD CONSTRAINT "atmunicipios_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

-----------------------------------------------------------------------------
-- atparroquias
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atparroquias" CASCADE;

DROP SEQUENCE IF EXISTS "atparroquias_seq";

CREATE SEQUENCE "atparroquias_seq";


CREATE TABLE "atparroquias"
(
  "atmunicipios_id" INTEGER,
  "despar" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atparroquias_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atparroquias" IS '';


ALTER TABLE "atparroquias" ADD CONSTRAINT "atparroquias_FK_1" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

-----------------------------------------------------------------------------
-- atciudadano
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atciudadano" CASCADE;

DROP SEQUENCE IF EXISTS "atciudadano_seq";

CREATE SEQUENCE "atciudadano_seq";


CREATE TABLE "atciudadano"
(
  "cedciu" VARCHAR(12)  NOT NULL,
  "nomciu" VARCHAR(50)  NOT NULL,
  "apeciu" VARCHAR(50)  NOT NULL,
  "nacciu" VARCHAR(50)  NOT NULL,
  "pais" VARCHAR(50),
  "conext" VARCHAR(100),
  "lugnac" VARCHAR(100),
  "tipo" VARCHAR(1)  NOT NULL,
  "sexo" VARCHAR(1),
  "fecnac" DATE,
  "dirnac" VARCHAR(100),
  "estciv" VARCHAR(1),
  "telhab" VARCHAR(25),
  "teladihab" VARCHAR(25),
  "prociu" VARCHAR(30),
  "atestados_id" INTEGER,
  "atmunicipios_id" INTEGER,
  "atparroquias_id" INTEGER,
  "ciudad" VARCHAR(50),
  "caserio" VARCHAR(50),
  "dirhab" VARCHAR(100),
  "dirtra" VARCHAR(100),
  "concomciu" VARCHAR(100),
  "carconcomciu" VARCHAR(50),
  "nota" VARCHAR(100),
  "grains" VARCHAR(100),
  "traciu" BOOLEAN,
  "nomemp" VARCHAR(100),
  "diremp" VARCHAR(100),
  "telemp" VARCHAR(25),
  "attiping_id" INTEGER,
  "moning" NUMERIC(14,2),
  "atinsrefier_id" INTEGER,
  "ayusolant" VARCHAR(1),
  "insayuant" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('atciudadano_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atciudadano" IS '';


ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_2" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_3" FOREIGN KEY ("atparroquias_id") REFERENCES "atparroquias" ("id");

ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_4" FOREIGN KEY ("attiping_id") REFERENCES "attiping" ("id");

ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_5" FOREIGN KEY ("atinsrefier_id") REFERENCES "atinsrefier" ("id");

-----------------------------------------------------------------------------
-- attiping
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "attiping" CASCADE;

DROP SEQUENCE IF EXISTS "attiping_seq";

CREATE SEQUENCE "attiping_seq";


CREATE TABLE "attiping"
(
  "tiping" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('attiping_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "attiping" IS '';


-----------------------------------------------------------------------------
-- attipviv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "attipviv" CASCADE;

DROP SEQUENCE IF EXISTS "attipviv_seq";

CREATE SEQUENCE "attipviv_seq";


CREATE TABLE "attipviv"
(
  "tipviv" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('attipviv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "attipviv" IS '';


-----------------------------------------------------------------------------
-- attipproviv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "attipproviv" CASCADE;

DROP SEQUENCE IF EXISTS "attipproviv_seq";

CREATE SEQUENCE "attipproviv_seq";


CREATE TABLE "attipproviv"
(
  "tipproviv" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('attipproviv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "attipproviv" IS '';


-----------------------------------------------------------------------------
-- atestsoceco
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atestsoceco" CASCADE;

DROP SEQUENCE IF EXISTS "atestsoceco_seq";

CREATE SEQUENCE "atestsoceco_seq";


CREATE TABLE "atestsoceco"
(
  "atayudas_id" INTEGER,
  "atciudadano_id" INTEGER,
  "attipviv_id" INTEGER,
  "attipproviv_id" INTEGER,
  "carvivsal" BOOLEAN,
  "carvivcom" BOOLEAN,
  "carvivhab" BOOLEAN,
  "carvivcoc" BOOLEAN,
  "carvivban" BOOLEAN,
  "carvivpat" BOOLEAN,
  "carvivarever" BOOLEAN,
  "carvivpis" BOOLEAN,
  "carvivpar" BOOLEAN,
  "carvivtec" BOOLEAN,
  "anasoceco" VARCHAR(1000),
  "anafam" VARCHAR(1000),
  "otros" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('atestsoceco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atestsoceco" IS '';


ALTER TABLE "atestsoceco" ADD CONSTRAINT "atestsoceco_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

ALTER TABLE "atestsoceco" ADD CONSTRAINT "atestsoceco_FK_2" FOREIGN KEY ("atciudadano_id") REFERENCES "atciudadano" ("id");

ALTER TABLE "atestsoceco" ADD CONSTRAINT "atestsoceco_FK_3" FOREIGN KEY ("attipviv_id") REFERENCES "attipviv" ("id");

ALTER TABLE "atestsoceco" ADD CONSTRAINT "atestsoceco_FK_4" FOREIGN KEY ("attipproviv_id") REFERENCES "attipproviv" ("id");

-----------------------------------------------------------------------------
-- attrasoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "attrasoc" CASCADE;

DROP SEQUENCE IF EXISTS "attrasoc_seq";

CREATE SEQUENCE "attrasoc_seq";


CREATE TABLE "attrasoc"
(
  "cedtra" VARCHAR(12),
  "nomtra" VARCHAR(50),
  "apetra" VARCHAR(50),
  "nrocol" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('attrasoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "attrasoc" IS '';


-----------------------------------------------------------------------------
-- atgrufam
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atgrufam" CASCADE;

DROP SEQUENCE IF EXISTS "atgrufam_seq";

CREATE SEQUENCE "atgrufam_seq";


CREATE TABLE "atgrufam"
(
  "atciudadano_id" INTEGER,
  "cedfam" VARCHAR(12),
  "nomfam" VARCHAR(50)  NOT NULL,
  "apefam" VARCHAR(50)  NOT NULL,
  "edad" INTEGER  NOT NULL,
  "parfam" VARCHAR(50)  NOT NULL,
  "ocufam" VARCHAR(50)  NOT NULL,
  "moning" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('atgrufam_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atgrufam" IS '';


ALTER TABLE "atgrufam" ADD CONSTRAINT "atgrufam_FK_1" FOREIGN KEY ("atciudadano_id") REFERENCES "atciudadano" ("id");

-----------------------------------------------------------------------------
-- atayudas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atayudas" CASCADE;

DROP SEQUENCE IF EXISTS "atayudas_seq";

CREATE SEQUENCE "atayudas_seq";


CREATE TABLE "atayudas"
(
  "nroexp" VARCHAR(50),
  "refdoc" INTEGER,
  "priayu" INTEGER  NOT NULL,
  "atsolici" INTEGER  NOT NULL,
  "atbenefi" INTEGER  NOT NULL,
  "attipayu_id" INTEGER,
  "atrubros_id" INTEGER,
  "atestayu_id" INTEGER,
  "attrasoc_id" INTEGER,
  "caprovee_id" INTEGER,
  "proayu" VARCHAR(100),
  "nroofi" VARCHAR(50),
  "desayu" VARCHAR(50)  NOT NULL,
  "motayu" VARCHAR(50)  NOT NULL,
  "created_at" TIMESTAMP,
  "updated_at" TIMESTAMP,
  "usucre" VARCHAR(50),
  "usumod" VARCHAR(50),
  "codpre" VARCHAR(50),
  "detayu" VARCHAR(1000),
  "monayu" NUMERIC(14,2),
  "atmedico_id" INTEGER,
  "respat" VARCHAR(5000),
  "infmed" VARCHAR(5000),
  "obsmed" VARCHAR(5000),
  "fecdiasoc" DATE,
  "usudiasoc" VARCHAR(100),
  "resdiasoc" VARCHAR(5000),
  "fecvisdoc" DATE,
  "usuvisdoc" VARCHAR(100),
  "resvisdoc" VARCHAR(5000),
  "fecsol" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('atayudas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atayudas" IS '';


ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_1" FOREIGN KEY ("refdoc") REFERENCES "caordcom" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_2" FOREIGN KEY ("atsolici") REFERENCES "atciudadano" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_3" FOREIGN KEY ("atbenefi") REFERENCES "atciudadano" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_4" FOREIGN KEY ("attipayu_id") REFERENCES "attipayu" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_5" FOREIGN KEY ("atrubros_id") REFERENCES "atrubros" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_6" FOREIGN KEY ("atestayu_id") REFERENCES "atestayu" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_7" FOREIGN KEY ("attrasoc_id") REFERENCES "attrasoc" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_8" FOREIGN KEY ("caprovee_id") REFERENCES "caprovee" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_9" FOREIGN KEY ("atmedico_id") REFERENCES "atmedico" ("id");

-----------------------------------------------------------------------------
-- atdetrecayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdetrecayu" CASCADE;

DROP SEQUENCE IF EXISTS "atdetrecayu_seq";

CREATE SEQUENCE "atdetrecayu_seq";


CREATE TABLE "atdetrecayu"
(
  "atayudas_id" INTEGER,
  "atrecaud_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdetrecayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdetrecayu" IS '';


ALTER TABLE "atdetrecayu" ADD CONSTRAINT "atdetrecayu_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

ALTER TABLE "atdetrecayu" ADD CONSTRAINT "atdetrecayu_FK_2" FOREIGN KEY ("atrecaud_id") REFERENCES "atrecaud" ("id");

-----------------------------------------------------------------------------
-- atestayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atestayu" CASCADE;

DROP SEQUENCE IF EXISTS "atestayu_seq";

CREATE SEQUENCE "atestayu_seq";


CREATE TABLE "atestayu"
(
  "desest" VARCHAR(50)  NOT NULL,
  "comest" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atestayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atestayu" IS '';


-----------------------------------------------------------------------------
-- atgrudon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atgrudon" CASCADE;

DROP SEQUENCE IF EXISTS "atgrudon_seq";

CREATE SEQUENCE "atgrudon_seq";


CREATE TABLE "atgrudon"
(
  "codgru" VARCHAR(10)  NOT NULL,
  "desgru" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atgrudon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atgrudon" IS '';


-----------------------------------------------------------------------------
-- atdonaciones
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdonaciones" CASCADE;

DROP SEQUENCE IF EXISTS "atdonaciones_seq";

CREATE SEQUENCE "atdonaciones_seq";


CREATE TABLE "atdonaciones"
(
  "coddon" VARCHAR(10)  NOT NULL,
  "desdon" VARCHAR(100)  NOT NULL,
  "unidon" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdonaciones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdonaciones" IS '';


-----------------------------------------------------------------------------
-- atdetayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdetayu" CASCADE;

DROP SEQUENCE IF EXISTS "atdetayu_seq";

CREATE SEQUENCE "atdetayu_seq";


CREATE TABLE "atdetayu"
(
  "atayudas_id" INTEGER,
  "atdonaciones_id" INTEGER,
  "cantidad" INTEGER,
  "canapr" INTEGER,
  "aprobado" BOOLEAN,
  "precio" NUMERIC(14,2),
  "unidad" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('atdetayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdetayu" IS '';


ALTER TABLE "atdetayu" ADD CONSTRAINT "atdetayu_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

ALTER TABLE "atdetayu" ADD CONSTRAINT "atdetayu_FK_2" FOREIGN KEY ("atdonaciones_id") REFERENCES "atdonaciones" ("id");

-----------------------------------------------------------------------------
-- atfacturas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atfacturas" CASCADE;

DROP SEQUENCE IF EXISTS "atfacturas_seq";

CREATE SEQUENCE "atfacturas_seq";


CREATE TABLE "atfacturas"
(
  "atayudas_id" INTEGER,
  "numfac" VARCHAR(50)  NOT NULL,
  "basimp" NUMERIC(14,2),
  "iva" NUMERIC(14,2),
  "exentos" NUMERIC(14,2),
  "total" NUMERIC(14,2),
  "nrospd" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('atfacturas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atfacturas" IS '';


ALTER TABLE "atfacturas" ADD CONSTRAINT "atfacturas_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

-----------------------------------------------------------------------------
-- atunidades
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atunidades" CASCADE;

DROP SEQUENCE IF EXISTS "atunidades_seq";

CREATE SEQUENCE "atunidades_seq";


CREATE TABLE "atunidades"
(
  "coduni" VARCHAR(8)  NOT NULL,
  "desuni" VARCHAR(30)  NOT NULL,
  "diruni" VARCHAR(30),
  "telfuni" VARCHAR(30),
  "percon" VARCHAR(30),
  "telpercon" VARCHAR(30),
  "mailpercon" VARCHAR(30),
  "horario" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('atunidades_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atunidades" IS '';


-----------------------------------------------------------------------------
-- atreclamos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atreclamos" CASCADE;

DROP SEQUENCE IF EXISTS "atreclamos_seq";

CREATE SEQUENCE "atreclamos_seq";


CREATE TABLE "atreclamos"
(
  "atsolici" VARCHAR(50)  NOT NULL,
  "desrec" VARCHAR(30)  NOT NULL,
  "telefono" VARCHAR(60),
  "atunidades_id" INTEGER,
  "persona" VARCHAR(30),
  "status" VARCHAR(1),
  "respuesta" VARCHAR(100),
  "fechaa" DATE,
  "fechar" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('atreclamos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atreclamos" IS '';


ALTER TABLE "atreclamos" ADD CONSTRAINT "atreclamos_FK_1" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- atdenuncias
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdenuncias" CASCADE;

DROP SEQUENCE IF EXISTS "atdenuncias_seq";

CREATE SEQUENCE "atdenuncias_seq";


CREATE TABLE "atdenuncias"
(
  "atsolici" VARCHAR(30)  NOT NULL,
  "desden" VARCHAR(30)  NOT NULL,
  "telefono" VARCHAR(60),
  "atunidades_id" INTEGER,
  "persona" VARCHAR(30),
  "status" VARCHAR(1),
  "respuesta" VARCHAR(100),
  "fechaa" DATE,
  "fechar" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdenuncias_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdenuncias" IS '';


ALTER TABLE "atdenuncias" ADD CONSTRAINT "atdenuncias_FK_1" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- ataudiencias
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ataudiencias" CASCADE;

DROP SEQUENCE IF EXISTS "ataudiencias_seq";

CREATE SEQUENCE "ataudiencias_seq";


CREATE TABLE "ataudiencias"
(
  "atciudadano_id" INTEGER,
  "motaud" VARCHAR(30)  NOT NULL,
  "atunidades_id" INTEGER,
  "persona" VARCHAR(30),
  "status" VARCHAR(1),
  "fecha" DATE,
  "fechar" DATE,
  "fechaa" DATE,
  "lugar" VARCHAR(100),
  "observacion" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('ataudiencias_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ataudiencias" IS '';


ALTER TABLE "ataudiencias" ADD CONSTRAINT "ataudiencias_FK_1" FOREIGN KEY ("atciudadano_id") REFERENCES "atciudadano" ("id");

ALTER TABLE "ataudiencias" ADD CONSTRAINT "ataudiencias_FK_2" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- atrubros
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atrubros" CASCADE;

DROP SEQUENCE IF EXISTS "atrubros_seq";

CREATE SEQUENCE "atrubros_seq";


CREATE TABLE "atrubros"
(
  "attipayu_id" INTEGER,
  "desrub" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atrubros_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atrubros" IS '';


ALTER TABLE "atrubros" ADD CONSTRAINT "atrubros_FK_1" FOREIGN KEY ("attipayu_id") REFERENCES "attipayu" ("id");

-----------------------------------------------------------------------------
-- atdefemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdefemp" CASCADE;

DROP SEQUENCE IF EXISTS "atdefemp_seq";

CREATE SEQUENCE "atdefemp_seq";


CREATE TABLE "atdefemp"
(
  "codemp" VARCHAR(15)  NOT NULL,
  "nomemp" VARCHAR(100)  NOT NULL,
  "diremp" VARCHAR(100)  NOT NULL,
  "telemp" VARCHAR(30)  NOT NULL,
  "faxemp" VARCHAR(15),
  "emaemp" VARCHAR(100),
  "percon" VARCHAR(150),
  "repleg" VARCHAR(150),
  "preasi" NUMERIC(14,2),
  "monlimben" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('atdefemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdefemp" IS '';


-----------------------------------------------------------------------------
-- atdetrecrub
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdetrecrub" CASCADE;

DROP SEQUENCE IF EXISTS "atdetrecrub_seq";

CREATE SEQUENCE "atdetrecrub_seq";


CREATE TABLE "atdetrecrub"
(
  "atrubros_id" INTEGER,
  "atrecaud_id" INTEGER,
  "requerido" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdetrecrub_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdetrecrub" IS '';


ALTER TABLE "atdetrecrub" ADD CONSTRAINT "atdetrecrub_FK_1" FOREIGN KEY ("atrubros_id") REFERENCES "atrubros" ("id");

ALTER TABLE "atdetrecrub" ADD CONSTRAINT "atdetrecrub_FK_2" FOREIGN KEY ("atrecaud_id") REFERENCES "atrecaud" ("id");

-----------------------------------------------------------------------------
-- atmedico
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atmedico" CASCADE;

DROP SEQUENCE IF EXISTS "atmedico_seq";

CREATE SEQUENCE "atmedico_seq";


CREATE TABLE "atmedico"
(
  "cedrifmed" VARCHAR(15)  NOT NULL,
  "nombremed" VARCHAR(50)  NOT NULL,
  "apellimed" VARCHAR(50)  NOT NULL,
  "dirhabmed" VARCHAR(100),
  "dirtramed" VARCHAR(100),
  "telunomed" VARCHAR(25),
  "teldosmed" VARCHAR(25),
  "id" INTEGER  NOT NULL DEFAULT nextval('atmedico_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atmedico" IS '';


-----------------------------------------------------------------------------
-- atinsrefier
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atinsrefier" CASCADE;

DROP SEQUENCE IF EXISTS "atinsrefier_seq";

CREATE SEQUENCE "atinsrefier_seq";


CREATE TABLE "atinsrefier"
(
  "desinsref" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atinsrefier_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atinsrefier" IS '';


-----------------------------------------------------------------------------
-- atdocayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdocayu" CASCADE;

DROP SEQUENCE IF EXISTS "atdocayu_seq";

CREATE SEQUENCE "atdocayu_seq";


CREATE TABLE "atdocayu"
(
  "atayudas_id" INTEGER,
  "image" VARCHAR(100)  NOT NULL,
  "desimg" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdocayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdocayu" IS '';


ALTER TABLE "atdocayu" ADD CONSTRAINT "atdocayu_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

-----------------------------------------------------------------------------
-- caprovee
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caprovee" CASCADE;

DROP SEQUENCE IF EXISTS "caprovee_seq";

CREATE SEQUENCE "caprovee_seq";


CREATE TABLE "caprovee"
(
  "codpro" VARCHAR(15)  NOT NULL,
  "nompro" VARCHAR(250)  NOT NULL,
  "rifpro" VARCHAR(15)  NOT NULL,
  "nitpro" VARCHAR(15),
  "dirpro" VARCHAR(100),
  "telpro" VARCHAR(30),
  "faxpro" VARCHAR(15),
  "email" VARCHAR(100),
  "limcre" NUMERIC(14,2),
  "codcta" VARCHAR(32),
  "regmer" VARCHAR(15),
  "fecreg" DATE,
  "tomreg" VARCHAR(15),
  "folreg" VARCHAR(15),
  "capsus" NUMERIC(14,2),
  "cappag" NUMERIC(14,2),
  "rifrepleg" VARCHAR(15),
  "nomrepleg" VARCHAR(50),
  "dirrepleg" VARCHAR(100),
  "nrocei" VARCHAR(30),
  "codram" VARCHAR(6),
  "fecinscir" DATE,
  "numinscir" VARCHAR(20),
  "nacpro" VARCHAR(1),
  "codord" VARCHAR(32),
  "codpercon" VARCHAR(32),
  "codtiprec" VARCHAR(4),
  "codordadi" VARCHAR(32),
  "codperconadi" VARCHAR(32),
  "tipo" VARCHAR(1),
  "fecven" DATE,
  "ciudad" VARCHAR(100),
  "codordmercon" VARCHAR(32),
  "codpermercon" VARCHAR(32),
  "codordcontra" VARCHAR(32),
  "codpercontra" VARCHAR(32),
  "temcodpro" VARCHAR(10),
  "temrifpro" VARCHAR(15),
  "codctasec" VARCHAR(32),
  "codtipemp" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('caprovee_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "u_caprovee" UNIQUE ("rifpro")
);

COMMENT ON TABLE "caprovee" IS '';


-----------------------------------------------------------------------------
-- caordcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caordcom" CASCADE;

DROP SEQUENCE IF EXISTS "caordcom_seq";

CREATE SEQUENCE "caordcom_seq";


CREATE TABLE "caordcom"
(
  "ordcom" VARCHAR(8)  NOT NULL,
  "fecord" DATE  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "desord" VARCHAR(1000),
  "crecon" VARCHAR(2),
  "plaent" VARCHAR(25),
  "tiecan" VARCHAR(25),
  "monord" NUMERIC(14,2),
  "dtoord" NUMERIC(14,2),
  "refcom" VARCHAR(8),
  "staord" VARCHAR(1),
  "afepre" VARCHAR(1),
  "conpag" VARCHAR(1000),
  "forent" VARCHAR(1000),
  "fecanu" DATE,
  "tipmon" VARCHAR(3),
  "valmon" NUMERIC(14,2),
  "tipcom" VARCHAR(1),
  "tipord" VARCHAR(1),
  "tipo" VARCHAR(1),
  "coduni" VARCHAR(30),
  "codemp" VARCHAR(16),
  "notord" VARCHAR(1000),
  "tipdoc" VARCHAR(4),
  "tippro" VARCHAR(4),
  "afepro" VARCHAR(1),
  "doccom" VARCHAR(4),
  "refsol" VARCHAR(8),
  "tipfin" VARCHAR(4),
  "justif" VARCHAR(1000),
  "refprc" VARCHAR(1),
  "codmedcom" VARCHAR(4),
  "codprocom" VARCHAR(4),
  "codpai" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codmun" VARCHAR(4),
  "aplart" VARCHAR(2),
  "aplart6" VARCHAR(2),
  "numsigecof" VARCHAR(8),
  "fecsigecof" DATE,
  "expsigecof" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('caordcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caordcom" IS '';

