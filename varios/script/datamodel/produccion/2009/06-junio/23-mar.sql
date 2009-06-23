--CARLOS RAMIREZ
CREATE SEQUENCE npdefespparpre_seq;

CREATE TABLE  npdefespparpre (
  codnom varchar(3),
  numdiames integer,
  numdiamaxano integer,
  id integer NOT NULL DEFAULT nextval('npdefespparpre_seq'::regclass)
);alter table npdefespparpre owner to postgres;


