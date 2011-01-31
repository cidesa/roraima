

-- Tabla: Empresa
CREATE SEQUENCE "SIMA_USER".empresa_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA_USER".empresa_id_seq OWNER TO postgres;

ALTER TABLE "SIMA_USER".empresa ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA_USER".empresa_id_seq');


-- Tabla: Empresa (SIMA_USER)
CREATE SEQUENCE "SIMA004".empresa_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA004".empresa_id_seq OWNER TO postgres;

ALTER TABLE "SIMA004".empresa ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA004".empresa_id_seq');


-- Tabla: Usuarios
CREATE SEQUENCE "SIMA_USER".usuarios_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA_USER".usuarios_id_seq OWNER TO postgres;

ALTER TABLE "SIMA_USER".usuarios ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA_USER".usuarios_id_seq');
ALTER TABLE "SIMA_USER".usuarios ADD COLUMN codcat varchar(16);


-- Tabla: Usuarios
CREATE SEQUENCE "SIMA_USER".apli_user_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA_USER".apli_user_id_seq OWNER TO postgres;

ALTER TABLE "SIMA_USER".apli_user ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA_USER".apli_user_id_seq');


-- Tabla: Acunidad
CREATE SEQUENCE "SIMA004".acunidad_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA004".acunidad_id_seq OWNER TO postgres;

ALTER TABLE "SIMA004".acunidad ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA004".acunidad_id_seq');


-- Tabla: Cpdocprc
CREATE SEQUENCE "SIMA004".cpdocprc_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA004".cpdocprc_id_seq OWNER TO postgres;

ALTER TABLE "SIMA004".cpdocprc ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA004".cpdocprc_id_seq');

-- Tabla: Cpdoccom
CREATE SEQUENCE "SIMA004".cpdoccom_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA004".cpdoccom_id_seq OWNER TO postgres;

ALTER TABLE "SIMA004".cpdoccom ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA004".cpdoccom_id_seq');


-- Tabla: Cpdoccau
CREATE SEQUENCE "SIMA004".cpdoccau_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA004".cpdoccau_id_seq OWNER TO postgres;

ALTER TABLE "SIMA004".cpdoccau ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA004".cpdoccau_id_seq');


-- Tabla: Cpdocpag
CREATE SEQUENCE "SIMA004".cpdocpag_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

ALTER TABLE "SIMA004".cpdocpag_id_seq OWNER TO postgres;

ALTER TABLE "SIMA004".cpdocpag ADD COLUMN id int4 NOT NULL DEFAULT nextval('"SIMA004".cpdocpag_id_seq');


-- Nota el "004" es el numero del schema que estamos usando
--INSERT INTO "SIMA_USER".apli_user (codapl, loguse, codemp, nomopc, priuse) values('DF0','CIDESA         ','004','documentos','15');
--INSERT INTO "SIMA_USER".apli_user (codapl, loguse, codemp, nomopc, priuse) values('AC0','CIDESA         ','004','ciudadanos','15');


-- Estos inserts pueden ser usados para insertar los privilegios a los usuarios del cliente
--  por ejemplo, para darle privilegios a un usuario LHERNANDEZ, se debe colocar de la siguiente manera:

--INSERT INTO "SIMA_USER".apli_user (codapl, loguse, codemp, nomopc, priuse) values('DC0','LHERNANDEZ','XXX','documentos','15');
--INSERT INTO "SIMA_USER".apli_user (codapl, loguse, codemp, nomopc, priuse) values('DC0','LHERNANDEZ','XXX','menu','15');
--INSERT INTO "SIMA_USER".apli_user (codapl, loguse, codemp, nomopc, priuse) values('DC0','LHERNANDEZ','XXX','herramientas','15');

-- Donde LHERNANDEZ debe ser un usuario existente en els istema, y XXX representa el schema al que se conecta el sistema.



