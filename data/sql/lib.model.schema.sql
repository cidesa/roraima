
ALTER TABLE "caartalm" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "caartaoc" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "caartdph" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "caartdph" ALTER numlot TYPE character varying(100);
        
ALTER TABLE "caartdph" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "caartdphser" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "caartfec" ALTER desart TYPE character varying(1000);
        
ALTER TABLE "caartord" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "caartord" ALTER desart TYPE character varying(250);
        
ALTER TABLE "caartreq" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "caartsol" ALTER desart TYPE character varying(2000);
        
ALTER TABLE "cacorrel" ADD "corcont" NUMERIC(8);
        
ALTER TABLE "cadefalm" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "cadefalm" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "cadefalm" ADD "diralm" VARCHAR(500);
        
ALTER TABLE "cadefalm" ADD "codalt" VARCHAR(20);
        
ALTER TABLE "cadefalm" ADD "codedo" VARCHAR(20);
        
ALTER TABLE "cadefalm" ADD "esptoven" BOOLEAN;
        
ALTER TABLE "cadefalm" ADD "codtippv" VARCHAR(3);
        
ALTER TABLE "cadetcot" ADD "observaciones" VARCHAR(1000);
        
ALTER TABLE "cadettra" ADD "numlot" VARCHAR;
        
ALTER TABLE "cadisrgo" ALTER codcat TYPE character varying(32);
        
ALTER TABLE "cadisrgo" ALTER tipo TYPE character varying(1);
        
ALTER TABLE "cadphart" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "cadphart" ADD "codcen" VARCHAR(4);
        
ALTER TABLE "cadphart" ADD "fecemiov" DATE;
        
ALTER TABLE "cadphart" ADD "feccarov" DATE;
        
ALTER TABLE "cadphart" ADD "locori" VARCHAR(250);
        
ALTER TABLE "cadphart" ADD "direccion" VARCHAR(1000);
        
ALTER TABLE "cadphart" ADD "rubro" VARCHAR(100);
        
ALTER TABLE "cadphart" ADD "cankg" NUMERIC(10,2);
        
ALTER TABLE "cadphart" ADD "totpasreal" NUMERIC(10,2);
        
ALTER TABLE "cadphart" ADD "locrec" VARCHAR(250);
        
ALTER TABLE "cadphart" ADD "emptra" VARCHAR(500);
        
ALTER TABLE "cadphart" ADD "nomrep" VARCHAR(250);
        
ALTER TABLE "cadphart" ADD "telemp" VARCHAR(100);
        
ALTER TABLE "cadphart" ADD "choveh" VARCHAR(250);
        
ALTER TABLE "cadphart" ADD "cedcho" VARCHAR(20);
        
ALTER TABLE "cadphart" ADD "telcho" VARCHAR(100);
        
ALTER TABLE "cadphart" ADD "nomconfordes" VARCHAR(250);
        
ALTER TABLE "cadphart" ADD "cedconfordes" VARCHAR(20);
        
ALTER TABLE "cadphart" ADD "horsalconfordes" VARCHAR(20);
        
ALTER TABLE "cadphart" ADD "nomconforrec" VARCHAR(250);
        
ALTER TABLE "cadphart" ADD "cedconforrec" VARCHAR(20);
        
ALTER TABLE "cadphart" ADD "horlleconforrec" VARCHAR(20);
        
ALTER TABLE "cadphartser" ALTER codori TYPE character varying(16);
        
ALTER TABLE "caordcon" ADD "fecpto" DATE;
        
ALTER TABLE "caordcon" ADD "numcon" VARCHAR(25);
        
ALTER TABLE "caordcon" ADD "numpto" VARCHAR(50);
        
ALTER TABLE "caordcon" ADD "numres" VARCHAR(50);
        
ALTER TABLE "caordcon" ADD "otorga" VARCHAR(1);
        
ALTER TABLE "caordcon" ADD "fecfir" DATE;
        
ALTER TABLE "caordcon" ADD "otoant" BOOLEAN;
        
ALTER TABLE "caordcon" ADD "monoto" NUMERIC(14,2);
        
ALTER TABLE "caordcon" ADD "pamopag" NUMERIC(14,2);
        
ALTER TABLE "caordcon" ADD "cumresp" BOOLEAN;
        
ALTER TABLE "caordcon" ADD "otoesp" BOOLEAN;
        
ALTER TABLE "caordcon" ADD "monaes" NUMERIC(14,2);
        
ALTER TABLE "carcpart" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "carcpart" ADD "nomcli" VARCHAR(100);
        
ALTER TABLE "carcpart" ADD "cancaj" NUMERIC(10,2);
        
ALTER TABLE "carcpart" ADD "canjau" NUMERIC(10,2);
        
ALTER TABLE "carcpart" ADD "codcen" VARCHAR(4);
        
ALTER TABLE "careqart" ADD "nummemo" VARCHAR(10);
        
ALTER TABLE "careqart" ADD "justif" VARCHAR(250);
        
ALTER TABLE "careqart" ADD "codcen" VARCHAR(4);
        
ALTER TABLE "careqartser" ALTER codcatreq TYPE character varying(50);
        
ALTER TABLE "caresordcom" ALTER desres TYPE character varying(500);
        
ALTER TABLE "cargosol" ALTER tipo TYPE character varying(1);
        
ALTER TABLE "casolart" ALTER obsreq TYPE character varying(5000);
        
ALTER TABLE "casolart" ALTER unires TYPE character varying(32);
        
ALTER TABLE "casolart" ADD "codemp" VARCHAR(16);
        
ALTER TABLE "casolart" ADD "codcen" VARCHAR(4);
        
ALTER TABLE "caregart" ADD "tipreg" VARCHAR(1);
        
ALTER TABLE "caregart" ADD "perbienes" BOOLEAN;
        
ALTER TABLE "caregart" ADD "ctatra" VARCHAR(32);
        
ALTER TABLE "caregart" ADD "cosunipri" NUMERIC(14,2);
        
ALTER TABLE "caregart" ADD "ctadef" VARCHAR(32);
        
ALTER TABLE "caordcom" ADD "codcen" VARCHAR(4);
        
ALTER TABLE "caordcom" ADD "tipocom" VARCHAR(50);
        
ALTER TABLE "caordcom" ADD "ceddon" VARCHAR(15);
        
ALTER TABLE "caordcom" ADD "nomdon" VARCHAR(50);
        
ALTER TABLE "caordcom" ADD "fecdon" DATE;
        
ALTER TABLE "caordcom" ADD "sexdon" VARCHAR(1);
        
ALTER TABLE "caordcom" ADD "edadon" NUMERIC(2);
        
ALTER TABLE "caordcom" ADD "serdon" VARCHAR(1);
        
ALTER TABLE "caordcom" ADD "motanu" VARCHAR(500);
        
ALTER TABLE "caordcom" ADD "usuanu" VARCHAR(250);
        
ALTER TABLE "caordcom" ADD "codcenaco" VARCHAR(4);
        
ALTER TABLE "caprovee" ADD "estpro" VARCHAR(1);
        
ALTER TABLE "caprovee" ADD "codban" VARCHAR(4);
        
ALTER TABLE "caprovee" ADD "numcue" VARCHAR(20);
        
ALTER TABLE "caprovee" ADD "codtip" VARCHAR(3);
        
ALTER TABLE "cadefart" ALTER codalmven TYPE character varying(20);
        
ALTER TABLE "cadefart" ADD "tipodoc" VARCHAR(4);
        
ALTER TABLE "cacotiza" ADD "obscot" VARCHAR(250);
        
ALTER TABLE "caartalmubi" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "caartalmubi" ADD "numlot" VARCHAR(100);
        
ALTER TABLE "caartalmubi" ADD "fecela" DATE;
        
ALTER TABLE "caartalmubi" ADD "fecven" DATE;
        
ALTER TABLE "caalmubi" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "caentalm" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "caentalm" ADD "codcen" VARCHAR(4);
        
ALTER TABLE "caentalm" ADD "dphart" VARCHAR(15);
        
ALTER TABLE "casalalm" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "casalalm" ADD "codcen" VARCHAR(4);
        
ALTER TABLE "casalalm" ADD "reqart" VARCHAR(8);
        
ALTER TABLE "cainvfis" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "caartrcp" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "caartrcp" ADD "numlot" VARCHAR(100);
        
ALTER TABLE "caartreqser" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "cadetent" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "cadetent" ALTER codubi TYPE character varying(20);
        
ALTER TABLE "cadetent" ADD "fecven" DATE;
        
ALTER TABLE "cadetent" ADD "numjau" NUMERIC(10,2);
        
ALTER TABLE "cadetent" ADD "tammet" NUMERIC(10,2);
        
ALTER TABLE "cadetent" ADD "numlot" VARCHAR;
        
ALTER TABLE "cadetsal" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "cadetsal" ADD "numjau" NUMERIC(10,2);
        
ALTER TABLE "cadetsal" ADD "tammet" NUMERIC(10,2);
        
ALTER TABLE "cadetsal" ADD "numlot" VARCHAR;
        
ALTER TABLE "cainvfisubi" ALTER codalm TYPE character varying(20);
        
ALTER TABLE "caconmer" ALTER codpro TYPE character varying(10);
        
ALTER TABLE "caconmer" ALTER codalm TYPE character varying(20);
        
-----------------------------------------------------------------------------
-- caproret
-----------------------------------------------------------------------------

CREATE SEQUENCE "caproret_seq";


CREATE TABLE "caproret"
(
  "codpro" VARCHAR(15)  NOT NULL,
  "codret" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caproret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caproret" IS '';


COMMENT ON COLUMN "caproret"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- cabanco
-----------------------------------------------------------------------------

CREATE SEQUENCE "cabanco_seq";


CREATE TABLE "cabanco"
(
  "codban" VARCHAR(4)  NOT NULL,
  "desban" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cabanco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cabanco" IS '';


COMMENT ON COLUMN "cabanco"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- casolpag
-----------------------------------------------------------------------------

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

COMMENT ON TABLE "casolpag" IS '';


COMMENT ON COLUMN "casolpag"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- cadetpag
-----------------------------------------------------------------------------

CREATE SEQUENCE "cadetpag_seq";


CREATE TABLE "cadetpag"
(
  "solpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "moncom" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cadetpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadetpag" IS '';


-----------------------------------------------------------------------------
-- caunifor
-----------------------------------------------------------------------------

CREATE SEQUENCE "caunifor_seq";


CREATE TABLE "caunifor"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "prefij" VARCHAR(2)  NOT NULL,
  "coruni" NUMERIC(8)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caunifor_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caunifor" IS '';


-----------------------------------------------------------------------------
-- causuuni
-----------------------------------------------------------------------------

CREATE SEQUENCE "causuuni_seq";


CREATE TABLE "causuuni"
(
  "loguse" VARCHAR(50)  NOT NULL,
  "codcat" VARCHAR(32)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('causuuni_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "causuuni" IS '';


-----------------------------------------------------------------------------
-- cadefcen
-----------------------------------------------------------------------------

CREATE SEQUENCE "cadefcen_seq";


CREATE TABLE "cadefcen"
(
  "codcen" VARCHAR(4)  NOT NULL,
  "descen" VARCHAR(250)  NOT NULL,
  "dircen" VARCHAR(500),
  "codpai" VARCHAR(4),
  "nomemp" VARCHAR(250),
  "nomcar" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadefcen_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadefcen" IS '';


COMMENT ON COLUMN "cadefcen"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- cadefcenaco
-----------------------------------------------------------------------------

CREATE SEQUENCE "cadefcenaco_seq";


CREATE TABLE "cadefcenaco"
(
  "codcenaco" VARCHAR(4)  NOT NULL,
  "descenaco" VARCHAR(250)  NOT NULL,
  "codpai" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codciu" VARCHAR(4),
  "codmun" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadefcenaco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadefcenaco" IS '';


COMMENT ON COLUMN "cadefcenaco"."codpai" IS 'Código del país donde reside el organismo.';

COMMENT ON COLUMN "cadefcenaco"."codedo" IS 'Código del estado donde reside el organismo.';

COMMENT ON COLUMN "cadefcenaco"."codciu" IS 'Código del ciudad donde reside el organismo.';

COMMENT ON COLUMN "cadefcenaco"."codmun" IS 'Código del municipio donde reside el organismo.';

COMMENT ON COLUMN "cadefcenaco"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- carelartsiga
-----------------------------------------------------------------------------

CREATE SEQUENCE "carelartsiga_seq";


CREATE TABLE "carelartsiga"
(
  "codart" VARCHAR(20)  NOT NULL,
  "codartq" VARCHAR(100)  NOT NULL,
  "desartq" VARCHAR(1500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('carelartsiga_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "carelartsiga" IS '';


COMMENT ON COLUMN "carelartsiga"."codart" IS 'Código del articulo del siga';

COMMENT ON COLUMN "carelartsiga"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- cacontxtalm
-----------------------------------------------------------------------------

CREATE SEQUENCE "cacontxtalm_seq";


CREATE TABLE "cacontxtalm"
(
  "codalm" VARCHAR(20)  NOT NULL,
  "iniart" NUMERIC(3)  NOT NULL,
  "finart" NUMERIC(3)  NOT NULL,
  "inides" NUMERIC(3)  NOT NULL,
  "findes" NUMERIC(3)  NOT NULL,
  "inican" NUMERIC(3)  NOT NULL,
  "fincan" NUMERIC(3)  NOT NULL,
  "inisub" NUMERIC(3)  NOT NULL,
  "finsub" NUMERIC(3)  NOT NULL,
  "iniiva" NUMERIC(3)  NOT NULL,
  "finiva" NUMERIC(3)  NOT NULL,
  "inipre" NUMERIC(3)  NOT NULL,
  "finpre" NUMERIC(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cacontxtalm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cacontxtalm" IS '';


COMMENT ON COLUMN "cacontxtalm"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- caequiart
-----------------------------------------------------------------------------

CREATE SEQUENCE "caequiart_seq";


CREATE TABLE "caequiart"
(
  "codqpr" VARCHAR(20)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caequiart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caequiart" IS '';


COMMENT ON COLUMN "caequiart"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- camigtxtven
-----------------------------------------------------------------------------

CREATE SEQUENCE "camigtxtven_seq";


CREATE TABLE "camigtxtven"
(
  "codalm" VARCHAR(20)  NOT NULL,
  "fecven" DATE,
  "codart" VARCHAR(20)  NOT NULL,
  "desart" VARCHAR(1500)  NOT NULL,
  "cantidad" NUMERIC(14,2),
  "subtot" NUMERIC(14,2),
  "iva" NUMERIC(14,2),
  "precio" NUMERIC(14,2),
  "fecmig" DATE,
  "usumig" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('camigtxtven_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "camigtxtven" IS '';


COMMENT ON COLUMN "camigtxtven"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- caunialart
-----------------------------------------------------------------------------

CREATE SEQUENCE "caunialart_seq";


CREATE TABLE "caunialart"
(
  "codart" VARCHAR(20)  NOT NULL,
  "unialt" VARCHAR(15),
  "relart" VARCHAR(25),
  "id" INTEGER  NOT NULL DEFAULT nextval('caunialart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caunialart" IS '';


COMMENT ON COLUMN "caunialart"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- catipalmpv
-----------------------------------------------------------------------------

CREATE SEQUENCE "catipalmpv_seq";


CREATE TABLE "catipalmpv"
(
  "codtippv" VARCHAR(3)  NOT NULL,
  "nomtippv" VARCHAR(100)  NOT NULL,
  "metdes" NUMERIC(14,2),
  "methas" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('catipalmpv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catipalmpv" IS '';


COMMENT ON COLUMN "catipalmpv"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- caconcla
-----------------------------------------------------------------------------

CREATE SEQUENCE "caconcla_seq";


CREATE TABLE "caconcla"
(
  "ordcon" VARCHAR(8)  NOT NULL,
  "descla" VARCHAR(3000),
  "id" INTEGER  NOT NULL DEFAULT nextval('caconcla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caconcla" IS '';


COMMENT ON COLUMN "caconcla"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- cadefcla
-----------------------------------------------------------------------------

CREATE SEQUENCE "cadefcla_seq";


CREATE TABLE "cadefcla"
(
  "codcla" VARCHAR(4)  NOT NULL,
  "descla" VARCHAR(2500),
  "tipcla" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadefcla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadefcla" IS '';


COMMENT ON COLUMN "cadefcla"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- cagrucla
-----------------------------------------------------------------------------

CREATE SEQUENCE "cagrucla_seq";


CREATE TABLE "cagrucla"
(
  "codgru" VARCHAR(4)  NOT NULL,
  "desgru" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('cagrucla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cagrucla" IS '';


COMMENT ON COLUMN "cagrucla"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- caclagru
-----------------------------------------------------------------------------

CREATE SEQUENCE "caclagru_seq";


CREATE TABLE "caclagru"
(
  "codgru" VARCHAR(4),
  "codcla" VARCHAR(4),
  "codins" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('caclagru_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caclagru" IS '';


COMMENT ON COLUMN "caclagru"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- cafiacon
-----------------------------------------------------------------------------

CREATE SEQUENCE "cafiacon_seq";


CREATE TABLE "cafiacon"
(
  "ordcon" VARCHAR(8)  NOT NULL,
  "fecfia" DATE,
  "insfin" VARCHAR(50),
  "tipfia" VARCHAR(50),
  "numfia" VARCHAR(50),
  "monfia" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cafiacon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cafiacon" IS '';


COMMENT ON COLUMN "cafiacon"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- cacrocon
-----------------------------------------------------------------------------

CREATE SEQUENCE "cacrocon_seq";


CREATE TABLE "cacrocon"
(
  "ordcon" VARCHAR(8)  NOT NULL,
  "fecpag" DATE,
  "nropag" VARCHAR(10),
  "monpag" NUMERIC(14,2),
  "pormon" NUMERIC(14,2),
  "poramo" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cacrocon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cacrocon" IS '';


COMMENT ON COLUMN "cacrocon"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- caentord
-----------------------------------------------------------------------------

CREATE SEQUENCE "caentord_seq";


CREATE TABLE "caentord"
(
  "ordcom" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codalm" VARCHAR(20)  NOT NULL,
  "canent" NUMERIC(14,2)  NOT NULL,
  "canrec" NUMERIC(14,2),
  "fecent" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caentord_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caentord" IS '';


COMMENT ON COLUMN "caentord"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- ocactcom
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocactcom_seq";


CREATE TABLE "ocactcom"
(
  "codactcom" VARCHAR(10)  NOT NULL,
  "desactcom" VARCHAR(250),
  "staactcom" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocactcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocactcom" IS '';


-----------------------------------------------------------------------------
-- ocasiact
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocasiact_seq";


CREATE TABLE "ocasiact"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "codtipact" VARCHAR(4)  NOT NULL,
  "numofi" VARCHAR(15),
  "fecact" DATE  NOT NULL,
  "obsact" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocasiact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocasiact" IS '';


-----------------------------------------------------------------------------
-- ocdatste
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocdatste_seq";


CREATE TABLE "ocdatste"
(
  "cedste" VARCHAR(15)  NOT NULL,
  "nomste" VARCHAR(50)  NOT NULL,
  "codste" VARCHAR(4)  NOT NULL,
  "dirste" VARCHAR(100),
  "telste" VARCHAR(30),
  "faxste" VARCHAR(15),
  "emaste" VARCHAR(100),
  "cedrep" VARCHAR(15),
  "nomrep" VARCHAR(50),
  "dirrep" VARCHAR(100),
  "telrep" VARCHAR(30),
  "faxrep" VARCHAR(15),
  "emarep" VARCHAR(100),
  "codpai" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codmun" VARCHAR(4),
  "codpar" VARCHAR(4),
  "codsec" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdatste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdatste" IS '';


-----------------------------------------------------------------------------
-- ocdefemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocdefemp_seq";


CREATE TABLE "ocdefemp"
(
  "codemp" VARCHAR(15)  NOT NULL,
  "nomemp" VARCHAR(100)  NOT NULL,
  "diremp" VARCHAR(100)  NOT NULL,
  "telemp" VARCHAR(30)  NOT NULL,
  "faxemp" VARCHAR(15),
  "emaemp" VARCHAR(100),
  "porant" NUMERIC(14,2),
  "plaini" NUMERIC(14,2),
  "poraumobr" NUMERIC(14,2),
  "pormul" NUMERIC(14,2),
  "unitri" NUMERIC(14,2),
  "codactproini" VARCHAR(4),
  "codactini" VARCHAR(4),
  "codactpar" VARCHAR(4),
  "codactrei" VARCHAR(4),
  "codactproter" VARCHAR(4),
  "codactter" VARCHAR(4),
  "codactrecpro" VARCHAR(4),
  "codactrecdef" VARCHAR(4),
  "codingres" VARCHAR(4),
  "codconobr" VARCHAR(4),
  "codconins" VARCHAR(4),
  "codconsup" VARCHAR(4),
  "codconpro" VARCHAR(4),
  "codvalant" VARCHAR(2),
  "codvalpar" VARCHAR(2),
  "codvalfin" VARCHAR(2),
  "codvalret" VARCHAR(2),
  "codvalrec" VARCHAR(2),
  "codparrec" VARCHAR(32),
  "ivaant" VARCHAR(1),
  "retant" VARCHAR(1),
  "gencom" VARCHAR(1),
  "tipcom" VARCHAR(4),
  "numini" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdefemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdefemp" IS '';


-----------------------------------------------------------------------------
-- ocdefequ
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocdefequ_seq";


CREATE TABLE "ocdefequ"
(
  "codequ" VARCHAR(6)  NOT NULL,
  "desequ" VARCHAR(250)  NOT NULL,
  "codtipequ" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdefequ_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdefequ" IS '';


-----------------------------------------------------------------------------
-- ocdeforg
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocdeforg_seq";


CREATE TABLE "ocdeforg"
(
  "codorg" VARCHAR(4)  NOT NULL,
  "desorg" VARCHAR(250)  NOT NULL,
  "codtiporg" VARCHAR(4)  NOT NULL,
  "entorg" VARCHAR(1),
  "dirorg" VARCHAR(100),
  "codpai" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codciu" VARCHAR(4),
  "telorg" VARCHAR(30),
  "faxorg" VARCHAR(15),
  "emaorg" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdeforg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdeforg" IS '';


-----------------------------------------------------------------------------
-- ocdefpar
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocdefpar_seq";


CREATE TABLE "ocdefpar"
(
  "renpar" VARCHAR(16),
  "cosuni" NUMERIC(14,2),
  "coduni" VARCHAR(4),
  "codpar" VARCHAR(32)  NOT NULL,
  "despar" VARCHAR(250),
  "codtippar" VARCHAR(3)  NOT NULL,
  "coscoling" NUMERIC(14,2),
  "cosconstruc" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdefpar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdefpar" IS '';


-----------------------------------------------------------------------------
-- ocdefper
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocdefper_seq";


CREATE TABLE "ocdefper"
(
  "cedper" VARCHAR(15)  NOT NULL,
  "nomper" VARCHAR(100)  NOT NULL,
  "telper" VARCHAR(50),
  "codtipcar" VARCHAR(4),
  "codtippro" VARCHAR(4),
  "codtipper" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdefper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdefper" IS '';


-----------------------------------------------------------------------------
-- ocdocact
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocdocact_seq";


CREATE TABLE "ocdocact"
(
  "coddoc" VARCHAR(4)  NOT NULL,
  "desdoc" VARCHAR(250),
  "stadoc" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdocact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdocact" IS '';


-----------------------------------------------------------------------------
-- ocinginsobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocinginsobr_seq";


CREATE TABLE "ocinginsobr"
(
  "codobr" VARCHAR(32)  NOT NULL,
  "cedins" VARCHAR(10)  NOT NULL,
  "nomins" VARCHAR(100),
  "numciv" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocinginsobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocinginsobr" IS '';


-----------------------------------------------------------------------------
-- ocingrescon
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocingrescon_seq";


CREATE TABLE "ocingrescon"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "ceding" VARCHAR(10)  NOT NULL,
  "noming" VARCHAR(100),
  "nrocoling" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocingrescon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocingrescon" IS '';


-----------------------------------------------------------------------------
-- ocinscon
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocinscon_seq";


CREATE TABLE "ocinscon"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "numins" VARCHAR(3)  NOT NULL,
  "codtipins" VARCHAR(3)  NOT NULL,
  "feccom" DATE,
  "fecter" DATE,
  "porobreje" NUMERIC(14,2),
  "portietra" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocinscon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocinscon" IS '';


-----------------------------------------------------------------------------
-- ocinsval
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocinsval_seq";


CREATE TABLE "ocinsval"
(
  "cedins" VARCHAR(10)  NOT NULL,
  "codcon" VARCHAR(32)  NOT NULL,
  "numval" VARCHAR(2)  NOT NULL,
  "codtipval" VARCHAR(2)  NOT NULL,
  "nomins" VARCHAR(100),
  "numciv" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocinsval_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocinsval" IS '';


ALTER TABLE "ocmunici" ADD "codciu" VARCHAR(4);
        
-----------------------------------------------------------------------------
-- ocobrfot
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocobrfot_seq";


CREATE TABLE "ocobrfot"
(
  "codobr" VARCHAR(32)  NOT NULL,
  "numfot" VARCHAR(2)  NOT NULL,
  "angfot" VARCHAR(50),
  "desfot" VARCHAR(250),
  "fecfot" DATE,
  "rutfot" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocobrfot_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocobrfot" IS '';


-----------------------------------------------------------------------------
-- ocofeser
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocofeser_seq";


CREATE TABLE "ocofeser"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "codtippro" VARCHAR(4)  NOT NULL,
  "nivpro" VARCHAR(6),
  "exppro" NUMERIC(14,2)  NOT NULL,
  "numper" NUMERIC(14,2)  NOT NULL,
  "canhor" NUMERIC(14,2)  NOT NULL,
  "canval" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocofeser_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocofeser" IS '';


-----------------------------------------------------------------------------
-- ocofeserval
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocofeserval_seq";


CREATE TABLE "ocofeserval"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "numval" VARCHAR(2)  NOT NULL,
  "codtipval" VARCHAR(2)  NOT NULL,
  "codtippro" VARCHAR(4)  NOT NULL,
  "nivpro" VARCHAR(6)  NOT NULL,
  "exppro" NUMERIC(14,2)  NOT NULL,
  "cantidad" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocofeserval_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocofeserval" IS '';


-----------------------------------------------------------------------------
-- ocparcon
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocparcon_seq";


CREATE TABLE "ocparcon"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "codpar" VARCHAR(32)  NOT NULL,
  "cancon" NUMERIC(14,2)  NOT NULL,
  "canval" NUMERIC(14,2)  NOT NULL,
  "porcon" NUMERIC(14,2),
  "codtipfte" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocparcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocparcon" IS '';


-----------------------------------------------------------------------------
-- ocparins
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocparins_seq";


CREATE TABLE "ocparins"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "numins" VARCHAR(3)  NOT NULL,
  "codpar" VARCHAR(32)  NOT NULL,
  "poreje" NUMERIC(14,2),
  "obsins" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocparins_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocparins" IS '';


-----------------------------------------------------------------------------
-- ocparval
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocparval_seq";


CREATE TABLE "ocparval"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "numval" VARCHAR(2)  NOT NULL,
  "codtipval" VARCHAR(2)  NOT NULL,
  "codpar" VARCHAR(32)  NOT NULL,
  "cantidad" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocparval_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocparval" IS '';


-----------------------------------------------------------------------------
-- ocpreobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocpreobr_seq";


CREATE TABLE "ocpreobr"
(
  "codobr" VARCHAR(32)  NOT NULL,
  "codpar" VARCHAR(32),
  "canobr" NUMERIC(14,2),
  "cancon" NUMERIC(14,2),
  "canconfin" NUMERIC(14,2),
  "adipar" VARCHAR(1),
  "cosuni" NUMERIC(14,2),
  "cosunifin" NUMERIC(14,2),
  "codpre" VARCHAR(32),
  "monpre" NUMERIC(36,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocpreobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocpreobr" IS '';


-----------------------------------------------------------------------------
-- ocproequ
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocproequ_seq";


CREATE TABLE "ocproequ"
(
  "codpro" VARCHAR(10)  NOT NULL,
  "codequ" VARCHAR(6)  NOT NULL,
  "canequ" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocproequ_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocproequ" IS '';


-----------------------------------------------------------------------------
-- ocproper
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocproper_seq";


CREATE TABLE "ocproper"
(
  "codpro" VARCHAR(10)  NOT NULL,
  "cedper" VARCHAR(15)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocproper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocproper" IS '';


-----------------------------------------------------------------------------
-- ocprovee
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocprovee_seq";


CREATE TABLE "ocprovee"
(
  "codpro" VARCHAR(10)  NOT NULL,
  "nompro" VARCHAR(100)  NOT NULL,
  "rifpro" VARCHAR(15)  NOT NULL,
  "nitpro" VARCHAR(15),
  "dirpro" VARCHAR(100),
  "telpro" VARCHAR(30),
  "faxpro" VARCHAR(15),
  "email" VARCHAR(100),
  "limcre" NUMERIC(14,2),
  "codcta" VARCHAR(32),
  "regmer" VARCHAR(15),
  "fecreg" DATE,
  "tomreg" VARCHAR(15),
  "folreg" VARCHAR(15),
  "capsus" NUMERIC(14,2),
  "cappag" NUMERIC(14,2),
  "rifrepleg" VARCHAR(15),
  "nomrepleg" VARCHAR(50),
  "dirrepleg" VARCHAR(100),
  "fecinscir" DATE,
  "numinscir" VARCHAR(20),
  "nacpro" VARCHAR(1),
  "codord" VARCHAR(32),
  "codpercon" VARCHAR(32),
  "codtiprec" VARCHAR(4),
  "codram" VARCHAR(6),
  "nrocei" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocprovee_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocprovee" IS '';


-----------------------------------------------------------------------------
-- ocregact
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocregact_seq";


CREATE TABLE "ocregact"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "cedins" VARCHAR(15),
  "cedtec" VARCHAR(15),
  "cedfis" VARCHAR(15),
  "cedres" VARCHAR(15),
  "cedtop" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocregact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocregact" IS '';


-----------------------------------------------------------------------------
-- ocregcon
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocregcon_seq";


CREATE TABLE "ocregcon"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "codobr" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(10)  NOT NULL,
  "descon" VARCHAR(250)  NOT NULL,
  "tipcon" VARCHAR(4)  NOT NULL,
  "moncon" NUMERIC(14,2)  NOT NULL,
  "monext" NUMERIC(14,2)  NOT NULL,
  "monmul" NUMERIC(14,2)  NOT NULL,
  "monmod" NUMERIC(14,2)  NOT NULL,
  "feclic" DATE,
  "fecbuepro" DATE,
  "feccon" DATE  NOT NULL,
  "fecini" DATE  NOT NULL,
  "fecproini" DATE,
  "fecpar" DATE,
  "fecrei" DATE,
  "fecpro" DATE,
  "fecfin" DATE,
  "fecrecprov" DATE,
  "fecrecdef" DATE,
  "poriva" NUMERIC(14,2)  NOT NULL,
  "moniva" NUMERIC(14,2)  NOT NULL,
  "tieejecon" NUMERIC(14,2)  NOT NULL,
  "stacon" VARCHAR(1)  NOT NULL,
  "platie" VARCHAR(1),
  "fecfinmod" DATE,
  "gasree" NUMERIC(14,2),
  "subtot" NUMERIC(14,2),
  "monful" NUMERIC(14,2),
  "codpre" VARCHAR(32),
  "despre" VARCHAR(100),
  "refcom" VARCHAR(8),
  "tipo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocregcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocregcon" IS '';


-----------------------------------------------------------------------------
-- ocregobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocregobr_seq";


CREATE TABLE "ocregobr"
(
  "codobr" VARCHAR(32)  NOT NULL,
  "codtipobr" VARCHAR(4)  NOT NULL,
  "desobr" VARCHAR(250)  NOT NULL,
  "fecreg" DATE,
  "fecini" DATE,
  "fecfin" DATE,
  "unocon" VARCHAR(1),
  "codpre" VARCHAR(32),
  "codpai" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codmun" VARCHAR(4)  NOT NULL,
  "codpar" VARCHAR(4)  NOT NULL,
  "codsec" VARCHAR(4),
  "dirobr" VARCHAR(250)  NOT NULL,
  "monobr" NUMERIC(14,2)  NOT NULL,
  "staobr" VARCHAR(1)  NOT NULL,
  "despre" VARCHAR(100),
  "subtot" NUMERIC(14,2),
  "moniva" NUMERIC(14,2),
  "ivaobr" NUMERIC(14,2),
  "codpreiva" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocregobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocregobr" IS '';


-----------------------------------------------------------------------------
-- ocregsol
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocregsol_seq";


CREATE TABLE "ocregsol"
(
  "numsol" VARCHAR(8)  NOT NULL,
  "dessol" VARCHAR(250)  NOT NULL,
  "cedste" VARCHAR(15)  NOT NULL,
  "codsol" VARCHAR(4),
  "codorg" VARCHAR(4),
  "fecsol" DATE  NOT NULL,
  "fecres" DATE,
  "obssol" VARCHAR(250),
  "codemp" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocregsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocregsol" IS '';


-----------------------------------------------------------------------------
-- ocregval
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocregval_seq";


CREATE TABLE "ocregval"
(
  "monval" NUMERIC(14,2)  NOT NULL,
  "salliq" NUMERIC(14,2)  NOT NULL,
  "retacu" NUMERIC(14,2)  NOT NULL,
  "moniva" NUMERIC(14,2),
  "amoant" NUMERIC(14,2),
  "staval" VARCHAR(1)  NOT NULL,
  "poriva" NUMERIC(14,2),
  "porant" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "salant" NUMERIC(14,2),
  "gasree" NUMERIC(14,2),
  "subtot" NUMERIC(14,2),
  "monful" NUMERIC(14,2),
  "monfia" NUMERIC(14,2),
  "monant" NUMERIC(14,2),
  "monperiva" NUMERIC(14,2),
  "codcon" VARCHAR(32)  NOT NULL,
  "numval" VARCHAR(2)  NOT NULL,
  "codtipval" VARCHAR(2)  NOT NULL,
  "fecini" DATE,
  "fecfin" DATE,
  "fecreg" DATE  NOT NULL,
  "aumobr" NUMERIC(14,2)  NOT NULL,
  "disobr" NUMERIC(14,2)  NOT NULL,
  "obrext" NUMERIC(14,2)  NOT NULL,
  "monper" NUMERIC(14,2)  NOT NULL,
  "totded" NUMERIC(14,2)  NOT NULL,
  "obsval" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocregval_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocregval" IS '';


-----------------------------------------------------------------------------
-- ocressol
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocressol_seq";


CREATE TABLE "ocressol"
(
  "numsol" VARCHAR(8)  NOT NULL,
  "numcor" VARCHAR(12)  NOT NULL,
  "cedemi" VARCHAR(16)  NOT NULL,
  "cedfir" VARCHAR(16)  NOT NULL,
  "ubiarc" VARCHAR(250),
  "fecres" DATE,
  "fecfir" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocressol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocressol" IS '';


-----------------------------------------------------------------------------
-- ocretcon
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocretcon_seq";


CREATE TABLE "ocretcon"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "codtip" VARCHAR(3)  NOT NULL,
  "porret" NUMERIC(14,2),
  "monret" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocretcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocretcon" IS '';


-----------------------------------------------------------------------------
-- ocretval
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocretval_seq";


CREATE TABLE "ocretval"
(
  "codtip" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(32)  NOT NULL,
  "numval" VARCHAR(2)  NOT NULL,
  "codtipval" VARCHAR(2)  NOT NULL,
  "porret" NUMERIC(14,2)  NOT NULL,
  "monret" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocretval_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocretval" IS '';


-----------------------------------------------------------------------------
-- ocsector
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocsector_seq";


CREATE TABLE "ocsector"
(
  "codpai" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codmun" VARCHAR(4)  NOT NULL,
  "codpar" VARCHAR(4)  NOT NULL,
  "codsec" VARCHAR(4)  NOT NULL,
  "nomsec" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocsector_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocsector" IS '';


-----------------------------------------------------------------------------
-- octartip
-----------------------------------------------------------------------------

CREATE SEQUENCE "octartip_seq";


CREATE TABLE "octartip"
(
  "exppro" NUMERIC(14,2)  NOT NULL,
  "valhor" NUMERIC(14,2)  NOT NULL,
  "numniv" NUMERIC(4),
  "codtippro" VARCHAR(4),
  "nivpro" VARCHAR(6),
  "id" INTEGER  NOT NULL DEFAULT nextval('octartip_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octartip" IS '';


-----------------------------------------------------------------------------
-- octipact
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipact_seq";


CREATE TABLE "octipact"
(
  "codtipact" VARCHAR(4)  NOT NULL,
  "destipact" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipact" IS '';


-----------------------------------------------------------------------------
-- octipcar
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipcar_seq";


CREATE TABLE "octipcar"
(
  "codtipcar" VARCHAR(4)  NOT NULL,
  "destipcar" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipcar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipcar" IS '';


-----------------------------------------------------------------------------
-- octipcon
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipcon_seq";


CREATE TABLE "octipcon"
(
  "codtipcon" VARCHAR(4)  NOT NULL,
  "destipcon" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipcon" IS '';


-----------------------------------------------------------------------------
-- octipesp
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipesp_seq";


CREATE TABLE "octipesp"
(
  "codtipesp" VARCHAR(4)  NOT NULL,
  "destipesp" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipesp" IS '';


-----------------------------------------------------------------------------
-- octipobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipobr_seq";


CREATE TABLE "octipobr"
(
  "codtipobr" VARCHAR(4)  NOT NULL,
  "destipobr" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipobr" IS '';


-----------------------------------------------------------------------------
-- octiporg
-----------------------------------------------------------------------------

CREATE SEQUENCE "octiporg_seq";


CREATE TABLE "octiporg"
(
  "codtiporg" VARCHAR(4)  NOT NULL,
  "destiporg" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octiporg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octiporg" IS '';


-----------------------------------------------------------------------------
-- octipprl
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipprl_seq";


CREATE TABLE "octipprl"
(
  "codtippro" VARCHAR(4)  NOT NULL,
  "destippro" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipprl_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipprl" IS '';


-----------------------------------------------------------------------------
-- octippro
-----------------------------------------------------------------------------

CREATE SEQUENCE "octippro_seq";


CREATE TABLE "octippro"
(
  "codtippro" VARCHAR(4)  NOT NULL,
  "destippro" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octippro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octippro" IS '';


-----------------------------------------------------------------------------
-- octipret
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipret_seq";


CREATE TABLE "octipret"
(
  "codtip" VARCHAR(3)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "codcon" VARCHAR(32)  NOT NULL,
  "basimp" NUMERIC(14,2),
  "porret" NUMERIC(14,2),
  "unitri" NUMERIC(14,2),
  "factor" NUMERIC(14,2),
  "porsus" NUMERIC(14,2),
  "stamon" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('octipret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipret" IS '';


-----------------------------------------------------------------------------
-- octipsol
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipsol_seq";


CREATE TABLE "octipsol"
(
  "codsol" VARCHAR(4)  NOT NULL,
  "dessol" VARCHAR(250)  NOT NULL,
  "tipsol" VARCHAR(1),
  "maxdia" VARCHAR(4),
  "stasol" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('octipsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipsol" IS '';


-----------------------------------------------------------------------------
-- octipste
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipste_seq";


CREATE TABLE "octipste"
(
  "codste" VARCHAR(4)  NOT NULL,
  "desste" VARCHAR(250)  NOT NULL,
  "tipste" VARCHAR(1),
  "staste" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('octipste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipste" IS '';


-----------------------------------------------------------------------------
-- octipval
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipval_seq";


CREATE TABLE "octipval"
(
  "codtipval" VARCHAR(2)  NOT NULL,
  "destipval" VARCHAR(250)  NOT NULL,
  "nomabr" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('octipval_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipval" IS '';


-----------------------------------------------------------------------------
-- ocunidad
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocunidad_seq";


CREATE TABLE "ocunidad"
(
  "coduni" VARCHAR(4)  NOT NULL,
  "desuni" VARCHAR(250)  NOT NULL,
  "abruni" VARCHAR(4),
  "stauni" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocunidad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocunidad" IS '';


-----------------------------------------------------------------------------
-- octipequ
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipequ_seq";


CREATE TABLE "octipequ"
(
  "codtipequ" VARCHAR(3)  NOT NULL,
  "destipequ" VARCHAR(500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipequ_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipequ" IS '';


-----------------------------------------------------------------------------
-- octipper
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipper_seq";


CREATE TABLE "octipper"
(
  "codtipper" VARCHAR(3)  NOT NULL,
  "destipper" VARCHAR(500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipper" IS '';


-----------------------------------------------------------------------------
-- octipins
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipins_seq";


CREATE TABLE "octipins"
(
  "codtipins" VARCHAR(3)  NOT NULL,
  "destipins" VARCHAR(500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipins_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipins" IS '';


-----------------------------------------------------------------------------
-- octippar
-----------------------------------------------------------------------------

CREATE SEQUENCE "octippar_seq";


CREATE TABLE "octippar"
(
  "codtippar" VARCHAR(3)  NOT NULL,
  "destippar" VARCHAR(500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octippar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octippar" IS '';


-----------------------------------------------------------------------------
-- octiplic
-----------------------------------------------------------------------------

CREATE SEQUENCE "octiplic_seq";


CREATE TABLE "octiplic"
(
  "codtiplic" VARCHAR(3)  NOT NULL,
  "destiplic" VARCHAR(500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octiplic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octiplic" IS '';


-----------------------------------------------------------------------------
-- octipadj
-----------------------------------------------------------------------------

CREATE SEQUENCE "octipadj_seq";


CREATE TABLE "octipadj"
(
  "codtipadj" VARCHAR(3)  NOT NULL,
  "destipadj" VARCHAR(500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('octipadj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "octipadj" IS '';


-----------------------------------------------------------------------------
-- occlacomp
-----------------------------------------------------------------------------

CREATE SEQUENCE "occlacomp_seq";


CREATE TABLE "occlacomp"
(
  "codclacomp" VARCHAR(5)  NOT NULL,
  "desclacomp" VARCHAR(1000)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('occlacomp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "occlacomp" IS '';


-----------------------------------------------------------------------------
-- ocreglic
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocreglic_seq";


CREATE TABLE "ocreglic"
(
  "codlic" VARCHAR(32)  NOT NULL,
  "codtiplic" VARCHAR(3)  NOT NULL,
  "deslic" VARCHAR(1000)  NOT NULL,
  "sitact" VARCHAR(1000),
  "ente" VARCHAR(1000),
  "fecreg" DATE  NOT NULL,
  "fecedi" DATE,
  "codobr" VARCHAR(32)  NOT NULL,
  "fecdisdes" DATE  NOT NULL,
  "fecdishas" DATE  NOT NULL,
  "costo" NUMERIC(14,2)  NOT NULL,
  "forpag" VARCHAR(1000),
  "decretos" VARCHAR(1000),
  "dirret" VARCHAR(1000),
  "percontac" VARCHAR(1000),
  "horaret" VARCHAR(1000),
  "periodico" VARCHAR(1000),
  "fecpub" DATE,
  "pagina" VARCHAR(3),
  "cuerpo" VARCHAR(1000),
  "mes" VARCHAR(1000),
  "codpaiefec" VARCHAR(4),
  "codpairecep" VARCHAR(4),
  "codfin" VARCHAR(4),
  "fecofer" DATE,
  "horaofer" VARCHAR(1000),
  "dirofer" VARCHAR(1000),
  "percontacofer" VARCHAR(1000),
  "codclacomp" VARCHAR(5),
  "observaciones" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocreglic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocreglic" IS '';


-----------------------------------------------------------------------------
-- oclichis
-----------------------------------------------------------------------------

CREATE SEQUENCE "oclichis_seq";


CREATE TABLE "oclichis"
(
  "codlic" VARCHAR(32)  NOT NULL,
  "histproc" VARCHAR(1000),
  "periodico" VARCHAR(1000),
  "fecpub" DATE,
  "pagina" VARCHAR(3),
  "cuerpo" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('oclichis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "oclichis" IS '';


-----------------------------------------------------------------------------
-- ocemppar
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocemppar_seq";


CREATE TABLE "ocemppar"
(
  "codobr" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "fecins" DATE,
  "precal" VARCHAR(1),
  "montot" NUMERIC(14,2)  NOT NULL,
  "observaciones" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocemppar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocemppar" IS '';


-----------------------------------------------------------------------------
-- ocoferpre
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocoferpre_seq";


CREATE TABLE "ocoferpre"
(
  "codobr" VARCHAR(32)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "codpar" VARCHAR(32)  NOT NULL,
  "cant" NUMERIC(14,2)  NOT NULL,
  "precio" NUMERIC(14,2)  NOT NULL,
  "montot" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocoferpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocoferpre" IS '';


-----------------------------------------------------------------------------
-- ocadjobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocadjobr_seq";


CREATE TABLE "ocadjobr"
(
  "codadj" VARCHAR(8)  NOT NULL,
  "tipadj" VARCHAR(3)  NOT NULL,
  "fecadj" DATE,
  "codobr" VARCHAR(32)  NOT NULL,
  "fecinipub" DATE,
  "fecfinpub" DATE,
  "fecbaseini" DATE,
  "fecbasefin" DATE,
  "fecpreofini" DATE,
  "fecpreoffin" DATE,
  "fecanaofini" DATE,
  "fecanaoffin" DATE,
  "codprogan" VARCHAR(15),
  "fecgan" DATE,
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocadjobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocadjobr" IS '';


-----------------------------------------------------------------------------
-- ocperval
-----------------------------------------------------------------------------

CREATE SEQUENCE "ocperval_seq";


CREATE TABLE "ocperval"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "cedins" VARCHAR(15),
  "cedtec" VARCHAR(15),
  "cedfis" VARCHAR(15),
  "cedres" VARCHAR(15),
  "cedtop" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocperval_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocperval" IS '';


-----------------------------------------------------------------------------
-- occiudad
-----------------------------------------------------------------------------

CREATE SEQUENCE "occiudad_seq";


CREATE TABLE "occiudad"
(
  "codpai" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codciu" VARCHAR(4)  NOT NULL,
  "nomciu" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('occiudad_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "unique_occiudad_codciu" UNIQUE ("codpai","codedo","codciu")
);

COMMENT ON TABLE "occiudad" IS '';


COMMENT ON COLUMN "occiudad"."id" IS 'Identificador Único del registro';

ALTER TABLE "fordefegrgen" ALTER forpar TYPE character varying(20);
        
ALTER TABLE "fordefegrgen" ALTER codpariva TYPE character varying(32);
        
ALTER TABLE "fordeforgpub" ALTER codorg TYPE character varying(5);
        
ALTER TABLE "fordeforgpub" ALTER ubiorg TYPE character varying(100);
        
ALTER TABLE "fordeforgpub" ALTER tiporg TYPE character varying(100);
        
ALTER TABLE "fordefpry" ADD "numempfem" NUMERIC(4,0);
        
ALTER TABLE "fordefpry" ADD "numempmas" NUMERIC(4,0);
        
-----------------------------------------------------------------------------
-- foringdisfuefin
-----------------------------------------------------------------------------

CREATE SEQUENCE "foringdisfuefin_seq";


CREATE TABLE "foringdisfuefin"
(
  "codparing" VARCHAR(32)  NOT NULL,
  "codfin" VARCHAR(4)  NOT NULL,
  "montoing" NUMERIC(20,2),
  "codcat" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('foringdisfuefin_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "foringdisfuefin" IS '';


-----------------------------------------------------------------------------
-- forotrcrepre
-----------------------------------------------------------------------------

CREATE SEQUENCE "forotrcrepre_seq";


CREATE TABLE "forotrcrepre"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "monpre" NUMERIC(14,2)  NOT NULL,
  "codtip" VARCHAR(4)  NOT NULL,
  "observ" VARCHAR(250),
  "codfin" VARCHAR(4),
  "codpre" VARCHAR(4),
  "nomparegr" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('forotrcrepre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forotrcrepre" IS '';


COMMENT ON COLUMN "forotrcrepre"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forperotrcre
-----------------------------------------------------------------------------

CREATE SEQUENCE "forperotrcre_seq";


CREATE TABLE "forperotrcre"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monper" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('forperotrcre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forperotrcre" IS '';


-----------------------------------------------------------------------------
-- forotrdistra
-----------------------------------------------------------------------------

CREATE SEQUENCE "forotrdistra_seq";


CREATE TABLE "forotrdistra"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "codorg" VARCHAR(4)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('forotrdistra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forotrdistra" IS '';


COMMENT ON COLUMN "forotrdistra"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forfinotrcre
-----------------------------------------------------------------------------

CREATE SEQUENCE "forfinotrcre_seq";


CREATE TABLE "forfinotrcre"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "codparing" VARCHAR(32)  NOT NULL,
  "monfin" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forfinotrcre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forfinotrcre" IS '';


COMMENT ON COLUMN "forfinotrcre"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forpreobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "forpreobr_seq";


CREATE TABLE "forpreobr"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codobr" VARCHAR(32)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "monpre" NUMERIC(14,2)  NOT NULL,
  "codtip" VARCHAR(4)  NOT NULL,
  "observ" VARCHAR(250),
  "codfin" VARCHAR(4),
  "funcionario" VARCHAR(50),
  "fecini" DATE,
  "fecfin" DATE,
  "situacion" VARCHAR(1),
  "comproanoant" NUMERIC(14,2),
  "comprovig" NUMERIC(14,2),
  "ejecanoant" NUMERIC(14,2),
  "ejecanovig" NUMERIC(14,2),
  "estanopost" NUMERIC(14,2),
  "nomparegr" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('forpreobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forpreobr" IS '';


COMMENT ON COLUMN "forpreobr"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forperobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "forperobr_seq";


CREATE TABLE "forperobr"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codobr" VARCHAR(32)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monper" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('forperobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forperobr" IS '';


COMMENT ON COLUMN "forperobr"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forobrdistra
-----------------------------------------------------------------------------

CREATE SEQUENCE "forobrdistra_seq";


CREATE TABLE "forobrdistra"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codobr" VARCHAR(32)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "codorg" VARCHAR(4)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('forobrdistra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forobrdistra" IS '';


COMMENT ON COLUMN "forobrdistra"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forfinobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "forfinobr_seq";


CREATE TABLE "forfinobr"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codobr" VARCHAR(32)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "codparing" VARCHAR(32)  NOT NULL,
  "monfin" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forfinobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forfinobr" IS '';


COMMENT ON COLUMN "forfinobr"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- fordefact
-----------------------------------------------------------------------------

CREATE SEQUENCE "fordefact_seq";


CREATE TABLE "fordefact"
(
  "codact" VARCHAR(5)  NOT NULL,
  "desact" VARCHAR(1000)  NOT NULL,
  "nomabr" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fordefact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fordefact" IS '';


COMMENT ON COLUMN "fordefact"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- fordefunieje
-----------------------------------------------------------------------------

CREATE SEQUENCE "fordefunieje_seq";


CREATE TABLE "fordefunieje"
(
  "coduni" VARCHAR(3)  NOT NULL,
  "nomuni" VARCHAR(250)  NOT NULL,
  "codemp" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('fordefunieje_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fordefunieje" IS '';


COMMENT ON COLUMN "fordefunieje"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- fordefmet
-----------------------------------------------------------------------------

CREATE SEQUENCE "fordefmet_seq";


CREATE TABLE "fordefmet"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "desmet" VARCHAR(1000),
  "nomabr" VARCHAR(50),
  "codemp" VARCHAR(16),
  "cantidad" NUMERIC(14,2),
  "indpro" VARCHAR(250),
  "invfun" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fordefmet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fordefmet" IS '';


COMMENT ON COLUMN "fordefmet"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forasopromet
-----------------------------------------------------------------------------

CREATE SEQUENCE "forasopromet_seq";


CREATE TABLE "forasopromet"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "ubigeo" VARCHAR(100),
  "indges" VARCHAR(100),
  "calind" VARCHAR(100),
  "frelec" VARCHAR(100),
  "canpro" NUMERIC(14,2),
  "codemp" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('forasopromet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forasopromet" IS '';


COMMENT ON COLUMN "forasopromet"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- formetdisper
-----------------------------------------------------------------------------

CREATE SEQUENCE "formetdisper_seq";


CREATE TABLE "formetdisper"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "permet" VARCHAR(2)  NOT NULL,
  "canmet" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('formetdisper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "formetdisper" IS '';


COMMENT ON COLUMN "formetdisper"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- fordisperpro
-----------------------------------------------------------------------------

CREATE SEQUENCE "fordisperpro_seq";


CREATE TABLE "fordisperpro"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "canper" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fordisperpro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fordisperpro" IS '';


COMMENT ON COLUMN "fordisperpro"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forasounicat
-----------------------------------------------------------------------------

CREATE SEQUENCE "forasounicat_seq";


CREATE TABLE "forasounicat"
(
  "codcat" VARCHAR(20)  NOT NULL,
  "coduni" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forasounicat_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forasounicat" IS '';


COMMENT ON COLUMN "forasounicat"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forasoproobj
-----------------------------------------------------------------------------

CREATE SEQUENCE "forasoproobj_seq";


CREATE TABLE "forasoproobj"
(
  "codpro" VARCHAR(4)  NOT NULL,
  "codcat" VARCHAR(16)  NOT NULL,
  "codobj" VARCHAR(5)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forasoproobj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forasoproobj" IS '';


COMMENT ON COLUMN "forasoproobj"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- fordefproble
-----------------------------------------------------------------------------

CREATE SEQUENCE "fordefproble_seq";


CREATE TABLE "fordefproble"
(
  "codpro" VARCHAR(4)  NOT NULL,
  "nompro" VARCHAR(4000),
  "progra" VARCHAR(4000),
  "plaeco" VARCHAR(4000),
  "objest" VARCHAR(4000),
  "plagob" VARCHAR(4000),
  "id" INTEGER  NOT NULL DEFAULT nextval('fordefproble_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fordefproble" IS '';


COMMENT ON COLUMN "fordefproble"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forasometobj
-----------------------------------------------------------------------------

CREATE SEQUENCE "forasometobj_seq";


CREATE TABLE "forasometobj"
(
  "codobj" VARCHAR(5)  NOT NULL,
  "codmet" VARCHAR(5)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forasometobj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forasometobj" IS '';


COMMENT ON COLUMN "forasometobj"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forasometcre
-----------------------------------------------------------------------------

CREATE SEQUENCE "forasometcre_seq";


CREATE TABLE "forasometcre"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "codmet" VARCHAR(5)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forasometcre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forasometcre" IS '';


COMMENT ON COLUMN "forasometcre"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forasoactpro
-----------------------------------------------------------------------------

CREATE SEQUENCE "forasoactpro_seq";


CREATE TABLE "forasoactpro"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forasoactpro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forasoactpro" IS '';


COMMENT ON COLUMN "forasoactpro"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forestcos
-----------------------------------------------------------------------------

CREATE SEQUENCE "forestcos_seq";


CREATE TABLE "forestcos"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codpar" VARCHAR(32),
  "canuni" NUMERIC(14,2),
  "canart" NUMERIC(14,2),
  "monart" NUMERIC(14,2),
  "totpre" NUMERIC(14,2),
  "codfin" VARCHAR(32),
  "codtip" VARCHAR(4),
  "observ" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('forestcos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forestcos" IS '';


COMMENT ON COLUMN "forestcos"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forestdisper
-----------------------------------------------------------------------------

CREATE SEQUENCE "forestdisper_seq";


CREATE TABLE "forestdisper"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "canper" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('forestdisper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forestdisper" IS '';


COMMENT ON COLUMN "forestdisper"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forestfuefin
-----------------------------------------------------------------------------

CREATE SEQUENCE "forestfuefin_seq";


CREATE TABLE "forestfuefin"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codparing" VARCHAR(32)  NOT NULL,
  "monfin" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('forestfuefin_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forestfuefin" IS '';


COMMENT ON COLUMN "forestfuefin"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- foringdefniv
-----------------------------------------------------------------------------

CREATE SEQUENCE "foringdefniv_seq";


CREATE TABLE "foringdefniv"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "loncod" NUMERIC(2)  NOT NULL,
  "rupcat" NUMERIC(2)  NOT NULL,
  "ruppar" NUMERIC(2)  NOT NULL,
  "nivdis" NUMERIC(2)  NOT NULL,
  "forpre" VARCHAR(32)  NOT NULL,
  "asiper" VARCHAR(1)  NOT NULL,
  "numper" NUMERIC(2)  NOT NULL,
  "peract" VARCHAR(2)  NOT NULL,
  "fecper" DATE,
  "fecini" DATE,
  "feccie" DATE,
  "etadef" VARCHAR(1),
  "staprc" VARCHAR(1),
  "caraep" VARCHAR(8),
  "coraep" VARCHAR(8),
  "nivobr" NUMERIC(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('foringdefniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "foringdefniv" IS '';


COMMENT ON COLUMN "foringdefniv"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- foringniveles
-----------------------------------------------------------------------------

CREATE SEQUENCE "foringniveles_seq";


CREATE TABLE "foringniveles"
(
  "catpar" VARCHAR(1)  NOT NULL,
  "consec" NUMERIC(2)  NOT NULL,
  "nomabr" VARCHAR(10)  NOT NULL,
  "nomext" VARCHAR(50)  NOT NULL,
  "lonniv" NUMERIC(2),
  "staniv" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('foringniveles_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "foringniveles" IS '';


COMMENT ON COLUMN "foringniveles"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- foringpereje
-----------------------------------------------------------------------------

CREATE SEQUENCE "foringpereje_seq";


CREATE TABLE "foringpereje"
(
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "fechas" DATE  NOT NULL,
  "cerrado" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('foringpereje_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "foringpereje" IS '';


COMMENT ON COLUMN "foringpereje"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forpereje
-----------------------------------------------------------------------------

CREATE SEQUENCE "forpereje_seq";


CREATE TABLE "forpereje"
(
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "fechas" DATE  NOT NULL,
  "cerrado" VARCHAR(1),
  "estper" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('forpereje_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forpereje" IS '';


COMMENT ON COLUMN "forpereje"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forregart
-----------------------------------------------------------------------------

CREATE SEQUENCE "forregart_seq";


CREATE TABLE "forregart"
(
  "codart" VARCHAR(20)  NOT NULL,
  "desart" VARCHAR(1500)  NOT NULL,
  "codcta" VARCHAR(32),
  "codpar" VARCHAR(16),
  "ramart" VARCHAR(6),
  "cosult" NUMERIC(14,2),
  "cospro" NUMERIC(14,2),
  "exitot" NUMERIC(14,2),
  "unimed" VARCHAR(15),
  "unialt" VARCHAR(15),
  "relart" VARCHAR(25),
  "fecult" DATE,
  "invini" NUMERIC(14,2),
  "codmar" VARCHAR(6),
  "codref" VARCHAR(15),
  "costot" NUMERIC(14,2),
  "sigecof" VARCHAR(20),
  "codclaart" NUMERIC(4),
  "lotuni" VARCHAR(1),
  "ctavta" VARCHAR(32),
  "ctacos" VARCHAR(32),
  "ctapro" VARCHAR(32),
  "preart" VARCHAR(50),
  "distot" NUMERIC(14,2),
  "tipo" VARCHAR(1),
  "tip0" VARCHAR(1),
  "coding" VARCHAR(32),
  "mercon" VARCHAR(1),
  "codartsnc" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('forregart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forregart" IS '';


COMMENT ON COLUMN "forregart"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- fordefobr
-----------------------------------------------------------------------------

CREATE SEQUENCE "fordefobr_seq";


CREATE TABLE "fordefobr"
(
  "codobr" VARCHAR(5)  NOT NULL,
  "nomobr" VARCHAR(1000)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "obsobr" VARCHAR(4000),
  "id" INTEGER  NOT NULL DEFAULT nextval('fordefobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fordefobr" IS '';


COMMENT ON COLUMN "fordefobr"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- formetotrcre
-----------------------------------------------------------------------------

CREATE SEQUENCE "formetotrcre_seq";


CREATE TABLE "formetotrcre"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "canact" NUMERIC(14,2)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "monpre" NUMERIC(14,2)  NOT NULL,
  "codorg" VARCHAR(4),
  "codtip" VARCHAR(4)  NOT NULL,
  "observ" VARCHAR(250),
  "codfin" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('formetotrcre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "formetotrcre" IS '';


COMMENT ON COLUMN "formetotrcre"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- formetperotr
-----------------------------------------------------------------------------

CREATE SEQUENCE "formetperotr_seq";


CREATE TABLE "formetperotr"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monper" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('formetperotr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "formetperotr" IS '';


COMMENT ON COLUMN "formetperotr"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- formetdistra
-----------------------------------------------------------------------------

CREATE SEQUENCE "formetdistra_seq";


CREATE TABLE "formetdistra"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "codorg" VARCHAR(4)  NOT NULL,
  "monto" NUMERIC(32,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('formetdistra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "formetdistra" IS '';


COMMENT ON COLUMN "formetdistra"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- formetfinotr
-----------------------------------------------------------------------------

CREATE SEQUENCE "formetfinotr_seq";


CREATE TABLE "formetfinotr"
(
  "codmet" VARCHAR(5)  NOT NULL,
  "codpro" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "codparegr" VARCHAR(32)  NOT NULL,
  "codparing" VARCHAR(32)  NOT NULL,
  "monfin" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('formetfinotr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "formetfinotr" IS '';


COMMENT ON COLUMN "formetfinotr"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forconcar
-----------------------------------------------------------------------------

CREATE SEQUENCE "forconcar_seq";


CREATE TABLE "forconcar"
(
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('forconcar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forconcar" IS '';


COMMENT ON COLUMN "forconcar"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forcormun
-----------------------------------------------------------------------------

CREATE SEQUENCE "forcormun_seq";


CREATE TABLE "forcormun"
(
  "codest" VARCHAR(5)  NOT NULL,
  "cormun" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('forcormun_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forcormun" IS '';


COMMENT ON COLUMN "forcormun"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forcorpar
-----------------------------------------------------------------------------

CREATE SEQUENCE "forcorpar_seq";


CREATE TABLE "forcorpar"
(
  "codest" VARCHAR(5)  NOT NULL,
  "codmun" VARCHAR(5)  NOT NULL,
  "corpar" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('forcorpar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forcorpar" IS '';


COMMENT ON COLUMN "forcorpar"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forcorsubobj
-----------------------------------------------------------------------------

CREATE SEQUENCE "forcorsubobj_seq";


CREATE TABLE "forcorsubobj"
(
  "codequ" VARCHAR(2)  NOT NULL,
  "corsubobj" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('forcorsubobj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forcorsubobj" IS '';


COMMENT ON COLUMN "forcorsubobj"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forcorsubsec
-----------------------------------------------------------------------------

CREATE SEQUENCE "forcorsubsec_seq";


CREATE TABLE "forcorsubsec"
(
  "codsec" VARCHAR(4)  NOT NULL,
  "corsubsec" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('forcorsubsec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forcorsubsec" IS '';


COMMENT ON COLUMN "forcorsubsec"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- forcorsubsubobj
-----------------------------------------------------------------------------

CREATE SEQUENCE "forcorsubsubobj_seq";


CREATE TABLE "forcorsubsubobj"
(
  "codequ" VARCHAR(2)  NOT NULL,
  "codsubobj" VARCHAR(3)  NOT NULL,
  "corsubsubobj" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('forcorsubsubobj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "forcorsubsubobj" IS '';


COMMENT ON COLUMN "forcorsubsubobj"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- fordismonprepryaccmetuea
-----------------------------------------------------------------------------

CREATE SEQUENCE "fordismonprepryaccmetuea_seq";


CREATE TABLE "fordismonprepryaccmetuea"
(
  "codpro" VARCHAR(20)  NOT NULL,
  "codaccesp" VARCHAR(20)  NOT NULL,
  "codmet" VARCHAR(5)  NOT NULL,
  "codact" VARCHAR(5)  NOT NULL,
  "codpre" VARCHAR(50)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monper" NUMERIC(20,2),
  "codpar" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('fordismonprepryaccmetuea_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fordismonprepryaccmetuea" IS '';


COMMENT ON COLUMN "fordismonprepryaccmetuea"."id" IS 'Identificador Único del registro';

ALTER TABLE "bndefins" ADD "coractmue" NUMERIC(8);
        
ALTER TABLE "bndefins" ADD "coractinm" NUMERIC(8);
        
ALTER TABLE "bndismue" ALTER tipdismue TYPE character varying(50);
        
ALTER TABLE "bndismue" ADD "logusu" VARCHAR(50);
        
ALTER TABLE "bnreginm" ADD "numreg" VARCHAR(20);
        
ALTER TABLE "bnreginm" ADD "numfol" VARCHAR(20);
        
ALTER TABLE "bnreginm" ADD "fecreginm" DATE;
        
ALTER TABLE "bnreginm" ADD "ofireg" VARCHAR(50);
        
ALTER TABLE "bnreginm" ADD "protocolo" VARCHAR(20);
        
ALTER TABLE "bnreginm" ADD "tomo" VARCHAR(20);
        
ALTER TABLE "bnreginm" ADD "trimestre" VARCHAR(20);
        
ALTER TABLE "bnreginm" ADD "numord" VARCHAR(8);
        
ALTER TABLE "bnregmue" ALTER codresuso TYPE character varying(30);
        
ALTER TABLE "bnregmue" ALTER codrespat TYPE character varying(30);
        
ALTER TABLE "bnregmue" ADD "tippro" VARCHAR(4);
        
ALTER TABLE "bnregmue" ADD "logusu" VARCHAR(50);
        
ALTER TABLE "bnregmue" ADD "numord" VARCHAR(8);
        
ALTER TABLE "bnregmue" ADD "codubiadm" VARCHAR(30);
        
ALTER TABLE "bnseginm" ALTER nroseginm TYPE character varying(6);
        
ALTER TABLE "bnsegmue" ALTER nrosegmue TYPE character varying(6);
        
ALTER TABLE "bnubica" ADD "cedemp" VARCHAR(10);
        
ALTER TABLE "bnubica" ADD "nomemp" VARCHAR(250);
        
ALTER TABLE "bnubica" ADD "nomcar" VARCHAR(250);
        
ALTER TABLE "bnubica" ADD "nomjef" VARCHAR(250);
        
ALTER TABLE "bncobsegmue" ALTER nrosegmue TYPE character varying(6);
        
ALTER TABLE "bncobseginm" ALTER nrosegmue TYPE character varying(6);
        
ALTER TABLE "opbenefi" ALTER telben TYPE character varying(20);
        
ALTER TABLE "opdefemp" ADD "ordcre" VARCHAR(4);
        
ALTER TABLE "opdefemp" ADD "ordsolpag" VARCHAR(4);
        
ALTER TABLE "opdefemp" ADD "monche" NUMERIC(14,2);
        
ALTER TABLE "opdetaut" ADD "refsal" VARCHAR(1000);
        
ALTER TABLE "opdetfac" ADD "nomrep" VARCHAR(50);
        
ALTER TABLE "opdetord" ADD "refsal" VARCHAR(1000);
        
ALTER TABLE "opdetord" ADD "reffon" VARCHAR(1000);
        
ALTER TABLE "opfactur" ADD "basirs" NUMERIC(18,2);
        
ALTER TABLE "opfactur" ADD "porirs" NUMERIC(18,2);
        
ALTER TABLE "opfactur" ADD "monirs" NUMERIC(18,2);
        
ALTER TABLE "opfactur" ADD "codirs" VARCHAR(50);
        
ALTER TABLE "opordpag" ALTER desord TYPE character varying(1000);
        
ALTER TABLE "opordpag" ADD "motrecord" VARCHAR(500);
        
ALTER TABLE "opordpag" ADD "motrectes" VARCHAR(500);
        
ALTER TABLE "opordpag" ADD "aprorddir" VARCHAR(1);
        
ALTER TABLE "opordpag" ADD "codcajchi" VARCHAR(3);
        
ALTER TABLE "opordpag" ADD "numcta" VARCHAR(20);
        
ALTER TABLE "opordpag" ADD "tipdoc" VARCHAR(4);
        
ALTER TABLE "opordpag" ADD "loguse" VARCHAR(50);
        
ALTER TABLE "opordpag" ADD "codfonant" VARCHAR(3);
        
ALTER TABLE "optipret" ADD "mbasmi" NUMERIC(14,2);
        
ALTER TABLE "tscheemi" ADD "numcomegr" VARCHAR(8);
        
ALTER TABLE "tscheemi" ADD "motdev" VARCHAR(100);
        
ALTER TABLE "tscheemi" ADD "fecdev" DATE;
        
ALTER TABLE "tsdefban" ADD "salmin" NUMERIC(20,2);
        
ALTER TABLE "tsdefban" ADD "nomrep" VARCHAR(50);
        
ALTER TABLE "tsmovban" ALTER desban TYPE character varying(250);
        
ALTER TABLE "tsmovlib" ADD "loguse" VARCHAR(50);
        
ALTER TABLE "tsmovlib" ADD "cedrif" VARCHAR(15);
        
ALTER TABLE "tspararc" ADD "digsigp" INTEGER;
        
ALTER TABLE "tspararc" ADD "digsign" INTEGER;
        
ALTER TABLE "tspararc" ADD "forfec" VARCHAR(10);
        
ALTER TABLE "tspararc" ADD "valdefp" VARCHAR(4);
        
ALTER TABLE "tspararc" ADD "valdefn" VARCHAR(4);
        
ALTER TABLE "tspararc" ADD "valdefd" VARCHAR(250);
        
ALTER TABLE "tssalcaj" ADD "codcaj" VARCHAR(3);
        
-----------------------------------------------------------------------------
-- tscomegrmes
-----------------------------------------------------------------------------

CREATE SEQUENCE "tscomegrmes_seq";


CREATE TABLE "tscomegrmes"
(
  "mes1" VARCHAR(2)  NOT NULL,
  "cormes1" INTEGER,
  "mes2" VARCHAR(2)  NOT NULL,
  "cormes2" INTEGER,
  "mes3" VARCHAR(2)  NOT NULL,
  "cormes3" INTEGER,
  "mes4" VARCHAR(2)  NOT NULL,
  "cormes4" INTEGER,
  "mes5" VARCHAR(2)  NOT NULL,
  "cormes5" INTEGER,
  "mes6" VARCHAR(2)  NOT NULL,
  "cormes6" INTEGER,
  "mes7" VARCHAR(2)  NOT NULL,
  "cormes7" INTEGER,
  "mes8" VARCHAR(2)  NOT NULL,
  "cormes8" INTEGER,
  "mes9" VARCHAR(2)  NOT NULL,
  "cormes9" INTEGER,
  "mes10" VARCHAR(2)  NOT NULL,
  "cormes10" INTEGER,
  "mes11" VARCHAR(2)  NOT NULL,
  "cormes11" INTEGER,
  "mes12" VARCHAR(2)  NOT NULL,
  "cormes12" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('tscomegrmes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tscomegrmes" IS '';


-----------------------------------------------------------------------------
-- tsdefcajchi
-----------------------------------------------------------------------------

CREATE SEQUENCE "tsdefcajchi_seq";


CREATE TABLE "tsdefcajchi"
(
  "codcaj" VARCHAR(3)  NOT NULL,
  "descaj" VARCHAR(250)  NOT NULL,
  "cedrif" VARCHAR(15)  NOT NULL,
  "codcat" VARCHAR(32)  NOT NULL,
  "numcue" VARCHAR(20)  NOT NULL,
  "codtip" VARCHAR(4)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "monape" NUMERIC(14,2),
  "porrep" NUMERIC(14,2),
  "numini" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdefcajchi_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "unique_tsdefcajchi_codcaj" UNIQUE ("codcaj")
);

COMMENT ON TABLE "tsdefcajchi" IS '';


COMMENT ON COLUMN "tsdefcajchi"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- opsolpag
-----------------------------------------------------------------------------

CREATE SEQUENCE "opsolpag_seq";


CREATE TABLE "opsolpag"
(
  "refsol" VARCHAR(8)  NOT NULL,
  "fecsol" DATE,
  "refcom" VARCHAR(8),
  "dessol" VARCHAR(1000),
  "monsol" NUMERIC(14,2),
  "stasol" VARCHAR(1),
  "cedrif" VARCHAR(15),
  "nomben" VARCHAR(1000),
  "numsolcre" VARCHAR(15),
  "numcre" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('opsolpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opsolpag" IS '';


COMMENT ON COLUMN "opsolpag"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- opdetsolpag
-----------------------------------------------------------------------------

CREATE SEQUENCE "opdetsolpag_seq";


CREATE TABLE "opdetsolpag"
(
  "refsol" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "reford" VARCHAR(8),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('opdetsolpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opdetsolpag" IS '';


COMMENT ON COLUMN "opdetsolpag"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- tscormestxt
-----------------------------------------------------------------------------

CREATE SEQUENCE "tscormestxt_seq";


CREATE TABLE "tscormestxt"
(
  "numcue" VARCHAR(20)  NOT NULL,
  "mes1" VARCHAR(2)  NOT NULL,
  "cormes1" INTEGER,
  "mes2" VARCHAR(2)  NOT NULL,
  "cormes2" INTEGER,
  "mes3" VARCHAR(2)  NOT NULL,
  "cormes3" INTEGER,
  "mes4" VARCHAR(2)  NOT NULL,
  "cormes4" INTEGER,
  "mes5" VARCHAR(2)  NOT NULL,
  "cormes5" INTEGER,
  "mes6" VARCHAR(2)  NOT NULL,
  "cormes6" INTEGER,
  "mes7" VARCHAR(2)  NOT NULL,
  "cormes7" INTEGER,
  "mes8" VARCHAR(2)  NOT NULL,
  "cormes8" INTEGER,
  "mes9" VARCHAR(2)  NOT NULL,
  "cormes9" INTEGER,
  "mes10" VARCHAR(2)  NOT NULL,
  "cormes10" INTEGER,
  "mes11" VARCHAR(2)  NOT NULL,
  "cormes11" INTEGER,
  "mes12" VARCHAR(2)  NOT NULL,
  "cormes12" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('tscormestxt_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tscormestxt" IS '';


-----------------------------------------------------------------------------
-- tsuniadm
-----------------------------------------------------------------------------

CREATE SEQUENCE "tsuniadm_seq";


CREATE TABLE "tsuniadm"
(
  "coduniadm" VARCHAR(30),
  "desuniadm" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsuniadm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsuniadm" IS '';


COMMENT ON COLUMN "tsuniadm"."coduniadm" IS 'Código Unidad Administradora';

COMMENT ON COLUMN "tsuniadm"."desuniadm" IS 'Descripcion Unidad Administradora';

COMMENT ON COLUMN "tsuniadm"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- tsdeffonant
-----------------------------------------------------------------------------

CREATE SEQUENCE "tsdeffonant_seq";


CREATE TABLE "tsdeffonant"
(
  "codfon" VARCHAR(3)  NOT NULL,
  "desfon" VARCHAR(250)  NOT NULL,
  "unieje" VARCHAR(15)  NOT NULL,
  "coduniadm" VARCHAR(30)  NOT NULL,
  "cedrif" VARCHAR(15)  NOT NULL,
  "codcat" VARCHAR(32)  NOT NULL,
  "numcue" VARCHAR(20)  NOT NULL,
  "tipmovsal" VARCHAR(4)  NOT NULL,
  "tipmovren" VARCHAR(4)  NOT NULL,
  "monmincon" NUMERIC(14,2),
  "monmaxcon" NUMERIC(14,2),
  "porrep" NUMERIC(14,2),
  "numini" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdeffonant_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "unique_tsdeffonant_codfon" UNIQUE ("codfon")
);

COMMENT ON TABLE "tsdeffonant" IS '';


COMMENT ON COLUMN "tsdeffonant"."codfon" IS 'Código del fondo de anticipo';

COMMENT ON COLUMN "tsdeffonant"."desfon" IS 'Descripcion del fondo de anticipo';

COMMENT ON COLUMN "tsdeffonant"."unieje" IS 'Unidad Ejecutora del fondo de anticipo';

COMMENT ON COLUMN "tsdeffonant"."coduniadm" IS 'Código de la unidad Administradora';

COMMENT ON COLUMN "tsdeffonant"."cedrif" IS 'Responsable de fonde de anticipo';

COMMENT ON COLUMN "tsdeffonant"."codcat" IS 'Código de la categoria programatica';

COMMENT ON COLUMN "tsdeffonant"."numcue" IS 'Numero de la cuenta de Bancaria';

COMMENT ON COLUMN "tsdeffonant"."tipmovsal" IS 'Tipo de Movimiento de Salida';

COMMENT ON COLUMN "tsdeffonant"."tipmovren" IS 'Tipo de movimiento de Rendición';

COMMENT ON COLUMN "tsdeffonant"."monmincon" IS 'Monto mínimo de Constitución (en U.T.)';

COMMENT ON COLUMN "tsdeffonant"."monmaxcon" IS 'Monto máximo de Constitución (en U.T.)';

COMMENT ON COLUMN "tsdeffonant"."porrep" IS 'Porcentaje de Reposición';

COMMENT ON COLUMN "tsdeffonant"."numini" IS 'Numero Incial';

COMMENT ON COLUMN "tsdeffonant"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- tsfonant
-----------------------------------------------------------------------------

CREATE SEQUENCE "tsfonant_seq";


CREATE TABLE "tsfonant"
(
  "reffon" VARCHAR(8)  NOT NULL,
  "fecfon" DATE  NOT NULL,
  "cedrif" VARCHAR(15),
  "desfon" VARCHAR(1000),
  "monfon" NUMERIC(14,2),
  "stafon" VARCHAR(1),
  "codfon" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsfonant_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsfonant" IS '';


COMMENT ON COLUMN "tsfonant"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- tsdetfon
-----------------------------------------------------------------------------

CREATE SEQUENCE "tsdetfon_seq";


CREATE TABLE "tsdetfon"
(
  "reffon" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codcat" VARCHAR(50)  NOT NULL,
  "monfon" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "totfon" NUMERIC(14,2),
  "stafon" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdetfon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdetfon" IS '';


COMMENT ON COLUMN "tsdetfon"."id" IS 'Identificador Único del registro';
