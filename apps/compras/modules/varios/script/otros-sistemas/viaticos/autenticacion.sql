--  20/01/2009
--  Tomar en cuenta
--  Esquema: 002
--  Usuario: CIDESA
set search_path to "SIMA_USER";


INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse) VALUES ('VI0', 'CIDESA', '002', 'viaticos', 15);

INSERT INTO apli_emp (codemp, codapl) VALUES ('001', 'VI0');

insert into aplicacion (codapl,nomuse,nomapl,aplact,aplpri,nomyml) values ('VI0','SIMA_VI0','Viaticos','S','S','viaticos.yml');
