set search_path to "SIMA002";

ALTER TABLE "SIMA002"."fordetpryaccespmet"
  ADD COLUMN "jusins" VARCHAR(250),
  ADD COLUMN "canins" NUMERIC(14,2),
  ADD COLUMN "caninsrep" NUMERIC(14,2),
  ADD COLUMN "monprerep" NUMERIC(18,2),
  ADD COLUMN "codtip" VARCHAR(4);

ALTER TABLE "SIMA002"."fordefpryaccmet"
  ADD COLUMN "canmet" NUMERIC(14,2);

ALTER TABLE "SIMA002"."casolart"
  ADD COLUMN "tipreq" CHAR(1);

ALTER TABLE "SIMA002"."cadefart"
  ADD COLUMN "prcasopre" varchar(1),
  ADD COLUMN "prcreqapr" varchar(1),
  ADD COLUMN "comasopre" varchar(1),
  ADD COLUMN "comreqapr" varchar(1),
  ADD COLUMN "almcorre" varchar(8);

ALTER TABLE "SIMA002"."bnreginm"
  ADD COLUMN "codalt" VARCHAR(30);
ALTER TABLE "SIMA002"."bnreginm"
  ADD COLUMN "fecrcp" DATE;
ALTER TABLE "SIMA002"."bnreginm"
  ADD COLUMN "aumviduti" NUMERIC(4);
ALTER TABLE "SIMA002"."bnreginm"
  ADD COLUMN "dimviduti" NUMERIC(4);
ALTER TABLE "SIMA002"."bnreginm"
  ADD COLUMN "coddis" VARCHAR(25);
ALTER TABLE "SIMA002"."bnreginm"
  ADD COLUMN "valadis" NUMERIC(14);

ALTER TABLE "SIMA002"."fordefpry"
  ADD COLUMN "codpryonapre" VARCHAR(10),
  ADD COLUMN "tieejeanopry" numeric(5,2),
  ADD COLUMN "tieejemespry" numeric(5,2),
  ADD COLUMN "codobjnvaeta" VARCHAR(3),
  ADD COLUMN "sitobjdes" VARCHAR(250),
  ADD COLUMN "tieimpmes" numeric(5,2),
  ADD COLUMN "tieimpano" numeric(5,2),
  ADD COLUMN "nucdesend" VARCHAR(250),
  ADD COLUMN "zonecodes" VARCHAR(250),
  ADD COLUMN "accinm" VARCHAR(250),
  ADD COLUMN "accdif" VARCHAR(250);


CREATE TABLE "SIMA002".fordefobjnvaeta
(
  codobjnvaeta varchar(3) NOT NULL, -- Código del Objetivo Estrategico Nueva Etapa:
  desobjnvaeta varchar(250) NOT NULL, -- Descripción del Objetivo Estrategico Nueva Etapa:
  id serial NOT NULL ,
  CONSTRAINT i_fordefobjnvaeta PRIMARY KEY (codobjnvaeta)
)
WITHOUT OIDS;
ALTER TABLE "SIMA002".fordefobjnvaeta OWNER TO postgres;
COMMENT ON TABLE "SIMA002".fordefobjnvaeta IS 'Definición de Objetivo Estrategico Nueva Etapa';
COMMENT ON COLUMN "SIMA002".fordefobjnvaeta.codobjnvaeta IS 'Código del Objetivo Estrategico Nueva Etapa:';
COMMENT ON COLUMN "SIMA002".fordefobjnvaeta.desobjnvaeta IS 'Descripción del Objetivo Estrategico Nueva Etapa:';

CREATE TABLE "SIMA002".fordeftipcnx
(
  codtipcnx varchar(3) NOT NULL, -- Código del Tipo de Contribucion Conexion:
  destipcnx varchar(100) NOT NULL, -- Descripción del Tipo de Contribucion Conexion:
  id serial NOT NULL ,
  CONSTRAINT i_fordeftipcnx PRIMARY KEY (codtipcnx)
)
WITHOUT OIDS;
ALTER TABLE "SIMA002".fordeftipcnx OWNER TO postgres;
COMMENT ON TABLE "SIMA002".fordeftipcnx IS 'Definición de Tipo de Contribucion Conexion';
COMMENT ON COLUMN "SIMA002".fordeftipcnx.codtipcnx IS 'Código del Tipo de Contribucion Conexion:';
COMMENT ON COLUMN "SIMA002".fordeftipcnx.destipcnx IS 'Descripción del Tipo de Contribucion Conexion:';

ALTER TABLE "SIMA002"."fordefaccesp"
  ADD COLUMN "fecini" DATE,
  ADD COLUMN "feccul" DATE,
  ADD COLUMN "desbieser" varchar(250),
  ADD COLUMN "orgeje" varchar(4),
  ADD COLUMN "codunimed" varchar(3),
  ADD COLUMN "canmet" NUMERIC(14,2),
  ADD COLUMN "codest" varchar(4),
  ADD COLUMN "codmun" varchar(4),
  ADD COLUMN "codpar" varchar(4),
  ADD COLUMN "espadiubigeo" varchar(250);


para quitar los blancos del catippro
update catippro set codpro=trim(codpro), ctaord=trim(ctaord), ctaper=trim(ctaper);
commit;


ALTER TABLE "SIMA002"."forpryorgpub"
  ADD COLUMN "tipcnx" VARCHAR(3),
  ADD COLUMN "detobs" VARCHAR(250),
  ADD COLUMN "reqacc" VARCHAR(1),
  ADD COLUMN "concomotrpry" VARCHAR(1),
  ADD COLUMN "entcflpry" VARCHAR(1);



ALTER TABLE "SIMA002"."fordeforgpub"
  ADD COLUMN "numgac" VARCHAR(100),
  ADD COLUMN "actorg" VARCHAR(100),
  ADD COLUMN "monest" NUMERIC(14,2),
  ADD COLUMN "capsoc" NUMERIC(14,2);


  ALTER TABLE "SIMA002"."fordefpry"
  DROP COLUMN "placontin",
  ADD COLUMN "placontin"  VARCHAR(250);



  ALTER TABLE "SIMA002"."forpryubigeo"
  ADD COLUMN "espadiubigeo"  VARCHAR(250);




 ALTER TABLE "SIMA002".nphojint OWNER TO postgres;
COMMENT ON COLUMN "SIMA002".nphojint.codemp IS 'Codigo de Empleado';
COMMENT ON COLUMN "SIMA002".nphojint.cedemp IS 'Cedula del Empleado';
COMMENT ON COLUMN "SIMA002".nphojint.numcon IS 'Numero de Contrato';
COMMENT ON COLUMN "SIMA002".nphojint.edociv IS 'Estado Civil';
COMMENT ON COLUMN "SIMA002".nphojint.nacemp IS 'Nacionalidad';
COMMENT ON COLUMN "SIMA002".nphojint.sexemp IS 'Sexo';
COMMENT ON COLUMN "SIMA002".nphojint.fecnac IS 'Fecha de Nacimiento';
COMMENT ON COLUMN "SIMA002".nphojint.edaemp IS 'Edad en Años';
COMMENT ON COLUMN "SIMA002".nphojint.fecing IS 'Fecha de Ingreso';
COMMENT ON COLUMN "SIMA002".nphojint.fecret IS 'Fecha de Retiro';
COMMENT ON COLUMN "SIMA002".nphojint.fecrei IS 'Fecha de Reingreso';
COMMENT ON COLUMN "SIMA002".nphojint.fecadmpub IS 'Fecha en Adm. Publica';
COMMENT ON COLUMN "SIMA002".nphojint.staemp IS 'Situacion del Empleado';
COMMENT ON COLUMN "SIMA002".nphojint.feccotsso IS 'Fecha de Cotizacion del Seguro Social';
COMMENT ON COLUMN "SIMA002".nphojint.anoadmpub IS 'Años en la Administracion publica';


ALTER TABLE "SIMA002"."fordefobjnvaeta"
  RENAME TO "fordefobjestnvaeta";

CREATE TABLE "SIMA002".npordfid
(
  codnom varchar(3) NOT NULL, -- Código de la Nómina:
  fecha  DATE NOT NULL, -- Fecha del fideicomiso:
  codemp varchar(16), -- Código del Empleado
  cedemp varchar(10), -- Cédula del Empleado
  codpre varchar(50), -- Código Presupuestario
  numord varchar(8), -- Número de la Orden de Pago
  monfid NUMERIC(32,2) NOT NULL, -- Monto del fideicomiso
  id serial NOT NULL ,
  CONSTRAINT i_npordfid PRIMARY KEY (codnom)
)
WITHOUT OIDS;
ALTER TABLE "SIMA002".npordfid OWNER TO postgres;
COMMENT ON TABLE "SIMA002".npordfid IS 'Ordenes de fideicomiso';
COMMENT ON COLUMN "SIMA002".npordfid.codnom IS 'Código de la Nómina:';
COMMENT ON COLUMN "SIMA002".npordfid.codemp IS 'Código del Empleado:';
COMMENT ON COLUMN "SIMA002".npordfid.cedemp IS 'Cédula del Empleado:';
COMMENT ON COLUMN "SIMA002".npordfid.codpre IS 'Código Presupuestario:';
COMMENT ON COLUMN "SIMA002".npordfid.monfid IS 'Monto del fideicomiso:';

--------------
-- Fecha: Diciembre

ALTER TABLE "SIMA002"."npnomcal"
  ALTER COLUMN "nomcon" TYPE VARCHAR(100);

ALTER TABLE "SIMA002"."npnomcal"
  ALTER COLUMN "nomnom" TYPE VARCHAR(100);


CREATE TABLE "SIMA002".caartpar
(
  codart varchar(20) NOT NULL, -- Código del Articulo;
  codpar varchar(16) NOT NULL, -- Código de la Partida;
  porpar numeric(14,2), -- Porcentaje
  id serial NOT NULL
)
WITHOUT OIDS;
ALTER TABLE "SIMA002".caartpar OWNER TO postgres;

-----------------------------------------------------------
--Fecha: 22/01/2008

CREATE OR REPLACE VIEW "SIMA002"."npanos" (
    ano)
AS
(
SELECT DISTINCT to_number(to_char((npsalint.fecinicon)::timestamp with time
    zone, 'yyyy'::text), '9999'::text) AS ano
FROM "SIMA002".npsalint
ORDER BY to_number(to_char((npsalint.fecinicon)::timestamp with time zone,
    'yyyy'::text), '9999'::text))
UNION
SELECT (max(to_number(to_char((npsalint.fecinicon)::timestamp with time zone,
    'yyyy'::text), '9999'::text)) + (1)::numeric) AS ano
FROM "SIMA002".npsalint;


ALTER TABLE  caregart ADD COLUMN codartsnc varchar(20);
ALTER TABLE  caprovee ADD COLUMN codtipemp varchar(4);


create table  caprocomart
(
  fecprocom date,
  codart varchar(20),
  canpro numeric(14,2),
  monpro numeric(14,2),
  mespro varchar(2),
  codedo varchar(4),
  codmun varchar(4),
  codfin varchar(4),
  id serial not null
)
without oids;
alter table  caprocomart owner to postgres;

alter table caprocomart add codciu varchar(4);
alter table caprocomart add codcat varchar(32);

----caordcom
alter table caordcom add column codmedcom varchar(4);
alter table caordcom add column codprocom varchar(4);
alter table caordcom add column codpai varchar(4);
alter table caordcom add column codedo varchar(4);
alter table caordcom add column codmun varchar(4);
alter table caordcom add column aplart varchar(2);
alter table caordcom add column aplart6 varchar(2);


ALTER TABLE caordcom
  ALTER COLUMN "aplart" SET DEFAULT 'no',
  ALTER COLUMN "aplart6" SET DEFAULT 'no';

comment on column caordcom.aplart
  is 'aplicacion art 30 decreto 4000';
comment on column caordcom.aplart6
  is 'aplicacion art 6 decreto 3798';

--- cadefart
alter table cadefart add forsnc varchar(20);
alter table cadefart add dessnc varchar(20);

update cadefart set forsnc='AAA-AA-AAAA', dessnc='###-##-####';



-- cacotiza
alter table cacotiza add porvan numeric(14,2);
alter table cacotiza add porant numeric(14,2);

comment on column cacotiza.porvan
  is 'porcentaje van';
comment on column cacotiza.porant
  is 'porcentaje anticipo';

-- cacatsnc
create table cacatsnc
(
  codsnc varchar(20) not null,
  dessnc varchar(1000),
  id serial not null
)
without oids;
alter table cacatsnc owner to postgres;

comment on table cacatsnc
  is 'catalogo de articulos segun snc';

alter table cacatsnc
  add constraint pkcacatsnc primary key (codsnc);



---catipempsnc
create table catipempsnc
(
  codtip varchar(4) not null,
  destip varchar(100),
  id serial not null
)
without oids;
alter table  catipempsnc owner to postgres;


----camedcom
create table camedcom
(
  codmedcom varchar(4) not null,
  desmedcom varchar(100),
  id serial not null
)
without oids;
alter table  camedcom owner to postgres;


----caprocom
create table caprocom
(
  codprocom varchar(4) not null,
  desprocom varchar(100),
  id serial not null
)
without oids;
alter table  caprocom owner to postgres;



--||||||||||||||||||||||||||||||||||||
--22/01/2008   este script no sirve!!!
  ALTER TABLE "SIMA002"."npdefpreliq"  --/
  ALTER COLUMN "perini" TYPE  DATE NOT NULL;--/
  ALTER COLUMN "perfin" TYPE  DATE NOT NULL;--/
--/////////////////////////////////////////////
--/////////////////////////////////////////////
  ALTER TABLE "SIMA002"."npvacdiasbonovac"  --/
  ALTER COLUMN "perini" TYPE  DATE NOT NULL;--/
  ALTER COLUMN "perfin" TYPE  DATE NOT NULL;--/
--/////////////////////////////////////////////

--25/01/2008
--/////////////////////////////////////////////
  ALTER TABLE "SIMA002"."casolart"
    ALTER COLUMN "unires" TYPE VARCHAR(50);
  ALTER TABLE "SIMA002"."cadisrgo"
    ALTER COLUMN "codcat" TYPE VARCHAR(50);
  ALTER TABLE "SIMA002".cacotiza
     ADD COLUMN "tipo" VARCHAR(1);
  --/////////////////////////////////////////////
  --25/01/2008
--/////////////////////////////////////////////

    ALTER TABLE "SIMA002"."caartord"
    ALTER COLUMN "codcat" TYPE VARCHAR(50);

 --/////////////////////////////////////////////
 --30/01/2008
 --/////////////////////////////////////////////

    ALTER TABLE "SIMA002"."caartreq"
    ALTER COLUMN "codcat" TYPE VARCHAR(50);

    ALTER TABLE "SIMA002"."caartdph"
    ALTER COLUMN "codcat" TYPE VARCHAR(50);

    ALTER TABLE "SIMA002"."caartreqser"
    ALTER COLUMN "codcat" TYPE VARCHAR(50);

    ALTER TABLE "SIMA002"."caartdphser"
    ALTER COLUMN "codcat" TYPE VARCHAR(50);

    ALTER TABLE "SIMA002"."cadefalm"
    ALTER COLUMN "codcat" TYPE VARCHAR(50);
 --/////////////////////////////////////////////

  CREATE TABLE "SIMA002".caartalmubi
  (
    codalm varchar(6) NOT NULL, -- Código del Almacén:
    codart varchar(20) NOT NULL, -- Código del Artículo:
    codubi varchar(20) NOT NULL, -- Código Ubicación del Almacen
    exiact numeric(14,2), -- Exist.Actual en Almacén:
    id serial not null,
    CONSTRAINT i_caartalmubi PRIMARY KEY (codalm, codart, codubi)
  )


ALTER TABLE "SIMA002"."npnomespconnomtip"
  ADD COLUMN "especial" CHAR(1);

 --/////////////////////////////////////////////
 --01/02/2008
 --/////////////////////////////////////////////

    CREATE TABLE "SIMA002".caalmubi
  (
    codalm varchar(6) NOT NULL, -- Código del Almacén:
    codubi varchar(20) NOT NULL, -- Código Ubicación del Almacen
      id serial not null,
    CONSTRAINT i_caalmubi PRIMARY KEY (codalm, codubi)
  )


  --/////////////////////////////////////////////
  --01/02/2008
--/////////////////////////////////////////////

ALTER TABLE "SIMA002"."npnomespconnomtip"
  ADD COLUMN "especial" CHAR(1);

ALTER TABLE "SIMA002"."npvacdisfrute"
  ALTER COLUMN "diasdisfutar" TYPE NUMERIC(14,0);

ALTER TABLE "SIMA002"."npvacdisfrute"
  ALTER COLUMN "diasdisfrutados" TYPE NUMERIC(14,0);


ALTER TABLE "SIMA002"."npnomespconnomtip"
  ADD COLUMN "especial" CHAR(1);

ALTER TABLE "SIMA002"."npnomcal"
  ALTER COLUMN "nomcon" TYPE VARCHAR(100);

  --/////////////////////////////////////////////
  --07/02/2008
--/////////////////////////////////////////////
ALTER TABLE "SIMA002"."cadphart"
  ADD COLUMN "codubi" VARCHAR(20);

ALTER TABLE "SIMA002"."carcpart"
  ADD COLUMN "codubi" VARCHAR(20);

ALTER TABLE "SIMA002"."npasiconemp"
  ADD COLUMN "nomemp" VARCHAR(100);
|
 --/////////////////////////////////////////////
  --14/02/2008
--/////////////////////////////////////////////
ALTER TABLE "SIMA002"."nphisasicaremp"
  ALTER COLUMN "nomemp" TYPE VARCHAR(100),
  ALTER COLUMN "nomcar" TYPE VARCHAR(100),
  ALTER COLUMN "nomnom" TYPE VARCHAR(100),
  ALTER COLUMN "nomcat" TYPE VARCHAR(100),
  ALTER COLUMN "codcat" TYPE VARCHAR(50);

--///////////////////////////////////////////////
--21/02/2008
create table casolcotiza
(
  refcot varchar(8) not null,
  refsol varchar(8) not null,
  id serial not null
);

create table casolorden
(
  ordcom varchar(8) not null,
  refsol varchar(8) not null,
  id serial not null
);
--///////////////////////////////////////////////
--25/03/2008
    ALTER TABLE "SIMA002"."caartaoc"
    ALTER COLUMN "codcat" TYPE VARCHAR(50);
--//////////////////////////////////////////////////

--/////////////////////////////////////////////
  --30/04/2008
--/////////////////////////////////////////////
ALTER TABLE "SIMA002"."caentalm"
  ADD COLUMN "codubi" VARCHAR(20);

ALTER TABLE "SIMA002"."casalalm"
  ADD COLUMN "codubi" VARCHAR(20);

ALTER TABLE "SIMA002"."cainvfis"
  ADD COLUMN "codubi" VARCHAR(20);

ALTER TABLE "SIMA002"."catraalm"
  ADD COLUMN "codubiori" VARCHAR(20),
  ADD COLUMN "codubides" VARCHAR(20);

--/////////////////////////////////////////////////
--27/06/2008
    ALTER TABLE "SIMA002"."careqartser"
    ADD COLUMN "codcatreq" VARCHAR(100);
--/////////////////////////////////////////////////


--/////////////////////////////////////////////////
--04/07/2008
    ALTER TABLE "SIMA002"."cadphartser"
    ALTER COLUMN "codori" TYPE VARCHAR(100);
--/////////////////////////////////////////////////

--/////////////////////////////////////////////////
--08/07/2008
set search_path to "SIMA002";
ALTER TABLE "caartrcp" DROP CONSTRAINT i_caartrcp;
alter table "caartrcp" add constraint i_caartrcp PRIMARY KEY (rcpart, codart, codcat);

--/////////////////////////////////////////////////
--14/07/2008
ALTER TABLE "SIMA002"."caartsol"
  ADD COLUMN "desart" VARCHAR(250);
--/////////////////////////////////////////////////
--/////////////////////////////////////////////////

--23/07/2008
ALTER TABLE "SIMA002"."cargosol"
  ADD COLUMN "tipo" VARCHAR(2);

  --14/07/2008
ALTER TABLE "SIMA002"."cadisrgo"
  ADD COLUMN "tipo" VARCHAR(2);
--/////////////////////////////////////////////////
--/////////////////////////////////////////////////

--/////////////////////////////////////////////////
--23/07/2008
ALTER TABLE "SIMA002"."caartord"
  ADD COLUMN "cerart" VARCHAR(1);
--/////////////////////////////////////////////////


-- 30/07/2008
--//////////
-----------------------------------------------------------------------------
-- cpdefapr
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdefapr" CASCADE;

DROP SEQUENCE IF EXISTS "cpdefapr_seq";

CREATE SEQUENCE "cpdefapr_seq";


CREATE TABLE "cpdefapr"
(
  "stacon" VARCHAR(50),
  "stagob" VARCHAR(50),
  "stapre" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdefapr_seq'::regclass),
  PRIMARY KEY ("id")
);
--//////////
--06/08/2008
    ALTER TABLE "SIMA002"."caordcom"
    ALTER COLUMN "desord" TYPE VARCHAR(1000);

    ALTER TABLE "SIMA002"."cpcompro"

    ALTER COLUMN "descom" TYPE VARCHAR(1000);

--////////// SIGECOF
--02/09/2008
    ALTER TABLE "SIMA002"."caordcom"
    ADD COLUMN "numsigecof"  VARCHAR(8);

    ALTER TABLE "SIMA002".caordcom
    ADD COLUMN fecsigecof date;

    ALTER TABLE "SIMA002"."caordcom"
    ADD COLUMN "expsigecof" VARCHAR(8);



--////////////////////////
--02/09/2008 Edgar Luzardo

--Tabla npincapa: tabla maestra que almacena las incapacidades

CREATE SEQUENCE "npincapa_seq";

CREATE TABLE "npincapa"
(
  codinc character varying(8) NOT NULL,
  desinc character varying(100) NOT NULL,
  obsinc character varying(1000) NOT NULL,
  id integer NOT NULL DEFAULT nextval('npincapa_seq'::regclass),
  CONSTRAINT npincapa_pkey PRIMARY KEY (id),
  CONSTRAINT npincapa_codinc_key UNIQUE (codinc)
)
WITHOUT OIDS;
ALTER TABLE "SIMA002".npincapa OWNER TO postgres;

--Tabla nphojintinc: tabla intermedio entre nphojint y npincapa, almacena las incapacidades
--por cada empleado.
CREATE SEQUENCE "nphojintinc_seq";


CREATE TABLE "nphojintinc"
(
  "codemp" VARCHAR(16),
  "codinc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphojintinc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphojintinc" IS '';


ALTER TABLE "nphojintinc" ADD CONSTRAINT "nphojintinc_FK_1" FOREIGN KEY ("codemp") REFERENCES "nphojint" ("codemp");

ALTER TABLE "nphojintinc" ADD CONSTRAINT "nphojintinc_FK_2" FOREIGN KEY ("codinc") REFERENCES "npincapa" ("codinc");



--////////// SIGECOF
--03/09/2008
    ALTER TABLE "SIMA002"."opordpag"
    ADD COLUMN "numsigecof"  VARCHAR(8);

    ALTER TABLE "SIMA002"."opordpag"
    ADD COLUMN "fecsigecof" date;

    ALTER TABLE "SIMA002"."opordpag"
    ADD COLUMN "expsigecof" VARCHAR(8);

--////////// Prestaciones Sociales
--10/09/2006
     ALTER TABLE "SIMA002"."npimppresocant"
     add COLUMN "diaser" NUMERIC(5,0);

     ALTER TABLE "SIMA002"."npimppresocant"
     add COLUMN "messer" NUMERIC(5,0);

     ALTER TABLE "SIMA002"."npimppresocant"
     add COLUMN "diatra" NUMERIC(5,0);



--////////// Recepcion Ord. de Compras
--12/09/2008
    ALTER TABLE "SIMA002"."caartrcp"
    ADD COLUMN "codalm"  VARCHAR(6);

    ALTER TABLE "SIMA002"."caartrcp"
    ADD COLUMN "codubi" VARCHAR(20);



     ALTER TABLE "SIMA002"."npimppresocant"
     add COLUMN "mestra" NUMERIC(5,0);


     ALTER TABLE "SIMA002"."npimppresocant"
     add COLUMN "anotra" NUMERIC(5,0);

     ALTER TABLE "SIMA002"."npimppresocant"
     add COLUMN "stapre" VARCHAR(1);

     ALTER TABLE "SIMA002"."npimppresocant"
     add COLUMN "adeint" NUMERIC(14,2);

     ALTER TABLE "SIMA002"."npimppresocant"
     add COLUMN "antacu" NUMERIC(14,2);


--////////// Aprobación
--30/09/2008
    ALTER TABLE "SIMA002"."cpdefapr"
    ADD COLUMN "abrstacon"  VARCHAR(5);

    ALTER TABLE "SIMA002"."cpdefapr"
    ADD COLUMN "abrstagob" VARCHAR(5);

    ALTER TABLE "SIMA002"."cpdefapr"
    ADD COLUMN "abrstapre" VARCHAR(5);


--03/10/2008  -- Errore de Luis, no creo el Script
    ALTER TABLE "SIMA002"."npinfcur"
    ADD COLUMN "activo" VARCHAR(1);

    ALTER TABLE "SIMA002"."npinfcur"
    ADD COLUMN "codprofes" VARCHAR(4);


    ALTER TABLE "SIMA002"."npinffam"
    ADD COLUMN "valgua" NUMERIC(10,2);

 --06/10/2008  CAMPO QUE AGREGARON AL MODELO  Y NO CREARON LOS SCRIPTS
	ALTER TABLE  "SIMA002"."npprofesion"
	ADD COLUMN "nivpro" VARCHAR(1);

ALTER TABLE "SIMA002"."opdefemp"
  ADD COLUMN "ordval" VARCHAR(4);

-- 18/12/2008     Formulacion
alter table "SIMA002".fordefpryaccmet
  add column "monmet" numeric(10,2);

alter table "SIMA002".fordefpryaccmet
  alter column "canmet" type integer;


-- 27/11/2008
-- Aprobacion del Compromiso
alter table "SIMA002".CPDOCCOM
	ADD COLUMN "reqaut" VARCHAR(1);

ALTER TABLE CPCOMPRO
ADD COLUMN aprcom VARCHAR(1);
---------------

--27/11/2008 Cambio para permitir despachar solo requisiciones previamente aprobadas (Esto se hizo configurable)
ALTER TABLE "SIMA002"."cadefart"
  ADD COLUMN "reqreqapr" varchar(1);

ALTER TABLE "SIMA002"."careqart"
  ADD COLUMN "aprreq" varchar(1);


--- OJO IMPORTANTE
alter table bndefins
alter column lonact type integer;

--27/11/2008 Cambio para permitir despachar solo requisiciones previamente aprobadas (Esto se hizo configurable)
ALTER TABLE "SIMA002"."cadefart"
  ADD COLUMN "solreqapr" varchar(1);

ALTER TABLE "SIMA002"."casolart"
  ADD COLUMN "aprreq" varchar(1);


--02/12/2008
-----------------------------------------------------------------------------
-- cainvfisubi
-----------------------------------------------------------------------------

CREATE SEQUENCE "cainvfisubi_seq";


CREATE TABLE "cainvfisubi"
(
  "fecinv" date NOT NULL, -- Fecha del Inventario Físico:
  "codalm" VARCHAR(6)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codubi" VARCHAR(20)  NOT NULL,
  "exiact" NUMERIC(14,2)  NOT NULL,
  "exiact2" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cainvfisubi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cainvfisubi" IS '';

--02/12/2008
--Nuevas tablas que se crearon para la configuracion de los reportes correspondientes a los Instructivos de la ONAPRE
-----------------------------------------------------------------------------
-- fordefinst
-----------------------------------------------------------------------------


CREATE SEQUENCE "fordefinst_seq";


CREATE TABLE "fordefinst"
(
  "nrofor" VARCHAR(50)  NOT NULL,
  "desfor" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fordefinst_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fordefinst" IS '';


-----------------------------------------------------------------------------
-- forcfgrepins
-----------------------------------------------------------------------------


CREATE SEQUENCE "forcfgrepins_seq";


CREATE TABLE "forcfgrepins"
(
  "nrofor" VARCHAR(50)  NOT NULL,
  "tipo" VARCHAR(1)  NOT NULL,
  "cuenta" VARCHAR(100)  NOT NULL,
  "orden" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forcfgrepins_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forcfgrepins" IS '';


-- 09-12-2008

alter table cpdefniv
add column corprc numeric(8) default 0;;

	COMMENT ON COLUMN cpdefniv.corprc
	IS 'Correlativo Precompromiso';

-------

alter table cpdefniv
add column corcom numeric(8) default 0;;

	COMMENT ON COLUMN cpdefniv.corcom
	IS 'Correlativo Compromiso';

-------

alter table cpdefniv
add column corcau numeric(8) default 0;;

	COMMENT ON COLUMN cpdefniv.corcau
	IS 'Correlativo Causado';

-------

alter table cpdefniv
add column corpag numeric(8) default 0;;

	COMMENT ON COLUMN cpdefniv.corpag
	IS 'Correlativo Pagado';

-------

alter table cpdefniv
add column corsoladidis numeric(8) default 0;;

	COMMENT ON COLUMN cpdefniv.corsoladidis
	IS 'Correlativo Solicitud Adicion/Disminucion';

-------

alter table cpdefniv
add column corsoltra numeric(8) default 0;;

	COMMENT ON COLUMN cpdefniv.corsoltra
	IS 'Correlativo Solicitud Traslados';

-------
alter table cpdefniv
add column coraju numeric(8) default 0;;

	COMMENT ON COLUMN cpdefniv.coraju
	IS 'Correlativo Ajuste';

-------------------

--10/12/2008

--Añadir a la tabla Opdefemp el campo genordret, para parametrizar la opcion de preguntar si se desea generar la orden de pago
--de retenciones inmediantemente despues de guardada la orden de pago
--Añadir a la tabla Caprovee el campo telefono del representante legal (persona contacto)
ALTER TABLE "SIMA002"."caprovee"
  ADD COLUMN "telrepleg" VARCHAR(30);

--/// Añadir campos para correlativos de entrada y salida de almacen
ALTER TABLE "SIMA002"."cacorrel"
    ADD COLUMN "corent" numeric(8),
    ADD COLUMN "corsal" numeric(8);

--/// Añadir campos observacion a Casalalm
ALTER TABLE "SIMA002"."casalalm"
    ADD COLUMN "observ" VARCHAR(1000);

--11/12/2008 Edgar Luzardo
ALTER TABLE "SIMA002".opdefemp ADD COLUMN emichepag character varying(1);

--12/12/2008 Edgar Luzardo
ALTER TABLE "SIMA002".tsmovlib ADD COLUMN refpag character varying(8);

--16/12/2008 Edgar Luzardo
ALTER TABLE "SIMA002".cpdefniv ADD COLUMN corcomcont character varying(8) DEFAULT 0;

--17/12/2008 Edgar Luzardo
ALTER TABLE "SIMA002".contabc ADD COLUMN reftra character varying(8);

--23/12/2008
ALTER TABLE "SIMA002".npantpre ADD COLUMN observacion character varying(1000);

DROP TABLE "SIMA_USER"."segbitaco" CASCADE;

--DROP SEQUENCE "SIMA_USER"."segbitaco_seq";

CREATE SEQUENCE "SIMA_USER"."segbitaco_seq";


CREATE TABLE "SIMA_USER"."segbitaco"
(
  "refmov" VARCHAR(10)  NOT NULL,
  "codofi" VARCHAR(3),
  "codapl" VARCHAR(3),
  "codintusu" VARCHAR(8),
  "fecope" DATE,
  "horope" TIMESTAMP,
  "valcla" VARCHAR(50),
  "codmod" VARCHAR(50),
  "tipope" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('"SIMA_USER".segbitaco_seq'::regclass),
  PRIMARY KEY ("id")
);

