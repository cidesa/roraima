--Formulario Tipo de Retenciones
ALTER TABLE optipret ADD CONSTRAINT unique_optipret_codtip UNIQUE (codtip);
ALTER TABLE "opretord" ADD CONSTRAINT "opretord_FK_1" FOREIGN KEY ("codtip") REFERENCES "optipret" ("codtip");

ALTER TABLE "ocdefemp"
  ADD COLUMN numini character varying(10);

ALTER TABLE "ocregobr"
  ADD COLUMN fecreg date;