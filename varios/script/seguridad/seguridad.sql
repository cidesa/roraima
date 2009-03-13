--Modulos de Menus

CREATE TABLE "SIMA_USER".division
(
  coddiv varchar(3) NOT NULL, -- Código de la division:
  desdiv varchar(250) NOT NULL, -- Descripción de la division:
  id serial NOT NULL ,
  CONSTRAINT i_division PRIMARY KEY (coddiv)
)
WITHOUT OIDS;
ALTER TABLE "SIMA_USER".division OWNER TO postgres;
COMMENT ON TABLE "SIMA_USER".division IS 'Divisiones del Menú';
COMMENT ON COLUMN "SIMA_USER".division.coddiv IS 'Código de la division:';
COMMENT ON COLUMN "SIMA_USER".division.desdiv IS 'Descripción de la division:';



CREATE TABLE "SIMA_USER".aplifor
(
  codapl varchar(3) NOT NULL, -- Código de la aplicacion:
  coddiv varchar(3) NOT NULL, -- Codigo division en que se encuentra:
  nomopc varchar(25) NOT NULL, -- Nombre abreviado del formulario:
  desopc varchar(1000) NOT NULL, -- Descripción del formulario:
  id serial NOT NULL ,
  CONSTRAINT i_aplifor PRIMARY KEY (nomopc)
)
WITHOUT OIDS;
ALTER TABLE "SIMA_USER".aplifor OWNER TO postgres;
COMMENT ON TABLE "SIMA_USER".aplifor IS 'Asignacion de Formularios a Módulos';
COMMENT ON COLUMN "SIMA_USER".aplifor.codapl IS 'Código de la aplicacion:';
COMMENT ON COLUMN "SIMA_USER".aplifor.coddiv IS 'Codigo division en que se encuentra:';
COMMENT ON COLUMN "SIMA_USER".aplifor.nomopc IS 'Nombre abreviado del formulario:';
COMMENT ON COLUMN "SIMA_USER".aplifor.desopc IS 'Descripción del formulario:';

ALTER TABLE "SIMA_USER"."apli_user"
  ALTER COLUMN "loguse" TYPE VARCHAR(50),
  ALTER COLUMN "nomopc" TYPE VARCHAR(50),
  ALTER COLUMN "priuse" TYPE VARCHAR(2);

ALTER TABLE "SIMA_USER"."aplifor"
  ALTER COLUMN "nomopc" TYPE VARCHAR(50);

ALTER TABLE "SIMA_USER"."usuarios"
  ALTER COLUMN "apluse" TYPE VARCHAR(3),
  ALTER COLUMN "numemp" TYPE VARCHAR(12);

-- Tabla: Aplicacion (SIMA_USER)
CREATE SEQUENCE "SIMA_USER".aplicacion_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA_USER".aplicacion_seq OWNER TO postgres;

ALTER TABLE "SIMA_USER"."aplicacion" ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA_USER".aplicacion_seq');


ALTER TABLE "SIMA_USER"."aplicacion" ADD COLUMN "nomyml" VARCHAR(50);

--UPDATE "SIMA_USER"."apli_user" SET nomopc = 'admin' WHERE nomopc='AlmDefArt';
--UPDATE "SIMA_USER"."apli_user" SET nomopc = 'catalogo' WHERE nomopc='AlmDefUbi';
--UPDATE "SIMA_USER"."apli_user" SET nomopc = 'menu' WHERE nomopc='AlmOrdCom';


