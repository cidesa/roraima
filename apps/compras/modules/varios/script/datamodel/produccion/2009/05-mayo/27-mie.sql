--CARLOS RAMIREZ DESARROLLO=>25-mie.sql
ALTER TABLE "nptipcon"
    ADD COLUMN "fid" varchar(1),
    ADD COLUMN "fecdes"  date;
COMMENT ON COLUMN nptipcon.fid IS 'Fideicomiso Si o No';
COMMENT ON COLUMN nptipcon.fecdes IS 'Fecha donde comienza el abono de Fideicomiso';

CREATE SEQUENCE "npintcon_seq";

CREATE TABLE "npintcon"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "fecdes" date ,
  "fechas" date,
  "tiptas" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npintcon_seq'::regclass)
);
COMMENT ON COLUMN npintcon.codcon IS 'Codigo de Contrato';
COMMENT ON COLUMN npintcon.fecdes IS 'Fecha Desde para Intereses';
COMMENT ON COLUMN npintcon.fechas IS 'Fecha Hasta para Intereses';
COMMENT ON COLUMN npintcon.tiptas IS 'Tipo de Tasa de Interes';

CREATE SEQUENCE "npdiaantper_seq";

CREATE TABLE "npdiaantper"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "fecdes" date ,
  "fechas" date,
  "numdia" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdiaantper_seq'::regclass)
);
COMMENT ON COLUMN npdiaantper.codcon IS 'Codigo de Contrato';
COMMENT ON COLUMN npdiaantper.fecdes IS 'Fecha Desde para Dias de Antiguedad';
COMMENT ON COLUMN npdiaantper.fechas IS 'Fecha Hasta para Dias de Antiguedad';
COMMENT ON COLUMN npdiaantper.numdia IS 'Numero de dias por Antiguedad';