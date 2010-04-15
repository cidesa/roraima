-- SQL Manager 2005 for PostgreSQL 3.3.0.1
-- ---------------------------------------
-- Host     : localhost
-- Database : fonden


SET search_path = "SIMA_USER", pg_catalog;
--
-- Data for blobs (OID = 74979) (LIMIT 0,17)
--
DELETE FROM apli_emp;

INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'FC0', 1);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('002', 'CF0', 2);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'CT0', 3);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'CA0', 4);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'CP0', 5);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'BE0', 6);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'NP0', 7);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'TS0', 8);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'BN0', 9);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'DBA', 10);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'CF0', 11);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'BEO', 12);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'IN0', 13);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'CI0', 14);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'PI0', 15);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'CR0', 16);
INSERT INTO apli_emp (codemp, codapl, id) VALUES ('001', 'FH0', 17);
--
-- Data for blobs (OID = 74982) (LIMIT 0,163)
--
DELETE FROM apli_user;

INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('BN0', 'CIDESA', '002', 'nomina', 15, 1477);
INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('BN0', 'CIDESA', '002', 'contabilidad', 15, 1478);
INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('BN0', 'CIDESA', '002', 'presupuesto', 15, 1479);
INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('BN0', 'CIDESA', '002', 'bienes', 15, 1480);
INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('BN0', 'CIDESA', '002', 'formulacion', 15, 1481);
INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('BN0', 'CIDESA', '002', 'tesoreria', 15, 1482);
INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('BN0', 'CIDESA', '002', 'documentos', 15, 1483);
INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('CP0', 'CIDESA', '002', 'admin', 15, 8996);
INSERT INTO apli_user (codapl, loguse, codemp, nomopc, priuse, id) VALUES ('CPO', 'CIDESA', '002', 'menu', 15, 1);
--
-- Data for blobs (OID = 75077) (LIMIT 0,7)
--
DELETE FROM usuarios;

INSERT INTO usuarios (loguse, nomuse, apluse, numemp, pasuse, diremp, telemp, cedemp, numuni, codcat, id) VALUES ('SYSTEM', 'USUARIO DBA', 'DBA', '001', 'manager', NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO usuarios (loguse, nomuse, apluse, numemp, pasuse, diremp, telemp, cedemp, numuni, codcat, id) VALUES ('CIDESA', 'cidesa', '', '', 'cidesa', '', '', '', '', '', 103);
--
-- Data for sequence "SIMA_USER".apli_user_id_seq (OID = 74985)
--
SELECT pg_catalog.setval('apli_user_id_seq', 9006, true);
