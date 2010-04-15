--Definicion de Articulos
ALTER TABLE "cadefart"
  ADD COLUMN "tipdocpre" varchar(4);


--- // Jesus Nomina
ALTER TABLE "npinffam"
  ADD COLUMN "ocupac" varchar(1);

--Se aumento el campo a 16
alter table nphojint
alter column codempant type VARCHAR(16);

ALTER TABLE "nphojint"
  ADD COLUMN "ubifis" varchar(100);
---
