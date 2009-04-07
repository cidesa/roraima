
-----------------------------------------------------------------------------
-- viaregtiptab
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viaregtiptab" CASCADE;

DROP SEQUENCE IF EXISTS "viaregtiptab_seq";

CREATE SEQUENCE "viaregtiptab_seq";


CREATE TABLE "viaregtiptab"
(
  "destiptab" VARCHAR(254)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('viaregtiptab_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viaregtiptab" IS '';


-----------------------------------------------------------------------------
-- viaregtipser
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viaregtipser" CASCADE;

DROP SEQUENCE IF EXISTS "viaregtipser_seq";

CREATE SEQUENCE "viaregtipser_seq";


CREATE TABLE "viaregtipser"
(
  "destipser" VARCHAR(254)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('viaregtipser_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viaregtipser" IS '';


-----------------------------------------------------------------------------
-- viadettipser
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viadettipser" CASCADE;

DROP SEQUENCE IF EXISTS "viadettipser_seq";

CREATE SEQUENCE "viadettipser_seq";


CREATE TABLE "viadettipser"
(
  "montoeur" NUMERIC(12,2),
  "montodol" NUMERIC(12,2),
  "montobs" NUMERIC(12,2),
  "viaregtiptab_id" INTEGER,
  "occiudad_id" INTEGER,
  "viaregtipser_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('viadettipser_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viadettipser" IS '';


ALTER TABLE "viadettipser" ADD CONSTRAINT "viadettipser_FK_1" FOREIGN KEY ("viaregtiptab_id") REFERENCES "viaregtiptab" ("id");

ALTER TABLE "viadettipser" ADD CONSTRAINT "viadettipser_FK_2" FOREIGN KEY ("occiudad_id") REFERENCES "occiudad" ("id");

ALTER TABLE "viadettipser" ADD CONSTRAINT "viadettipser_FK_3" FOREIGN KEY ("viaregtipser_id") REFERENCES "viaregtipser" ("id");

-----------------------------------------------------------------------------
-- viaregente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viaregente" CASCADE;

DROP SEQUENCE IF EXISTS "viaregente_seq";

CREATE SEQUENCE "viaregente_seq";


CREATE TABLE "viaregente"
(
  "cedrif" VARCHAR(20)  NOT NULL,
  "desente" VARCHAR(100)  NOT NULL,
  "nacent" VARCHAR(1)  NOT NULL,
  "tipent" VARCHAR(1)  NOT NULL,
  "dirente" VARCHAR(254),
  "telente" VARCHAR(50),
  "corente" VARCHAR(50),
  "actecoente" VARCHAR(254),
  "id" INTEGER  NOT NULL DEFAULT nextval('viaregente_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viaregente" IS '';


-----------------------------------------------------------------------------
-- viaciuente
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viaciuente" CASCADE;

DROP SEQUENCE IF EXISTS "viaciuente_seq";

CREATE SEQUENCE "viaciuente_seq";


CREATE TABLE "viaciuente"
(
  "occiudad_id" INTEGER,
  "viaregente_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('viaciuente_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viaciuente" IS '';


ALTER TABLE "viaciuente" ADD CONSTRAINT "viaciuente_FK_1" FOREIGN KEY ("occiudad_id") REFERENCES "occiudad" ("id");

ALTER TABLE "viaciuente" ADD CONSTRAINT "viaciuente_FK_2" FOREIGN KEY ("viaregente_id") REFERENCES "viaregente" ("id");

-----------------------------------------------------------------------------
-- viaregact
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viaregact" CASCADE;

DROP SEQUENCE IF EXISTS "viaregact_seq";

CREATE SEQUENCE "viaregact_seq";


CREATE TABLE "viaregact"
(
  "desact" VARCHAR(254)  NOT NULL,
  "id" INTEGER  NOT NULL DEFAULT nextval('viaregact_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viaregact" IS '';


-----------------------------------------------------------------------------
-- viaregsolvia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viaregsolvia" CASCADE;

DROP SEQUENCE IF EXISTS "viaregsolvia_seq";

CREATE SEQUENCE "viaregsolvia_seq";


CREATE TABLE "viaregsolvia"
(
  "cedemp" VARCHAR(16)  NOT NULL,
  "refcom" VARCHAR(8)  NOT NULL,
  "codpre" VARCHAR(32)  NOT NULL,
  "tipcom" VARCHAR(4)  NOT NULL,
  "fecha" DATE  NOT NULL,
  "descr" VARCHAR(254),
  "viaregtiptab_id" INTEGER,
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('viaregsolvia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viaregsolvia" IS '';


ALTER TABLE "viaregsolvia" ADD CONSTRAINT "viaregsolvia_FK_1" FOREIGN KEY ("viaregtiptab_id") REFERENCES "viaregtiptab" ("id");

-----------------------------------------------------------------------------
-- viaregdetsolvia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viaregdetsolvia" CASCADE;

DROP SEQUENCE IF EXISTS "viaregdetsolvia_seq";

CREATE SEQUENCE "viaregdetsolvia_seq";


CREATE TABLE "viaregdetsolvia"
(
  "viaregsolvia_id" INTEGER,
  "viaregente_id" INTEGER,
  "viaregact_id" INTEGER,
  "occiudad_id" INTEGER,
  "codmon" VARCHAR(3),
  "valmon" NUMERIC(14,2),
  "fecha_sal" DATE  NOT NULL,
  "fecha_reg" DATE  NOT NULL,
  "num_dia" NUMERIC(2),
  "monto" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('viaregdetsolvia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viaregdetsolvia" IS '';


ALTER TABLE "viaregdetsolvia" ADD CONSTRAINT "viaregdetsolvia_FK_1" FOREIGN KEY ("viaregsolvia_id") REFERENCES "viaregsolvia" ("id");

ALTER TABLE "viaregdetsolvia" ADD CONSTRAINT "viaregdetsolvia_FK_2" FOREIGN KEY ("viaregente_id") REFERENCES "viaregente" ("id");

ALTER TABLE "viaregdetsolvia" ADD CONSTRAINT "viaregdetsolvia_FK_3" FOREIGN KEY ("viaregact_id") REFERENCES "viaregact" ("id");

ALTER TABLE "viaregdetsolvia" ADD CONSTRAINT "viaregdetsolvia_FK_4" FOREIGN KEY ("occiudad_id") REFERENCES "occiudad" ("id");

-----------------------------------------------------------------------------
-- viaregdetgassolvia
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viaregdetgassolvia" CASCADE;

DROP SEQUENCE IF EXISTS "viaregdetgassolvia_seq";

CREATE SEQUENCE "viaregdetgassolvia_seq";


CREATE TABLE "viaregdetgassolvia"
(
  "viaregdetsolvia_id" INTEGER,
  "viaregtipser_id" INTEGER,
  "detgasmont" NUMERIC(14,2),
  "id" INTEGER  NOT NULL DEFAULT nextval('viaregdetgassolvia_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viaregdetgassolvia" IS '';


ALTER TABLE "viaregdetgassolvia" ADD CONSTRAINT "viaregdetgassolvia_FK_1" FOREIGN KEY ("viaregdetsolvia_id") REFERENCES "viaregdetsolvia" ("id");

ALTER TABLE "viaregdetgassolvia" ADD CONSTRAINT "viaregdetgassolvia_FK_2" FOREIGN KEY ("viaregtipser_id") REFERENCES "viaregtipser" ("id");

-----------------------------------------------------------------------------
-- viadettabcar
-----------------------------------------------------------------------------

DROP TABLE IF EXISTS "viadettabcar" CASCADE;

DROP SEQUENCE IF EXISTS "viadettabcar_seq";

CREATE SEQUENCE "viadettabcar_seq";


CREATE TABLE "viadettabcar"
(
  "viaregtiptab_id" INTEGER,
  "codcar" VARCHAR(16),
  "id" INTEGER  NOT NULL DEFAULT nextval('viadettabcar_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viadettabcar" IS '';


ALTER TABLE "viadettabcar" ADD CONSTRAINT "viadettabcar_FK_1" FOREIGN KEY ("viaregtiptab_id") REFERENCES "viaregtiptab" ("id");
