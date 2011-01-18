
ALTER TABLE "bnsegmue" ALTER nrosegmue TYPE character varying(6);
        
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

ALTER TABLE "caartord" ALTER codcat TYPE character varying(16);
        
ALTER TABLE "cadettra" ALTER numlot TYPE character varying;
        
ALTER TABLE "cadetent" ALTER numlot TYPE character varying;
        
ALTER TABLE "cadetsal" ALTER numlot TYPE character varying;
        