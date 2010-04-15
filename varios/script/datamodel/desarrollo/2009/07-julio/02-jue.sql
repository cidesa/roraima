--CARLOS RAMIREZ
create SEQUENCE npjuzgados_seq;

create table NPJUZGADOS(
        CODJUZ    VARCHAR(4) NOT NULL,
        DESJUZ    VARCHAR(100),
        PERCONJUZ VARCHAR(100),
        CARPERJUZ VARCHAR(100),                
        DIRJUZ    VARCHAR(200),
        TELJUZ    VARCHAR(100),        
	id integer NOT NULL DEFAULT nextval('npjuzgados_seq'::regclass)
        );
ALTER TABLE npjuzgados OWNER TO postgres;
  
-- Add comments to the columns 
comment on column NPJUZGADOS.CODJUZ   is 'Código del Juzgado';
comment on column NPJUZGADOS.DESJUZ   is 'Descripción del Juzgado';
comment on column NPJUZGADOS.PERCONJUZ  is 'Persona Contacto del Juzgado';
comment on column NPJUZGADOS.CARPERJUZ   is 'Cargo de la Persona Contacto del Juzgado';
comment on column NPJUZGADOS.DIRJUZ   is 'Dirección del Juzgado';
comment on column NPJUZGADOS.TELJUZ   is 'Teléfono del Juzgado';