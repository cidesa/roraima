
-----------------------------------------------------------------------------
-- apli_user
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "apli_user" CASCADE;

DROP SEQUENCE IF EXISTS "apli_user_seq";

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


-----------------------------------------------------------------------------
-- empresa
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "empresa" CASCADE;

DROP SEQUENCE IF EXISTS "empresa_seq";

CREATE SEQUENCE "empresa_seq";


CREATE TABLE "empresa"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "nomemp" VARCHAR(50)  NOT NULL,
  "diremp" VARCHAR(50),
  "tlfemp" VARCHAR(15),
  "passemp" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('empresa_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "empresa" IS '';


-----------------------------------------------------------------------------
-- usuarios
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "usuarios" CASCADE;

DROP SEQUENCE IF EXISTS "usuarios_seq";

CREATE SEQUENCE "usuarios_seq";


CREATE TABLE "usuarios"
(
  "loguse" VARCHAR(50)  NOT NULL,
  "nomuse" VARCHAR(250)  NOT NULL,
  "apluse" VARCHAR(3)  NOT NULL,
  "numemp" VARCHAR(12),
  "pasuse" VARCHAR(10)  NOT NULL,
  "diremp" VARCHAR(250),
  "telemp" VARCHAR(50),
  "cedemp" VARCHAR(10),
  "numuni" VARCHAR(4),
  "codcat" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('usuarios_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "usuarios" IS '';


-----------------------------------------------------------------------------
-- aplifor
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "aplifor" CASCADE;

DROP SEQUENCE IF EXISTS "aplifor_seq";

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

DROP TABLE IF EXISTS "aplicacion" CASCADE;

DROP SEQUENCE IF EXISTS "aplicacion_seq";

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

DROP TABLE IF EXISTS "division" CASCADE;

DROP SEQUENCE IF EXISTS "division_seq";

CREATE SEQUENCE "division_seq";


CREATE TABLE "division"
(
  "coddiv" VARCHAR(3)  NOT NULL,
  "desdiv" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('division_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "division" IS '';

