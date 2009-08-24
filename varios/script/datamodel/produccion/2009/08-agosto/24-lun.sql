--Se creo este campo para agregar el Numero de Forma Preimpresa que se va generar con la Forma Preimpresa
-- de la Orden de Pago Desireé Martínez
ALTER TABLE "opordpag"
  ADD COLUMN "numforpre" VARCHAR(8);

--Definicion de Articulos
ALTER TABLE "cadefart"
  ADD COLUMN "tipdocpre" varchar(4);

  --Requerimiento Barcelona Solicitud de Pago con su respectivo Correlativo  Desireé Martínez
ALTER TABLE "cacorrel"
  ADD COLUMN "corpag" VARCHAR(8);

--DROP TABLE IF EXISTS "casolpag" CASCADE;

--DROP SEQUENCE IF EXISTS "casolpag_seq";

CREATE SEQUENCE "casolpag_seq";


CREATE TABLE "casolpag"
(
  "solpag" VARCHAR(8)  NOT NULL,
  "fecsol" DATE  NOT NULL,
  "dessol" VARCHAR(1000),
  "tipcom" VARCHAR(4)  NOT NULL,
  "cedrif" VARCHAR(15),
  "monsol" NUMERIC(14,2)  NOT NULL,
  "stasol" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('casolpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "casolpag" IS 'Solicitud de Pagos';


-----------------------------------------------------------------------------
-- cadetpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadetpag" CASCADE;

DROP SEQUENCE IF EXISTS "cadetpag_seq";

CREATE SEQUENCE "cadetpag_seq";


CREATE TABLE "cadetpag"
(
  "solpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "moncom" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cadetpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadetpag" IS 'Detalle Solicitud de Pagos';

--NIVELES DE APROBACION (OC y OP) Desireé Martínez NOTA: ESTOS SCRIPT ES PARA CORRERLOS EN EL SIMA_USER
ALTER TABLE "usuarios"
  ADD COLUMN "codniv" VARCHAR(3);

-----------------------------------------------------------------------------
-- segnivapr  NOTA: ESTOS SCRIPT ES PARA CORRERLOS EN EL SIMA_USER
-----------------------------------------------------------------------------

--DROP TABLE IF EXISTS "segnivapr" CASCADE;

--DROP SEQUENCE IF EXISTS "segnivapr_seq";

CREATE SEQUENCE "segnivapr_seq";


CREATE TABLE "segnivapr"
(
  "codniv" VARCHAR(3)  NOT NULL,
  "desniv" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('segnivapr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "segnivapr" IS 'Tabla para definir Niveles de Aprobación';


-----------------------------------------------------------------------------
-- segranapr  NOTA: ESTOS SCRIPT ES PARA CORRERLOS EN EL SIMA_USER
-----------------------------------------------------------------------------

--DROP TABLE IF EXISTS "segranapr" CASCADE;

--DROP SEQUENCE IF EXISTS "segranapr_seq";

CREATE SEQUENCE "segranapr_seq";


CREATE TABLE "segranapr"
(
  "randes" NUMERIC(14,2)  NOT NULL,
  "ranhas" NUMERIC(14,2)  NOT NULL,
  "codniv" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('segranapr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "segranapr" IS 'Tabla para definir rangos(UT) x Niveles de Aprobación';