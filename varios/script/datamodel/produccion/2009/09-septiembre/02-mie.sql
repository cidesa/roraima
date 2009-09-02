

CREATE SEQUENCE "atpriayu_seq";


CREATE TABLE "atpriayu"
(
  "despriayu" VARCHAR(50),
  "id" INTEGER  NOT NULL DEFAULT nextval('atpriayu_seq'::regclass),
  PRIMARY KEY ("id")
);

COMMENT ON TABLE "atpriayu" IS '';

--ajuste campo codcli

ALTER TABLE fafactur
   ALTER codcli TYPE character varying(15);

ALTER TABLE cobdocume
   ALTER codcli TYPE character varying(15);