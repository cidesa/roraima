
ALTER TABLE "cpadidis" ADD "loguse" VARCHAR(50);
        
ALTER TABLE "cpasiini" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpasiini" ALTER nompre TYPE character varying(500);
        
ALTER TABLE "cpcompro" ADD "codubi" VARCHAR(30);
        
ALTER TABLE "cpcompro" ADD "motrec" VARCHAR(1000);
        
ALTER TABLE "cpcompro" ADD "loguse" VARCHAR(50);
        
ALTER TABLE "cpdefniv" ADD "conpar" NUMERIC(2);
        
ALTER TABLE "cpdeftit" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpdeftit" ALTER nompre TYPE character varying(500);
        
ALTER TABLE "cpdisfuefin" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpimpcau" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpimpcom" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpimppag" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpimpprc" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpmovadi" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpmovaju" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpartley" ADD "portra" NUMERIC(14,2);
        
ALTER TABLE "cpsolmovadi" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cpsolmovtra" ALTER codori TYPE character varying(50);
        
ALTER TABLE "cpsolmovtra" ALTER coddes TYPE character varying(50);
        
ALTER TABLE "cpmovfuefin" ALTER codpre TYPE character varying(50);
        
ALTER TABLE "cptrasla" ADD "loguse" VARCHAR(50);
        
ALTER TABLE "cpmovtra" ALTER codori TYPE character varying(50);
        
ALTER TABLE "cpmovtra" ALTER coddes TYPE character varying(50);
        
-----------------------------------------------------------------------------
-- cpcontra
-----------------------------------------------------------------------------

CREATE SEQUENCE "cpcontra_seq";


CREATE TABLE "cpcontra"
(
  "codparma" VARCHAR(16)  NOT NULL,
  "codparde" VARCHAR(16)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('cpcontra_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "cpcontra" IS '';


COMMENT ON COLUMN "cpcontra"."id" IS 'Identificador Único del registro';
