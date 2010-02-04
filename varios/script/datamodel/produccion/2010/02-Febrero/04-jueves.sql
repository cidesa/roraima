--CARLOS RAMIREZ
--SE AGREGO LA FRECUENCIA PARA LOS CORRELATIVOS DE LA FORMA DE INCAPACIDADES
CREATE SEQUENCE npincapa_correl
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 8
  CACHE 1;
ALTER TABLE npincapa_correl OWNER TO postgres;

--CARLOS RAMIREZ
alter table npcargos
  add column canmix numeric(6,0);

  
--CARLOS RAMIREZ
--PRESTACIONES REALIZADO EN NOVIEMBRE PERO NO SE HABIA SUBIDO AL REPOSITORIO
alter table npvacdefgen
  add column vacant varchar(1);  
alter table npvacsalidas
  add column fecsalnom date,
  add column fecreinom date,
  add column sabvac integer,
  add column domvac integer,
  add column fervac integer;  

alter table nphojint 
  add column numpuncue varchar(20)  ;  
  