-- Matriz de Requerimientos Barcelona Nómina

ALTER TABLE "npinfcur"
  ADD COLUMN "fecenttit" DATE;

ALTER TABLE "nphojint"
  ADD COLUMN "codtipemp" VARCHAR(3)  ;


-----------------------------------------------------------------------------
-- nptipemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipemp" CASCADE;

DROP SEQUENCE IF EXISTS "nptipemp_seq";

CREATE SEQUENCE "nptipemp_seq";


CREATE TABLE "nptipemp"
(
  "codtipemp" VARCHAR(3)  NOT NULL,
  "destipemp" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipemp" IS 'Tabla para definir Tipos de Empleados';