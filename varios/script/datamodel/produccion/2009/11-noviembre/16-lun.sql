--CARLOS RAMIREZ
--EVALUACION Y DESEMPEÑO
create SEQUENCE rhprocur_seq;

create table rhprocur
(
  "codcur" varchar(10) not null,
  "cedpro" varchar(10) not null,
  "nompro" varchar(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhprocur_seq'::regclass));
  
--CARLOS RAMIREZ
--EVALUACION Y DESEMPEÑO
alter table rhclacur
  drop column horini,
  drop column horfin;

alter table rhclacur
  add column horini varchar(10),
  add column horfin varchar(10);
  
--CARLOS RAMIREZ EVALUACION Y DESEMPEÑO
alter table rhinscur
  add column tipper varchar(1);
  
--CARLSO RAMIREZ #EVALUACION Y DESEMPEÑO
CREATE SEQUENCE "rhdefran_seq";

CREATE TABLE "rhdefran"
(
  "codran" VARCHAR(2)  NOT NULL,
  "desran" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdefran_seq'::regclass)
);

COMMENT ON TABLE "rhdefran" IS 'Tabla definicion de Rangos';

CREATE SEQUENCE "rhdefdetran_seq";

CREATE TABLE "rhdefdetran"
(
  "codran" VARCHAR(2)  NOT NULL,
  "valran" NUMERIC(14,2)  NOT NULL,
  "desdet" VARCHAR(60)  NOT NULL,
  "valdes" NUMERIC(14,2)  NOT NULL,
  "valhas" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdefdetran_seq'::regclass)
);

COMMENT ON TABLE "rhdefdetran" IS 'Tabla detalle de Rangos';

alter table "rhdefniv" 
  add column "minpun" integer  NOT NULL,
  add column "maxpun" integer  NOT NULL,
  add column "totpes" integer  NOT NULL,
  add column "codran" VARCHAR(2)  NOT NULL,
  add column "tipcal" VARCHAR(1)  NOT NULL  ;
  
alter table rhevaconcom
  add column feceval date;  
  
alter table rhevaempobj
  add column feceval date,
  add column pesobj NUMERIC(14,2)  NOT NULL,
  add column punobj NUMERIC(14,2)  NOT NULL;
  
  