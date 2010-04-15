--CARLOS RAMIREZ
CREATE SEQUENCE "nptipcat_seq";

CREATE TABLE nptipcat
(
  codtipcat character varying(4) NOT NULL,
  destipcat character varying(100) NOT NULL,
  id integer NOT NULL DEFAULT nextval('nptipcat_seq'::regclass)
)
WITH (OIDS=FALSE);
ALTER TABLE nptipcat OWNER TO postgres;

alter table npcomocp
  alter column gracar type varchar(20),
  alter column pascar type varchar(20);

--CARLOS RAMIREZ  
alter table npasicaremp
  add column codtipded  varchar(4),
  add column codtipcat varchar(20);  
