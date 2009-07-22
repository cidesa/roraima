alter table npestorg
  add column email varchar(40);

--- // Jesus Nomina
ALTER TABLE "npinffam"
  ADD COLUMN "ocupac" varchar(1);

--Se aumento el campo a 16
alter table nphojint
alter column codempant type VARCHAR(16);

ALTER TABLE "nphojint"
  ADD COLUMN "ubifis" varchar(100);
---

--Matriz de Nómina CONACAL Desireé Martínez
ALTER TABLE "nphojint"
  ADD COLUMN "numcueaho" VARCHAR(31),
    ADD COLUMN "tipcueaho" VARCHAR(20);
--------