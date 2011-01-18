
-----------------------------------------------------------------------------
-- alumnos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "alumnos" CASCADE;

DROP SEQUENCE IF EXISTS "alumnos_seq";

CREATE SEQUENCE "alumnos_seq";


CREATE TABLE "alumnos"
(
  "cedula" INTEGER  NOT NULL,
  "nombre" VARCHAR(100)  NOT NULL,
  "apellido" VARCHAR(100)  NOT NULL,
  "fechan" DATE  NOT NULL,
  "sexo" CHAR(1)  NOT NULL,
  "direccion" VARCHAR(100)  NOT NULL,
  "telefono" VARCHAR(100),
  "correo" VARCHAR(100),
  "especialidad" VARCHAR(100)  NOT NULL,
  "lugarnaci" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('alumnos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "alumnos" IS '';


-----------------------------------------------------------------------------
-- inscripciones
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "inscripciones" CASCADE;

DROP SEQUENCE IF EXISTS "inscripciones_seq";

CREATE SEQUENCE "inscripciones_seq";


CREATE TABLE "inscripciones"
(
  "secciones_id" INTEGER,
  "alumnos_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('inscripciones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inscripciones" IS '';


CREATE INDEX "inscripciones_FI_1" ON "inscripciones" ("secciones_id");

CREATE INDEX "inscripciones_FI_2" ON "inscripciones" ("alumnos_id");

ALTER TABLE "inscripciones" ADD CONSTRAINT "inscripciones_FK_1" FOREIGN KEY ("secciones_id") REFERENCES "secciones" ("id");

ALTER TABLE "inscripciones" ADD CONSTRAINT "inscripciones_FK_2" FOREIGN KEY ("alumnos_id") REFERENCES "alumnos" ("id");

-----------------------------------------------------------------------------
-- materias
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "materias" CASCADE;

DROP SEQUENCE IF EXISTS "materias_seq";

CREATE SEQUENCE "materias_seq";


CREATE TABLE "materias"
(
  "codigo" VARCHAR(10)  NOT NULL,
  "nombre" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('materias_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "materias" IS '';


-----------------------------------------------------------------------------
-- profesores
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "profesores" CASCADE;

DROP SEQUENCE IF EXISTS "profesores_seq";

CREATE SEQUENCE "profesores_seq";


CREATE TABLE "profesores"
(
  "cedula" INTEGER  NOT NULL,
  "nombre" VARCHAR(100)  NOT NULL,
  "apellido" VARCHAR(100)  NOT NULL,
  "fechan" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('profesores_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "profesores" IS '';


-----------------------------------------------------------------------------
-- secciones
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "secciones" CASCADE;

DROP SEQUENCE IF EXISTS "secciones_seq";

CREATE SEQUENCE "secciones_seq";


CREATE TABLE "secciones"
(
  "codigo" VARCHAR(100)  NOT NULL,
  "nombre" VARCHAR(100)  NOT NULL,
  "profesores_id" INTEGER,
  "materias_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('secciones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "secciones" IS '';


CREATE INDEX "secciones_FI_1" ON "secciones" ("profesores_id");

CREATE INDEX "secciones_FI_2" ON "secciones" ("materias_id");

ALTER TABLE "secciones" ADD CONSTRAINT "secciones_FK_1" FOREIGN KEY ("profesores_id") REFERENCES "profesores" ("id");

ALTER TABLE "secciones" ADD CONSTRAINT "secciones_FK_2" FOREIGN KEY ("materias_id") REFERENCES "materias" ("id");

-----------------------------------------------------------------------------
-- estados
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "estados" CASCADE;

DROP SEQUENCE IF EXISTS "estados_seq";

CREATE SEQUENCE "estados_seq";


CREATE TABLE "estados"
(
  "nombre" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('estados_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "estados" IS '';


-----------------------------------------------------------------------------
-- municipios
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "municipios" CASCADE;

DROP SEQUENCE IF EXISTS "municipios_seq";

CREATE SEQUENCE "municipios_seq";


CREATE TABLE "municipios"
(
  "nombre" VARCHAR(100),
  "estados_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('municipios_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "municipios" IS '';


ALTER TABLE "municipios" ADD CONSTRAINT "municipios_FK_1" FOREIGN KEY ("estados_id") REFERENCES "estados" ("id");

-----------------------------------------------------------------------------
-- parroquias
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "parroquias" CASCADE;

DROP SEQUENCE IF EXISTS "parroquias_seq";

CREATE SEQUENCE "parroquias_seq";


CREATE TABLE "parroquias"
(
  "nombre" VARCHAR(100),
  "municipios_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('parroquias_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "parroquias" IS '';


ALTER TABLE "parroquias" ADD CONSTRAINT "parroquias_FK_1" FOREIGN KEY ("municipios_id") REFERENCES "municipios" ("id");

-----------------------------------------------------------------------------
-- usuarios
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "usuarios" CASCADE;

DROP SEQUENCE IF EXISTS "usuarios_seq";

CREATE SEQUENCE "usuarios_seq";


CREATE TABLE "usuarios"
(
  "login" VARCHAR(100),
  "nombre" VARCHAR(100),
  "password" VARCHAR(100),
  "parroquias_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('usuarios_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "usuarios" IS '';


ALTER TABLE "usuarios" ADD CONSTRAINT "usuarios_FK_1" FOREIGN KEY ("parroquias_id") REFERENCES "parroquias" ("id");
