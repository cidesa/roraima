--Carlos Ramirez
alter table nphojint
add column codnivedu varchar(4);

CREATE SEQUENCE npprimashijos_seq;

CREATE TABLE npprimashijos
(
  parfam character varying(4),
  edaddes numeric(2),
  edadhas numeric(2),
  monto numeric(14,2),
  estudios character varying(1),
  id INTEGER  NOT NULL DEFAULT nextval('npprimashijos_seq'::regclass)
);
ALTER TABLE npprimashijos OWNER TO postgres;

CREATE SEQUENCE npprimaprofes_seq;

CREATE TABLE npprimaprofes
(
  grado numeric(2),
  prima numeric(14,2),
  id INTEGER  NOT NULL DEFAULT nextval('npprimaprofes_seq'::regclass)
);
ALTER TABLE npprimaprofes OWNER TO postgres;

CREATE SEQUENCE npcargoscol_seq;

CREATE TABLE npcargoscol
(
  codcarcol varchar(16),
  descarcol varchar(100),
  prima numeric(14,2),
  id INTEGER  NOT NULL DEFAULT nextval('npcargoscol_seq'::regclass)
);
ALTER TABLE npcargoscol OWNER TO postgres;

--CARLOS RAMIREZ
alter table npasiempcont
    add column fecdes date,
    add column fechas date,
    add column status varchar(1);

--CARLOS RAMIREZ
CREATE SEQUENCE "nptipcat_seq";

CREATE TABLE nptipcat
(
  codtipcat character varying(4) NOT NULL,
  destipcat character varying(100) NOT NULL,
  id integer NOT NULL DEFAULT nextval('nptipcat_seq'::regclass)
);
ALTER TABLE nptipcat OWNER TO postgres;

alter table npcomocp
  alter column gracar type varchar(20),
  alter column pascar type varchar(20);




-----------Cambios matriz Barcelona
--06/04/2009 Matriz de Compras Barcelona Generar Comprobante en la orden de Compra para alcaldias
ALTER TABLE "opdefemp"
  ADD COLUMN "gencomalc" varchar(1);


-----------------------------------------------------------------------------
-- tsrelasiord para la orden de pago y cheque
-----------------------------------------------------------------------------


CREATE SEQUENCE "tsrelasiord_seq";


CREATE TABLE "tsrelasiord"
(
  "ctagasxpag" VARCHAR(32),
  "ctaordxpag" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsrelasiord_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsrelasiord" IS '';

--22/04/2009  Campo para la configuracion del código del artículo generado con correlativo
ALTER TABLE "cadefart"
  ADD COLUMN "gencorart" varchar(1);

--23/04/2009  Campo para la configuracion de la aprobacion de la Orden de Pago, motivo de anulacion
ALTER TABLE "opdefemp"
  ADD COLUMN "reqaprord" varchar(1),
  ADD COLUMN "ordcomptot" varchar(1),
  ADD COLUMN "ordmotanu" varchar(1);

--23/04/2009
ALTER TABLE "opordpag"
  ADD COLUMN "codmotanu" varchar(4),
  ADD COLUMN "usuanu" varchar(250);

-----------------------------------------------------------------------------
-- tsmotanu para la anúlacion de la orden de pago
-----------------------------------------------------------------------------

CREATE SEQUENCE "tsmotanu_seq";


CREATE TABLE "tsmotanu"
(
  "codmotanu" VARCHAR(4),
  "desmotanu" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsmotanu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsmotanu" IS '';



--28/04/2008 Cambios para las aprobaciones(parametrizable) de ordenes en Ordenamiento y Tesoreria (Matriz Barcelona)
ALTER TABLE "opordpag"
  ADD COLUMN "aprobadoord" varchar(1),
  ADD COLUMN "aprobadotes" VARCHAR(1);

--28/04/2008 Para la configuracion de Maneja o No Bloqueo de Cuentas (Concurrencia entre usuarios)(Matriz Barcelona)
ALTER TABLE "opdefemp"
  ADD COLUMN "manbloqban" varchar(1);

-- Configuracion del prefijo en los comprobantes contables
alter table opdefemp add column ordconpre boolean default (false);  --orden contable prefijo
-----------------------------------------------------------------------------
-- tsbloqban
-----------------------------------------------------------------------------

CREATE SEQUENCE "tsbloqban_seq";


CREATE TABLE "tsbloqban"
(
  "numcue" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsbloqban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsbloqban" IS '';
------
ALTER TABLE "opdefemp"
  ADD COLUMN "ordret" VARCHAR(4);

--CARLOS RAMIREZ
alter table npasicaremp
  add column codtipded  varchar(4),
  add column codtipcat varchar(20);
