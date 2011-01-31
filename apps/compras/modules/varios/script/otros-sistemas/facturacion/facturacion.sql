
-----------------------------------------------------------------------------
-- faartcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faartcom" CASCADE;

DROP SEQUENCE IF EXISTS "faartcom_seq";

CREATE SEQUENCE "faartcom_seq";


CREATE TABLE "faartcom"
(
  "codcom" VARCHAR(6),
  "codart" VARCHAR(20),
  "id" INTEGER  NOT NULL DEFAULT nextval('faartcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faartcom" IS '';


-----------------------------------------------------------------------------
-- faartdev
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faartdev" CASCADE;

DROP SEQUENCE IF EXISTS "faartdev_seq";

CREATE SEQUENCE "faartdev_seq";


CREATE TABLE "faartdev"
(
  "nrodev" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "numlot" VARCHAR(25)  NOT NULL,
  "candes" NUMERIC(14,2),
  "candev" NUMERIC(14,2),
  "preart" NUMERIC(14,2),
  "totart" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('faartdev_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faartdev" IS '';


-----------------------------------------------------------------------------
-- faartfac
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faartfac" CASCADE;

DROP SEQUENCE IF EXISTS "faartfac_seq";

CREATE SEQUENCE "faartfac_seq";


CREATE TABLE "faartfac"
(
  "reffac" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "codref" VARCHAR(8),
  "cantot" NUMERIC(14,2),
  "precio" NUMERIC(14,2),
  "monrgo" NUMERIC(14,2),
  "mondes" NUMERIC(14,2),
  "totart" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('faartfac_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faartfac" IS '';


-----------------------------------------------------------------------------
-- faartnot
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faartnot" CASCADE;

DROP SEQUENCE IF EXISTS "faartnot_seq";

CREATE SEQUENCE "faartnot_seq";


CREATE TABLE "faartnot"
(
  "nronot" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "numlot" VARCHAR(25)  NOT NULL,
  "cansol" NUMERIC(14,2),
  "canent" NUMERIC(14,2),
  "candes" NUMERIC(14,2),
  "canaju" NUMERIC(14,2),
  "candev" NUMERIC(14,2),
  "cantot" NUMERIC(14,2),
  "preart" NUMERIC(14,2),
  "totart" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('faartnot_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faartnot" IS '';


-----------------------------------------------------------------------------
-- faartped
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faartped" CASCADE;

DROP SEQUENCE IF EXISTS "faartped_seq";

CREATE SEQUENCE "faartped_seq";


CREATE TABLE "faartped"
(
  "nroped" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "canord" NUMERIC(14,2),
  "canaju" NUMERIC(14,2),
  "candes" NUMERIC(14,2),
  "cantot" NUMERIC(14,2),
  "preart" NUMERIC(14,2),
  "totart" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('faartped_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faartped" IS '';


-----------------------------------------------------------------------------
-- faartpro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faartpro" CASCADE;

DROP SEQUENCE IF EXISTS "faartpro_seq";

CREATE SEQUENCE "faartpro_seq";


CREATE TABLE "faartpro"
(
  "codpro" VARCHAR(10)  NOT NULL,
  "codalm" VARCHAR(6)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "comisi" NUMERIC(14,2),
  "tipper" VARCHAR(20),
  "codcta" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('faartpro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faartpro" IS '';


-----------------------------------------------------------------------------
-- faartpvp
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faartpvp" CASCADE;

DROP SEQUENCE IF EXISTS "faartpvp_seq";

CREATE SEQUENCE "faartpvp_seq";


CREATE TABLE "faartpvp"
(
  "codart" VARCHAR(20)  NOT NULL,
  "pvpart" NUMERIC(14,2),
  "despvp" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('faartpvp_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faartpvp" IS '';


-----------------------------------------------------------------------------
-- fabancos
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fabancos" CASCADE;

DROP SEQUENCE IF EXISTS "fabancos_seq";

CREATE SEQUENCE "fabancos_seq";


CREATE TABLE "fabancos"
(
  "codban" VARCHAR(20)  NOT NULL,
  "nomban" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fabancos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fabancos" IS '';


-----------------------------------------------------------------------------
-- facajcorrelat
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "facajcorrelat" CASCADE;

DROP SEQUENCE IF EXISTS "facajcorrelat_seq";

CREATE SEQUENCE "facajcorrelat_seq";


CREATE TABLE "facajcorrelat"
(
  "codcaj" VARCHAR(3)  NOT NULL,
  "codfac" VARCHAR(8)  NOT NULL,
  "tipo" VARCHAR(1)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('facajcorrelat_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "facajcorrelat" IS '';


-----------------------------------------------------------------------------
-- facladto
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "facladto" CASCADE;

DROP SEQUENCE IF EXISTS "facladto_seq";

CREATE SEQUENCE "facladto_seq";


CREATE TABLE "facladto"
(
  "loguse" VARCHAR(8)  NOT NULL,
  "descto" NUMERIC(6,2)  NOT NULL,
  "clave" VARCHAR(8)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('facladto_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "facladto" IS '';


-----------------------------------------------------------------------------
-- facontcte
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "facontcte" CASCADE;

DROP SEQUENCE IF EXISTS "facontcte_seq";

CREATE SEQUENCE "facontcte_seq";


CREATE TABLE "facontcte"
(
  "codcli" VARCHAR(10)  NOT NULL,
  "codcont" VARCHAR(10)  NOT NULL,
  "corrcon" VARCHAR(6)  NOT NULL,
  "nomcont" VARCHAR(50),
  "carcont" VARCHAR(30),
  "celcont" VARCHAR(30),
  "tf1cont" VARCHAR(30),
  "tf2cont" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('facontcte_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "facontcte" IS '';


-----------------------------------------------------------------------------
-- facorrelat
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "facorrelat" CASCADE;

DROP SEQUENCE IF EXISTS "facorrelat_seq";

CREATE SEQUENCE "facorrelat_seq";


CREATE TABLE "facorrelat"
(
  "corpre" NUMERIC(8)  NOT NULL,
  "corped" NUMERIC(8)  NOT NULL,
  "corfac" NUMERIC(8)  NOT NULL,
  "cornot" NUMERIC(8)  NOT NULL,
  "cordph" NUMERIC(8)  NOT NULL,
  "cordev" NUMERIC(8)  NOT NULL,
  "coraju" NUMERIC(8)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('facorrelat_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "facorrelat" IS '';


-----------------------------------------------------------------------------
-- fadefcom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadefcom" CASCADE;

DROP SEQUENCE IF EXISTS "fadefcom_seq";

CREATE SEQUENCE "fadefcom_seq";


CREATE TABLE "fadefcom"
(
  "codcom" VARCHAR(6),
  "nomcom" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fadefcom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadefcom" IS '';


-----------------------------------------------------------------------------
-- fadeflot
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadeflot" CASCADE;

DROP SEQUENCE IF EXISTS "fadeflot_seq";

CREATE SEQUENCE "fadeflot_seq";


CREATE TABLE "fadeflot"
(
  "codart" VARCHAR(20)  NOT NULL,
  "numlot" VARCHAR(25)  NOT NULL,
  "deslot" VARCHAR(50),
  "codalm" VARCHAR(6)  NOT NULL,
  "canlot" NUMERIC(14,2),
  "fecven" DATE,
  "coslot" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('fadeflot_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadeflot" IS '';


-----------------------------------------------------------------------------
-- fadescart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadescart" CASCADE;

DROP SEQUENCE IF EXISTS "fadescart_seq";

CREATE SEQUENCE "fadescart_seq";


CREATE TABLE "fadescart"
(
  "coddesc" VARCHAR(4)  NOT NULL,
  "refdoc" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "mondesc" NUMERIC(14,2),
  "mondetdesc" NUMERIC(14,2),
  "tipdoc" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fadescart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadescart" IS '';


-----------------------------------------------------------------------------
-- fadescom
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadescom" CASCADE;

DROP SEQUENCE IF EXISTS "fadescom_seq";

CREATE SEQUENCE "fadescom_seq";


CREATE TABLE "fadescom"
(
  "coddesc" VARCHAR(4)  NOT NULL,
  "moncom" NUMERIC(14,2),
  "codart" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fadescom_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadescom" IS '';


-----------------------------------------------------------------------------
-- fadetpre
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadetpre" CASCADE;

DROP SEQUENCE IF EXISTS "fadetpre_seq";

CREATE SEQUENCE "fadetpre_seq";


CREATE TABLE "fadetpre"
(
  "refpre" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "cansol" NUMERIC(14,2),
  "precio" NUMERIC(14,2),
  "mondesc" NUMERIC(14,2),
  "monrgo" NUMERIC(14,2),
  "totart" NUMERIC(14,2),
  "fecent" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fadetpre_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadetpre" IS '';


-----------------------------------------------------------------------------
-- fadevolu
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadevolu" CASCADE;

DROP SEQUENCE IF EXISTS "fadevolu_seq";

CREATE SEQUENCE "fadevolu_seq";


CREATE TABLE "fadevolu"
(
  "nrodev" VARCHAR(8)  NOT NULL,
  "fecdev" DATE  NOT NULL,
  "refdes" VARCHAR(8)  NOT NULL,
  "codtidev" VARCHAR(4)  NOT NULL,
  "codalm" VARCHAR(6)  NOT NULL,
  "desdev" VARCHAR(250),
  "stadph" VARCHAR(1),
  "mondev" NUMERIC(14,2)  NOT NULL,
  "obsdev" VARCHAR(250),
  "id" INTEGER  NOT NULL DEFAULT nextval('fadevolu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadevolu" IS '';


-----------------------------------------------------------------------------
-- fatipcte
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fatipcte" CASCADE;

DROP SEQUENCE IF EXISTS "fatipcte_seq";

CREATE SEQUENCE "fatipcte_seq";


CREATE TABLE "fatipcte"
(
  "nomtipcte" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fatipcte_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fatipcte" IS '';


-----------------------------------------------------------------------------
-- fadtocte
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadtocte" CASCADE;

DROP SEQUENCE IF EXISTS "fadtocte_seq";

CREATE SEQUENCE "fadtocte_seq";


CREATE TABLE "fadtocte"
(
  "fatipcte_id" INTEGER,
  "coddesc" VARCHAR(4)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fadtocte_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadtocte" IS '';


ALTER TABLE "fadtocte" ADD CONSTRAINT "fadtocte_FK_1" FOREIGN KEY ("fatipcte_id") REFERENCES "fatipcte" ("id");

-----------------------------------------------------------------------------
-- fafactur
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fafactur" CASCADE;

DROP SEQUENCE IF EXISTS "fafactur_seq";

CREATE SEQUENCE "fafactur_seq";


CREATE TABLE "fafactur"
(
  "reffac" VARCHAR(8)  NOT NULL,
  "fecfac" DATE  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "desfac" VARCHAR(255),
  "tipref" VARCHAR(2)  NOT NULL,
  "monfac" NUMERIC(14,2),
  "mondesc" NUMERIC(14,2),
  "codconpag" INTEGER,
  "numcom" VARCHAR(8),
  "reapor" VARCHAR(50),
  "fecanu" DATE,
  "status" VARCHAR(1),
  "observ" VARCHAR(500),
  "tipmon" VARCHAR(3),
  "valmon" NUMERIC(12,2),
  "numcomord" VARCHAR(8),
  "numcominv" VARCHAR(32),
  "sucursal" VARCHAR(50),
  "motanu" VARCHAR(250),
  "vuelto" NUMERIC(14,2),
  "codcaj" VARCHAR(10),
  "id" INTEGER  NOT NULL DEFAULT nextval('fafactur_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fafactur" IS '';


-----------------------------------------------------------------------------
-- fafecped
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fafecped" CASCADE;

DROP SEQUENCE IF EXISTS "fafecped_seq";

CREATE SEQUENCE "fafecped_seq";


CREATE TABLE "fafecped"
(
  "nroped" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "canent" NUMERIC(14,2),
  "canaju" NUMERIC(14,2),
  "fecent" DATE  NOT NULL,
  "fecaju" DATE,
  "stafec" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fafecped_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fafecped" IS '';


-----------------------------------------------------------------------------
-- fafordes
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fafordes" CASCADE;

DROP SEQUENCE IF EXISTS "fafordes_seq";

CREATE SEQUENCE "fafordes_seq";


CREATE TABLE "fafordes"
(
  "nomdes" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fafordes_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fafordes" IS '';


-----------------------------------------------------------------------------
-- faforpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faforpag" CASCADE;

DROP SEQUENCE IF EXISTS "faforpag_seq";

CREATE SEQUENCE "faforpag_seq";


CREATE TABLE "faforpag"
(
  "reffac" VARCHAR(8)  NOT NULL,
  "tippag" INTEGER  NOT NULL,
  "nropag" VARCHAR(3)  NOT NULL,
  "nomban" VARCHAR(50),
  "monpag" NUMERIC(14,2),
  "numero" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('faforpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faforpag" IS '';


-----------------------------------------------------------------------------
-- faforsol
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faforsol" CASCADE;

DROP SEQUENCE IF EXISTS "faforsol_seq";

CREATE SEQUENCE "faforsol_seq";


CREATE TABLE "faforsol"
(
  "nomsol" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('faforsol_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faforsol" IS '';


-----------------------------------------------------------------------------
-- famarca
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "famarca" CASCADE;

DROP SEQUENCE IF EXISTS "famarca_seq";

CREATE SEQUENCE "famarca_seq";


CREATE TABLE "famarca"
(
  "nommar" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('famarca_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "famarca" IS '';


-----------------------------------------------------------------------------
-- famovaju
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "famovaju" CASCADE;

DROP SEQUENCE IF EXISTS "famovaju_seq";

CREATE SEQUENCE "famovaju_seq";


CREATE TABLE "famovaju"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "numlot" VARCHAR(25),
  "canord" NUMERIC(14,2),
  "canaju" NUMERIC(14,2),
  "montot" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('famovaju_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "famovaju" IS '';


-----------------------------------------------------------------------------
-- fanotent
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fanotent" CASCADE;

DROP SEQUENCE IF EXISTS "fanotent_seq";

CREATE SEQUENCE "fanotent_seq";


CREATE TABLE "fanotent"
(
  "nronot" VARCHAR(8)  NOT NULL,
  "fecnot" DATE  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "tipref" VARCHAR(1)  NOT NULL,
  "codref" VARCHAR(8)  NOT NULL,
  "codalm" VARCHAR(6)  NOT NULL,
  "desnot" VARCHAR(250),
  "monnot" NUMERIC(14,2)  NOT NULL,
  "obsnot" VARCHAR(250),
  "tipnot" VARCHAR(1),
  "reapor" VARCHAR(50)  NOT NULL,
  "status" VARCHAR(1)  NOT NULL,
  "rifent" VARCHAR(15),
  "noment" VARCHAR(50),
  "fecanu" DATE,
  "autori" VARCHAR(1),
  "fecaut" DATE,
  "autpor" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('fanotent_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fanotent" IS '';


-----------------------------------------------------------------------------
-- fapedido
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fapedido" CASCADE;

DROP SEQUENCE IF EXISTS "fapedido_seq";

CREATE SEQUENCE "fapedido_seq";


CREATE TABLE "fapedido"
(
  "nroped" VARCHAR(8)  NOT NULL,
  "fecped" DATE  NOT NULL,
  "refped" VARCHAR(8),
  "tipref" VARCHAR(2)  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "desped" VARCHAR(250),
  "monped" NUMERIC(14,2),
  "obsped" VARCHAR(250),
  "reapor" VARCHAR(50)  NOT NULL,
  "status" VARCHAR(1),
  "fecanu" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('fapedido_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fapedido" IS '';


-----------------------------------------------------------------------------
-- faconpag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faconpag" CASCADE;

DROP SEQUENCE IF EXISTS "faconpag_seq";

CREATE SEQUENCE "faconpag_seq";


CREATE TABLE "faconpag"
(
  "desconpag" VARCHAR(255)  NOT NULL,
  "tipconpag" VARCHAR(1)  NOT NULL,
  "numdia" INTEGER  NOT NULL,
  "generaop" VARCHAR(1)  NOT NULL,
  "asiparrec" VARCHAR(1)  NOT NULL,
  "generacom" VARCHAR(1)  NOT NULL,
  "mercon" VARCHAR(20)  NOT NULL,
  "ctadev" VARCHAR(32)  NOT NULL,
  "ctavco" VARCHAR(32)  NOT NULL,
  "univta" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('faconpag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faconpag" IS '';


-----------------------------------------------------------------------------
-- fapresup
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fapresup" CASCADE;

DROP SEQUENCE IF EXISTS "fapresup_seq";

CREATE SEQUENCE "fapresup_seq";


CREATE TABLE "fapresup"
(
  "refpre" VARCHAR(8)  NOT NULL,
  "despre" VARCHAR(255),
  "fecpre" DATE  NOT NULL,
  "codcli" VARCHAR(10)  NOT NULL,
  "monpre" NUMERIC(14,2),
  "mondesc" NUMERIC(14,2),
  "monrgo" NUMERIC(14,2),
  "faconpag_id" INTEGER,
  "fafordes_id" INTEGER,
  "faforsol_id" INTEGER,
  "tipmon" VARCHAR(3),
  "valmon" NUMERIC(12,2),
  "autpor" VARCHAR(50),
  "observ" VARCHAR(500),
  "codubi" VARCHAR(30),
  "id" INTEGER  NOT NULL DEFAULT nextval('fapresup_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fapresup" IS '';


ALTER TABLE "fapresup" ADD CONSTRAINT "fapresup_FK_1" FOREIGN KEY ("faconpag_id") REFERENCES "faconpag" ("id");

ALTER TABLE "fapresup" ADD CONSTRAINT "fapresup_FK_2" FOREIGN KEY ("fafordes_id") REFERENCES "fafordes" ("id");

ALTER TABLE "fapresup" ADD CONSTRAINT "fapresup_FK_3" FOREIGN KEY ("faforsol_id") REFERENCES "faforsol" ("id");

-----------------------------------------------------------------------------
-- faproalt
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faproalt" CASCADE;

DROP SEQUENCE IF EXISTS "faproalt_seq";

CREATE SEQUENCE "faproalt_seq";


CREATE TABLE "faproalt"
(
  "codart" VARCHAR(20)  NOT NULL,
  "codalt" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('faproalt_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faproalt" IS '';


-----------------------------------------------------------------------------
-- fargoart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fargoart" CASCADE;

DROP SEQUENCE IF EXISTS "fargoart_seq";

CREATE SEQUENCE "fargoart_seq";


CREATE TABLE "fargoart"
(
  "codrgo" VARCHAR(4)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "refdoc" VARCHAR(8)  NOT NULL,
  "monrgo" NUMERIC(14,2),
  "tipdoc" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fargoart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fargoart" IS '';


-----------------------------------------------------------------------------
-- fasindto
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fasindto" CASCADE;

DROP SEQUENCE IF EXISTS "fasindto_seq";

CREATE SEQUENCE "fasindto_seq";


CREATE TABLE "fasindto"
(
  "coddes" VARCHAR(4)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fasindto_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fasindto" IS '';


-----------------------------------------------------------------------------
-- farecart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "farecart" CASCADE;

DROP SEQUENCE IF EXISTS "farecart_seq";

CREATE SEQUENCE "farecart_seq";


CREATE TABLE "farecart"
(
  "codrgo" VARCHAR(4)  NOT NULL,
  "codart" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('farecart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "farecart" IS '';


-----------------------------------------------------------------------------
-- fatipdev
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fatipdev" CASCADE;

DROP SEQUENCE IF EXISTS "fatipdev_seq";

CREATE SEQUENCE "fatipdev_seq";


CREATE TABLE "fatipdev"
(
  "nomtidev" VARCHAR(255)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fatipdev_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fatipdev" IS '';


-----------------------------------------------------------------------------
-- fatippag
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fatippag" CASCADE;

DROP SEQUENCE IF EXISTS "fatippag_seq";

CREATE SEQUENCE "fatippag_seq";


CREATE TABLE "fatippag"
(
  "destippag" VARCHAR(30)  NOT NULL,
  "tipcan" VARCHAR(1),
  "genmov" VARCHAR(1),
  "gening" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fatippag_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fatippag" IS '';


-----------------------------------------------------------------------------
-- fatiprec 14/01/09 ERIVERO: Se creo la tabla por error
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fatiprec" CASCADE;

DROP SEQUENCE IF EXISTS "fatiprec_seq";


-----------------------------------------------------------------------------
-- fatipvta
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fatipvta" CASCADE;

DROP SEQUENCE IF EXISTS "fatipvta_seq";

CREATE SEQUENCE "fatipvta_seq";


CREATE TABLE "fatipvta"
(
  "codtivta" VARCHAR(4)  NOT NULL,
  "nomtivta" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fatipvta_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fatipvta" IS '';


-----------------------------------------------------------------------------
-- fatipmov
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fatipmov" CASCADE;

DROP SEQUENCE IF EXISTS "fatipmov_seq";

CREATE SEQUENCE "fatipmov_seq";


CREATE TABLE "fatipmov"
(
  "desmov" VARCHAR(50)  NOT NULL,
  "nomabr" VARCHAR(4)  NOT NULL,
  "debcre" VARCHAR(1)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fatipmov_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fatipmov" IS '';


-----------------------------------------------------------------------------
-- famarart
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "famarart" CASCADE;

DROP SEQUENCE IF EXISTS "famarart_seq";

CREATE SEQUENCE "famarart_seq";


CREATE TABLE "famarart"
(
  "codmar" VARCHAR(6)  NOT NULL,
  "nommar" VARCHAR(100)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('famarart_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "famarart" IS '';


-----------------------------------------------------------------------------
-- fadefcaj
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadefcaj" CASCADE;

DROP SEQUENCE IF EXISTS "fadefcaj_seq";

CREATE SEQUENCE "fadefcaj_seq";


CREATE TABLE "fadefcaj"
(
  "descaj" VARCHAR(100)  NOT NULL,
  "corcaj" NUMERIC(8),
  "id" INTEGER  NOT NULL DEFAULT nextval('fadefcaj_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadefcaj" IS '';


-----------------------------------------------------------------------------
-- facliente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "facliente" CASCADE;

DROP SEQUENCE IF EXISTS "facliente_seq";

CREATE SEQUENCE "facliente_seq";


CREATE TABLE "facliente"
(
  "codpro" VARCHAR(15)  NOT NULL,
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
  "tipper" VARCHAR(1),
  "pagweb" VARCHAR(100),
  "telrepleg" VARCHAR(15),
  "correpleg" VARCHAR(100),
  "rifpercon" VARCHAR(15),
  "nompercon" VARCHAR(50),
  "dirpercon" VARCHAR(100),
  "telpercon" VARCHAR(15),
  "corpercon" VARCHAR(100),
  "fatipcte_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('facliente_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "facliente" IS '';


ALTER TABLE "facliente" ADD CONSTRAINT "facliente_FK_1" FOREIGN KEY ("fatipcte_id") REFERENCES "fatipcte" ("id");

-----------------------------------------------------------------------------
-- farecarg
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "farecarg" CASCADE;

DROP SEQUENCE IF EXISTS "farecarg_seq";

CREATE SEQUENCE "farecarg_seq";


CREATE TABLE "farecarg"
(
  "codrgo" VARCHAR(4)  NOT NULL,
  "nomrgo" VARCHAR(100),
  "codpre" VARCHAR(32)  NOT NULL,
  "tiprgo" VARCHAR(1)  NOT NULL,
  "monrgo" NUMERIC(14,2)  NOT NULL,
  "calcul" VARCHAR(1),
  "codcta" VARCHAR(32),
  "id" INTEGER  NOT NULL DEFAULT nextval('farecarg_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "farecarg" IS '';


-----------------------------------------------------------------------------
-- fadescto
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fadescto" CASCADE;

DROP SEQUENCE IF EXISTS "fadescto_seq";

CREATE SEQUENCE "fadescto_seq";


CREATE TABLE "fadescto"
(
  "coddesc" VARCHAR(4)  NOT NULL,
  "desdesc" VARCHAR(100),
  "tipdesc" VARCHAR(1)  NOT NULL,
  "mondesc" NUMERIC(14,2)  NOT NULL,
  "diasapl" NUMERIC(4)  NOT NULL,
  "codcta" VARCHAR(32),
  "tipret" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('fadescto_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fadescto" IS '';


-----------------------------------------------------------------------------
-- faajuste
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faajuste" CASCADE;

DROP SEQUENCE IF EXISTS "faajuste_seq";

CREATE SEQUENCE "faajuste_seq";


CREATE TABLE "faajuste"
(
  "refaju" VARCHAR(8)  NOT NULL,
  "tipaju" VARCHAR(2)  NOT NULL,
  "codref" VARCHAR(8)  NOT NULL,
  "fecaju" DATE,
  "desaju" VARCHAR(255),
  "codalm" VARCHAR(6),
  "monaju" NUMERIC(14,2),
  "obsaju" VARCHAR(255),
  "staaju" VARCHAR(1),
  "id" INTEGER  NOT NULL DEFAULT nextval('faajuste_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faajuste" IS '';


-----------------------------------------------------------------------------
-- fapais
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "fapais" CASCADE;

DROP SEQUENCE IF EXISTS "fapais_seq";

CREATE SEQUENCE "fapais_seq";


CREATE TABLE "fapais"
(
  "nompai" VARCHAR(20)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('fapais_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "fapais" IS '';


-----------------------------------------------------------------------------
-- faestado
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faestado" CASCADE;

DROP SEQUENCE IF EXISTS "faestado_seq";

CREATE SEQUENCE "faestado_seq";


CREATE TABLE "faestado"
(
  "fapais_id" INTEGER,
  "nomedo" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('faestado_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faestado" IS '';


ALTER TABLE "faestado" ADD CONSTRAINT "faestado_FK_1" FOREIGN KEY ("fapais_id") REFERENCES "fapais" ("id");

-----------------------------------------------------------------------------
-- faciudad
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "faciudad" CASCADE;

DROP SEQUENCE IF EXISTS "faciudad_seq";

CREATE SEQUENCE "faciudad_seq";


CREATE TABLE "faciudad"
(
  "faestado_id" INTEGER,
  "nomciu" VARCHAR(30)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('faciudad_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "faciudad" IS '';


ALTER TABLE "faciudad" ADD CONSTRAINT "faciudad_FK_1" FOREIGN KEY ("faestado_id") REFERENCES "faestado" ("id");

-----------------------------------------------------------------------------
-- farecpro
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "farecpro" CASCADE;

DROP SEQUENCE IF EXISTS "farecpro_seq";

CREATE SEQUENCE "farecpro_seq";


CREATE TABLE "farecpro"
(
  "codpro" VARCHAR(15)  NOT NULL,
  "codrec" VARCHAR(10)  NOT NULL,
  "fecent" DATE,
  "fecven" DATE,
  "id" INTEGER  NOT NULL DEFAULT nextval('farecpro_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "farecpro" IS '';


-----------------------------------------------------------------------------
-- farecaud 14/01/09 ERIVERO: Se creo la tabla por error
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "farecaud" CASCADE;

DROP SEQUENCE IF EXISTS "farecaud_seq" CASCADE;


-------------------------------------------------------------------------------------
  -- Vista que se creo para la Emision de Facturas
-------------------------------------------------------------------------------------
set search_path to "SIMA002";

CREATE VIEW faallbancos AS
(select nomcue as banco,numcue as ctaban, id as id
from tsdefban
UNION ALL
select nomban,codban,id
from fabancos
order by BANCO)


----Se agrego la tabla Fasinrgo
set search_path to "SIMA002";

DROP TABLE IF EXISTS "fasinrgo" CASCADE;

DROP SEQUENCE IF EXISTS "fasinrgo_seq";

CREATE SEQUENCE "fasinrgo_seq";

CREATE TABLE "SIMA002".fasinrgo
(
  "id" INTEGER  NOT NULL DEFAULT nextval('fasinrgo_seq'::regclass),
  codrgo character varying(4) NOT NULL, -- Código del Recargo:
  codart character varying(20) NOT NULL, -- Código del Artículo:
  CONSTRAINT i_fasinrgo PRIMARY KEY (codrgo, codart)
)
WITHOUT OIDS;
ALTER TABLE "SIMA002".fasinrgo OWNER TO postgres;
COMMENT ON TABLE "SIMA002".fasinrgo IS 'Artículos Exentos de Recargos';
COMMENT ON COLUMN "SIMA002".fasinrgo.codrgo IS 'Código del Recargo:';
COMMENT ON COLUMN "SIMA002".fasinrgo.codart IS 'Código del Artículo:';


--26/01/09 ERIVERO
-- Crear un nùmero de lote por defecto en la tabla empresa para ser utilizado en facturaciòn
alter table "SIMA002".empresa add numlot varchar(25);

update "SIMA002".empresa set numlot = '0001';

alter table "SIMA002".empresa alter column numlot set not null;


-- 28/01/09 ERIVERO
-- Se agrega el campo tipref (tipo de referencia) a la tabla de despachos
-- para poder realizar despachos de requisiciones, pedidos o facturas en el
-- módulo de facturación
alter table "SIMA002".cadphart add tipref varchar(1);

update "SIMA002".cadphart set tipref = 'R';

alter table "SIMA002".cadphart alter column tipref set NOT NULL;

--Se agrego la vista faallbancos para la forma de pago de la emision de factura 27/02/2009

-- View: ""SIMA002".faallbancos"

-- DROP VIEW "SIMA002".faallbancos;

CREATE OR REPLACE VIEW "SIMA002".faallbancos AS
 SELECT tsdefban.nomcue AS banco, tsdefban.numcue AS ctaban, tsdefban.id
   FROM "SIMA002".tsdefban
UNION ALL
 SELECT fabancos.nomban AS banco, fabancos.codban AS ctaban, fabancos.id
   FROM "SIMA002".fabancos
  ORDER BY 1;

ALTER TABLE "SIMA002".faallbancos OWNER TO postgres;
