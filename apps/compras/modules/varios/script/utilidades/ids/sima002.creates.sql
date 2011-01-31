SET SEARCH_PATH TO "SIMA004";


-----------------------------------------------------------------------------
-- inabonos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "inabonos" CASCADE;

DROP SEQUENCE IF EXISTS "inabonos_seq";

CREATE SEQUENCE "inabonos_seq";


CREATE TABLE "inabonos"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "numref" VARCHAR(10)  NOT NULL,
  "fecpag" DATE,
  "rifcon" VARCHAR(14),
  "monpag" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "monefe" NUMERIC(14,2),
  "fecrec" DATE,
  "despag" VARCHAR(100),
  "funpag" VARCHAR(100),
  "stapag" VARCHAR(2),
  "fueing" VARCHAR(2),
  "motanu" VARCHAR(250),
  "fecanu" DATE,
  "edopag" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('inabonos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inabonos" IS '';


-----------------------------------------------------------------------------
-- inajuoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "inajuoc" CASCADE;

DROP SEQUENCE IF EXISTS "inajuoc_seq";

CREATE SEQUENCE "inajuoc_seq";


CREATE TABLE "inajuoc"
(
  "ajuoc" VARCHAR(8)  NOT NULL,
  "ordcom" VARCHAR(8)  NOT NULL,
  "fecaju" DATE,
  "desaju" VARCHAR(100),
  "monaju" NUMERIC(14,2),
  "staaju" VARCHAR(1),
  "refaju" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('inajuoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inajuoc" IS '';


-----------------------------------------------------------------------------
-- inventario
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "inventario" CASCADE;

DROP SEQUENCE IF EXISTS "inventario_seq";

CREATE SEQUENCE "inventario_seq";


CREATE TABLE "inventario"
(
  "codart" VARCHAR(20)  NOT NULL,
  "descri" VARCHAR(100)  NOT NULL,
  "cospro" NUMERIC(14,2),
  "unimed" VARCHAR(15),
  "conteo1" NUMERIC(14,2) default 0,
  "conteo2" NUMERIC(14,2) default 0,
  "dife" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('inventario_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "inventario" IS '';


-----------------------------------------------------------------------------
-- migrar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "migrar" CASCADE;

DROP SEQUENCE IF EXISTS "migrar_seq";

CREATE SEQUENCE "migrar_seq";


CREATE TABLE "migrar"
(
  "codcta" VARCHAR(32),
  "saldo" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('migrar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "migrar" IS '';


-----------------------------------------------------------------------------
-- migrar2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "migrar2" CASCADE;

DROP SEQUENCE IF EXISTS "migrar2_seq";

CREATE SEQUENCE "migrar2_seq";


CREATE TABLE "migrar2"
(
  "codcta" VARCHAR(32),
  "saldo" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('migrar2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "migrar2" IS '';


-----------------------------------------------------------------------------
-- plannuevo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "plannuevo" CASCADE;

DROP SEQUENCE IF EXISTS "plannuevo_seq";

CREATE SEQUENCE "plannuevo_seq";


CREATE TABLE "plannuevo"
(
  "codold" VARCHAR(32),
  "nomold" VARCHAR(1000),
  "codnew" VARCHAR(32),
  "nomnew" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('plannuevo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "plannuevo" IS '';


-----------------------------------------------------------------------------
-- planunico
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "planunico" CASCADE;

DROP SEQUENCE IF EXISTS "planunico_seq";

CREATE SEQUENCE "planunico_seq";


CREATE TABLE "planunico"
(
  "codcta" VARCHAR(32),
  "nompre" VARCHAR(250)  NOT NULL,
  "codnew" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('planunico_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "planunico" IS '';


-----------------------------------------------------------------------------
-- reimpcau
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "reimpcau" CASCADE;

DROP SEQUENCE IF EXISTS "reimpcau_seq";

CREATE SEQUENCE "reimpcau_seq";


CREATE TABLE "reimpcau"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('reimpcau_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "reimpcau" IS '';


-----------------------------------------------------------------------------
-- reimpcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "reimpcom" CASCADE;

DROP SEQUENCE IF EXISTS "reimpcom_seq";

CREATE SEQUENCE "reimpcom_seq";


CREATE TABLE "reimpcom"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('reimpcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "reimpcom" IS '';


-----------------------------------------------------------------------------
-- reimppag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "reimppag" CASCADE;

DROP SEQUENCE IF EXISTS "reimppag_seq";

CREATE SEQUENCE "reimppag_seq";


CREATE TABLE "reimppag"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('reimppag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "reimppag" IS '';


-----------------------------------------------------------------------------
-- reimpprc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "reimpprc" CASCADE;

DROP SEQUENCE IF EXISTS "reimpprc_seq";

CREATE SEQUENCE "reimpprc_seq";


CREATE TABLE "reimpprc"
(
  "refprc" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('reimpprc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "reimpprc" IS '';


-----------------------------------------------------------------------------
-- bdcampos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bdcampos" CASCADE;

DROP SEQUENCE IF EXISTS "bdcampos_seq";

CREATE SEQUENCE "bdcampos_seq";


CREATE TABLE "bdcampos"
(
  "nomcamp1" VARCHAR(50),
  "nomcamp2" VARCHAR(50),
  "nomcamp3" VARCHAR(50),
  "nomcamp4" VARCHAR(50),
  "nomcamp5" VARCHAR(50),
  "nomcamp6" VARCHAR(50),
  "nomcamp7" VARCHAR(50),
  "nomcamp8" VARCHAR(50),
  "criterio" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('bdcampos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bdcampos" IS '';


-----------------------------------------------------------------------------
-- bdcriterio
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bdcriterio" CASCADE;

DROP SEQUENCE IF EXISTS "bdcriterio_seq";

CREATE SEQUENCE "bdcriterio_seq";


CREATE TABLE "bdcriterio"
(
  "criterio" VARCHAR(1000),
  "sql" VARCHAR(1000),
  "temporal" VARCHAR(20),
  "observacion" VARCHAR(250),
  "numero" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('bdcriterio_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bdcriterio" IS '';


-----------------------------------------------------------------------------
-- bdreporte
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bdreporte" CASCADE;

DROP SEQUENCE IF EXISTS "bdreporte_seq";

CREATE SEQUENCE "bdreporte_seq";


CREATE TABLE "bdreporte"
(
  "campo1" VARCHAR(1000),
  "campo2" VARCHAR(1000),
  "campo3" VARCHAR(1000),
  "campo4" VARCHAR(1000),
  "campo5" VARCHAR(1000),
  "campo6" VARCHAR(1000),
  "campo7" VARCHAR(1000),
  "campo8" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('bdreporte_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bdreporte" IS '';


-----------------------------------------------------------------------------
-- temp1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "temp1" CASCADE;

DROP SEQUENCE IF EXISTS "temp1_seq";

CREATE SEQUENCE "temp1_seq";


CREATE TABLE "temp1"
(
  "codcta" VARCHAR(32),
  "descta" VARCHAR(250)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "cargab" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('temp1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "temp1" IS '';


-----------------------------------------------------------------------------
-- temporal1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "temporal1" CASCADE;

DROP SEQUENCE IF EXISTS "temporal1_seq";

CREATE SEQUENCE "temporal1_seq";


CREATE TABLE "temporal1"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "nomemp" VARCHAR(250)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "fecasi" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('temporal1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "temporal1" IS '';


-----------------------------------------------------------------------------
-- npaccadm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npaccadm" CASCADE;

DROP SEQUENCE IF EXISTS "npaccadm_seq";

CREATE SEQUENCE "npaccadm_seq";


CREATE TABLE "npaccadm"
(
  "codaccadm" VARCHAR(4),
  "desaccadm" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npaccadm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npaccadm" IS '';


-----------------------------------------------------------------------------
-- npaccrac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npaccrac" CASCADE;

DROP SEQUENCE IF EXISTS "npaccrac_seq";

CREATE SEQUENCE "npaccrac_seq";


CREATE TABLE "npaccrac"
(
  "codaccadm" VARCHAR(4),
  "codemp" VARCHAR(16),
  "codrac" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npaccrac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npaccrac" IS '';


-----------------------------------------------------------------------------
-- npacumulacpt
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npacumulacpt" CASCADE;

DROP SEQUENCE IF EXISTS "npacumulacpt_seq";

CREATE SEQUENCE "npacumulacpt_seq";


CREATE TABLE "npacumulacpt"
(
  "codacu" VARCHAR(3),
  "nomacu" VARCHAR(250),
  "codcon" VARCHAR(3),
  "tipacu" VARCHAR(1),
  "factor" NUMERIC(10,5) default 1,
  "id" INTEGER  NOT NULL DEFAULT nextval('npacumulacpt_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npacumulacpt" IS '';


-----------------------------------------------------------------------------
-- npadeint
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npadeint" CASCADE;

DROP SEQUENCE IF EXISTS "npadeint_seq";

CREATE SEQUENCE "npadeint_seq";


CREATE TABLE "npadeint"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "fecade" DATE  NOT NULL,
  "monade" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npadeint_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npadeint" IS '';


-----------------------------------------------------------------------------
-- npantpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npantpre" CASCADE;

DROP SEQUENCE IF EXISTS "npantpre_seq";

CREATE SEQUENCE "npantpre_seq";


CREATE TABLE "npantpre"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "fecant" DATE  NOT NULL,
  "monant" NUMERIC(14,2)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npantpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npantpre" IS '';


-----------------------------------------------------------------------------
-- npasicaremp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasicaremp" CASCADE;

DROP SEQUENCE IF EXISTS "npasicaremp_seq";

CREATE SEQUENCE "npasicaremp_seq";


CREATE TABLE "npasicaremp"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codcat" VARCHAR(32)  NOT NULL,
  "fecasi" DATE  NOT NULL,
  "nomemp" VARCHAR(510),
  "nomcar" VARCHAR(1000),
  "nomnom" VARCHAR(290),
  "nomcat" VARCHAR(400),
  "unieje" VARCHAR(30),
  "sueldo" NUMERIC(14,2),
  "status" VARCHAR(1)  NOT NULL,
  "nronom" VARCHAR(16),
  "montonomina" NUMERIC(14,2),
  "codtip" VARCHAR(32),
  "codtipgas" VARCHAR(4),
  "codniv" VARCHAR(16),
  "grado" VARCHAR(3),
  "paso" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasicaremp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasicaremp" IS '';


CREATE INDEX "i01npasicaremp" ON "npasicaremp" ("codnom","status","codemp");

CREATE INDEX "i02npasicaremp" ON "npasicaremp" ("codemp");

-----------------------------------------------------------------------------
-- npasicarnom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasicarnom" CASCADE;

DROP SEQUENCE IF EXISTS "npasicarnom_seq";

CREATE SEQUENCE "npasicarnom_seq";


CREATE TABLE "npasicarnom"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasicarnom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasicarnom" IS '';


-----------------------------------------------------------------------------
-- npasicarpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasicarpre" CASCADE;

DROP SEQUENCE IF EXISTS "npasicarpre_seq";

CREATE SEQUENCE "npasicarpre_seq";


CREATE TABLE "npasicarpre"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "canpre" NUMERIC(6)  NOT NULL,
  "canasi" NUMERIC(6)  NOT NULL,
  "monpre" NUMERIC(14,2)  NOT NULL,
  "monasi" NUMERIC(14,2)  NOT NULL,
  "codniv" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasicarpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasicarpre" IS '';


-----------------------------------------------------------------------------
-- npasicarracemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasicarracemp" CASCADE;

DROP SEQUENCE IF EXISTS "npasicarracemp_seq";

CREATE SEQUENCE "npasicarracemp_seq";


CREATE TABLE "npasicarracemp"
(
  "codemp" VARCHAR(16),
  "codcarrac" VARCHAR(16),
  "codsecue" VARCHAR(6),
  "comcar" NUMERIC(14,2),
  "pricar" NUMERIC(14,2),
  "codaccadm" VARCHAR(4),
  "codregpai" VARCHAR(4),
  "codregedo" VARCHAR(4),
  "codregciu" VARCHAR(4),
  "codcatrac" VARCHAR(32),
  "codbanrac" VARCHAR(2),
  "codgrulab" VARCHAR(4),
  "nomsup" VARCHAR(250),
  "carsup" VARCHAR(16),
  "codnivorg" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasicarracemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasicarracemp" IS '';


-----------------------------------------------------------------------------
-- npasicatconemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasicatconemp" CASCADE;

DROP SEQUENCE IF EXISTS "npasicatconemp_seq";

CREATE SEQUENCE "npasicatconemp_seq";


CREATE TABLE "npasicatconemp"
(
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "codnom" VARCHAR(3),
  "codcon" VARCHAR(3),
  "codcat" VARCHAR(59),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasicatconemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasicatconemp" IS '';


-----------------------------------------------------------------------------
-- npasicodpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasicodpre" CASCADE;

DROP SEQUENCE IF EXISTS "npasicodpre_seq";

CREATE SEQUENCE "npasicodpre_seq";


CREATE TABLE "npasicodpre"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasicodpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasicodpre" IS '';


-----------------------------------------------------------------------------
-- npasicon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasicon" CASCADE;

DROP SEQUENCE IF EXISTS "npasicon_seq";

CREATE SEQUENCE "npasicon_seq";


CREATE TABLE "npasicon"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "nomsus" VARCHAR(30),
  "fecini" DATE,
  "fecexp" DATE,
  "salcon" NUMERIC(14,2),
  "monpre" NUMERIC(17,2),
  "canmon" VARCHAR(1),
  "calcon" VARCHAR(1),
  "actcon" VARCHAR(1),
  "frecon" VARCHAR(1),
  "codpre" VARCHAR(32),
  "monmen" NUMERIC(17,2),
  "frecue" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasicon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasicon" IS '';


-----------------------------------------------------------------------------
-- npasiconemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasiconemp" CASCADE;

DROP SEQUENCE IF EXISTS "npasiconemp_seq";

CREATE SEQUENCE "npasiconemp_seq";


CREATE TABLE "npasiconemp"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "nomemp" VARCHAR(31)  NOT NULL,
  "nomcon" VARCHAR(100)  NOT NULL,
  "nomcar" VARCHAR(100)  NOT NULL,
  "cantidad" NUMERIC(14,2),
  "monto" NUMERIC(14,2),
  "fecini" DATE,
  "fecexp" DATE,
  "frecon" VARCHAR(1),
  "asided" VARCHAR(1),
  "acucon" VARCHAR(1),
  "calcon" VARCHAR(1),
  "activo" VARCHAR(1)  NOT NULL,
  "acumulado" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiconemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiconemp" IS '';


CREATE INDEX "i01npasiconemp" ON "npasiconemp" ("activo","codemp","codcar","codcon");

CREATE INDEX "i02npasiconemp" ON "npasiconemp" ("activo","fecini","fecexp","codemp","codcar","calcon","frecon");

-----------------------------------------------------------------------------
-- npasiconempbck
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasiconempbck" CASCADE;

DROP SEQUENCE IF EXISTS "npasiconempbck_seq";

CREATE SEQUENCE "npasiconempbck_seq";


CREATE TABLE "npasiconempbck"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "nomemp" VARCHAR(31)  NOT NULL,
  "nomcon" VARCHAR(100)  NOT NULL,
  "nomcar" VARCHAR(100)  NOT NULL,
  "cantidad" NUMERIC(14,2),
  "monto" NUMERIC(14,2),
  "fecini" DATE,
  "fecexp" DATE,
  "frecon" VARCHAR(1),
  "asided" VARCHAR(1),
  "acucon" VARCHAR(1),
  "calcon" VARCHAR(1),
  "activo" VARCHAR(1)  NOT NULL,
  "acumulado" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiconempbck_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiconempbck" IS '';


-----------------------------------------------------------------------------
-- npasiconnom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasiconnom" CASCADE;

DROP SEQUENCE IF EXISTS "npasiconnom_seq";

CREATE SEQUENCE "npasiconnom_seq";


CREATE TABLE "npasiconnom"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "frecon" VARCHAR(1)  NOT NULL,
  "activo" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiconnom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiconnom" IS '';


-----------------------------------------------------------------------------
-- npasiconnom_aux
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasiconnom_aux" CASCADE;

DROP SEQUENCE IF EXISTS "npasiconnom_aux_seq";

CREATE SEQUENCE "npasiconnom_aux_seq";


CREATE TABLE "npasiconnom_aux"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "frecon" VARCHAR(1)  NOT NULL,
  "activo" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiconnom_aux_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiconnom_aux" IS '';


-----------------------------------------------------------------------------
-- npasiconsue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasiconsue" CASCADE;

DROP SEQUENCE IF EXISTS "npasiconsue_seq";

CREATE SEQUENCE "npasiconsue_seq";


CREATE TABLE "npasiconsue"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3),
  "codcom" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiconsue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiconsue" IS '';


-----------------------------------------------------------------------------
-- npasiempcont
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasiempcont" CASCADE;

DROP SEQUENCE IF EXISTS "npasiempcont_seq";

CREATE SEQUENCE "npasiempcont_seq";


CREATE TABLE "npasiempcont"
(
  "codtipcon" VARCHAR(3)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "nomemp" VARCHAR(250)  NOT NULL,
  "feccal" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiempcont_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiempcont" IS '';


-----------------------------------------------------------------------------
-- npasinomcont
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasinomcont" CASCADE;

DROP SEQUENCE IF EXISTS "npasinomcont_seq";

CREATE SEQUENCE "npasinomcont_seq";


CREATE TABLE "npasinomcont"
(
  "codtipcon" VARCHAR(3)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasinomcont_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasinomcont" IS '';


-----------------------------------------------------------------------------
-- npasipre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasipre" CASCADE;

DROP SEQUENCE IF EXISTS "npasipre_seq";

CREATE SEQUENCE "npasipre_seq";


CREATE TABLE "npasipre"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "codasi" VARCHAR(3)  NOT NULL,
  "desasi" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasipre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasipre" IS '';


-----------------------------------------------------------------------------
-- npasoconcla
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasoconcla" CASCADE;

DROP SEQUENCE IF EXISTS "npasoconcla_seq";

CREATE SEQUENCE "npasoconcla_seq";


CREATE TABLE "npasoconcla"
(
  "codcon" VARCHAR(4)  NOT NULL,
  "codcla" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasoconcla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasoconcla" IS '';


-----------------------------------------------------------------------------
-- npasocontra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasocontra" CASCADE;

DROP SEQUENCE IF EXISTS "npasocontra_seq";

CREATE SEQUENCE "npasocontra_seq";


CREATE TABLE "npasocontra"
(
  "codconant" VARCHAR(4)  NOT NULL,
  "codconact" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npasocontra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasocontra" IS '';


-----------------------------------------------------------------------------
-- npbancos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npbancos" CASCADE;

DROP SEQUENCE IF EXISTS "npbancos_seq";

CREATE SEQUENCE "npbancos_seq";


CREATE TABLE "npbancos"
(
  "codban" VARCHAR(2)  NOT NULL,
  "nomban" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npbancos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npbancos" IS '';


-----------------------------------------------------------------------------
-- npbenemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npbenemp" CASCADE;

DROP SEQUENCE IF EXISTS "npbenemp_seq";

CREATE SEQUENCE "npbenemp_seq";


CREATE TABLE "npbenemp"
(
  "codnom" VARCHAR(3),
  "codcon" VARCHAR(3),
  "codemp" VARCHAR(16),
  "cedben" VARCHAR(10),
  "nomben" VARCHAR(50),
  "codban" VARCHAR(2),
  "numcue" VARCHAR(31),
  "codcar" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npbenemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npbenemp" IS '';


-----------------------------------------------------------------------------
-- npbonocont
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npbonocont" CASCADE;

DROP SEQUENCE IF EXISTS "npbonocont_seq";

CREATE SEQUENCE "npbonocont_seq";


CREATE TABLE "npbonocont"
(
  "codtipcon" VARCHAR(3)  NOT NULL,
  "anovig" DATE  NOT NULL,
  "desde" NUMERIC(2)  NOT NULL,
  "hasta" NUMERIC(2)  NOT NULL,
  "diauti" NUMERIC(3)  NOT NULL,
  "diavac" NUMERIC(3)  NOT NULL,
  "anovighas" DATE,
  "calinc" VARCHAR(1) default '',
  "antap" VARCHAR(1),
  "antapvac" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npbonocont_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npbonocont" IS '';


-----------------------------------------------------------------------------
-- npcajaho
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcajaho" CASCADE;

DROP SEQUENCE IF EXISTS "npcajaho_seq";

CREATE SEQUENCE "npcajaho_seq";


CREATE TABLE "npcajaho"
(
  "codnom" VARCHAR(3),
  "codconpat" VARCHAR(3)  NOT NULL,
  "codcontra" VARCHAR(3)  NOT NULL,
  "codconpre" VARCHAR(3),
  "codconamo" VARCHAR(3),
  "codconint" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcajaho_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcajaho" IS '';


-----------------------------------------------------------------------------
-- npcalcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcalcon" CASCADE;

DROP SEQUENCE IF EXISTS "npcalcon_seq";

CREATE SEQUENCE "npcalcon_seq";


CREATE TABLE "npcalcon"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "numcon" VARCHAR(3)  NOT NULL,
  "campo" VARCHAR(20),
  "operador" VARCHAR(2),
  "valor" VARCHAR(20),
  "confor" VARCHAR(1000)  NOT NULL,
  "tipcal" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcalcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcalcon" IS '';


CREATE INDEX "i01npcalcon" ON "npcalcon" ("codcon","codnom");

-----------------------------------------------------------------------------
-- npcalconcol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcalconcol" CASCADE;

DROP SEQUENCE IF EXISTS "npcalconcol_seq";

CREATE SEQUENCE "npcalconcol_seq";


CREATE TABLE "npcalconcol"
(
  "codctr" VARCHAR(4)  NOT NULL,
  "codcla" VARCHAR(4)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "cantra" NUMERIC(5)  NOT NULL,
  "moncla" NUMERIC(14,2)  NOT NULL,
  "totcla" NUMERIC(14,2)  NOT NULL,
  "bascal" VARCHAR(2500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcalconcol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcalconcol" IS '';


-----------------------------------------------------------------------------
-- npcalislr
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcalislr" CASCADE;

DROP SEQUENCE IF EXISTS "npcalislr_seq";

CREATE SEQUENCE "npcalislr_seq";


CREATE TABLE "npcalislr"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "mesper" NUMERIC(2)  NOT NULL,
  "anoper" NUMERIC(4)  NOT NULL,
  "remune" NUMERIC(14,2),
  "impret" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcalislr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcalislr" IS '';


-----------------------------------------------------------------------------
-- npcalvac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcalvac" CASCADE;

DROP SEQUENCE IF EXISTS "npcalvac_seq";

CREATE SEQUENCE "npcalvac_seq";


CREATE TABLE "npcalvac"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "caudes" DATE  NOT NULL,
  "cauhas" DATE  NOT NULL,
  "disdes" DATE,
  "dishas" DATE,
  "fecrei" DATE,
  "fecreg" DATE,
  "diavac" NUMERIC(6)  NOT NULL,
  "dianhab" NUMERIC(6),
  "diaant" NUMERIC(6),
  "diapag" NUMERIC(6),
  "diadis" NUMERIC(6),
  "diabon" NUMERIC(6),
  "monvac" NUMERIC(14,2)  NOT NULL,
  "monbon" NUMERIC(14,2)  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "stapag" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcalvac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcalvac" IS '';


-----------------------------------------------------------------------------
-- npcargos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcargos" CASCADE;

DROP SEQUENCE IF EXISTS "npcargos_seq";

CREATE SEQUENCE "npcargos_seq";


CREATE TABLE "npcargos"
(
  "codcar" VARCHAR(16)  NOT NULL,
  "nomcar" VARCHAR(100)  NOT NULL,
  "suecar" NUMERIC(14,2)  NOT NULL,
  "stacar" VARCHAR(1)  NOT NULL,
  "codocp" VARCHAR(16),
  "punmin" NUMERIC(14,2),
  "graocp" VARCHAR(3),
  "comcar" NUMERIC(14,2),
  "pasocp" VARCHAR(3),
  "codtip" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcargos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcargos" IS '';


-----------------------------------------------------------------------------
-- npcargosocp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcargosocp" CASCADE;

DROP SEQUENCE IF EXISTS "npcargosocp_seq";

CREATE SEQUENCE "npcargosocp_seq";


CREATE TABLE "npcargosocp"
(
  "codcar" VARCHAR(16)  NOT NULL,
  "codpas" VARCHAR(10),
  "codgra" VARCHAR(10),
  "sueldo" NUMERIC(14,2),
  "descar" VARCHAR(100),
  "comcar" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcargosocp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcargosocp" IS '';


-----------------------------------------------------------------------------
-- npcargosrac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcargosrac" CASCADE;

DROP SEQUENCE IF EXISTS "npcargosrac_seq";

CREATE SEQUENCE "npcargosrac_seq";


CREATE TABLE "npcargosrac"
(
  "codcar" VARCHAR(16)  NOT NULL,
  "nomcar" VARCHAR(100)  NOT NULL,
  "suecar" NUMERIC(14,2)  NOT NULL,
  "stacar" VARCHAR(1)  NOT NULL,
  "codcat" VARCHAR(16)  NOT NULL,
  "codocp" VARCHAR(16)  NOT NULL,
  "punmin" NUMERIC(14,2),
  "graocp" VARCHAR(3),
  "comcar" NUMERIC(14,2),
  "pasocp" VARCHAR(3),
  "codtip" VARCHAR(4),
  "tipper" VARCHAR(4),
  "feccar" VARCHAR(4),
  "codemp" VARCHAR(16),
  "nomemp" VARCHAR(250),
  "nronom" VARCHAR(16),
  "estorg" VARCHAR(16),
  "anorac" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcargosrac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcargosrac" IS '';


-----------------------------------------------------------------------------
-- npcarocp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcarocp" CASCADE;

DROP SEQUENCE IF EXISTS "npcarocp_seq";

CREATE SEQUENCE "npcarocp_seq";


CREATE TABLE "npcarocp"
(
  "codcar" VARCHAR(16)  NOT NULL,
  "descar" VARCHAR(50)  NOT NULL,
  "gracar" VARCHAR(3)  NOT NULL,
  "suecar" NUMERIC(14,2),
  "tipcar" VARCHAR(3)  NOT NULL,
  "funcar" VARCHAR(2500),
  "atrcar" VARCHAR(2500),
  "actcar" VARCHAR(2500),
  "rescar" VARCHAR(2500),
  "anocar" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcarocp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcarocp" IS '';


-----------------------------------------------------------------------------
-- npcarpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcarpre" CASCADE;

DROP SEQUENCE IF EXISTS "npcarpre_seq";

CREATE SEQUENCE "npcarpre_seq";


CREATE TABLE "npcarpre"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "canpre" NUMERIC(6)  NOT NULL,
  "canasi" NUMERIC(6)  NOT NULL,
  "monpre" NUMERIC(17,2)  NOT NULL,
  "monasi" NUMERIC(17,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcarpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcarpre" IS '';


-----------------------------------------------------------------------------
-- npcarrac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcarrac" CASCADE;

DROP SEQUENCE IF EXISTS "npcarrac_seq";

CREATE SEQUENCE "npcarrac_seq";


CREATE TABLE "npcarrac"
(
  "codcarrac" VARCHAR(16)  NOT NULL,
  "codnivorg" VARCHAR(16)  NOT NULL,
  "sueldo" NUMERIC(32,2),
  "descar" VARCHAR(250),
  "cancar" NUMERIC(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcarrac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcarrac" IS '';


-----------------------------------------------------------------------------
-- npcatpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcatpre" CASCADE;

DROP SEQUENCE IF EXISTS "npcatpre_seq";

CREATE SEQUENCE "npcatpre_seq";


CREATE TABLE "npcatpre"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "nomcat" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcatpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcatpre" IS '';


-----------------------------------------------------------------------------
-- npcatprehis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcatprehis" CASCADE;

DROP SEQUENCE IF EXISTS "npcatprehis_seq";

CREATE SEQUENCE "npcatprehis_seq";


CREATE TABLE "npcatprehis"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "nomcat" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcatprehis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcatprehis" IS '';


-----------------------------------------------------------------------------
-- npcertificados
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcertificados" CASCADE;

DROP SEQUENCE IF EXISTS "npcertificados_seq";

CREATE SEQUENCE "npcertificados_seq";


CREATE TABLE "npcertificados"
(
  "codadi" VARCHAR(4),
  "codcer" VARCHAR(4),
  "descer" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcertificados_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcertificados" IS '';


-----------------------------------------------------------------------------
-- npcestatickets
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcestatickets" CASCADE;

DROP SEQUENCE IF EXISTS "npcestatickets_seq";

CREATE SEQUENCE "npcestatickets_seq";


CREATE TABLE "npcestatickets"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "monpor" VARCHAR(1),
  "valtic" NUMERIC(32,2),
  "numtic" NUMERIC(5),
  "tippag" VARCHAR(1),
  "numdia" NUMERIC(5),
  "diahab" VARCHAR(1),
  "sabado" VARCHAR(1),
  "doming" VARCHAR(1),
  "diafer" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcestatickets_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcestatickets" IS '';


-----------------------------------------------------------------------------
-- npcienom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcienom" CASCADE;

DROP SEQUENCE IF EXISTS "npcienom_seq";

CREATE SEQUENCE "npcienom_seq";


CREATE TABLE "npcienom"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "fecnom" DATE  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "monto" NUMERIC(14,2)  NOT NULL,
  "asided" VARCHAR(1),
  "codtipgas" VARCHAR(16),
  "cantidad" NUMERIC(14,2),
  "codban" VARCHAR(16),
  "especial" VARCHAR(1) default '',
  "codnomesp" VARCHAR(3),
  "nomnomesp" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcienom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcienom" IS '';


-----------------------------------------------------------------------------
-- npciudad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npciudad" CASCADE;

DROP SEQUENCE IF EXISTS "npciudad_seq";

CREATE SEQUENCE "npciudad_seq";


CREATE TABLE "npciudad"
(
  "codciu" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nomciu" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npciudad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npciudad" IS '';


-----------------------------------------------------------------------------
-- npcodpostal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcodpostal" CASCADE;

DROP SEQUENCE IF EXISTS "npcodpostal_seq";

CREATE SEQUENCE "npcodpostal_seq";


CREATE TABLE "npcodpostal"
(
  "codpos" VARCHAR(4),
  "ciupos" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcodpostal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcodpostal" IS '';


-----------------------------------------------------------------------------
-- npcomocp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcomocp" CASCADE;

DROP SEQUENCE IF EXISTS "npcomocp_seq";

CREATE SEQUENCE "npcomocp_seq";


CREATE TABLE "npcomocp"
(
  "pascar" VARCHAR(3),
  "gracar" VARCHAR(3),
  "suecar" NUMERIC,
  "codtipcar" VARCHAR(3)  NOT NULL,
  "fecdes" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcomocp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcomocp" IS '';


-----------------------------------------------------------------------------
-- npconaho
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconaho" CASCADE;

DROP SEQUENCE IF EXISTS "npconaho_seq";

CREATE SEQUENCE "npconaho_seq";


CREATE TABLE "npconaho"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "tipcon" VARCHAR(1),
  "tipnom" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconaho_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconaho" IS '';


-----------------------------------------------------------------------------
-- npconarc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconarc" CASCADE;

DROP SEQUENCE IF EXISTS "npconarc_seq";

CREATE SEQUENCE "npconarc_seq";


CREATE TABLE "npconarc"
(
  "codcon" VARCHAR(3),
  "codnom" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconarc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconarc" IS '';


-----------------------------------------------------------------------------
-- npconasi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconasi" CASCADE;

DROP SEQUENCE IF EXISTS "npconasi_seq";

CREATE SEQUENCE "npconasi_seq";


CREATE TABLE "npconasi"
(
  "codcon" VARCHAR(3),
  "codasi" VARCHAR(3),
  "codcpt" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconasi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconasi" IS '';


-----------------------------------------------------------------------------
-- npconasi_old
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconasi_old" CASCADE;

DROP SEQUENCE IF EXISTS "npconasi_old_seq";

CREATE SEQUENCE "npconasi_old_seq";


CREATE TABLE "npconasi_old"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "codasi" VARCHAR(3)  NOT NULL,
  "codcpt" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npconasi_old_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconasi_old" IS '';


-----------------------------------------------------------------------------
-- npconceptosbono
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconceptosbono" CASCADE;

DROP SEQUENCE IF EXISTS "npconceptosbono_seq";

CREATE SEQUENCE "npconceptosbono_seq";


CREATE TABLE "npconceptosbono"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npconceptosbono_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconceptosbono" IS '';


-----------------------------------------------------------------------------
-- npconceptoscategoria
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconceptoscategoria" CASCADE;

DROP SEQUENCE IF EXISTS "npconceptoscategoria_seq";

CREATE SEQUENCE "npconceptoscategoria_seq";


CREATE TABLE "npconceptoscategoria"
(
  "codcat" VARCHAR(16),
  "codcon" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconceptoscategoria_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconceptoscategoria" IS '';


-----------------------------------------------------------------------------
-- npconceptosdeducciones
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconceptosdeducciones" CASCADE;

DROP SEQUENCE IF EXISTS "npconceptosdeducciones_seq";

CREATE SEQUENCE "npconceptosdeducciones_seq";


CREATE TABLE "npconceptosdeducciones"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npconceptosdeducciones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconceptosdeducciones" IS '';


-----------------------------------------------------------------------------
-- npconceptosprima
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconceptosprima" CASCADE;

DROP SEQUENCE IF EXISTS "npconceptosprima_seq";

CREATE SEQUENCE "npconceptosprima_seq";


CREATE TABLE "npconceptosprima"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npconceptosprima_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconceptosprima" IS '';


-----------------------------------------------------------------------------
-- npconceptossalario
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconceptossalario" CASCADE;

DROP SEQUENCE IF EXISTS "npconceptossalario_seq";

CREATE SEQUENCE "npconceptossalario_seq";


CREATE TABLE "npconceptossalario"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npconceptossalario_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconceptossalario" IS '';


-----------------------------------------------------------------------------
-- npconcomp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconcomp" CASCADE;

DROP SEQUENCE IF EXISTS "npconcomp_seq";

CREATE SEQUENCE "npconcomp_seq";


CREATE TABLE "npconcomp"
(
  "codnom" VARCHAR(3),
  "codcon" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconcomp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconcomp" IS '';


-----------------------------------------------------------------------------
-- npconfon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconfon" CASCADE;

DROP SEQUENCE IF EXISTS "npconfon_seq";

CREATE SEQUENCE "npconfon_seq";


CREATE TABLE "npconfon"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "tipcon" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconfon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconfon" IS '';


-----------------------------------------------------------------------------
-- npconian
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconian" CASCADE;

DROP SEQUENCE IF EXISTS "npconian_seq";

CREATE SEQUENCE "npconian_seq";


CREATE TABLE "npconian"
(
  "conian" VARCHAR(3),
  "concid" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconian_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconian" IS '';


-----------------------------------------------------------------------------
-- npconpri
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconpri" CASCADE;

DROP SEQUENCE IF EXISTS "npconpri_seq";

CREATE SEQUENCE "npconpri_seq";


CREATE TABLE "npconpri"
(
  "codnom" VARCHAR(3),
  "codcon" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconpri_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconpri" IS '';


-----------------------------------------------------------------------------
-- npconret
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconret" CASCADE;

DROP SEQUENCE IF EXISTS "npconret_seq";

CREATE SEQUENCE "npconret_seq";


CREATE TABLE "npconret"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconret" IS '';


-----------------------------------------------------------------------------
-- npconsalint
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconsalint" CASCADE;

DROP SEQUENCE IF EXISTS "npconsalint_seq";

CREATE SEQUENCE "npconsalint_seq";


CREATE TABLE "npconsalint"
(
  "codnom" VARCHAR(3),
  "codcon" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconsalint_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconsalint" IS '';


-----------------------------------------------------------------------------
-- npconsueldo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npconsueldo" CASCADE;

DROP SEQUENCE IF EXISTS "npconsueldo_seq";

CREATE SEQUENCE "npconsueldo_seq";


CREATE TABLE "npconsueldo"
(
  "codnom" VARCHAR(3),
  "codcon" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npconsueldo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npconsueldo" IS '';


-----------------------------------------------------------------------------
-- npcontipaporet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcontipaporet" CASCADE;

DROP SEQUENCE IF EXISTS "npcontipaporet_seq";

CREATE SEQUENCE "npcontipaporet_seq";


CREATE TABLE "npcontipaporet"
(
  "codtipapo" VARCHAR(4)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3),
  "tipo" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcontipaporet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcontipaporet" IS '';


-----------------------------------------------------------------------------
-- npcontra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcontra" CASCADE;

DROP SEQUENCE IF EXISTS "npcontra_seq";

CREATE SEQUENCE "npcontra_seq";


CREATE TABLE "npcontra"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "periodico" VARCHAR(1) default 'S',
  "identi" VARCHAR(50),
  "tipo" VARCHAR(1) default '',
  "id" INTEGER  NOT NULL DEFAULT nextval('npcontra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcontra" IS '';


-----------------------------------------------------------------------------
-- npcontrato
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcontrato" CASCADE;

DROP SEQUENCE IF EXISTS "npcontrato_seq";

CREATE SEQUENCE "npcontrato_seq";


CREATE TABLE "npcontrato"
(
  "codcon" VARCHAR(4)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "descon" VARCHAR(250)  NOT NULL,
  "fecini" DATE,
  "fecfin" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npcontrato_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcontrato" IS '';


-----------------------------------------------------------------------------
-- npcuentas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npcuentas" CASCADE;

DROP SEQUENCE IF EXISTS "npcuentas_seq";

CREATE SEQUENCE "npcuentas_seq";


CREATE TABLE "npcuentas"
(
  "codemp" VARCHAR(16),
  "numcue" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('npcuentas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npcuentas" IS '';


-----------------------------------------------------------------------------
-- npdefcla
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefcla" CASCADE;

DROP SEQUENCE IF EXISTS "npdefcla_seq";

CREATE SEQUENCE "npdefcla_seq";


CREATE TABLE "npdefcla"
(
  "codcla" VARCHAR(4)  NOT NULL,
  "descla" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefcla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefcla" IS '';


-----------------------------------------------------------------------------
-- npdefconcasep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefconcasep" CASCADE;

DROP SEQUENCE IF EXISTS "npdefconcasep_seq";

CREATE SEQUENCE "npdefconcasep_seq";


CREATE TABLE "npdefconcasep"
(
  "tipo" VARCHAR(12),
  "codnom" VARCHAR(3),
  "codcon" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefconcasep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefconcasep" IS '';


-----------------------------------------------------------------------------
-- npdefcpt
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefcpt" CASCADE;

DROP SEQUENCE IF EXISTS "npdefcpt_seq";

CREATE SEQUENCE "npdefcpt_seq";


CREATE TABLE "npdefcpt"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "nomcon" VARCHAR(100)  NOT NULL,
  "codpar" VARCHAR(16)  NOT NULL,
  "opecon" VARCHAR(1)  NOT NULL,
  "acuhis" VARCHAR(1)  NOT NULL,
  "inimon" VARCHAR(1)  NOT NULL,
  "conact" VARCHAR(1)  NOT NULL,
  "impcpt" VARCHAR(1)  NOT NULL,
  "ordpag" VARCHAR(1)  NOT NULL,
  "afepre" VARCHAR(1),
  "frecon" VARCHAR(1),
  "nrocta" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefcpt_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefcpt" IS '';


-----------------------------------------------------------------------------
-- npdefctb
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefctb" CASCADE;

DROP SEQUENCE IF EXISTS "npdefctb_seq";

CREATE SEQUENCE "npdefctb_seq";


CREATE TABLE "npdefctb"
(
  "coduni" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "codcta" VARCHAR(18)  NOT NULL,
  "nomcta" VARCHAR(30)  NOT NULL,
  "debcre" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefctb_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefctb" IS '';


-----------------------------------------------------------------------------
-- npdefgen
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefgen" CASCADE;

DROP SEQUENCE IF EXISTS "npdefgen_seq";

CREATE SEQUENCE "npdefgen_seq";


CREATE TABLE "npdefgen"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "loncodcar" NUMERIC(2),
  "loncodemp" NUMERIC(2),
  "loncodorg" NUMERIC(2),
  "loncoduni" NUMERIC(2),
  "rupcar" NUMERIC(2),
  "rupemp" NUMERIC(2),
  "ruporg" NUMERIC(2),
  "rupuni" NUMERIC(2),
  "forcar" VARCHAR(16)  NOT NULL,
  "foremp" VARCHAR(16)  NOT NULL,
  "fororg" VARCHAR(16)  NOT NULL,
  "foruni" VARCHAR(16)  NOT NULL,
  "redmon" VARCHAR(1)  NOT NULL,
  "codpre" VARCHAR(3),
  "codvac" VARCHAR(3),
  "codvacfra" VARCHAR(3),
  "codvaccol" VARCHAR(3),
  "codislr" VARCHAR(3),
  "codpres" VARCHAR(3),
  "codsso" VARCHAR(3),
  "sueint" VARCHAR(3),
  "asiconnom" VARCHAR(1) default 'S',
  "cierac" VARCHAR(1) default '',
  "foresc" VARCHAR(16),
  "numrec" NUMERIC(14,2),
  "forcarrac" VARCHAR(16),
  "forcarocp" VARCHAR(16),
  "correl" NUMERIC(6),
  "porctick" NUMERIC(14,2),
  "unitrib" NUMERIC(14,2),
  "numtick" NUMERIC(14,2),
  "diasem" NUMERIC(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefgen_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefgen" IS '';


-----------------------------------------------------------------------------
-- npdefjorlab
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefjorlab" CASCADE;

DROP SEQUENCE IF EXISTS "npdefjorlab_seq";

CREATE SEQUENCE "npdefjorlab_seq";


CREATE TABLE "npdefjorlab"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "idejor" VARCHAR(3)  NOT NULL,
  "lunes" VARCHAR(1),
  "martes" VARCHAR(1),
  "miercoles" VARCHAR(1),
  "jueves" VARCHAR(1),
  "viernes" VARCHAR(1),
  "sabado" VARCHAR(1),
  "domingo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefjorlab_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefjorlab" IS '';


-----------------------------------------------------------------------------
-- npdefmov
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefmov" CASCADE;

DROP SEQUENCE IF EXISTS "npdefmov_seq";

CREATE SEQUENCE "npdefmov_seq";


CREATE TABLE "npdefmov"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "mensaje" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefmov_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefmov" IS '';


-----------------------------------------------------------------------------
-- npdefpagext
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefpagext" CASCADE;

DROP SEQUENCE IF EXISTS "npdefpagext_seq";

CREATE SEQUENCE "npdefpagext_seq";


CREATE TABLE "npdefpagext"
(
  "codgrunom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "fecha1" DATE  NOT NULL,
  "fecha2" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefpagext_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefpagext" IS '';


-----------------------------------------------------------------------------
-- npdefpar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefpar" CASCADE;

DROP SEQUENCE IF EXISTS "npdefpar_seq";

CREATE SEQUENCE "npdefpar_seq";


CREATE TABLE "npdefpar"
(
  "codcol" VARCHAR(100),
  "nomcol" VARCHAR(100),
  "tipcol" VARCHAR(20),
  "loncol" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefpar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefpar" IS '';


-----------------------------------------------------------------------------
-- npdefpreliq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefpreliq" CASCADE;

DROP SEQUENCE IF EXISTS "npdefpreliq_seq";

CREATE SEQUENCE "npdefpreliq_seq";


CREATE TABLE "npdefpreliq"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "perdes" VARCHAR(4)  NOT NULL,
  "perhas" VARCHAR(4)  NOT NULL,
  "codpar" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefpreliq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefpreliq" IS '';


-----------------------------------------------------------------------------
-- npdefrepdin
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefrepdin" CASCADE;

DROP SEQUENCE IF EXISTS "npdefrepdin_seq";

CREATE SEQUENCE "npdefrepdin_seq";


CREATE TABLE "npdefrepdin"
(
  "codrep" VARCHAR(100),
  "codcol" VARCHAR(100),
  "nomcol" VARCHAR(100),
  "valdes" VARCHAR(100),
  "valhas" VARCHAR(100),
  "orden" VARCHAR(3),
  "tipcol" VARCHAR(20),
  "loncol" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefrepdin_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefrepdin" IS '';


-----------------------------------------------------------------------------
-- npdefvar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdefvar" CASCADE;

DROP SEQUENCE IF EXISTS "npdefvar_seq";

CREATE SEQUENCE "npdefvar_seq";


CREATE TABLE "npdefvar"
(
  "codvar" VARCHAR(3)  NOT NULL,
  "desvar" VARCHAR(30)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "valor1" NUMERIC(14,2),
  "valor2" NUMERIC(14,2),
  "valor3" NUMERIC(14,2),
  "valor4" NUMERIC(14,2),
  "valor5" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdefvar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdefvar" IS '';


-----------------------------------------------------------------------------
-- npdepban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdepban" CASCADE;

DROP SEQUENCE IF EXISTS "npdepban_seq";

CREATE SEQUENCE "npdepban_seq";


CREATE TABLE "npdepban"
(
  "numlin" NUMERIC(14,2),
  "desdep" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdepban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdepban" IS '';


CREATE INDEX "i01npdepban" ON "npdepban" ("numlin");

-----------------------------------------------------------------------------
-- npdepbanfid
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdepbanfid" CASCADE;

DROP SEQUENCE IF EXISTS "npdepbanfid_seq";

CREATE SEQUENCE "npdepbanfid_seq";


CREATE TABLE "npdepbanfid"
(
  "numlin" NUMERIC(14),
  "desdep" VARCHAR(255),
  "codemp" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdepbanfid_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdepbanfid" IS '';


-----------------------------------------------------------------------------
-- npdepbanusu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdepbanusu" CASCADE;

DROP SEQUENCE IF EXISTS "npdepbanusu_seq";

CREATE SEQUENCE "npdepbanusu_seq";


CREATE TABLE "npdepbanusu"
(
  "numlin" NUMERIC(14,2),
  "desdep" VARCHAR(1000),
  "usuario" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdepbanusu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdepbanusu" IS '';


CREATE INDEX "i01npdepbanusu" ON "npdepbanusu" ("numlin");

-----------------------------------------------------------------------------
-- npdepcajaho
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdepcajaho" CASCADE;

DROP SEQUENCE IF EXISTS "npdepcajaho_seq";

CREATE SEQUENCE "npdepcajaho_seq";


CREATE TABLE "npdepcajaho"
(
  "numlin" NUMERIC(14,2),
  "desdep" VARCHAR(1000),
  "codemp" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdepcajaho_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdepcajaho" IS '';


-----------------------------------------------------------------------------
-- npdepfid
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdepfid" CASCADE;

DROP SEQUENCE IF EXISTS "npdepfid_seq";

CREATE SEQUENCE "npdepfid_seq";


CREATE TABLE "npdepfid"
(
  "codemp" VARCHAR(16),
  "fecnom" DATE,
  "fecing" DATE,
  "devengado" NUMERIC(14,2),
  "diasdeposito" NUMERIC(14,2),
  "fideicomiso" NUMERIC(14,2),
  "codcar" VARCHAR(16),
  "codnom" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdepfid_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdepfid" IS '';


-----------------------------------------------------------------------------
-- npdepfide
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdepfide" CASCADE;

DROP SEQUENCE IF EXISTS "npdepfide_seq";

CREATE SEQUENCE "npdepfide_seq";


CREATE TABLE "npdepfide"
(
  "codemp" VARCHAR(16),
  "fecnom" DATE,
  "devengado" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdepfide_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdepfide" IS '';


-----------------------------------------------------------------------------
-- npdesniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdesniv" CASCADE;

DROP SEQUENCE IF EXISTS "npdesniv_seq";

CREATE SEQUENCE "npdesniv_seq";


CREATE TABLE "npdesniv"
(
  "codigo" VARCHAR(6)  NOT NULL,
  "consec" NUMERIC(2)  NOT NULL,
  "nomabr" VARCHAR(10)  NOT NULL,
  "nomext" VARCHAR(50)  NOT NULL,
  "lonniv" NUMERIC(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdesniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdesniv" IS '';


-----------------------------------------------------------------------------
-- npdiaadicnom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdiaadicnom" CASCADE;

DROP SEQUENCE IF EXISTS "npdiaadicnom_seq";

CREATE SEQUENCE "npdiaadicnom_seq";


CREATE TABLE "npdiaadicnom"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdiaadicnom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdiaadicnom" IS '';


-----------------------------------------------------------------------------
-- npdiaext
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdiaext" CASCADE;

DROP SEQUENCE IF EXISTS "npdiaext_seq";

CREATE SEQUENCE "npdiaext_seq";


CREATE TABLE "npdiaext"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "fecha" DATE  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npdiaext_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdiaext" IS '';


-----------------------------------------------------------------------------
-- npdisccesta
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npdisccesta" CASCADE;

DROP SEQUENCE IF EXISTS "npdisccesta_seq";

CREATE SEQUENCE "npdisccesta_seq";


CREATE TABLE "npdisccesta"
(
  "numlin" NUMERIC(14,2),
  "desdep" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('npdisccesta_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npdisccesta" IS '';


CREATE INDEX "i01npdisccesta" ON "npdisccesta" ("numlin");

-----------------------------------------------------------------------------
-- npempjorlab
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npempjorlab" CASCADE;

DROP SEQUENCE IF EXISTS "npempjorlab_seq";

CREATE SEQUENCE "npempjorlab_seq";


CREATE TABLE "npempjorlab"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "idejor" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npempjorlab_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npempjorlab" IS '';


-----------------------------------------------------------------------------
-- npempleados_banco
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npempleados_banco" CASCADE;

DROP SEQUENCE IF EXISTS "npempleados_banco_seq";

CREATE SEQUENCE "npempleados_banco_seq";


CREATE TABLE "npempleados_banco"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codempant" VARCHAR(14),
  "codban" VARCHAR(2),
  "cuenta_banco" VARCHAR(20),
  "monto" NUMERIC(14,2),
  "codnom" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npempleados_banco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npempleados_banco" IS '';


-----------------------------------------------------------------------------
-- npempvac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npempvac" CASCADE;

DROP SEQUENCE IF EXISTS "npempvac_seq";

CREATE SEQUENCE "npempvac_seq";


CREATE TABLE "npempvac"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "caudes" DATE  NOT NULL,
  "cauhas" DATE  NOT NULL,
  "feccom" DATE  NOT NULL,
  "fecfin" DATE  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "bonvac" NUMERIC(14,2)  NOT NULL,
  "vacaci" NUMERIC(14,2)  NOT NULL,
  "monpag" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npempvac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npempvac" IS '';


-----------------------------------------------------------------------------
-- npescalas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npescalas" CASCADE;

DROP SEQUENCE IF EXISTS "npescalas_seq";

CREATE SEQUENCE "npescalas_seq";


CREATE TABLE "npescalas"
(
  "grado" VARCHAR(2),
  "paso" VARCHAR(2),
  "salario" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npescalas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npescalas" IS '';


-----------------------------------------------------------------------------
-- npescsue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npescsue" CASCADE;

DROP SEQUENCE IF EXISTS "npescsue_seq";

CREATE SEQUENCE "npescsue_seq";


CREATE TABLE "npescsue"
(
  "codesc" VARCHAR(4)  NOT NULL,
  "valini" NUMERIC(14,2)  NOT NULL,
  "valfin" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npescsue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npescsue" IS '';


-----------------------------------------------------------------------------
-- npescuelas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npescuelas" CASCADE;

DROP SEQUENCE IF EXISTS "npescuelas_seq";

CREATE SEQUENCE "npescuelas_seq";


CREATE TABLE "npescuelas"
(
  "codescuela" VARCHAR(16),
  "nombreescuela" VARCHAR(100),
  "codmunicipio" VARCHAR(14),
  "nombremunicipio" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('npescuelas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npescuelas" IS '';


-----------------------------------------------------------------------------
-- npestado
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npestado" CASCADE;

DROP SEQUENCE IF EXISTS "npestado_seq";

CREATE SEQUENCE "npestado_seq";


CREATE TABLE "npestado"
(
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nomedo" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npestado_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npestado" IS '';


-----------------------------------------------------------------------------
-- npestorg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npestorg" CASCADE;

DROP SEQUENCE IF EXISTS "npestorg_seq";

CREATE SEQUENCE "npestorg_seq";


CREATE TABLE "npestorg"
(
  "codniv" VARCHAR(16)  NOT NULL,
  "desniv" VARCHAR(100)  NOT NULL,
  "telext" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('npestorg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npestorg" IS '';


-----------------------------------------------------------------------------
-- npexplab
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npexplab" CASCADE;

DROP SEQUENCE IF EXISTS "npexplab_seq";

CREATE SEQUENCE "npexplab_seq";


CREATE TABLE "npexplab"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "nomemp" VARCHAR(60),
  "codcar" VARCHAR(16),
  "descar" VARCHAR(100)  NOT NULL,
  "fecini" DATE,
  "fecter" DATE,
  "sueobt" NUMERIC(14,2),
  "stacar" VARCHAR(1)  NOT NULL,
  "compobt" NUMERIC(14,2),
  "durexp" VARCHAR(50),
  "tiporg" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('npexplab_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npexplab" IS '';


-----------------------------------------------------------------------------
-- npfalper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npfalper" CASCADE;

DROP SEQUENCE IF EXISTS "npfalper_seq";

CREATE SEQUENCE "npfalper_seq";


CREATE TABLE "npfalper"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codmot" VARCHAR(4),
  "codnom" VARCHAR(3)  NOT NULL,
  "nrodia" NUMERIC(4),
  "observ" VARCHAR(250),
  "fecdes" DATE  NOT NULL,
  "fechas" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npfalper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npfalper" IS '';


-----------------------------------------------------------------------------
-- npfideicomiso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npfideicomiso" CASCADE;

DROP SEQUENCE IF EXISTS "npfideicomiso_seq";

CREATE SEQUENCE "npfideicomiso_seq";


CREATE TABLE "npfideicomiso"
(
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "fecnom" DATE,
  "fecasi" DATE,
  "dias" NUMERIC(2),
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npfideicomiso_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npfideicomiso" IS '';


-----------------------------------------------------------------------------
-- npfondoprestaciones
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npfondoprestaciones" CASCADE;

DROP SEQUENCE IF EXISTS "npfondoprestaciones_seq";

CREATE SEQUENCE "npfondoprestaciones_seq";


CREATE TABLE "npfondoprestaciones"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codconacudia" VARCHAR(3)  NOT NULL,
  "codconacumonto" VARCHAR(3)  NOT NULL,
  "codconacuinteres" VARCHAR(3)  NOT NULL,
  "capitalizarinteres" VARCHAR(1)  NOT NULL,
  "acumprestamos" VARCHAR(1)  NOT NULL,
  "codconprestamo" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('npfondoprestaciones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npfondoprestaciones" IS '';


-----------------------------------------------------------------------------
-- npforcaremp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npforcaremp" CASCADE;

DROP SEQUENCE IF EXISTS "npforcaremp_seq";

CREATE SEQUENCE "npforcaremp_seq";


CREATE TABLE "npforcaremp"
(
  "codcat" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "suebas" NUMERIC(14,2)  NOT NULL,
  "suplen" NUMERIC(14,2),
  "priant" NUMERIC(14,2),
  "hediur" NUMERIC(14,2),
  "pordiu" NUMERIC(14,2),
  "henoct" NUMERIC(14,2),
  "pornoc1" NUMERIC(14,2),
  "pornoc2" NUMERIC(14,2),
  "bonvac" NUMERIC(14,2),
  "clau74" NUMERIC(14,2),
  "otrcom" NUMERIC(14,2),
  "priefi" NUMERIC(14,2),
  "pritra" NUMERIC(14,2),
  "aguinal" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npforcaremp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npforcaremp" IS '';


-----------------------------------------------------------------------------
-- npgrulab
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npgrulab" CASCADE;

DROP SEQUENCE IF EXISTS "npgrulab_seq";

CREATE SEQUENCE "npgrulab_seq";


CREATE TABLE "npgrulab"
(
  "codgrulab" VARCHAR(4),
  "desgrulab" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npgrulab_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npgrulab" IS '';


-----------------------------------------------------------------------------
-- npgrunom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npgrunom" CASCADE;

DROP SEQUENCE IF EXISTS "npgrunom_seq";

CREATE SEQUENCE "npgrunom_seq";


CREATE TABLE "npgrunom"
(
  "codgrunom" VARCHAR(3),
  "nomgrunom" VARCHAR(250),
  "codnom" VARCHAR(3),
  "tipo" VARCHAR(1),
  "fecha1" DATE,
  "fecha2" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npgrunom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npgrunom" IS '';


-----------------------------------------------------------------------------
-- npguarde
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npguarde" CASCADE;

DROP SEQUENCE IF EXISTS "npguarde_seq";

CREATE SEQUENCE "npguarde_seq";


CREATE TABLE "npguarde"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "nomgua" VARCHAR(250),
  "nomcon" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npguarde_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npguarde" IS '';


-----------------------------------------------------------------------------
-- nphiineg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphiineg" CASCADE;

DROP SEQUENCE IF EXISTS "nphiineg_seq";

CREATE SEQUENCE "nphiineg_seq";


CREATE TABLE "nphiineg"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "fecing" DATE  NOT NULL,
  "fecegr" DATE  NOT NULL,
  "observ" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphiineg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphiineg" IS '';


-----------------------------------------------------------------------------
-- nphisasicaremp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphisasicaremp" CASCADE;

DROP SEQUENCE IF EXISTS "nphisasicaremp_seq";

CREATE SEQUENCE "nphisasicaremp_seq";


CREATE TABLE "nphisasicaremp"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codcat" VARCHAR(16)  NOT NULL,
  "fecasi" DATE  NOT NULL,
  "nomemp" VARCHAR(51),
  "nomcar" VARCHAR(30),
  "nomnom" VARCHAR(29),
  "nomcat" VARCHAR(40),
  "unieje" VARCHAR(30),
  "sueldo" NUMERIC(14,2),
  "status" VARCHAR(1)  NOT NULL,
  "montonomina" NUMERIC(14,2),
  "codtip" VARCHAR(32),
  "codtipgas" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphisasicaremp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphisasicaremp" IS '';


-----------------------------------------------------------------------------
-- nphiscon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphiscon" CASCADE;

DROP SEQUENCE IF EXISTS "nphiscon_seq";

CREATE SEQUENCE "nphiscon_seq";


CREATE TABLE "nphiscon"
(
  "codnom" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "codcon" VARCHAR(3),
  "fecnom" DATE,
  "monto" NUMERIC(14,2),
  "codcat" VARCHAR(32),
  "codpar" VARCHAR(16),
  "codescuela" VARCHAR(7),
  "codniv" VARCHAR(16),
  "codtipgas" VARCHAR(4),
  "nomcon" VARCHAR(100),
  "numrec" NUMERIC(14,2),
  "cantidad" NUMERIC(18,3),
  "fecnomdes" DATE,
  "especial" VARCHAR(1),
  "fecnomespdes" DATE,
  "fecnomesphas" DATE,
  "codnomesp" VARCHAR(3),
  "nomnomesp" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphiscon" IS '';


-----------------------------------------------------------------------------
-- nphiscon_06022007_sincambio
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphiscon_06022007_sincambio" CASCADE;

DROP SEQUENCE IF EXISTS "nphiscon_06022007_sincambio_seq";

CREATE SEQUENCE "nphiscon_06022007_sincambio_seq";


CREATE TABLE "nphiscon_06022007_sincambio"
(
  "codnom" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "codcon" VARCHAR(3),
  "fecnom" DATE,
  "monto" NUMERIC(14,2),
  "codcat" VARCHAR(32),
  "codpar" VARCHAR(16),
  "codescuela" VARCHAR(7),
  "codniv" VARCHAR(16),
  "codtipgas" VARCHAR(4),
  "nomcon" VARCHAR(100),
  "numrec" NUMERIC(14,2),
  "cantidad" NUMERIC(18,3),
  "fecnomdes" DATE,
  "especial" VARCHAR(1),
  "fecnomespdes" DATE,
  "fecnomesphas" DATE,
  "codnomesp" VARCHAR(3),
  "nomnomesp" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_06022007_sincambio_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphiscon_06022007_sincambio" IS '';


-----------------------------------------------------------------------------
-- nphiscon_borra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphiscon_borra" CASCADE;

DROP SEQUENCE IF EXISTS "nphiscon_borra_seq";

CREATE SEQUENCE "nphiscon_borra_seq";


CREATE TABLE "nphiscon_borra"
(
  "codnom" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "codcon" VARCHAR(3),
  "fecnom" DATE,
  "monto" NUMERIC(14,2),
  "codcat" VARCHAR(16),
  "codpar" VARCHAR(16),
  "codescuela" VARCHAR(7),
  "codniv" VARCHAR(16),
  "codtipgas" VARCHAR(4),
  "nomcon" VARCHAR(100),
  "numrec" NUMERIC(14,2),
  "cantidad" NUMERIC(18,3),
  "fecnomdes" DATE,
  "especial" VARCHAR(1) default '',
  "fecnomespdes" DATE,
  "fecnomesphas" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_borra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphiscon_borra" IS '';


-----------------------------------------------------------------------------
-- nphiscon_old
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphiscon_old" CASCADE;

DROP SEQUENCE IF EXISTS "nphiscon_old_seq";

CREATE SEQUENCE "nphiscon_old_seq";


CREATE TABLE "nphiscon_old"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "fecnom" DATE  NOT NULL,
  "monto" NUMERIC(14,2),
  "codcat" VARCHAR(32),
  "codpar" VARCHAR(16),
  "codescuela" VARCHAR(7),
  "codniv" VARCHAR(16),
  "codtipgas" VARCHAR(4),
  "nomcon" VARCHAR(100),
  "numrec" NUMERIC(14,2),
  "cantidad" NUMERIC(18,3),
  "fecnomdes" DATE,
  "especial" VARCHAR(1) default '',
  "fecnomespdes" DATE,
  "fecnomesphas" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_old_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphiscon_old" IS '';


CREATE INDEX "i01nphiscon" ON "nphiscon_old" ("codnom","codemp","codcar","codcon","fecnom");

CREATE INDEX "i02nphiscon" ON "nphiscon_old" ("codnom","codcon","fecnom");

-----------------------------------------------------------------------------
-- nphiscon_r
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphiscon_r" CASCADE;

DROP SEQUENCE IF EXISTS "nphiscon_r_seq";

CREATE SEQUENCE "nphiscon_r_seq";


CREATE TABLE "nphiscon_r"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "fecnom" DATE  NOT NULL,
  "monto" NUMERIC(14,2),
  "codcat" VARCHAR(16),
  "codpar" VARCHAR(16),
  "codescuela" VARCHAR(7),
  "codniv" VARCHAR(16),
  "codtipgas" VARCHAR(4),
  "nomcon" VARCHAR(100),
  "numrec" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_r_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphiscon_r" IS '';


-----------------------------------------------------------------------------
-- nphispre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphispre" CASCADE;

DROP SEQUENCE IF EXISTS "nphispre_seq";

CREATE SEQUENCE "nphispre_seq";


CREATE TABLE "nphispre"
(
  "codtippre" VARCHAR(4)  NOT NULL,
  "fechispre" DATE,
  "deshispre" VARCHAR(250),
  "codemp" VARCHAR(16)  NOT NULL,
  "monpre" NUMERIC(14,2)  NOT NULL,
  "saldo" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphispre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphispre" IS '';


-----------------------------------------------------------------------------
-- nphojint
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphojint" CASCADE;

DROP SEQUENCE IF EXISTS "nphojint_seq";

CREATE SEQUENCE "nphojint_seq";


CREATE TABLE "nphojint"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "nomemp" VARCHAR(100)  NOT NULL,
  "cedemp" VARCHAR(10)  NOT NULL,
  "numcon" VARCHAR(20),
  "edociv" VARCHAR(1),
  "nacemp" VARCHAR(1),
  "sexemp" VARCHAR(1),
  "fecnac" DATE,
  "edaemp" NUMERIC(2),
  "lugnac" VARCHAR(30),
  "dirhab" VARCHAR(1000),
  "codciu" VARCHAR(4),
  "telhab" VARCHAR(20),
  "celemp" VARCHAR(20),
  "emaemp" VARCHAR(40),
  "codpos" VARCHAR(4),
  "talpan" VARCHAR(2),
  "talcam" VARCHAR(4),
  "talcal" NUMERIC(2),
  "derzur" VARCHAR(1),
  "fecing" DATE,
  "fecret" DATE,
  "fecrei" DATE,
  "fecadmpub" DATE,
  "staemp" VARCHAR(1)  NOT NULL,
  "fotemp" VARCHAR(100),
  "numsso" VARCHAR(31),
  "numpolseg" VARCHAR(31),
  "feccotsso" DATE,
  "anoadmpub" NUMERIC(14,2),
  "codtippag" VARCHAR(2),
  "codban" VARCHAR(2),
  "tipcue" VARCHAR(20),
  "numcue" VARCHAR(31),
  "obsemp" VARCHAR(100),
  "tiefid" VARCHAR(1),
  "grulab" VARCHAR(4),
  "gruotr" VARCHAR(30),
  "traslado" VARCHAR(1),
  "traotr" VARCHAR(30),
  "tipviv" VARCHAR(1),
  "vivotr" VARCHAR(30),
  "forten" VARCHAR(1),
  "tenotr" VARCHAR(30),
  "sercon" VARCHAR(16),
  "dirotr" VARCHAR(1000),
  "telotr" VARCHAR(100),
  "codpai" VARCHAR(4),
  "codpa2" VARCHAR(4),
  "codest" VARCHAR(4),
  "codes2" VARCHAR(4),
  "codci2" VARCHAR(4),
  "codrac" VARCHAR(10),
  "codniv" VARCHAR(16),
  "telha2" VARCHAR(20),
  "telot2" VARCHAR(100),
  "codprofes" VARCHAR(4),
  "hcmexo" VARCHAR(1),
  "codbanfid" VARCHAR(2),
  "codbanlph" VARCHAR(2),
  "numcuefid" VARCHAR(31),
  "numcuelph" VARCHAR(31),
  "codempant" VARCHAR(14),
  "grusan" VARCHAR(10),
  "obsgen" VARCHAR(1000),
  "codregpai" VARCHAR(4),
  "codregest" VARCHAR(4),
  "codregciu" VARCHAR(4),
  "fecgra" DATE,
  "grusangre" VARCHAR(5),
  "numgaceta" VARCHAR(15),
  "fecgaceta" DATE,
  "diagra" VARCHAR(2),
  "mesgra" VARCHAR(2),
  "anogra" VARCHAR(4),
  "temporal" NUMERIC(1),
  "detexp" VARCHAR(15),
  "numexp" VARCHAR(15),
  "modpagcestic" VARCHAR(1),
  "codret" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphojint_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "un_nphojint" UNIQUE ("cedemp")
);

COMMENT ON TABLE "nphojint" IS '';


-----------------------------------------------------------------------------
-- nphojintban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nphojintban" CASCADE;

DROP SEQUENCE IF EXISTS "nphojintban_seq";

CREATE SEQUENCE "nphojintban_seq";


CREATE TABLE "nphojintban"
(
  "codemp" VARCHAR(16),
  "ctaban" VARCHAR(31),
  "codban" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nphojintban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nphojintban" IS '';


-----------------------------------------------------------------------------
-- npimppresoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npimppresoc" CASCADE;

DROP SEQUENCE IF EXISTS "npimppresoc_seq";

CREATE SEQUENCE "npimppresoc_seq";


CREATE TABLE "npimppresoc"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "feccor" DATE  NOT NULL,
  "fecini" DATE  NOT NULL,
  "fecfin" DATE  NOT NULL,
  "salemp" NUMERIC(14,2)  NOT NULL,
  "salempdia" NUMERIC(14,2),
  "aliuti" NUMERIC(14,2),
  "alibono" NUMERIC(14,2),
  "saltot" NUMERIC(14,2)  NOT NULL,
  "diaart108" NUMERIC(5),
  "capemp" NUMERIC(14,2),
  "antacum" NUMERIC(14,2)  NOT NULL,
  "valart108" NUMERIC(14,2),
  "tasint" NUMERIC(6,2),
  "diadif" NUMERIC(3),
  "intdev" NUMERIC(14,2),
  "intacum" NUMERIC(14,2)  NOT NULL,
  "adeant" NUMERIC(14,2),
  "adepre" NUMERIC(14,2),
  "regpre" VARCHAR(1),
  "saladi" NUMERIC(14,2),
  "anoser" NUMERIC(2),
  "tipo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npimppresoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npimppresoc" IS '';


CREATE INDEX "i01npimppresoc" ON "npimppresoc" ("codemp","feccor");

-----------------------------------------------------------------------------
-- npimppresoc1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npimppresoc1" CASCADE;

DROP SEQUENCE IF EXISTS "npimppresoc1_seq";

CREATE SEQUENCE "npimppresoc1_seq";


CREATE TABLE "npimppresoc1"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "feccor" DATE  NOT NULL,
  "fecini" DATE  NOT NULL,
  "fecfin" DATE  NOT NULL,
  "tasint" NUMERIC(6,2),
  "diadif" NUMERIC(3),
  "capvie" NUMERIC(14,2),
  "capcap" NUMERIC(14,2)  NOT NULL,
  "intdev" NUMERIC(14,2),
  "intacum" NUMERIC(14,2)  NOT NULL,
  "adepre" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npimppresoc1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npimppresoc1" IS '';


CREATE INDEX "i01npimppresoc1" ON "npimppresoc1" ("codemp","feccor");

-----------------------------------------------------------------------------
-- npimppresocant
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npimppresocant" CASCADE;

DROP SEQUENCE IF EXISTS "npimppresocant_seq";

CREATE SEQUENCE "npimppresocant_seq";


CREATE TABLE "npimppresocant"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "feccor" DATE  NOT NULL,
  "fecini" DATE  NOT NULL,
  "fecfin" DATE  NOT NULL,
  "salemp" NUMERIC(14,2)  NOT NULL,
  "tasint" NUMERIC(6,2),
  "capemp" NUMERIC(14,2),
  "intdev" NUMERIC(14,2),
  "antacum" NUMERIC(14,2)  NOT NULL,
  "anoser" NUMERIC(2),
  "adeant" NUMERIC(14,2),
  "intacum" NUMERIC(14,2)  NOT NULL,
  "diadif" NUMERIC(3),
  "regpre" VARCHAR(1),
  "diaart108" NUMERIC(5),
  "valart108" NUMERIC(14,2),
  "adepre" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npimppresocant_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npimppresocant" IS '';


CREATE INDEX "i01npimppresocant" ON "npimppresocant" ("codemp","feccor");

-----------------------------------------------------------------------------
-- npinfadi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npinfadi" CASCADE;

DROP SEQUENCE IF EXISTS "npinfadi_seq";

CREATE SEQUENCE "npinfadi_seq";


CREATE TABLE "npinfadi"
(
  "codemp" VARCHAR(16),
  "nomtit" VARCHAR(40),
  "descur" VARCHAR(60),
  "instit" VARCHAR(250),
  "durcur" VARCHAR(50),
  "fecini" DATE,
  "fecfin" DATE,
  "nivest" VARCHAR(40),
  "diaini" VARCHAR(2),
  "mesini" VARCHAR(2),
  "anoini" VARCHAR(4),
  "diafin" VARCHAR(2),
  "mesfin" VARCHAR(2),
  "anofin" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('npinfadi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npinfadi" IS '';


-----------------------------------------------------------------------------
-- npinfcur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npinfcur" CASCADE;

DROP SEQUENCE IF EXISTS "npinfcur_seq";

CREATE SEQUENCE "npinfcur_seq";


CREATE TABLE "npinfcur"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "nomtit" VARCHAR(40)  NOT NULL,
  "descur" VARCHAR(60),
  "instit" VARCHAR(200)  NOT NULL,
  "durcur" VARCHAR(15)  NOT NULL,
  "anocul" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('npinfcur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npinfcur" IS '';


-----------------------------------------------------------------------------
-- npinfcur_rene
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npinfcur_rene" CASCADE;

DROP SEQUENCE IF EXISTS "npinfcur_rene_seq";

CREATE SEQUENCE "npinfcur_rene_seq";


CREATE TABLE "npinfcur_rene"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "nomtit" VARCHAR(40)  NOT NULL,
  "descur" VARCHAR(60),
  "instit" VARCHAR(200)  NOT NULL,
  "durcur" VARCHAR(15)  NOT NULL,
  "feccur" DATE,
  "fecini" DATE,
  "fecfin" DATE,
  "nivest" VARCHAR(40),
  "diaini" VARCHAR(2),
  "mesini" VARCHAR(2),
  "anoini" VARCHAR(4),
  "diafin" VARCHAR(2),
  "mesfin" VARCHAR(2),
  "anofin" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('npinfcur_rene_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npinfcur_rene" IS '';


-----------------------------------------------------------------------------
-- npinffam
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npinffam" CASCADE;

DROP SEQUENCE IF EXISTS "npinffam_seq";

CREATE SEQUENCE "npinffam_seq";


CREATE TABLE "npinffam"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "cedfam" VARCHAR(10),
  "nomfam" VARCHAR(250)  NOT NULL,
  "sexfam" VARCHAR(1)  NOT NULL,
  "fecnac" DATE  NOT NULL,
  "edafam" NUMERIC(2)  NOT NULL,
  "parfam" VARCHAR(10)  NOT NULL,
  "edociv" VARCHAR(1),
  "grains" VARCHAR(30),
  "traofi" VARCHAR(30),
  "codgua" VARCHAR(3),
  "seghcm" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npinffam_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npinffam" IS '';


-----------------------------------------------------------------------------
-- npinstitutos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npinstitutos" CASCADE;

DROP SEQUENCE IF EXISTS "npinstitutos_seq";

CREATE SEQUENCE "npinstitutos_seq";


CREATE TABLE "npinstitutos"
(
  "codins" VARCHAR(4),
  "nomins" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npinstitutos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npinstitutos" IS '';


-----------------------------------------------------------------------------
-- npinteresesprestaciones
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npinteresesprestaciones" CASCADE;

DROP SEQUENCE IF EXISTS "npinteresesprestaciones_seq";

CREATE SEQUENCE "npinteresesprestaciones_seq";


CREATE TABLE "npinteresesprestaciones"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "fecpago" DATE  NOT NULL,
  "feccalculo" DATE  NOT NULL,
  "acufondoantiguedad" NUMERIC(14,2)  NOT NULL,
  "acuinteres" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npinteresesprestaciones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npinteresesprestaciones" IS '';


-----------------------------------------------------------------------------
-- npintfecref
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npintfecref" CASCADE;

DROP SEQUENCE IF EXISTS "npintfecref_seq";

CREATE SEQUENCE "npintfecref_seq";


CREATE TABLE "npintfecref"
(
  "feciniref" DATE  NOT NULL,
  "fecfinref" DATE  NOT NULL,
  "tasint" NUMERIC(5,2),
  "tasintpro" NUMERIC(5,2)  NOT NULL,
  "tasintpas" NUMERIC(5,2)  NOT NULL,
  "tasintact" NUMERIC(5,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npintfecref_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npintfecref" IS '';


-----------------------------------------------------------------------------
-- npintfecrefdaniel
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npintfecrefdaniel" CASCADE;

DROP SEQUENCE IF EXISTS "npintfecrefdaniel_seq";

CREATE SEQUENCE "npintfecrefdaniel_seq";


CREATE TABLE "npintfecrefdaniel"
(
  "feciniref" DATE  NOT NULL,
  "fecfinref" DATE  NOT NULL,
  "tasint" NUMERIC(5,2),
  "tasintpro" NUMERIC(5,2)  NOT NULL,
  "tasintpas" NUMERIC(5,2)  NOT NULL,
  "tasintact" NUMERIC(5,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npintfecrefdaniel_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npintfecrefdaniel" IS '';


-----------------------------------------------------------------------------
-- npintfid
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npintfid" CASCADE;

DROP SEQUENCE IF EXISTS "npintfid_seq";

CREATE SEQUENCE "npintfid_seq";


CREATE TABLE "npintfid"
(
  "fecdesde" DATE,
  "fechasta" DATE,
  "codemp" VARCHAR(16),
  "fechaint" DATE,
  "depos" NUMERIC(14,2),
  "deposacum" NUMERIC(14,2),
  "capital" NUMERIC(14,2),
  "tasa" NUMERIC(14,2),
  "interes" NUMERIC(14,2),
  "interesacum" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npintfid_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npintfid" IS '';


-----------------------------------------------------------------------------
-- npintpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npintpre" CASCADE;

DROP SEQUENCE IF EXISTS "npintpre_seq";

CREATE SEQUENCE "npintpre_seq";


CREATE TABLE "npintpre"
(
  "numdec" VARCHAR(16)  NOT NULL,
  "despre" DATE  NOT NULL,
  "haspre" DATE  NOT NULL,
  "porpre" NUMERIC(5,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npintpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npintpre" IS '';


-----------------------------------------------------------------------------
-- npislr
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npislr" CASCADE;

DROP SEQUENCE IF EXISTS "npislr_seq";

CREATE SEQUENCE "npislr_seq";


CREATE TABLE "npislr"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codconpor" VARCHAR(3),
  "codconimp" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npislr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npislr" IS '';


-----------------------------------------------------------------------------
-- npjefes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npjefes" CASCADE;

DROP SEQUENCE IF EXISTS "npjefes_seq";

CREATE SEQUENCE "npjefes_seq";


CREATE TABLE "npjefes"
(
  "presupuesto" VARCHAR(100),
  "administracion" VARCHAR(100),
  "personal" VARCHAR(100),
  "rector" VARCHAR(100),
  "vicerector" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('npjefes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npjefes" IS '';


-----------------------------------------------------------------------------
-- npliqemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npliqemp" CASCADE;

DROP SEQUENCE IF EXISTS "npliqemp_seq";

CREATE SEQUENCE "npliqemp_seq";


CREATE TABLE "npliqemp"
(
  "codemp" VARCHAR(10)  NOT NULL,
  "numord" NUMERIC(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "refcau" VARCHAR(8)  NOT NULL,
  "tipprc" VARCHAR(4)  NOT NULL,
  "refprc" VARCHAR(8)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(24)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "numrif" VARCHAR(12)  NOT NULL,
  "monpag" NUMERIC(14,2)  NOT NULL,
  "monaju" NUMERIC(14,2)  NOT NULL,
  "conpag" VARCHAR(50)  NOT NULL,
  "caupag" NUMERIC(14,2)  NOT NULL,
  "status" VARCHAR(3)  NOT NULL,
  "codcue" VARCHAR(16)  NOT NULL,
  "codban" VARCHAR(2)  NOT NULL,
  "numche" VARCHAR(10)  NOT NULL,
  "nomdes" VARCHAR(18)  NOT NULL,
  "codcuedes" VARCHAR(16)  NOT NULL,
  "despag" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npliqemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npliqemp" IS '';


-----------------------------------------------------------------------------
-- npliquidacion_det
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npliquidacion_det" CASCADE;

DROP SEQUENCE IF EXISTS "npliquidacion_det_seq";

CREATE SEQUENCE "npliquidacion_det_seq";


CREATE TABLE "npliquidacion_det"
(
  "codemp" VARCHAR(16),
  "concepto" VARCHAR(250),
  "monto" NUMERIC(14,2),
  "asided" VARCHAR(1),
  "numreg" NUMERIC(4),
  "codpre" VARCHAR(32),
  "codcon" VARCHAR(3),
  "numord" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('npliquidacion_det_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npliquidacion_det" IS '';


-----------------------------------------------------------------------------
-- npmemcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npmemcon" CASCADE;

DROP SEQUENCE IF EXISTS "npmemcon_seq";

CREATE SEQUENCE "npmemcon_seq";


CREATE TABLE "npmemcon"
(
  "codmen" VARCHAR(100),
  "codcon" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npmemcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmemcon" IS '';


-----------------------------------------------------------------------------
-- npmemos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npmemos" CASCADE;

DROP SEQUENCE IF EXISTS "npmemos_seq";

CREATE SEQUENCE "npmemos_seq";


CREATE TABLE "npmemos"
(
  "codmem" VARCHAR(100),
  "codcon" VARCHAR(3),
  "nomcon" VARCHAR(100),
  "nomben" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('npmemos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmemos" IS '';


-----------------------------------------------------------------------------
-- npmotant
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npmotant" CASCADE;

DROP SEQUENCE IF EXISTS "npmotant_seq";

CREATE SEQUENCE "npmotant_seq";


CREATE TABLE "npmotant"
(
  "codmotant" VARCHAR(4)  NOT NULL,
  "desmotant" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npmotant_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmotant" IS '';


-----------------------------------------------------------------------------
-- npmotfal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npmotfal" CASCADE;

DROP SEQUENCE IF EXISTS "npmotfal_seq";

CREATE SEQUENCE "npmotfal_seq";


CREATE TABLE "npmotfal"
(
  "codmotfal" VARCHAR(4)  NOT NULL,
  "desmotfal" VARCHAR(250)  NOT NULL,
  "causa" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npmotfal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmotfal" IS '';


-----------------------------------------------------------------------------
-- npmotliq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npmotliq" CASCADE;

DROP SEQUENCE IF EXISTS "npmotliq_seq";

CREATE SEQUENCE "npmotliq_seq";


CREATE TABLE "npmotliq"
(
  "codmotliq" VARCHAR(4)  NOT NULL,
  "desmotliq" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npmotliq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmotliq" IS '';


-----------------------------------------------------------------------------
-- npmovian
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npmovian" CASCADE;

DROP SEQUENCE IF EXISTS "npmovian_seq";

CREATE SEQUENCE "npmovian_seq";


CREATE TABLE "npmovian"
(
  "codemp" VARCHAR(16),
  "codcon" VARCHAR(3),
  "moncon" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npmovian_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmovian" IS '';


-----------------------------------------------------------------------------
-- npmovrac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npmovrac" CASCADE;

DROP SEQUENCE IF EXISTS "npmovrac_seq";

CREATE SEQUENCE "npmovrac_seq";


CREATE TABLE "npmovrac"
(
  "nronom" VARCHAR(16)  NOT NULL,
  "perrac" VARCHAR(1)  NOT NULL,
  "anorac" VARCHAR(4)  NOT NULL,
  "tipmov" VARCHAR(1)  NOT NULL,
  "fecmov" DATE  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "codcarapr" VARCHAR(16),
  "nomcarapr" VARCHAR(50),
  "suecarapr" NUMERIC(14,2),
  "comcarapr" NUMERIC(14,2),
  "codocpapr" VARCHAR(16),
  "pasocpapr" VARCHAR(3),
  "codempapr" VARCHAR(16),
  "nomempapr" VARCHAR(250),
  "codcatapr" VARCHAR(32),
  "estorgapr" VARCHAR(16),
  "codcarpro" VARCHAR(16),
  "nomcarpro" VARCHAR(50),
  "suecarpro" NUMERIC(14,2),
  "comcarpro" NUMERIC(14,2),
  "codocppro" VARCHAR(16),
  "pasocppro" VARCHAR(3),
  "codemppro" VARCHAR(16),
  "nomemppro" VARCHAR(250),
  "codcatpro" VARCHAR(32),
  "estorgpro" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npmovrac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmovrac" IS '';


-----------------------------------------------------------------------------
-- npmunicipios
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npmunicipios" CASCADE;

DROP SEQUENCE IF EXISTS "npmunicipios_seq";

CREATE SEQUENCE "npmunicipios_seq";


CREATE TABLE "npmunicipios"
(
  "codmunicipio" VARCHAR(14),
  "nombremunicipio" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('npmunicipios_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npmunicipios" IS '';


-----------------------------------------------------------------------------
-- npnivedu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npnivedu" CASCADE;

DROP SEQUENCE IF EXISTS "npnivedu_seq";

CREATE SEQUENCE "npnivedu_seq";


CREATE TABLE "npnivedu"
(
  "codniv" VARCHAR(4),
  "desniv" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npnivedu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npnivedu" IS '';


-----------------------------------------------------------------------------
-- npnomcal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npnomcal" CASCADE;

DROP SEQUENCE IF EXISTS "npnomcal_seq";

CREATE SEQUENCE "npnomcal_seq";


CREATE TABLE "npnomcal"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "frecon" VARCHAR(1)  NOT NULL,
  "asided" VARCHAR(1)  NOT NULL,
  "fecnom" DATE,
  "nomcon" VARCHAR(100),
  "nomnom" VARCHAR(100),
  "cantidad" NUMERIC(14,2),
  "monto" NUMERIC(14,2),
  "acucon" VARCHAR(1),
  "acumulado" NUMERIC(14,2),
  "saldo" NUMERIC(14,2),
  "numrec" NUMERIC(14,2),
  "fecnomdes" DATE,
  "especial" VARCHAR(1) default '' NOT NULL,
  "fecnomespdes" DATE,
  "fecnomesphas" DATE,
  "codnomesp" VARCHAR(3),
  "nomnomesp" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('npnomcal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npnomcal" IS '';


CREATE INDEX "i01npnomcal" ON "npnomcal" ("codnom","codemp","codcar","codcon");

-----------------------------------------------------------------------------
-- npnomcal_temp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npnomcal_temp" CASCADE;

DROP SEQUENCE IF EXISTS "npnomcal_temp_seq";

CREATE SEQUENCE "npnomcal_temp_seq";


CREATE TABLE "npnomcal_temp"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "frecon" VARCHAR(1)  NOT NULL,
  "asided" VARCHAR(1)  NOT NULL,
  "fecnom" DATE,
  "nomcon" VARCHAR(30),
  "nomnom" VARCHAR(30),
  "cantidad" NUMERIC(14,2),
  "monto" NUMERIC(14,2),
  "acucon" VARCHAR(1),
  "acumulado" NUMERIC(14,2),
  "saldo" NUMERIC(14,2),
  "numrec" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npnomcal_temp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npnomcal_temp" IS '';


-----------------------------------------------------------------------------
-- npnomcalhcm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npnomcalhcm" CASCADE;

DROP SEQUENCE IF EXISTS "npnomcalhcm_seq";

CREATE SEQUENCE "npnomcalhcm_seq";


CREATE TABLE "npnomcalhcm"
(
  "codnom" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codcon" VARCHAR(3),
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npnomcalhcm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npnomcalhcm" IS '';


-----------------------------------------------------------------------------
-- npnomespconnomtip
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npnomespconnomtip" CASCADE;

DROP SEQUENCE IF EXISTS "npnomespconnomtip_seq";

CREATE SEQUENCE "npnomespconnomtip_seq";


CREATE TABLE "npnomespconnomtip"
(
  "codnomesp" VARCHAR(3)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "especial" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npnomespconnomtip_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npnomespconnomtip" IS '';


-----------------------------------------------------------------------------
-- npnomespnomtip
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npnomespnomtip" CASCADE;

DROP SEQUENCE IF EXISTS "npnomespnomtip_seq";

CREATE SEQUENCE "npnomespnomtip_seq";


CREATE TABLE "npnomespnomtip"
(
  "codnomesp" VARCHAR(3)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npnomespnomtip_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npnomespnomtip" IS '';


-----------------------------------------------------------------------------
-- npnomesptipos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npnomesptipos" CASCADE;

DROP SEQUENCE IF EXISTS "npnomesptipos_seq";

CREATE SEQUENCE "npnomesptipos_seq";


CREATE TABLE "npnomesptipos"
(
  "codnomesp" VARCHAR(3)  NOT NULL,
  "desnomesp" VARCHAR(50)  NOT NULL,
  "fecnomdes" DATE,
  "fecnomhas" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npnomesptipos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npnomesptipos" IS '';


-----------------------------------------------------------------------------
-- npnomina
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npnomina" CASCADE;

DROP SEQUENCE IF EXISTS "npnomina_seq";

CREATE SEQUENCE "npnomina_seq";


CREATE TABLE "npnomina"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "nomnom" VARCHAR(100)  NOT NULL,
  "frecal" VARCHAR(1)  NOT NULL,
  "ultfec" DATE  NOT NULL,
  "profec" DATE  NOT NULL,
  "numsem" NUMERIC(2),
  "ordpag" VARCHAR(1)  NOT NULL,
  "tipcau" VARCHAR(4),
  "refcau" VARCHAR(8),
  "tipprc" VARCHAR(4),
  "refprc" VARCHAR(8),
  "tipcom" VARCHAR(4),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('npnomina_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npnomina" IS '';


-----------------------------------------------------------------------------
-- npordpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npordpag" CASCADE;

DROP SEQUENCE IF EXISTS "npordpag_seq";

CREATE SEQUENCE "npordpag_seq";


CREATE TABLE "npordpag"
(
  "numord" NUMERIC(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "refcau" VARCHAR(8)  NOT NULL,
  "tipprc" VARCHAR(4)  NOT NULL,
  "refprc" VARCHAR(8)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(24)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "numrif" VARCHAR(12)  NOT NULL,
  "codemp" VARCHAR(10)  NOT NULL,
  "monpag" NUMERIC(14,2)  NOT NULL,
  "monaju" NUMERIC(14,2)  NOT NULL,
  "conpag" VARCHAR(50)  NOT NULL,
  "caupag" NUMERIC(14,2)  NOT NULL,
  "status" VARCHAR(3)  NOT NULL,
  "codcue" VARCHAR(16)  NOT NULL,
  "codban" VARCHAR(2)  NOT NULL,
  "numche" VARCHAR(10)  NOT NULL,
  "nomdes" VARCHAR(18)  NOT NULL,
  "codcuedes" VARCHAR(16)  NOT NULL,
  "despag" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npordpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npordpag" IS '';


-----------------------------------------------------------------------------
-- nppagint
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nppagint" CASCADE;

DROP SEQUENCE IF EXISTS "nppagint_seq";

CREATE SEQUENCE "nppagint_seq";


CREATE TABLE "nppagint"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "monpag" NUMERIC(14,2)  NOT NULL,
  "salint" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nppagint_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nppagint" IS '';


-----------------------------------------------------------------------------
-- nppais
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nppais" CASCADE;

DROP SEQUENCE IF EXISTS "nppais_seq";

CREATE SEQUENCE "nppais_seq";


CREATE TABLE "nppais"
(
  "codpai" VARCHAR(4)  NOT NULL,
  "nompai" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nppais_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nppais" IS '';


-----------------------------------------------------------------------------
-- nppercar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nppercar" CASCADE;

DROP SEQUENCE IF EXISTS "nppercar_seq";

CREATE SEQUENCE "nppercar_seq";


CREATE TABLE "nppercar"
(
  "codperfil" VARCHAR(4)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "puntos" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nppercar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nppercar" IS '';


-----------------------------------------------------------------------------
-- npperemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npperemp" CASCADE;

DROP SEQUENCE IF EXISTS "npperemp_seq";

CREATE SEQUENCE "npperemp_seq";


CREATE TABLE "npperemp"
(
  "codperfil" VARCHAR(4)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npperemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npperemp" IS '';


-----------------------------------------------------------------------------
-- npperfil
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npperfil" CASCADE;

DROP SEQUENCE IF EXISTS "npperfil_seq";

CREATE SEQUENCE "npperfil_seq";


CREATE TABLE "npperfil"
(
  "codperfil" VARCHAR(4)  NOT NULL,
  "desperfil" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('npperfil_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npperfil" IS '';


-----------------------------------------------------------------------------
-- npperxdis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npperxdis" CASCADE;

DROP SEQUENCE IF EXISTS "npperxdis_seq";

CREATE SEQUENCE "npperxdis_seq";


CREATE TABLE "npperxdis"
(
  "codemp" VARCHAR(16),
  "perini" NUMERIC(4),
  "perfin" NUMERIC(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('npperxdis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npperxdis" IS '';


-----------------------------------------------------------------------------
-- nppreliq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nppreliq" CASCADE;

DROP SEQUENCE IF EXISTS "nppreliq_seq";

CREATE SEQUENCE "nppreliq_seq";


CREATE TABLE "nppreliq"
(
  "fecvig" DATE  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "mes" NUMERIC(6)  NOT NULL,
  "diapre" NUMERIC(14,2),
  "diaant" NUMERIC(14,2),
  "diavac" NUMERIC(14,2),
  "diavacfra" NUMERIC(14,2),
  "diabonvac" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nppreliq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nppreliq" IS '';


-----------------------------------------------------------------------------
-- nppresoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nppresoc" CASCADE;

DROP SEQUENCE IF EXISTS "nppresoc_seq";

CREATE SEQUENCE "nppresoc_seq";


CREATE TABLE "nppresoc"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "feccor" DATE  NOT NULL,
  "feccal" DATE,
  "codcon" VARCHAR(3),
  "diaser" NUMERIC(5),
  "messer" NUMERIC(5),
  "anoser" NUMERIC(2),
  "diatra" NUMERIC(5),
  "mestra" NUMERIC(5),
  "anotra" NUMERIC(2),
  "antacu" NUMERIC(14,2),
  "intacu" NUMERIC(14,2),
  "bontra" NUMERIC(14,2),
  "adepre" NUMERIC(14,2),
  "adeint" NUMERIC(14,2),
  "monpre" NUMERIC(14,2)  NOT NULL,
  "pasregant" NUMERIC(14,2),
  "stapre" VARCHAR(1),
  "regpre" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('nppresoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nppresoc" IS '';


-----------------------------------------------------------------------------
-- nppresocant
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nppresocant" CASCADE;

DROP SEQUENCE IF EXISTS "nppresocant_seq";

CREATE SEQUENCE "nppresocant_seq";


CREATE TABLE "nppresocant"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "feccor" DATE  NOT NULL,
  "feccal" DATE,
  "codcon" VARCHAR(3),
  "diaser" NUMERIC(5),
  "messer" NUMERIC(5),
  "anoser" NUMERIC(2),
  "diatra" NUMERIC(5),
  "mestra" NUMERIC(5),
  "anotra" NUMERIC(2),
  "antacu" NUMERIC(14,2),
  "intacu" NUMERIC(14,2),
  "bontra" NUMERIC(14,2),
  "adepre" NUMERIC(14,2),
  "adeint" NUMERIC(14,2),
  "monpre" NUMERIC(14,2)  NOT NULL,
  "pasregant" NUMERIC(14,2),
  "stapre" VARCHAR(1),
  "regpre" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('nppresocant_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nppresocant" IS '';


-----------------------------------------------------------------------------
-- nppresta
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nppresta" CASCADE;

DROP SEQUENCE IF EXISTS "nppresta_seq";

CREATE SEQUENCE "nppresta_seq";


CREATE TABLE "nppresta"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "fechas" DATE  NOT NULL,
  "monacu" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nppresta_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nppresta" IS '';

-----------------------------------------------------------------------------
-- npprofesion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npprofesion" CASCADE;

DROP SEQUENCE IF EXISTS "npprofesion_seq";

CREATE SEQUENCE "npprofesion_seq";


CREATE TABLE "npprofesion"
(
  "codprofes" VARCHAR(4)  NOT NULL,
  "desprofes" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('npprofesion_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npprofesion" IS '';




-----------------------------------------------------------------------------
-- npprocar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npprocar" CASCADE;

DROP SEQUENCE IF EXISTS "npprocar_seq";

CREATE SEQUENCE "npprocar_seq";


CREATE TABLE "npprocar"
(
  "codprofes" VARCHAR(4)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npprocar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npprocar" IS '';



-----------------------------------------------------------------------------
-- nprac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nprac" CASCADE;

DROP SEQUENCE IF EXISTS "nprac_seq";

CREATE SEQUENCE "nprac_seq";


CREATE TABLE "nprac"
(
  "codigo" VARCHAR(6)  NOT NULL,
  "forcod" VARCHAR(50)  NOT NULL,
  "observ" VARCHAR(100)  NOT NULL,
  "anodes" VARCHAR(4)  NOT NULL,
  "anohas" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nprac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nprac" IS '';


-----------------------------------------------------------------------------
-- nprelcajaho
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nprelcajaho" CASCADE;

DROP SEQUENCE IF EXISTS "nprelcajaho_seq";

CREATE SEQUENCE "nprelcajaho_seq";


CREATE TABLE "nprelcajaho"
(
  "codemp" VARCHAR(16),
  "conret" NUMERIC(14,2),
  "conapo" NUMERIC(14,2),
  "conpre" NUMERIC(14,2),
  "conseg" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nprelcajaho_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nprelcajaho" IS '';


-----------------------------------------------------------------------------
-- nprelconqui
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nprelconqui" CASCADE;

DROP SEQUENCE IF EXISTS "nprelconqui_seq";

CREATE SEQUENCE "nprelconqui_seq";


CREATE TABLE "nprelconqui"
(
  "codemp" VARCHAR(16),
  "codnom" VARCHAR(3),
  "codcon" VARCHAR(3),
  "cantidad" NUMERIC(14,2),
  "monto" NUMERIC(14,2),
  "fecini" DATE,
  "fecexp" DATE,
  "calcon" VARCHAR(1),
  "actcon" VARCHAR(1),
  "nomsus" VARCHAR(50),
  "codpre" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('nprelconqui_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nprelconqui" IS '';


CREATE INDEX "nprelconqui01" ON "nprelconqui" ("codemp","codcon");

CREATE INDEX "nprelconqui02" ON "nprelconqui" ("codemp");

CREATE INDEX "nprelconqui03" ON "nprelconqui" ("codcon");

-----------------------------------------------------------------------------
-- npsalint
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npsalint" CASCADE;

DROP SEQUENCE IF EXISTS "npsalint_seq";

CREATE SEQUENCE "npsalint_seq";


CREATE TABLE "npsalint"
(
  "codcon" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codasi" VARCHAR(3),
  "monasi" NUMERIC(14,2),
  "fecinicon" DATE,
  "fecfincon" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsalint" IS '';


-----------------------------------------------------------------------------
-- npsalint_03022007
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npsalint_03022007" CASCADE;

DROP SEQUENCE IF EXISTS "npsalint_03022007_seq";

CREATE SEQUENCE "npsalint_03022007_seq";


CREATE TABLE "npsalint_03022007"
(
  "codcon" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codasi" VARCHAR(3),
  "monasi" NUMERIC(14,2),
  "fecinicon" DATE,
  "fecfincon" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_03022007_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsalint_03022007" IS '';


-----------------------------------------------------------------------------
-- npsalint_05022007
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npsalint_05022007" CASCADE;

DROP SEQUENCE IF EXISTS "npsalint_05022007_seq";

CREATE SEQUENCE "npsalint_05022007_seq";


CREATE TABLE "npsalint_05022007"
(
  "codcon" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codasi" VARCHAR(3),
  "monasi" NUMERIC(14,2),
  "fecinicon" DATE,
  "fecfincon" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_05022007_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsalint_05022007" IS '';


-----------------------------------------------------------------------------
-- npsalint_06022007
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npsalint_06022007" CASCADE;

DROP SEQUENCE IF EXISTS "npsalint_06022007_seq";

CREATE SEQUENCE "npsalint_06022007_seq";


CREATE TABLE "npsalint_06022007"
(
  "codcon" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codasi" VARCHAR(3),
  "monasi" NUMERIC(14,2),
  "fecinicon" DATE,
  "fecfincon" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_06022007_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsalint_06022007" IS '';


-----------------------------------------------------------------------------
-- npseghcm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npseghcm" CASCADE;

DROP SEQUENCE IF EXISTS "npseghcm_seq";

CREATE SEQUENCE "npseghcm_seq";


CREATE TABLE "npseghcm"
(
  "codcon" VARCHAR(3),
  "tippar" VARCHAR(3),
  "edaddes" NUMERIC(14,2),
  "edadhas" NUMERIC(14,2),
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npseghcm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npseghcm" IS '';


-----------------------------------------------------------------------------
-- npsitemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npsitemp" CASCADE;

DROP SEQUENCE IF EXISTS "npsitemp_seq";

CREATE SEQUENCE "npsitemp_seq";


CREATE TABLE "npsitemp"
(
  "codsitemp" VARCHAR(1),
  "dessitemp" VARCHAR(250),
  "calnom" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npsitemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsitemp" IS '';


-----------------------------------------------------------------------------
-- npsso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npsso" CASCADE;

DROP SEQUENCE IF EXISTS "npsso_seq";

CREATE SEQUENCE "npsso_seq";


CREATE TABLE "npsso"
(
  "numsso" VARCHAR(4)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "fecinicot" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npsso_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsso" IS '';


-----------------------------------------------------------------------------
-- npsucban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npsucban" CASCADE;

DROP SEQUENCE IF EXISTS "npsucban_seq";

CREATE SEQUENCE "npsucban_seq";


CREATE TABLE "npsucban"
(
  "codban" VARCHAR(2),
  "nomban" VARCHAR(100),
  "codsuc" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npsucban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npsucban" IS '';


-----------------------------------------------------------------------------
-- nptabpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptabpre" CASCADE;

DROP SEQUENCE IF EXISTS "nptabpre_seq";

CREATE SEQUENCE "nptabpre_seq";


CREATE TABLE "nptabpre"
(
  "fecpre" DATE  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "diames" NUMERIC(2)  NOT NULL,
  "diaano" NUMERIC(2)  NOT NULL,
  "interes" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nptabpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptabpre" IS '';


-----------------------------------------------------------------------------
-- nptasfid
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptasfid" CASCADE;

DROP SEQUENCE IF EXISTS "nptasfid_seq";

CREATE SEQUENCE "nptasfid_seq";


CREATE TABLE "nptasfid"
(
  "fecdesde" DATE,
  "fechasta" DATE,
  "tasa" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptasfid_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptasfid" IS '';


-----------------------------------------------------------------------------
-- nptipact
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipact" CASCADE;

DROP SEQUENCE IF EXISTS "nptipact_seq";

CREATE SEQUENCE "nptipact_seq";


CREATE TABLE "nptipact"
(
  "codtipact" VARCHAR(2)  NOT NULL,
  "destipact" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipact" IS '';


-----------------------------------------------------------------------------
-- nptipadi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipadi" CASCADE;

DROP SEQUENCE IF EXISTS "nptipadi_seq";

CREATE SEQUENCE "nptipadi_seq";


CREATE TABLE "nptipadi"
(
  "codtit" VARCHAR(2)  NOT NULL,
  "destit" VARCHAR(40)  NOT NULL,
  "codadi" VARCHAR(4),
  "desadi" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipadi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipadi" IS '';


-----------------------------------------------------------------------------
-- nptipaportes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipaportes" CASCADE;

DROP SEQUENCE IF EXISTS "nptipaportes_seq";

CREATE SEQUENCE "nptipaportes_seq";


CREATE TABLE "nptipaportes"
(
  "codtipapo" VARCHAR(4)  NOT NULL,
  "destipapo" VARCHAR(250),
  "porret" NUMERIC(6,2),
  "porapo" NUMERIC(6,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipaportes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipaportes" IS '';


-----------------------------------------------------------------------------
-- nptipcar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipcar" CASCADE;

DROP SEQUENCE IF EXISTS "nptipcar_seq";

CREATE SEQUENCE "nptipcar_seq";


CREATE TABLE "nptipcar"
(
  "codtipcar" VARCHAR(3)  NOT NULL,
  "destipcar" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipcar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipcar" IS '';


-----------------------------------------------------------------------------
-- nptipcla
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipcla" CASCADE;

DROP SEQUENCE IF EXISTS "nptipcla_seq";

CREATE SEQUENCE "nptipcla_seq";


CREATE TABLE "nptipcla"
(
  "codtipcla" VARCHAR(2)  NOT NULL,
  "destipcla" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipcla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipcla" IS '';


-----------------------------------------------------------------------------
-- nptipcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipcon" CASCADE;

DROP SEQUENCE IF EXISTS "nptipcon_seq";

CREATE SEQUENCE "nptipcon_seq";


CREATE TABLE "nptipcon"
(
  "codtipcon" VARCHAR(3),
  "destipcon" VARCHAR(50),
  "frepagcon" VARCHAR(2),
  "alicuocon" NUMERIC(1),
  "diabonfinano" NUMERIC(3),
  "diabonvac" NUMERIC(3),
  "fecinireg" DATE,
  "art146" NUMERIC(1),
  "diaano" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipcon" IS '';


-----------------------------------------------------------------------------
-- nptipcon_old
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipcon_old" CASCADE;

DROP SEQUENCE IF EXISTS "nptipcon_old_seq";

CREATE SEQUENCE "nptipcon_old_seq";


CREATE TABLE "nptipcon_old"
(
  "codtipcon" VARCHAR(3)  NOT NULL,
  "destipcon" VARCHAR(50)  NOT NULL,
  "frepagcon" VARCHAR(2),
  "alicuocon" NUMERIC(1),
  "diabonfinano" NUMERIC(3),
  "diabonvac" NUMERIC(3),
  "fecinireg" DATE,
  "art146" NUMERIC(1),
  "diaano" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipcon_old_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipcon_old" IS '';


-----------------------------------------------------------------------------
-- nptipded
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipded" CASCADE;

DROP SEQUENCE IF EXISTS "nptipded_seq";

CREATE SEQUENCE "nptipded_seq";


CREATE TABLE "nptipded"
(
  "codtip" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipded_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipded" IS '';


-----------------------------------------------------------------------------
-- nptipesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipesp" CASCADE;

DROP SEQUENCE IF EXISTS "nptipesp_seq";

CREATE SEQUENCE "nptipesp_seq";


CREATE TABLE "nptipesp"
(
  "codtipesp" VARCHAR(3)  NOT NULL,
  "destipesp" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipesp" IS '';


-----------------------------------------------------------------------------
-- nptipgas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipgas" CASCADE;

DROP SEQUENCE IF EXISTS "nptipgas_seq";

CREATE SEQUENCE "nptipgas_seq";


CREATE TABLE "nptipgas"
(
  "codtipgas" VARCHAR(4),
  "destipgas" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipgas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipgas" IS '';


-----------------------------------------------------------------------------
-- nptipniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipniv" CASCADE;

DROP SEQUENCE IF EXISTS "nptipniv_seq";

CREATE SEQUENCE "nptipniv_seq";


CREATE TABLE "nptipniv"
(
  "codtipniv" VARCHAR(2)  NOT NULL,
  "maxsue" NUMERIC(32,2),
  "medsue" NUMERIC(32,2),
  "minsue" NUMERIC(32,2),
  "codtipcla" VARCHAR(2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipniv" IS '';


-----------------------------------------------------------------------------
-- nptippag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptippag" CASCADE;

DROP SEQUENCE IF EXISTS "nptippag_seq";

CREATE SEQUENCE "nptippag_seq";


CREATE TABLE "nptippag"
(
  "codtippag" VARCHAR(2)  NOT NULL,
  "nomtippag" VARCHAR(18)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nptippag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptippag" IS '';


-----------------------------------------------------------------------------
-- nptippar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptippar" CASCADE;

DROP SEQUENCE IF EXISTS "nptippar_seq";

CREATE SEQUENCE "nptippar_seq";


CREATE TABLE "nptippar"
(
  "tippar" VARCHAR(3),
  "despar" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptippar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptippar" IS '';


-----------------------------------------------------------------------------
-- nptipper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipper" CASCADE;

DROP SEQUENCE IF EXISTS "nptipper_seq";

CREATE SEQUENCE "nptipper_seq";


CREATE TABLE "nptipper"
(
  "codper" VARCHAR(4)  NOT NULL,
  "desper" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipper" IS '';


-----------------------------------------------------------------------------
-- nptippre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptippre" CASCADE;

DROP SEQUENCE IF EXISTS "nptippre_seq";

CREATE SEQUENCE "nptippre_seq";


CREATE TABLE "nptippre"
(
  "codcon" VARCHAR(3),
  "tippre" VARCHAR(3),
  "codtippre" VARCHAR(4),
  "destippre" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptippre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptippre" IS '';


-----------------------------------------------------------------------------
-- nptipret
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptipret" CASCADE;

DROP SEQUENCE IF EXISTS "nptipret_seq";

CREATE SEQUENCE "nptipret_seq";


CREATE TABLE "nptipret"
(
  "codret" VARCHAR(2),
  "desret" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptipret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptipret" IS '';


-----------------------------------------------------------------------------
-- nptitulos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nptitulos" CASCADE;

DROP SEQUENCE IF EXISTS "nptitulos_seq";

CREATE SEQUENCE "nptitulos_seq";


CREATE TABLE "nptitulos"
(
  "codniv" VARCHAR(4),
  "codtit" VARCHAR(4),
  "destit" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('nptitulos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nptitulos" IS '';


-----------------------------------------------------------------------------
-- npunicat
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npunicat" CASCADE;

DROP SEQUENCE IF EXISTS "npunicat_seq";

CREATE SEQUENCE "npunicat_seq";


CREATE TABLE "npunicat"
(
  "coduni" VARCHAR(16)  NOT NULL,
  "codcat" VARCHAR(32)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npunicat_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npunicat" IS '';


-----------------------------------------------------------------------------
-- npunieje
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npunieje" CASCADE;

DROP SEQUENCE IF EXISTS "npunieje_seq";

CREATE SEQUENCE "npunieje_seq";


CREATE TABLE "npunieje"
(
  "coduni" VARCHAR(16)  NOT NULL,
  "codniv" VARCHAR(16)  NOT NULL,
  "nomuni" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npunieje_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npunieje" IS '';


-----------------------------------------------------------------------------
-- npvacaciones
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacaciones" CASCADE;

DROP SEQUENCE IF EXISTS "npvacaciones_seq";

CREATE SEQUENCE "npvacaciones_seq";


CREATE TABLE "npvacaciones"
(
  "codemp" VARCHAR(16),
  "fechavac" DATE,
  "disfrutar" NUMERIC(14,2),
  "disfrutados" NUMERIC(14,2),
  "bonovac" NUMERIC(14,2),
  "bonopagado" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacaciones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacaciones" IS '';


-----------------------------------------------------------------------------
-- npvacant
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacant" CASCADE;

DROP SEQUENCE IF EXISTS "npvacant_seq";

CREATE SEQUENCE "npvacant_seq";


CREATE TABLE "npvacant"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "caudes" DATE  NOT NULL,
  "cauhas" DATE  NOT NULL,
  "diavac" NUMERIC(6)  NOT NULL,
  "diaant" NUMERIC(6),
  "diapag" NUMERIC(6),
  "diadis" NUMERIC(6),
  "monvac" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacant_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacant" IS '';


-----------------------------------------------------------------------------
-- npvaccol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvaccol" CASCADE;

DROP SEQUENCE IF EXISTS "npvaccol_seq";

CREATE SEQUENCE "npvaccol_seq";


CREATE TABLE "npvaccol"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "disdes" DATE  NOT NULL,
  "dishas" DATE  NOT NULL,
  "fecreg" DATE,
  "diavac" NUMERIC(6),
  "dianhab" NUMERIC(6),
  "stareg" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvaccol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvaccol" IS '';


-----------------------------------------------------------------------------
-- npvacdefgen
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacdefgen" CASCADE;

DROP SEQUENCE IF EXISTS "npvacdefgen_seq";

CREATE SEQUENCE "npvacdefgen_seq";


CREATE TABLE "npvacdefgen"
(
  "codnomvac" VARCHAR(3),
  "codconvac" VARCHAR(3),
  "pagoad" VARCHAR(1),
  "codconcom" VARCHAR(3),
  "codconuti" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacdefgen_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacdefgen" IS '';


-----------------------------------------------------------------------------
-- npvacdiadis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacdiadis" CASCADE;

DROP SEQUENCE IF EXISTS "npvacdiadis_seq";

CREATE SEQUENCE "npvacdiadis_seq";


CREATE TABLE "npvacdiadis"
(
  "rangodesde" NUMERIC(2),
  "rangohasta" NUMERIC(2),
  "diadis" NUMERIC(2),
  "codnom" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacdiadis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacdiadis" IS '';


-----------------------------------------------------------------------------
-- npvacdiafer
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacdiafer" CASCADE;

DROP SEQUENCE IF EXISTS "npvacdiafer_seq";

CREATE SEQUENCE "npvacdiafer_seq";


CREATE TABLE "npvacdiafer"
(
  "dia" NUMERIC(2),
  "mes" NUMERIC(2),
  "descripcion" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacdiafer_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacdiafer" IS '';


-----------------------------------------------------------------------------
-- npvacdiasbonovac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacdiasbonovac" CASCADE;

DROP SEQUENCE IF EXISTS "npvacdiasbonovac_seq";

CREATE SEQUENCE "npvacdiasbonovac_seq";


CREATE TABLE "npvacdiasbonovac"
(
  "codnom" VARCHAR(3),
  "perini" VARCHAR(4),
  "perfin" VARCHAR(4),
  "rangodesde" NUMERIC(2),
  "rangohasta" NUMERIC(2),
  "diasbonovac" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacdiasbonovac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacdiasbonovac" IS '';


-----------------------------------------------------------------------------
-- npvacdisfrute
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacdisfrute" CASCADE;

DROP SEQUENCE IF EXISTS "npvacdisfrute_seq";

CREATE SEQUENCE "npvacdisfrute_seq";


CREATE TABLE "npvacdisfrute"
(
  "codemp" VARCHAR(16),
  "perini" VARCHAR(4),
  "perfin" VARCHAR(4),
  "diasdisfutar" NUMERIC(14,2),
  "diasdisfrutados" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacdisfrute_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacdisfrute" IS '';


-----------------------------------------------------------------------------
-- npvacfra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacfra" CASCADE;

DROP SEQUENCE IF EXISTS "npvacfra_seq";

CREATE SEQUENCE "npvacfra_seq";


CREATE TABLE "npvacfra"
(
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "caudes" DATE  NOT NULL,
  "cauhas" DATE  NOT NULL,
  "diavac" NUMERIC(6,1),
  "diabon" NUMERIC(6,1),
  "monvac" NUMERIC(14,2),
  "monbon" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacfra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacfra" IS '';


-----------------------------------------------------------------------------
-- npvacjorlab
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacjorlab" CASCADE;

DROP SEQUENCE IF EXISTS "npvacjorlab_seq";

CREATE SEQUENCE "npvacjorlab_seq";


CREATE TABLE "npvacjorlab"
(
  "codnom" VARCHAR(3),
  "lunes" VARCHAR(1),
  "martes" VARCHAR(1),
  "miercoles" VARCHAR(1),
  "jueves" VARCHAR(1),
  "viernes" VARCHAR(1),
  "sabado" VARCHAR(1),
  "domingo" VARCHAR(1),
  "codcar" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacjorlab_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacjorlab" IS '';


-----------------------------------------------------------------------------
-- npvacliquidacion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacliquidacion" CASCADE;

DROP SEQUENCE IF EXISTS "npvacliquidacion_seq";

CREATE SEQUENCE "npvacliquidacion_seq";


CREATE TABLE "npvacliquidacion"
(
  "codemp" VARCHAR(16),
  "perini" VARCHAR(4),
  "perfin" VARCHAR(4),
  "diadis" NUMERIC(5,2),
  "diasbono" NUMERIC(5,2),
  "monto" NUMERIC(14,2),
  "ultsue" NUMERIC(20,2),
  "montoinci" NUMERIC(32,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacliquidacion_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacliquidacion" IS '';


-----------------------------------------------------------------------------
-- npvacregcalnom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacregcalnom" CASCADE;

DROP SEQUENCE IF EXISTS "npvacregcalnom_seq";

CREATE SEQUENCE "npvacregcalnom_seq";


CREATE TABLE "npvacregcalnom"
(
  "codnom" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "fechasalida" DATE,
  "fechaentrada" DATE,
  "periodos" NUMERIC(3),
  "fechanomina" DATE,
  "diasbono" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacregcalnom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacregcalnom" IS '';


-----------------------------------------------------------------------------
-- npvacregcondis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacregcondis" CASCADE;

DROP SEQUENCE IF EXISTS "npvacregcondis_seq";

CREATE SEQUENCE "npvacregcondis_seq";


CREATE TABLE "npvacregcondis"
(
  "codemp" VARCHAR(16),
  "codnom" VARCHAR(3),
  "fechasalida" DATE,
  "fechaentrada" DATE,
  "fechanomina" DATE,
  "diadis" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacregcondis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacregcondis" IS '';


-----------------------------------------------------------------------------
-- npvacregsal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacregsal" CASCADE;

DROP SEQUENCE IF EXISTS "npvacregsal_seq";

CREATE SEQUENCE "npvacregsal_seq";


CREATE TABLE "npvacregsal"
(
  "codnom" VARCHAR(3),
  "codemp" VARCHAR(16),
  "codcar" VARCHAR(16),
  "fechasalida" DATE,
  "fechaentrada" DATE,
  "diadis" NUMERIC(3),
  "perini" VARCHAR(4),
  "perfin" VARCHAR(4),
  "diasbono" NUMERIC(3),
  "stavac" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacregsal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacregsal" IS '';


-----------------------------------------------------------------------------
-- npvacsalidas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacsalidas" CASCADE;

DROP SEQUENCE IF EXISTS "npvacsalidas_seq";

CREATE SEQUENCE "npvacsalidas_seq";


CREATE TABLE "npvacsalidas"
(
  "codemp" VARCHAR(16),
  "fecvac" DATE,
  "diasdisfrutar" NUMERIC(14,2),
  "observa" VARCHAR(250),
  "fecdes" DATE,
  "fechas" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacsalidas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacsalidas" IS '';


-----------------------------------------------------------------------------
-- npvacsalidas_det
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npvacsalidas_det" CASCADE;

DROP SEQUENCE IF EXISTS "npvacsalidas_det_seq";

CREATE SEQUENCE "npvacsalidas_det_seq";


CREATE TABLE "npvacsalidas_det"
(
  "codemp" VARCHAR(16),
  "perini" VARCHAR(4),
  "perfin" VARCHAR(4),
  "diasdisfutar" NUMERIC(14,2),
  "diasdisfrutados" NUMERIC(14,2),
  "diasvac" NUMERIC(14,2),
  "fecvac" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('npvacsalidas_det_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npvacsalidas_det" IS '';


-----------------------------------------------------------------------------
-- npasiparcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npasiparcon" CASCADE;

DROP SEQUENCE IF EXISTS "npasiparcon_seq";

CREATE SEQUENCE "npasiparcon_seq";


CREATE TABLE "npasiparcon"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcar" VARCHAR(16)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "codpar" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('npasiparcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npasiparcon" IS '';


-----------------------------------------------------------------------------
-- npordfid
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "npordfid" CASCADE;

DROP SEQUENCE IF EXISTS "npordfid_seq";

CREATE SEQUENCE "npordfid_seq";


CREATE TABLE "npordfid"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "fecha" DATE  NOT NULL,
  "codemp" VARCHAR(16),
  "cedemp" VARCHAR(10),
  "codpre" VARCHAR(32),
  "numord" VARCHAR(8),
  "monfid" NUMERIC(32,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('npordfid_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "npordfid" IS '';


-----------------------------------------------------------------------------
-- ocactcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocactcom" CASCADE;

DROP SEQUENCE IF EXISTS "ocactcom_seq";

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

DROP TABLE IF EXISTS "ocasiact" CASCADE;

DROP SEQUENCE IF EXISTS "ocasiact_seq";

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
-- occiudad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "occiudad" CASCADE;

DROP SEQUENCE IF EXISTS "occiudad_seq";

CREATE SEQUENCE "occiudad_seq";


CREATE TABLE "occiudad"
(
  "codciu" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nomciu" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('occiudad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "occiudad" IS '';


-----------------------------------------------------------------------------
-- ocdatste
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocdatste" CASCADE;

DROP SEQUENCE IF EXISTS "ocdatste_seq";

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

DROP TABLE IF EXISTS "ocdefemp" CASCADE;

DROP SEQUENCE IF EXISTS "ocdefemp_seq";

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
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdefemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdefemp" IS '';


-----------------------------------------------------------------------------
-- ocdefequ
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocdefequ" CASCADE;

DROP SEQUENCE IF EXISTS "ocdefequ_seq";

CREATE SEQUENCE "ocdefequ_seq";


CREATE TABLE "ocdefequ"
(
  "codequ" VARCHAR(6)  NOT NULL,
  "desequ" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdefequ_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdefequ" IS '';


-----------------------------------------------------------------------------
-- ocdeforg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocdeforg" CASCADE;

DROP SEQUENCE IF EXISTS "ocdeforg_seq";

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

DROP TABLE IF EXISTS "ocdefpar" CASCADE;

DROP SEQUENCE IF EXISTS "ocdefpar_seq";

CREATE SEQUENCE "ocdefpar_seq";


CREATE TABLE "ocdefpar"
(
  "renpar" VARCHAR(16),
  "cosuni" NUMERIC(14,2),
  "coduni" VARCHAR(4),
  "codpar" VARCHAR(32)  NOT NULL,
  "despar" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdefpar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdefpar" IS '';


-----------------------------------------------------------------------------
-- ocdefper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocdefper" CASCADE;

DROP SEQUENCE IF EXISTS "ocdefper_seq";

CREATE SEQUENCE "ocdefper_seq";


CREATE TABLE "ocdefper"
(
  "cedper" VARCHAR(15)  NOT NULL,
  "nomper" VARCHAR(100)  NOT NULL,
  "telper" VARCHAR(50),
  "codtipcar" VARCHAR(4),
  "codtippro" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('ocdefper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocdefper" IS '';


-----------------------------------------------------------------------------
-- ocdocact
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocdocact" CASCADE;

DROP SEQUENCE IF EXISTS "ocdocact_seq";

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
-- ocestado
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocestado" CASCADE;

DROP SEQUENCE IF EXISTS "ocestado_seq";

CREATE SEQUENCE "ocestado_seq";


CREATE TABLE "ocestado"
(
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nomedo" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocestado_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocestado" IS '';


-----------------------------------------------------------------------------
-- ocinginsobr
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocinginsobr" CASCADE;

DROP SEQUENCE IF EXISTS "ocinginsobr_seq";

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

DROP TABLE IF EXISTS "ocingrescon" CASCADE;

DROP SEQUENCE IF EXISTS "ocingrescon_seq";

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

DROP TABLE IF EXISTS "ocinscon" CASCADE;

DROP SEQUENCE IF EXISTS "ocinscon_seq";

CREATE SEQUENCE "ocinscon_seq";


CREATE TABLE "ocinscon"
(
  "codcon" VARCHAR(32)  NOT NULL,
  "numins" VARCHAR(3)  NOT NULL,
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

DROP TABLE IF EXISTS "ocinsval" CASCADE;

DROP SEQUENCE IF EXISTS "ocinsval_seq";

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


-----------------------------------------------------------------------------
-- ocmunici
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocmunici" CASCADE;

DROP SEQUENCE IF EXISTS "ocmunici_seq";

CREATE SEQUENCE "ocmunici_seq";


CREATE TABLE "ocmunici"
(
  "codpai" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codmun" VARCHAR(4)  NOT NULL,
  "nommun" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocmunici_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocmunici" IS '';


-----------------------------------------------------------------------------
-- ocobrfot
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocobrfot" CASCADE;

DROP SEQUENCE IF EXISTS "ocobrfot_seq";

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

DROP TABLE IF EXISTS "ocofeser" CASCADE;

DROP SEQUENCE IF EXISTS "ocofeser_seq";

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

DROP TABLE IF EXISTS "ocofeserval" CASCADE;

DROP SEQUENCE IF EXISTS "ocofeserval_seq";

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
-- ocpais
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocpais" CASCADE;

DROP SEQUENCE IF EXISTS "ocpais_seq";

CREATE SEQUENCE "ocpais_seq";


CREATE TABLE "ocpais"
(
  "codpai" VARCHAR(4)  NOT NULL,
  "nompai" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocpais_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocpais" IS '';


-----------------------------------------------------------------------------
-- ocparcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocparcon" CASCADE;

DROP SEQUENCE IF EXISTS "ocparcon_seq";

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

DROP TABLE IF EXISTS "ocparins" CASCADE;

DROP SEQUENCE IF EXISTS "ocparins_seq";

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
-- ocparroq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocparroq" CASCADE;

DROP SEQUENCE IF EXISTS "ocparroq_seq";

CREATE SEQUENCE "ocparroq_seq";


CREATE TABLE "ocparroq"
(
  "codpai" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codmun" VARCHAR(4)  NOT NULL,
  "codpar" VARCHAR(4)  NOT NULL,
  "nompar" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocparroq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocparroq" IS '';


-----------------------------------------------------------------------------
-- ocparval
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocparval" CASCADE;

DROP SEQUENCE IF EXISTS "ocparval_seq";

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

DROP TABLE IF EXISTS "ocpreobr" CASCADE;

DROP SEQUENCE IF EXISTS "ocpreobr_seq";

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

DROP TABLE IF EXISTS "ocproequ" CASCADE;

DROP SEQUENCE IF EXISTS "ocproequ_seq";

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
-- ocproesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocproesp" CASCADE;

DROP SEQUENCE IF EXISTS "ocproesp_seq";

CREATE SEQUENCE "ocproesp_seq";


CREATE TABLE "ocproesp"
(
  "codpro" VARCHAR(10)  NOT NULL,
  "codtipesp" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('ocproesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocproesp" IS '';


-----------------------------------------------------------------------------
-- ocproper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocproper" CASCADE;

DROP SEQUENCE IF EXISTS "ocproper_seq";

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

DROP TABLE IF EXISTS "ocprovee" CASCADE;

DROP SEQUENCE IF EXISTS "ocprovee_seq";

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

DROP TABLE IF EXISTS "ocregact" CASCADE;

DROP SEQUENCE IF EXISTS "ocregact_seq";

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

DROP TABLE IF EXISTS "ocregcon" CASCADE;

DROP SEQUENCE IF EXISTS "ocregcon_seq";

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

DROP TABLE IF EXISTS "ocregobr" CASCADE;

DROP SEQUENCE IF EXISTS "ocregobr_seq";

CREATE SEQUENCE "ocregobr_seq";


CREATE TABLE "ocregobr"
(
  "codobr" VARCHAR(32)  NOT NULL,
  "codtipobr" VARCHAR(4)  NOT NULL,
  "desobr" VARCHAR(250)  NOT NULL,
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
  "id" INTEGER  NOT NULL DEFAULT nextval('ocregobr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocregobr" IS '';


-----------------------------------------------------------------------------
-- ocregsol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocregsol" CASCADE;

DROP SEQUENCE IF EXISTS "ocregsol_seq";

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

DROP TABLE IF EXISTS "ocregval" CASCADE;

DROP SEQUENCE IF EXISTS "ocregval_seq";

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
  "id" INTEGER  NOT NULL DEFAULT nextval('ocregval_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ocregval" IS '';


-----------------------------------------------------------------------------
-- ocressol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ocressol" CASCADE;

DROP SEQUENCE IF EXISTS "ocressol_seq";

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

DROP TABLE IF EXISTS "ocretcon" CASCADE;

DROP SEQUENCE IF EXISTS "ocretcon_seq";

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

DROP TABLE IF EXISTS "ocretval" CASCADE;

DROP SEQUENCE IF EXISTS "ocretval_seq";

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

DROP TABLE IF EXISTS "ocsector" CASCADE;

DROP SEQUENCE IF EXISTS "ocsector_seq";

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

DROP TABLE IF EXISTS "octartip" CASCADE;

DROP SEQUENCE IF EXISTS "octartip_seq";

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

DROP TABLE IF EXISTS "octipact" CASCADE;

DROP SEQUENCE IF EXISTS "octipact_seq";

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

DROP TABLE IF EXISTS "octipcar" CASCADE;

DROP SEQUENCE IF EXISTS "octipcar_seq";

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

DROP TABLE IF EXISTS "octipcon" CASCADE;

DROP SEQUENCE IF EXISTS "octipcon_seq";

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

DROP TABLE IF EXISTS "octipesp" CASCADE;

DROP SEQUENCE IF EXISTS "octipesp_seq";

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

DROP TABLE IF EXISTS "octipobr" CASCADE;

DROP SEQUENCE IF EXISTS "octipobr_seq";

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

DROP TABLE IF EXISTS "octiporg" CASCADE;

DROP SEQUENCE IF EXISTS "octiporg_seq";

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

DROP TABLE IF EXISTS "octipprl" CASCADE;

DROP SEQUENCE IF EXISTS "octipprl_seq";

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

DROP TABLE IF EXISTS "octippro" CASCADE;

DROP SEQUENCE IF EXISTS "octippro_seq";

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

DROP TABLE IF EXISTS "octipret" CASCADE;

DROP SEQUENCE IF EXISTS "octipret_seq";

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

DROP TABLE IF EXISTS "octipsol" CASCADE;

DROP SEQUENCE IF EXISTS "octipsol_seq";

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

DROP TABLE IF EXISTS "octipste" CASCADE;

DROP SEQUENCE IF EXISTS "octipste_seq";

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

DROP TABLE IF EXISTS "octipval" CASCADE;

DROP SEQUENCE IF EXISTS "octipval_seq";

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

DROP TABLE IF EXISTS "ocunidad" CASCADE;

DROP SEQUENCE IF EXISTS "ocunidad_seq";

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
-- caajuoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caajuoc" CASCADE;

DROP SEQUENCE IF EXISTS "caajuoc_seq";

CREATE SEQUENCE "caajuoc_seq";


CREATE TABLE "caajuoc"
(
  "ajuoc" VARCHAR(8)  NOT NULL,
  "ordcom" VARCHAR(8)  NOT NULL,
  "fecaju" DATE,
  "desaju" VARCHAR(100),
  "monaju" NUMERIC(14,2),
  "staaju" VARCHAR(1),
  "refaju" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('caajuoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caajuoc" IS '';


-----------------------------------------------------------------------------
-- caartalm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartalm" CASCADE;

DROP SEQUENCE IF EXISTS "caartalm_seq";

CREATE SEQUENCE "caartalm_seq";


CREATE TABLE "caartalm"
(
  "codalm" VARCHAR(6)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codubi" VARCHAR(20),
  "eximin" NUMERIC(14,2),
  "eximax" NUMERIC(14,2),
  "exiact" NUMERIC(14,2),
  "ptoreo" NUMERIC(14,2),
  "pedmin" NUMERIC(14,2),
  "pedmax" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartalm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartalm" IS '';


-----------------------------------------------------------------------------
-- caartaoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartaoc" CASCADE;

DROP SEQUENCE IF EXISTS "caartaoc_seq";

CREATE SEQUENCE "caartaoc_seq";


CREATE TABLE "caartaoc"
(
  "ajuoc" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codcat" VARCHAR(16)  NOT NULL,
  "canord" NUMERIC(14,2),
  "canaju" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "monrgo" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartaoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartaoc" IS '';


-----------------------------------------------------------------------------
-- caartdph
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartdph" CASCADE;

DROP SEQUENCE IF EXISTS "caartdph_seq";

CREATE SEQUENCE "caartdph_seq";


CREATE TABLE "caartdph"
(
  "dphart" VARCHAR(15)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codcat" VARCHAR(16)  NOT NULL,
  "candph" NUMERIC(14,2),
  "candev" NUMERIC(14,2),
  "cantot" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "numlot" VARCHAR(25),
  "canent" NUMERIC(14,2),
  "codfal" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartdph_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartdph" IS '';


-----------------------------------------------------------------------------
-- caartdphser
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartdphser" CASCADE;

DROP SEQUENCE IF EXISTS "caartdphser_seq";

CREATE SEQUENCE "caartdphser_seq";


CREATE TABLE "caartdphser"
(
  "dphart" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codcat" VARCHAR(16)  NOT NULL,
  "fecrea" DATE  NOT NULL,
  "nomemp" VARCHAR(100),
  "dphobs" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartdphser_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartdphser" IS '';


-----------------------------------------------------------------------------
-- caartfec
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartfec" CASCADE;

DROP SEQUENCE IF EXISTS "caartfec_seq";

CREATE SEQUENCE "caartfec_seq";


CREATE TABLE "caartfec"
(
  "ordcom" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "desart" VARCHAR(1000),
  "canart" NUMERIC(14,2)  NOT NULL,
  "fecent" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caartfec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartfec" IS '';


-----------------------------------------------------------------------------
-- caartord
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartord" CASCADE;

DROP SEQUENCE IF EXISTS "caartord_seq";

CREATE SEQUENCE "caartord_seq";


CREATE TABLE "caartord"
(
  "ordcom" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codcat" VARCHAR(16)  NOT NULL,
  "canord" NUMERIC(14,2),
  "canaju" NUMERIC(14,2),
  "canrec" NUMERIC(14,2),
  "cantot" NUMERIC(14,2),
  "preart" NUMERIC(14,2),
  "dtoart" NUMERIC(14,2),
  "codrgo" VARCHAR(32),
  "rgoart" NUMERIC(14,2),
  "totart" NUMERIC(14,2),
  "fecent" DATE,
  "desart" VARCHAR(250),
  "relart" NUMERIC(14,2),
  "unimed" VARCHAR(50),
  "codpar" VARCHAR(32),
  "partida" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartord_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartord" IS '';


-----------------------------------------------------------------------------
-- caartreq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartreq" CASCADE;

DROP SEQUENCE IF EXISTS "caartreq_seq";

CREATE SEQUENCE "caartreq_seq";


CREATE TABLE "caartreq"
(
  "reqart" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codcat" VARCHAR(16)  NOT NULL,
  "canreq" NUMERIC(14,2),
  "canrec" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "unimed" VARCHAR(50),
  "relart" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartreq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartreq" IS '';


-----------------------------------------------------------------------------
-- caartsol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartsol" CASCADE;

DROP SEQUENCE IF EXISTS "caartsol_seq";

CREATE SEQUENCE "caartsol_seq";


CREATE TABLE "caartsol"
(
  "reqart" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codcat" VARCHAR(32)  NOT NULL,
  "canreq" NUMERIC(14,2),
  "canrec" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "costo" NUMERIC(14,2),
  "monrgo" NUMERIC(14,2),
  "canord" NUMERIC(14,2),
  "mondes" NUMERIC(14,2),
  "relart" NUMERIC(14,2),
  "unimed" VARCHAR(50),
  "codpar" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartsol" IS '';


CREATE INDEX "i_caartsol" ON "caartsol" ("codart");

-----------------------------------------------------------------------------
-- caconpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caconpag" CASCADE;

DROP SEQUENCE IF EXISTS "caconpag_seq";

CREATE SEQUENCE "caconpag_seq";


CREATE TABLE "caconpag"
(
  "codconpag" VARCHAR(4)  NOT NULL,
  "desconpag" VARCHAR(255)  NOT NULL,
  "tipconpag" VARCHAR(1),
  "numdia" NUMERIC(4),
  "generaop" VARCHAR(1),
  "asiparrec" VARCHAR(1),
  "generacom" VARCHAR(1),
  "mercon" VARCHAR(20),
  "ctadev" VARCHAR(32),
  "ctavco" VARCHAR(32),
  "univta" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('caconpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caconpag" IS '';


-----------------------------------------------------------------------------
-- cacorrel
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cacorrel" CASCADE;

DROP SEQUENCE IF EXISTS "cacorrel_seq";

CREATE SEQUENCE "cacorrel_seq";


CREATE TABLE "cacorrel"
(
  "corcom" NUMERIC(8),
  "corser" NUMERIC(8),
  "corsol" NUMERIC(8),
  "correq" NUMERIC(8),
  "correc" NUMERIC(8),
  "cordes" NUMERIC(8),
  "corcot" NUMERIC(8),
  "cortra" NUMERIC(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cacorrel_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cacorrel" IS '';


-----------------------------------------------------------------------------
-- cadefalm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadefalm" CASCADE;

DROP SEQUENCE IF EXISTS "cadefalm_seq";

CREATE SEQUENCE "cadefalm_seq";


CREATE TABLE "cadefalm"
(
  "codalm" VARCHAR(6)  NOT NULL,
  "nomalm" VARCHAR(100)  NOT NULL,
  "codcat" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadefalm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadefalm" IS '';


-----------------------------------------------------------------------------
-- cadefubi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadefubi" CASCADE;

DROP SEQUENCE IF EXISTS "cadefubi_seq";

CREATE SEQUENCE "cadefubi_seq";


CREATE TABLE "cadefubi"
(
  "codubi" VARCHAR(20)  NOT NULL,
  "nomubi" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cadefubi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadefubi" IS '';


-----------------------------------------------------------------------------
-- cadescto
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadescto" CASCADE;

DROP SEQUENCE IF EXISTS "cadescto_seq";

CREATE SEQUENCE "cadescto_seq";


CREATE TABLE "cadescto"
(
  "coddesc" VARCHAR(4)  NOT NULL,
  "desdesc" VARCHAR(100),
  "tipdesc" VARCHAR(1)  NOT NULL,
  "mondesc" NUMERIC(14,2)  NOT NULL,
  "diasapl" NUMERIC(4)  NOT NULL,
  "codcta" VARCHAR(32),
  "tipret" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadescto_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadescto" IS '';


-----------------------------------------------------------------------------
-- cadetcot
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadetcot" CASCADE;

DROP SEQUENCE IF EXISTS "cadetcot_seq";

CREATE SEQUENCE "cadetcot_seq";


CREATE TABLE "cadetcot"
(
  "refcot" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "canord" NUMERIC(14,2),
  "costo" NUMERIC(14,2),
  "totdet" NUMERIC(14,2),
  "fecent" DATE,
  "priori" NUMERIC(3),
  "justifica" VARCHAR(1000),
  "mondes" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadetcot_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadetcot" IS '';


-----------------------------------------------------------------------------
-- cadetordc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadetordc" CASCADE;

DROP SEQUENCE IF EXISTS "cadetordc_seq";

CREATE SEQUENCE "cadetordc_seq";


CREATE TABLE "cadetordc"
(
  "ordcon" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "descon" VARCHAR(1000),
  "moncon" NUMERIC(14,2),
  "cancon" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadetordc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadetordc" IS '';


-----------------------------------------------------------------------------
-- cadettra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadettra" CASCADE;

DROP SEQUENCE IF EXISTS "cadettra_seq";

CREATE SEQUENCE "cadettra_seq";


CREATE TABLE "cadettra"
(
  "codtra" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "canart" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadettra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadettra" IS '';


-----------------------------------------------------------------------------
-- cadisrgo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadisrgo" CASCADE;

DROP SEQUENCE IF EXISTS "cadisrgo_seq";

CREATE SEQUENCE "cadisrgo_seq";


CREATE TABLE "cadisrgo"
(
  "reqart" VARCHAR(8)  NOT NULL,
  "codcat" VARCHAR(32)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codrgo" VARCHAR(4)  NOT NULL,
  "monrgo" NUMERIC(14,2),
  "tipdoc" VARCHAR(4),
  "codpre" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadisrgo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadisrgo" IS '';


-----------------------------------------------------------------------------
-- cadphart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadphart" CASCADE;

DROP SEQUENCE IF EXISTS "cadphart_seq";

CREATE SEQUENCE "cadphart_seq";


CREATE TABLE "cadphart"
(
  "dphart" VARCHAR(15)  NOT NULL,
  "fecdph" DATE  NOT NULL,
  "reqart" VARCHAR(8)  NOT NULL,
  "desdph" VARCHAR(100),
  "codori" VARCHAR(16),
  "stadph" VARCHAR(1),
  "numcom" VARCHAR(8),
  "refpag" VARCHAR(8),
  "codalm" VARCHAR(6),
  "tipdph" VARCHAR(2),
  "codcli" VARCHAR(10),
  "mondph" NUMERIC(16,2),
  "obsdph" VARCHAR(250),
  "fordesp" VARCHAR(4),
  "reapor" VARCHAR(30),
  "fecanu" DATE,
  "codubi" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadphart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadphart" IS '';


-----------------------------------------------------------------------------
-- cadphartser
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadphartser" CASCADE;

DROP SEQUENCE IF EXISTS "cadphartser_seq";

CREATE SEQUENCE "cadphartser_seq";


CREATE TABLE "cadphartser"
(
  "dphart" VARCHAR(8)  NOT NULL,
  "fecdph" DATE  NOT NULL,
  "reqart" VARCHAR(8)  NOT NULL,
  "desdph" VARCHAR(255),
  "codori" VARCHAR(16),
  "stadph" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadphartser_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadphartser" IS '';


-----------------------------------------------------------------------------
-- caforent
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caforent" CASCADE;

DROP SEQUENCE IF EXISTS "caforent_seq";

CREATE SEQUENCE "caforent_seq";


CREATE TABLE "caforent"
(
  "codforent" VARCHAR(4)  NOT NULL,
  "desforent" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('caforent_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caforent" IS '';


-----------------------------------------------------------------------------
-- camotfal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "camotfal" CASCADE;

DROP SEQUENCE IF EXISTS "camotfal_seq";

CREATE SEQUENCE "camotfal_seq";


CREATE TABLE "camotfal"
(
  "codfal" VARCHAR(3)  NOT NULL,
  "desfal" VARCHAR(250),
  "tipfal" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('camotfal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "camotfal" IS '';


-----------------------------------------------------------------------------
-- caordcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caordcon" CASCADE;

DROP SEQUENCE IF EXISTS "caordcon_seq";

CREATE SEQUENCE "caordcon_seq";


CREATE TABLE "caordcon"
(
  "ordcon" VARCHAR(8)  NOT NULL,
  "feccon" DATE  NOT NULL,
  "tipcon" VARCHAR(4)  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "descon" VARCHAR(1000),
  "objcon" VARCHAR(1000),
  "fecini" DATE,
  "feccul" DATE,
  "mulatrini" NUMERIC(14,2),
  "lapgar" NUMERIC(14,2),
  "mulatrcul" NUMERIC(14,2),
  "stacon" VARCHAR(1),
  "moncon" NUMERIC(14,2),
  "fecanu" DATE,
  "cancuo" NUMERIC(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('caordcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caordcon" IS '';


-----------------------------------------------------------------------------
-- caordconpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caordconpag" CASCADE;

DROP SEQUENCE IF EXISTS "caordconpag_seq";

CREATE SEQUENCE "caordconpag_seq";


CREATE TABLE "caordconpag"
(
  "ordcom" VARCHAR(8)  NOT NULL,
  "codconpag" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caordconpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caordconpag" IS '';


-----------------------------------------------------------------------------
-- caordforent
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caordforent" CASCADE;

DROP SEQUENCE IF EXISTS "caordforent_seq";

CREATE SEQUENCE "caordforent_seq";


CREATE TABLE "caordforent"
(
  "ordcom" VARCHAR(8)  NOT NULL,
  "codforent" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caordforent_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caordforent" IS '';


-----------------------------------------------------------------------------
-- caramart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caramart" CASCADE;

DROP SEQUENCE IF EXISTS "caramart_seq";

CREATE SEQUENCE "caramart_seq";


CREATE TABLE "caramart"
(
  "ramart" VARCHAR(6)  NOT NULL,
  "nomram" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caramart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caramart" IS '';


-----------------------------------------------------------------------------
-- carancot
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "carancot" CASCADE;

DROP SEQUENCE IF EXISTS "carancot_seq";

CREATE SEQUENCE "carancot_seq";


CREATE TABLE "carancot"
(
  "candes" NUMERIC(14,2)  NOT NULL,
  "canhas" NUMERIC(14,2)  NOT NULL,
  "cancot" NUMERIC(14,2)  NOT NULL,
  "nroran" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('carancot_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "carancot" IS '';


-----------------------------------------------------------------------------
-- carazcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "carazcom" CASCADE;

DROP SEQUENCE IF EXISTS "carazcom_seq";

CREATE SEQUENCE "carazcom_seq";


CREATE TABLE "carazcom"
(
  "codrazcom" VARCHAR(4)  NOT NULL,
  "desrazcom" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('carazcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "carazcom" IS '';


-----------------------------------------------------------------------------
-- carcpart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "carcpart" CASCADE;

DROP SEQUENCE IF EXISTS "carcpart_seq";

CREATE SEQUENCE "carcpart_seq";


CREATE TABLE "carcpart"
(
  "rcpart" VARCHAR(8)  NOT NULL,
  "fecrcp" DATE  NOT NULL,
  "ordcom" VARCHAR(8)  NOT NULL,
  "desrcp" VARCHAR(100),
  "codpro" VARCHAR(10),
  "numfac" VARCHAR(15),
  "monrcp" NUMERIC(14,2),
  "starcp" VARCHAR(1),
  "numcom" VARCHAR(8),
  "numord" VARCHAR(8),
  "codalm" VARCHAR(6),
  "ctrper" VARCHAR(50),
  "genord" VARCHAR(1),
  "nroent" VARCHAR(8),
  "fecfac" DATE,
  "codubi" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('carcpart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "carcpart" IS '';


-----------------------------------------------------------------------------
-- carecarg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "carecarg" CASCADE;

DROP SEQUENCE IF EXISTS "carecarg_seq";

CREATE SEQUENCE "carecarg_seq";


CREATE TABLE "carecarg"
(
  "codrgo" VARCHAR(4)  NOT NULL,
  "nomrgo" VARCHAR(100),
  "codpre" VARCHAR(32)  NOT NULL,
  "tiprgo" VARCHAR(1)  NOT NULL,
  "monrgo" NUMERIC(14,2)  NOT NULL,
  "calcul" VARCHAR(1),
  "codcta" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('carecarg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "carecarg" IS '';


-----------------------------------------------------------------------------
-- carecaud
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "carecaud" CASCADE;

DROP SEQUENCE IF EXISTS "carecaud_seq";

CREATE SEQUENCE "carecaud_seq";


CREATE TABLE "carecaud"
(
  "codrec" VARCHAR(10)  NOT NULL,
  "desrec" VARCHAR(100)  NOT NULL,
  "limrec" VARCHAR(1),
  "fecemi" DATE,
  "fecven" DATE,
  "canutr" NUMERIC(14,2),
  "codtiprec" VARCHAR(4),
  "observ" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('carecaud_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "carecaud" IS '';


-----------------------------------------------------------------------------
-- carecpro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "carecpro" CASCADE;

DROP SEQUENCE IF EXISTS "carecpro_seq";

CREATE SEQUENCE "carecpro_seq";


CREATE TABLE "carecpro"
(
  "codpro" VARCHAR(10)  NOT NULL,
  "codrec" VARCHAR(10)  NOT NULL,
  "fecent" DATE,
  "fecven" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('carecpro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "carecpro" IS '';


ALTER TABLE "carecpro" ADD CONSTRAINT "carecpro_FK_1" FOREIGN KEY ("codpro") REFERENCES "caprovee" ("codpro");

ALTER TABLE "carecpro" ADD CONSTRAINT "carecpro_FK_2" FOREIGN KEY ("codrec") REFERENCES "carecaud" ("codrec");

-----------------------------------------------------------------------------
-- careqart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "careqart" CASCADE;

DROP SEQUENCE IF EXISTS "careqart_seq";

CREATE SEQUENCE "careqart_seq";


CREATE TABLE "careqart"
(
  "reqart" VARCHAR(8)  NOT NULL,
  "fecreq" DATE  NOT NULL,
  "desreq" VARCHAR(500),
  "monreq" NUMERIC(14,2),
  "stareq" VARCHAR(1),
  "unisol" VARCHAR(4),
  "codcatreq" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('careqart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "careqart" IS '';


-----------------------------------------------------------------------------
-- careqartser
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "careqartser" CASCADE;

DROP SEQUENCE IF EXISTS "careqartser_seq";

CREATE SEQUENCE "careqartser_seq";


CREATE TABLE "careqartser"
(
  "reqart" VARCHAR(8)  NOT NULL,
  "fecreq" DATE  NOT NULL,
  "desreq" VARCHAR(255),
  "stareq" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('careqartser_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "careqartser" IS '';


-----------------------------------------------------------------------------
-- caresordcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caresordcom" CASCADE;

DROP SEQUENCE IF EXISTS "caresordcom_seq";

CREATE SEQUENCE "caresordcom_seq";


CREATE TABLE "caresordcom"
(
  "ordcom" VARCHAR(8)  NOT NULL,
  "desres" VARCHAR(500),
  "codartpro" VARCHAR(20),
  "canord" NUMERIC(14,2),
  "canaju" NUMERIC(14,2),
  "canrec" NUMERIC(14,2),
  "cantot" NUMERIC(14,2),
  "costo" NUMERIC(14,2),
  "rgoart" NUMERIC(14,2),
  "totart" NUMERIC(14,2),
  "codart" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caresordcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caresordcom" IS '';


-----------------------------------------------------------------------------
-- caretser
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caretser" CASCADE;

DROP SEQUENCE IF EXISTS "caretser_seq";

CREATE SEQUENCE "caretser_seq";


CREATE TABLE "caretser"
(
  "codser" VARCHAR(20)  NOT NULL,
  "codret" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('caretser_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caretser" IS '';


-----------------------------------------------------------------------------
-- cargosol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cargosol" CASCADE;

DROP SEQUENCE IF EXISTS "cargosol_seq";

CREATE SEQUENCE "cargosol_seq";


CREATE TABLE "cargosol"
(
  "reqart" VARCHAR(8)  NOT NULL,
  "codrgo" VARCHAR(4)  NOT NULL,
  "monrgo" NUMERIC(14,2)  NOT NULL,
  "tipdoc" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cargosol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cargosol" IS '';


-----------------------------------------------------------------------------
-- casolart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "casolart" CASCADE;

DROP SEQUENCE IF EXISTS "casolart_seq";

CREATE SEQUENCE "casolart_seq";


CREATE TABLE "casolart"
(
  "reqart" VARCHAR(8)  NOT NULL,
  "fecreq" DATE  NOT NULL,
  "desreq" VARCHAR(1000),
  "monreq" NUMERIC(14,2),
  "stareq" VARCHAR(1),
  "motreq" VARCHAR(1000),
  "benreq" VARCHAR(1000),
  "mondes" NUMERIC(14,2),
  "obsreq" VARCHAR(1000),
  "unires" VARCHAR(32),
  "tipmon" VARCHAR(3),
  "valmon" NUMERIC(14,2),
  "fecanu" DATE,
  "codpro" VARCHAR(15),
  "reqcom" VARCHAR(8),
  "tipfin" VARCHAR(4),
  "tipreq" CHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('casolart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "casolart" IS '';


-----------------------------------------------------------------------------
-- catalogo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catalogo" CASCADE;

DROP SEQUENCE IF EXISTS "catalogo_seq";

CREATE SEQUENCE "catalogo_seq";


CREATE TABLE "catalogo"
(
  "codcta" VARCHAR(18)  NOT NULL,
  "descta" VARCHAR(40)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "salant" NUMERIC(12,2),
  "debcre" VARCHAR(1)  NOT NULL,
  "cargab" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('catalogo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catalogo" IS '';


-----------------------------------------------------------------------------
-- catipent
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catipent" CASCADE;

DROP SEQUENCE IF EXISTS "catipent_seq";

CREATE SEQUENCE "catipent_seq";


CREATE TABLE "catipent"
(
  "codtipent" VARCHAR(3),
  "destipent" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('catipent_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catipent" IS '';


-----------------------------------------------------------------------------
-- catippro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catippro" CASCADE;

DROP SEQUENCE IF EXISTS "catippro_seq";

CREATE SEQUENCE "catippro_seq";


CREATE TABLE "catippro"
(
  "codpro" VARCHAR(4)  NOT NULL,
  "despro" VARCHAR(100)  NOT NULL,
  "ctaord" VARCHAR(32),
  "ctaper" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('catippro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catippro" IS '';


-----------------------------------------------------------------------------
-- catiprec
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catiprec" CASCADE;

DROP SEQUENCE IF EXISTS "catiprec_seq";

CREATE SEQUENCE "catiprec_seq";


CREATE TABLE "catiprec"
(
  "codtiprec" VARCHAR(4)  NOT NULL,
  "destiprec" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('catiprec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catiprec" IS '';


-----------------------------------------------------------------------------
-- catipsal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catipsal" CASCADE;

DROP SEQUENCE IF EXISTS "catipsal_seq";

CREATE SEQUENCE "catipsal_seq";


CREATE TABLE "catipsal"
(
  "codtipsal" VARCHAR(3),
  "destipsal" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('catipsal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catipsal" IS '';


-----------------------------------------------------------------------------
-- caartpar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartpar" CASCADE;

DROP SEQUENCE IF EXISTS "caartpar_seq";

CREATE SEQUENCE "caartpar_seq";


CREATE TABLE "caartpar"
(
  "codart" VARCHAR(20)  NOT NULL,
  "codpar" VARCHAR(16),
  "porpar" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartpar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartpar" IS '';


-----------------------------------------------------------------------------
-- caregart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caregart" CASCADE;

DROP SEQUENCE IF EXISTS "caregart_seq";

CREATE SEQUENCE "caregart_seq";


CREATE TABLE "caregart"
(
  "codart" VARCHAR(20)  NOT NULL,
  "desart" VARCHAR(250)  NOT NULL,
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
  "id" INTEGER  NOT NULL DEFAULT nextval('caregart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caregart" IS '';


-----------------------------------------------------------------------------
-- caordcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caordcom" CASCADE;

DROP SEQUENCE IF EXISTS "caordcom_seq";

CREATE SEQUENCE "caordcom_seq";


CREATE TABLE "caordcom"
(
  "ordcom" VARCHAR(8)  NOT NULL,
  "fecord" DATE  NOT NULL,
  "codpro" VARCHAR(10)  NOT NULL,
  "desord" VARCHAR(250),
  "crecon" VARCHAR(2),
  "plaent" VARCHAR(25),
  "tiecan" VARCHAR(25),
  "monord" NUMERIC(14,2),
  "dtoord" NUMERIC(14,2),
  "refcom" VARCHAR(8),
  "staord" VARCHAR(1),
  "afepre" VARCHAR(1),
  "conpag" VARCHAR(1000),
  "forent" VARCHAR(1000),
  "fecanu" DATE,
  "tipmon" VARCHAR(3),
  "valmon" NUMERIC(14,2),
  "tipcom" VARCHAR(1),
  "tipord" VARCHAR(1),
  "tipo" VARCHAR(1),
  "coduni" VARCHAR(30),
  "codemp" VARCHAR(16),
  "notord" VARCHAR(1000),
  "tipdoc" VARCHAR(4),
  "tippro" VARCHAR(4),
  "afepro" VARCHAR(1),
  "doccom" VARCHAR(4),
  "refsol" VARCHAR(8),
  "tipfin" VARCHAR(4),
  "justif" VARCHAR(1000),
  "refprc" VARCHAR(1),
  "codmedcom" VARCHAR(4),
  "codprocom" VARCHAR(4),
  "codpai" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codmun" VARCHAR(4),
  "aplart" VARCHAR(2),
  "aplart6" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('caordcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caordcom" IS '';


-----------------------------------------------------------------------------
-- cacatsnc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cacatsnc" CASCADE;

DROP SEQUENCE IF EXISTS "cacatsnc_seq";

CREATE SEQUENCE "cacatsnc_seq";


CREATE TABLE "cacatsnc"
(
  "codsnc" VARCHAR(20)  NOT NULL,
  "dessnc" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('cacatsnc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cacatsnc" IS '';


-----------------------------------------------------------------------------
-- catipempsnc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catipempsnc" CASCADE;

DROP SEQUENCE IF EXISTS "catipempsnc_seq";

CREATE SEQUENCE "catipempsnc_seq";


CREATE TABLE "catipempsnc"
(
  "codtip" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('catipempsnc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catipempsnc" IS '';


-----------------------------------------------------------------------------
-- camedcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "camedcom" CASCADE;

DROP SEQUENCE IF EXISTS "camedcom_seq";

CREATE SEQUENCE "camedcom_seq";


CREATE TABLE "camedcom"
(
  "codmedcom" VARCHAR(4)  NOT NULL,
  "desmedcom" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('camedcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "camedcom" IS '';


-----------------------------------------------------------------------------
-- caprocom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caprocom" CASCADE;

DROP SEQUENCE IF EXISTS "caprocom_seq";

CREATE SEQUENCE "caprocom_seq";


CREATE TABLE "caprocom"
(
  "codprocom" VARCHAR(4)  NOT NULL,
  "desprocom" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('caprocom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caprocom" IS '';


-----------------------------------------------------------------------------
-- caprovee
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caprovee" CASCADE;

DROP SEQUENCE IF EXISTS "caprovee_seq";

CREATE SEQUENCE "caprovee_seq";


CREATE TABLE "caprovee"
(
  "codpro" VARCHAR(10)  NOT NULL,
  "nompro" VARCHAR(250)  NOT NULL,
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
  "nrocei" VARCHAR(30),
  "codram" VARCHAR(6),
  "fecinscir" DATE,
  "numinscir" VARCHAR(20),
  "nacpro" VARCHAR(1),
  "codord" VARCHAR(32),
  "codpercon" VARCHAR(32),
  "codtiprec" VARCHAR(4),
  "codordadi" VARCHAR(32),
  "codperconadi" VARCHAR(32),
  "tipo" VARCHAR(1),
  "fecven" DATE,
  "ciudad" VARCHAR(100),
  "codordmercon" VARCHAR(32),
  "codpermercon" VARCHAR(32),
  "codordcontra" VARCHAR(32),
  "codpercontra" VARCHAR(32),
  "temcodpro" VARCHAR(10),
  "temrifpro" VARCHAR(15),
  "codctasec" VARCHAR(32),
  "codtipemp" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('caprovee_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "u_caprovee" UNIQUE ("rifpro")
);

COMMENT ON TABLE "caprovee" IS '';


-----------------------------------------------------------------------------
-- caprocomart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caprocomart" CASCADE;

DROP SEQUENCE IF EXISTS "caprocomart_seq";

CREATE SEQUENCE "caprocomart_seq";


CREATE TABLE "caprocomart"
(
  "fecprocom" DATE,
  "canpro" NUMERIC(14,2),
  "monpro" NUMERIC(14,2),
  "mespro" VARCHAR(2),
  "codedo" VARCHAR(4),
  "codcat" VARCHAR(32),
  "codciu" VARCHAR(4),
  "codmun" VARCHAR(4),
  "codfin" VARCHAR(4),
  "codart" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('caprocomart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caprocomart" IS '';


-----------------------------------------------------------------------------
-- cadefart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cadefart" CASCADE;

DROP SEQUENCE IF EXISTS "cadefart_seq";

CREATE SEQUENCE "cadefart_seq";


CREATE TABLE "cadefart"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "lonart" NUMERIC(2)  NOT NULL,
  "rupart" NUMERIC(2)  NOT NULL,
  "forart" VARCHAR(30)  NOT NULL,
  "desart" VARCHAR(30)  NOT NULL,
  "forubi" VARCHAR(30)  NOT NULL,
  "desubi" VARCHAR(30)  NOT NULL,
  "correq" VARCHAR(8),
  "corord" VARCHAR(8),
  "correc" VARCHAR(8),
  "cordes" VARCHAR(8),
  "generaop" VARCHAR(1),
  "asiparrec" VARCHAR(1),
  "generacom" VARCHAR(1),
  "mercon" VARCHAR(20),
  "ctadev" VARCHAR(32),
  "ctavco" VARCHAR(32),
  "univta" VARCHAR(32),
  "artven" VARCHAR(20),
  "artins" VARCHAR(20),
  "artser" VARCHAR(20),
  "codalmven" VARCHAR(6),
  "recart" NUMERIC(8),
  "ordcom" NUMERIC(8),
  "reqart" NUMERIC(8),
  "dphart" NUMERIC(8),
  "ordser" NUMERIC(8),
  "tipimprec" VARCHAR(1),
  "artvenhas" VARCHAR(20),
  "corcot" VARCHAR(8),
  "solart" VARCHAR(8),
  "apliclades" VARCHAR(1),
  "solcom" NUMERIC(8),
  "unidad" VARCHAR(100),
  "prcasopre" VARCHAR(1),
  "prcreqapr" VARCHAR(1),
  "comasopre" VARCHAR(1),
  "comreqapr" VARCHAR(1),
  "almcorre" VARCHAR(8)  NOT NULL,
  "forsnc" VARCHAR(20),
  "dessnc" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('cadefart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cadefart" IS '';


-----------------------------------------------------------------------------
-- cacotiza
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cacotiza" CASCADE;

DROP SEQUENCE IF EXISTS "cacotiza_seq";

CREATE SEQUENCE "cacotiza_seq";


CREATE TABLE "cacotiza"
(
  "refcot" VARCHAR(8)  NOT NULL,
  "feccot" DATE  NOT NULL,
  "codpro" VARCHAR(15)  NOT NULL,
  "descot" VARCHAR(255),
  "refsol" VARCHAR(8)  NOT NULL,
  "moncot" NUMERIC(14,2),
  "conpag" VARCHAR(4),
  "forent" VARCHAR(4),
  "priori" NUMERIC(3),
  "mondes" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "tipmon" VARCHAR(3),
  "valmon" NUMERIC(18,2),
  "refpro" VARCHAR(10),
  "tipo" VARCHAR(1),
  "correl" NUMERIC(3),
  "porvan" NUMERIC(14,2),
  "porant" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cacotiza_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cacotiza" IS '';


-----------------------------------------------------------------------------
-- caartalmubi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caartalmubi" CASCADE;

DROP SEQUENCE IF EXISTS "caartalmubi_seq";

CREATE SEQUENCE "caartalmubi_seq";


CREATE TABLE "caartalmubi"
(
  "codalm" VARCHAR(6)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codubi" VARCHAR(20),
  "exiact" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('caartalmubi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caartalmubi" IS '';


-----------------------------------------------------------------------------
-- caalmubi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caalmubi" CASCADE;

DROP SEQUENCE IF EXISTS "caalmubi_seq";

CREATE SEQUENCE "caalmubi_seq";


CREATE TABLE "caalmubi"
(
  "codalm" VARCHAR(6)  NOT NULL,
  "codubi" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('caalmubi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caalmubi" IS '';


-----------------------------------------------------------------------------
-- caentalm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "caentalm" CASCADE;

DROP SEQUENCE IF EXISTS "caentalm_seq";

CREATE SEQUENCE "caentalm_seq";


CREATE TABLE "caentalm"
(
  "rcpart" VARCHAR(8)  NOT NULL,
  "fecrcp" DATE  NOT NULL,
  "desrcp" VARCHAR(100),
  "codpro" VARCHAR(10),
  "monrcp" NUMERIC(14,2),
  "starcp" VARCHAR(1),
  "codalm" VARCHAR(6),
  "codubi" VARCHAR(20),
  "tipmov" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('caentalm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "caentalm" IS '';


-----------------------------------------------------------------------------
-- casalalm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "casalalm" CASCADE;

DROP SEQUENCE IF EXISTS "casalalm_seq";

CREATE SEQUENCE "casalalm_seq";


CREATE TABLE "casalalm"
(
  "codsal" VARCHAR(8)  NOT NULL,
  "fecsal" DATE  NOT NULL,
  "dessal" VARCHAR(100),
  "codpro" VARCHAR(10),
  "monsal" NUMERIC(14,2),
  "stasal" VARCHAR(1),
  "codalm" VARCHAR(6),
  "codubi" VARCHAR(20),
  "tipmov" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('casalalm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "casalalm" IS '';


-----------------------------------------------------------------------------
-- cainvfis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cainvfis" CASCADE;

DROP SEQUENCE IF EXISTS "cainvfis_seq";

CREATE SEQUENCE "cainvfis_seq";


CREATE TABLE "cainvfis"
(
  "fecinv" DATE  NOT NULL,
  "codalm" VARCHAR(6)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "exiact" NUMERIC(14,2),
  "exiact2" NUMERIC(14,2),
  "codubi" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('cainvfis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cainvfis" IS '';


-----------------------------------------------------------------------------
-- catraalm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "catraalm" CASCADE;

DROP SEQUENCE IF EXISTS "catraalm_seq";

CREATE SEQUENCE "catraalm_seq";


CREATE TABLE "catraalm"
(
  "codtra" VARCHAR(8)  NOT NULL,
  "fectra" DATE,
  "destra" VARCHAR(255),
  "almori" VARCHAR(6)  NOT NULL,
  "codubiori" VARCHAR(20),
  "almdes" VARCHAR(6)  NOT NULL,
  "codubides" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('catraalm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "catraalm" IS '';


-----------------------------------------------------------------------------
-- rharecur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rharecur" CASCADE;

DROP SEQUENCE IF EXISTS "rharecur_seq";

CREATE SEQUENCE "rharecur_seq";


CREATE TABLE "rharecur"
(
  "codarecur" VARCHAR(4)  NOT NULL,
  "desarecur" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('rharecur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rharecur" IS '';


-----------------------------------------------------------------------------
-- rhasicur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhasicur" CASCADE;

DROP SEQUENCE IF EXISTS "rhasicur_seq";

CREATE SEQUENCE "rhasicur_seq";


CREATE TABLE "rhasicur"
(
  "codcur" VARCHAR(10)  NOT NULL,
  "numcla" VARCHAR(3)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "asicla" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhasicur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhasicur" IS '';


-----------------------------------------------------------------------------
-- rhclacur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhclacur" CASCADE;

DROP SEQUENCE IF EXISTS "rhclacur_seq";

CREATE SEQUENCE "rhclacur_seq";


CREATE TABLE "rhclacur"
(
  "codcur" VARCHAR(10)  NOT NULL,
  "numcla" VARCHAR(3)  NOT NULL,
  "feccla" DATE,
  "horini" DATE,
  "horfin" DATE,
  "numhor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhclacur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhclacur" IS '';


-----------------------------------------------------------------------------
-- rhdateva
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhdateva" CASCADE;

DROP SEQUENCE IF EXISTS "rhdateva_seq";

CREATE SEQUENCE "rhdateva_seq";


CREATE TABLE "rhdateva"
(
  "codevdo" VARCHAR(16)  NOT NULL,
  "codevor" VARCHAR(16),
  "codsup" VARCHAR(16),
  "fecdes" DATE,
  "fechas" DATE,
  "fecela" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdateva_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhdateva" IS '';


-----------------------------------------------------------------------------
-- rhdefcur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhdefcur" CASCADE;

DROP SEQUENCE IF EXISTS "rhdefcur_seq";

CREATE SEQUENCE "rhdefcur_seq";


CREATE TABLE "rhdefcur"
(
  "codcur" VARCHAR(10)  NOT NULL,
  "descur" VARCHAR(250),
  "codtipcur" VARCHAR(4)  NOT NULL,
  "codpro" VARCHAR(10),
  "fecini" DATE,
  "fecfin" DATE,
  "notapr" NUMERIC(14,2),
  "durcur" NUMERIC(14),
  "codtit" VARCHAR(4),
  "turcur" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdefcur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhdefcur" IS '';


-----------------------------------------------------------------------------
-- rhdefemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhdefemp" CASCADE;

DROP SEQUENCE IF EXISTS "rhdefemp_seq";

CREATE SEQUENCE "rhdefemp_seq";


CREATE TABLE "rhdefemp"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "faxemp" VARCHAR(15),
  "porcom" NUMERIC(14,2),
  "porobj" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdefemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhdefemp" IS '';


-----------------------------------------------------------------------------
-- rhdefind
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhdefind" CASCADE;

DROP SEQUENCE IF EXISTS "rhdefind_seq";

CREATE SEQUENCE "rhdefind_seq";


CREATE TABLE "rhdefind"
(
  "codind" VARCHAR(4)  NOT NULL,
  "desind" VARCHAR(250),
  "tipind" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdefind_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhdefind" IS '';


-----------------------------------------------------------------------------
-- rhdefniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhdefniv" CASCADE;

DROP SEQUENCE IF EXISTS "rhdefniv_seq";

CREATE SEQUENCE "rhdefniv_seq";


CREATE TABLE "rhdefniv"
(
  "codniv" VARCHAR(4)  NOT NULL,
  "desniv" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdefniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhdefniv" IS '';


-----------------------------------------------------------------------------
-- rhdefobj
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhdefobj" CASCADE;

DROP SEQUENCE IF EXISTS "rhdefobj_seq";

CREATE SEQUENCE "rhdefobj_seq";


CREATE TABLE "rhdefobj"
(
  "codobj" VARCHAR(4)  NOT NULL,
  "desobj" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdefobj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhdefobj" IS '';


-----------------------------------------------------------------------------
-- rhdefvalins
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhdefvalins" CASCADE;

DROP SEQUENCE IF EXISTS "rhdefvalins_seq";

CREATE SEQUENCE "rhdefvalins_seq";


CREATE TABLE "rhdefvalins"
(
  "codvalins" VARCHAR(4)  NOT NULL,
  "desvalins" VARCHAR(250),
  "obsvalins" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhdefvalins_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhdefvalins" IS '';


-----------------------------------------------------------------------------
-- rhevaconcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhevaconcom" CASCADE;

DROP SEQUENCE IF EXISTS "rhevaconcom_seq";

CREATE SEQUENCE "rhevaconcom_seq";


CREATE TABLE "rhevaconcom"
(
  "codevdo" VARCHAR(16)  NOT NULL,
  "codniv" VARCHAR(4)  NOT NULL,
  "codvalins" VARCHAR(4)  NOT NULL,
  "pesval" NUMERIC(14,2),
  "punval" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhevaconcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhevaconcom" IS '';


-----------------------------------------------------------------------------
-- rhevaempobj
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhevaempobj" CASCADE;

DROP SEQUENCE IF EXISTS "rhevaempobj_seq";

CREATE SEQUENCE "rhevaempobj_seq";


CREATE TABLE "rhevaempobj"
(
  "codevdo" VARCHAR(16)  NOT NULL,
  "codniv" VARCHAR(4)  NOT NULL,
  "codobj" VARCHAR(4)  NOT NULL,
  "plaobj" NUMERIC(14,2),
  "alcobj" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhevaempobj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhevaempobj" IS '';


-----------------------------------------------------------------------------
-- rhindniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhindniv" CASCADE;

DROP SEQUENCE IF EXISTS "rhindniv_seq";

CREATE SEQUENCE "rhindniv_seq";


CREATE TABLE "rhindniv"
(
  "codniv" VARCHAR(4)  NOT NULL,
  "codind" VARCHAR(4)  NOT NULL,
  "porind" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhindniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhindniv" IS '';


-----------------------------------------------------------------------------
-- rhinscur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhinscur" CASCADE;

DROP SEQUENCE IF EXISTS "rhinscur_seq";

CREATE SEQUENCE "rhinscur_seq";


CREATE TABLE "rhinscur"
(
  "codcur" VARCHAR(10)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "codcar" VARCHAR(16),
  "fecins" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('rhinscur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhinscur" IS '';


-----------------------------------------------------------------------------
-- rhnotcur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhnotcur" CASCADE;

DROP SEQUENCE IF EXISTS "rhnotcur_seq";

CREATE SEQUENCE "rhnotcur_seq";


CREATE TABLE "rhnotcur"
(
  "codcur" VARCHAR(10)  NOT NULL,
  "codemp" VARCHAR(16)  NOT NULL,
  "notcur" NUMERIC(14,2),
  "aprcur" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhnotcur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhnotcur" IS '';


-----------------------------------------------------------------------------
-- rhrelobjind
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhrelobjind" CASCADE;

DROP SEQUENCE IF EXISTS "rhrelobjind_seq";

CREATE SEQUENCE "rhrelobjind_seq";


CREATE TABLE "rhrelobjind"
(
  "codevdo" VARCHAR(16)  NOT NULL,
  "codniv" VARCHAR(4)  NOT NULL,
  "codobj" VARCHAR(4)  NOT NULL,
  "codind" VARCHAR(4)  NOT NULL,
  "pesobj" NUMERIC(14,2),
  "plaobj" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhrelobjind_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhrelobjind" IS '';


-----------------------------------------------------------------------------
-- rhtipcur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhtipcur" CASCADE;

DROP SEQUENCE IF EXISTS "rhtipcur_seq";

CREATE SEQUENCE "rhtipcur_seq";


CREATE TABLE "rhtipcur"
(
  "codtipcur" VARCHAR(4)  NOT NULL,
  "destipcur" VARCHAR(250),
  "codarecur" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhtipcur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhtipcur" IS '';


-----------------------------------------------------------------------------
-- rhtitcur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhtitcur" CASCADE;

DROP SEQUENCE IF EXISTS "rhtitcur_seq";

CREATE SEQUENCE "rhtitcur_seq";


CREATE TABLE "rhtitcur"
(
  "codtit" VARCHAR(4)  NOT NULL,
  "nomtit" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhtitcur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhtitcur" IS '';


-----------------------------------------------------------------------------
-- rhvalniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rhvalniv" CASCADE;

DROP SEQUENCE IF EXISTS "rhvalniv_seq";

CREATE SEQUENCE "rhvalniv_seq";


CREATE TABLE "rhvalniv"
(
  "codniv" VARCHAR(4)  NOT NULL,
  "codvalins" VARCHAR(4)  NOT NULL,
  "porvalins" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('rhvalniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rhvalniv" IS '';


-----------------------------------------------------------------------------
-- numeros
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "numeros" CASCADE;

DROP SEQUENCE IF EXISTS "numeros_seq";

CREATE SEQUENCE "numeros_seq";


CREATE TABLE "numeros"
(
  "num" NUMERIC(3)  NOT NULL,
  "pos" NUMERIC(3)  NOT NULL,
  "nomnum" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('numeros_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "numeros" IS '';


-----------------------------------------------------------------------------
-- numerosnew
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "numerosnew" CASCADE;

DROP SEQUENCE IF EXISTS "numerosnew_seq";

CREATE SEQUENCE "numerosnew_seq";


CREATE TABLE "numerosnew"
(
  "num" NUMERIC(3)  NOT NULL,
  "pos" NUMERIC(3)  NOT NULL,
  "nomnum" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('numerosnew_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "numerosnew" IS '';


-----------------------------------------------------------------------------
-- bnclafun
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnclafun" CASCADE;

DROP SEQUENCE IF EXISTS "bnclafun_seq";

CREATE SEQUENCE "bnclafun_seq";


CREATE TABLE "bnclafun"
(
  "codcla" VARCHAR(3)  NOT NULL,
  "descla" VARCHAR(250),
  "stacla" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnclafun_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnclafun" IS '';


-----------------------------------------------------------------------------
-- bncobseg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bncobseg" CASCADE;

DROP SEQUENCE IF EXISTS "bncobseg_seq";

CREATE SEQUENCE "bncobseg_seq";


CREATE TABLE "bncobseg"
(
  "codcob" VARCHAR(4)  NOT NULL,
  "descob" VARCHAR(500),
  "id" INTEGER  NOT NULL DEFAULT nextval('bncobseg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bncobseg" IS '';


-----------------------------------------------------------------------------
-- bndefact
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndefact" CASCADE;

DROP SEQUENCE IF EXISTS "bndefact_seq";

CREATE SEQUENCE "bndefact_seq";


CREATE TABLE "bndefact"
(
  "codact" VARCHAR(30)  NOT NULL,
  "desact" VARCHAR(250),
  "canact" NUMERIC(14),
  "staact" VARCHAR(1),
  "viduti" NUMERIC(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndefact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndefact" IS '';


-----------------------------------------------------------------------------
-- bndefcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndefcon" CASCADE;

DROP SEQUENCE IF EXISTS "bndefcon_seq";

CREATE SEQUENCE "bndefcon_seq";


CREATE TABLE "bndefcon"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codmue" VARCHAR(20)  NOT NULL,
  "ctadepcar" VARCHAR(32),
  "ctadepabo" VARCHAR(32),
  "ctaajucar" VARCHAR(32),
  "ctaajuabo" VARCHAR(32),
  "ctarevcar" VARCHAR(32),
  "ctarevabo" VARCHAR(32),
  "stacta" VARCHAR(1),
  "ctapercar" VARCHAR(32),
  "ctaperabo" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndefcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndefcon" IS '';


-----------------------------------------------------------------------------
-- bndefconi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndefconi" CASCADE;

DROP SEQUENCE IF EXISTS "bndefconi_seq";

CREATE SEQUENCE "bndefconi_seq";


CREATE TABLE "bndefconi"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codinm" VARCHAR(20)  NOT NULL,
  "ctadepcar" VARCHAR(18),
  "ctadepabo" VARCHAR(18),
  "ctaajucar" VARCHAR(18),
  "ctaajuabo" VARCHAR(18),
  "ctarevcar" VARCHAR(18),
  "ctarevabo" VARCHAR(18),
  "stacta" VARCHAR(1),
  "ctapercar" VARCHAR(32),
  "ctaperabo" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndefconi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndefconi" IS '';


-----------------------------------------------------------------------------
-- bndefcons
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndefcons" CASCADE;

DROP SEQUENCE IF EXISTS "bndefcons_seq";

CREATE SEQUENCE "bndefcons_seq";


CREATE TABLE "bndefcons"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codsem" VARCHAR(20)  NOT NULL,
  "ctadepcar" VARCHAR(18),
  "ctadepabo" VARCHAR(18),
  "ctaajucar" VARCHAR(18),
  "ctaajuabo" VARCHAR(18),
  "ctarevcar" VARCHAR(18),
  "ctarevabo" VARCHAR(18),
  "stacta" VARCHAR(1),
  "ctaperabo" VARCHAR(32),
  "ctapercar" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndefcons_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndefcons" IS '';


-----------------------------------------------------------------------------
-- bndefins
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndefins" CASCADE;

DROP SEQUENCE IF EXISTS "bndefins_seq";

CREATE SEQUENCE "bndefins_seq";


CREATE TABLE "bndefins"
(
  "codins" VARCHAR(4)  NOT NULL,
  "nomins" VARCHAR(35),
  "dirins" VARCHAR(100),
  "telins" VARCHAR(25),
  "faxins" VARCHAR(25),
  "email" VARCHAR(30),
  "edoins" VARCHAR(30),
  "munins" VARCHAR(30),
  "paqins" VARCHAR(30),
  "foract" VARCHAR(25),
  "desact" VARCHAR(30),
  "lonact" NUMERIC(14,2),
  "forubi" VARCHAR(25),
  "desubi" VARCHAR(30),
  "lonubi" NUMERIC(14,2),
  "fecper" DATE,
  "feceje" DATE,
  "coddes" VARCHAR(2),
  "porrev" VARCHAR(5),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndefins_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndefins" IS '';


-----------------------------------------------------------------------------
-- bndefins_resp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndefins_resp" CASCADE;

DROP SEQUENCE IF EXISTS "bndefins_resp_seq";

CREATE SEQUENCE "bndefins_resp_seq";


CREATE TABLE "bndefins_resp"
(
  "codins" VARCHAR(4)  NOT NULL,
  "nomins" VARCHAR(35),
  "dirins" VARCHAR(100),
  "telins" VARCHAR(25),
  "faxins" VARCHAR(25),
  "email" VARCHAR(30),
  "edoins" VARCHAR(30),
  "munins" VARCHAR(30),
  "paqins" VARCHAR(30),
  "foract" VARCHAR(25),
  "desact" VARCHAR(30),
  "lonact" NUMERIC(14,2),
  "forubi" VARCHAR(25),
  "desubi" VARCHAR(30),
  "lonubi" NUMERIC(14,2),
  "fecper" DATE,
  "feceje" DATE,
  "coddes" VARCHAR(2),
  "porrev" VARCHAR(5),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndefins_resp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndefins_resp" IS '';


-----------------------------------------------------------------------------
-- bndepact
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndepact" CASCADE;

DROP SEQUENCE IF EXISTS "bndepact_seq";

CREATE SEQUENCE "bndepact_seq";


CREATE TABLE "bndepact"
(
  "fecdep" DATE  NOT NULL,
  "monmue" NUMERIC(14,2),
  "moninm" NUMERIC(14,2),
  "monsem" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndepact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndepact" IS '';


-----------------------------------------------------------------------------
-- bndepactdet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndepactdet" CASCADE;

DROP SEQUENCE IF EXISTS "bndepactdet_seq";

CREATE SEQUENCE "bndepactdet_seq";


CREATE TABLE "bndepactdet"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codmue" VARCHAR(30)  NOT NULL,
  "fecdep" DATE  NOT NULL,
  "depmue" NUMERIC(18,2)  NOT NULL,
  "depacu" NUMERIC(18,2)  NOT NULL,
  "vallib" NUMERIC(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndepactdet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndepactdet" IS '';


-----------------------------------------------------------------------------
-- bndisbie
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndisbie" CASCADE;

DROP SEQUENCE IF EXISTS "bndisbie_seq";

CREATE SEQUENCE "bndisbie_seq";


CREATE TABLE "bndisbie"
(
  "coddis" VARCHAR(10)  NOT NULL,
  "desdis" VARCHAR(250),
  "afecon" VARCHAR(1),
  "stadis" VARCHAR(1),
  "desinc" VARCHAR(1),
  "adimej" VARCHAR(1),
  "viduti" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndisbie_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndisbie" IS '';


-----------------------------------------------------------------------------
-- bndisinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndisinm" CASCADE;

DROP SEQUENCE IF EXISTS "bndisinm_seq";

CREATE SEQUENCE "bndisinm_seq";


CREATE TABLE "bndisinm"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codmue" VARCHAR(20)  NOT NULL,
  "nrodisinm" VARCHAR(10)  NOT NULL,
  "motdisinm" VARCHAR(50),
  "tipdisinm" VARCHAR(50),
  "fecdisinm" DATE,
  "fecdevdis" DATE,
  "mondisinm" NUMERIC(14,2),
  "detdisinm" VARCHAR(250),
  "codubiori" VARCHAR(30),
  "codubides" VARCHAR(30),
  "obsdisinm" VARCHAR(250),
  "stadisinm" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndisinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndisinm" IS '';


-----------------------------------------------------------------------------
-- bndismue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndismue" CASCADE;

DROP SEQUENCE IF EXISTS "bndismue_seq";

CREATE SEQUENCE "bndismue_seq";


CREATE TABLE "bndismue"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codmue" VARCHAR(20)  NOT NULL,
  "nrodismue" VARCHAR(10)  NOT NULL,
  "motdismue" VARCHAR(50),
  "tipdismue" VARCHAR(50),
  "fecdismue" DATE,
  "fecdevdis" DATE,
  "mondismue" NUMERIC(14,2),
  "detdismue" VARCHAR(250),
  "codubiori" VARCHAR(30),
  "codubides" VARCHAR(30),
  "obsdismue" VARCHAR(250),
  "stadismue" VARCHAR(1),
  "codmot" VARCHAR(4),
  "vidutil" NUMERIC(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndismue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndismue" IS '';


-----------------------------------------------------------------------------
-- bndissem
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bndissem" CASCADE;

DROP SEQUENCE IF EXISTS "bndissem_seq";

CREATE SEQUENCE "bndissem_seq";


CREATE TABLE "bndissem"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codsem" VARCHAR(20)  NOT NULL,
  "nrodissem" VARCHAR(10)  NOT NULL,
  "motdissem" VARCHAR(50),
  "tipdissem" VARCHAR(50),
  "fecdissem" DATE,
  "fecdevdis" DATE,
  "mondissem" NUMERIC(14,2),
  "detdissem" VARCHAR(250),
  "codubiori" VARCHAR(30),
  "codubides" VARCHAR(30),
  "obsdissem" VARCHAR(250),
  "stadissem" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bndissem_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bndissem" IS '';


-----------------------------------------------------------------------------
-- bnipcact
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnipcact" CASCADE;

DROP SEQUENCE IF EXISTS "bnipcact_seq";

CREATE SEQUENCE "bnipcact_seq";


CREATE TABLE "bnipcact"
(
  "anoipc" VARCHAR(4)  NOT NULL,
  "ipcene" NUMERIC(14,2),
  "ipcfeb" NUMERIC(14,2),
  "ipcmar" NUMERIC(14,2),
  "ipcabr" NUMERIC(14,2),
  "ipcmay" NUMERIC(14,2),
  "ipcjun" NUMERIC(14,2),
  "ipcjul" NUMERIC(14,2),
  "ipcago" NUMERIC(14,2),
  "ipcsep" NUMERIC(14,2),
  "ipcoct" NUMERIC(14,2),
  "ipcnov" NUMERIC(14,2),
  "ipcdic" NUMERIC(14,2),
  "staipc" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnipcact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnipcact" IS '';


-----------------------------------------------------------------------------
-- bnmotdis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnmotdis" CASCADE;

DROP SEQUENCE IF EXISTS "bnmotdis_seq";

CREATE SEQUENCE "bnmotdis_seq";


CREATE TABLE "bnmotdis"
(
  "codmot" VARCHAR(4)  NOT NULL,
  "desmot" VARCHAR(250),
  "afecon" VARCHAR(1),
  "stadis" VARCHAR(1),
  "desinc" VARCHAR(1),
  "adimej" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnmotdis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnmotdis" IS '';


-----------------------------------------------------------------------------
-- bnparbie
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnparbie" CASCADE;

DROP SEQUENCE IF EXISTS "bnparbie_seq";

CREATE SEQUENCE "bnparbie_seq";


CREATE TABLE "bnparbie"
(
  "pardes" VARCHAR(16)  NOT NULL,
  "parhas" VARCHAR(16)  NOT NULL,
  "valrcp" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('bnparbie_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnparbie" IS '';


-----------------------------------------------------------------------------
-- bnreginm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnreginm" CASCADE;

DROP SEQUENCE IF EXISTS "bnreginm_seq";

CREATE SEQUENCE "bnreginm_seq";


CREATE TABLE "bnreginm"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codinm" VARCHAR(20)  NOT NULL,
  "desinm" VARCHAR(250),
  "codpro" VARCHAR(20),
  "ordcom" VARCHAR(20),
  "fecreg" DATE,
  "feccom" DATE,
  "fecdep" DATE,
  "fecaju" DATE,
  "fecact" DATE,
  "fecexp" DATE,
  "ordrcp" VARCHAR(20),
  "fotinm" VARCHAR(250),
  "deninm" VARCHAR(50),
  "nroexp" VARCHAR(20),
  "detinm" VARCHAR(10),
  "codubi" VARCHAR(30),
  "avaact" NUMERIC(14,2),
  "clafun" VARCHAR(20),
  "avacom" NUMERIC(14,2),
  "edoleg" VARCHAR(20),
  "viduti" VARCHAR(20),
  "obsinm" VARCHAR(250),
  "linnor" VARCHAR(50),
  "linsur" VARCHAR(50),
  "linest" VARCHAR(50),
  "linoes" VARCHAR(50),
  "areter" VARCHAR(50),
  "arecub" VARCHAR(50),
  "arecon" VARCHAR(50),
  "areotr" VARCHAR(50),
  "aretot" VARCHAR(50),
  "edoinm" VARCHAR(50),
  "muninm" VARCHAR(50),
  "depinm" VARCHAR(50),
  "dirinm" VARCHAR(50),
  "mesdep" NUMERIC(14,2),
  "valini" NUMERIC(14,2),
  "valres" NUMERIC(14,2),
  "vallib" NUMERIC(14,2),
  "valrex" NUMERIC(14,2),
  "cosrep" NUMERIC(14,2),
  "depmen" NUMERIC(14,2),
  "depacu" NUMERIC(14,2),
  "stainm" VARCHAR(1),
  "codalt" VARCHAR(30),
  "coddis" VARCHAR(25),
  "valadis" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnreginm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnreginm" IS '';


-----------------------------------------------------------------------------
-- bnregmue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnregmue" CASCADE;

DROP SEQUENCE IF EXISTS "bnregmue_seq";

CREATE SEQUENCE "bnregmue_seq";


CREATE TABLE "bnregmue"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codmue" VARCHAR(20)  NOT NULL,
  "desmue" VARCHAR(250),
  "codpro" VARCHAR(20),
  "ordcom" VARCHAR(20),
  "fecreg" DATE,
  "feccom" DATE,
  "fecdep" DATE,
  "fecaju" DATE,
  "fecact" DATE,
  "fecexp" DATE,
  "ordrcp" VARCHAR(20),
  "fotmue" VARCHAR(250),
  "marmue" VARCHAR(50),
  "modmue" VARCHAR(20),
  "anomue" VARCHAR(10),
  "colmue" VARCHAR(25),
  "codubi" VARCHAR(30),
  "pesmue" VARCHAR(20),
  "capmue" VARCHAR(20),
  "tipmue" VARCHAR(20),
  "viduti" VARCHAR(20),
  "lngmue" VARCHAR(50),
  "nropie" VARCHAR(10),
  "sermue" VARCHAR(150),
  "usomue" VARCHAR(25),
  "altmue" VARCHAR(45),
  "larmue" VARCHAR(45),
  "ancmue" VARCHAR(45),
  "coddis" VARCHAR(25),
  "detmue" VARCHAR(250),
  "edomue" VARCHAR(50),
  "munmue" VARCHAR(50),
  "depmue" VARCHAR(50),
  "dirmue" VARCHAR(50),
  "ubimue" VARCHAR(100),
  "mesdep" NUMERIC(14,2),
  "valini" NUMERIC(14,2),
  "valres" NUMERIC(14,2),
  "vallib" NUMERIC(14,2),
  "valrex" NUMERIC(14,2),
  "cosrep" NUMERIC(14,2),
  "depmen" NUMERIC(14,2),
  "depacu" NUMERIC(14,2),
  "stamue" VARCHAR(1),
  "codalt" VARCHAR(30),
  "fecrcp" DATE,
  "valadi" NUMERIC(14,2),
  "aumviduti" NUMERIC(4),
  "dimviduti" NUMERIC(4),
  "stasem" VARCHAR(1),
  "stainm" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnregmue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnregmue" IS '';


-----------------------------------------------------------------------------
-- bnregsem
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnregsem" CASCADE;

DROP SEQUENCE IF EXISTS "bnregsem_seq";

CREATE SEQUENCE "bnregsem_seq";


CREATE TABLE "bnregsem"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codsem" VARCHAR(20)  NOT NULL,
  "dessem" VARCHAR(250),
  "codpro" VARCHAR(20),
  "codubi" VARCHAR(30),
  "ordcom" VARCHAR(20),
  "fecreg" DATE,
  "feccom" DATE,
  "fecexp" DATE,
  "ordrcp" VARCHAR(20),
  "fotsem" VARCHAR(250),
  "sexsem" VARCHAR(1),
  "razsem" VARCHAR(30),
  "edasem" VARCHAR(25),
  "hersem" VARCHAR(45),
  "obssem" VARCHAR(50),
  "viduti" VARCHAR(20),
  "mesdep" NUMERIC(14,2),
  "valini" NUMERIC(14,2),
  "valres" NUMERIC(14,2),
  "vallib" NUMERIC(14,2),
  "valrex" NUMERIC(14,2),
  "cosrep" NUMERIC(14,2),
  "depmen" NUMERIC(14,2),
  "depacu" NUMERIC(14,2),
  "stasem" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnregsem_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnregsem" IS '';


-----------------------------------------------------------------------------
-- bnrevact
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnrevact" CASCADE;

DROP SEQUENCE IF EXISTS "bnrevact_seq";

CREATE SEQUENCE "bnrevact_seq";


CREATE TABLE "bnrevact"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codmue" VARCHAR(20)  NOT NULL,
  "nroseginm" VARCHAR(6)  NOT NULL,
  "fecseginm" DATE,
  "nomseginm" VARCHAR(100),
  "cobseginm" VARCHAR(20),
  "monseginm" NUMERIC(14,2),
  "fecsegven" DATE,
  "proseginm" VARCHAR(100),
  "obsseginm" VARCHAR(250),
  "staseginm" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnrevact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnrevact" IS '';


-----------------------------------------------------------------------------
-- bnsegmue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnsegmue" CASCADE;

DROP SEQUENCE IF EXISTS "bnsegmue_seq";

CREATE SEQUENCE "bnsegmue_seq";


CREATE TABLE "bnsegmue"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codmue" VARCHAR(20)  NOT NULL,
  "nrosegmue" VARCHAR(6)  NOT NULL,
  "fecsegmue" DATE,
  "nomsegmue" VARCHAR(100),
  "cobsegmue" VARCHAR(20),
  "monsegmue" NUMERIC(14,2),
  "fecsegven" DATE,
  "prosegmue" VARCHAR(100),
  "obssegmue" VARCHAR(250),
  "stasegmue" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnsegmue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnsegmue" IS '';


-----------------------------------------------------------------------------
-- bnsegsem
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnsegsem" CASCADE;

DROP SEQUENCE IF EXISTS "bnsegsem_seq";

CREATE SEQUENCE "bnsegsem_seq";


CREATE TABLE "bnsegsem"
(
  "codact" VARCHAR(30)  NOT NULL,
  "codsem" VARCHAR(20)  NOT NULL,
  "nrosegsem" VARCHAR(6)  NOT NULL,
  "fecsegsem" DATE,
  "nomsegsem" VARCHAR(100),
  "cobsegsem" VARCHAR(20),
  "monsegsem" NUMERIC(14,2),
  "fecsegven" DATE,
  "prosegsem" VARCHAR(100),
  "obssegsem" VARCHAR(250),
  "stasegsem" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnsegsem_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnsegsem" IS '';


-----------------------------------------------------------------------------
-- bnubibie
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnubibie" CASCADE;

DROP SEQUENCE IF EXISTS "bnubibie_seq";

CREATE SEQUENCE "bnubibie_seq";


CREATE TABLE "bnubibie"
(
  "codubi" VARCHAR(30)  NOT NULL,
  "desubi" VARCHAR(250),
  "stacod" VARCHAR(1),
  "dirubi" VARCHAR(500),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnubibie_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnubibie" IS '';


-----------------------------------------------------------------------------
-- bnubica
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "bnubica" CASCADE;

DROP SEQUENCE IF EXISTS "bnubica_seq";

CREATE SEQUENCE "bnubica_seq";


CREATE TABLE "bnubica"
(
  "codubi" VARCHAR(30)  NOT NULL,
  "desubi" VARCHAR(250),
  "stacod" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('bnubica_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "bnubica" IS '';



-----------------------------------------------------------------------------
-- cpadidis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpadidis" CASCADE;

DROP SEQUENCE IF EXISTS "cpadidis_seq";

CREATE SEQUENCE "cpadidis_seq";


CREATE TABLE "cpadidis"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "fecadi" DATE  NOT NULL,
  "anoadi" VARCHAR(4),
  "desadi" VARCHAR(250),
  "desanu" VARCHAR(250),
  "adidis" VARCHAR(1),
  "totadi" NUMERIC(14,2),
  "staadi" VARCHAR(1),
  "numcom" VARCHAR(8),
  "fecanu" DATE,
  "peradi" VARCHAR(2),
  "tipgas" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpadidis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpadidis" IS '';


-----------------------------------------------------------------------------
-- cpajuste
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpajuste" CASCADE;

DROP SEQUENCE IF EXISTS "cpajuste_seq";

CREATE SEQUENCE "cpajuste_seq";


CREATE TABLE "cpajuste"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "tipaju" VARCHAR(4)  NOT NULL,
  "fecaju" DATE  NOT NULL,
  "anoaju" VARCHAR(4)  NOT NULL,
  "refere" VARCHAR(8)  NOT NULL,
  "desaju" VARCHAR(500),
  "desanu" VARCHAR(250),
  "totaju" NUMERIC(14,2),
  "staaju" VARCHAR(1),
  "fecanu" DATE,
  "numcom" VARCHAR(8),
  "cuoanu" NUMERIC(6),
  "fecanudes" DATE,
  "fecanuhas" DATE,
  "ordpag" VARCHAR(1),
  "fecenvcon" DATE,
  "fecenvfin" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpajuste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpajuste" IS '';


-----------------------------------------------------------------------------
-- cpasiini
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpasiini" CASCADE;

DROP SEQUENCE IF EXISTS "cpasiini_seq";

CREATE SEQUENCE "cpasiini_seq";


CREATE TABLE "cpasiini"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "nompre" VARCHAR(250),
  "perpre" VARCHAR(2)  NOT NULL,
  "anopre" VARCHAR(4)  NOT NULL,
  "monasi" NUMERIC(14,2),
  "monprc" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "montra" NUMERIC(14,2),
  "montrn" NUMERIC(14,2),
  "monadi" NUMERIC(14,2),
  "mondim" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "mondis" NUMERIC(14,2),
  "difere" NUMERIC(14,2),
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpasiini_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpasiini" IS '';


CREATE INDEX "i02cpasiini" ON "cpasiini" ("codpre");

CREATE INDEX "i03cpasiini" ON "cpasiini" ("codpre","perpre");

-----------------------------------------------------------------------------
-- cpcompro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpcompro" CASCADE;

DROP SEQUENCE IF EXISTS "cpcompro_seq";

CREATE SEQUENCE "cpcompro_seq";


CREATE TABLE "cpcompro"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "anocom" VARCHAR(4),
  "refprc" VARCHAR(8),
  "tipprc" VARCHAR(4),
  "descom" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacom" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "tipo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpcompro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpcompro" IS '';


-----------------------------------------------------------------------------
-- cpdefniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdefniv" CASCADE;

DROP SEQUENCE IF EXISTS "cpdefniv_seq";

CREATE SEQUENCE "cpdefniv_seq";


CREATE TABLE "cpdefniv"
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
  "coraep" VARCHAR(8),
  "gencom" VARCHAR(1),
  "numcom" VARCHAR(8),
  "caraep" VARCHAR(8),
  "tiptraprc" VARCHAR(4),
  "fueord" VARCHAR(4),
  "fuecre" VARCHAR(4),
  "fuetra" VARCHAR(4),
  "nomgob" VARCHAR(100),
  "nomsec" VARCHAR(100),
  "unidad" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdefniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdefniv" IS '';


-----------------------------------------------------------------------------
-- cpdeftit
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdeftit" CASCADE;

DROP SEQUENCE IF EXISTS "cpdeftit_seq";

CREATE SEQUENCE "cpdeftit_seq";


CREATE TABLE "cpdeftit"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "nompre" VARCHAR(250)  NOT NULL,
  "codcta" VARCHAR(32),
  "stacod" VARCHAR(1),
  "coduni" VARCHAR(4),
  "estatus" VARCHAR(1),
  "codtip" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdeftit_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdeftit" IS '';


-----------------------------------------------------------------------------
-- cpdiscre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdiscre" CASCADE;

DROP SEQUENCE IF EXISTS "cpdiscre_seq";

CREATE SEQUENCE "cpdiscre_seq";


CREATE TABLE "cpdiscre"
(
  "sector" VARCHAR(2),
  "partida" VARCHAR(3),
  "monto" NUMERIC(16,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdiscre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdiscre" IS '';


-----------------------------------------------------------------------------
-- cpdisfuefin
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdisfuefin" CASCADE;

DROP SEQUENCE IF EXISTS "cpdisfuefin_seq";

CREATE SEQUENCE "cpdisfuefin_seq";


CREATE TABLE "cpdisfuefin"
(
  "correl" VARCHAR(10),
  "origen" VARCHAR(20),
  "fuefin" VARCHAR(4),
  "fecdis" DATE,
  "codpre" VARCHAR(32),
  "monasi" NUMERIC(20,2),
  "refdis" VARCHAR(8),
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdisfuefin_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdisfuefin" IS '';


-----------------------------------------------------------------------------
-- cpdocaju
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdocaju" CASCADE;

DROP SEQUENCE IF EXISTS "cpdocaju_seq";

CREATE SEQUENCE "cpdocaju_seq";


CREATE TABLE "cpdocaju"
(
  "tipaju" VARCHAR(4)  NOT NULL,
  "nomext" VARCHAR(100)  NOT NULL,
  "nomabr" VARCHAR(4)  NOT NULL,
  "refier" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdocaju_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdocaju" IS '';


-----------------------------------------------------------------------------
-- cpdoccau
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdoccau" CASCADE;

DROP SEQUENCE IF EXISTS "cpdoccau_seq";

CREATE SEQUENCE "cpdoccau_seq";


CREATE TABLE "cpdoccau"
(
  "tipcau" VARCHAR(4)  NOT NULL,
  "nomext" VARCHAR(100)  NOT NULL,
  "nomabr" VARCHAR(4)  NOT NULL,
  "refier" VARCHAR(1)  NOT NULL,
  "afeprc" VARCHAR(1)  NOT NULL,
  "afecom" VARCHAR(1)  NOT NULL,
  "afecau" VARCHAR(1)  NOT NULL,
  "afedis" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdoccau_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdoccau" IS '';


-----------------------------------------------------------------------------
-- cpdoccom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdoccom" CASCADE;

DROP SEQUENCE IF EXISTS "cpdoccom_seq";

CREATE SEQUENCE "cpdoccom_seq";


CREATE TABLE "cpdoccom"
(
  "tipcom" VARCHAR(4)  NOT NULL,
  "nomext" VARCHAR(100)  NOT NULL,
  "nomabr" VARCHAR(4)  NOT NULL,
  "refprc" VARCHAR(1)  NOT NULL,
  "afeprc" VARCHAR(1)  NOT NULL,
  "afecom" VARCHAR(1)  NOT NULL,
  "afedis" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdoccom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdoccom" IS '';


-----------------------------------------------------------------------------
-- cpdocpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdocpag" CASCADE;

DROP SEQUENCE IF EXISTS "cpdocpag_seq";

CREATE SEQUENCE "cpdocpag_seq";


CREATE TABLE "cpdocpag"
(
  "tippag" VARCHAR(4)  NOT NULL,
  "nomext" VARCHAR(100)  NOT NULL,
  "nomabr" VARCHAR(4)  NOT NULL,
  "refier" VARCHAR(1)  NOT NULL,
  "afeprc" VARCHAR(1)  NOT NULL,
  "afecom" VARCHAR(1)  NOT NULL,
  "afecau" VARCHAR(1)  NOT NULL,
  "afepag" VARCHAR(1)  NOT NULL,
  "afedis" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdocpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdocpag" IS '';


-----------------------------------------------------------------------------
-- cpdocprc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpdocprc" CASCADE;

DROP SEQUENCE IF EXISTS "cpdocprc_seq";

CREATE SEQUENCE "cpdocprc_seq";


CREATE TABLE "cpdocprc"
(
  "tipprc" VARCHAR(4)  NOT NULL,
  "nomext" VARCHAR(100)  NOT NULL,
  "nomabr" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpdocprc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpdocprc" IS '';


-----------------------------------------------------------------------------
-- cpimpcau
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpimpcau" CASCADE;

DROP SEQUENCE IF EXISTS "cpimpcau_seq";

CREATE SEQUENCE "cpimpcau_seq";


CREATE TABLE "cpimpcau"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpimpcau_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpimpcau" IS '';


CREATE INDEX "i01cpimpcau" ON "cpimpcau" ("refcau");

CREATE INDEX "i02cpimpcau" ON "cpimpcau" ("refcau","refere","refprc","codpre");

CREATE INDEX "i03cpimpcau" ON "cpimpcau" ("codpre");

-----------------------------------------------------------------------------
-- cpimpcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpimpcom" CASCADE;

DROP SEQUENCE IF EXISTS "cpimpcom_seq";

CREATE SEQUENCE "cpimpcom_seq";


CREATE TABLE "cpimpcom"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpimpcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpimpcom" IS '';


CREATE INDEX "i01cpimpcom" ON "cpimpcom" ("refcom");

CREATE INDEX "i02cpimpcom" ON "cpimpcom" ("refcom","refere","codpre");

CREATE INDEX "i03cpimpcom" ON "cpimpcom" ("codpre");

-----------------------------------------------------------------------------
-- cpimppag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpimppag" CASCADE;

DROP SEQUENCE IF EXISTS "cpimppag_seq";

CREATE SEQUENCE "cpimppag_seq";


CREATE TABLE "cpimppag"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpimppag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpimppag" IS '';


CREATE INDEX "i01cpimppag" ON "cpimppag" ("refpag");

CREATE INDEX "i02cpimppag" ON "cpimppag" ("codpre");

-----------------------------------------------------------------------------
-- cpimpprc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpimpprc" CASCADE;

DROP SEQUENCE IF EXISTS "cpimpprc_seq";

CREATE SEQUENCE "cpimpprc_seq";


CREATE TABLE "cpimpprc"
(
  "refprc" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpimpprc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpimpprc" IS '';


-----------------------------------------------------------------------------
-- cpmovadi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpmovadi" CASCADE;

DROP SEQUENCE IF EXISTS "cpmovadi_seq";

CREATE SEQUENCE "cpmovadi_seq";


CREATE TABLE "cpmovadi"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpmovadi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpmovadi" IS '';


CREATE INDEX "i01cpmovadi" ON "cpmovadi" ("refadi");

-----------------------------------------------------------------------------
-- cpmovaju
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpmovaju" CASCADE;

DROP SEQUENCE IF EXISTS "cpmovaju_seq";

CREATE SEQUENCE "cpmovaju_seq";


CREATE TABLE "cpmovaju"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monaju" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "refprc" VARCHAR(8)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "refcau" VARCHAR(8)  NOT NULL,
  "refpag" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpmovaju_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpmovaju" IS '';


-----------------------------------------------------------------------------
-- cppagos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cppagos" CASCADE;

DROP SEQUENCE IF EXISTS "cppagos_seq";

CREATE SEQUENCE "cppagos_seq";


CREATE TABLE "cppagos"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "tippag" VARCHAR(4)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "anopag" VARCHAR(4),
  "refcau" VARCHAR(8),
  "tipcau" VARCHAR(4),
  "despag" VARCHAR(250),
  "desanu" VARCHAR(100),
  "monpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stapag" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('cppagos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cppagos" IS '';


-----------------------------------------------------------------------------
-- cpprecom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpprecom" CASCADE;

DROP SEQUENCE IF EXISTS "cpprecom_seq";

CREATE SEQUENCE "cpprecom_seq";


CREATE TABLE "cpprecom"
(
  "refprc" VARCHAR(8)  NOT NULL,
  "tipprc" VARCHAR(4)  NOT NULL,
  "fecprc" DATE  NOT NULL,
  "anoprc" VARCHAR(4),
  "desprc" VARCHAR(250),
  "desanu" VARCHAR(100),
  "monprc" NUMERIC(14,2),
  "salcom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "staprc" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "refsol" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpprecom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpprecom" IS '';


-----------------------------------------------------------------------------
-- cpsoltrasla
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpsoltrasla" CASCADE;

DROP SEQUENCE IF EXISTS "cpsoltrasla_seq";

CREATE SEQUENCE "cpsoltrasla_seq";


CREATE TABLE "cpsoltrasla"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "fectra" DATE,
  "anotra" VARCHAR(4),
  "pertra" VARCHAR(2)  NOT NULL,
  "destra" VARCHAR(250),
  "desanu" VARCHAR(250),
  "tottra" NUMERIC(14,2),
  "statra" VARCHAR(1),
  "codart" VARCHAR(3),
  "stacon" VARCHAR(1),
  "stagob" VARCHAR(1),
  "stapre" VARCHAR(1),
  "fecpre" DATE,
  "despre" VARCHAR(250),
  "feccon" DATE,
  "descon" VARCHAR(250),
  "desgob" VARCHAR(250),
  "fecgob" DATE,
  "justificacion" VARCHAR(4000),
  "feccont" DATE,
  "justificacion1" VARCHAR(4000),
  "justificacion2" VARCHAR(4000),
  "justificacion3" VARCHAR(4000),
  "justificacion4" VARCHAR(4000),
  "justificacion5" VARCHAR(4000),
  "justificacion6" VARCHAR(4000),
  "justificacion7" VARCHAR(4000),
  "justificacion8" VARCHAR(4000),
  "justificacion9" VARCHAR(4000),
  "tipo" VARCHAR(100),
  "tipgas" VARCHAR(250),
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpsoltrasla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpsoltrasla" IS '';


-----------------------------------------------------------------------------
-- cpartley
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpartley" CASCADE;

DROP SEQUENCE IF EXISTS "cpartley_seq";

CREATE SEQUENCE "cpartley_seq";


CREATE TABLE "cpartley"
(
  "codart" VARCHAR(3)  NOT NULL,
  "desart" VARCHAR(250),
  "nomabr" VARCHAR(4),
  "stacon" VARCHAR(1),
  "stagob" VARCHAR(1),
  "stapre" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpartley_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpartley" IS '';


-----------------------------------------------------------------------------
-- cpcausad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpcausad" CASCADE;

DROP SEQUENCE IF EXISTS "cpcausad_seq";

CREATE SEQUENCE "cpcausad_seq";


CREATE TABLE "cpcausad"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "feccau" DATE  NOT NULL,
  "anocau" VARCHAR(4),
  "refcom" VARCHAR(8),
  "tipcom" VARCHAR(4),
  "descau" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacau" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpcausad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpcausad" IS '';


-----------------------------------------------------------------------------
-- cpsolmovadi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpsolmovadi" CASCADE;

DROP SEQUENCE IF EXISTS "cpsolmovadi_seq";

CREATE SEQUENCE "cpsolmovadi_seq";


CREATE TABLE "cpsolmovadi"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32),
  "perpre" VARCHAR(2),
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpsolmovadi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpsolmovadi" IS '';


-----------------------------------------------------------------------------
-- cpsolmovtra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpsolmovtra" CASCADE;

DROP SEQUENCE IF EXISTS "cpsolmovtra_seq";

CREATE SEQUENCE "cpsolmovtra_seq";


CREATE TABLE "cpsolmovtra"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "codori" VARCHAR(32),
  "coddes" VARCHAR(32),
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpsolmovtra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpsolmovtra" IS '';


-----------------------------------------------------------------------------
-- cpsoladidis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpsoladidis" CASCADE;

DROP SEQUENCE IF EXISTS "cpsoladidis_seq";

CREATE SEQUENCE "cpsoladidis_seq";


CREATE TABLE "cpsoladidis"
(
  "despre" VARCHAR(250),
  "justificacion" VARCHAR(4000),
  "enunciado" VARCHAR(1000),
  "refadi" VARCHAR(8)  NOT NULL,
  "fecadi" DATE,
  "anoadi" VARCHAR(4),
  "desadi" VARCHAR(250),
  "desanu" VARCHAR(250),
  "fecanu" DATE,
  "totadi" NUMERIC(14,2),
  "staadi" VARCHAR(1),
  "adidis" VARCHAR(1),
  "codart" VARCHAR(3),
  "stacon" VARCHAR(1),
  "feccon" DATE,
  "descon" VARCHAR(250),
  "stagob" VARCHAR(1),
  "fecgob" DATE,
  "desgob" VARCHAR(250),
  "stapre" VARCHAR(1),
  "fecpre" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpsoladidis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpsoladidis" IS '';


-----------------------------------------------------------------------------
-- cpmovfuefin
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpmovfuefin" CASCADE;

DROP SEQUENCE IF EXISTS "cpmovfuefin_seq";

CREATE SEQUENCE "cpmovfuefin_seq";


CREATE TABLE "cpmovfuefin"
(
  "correl" VARCHAR(10),
  "refmov" VARCHAR(8),
  "tipmov" VARCHAR(20),
  "monmov" NUMERIC(20,2),
  "fecmov" DATE,
  "codpre" VARCHAR(32),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpmovfuefin_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpmovfuefin" IS '';


-----------------------------------------------------------------------------
-- cpniveles
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpniveles" CASCADE;

DROP SEQUENCE IF EXISTS "cpniveles_seq";

CREATE SEQUENCE "cpniveles_seq";


CREATE TABLE "cpniveles"
(
  "catpar" VARCHAR(1)  NOT NULL,
  "consec" NUMERIC(2)  NOT NULL,
  "nomabr" VARCHAR(10)  NOT NULL,
  "nomext" VARCHAR(50)  NOT NULL,
  "lonniv" NUMERIC(2),
  "staniv" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpniveles_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpniveles" IS '';


-----------------------------------------------------------------------------
-- cppereje
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cppereje" CASCADE;

DROP SEQUENCE IF EXISTS "cppereje_seq";

CREATE SEQUENCE "cppereje_seq";


CREATE TABLE "cppereje"
(
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "fechas" DATE  NOT NULL,
  "estper" VARCHAR(1),
  "cerrado" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cppereje_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cppereje" IS '';


-----------------------------------------------------------------------------
-- cptrasla
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cptrasla" CASCADE;

DROP SEQUENCE IF EXISTS "cptrasla_seq";

CREATE SEQUENCE "cptrasla_seq";


CREATE TABLE "cptrasla"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "anotra" VARCHAR(4),
  "pertra" VARCHAR(2)  NOT NULL,
  "destra" VARCHAR(250),
  "desanu" VARCHAR(250),
  "tottra" NUMERIC(14,2),
  "statra" VARCHAR(1),
  "fecanu" DATE,
  "nrodec" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cptrasla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cptrasla" IS '';


CREATE INDEX "i01cptrasla" ON "cptrasla" ("reftra","fectra");

-----------------------------------------------------------------------------
-- cpimpapa
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpimpapa" CASCADE;

DROP SEQUENCE IF EXISTS "cpimpapa_seq";

CREATE SEQUENCE "cpimpapa_seq";


CREATE TABLE "cpimpapa"
(
  "refapa" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpimpapa_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpimpapa" IS '';


-----------------------------------------------------------------------------
-- cpimprel
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpimprel" CASCADE;

DROP SEQUENCE IF EXISTS "cpimprel_seq";

CREATE SEQUENCE "cpimprel_seq";


CREATE TABLE "cpimprel"
(
  "refrel" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monrel" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "starel" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpimprel_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpimprel" IS '';


-----------------------------------------------------------------------------
-- cpmovtra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpmovtra" CASCADE;

DROP SEQUENCE IF EXISTS "cpmovtra_seq";

CREATE SEQUENCE "cpmovtra_seq";


CREATE TABLE "cpmovtra"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "codori" VARCHAR(32)  NOT NULL,
  "coddes" VARCHAR(32)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpmovtra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpmovtra" IS '';


CREATE INDEX "i01cpmovtra" ON "cpmovtra" ("reftra");

-----------------------------------------------------------------------------
-- cpmovadifin
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cpmovadifin" CASCADE;

DROP SEQUENCE IF EXISTS "cpmovadifin_seq";

CREATE SEQUENCE "cpmovadifin_seq";


CREATE TABLE "cpmovadifin"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "codfin" VARCHAR(4),
  "monfin" NUMERIC(20,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cpmovadifin_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpmovadifin" IS '';


-----------------------------------------------------------------------------
-- cprelapa
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cprelapa" CASCADE;

DROP SEQUENCE IF EXISTS "cprelapa_seq";

CREATE SEQUENCE "cprelapa_seq";


CREATE TABLE "cprelapa"
(
  "refrel" VARCHAR(8)  NOT NULL,
  "tiprel" VARCHAR(4)  NOT NULL,
  "fecrel" DATE  NOT NULL,
  "refapa" VARCHAR(8),
  "desrel" VARCHAR(250),
  "desanu" VARCHAR(100),
  "monrel" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "starel" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "numcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cprelapa_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cprelapa" IS '';



-----------------------------------------------------------------------------
-- nomcarocp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nomcarocp" CASCADE;

DROP SEQUENCE IF EXISTS "nomcarocp_seq";

CREATE SEQUENCE "nomcarocp_seq";


CREATE TABLE "nomcarocp"
(
  "codocp" VARCHAR(4)  NOT NULL,
  "desocp" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nomcarocp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nomcarocp" IS '';


-----------------------------------------------------------------------------
-- nomtipded
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "nomtipded" CASCADE;

DROP SEQUENCE IF EXISTS "nomtipded_seq";

CREATE SEQUENCE "nomtipded_seq";


CREATE TABLE "nomtipded"
(
  "codtip" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('nomtipded_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "nomtipded" IS '';


-----------------------------------------------------------------------------
-- acdestina
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "acdestina" CASCADE;

DROP SEQUENCE IF EXISTS "acdestina_seq";

CREATE SEQUENCE "acdestina_seq";


CREATE TABLE "acdestina"
(
  "cedrif" VARCHAR(15)  NOT NULL,
  "nomdes" VARCHAR(250)  NOT NULL,
  "dirdes" VARCHAR(100),
  "teldes" VARCHAR(20),
  "nitdes" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('acdestina_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "acdestina" IS '';


-----------------------------------------------------------------------------
-- acunidad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "acunidad" CASCADE;

DROP SEQUENCE IF EXISTS "acunidad_seq";

CREATE SEQUENCE "acunidad_seq";


CREATE TABLE "acunidad"
(
  "numuni" VARCHAR(4)  NOT NULL,
  "nomuni" VARCHAR(30)  NOT NULL,
  "desuni" VARCHAR(200),
  "id" INTEGER  NOT NULL DEFAULT nextval('acunidad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "acunidad" IS '';


-----------------------------------------------------------------------------
-- faltan
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faltan" CASCADE;

DROP SEQUENCE IF EXISTS "faltan_seq";

CREATE SEQUENCE "faltan_seq";


CREATE TABLE "faltan"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "nompre" VARCHAR(100)  NOT NULL,
  "codcta" VARCHAR(32),
  "stacod" VARCHAR(1),
  "coduni" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('faltan_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faltan" IS '';


CREATE INDEX "i01faltan" ON "faltan" ("codpre");

-----------------------------------------------------------------------------
-- removadi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "removadi" CASCADE;

DROP SEQUENCE IF EXISTS "removadi_seq";

CREATE SEQUENCE "removadi_seq";


CREATE TABLE "removadi"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('removadi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "removadi" IS '';


-----------------------------------------------------------------------------
-- removaju
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "removaju" CASCADE;

DROP SEQUENCE IF EXISTS "removaju_seq";

CREATE SEQUENCE "removaju_seq";


CREATE TABLE "removaju"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monaju" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "refprc" VARCHAR(8)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "refcau" VARCHAR(8)  NOT NULL,
  "refpag" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('removaju_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "removaju" IS '';


-----------------------------------------------------------------------------
-- removtra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "removtra" CASCADE;

DROP SEQUENCE IF EXISTS "removtra_seq";

CREATE SEQUENCE "removtra_seq";


CREATE TABLE "removtra"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "codori" VARCHAR(32)  NOT NULL,
  "coddes" VARCHAR(32)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('removtra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "removtra" IS '';


-----------------------------------------------------------------------------
-- contaba
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "contaba" CASCADE;

DROP SEQUENCE IF EXISTS "contaba_seq";

CREATE SEQUENCE "contaba_seq";


CREATE TABLE "contaba"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "loncta" NUMERIC(2)  NOT NULL,
  "numrup" NUMERIC(2)  NOT NULL,
  "forcta" VARCHAR(32)  NOT NULL,
  "sitfin" VARCHAR(32),
  "sitfis" VARCHAR(32),
  "ganper" VARCHAR(32),
  "ejepre" VARCHAR(32),
  "hacmun" VARCHAR(32),
  "ctlgas" VARCHAR(32),
  "ctling" VARCHAR(32),
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "codtes" VARCHAR(32),
  "codhac" VARCHAR(32),
  "codpre" VARCHAR(32),
  "codord" VARCHAR(32),
  "codtesact" VARCHAR(32),
  "codhacact" VARCHAR(32),
  "codhacpat" VARCHAR(32),
  "codtespas" VARCHAR(32),
  "codhacpas" VARCHAR(32),
  "codind" VARCHAR(32),
  "codinh" VARCHAR(32),
  "codegd" VARCHAR(32),
  "codegh" VARCHAR(32),
  "codres" VARCHAR(32),
  "codejepre" VARCHAR(32),
  "codctd" VARCHAR(32),
  "codcta" VARCHAR(32),
  "codresant" VARCHAR(32),
  "etadef" VARCHAR(1),
  "codctagas" VARCHAR(32),
  "codctaban" VARCHAR(32),
  "codctaret" VARCHAR(32),
  "codctaben" VARCHAR(32),
  "codctaart" VARCHAR(32),
  "codctagashas" VARCHAR(32),
  "codctabanhas" VARCHAR(32),
  "codctarethas" VARCHAR(32),
  "codctabenhas" VARCHAR(32),
  "codctaarthas" VARCHAR(32),
  "codctapageje" VARCHAR(32),
  "codctaingdevn" VARCHAR(32),
  "codctaingdev" VARCHAR(32),
  "unidad" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('contaba_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "contaba" IS '';


-----------------------------------------------------------------------------
-- contaba1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "contaba1" CASCADE;

DROP SEQUENCE IF EXISTS "contaba1_seq";

CREATE SEQUENCE "contaba1_seq";


CREATE TABLE "contaba1"
(
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "fechas" DATE  NOT NULL,
  "status" VARCHAR(1) default 'A',
  "id" INTEGER  NOT NULL DEFAULT nextval('contaba1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "contaba1" IS '';


-----------------------------------------------------------------------------
-- contabb
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "contabb" CASCADE;

DROP SEQUENCE IF EXISTS "contabb_seq";

CREATE SEQUENCE "contabb_seq";


CREATE TABLE "contabb"
(
  "codcta" VARCHAR(32)  NOT NULL,
  "descta" VARCHAR(250)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "salant" NUMERIC(14,2),
  "debcre" VARCHAR(1)  NOT NULL,
  "cargab" VARCHAR(1)  NOT NULL,
  "salprgper" NUMERIC(14,2),
  "salacuper" NUMERIC(14,2),
  "salprgperfor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('contabb_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "contabb" IS '';


CREATE INDEX "i02contabb" ON "contabb" ("codcta","fecini","feccie");

CREATE INDEX "i10contabb" ON "contabb" ("codcta","cargab");

-----------------------------------------------------------------------------
-- contabb1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "contabb1" CASCADE;

DROP SEQUENCE IF EXISTS "contabb1_seq";

CREATE SEQUENCE "contabb1_seq";


CREATE TABLE "contabb1"
(
  "codcta" VARCHAR(32)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "totdeb" NUMERIC(14,2),
  "totcre" NUMERIC(14,2),
  "salact" NUMERIC(14,2),
  "salprgper" NUMERIC(14,2),
  "salprgperfor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('contabb1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "contabb1" IS '';


CREATE INDEX "i01contabb1" ON "contabb1" ("codcta");

CREATE INDEX "i02contabb1" ON "contabb1" ("codcta","fecini","feccie");

CREATE INDEX "i05contabb1" ON "contabb1" ("codcta","pereje");

CREATE INDEX "i06contabb1" ON "contabb1" ("codcta","pereje","fecini","feccie");

ALTER TABLE "contabb1" ADD CONSTRAINT "contabb1_FK_1" FOREIGN KEY ("codcta") REFERENCES "contabb" ("codcta");

-----------------------------------------------------------------------------
-- contabc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "contabc" CASCADE;

DROP SEQUENCE IF EXISTS "contabc_seq";

CREATE SEQUENCE "contabc_seq";


CREATE TABLE "contabc"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "descom" VARCHAR(250),
  "moncom" NUMERIC(14,2),
  "stacom" VARCHAR(1)  NOT NULL,
  "tipcom" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('contabc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "contabc" IS '';


CREATE INDEX "i03contabc" ON "contabc" ("stacom");

-----------------------------------------------------------------------------
-- contabc1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "contabc1" CASCADE;

DROP SEQUENCE IF EXISTS "contabc1_seq";

CREATE SEQUENCE "contabc1_seq";


CREATE TABLE "contabc1"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "numasi" NUMERIC(3),
  "refasi" VARCHAR(8),
  "desasi" VARCHAR(250),
  "monasi" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('contabc1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "contabc1" IS '';


CREATE INDEX "i01contabc1" ON "contabc1" ("numcom");

CREATE INDEX "i02contabc1" ON "contabc1" ("codcta");

-----------------------------------------------------------------------------
-- ciadidis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciadidis" CASCADE;

DROP SEQUENCE IF EXISTS "ciadidis_seq";

CREATE SEQUENCE "ciadidis_seq";


CREATE TABLE "ciadidis"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "fecadi" DATE  NOT NULL,
  "anoadi" VARCHAR(4),
  "desadi" VARCHAR(250),
  "desanu" VARCHAR(250),
  "adidis" VARCHAR(1),
  "totadi" NUMERIC(14,2),
  "staadi" VARCHAR(1),
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('ciadidis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciadidis" IS '';


-----------------------------------------------------------------------------
-- ciajuste
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciajuste" CASCADE;

DROP SEQUENCE IF EXISTS "ciajuste_seq";

CREATE SEQUENCE "ciajuste_seq";


CREATE TABLE "ciajuste"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "fecaju" DATE  NOT NULL,
  "anoaju" VARCHAR(4)  NOT NULL,
  "refere" VARCHAR(8),
  "desaju" VARCHAR(250),
  "desanu" VARCHAR(250),
  "totaju" NUMERIC(14,2),
  "staaju" VARCHAR(1),
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('ciajuste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciajuste" IS '';


-----------------------------------------------------------------------------
-- ciasiini
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciasiini" CASCADE;

DROP SEQUENCE IF EXISTS "ciasiini_seq";

CREATE SEQUENCE "ciasiini_seq";


CREATE TABLE "ciasiini"
(
  "codpre" VARCHAR(34)  NOT NULL,
  "nompre" VARCHAR(100),
  "perpre" VARCHAR(2)  NOT NULL,
  "anopre" VARCHAR(4)  NOT NULL,
  "monasi" NUMERIC(14,2),
  "monprc" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "montra" NUMERIC(14,2),
  "montrn" NUMERIC(14,2),
  "monadi" NUMERIC(14,2),
  "mondim" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "mondis" NUMERIC(14,2),
  "difere" NUMERIC(14,2),
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciasiini_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciasiini" IS '';


-----------------------------------------------------------------------------
-- ciconrep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciconrep" CASCADE;

DROP SEQUENCE IF EXISTS "ciconrep_seq";

CREATE SEQUENCE "ciconrep_seq";


CREATE TABLE "ciconrep"
(
  "rifcon" VARCHAR(14)  NOT NULL,
  "repcon" VARCHAR(1)  NOT NULL,
  "nitcon" VARCHAR(14),
  "nomcon" VARCHAR(50)  NOT NULL,
  "naccon" VARCHAR(1)  NOT NULL,
  "dircon" VARCHAR(50),
  "codpar" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "tipcon" VARCHAR(1)  NOT NULL,
  "telcon" VARCHAR(30),
  "faxcon" VARCHAR(15),
  "emacon" VARCHAR(50),
  "urlcon" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciconrep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciconrep" IS '';


-----------------------------------------------------------------------------
-- cidefniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cidefniv" CASCADE;

DROP SEQUENCE IF EXISTS "cidefniv_seq";

CREATE SEQUENCE "cidefniv_seq";


CREATE TABLE "cidefniv"
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
  "coraep" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('cidefniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cidefniv" IS '';


-----------------------------------------------------------------------------
-- cideftit
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cideftit" CASCADE;

DROP SEQUENCE IF EXISTS "cideftit_seq";

CREATE SEQUENCE "cideftit_seq";


CREATE TABLE "cideftit"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "nompre" VARCHAR(100)  NOT NULL,
  "codcta" VARCHAR(32),
  "stacod" VARCHAR(1),
  "coduni" VARCHAR(4),
  "estatus" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cideftit_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cideftit" IS '';


-----------------------------------------------------------------------------
-- cidisniv
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cidisniv" CASCADE;

DROP SEQUENCE IF EXISTS "cidisniv_seq";

CREATE SEQUENCE "cidisniv_seq";


CREATE TABLE "cidisniv"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "monasi" NUMERIC(14,2),
  "modificacion" NUMERIC(14,2),
  "asigactual" NUMERIC(14,2),
  "monprc" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "mondis" NUMERIC(14,2),
  "deuda" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('cidisniv_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cidisniv" IS '';


-----------------------------------------------------------------------------
-- cierre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cierre" CASCADE;

DROP SEQUENCE IF EXISTS "cierre_seq";

CREATE SEQUENCE "cierre_seq";


CREATE TABLE "cierre"
(
  "codnom" VARCHAR(3)  NOT NULL,
  "codcon" VARCHAR(3)  NOT NULL,
  "fecnom" DATE  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "monto" NUMERIC(14,2)  NOT NULL,
  "asided" VARCHAR(1),
  "codtipgas" VARCHAR(16),
  "cantidad" NUMERIC(14,2),
  "codban" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('cierre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cierre" IS '';


-----------------------------------------------------------------------------
-- ciimping
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciimping" CASCADE;

DROP SEQUENCE IF EXISTS "ciimping_seq";

CREATE SEQUENCE "ciimping_seq";


CREATE TABLE "ciimping"
(
  "refing" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "moning" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "mondes" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "fecing" DATE,
  "staimp" VARCHAR(1),
  "monaju" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciimping_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciimping" IS '';


-----------------------------------------------------------------------------
-- cimovadi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cimovadi" CASCADE;

DROP SEQUENCE IF EXISTS "cimovadi_seq";

CREATE SEQUENCE "cimovadi_seq";


CREATE TABLE "cimovadi"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cimovadi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cimovadi" IS '';


-----------------------------------------------------------------------------
-- cimovaju
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cimovaju" CASCADE;

DROP SEQUENCE IF EXISTS "cimovaju_seq";

CREATE SEQUENCE "cimovaju_seq";


CREATE TABLE "cimovaju"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monaju" NUMERIC(14,2)  NOT NULL,
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cimovaju_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cimovaju" IS '';


-----------------------------------------------------------------------------
-- cimovtra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cimovtra" CASCADE;

DROP SEQUENCE IF EXISTS "cimovtra_seq";

CREATE SEQUENCE "cimovtra_seq";


CREATE TABLE "cimovtra"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "codori" VARCHAR(32)  NOT NULL,
  "coddes" VARCHAR(32)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('cimovtra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cimovtra" IS '';


-----------------------------------------------------------------------------
-- ciniveles
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciniveles" CASCADE;

DROP SEQUENCE IF EXISTS "ciniveles_seq";

CREATE SEQUENCE "ciniveles_seq";


CREATE TABLE "ciniveles"
(
  "catpar" VARCHAR(1)  NOT NULL,
  "consec" NUMERIC(2)  NOT NULL,
  "nomabr" VARCHAR(10)  NOT NULL,
  "nomext" VARCHAR(50)  NOT NULL,
  "lonniv" NUMERIC(2),
  "staniv" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciniveles_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciniveles" IS '';


-----------------------------------------------------------------------------
-- cipereje
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cipereje" CASCADE;

DROP SEQUENCE IF EXISTS "cipereje_seq";

CREATE SEQUENCE "cipereje_seq";


CREATE TABLE "cipereje"
(
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "fechas" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cipereje_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cipereje" IS '';


-----------------------------------------------------------------------------
-- cireging
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "cireging" CASCADE;

DROP SEQUENCE IF EXISTS "cireging_seq";

CREATE SEQUENCE "cireging_seq";


CREATE TABLE "cireging"
(
  "refing" VARCHAR(8)  NOT NULL,
  "fecing" DATE  NOT NULL,
  "desing" VARCHAR(500),
  "codtip" VARCHAR(3),
  "rifcon" VARCHAR(15),
  "moning" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "mondes" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "desanu" VARCHAR(250),
  "fecanu" DATE,
  "staing" VARCHAR(1),
  "ctaban" VARCHAR(20),
  "tipmov" VARCHAR(4),
  "previs" VARCHAR(1),
  "anoing" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('cireging_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cireging" IS '';


-----------------------------------------------------------------------------
-- ciregingr
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ciregingr" CASCADE;

DROP SEQUENCE IF EXISTS "ciregingr_seq";

CREATE SEQUENCE "ciregingr_seq";


CREATE TABLE "ciregingr"
(
  "refing" VARCHAR(8)  NOT NULL,
  "fecing" DATE  NOT NULL,
  "desing" VARCHAR(250),
  "codtip" VARCHAR(3),
  "rifcon" VARCHAR(15),
  "moning" NUMERIC(14,2),
  "monrec" NUMERIC(14,2),
  "mondes" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "desanu" VARCHAR(250),
  "fecanu" DATE,
  "staing" VARCHAR(1),
  "ctaban" VARCHAR(20),
  "tipmov" VARCHAR(4),
  "previs" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('ciregingr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ciregingr" IS '';


-----------------------------------------------------------------------------
-- citiping
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "citiping" CASCADE;

DROP SEQUENCE IF EXISTS "citiping_seq";

CREATE SEQUENCE "citiping_seq";


CREATE TABLE "citiping"
(
  "codtip" VARCHAR(3)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('citiping_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "citiping" IS '';


-----------------------------------------------------------------------------
-- citrasla
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "citrasla" CASCADE;

DROP SEQUENCE IF EXISTS "citrasla_seq";

CREATE SEQUENCE "citrasla_seq";


CREATE TABLE "citrasla"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "anotra" VARCHAR(4),
  "pertra" VARCHAR(2)  NOT NULL,
  "destra" VARCHAR(250),
  "desanu" VARCHAR(250),
  "tottra" NUMERIC(14,2),
  "statra" VARCHAR(1),
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('citrasla_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "citrasla" IS '';


-----------------------------------------------------------------------------
-- unidades
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "unidades" CASCADE;

DROP SEQUENCE IF EXISTS "unidades_seq";

CREATE SEQUENCE "unidades_seq";


CREATE TABLE "unidades"
(
  "codubi" VARCHAR(30)  NOT NULL,
  "desubi" VARCHAR(250),
  "stacod" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('unidades_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "unidades" IS '';


-----------------------------------------------------------------------------
-- unidades2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "unidades2" CASCADE;

DROP SEQUENCE IF EXISTS "unidades2_seq";

CREATE SEQUENCE "unidades2_seq";


CREATE TABLE "unidades2"
(
  "codubi" VARCHAR(30)  NOT NULL,
  "desubi" VARCHAR(250),
  "stacod" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('unidades2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "unidades2" IS '';


-----------------------------------------------------------------------------
-- pagdocume
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "pagdocume" CASCADE;

DROP SEQUENCE IF EXISTS "pagdocume_seq";

CREATE SEQUENCE "pagdocume_seq";


CREATE TABLE "pagdocume"
(
  "refdoc" VARCHAR(10)  NOT NULL,
  "codpro" VARCHAR(10)  NOT NULL,
  "codmov" VARCHAR(3)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "fecven" DATE,
  "oridoc" VARCHAR(3),
  "desdoc" VARCHAR(100),
  "mondoc" NUMERIC(14,2),
  "recdoc" NUMERIC(14,2),
  "dscdoc" NUMERIC(14,2),
  "abodoc" NUMERIC(14,2),
  "saldoc" NUMERIC(14,2),
  "fecanu" DATE,
  "desanu" VARCHAR(100),
  "stadoc" VARCHAR(1),
  "numcom" VARCHAR(8),
  "feccom" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('pagdocume_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "pagdocume" IS '';


CREATE INDEX "iipagdocume" ON "pagdocume" ("refdoc","codpro","codmov","fecemi");

-----------------------------------------------------------------------------
-- pagforpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "pagforpag" CASCADE;

DROP SEQUENCE IF EXISTS "pagforpag_seq";

CREATE SEQUENCE "pagforpag_seq";


CREATE TABLE "pagforpag"
(
  "codfor" VARCHAR(3)  NOT NULL,
  "desfor" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('pagforpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "pagforpag" IS '';


-----------------------------------------------------------------------------
-- pagtransa
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "pagtransa" CASCADE;

DROP SEQUENCE IF EXISTS "pagtransa_seq";

CREATE SEQUENCE "pagtransa_seq";


CREATE TABLE "pagtransa"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "codpro" VARCHAR(10)  NOT NULL,
  "codmov" VARCHAR(3)  NOT NULL,
  "destra" VARCHAR(100),
  "montra" NUMERIC(14,2),
  "totdsc" NUMERIC(14,2),
  "totrec" NUMERIC(14,2),
  "tottra" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "numche" VARCHAR(10),
  "desanu" VARCHAR(100),
  "fecanu" DATE,
  "rifpro" VARCHAR(15),
  "numcom" VARCHAR(8),
  "feccom" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('pagtransa_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "pagtransa" IS '';


CREATE INDEX "iipagtransa" ON "pagtransa" ("numtra","codpro","codmov","fectra");

-----------------------------------------------------------------------------
-- rcpadidis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rcpadidis" CASCADE;

DROP SEQUENCE IF EXISTS "rcpadidis_seq";

CREATE SEQUENCE "rcpadidis_seq";


CREATE TABLE "rcpadidis"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "fecadi" DATE  NOT NULL,
  "anoadi" VARCHAR(4),
  "desadi" VARCHAR(250),
  "desanu" VARCHAR(250),
  "adidis" VARCHAR(1),
  "totadi" NUMERIC(14,2),
  "staadi" VARCHAR(1),
  "numcom" VARCHAR(8),
  "fecanu" DATE,
  "peradi" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('rcpadidis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rcpadidis" IS '';


-----------------------------------------------------------------------------
-- rcpmovadi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "rcpmovadi" CASCADE;

DROP SEQUENCE IF EXISTS "rcpmovadi_seq";

CREATE SEQUENCE "rcpmovadi_seq";


CREATE TABLE "rcpmovadi"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "perpre" VARCHAR(2)  NOT NULL,
  "monmov" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('rcpmovadi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "rcpmovadi" IS '';


-----------------------------------------------------------------------------
-- atestados
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atestados" CASCADE;

DROP SEQUENCE IF EXISTS "atestados_seq";

CREATE SEQUENCE "atestados_seq";


CREATE TABLE "atestados"
(
  "desest" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atestados_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atestados" IS '';


-----------------------------------------------------------------------------
-- atmunicipios
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atmunicipios" CASCADE;

DROP SEQUENCE IF EXISTS "atmunicipios_seq";

CREATE SEQUENCE "atmunicipios_seq";


CREATE TABLE "atmunicipios"
(
  "atestados_id" INTEGER,
  "desmun" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atmunicipios_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atmunicipios" IS '';


ALTER TABLE "atmunicipios" ADD CONSTRAINT "atmunicipios_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

-----------------------------------------------------------------------------
-- atparroquias
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atparroquias" CASCADE;

DROP SEQUENCE IF EXISTS "atparroquias_seq";

CREATE SEQUENCE "atparroquias_seq";


CREATE TABLE "atparroquias"
(
  "atmunicipios_id" INTEGER,
  "despar" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atparroquias_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atparroquias" IS '';


ALTER TABLE "atparroquias" ADD CONSTRAINT "atparroquias_FK_1" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

-----------------------------------------------------------------------------
-- attipayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "attipayu" CASCADE;

DROP SEQUENCE IF EXISTS "attipayu_seq";

CREATE SEQUENCE "attipayu_seq";


CREATE TABLE "attipayu"
(
  "codayu" VARCHAR(8)  NOT NULL,
  "desayu" VARCHAR(50)  NOT NULL,
  "codpre" VARCHAR(25),
  "id" INTEGER  NOT NULL DEFAULT nextval('attipayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "attipayu" IS '';


-----------------------------------------------------------------------------
-- atrecayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atrecayu" CASCADE;

DROP SEQUENCE IF EXISTS "atrecayu_seq";

CREATE SEQUENCE "atrecayu_seq";


CREATE TABLE "atrecayu"
(
  "attipayu_id" INTEGER,
  "atrecaud_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('atrecayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atrecayu" IS '';


ALTER TABLE "atrecayu" ADD CONSTRAINT "atrecayu_FK_1" FOREIGN KEY ("attipayu_id") REFERENCES "attipayu" ("id");

ALTER TABLE "atrecayu" ADD CONSTRAINT "atrecayu_FK_2" FOREIGN KEY ("atrecaud_id") REFERENCES "atrecaud" ("id");

-----------------------------------------------------------------------------
-- atrecaud
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atrecaud" CASCADE;

DROP SEQUENCE IF EXISTS "atrecaud_seq";

CREATE SEQUENCE "atrecaud_seq";


CREATE TABLE "atrecaud"
(
  "codrec" VARCHAR(8)  NOT NULL,
  "desrec" VARCHAR(50)  NOT NULL,
  "requerido" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atrecaud_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atrecaud" IS '';


-----------------------------------------------------------------------------
-- atsolici
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atsolici" CASCADE;

DROP SEQUENCE IF EXISTS "atsolici_seq";

CREATE SEQUENCE "atsolici_seq";


CREATE TABLE "atsolici"
(
  "cedula" VARCHAR(12)  NOT NULL,
  "nombre" VARCHAR(50)  NOT NULL,
  "tipo" VARCHAR(1)  NOT NULL,
  "sexo" VARCHAR(1),
  "fechan" DATE,
  "estadoc" VARCHAR(1),
  "telefono" VARCHAR(25),
  "profesion" VARCHAR(30),
  "atestados_id" INTEGER,
  "atmunicipios_id" INTEGER,
  "atparroquias_id" INTEGER,
  "ciudad" VARCHAR(50),
  "caserio" VARCHAR(50),
  "direccion" VARCHAR(100),
  "consejoc" VARCHAR(100),
  "cargocc" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('atsolici_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atsolici" IS '';


ALTER TABLE "atsolici" ADD CONSTRAINT "atsolici_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

ALTER TABLE "atsolici" ADD CONSTRAINT "atsolici_FK_2" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

ALTER TABLE "atsolici" ADD CONSTRAINT "atsolici_FK_3" FOREIGN KEY ("atparroquias_id") REFERENCES "atparroquias" ("id");

-----------------------------------------------------------------------------
-- atayudas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atayudas" CASCADE;

DROP SEQUENCE IF EXISTS "atayudas_seq";

CREATE SEQUENCE "atayudas_seq";


CREATE TABLE "atayudas"
(
  "atsolici_id" INTEGER,
  "attipayu_id" INTEGER,
  "desayu" VARCHAR(50)  NOT NULL,
  "motayu" VARCHAR(50)  NOT NULL,
  "analizada" VARCHAR(1),
  "fechaa" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('atayudas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atayudas" IS '';


ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_1" FOREIGN KEY ("atsolici_id") REFERENCES "atsolici" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_2" FOREIGN KEY ("attipayu_id") REFERENCES "attipayu" ("id");

-----------------------------------------------------------------------------
-- atdetrecayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdetrecayu" CASCADE;

DROP SEQUENCE IF EXISTS "atdetrecayu_seq";

CREATE SEQUENCE "atdetrecayu_seq";


CREATE TABLE "atdetrecayu"
(
  "atayudas_id" INTEGER,
  "atrecaud_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdetrecayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdetrecayu" IS '';


ALTER TABLE "atdetrecayu" ADD CONSTRAINT "atdetrecayu_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

ALTER TABLE "atdetrecayu" ADD CONSTRAINT "atdetrecayu_FK_2" FOREIGN KEY ("atrecaud_id") REFERENCES "atrecaud" ("id");

-----------------------------------------------------------------------------
-- atdetayu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdetayu" CASCADE;

DROP SEQUENCE IF EXISTS "atdetayu_seq";

CREATE SEQUENCE "atdetayu_seq";


CREATE TABLE "atdetayu"
(
  "atayudas_id" INTEGER,
  "item" VARCHAR(30)  NOT NULL,
  "cantidad" INTEGER,
  "canapr" INTEGER,
  "aprobado" BOOLEAN,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdetayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdetayu" IS '';


ALTER TABLE "atdetayu" ADD CONSTRAINT "atdetayu_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

-----------------------------------------------------------------------------
-- atunidades
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atunidades" CASCADE;

DROP SEQUENCE IF EXISTS "atunidades_seq";

CREATE SEQUENCE "atunidades_seq";


CREATE TABLE "atunidades"
(
  "coduni" VARCHAR(8)  NOT NULL,
  "desuni" VARCHAR(30)  NOT NULL,
  "diruni" VARCHAR(30),
  "telfuni" VARCHAR(30),
  "percon" VARCHAR(30),
  "telpercon" VARCHAR(30),
  "mailpercon" VARCHAR(30),
  "horario" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('atunidades_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atunidades" IS '';


-----------------------------------------------------------------------------
-- atreclamos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atreclamos" CASCADE;

DROP SEQUENCE IF EXISTS "atreclamos_seq";

CREATE SEQUENCE "atreclamos_seq";


CREATE TABLE "atreclamos"
(
  "atsolici" VARCHAR(8)  NOT NULL,
  "desrec" VARCHAR(30)  NOT NULL,
  "atunidades_id" INTEGER,
  "persona" VARCHAR(30),
  "status" VARCHAR(1),
  "respuesta" VARCHAR(100),
  "fechaa" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('atreclamos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atreclamos" IS '';


ALTER TABLE "atreclamos" ADD CONSTRAINT "atreclamos_FK_1" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- atdenuncias
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "atdenuncias" CASCADE;

DROP SEQUENCE IF EXISTS "atdenuncias_seq";

CREATE SEQUENCE "atdenuncias_seq";


CREATE TABLE "atdenuncias"
(
  "atsolici" VARCHAR(30)  NOT NULL,
  "desden" VARCHAR(30)  NOT NULL,
  "atunidades_id" INTEGER,
  "persona" VARCHAR(30),
  "status" VARCHAR(1),
  "respuesta" VARCHAR(100),
  "fechaa" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdenuncias_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdenuncias" IS '';


ALTER TABLE "atdenuncias" ADD CONSTRAINT "atdenuncias_FK_1" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- ataudiencias
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "ataudiencias" CASCADE;

DROP SEQUENCE IF EXISTS "ataudiencias_seq";

CREATE SEQUENCE "ataudiencias_seq";


CREATE TABLE "ataudiencias"
(
  "atsolici_id" INTEGER,
  "motaud" VARCHAR(30)  NOT NULL,
  "atunidades_id" INTEGER,
  "persona" VARCHAR(30),
  "status" VARCHAR(1),
  "fecha" DATE,
  "fechaa" DATE,
  "lugar" VARCHAR(100),
  "observacion" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('ataudiencias_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "ataudiencias" IS '';


ALTER TABLE "ataudiencias" ADD CONSTRAINT "ataudiencias_FK_1" FOREIGN KEY ("atsolici_id") REFERENCES "atsolici" ("id");

ALTER TABLE "ataudiencias" ADD CONSTRAINT "ataudiencias_FK_2" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- tabla1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla1" CASCADE;

DROP SEQUENCE IF EXISTS "tabla1_seq";

CREATE SEQUENCE "tabla1_seq";


CREATE TABLE "tabla1"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "nompre" VARCHAR(250),
  "perpre" VARCHAR(2)  NOT NULL,
  "anopre" VARCHAR(4)  NOT NULL,
  "monasi" NUMERIC(14,2),
  "monprc" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "montra" NUMERIC(14,2),
  "montrn" NUMERIC(14,2),
  "monadi" NUMERIC(14,2),
  "mondim" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "mondis" NUMERIC(14,2),
  "difere" NUMERIC(14,2),
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla1" IS '';


-----------------------------------------------------------------------------
-- tabla10
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla10" CASCADE;

DROP SEQUENCE IF EXISTS "tabla10_seq";

CREATE SEQUENCE "tabla10_seq";


CREATE TABLE "tabla10"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "anocom" VARCHAR(4),
  "refprc" VARCHAR(8),
  "tipprc" VARCHAR(4),
  "descom" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacom" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "tipo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla10_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla10" IS '';


-----------------------------------------------------------------------------
-- tabla11
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla11" CASCADE;

DROP SEQUENCE IF EXISTS "tabla11_seq";

CREATE SEQUENCE "tabla11_seq";


CREATE TABLE "tabla11"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla11_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla11" IS '';


-----------------------------------------------------------------------------
-- tabla12
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla12" CASCADE;

DROP SEQUENCE IF EXISTS "tabla12_seq";

CREATE SEQUENCE "tabla12_seq";


CREATE TABLE "tabla12"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "feccau" DATE  NOT NULL,
  "anocau" VARCHAR(4),
  "refcom" VARCHAR(8),
  "tipcom" VARCHAR(4),
  "descau" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacau" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla12_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla12" IS '';


-----------------------------------------------------------------------------
-- tabla13
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla13" CASCADE;

DROP SEQUENCE IF EXISTS "tabla13_seq";

CREATE SEQUENCE "tabla13_seq";


CREATE TABLE "tabla13"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla13_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla13" IS '';


-----------------------------------------------------------------------------
-- tabla14
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla14" CASCADE;

DROP SEQUENCE IF EXISTS "tabla14_seq";

CREATE SEQUENCE "tabla14_seq";


CREATE TABLE "tabla14"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "tippag" VARCHAR(4)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "anopag" VARCHAR(4),
  "refcau" VARCHAR(8),
  "tipcau" VARCHAR(4),
  "despag" VARCHAR(250),
  "desanu" VARCHAR(100),
  "monpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stapag" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla14_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla14" IS '';


-----------------------------------------------------------------------------
-- tabla15
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla15" CASCADE;

DROP SEQUENCE IF EXISTS "tabla15_seq";

CREATE SEQUENCE "tabla15_seq";


CREATE TABLE "tabla15"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monaju" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "refprc" VARCHAR(8)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "refcau" VARCHAR(8)  NOT NULL,
  "refpag" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla15_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla15" IS '';


-----------------------------------------------------------------------------
-- tabla16
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla16" CASCADE;

DROP SEQUENCE IF EXISTS "tabla16_seq";

CREATE SEQUENCE "tabla16_seq";


CREATE TABLE "tabla16"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "tipaju" VARCHAR(4)  NOT NULL,
  "fecaju" DATE  NOT NULL,
  "anoaju" VARCHAR(4)  NOT NULL,
  "refere" VARCHAR(8)  NOT NULL,
  "desaju" VARCHAR(500),
  "desanu" VARCHAR(250),
  "totaju" NUMERIC(14,2),
  "staaju" VARCHAR(1),
  "fecanu" DATE,
  "numcom" VARCHAR(8),
  "cuoanu" NUMERIC(6),
  "fecanudes" DATE,
  "fecanuhas" DATE,
  "ordpag" VARCHAR(1),
  "fecenvcon" DATE,
  "fecenvfin" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla16_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla16" IS '';


-----------------------------------------------------------------------------
-- tabla17
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla17" CASCADE;

DROP SEQUENCE IF EXISTS "tabla17_seq";

CREATE SEQUENCE "tabla17_seq";


CREATE TABLE "tabla17"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla17_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla17" IS '';


-----------------------------------------------------------------------------
-- tabla18
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla18" CASCADE;

DROP SEQUENCE IF EXISTS "tabla18_seq";

CREATE SEQUENCE "tabla18_seq";


CREATE TABLE "tabla18"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla18_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla18" IS '';


-----------------------------------------------------------------------------
-- tabla19
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla19" CASCADE;

DROP SEQUENCE IF EXISTS "tabla19_seq";

CREATE SEQUENCE "tabla19_seq";


CREATE TABLE "tabla19"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla19_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla19" IS '';


-----------------------------------------------------------------------------
-- tabla2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla2" CASCADE;

DROP SEQUENCE IF EXISTS "tabla2_seq";

CREATE SEQUENCE "tabla2_seq";


CREATE TABLE "tabla2"
(
  "refprc" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla2" IS '';


-----------------------------------------------------------------------------
-- tabla20
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla20" CASCADE;

DROP SEQUENCE IF EXISTS "tabla20_seq";

CREATE SEQUENCE "tabla20_seq";


CREATE TABLE "tabla20"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla20_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla20" IS '';


-----------------------------------------------------------------------------
-- tabla21
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla21" CASCADE;

DROP SEQUENCE IF EXISTS "tabla21_seq";

CREATE SEQUENCE "tabla21_seq";


CREATE TABLE "tabla21"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla21_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla21" IS '';


-----------------------------------------------------------------------------
-- tabla22
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla22" CASCADE;

DROP SEQUENCE IF EXISTS "tabla22_seq";

CREATE SEQUENCE "tabla22_seq";


CREATE TABLE "tabla22"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla22_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla22" IS '';


-----------------------------------------------------------------------------
-- tabla23
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla23" CASCADE;

DROP SEQUENCE IF EXISTS "tabla23_seq";

CREATE SEQUENCE "tabla23_seq";


CREATE TABLE "tabla23"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "nompre" VARCHAR(250)  NOT NULL,
  "codcta" VARCHAR(32),
  "stacod" VARCHAR(1),
  "coduni" VARCHAR(4),
  "estatus" VARCHAR(1),
  "codtip" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla23_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla23" IS '';


-----------------------------------------------------------------------------
-- tabla24
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla24" CASCADE;

DROP SEQUENCE IF EXISTS "tabla24_seq";

CREATE SEQUENCE "tabla24_seq";


CREATE TABLE "tabla24"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "periodos" NUMERIC,
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla24_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla24" IS '';


-----------------------------------------------------------------------------
-- tabla25
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla25" CASCADE;

DROP SEQUENCE IF EXISTS "tabla25_seq";

CREATE SEQUENCE "tabla25_seq";


CREATE TABLE "tabla25"
(
  "codpre" VARCHAR(32)  NOT NULL,
  "nompre" VARCHAR(250),
  "perpre" VARCHAR(2)  NOT NULL,
  "anopre" VARCHAR(4)  NOT NULL,
  "monasi" NUMERIC(14,2),
  "monprc" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "montra" NUMERIC(14,2),
  "montrn" NUMERIC(14,2),
  "monadi" NUMERIC(14,2),
  "mondim" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "mondis" NUMERIC(14,2),
  "difere" NUMERIC(14,2),
  "status" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla25_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla25" IS '';


-----------------------------------------------------------------------------
-- tabla26
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla26" CASCADE;

DROP SEQUENCE IF EXISTS "tabla26_seq";

CREATE SEQUENCE "tabla26_seq";


CREATE TABLE "tabla26"
(
  "refprc" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla26_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla26" IS '';


-----------------------------------------------------------------------------
-- tabla27
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla27" CASCADE;

DROP SEQUENCE IF EXISTS "tabla27_seq";

CREATE SEQUENCE "tabla27_seq";


CREATE TABLE "tabla27"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla27_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla27" IS '';


-----------------------------------------------------------------------------
-- tabla28
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla28" CASCADE;

DROP SEQUENCE IF EXISTS "tabla28_seq";

CREATE SEQUENCE "tabla28_seq";


CREATE TABLE "tabla28"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla28_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla28" IS '';


-----------------------------------------------------------------------------
-- tabla29
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla29" CASCADE;

DROP SEQUENCE IF EXISTS "tabla29_seq";

CREATE SEQUENCE "tabla29_seq";


CREATE TABLE "tabla29"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla29_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla29" IS '';


-----------------------------------------------------------------------------
-- tabla3
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla3" CASCADE;

DROP SEQUENCE IF EXISTS "tabla3_seq";

CREATE SEQUENCE "tabla3_seq";


CREATE TABLE "tabla3"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla3_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla3" IS '';


-----------------------------------------------------------------------------
-- tabla30
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla30" CASCADE;

DROP SEQUENCE IF EXISTS "tabla30_seq";

CREATE SEQUENCE "tabla30_seq";


CREATE TABLE "tabla30"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monaju" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "refprc" VARCHAR(8)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "refcau" VARCHAR(8)  NOT NULL,
  "refpag" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla30_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla30" IS '';


-----------------------------------------------------------------------------
-- tabla31
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla31" CASCADE;

DROP SEQUENCE IF EXISTS "tabla31_seq";

CREATE SEQUENCE "tabla31_seq";


CREATE TABLE "tabla31"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "feccau" DATE  NOT NULL,
  "anocau" VARCHAR(4),
  "refcom" VARCHAR(8),
  "tipcom" VARCHAR(4),
  "descau" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacau" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla31_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla31" IS '';


-----------------------------------------------------------------------------
-- tabla32
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla32" CASCADE;

DROP SEQUENCE IF EXISTS "tabla32_seq";

CREATE SEQUENCE "tabla32_seq";


CREATE TABLE "tabla32"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "anocom" VARCHAR(4),
  "refprc" VARCHAR(8),
  "tipprc" VARCHAR(4),
  "descom" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacom" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "tipo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla32_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla32" IS '';


-----------------------------------------------------------------------------
-- tabla33
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla33" CASCADE;

DROP SEQUENCE IF EXISTS "tabla33_seq";

CREATE SEQUENCE "tabla33_seq";


CREATE TABLE "tabla33"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "anocom" VARCHAR(4),
  "refprc" VARCHAR(8),
  "tipprc" VARCHAR(4),
  "descom" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacom" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "tipo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla33_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla33" IS '';


-----------------------------------------------------------------------------
-- tabla34
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla34" CASCADE;

DROP SEQUENCE IF EXISTS "tabla34_seq";

CREATE SEQUENCE "tabla34_seq";


CREATE TABLE "tabla34"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "anocom" VARCHAR(4),
  "refprc" VARCHAR(8),
  "tipprc" VARCHAR(4),
  "descom" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacom" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "tipo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla34_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla34" IS '';


-----------------------------------------------------------------------------
-- tabla35
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla35" CASCADE;

DROP SEQUENCE IF EXISTS "tabla35_seq";

CREATE SEQUENCE "tabla35_seq";


CREATE TABLE "tabla35"
(
  "refprc" VARCHAR(8)  NOT NULL,
  "tipprc" VARCHAR(4)  NOT NULL,
  "fecprc" DATE  NOT NULL,
  "anoprc" VARCHAR(4),
  "desprc" VARCHAR(250),
  "desanu" VARCHAR(100),
  "monprc" NUMERIC(14,2),
  "salcom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "staprc" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "refsol" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla35_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla35" IS '';


-----------------------------------------------------------------------------
-- tabla36
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla36" CASCADE;

DROP SEQUENCE IF EXISTS "tabla36_seq";

CREATE SEQUENCE "tabla36_seq";


CREATE TABLE "tabla36"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "anocom" VARCHAR(4),
  "refprc" VARCHAR(8),
  "tipprc" VARCHAR(4),
  "descom" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacom" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "tipo" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla36_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla36" IS '';


-----------------------------------------------------------------------------
-- tabla37
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla37" CASCADE;

DROP SEQUENCE IF EXISTS "tabla37_seq";

CREATE SEQUENCE "tabla37_seq";


CREATE TABLE "tabla37"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "feccau" DATE  NOT NULL,
  "anocau" VARCHAR(4),
  "refcom" VARCHAR(8),
  "tipcom" VARCHAR(4),
  "descau" VARCHAR(250),
  "desanu" VARCHAR(100),
  "moncau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stacau" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla37_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla37" IS '';


-----------------------------------------------------------------------------
-- tabla38
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla38" CASCADE;

DROP SEQUENCE IF EXISTS "tabla38_seq";

CREATE SEQUENCE "tabla38_seq";


CREATE TABLE "tabla38"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "tippag" VARCHAR(4)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "anopag" VARCHAR(4),
  "refcau" VARCHAR(8),
  "tipcau" VARCHAR(4),
  "despag" VARCHAR(250),
  "desanu" VARCHAR(100),
  "monpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "stapag" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla38_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla38" IS '';


-----------------------------------------------------------------------------
-- tabla39
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla39" CASCADE;

DROP SEQUENCE IF EXISTS "tabla39_seq";

CREATE SEQUENCE "tabla39_seq";


CREATE TABLE "tabla39"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "tipaju" VARCHAR(4)  NOT NULL,
  "fecaju" DATE  NOT NULL,
  "anoaju" VARCHAR(4)  NOT NULL,
  "refere" VARCHAR(8)  NOT NULL,
  "desaju" VARCHAR(500),
  "desanu" VARCHAR(250),
  "totaju" NUMERIC(14,2),
  "staaju" VARCHAR(1),
  "fecanu" DATE,
  "numcom" VARCHAR(8),
  "cuoanu" NUMERIC(6),
  "fecanudes" DATE,
  "fecanuhas" DATE,
  "ordpag" VARCHAR(1),
  "fecenvcon" DATE,
  "fecenvfin" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla39_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla39" IS '';


-----------------------------------------------------------------------------
-- tabla4
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla4" CASCADE;

DROP SEQUENCE IF EXISTS "tabla4_seq";

CREATE SEQUENCE "tabla4_seq";


CREATE TABLE "tabla4"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla4_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla4" IS '';


-----------------------------------------------------------------------------
-- tabla40
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla40" CASCADE;

DROP SEQUENCE IF EXISTS "tabla40_seq";

CREATE SEQUENCE "tabla40_seq";


CREATE TABLE "tabla40"
(
  "numord" VARCHAR(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "cedrif" VARCHAR(15)  NOT NULL,
  "nomben" VARCHAR(250)  NOT NULL,
  "monord" NUMERIC(14,2)  NOT NULL,
  "desord" VARCHAR(1000)  NOT NULL,
  "mondes" NUMERIC(14,2),
  "monret" NUMERIC(14,2),
  "numche" VARCHAR(20),
  "ctaban" VARCHAR(20),
  "ctapag" VARCHAR(32),
  "numcom" VARCHAR(8),
  "status" VARCHAR(1)  NOT NULL,
  "coduni" VARCHAR(30),
  "fecenvcon" DATE,
  "fecenvfin" DATE,
  "ctapagfin" VARCHAR(32),
  "obsord" VARCHAR(250),
  "fecven" DATE,
  "fecanu" DATE,
  "desanu" VARCHAR(250),
  "monpag" NUMERIC(16,2),
  "aproba" VARCHAR(1),
  "nombensus" VARCHAR(250),
  "fecrecfin" DATE,
  "anopre" VARCHAR(4),
  "fecpag" DATE,
  "numtiq" VARCHAR(8),
  "peraut" VARCHAR(500),
  "cedaut" VARCHAR(100),
  "nomper2" VARCHAR(50),
  "nomper1" VARCHAR(50),
  "horcon" VARCHAR(10),
  "feccon" DATE,
  "nomcat" VARCHAR(250),
  "numfac" VARCHAR(20),
  "numconfac" VARCHAR(20),
  "numcorfac" VARCHAR(20),
  "fechafac" DATE,
  "fecfac" DATE,
  "tipfin" VARCHAR(4),
  "comret" VARCHAR(20),
  "feccomret" DATE,
  "comretislr" VARCHAR(20),
  "feccomretislr" DATE,
  "comretltf" VARCHAR(20),
  "feccomretltf" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla40_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla40" IS '';


-----------------------------------------------------------------------------
-- tabla41
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla41" CASCADE;

DROP SEQUENCE IF EXISTS "tabla41_seq";

CREATE SEQUENCE "tabla41_seq";


CREATE TABLE "tabla41"
(
  "numcue" VARCHAR(20)  NOT NULL,
  "reflib" VARCHAR(20)  NOT NULL,
  "feclib" DATE  NOT NULL,
  "tipmov" VARCHAR(4)  NOT NULL,
  "deslib" VARCHAR(4000)  NOT NULL,
  "monmov" NUMERIC(14,2)  NOT NULL,
  "codcta" VARCHAR(32),
  "numcom" VARCHAR(8),
  "feccom" DATE,
  "status" VARCHAR(1)  NOT NULL,
  "stacon" VARCHAR(1)  NOT NULL,
  "fecing" DATE,
  "fecanu" DATE,
  "tipmovpad" VARCHAR(4),
  "reflibpad" VARCHAR(20),
  "transito" VARCHAR(1),
  "numcomadi" VARCHAR(8),
  "feccomadi" DATE,
  "nombensus" VARCHAR(250),
  "orden" NUMERIC(14),
  "horing" VARCHAR(12),
  "stacon1" VARCHAR(1),
  "motanu" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla41_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla41" IS '';


-----------------------------------------------------------------------------
-- tabla42
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla42" CASCADE;

DROP SEQUENCE IF EXISTS "tabla42_seq";

CREATE SEQUENCE "tabla42_seq";


CREATE TABLE "tabla42"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "descom" VARCHAR(250),
  "moncom" NUMERIC(14,2),
  "stacom" VARCHAR(1)  NOT NULL,
  "tipcom" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla42_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla42" IS '';


-----------------------------------------------------------------------------
-- tabla43
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla43" CASCADE;

DROP SEQUENCE IF EXISTS "tabla43_seq";

CREATE SEQUENCE "tabla43_seq";


CREATE TABLE "tabla43"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "numasi" NUMERIC(3),
  "refasi" VARCHAR(8),
  "desasi" VARCHAR(250),
  "monasi" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla43_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla43" IS '';


-----------------------------------------------------------------------------
-- tabla44
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla44" CASCADE;

DROP SEQUENCE IF EXISTS "tabla44_seq";

CREATE SEQUENCE "tabla44_seq";


CREATE TABLE "tabla44"
(
  "codcta" VARCHAR(32)  NOT NULL,
  "descta" VARCHAR(250)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "salant" NUMERIC(14,2),
  "debcre" VARCHAR(1)  NOT NULL,
  "cargab" VARCHAR(1)  NOT NULL,
  "salprgper" NUMERIC(14,2),
  "salacuper" NUMERIC(14,2),
  "salprgperfor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla44_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla44" IS '';


-----------------------------------------------------------------------------
-- tabla45
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla45" CASCADE;

DROP SEQUENCE IF EXISTS "tabla45_seq";

CREATE SEQUENCE "tabla45_seq";


CREATE TABLE "tabla45"
(
  "codcta" VARCHAR(32)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "totdeb" NUMERIC(14,2),
  "totcre" NUMERIC(14,2),
  "salact" NUMERIC(14,2),
  "salprgper" NUMERIC(14,2),
  "salprgperfor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla45_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla45" IS '';


-----------------------------------------------------------------------------
-- tabla46
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla46" CASCADE;

DROP SEQUENCE IF EXISTS "tabla46_seq";

CREATE SEQUENCE "tabla46_seq";


CREATE TABLE "tabla46"
(
  "codcta" VARCHAR(32)  NOT NULL,
  "periodos" NUMERIC,
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla46_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla46" IS '';


-----------------------------------------------------------------------------
-- tabla47
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla47" CASCADE;

DROP SEQUENCE IF EXISTS "tabla47_seq";

CREATE SEQUENCE "tabla47_seq";


CREATE TABLE "tabla47"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "numasi" NUMERIC(3),
  "refasi" VARCHAR(8),
  "desasi" VARCHAR(250),
  "monasi" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla47_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla47" IS '';


-----------------------------------------------------------------------------
-- tabla48
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla48" CASCADE;

DROP SEQUENCE IF EXISTS "tabla48_seq";

CREATE SEQUENCE "tabla48_seq";


CREATE TABLE "tabla48"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "numasi" NUMERIC(3),
  "refasi" VARCHAR(8),
  "desasi" VARCHAR(250),
  "monasi" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla48_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla48" IS '';


-----------------------------------------------------------------------------
-- tabla49
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla49" CASCADE;

DROP SEQUENCE IF EXISTS "tabla49_seq";

CREATE SEQUENCE "tabla49_seq";


CREATE TABLE "tabla49"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "numasi" NUMERIC(3),
  "refasi" VARCHAR(8),
  "desasi" VARCHAR(250),
  "monasi" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla49_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla49" IS '';


-----------------------------------------------------------------------------
-- tabla5
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla5" CASCADE;

DROP SEQUENCE IF EXISTS "tabla5_seq";

CREATE SEQUENCE "tabla5_seq";


CREATE TABLE "tabla5"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla5_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla5" IS '';


-----------------------------------------------------------------------------
-- tabla50
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla50" CASCADE;

DROP SEQUENCE IF EXISTS "tabla50_seq";

CREATE SEQUENCE "tabla50_seq";


CREATE TABLE "tabla50"
(
  "reftra" VARCHAR(8)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "anotra" VARCHAR(4),
  "pertra" VARCHAR(2)  NOT NULL,
  "destra" VARCHAR(250),
  "desanu" VARCHAR(250),
  "tottra" NUMERIC(14,2),
  "statra" VARCHAR(1),
  "fecanu" DATE,
  "nrodec" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla50_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla50" IS '';


-----------------------------------------------------------------------------
-- tabla51
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla51" CASCADE;

DROP SEQUENCE IF EXISTS "tabla51_seq";

CREATE SEQUENCE "tabla51_seq";


CREATE TABLE "tabla51"
(
  "refadi" VARCHAR(8)  NOT NULL,
  "fecadi" DATE  NOT NULL,
  "anoadi" VARCHAR(4),
  "desadi" VARCHAR(250),
  "desanu" VARCHAR(250),
  "adidis" VARCHAR(1),
  "totadi" NUMERIC(14,2),
  "staadi" VARCHAR(1),
  "numcom" VARCHAR(8),
  "fecanu" DATE,
  "peradi" VARCHAR(2),
  "tipgas" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla51_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla51" IS '';


-----------------------------------------------------------------------------
-- tabla52
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla52" CASCADE;

DROP SEQUENCE IF EXISTS "tabla52_seq";

CREATE SEQUENCE "tabla52_seq";


CREATE TABLE "tabla52"
(
  "refcau" VARCHAR(8)  NOT NULL,
  "feccau" DATE  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla52_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla52" IS '';


-----------------------------------------------------------------------------
-- tabla53
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla53" CASCADE;

DROP SEQUENCE IF EXISTS "tabla53_seq";

CREATE SEQUENCE "tabla53_seq";


CREATE TABLE "tabla53"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla53_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla53" IS '';


-----------------------------------------------------------------------------
-- tabla54
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla54" CASCADE;

DROP SEQUENCE IF EXISTS "tabla54_seq";

CREATE SEQUENCE "tabla54_seq";


CREATE TABLE "tabla54"
(
  "refpag" VARCHAR(8)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "refcau" VARCHAR(8)  NOT NULL,
  "feccau" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla54_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla54" IS '';


-----------------------------------------------------------------------------
-- tabla6
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla6" CASCADE;

DROP SEQUENCE IF EXISTS "tabla6_seq";

CREATE SEQUENCE "tabla6_seq";


CREATE TABLE "tabla6"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monaju" NUMERIC(14,2),
  "stamov" VARCHAR(1),
  "refprc" VARCHAR(8)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "refcau" VARCHAR(8)  NOT NULL,
  "refpag" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla6_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla6" IS '';


-----------------------------------------------------------------------------
-- tabla7
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla7" CASCADE;

DROP SEQUENCE IF EXISTS "tabla7_seq";

CREATE SEQUENCE "tabla7_seq";


CREATE TABLE "tabla7"
(
  "refprc" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncom" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla7_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla7" IS '';


-----------------------------------------------------------------------------
-- tabla8
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla8" CASCADE;

DROP SEQUENCE IF EXISTS "tabla8_seq";

CREATE SEQUENCE "tabla8_seq";


CREATE TABLE "tabla8"
(
  "refprc" VARCHAR(8)  NOT NULL,
  "tipprc" VARCHAR(4)  NOT NULL,
  "fecprc" DATE  NOT NULL,
  "anoprc" VARCHAR(4),
  "desprc" VARCHAR(250),
  "desanu" VARCHAR(100),
  "monprc" NUMERIC(14,2),
  "salcom" NUMERIC(14,2),
  "salcau" NUMERIC(14,2),
  "salpag" NUMERIC(14,2),
  "salaju" NUMERIC(14,2),
  "staprc" VARCHAR(1),
  "fecanu" DATE,
  "cedrif" VARCHAR(15),
  "refsol" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla8_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla8" IS '';


-----------------------------------------------------------------------------
-- tabla9
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tabla9" CASCADE;

DROP SEQUENCE IF EXISTS "tabla9_seq";

CREATE SEQUENCE "tabla9_seq";


CREATE TABLE "tabla9"
(
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "monimp" NUMERIC(14,2),
  "moncau" NUMERIC(14,2),
  "monpag" NUMERIC(14,2),
  "monaju" NUMERIC(14,2),
  "staimp" VARCHAR(1),
  "refere" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tabla9_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tabla9" IS '';


-----------------------------------------------------------------------------
-- hisconb
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "hisconb" CASCADE;

DROP SEQUENCE IF EXISTS "hisconb_seq";

CREATE SEQUENCE "hisconb_seq";


CREATE TABLE "hisconb"
(
  "codcta" VARCHAR(18)  NOT NULL,
  "descta" VARCHAR(40)  NOT NULL,
  "salant" NUMERIC(12,2),
  "debcre" VARCHAR(1)  NOT NULL,
  "cargab" VARCHAR(1)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "salprgper" NUMERIC(14,2),
  "salacuper" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('hisconb_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "hisconb" IS '';


-----------------------------------------------------------------------------
-- hisconb1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "hisconb1" CASCADE;

DROP SEQUENCE IF EXISTS "hisconb1_seq";

CREATE SEQUENCE "hisconb1_seq";


CREATE TABLE "hisconb1"
(
  "codcta" VARCHAR(18)  NOT NULL,
  "fecini" DATE  NOT NULL,
  "feccie" DATE  NOT NULL,
  "pereje" VARCHAR(2)  NOT NULL,
  "totdeb" NUMERIC(14,2),
  "totcre" NUMERIC(14,2),
  "salact" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('hisconb1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "hisconb1" IS '';


-----------------------------------------------------------------------------
-- hisconc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "hisconc" CASCADE;

DROP SEQUENCE IF EXISTS "hisconc_seq";

CREATE SEQUENCE "hisconc_seq";


CREATE TABLE "hisconc"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "descom" VARCHAR(50),
  "moncom" NUMERIC(14,2),
  "stacom" VARCHAR(1)  NOT NULL,
  "tipcom" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('hisconc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "hisconc" IS '';


-----------------------------------------------------------------------------
-- hisconc1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "hisconc1" CASCADE;

DROP SEQUENCE IF EXISTS "hisconc1_seq";

CREATE SEQUENCE "hisconc1_seq";


CREATE TABLE "hisconc1"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "feccom" DATE  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "codcta" VARCHAR(18)  NOT NULL,
  "numasi" NUMERIC(3)  NOT NULL,
  "refasi" VARCHAR(8),
  "desasi" VARCHAR(30),
  "monasi" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('hisconc1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "hisconc1" IS '';


-----------------------------------------------------------------------------
-- historico
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "historico" CASCADE;

DROP SEQUENCE IF EXISTS "historico_seq";

CREATE SEQUENCE "historico_seq";


CREATE TABLE "historico"
(
  "codcat" VARCHAR(16),
  "codpar" VARCHAR(16),
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('historico_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "historico" IS '';


-----------------------------------------------------------------------------
-- usuarios
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "usuarios" CASCADE;

DROP SEQUENCE IF EXISTS "usuarios_seq";

CREATE SEQUENCE "usuarios_seq";


CREATE TABLE "usuarios"
(
  "loguse" VARCHAR(50)  NOT NULL,
  "nomuse" VARCHAR(250)  NOT NULL,
  "apluse" CHAR(3)  NOT NULL,
  "numemp" CHAR(12),
  "pasuse" VARCHAR(10)  NOT NULL,
  "diremp" VARCHAR(250),
  "telemp" VARCHAR(50),
  "cedemp" VARCHAR(10),
  "numuni" VARCHAR(4),
  "codcat" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('usuarios_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "usuarios" IS '';


-----------------------------------------------------------------------------
-- dfatendoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "dfatendoc" CASCADE;

DROP SEQUENCE IF EXISTS "dfatendoc_seq";

CREATE SEQUENCE "dfatendoc_seq";


CREATE TABLE "dfatendoc"
(
  "coddoc" VARCHAR(30),
  "desdoc" VARCHAR(50),
  "mondoc" VARCHAR(50),
  "fecdoc" VARCHAR(50),
  "staate" VARCHAR(50),
  "anuate" INTEGER  NOT NULL,
  "estado" VARCHAR(1),
  "id_dftabtip" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('dfatendoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfatendoc" IS '';


ALTER TABLE "dfatendoc" ADD CONSTRAINT "dfatendoc_FK_1" FOREIGN KEY ("id_dftabtip") REFERENCES "dftabtip" ("id");

-----------------------------------------------------------------------------
-- dfatendocdet
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "dfatendocdet" CASCADE;

DROP SEQUENCE IF EXISTS "dfatendocdet_seq";

CREATE SEQUENCE "dfatendocdet_seq";


CREATE TABLE "dfatendocdet"
(
  "id_dfatendoc" INTEGER  NOT NULL,
  "id_usuario" INTEGER  NOT NULL,
  "fecrec" DATE  NOT NULL,
  "horrec" DATE  NOT NULL,
  "fecate" DATE  NOT NULL,
  "horate" DATE  NOT NULL,
  "id_acunidad_ori" INTEGER  NOT NULL,
  "id_acunidad_des" INTEGER  NOT NULL,
  "id_dfrutadoc" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('dfatendocdet_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfatendocdet" IS '';


ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_1" FOREIGN KEY ("id_dfatendoc") REFERENCES "dfatendoc" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_2" FOREIGN KEY ("id_usuario") REFERENCES "usuarios" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_3" FOREIGN KEY ("id_acunidad_ori") REFERENCES "acunidad" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_4" FOREIGN KEY ("id_acunidad_des") REFERENCES "acunidad" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_5" FOREIGN KEY ("id_dfrutadoc") REFERENCES "dfrutadoc" ("id");

-----------------------------------------------------------------------------
-- dfrutadoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "dfrutadoc" CASCADE;

DROP SEQUENCE IF EXISTS "dfrutadoc_seq";

CREATE SEQUENCE "dfrutadoc_seq";


CREATE TABLE "dfrutadoc"
(
  "rutdoc" INTEGER  NOT NULL,
  "id_acunidad" INTEGER  NOT NULL,
  "id_dftabtip" INTEGER  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('dfrutadoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dfrutadoc" IS '';


ALTER TABLE "dfrutadoc" ADD CONSTRAINT "dfrutadoc_FK_1" FOREIGN KEY ("id_acunidad") REFERENCES "acunidad" ("id");

ALTER TABLE "dfrutadoc" ADD CONSTRAINT "dfrutadoc_FK_2" FOREIGN KEY ("id_dftabtip") REFERENCES "dftabtip" ("id");

-----------------------------------------------------------------------------
-- dftabtip
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "dftabtip" CASCADE;

DROP SEQUENCE IF EXISTS "dftabtip_seq";

CREATE SEQUENCE "dftabtip_seq";


CREATE TABLE "dftabtip"
(
  "tipdoc" VARCHAR(4)  NOT NULL,
  "nomtab" VARCHAR(30)  NOT NULL,
  "vidutil" INTEGER  NOT NULL,
  "clvprm" VARCHAR(30),
  "clvfrn" VARCHAR(30),
  "mondoc" VARCHAR(20),
  "fecdoc" VARCHAR(20),
  "desdoc" VARCHAR(20),
  "stadoc" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('dftabtip_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dftabtip" IS '';


-----------------------------------------------------------------------------
-- dftemporal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "dftemporal" CASCADE;

DROP SEQUENCE IF EXISTS "dftemporal_seq";

CREATE SEQUENCE "dftemporal_seq";


CREATE TABLE "dftemporal"
(
  "codigo" VARCHAR(8)  NOT NULL,
  "fecha" DATE  NOT NULL,
  "monto" NUMERIC(14,2),
  "abr" VARCHAR(4)  NOT NULL,
  "ben" VARCHAR(250)  NOT NULL,
  "fecharec" DATE  NOT NULL,
  "estad" VARCHAR(20)  NOT NULL,
  "nomtab" VARCHAR(20),
  "uni" VARCHAR(30)  NOT NULL,
  "unidad" VARCHAR(4),
  "unidadori" VARCHAR(4),
  "vida" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('dftemporal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "dftemporal" IS '';


-----------------------------------------------------------------------------
-- fcabonos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcabonos" CASCADE;

DROP SEQUENCE IF EXISTS "fcabonos_seq";

CREATE SEQUENCE "fcabonos_seq";


CREATE TABLE "fcabonos"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "fueing" VARCHAR(2)  NOT NULL,
  "despag" VARCHAR(250),
  "monpag" NUMERIC(14,2),
  "monefe" NUMERIC(14,2),
  "funpag" VARCHAR(40)  NOT NULL,
  "codrec" VARCHAR(10),
  "salpag" NUMERIC(14,2),
  "stapag" VARCHAR(1),
  "fecrec" DATE,
  "numpag2" VARCHAR(10),
  "numref" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcabonos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcabonos" IS '';


-----------------------------------------------------------------------------
-- fcacceso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcacceso" CASCADE;

DROP SEQUENCE IF EXISTS "fcacceso_seq";

CREATE SEQUENCE "fcacceso_seq";


CREATE TABLE "fcacceso"
(
  "cedula" VARCHAR(14),
  "nomusu" VARCHAR(100),
  "pasusu" VARCHAR(8),
  "autsol" VARCHAR(1),
  "anupag" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcacceso_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcacceso" IS '';


-----------------------------------------------------------------------------
-- fcactcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcactcom" CASCADE;

DROP SEQUENCE IF EXISTS "fcactcom_seq";

CREATE SEQUENCE "fcactcom_seq";


CREATE TABLE "fcactcom"
(
  "codact" VARCHAR(16),
  "desact" VARCHAR(255)  NOT NULL,
  "mintri" NUMERIC(14,2)  NOT NULL,
  "exoner" VARCHAR(1),
  "minofac" VARCHAR(1),
  "tipali" VARCHAR(1),
  "porreb" NUMERIC(14,6),
  "exepto" VARCHAR(1),
  "rebaja" VARCHAR(1),
  "exento" VARCHAR(1),
  "tem" NUMERIC(14,2),
  "afoact" NUMERIC(14,2),
  "anoact" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcactcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcactcom" IS '';


CREATE INDEX "fcactcom_i01fcactcom" ON "fcactcom" ("codact");

-----------------------------------------------------------------------------
-- fcactpic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcactpic" CASCADE;

DROP SEQUENCE IF EXISTS "fcactpic_seq";

CREATE SEQUENCE "fcactpic_seq";


CREATE TABLE "fcactpic"
(
  "numdoc" VARCHAR(10),
  "codact" VARCHAR(16),
  "exoner" VARCHAR(1),
  "monact" NUMERIC(14,2),
  "porexo" NUMERIC(14,2),
  "estact" VARCHAR(1),
  "exento" VARCHAR(1),
  "rebaja" VARCHAR(1),
  "porreb" NUMERIC(14,2),
  "monant" NUMERIC(32,2),
  "impuesto" NUMERIC(14,2),
  "fecven" DATE,
  "anodec" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcactpic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcactpic" IS '';


CREATE INDEX "fcactpic_i01fcactpic" ON "fcactpic" ("codact","numdoc");

CREATE INDEX "fcactpic_i2fcactpic" ON "fcactpic" ("numdoc");

-----------------------------------------------------------------------------
-- fcajuste
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcajuste" CASCADE;

DROP SEQUENCE IF EXISTS "fcajuste_seq";

CREATE SEQUENCE "fcajuste_seq";


CREATE TABLE "fcajuste"
(
  "numaju" VARCHAR(10),
  "fecaju" DATE,
  "desaju" VARCHAR(250),
  "numdec" VARCHAR(10),
  "staaju" VARCHAR(1),
  "monaju" NUMERIC(32,2),
  "monreb" NUMERIC(32,2),
  "monexo" NUMERIC(32,2),
  "monimp" NUMERIC(32,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcajuste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcajuste" IS '';


-----------------------------------------------------------------------------
-- fcaliinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcaliinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcaliinm_seq";

CREATE SEQUENCE "fcaliinm_seq";


CREATE TABLE "fcaliinm"
(
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "valorm" NUMERIC(14,2)  NOT NULL,
  "porvf" NUMERIC(14,2)  NOT NULL,
  "aliter" NUMERIC(14,2)  NOT NULL,
  "alicon" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcaliinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcaliinm" IS '';


-----------------------------------------------------------------------------
-- fcaliuso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcaliuso" CASCADE;

DROP SEQUENCE IF EXISTS "fcaliuso_seq";

CREATE SEQUENCE "fcaliuso_seq";


CREATE TABLE "fcaliuso"
(
  "coduso" VARCHAR(3)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "nomuso" VARCHAR(250)  NOT NULL,
  "alimon" NUMERIC(14,2),
  "pormon" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcaliuso_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcaliuso" IS '';


-----------------------------------------------------------------------------
-- fcapulic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcapulic" CASCADE;

DROP SEQUENCE IF EXISTS "fcapulic_seq";

CREATE SEQUENCE "fcapulic_seq";


CREATE TABLE "fcapulic"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "tipapu" VARCHAR(4)  NOT NULL,
  "desapu" VARCHAR(250),
  "monapu" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "rifrep" VARCHAR(14),
  "staapu" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcapulic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcapulic" IS '';


CREATE INDEX "fcapulic_i02fcapulic" ON "fcapulic" ("rifcon");

-----------------------------------------------------------------------------
-- fcbanent
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcbanent" CASCADE;

DROP SEQUENCE IF EXISTS "fcbanent_seq";

CREATE SEQUENCE "fcbanent_seq";


CREATE TABLE "fcbanent"
(
  "coddoc" VARCHAR(5)  NOT NULL,
  "codfun" VARCHAR(3)  NOT NULL,
  "codentext" VARCHAR(3)  NOT NULL,
  "codtipdoc" VARCHAR(3)  NOT NULL,
  "fecdoc" DATE,
  "hordoc" DATE,
  "fecres" DATE,
  "asunto" VARCHAR(100),
  "codubifis" VARCHAR(16),
  "fecubifis" DATE,
  "horubifis" DATE,
  "codubimag" VARCHAR(16),
  "fecubimag" DATE,
  "horubimag" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcbanent_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcbanent" IS '';


ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_1" FOREIGN KEY ("codfun") REFERENCES "fcdeffun" ("codfun");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_2" FOREIGN KEY ("codentext") REFERENCES "fcdefentext" ("codentext");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_3" FOREIGN KEY ("codtipdoc") REFERENCES "fcdeftipdoc" ("codtipdoc");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_4" FOREIGN KEY ("codubifis") REFERENCES "fcdefubifis" ("codubifis");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_5" FOREIGN KEY ("codubimag") REFERENCES "fcdefubimag" ("codubimag");

-----------------------------------------------------------------------------
-- fcbansal
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcbansal" CASCADE;

DROP SEQUENCE IF EXISTS "fcbansal_seq";

CREATE SEQUENCE "fcbansal_seq";


CREATE TABLE "fcbansal"
(
  "coddoc" VARCHAR(5)  NOT NULL,
  "codfun" VARCHAR(3)  NOT NULL,
  "codentext" VARCHAR(3)  NOT NULL,
  "codtipdoc" VARCHAR(3)  NOT NULL,
  "fecdoc" DATE,
  "hordoc" DATE,
  "asunto" VARCHAR(100),
  "codubifis" VARCHAR(16),
  "fecubifis" DATE,
  "horubifis" DATE,
  "codubimag" VARCHAR(16),
  "fecubimag" DATE,
  "horubimag" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcbansal_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcbansal" IS '';


ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_1" FOREIGN KEY ("codfun") REFERENCES "fcdeffun" ("codfun");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_2" FOREIGN KEY ("codentext") REFERENCES "fcdefentext" ("codentext");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_3" FOREIGN KEY ("codtipdoc") REFERENCES "fcdeftipdoc" ("codtipdoc");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_4" FOREIGN KEY ("codubifis") REFERENCES "fcdefubifis" ("codubifis");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_5" FOREIGN KEY ("codubimag") REFERENCES "fcdefubimag" ("codubimag");

-----------------------------------------------------------------------------
-- fccajero
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccajero" CASCADE;

DROP SEQUENCE IF EXISTS "fccajero_seq";

CREATE SEQUENCE "fccajero_seq";


CREATE TABLE "fccajero"
(
  "codcaj" VARCHAR(3)  NOT NULL,
  "cedcaj" VARCHAR(15)  NOT NULL,
  "nomcaj" VARCHAR(30)  NOT NULL,
  "dircaj" VARCHAR(50),
  "telcaj" VARCHAR(11),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccajero_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccajero" IS '';


-----------------------------------------------------------------------------
-- fccarinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccarinm" CASCADE;

DROP SEQUENCE IF EXISTS "fccarinm_seq";

CREATE SEQUENCE "fccarinm_seq";


CREATE TABLE "fccarinm"
(
  "codcarinm" VARCHAR(3)  NOT NULL,
  "nomcarinm" VARCHAR(250)  NOT NULL,
  "stacarinm" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fccarinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccarinm" IS '';


-----------------------------------------------------------------------------
-- fccatfis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccatfis" CASCADE;

DROP SEQUENCE IF EXISTS "fccatfis_seq";

CREATE SEQUENCE "fccatfis_seq";


CREATE TABLE "fccatfis"
(
  "codcatfis" VARCHAR(30)  NOT NULL,
  "nomcatfis" VARCHAR(250)  NOT NULL,
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccatfis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccatfis" IS '';


-----------------------------------------------------------------------------
-- fcclaesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcclaesp" CASCADE;

DROP SEQUENCE IF EXISTS "fcclaesp_seq";

CREATE SEQUENCE "fcclaesp_seq";


CREATE TABLE "fcclaesp"
(
  "codcla" VARCHAR(4)  NOT NULL,
  "descla" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcclaesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcclaesp" IS '';


-----------------------------------------------------------------------------
-- fccobrad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccobrad" CASCADE;

DROP SEQUENCE IF EXISTS "fccobrad_seq";

CREATE SEQUENCE "fccobrad_seq";


CREATE TABLE "fccobrad"
(
  "codcob" VARCHAR(3)  NOT NULL,
  "cedcob" VARCHAR(15)  NOT NULL,
  "nomcob" VARCHAR(30)  NOT NULL,
  "dircob" VARCHAR(50),
  "telcob" VARCHAR(11),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccobrad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccobrad" IS '';


-----------------------------------------------------------------------------
-- fccon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fccon" CASCADE;

DROP SEQUENCE IF EXISTS "fccon_seq";

CREATE SEQUENCE "fccon_seq";


CREATE TABLE "fccon"
(
  "rifcon" VARCHAR(14),
  "repcon" VARCHAR(1),
  "nitcon" VARCHAR(14),
  "nomcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "dircon" VARCHAR(50),
  "codpar" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "tipcon" VARCHAR(1),
  "telcon" VARCHAR(30),
  "faxcon" VARCHAR(15),
  "emacon" VARCHAR(50),
  "urlcon" VARCHAR(50),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('fccon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fccon" IS '';


-----------------------------------------------------------------------------
-- fcconpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconpag" CASCADE;

DROP SEQUENCE IF EXISTS "fcconpag_seq";

CREATE SEQUENCE "fcconpag_seq";


CREATE TABLE "fcconpag"
(
  "refcon" VARCHAR(15)  NOT NULL,
  "feccon" DATE  NOT NULL,
  "moncon" NUMERIC(14,2)  NOT NULL,
  "numcuo" NUMERIC(14,2)  NOT NULL,
  "monini" NUMERIC(14,2)  NOT NULL,
  "estcon" VARCHAR(1),
  "rifcon" VARCHAR(14)  NOT NULL,
  "obscon" VARCHAR(250),
  "funrec" VARCHAR(100),
  "fecrec" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconpag" IS '';


-----------------------------------------------------------------------------
-- fcconrep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrep" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrep_seq";

CREATE SEQUENCE "fcconrep_seq";


CREATE TABLE "fcconrep"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "tem" NUMERIC(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrep" IS '';


CREATE INDEX "fcconrep_ifcconrep_rifcon" ON "fcconrep" ("rifcon");

-----------------------------------------------------------------------------
-- fcconrep1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrep1" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrep1_seq";

CREATE SEQUENCE "fcconrep1_seq";


CREATE TABLE "fcconrep1"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrep1" IS '';


-----------------------------------------------------------------------------
-- fcconrep2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrep2" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrep2_seq";

CREATE SEQUENCE "fcconrep2_seq";


CREATE TABLE "fcconrep2"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrep2" IS '';


-----------------------------------------------------------------------------
-- fcconrepco
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrepco" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrepco_seq";

CREATE SEQUENCE "fcconrepco_seq";


CREATE TABLE "fcconrepco"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(14),
  "nomcon" VARCHAR(120),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(80),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrepco_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrepco" IS '';


-----------------------------------------------------------------------------
-- fcconrepres1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcconrepres1" CASCADE;

DROP SEQUENCE IF EXISTS "fcconrepres1_seq";

CREATE SEQUENCE "fcconrepres1_seq";


CREATE TABLE "fcconrepres1"
(
  "cedcon" VARCHAR(11),
  "rifcon" VARCHAR(20),
  "nomcon" VARCHAR(255),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(255),
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nitcon" VARCHAR(14),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "ciucon" VARCHAR(30),
  "cpocon" VARCHAR(6),
  "apocon" VARCHAR(20),
  "urlcon" VARCHAR(50),
  "naccon" VARCHAR(1),
  "tipcon" VARCHAR(1),
  "faxcon" VARCHAR(15),
  "clacon" VARCHAR(12),
  "fecdescon" DATE,
  "fecactcon" DATE,
  "stacon" VARCHAR(1),
  "origen" VARCHAR(1),
  "nomneg" VARCHAR(255),
  "reccon" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcconrepres1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcconrepres1" IS '';


-----------------------------------------------------------------------------
-- fcdecatp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdecatp" CASCADE;

DROP SEQUENCE IF EXISTS "fcdecatp_seq";

CREATE SEQUENCE "fcdecatp_seq";


CREATE TABLE "fcdecatp"
(
  "numdec" VARCHAR(10)  NOT NULL,
  "numsol" VARCHAR(10)  NOT NULL,
  "numlic" VARCHAR(10)  NOT NULL,
  "fecdec" DATE  NOT NULL,
  "mondec" NUMERIC(14,2)  NOT NULL,
  "fundec" VARCHAR(40)  NOT NULL,
  "edodec" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdecatp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdecatp" IS '';


-----------------------------------------------------------------------------
-- fcdeclar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeclar" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeclar_seq";

CREATE SEQUENCE "fcdeclar_seq";


CREATE TABLE "fcdeclar"
(
  "numdec" VARCHAR(10),
  "fecven" DATE,
  "fueing" VARCHAR(3),
  "fecdec" DATE,
  "rifcon" VARCHAR(20),
  "tipo" VARCHAR(3),
  "numref" VARCHAR(30),
  "nombre" VARCHAR(500),
  "mondec" NUMERIC(14,2),
  "edodec" VARCHAR(1),
  "mora" NUMERIC(14,2),
  "prontopg" NUMERIC(14,2),
  "autliq" NUMERIC(14,2),
  "fundec" VARCHAR(40),
  "codrec" VARCHAR(10),
  "modo" VARCHAR(1),
  "numero" VARCHAR(2),
  "conpag" VARCHAR(1) default '',
  "monabo" NUMERIC(14,2) default 0,
  "numabo" VARCHAR(10),
  "nomcon" VARCHAR(255),
  "otro" VARCHAR(30),
  "miginc" VARCHAR(1),
  "anodec" VARCHAR(4),
  "fecultpag" DATE,
  "fecini" DATE,
  "feccie" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeclar_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "fcdeclar_uk31046193420811" UNIQUE ("numdec","numref","fueing","numero","fecven","edodec")
);

COMMENT ON TABLE "fcdeclar" IS '';


CREATE INDEX "fcdeclar_i01fcdeclar" ON "fcdeclar" ("rifcon");

CREATE INDEX "fcdeclar_i02fcdeclar" ON "fcdeclar" ("rifcon","numref");

CREATE INDEX "fcdeclar_i03fcdeclar" ON "fcdeclar" ("fueing");

CREATE INDEX "fcdeclar_i04fcdeclar" ON "fcdeclar" ("numref");

-----------------------------------------------------------------------------
-- fcdeclar2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeclar2" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeclar2_seq";

CREATE SEQUENCE "fcdeclar2_seq";


CREATE TABLE "fcdeclar2"
(
  "numdec" VARCHAR(10),
  "fecven" DATE,
  "fueing" VARCHAR(3),
  "fecdec" DATE,
  "rifcon" VARCHAR(20),
  "tipo" VARCHAR(3),
  "numref" VARCHAR(15),
  "nombre" VARCHAR(100),
  "mondec" NUMERIC(14,2),
  "edodec" VARCHAR(1),
  "mora" NUMERIC(14,2),
  "prontopg" NUMERIC(14,2),
  "autliq" NUMERIC(14,2),
  "fundec" VARCHAR(40),
  "codrec" VARCHAR(10),
  "modo" VARCHAR(1),
  "numero" VARCHAR(2),
  "conpag" VARCHAR(1),
  "monabo" NUMERIC(14,2),
  "numabo" VARCHAR(10),
  "nomcon" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeclar2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeclar2" IS '';


-----------------------------------------------------------------------------
-- fcdecpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdecpag" CASCADE;

DROP SEQUENCE IF EXISTS "fcdecpag_seq";

CREATE SEQUENCE "fcdecpag_seq";


CREATE TABLE "fcdecpag"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "numdec" VARCHAR(10),
  "numref" VARCHAR(15),
  "fecven" DATE  NOT NULL,
  "mondec" NUMERIC(14,2),
  "numero" VARCHAR(2),
  "fueing" VARCHAR(2),
  "monpag" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdecpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdecpag" IS '';


CREATE INDEX "fcdecpag_i01fcdecpag" ON "fcdecpag" ("numpag");

CREATE INDEX "fcdecpag_i02fcdecpag" ON "fcdecpag" ("fueing");

CREATE INDEX "fcdecpag_i03fcdecpag" ON "fcdecpag" ("numdec","numref","fecven","numero");

-----------------------------------------------------------------------------
-- fcdefdesc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefdesc" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefdesc_seq";

CREATE SEQUENCE "fcdefdesc_seq";


CREATE TABLE "fcdefdesc"
(
  "coddes" VARCHAR(4)  NOT NULL,
  "nomdes" VARCHAR(250),
  "codfue" VARCHAR(2),
  "tipo" VARCHAR(1),
  "modo" VARCHAR(1),
  "limita" VARCHAR(1),
  "auto" VARCHAR(1),
  "anoact" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdesc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefdesc" IS '';


-----------------------------------------------------------------------------
-- fcdefdetsol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefdetsol" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefdetsol_seq";

CREATE SEQUENCE "fcdefdetsol_seq";


CREATE TABLE "fcdefdetsol"
(
  "codsol" VARCHAR(2),
  "tipo" VARCHAR(1),
  "cuantos" VARCHAR(1),
  "propie" VARCHAR(1),
  "imprim" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdetsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefdetsol" IS '';


-----------------------------------------------------------------------------
-- fcdefdetsol2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefdetsol2" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefdetsol2_seq";

CREATE SEQUENCE "fcdefdetsol2_seq";


CREATE TABLE "fcdefdetsol2"
(
  "codsol" VARCHAR(2),
  "tipo" VARCHAR(1),
  "cuantos" VARCHAR(1),
  "propie" VARCHAR(1),
  "imprim" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdetsol2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefdetsol2" IS '';


-----------------------------------------------------------------------------
-- fcdefentext
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefentext" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefentext_seq";

CREATE SEQUENCE "fcdefentext_seq";


CREATE TABLE "fcdefentext"
(
  "codentext" VARCHAR(3)  NOT NULL,
  "nomentext" VARCHAR(50)  NOT NULL,
  "pernatjur" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefentext_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefentext" IS '';


-----------------------------------------------------------------------------
-- fcdeffun
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeffun" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeffun_seq";

CREATE SEQUENCE "fcdeffun_seq";


CREATE TABLE "fcdeffun"
(
  "codfun" VARCHAR(3)  NOT NULL,
  "nomfun" VARCHAR(50)  NOT NULL,
  "coduniadm" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeffun_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeffun" IS '';


ALTER TABLE "fcdeffun" ADD CONSTRAINT "fcdeffun_FK_1" FOREIGN KEY ("coduniadm") REFERENCES "fcdefuniadm" ("coduniadm");

-----------------------------------------------------------------------------
-- fcdefins
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefins" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefins_seq";

CREATE SEQUENCE "fcdefins_seq";


CREATE TABLE "fcdefins"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "loncodact" NUMERIC(2),
  "loncodveh" NUMERIC(2),
  "loncodcat" NUMERIC(2),
  "loncodubifis" NUMERIC(2),
  "loncodubimag" NUMERIC(2),
  "rupact" NUMERIC(2),
  "rupveh" NUMERIC(2),
  "rupcat" NUMERIC(2),
  "rupubifis" NUMERIC(2),
  "rupubimag" NUMERIC(2),
  "foract" VARCHAR(16)  NOT NULL,
  "forveh" VARCHAR(16)  NOT NULL,
  "forcat" VARCHAR(20)  NOT NULL,
  "forubifis" VARCHAR(16)  NOT NULL,
  "forubimag" VARCHAR(16)  NOT NULL,
  "porpic" VARCHAR(1)  NOT NULL,
  "porveh" VARCHAR(1)  NOT NULL,
  "porinm" VARCHAR(1)  NOT NULL,
  "unipic" VARCHAR(1)  NOT NULL,
  "valunitri" NUMERIC(14,2),
  "unitas" VARCHAR(1),
  "codpic" VARCHAR(2),
  "codveh" VARCHAR(2),
  "codinm" VARCHAR(2),
  "codpro" VARCHAR(2),
  "codesp" VARCHAR(2),
  "codapu" VARCHAR(2),
  "codajupic" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefins_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefins" IS '';


-----------------------------------------------------------------------------
-- fcdefnca
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefnca" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefnca_seq";

CREATE SEQUENCE "fcdefnca_seq";


CREATE TABLE "fcdefnca"
(
  "codpar" VARCHAR(4),
  "codmun" VARCHAR(4),
  "codedo" VARCHAR(4),
  "codpai" VARCHAR(4),
  "numniv" NUMERIC(2)  NOT NULL,
  "nomext1" VARCHAR(210)  NOT NULL,
  "nomabr1" VARCHAR(9)  NOT NULL,
  "tamano1" NUMERIC(1)  NOT NULL,
  "nomext2" VARCHAR(210),
  "nomabr2" VARCHAR(9),
  "tamano2" NUMERIC(1),
  "nomext3" VARCHAR(210),
  "nomabr3" VARCHAR(9),
  "tamano3" NUMERIC(1),
  "nomext4" VARCHAR(210),
  "nomabr4" VARCHAR(9),
  "tamano4" NUMERIC(1),
  "nomext5" VARCHAR(210),
  "nomabr5" VARCHAR(9),
  "tamano5" NUMERIC(1),
  "nomext6" VARCHAR(210),
  "nomabr6" VARCHAR(9),
  "tamano6" NUMERIC(1),
  "nomext7" VARCHAR(210),
  "nomabr7" VARCHAR(9),
  "tamano7" NUMERIC(1),
  "nomext8" VARCHAR(210),
  "nomabr8" VARCHAR(9),
  "tamano8" NUMERIC(1),
  "nomext9" VARCHAR(210),
  "nomabr9" VARCHAR(9),
  "tamano9" NUMERIC(1),
  "nomext10" VARCHAR(210),
  "nomabr10" VARCHAR(9),
  "tamano10" NUMERIC(10),
  "nivinm" VARCHAR(2),
  "numper" NUMERIC(3),
  "denumper" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefnca_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefnca" IS '';


-----------------------------------------------------------------------------
-- fcdefpgi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefpgi" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefpgi_seq";

CREATE SEQUENCE "fcdefpgi_seq";


CREATE TABLE "fcdefpgi"
(
  "mondes" NUMERIC(14,2)  NOT NULL,
  "monhas" NUMERIC(14,2)  NOT NULL,
  "monpag" NUMERIC(14,2)  NOT NULL,
  "numpor" VARCHAR(3),
  "despgi" VARCHAR(20),
  "desabr" VARCHAR(3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefpgi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefpgi" IS '';


-----------------------------------------------------------------------------
-- fcdefrecdes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefrecdes" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefrecdes_seq";

CREATE SEQUENCE "fcdefrecdes_seq";


CREATE TABLE "fcdefrecdes"
(
  "coddes" VARCHAR(4),
  "codrec" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefrecdes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefrecdes" IS '';


-----------------------------------------------------------------------------
-- fcdefrecint
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefrecint" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefrecint_seq";

CREATE SEQUENCE "fcdefrecint_seq";


CREATE TABLE "fcdefrecint"
(
  "codrec" VARCHAR(4),
  "nomrec" VARCHAR(250),
  "tipo" VARCHAR(1),
  "modo" VARCHAR(1),
  "periodo" VARCHAR(1) default '',
  "promedio" VARCHAR(1) default '',
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefrecint_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefrecint" IS '';


-----------------------------------------------------------------------------
-- fcdeftipdoc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeftipdoc" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeftipdoc_seq";

CREATE SEQUENCE "fcdeftipdoc_seq";


CREATE TABLE "fcdeftipdoc"
(
  "codtipdoc" VARCHAR(3)  NOT NULL,
  "nomtipdoc" VARCHAR(50)  NOT NULL,
  "temtipdoc" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeftipdoc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeftipdoc" IS '';


-----------------------------------------------------------------------------
-- fcdefubifis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefubifis" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefubifis_seq";

CREATE SEQUENCE "fcdefubifis_seq";


CREATE TABLE "fcdefubifis"
(
  "codubifis" VARCHAR(16)  NOT NULL,
  "nomubifis" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefubifis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefubifis" IS '';


-----------------------------------------------------------------------------
-- fcdefubimag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefubimag" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefubimag_seq";

CREATE SEQUENCE "fcdefubimag_seq";


CREATE TABLE "fcdefubimag"
(
  "codubimag" VARCHAR(16)  NOT NULL,
  "nomubimag" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefubimag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefubimag" IS '';


-----------------------------------------------------------------------------
-- fcdefuniadm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdefuniadm" CASCADE;

DROP SEQUENCE IF EXISTS "fcdefuniadm_seq";

CREATE SEQUENCE "fcdefuniadm_seq";


CREATE TABLE "fcdefuniadm"
(
  "coduniadm" VARCHAR(3)  NOT NULL,
  "nomuniadm" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdefuniadm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdefuniadm" IS '';


-----------------------------------------------------------------------------
-- fcdesveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdesveh" CASCADE;

DROP SEQUENCE IF EXISTS "fcdesveh_seq";

CREATE SEQUENCE "fcdesveh_seq";


CREATE TABLE "fcdesveh"
(
  "numdes" VARCHAR(10)  NOT NULL,
  "plaveh" VARCHAR(8)  NOT NULL,
  "fecdes" DATE  NOT NULL,
  "motdes" VARCHAR(200)  NOT NULL,
  "funrec" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdesveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdesveh" IS '';


-----------------------------------------------------------------------------
-- fcdetabo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetabo" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetabo_seq";

CREATE SEQUENCE "fcdetabo_seq";


CREATE TABLE "fcdetabo"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "nrodet" VARCHAR(30)  NOT NULL,
  "monpag" NUMERIC(14,2),
  "tippag" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetabo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetabo" IS '';


-----------------------------------------------------------------------------
-- fcdetcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetcon" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetcon_seq";

CREATE SEQUENCE "fcdetcon_seq";


CREATE TABLE "fcdetcon"
(
  "refcon" VARCHAR(15)  NOT NULL,
  "numdec" VARCHAR(10)  NOT NULL,
  "moncuo" NUMERIC(14,2),
  "numcuo" VARCHAR(2),
  "monpag" NUMERIC(14,2),
  "obscuo" VARCHAR(100),
  "fecven" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetcon" IS '';


-----------------------------------------------------------------------------
-- fcdetconfue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetconfue" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetconfue_seq";

CREATE SEQUENCE "fcdetconfue_seq";


CREATE TABLE "fcdetconfue"
(
  "refcon" VARCHAR(15)  NOT NULL,
  "numdec" VARCHAR(10)  NOT NULL,
  "moncuo" NUMERIC(14,2),
  "numcuo" VARCHAR(2),
  "monpag" NUMERIC(14,2),
  "obscuo" VARCHAR(100),
  "fecven" DATE,
  "fuente" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetconfue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetconfue" IS '';


-----------------------------------------------------------------------------
-- fcdetpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetpag" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetpag_seq";

CREATE SEQUENCE "fcdetpag_seq";


CREATE TABLE "fcdetpag"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "nrodet" VARCHAR(30)  NOT NULL,
  "monpag" NUMERIC(14,2),
  "tippag" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetpag" IS '';


ALTER TABLE "fcdetpag" ADD CONSTRAINT "fcdetpag_FK_1" FOREIGN KEY ("numpag") REFERENCES "fcpagos" ("numpag");

ALTER TABLE "fcdetpag" ADD CONSTRAINT "fcdetpag_FK_2" FOREIGN KEY ("tippag") REFERENCES "fctippag" ("tippag") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- fcdetreccob
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetreccob" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetreccob_seq";

CREATE SEQUENCE "fcdetreccob_seq";


CREATE TABLE "fcdetreccob"
(
  "nument" VARCHAR(10)  NOT NULL,
  "codrec" VARCHAR(10)  NOT NULL,
  "codcob" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetreccob_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetreccob" IS '';


-----------------------------------------------------------------------------
-- fcdetrep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetrep" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetrep_seq";

CREATE SEQUENCE "fcdetrep_seq";


CREATE TABLE "fcdetrep"
(
  "numrep" VARCHAR(15),
  "descrip" VARCHAR(150),
  "tipo" VARCHAR(3),
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetrep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetrep" IS '';


-----------------------------------------------------------------------------
-- fcdetret
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdetret" CASCADE;

DROP SEQUENCE IF EXISTS "fcdetret_seq";

CREATE SEQUENCE "fcdetret_seq";


CREATE TABLE "fcdetret"
(
  "numret" VARCHAR(10)  NOT NULL,
  "numref" VARCHAR(15)  NOT NULL,
  "monasi" NUMERIC(14,2) default 0,
  "monabo" NUMERIC(14,2) default 0,
  "mondeu" NUMERIC(14,2) default 0,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdetret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdetret" IS '';


-----------------------------------------------------------------------------
-- fcdeucon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcdeucon" CASCADE;

DROP SEQUENCE IF EXISTS "fcdeucon_seq";

CREATE SEQUENCE "fcdeucon_seq";


CREATE TABLE "fcdeucon"
(
  "refcon" VARCHAR(15)  NOT NULL,
  "numdec" VARCHAR(10)  NOT NULL,
  "numero" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcdeucon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcdeucon" IS '';


-----------------------------------------------------------------------------
-- fcesppub
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcesppub" CASCADE;

DROP SEQUENCE IF EXISTS "fcesppub_seq";

CREATE SEQUENCE "fcesppub_seq";


CREATE TABLE "fcesppub"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "rifrep" VARCHAR(14),
  "nomesp" VARCHAR(100),
  "diresp" VARCHAR(100),
  "fecesp" DATE,
  "horesp" VARCHAR(20),
  "tipesp" VARCHAR(4),
  "nroent" NUMERIC(14,2),
  "monent" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "nomres" VARCHAR(250),
  "dirres" VARCHAR(100),
  "telres" VARCHAR(15),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "staesp" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcesppub_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcesppub" IS '';


-----------------------------------------------------------------------------
-- fcestado
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcestado" CASCADE;

DROP SEQUENCE IF EXISTS "fcestado_seq";

CREATE SEQUENCE "fcestado_seq";


CREATE TABLE "fcestado"
(
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nomedo" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcestado_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcestado" IS '';


ALTER TABLE "fcestado" ADD CONSTRAINT "fcestado_FK_1" FOREIGN KEY ("codpai") REFERENCES "fcpais" ("codpai");

-----------------------------------------------------------------------------
-- fcesting
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcesting" CASCADE;

DROP SEQUENCE IF EXISTS "fcesting_seq";

CREATE SEQUENCE "fcesting_seq";


CREATE TABLE "fcesting"
(
  "codpar" VARCHAR(16)  NOT NULL,
  "ano" VARCHAR(4)  NOT NULL,
  "perest" VARCHAR(2)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcesting_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcesting" IS '';


CREATE INDEX "fcesting_i01fcesting" ON "fcesting" ("codpar");

CREATE INDEX "fcesting_i02fcesting" ON "fcesting" ("codpar","perest","ano");

-----------------------------------------------------------------------------
-- fcfuentesmul
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcfuentesmul" CASCADE;

DROP SEQUENCE IF EXISTS "fcfuentesmul_seq";

CREATE SEQUENCE "fcfuentesmul_seq";


CREATE TABLE "fcfuentesmul"
(
  "codmul" VARCHAR(4),
  "codfue" VARCHAR(2),
  "codfuegen" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcfuentesmul_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcfuentesmul" IS '';


-----------------------------------------------------------------------------
-- fcfuentesrec
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcfuentesrec" CASCADE;

DROP SEQUENCE IF EXISTS "fcfuentesrec_seq";

CREATE SEQUENCE "fcfuentesrec_seq";


CREATE TABLE "fcfuentesrec"
(
  "codrec" VARCHAR(4),
  "codfue" VARCHAR(2),
  "codfuegen" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcfuentesrec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcfuentesrec" IS '';


-----------------------------------------------------------------------------
-- fcfuepre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcfuepre" CASCADE;

DROP SEQUENCE IF EXISTS "fcfuepre_seq";

CREATE SEQUENCE "fcfuepre_seq";


CREATE TABLE "fcfuepre"
(
  "codfue" VARCHAR(2)  NOT NULL,
  "nomfue" VARCHAR(100)  NOT NULL,
  "nomabr" VARCHAR(3)  NOT NULL,
  "frecob" NUMERIC(3),
  "monmor" NUMERIC(14,2),
  "permor" NUMERIC(3),
  "propag" NUMERIC(14,2),
  "perppg" NUMERIC(3),
  "liqact" NUMERIC(15),
  "deufec" NUMERIC(14,2),
  "recfec" NUMERIC(14,2),
  "fecufa" DATE,
  "ingrec" VARCHAR(18),
  "fueing" VARCHAR(32),
  "inieje" DATE,
  "fineje" DATE,
  "diavso" NUMERIC(3),
  "codprei" VARCHAR(16),
  "deufra" VARCHAR(1)  NOT NULL,
  "autliq" VARCHAR(1)  NOT NULL,
  "simpre" VARCHAR(1)  NOT NULL,
  "feccie" DATE,
  "tipmul" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcfuepre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcfuepre" IS '';


CREATE INDEX "fcfuepre_i02fcfuepre" ON "fcfuepre" ("codprei");

-----------------------------------------------------------------------------
-- fcinmcam
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcinmcam" CASCADE;

DROP SEQUENCE IF EXISTS "fcinmcam_seq";

CREATE SEQUENCE "fcinmcam_seq";


CREATE TABLE "fcinmcam"
(
  "nroinm" VARCHAR(255),
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3),
  "codcarinm" VARCHAR(3),
  "codsitinm" VARCHAR(3),
  "rifcon" VARCHAR(14),
  "fecpag" DATE,
  "feccal" DATE,
  "fecreg" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "mtrter" NUMERIC(14,2),
  "mtrcon" NUMERIC(14,2),
  "bster" NUMERIC(14,2),
  "bscon" NUMERIC(14,2),
  "docpro" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "funrec" VARCHAR(40),
  "fecrec" DATE,
  "estinm" VARCHAR(1),
  "estdec" VARCHAR(1),
  "codcatinm" VARCHAR(30),
  "nomcon" VARCHAR(120),
  "dircon" VARCHAR(250),
  "clacon" VARCHAR(12),
  "fecadq" DATE,
  "valinm" NUMERIC(14,2),
  "codman" VARCHAR(4),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nroinmant" VARCHAR(15),
  "totter" NUMERIC(14,2),
  "totcon" NUMERIC(14,2),
  "total" NUMERIC(14,2),
  "codtip" VARCHAR(2),
  "codzon" NUMERIC(14,2),
  "destip" VARCHAR(150),
  "deszon" VARCHAR(50),
  "anual" NUMERIC(14,2),
  "folio" VARCHAR(10),
  "tomo" VARCHAR(1),
  "numdoc" NUMERIC(14,2),
  "fecdoc" DATE,
  "usoinm" VARCHAR(50),
  "desde" VARCHAR(50),
  "hasta" VARCHAR(50),
  "ord" VARCHAR(4),
  "art" VARCHAR(10),
  "fecdir" DATE,
  "fecava" DATE,
  "dirinm1" VARCHAR(255),
  "fecela" DATE,
  "tri" VARCHAR(20),
  "prot" VARCHAR(20),
  "tipobol" VARCHAR(150),
  "nomsitinm" VARCHAR(255),
  "impanu" NUMERIC(14,2),
  "imptri" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcinmcam_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcinmcam" IS '';


-----------------------------------------------------------------------------
-- fcinmmod
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcinmmod" CASCADE;

DROP SEQUENCE IF EXISTS "fcinmmod_seq";

CREATE SEQUENCE "fcinmmod_seq";


CREATE TABLE "fcinmmod"
(
  "nroinm" VARCHAR(255),
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3),
  "codcarinm" VARCHAR(3),
  "codsitinm" VARCHAR(3),
  "rifcon" VARCHAR(14),
  "fecpag" DATE,
  "feccal" DATE,
  "fecreg" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "mtrter" NUMERIC(14,2),
  "mtrcon" NUMERIC(14,2),
  "bster" NUMERIC(14,2),
  "bscon" NUMERIC(14,2),
  "docpro" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "funrec" VARCHAR(40),
  "fecrec" DATE,
  "estinm" VARCHAR(1),
  "estdec" VARCHAR(1),
  "codcatinm" VARCHAR(30),
  "nomcon" VARCHAR(120),
  "dircon" VARCHAR(250),
  "clacon" VARCHAR(12),
  "fecadq" DATE,
  "valinm" NUMERIC(14,2),
  "codman" VARCHAR(4),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nroinmant" VARCHAR(15),
  "totter" NUMERIC(14,2),
  "totcon" NUMERIC(14,2),
  "total" NUMERIC(14,2),
  "codtip" VARCHAR(2),
  "codzon" NUMERIC(14,2),
  "destip" VARCHAR(150),
  "deszon" VARCHAR(50),
  "anual" NUMERIC(14,2),
  "folio" VARCHAR(10),
  "tomo" VARCHAR(1),
  "numdoc" NUMERIC(14,2),
  "fecdoc" DATE,
  "usoinm" VARCHAR(50),
  "desde" VARCHAR(50),
  "hasta" VARCHAR(50),
  "ord" VARCHAR(4),
  "art" VARCHAR(10),
  "fecdir" DATE,
  "fecava" DATE,
  "dirinm1" VARCHAR(255),
  "fecela" DATE,
  "tri" VARCHAR(20),
  "prot" VARCHAR(20),
  "tipobol" VARCHAR(150),
  "nomsitinm" VARCHAR(255),
  "impanu" NUMERIC(14,2),
  "imptri" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcinmmod_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcinmmod" IS '';


-----------------------------------------------------------------------------
-- fcmodapu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodapu" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodapu_seq";

CREATE SEQUENCE "fcmodapu_seq";


CREATE TABLE "fcmodapu"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "tipapu" VARCHAR(4),
  "desapu" VARCHAR(250),
  "monapu" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "tipapuant" VARCHAR(4),
  "desapuant" VARCHAR(250),
  "monapuant" NUMERIC(14,2),
  "monimpant" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodapu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodapu" IS '';


-----------------------------------------------------------------------------
-- fcmodesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodesp" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodesp_seq";

CREATE SEQUENCE "fcmodesp_seq";


CREATE TABLE "fcmodesp"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "nomesp" VARCHAR(100),
  "diresp" VARCHAR(100),
  "fecesp" DATE,
  "horesp" VARCHAR(20),
  "tipesp" VARCHAR(4),
  "nroent" NUMERIC(14,2),
  "monent" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "nomres" VARCHAR(250),
  "dirres" VARCHAR(100),
  "telres" VARCHAR(15),
  "nomespant" VARCHAR(100),
  "direspant" VARCHAR(100),
  "fecespant" DATE,
  "horespant" VARCHAR(20),
  "tipespant" VARCHAR(4),
  "nroentant" NUMERIC(14,2),
  "monentant" NUMERIC(14,2),
  "monimpant" NUMERIC(14,2),
  "nomresant" VARCHAR(250),
  "dirresant" VARCHAR(100),
  "telresant" VARCHAR(15),
  "funrec" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodesp" IS '';


ALTER TABLE "fcmodesp" ADD CONSTRAINT "fcmodesp_FK_1" FOREIGN KEY ("nrocon") REFERENCES "fcesppub" ("nrocon") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- fcmodinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodinm_seq";

CREATE SEQUENCE "fcmodinm_seq";


CREATE TABLE "fcmodinm"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "nroinm" VARCHAR(15)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3)  NOT NULL,
  "codcarinm" VARCHAR(3)  NOT NULL,
  "codsitinm" VARCHAR(3),
  "fecpag" DATE,
  "feccal" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(30),
  "linsur" VARCHAR(30),
  "linest" VARCHAR(30),
  "linoes" VARCHAR(30),
  "mtrter" NUMERIC(14,2),
  "mtrcon" NUMERIC(14,2),
  "bster" NUMERIC(14,2),
  "bscon" NUMERIC(14,2),
  "docpro" VARCHAR(200),
  "codcatfisant" VARCHAR(30)  NOT NULL,
  "codusoant" VARCHAR(3)  NOT NULL,
  "codcarinmant" VARCHAR(3)  NOT NULL,
  "codsitinmant" VARCHAR(3),
  "fecpagant" DATE,
  "feccalant" DATE,
  "dirinmant" VARCHAR(255),
  "linnorant" VARCHAR(30),
  "linsurant" VARCHAR(30),
  "linestant" VARCHAR(30),
  "linoesant" VARCHAR(30),
  "mtrterant" NUMERIC(14,2),
  "mtrconant" NUMERIC(14,2),
  "bsterant" NUMERIC(14,2),
  "bsconant" NUMERIC(14,2),
  "docproant" VARCHAR(200),
  "funrec" VARCHAR(40),
  "codcatinm" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodinm" IS '';


-----------------------------------------------------------------------------
-- fcmodpro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodpro" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodpro_seq";

CREATE SEQUENCE "fcmodpro_seq";


CREATE TABLE "fcmodpro"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "tippro" VARCHAR(4),
  "despro" VARCHAR(250),
  "dirpro" VARCHAR(250),
  "monpro" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "tipproant" VARCHAR(4),
  "desproant" VARCHAR(250),
  "dirproant" VARCHAR(250),
  "monproant" NUMERIC(14,2),
  "monimpant" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodpro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodpro" IS '';


ALTER TABLE "fcmodpro" ADD CONSTRAINT "fcmodpro_FK_1" FOREIGN KEY ("nrocon") REFERENCES "fcprolic" ("nrocon") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- fcmodveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmodveh" CASCADE;

DROP SEQUENCE IF EXISTS "fcmodveh_seq";

CREATE SEQUENCE "fcmodveh_seq";


CREATE TABLE "fcmodveh"
(
  "refmod" VARCHAR(10)  NOT NULL,
  "plaveh" VARCHAR(8)  NOT NULL,
  "fecmod" DATE  NOT NULL,
  "coduso" VARCHAR(16)  NOT NULL,
  "anoveh" NUMERIC(4)  NOT NULL,
  "sermot" VARCHAR(15),
  "sercar" VARCHAR(15),
  "marveh" VARCHAR(20),
  "colveh" VARCHAR(20),
  "valori" NUMERIC(14,2),
  "modveh" VARCHAR(20)  NOT NULL,
  "dueant" VARCHAR(50),
  "dirant" VARCHAR(50),
  "plaant" VARCHAR(8),
  "codusoant" VARCHAR(16)  NOT NULL,
  "anovehant" NUMERIC(4)  NOT NULL,
  "sermotant" VARCHAR(15),
  "sercarant" VARCHAR(15),
  "marvehant" VARCHAR(20),
  "colvehant" VARCHAR(20),
  "valoriant" NUMERIC(14,2),
  "modvehant" VARCHAR(20)  NOT NULL,
  "dueantant" VARCHAR(50),
  "dirantant" VARCHAR(50),
  "plaantant" VARCHAR(8),
  "funrec" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmodveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmodveh" IS '';


-----------------------------------------------------------------------------
-- fcmultas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmultas" CASCADE;

DROP SEQUENCE IF EXISTS "fcmultas_seq";

CREATE SEQUENCE "fcmultas_seq";


CREATE TABLE "fcmultas"
(
  "codmul" VARCHAR(4),
  "nommul" VARCHAR(250),
  "tipo" VARCHAR(1),
  "modo" VARCHAR(1),
  "monpro" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmultas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmultas" IS '';


-----------------------------------------------------------------------------
-- fcmunici
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcmunici" CASCADE;

DROP SEQUENCE IF EXISTS "fcmunici_seq";

CREATE SEQUENCE "fcmunici_seq";


CREATE TABLE "fcmunici"
(
  "codmun" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nommun" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcmunici_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcmunici" IS '';


ALTER TABLE "fcmunici" ADD CONSTRAINT "fcmunici_FK_1" FOREIGN KEY ("codpai") REFERENCES "fcestado" ("codpai");

-----------------------------------------------------------------------------
-- fconrep
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fconrep" CASCADE;

DROP SEQUENCE IF EXISTS "fconrep_seq";

CREATE SEQUENCE "fconrep_seq";


CREATE TABLE "fconrep"
(
  "cedcon" VARCHAR(10),
  "rifcon" VARCHAR(11),
  "nomcon" VARCHAR(80),
  "repcon" VARCHAR(1),
  "dircon" VARCHAR(80),
  "feccon" DATE,
  "telcon" VARCHAR(30),
  "emacon" VARCHAR(50),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('fconrep_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fconrep" IS '';


-----------------------------------------------------------------------------
-- fcotring
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcotring" CASCADE;

DROP SEQUENCE IF EXISTS "fcotring_seq";

CREATE SEQUENCE "fcotring_seq";


CREATE TABLE "fcotring"
(
  "nrocon" VARCHAR(10)  NOT NULL,
  "codfue" VARCHAR(2)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "desing" VARCHAR(250),
  "monimp" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "rifrep" VARCHAR(14),
  "staapu" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "monsal" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcotring_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcotring" IS '';


-----------------------------------------------------------------------------
-- fcpaging
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcpaging" CASCADE;

DROP SEQUENCE IF EXISTS "fcpaging_seq";

CREATE SEQUENCE "fcpaging_seq";


CREATE TABLE "fcpaging"
(
  "refere" VARCHAR(10)  NOT NULL,
  "tippag" VARCHAR(2),
  "moning" NUMERIC(14,2),
  "numref" VARCHAR(10),
  "nomref" VARCHAR(40),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcpaging_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcpaging" IS '';


-----------------------------------------------------------------------------
-- fcpagos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcpagos" CASCADE;

DROP SEQUENCE IF EXISTS "fcpagos_seq";

CREATE SEQUENCE "fcpagos_seq";


CREATE TABLE "fcpagos"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "fecpag" DATE  NOT NULL,
  "rifcon" VARCHAR(20)  NOT NULL,
  "despag" VARCHAR(200),
  "monpag" NUMERIC(14,2),
  "monefe" NUMERIC(14,2),
  "funpag" VARCHAR(40)  NOT NULL,
  "codrec" VARCHAR(10),
  "numpagold" VARCHAR(10),
  "edopag" VARCHAR(1),
  "fecanu" DATE,
  "motanu" VARCHAR(250),
  "cedanu" VARCHAR(14),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcpagos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcpagos" IS '';


CREATE INDEX "fcpagos_i02fcpagos" ON "fcpagos" ("rifcon");

CREATE INDEX "fcpagos_i03fcpagos" ON "fcpagos" ("fecpag");

CREATE INDEX "fcpagos_i04fcpagos" ON "fcpagos" ("edopag");

-----------------------------------------------------------------------------
-- fcpais
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcpais" CASCADE;

DROP SEQUENCE IF EXISTS "fcpais_seq";

CREATE SEQUENCE "fcpais_seq";


CREATE TABLE "fcpais"
(
  "codpai" VARCHAR(4)  NOT NULL,
  "nompai" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcpais_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcpais" IS '';


-----------------------------------------------------------------------------
-- fcparroq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcparroq" CASCADE;

DROP SEQUENCE IF EXISTS "fcparroq_seq";

CREATE SEQUENCE "fcparroq_seq";


CREATE TABLE "fcparroq"
(
  "codpar" VARCHAR(4)  NOT NULL,
  "codmun" VARCHAR(4)  NOT NULL,
  "codedo" VARCHAR(4)  NOT NULL,
  "codpai" VARCHAR(4)  NOT NULL,
  "nompar" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcparroq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcparroq" IS '';


ALTER TABLE "fcparroq" ADD CONSTRAINT "fcparroq_FK_1" FOREIGN KEY ("codpai") REFERENCES "fcmunici" ("codpai");

-----------------------------------------------------------------------------
-- fcpreing
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcpreing" CASCADE;

DROP SEQUENCE IF EXISTS "fcpreing_seq";

CREATE SEQUENCE "fcpreing_seq";


CREATE TABLE "fcpreing"
(
  "codpar" VARCHAR(16)  NOT NULL,
  "nompar" VARCHAR(250)  NOT NULL,
  "estima" VARCHAR(1),
  "estcie" VARCHAR(1),
  "acum" VARCHAR(1) default '',
  "id" INTEGER  NOT NULL DEFAULT nextval('fcpreing_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcpreing" IS '';


CREATE INDEX "fcpreing_i01fcpreing" ON "fcpreing" ("codpar");

CREATE INDEX "fcpreing_i02fcpreing" ON "fcpreing" ("codpar","estima");

-----------------------------------------------------------------------------
-- fcprolic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcprolic" CASCADE;

DROP SEQUENCE IF EXISTS "fcprolic_seq";

CREATE SEQUENCE "fcprolic_seq";


CREATE TABLE "fcprolic"
(
  "nrocon" VARCHAR(8)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "tippro" VARCHAR(4),
  "despro" VARCHAR(250),
  "dirpro" VARCHAR(250),
  "monpro" NUMERIC(14,2),
  "monimp" NUMERIC(14,2),
  "funrec" VARCHAR(50),
  "fecrec" DATE,
  "rifrep" VARCHAR(14),
  "stapro" VARCHAR(1),
  "stadec" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "semdia" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcprolic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcprolic" IS '';


-----------------------------------------------------------------------------
-- fcrangosdes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrangosdes" CASCADE;

DROP SEQUENCE IF EXISTS "fcrangosdes_seq";

CREATE SEQUENCE "fcrangosdes_seq";


CREATE TABLE "fcrangosdes"
(
  "coddes" VARCHAR(4),
  "diasdesde" NUMERIC,
  "diashasta" NUMERIC,
  "valor" NUMERIC,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosdes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrangosdes" IS '';


-----------------------------------------------------------------------------
-- fcrangosmul
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrangosmul" CASCADE;

DROP SEQUENCE IF EXISTS "fcrangosmul_seq";

CREATE SEQUENCE "fcrangosmul_seq";


CREATE TABLE "fcrangosmul"
(
  "codmul" VARCHAR(4),
  "diasdesde" NUMERIC default 0,
  "diashasta" NUMERIC default 0,
  "valor" NUMERIC default 0,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosmul_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrangosmul" IS '';


-----------------------------------------------------------------------------
-- fcrangosrec
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrangosrec" CASCADE;

DROP SEQUENCE IF EXISTS "fcrangosrec_seq";

CREATE SEQUENCE "fcrangosrec_seq";


CREATE TABLE "fcrangosrec"
(
  "codrec" VARCHAR(4),
  "diasdesde" NUMERIC default 0,
  "diashasta" NUMERIC default 0,
  "valor" NUMERIC default 0,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosrec_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrangosrec" IS '';


-----------------------------------------------------------------------------
-- fcreccob
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreccob" CASCADE;

DROP SEQUENCE IF EXISTS "fcreccob_seq";

CREATE SEQUENCE "fcreccob_seq";


CREATE TABLE "fcreccob"
(
  "nument" VARCHAR(10)  NOT NULL,
  "fecent" DATE  NOT NULL,
  "codcob" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreccob_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreccob" IS '';


CREATE INDEX "fcreccob_i_fcreccob" ON "fcreccob" ("codcob");

-----------------------------------------------------------------------------
-- fcreccon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreccon" CASCADE;

DROP SEQUENCE IF EXISTS "fcreccon_seq";

CREATE SEQUENCE "fcreccon_seq";


CREATE TABLE "fcreccon"
(
  "codrec" VARCHAR(10)  NOT NULL,
  "fecent" DATE,
  "fecven" DATE,
  "rifcon" VARCHAR(14),
  "numlic" VARCHAR(12),
  "numsol" VARCHAR(12),
  "tipsol" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreccon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreccon" IS '';


-----------------------------------------------------------------------------
-- fcrecdes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecdes" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecdes_seq";

CREATE SEQUENCE "fcrecdes_seq";


CREATE TABLE "fcrecdes"
(
  "codrede" VARCHAR(2)  NOT NULL,
  "recdes" VARCHAR(1)  NOT NULL,
  "desrede" VARCHAR(30)  NOT NULL,
  "codcta" VARCHAR(18),
  "porrede" VARCHAR(1)  NOT NULL,
  "codfue" VARCHAR(2),
  "dias" NUMERIC(3),
  "porcien" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecdes" IS '';


CREATE INDEX "fcrecdes_i01fcrecdes" ON "fcrecdes" ("recdes");

-----------------------------------------------------------------------------
-- fcrecdesg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecdesg" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecdesg_seq";

CREATE SEQUENCE "fcrecdesg_seq";


CREATE TABLE "fcrecdesg"
(
  "codrede" VARCHAR(2)  NOT NULL,
  "dias" NUMERIC(3),
  "porcien" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdesg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecdesg" IS '';


-----------------------------------------------------------------------------
-- fcrecdespag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecdespag" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecdespag_seq";

CREATE SEQUENCE "fcrecdespag_seq";


CREATE TABLE "fcrecdespag"
(
  "numpag" VARCHAR(10)  NOT NULL,
  "codrede" VARCHAR(4)  NOT NULL,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdespag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecdespag" IS '';


CREATE INDEX "fcrecdespag_i02fcrecdespag" ON "fcrecdespag" ("numpag");

ALTER TABLE "fcrecdespag" ADD CONSTRAINT "fcrecdespag_FK_1" FOREIGN KEY ("codrede") REFERENCES "fcdefdesc" ("coddes");

-----------------------------------------------------------------------------
-- fcrecibo
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecibo" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecibo_seq";

CREATE SEQUENCE "fcrecibo_seq";


CREATE TABLE "fcrecibo"
(
  "codrec" VARCHAR(10)  NOT NULL,
  "fecrec" DATE  NOT NULL,
  "desrec" VARCHAR(250)  NOT NULL,
  "numlic" VARCHAR(10)  NOT NULL,
  "rifcon" VARCHAR(15)  NOT NULL,
  "monrec" NUMERIC(14,2)  NOT NULL,
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "fecha" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecibo_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecibo" IS '';


CREATE INDEX "fcrecibo_i01fcrecibo" ON "fcrecibo" ("rifcon","fecrec");

CREATE INDEX "fcrecibo_i02fcrecibo" ON "fcrecibo" ("numlic");

-----------------------------------------------------------------------------
-- fcrecurso
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrecurso" CASCADE;

DROP SEQUENCE IF EXISTS "fcrecurso_seq";

CREATE SEQUENCE "fcrecurso_seq";


CREATE TABLE "fcrecurso"
(
  "coding" VARCHAR(10)  NOT NULL,
  "desing" VARCHAR(100),
  "moning" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrecurso_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrecurso" IS '';


-----------------------------------------------------------------------------
-- fcreginm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreginm" CASCADE;

DROP SEQUENCE IF EXISTS "fcreginm_seq";

CREATE SEQUENCE "fcreginm_seq";


CREATE TABLE "fcreginm"
(
  "nroinm" VARCHAR(15),
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3),
  "codcarinm" VARCHAR(3),
  "codsitinm" VARCHAR(3),
  "rifcon" VARCHAR(14),
  "fecpag" DATE,
  "feccal" DATE,
  "fecreg" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "mtrter" NUMERIC(20,2),
  "mtrcon" NUMERIC(20,2),
  "bster" NUMERIC(20,2),
  "bscon" NUMERIC(20,2),
  "docpro" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "funrec" VARCHAR(40),
  "fecrec" DATE,
  "estinm" VARCHAR(1),
  "estdec" VARCHAR(1),
  "codcatinm" VARCHAR(30),
  "nomcon" VARCHAR(120),
  "dircon" VARCHAR(250),
  "clacon" VARCHAR(12),
  "fecadq" DATE,
  "valinm" NUMERIC(20,2),
  "codman" VARCHAR(4),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nroinmant" VARCHAR(15),
  "totter" NUMERIC(20,2),
  "totcon" NUMERIC(20,2),
  "total" NUMERIC(20,2),
  "codtip" VARCHAR(3),
  "codzon" NUMERIC(20,2),
  "destip" VARCHAR(150),
  "deszon" VARCHAR(50),
  "anual" NUMERIC(20,2),
  "folio" VARCHAR(10),
  "tomo" VARCHAR(5),
  "numdoc" NUMERIC(20,2),
  "fecdoc" DATE,
  "usoinm" VARCHAR(50),
  "desde" VARCHAR(50),
  "hasta" VARCHAR(50),
  "ord" VARCHAR(4),
  "art" VARCHAR(10),
  "fecdir" DATE,
  "fecava" DATE,
  "dirinm1" VARCHAR(255),
  "fecela" DATE,
  "tri" VARCHAR(20),
  "prot" VARCHAR(20),
  "tipobol" VARCHAR(150),
  "nomsitinm" VARCHAR(255),
  "impanu" NUMERIC(20,2),
  "imptri" NUMERIC(20,2),
  "anualt" NUMERIC(20,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreginm" IS '';


CREATE INDEX "fcreginm_ifcreginm_codcatinm" ON "fcreginm" ("codcatinm");

-----------------------------------------------------------------------------
-- fcreginm1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreginm1" CASCADE;

DROP SEQUENCE IF EXISTS "fcreginm1_seq";

CREATE SEQUENCE "fcreginm1_seq";


CREATE TABLE "fcreginm1"
(
  "serial" NUMERIC(14),
  "tipo_bolet" VARCHAR(255),
  "nombre_pro" VARCHAR(255),
  "ci_rif_pro" VARCHAR(255),
  "dir_inmueb" VARCHAR(255),
  "telefono" VARCHAR(255),
  "telefono2" VARCHAR(255),
  "nomb_ad_ec" VARCHAR(255),
  "dir_adm_en" VARCHAR(255),
  "n_document" NUMERIC(14),
  "fecha_docu" DATE,
  "uso_inmueb" VARCHAR(20),
  "tenencia" VARCHAR(10),
  "area" NUMERIC(14,2),
  "area2" NUMERIC(14,2),
  "ubicacion" NUMERIC(14),
  "ubicacion2" NUMERIC(14),
  "tipo" VARCHAR(3),
  "tipo2" VARCHAR(3),
  "imp_anual" NUMERIC(14,2),
  "imp_anual2" NUMERIC(14,2),
  "imp_trim" NUMERIC(14,2),
  "imp_trim2" NUMERIC(14,2),
  "mont_imp" NUMERIC(14,2),
  "observacio" VARCHAR(110),
  "cod_catast" VARCHAR(20),
  "fecha_elab" DATE,
  "ubi_inmueb" VARCHAR(110),
  "norte" VARCHAR(80),
  "sur" VARCHAR(80),
  "este" VARCHAR(80),
  "oeste" VARCHAR(80),
  "adquiere" VARCHAR(110),
  "f_inscripc" DATE,
  "folios" VARCHAR(10),
  "tomo" VARCHAR(10),
  "trim" VARCHAR(10),
  "prot" VARCHAR(10),
  "frente" VARCHAR(1),
  "fondo" VARCHAR(1),
  "precio" NUMERIC(14,2),
  "dir_propie" VARCHAR(110),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreginm1" IS '';


-----------------------------------------------------------------------------
-- fcreginm2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreginm2" CASCADE;

DROP SEQUENCE IF EXISTS "fcreginm2_seq";

CREATE SEQUENCE "fcreginm2_seq";


CREATE TABLE "fcreginm2"
(
  "nroinm" VARCHAR(15)  NOT NULL,
  "codcatfis" VARCHAR(30)  NOT NULL,
  "coduso" VARCHAR(3),
  "codcarinm" VARCHAR(3),
  "codsitinm" VARCHAR(3),
  "rifcon" VARCHAR(14),
  "fecpag" DATE,
  "feccal" DATE,
  "fecreg" DATE,
  "dirinm" VARCHAR(255),
  "linnor" VARCHAR(250),
  "linsur" VARCHAR(250),
  "linest" VARCHAR(250),
  "linoes" VARCHAR(250),
  "mtrter" NUMERIC(14,2),
  "mtrcon" NUMERIC(14,2),
  "bster" NUMERIC(14,2),
  "bscon" NUMERIC(14,2),
  "docpro" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "funrec" VARCHAR(40),
  "fecrec" DATE,
  "estinm" VARCHAR(1),
  "estdec" VARCHAR(1),
  "codcatinm" VARCHAR(30),
  "nomcon" VARCHAR(120),
  "dircon" VARCHAR(250),
  "clacon" VARCHAR(12),
  "fecadq" DATE,
  "valinm" NUMERIC(14,2),
  "codman" VARCHAR(4),
  "codsec" VARCHAR(4),
  "codpar" VARCHAR(4),
  "nroinmant" VARCHAR(15),
  "totter" NUMERIC(14,2),
  "totcon" NUMERIC(14,2),
  "total" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreginm2" IS '';


-----------------------------------------------------------------------------
-- fcreginm3
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcreginm3" CASCADE;

DROP SEQUENCE IF EXISTS "fcreginm3_seq";

CREATE SEQUENCE "fcreginm3_seq";


CREATE TABLE "fcreginm3"
(
  "codcatfis" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm3_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcreginm3" IS '';


-----------------------------------------------------------------------------
-- fcregveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcregveh" CASCADE;

DROP SEQUENCE IF EXISTS "fcregveh_seq";

CREATE SEQUENCE "fcregveh_seq";


CREATE TABLE "fcregveh"
(
  "plaveh" VARCHAR(10)  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "anoveh" NUMERIC(4)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "sermot" VARCHAR(15),
  "sercar" VARCHAR(30),
  "marveh" VARCHAR(30),
  "colveh" VARCHAR(20),
  "coduso" VARCHAR(16)  NOT NULL,
  "impveh" NUMERIC(14,2),
  "salact" NUMERIC(14,2),
  "salant" NUMERIC(14,2),
  "valori" NUMERIC(14,2),
  "aboveh" NUMERIC(14,2),
  "morveh" NUMERIC(14,2),
  "desveh" NUMERIC(14,2),
  "estveh" VARCHAR(1),
  "funrec" VARCHAR(40),
  "obsveh" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "modveh" VARCHAR(20)  NOT NULL,
  "fecrec" DATE  NOT NULL,
  "dueant" VARCHAR(50),
  "dirant" VARCHAR(50),
  "plaant" VARCHAR(8),
  "estdec" VARCHAR(1)  NOT NULL,
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "clacon" VARCHAR(12),
  "capveh" NUMERIC,
  "pesveh" NUMERIC,
  "tipveh" NUMERIC,
  "fecact" DATE,
  "marcod" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcregveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcregveh" IS '';


-----------------------------------------------------------------------------
-- fcregveh1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcregveh1" CASCADE;

DROP SEQUENCE IF EXISTS "fcregveh1_seq";

CREATE SEQUENCE "fcregveh1_seq";


CREATE TABLE "fcregveh1"
(
  "plaveh" VARCHAR(10)  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "anoveh" NUMERIC(4)  NOT NULL,
  "fecreg" DATE  NOT NULL,
  "sermot" VARCHAR(15),
  "sercar" VARCHAR(30),
  "marveh" VARCHAR(20),
  "colveh" VARCHAR(20),
  "coduso" VARCHAR(16)  NOT NULL,
  "impveh" NUMERIC(14,2),
  "salact" NUMERIC(14,2),
  "salant" NUMERIC(14,2),
  "valori" NUMERIC(14,2),
  "aboveh" NUMERIC(14,2),
  "morveh" NUMERIC(14,2),
  "desveh" NUMERIC(14,2),
  "estveh" VARCHAR(1),
  "funrec" VARCHAR(40),
  "obsveh" VARCHAR(200),
  "rifrep" VARCHAR(14),
  "modveh" VARCHAR(20)  NOT NULL,
  "fecrec" DATE  NOT NULL,
  "dueant" VARCHAR(50),
  "dirant" VARCHAR(50),
  "plaant" VARCHAR(8),
  "estdec" VARCHAR(1)  NOT NULL,
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "clacon" VARCHAR(12),
  "capveh" NUMERIC,
  "pesveh" NUMERIC,
  "tipveh" NUMERIC,
  "fecact" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcregveh1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcregveh1" IS '';


-----------------------------------------------------------------------------
-- fcrenlic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrenlic" CASCADE;

DROP SEQUENCE IF EXISTS "fcrenlic_seq";

CREATE SEQUENCE "fcrenlic_seq";


CREATE TABLE "fcrenlic"
(
  "numlic" VARCHAR(10)  NOT NULL,
  "fecven" DATE  NOT NULL,
  "fecren" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrenlic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrenlic" IS '';


-----------------------------------------------------------------------------
-- fcrepfis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrepfis" CASCADE;

DROP SEQUENCE IF EXISTS "fcrepfis_seq";

CREATE SEQUENCE "fcrepfis_seq";


CREATE TABLE "fcrepfis"
(
  "numlic" VARCHAR(10)  NOT NULL,
  "funrec" VARCHAR(50)  NOT NULL,
  "fecrep" DATE  NOT NULL,
  "numrep" VARCHAR(15)  NOT NULL,
  "monrep" NUMERIC(14,2)  NOT NULL,
  "conrep" VARCHAR(250),
  "modo" VARCHAR(1),
  "monadi" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrepfis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrepfis" IS '';


-----------------------------------------------------------------------------
-- fcrepliq
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrepliq" CASCADE;

DROP SEQUENCE IF EXISTS "fcrepliq_seq";

CREATE SEQUENCE "fcrepliq_seq";


CREATE TABLE "fcrepliq"
(
  "numrep" VARCHAR(15),
  "ano" VARCHAR(10),
  "codact" VARCHAR(10),
  "moning" VARCHAR(10),
  "monimp" VARCHAR(10),
  "monbom" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrepliq_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrepliq" IS '';


-----------------------------------------------------------------------------
-- fcretencion
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcretencion" CASCADE;

DROP SEQUENCE IF EXISTS "fcretencion_seq";

CREATE SEQUENCE "fcretencion_seq";


CREATE TABLE "fcretencion"
(
  "numret" VARCHAR(15)  NOT NULL,
  "fueing" VARCHAR(2)  NOT NULL,
  "fecret" DATE,
  "fecreg" DATE,
  "monret" NUMERIC(14,2),
  "numrel" VARCHAR(10),
  "desret" VARCHAR(1000),
  "monsal" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcretencion_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcretencion" IS '';


-----------------------------------------------------------------------------
-- fcrutas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrutas" CASCADE;

DROP SEQUENCE IF EXISTS "fcrutas_seq";

CREATE SEQUENCE "fcrutas_seq";


CREATE TABLE "fcrutas"
(
  "codrut" VARCHAR(6)  NOT NULL,
  "desrut" VARCHAR(120)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrutas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrutas" IS '';


-----------------------------------------------------------------------------
-- fcrutcob
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcrutcob" CASCADE;

DROP SEQUENCE IF EXISTS "fcrutcob_seq";

CREATE SEQUENCE "fcrutcob_seq";


CREATE TABLE "fcrutcob"
(
  "codcob" VARCHAR(3)  NOT NULL,
  "codrut" VARCHAR(6)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcrutcob_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcrutcob" IS '';


ALTER TABLE "fcrutcob" ADD CONSTRAINT "fcrutcob_FK_1" FOREIGN KEY ("codcob") REFERENCES "fccobrad" ("codcob") ON DELETE CASCADE;

ALTER TABLE "fcrutcob" ADD CONSTRAINT "fcrutcob_FK_2" FOREIGN KEY ("codrut") REFERENCES "fcrutas" ("codrut");

-----------------------------------------------------------------------------
-- fcsitjurinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsitjurinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcsitjurinm_seq";

CREATE SEQUENCE "fcsitjurinm_seq";


CREATE TABLE "fcsitjurinm"
(
  "codsitinm" VARCHAR(3)  NOT NULL,
  "nomsitinm" VARCHAR(250)  NOT NULL,
  "stasitinm" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsitjurinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsitjurinm" IS '';


-----------------------------------------------------------------------------
-- fcsollic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsollic" CASCADE;

DROP SEQUENCE IF EXISTS "fcsollic_seq";

CREATE SEQUENCE "fcsollic_seq";


CREATE TABLE "fcsollic"
(
  "numsol" VARCHAR(12),
  "numlic" VARCHAR(12),
  "fecsol" DATE,
  "feclic" DATE,
  "rifcon" VARCHAR(20),
  "catcon" VARCHAR(30),
  "rifrep" VARCHAR(20),
  "nomneg" VARCHAR(120),
  "tipinm" VARCHAR(1),
  "tipest" VARCHAR(1),
  "dirpri" VARCHAR(255),
  "codrut" VARCHAR(6),
  "capsoc" NUMERIC(15),
  "horini" DATE,
  "horcie" DATE,
  "fecini" DATE,
  "fecfin" DATE,
  "discli" NUMERIC(10),
  "disbar" NUMERIC(10),
  "disdis" NUMERIC(10),
  "disins" NUMERIC(10),
  "disfun" NUMERIC(10),
  "disest" NUMERIC(10),
  "funres" VARCHAR(60),
  "funrel" VARCHAR(40),
  "fecres" DATE,
  "fecapr" DATE,
  "fecven" DATE,
  "tomo" VARCHAR(8),
  "folio" VARCHAR(8),
  "numero" VARCHAR(8),
  "taslic" NUMERIC(15),
  "deuanl" NUMERIC(15),
  "deuacl" NUMERIC(15),
  "implic" NUMERIC(15),
  "deuanp" NUMERIC(15),
  "deuacp" NUMERIC(15),
  "stasol" VARCHAR(1),
  "stalic" VARCHAR(1),
  "stadec" VARCHAR(1),
  "staliq" VARCHAR(1),
  "nomcon" VARCHAR(255),
  "dircon" VARCHAR(255),
  "tipo" VARCHAR(1),
  "estser" VARCHAR(1) default '',
  "telneg" VARCHAR(15),
  "clacon" VARCHAR(12),
  "capact" NUMERIC(15),
  "numsol1" VARCHAR(12),
  "numlic1" VARCHAR(12),
  "horainie" DATE,
  "horaciee" DATE,
  "unitri" NUMERIC(14,2),
  "tipsol" VARCHAR(1),
  "unitrialc" NUMERIC(14,2),
  "unitriotr" NUMERIC(14,2),
  "licant" VARCHAR(12),
  "dueant" VARCHAR(14),
  "dirant" VARCHAR(50),
  "impext" NUMERIC(15),
  "imptotal" NUMERIC(15),
  "codact" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsollic_seq'::regclass),
  PRIMARY KEY ("id"),
  CONSTRAINT "fcsollic_i01fcsollic" UNIQUE ("numsol")
);

COMMENT ON TABLE "fcsollic" IS '';


CREATE INDEX "fcsollic_i02fcsollic" ON "fcsollic" ("numlic");

-----------------------------------------------------------------------------
-- fcsollic1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsollic1" CASCADE;

DROP SEQUENCE IF EXISTS "fcsollic1_seq";

CREATE SEQUENCE "fcsollic1_seq";


CREATE TABLE "fcsollic1"
(
  "numsol" VARCHAR(12),
  "numlic" VARCHAR(10),
  "fecsol" DATE,
  "feclic" DATE,
  "rifcon" VARCHAR(14),
  "catcon" VARCHAR(21),
  "rifrep" VARCHAR(14),
  "nomneg" VARCHAR(120),
  "tipinm" VARCHAR(1),
  "tipest" VARCHAR(1),
  "dirpri" VARCHAR(120),
  "codrut" VARCHAR(6),
  "capsoc" NUMERIC(15),
  "horini" DATE,
  "horcie" DATE,
  "fecini" DATE,
  "fecfin" DATE,
  "discli" NUMERIC(10),
  "disbar" NUMERIC(10),
  "disdis" NUMERIC(10),
  "disins" NUMERIC(10),
  "disfun" NUMERIC(10),
  "disest" NUMERIC(10),
  "funres" VARCHAR(60),
  "funrel" VARCHAR(40),
  "fecres" DATE,
  "fecapr" DATE,
  "fecven" DATE,
  "tomo" VARCHAR(8),
  "folio" VARCHAR(8),
  "numero" VARCHAR(8),
  "taslic" NUMERIC(15),
  "deuanl" NUMERIC(15),
  "deuacl" NUMERIC(15),
  "implic" NUMERIC(15),
  "deuanp" NUMERIC(15),
  "deuacp" NUMERIC(15),
  "stasol" VARCHAR(1),
  "stalic" VARCHAR(1),
  "stadec" VARCHAR(1),
  "staliq" VARCHAR(1),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(50),
  "tipo" VARCHAR(1),
  "estser" VARCHAR(1)  NOT NULL,
  "telneg" VARCHAR(15),
  "clacon" VARCHAR(12),
  "capact" NUMERIC(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsollic1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsollic1" IS '';


-----------------------------------------------------------------------------
-- fcsolneg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsolneg" CASCADE;

DROP SEQUENCE IF EXISTS "fcsolneg_seq";

CREATE SEQUENCE "fcsolneg_seq";


CREATE TABLE "fcsolneg"
(
  "numneg" VARCHAR(10)  NOT NULL,
  "numsol" VARCHAR(10)  NOT NULL,
  "motneg" VARCHAR(210),
  "fecneg" DATE  NOT NULL,
  "resolu" VARCHAR(10),
  "tomon" VARCHAR(8),
  "folion" VARCHAR(8),
  "numeron" VARCHAR(8),
  "funneg" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsolneg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsolneg" IS '';


-----------------------------------------------------------------------------
-- fcsolvencia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsolvencia" CASCADE;

DROP SEQUENCE IF EXISTS "fcsolvencia_seq";

CREATE SEQUENCE "fcsolvencia_seq";


CREATE TABLE "fcsolvencia"
(
  "codsol" VARCHAR(10)  NOT NULL,
  "codtip" VARCHAR(2)  NOT NULL,
  "fecexp" DATE  NOT NULL,
  "fecven" DATE  NOT NULL,
  "numlic" VARCHAR(10),
  "rifcon" VARCHAR(14)  NOT NULL,
  "codcat" VARCHAR(30),
  "nomcon" VARCHAR(50),
  "dircon" VARCHAR(255),
  "codfue" VARCHAR(2),
  "stasol" VARCHAR(1),
  "motivo" VARCHAR(254),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsolvencia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsolvencia" IS '';


CREATE INDEX "fcsolvencia_i01fcsolvencia" ON "fcsolvencia" ("codsol");

ALTER TABLE "fcsolvencia" ADD CONSTRAINT "fcsolvencia_FK_1" FOREIGN KEY ("codtip") REFERENCES "fctipsol" ("codtip");

-----------------------------------------------------------------------------
-- fcsuscan
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcsuscan" CASCADE;

DROP SEQUENCE IF EXISTS "fcsuscan_seq";

CREATE SEQUENCE "fcsuscan_seq";


CREATE TABLE "fcsuscan"
(
  "numsus" VARCHAR(10)  NOT NULL,
  "numsol" VARCHAR(10)  NOT NULL,
  "numlic" VARCHAR(10)  NOT NULL,
  "estlic" VARCHAR(1)  NOT NULL,
  "motsus" VARCHAR(210)  NOT NULL,
  "fecsus" DATE  NOT NULL,
  "resolu" VARCHAR(10),
  "tomo" VARCHAR(8),
  "folio" VARCHAR(8),
  "numero" VARCHAR(8),
  "funsus" VARCHAR(15)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcsuscan_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcsuscan" IS '';


-----------------------------------------------------------------------------
-- fctasban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctasban" CASCADE;

DROP SEQUENCE IF EXISTS "fctasban_seq";

CREATE SEQUENCE "fctasban_seq";


CREATE TABLE "fctasban"
(
  "tasano" VARCHAR(2004),
  "taspor" NUMERIC(32,2),
  "tasmes" NUMERIC(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctasban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctasban" IS '';


-----------------------------------------------------------------------------
-- fctipapu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipapu" CASCADE;

DROP SEQUENCE IF EXISTS "fctipapu_seq";

CREATE SEQUENCE "fctipapu_seq";


CREATE TABLE "fctipapu"
(
  "tipapu" VARCHAR(4)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "pormon" VARCHAR(1)  NOT NULL,
  "alimon" NUMERIC(14,2),
  "statip" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipapu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipapu" IS '';


-----------------------------------------------------------------------------
-- fctipesp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipesp" CASCADE;

DROP SEQUENCE IF EXISTS "fctipesp_seq";

CREATE SEQUENCE "fctipesp_seq";


CREATE TABLE "fctipesp"
(
  "tipesp" VARCHAR(4)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "pormon" VARCHAR(1),
  "alimon" NUMERIC(14,2),
  "statip" VARCHAR(1),
  "mintri" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipesp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipesp" IS '';


-----------------------------------------------------------------------------
-- fctippag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctippag" CASCADE;

DROP SEQUENCE IF EXISTS "fctippag_seq";

CREATE SEQUENCE "fctippag_seq";


CREATE TABLE "fctippag"
(
  "tippag" VARCHAR(3)  NOT NULL,
  "despag" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctippag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctippag" IS '';


-----------------------------------------------------------------------------
-- fctippro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctippro" CASCADE;

DROP SEQUENCE IF EXISTS "fctippro_seq";

CREATE SEQUENCE "fctippro_seq";


CREATE TABLE "fctippro"
(
  "tippro" VARCHAR(4)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "pormon" VARCHAR(1)  NOT NULL,
  "alimon" NUMERIC(14,2),
  "statip" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctippro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctippro" IS '';


-----------------------------------------------------------------------------
-- fctipsol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctipsol" CASCADE;

DROP SEQUENCE IF EXISTS "fctipsol_seq";

CREATE SEQUENCE "fctipsol_seq";


CREATE TABLE "fctipsol"
(
  "codtip" VARCHAR(2)  NOT NULL,
  "destip" VARCHAR(100),
  "monsol" NUMERIC(14,2),
  "valsol" NUMERIC(14,2),
  "privdeu" VARCHAR(1),
  "privmsg" VARCHAR(3000),
  "anocom" VARCHAR(1),
  "fueing" VARCHAR(2),
  "gendeu" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctipsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctipsol" IS '';


-----------------------------------------------------------------------------
-- fctrainm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctrainm" CASCADE;

DROP SEQUENCE IF EXISTS "fctrainm_seq";

CREATE SEQUENCE "fctrainm_seq";


CREATE TABLE "fctrainm"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "nroinm" VARCHAR(8)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "rifrep" VARCHAR(14),
  "rifconant" VARCHAR(14)  NOT NULL,
  "rifrepant" VARCHAR(14),
  "funrec" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctrainm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctrainm" IS '';


-----------------------------------------------------------------------------
-- fctralic
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctralic" CASCADE;

DROP SEQUENCE IF EXISTS "fctralic_seq";

CREATE SEQUENCE "fctralic_seq";


CREATE TABLE "fctralic"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "rifrep" VARCHAR(14),
  "rifconant" VARCHAR(14)  NOT NULL,
  "rifrepant" VARCHAR(14),
  "funrec" VARCHAR(40)  NOT NULL,
  "numlic" VARCHAR(12),
  "id" INTEGER  NOT NULL DEFAULT nextval('fctralic_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctralic" IS '';


-----------------------------------------------------------------------------
-- fctraveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fctraveh" CASCADE;

DROP SEQUENCE IF EXISTS "fctraveh_seq";

CREATE SEQUENCE "fctraveh_seq";


CREATE TABLE "fctraveh"
(
  "numtra" VARCHAR(10)  NOT NULL,
  "plaveh" VARCHAR(8)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "rifcon" VARCHAR(14)  NOT NULL,
  "rifrep" VARCHAR(14),
  "rifconant" VARCHAR(14)  NOT NULL,
  "rifrepant" VARCHAR(14),
  "funrec" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fctraveh_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fctraveh" IS '';


-----------------------------------------------------------------------------
-- fcunimon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcunimon" CASCADE;

DROP SEQUENCE IF EXISTS "fcunimon_seq";

CREATE SEQUENCE "fcunimon_seq";


CREATE TABLE "fcunimon"
(
  "codunimon" VARCHAR(4)  NOT NULL,
  "nomunimon" VARCHAR(30)  NOT NULL,
  "valunimon" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcunimon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcunimon" IS '';


-----------------------------------------------------------------------------
-- fcusoinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcusoinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcusoinm_seq";

CREATE SEQUENCE "fcusoinm_seq";


CREATE TABLE "fcusoinm"
(
  "coduso" VARCHAR(3)  NOT NULL,
  "nomuso" VARCHAR(250)  NOT NULL,
  "factor" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcusoinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcusoinm" IS '';


-----------------------------------------------------------------------------
-- fcusoveh
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcusoveh" CASCADE;

DROP SEQUENCE IF EXISTS "fcusoveh_seq";

CREATE SEQUENCE "fcusoveh_seq";


CREATE TABLE "fcusoveh"
(
  "coduso" VARCHAR(16)  NOT NULL,
  "anovig" VARCHAR(4)  NOT NULL,
  "desuso" VARCHAR(250)  NOT NULL,
  "monafo" NUMERIC(14,2)  NOT NULL,
  "porali" NUMERIC(14,2)  NOT NULL,
  "anolim" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fcusoveh_seq'::regclass),
  PRIMARY KEY ("anovig")
);

COMMENT ON TABLE "fcusoveh" IS '';


-----------------------------------------------------------------------------
-- fcvalinm
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcvalinm" CASCADE;

DROP SEQUENCE IF EXISTS "fcvalinm_seq";

CREATE SEQUENCE "fcvalinm_seq";


CREATE TABLE "fcvalinm"
(
  "codzon" VARCHAR(1),
  "deszon" VARCHAR(50),
  "codtip" VARCHAR(3),
  "destip" VARCHAR(150),
  "valmtr" NUMERIC(14,2),
  "valfis" NUMERIC(14,2),
  "alitip" NUMERIC(14,2),
  "anual" NUMERIC(14,2),
  "alitipt" NUMERIC(14,2),
  "anualt" NUMERIC(14,2),
  "anovig" VARCHAR(4),
  "porvalfis" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcvalinm_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcvalinm" IS '';


-----------------------------------------------------------------------------
-- fcvalinm1
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fcvalinm1" CASCADE;

DROP SEQUENCE IF EXISTS "fcvalinm1_seq";

CREATE SEQUENCE "fcvalinm1_seq";


CREATE TABLE "fcvalinm1"
(
  "coduso" VARCHAR(3),
  "valini" NUMERIC(20,2),
  "valfin" NUMERIC(20,2),
  "aliinm" NUMERIC(5,3),
  "anovig" VARCHAR(4),
  "deduc" NUMERIC(14,2),
  "codref" VARCHAR(3),
  "zoni" VARCHAR(50),
  "manz" VARCHAR(30),
  "parmts" VARCHAR(30),
  "valor" NUMERIC(14,3),
  "tipedi" VARCHAR(3),
  "desedi" VARCHAR(60),
  "nivel" VARCHAR(30),
  "tipo" VARCHAR(3),
  "monto" NUMERIC(14,3),
  "id" INTEGER  NOT NULL DEFAULT nextval('fcvalinm1_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fcvalinm1" IS '';


-----------------------------------------------------------------------------
-- opasiordapr
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opasiordapr" CASCADE;

DROP SEQUENCE IF EXISTS "opasiordapr_seq";

CREATE SEQUENCE "opasiordapr_seq";


CREATE TABLE "opasiordapr"
(
  "ctagas" VARCHAR(32),
  "ctapag" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('opasiordapr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opasiordapr" IS '';


-----------------------------------------------------------------------------
-- opautpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opautpag" CASCADE;

DROP SEQUENCE IF EXISTS "opautpag_seq";

CREATE SEQUENCE "opautpag_seq";


CREATE TABLE "opautpag"
(
  "numord" VARCHAR(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "cedrif" VARCHAR(15)  NOT NULL,
  "nomben" VARCHAR(250)  NOT NULL,
  "monord" NUMERIC(14,2)  NOT NULL,
  "desord" VARCHAR(1000)  NOT NULL,
  "mondes" NUMERIC(14,2),
  "monret" NUMERIC(14,2),
  "numche" VARCHAR(20),
  "ctaban" VARCHAR(20),
  "ctapag" VARCHAR(32),
  "numcom" VARCHAR(8),
  "status" VARCHAR(1)  NOT NULL,
  "coduni" VARCHAR(30),
  "fecenvcon" DATE,
  "fecenvfin" DATE,
  "ctapagfin" VARCHAR(32),
  "nombensus" VARCHAR(250),
  "fecanu" DATE,
  "fecrecfin" DATE,
  "anopre" VARCHAR(4),
  "fecpag" DATE,
  "monpag" NUMERIC(16,2),
  "obsord" VARCHAR(1000),
  "numtiq" VARCHAR(8),
  "peraut" VARCHAR(500),
  "desanu" VARCHAR(250),
  "cedaut" VARCHAR(100),
  "nomper1" VARCHAR(50),
  "nomper2" VARCHAR(50),
  "horcon" VARCHAR(10),
  "feccon" DATE,
  "nomcat" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('opautpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opautpag" IS '';


-----------------------------------------------------------------------------
-- opbenefi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opbenefi" CASCADE;

DROP SEQUENCE IF EXISTS "opbenefi_seq";

CREATE SEQUENCE "opbenefi_seq";


CREATE TABLE "opbenefi"
(
  "cedrif" VARCHAR(15)  NOT NULL,
  "nomben" VARCHAR(250)  NOT NULL,
  "dirben" VARCHAR(100),
  "telben" VARCHAR(20),
  "codcta" VARCHAR(32),
  "nitben" VARCHAR(15),
  "codtipben" VARCHAR(3),
  "tipper" VARCHAR(1),
  "nacionalidad" VARCHAR(1),
  "residente" VARCHAR(1),
  "constituida" VARCHAR(1),
  "codord" VARCHAR(32),
  "codpercon" VARCHAR(32),
  "codordadi" VARCHAR(32),
  "codperconadi" VARCHAR(32),
  "codordcontra" VARCHAR(32),
  "codpercontra" VARCHAR(32),
  "temcedrif" VARCHAR(15),
  "codctasec" VARCHAR(32),
  "codctacajchi" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('opbenefi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opbenefi" IS '';


-----------------------------------------------------------------------------
-- opbenefi2
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opbenefi2" CASCADE;

DROP SEQUENCE IF EXISTS "opbenefi2_seq";

CREATE SEQUENCE "opbenefi2_seq";


CREATE TABLE "opbenefi2"
(
  "cedrif" VARCHAR(15)  NOT NULL,
  "nomben" VARCHAR(250)  NOT NULL,
  "dirben" VARCHAR(100),
  "telben" VARCHAR(20),
  "codcta" VARCHAR(32),
  "nitben" VARCHAR(15),
  "codtipben" VARCHAR(3),
  "tipper" VARCHAR(1),
  "nacionalidad" VARCHAR(1),
  "residente" VARCHAR(1),
  "constituida" VARCHAR(1),
  "codord" VARCHAR(32),
  "codpercon" VARCHAR(32),
  "codordadi" VARCHAR(32),
  "codperconadi" VARCHAR(32),
  "codordcontra" VARCHAR(32),
  "codpercontra" VARCHAR(32),
  "temcedrif" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('opbenefi2_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opbenefi2" IS '';


-----------------------------------------------------------------------------
-- opbenfonava
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opbenfonava" CASCADE;

DROP SEQUENCE IF EXISTS "opbenfonava_seq";

CREATE SEQUENCE "opbenfonava_seq";


CREATE TABLE "opbenfonava"
(
  "cedrif" VARCHAR(15),
  "codcta" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('opbenfonava_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opbenfonava" IS '';


-----------------------------------------------------------------------------
-- opcheper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opcheper" CASCADE;

DROP SEQUENCE IF EXISTS "opcheper_seq";

CREATE SEQUENCE "opcheper_seq";


CREATE TABLE "opcheper"
(
  "refopp" VARCHAR(8),
  "refcuo" VARCHAR(8),
  "monpag" NUMERIC(14,2),
  "fecpag" DATE,
  "numord" VARCHAR(8),
  "ctaban" VARCHAR(20),
  "numche" VARCHAR(20),
  "tipmov" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('opcheper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opcheper" IS '';


-----------------------------------------------------------------------------
-- opcominc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opcominc" CASCADE;

DROP SEQUENCE IF EXISTS "opcominc_seq";

CREATE SEQUENCE "opcominc_seq";


CREATE TABLE "opcominc"
(
  "refaju" VARCHAR(8),
  "numcom" VARCHAR(8),
  "fecaju" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('opcominc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opcominc" IS '';


-----------------------------------------------------------------------------
-- opconinc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opconinc" CASCADE;

DROP SEQUENCE IF EXISTS "opconinc_seq";

CREATE SEQUENCE "opconinc_seq";


CREATE TABLE "opconinc"
(
  "refaju" VARCHAR(8),
  "numcom" VARCHAR(8),
  "fecaju" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('opconinc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opconinc" IS '';


-----------------------------------------------------------------------------
-- opconnom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opconnom" CASCADE;

DROP SEQUENCE IF EXISTS "opconnom_seq";

CREATE SEQUENCE "opconnom_seq";


CREATE TABLE "opconnom"
(
  "codcat" VARCHAR(32)  NOT NULL,
  "codnom" VARCHAR(3),
  "refprc" VARCHAR(8),
  "refcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('opconnom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opconnom" IS '';


-----------------------------------------------------------------------------
-- opdefemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opdefemp" CASCADE;

DROP SEQUENCE IF EXISTS "opdefemp_seq";

CREATE SEQUENCE "opdefemp_seq";


CREATE TABLE "opdefemp"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "ctapag" VARCHAR(32)  NOT NULL,
  "ctades" VARCHAR(32)  NOT NULL,
  "numini" VARCHAR(8)  NOT NULL,
  "ordnom" VARCHAR(4)  NOT NULL,
  "ordobr" VARCHAR(4)  NOT NULL,
  "unitri" NUMERIC(14,2),
  "vercomret" VARCHAR(1),
  "genctaord" VARCHAR(1),
  "forubi" VARCHAR(32),
  "tipaju" VARCHAR(4),
  "tipeje" VARCHAR(4),
  "numaut" VARCHAR(8),
  "tipmov" VARCHAR(4),
  "coriva" NUMERIC(14),
  "ctabono" VARCHAR(32),
  "ctavaca" VARCHAR(32),
  "gencaubon" VARCHAR(1),
  "gencomadi" VARCHAR(1),
  "unidad" VARCHAR(100),
  "ordliq" VARCHAR(4),
  "ordfid" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('opdefemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opdefemp" IS '';


-----------------------------------------------------------------------------
-- opdetaut
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opdetaut" CASCADE;

DROP SEQUENCE IF EXISTS "opdetaut_seq";

CREATE SEQUENCE "opdetaut_seq";


CREATE TABLE "opdetaut"
(
  "numord" VARCHAR(8)  NOT NULL,
  "refcom" VARCHAR(8),
  "codpre" VARCHAR(32)  NOT NULL,
  "moncau" NUMERIC(14,2)  NOT NULL,
  "mondes" NUMERIC(14,2),
  "monret" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('opdetaut_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opdetaut" IS '';


-----------------------------------------------------------------------------
-- opdetfac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opdetfac" CASCADE;

DROP SEQUENCE IF EXISTS "opdetfac_seq";

CREATE SEQUENCE "opdetfac_seq";


CREATE TABLE "opdetfac"
(
  "numord" VARCHAR(8),
  "desdet" VARCHAR(255),
  "mondet" NUMERIC(20,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('opdetfac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opdetfac" IS '';


-----------------------------------------------------------------------------
-- opdetord
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opdetord" CASCADE;

DROP SEQUENCE IF EXISTS "opdetord_seq";

CREATE SEQUENCE "opdetord_seq";


CREATE TABLE "opdetord"
(
  "numord" VARCHAR(8)  NOT NULL,
  "refcom" VARCHAR(8),
  "codpre" VARCHAR(32)  NOT NULL,
  "moncau" NUMERIC(14,2)  NOT NULL,
  "mondes" NUMERIC(14,2),
  "monret" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('opdetord_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opdetord" IS '';


CREATE INDEX "i01opdetord" ON "opdetord" ("numord","codpre");

CREATE INDEX "i02opdetord" ON "opdetord" ("codpre");

-----------------------------------------------------------------------------
-- opdetper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opdetper" CASCADE;

DROP SEQUENCE IF EXISTS "opdetper_seq";

CREATE SEQUENCE "opdetper_seq";


CREATE TABLE "opdetper"
(
  "refopp" VARCHAR(8)  NOT NULL,
  "refcuo" VARCHAR(8)  NOT NULL,
  "fecinicuo" DATE  NOT NULL,
  "fecfincuo" DATE  NOT NULL,
  "moncuo" NUMERIC(14,2)  NOT NULL,
  "fecpag" DATE,
  "numord" VARCHAR(8),
  "ctaban" VARCHAR(20),
  "numche" VARCHAR(20),
  "tipmov" VARCHAR(4),
  "monpag" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('opdetper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opdetper" IS '';


-----------------------------------------------------------------------------
-- opdisfue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opdisfue" CASCADE;

DROP SEQUENCE IF EXISTS "opdisfue_seq";

CREATE SEQUENCE "opdisfue_seq";


CREATE TABLE "opdisfue"
(
  "numord" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "fuefin" VARCHAR(4),
  "monfue" NUMERIC(14,2),
  "correl" VARCHAR(10),
  "origen" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('opdisfue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opdisfue" IS '';


-----------------------------------------------------------------------------
-- opfactur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opfactur" CASCADE;

DROP SEQUENCE IF EXISTS "opfactur_seq";

CREATE SEQUENCE "opfactur_seq";


CREATE TABLE "opfactur"
(
  "numord" VARCHAR(8),
  "fecfac" DATE,
  "numfac" VARCHAR(50),
  "numctr" VARCHAR(50),
  "tiptra" VARCHAR(10),
  "totfac" NUMERIC(18,2),
  "exeiva" NUMERIC(18,2),
  "basimp" NUMERIC(18,2),
  "poriva" NUMERIC(18,2),
  "moniva" NUMERIC(18,2),
  "monret" NUMERIC(18,2),
  "basltf" NUMERIC(18,2),
  "porltf" NUMERIC(18,2),
  "monltf" NUMERIC(18,2),
  "basislr" NUMERIC(18,2),
  "porislr" NUMERIC(18,2),
  "monislr" NUMERIC(18,2),
  "codislr" VARCHAR(50),
  "rifalt" VARCHAR(20),
  "facafe" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('opfactur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opfactur" IS '';


-----------------------------------------------------------------------------
-- opordche
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opordche" CASCADE;

DROP SEQUENCE IF EXISTS "opordche_seq";

CREATE SEQUENCE "opordche_seq";


CREATE TABLE "opordche"
(
  "numord" VARCHAR(8)  NOT NULL,
  "numche" VARCHAR(20)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "monpag" NUMERIC(20,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('opordche_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opordche" IS '';


-----------------------------------------------------------------------------
-- opordpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opordpag" CASCADE;

DROP SEQUENCE IF EXISTS "opordpag_seq";

CREATE SEQUENCE "opordpag_seq";


CREATE TABLE "opordpag"
(
  "numord" VARCHAR(8)  NOT NULL,
  "tipcau" VARCHAR(4)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "cedrif" VARCHAR(15)  NOT NULL,
  "nomben" VARCHAR(250)  NOT NULL,
  "monord" NUMERIC(14,2)  NOT NULL,
  "desord" VARCHAR(1000)  NOT NULL,
  "mondes" NUMERIC(14,2),
  "monret" NUMERIC(14,2),
  "numche" VARCHAR(20),
  "ctaban" VARCHAR(20),
  "ctapag" VARCHAR(32),
  "numcom" VARCHAR(8),
  "status" VARCHAR(1)  NOT NULL,
  "coduni" VARCHAR(30),
  "fecenvcon" DATE,
  "fecenvfin" DATE,
  "ctapagfin" VARCHAR(32),
  "obsord" VARCHAR(250),
  "fecven" DATE,
  "fecanu" DATE,
  "desanu" VARCHAR(250),
  "monpag" NUMERIC(16,2),
  "aproba" VARCHAR(1),
  "nombensus" VARCHAR(250),
  "fecrecfin" DATE,
  "anopre" VARCHAR(4),
  "fecpag" DATE,
  "numtiq" VARCHAR(8),
  "peraut" VARCHAR(500),
  "cedaut" VARCHAR(100),
  "nomper2" VARCHAR(50),
  "nomper1" VARCHAR(50),
  "horcon" VARCHAR(10),
  "feccon" DATE,
  "nomcat" VARCHAR(250),
  "numfac" VARCHAR(20),
  "numconfac" VARCHAR(20),
  "numcorfac" VARCHAR(20),
  "fechafac" DATE,
  "fecfac" DATE,
  "tipfin" VARCHAR(4),
  "comret" VARCHAR(20),
  "feccomret" DATE,
  "comretislr" VARCHAR(20),
  "feccomretislr" DATE,
  "comretltf" VARCHAR(20),
  "feccomretltf" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('opordpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opordpag" IS '';


-----------------------------------------------------------------------------
-- opordper
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opordper" CASCADE;

DROP SEQUENCE IF EXISTS "opordper_seq";

CREATE SEQUENCE "opordper_seq";


CREATE TABLE "opordper"
(
  "refopp" VARCHAR(8)  NOT NULL,
  "desopp" VARCHAR(250)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "numcuo" NUMERIC(6)  NOT NULL,
  "freopp" VARCHAR(1)  NOT NULL,
  "cedrif" VARCHAR(15)  NOT NULL,
  "monopp" NUMERIC(14,2)  NOT NULL,
  "staord" VARCHAR(1)  NOT NULL,
  "numcue" VARCHAR(20),
  "ctaban" VARCHAR(20),
  "tipdoc" VARCHAR(4),
  "refere" VARCHAR(8),
  "coduni" VARCHAR(30),
  "tippag" VARCHAR(1),
  "numtiq" VARCHAR(8),
  "peraut" VARCHAR(40),
  "cedaut" VARCHAR(15),
  "id" INTEGER  NOT NULL DEFAULT nextval('opordper_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opordper" IS '';


-----------------------------------------------------------------------------
-- opretcon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opretcon" CASCADE;

DROP SEQUENCE IF EXISTS "opretcon_seq";

CREATE SEQUENCE "opretcon_seq";


CREATE TABLE "opretcon"
(
  "codcon" VARCHAR(3)  NOT NULL,
  "codtip" VARCHAR(3)  NOT NULL,
  "codnom" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('opretcon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opretcon" IS '';


-----------------------------------------------------------------------------
-- opretord
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "opretord" CASCADE;

DROP SEQUENCE IF EXISTS "opretord_seq";

CREATE SEQUENCE "opretord_seq";


CREATE TABLE "opretord"
(
  "numord" VARCHAR(8)  NOT NULL,
  "codtip" VARCHAR(3)  NOT NULL,
  "monret" NUMERIC(14,2)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "numret" VARCHAR(8),
  "refere" VARCHAR(8),
  "correl" NUMERIC(3),
  "monbas" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('opretord_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "opretord" IS '';


CREATE INDEX "i01opretord" ON "opretord" ("numord","codtip");

-----------------------------------------------------------------------------
-- optipben
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "optipben" CASCADE;

DROP SEQUENCE IF EXISTS "optipben_seq";

CREATE SEQUENCE "optipben_seq";


CREATE TABLE "optipben"
(
  "codtipben" VARCHAR(3)  NOT NULL,
  "destipben" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('optipben_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "optipben" IS '';


-----------------------------------------------------------------------------
-- optipret
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "optipret" CASCADE;

DROP SEQUENCE IF EXISTS "optipret_seq";

CREATE SEQUENCE "optipret_seq";


CREATE TABLE "optipret"
(
  "codtip" VARCHAR(3)  NOT NULL,
  "destip" VARCHAR(250)  NOT NULL,
  "codcon" VARCHAR(32)  NOT NULL,
  "basimp" NUMERIC(14,2),
  "porret" NUMERIC(14,2),
  "unitri" NUMERIC(14,2),
  "porsus" NUMERIC(14,2),
  "factor" NUMERIC(16,6),
  "id" INTEGER  NOT NULL DEFAULT nextval('optipret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "optipret" IS '';


-----------------------------------------------------------------------------
-- tsantici
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsantici" CASCADE;

DROP SEQUENCE IF EXISTS "tsantici_seq";

CREATE SEQUENCE "tsantici_seq";


CREATE TABLE "tsantici"
(
  "refant" VARCHAR(20)  NOT NULL,
  "desant" VARCHAR(250),
  "cedrif" VARCHAR(15)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "fecant" DATE  NOT NULL,
  "monto" NUMERIC(14,2),
  "saldo" NUMERIC(14,2),
  "numcom" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsantici_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsantici" IS '';


-----------------------------------------------------------------------------
-- tsantord
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsantord" CASCADE;

DROP SEQUENCE IF EXISTS "tsantord_seq";

CREATE SEQUENCE "tsantord_seq";


CREATE TABLE "tsantord"
(
  "numord" VARCHAR(8)  NOT NULL,
  "numche" VARCHAR(20)  NOT NULL,
  "monto" NUMERIC(14,2),
  "refant" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsantord_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsantord" IS '';


-----------------------------------------------------------------------------
-- tsasifte
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsasifte" CASCADE;

DROP SEQUENCE IF EXISTS "tsasifte_seq";

CREATE SEQUENCE "tsasifte_seq";


CREATE TABLE "tsasifte"
(
  "numche" VARCHAR(20)  NOT NULL,
  "codtipfte" VARCHAR(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsasifte_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsasifte" IS '';


-----------------------------------------------------------------------------
-- tscheemi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tscheemi" CASCADE;

DROP SEQUENCE IF EXISTS "tscheemi_seq";

CREATE SEQUENCE "tscheemi_seq";


CREATE TABLE "tscheemi"
(
  "numche" VARCHAR(20)  NOT NULL,
  "numcue" VARCHAR(20)  NOT NULL,
  "cedrif" VARCHAR(15)  NOT NULL,
  "fecemi" DATE  NOT NULL,
  "monche" NUMERIC(14,2)  NOT NULL,
  "status" VARCHAR(1),
  "codemi" VARCHAR(50),
  "fecent" DATE,
  "codent" VARCHAR(50),
  "obsent" VARCHAR(100),
  "fecanu" DATE,
  "cedrec" VARCHAR(15),
  "nomrec" VARCHAR(50),
  "tipdoc" VARCHAR(4),
  "fecing" DATE,
  "temporal" VARCHAR(100),
  "temporal2" VARCHAR(100),
  "nombensus" VARCHAR(250),
  "anopre" VARCHAR(4),
  "numtiq" VARCHAR(8),
  "cedaut" VARCHAR(15),
  "peraut" VARCHAR(40),
  "id" INTEGER  NOT NULL DEFAULT nextval('tscheemi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tscheemi" IS '';


CREATE INDEX "itscheemi2" ON "tscheemi" ("numcue","cedrif");

CREATE INDEX "itscheemi3" ON "tscheemi" ("cedrif");

CREATE INDEX "itscheemi4" ON "tscheemi" ("fecemi");

-----------------------------------------------------------------------------
-- tscomprobantes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tscomprobantes" CASCADE;

DROP SEQUENCE IF EXISTS "tscomprobantes_seq";

CREATE SEQUENCE "tscomprobantes_seq";


CREATE TABLE "tscomprobantes"
(
  "tipo" VARCHAR(4),
  "cedrif" VARCHAR(15),
  "ano" VARCHAR(4),
  "mes" VARCHAR(2),
  "comprobante" VARCHAR(6),
  "numord" VARCHAR(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('tscomprobantes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tscomprobantes" IS '';


-----------------------------------------------------------------------------
-- tsconcil
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsconcil" CASCADE;

DROP SEQUENCE IF EXISTS "tsconcil_seq";

CREATE SEQUENCE "tsconcil_seq";


CREATE TABLE "tsconcil"
(
  "numcue" VARCHAR(20)  NOT NULL,
  "mescon" VARCHAR(2)  NOT NULL,
  "anocon" VARCHAR(4)  NOT NULL,
  "refere" VARCHAR(20)  NOT NULL,
  "movlib" VARCHAR(4),
  "movban" VARCHAR(4),
  "feclib" DATE,
  "fecban" DATE,
  "desref" VARCHAR(100),
  "monlib" NUMERIC(14,2),
  "monban" NUMERIC(14,2),
  "result" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsconcil_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsconcil" IS '';


-----------------------------------------------------------------------------
-- tsconcilhis
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsconcilhis" CASCADE;

DROP SEQUENCE IF EXISTS "tsconcilhis_seq";

CREATE SEQUENCE "tsconcilhis_seq";


CREATE TABLE "tsconcilhis"
(
  "numcue" VARCHAR(20)  NOT NULL,
  "mescon" VARCHAR(2)  NOT NULL,
  "anocon" VARCHAR(4)  NOT NULL,
  "refere" VARCHAR(20)  NOT NULL,
  "movlib" VARCHAR(4),
  "movban" VARCHAR(4),
  "feclib" DATE,
  "fecban" DATE,
  "desref" VARCHAR(100),
  "monlib" NUMERIC(14,2),
  "monban" NUMERIC(14,2),
  "result" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsconcilhis_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsconcilhis" IS '';


-----------------------------------------------------------------------------
-- tsconuni
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsconuni" CASCADE;

DROP SEQUENCE IF EXISTS "tsconuni_seq";

CREATE SEQUENCE "tsconuni_seq";


CREATE TABLE "tsconuni"
(
  "codcta" VARCHAR(32),
  "codsus" VARCHAR(32),
  "nomsus" VARCHAR(255),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsconuni_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsconuni" IS '';


-----------------------------------------------------------------------------
-- tsdefban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsdefban" CASCADE;

DROP SEQUENCE IF EXISTS "tsdefban_seq";

CREATE SEQUENCE "tsdefban_seq";


CREATE TABLE "tsdefban"
(
  "numcue" VARCHAR(20)  NOT NULL,
  "nomcue" VARCHAR(40)  NOT NULL,
  "tipcue" VARCHAR(3)  NOT NULL,
  "codcta" VARCHAR(32),
  "fecreg" DATE  NOT NULL,
  "fecven" DATE,
  "fecper" DATE,
  "renaut" VARCHAR(1),
  "porint" NUMERIC(5,2),
  "tipint" VARCHAR(1),
  "numche" VARCHAR(8),
  "antban" NUMERIC(14,2),
  "debban" NUMERIC(14,2),
  "creban" NUMERIC(14,2),
  "antlib" NUMERIC(14,2),
  "deblib" NUMERIC(14,2),
  "crelib" NUMERIC(14,2),
  "valche" NUMERIC(3),
  "concil" VARCHAR(1),
  "plazo" NUMERIC(3),
  "fecape" DATE,
  "usocue" VARCHAR(20),
  "tipren" VARCHAR(20),
  "desenl" VARCHAR(250),
  "porsalmin" NUMERIC(5,2),
  "monsalmin" NUMERIC(14,2),
  "codctaprecoo" VARCHAR(32),
  "codctapreord" VARCHAR(32),
  "trasitoria" VARCHAR(1),
  "salact" NUMERIC(20,2),
  "fecaper" DATE,
  "temnumcue" VARCHAR(20),
  "cantdig" NUMERIC(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdefban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdefban" IS '';


-----------------------------------------------------------------------------
-- tsdefchequera
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsdefchequera" CASCADE;

DROP SEQUENCE IF EXISTS "tsdefchequera_seq";

CREATE SEQUENCE "tsdefchequera_seq";


CREATE TABLE "tsdefchequera"
(
  "codchq" VARCHAR(8)  NOT NULL,
  "numche" VARCHAR(20),
  "numcue" VARCHAR(20),
  "numchedes" VARCHAR(20),
  "numchehas" VARCHAR(20),
  "activa" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdefchequera_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdefchequera" IS '';


-----------------------------------------------------------------------------
-- tsdefemp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsdefemp" CASCADE;

DROP SEQUENCE IF EXISTS "tsdefemp_seq";

CREATE SEQUENCE "tsdefemp_seq";


CREATE TABLE "tsdefemp"
(
  "codemp" VARCHAR(3)  NOT NULL,
  "feccon" DATE  NOT NULL,
  "fecban" DATE  NOT NULL,
  "tipmon" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdefemp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdefemp" IS '';


-----------------------------------------------------------------------------
-- tsdefrengas
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsdefrengas" CASCADE;

DROP SEQUENCE IF EXISTS "tsdefrengas_seq";

CREATE SEQUENCE "tsdefrengas_seq";


CREATE TABLE "tsdefrengas"
(
  "pagrepcaj" VARCHAR(4),
  "ctarepcaj" VARCHAR(32),
  "pagcheant" VARCHAR(4),
  "ctacheant" VARCHAR(32),
  "movreicaj" VARCHAR(4),
  "ctareicaj" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdefrengas_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdefrengas" IS '';


-----------------------------------------------------------------------------
-- tsdepfonpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsdepfonpre" CASCADE;

DROP SEQUENCE IF EXISTS "tsdepfonpre_seq";

CREATE SEQUENCE "tsdepfonpre_seq";


CREATE TABLE "tsdepfonpre"
(
  "numdep" VARCHAR(20)  NOT NULL,
  "tipemp" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdepfonpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdepfonpre" IS '';


-----------------------------------------------------------------------------
-- tsdesmon
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsdesmon" CASCADE;

DROP SEQUENCE IF EXISTS "tsdesmon_seq";

CREATE SEQUENCE "tsdesmon_seq";


CREATE TABLE "tsdesmon"
(
  "codmon" VARCHAR(3)  NOT NULL,
  "nommon" VARCHAR(40)  NOT NULL,
  "valmon" NUMERIC(12,2)  NOT NULL,
  "aumdis" VARCHAR(1)  NOT NULL,
  "fecmon" DATE  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdesmon_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdesmon" IS '';


-----------------------------------------------------------------------------
-- tsdettra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsdettra" CASCADE;

DROP SEQUENCE IF EXISTS "tsdettra_seq";

CREATE SEQUENCE "tsdettra_seq";


CREATE TABLE "tsdettra"
(
  "reftra" VARCHAR(10)  NOT NULL,
  "ctaori" VARCHAR(18)  NOT NULL,
  "ctades" VARCHAR(18)  NOT NULL,
  "aumdis" VARCHAR(1)  NOT NULL,
  "montra" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsdettra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsdettra" IS '';


-----------------------------------------------------------------------------
-- tsentislr
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsentislr" CASCADE;

DROP SEQUENCE IF EXISTS "tsentislr_seq";

CREATE SEQUENCE "tsentislr_seq";


CREATE TABLE "tsentislr"
(
  "numdep" VARCHAR(20)  NOT NULL,
  "fecha" DATE,
  "banco" VARCHAR(100),
  "numord" VARCHAR(8)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsentislr_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsentislr" IS '';


-----------------------------------------------------------------------------
-- tsfonpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsfonpre" CASCADE;

DROP SEQUENCE IF EXISTS "tsfonpre_seq";

CREATE SEQUENCE "tsfonpre_seq";


CREATE TABLE "tsfonpre"
(
  "numche" VARCHAR(20)  NOT NULL,
  "tipemp" VARCHAR(1)  NOT NULL,
  "tippre" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsfonpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsfonpre" IS '';


-----------------------------------------------------------------------------
-- tslibcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tslibcom" CASCADE;

DROP SEQUENCE IF EXISTS "tslibcom_seq";

CREATE SEQUENCE "tslibcom_seq";


CREATE TABLE "tslibcom"
(
  "numlin" NUMERIC(10),
  "deslin" VARCHAR(1000),
  "id" INTEGER  NOT NULL DEFAULT nextval('tslibcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tslibcom" IS '';


-----------------------------------------------------------------------------
-- tsmaetra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsmaetra" CASCADE;

DROP SEQUENCE IF EXISTS "tsmaetra_seq";

CREATE SEQUENCE "tsmaetra_seq";


CREATE TABLE "tsmaetra"
(
  "reftra" VARCHAR(10)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "destra" VARCHAR(100)  NOT NULL,
  "tottra" NUMERIC(14,2)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsmaetra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsmaetra" IS '';


-----------------------------------------------------------------------------
-- tsmovban
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsmovban" CASCADE;

DROP SEQUENCE IF EXISTS "tsmovban_seq";

CREATE SEQUENCE "tsmovban_seq";


CREATE TABLE "tsmovban"
(
  "numcue" VARCHAR(20)  NOT NULL,
  "codcta" VARCHAR(32),
  "refban" VARCHAR(20)  NOT NULL,
  "fecban" DATE  NOT NULL,
  "tipmov" VARCHAR(4)  NOT NULL,
  "desban" VARCHAR(250)  NOT NULL,
  "monmov" NUMERIC(14,2)  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "stacon" VARCHAR(1)  NOT NULL,
  "transito" VARCHAR(1),
  "stacon1" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsmovban_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsmovban" IS '';


CREATE INDEX "itsmovban2" ON "tsmovban" ("numcue","tipmov","fecban");

-----------------------------------------------------------------------------
-- tsmovlib
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsmovlib" CASCADE;

DROP SEQUENCE IF EXISTS "tsmovlib_seq";

CREATE SEQUENCE "tsmovlib_seq";


CREATE TABLE "tsmovlib"
(
  "numcue" VARCHAR(20)  NOT NULL,
  "reflib" VARCHAR(20)  NOT NULL,
  "feclib" DATE  NOT NULL,
  "tipmov" VARCHAR(4)  NOT NULL,
  "deslib" VARCHAR(4000)  NOT NULL,
  "monmov" NUMERIC(14,2)  NOT NULL,
  "codcta" VARCHAR(32),
  "numcom" VARCHAR(8),
  "feccom" DATE,
  "status" VARCHAR(1)  NOT NULL,
  "stacon" VARCHAR(1)  NOT NULL,
  "fecing" DATE,
  "fecanu" DATE,
  "tipmovpad" VARCHAR(4),
  "reflibpad" VARCHAR(20),
  "transito" VARCHAR(1),
  "numcomadi" VARCHAR(8),
  "feccomadi" DATE,
  "nombensus" VARCHAR(250),
  "orden" NUMERIC(14),
  "horing" VARCHAR(12),
  "stacon1" VARCHAR(1),
  "motanu" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsmovlib_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsmovlib" IS '';


CREATE INDEX "i01tsmovlib" ON "tsmovlib" ("numcue");

CREATE INDEX "i02tsmovlib" ON "tsmovlib" ("tipmov","numcue");

CREATE INDEX "i03tsmovlib" ON "tsmovlib" ("tipmov");

CREATE INDEX "i04tsmovlib" ON "tsmovlib" ("numcue","feclib");

CREATE INDEX "i06movlib" ON "tsmovlib" ("reflib");

CREATE INDEX "i07movlib" ON "tsmovlib" ("feclib");

CREATE INDEX "itsmovlib2" ON "tsmovlib" ("numcue","tipmov","feclib");

-----------------------------------------------------------------------------
-- tsmovtra
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsmovtra" CASCADE;

DROP SEQUENCE IF EXISTS "tsmovtra_seq";

CREATE SEQUENCE "tsmovtra_seq";


CREATE TABLE "tsmovtra"
(
  "reftra" VARCHAR(20)  NOT NULL,
  "fectra" DATE  NOT NULL,
  "destra" VARCHAR(250)  NOT NULL,
  "ctaori" VARCHAR(20)  NOT NULL,
  "ctades" VARCHAR(20)  NOT NULL,
  "montra" NUMERIC(14,2)  NOT NULL,
  "numcom" VARCHAR(8),
  "status" VARCHAR(1)  NOT NULL,
  "fecing" DATE,
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsmovtra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsmovtra" IS '';


-----------------------------------------------------------------------------
-- tspararc
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tspararc" CASCADE;

DROP SEQUENCE IF EXISTS "tspararc_seq";

CREATE SEQUENCE "tspararc_seq";


CREATE TABLE "tspararc"
(
  "numcue" VARCHAR(20)  NOT NULL,
  "inicue" NUMERIC(3)  NOT NULL,
  "fincue" NUMERIC(3)  NOT NULL,
  "iniref" NUMERIC(3)  NOT NULL,
  "finref" NUMERIC(3)  NOT NULL,
  "inifec" NUMERIC(3)  NOT NULL,
  "finfec" NUMERIC(3)  NOT NULL,
  "initip" NUMERIC(3)  NOT NULL,
  "fintip" NUMERIC(3)  NOT NULL,
  "inides" NUMERIC(3)  NOT NULL,
  "findes" NUMERIC(3)  NOT NULL,
  "inimon" NUMERIC(3)  NOT NULL,
  "finmon" NUMERIC(3)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tspararc_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tspararc" IS '';


-----------------------------------------------------------------------------
-- tsrelfonvia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsrelfonvia" CASCADE;

DROP SEQUENCE IF EXISTS "tsrelfonvia_seq";

CREATE SEQUENCE "tsrelfonvia_seq";


CREATE TABLE "tsrelfonvia"
(
  "numsol" VARCHAR(10)  NOT NULL,
  "numche" VARCHAR(20)  NOT NULL,
  "numcue" VARCHAR(20)  NOT NULL,
  "cedrif" VARCHAR(15),
  "nomben" VARCHAR(100),
  "monche" NUMERIC(14,2),
  "codcat" VARCHAR(32),
  "fecemi" DATE,
  "codpre" VARCHAR(32),
  "numdep" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsrelfonvia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsrelfonvia" IS '';


-----------------------------------------------------------------------------
-- tsrepret
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsrepret" CASCADE;

DROP SEQUENCE IF EXISTS "tsrepret_seq";

CREATE SEQUENCE "tsrepret_seq";


CREATE TABLE "tsrepret"
(
  "codrep" VARCHAR(50),
  "codret" VARCHAR(4),
  "id" INTEGER  NOT NULL DEFAULT nextval('tsrepret_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsrepret" IS '';


-----------------------------------------------------------------------------
-- tsretiva
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tsretiva" CASCADE;

DROP SEQUENCE IF EXISTS "tsretiva_seq";

CREATE SEQUENCE "tsretiva_seq";


CREATE TABLE "tsretiva"
(
  "codret" VARCHAR(3)  NOT NULL,
  "codrec" VARCHAR(4)  NOT NULL,
  "codpar" VARCHAR(32)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tsretiva_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tsretiva" IS '';


-----------------------------------------------------------------------------
-- tssecofi
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tssecofi" CASCADE;

DROP SEQUENCE IF EXISTS "tssecofi_seq";

CREATE SEQUENCE "tssecofi_seq";


CREATE TABLE "tssecofi"
(
  "codsecofi" VARCHAR(10),
  "dessecofi" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('tssecofi_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tssecofi" IS '';


-----------------------------------------------------------------------------
-- tssolpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tssolpag" CASCADE;

DROP SEQUENCE IF EXISTS "tssolpag_seq";

CREATE SEQUENCE "tssolpag_seq";


CREATE TABLE "tssolpag"
(
  "numsol" VARCHAR(8)  NOT NULL,
  "fecsol" DATE  NOT NULL,
  "numaep" VARCHAR(8),
  "numopp" VARCHAR(8),
  "monsol" NUMERIC(14,2),
  "dessol" VARCHAR(255),
  "numfac" VARCHAR(255),
  "cedrif" VARCHAR(15),
  "cedsol" VARCHAR(15),
  "nomsol" VARCHAR(100),
  "id" INTEGER  NOT NULL DEFAULT nextval('tssolpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tssolpag" IS '';


-----------------------------------------------------------------------------
-- tstipcue
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tstipcue" CASCADE;

DROP SEQUENCE IF EXISTS "tstipcue_seq";

CREATE SEQUENCE "tstipcue_seq";


CREATE TABLE "tstipcue"
(
  "codtip" VARCHAR(3)  NOT NULL,
  "destip" VARCHAR(40)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tstipcue_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tstipcue" IS '';


-----------------------------------------------------------------------------
-- tstipfte
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tstipfte" CASCADE;

DROP SEQUENCE IF EXISTS "tstipfte_seq";

CREATE SEQUENCE "tstipfte_seq";


CREATE TABLE "tstipfte"
(
  "codtipfte" VARCHAR(3)  NOT NULL,
  "nomtipfte" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('tstipfte_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tstipfte" IS '';


-----------------------------------------------------------------------------
-- tstipmov
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tstipmov" CASCADE;

DROP SEQUENCE IF EXISTS "tstipmov_seq";

CREATE SEQUENCE "tstipmov_seq";


CREATE TABLE "tstipmov"
(
  "codtip" VARCHAR(4)  NOT NULL,
  "destip" VARCHAR(40)  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "orden" VARCHAR(2),
  "id" INTEGER  NOT NULL DEFAULT nextval('tstipmov_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tstipmov" IS '';


-----------------------------------------------------------------------------
-- tstipren
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "tstipren" CASCADE;

DROP SEQUENCE IF EXISTS "tstipren_seq";

CREATE SEQUENCE "tstipren_seq";


CREATE TABLE "tstipren"
(
  "codtip" VARCHAR(3)  NOT NULL,
  "destip" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('tstipren_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "tstipren" IS '';


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

