

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

--CARLOS RAMIREZ
create SEQUENCE giregind_seq;

create table giregind (
  numuni     varchar(4)   not null,
  numindg    varchar(4)   not null,
  nomindg    varchar(40)  not null,
  estindg    varchar(1)   not null,
  id INTEGER  NOT NULL DEFAULT nextval('giregind_seq'::regclass) 
);

create SEQUENCE giproanu_seq;


create table giproanu (
  numindg    varchar(4) not null,
  anoindg    integer not null,
  revanoindg varchar(2) not null,
  numtrim     varchar(3) not null,
  progtrim    numeric(14,2) default 0,
  ejectrim    numeric(14,2) default 0,
  esttrim    varchar(1) not null,
  feccierre  date,
  id INTEGER  NOT NULL DEFAULT nextval('giproanu_seq'::regclass) 
);

   