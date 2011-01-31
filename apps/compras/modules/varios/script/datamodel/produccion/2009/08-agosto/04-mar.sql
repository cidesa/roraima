---Jesus Lobaton
---Correlativos para Muebles
 ALTER TABLE "bndefins"
  ADD COLUMN "corrmue" integer;

--biedefemp

ALTER TABLE "bndefins"
  ADD COLUMN "codinc" varchar(2);

--Bienes
alter table BNUBIBIE
  add column codubiadm VARCHAR(30);

alter table BNREGMUE
  add column codresuso VARCHAR(10),
  add column codrespat VARCHAR(10);

alter table bndefins alter column coddes type  varchar(10);
alter table bndefins alter column codinc type  varchar(10);
---

