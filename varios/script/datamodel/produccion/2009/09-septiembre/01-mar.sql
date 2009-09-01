--Requerimiento Barcelona Ing. Rene Bracho
ALTER TABLE "catproter"
  ADD COLUMN "esmunicipal" VARCHAR(1);

ALTER TABLE catdefaval
  ADD COLUMN fecaval date;

ALTER TABLE "catnivcat"
  ADD COLUMN "essector" VARCHAR(1);