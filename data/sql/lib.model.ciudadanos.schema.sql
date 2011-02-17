
-----------------------------------------------------------------------------
-- atmisiones
-----------------------------------------------------------------------------

CREATE SEQUENCE "atmisiones_seq";


CREATE TABLE "atmisiones"
(
  "desmis" VARCHAR(50)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('atmisiones_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atmisiones" IS '';


ALTER TABLE "atciudadano" ADD "segpri" BOOLEAN;
        
ALTER TABLE "atciudadano" ADD "seguro" VARCHAR(50);
        
ALTER TABLE "atciudadano" ADD "attipproviv_id" INTEGER;
        
ALTER TABLE "atciudadano" ADD "attipviv_id" INTEGER;
        
ALTER TABLE "atciudadano" ADD "sector" VARCHAR(50);
        
ALTER TABLE "atciudadano" ADD "urbanizacion" VARCHAR(50);
        
ALTER TABLE "atciudadano" ADD "zona" VARCHAR(50);
        
ALTER TABLE "atciudadano" ADD "atmisiones_id" INTEGER;
        
ALTER TABLE "atestsoceco" ADD "motvis" VARCHAR(5000);
        
ALTER TABLE "atestsoceco" ADD "parfri" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "parintext" VARCHAR(1);
        
ALTER TABLE "atestsoceco" ADD "obspar" VARCHAR(1000);
        
ALTER TABLE "atestsoceco" ADD "parsinfri" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "parsinintext" VARCHAR(1);
        
ALTER TABLE "atestsoceco" ADD "parmad" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "parzin" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "parmatdes" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "suecemrus" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "suecempul" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "suetie" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "suecer" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "suegra" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "suepar" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "suelin" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "obssue" VARCHAR(1000);
        
ALTER TABLE "atestsoceco" ADD "teczin" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "tecmatdes" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "tecace" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "teccar" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "tectej" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "tecado" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "obstec" VARCHAR(1000);
        
ALTER TABLE "atestsoceco" ADD "vivnroamb" INTEGER;
        
ALTER TABLE "atestsoceco" ADD "vivnrohab" INTEGER;
        
ALTER TABLE "atestsoceco" ADD "vivnroban" INTEGER;
        
ALTER TABLE "atestsoceco" ADD "bandenviv" INTEGER;
        
ALTER TABLE "atestsoceco" ADD "banfueviv" INTEGER;
        
ALTER TABLE "atestsoceco" ADD "vivlet" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivwat" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivotr" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivduc" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivlav" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivpar" VARCHAR(100);
        
ALTER TABLE "atestsoceco" ADD "vivpis" VARCHAR(100);
        
ALTER TABLE "atestsoceco" ADD "vivsal" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivcom" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivsalcom" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivcocdenviv" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "vivcocfueviv" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "viaaccvivasf" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "viaaccvivtie" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "viaaccvivesc" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "tramet" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "trafer" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "tracam" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "trajee" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "tralan" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "trabar" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "tracami" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "agufredia" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "agufreint" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "agufresem" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "agufre15d" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "aguportub" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "agupordep" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "aguserdes" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "aguserpoz" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "aseurbdia" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "aseurbint" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "aseurbsem" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "aseurb15d" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "elepag" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "elepar" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "gasbom" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "gasdir" BOOLEAN;
        
ALTER TABLE "atestsoceco" ADD "toting" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egrviv" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egrtra" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egredu" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egrali" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egrtel" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egrluzase" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egragu" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egrgas" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "egrotr" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "totegr" NUMERIC(14,2);
        
ALTER TABLE "atestsoceco" ADD "diasoc" VARCHAR(5000);
        
ALTER TABLE "atestsoceco" ADD "trasoc" VARCHAR(5000);
        
ALTER TABLE "atestsoceco" ADD "recome" VARCHAR(5000);
        
ALTER TABLE "atestsoceco" ADD "observ" VARCHAR(5000);
        
ALTER TABLE "atayudas" ADD "atunidades_id" INTEGER;
        
ALTER TABLE "atdonaciones" ALTER coddon TYPE character varying(50);
        
ALTER TABLE "atmedico" ADD "nrocolmed" VARCHAR(25);
        
-----------------------------------------------------------------------------
-- atdetest
-----------------------------------------------------------------------------

CREATE SEQUENCE "atdetest_seq";


CREATE TABLE "atdetest"
(
  "atayudas_id" INTEGER,
  "atestayu_desde" INTEGER,
  "atestayu_hasta" INTEGER,
  "usuario" VARCHAR(100),
  "created_at" TIMESTAMP,
  "id" INTEGER  NOT NULL DEFAULT nextval('atdetest_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atdetest" IS '';

