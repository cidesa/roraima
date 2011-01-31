--CARLOS RAMIREZ
create sequence npestemp_seq;

create table npestemp(
   codestemp varchar(1) not null,
   desestemp varchar(100) not null,
   id integer not null default nextval('npestemp_seq'::regclass)
);