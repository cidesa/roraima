ALTER TABLE "careqart"
  ADD COLUMN "nummemo" character varying(10),
  ADD COLUMN "justif" character varying(250);

ALTER TABLE "casolart"
  ADD COLUMN "codemp" character varying(16);

ALTER TABLE "cacotiza"
  ADD COLUMN "obscot" character varying(250);