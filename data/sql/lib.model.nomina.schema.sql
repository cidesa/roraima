
ALTER TABLE "npadeint" ALTER observacion TYPE character varying(100);
        
ALTER TABLE "npasicaremp" ALTER codtipcat TYPE character varying(4);
        
ALTER TABLE "npasicaremp" ADD "codmotcamcar" VARCHAR(4);
        
ALTER TABLE "npasicaremp" ADD "codtie" VARCHAR(3);
        
ALTER TABLE "npasicaremp" ADD "juscam" VARCHAR(250);
        
ALTER TABLE "npasicaremp" ADD "codcen" VARCHAR(4);
        
ALTER TABLE "npasiconemp" ALTER nomemp TYPE character varying(100);
        
ALTER TABLE "npcargos" ADD "canmix" NUMERIC(6,0);
        
ALTER TABLE "npcargos" ADD "canphom" NUMERIC(6,0);
        
ALTER TABLE "npcargos" ADD "canpmuj" NUMERIC(6,0);
        
ALTER TABLE "npcargos" ADD "canvhom" NUMERIC(6,0);
        
ALTER TABLE "npcargos" ADD "canvmuj" NUMERIC(6,0);
        
ALTER TABLE "npcarpre" ADD "canhpre" NUMERIC(6);
        
ALTER TABLE "npcarpre" ADD "canmpre" NUMERIC(6);
        
ALTER TABLE "npcarpre" ADD "canhom" NUMERIC(6);
        
ALTER TABLE "npcarpre" ADD "canmuj" NUMERIC(6);
        
ALTER TABLE "npcarpre" ADD "canvac" NUMERIC(6);
        
ALTER TABLE "npcarpre" ADD "canhvac" NUMERIC(6);
        
ALTER TABLE "npcarpre" ADD "canmvac" NUMERIC(6);
        
ALTER TABLE "npcomocp" ALTER pascar TYPE character varying(3);
        
ALTER TABLE "npcomocp" ALTER gracar TYPE character varying(3);
        
ALTER TABLE "npdefgen" ADD "calesppres" VARCHAR(1);
        
ALTER TABLE "npdefgen" ADD "redondeo" VARCHAR(1) default '';
        
ALTER TABLE "npexplab" ADD "codniv" VARCHAR(32);
        
ALTER TABLE "npexplab" ADD "codnom" VARCHAR(3);
        
ALTER TABLE "npexplab" ADD "dedica" VARCHAR(100);
        
ALTER TABLE "npfalper" ADD "nrohoras" NUMERIC(14,2);
        
ALTER TABLE "npfalper" ADD "numctr" VARCHAR(8);
        
ALTER TABLE "npfalper" ADD "hordes" VARCHAR(10);
        
ALTER TABLE "npfalper" ADD "horhas" VARCHAR(10);
        
ALTER TABLE "npguarde" ADD "rifgua" VARCHAR(15);
        
ALTER TABLE "npguarde" ADD "ninsme" VARCHAR(30);
        
ALTER TABLE "npguarde" ADD "solmevig" BOOLEAN;
        
ALTER TABLE "nphisasicaremp" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "nphisasicaremp" ALTER nomemp TYPE character varying(100);
        
ALTER TABLE "nphisasicaremp" ALTER nomnom TYPE character varying(100);
        
ALTER TABLE "nphisasicaremp" ALTER unieje TYPE character varying(30);
        
ALTER TABLE "nphojint" ALTER lugnac TYPE character varying(30);
        
ALTER TABLE "nphojint" ALTER obsemp TYPE character varying(300);
        
ALTER TABLE "nphojint" ADD "numpuncue" VARCHAR(20);
        
ALTER TABLE "nphojint" ADD "fecinicon" DATE;
        
ALTER TABLE "nphojint" ADD "fecfincon" DATE;
        
ALTER TABLE "nphojint" ADD "obsembret" VARCHAR(1000);
        
ALTER TABLE "nphojint" ADD "codmot" VARCHAR(4);
        
ALTER TABLE "nphojint" ADD "fecmat" DATE;
        
ALTER TABLE "npimppresoc" ADD "aliadi" NUMERIC(14,2);
        
ALTER TABLE "npinfcur" ALTER nomtit TYPE character varying(40);
        
ALTER TABLE "npinfcur" ADD "fecini" DATE;
        
ALTER TABLE "npinfcur" ADD "fecfin" DATE;
        
ALTER TABLE "npinffam" ADD "carben" VARCHAR(1);
        
ALTER TABLE "npinffam" ADD "dissus" VARCHAR(1);
        
ALTER TABLE "npinffam" ADD "fecing" DATE;
        
ALTER TABLE "npinffam" ADD "docgua" VARCHAR(1);
        
ALTER TABLE "npmotfal" ADD "esremun" BOOLEAN;
        
ALTER TABLE "npnomesptipos" ADD "nomdiaadi" VARCHAR(1);
        
ALTER TABLE "nptipcon" ADD "condia" VARCHAR(1);
        
ALTER TABLE "npvacdefgen" ADD "codconadi" VARCHAR(3);
        
ALTER TABLE "npvacdefgen" ADD "vacant" VARCHAR(1);
        
ALTER TABLE "npvacsalidas" ADD "fecsalnom" DATE;
        
ALTER TABLE "npvacsalidas" ADD "fecreinom" DATE;
        
ALTER TABLE "npvacsalidas" ADD "sabvac" INTEGER;
        
ALTER TABLE "npvacsalidas" ADD "domvac" INTEGER;
        
ALTER TABLE "npvacsalidas" ADD "fervac" INTEGER;
        
ALTER TABLE "npprimashijos" ADD "consest" VARCHAR(1);
        
ALTER TABLE "npprimaprofes" ALTER grado TYPE character varying(4);
        
-----------------------------------------------------------------------------
-- npestemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "npestemp_seq";


CREATE TABLE "npestemp"
(
  "codestemp" VARCHAR(1)  NOT NULL,
  "desestemp" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npestemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npestemp" IS '';


-----------------------------------------------------------------------------
-- npdefubi
-----------------------------------------------------------------------------

CREATE SEQUENCE "npdefubi_seq";


CREATE TABLE "npdefubi"
(
  "codubi" VARCHAR(3)  NOT NULL,
  "desubi" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefubi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefubi" IS '';


-----------------------------------------------------------------------------
-- npfalperemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "npfalperemp_seq";


CREATE TABLE "npfalperemp"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "fecret" DATE  NOT NULL,
  "horas" NUMERIC(3),
  "codmot" VARCHAR(4),
  "observ" VARCHAR(1000),
  "feccon" DATE,
  "ivss" BOOLEAN,
  "id" INTEGER  NOT NULL DEFAULT nextval('npfalperemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npfalperemp" IS '';


-----------------------------------------------------------------------------
-- npconsuelaporet
-----------------------------------------------------------------------------

CREATE SEQUENCE "npconsuelaporet_seq";


CREATE TABLE "npconsuelaporet"
(
  "codtipapo" VARCHAR(4)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "tipo" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npconsuelaporet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconsuelaporet" IS '';


COMMENT ON COLUMN "npconsuelaporet"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npmotcamcar
-----------------------------------------------------------------------------

CREATE SEQUENCE "npmotcamcar_seq";


CREATE TABLE "npmotcamcar"
(
  "codmotcamcar" VARCHAR(4)  NOT NULL,
  "desmotcamcar" VARCHAR(1000)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npmotcamcar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmotcamcar" IS '';


COMMENT ON COLUMN "npmotcamcar"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npdocent
-----------------------------------------------------------------------------

CREATE SEQUENCE "npdocent_seq";


CREATE TABLE "npdocent"
(
  "coddoc" VARCHAR(3)  NOT NULL,
  "desdoc" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdocent_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdocent" IS '';


COMMENT ON COLUMN "npdocent"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npdocentporemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "npdocentporemp_seq";


CREATE TABLE "npdocentporemp"
(
  "codemp" VARCHAR(16),
  "coddoc" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdocentporemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdocentporemp" IS '';


COMMENT ON COLUMN "npdocentporemp"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- nptiempo
-----------------------------------------------------------------------------

CREATE SEQUENCE "nptiempo_seq";


CREATE TABLE "nptiempo"
(
  "codtie" VARCHAR(3),
  "destie" VARCHAR(100),
  "factor" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptiempo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptiempo" IS '';


COMMENT ON COLUMN "nptiempo"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npdefrepcon
-----------------------------------------------------------------------------

CREATE SEQUENCE "npdefrepcon_seq";


CREATE TABLE "npdefrepcon"
(
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefrepcon_seq'::regclass),
  "codrep" VARCHAR(3),
  "desrep" VARCHAR(1000),
  "numcol" INTEGER,
  "descol" VARCHAR(1000),
  "codcon" VARCHAR(3),
  "sumtot" VARCHAR(1),
  "sumval" VARCHAR(1),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefrepcon" IS '';


COMMENT ON COLUMN "npdefrepcon"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npdocemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "npdocemp_seq";


CREATE TABLE "npdocemp"
(
  "coddoc" VARCHAR(10)  NOT NULL,
  "desdoc" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdocemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdocemp" IS '';


COMMENT ON COLUMN "npdocemp"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npinfdoc
-----------------------------------------------------------------------------

CREATE SEQUENCE "npinfdoc_seq";


CREATE TABLE "npinfdoc"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "coddoc" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npinfdoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npinfdoc" IS '';


COMMENT ON COLUMN "npinfdoc"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npporhcm
-----------------------------------------------------------------------------

CREATE SEQUENCE "npporhcm_seq";


CREATE TABLE "npporhcm"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "tipcar" VARCHAR(1)  NOT NULL,
  "tippar" VARCHAR(3)  NOT NULL,
  "edades" NUMERIC(14,2),
  "edahas" NUMERIC(14,2),
  "porcub" NUMERIC(14,2),
  "dissus" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npporhcm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npporhcm" IS '';


COMMENT ON COLUMN "npporhcm"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npmotegr
-----------------------------------------------------------------------------

CREATE SEQUENCE "npmotegr_seq";


CREATE TABLE "npmotegr"
(
  "codmot" VARCHAR(4)  NOT NULL,
  "desmot" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npmotegr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmotegr" IS '';


COMMENT ON COLUMN "npmotegr"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npasiconpar
-----------------------------------------------------------------------------

CREATE SEQUENCE "npasiconpar_seq";


CREATE TABLE "npasiconpar"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codtipcar" VARCHAR(3)  NOT NULL,
  "gracar" VARCHAR(3),
  "codtip" VARCHAR(4),
  "codtipcat" VARCHAR(4),
  "codtie" VARCHAR(3),
  "codestemp" VARCHAR(1),
  "codcon" VARCHAR(3)  NOT NULL,
  "codpar" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiconpar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiconpar" IS '';


COMMENT ON COLUMN "npasiconpar"."codnom" IS 'Nómina';

COMMENT ON COLUMN "npasiconpar"."codtipcar" IS 'Tipo de Cargo';

COMMENT ON COLUMN "npasiconpar"."gracar" IS 'NivelEscala';

COMMENT ON COLUMN "npasiconpar"."codtip" IS 'Dedicación';

COMMENT ON COLUMN "npasiconpar"."codtipcat" IS 'Categoría';

COMMENT ON COLUMN "npasiconpar"."codtie" IS 'Condición';

COMMENT ON COLUMN "npasiconpar"."codestemp" IS 'Estatus';

COMMENT ON COLUMN "npasiconpar"."codcon" IS 'Concepto';

COMMENT ON COLUMN "npasiconpar"."codpar" IS 'Partida';

COMMENT ON COLUMN "npasiconpar"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npaumcar
-----------------------------------------------------------------------------

CREATE SEQUENCE "npaumcar_seq";


CREATE TABLE "npaumcar"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "cantidad" NUMERIC(14,2)  NOT NULL,
  "porcentaje" NUMERIC(14,2)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "suecar" NUMERIC(14,2)  NOT NULL,
  "fecaum" DATE  NOT NULL,
  "motaum" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npaumcar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npaumcar" IS '';


COMMENT ON COLUMN "npaumcar"."codnom" IS 'Nómina';

COMMENT ON COLUMN "npaumcar"."cantidad" IS 'Aumento por cantidad';

COMMENT ON COLUMN "npaumcar"."porcentaje" IS 'Aumento por Porcentaje';

COMMENT ON COLUMN "npaumcar"."codcar" IS 'Cargo';

COMMENT ON COLUMN "npaumcar"."suecar" IS 'Sueldo con Aumento';

COMMENT ON COLUMN "npaumcar"."fecaum" IS 'Fecha Aumento';

COMMENT ON COLUMN "npaumcar"."motaum" IS 'Motivo de Aumento';

COMMENT ON COLUMN "npaumcar"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npdefespclaudet
-----------------------------------------------------------------------------

CREATE SEQUENCE "npdefespclaudet_seq";


CREATE TABLE "npdefespclaudet"
(
  "codnom" VARCHAR(3),
  "descripclau" VARCHAR(250),
  "codpar" VARCHAR(32),
  "codret" VARCHAR(2),
  "totret" VARCHAR(1),
  "numdiaant" NUMERIC(14,2),
  "poranoant" VARCHAR(1),
  "apartirmes" INTEGER,
  "pormesant" VARCHAR(1),
  "tipsaldiaant" VARCHAR(2),
  "admpub" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefespclaudet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefespclaudet" IS '';


COMMENT ON COLUMN "npdefespclaudet"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npasicarcolemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "npasicarcolemp_seq";


CREATE TABLE "npasicarcolemp"
(
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "fecdes" DATE,
  "fechas" DATE,
  "descrip" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasicarcolemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasicarcolemp" IS '';


COMMENT ON COLUMN "npasicarcolemp"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npasiconcar
-----------------------------------------------------------------------------

CREATE SEQUENCE "npasiconcar_seq";


CREATE TABLE "npasiconcar"
(
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiconcar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiconcar" IS '';


COMMENT ON COLUMN "npasiconcar"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npcatnomemp
-----------------------------------------------------------------------------

CREATE SEQUENCE "npcatnomemp_seq";


CREATE TABLE "npcatnomemp"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcatnomemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcatnomemp" IS '';


COMMENT ON COLUMN "npcatnomemp"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npcatnomempcon
-----------------------------------------------------------------------------

CREATE SEQUENCE "npcatnomempcon_seq";


CREATE TABLE "npcatnomempcon"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcatnomempcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcatnomempcon" IS '';


COMMENT ON COLUMN "npcatnomempcon"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- npbonfinano
-----------------------------------------------------------------------------

CREATE SEQUENCE "npbonfinano_seq";


CREATE TABLE "npbonfinano"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "desde" NUMERIC(5,2)  NOT NULL,
  "hasta" NUMERIC(5,2)  NOT NULL,
  "dias" NUMERIC(5,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npbonfinano_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npbonfinano" IS '';


COMMENT ON COLUMN "npbonfinano"."id" IS 'Identificador Único del registro';
