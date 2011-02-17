
ALTER TABLE "contaba" ALTER unidad TYPE character varying(10);
        
ALTER TABLE "contaba" ALTER corcomp TYPE character varying(100);
        
ALTER TABLE "contabc" ADD "loguse" VARCHAR(50);
        
ALTER TABLE "contabc" ADD "usuanu" VARCHAR(50);
        
-----------------------------------------------------------------------------
-- codefcencos
-----------------------------------------------------------------------------

CREATE SEQUENCE "codefcencos_seq";


CREATE TABLE "codefcencos"
(
  "codcencos" VARCHAR(32)  NOT NULL,
  "descencos" VARCHAR(500)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('codefcencos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "codefcencos" IS '';


COMMENT ON COLUMN "codefcencos"."id" IS 'Identificador Único del registro';

-----------------------------------------------------------------------------
-- codetcencos
-----------------------------------------------------------------------------

CREATE SEQUENCE "codetcencos_seq";


CREATE TABLE "codetcencos"
(
  "numcom" VARCHAR(8)  NOT NULL,
  "codcta" VARCHAR(32)  NOT NULL,
  "codcencos" VARCHAR(32)  NOT NULL,
  "moncencos" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('codetcencos_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "codetcencos" IS '';


COMMENT ON COLUMN "codetcencos"."id" IS 'Identificador Único del registro';
