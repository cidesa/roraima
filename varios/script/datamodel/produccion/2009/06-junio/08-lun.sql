--Carlos Ramirez
alter table nphojint
add column codnivedu varchar(4);

CREATE SEQUENCE npprimashijos_seq;

CREATE TABLE npprimashijos
(
  parfam character varying(4),
  edaddes numeric(2),
  edadhas numeric(2),
  monto numeric(14,2),
  estudios character varying(1),
  id INTEGER  NOT NULL DEFAULT nextval('npprimashijos_seq'::regclass)
)
WITH (OIDS=FALSE);
ALTER TABLE npprimashijos OWNER TO postgres;

CREATE SEQUENCE npprimaprofes_seq;

CREATE TABLE npprimaprofes
(
  grado numeric(2),
  prima numeric(14,2),
  id INTEGER  NOT NULL DEFAULT nextval('npprimaprofes_seq'::regclass)
)
WITH (OIDS=FALSE);
ALTER TABLE npprimaprofes OWNER TO postgres;

CREATE SEQUENCE npcargoscol_seq;

CREATE TABLE npcargoscol
(
  codcarcol varchar(16),
  descarcol varchar(100),
  prima numeric(14,2),
  id INTEGER  NOT NULL DEFAULT nextval('npcargoscol_seq'::regclass)
)
WITH (OIDS=FALSE);
ALTER TABLE npcargoscol OWNER TO postgres;

--CARLOS RAMIREZ
alter table npasiempcont
    add column fecdes date,
    add column fechas date,
    add column status varchar(1);