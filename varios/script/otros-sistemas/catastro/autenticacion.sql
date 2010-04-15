--  20/01/2009
--  Tomar en cuenta
--  Esquema: 002
--  Usuario: CIDESA
set search_path to "SIMA_USER";


INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse) VALUES ('CA0', 'CIDESA', '002', 'catastro', 15);

INSERT INTO apli_emp (codemp, codapl) VALUES ('001', 'CA0');

insert into aplicacion (codapl,nomuse,nomapl,aplact,aplpri,nomyml) values ('CA0','SIMA_CA0','Catastro','S','S','catastro.yml');
