--Se agrego el numcomapr para guardar el numero de comprobante asociado a la orden cuando es
-- aprobada (Desireé Martínez)

ALTER TABLE "opordpag"
  ADD COLUMN "numcomapr" varchar(8);


ALTER TABLE "opordpag"
  ADD COLUMN "codconcepto" varchar(4);

  -----------------------------------------------------------------------------
-- opconpag
-----------------------------------------------------------------------------

--DROP TABLE IF EXISTS "opconpag" CASCADE;

--DROP SEQUENCE IF EXISTS "opconpag_seq";

CREATE SEQUENCE "opconpag_seq";


CREATE TABLE "opconpag"
(
  "codconcepto" VARCHAR(4) NOT NULL,
  "nomconcepto" VARCHAR(250) NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('opconpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opconpag" IS 'Tabla que almacena los Conceptos de Pagos para la Orden de Pago';