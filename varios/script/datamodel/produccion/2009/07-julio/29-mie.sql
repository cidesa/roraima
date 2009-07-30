-- Se actualizo produccion con el formularios de bancos (Compras) Desireé Martínez
CREATE SEQUENCE "cabanco_seq";


CREATE TABLE "cabanco"
(
  "codban" VARCHAR(4)  NOT NULL,
  "desban" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cabanco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cabanco" IS '';


ALTER TABLE dftabtip ADD COLUMN fecini date;

ALTER TABLE dftabtip ADD COLUMN valact VARCHAR(1);

ALTER TABLE dftabtip ADD COLUMN valanu VARCHAR(1);
