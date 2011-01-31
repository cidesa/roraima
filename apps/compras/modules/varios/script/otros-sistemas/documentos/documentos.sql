SET SEARCH_PATH TO "SIMA002";



-----------------------------------------------------------------------------
-- acdestina
-----------------------------------------------------------------------------

DROP TABLE  "acdestina" CASCADE;

DROP SEQUENCE  "acdestina_seq" CASCADE;

CREATE SEQUENCE "acdestina_seq";


CREATE TABLE "acdestina"
(
  "cedrif" VARCHAR(15)  NOT NULL,
  "nomdes" VARCHAR(250)  NOT NULL,
  "dirdes" VARCHAR(100),
  "teldes" VARCHAR(20),
  "nitdes" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('acdestina_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "acdestina" IS '';


-----------------------------------------------------------------------------
-- acunidad
-----------------------------------------------------------------------------

DROP TABLE  "acunidad" CASCADE;

DROP SEQUENCE  "acunidad_seq";

CREATE SEQUENCE "acunidad_seq";


CREATE TABLE "acunidad"
(
  "numuni" VARCHAR(4)  NOT NULL,
  "nomuni" VARCHAR(30)  NOT NULL,
  "desuni" VARCHAR(200),
  "id" INTEGER  NOT NULL DEFAULT nextval('acunidad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "acunidad" IS '';

-----------------------------------------------------------------------------
-- dfrutadoc
-----------------------------------------------------------------------------

DROP TABLE  "dfrutadoc" CASCADE;

DROP SEQUENCE  "dfrutadoc_seq";

CREATE SEQUENCE "dfrutadoc_seq";


CREATE TABLE "dfrutadoc"
(
  "rutdoc" INTEGER  NOT NULL,
  "desuni" VARCHAR(100),
  "desrut" VARCHAR(100),
  "diadoc" INTEGER  NOT NULL,
  "id_acunidad" INTEGER  NOT NULL,
  "id_dftabtip" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('dfrutadoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfrutadoc" IS '';


ALTER TABLE "dfrutadoc" ADD CONSTRAINT "dfrutadoc_FK_1" FOREIGN KEY ("id_acunidad") REFERENCES "acunidad" ("id");

ALTER TABLE "dfrutadoc" ADD CONSTRAINT "dfrutadoc_FK_2" FOREIGN KEY ("id_dftabtip") REFERENCES "dftabtip" ("id");


-----------------------------------------------------------------------------
-- dfmedtra
-----------------------------------------------------------------------------

--DROP TABLE  "dfmedtra" CASCADE;

--DROP SEQUENCE  "dfmedtra_seq";

CREATE SEQUENCE "dfmedtra_seq";


CREATE TABLE "dfmedtra"
(
  "destra" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('dfmedtra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfmedtra" IS '';


-----------------------------------------------------------------------------
-- dfatendoc
-----------------------------------------------------------------------------

DROP TABLE  "dfatendoc" CASCADE;

DROP SEQUENCE  "dfatendoc_seq";

CREATE SEQUENCE "dfatendoc_seq";


CREATE TABLE "dfatendoc"
(
  "coddoc" VARCHAR(30),
  "desdoc" VARCHAR(250),
  "mondoc" VARCHAR(50),
  "fecdoc" VARCHAR(50),
  "staate" VARCHAR(50),
  "anuate" INTEGER  NOT NULL,
  "estado" VARCHAR(1),
  "id_dftabtip" INTEGER  NOT NULL,
  "infdoc1" VARCHAR(100),
  "infdoc2" VARCHAR(100),
  "infdoc3" VARCHAR(100),
  "infdoc4" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('dfatendoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfatendoc" IS '';


ALTER TABLE "dfatendoc" ADD CONSTRAINT "dfatendoc_FK_1" FOREIGN KEY ("id_dftabtip") REFERENCES "dftabtip" ("id");

-----------------------------------------------------------------------------
-- dfatendocdet
-----------------------------------------------------------------------------

DROP TABLE  "dfatendocdet" CASCADE;

DROP SEQUENCE  "dfatendocdet_seq";

CREATE SEQUENCE "dfatendocdet_seq";


CREATE TABLE "dfatendocdet"
(
  "id_dfatendoc" INTEGER  NOT NULL,
  "id_usuario" INTEGER  NOT NULL,
  "desate" VARCHAR(100),
  "fecrec" TIMESTAMP  NOT NULL,
  "fecate" TIMESTAMP  NOT NULL,
  "id_acunidad_ori" INTEGER  NOT NULL,
  "id_acunidad_des" INTEGER  NOT NULL,
  "id_dfrutadoc" INTEGER  NOT NULL,
  "id_dfmedtra" INTEGER  NOT NULL,
  "diaent" INTEGER  NOT NULL,
  "totdia" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('dfatendocdet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfatendocdet" IS '';


ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_1" FOREIGN KEY ("id_dfatendoc") REFERENCES "dfatendoc" ("id");

--ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_2" FOREIGN KEY ("id_usuario") REFERENCES "SIMA_USER"."usuarios" ("id");

--ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_3" FOREIGN KEY ("id_acunidad_ori") REFERENCES "acunidad" ("id");

--ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_4" FOREIGN KEY ("id_acunidad_des") REFERENCES "acunidad" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_5" FOREIGN KEY ("id_dfrutadoc") REFERENCES "dfrutadoc" ("id");

--ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_6" FOREIGN KEY ("id_dfmedtra") REFERENCES "dfmedtra" ("id");

-----------------------------------------------------------------------------
-- dfatendocobs
-----------------------------------------------------------------------------

--DROP TABLE  "dfatendocobs" CASCADE;

--DROP SEQUENCE  "dfatendocobs_seq";

CREATE SEQUENCE "dfatendocobs_seq";


CREATE TABLE "dfatendocobs"
(
  "desobs" VARCHAR(100),
  "id_dfatendocdet" INTEGER  NOT NULL,
  "id_usuario" INTEGER  NOT NULL,
  "fecobs" TIMESTAMP  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('dfatendocobs_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfatendocobs" IS '';

ALTER TABLE "SIMA_USER".usuarios ADD CONSTRAINT unique_usuarios_id UNIQUE (id);

ALTER TABLE "dfatendocobs" ADD CONSTRAINT "dfatendocobs_FK_1" FOREIGN KEY ("id_dfatendocdet") REFERENCES "dfatendocdet" ("id");

ALTER TABLE "dfatendocobs" ADD CONSTRAINT "dfatendocobs_FK_2" FOREIGN KEY ("id_usuario") REFERENCES "SIMA_USER"."usuarios" ("id");

-----------------------------------------------------------------------------
-- dftabtip
-----------------------------------------------------------------------------

DROP TABLE  "dftabtip" CASCADE;

DROP SEQUENCE  "dftabtip_seq";

CREATE SEQUENCE "dftabtip_seq";


CREATE TABLE "dftabtip"
(
  "tipdoc" VARCHAR(4)  NOT NULL,
  "nomtab" VARCHAR(30)  NOT NULL,
  "vidutil" INTEGER  NOT NULL,
  "clvprm" VARCHAR(30),
  "clvfrn" VARCHAR(30),
  "mondoc" VARCHAR(20),
  "fecdoc" VARCHAR(20),
  "desdoc" VARCHAR(20),
  "stadoc" VARCHAR(20),
  "infdoc1" VARCHAR(100),
  "infdoc2" VARCHAR(100),
  "infdoc3" VARCHAR(100),
  "infdoc4" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('dftabtip_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dftabtip" IS '';


-----------------------------------------------------------------------------
-- dfdiafer
-----------------------------------------------------------------------------

--DROP TABLE  "dfdiafer" CASCADE;

--DROP SEQUENCE  "dfdiafer_seq";

CREATE SEQUENCE "dfdiafer_seq";


CREATE TABLE "dfdiafer"
(
  "diafer" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('dfdiafer_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfdiafer" IS '';

