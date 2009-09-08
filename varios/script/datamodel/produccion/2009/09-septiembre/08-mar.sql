--Requerimientos SUVINCA Benjamin Acevedo

ALTER TABLE "faartfac"
  ADD COLUMN "desart" VARCHAR(1500),
  ADD COLUMN "nronot" VARCHAR(8)  ;

ALTER TABLE "cadefart"
  ADD COLUMN "cornac" integer,
  ADD COLUMN "corext" integer;