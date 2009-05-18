-- 09/01/2008

ALTER TABLE "nphiscon"
    ADD COLUMN "codban" varchar(50),
    ADD COLUMN "nomban" varchar(100),
    ADD COLUMN "cuenta_banco" varchar(50),
    ADD COLUMN "nomemp" varchar(100),
    ADD COLUMN "cedemp" varchar(10),
    ADD COLUMN "nomcar" varchar(100),
    ADD COLUMN "desniv" varchar(100),
    ADD COLUMN "nomcat" varchar(100),
    ADD COLUMN "numsem" numeric(2) default 0;



-- 13/01/2008
alter table cpdefniv
add column cortrasla numeric(8) default 0;;

  COMMENT ON COLUMN cpdefniv.cortrasla
  IS 'Correlativo Traslado';

alter table cpdefniv
add column coradidis numeric(8) default 0;;

  COMMENT ON COLUMN cpdefniv.coradidis
  IS 'Correlativo Adicion/Disminucion';

--16/01/2009
Alter table Fordefequ
ALTER COLUMN "desobj" TYPE VARCHAR(1000);

--21/01/09 ERIVERO

set search_path to "SIMA002";

DROP TABLE  "catipalm" CASCADE;

DROP SEQUENCE  "catipalm_seq";

CREATE SEQUENCE "catipalm_seq";


CREATE TABLE "catipalm"
(
  "nomtip" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catipalm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catipalm" IS '';

ALTER TABLE "cadefalm" add column catipalm_id int4;

ALTER TABLE "cadefalm" ADD CONSTRAINT "cadefalm_FK_1" FOREIGN KEY ("catipalm_id") REFERENCES "catipalm" ("id");


--23/01/2009

--Añadir a la tabla Opdefemp el campo genordret, para parametrizar la opcion de preguntar si se desea generar la orden de pago
--de retenciones inmediantemente despues de guardada la orden de pago
ALTER TABLE opdefemp ADD COLUMN genordret character varying(1);


ALTER TABLE "cpdefapr"
    ADD COLUMN "staniv4" varchar(50),
    ADD COLUMN "abrstaniv4" varchar(5),
    ADD COLUMN "staniv5" varchar(50),
    ADD COLUMN "abrstaniv5" varchar(5),
    ADD COLUMN "staniv6" varchar(50),
    ADD COLUMN "abrstaniv6" varchar(5);


ALTER TABLE "cpartley"
    ADD COLUMN "staniv4" varchar(1),
    ADD COLUMN "staniv5" varchar(1),
    ADD COLUMN "staniv6" varchar(1);


ALTER TABLE "cpsoltrasla"
    ADD COLUMN "desniv4" varchar(250),
    ADD COLUMN "fecniv4" date,
    ADD COLUMN "staniv4" varchar(1),

    ADD COLUMN "desniv5" varchar(250),
    ADD COLUMN "fecniv5" date,
    ADD COLUMN "staniv5" varchar(1),

    ADD COLUMN "desniv6" varchar(250),
    ADD COLUMN "fecniv6" date,
    ADD COLUMN "staniv6" varchar(1);


ALTER TABLE "cpsoladidis"
    ADD COLUMN "desniv4" varchar(250),
    ADD COLUMN "fecniv4" date,
    ADD COLUMN "staniv4" varchar(1),

    ADD COLUMN "desniv5" varchar(250),
    ADD COLUMN "fecniv5" date,
    ADD COLUMN "staniv5" varchar(1),

    ADD COLUMN "desniv6" varchar(250),
    ADD COLUMN "fecniv6" date,
    ADD COLUMN "staniv6" varchar(1);

--26/01/09 ERIVERO
-- Crear un nùmero de lote por defecto en la tabla empresa para ser utilizado en facturaciòn
alter table empresa add numlot varchar(25);

update empresa set numlot = '0001';

alter table empresa alter column numlot set not null;


alter table empresa add partidaiva varchar(250);
alter table empresa add codempfonava varchar(10);


-- 27/01/2009
-- Campos adicionales para data de firmas de los reportes

ALTER TABLE empresa ADD COLUMN diruni1 character(50);
ALTER TABLE empresa ADD COLUMN coruni1 character(50);
ALTER TABLE empresa ADD COLUMN anauni1 character(50);

ALTER TABLE empresa ADD COLUMN diruni2 character(50);
ALTER TABLE empresa ADD COLUMN coruni2 character(50);
ALTER TABLE empresa ADD COLUMN anauni2 character(50);

ALTER TABLE empresa ADD COLUMN diruni3 character(50);
ALTER TABLE empresa ADD COLUMN coruni3 character(50);
ALTER TABLE empresa ADD COLUMN anauni3 character(50);

ALTER TABLE empresa ADD COLUMN entads character varying(100);

-- 28/01/09 ERIVERO
-- Se agrega el campo tipref (tipo de referencia) a la tabla de despachos
-- para poder realizar despachos de requisiciones, pedidos o facturas en el
-- módulo de facturación
alter table cadphart add tipref varchar(1);

update cadphart set tipref = 'R';

alter table cadphart alter column tipref set NOT NULL;

-- 29/01/09
-- Se aumenta el tamaño del campo de password para albergar la nueva contraseña encriptada
--ALTER TABLE "SIMA_USER".usuarios ALTER pasuse TYPE character varying(100);
-- Este sql encripta todos los passwords de la tabla Usuarios
--update "SIMA_USER".usuarios set pasuse='md5' || md5(usuarios.loguse || usuarios.pasuse)


-- 03/02/09
ALTER TABLE contabc ALTER descom TYPE character varying(1000);--03/02/09 ERIVERO

alter table fadevolu add fatipdev_id INTEGER;

alter table fadevolu alter column fatipdev_id set NOT NULL;

alter table fadevolu drop column codtidev;

alter table fadevolu ADD
  CONSTRAINT "fadevolu_FK_1" FOREIGN KEY (fatipdev_id)
      REFERENCES fatipdev (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE contabc ALTER descom TYPE character varying(1000);

--04/02/09
/**********************PARA LAS FORMA DE REPORTES*******************************/
--CAMPOS PARA LA TABLA FORCARGOS
ALTER TABLE "forcargos"
    ADD COLUMN "canmuj" numeric(6),
    ADD COLUMN "canhom" numeric(6);


--SECUENCIA SI NO EXISTE LA TABLA
CREATE SEQUENCE forcfgrepins_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE forcfgrepins_seq OWNER TO postgres;


--SI NO EXISTE LA TABLA
CREATE TABLE forcfgrepins
(
  nrofor character varying(50) NOT NULL,
  descripcion character varying(1000) NOT NULL,
  tipo character varying(1) NOT NULL,
  cuenta character varying(100) NOT NULL,
  orden integer NOT NULL,
  id integer NOT NULL DEFAULT nextval('forcfgrepins_seq'::regclass),
  CONSTRAINT forcfgrepins_pkey PRIMARY KEY (id)
)
WITH (OIDS=FALSE);
ALTER TABLE forcfgrepins OWNER TO postgres;


--SI NO EXISTEN EN LA TABLA
ALTER TABLE "forcfgrepins"
    DROP COLUMN "cuenta",
    ADD COLUMN "cuenta" varchar(100),
    ADD COLUMN "descripcion" varchar(1000);


--TABLA PARA LA CONEXION DE LOS ESQUEMAS
CREATE SEQUENCE fordefesq_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE fordefesq_seq OWNER TO postgres;

CREATE TABLE fordefesq
(
  id integer NOT NULL DEFAULT nextval('fordefesq_seq'::regclass),
  ano character varying(20) NOT NULL,
  esquema character varying(20) NOT NULL,
  CONSTRAINT pk_fordefesq PRIMARY KEY (id)
)
WITHOUT OIDS;
ALTER TABLE fordefesq OWNER TO postgres;


--FUNCION PARA LOS REPORTES
CREATE OR REPLACE FUNCTION formatonum(numeric)
  RETURNS character varying AS
$BODY$
/* New function body */
DECLARE
CADENA VARCHAR(100);

BEGIN
SELECT TRIM(REPLACE(REPLACE(REPLACE(TO_CHAR($1,'999,999,999,999,999,990.99'),'.','*'),',','.'),'*',',')) INTO CADENA FROM EMPRESA;
RETURN(CADENA);
END;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION formatonum(numeric) OWNER TO postgres;

--06/02/09
create sequence fadevolu_seq;

alter table fadevolu alter column fatipdev_id set NOT NULL;

alter table fadevolu alter column id set NOT NULL;

alter table fadevolu alter column id set DEFAULT nextval('fadevolu_seq'::regclass);

create sequence faartdev_seq;

alter table faartdev alter column id set DEFAULT nextval('faartdev_seq'::regclass);

alter table caartdph add preart numeric(14,2);

-- 09/02/09

create sequence faajuste_seq;

alter table faajuste alter column id set DEFAULT nextval('faajuste_seq'::regclass);

create sequence famovaju_seq;

alter table famovaju alter column id set DEFAULT nextval('famovaju_seq'::regclass);

/*******************************FIN SCRIPT NECESARIOS PARA LA FORMA DE REPORTES******/

-- Para aumentar el tamaño del campo del codpro de la orden de compra
ALTER TABLE caordcom ALTER codpro TYPE character varying(15);

ALTER TABLE contabc ALTER descom TYPE character varying(1000);

ALTER TABLE cppagos ALTER despag TYPE varchar(1000);

--12 de Febrero
Alter table caordcom
ALTER COLUMN "codpro" TYPE VARCHAR(15);

--16/02/2009
--////////// Despachos

    ALTER TABLE "caartdph"
    ADD COLUMN "codalm"  VARCHAR(6),
    ADD COLUMN "codubi" VARCHAR(20);

--////////// Salidas de almacen
--17/02/2009
    ALTER TABLE "cadetsal"
    ADD COLUMN "codalm"  VARCHAR(6),
    ADD COLUMN "codubi" VARCHAR(20);

--////////// Entrada de almacen

    ALTER TABLE "cadetent"
    ADD COLUMN "codalm"  VARCHAR(6),
    ADD COLUMN "codubi" VARCHAR(20);


--//18-02-2009
    ALTER TABLE "cpdefniv"
    ADD COLUMN "corfue"  VARCHAR(8),
    ADD COLUMN "codubi" VARCHAR(20);

--/// 18/02/2009
ALTER TABLE "cppagos"
  ALTER COLUMN "despag" TYPE VARCHAR(4000);

-- 18/02/09 ERIVERO
alter table faconpag alter column numdia DROP NOT NULL;
alter table faconpag alter column generaop DROP NOT NULL;
alter table faconpag alter column asiparrec DROP NOT NULL;
alter table faconpag alter column generacom DROP NOT NULL;
alter table faconpag alter column mercon DROP NOT NULL;
alter table faconpag alter column ctadev DROP NOT NULL;
alter table faconpag alter column ctavco DROP NOT NULL;
alter table faconpag alter column univta DROP NOT NULL;
--18/02/2009
ALTER TABLE "nphojint"
  ADD COLUMN "situac" VARCHAR(1);
 ALTER TABLE nphojint OWNER TO postgres;
  COMMENT ON COLUMN nphojint.situac IS 'Situación Actual';

  -- Para aumentar el tamano del campo de descau en cpcausad
ALTER TABLE cpcausad ALTER descau TYPE character varying(1000);

-- Para aumentar el tamano del campo de sercon en nphojint
ALTER TABLE nphojint ALTER sercon TYPE character varying(32);

--19/02/2009
ALTER TABLE "nphojint"
  ADD COLUMN "profes" VARCHAR(1);
ALTER TABLE nphojint OWNER TO postgres;
  COMMENT ON COLUMN nphojint.profes IS 'Profesional (Si o No)';

--25/02/2009 se modifico esta columnna debido a que la tabla de fadefcaj se modifico y se elimino latabla facajcorrelat
ALTER TABLE  fafactur DROP COLUMN codcaj;
ALTER TABLE  fafactur ADD COLUMN codcaj integer;

--02/03/2009 Desireé Martínez
ALTER TABLE fabancos
   ALTER COLUMN nomban SET NOT NULL;
ALTER TABLE fabancos ADD COLUMN codban character varying(20) NOT NULL;
ALTER TABLE fabancos ALTER COLUMN nomban SET STATISTICS -1;

-- View: "faallbancos" Contiene las union de la tabla tsdefban y fabancos

-- DROP VIEW faallbancos;

CREATE OR REPLACE VIEW faallbancos AS
 SELECT tsdefban.nomcue AS banco, tsdefban.numcue AS ctaban, tsdefban.id
   FROM tsdefban
UNION ALL
 SELECT fabancos.nomban AS banco, fabancos.codban AS ctaban, fabancos.id
   FROM fabancos
  ORDER BY 1;

ALTER TABLE faallbancos OWNER TO postgres;

ALTER TABLE caordcom ALTER codpro TYPE character varying(15);

--03/03/2009 Ya estoy cansada del retrabajo cosas que ya tenia hechas sigo cambiando me pregunto porque sera
ALTER TABLE fafactur DROP COLUMN codconpag;
ALTER TABLE fafactur ADD COLUMN codconpag integer;

--03/03/2009 ERIVERO
alter table caartdph add codalm varchar(6);
alter table caartdph add codubi varchar(20);

--04/03/2009 ERIVERO
alter table faartfac add candes numeric(14,2);

-- Se agrego campo para identifica si el movimiento es un cheque o no para identificar en la emision de pago si es una transferencia o un cheque
ALTER TABLE tstipmov ADD COLUMN escheque boolean DEFAULT true;
--04/04/2009


-----------------------------------------------------------------------------
-- tssalcaj
-----------------------------------------------------------------------------



CREATE SEQUENCE "tssalcaj_seq";


CREATE TABLE "tssalcaj"
(
  "refsal" VARCHAR(8)  NOT NULL,
  "fecsal" DATE  NOT NULL,
  "cedrif" VARCHAR(15),
  "dessal" VARCHAR(1000),
  "monsal" NUMERIC(14,2),
  "stasal" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tssalcaj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tssalcaj" IS '';


-----------------------------------------------------------------------------
-- tsdetsal
-----------------------------------------------------------------------------


CREATE SEQUENCE "tsdetsal_seq";


CREATE TABLE "tsdetsal"
(
  "refsal" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "monsal" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "totsal" NUMERIC(14,2),
  "stasal" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdetsal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdetsal" IS '';

--05/03/09 ERIVERO
alter table faartnot add codalm varchar(6) NOT NULL;
alter table fanotent drop column codalm;

alter table empresa add codcat varchar(50);

update empresa set codcat = '0001';

alter table empresa alter column codcat set not null;

alter table faartfac add canaju numeric(14,2);

alter table tsmovban
ALTER COLUMN "desban" TYPE VARCHAR(1000);

alter table tsconcil
ALTER COLUMN "desref" TYPE VARCHAR(1000);

ALTER TABLE "opdefemp"
  ADD COLUMN "cuecajchi" character varying(20),
  ADD COLUMN "tipcajchi" character varying(4),
  ADD COLUMN "monapecajchi" numeric(14,2),
  ADD COLUMN "porrepcajchi" numeric(14,2),
  ADD COLUMN "tiprencajchi" character varying(4),
  ADD COLUMN "numinicajchi" character varying(8),
  ADD COLUMN "cedrifcajchi" character varying(15);

-- Secuencia para el manejo del correlativo de los comprobantes contables
CREATE SEQUENCE contabc_numcom_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE contabc_numcom_seq OWNER TO postgres;

--Se agrego el codigo de categoria para caja chica

ALTER TABLE "opdefemp"
  ADD COLUMN "codcatcajchi" character varying(32);

-- Se agrego para aumentar el tamaño de los decimales en la cantidad de la orden de compra
ALTER TABLE caartord ALTER canord TYPE numeric(14,3);
ALTER TABLE caresordcom ALTER canord TYPE numeric(14,3);

ALTER TABLE caregart ALTER desart TYPE character varying(1500);

--27/03/2009 Desi ...Se agrego los campos fecanu y desanu para la anulacion de las transacciones
ALTER TABLE "cobtransa"
    ADD COLUMN "fecanu" date,
    ADD COLUMN "desanu" varchar(250);

ALTER TABLE caartord ALTER desart TYPE character varying(1500);
ALTER TABLE caresordcom ALTER desres TYPE character varying(2000);
ALTER TABLE caartfec ALTER desart TYPE character varying(2000);

--30/03/2009  Tabla para la forma nueva de formulacion forcargos que parte de npcargos

ALTER TABLE "npcargos"
--    ADD COLUMN "comcar" numeric(20,3), -- puede ser que este campo ya exista
    ADD COLUMN "pricar" numeric(20,3),
    ADD COLUMN "canmuj" numeric(6),
    ADD COLUMN "canhom" numeric(6);

CREATE SEQUENCE forcargos_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
ALTER TABLE forcargos_seq OWNER TO postgres;


--SI LA TABLA EXISTE Y ESTA VACIA APLICAR LA SIGUIENTE INSTRUCCION  en comentario
--drop table forcargos;

CREATE TABLE forcargos
(
  codcar character varying(16),
  nomcar character varying(100),
  suecar numeric(20,3),
  stacar character varying(1),
  codocp character varying(16),
  punmin numeric(14,2),
  graocp character varying(3),
  comcar numeric(20,3),
  pasocp character varying(3),
  codtip character varying(3),
  pricar numeric(20,3),
  canmuj numeric(6),
  canhom numeric(6),
  id integer NOT NULL DEFAULT nextval('forcargos_seq'::regclass),
  CONSTRAINT forcargos_pkey PRIMARY KEY (codcar),
  CONSTRAINT forcargos_id_key UNIQUE (id)
)
WITH (OIDS=FALSE);
ALTER TABLE forcargos OWNER TO postgres;


CREATE SEQUENCE forprocar_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 2
  CACHE 1;
ALTER TABLE forprocar_seq OWNER TO postgres;


CREATE TABLE forprocar
(
  codprofes character varying(4) NOT NULL,
  codcar character varying(16) NOT NULL,
  id integer NOT NULL DEFAULT nextval('forprocar_seq'::regclass),
  CONSTRAINT "forprocar_FK_2" FOREIGN KEY (codcar)
      REFERENCES forcargos (codcar) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT unique_forcargos_id UNIQUE (id)
)
WITH (OIDS=FALSE);
ALTER TABLE forprocar OWNER TO postgres;

--06/04/2009
-----------------------------------------------------------------------------
-- bncobsegmue
-----------------------------------------------------------------------------


CREATE SEQUENCE "bncobsegmue_seq";


CREATE TABLE "bncobsegmue"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codmue" VARCHAR(20)  NOT NULL,
  "nrosegmue" VARCHAR(6)  NOT NULL,
  "codcob" VARCHAR(4)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('bncobsegmue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bncobsegmue" IS '';


-----------------------------------------------------------------------------
-- bncobseginm
-----------------------------------------------------------------------------



CREATE SEQUENCE "bncobseginm_seq";


CREATE TABLE "bncobseginm"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codinm" VARCHAR(20)  NOT NULL,
  "nrosegmue" VARCHAR(6)  NOT NULL,
  "codcob" VARCHAR(4)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('bncobseginm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bncobseginm" IS '';

--06/04/2009 Matriz de Compras Barcelona Generar Comprobante en la orden de Compra para alcaldias
ALTER TABLE "opdefemp"
  ADD COLUMN "gencomalc" varchar(1);

-----------------------------------------------------------------------------
-- tsrelasiord para la orden de pago y cheque
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsrelasiord" CASCADE;

DROP SEQUENCE IF EXISTS "tsrelasiord_seq";

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
  ADD COLUMN "aprobado" varchar(1),
  ADD COLUMN "codmotanu" varchar(4),
  ADD COLUMN "usuanu" varchar(250);

-----------------------------------------------------------------------------
-- tsmotanu para la anúlacion de la orden de pago
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsmotanu" CASCADE;

DROP SEQUENCE IF EXISTS "tsmotanu_seq";

CREATE SEQUENCE "tsmotanu_seq";


CREATE TABLE "tsmotanu"
(
  "codmotanu" VARCHAR(4),
  "desmotanu" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsmotanu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsmotanu" IS '';


--23/04/2009
--Se cambio los atributos de los campos a integer
alter table cpdefniv alter column corprc type integer;
alter table cpdefniv alter column corcom type integer;
alter table cpdefniv alter column corcau type integer;
alter table cpdefniv alter column corpag type integer;
alter table cpdefniv alter column corsoltra type integer;
alter table cpdefniv alter column cortrasla type integer;
alter table cpdefniv alter column corsoladidis type integer;
alter table cpdefniv alter column coradidis type integer;
alter table cpdefniv alter column coraju type integer;
alter table cpdefniv add column btneli boolean DEFAULT true;
alter table cpdefniv add column btnanu boolean DEFAULT true;


-- Para que funcione bien las conciliaciones bancarias
ALTER TABLE tsconcil DROP CONSTRAINT itsconcil;

ALTER TABLE tsconcil ADD CONSTRAINT itsconcil PRIMARY KEY (numcue, mescon, anocon, refere, movlib, movban);

-- Campos que no fueron incluidos al 23-04-09
ALTER TABLE cpdefniv ADD COLUMN btneli boolean;

ALTER TABLE cpdefniv ADD COLUMN btnanu boolean;


--24-04-09-  Correlativo de los comprobantes
alter table contaba add column corcomp varchar(10);
alter table contaba add column btnelicomanu boolean default (false);

--Campos que le faltan a la bd de suvinca
ALTER TABLE "cireging"
  ADD COLUMN "numdep" varchar(50),
  ADD COLUMN "numofi" VARCHAR(50),
  ADD COLUMN "numcom" VARCHAR(8),
  ADD COLUMN "reflib" VARCHAR(20),
  ADD COLUMN "staliq" VARCHAR(1),
  ADD COLUMN "fecliq" DATE,
  ADD COLUMN "refliq" VARCHAR(10),
  ADD COLUMN "desliq" VARCHAR(250);

--28/04/2008 Cambios para las aprobaciones(parametrizable) de ordenes en Ordenamiento y Tesoreria (Matriz Barcelona)
ALTER TABLE "opordpag"
  DROP COLUMN aprobado,
  ADD COLUMN "aprobadoord" varchar(1),
  ADD COLUMN "aprobadotes" VARCHAR(1);

--28/04/2008 Para la configuracion de Maneja o No Bloqueo de Cuentas (Concurrencia entre usuarios)(Matriz Barcelona)
ALTER TABLE "opdefemp"
  ADD COLUMN "manbloqban" varchar(1);

-----------------------------------------------------------------------------
-- tsbloqban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsbloqban" CASCADE;

DROP SEQUENCE IF EXISTS "tsbloqban_seq";

CREATE SEQUENCE "tsbloqban_seq";


CREATE TABLE "tsbloqban"
(
  "numcue" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsbloqban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsbloqban" IS '';

--30/04/2008 Añadir campo tipmov a Opordche para poder buscar exactamente el movimiento asociado al cheque en la tabla TSMOVLIB
ALTER TABLE "opordche"
  ADD COLUMN "tipmov" VARCHAR(4);

-----------------------------------------------------------------------------
-- atciudadano
-----------------------------------------------------------------------------

ALTER TABLE "atciudadano" ADD COLUMN "segpri" BOOLEAN;
ALTER TABLE "atciudadano" ADD COLUMN "attipproviv_id" INTEGER;
ALTER TABLE "atciudadano" ADD COLUMN "attipviv_id" INTEGER;

-----------------------------------------------------------------------------
-- atmedico
-----------------------------------------------------------------------------

ALTER TABLE "atmedico" ADD COLUMN "nrocolmed" VARCHAR(25);


-----------------------------------------------------------------------------
-- atprovee
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atprovee" CASCADE;

DROP SEQUENCE IF EXISTS "atprovee_seq";

CREATE SEQUENCE "atprovee_seq";


CREATE TABLE "atprovee"
(
  "nompro" VARCHAR(100),
  "rifpro" VARCHAR(100),
  "nitpro" VARCHAR(100),
  "dirpro" VARCHAR(1000),
  "telpro" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('atprovee_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atprovee" IS '';


-----------------------------------------------------------------------------
-- atpresupuesto
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atpresupuesto" CASCADE;

DROP SEQUENCE IF EXISTS "atpresupuesto_seq";

CREATE SEQUENCE "atpresupuesto_seq";


CREATE TABLE "atpresupuesto"
(
  "atayudas_id" INTEGER,
  "atprovee1" INTEGER  NOT NULL,
  "monto1" NUMERIC(14,2),
  "atprovee2" INTEGER  NOT NULL,
  "monto2" NUMERIC(14,2),
  "atprovee3" INTEGER  NOT NULL,
  "monto3" NUMERIC(14,2),
  "atprovee4" INTEGER  NOT NULL,
  "monto4" NUMERIC(14,2),
  "atprovee5" INTEGER  NOT NULL,
  "monto5" NUMERIC(14,2),
  "atprovee6" INTEGER  NOT NULL,
  "monto6" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('atpresupuesto_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atpresupuesto" IS '';


ALTER TABLE "atpresupuesto" ADD CONSTRAINT "atpresupuesto_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

ALTER TABLE "atpresupuesto" ADD CONSTRAINT "atpresupuesto_FK_2" FOREIGN KEY ("atprovee1") REFERENCES "atprovee" ("id");

ALTER TABLE "atpresupuesto" ADD CONSTRAINT "atpresupuesto_FK_3" FOREIGN KEY ("atprovee2") REFERENCES "atprovee" ("id");

ALTER TABLE "atpresupuesto" ADD CONSTRAINT "atpresupuesto_FK_4" FOREIGN KEY ("atprovee3") REFERENCES "atprovee" ("id");

ALTER TABLE "atpresupuesto" ADD CONSTRAINT "atpresupuesto_FK_5" FOREIGN KEY ("atprovee4") REFERENCES "atprovee" ("id");

ALTER TABLE "atpresupuesto" ADD CONSTRAINT "atpresupuesto_FK_6" FOREIGN KEY ("atprovee5") REFERENCES "atprovee" ("id");

ALTER TABLE "atpresupuesto" ADD CONSTRAINT "atpresupuesto_FK_7" FOREIGN KEY ("atprovee6") REFERENCES "atprovee" ("id");

--07/05/2009
ALTER TABLE "opdefemp"
  ADD COLUMN "ordret" VARCHAR(4);

--08/05/2009
ALTER TABLE "npliquidacion_det" ADD COLUMN "dias" INTEGER;

--08/05/2009
--Se cambio los atributos de los campos a integer
-- Se tiene que crear la funcion pc_chartoint, que esta en la carpeta de triggers
alter table cpdefniv alter column coraep type integer USING pc_chartoint(coraep);

--08/05/2009
--nueva pantalla de contabilidad
alter table contaba add column btnmodcom boolean default (true);


--11/05/2009
alter table bncobsegmue alter column nrosegmue type  varchar(20);
alter table bnsegmue alter column nrosegmue type  varchar(20);
alter table bncobseginm alter column nrosegmue type  varchar(20);
alter table bnseginm alter column nroseginm type  varchar(20);

--12/02/2009
-- Configuracion del prefijo en los comprobantes contables
alter table opdefemp add column ordconpre boolean default (false);  --orden contable prefijo

--11/05/2009 Modificaciones de Caja Chica
ALTER TABLE "tsdetsal"
  ADD COLUMN "codcat" VARCHAR(50);

