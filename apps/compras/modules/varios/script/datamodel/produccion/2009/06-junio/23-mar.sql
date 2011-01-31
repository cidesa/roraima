--CARLOS RAMIREZ
CREATE SEQUENCE npdefespparpre_seq;

CREATE TABLE  npdefespparpre (
  codnom varchar(3),
  numdiames integer,
  numdiamaxano integer,
  id integer NOT NULL DEFAULT nextval('npdefespparpre_seq'::regclass)
);alter table npdefespparpre owner to postgres;

CREATE SEQUENCE nppernom_seq;

CREATE TABLE  nppernom(
   codnom varchar(3),
   anno integer,
   mes varchar(2),
   fecini date,
   fecfin date,
   id integer NOT NULL DEFAULT nextval('nppernom_seq'::regclass)
);

--Bienes
alter table BNUBIBIE
  add column codubiadm VARCHAR(30);


alter table BNREGMUE
  add column codresuso VARCHAR(10),
  add column codrespat VARCHAR(10);