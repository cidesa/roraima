
-----------------------------------------------------------------------------
-- viaregtiptab
-----------------------------------------------------------------------------

DROP TABLE "viaregtiptab" CASCADE;

DROP SEQUENCE "viaregtiptab_seq";

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

DROP TABLE "viaregtipser" CASCADE;

DROP SEQUENCE "viaregtipser_seq";

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

DROP TABLE "viadettipser" CASCADE;

DROP SEQUENCE "viadettipser_seq";

CREATE SEQUENCE "viadettipser_seq";


CREATE TABLE "viadettipser"
(
  "monto" NUMERIC(12,2)  NOT NULL,
  "viaregtiptab_id" INTEGER,
  "viaregtipser_id" INTEGER,
  "id" INTEGER  NOT NULL DEFAULT nextval('viadettipser_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "viadettipser" IS '';


ALTER TABLE "viadettipser" ADD CONSTRAINT "viadettipser_FK_1" FOREIGN KEY ("viaregtiptab_id") REFERENCES "viaregtiptab" ("id");

ALTER TABLE "viadettipser" ADD CONSTRAINT "viadettipser_FK_2" FOREIGN KEY ("viaregtipser_id") REFERENCES "viaregtipser" ("id");
