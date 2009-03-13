SET SEARCH_PATH TO "SIMA004";

-----------------------------------------------------------------------------
-- atestados
-----------------------------------------------------------------------------

-- DROP TABLE   "atestados" CASCADE;

-- DROP SEQUENCE   "atestados_seq";

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

-- DROP TABLE   "atmunicipios" CASCADE;

-- DROP SEQUENCE   "atmunicipios_seq";

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

-- DROP TABLE   "atparroquias" CASCADE;

-- DROP SEQUENCE   "atparroquias_seq";

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
-- attipayu
-----------------------------------------------------------------------------

-- DROP TABLE   "attipayu" CASCADE;

-- DROP SEQUENCE   "attipayu_seq";

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

-- DROP TABLE   "atrecaud" CASCADE;

-- DROP SEQUENCE   "atrecaud_seq";

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

-- DROP TABLE   "atrecayu" CASCADE;

-- DROP SEQUENCE   "atrecayu_seq";

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
-- attiping
-----------------------------------------------------------------------------

-- DROP TABLE   "attiping" CASCADE;

-- DROP SEQUENCE   "attiping_seq";

CREATE SEQUENCE "attiping_seq";


CREATE TABLE "attiping"
(
  "tiping" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('attiping_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "attiping" IS '';


-----------------------------------------------------------------------------
-- atciudadano
-----------------------------------------------------------------------------

-- DROP TABLE   "atciudadano" CASCADE;

-- DROP SEQUENCE   "atciudadano_seq";

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
  "id" INTEGER  NOT NULL DEFAULT nextval('atciudadano_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atciudadano" IS '';


ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_2" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_3" FOREIGN KEY ("atparroquias_id") REFERENCES "atparroquias" ("id");

ALTER TABLE "atciudadano" ADD CONSTRAINT "atciudadano_FK_4" FOREIGN KEY ("attiping_id") REFERENCES "attiping" ("id");

-----------------------------------------------------------------------------
-- attipviv
-----------------------------------------------------------------------------

-- DROP TABLE   "attipviv" CASCADE;

-- DROP SEQUENCE   "attipviv_seq";

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

-- DROP TABLE   "attipproviv" CASCADE;

-- DROP SEQUENCE   "attipproviv_seq";

CREATE SEQUENCE "attipproviv_seq";


CREATE TABLE "attipproviv"
(
  "tipproviv" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('attipproviv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "attipproviv" IS '';

-----------------------------------------------------------------------------
-- atestayu
-----------------------------------------------------------------------------

-- DROP TABLE   "atestayu" CASCADE;

-- DROP SEQUENCE   "atestayu_seq";

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
-- attrasoc
-----------------------------------------------------------------------------

-- DROP TABLE   "attrasoc" CASCADE;

-- DROP SEQUENCE   "attrasoc_seq";

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
-- atayudas
-----------------------------------------------------------------------------

-- DROP TABLE   "atayudas" CASCADE;

-- DROP SEQUENCE   "atayudas_seq";

CREATE SEQUENCE "atayudas_seq";

-- DROP SEQUENCE   "atayudas_nroexp_seq";

CREATE SEQUENCE "atayudas_nroexp_seq";


CREATE TABLE "atayudas"
(
  "nroexp" INTEGER  NOT NULL DEFAULT nextval('atayudas_seq'::regclass),
  "atsolici" INTEGER  NOT NULL,
  "atbenefi" INTEGER  NOT NULL,
  "attipayu_id" INTEGER,
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
  "id" INTEGER  NOT NULL DEFAULT nextval('atayudas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atayudas" IS '';


ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_1" FOREIGN KEY ("atsolici") REFERENCES "atciudadano" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_2" FOREIGN KEY ("atbenefi") REFERENCES "atciudadano" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_3" FOREIGN KEY ("attipayu_id") REFERENCES "attipayu" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_4" FOREIGN KEY ("atestayu_id") REFERENCES "atestayu" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_5" FOREIGN KEY ("attrasoc_id") REFERENCES "attrasoc" ("id");

-- ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_6" FOREIGN KEY ("caprovee_id") REFERENCES "caprovee" ("id");

-----------------------------------------------------------------------------
-- atestsoceco
-----------------------------------------------------------------------------

-- DROP TABLE   "atestsoceco" CASCADE;

-- DROP SEQUENCE   "atestsoceco_seq";

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
-- atgrufam
-----------------------------------------------------------------------------

-- DROP TABLE   "atgrufam" CASCADE;

-- DROP SEQUENCE   "atgrufam_seq";

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
-- atdetrecayu
-----------------------------------------------------------------------------

-- DROP TABLE   "atdetrecayu" CASCADE;

-- DROP SEQUENCE   "atdetrecayu_seq";

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
-- atgrudon
-----------------------------------------------------------------------------

-- DROP TABLE   "atgrudon" CASCADE;

-- DROP SEQUENCE   "atgrudon_seq";

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

-- DROP TABLE   "atdonaciones" CASCADE;

-- DROP SEQUENCE   "atdonaciones_seq";

CREATE SEQUENCE "atdonaciones_seq";


CREATE TABLE "atdonaciones"
(
  "atgrudon_id" INTEGER,
  "coddon" VARCHAR(10)  NOT NULL,
  "desdon" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdonaciones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdonaciones" IS '';


ALTER TABLE "atdonaciones" ADD CONSTRAINT "atdonaciones_FK_1" FOREIGN KEY ("atgrudon_id") REFERENCES "atgrudon" ("id");

-----------------------------------------------------------------------------
-- atdetayu
-----------------------------------------------------------------------------

-- DROP TABLE   "atdetayu" CASCADE;

-- DROP SEQUENCE   "atdetayu_seq";

CREATE SEQUENCE "atdetayu_seq";


CREATE TABLE "atdetayu"
(
  "atayudas_id" INTEGER,
  "atdonaciones_id" INTEGER,
  "cantidad" INTEGER,
  "canapr" INTEGER,
  "aprobado" BOOLEAN,
  "precio" NUMERIC(14,2),
  "unidad" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('atdetayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdetayu" IS '';


ALTER TABLE "atdetayu" ADD CONSTRAINT "atdetayu_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

ALTER TABLE "atdetayu" ADD CONSTRAINT "atdetayu_FK_2" FOREIGN KEY ("atdonaciones_id") REFERENCES "atdonaciones" ("id");

-----------------------------------------------------------------------------
-- atunidades
-----------------------------------------------------------------------------

-- DROP TABLE   "atunidades" CASCADE;

-- DROP SEQUENCE   "atunidades_seq";

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

-- DROP TABLE   "atreclamos" CASCADE;

-- DROP SEQUENCE   "atreclamos_seq";

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

-- DROP TABLE   "atdenuncias" CASCADE;

-- DROP SEQUENCE   "atdenuncias_seq";

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

-- DROP TABLE   "ataudiencias" CASCADE;

-- DROP SEQUENCE   "ataudiencias_seq";

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
-- atfacturas
-----------------------------------------------------------------------------

-- DROP TABLE   "atfacturas" CASCADE;

-- DROP SEQUENCE   "atfacturas_seq";

CREATE SEQUENCE "atfacturas_seq";


CREATE TABLE "atfacturas"
(
  "atayudas_id" INTEGER,
  "numfac" VARCHAR(50)  NOT NULL,
  "basimp" NUMERIC(14,2),
  "iva" NUMERIC(14,2),
  "exentos" NUMERIC(14,2),
  "total" NUMERIC(14,2),
  "nrospd" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atfacturas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atfacturas" IS '';


ALTER TABLE "atfacturas" ADD CONSTRAINT "atfacturas_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");


