ALTER TABLE "careqart"
  ADD COLUMN "nummemo" character varying(10),
  ADD COLUMN "justif" character varying(250);

ALTER TABLE "casolart"
  ADD COLUMN "codemp" character varying(16);

ALTER TABLE "cacotiza"
  ADD COLUMN "obscot" character varying(250);

  ALTER TABLE "opfactur"
  ADD COLUMN "basirs" numeric(18,2),
  ADD COLUMN "porirs" numeric(18,2),
  ADD COLUMN "monirs" numeric(18,2),
  ADD COLUMN "codirs" character varying(50);