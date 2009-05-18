SET SEARCH_PATH TO "SIMA002";

delete from FORCORMUN;
delete from FORCORPAR;
delete from FORCORSUBOBJ;
delete from FORCORSUBSEC;
delete from FORCORSUBSUBOBJ;
delete from FORDEFEJEDES;
delete from FORDEFEQU;
delete from FORDEFEST;
delete from FORDEFMUN;
delete from FORDEFOBJESTNVAETA;
delete from FORDEFPAR;
delete from FORDEFSEC;
delete from FORDEFSITPRE;
delete from FORDEFSTA;
delete from FORDEFSUBOBJ;
delete from FORDEFSUBSEC;
delete from FORDEFSUBSUBOBJ;
delete from FORDEFTIPCNX;


insert into FORCORMUN (CODEST, CORMUN)
values ('0001', 7);
insert into FORCORMUN (CODEST, CORMUN)
values ('0002', 20);
insert into FORCORMUN (CODEST, CORMUN)
values ('0003', 7);
insert into FORCORMUN (CODEST, CORMUN)
values ('0004', 18);
insert into FORCORMUN (CODEST, CORMUN)
values ('0005', 12);
insert into FORCORMUN (CODEST, CORMUN)
values ('0006', 11);
insert into FORCORMUN (CODEST, CORMUN)
values ('0007', 14);
insert into FORCORMUN (CODEST, CORMUN)
values ('0008', 9);
insert into FORCORMUN (CODEST, CORMUN)
values ('0009', 4);
insert into FORCORMUN (CODEST, CORMUN)
values ('0010', 1);
insert into FORCORMUN (CODEST, CORMUN)
values ('0011', 25);
insert into FORCORMUN (CODEST, CORMUN)
values ('0012', 15);
insert into FORCORMUN (CODEST, CORMUN)
values ('0013', 9);
insert into FORCORMUN (CODEST, CORMUN)
values ('0014', 21);
insert into FORCORMUN (CODEST, CORMUN)
values ('0015', 13);
insert into FORCORMUN (CODEST, CORMUN)
values ('0016', 23);
insert into FORCORMUN (CODEST, CORMUN)
values ('0017', 11);
insert into FORCORMUN (CODEST, CORMUN)
values ('0018', 14);
insert into FORCORMUN (CODEST, CORMUN)
values ('0019', 15);
insert into FORCORMUN (CODEST, CORMUN)
values ('0020', 20);
insert into FORCORMUN (CODEST, CORMUN)
values ('0021', 29);
insert into FORCORMUN (CODEST, CORMUN)
values ('0022', 1);
insert into FORCORMUN (CODEST, CORMUN)
values ('0023', 14);
insert into FORCORMUN (CODEST, CORMUN)
values ('0024', 21);
commit;
--prompt 24 records loaded
--prompt Loading FORCORPAR...
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0001', '0001', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0001', '0002', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0001', '0003', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0001', '0004', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0001', '0005', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0001', '0006', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0001', '0007', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0001', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0002', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0003', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0004', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0005', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0006', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0007', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0008', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0009', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0010', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0012', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0013', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0014', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0015', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0016', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0017', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0018', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0019', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0002', '0020', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0003', '0001', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0003', '0002', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0003', '0003', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0003', '0004', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0003', '0005', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0003', '0006', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0003', '0007', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0001', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0002', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0003', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0004', 8);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0005', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0006', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0007', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0008', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0009', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0010', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0011', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0012', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0013', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0014', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0015', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0016', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0017', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0004', '0018', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0001', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0002', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0003', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0004', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0005', 14);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0006', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0007', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0008', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0009', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0010', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0011', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0005', '0012', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0001', 10);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0002', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0003', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0004', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0006', 9);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0007', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0008', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0009', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0010', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0006', '0012', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0001', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0002', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0003', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0004', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0005', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0006', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0007', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0008', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0009', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0010', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0011', 8);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0012', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0013', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0007', '0014', 9);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0001', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0002', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0003', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0004', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0005', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0006', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0007', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0008', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0008', '0009', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0009', '0001', 6);
commit;
--prompt 100 records committed...
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0009', '0002', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0009', '0003', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0009', '0004', 8);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0010', '0001', 22);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0001', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0002', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0003', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0004', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0005', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0006', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0007', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0008', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0009', 9);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0010', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0012', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0013', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0014', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0015', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0016', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0017', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0018', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0019', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0020', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0021', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0022', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0023', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0024', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0011', '0025', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0001', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0002', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0003', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0004', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0005', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0006', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0007', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0008', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0009', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0010', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0012', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0013', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0014', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0012', '0015', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0001', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0002', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0003', 10);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0004', 8);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0005', 8);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0006', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0007', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0008', 17);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0013', '0009', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0001', 8);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0002', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0003', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0004', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0005', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0006', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0007', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0008', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0009', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0010', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0011', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0012', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0013', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0014', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0015', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0016', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0017', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0018', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0019', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0020', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0014', '0021', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0001', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0002', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0003', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0004', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0005', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0006', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0007', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0008', 10);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0009', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0010', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0011', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0012', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0015', '0013', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0001', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0002', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0003', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0004', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0005', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0006', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0007', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0008', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0009', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0010', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0011', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0012', 15);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0013', 4);
commit;
--prompt 200 records committed...
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0014', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0015', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0016', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0017', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0018', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0019', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0020', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0021', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0022', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0016', '0023', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0001', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0002', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0003', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0004', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0005', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0006', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0007', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0008', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0009', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0010', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0017', '0011', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0001', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0002', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0003', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0004', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0005', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0006', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0007', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0008', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0009', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0010', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0012', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0013', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0018', '0014', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0001', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0002', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0003', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0004', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0005', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0006', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0007', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0008', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0009', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0010', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0011', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0012', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0013', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0014', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0019', '0015', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0001', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0002', 12);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0003', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0004', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0005', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0006', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0007', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0008', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0009', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0010', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0012', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0013', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0014', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0015', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0016', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0017', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0018', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0019', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0020', '0020', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0001', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0002', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0003', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0004', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0005', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0006', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0007', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0008', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0009', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0010', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0012', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0013', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0014', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0015', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0016', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0017', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0018', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0019', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0020', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0021', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0022', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0023', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0024', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0025', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0026', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0027', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0028', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0021', '0029', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0022', '0001', 1);
commit;
--prompt 300 records committed...
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0001', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0002', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0003', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0004', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0005', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0006', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0007', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0008', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0009', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0010', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0012', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0013', 1);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0023', '0014', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0001', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0002', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0003', 9);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0004', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0005', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0006', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0007', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0008', 2);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0009', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0010', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0011', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0012', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0013', 7);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0014', 18);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0015', 5);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0016', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0017', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0018', 4);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0019', 3);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0020', 6);
insert into FORCORPAR (CODEST, CODMUN, CORPAR)
values ('0024', '0021', 3);
commit;
--prompt 334 records loaded
--prompt Loading FORCORSUBOBJ...
insert into FORCORSUBOBJ (CODEQU, CORSUBOBJ)
values ('01', 6);
commit;
--prompt 1 records loaded
--prompt Loading FORCORSUBSEC...
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0001', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0002', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0003', 2);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0004', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0005', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0006', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0007', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0008', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0009', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0010', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0011', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0012', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0013', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0014', 0);
insert into FORCORSUBSEC (CODSEC, CORSUBSEC)
values ('0015', 0);
commit;
--prompt 15 records loaded
--prompt Loading FORCORSUBSUBOBJ...
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('01', '006', 4);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('01', '005', 5);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('02', '003', 4);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('02', '001', 10);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('02', '002', 4);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('03', '001', 3);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('03', '002', 2);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('03', '003', 3);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('05', '001', 4);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('05', '002', 4);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('05', '003', 3);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('05', '004', 3);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('05', '005', 2);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('04', '001', 4);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('04', '002', 4);
insert into FORCORSUBSUBOBJ (CODEQU, CODSUBOBJ, CORSUBSUBOBJ)
values ('04', '003', 4);
commit;
--prompt 16 records loaded
--prompt Loading FORDEFEJEDES...
insert into FORDEFEJEDES (CODEJEDES, DESEJEDES)
values ('01', 'OCCIDENTAL');
insert into FORDEFEJEDES (CODEJEDES, DESEJEDES)
values ('02', 'ORIENTAL');
insert into FORDEFEJEDES (CODEJEDES, DESEJEDES)
values ('03', 'ORINOCO-APURE');
insert into FORDEFEJEDES (CODEJEDES, DESEJEDES)
values ('04', 'NORTE-LLANERO');
commit;
--prompt 4 records loaded
--prompt Loading FORDEFEQU...
insert into FORDEFEQU (CODEQU, DESEQU, DESOBJ)
values ('01', 'ECONOMICO', 'DESARROLLAR LA ECONOMIA PRODUCTIVA');
insert into FORDEFEQU (CODEQU, DESEQU, DESOBJ)
values ('02', 'SOCIAL', 'ALCANZAR LA JUSTICIA SOCIAL');
insert into FORDEFEQU (CODEQU, DESEQU, DESOBJ)
values ('03', 'POLITICA', 'CONSTRUIR LA DEMOCRACIA BOLIVARIANA');
insert into FORDEFEQU (CODEQU, DESEQU, DESOBJ)
values ('04', 'TERRITORIAL', 'OCUPAR Y CONSOLIDAR EL TERRITORIO');
insert into FORDEFEQU (CODEQU, DESEQU, DESOBJ)
values ('05', 'INTERNACIONAL', 'FORTALECER LA SOBERANIA NACIONAL Y PROMOVER UN MUNDO MULTIPOLAR');
commit;
--prompt 5 records loaded
--prompt Loading FORDEFEST...
insert into FORDEFEST (CODEST, DESEST)
values ('0001', 'AMAZONAS ');
insert into FORDEFEST (CODEST, DESEST)
values ('0002', 'ANZOATEGUI');
insert into FORDEFEST (CODEST, DESEST)
values ('0003', 'APURE ');
insert into FORDEFEST (CODEST, DESEST)
values ('0004', 'ARAGUA ');
insert into FORDEFEST (CODEST, DESEST)
values ('0005', 'BARINAS ');
insert into FORDEFEST (CODEST, DESEST)
values ('0006', 'BOLIVAR ');
insert into FORDEFEST (CODEST, DESEST)
values ('0007', 'CARABOBO ');
insert into FORDEFEST (CODEST, DESEST)
values ('0008', 'COJEDES ');
insert into FORDEFEST (CODEST, DESEST)
values ('0009', 'DELTA AMACURO ');
insert into FORDEFEST (CODEST, DESEST)
values ('0010', 'DTTO. CAPITAL ');
insert into FORDEFEST (CODEST, DESEST)
values ('0011', 'FALCON ');
insert into FORDEFEST (CODEST, DESEST)
values ('0012', 'GUARICO ');
insert into FORDEFEST (CODEST, DESEST)
values ('0013', 'LARA ');
insert into FORDEFEST (CODEST, DESEST)
values ('0014', 'MIRANDA ');
insert into FORDEFEST (CODEST, DESEST)
values ('0015', 'MONAGAS ');
insert into FORDEFEST (CODEST, DESEST)
values ('0016', 'MERIDA ');
insert into FORDEFEST (CODEST, DESEST)
values ('0017', 'NUEVA ESPARTA ');
insert into FORDEFEST (CODEST, DESEST)
values ('0018', 'PORTUGUESA ');
insert into FORDEFEST (CODEST, DESEST)
values ('0019', 'SUCRE ');
insert into FORDEFEST (CODEST, DESEST)
values ('0020', 'TRUJILLO ');
insert into FORDEFEST (CODEST, DESEST)
values ('0021', 'TACHIRA  ');
insert into FORDEFEST (CODEST, DESEST)
values ('0022', 'VARGAS ');
insert into FORDEFEST (CODEST, DESEST)
values ('0023', 'YARACUY ');
insert into FORDEFEST (CODEST, DESEST)
values ('0024', 'ZULIA ');
commit;
--prompt 24 records loaded
--prompt Loading FORDEFMUN...
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0002', 'ANTONIO ROMULO COSTA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0003', 'AYACUCHO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0004', 'BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0005', 'CARDENAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0006', 'CORDOBA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0007', 'FRANCISCO DE MIRANDA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0008', 'FERNANDEZ FEO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0009', 'GARCIA DE HEVIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0010', 'GUASIMOS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0011', 'INDEPENDENCIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0012', 'JOSE MARIA VARGAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0013', 'JUNIN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0014', 'JAUREGUI ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0015', 'LIBERTAD ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0016', 'LIBERTADOR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0017', 'LOBATERA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0018', 'MICHELENA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0019', 'PANAMERICANO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0020', 'PEDRO MARIA URE�A ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0021', 'RAFAEL URDANETA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0022', 'SAMUEL DARIO MALDONADO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0023', 'SAN CRISTOBAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0024', 'SAN JUDAS TADEO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0025', 'SEBORUCO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0026', 'SIMON RODRIGUEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0027', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0028', 'TORBES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0029', 'URIBANTE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0022', '0001', 'VARGAS');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0001', 'ARISTIDES BASTIDAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0002', 'BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0003', 'BRUZUAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0004', 'COCOROTE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0005', 'INDEPENDENCIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0006', 'JOSE ANTONIO PAEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0007', 'LA TRINIDAD ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0008', 'MANUEL MONGE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0009', 'NIRGUA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0010', 'PE�A ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0011', 'SAN FELIPE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0012', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0013', 'URACHICHE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0023', '0014', 'VEROES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0001', 'ALMIRANTE PADILLA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0002', 'BARALT ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0003', 'CABIMAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0004', 'CATATUMBO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0005', 'COLON ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0006', 'FRANCISCO JAVIER PULGAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0007', 'JESUS ENRIQUE LOSSADA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0008', 'JESUS MARIA SEMPRUM ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0009', 'LA CA�ADA DE URDANETA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0010', 'LAGUNILLAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0011', 'ROSARIO DE PARIJA');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0012', 'MACHIQUES DE PERIJA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0013', 'MARA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0014', 'MARACAIBO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0015', 'MIRANDA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0016', 'PAEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0017', 'SAN FRANCISCO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0018', 'SANTA RITA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0019', 'SIMON BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0020', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0024', '0021', 'VALMORE RODRIGUEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0001', '0001', 'ALTO ORINOCO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0001', '0002', 'ATABAPO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0001', '0003', 'ATURES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0001', '0004', 'AUTANA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0001', '0005', 'MANAPIARE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0001', '0006', 'MAROA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0001', '0007', 'RIO NEGRO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0001', 'ANACO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0002', 'ARAGUA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0003', 'BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0004', 'BRUZUAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0005', 'CAJIGAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0006', 'CARVAJAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0007', 'FREITES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0008', 'GUANIPA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0009', 'INDEPENDENCIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0010', 'LIC. DIEGO BAUTISTA URBANEJA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0011', 'LIBERTAD ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0012', 'Mc GREGOR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0013', 'MIRANDA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0014', 'MONAGAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0015', 'PE�ALVER ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0016', 'PIRITU ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0017', 'SAN JUAN DE CAPISTRANO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0018', 'SANTA ANA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0019', 'SIMON RODRIGUEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0002', '0020', 'SOTILLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0003', '0001', 'ACHAGUAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0003', '0002', 'BIRUACA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0003', '0003', 'MU�OZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0003', '0004', 'PEDRO CAMEJO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0003', '0005', 'PAEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0003', '0006', 'ROMULO GALLEGOS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0003', '0007', 'SAN FERNANDO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0001', 'BOLIVAR ');
commit;
--prompt 100 records committed...
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0002', 'CAMATAGUA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0003', 'FRANCISCO LINARES ALCANTARA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0004', 'GIRARDOT ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0005', 'JOSE FELIX RIBAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0006', 'JOSE RAFAEL REVENGA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0007', 'JOSE ANGEL LAMAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0008', 'LIBERTADOR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0009', 'MARIO BRICE�O IRAGORRY ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0010', 'OCUMARE DE LA COSTA DE ORO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0011', 'SAN CASIMIRO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0012', 'SAN SEBASTIAN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0013', 'SANTIAGO MARI�O ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0014', 'SANTOS MICHELENA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0015', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0016', 'TOVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0017', 'URDANETA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0004', '0018', 'ZAMORA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0001', 'ANTONIO JOSE DE SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0002', 'ALBERTO ARVELO TORREALBA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0003', 'ANDRES ELOY BLANCO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0004', 'ARISMENDI ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0005', 'BARINAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0006', 'BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0007', 'CRUZ PAREDES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0008', 'EZEQUIEL ZAMORA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0009', 'OBISPOS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0010', 'PEDRAZA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0011', 'ROJAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0005', '0012', 'SOSA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0001', 'CARONI ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0002', 'CEDE�O ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0003', 'EL CALLAO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0004', 'GRAN SABANA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0006', 'HERES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0007', 'PADRE PEDRO CHIEN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0008', 'PIAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0009', 'RAUL LEONI ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0010', 'ROSCIO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0011', 'SIFONTES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0006', '0012', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0001', 'BEJUMA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0002', 'CARLOS ARVELO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0003', 'DIEGO IBARRA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0004', 'GUACARA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0005', 'JUAN JOSE MORA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0006', 'LIBERTADOR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0007', 'LOS GUAYOS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0008', 'MIRANDA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0009', 'MONTALBAN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0010', 'NAGUANAGUA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0011', 'PUERTO CABELLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0012', 'SAN DIEGO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0013', 'SAN JOAQUIN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0007', '0014', 'VALENCIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0001', 'ANZOATEGUI ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0002', 'FALCON ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0003', 'GIRARDOT ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0004', 'LIMA BLANCO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0005', 'PAO DE SAN JUAN BAUTISTA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0006', 'RICAURTE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0007', 'ROMULO GALLEGOS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0008', 'SAN CARLOS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0008', '0009', 'TINACO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0009', '0001', 'ANTONIO DIAZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0009', '0002', 'CASACOIMA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0009', '0003', 'PEDERNALES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0009', '0004', 'TUCUPITA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0010', '0001', 'LIBERTADOR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0001', 'ACOSTA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0002', 'BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0003', 'BUCHIVACOA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0004', 'CACIQUE MANAURE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0005', 'CARIRUBANA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0006', 'COLINA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0007', 'DABAJURO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0008', 'DEMOCRACIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0009', 'FALCON ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0010', 'FEDERACION ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0011', 'JACURA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0012', 'LOS TAQUES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0013', 'MAUROA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0014', 'MIRANDA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0015', 'MONSE�OR ITURRIZA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0016', 'PALMA SOLA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0017', 'PETIT ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0018', 'PIRITU ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0019', 'SAN FRANCISCO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0020', 'SILVA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0021', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0022', 'TOCOPERO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0023', 'UNION ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0024', 'URUMACO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0011', '0025', 'ZAMORA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0001', 'CAMAGUAN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0002', 'CHAGUARAMAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0003', 'EL SOCORRO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0004', 'INFANTE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0005', 'LAS MERCEDES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0006', 'MELLADO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0007', 'MIRANDA ');
commit;
--prompt 200 records committed...
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0008', 'MONAGAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0009', 'ORTIZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0010', 'RIBAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0011', 'ROSCIO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0012', 'SAN JOSE DE GUARIBE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0013', 'SANTA MARIA DE IPIRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0014', 'SAN GERONIMO DE GUAYABAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0012', '0015', 'ZARAZA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0001', 'ANDRES ELOY BLANCO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0002', 'CRESPO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0003', 'IRIBARREN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0004', 'JIMENEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0005', 'MORAN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0006', 'PALAVECINO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0007', 'SIMON PLANAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0008', 'TORRES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0013', '0009', 'URDANETA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0001', 'ACEVEDO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0002', 'ANDRES BELLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0003', 'BARUTA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0004', 'BRION ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0005', 'BUROZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0006', 'CARRIZAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0007', 'CHACAO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0008', 'CRISTOBAL ROJAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0009', 'EL HATILLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0010', 'GUAICAIPURO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0011', 'INDEPENDENCIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0012', 'LANDER ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0013', 'LOS SALIAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0014', 'PAZ CASTILLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0015', 'PEDRO GUAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0016', 'PLAZA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0017', 'PAEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0018', 'SIMON BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0019', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0020', 'URDANETA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0014', '0021', 'ZAMORA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0001', 'ACOSTA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0002', 'AGUASAY ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0003', 'BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0004', 'CARIPE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0005', 'CEDE�O ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0006', 'EZEQUIEL ZAMORA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0007', 'LIBERTADOR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0008', 'MATURIN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0009', 'PIAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0010', 'PUNCERES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0011', 'SANTA BARBARA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0012', 'SOTILLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0015', '0013', 'URACOA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0001', 'ALBERTO ADRIANI ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0002', 'ANDRES BELLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0003', 'ANTONIO PINTO SALINAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0004', 'ARICAGUA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0005', 'ARZOBISPO CHACON ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0006', 'CAMPO ELIAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0007', 'CARACCIOLO PARRA OLMEDO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0008', 'CARDENAL QUINTERO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0009', 'GUARAQUE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0010', 'JULIO CESAR SALAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0011', 'JUSTO BRICE�O ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0012', 'LIBERTADOR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0013', 'MIRANDA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0014', 'OBISPO RAMOS DE LORA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0015', 'PADRE NOGUERA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0016', 'PUEBLO LLANO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0017', 'RANGEL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0018', 'RIVAS DAVILA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0019', 'SANTOS MARQUINA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0020', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0021', 'TOVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0022', 'TULIO FEBRES CORDERO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0016', '0023', 'ZEA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0001', 'ANTOLIN DEL CAMPO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0002', 'ARISMENDI ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0003', 'DIAZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0004', 'GARCIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0005', 'GOMEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0006', 'MANEIRO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0007', 'MARCANO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0008', 'MARI�O ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0009', 'PENINSULA DE MACANAO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0010', 'TUBORES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0017', '0011', 'VILLALBA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0001', 'AGUA BLANCA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0002', 'ARAURE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0003', 'ESTELLER ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0004', 'SAN GENARO DE BOCONOITO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0005', 'GUANARE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0006', 'GUANARITO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0007', 'MONSE�OR JOSE VICENTE DE UNDA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0008', 'OSPINO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0009', 'PAPELON ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0010', 'PAEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0011', 'SAN RAFAEL DE ONOTO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0012', 'SANTA ROSALIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0013', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0018', '0014', 'TUREN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0001', 'ANDRES ELOY BLANCO ');
commit;
--prompt 300 records committed...
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0002', 'ANDRES MATA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0003', 'ARISMENDI ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0004', 'BENITEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0005', 'BERMUDEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0006', 'BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0007', 'CAJIGAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0008', 'CRUZ SALMERON ACOSTA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0009', 'LIBERTADOR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0010', 'MARI�O ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0011', 'MEJIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0012', 'MONTES ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0013', 'RIBERO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0014', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0019', '0015', 'VALDEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0001', 'ANDRES BELLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0002', 'BOCONO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0003', 'BOLIVAR ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0004', 'CANDELARIA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0005', 'CARACHE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0006', 'ESCUQUE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0007', 'JOSE FELIPE MARQUEZ CA�IZALEZ ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0008', 'JUAN VICENTE CAMPO ELIAS ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0009', 'LA CEIBA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0010', 'MIRANDA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0011', 'MONTE CARMELO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0012', 'MOTATAN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0013', 'PAMPANITO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0014', 'PAMPAN ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0015', 'RAFAEL RANGEL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0016', 'SAN RAFAEL DE CARVAJAL ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0017', 'SUCRE ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0018', 'TRUJILLO ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0019', 'URDANETA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0020', '0020', 'VALERA ');
insert into FORDEFMUN (CODEST, CODMUN, DESMUN)
values ('0021', '0001', 'ANDRES BELLO ');
commit;
--prompt 334 records loaded
--prompt Loading FORDEFOBJ...
--prompt Table is empty
--prompt Loading FORDEFOBJESTNVAETA...
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('001', 'AVANZAR EN LA CONFORMACION DE LA NUEVA ESTRUCTURA SOCIAL');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('002', 'ARTICULAR Y OPTIMIZAR LA NUEVA ESTRATEGIA COMUNICACIONAL');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('003', 'AVANZAR ACELERADAMENTE EN LA CONSTRUCCION DEL NUEVO MODELO DEMOCRATICO DE PARTICIPACION POPULAR');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('004', 'ACELERAR LA CREACION DE LA NUEVA INSTITUCIONALIDAD DEL APARATO DEL ESTADO');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('005', 'ACTIVAR UNA NUEVA ESTRATEGIA INTEGRAL Y EFICAZ CONTRA LA CORRUPCION');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('006', 'DESARROLLAR LA NUEVAESTRATEGIA  ELECTORAL');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('007', 'ACELERAR LA CONSTRUCCION DEL NUEVO MODELO PRODUCTIVO, RUMBO A LA CREACION DEL NUEVO SISTEMA ECONOMICO');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('008', 'CONTINUAR INSTALANDO LA NUEVA ESTRUCTURA TERRITORIAL');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('009', 'PROFUNDIZAR Y ACELAERAR LA CONFORMACION DE LA NUEVA ESTRATEGIA MILITAT NACIONAL');
insert into FORDEFOBJESTNVAETA (CODOBJNVAETA, DESOBJNVAETA)
values ('010', 'SEGUIR IMPULSANDO EL NUEVO SISTEMA MULTIPOLAR INTERNACIONAL');
commit;
--prompt 10 records loaded
--prompt Loading FORDEFPAR...

insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0016', '0003', 'CARVAJAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0016', '0004', 'JOSE LEONARDO SUAREZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0017', '0001', 'EL PARAISO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0017', '0002', 'JUNIN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0017', '0003', 'SABANA DE MENDOZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0017', '0004', 'VALMORE RODRIGUEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0018', '0001', 'ANDRES LINARES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0018', '0002', 'CHIQUINQUIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0018', '0003', 'CRISTOBAL MENDOZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0018', '0004', 'CRUZ CARRILLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0018', '0005', 'MATRIZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0018', '0006', 'MONSE�OR CARRILLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0018', '0007', 'TRES ESQUINAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0019', '0001', 'CABIMBU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0019', '0002', 'JAJO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0019', '0003', 'LA MESA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0019', '0004', 'LA QUEBRADA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0019', '0005', 'SANTIAGO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0019', '0006', 'TU�AME');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0020', '0001', 'JUAN IGNACIO MONTILLA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0020', '0002', 'LA BEATRIZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0020', '0003', 'LA PUERTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0020', '0004', 'MENDOZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0020', '0005', 'MERCEDES DIAZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0020', '0006', 'SAN LUIS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0001', '0001', 'CORDERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0002', '0001', 'LAS MESAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0003', '0001', 'COLON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0003', '0002', 'RIVAS BERTI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0003', '0003', 'SAN PEDRO DEL RIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0004', '0001', 'ISAIAS MEDINA ANGARIT');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0004', '0002', 'JUAN VICENTE GOMEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0004', '0003', 'PALOTAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0004', '0004', 'SAN ANT DEL TACHIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0005', '0001', 'AMENODORO RANGEL LAMU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0005', '0002', 'LA FLORIDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0005', '0003', 'TARIBA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0006', '0001', 'STA. ANA DEL TACHIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0007', '0001', 'SAN JOSE DE BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0008', '0001', 'ALBERTO ADRIANI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0008', '0002', 'CM.SAN RAFAEL DEL PINAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0008', '0003', 'SANTO DOMINGO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0009', '0001', 'BOCA DE GRITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0009', '0002', 'JOSE ANTONIO PAEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0009', '0003', 'LA FRIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0010', '0001', 'PALMIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0011', '0001', 'CAPACHO NUEVO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0011', '0002', 'JUAN GERMAN ROSCIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0011', '0003', 'ROMAN CARDENAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0012', '0001', 'EL COBRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0013', '0001', 'BRAMON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0013', '0002', 'LA PETROLEA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0013', '0003', 'QUINIMARI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0013', '0004', 'RUBIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0014', '0001', 'EMILIO C. GUERRERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0014', '0002', 'LA GRITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0014', '0003', 'MONS. MIGUEL A SALAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0015', '0001', 'CAPACHO VIEJO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0015', '0002', 'CIPRIANO CASTRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0015', '0003', 'MANUEL FELIPE RUGELES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0016', '0001', 'ABEJALES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0016', '0002', 'DORADAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0016', '0003', 'EMETERIO OCHOA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0016', '0004', 'SAN JOAQUIN DE NAVAY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0017', '0001', 'CONSTITUCION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0017', '0002', 'LOBATERA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0018', '0001', 'MICHELENA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0019', '0001', 'COLONCITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0019', '0002', 'LA PALMITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0020', '0001', 'NUEVA ARCADIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0020', '0002', 'URE�A');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0021', '0001', 'DELICIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0022', '0001', 'BOCONO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0022', '0002', 'HERNANDEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0022', '0003', 'LA TENDIDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0023', '0001', 'DR. FCO. ROMERO LOBO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0023', '0002', 'LA CONCORDIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0023', '0003', 'PEDRO MARIA MORANTES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0023', '0004', 'SAN SEBASTIAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0023', '0005', 'SN JUAN BAUTISTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0024', '0001', 'UMUQUENA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0025', '0001', 'SEBORUCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0026', '0001', 'SAN SIMON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0027', '0001', 'ELEAZAR LOPEZ CONTRERA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0027', '0002', 'QUENIQUEA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0027', '0003', 'SAN PABLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0028', '0001', 'SAN JOSECITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0029', '0001', 'CARDENAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0029', '0002', 'JUAN PABLO PE�ALOZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0029', '0003', 'POTOSI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0021', '0029', '0004', 'PREGONERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0022', '0001', '0001', 'VARGAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0001', '0001', 'SAN PABLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0002', '0001', 'AROA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0003', '0001', 'CAMPO ELIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0003', '0002', 'CHIVACOA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0004', '0001', 'COCOROTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0005', '0001', 'INDEPENDENCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0006', '0001', 'SABANA DE PARRA');
commit;
--prompt 100 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0007', '0001', 'BORAURE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0008', '0001', 'YUMARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0009', '0001', 'NIRGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0009', '0002', 'SALOM');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0009', '0003', 'TEMERLA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0010', '0001', 'SAN ANDRES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0010', '0002', 'YARITAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0011', '0001', 'ALBARICO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0011', '0002', 'SAN FELIPE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0011', '0003', 'SAN JAVIER');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0012', '0001', 'GUAMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0013', '0001', 'URACHICHE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0014', '0001', 'EL GUAYABO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0023', '0014', '0002', 'FARRIAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0001', '0001', 'ISLA DE TOAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0001', '0002', 'MONAGAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0002', '0001', 'GENERAL URDANETA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0002', '0002', 'LIBERTADOR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0002', '0003', 'MANUEL GUANIPA MATOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0002', '0004', 'MARCELINO BRICE�O');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0002', '0005', 'PUEBLO NUEVO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0002', '0006', 'SAN TIMOTEO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0001', 'AMBROSIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0002', 'ARISTIDES CALVANI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0003', 'CARMEN HERRERA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0004', 'GERMAN RIOS LINARES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0005', 'JORGE HERNANDEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0006', 'LA ROSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0007', 'PUNTA GORDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0008', 'ROMULO BETANCOURT');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0003', '0009', 'SAN BENITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0004', '0001', 'ENCONTRADOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0004', '0002', 'UDON PEREZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0005', '0001', 'MORALITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0005', '0002', 'SAN CARLOS DEL ZULIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0005', '0003', 'SANTA BARBARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0005', '0004', 'SANTA CRUZ DEL ZULIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0005', '0005', 'URRIBARRI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0006', '0001', 'CARLOS QUEVEDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0006', '0002', 'FRANCISCO J PULGAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0006', '0003', 'SIMON RODRIGUEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0007', '0001', 'JOSE RAMON YEPEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0007', '0002', 'LA CONCEPCION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0007', '0003', 'MARIANO PARRA LEON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0007', '0004', 'SAN JOSE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0008', '0001', 'BARI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0008', '0002', 'JESUS M SEMPRUN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0009', '0001', 'ANDRES BELLO (KM 48)');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0009', '0002', 'CHIQUINQUIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0009', '0003', 'CONCEPCION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0009', '0004', 'EL CARMELO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0009', '0005', 'POTRERITOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0010', '0001', 'ALONSO DE OJEDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0010', '0002', 'CAMPO LARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0010', '0003', 'ELEAZAR LOPEZ C');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0010', '0004', 'LIBERTAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0010', '0005', 'VENEZUELA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0011', '0001', 'DONALDO GARCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0011', '0002', 'EL ROSARIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0011', '0003', 'SIXTO ZAMBRANO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0012', '0001', 'BARTOLOME DE LAS CASAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0012', '0002', 'LIBERTAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0012', '0003', 'RIO NEGRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0012', '0004', 'SAN JOSE DE PERIJA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0013', '0001', 'LA SIERRITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0013', '0002', 'LAS PARCELAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0013', '0003', 'LUIS DE VICENTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0013', '0004', 'MONS.MARCOS SERGIO G');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0013', '0005', 'RICAURTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0013', '0006', 'SAN RAFAEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0013', '0007', 'TAMARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0001', 'ANTONIO BORJAS ROMERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0002', 'BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0003', 'CACIQUE MARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0004', 'CARACCIOLO PARRA PEREZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0005', 'CECILIO ACOSTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0006', 'CHIQUINQUIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0007', 'COQUIVACOA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0008', 'CRISTO DE ARANZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0009', 'FRANCISCO EUGENIO B');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0010', 'IDELFONZO VASQUEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0011', 'JUANA DE AVILA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0012', 'LUIS HURTADO HIGUERA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0013', 'MANUEL DAGNINO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0014', 'OLEGARIO VILLALOBOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0015', 'RAUL LEONI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0016', 'SAN ISIDRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0017', 'SANTA LUCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0014', '0018', 'VENANCIO PULGAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0015', '0001', 'ALTAGRACIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0015', '0002', 'ANA MARIA CAMPOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0015', '0003', 'FARIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0015', '0004', 'SAN ANTONIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0015', '0005', 'SAN JOSE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0016', '0001', 'ALTA GUAJIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0016', '0002', 'ELIAS SANCHEZ RUBIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0016', '0003', 'GOAJIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0016', '0004', 'SINAMAICA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0017', '0001', 'DOMITILA FLORES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0017', '0002', 'EL BAJO');
commit;
--prompt 200 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0017', '0003', 'FRANCISCO OCHOA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0017', '0004', 'LOS CORTIJOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0017', '0005', 'MARCIAL HERNANDEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0017', '0006', 'SAN FRANCISCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0018', '0001', 'EL MENE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0018', '0002', 'JOSE CENOVIO URRIBARR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0018', '0003', 'PEDRO LUCAS URRIBARRI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0018', '0004', 'SANTA RITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0019', '0001', 'MANUEL MANRIQUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0019', '0002', 'RAFAEL MARIA BARALT');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0019', '0003', 'RAFAEL URDANETA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0020', '0001', 'BOBURES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0020', '0002', 'EL BATEY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0020', '0003', 'GIBRALTAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0020', '0004', 'HERAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0020', '0005', 'M.ARTURO CELESTINO A');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0020', '0006', 'ROMULO GALLEGOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0021', '0001', 'LA VICTORIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0021', '0002', 'RAFAEL URDANETA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0024', '0021', '0003', 'RAUL CUENCA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0011', 'LOS NEVADOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0012', 'MARIANO PICON SALAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0013', 'MILLA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0014', 'OSUNA RODRIGUEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0015', 'SAGRARIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0013', '0001', 'ANDRES ELOY BLANCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0013', '0002', 'LA VENTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0013', '0003', 'PI�ANGO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0013', '0004', 'TIMOTES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0014', '0001', 'ELOY PAREDES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0014', '0002', 'PQ R DE ALCAZAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0014', '0003', 'STA ELENA DE ARENALES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0015', '0001', 'STA MARIA DE CAPARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0016', '0001', 'PUEBLO LLANO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0017', '0001', 'CACUTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0017', '0002', 'LA TOMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0017', '0003', 'MUCUCHIES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0017', '0004', 'MUCURUBA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0017', '0005', 'SAN RAFAEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0018', '0001', 'BAILADORES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0018', '0002', 'GERONIMO MALDONADO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0019', '0001', 'TABAY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0020', '0001', 'CHIGUARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0020', '0002', 'ESTANQUES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0020', '0003', 'LA TRAMPA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0020', '0004', 'LAGUNILLAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0020', '0005', 'PUEBLO NUEVO DEL SUR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0020', '0006', 'SAN JUAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0021', '0001', 'EL AMPARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0021', '0002', 'EL LLANO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0021', '0003', 'SAN FRANCISCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0021', '0004', 'TOVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0022', '0001', 'INDEPENDENCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0022', '0002', 'MARIA C PALACIOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0022', '0003', 'NUEVA BOLIVIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0022', '0004', 'SANTA APOLONIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0023', '0001', 'CA�O EL TIGRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0023', '0002', 'ZEA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0001', '0001', 'LA PLAZA DE PARAGUACHI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0002', '0001', 'LA ASUNCION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0003', '0001', 'SAN JUAN BAUTISTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0003', '0002', 'ZABALA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0004', '0001', 'FRANCISCO FAJARDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0004', '0002', 'VALLE ESP SANTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0005', '0001', 'BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0005', '0002', 'GUEVARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0005', '0003', 'MATASIETE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0005', '0004', 'SANTA ANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0005', '0005', 'SUCRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0006', '0001', 'AGUIRRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0006', '0002', 'PAMPATAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0007', '0001', 'ADRIAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0007', '0002', 'JUAN GRIEGO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0008', '0001', 'PORLAMAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0009', '0001', 'BOCA DEL RIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0009', '0002', 'SAN FRANCISCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0010', '0001', 'LOS BARALES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0010', '0002', 'PUNTA DE PIEDRAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0011', '0001', 'SAN PEDRO DE COCHE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0017', '0011', '0002', 'VICENTE FUENTES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0001', '0001', 'AGUA BLANCA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0002', '0001', 'ARAURE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0002', '0002', 'RIO ACARIGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0003', '0001', 'PIRITU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0003', '0002', 'UVERAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0004', '0001', 'ANTOLIN TOVAR AQUINO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0004', '0002', 'BOCONOITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0005', '0001', 'CORDOBA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0005', '0002', 'GUANARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0005', '0003', 'SAN JOSE DE LA MONTA�A');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0005', '0004', 'SAN JUAN GUANAGUANARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0005', '0005', 'VIRGEN DE LA COROMOTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0006', '0001', 'DIVINA PASTORA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0006', '0002', 'GUANARITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0006', '0003', 'TRINIDAD DE LA CAPILLA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0007', '0001', 'CHABASQUEN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0007', '0002', 'PE�A BLANCA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0008', '0001', 'APARICION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0008', '0002', 'LA ESTACION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0008', '0003', 'OSPINO');
commit;
--prompt 300 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0009', '0001', 'CA�O DELGADITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0009', '0002', 'PAPELON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0010', '0001', 'ACARIGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0010', '0002', 'PAYARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0010', '0003', 'PIMPINELA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0010', '0004', 'RAMON PERAZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0011', '0001', 'SAN RAFAEL DE ONOTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0011', '0002', 'SANTA FE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0011', '0003', 'THERMO MORLES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0012', '0001', 'EL PLAYON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0012', '0002', 'FLORIDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0013', '0001', 'BISCUCUY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0013', '0002', 'CONCEPCION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0013', '0003', 'SAN JOSE DE SAGUAZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0013', '0004', 'SAN RAFAEL PALO ALZADO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0013', '0005', 'UVENCIO A VELASQUEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0013', '0006', 'VILLA ROSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0014', '0001', 'CANELONES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0014', '0002', 'SAN ISIDRO LABRADOR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0014', '0003', 'SANTA CRUZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0018', '0014', '0004', 'VILLA BRUZUAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0001', '0001', 'MARI�O');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0001', '0002', 'ROMULO GALLEGOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0002', '0001', 'SAN JOSE DE AREOCUAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0002', '0002', 'TAVERA ACOSTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0003', '0001', 'ANTONIO JOSE DE SUCRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0003', '0002', 'EL MORRO DE PTO SANTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0003', '0003', 'PUERTO SANTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0003', '0004', 'RIO CARIBE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0003', '0005', 'SAN JUAN GALDONAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0004', '0001', 'EL PILAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0004', '0002', 'EL RINCON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0004', '0003', 'GRAL FCO. A VASQUEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0004', '0004', 'GUARAUNOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0004', '0005', 'TUNAPUICITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0004', '0006', 'UNION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0005', '0001', 'BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0005', '0002', 'MACARAPANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0005', '0003', 'SANTA CATALINA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0005', '0004', 'SANTA ROSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0005', '0005', 'SANTA TERESA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0006', '0001', 'MARIGUITAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0007', '0001', 'LIBERTAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0007', '0002', 'PAUJIL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0007', '0003', 'YAGUARAPARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0008', '0001', 'ARAYA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0008', '0002', 'CHACOPATA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0008', '0003', 'MANICUARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0009', '0001', 'CAMPO ELIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0009', '0002', 'TUNAPUY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0010', '0001', 'CAMPO CLARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0010', '0002', 'IRAPA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0010', '0003', 'MARABAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0010', '0004', 'SAN ANTONIO DE IRAPA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0010', '0005', 'SORO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0011', '0001', 'SAN ANT DEL GOLFO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0012', '0001', 'ARENAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0012', '0002', 'ARICAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0012', '0003', 'COCOLLAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0012', '0004', 'CUMANACOA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0012', '0005', 'SAN FERNANDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0012', '0006', 'SAN LORENZO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0013', '0001', 'CARIACO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0013', '0002', 'CATUARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0013', '0003', 'RENDON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0013', '0004', 'SANTA CRUZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0013', '0005', 'SANTA MARIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0014', '0001', 'ALTAGRACIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0014', '0002', 'AYACUCHO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0014', '0003', 'GRAN MARISCAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0014', '0004', 'RAUL LEONI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0014', '0005', 'SAN JUAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0014', '0006', 'SANTA INES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0014', '0007', 'VALENTIN VALIENTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0015', '0001', 'BIDEAU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0015', '0002', 'CRISTOBAL COLON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0015', '0003', 'GUIRIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0019', '0015', '0004', 'PUNTA DE PIEDRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0001', '0001', 'ARAGUANEY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0001', '0002', 'EL JAGUITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0001', '0003', 'LA ESPERANZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0001', '0004', 'SANTA ISABEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0001', 'AYACUCHO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0002', 'BOCONO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0003', 'BURBUSAY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0004', 'EL CARMEN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0005', 'GENERAL RIVAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0006', 'GUARAMACAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0007', 'LA VEGA DE GUARAMACAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0008', 'MONSE�OR JAUREGUI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0009', 'MOSQUEY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0010', 'RAFAEL RANGEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0011', 'SAN JOSE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0002', '0012', 'SAN MIGUEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0003', '0001', 'CHEREGUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0003', '0002', 'GRANADOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0003', '0003', 'SABANA GRANDE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0004', '0001', 'ARNOLDO GABALDON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0004', '0002', 'BOLIVIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0004', '0003', 'CARRILLO');
commit;
--prompt 400 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0004', '0004', 'CEGARRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0004', '0005', 'CHEJENDE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0004', '0006', 'MANUEL SALVADOR ULLOA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0004', '0007', 'SAN JOSE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0005', '0001', 'CARACHE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0005', '0002', 'CUICAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0005', '0003', 'LA CONCEPCION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0005', '0004', 'PANAMERICANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0005', '0005', 'SANTA CRUZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0006', '0001', 'ESCUQUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0006', '0002', 'LA UNION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0006', '0003', 'SABANA LIBRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0006', '0004', 'SANTA RITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0007', '0001', 'ANTONIO JOSE DE SUCRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0007', '0002', 'EL SOCORRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0007', '0003', 'LOS CAPRICHOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0008', '0001', 'ARNOLDO GABALDON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0008', '0002', 'CAMPO ELIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0009', '0001', 'EL PROGRESO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0009', '0002', 'LA CEIBA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0009', '0003', 'SANTA APOLONIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0009', '0004', 'TRES DE FEBRERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0010', '0001', 'AGUA CALIENTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0010', '0002', 'AGUA SANTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0010', '0003', 'EL CENIZO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0010', '0004', 'EL DIVIDIVE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0010', '0005', 'VALERITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0011', '0001', 'BUENA VISTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0011', '0002', 'MONTE CARMELO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0011', '0003', 'STA MARIA DEL HORCON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0012', '0001', 'EL BA�O');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0012', '0002', 'JALISCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0012', '0003', 'MOTATAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0013', '0001', 'LA CONCEPCION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0013', '0002', 'PAMPANITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0013', '0003', 'PAMPANITO II');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0014', '0001', 'FLOR DE PATRIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0014', '0002', 'LA PAZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0014', '0003', 'PAMPAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0014', '0004', 'SANTA ANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0015', '0001', 'BETIJOQUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0015', '0002', 'EL CEDRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0015', '0003', 'JOSE G HERNANDEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0015', '0004', 'LA PUEBLITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0016', '0001', 'ANTONIO N BRICE�O');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0020', '0016', '0002', 'CAMPO ALEGRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0013', '0001', 'CASIGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0013', '0002', 'MENE DE MAUROA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0013', '0003', 'SAN FELIX');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0014', '0001', 'GUZMAN GUILLERMO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0014', '0002', 'MITARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0014', '0003', 'RIO SECO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0014', '0004', 'SABANETA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0014', '0005', 'SAN ANTONIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0014', '0006', 'SAN GABRIEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0014', '0007', 'SANTA ANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0015', '0001', 'BOCA DE TOCUYO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0015', '0002', 'CHICHIRIVICHE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0015', '0003', 'TOCUYO DE LA COSTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0016', '0001', 'PALMA SOLA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0017', '0001', 'CABURE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0017', '0002', 'COLINA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0017', '0003', 'CURIMAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0018', '0001', 'PIRITU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0018', '0002', 'SAN JOSE DE LA COSTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0019', '0001', 'MIRIMIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0020', '0001', 'BOCA DE AROA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0020', '0002', 'TUCACAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0021', '0001', 'PECAYA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0021', '0002', 'SUCRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0022', '0001', 'TOCOPERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0023', '0001', 'EL CHARAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0023', '0002', 'LAS VEGAS DEL TUY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0023', '0003', 'STA.CRUZ DE BUCARAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0024', '0001', 'BRUZUAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0024', '0002', 'URUMACO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0025', '0001', 'LA CIENAGA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0025', '0002', 'LA SOLEDAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0025', '0003', 'PUEBLO CUMAREBO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0025', '0004', 'PUERTO CUMAREBO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0025', '0005', 'ZAZARIDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0001', '0001', 'CAMAGUAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0001', '0002', 'PUERTO MIRANDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0001', '0003', 'UVERITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0002', '0001', 'CHAGUARAMAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0003', '0001', 'EL SOCORRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0004', '0001', 'ESPINO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0004', '0002', 'VALLE DE LA PASCUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0005', '0001', 'CABRUTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0005', '0002', 'LAS MERCEDES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0005', '0003', 'STA RITA DE MANAPIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0006', '0001', 'EL SOMBRERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0006', '0002', 'SOSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0007', '0001', 'CALABOZO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0007', '0002', 'EL CALVARIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0007', '0003', 'EL RASTRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0007', '0004', 'GUARDATINAJAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0008', '0001', 'ALTAGRACIA DE ORITUCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0008', '0002', 'LEZAMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0008', '0003', 'LIBERTAD DE ORITUCO');
commit;
--prompt 500 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0008', '0004', 'PASO REAL DE MACAIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0002', '0005', 'LA URBANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0002', '0006', 'PIJIGUAOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0003', '0001', 'EL CALLAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0004', '0001', 'IKABARU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0005', '0002', 'SANTA ELENA DE UAIREN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0001', 'AGUA SALADA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0002', 'CATEDRAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0003', 'JOSE ANTONIO PAEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0004', 'LA SABANITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0005', 'MARHUANTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0006', 'ORINOCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0007', 'PANAPANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0008', 'VISTA HERMOSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0006', '0009', 'ZEA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0007', '0001', 'EL PALMAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0008', '0001', 'ANDRES ELOY BLANCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0008', '0002', 'PEDRO COVA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0008', '0003', 'UPATA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0009', '0001', 'BARCELONETA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0009', '0002', 'CIUDAD PIAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0009', '0003', 'SAN FRANCISCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0009', '0004', 'SANTA BARBARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0010', '0001', 'GUASIPATI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0010', '0002', 'SALOM');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0011', '0001', 'DALLA COSTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0011', '0002', 'SAN ISIDRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0011', '0003', 'TUMEREMO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0012', '0001', 'ARIPAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0012', '0002', 'GUARATARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0012', '0003', 'LAS MAJADAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0012', '0004', 'MARIPA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0012', '0005', 'MOITACO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0001', '0001', 'BEJUMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0001', '0002', 'CANOABO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0001', '0003', 'SIMON BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0002', '0001', 'BELEN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0002', '0002', 'GUIGUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0002', '0003', 'TACARIGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0003', '0001', 'AGUAS CALIENTES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0003', '0002', 'MARIARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0004', '0001', 'CIUDAD ALIANZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0004', '0002', 'GUACARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0004', '0003', 'YAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0005', '0001', 'MORON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0005', '0002', 'URAMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0006', '0001', 'U INDEPENDENCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0006', '0002', 'U TOCUYITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0007', '0001', 'U LOS GUAYOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0008', '0001', 'MIRANDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0009', '0001', 'MONTALBAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0010', '0001', 'NAGUANAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0011', '0001', 'BARTOLOME SALOM');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0011', '0002', 'BORBURATA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0011', '0003', 'DEMOCRACIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0011', '0004', 'FRATERNIDAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0011', '0005', 'GOAIGOAZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0011', '0006', 'JUAN JOSE FLORES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0011', '0007', 'PATANEMO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0011', '0008', 'UNION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0012', '0001', 'URB SAN DIEGO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0013', '0001', 'SAN JOAQUIN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0001', 'CANDELARIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0002', 'CATEDRAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0003', 'EL SOCORRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0004', 'MIGUEL PE�A');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0005', 'NEGRO PRIMERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0006', 'RAFAEL URDANETA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0007', 'SAN BLAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0008', 'SAN JOSE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0007', '0014', '0009', 'SANTA ROSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0001', '0001', 'COJEDES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0001', '0002', 'JUAN DE MATA SUAREZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0002', '0001', 'TINAQUILLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0003', '0001', 'EL BAUL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0003', '0002', 'SUCRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0004', '0001', 'LA AGUADITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0004', '0002', 'MACAPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0005', '0001', 'EL PAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0006', '0001', 'EL AMPARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0006', '0002', 'LIBERTAD DE COJEDES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0007', '0001', 'ROMULO GALLEGOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0008', '0001', 'JUAN ANGEL BRAVO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0008', '0002', 'MANUEL MANRIQUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0008', '0003', 'SAN CARLOS DE AUSTRIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0008', '0009', '0001', 'GRL JEFE JOSE L SILVA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0001', '0001', 'ALMIRANTE LUIS BRION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0001', '0002', 'ANICETO LUGO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0001', '0003', 'CURIAPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0001', '0004', 'MANUEL RENAUD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0001', '0005', 'PADRE BARRAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0001', '0006', 'SANTOS DE ABELGAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0002', '0001', '5 DE JULIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0002', '0002', 'IMATACA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0002', '0003', 'JUAN BAUTISTA ARISMENDI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0002', '0004', 'MANUEL PIAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0002', '0005', 'ROMULO GALLEGOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0003', '0001', 'LUIS B PRIETO FIGUEROA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0003', '0002', 'PEDERNALES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0004', '0001', 'JOSE VIDAL MARCANO');
commit;
--prompt 600 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0004', '0002', 'JUAN MILLAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0004', '0003', 'LEONARDO RUIZ PINEDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0004', '0004', 'MCL.ANTONIO J DE SUCRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0004', '0005', 'MONS. ARGIMIRO GARCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0004', '0006', 'SAN JOSE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0004', '0007', 'SAN RAFAEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0009', '0004', '0008', 'VIRGEN DEL VALLE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0001', '23 DE ENERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0002', 'ALTAGRACIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0003', 'ANT�MANO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0004', 'CANDELARIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0005', 'CARICUAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0006', 'CATEDRAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0007', 'COCHE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0008', 'EL JUNQUITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0009', 'EL PARA�SO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0010', 'EL RECREO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0011', 'EL VALLE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0012', 'LA PASTORA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0013', 'LA VEGA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0014', 'MACARAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0015', 'SAN AGUST�N');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0016', 'SAN BERNARDINO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0017', 'SAN JOS�');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0018', 'SAN JUAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0019', 'SAN PEDRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0020', 'SANTA ROSAL�A');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0021', 'SANTA TERESA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0010', '0001', '0022', 'SUCRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0001', '0001', 'CAPADARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0001', '0002', 'LA PASTORA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0001', '0003', 'LIBERTADOR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0001', '0004', 'SAN JUAN DE LOS CAYOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0002', '0001', 'ARACUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0002', '0002', 'LA PE�A');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0002', '0003', 'SAN LUIS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0003', '0001', 'BARIRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0003', '0002', 'BOROJO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0003', '0003', 'CAPATARIDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0003', '0004', 'GUAJIRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0003', '0005', 'SEQUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0003', '0006', 'ZAZARIDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0004', '0001', 'YARACAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0005', '0001', 'CARIRUBANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0005', '0002', 'NORTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0005', '0003', 'PUNTA CARDON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0005', '0004', 'SANTA ANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0006', '0001', 'ACURIGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0006', '0002', 'GUAIBACOA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0006', '0003', 'LA VELA DE CORO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0006', '0004', 'LAS CALDERAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0006', '0005', 'MACORUCA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0007', '0001', 'DABAJURO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0008', '0001', 'AGUA CLARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0008', '0002', 'AVARIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0008', '0003', 'PEDREGAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0008', '0004', 'PIEDRA GRANDE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0008', '0005', 'PURURECHE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0001', 'ADAURE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0002', 'ADICORA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0003', 'BARAIVED');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0004', 'BUENA VISTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0005', 'EL HATO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0006', 'EL VINCULO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0007', 'JADACAQUIVA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0008', 'MORUY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0009', '0009', 'PUEBLO NUEVO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0010', '0001', 'AGUA LARGA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0010', '0002', 'CHURUGUARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0010', '0003', 'EL PAUJI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0010', '0004', 'INDEPENDENCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0010', '0005', 'MAPARARI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0011', '0001', 'AGUA LINDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0011', '0002', 'ARAURIMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0011', '0003', 'JACURA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0012', '0001', 'JUDIBANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0011', '0012', '0002', 'LOS TAQUES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0001', '0001', 'HUACHAMACARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0001', '0002', 'LA ESMERALDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0001', '0003', 'MARAWAKA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0001', '0004', 'MAVACA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0001', '0005', 'SIERRA PARIMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0002', '0001', 'CANAME');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0002', '0002', 'SAN FERNANDO DE ATABA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0002', '0003', 'UCATA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0002', '0004', 'YAPACANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0003', '0001', 'FERNANDO GIRON TOVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0003', '0002', 'LUIS ALBERTO GOMEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0003', '0003', 'PARHUE�A');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0003', '0004', 'PLATANILLAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0004', '0001', 'GUAYAPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0004', '0002', 'ISLA DE RATON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0004', '0003', 'MUNDUAPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0004', '0004', 'SAMARIAPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0004', '0005', 'SIPAPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0005', '0001', 'ALTO VENTUARI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0005', '0002', 'BAJO VENTUARI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0005', '0003', 'MEDIO VENTUARI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0005', '0004', 'SAN JUAN DE MANAPIARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0006', '0001', 'AREA CAPITAL MAROA');
commit;
--prompt 700 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0006', '0002', 'COMUNIDAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0006', '0003', 'MAROA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0006', '0004', 'VICTORINO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0007', '0001', 'CASIQUIARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0007', '0002', 'COCUY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0007', '0003', 'SAN CARLOS DE RIO NEG');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0001', '0007', '0004', 'SOLANO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0001', '0001', 'ANACO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0001', '0002', 'SAN JOAQUIN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0002', '0001', 'ARAGUA DE BARCELONA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0002', '0002', 'CACHIPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0003', '0001', 'BERGANTIN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0003', '0002', 'CAIGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0003', '0003', 'EL CARMEN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0003', '0004', 'EL PILAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0003', '0005', 'NARICUAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0003', '0006', 'SAN CRISTOBAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0004', '0001', 'CLARINES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0004', '0002', 'GUANAPE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0004', '0003', 'SABANA DE UCHIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0005', '0001', 'ONOTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0005', '0002', 'SAN PABLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0006', '0001', 'SANTA BARBARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0006', '0002', 'VALLE GUANAPE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0007', '0001', 'CANTAURA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0007', '0002', 'LIBERTADOR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0007', '0003', 'SANTA ROSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0007', '0004', 'URICA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0008', '0001', 'SAN JOSE DE GUANIPA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0008', '0002', 'CHORRERON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0008', '0003', 'GUANTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0009', '0001', 'MAMO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0009', '0002', 'SOLEDAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0010', '0001', 'EL MORRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0010', '0002', 'LECHERIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0011', '0001', 'EL CARITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0011', '0002', 'SAN MATEO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0011', '0003', 'SANTA INES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0012', '0001', 'EL CHAPARRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0012', '0002', 'TOMAS ALFARO CALATRAVA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0013', '0001', 'ATAPIRIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0013', '0002', 'BOCA DEL PAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0013', '0003', 'EL PAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0013', '0004', 'PARIAGUAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0014', '0001', 'MAPIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0014', '0002', 'PIAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0014', '0003', 'SANTA CLARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0014', '0004', 'SN DIEGO DE CABRUTICA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0014', '0005', 'UVERITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0014', '0006', 'ZUATA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0015', '0001', 'PUERTO PIRITU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0015', '0002', 'SAN MIGUEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0015', '0003', 'SUCRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0016', '0001', 'PIRITU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0016', '0002', 'SAN FRANCISCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0017', '0001', 'BOCA DE CHAVEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0017', '0002', 'BOCA UCHIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0018', '0001', 'PUEBLO NUEVO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0018', '0002', 'SANTA ANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0019', '0001', 'EL TIGRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0002', '0020', '0001', 'POZUELOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0001', '0001', 'ACHAGUAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0001', '0002', 'APURITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0001', '0003', 'EL YAGUAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0001', '0004', 'GUACHARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0001', '0005', 'MUCURITAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0001', '0006', 'QUESERAS DEL MEDIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0002', '0001', 'BIRUACA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0003', '0001', 'BRUZUAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0003', '0002', 'MANTECAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0003', '0003', 'QUINTERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0003', '0004', 'RINCON HONDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0003', '0005', 'SAN VICENTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0004', '0001', 'CODAZZI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0004', '0002', 'CUNAVICHE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0004', '0003', 'SAN JUAN DE PAYARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0005', '0001', 'ARAMENDI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0005', '0002', 'EL AMPARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0005', '0003', 'GUASDUALITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0005', '0004', 'SAN CAMILO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0005', '0005', 'URDANETA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0006', '0001', 'ELORZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0006', '0002', 'LA TRINIDAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0007', '0001', 'EL RECREO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0007', '0002', 'PE�ALVER');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0007', '0003', 'SAN FERNANDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0003', '0007', '0004', 'SN RAFAEL DE ATAMAICA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0001', '0001', 'SAN MATEO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0002', '0001', 'CAMATAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0002', '0002', 'CARMEN DE CURA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0003', '0001', 'FRANCISCO DE MIRANDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0003', '0002', 'MONS FELICIANO G');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0003', '0003', 'SANTA RITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0004', '0001', 'ANDRES ELOY BLANCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0004', '0002', 'CHORONI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0004', '0003', 'JOAQUIN CRESPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0004', '0004', 'JOSE CASANOVA GODOY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0004', '0005', 'LAS DELICIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0004', '0006', 'LOS TACARIGUAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0004', '0007', 'MADRE MA DE SAN JOSE');
commit;
--prompt 800 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0004', '0008', 'PEDRO JOSE OVALLES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0005', '0001', 'CASTOR NIEVES RIOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0005', '0002', 'LA VICTORIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0005', '0003', 'LAS GUACAMAYAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0005', '0004', 'PAO DE ZARATE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0005', '0005', 'ZUATA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0006', '0001', 'EL CONSEJO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0007', '0001', 'SANTA CRUZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0008', '0001', 'PALO NEGRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0008', '0002', 'SAN MARTIN DE PORRES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0009', '0001', 'CA A DE AZUCAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0009', '0002', 'EL LIMON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0010', '0001', 'OCUMARE DE LA COSTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0011', '0001', 'GUIRIPA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0011', '0002', 'OLLAS DE CARAMACATE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0011', '0003', 'SAN CASIMIRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0011', '0004', 'VALLE MORIN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0012', '0001', 'SAN SEBASTIAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0013', '0001', 'ALFREDO PACHECO M');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0013', '0002', 'AREVALO APONTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0013', '0003', 'CHUAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0013', '0004', 'SAMAN DE GUERE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0013', '0005', 'TURMERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0014', '0001', 'LAS TEJERIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0014', '0002', 'TIARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0015', '0001', 'BELLA VISTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0015', '0002', 'CAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0016', '0001', 'COLONIA TOVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0017', '0001', 'BARBACOAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0017', '0002', 'LAS PE�ITAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0017', '0003', 'SAN FRANCISCO DE CARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0017', '0004', 'TAGUAY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0018', '0001', 'MAGDALENO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0018', '0002', 'PQ AUGUSTO MIJARES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0018', '0003', 'SAN FRANCISCO DE ASIS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0018', '0004', 'VALLES DE TUCUTUNEMO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0004', '0018', '0005', 'VILLA DE CURA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0001', '0001', 'ANDRES BELLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0001', '0002', 'NICOLAS PULIDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0001', '0003', 'TICOPORO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0002', '0001', 'RODRIGUEZ DOMINGUEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0002', '0002', 'SABANETA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0003', '0001', 'EL CANTON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0003', '0002', 'PUERTO VIVAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0003', '0003', 'SANTA CRUZ DE GUACAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0004', '0001', 'ARISMENDI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0004', '0002', 'GUADARRAMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0004', '0003', 'LA UNION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0004', '0004', 'SAN ANTONIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0001', 'ALFREDO A LARRIVA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0002', 'ALTO BARINAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0003', 'BARINAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0004', 'CORAZON DE JESUS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0005', 'DOMINGA ORTIZ P');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0006', 'EL CARMEN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0007', 'JUAN A RODRIGUEZ D');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0008', 'MANUEL P FAJARDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0009', 'RAMON I MENDEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0010', 'ROMULO BETANCOURT');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0011', 'SAN SILVESTRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0012', 'SANTA INES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0013', 'SANTA LUCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0005', '0014', 'TORUNOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0006', '0001', 'ALTAMIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0006', '0002', 'BARINITAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0006', '0003', 'CALDERAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0007', '0001', 'BARRANCAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0007', '0002', 'EL SOCORRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0007', '0003', 'MASPARRITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0008', '0001', 'JOSE IGNACIO DEL PUMAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0008', '0002', 'PEDRO BRICE�O MENDEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0008', '0003', 'RAMON IGNACIO MENDEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0008', '0004', 'SANTA BARBARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0009', '0001', 'EL REAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0009', '0002', 'LA LUZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0009', '0003', 'LOS GUASIMITOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0009', '0004', 'OBISPOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0010', '0001', 'CIUDAD BOLIVIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0010', '0002', 'IGNACIO BRICE�O');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0010', '0003', 'JOSE FELIX RIBAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0010', '0004', 'PAEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0011', '0001', 'DOLORES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0011', '0002', 'LIBERTAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0011', '0003', 'PALACIO FAJARDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0011', '0004', 'SANTA ROSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0012', '0001', 'CIUDAD DE NUTRIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0012', '0002', 'EL REGALO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0012', '0003', 'PUERTO DE NUTRIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0005', '0012', '0004', 'SANTA CATALINA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0001', 'CACHAMAY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0002', 'CHIRICA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0003', 'DALLA COSTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0004', 'ONCE DE ABRIL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0005', 'POZO VERDE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0006', 'SIMON BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0007', 'UNARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0008', 'UNIVERSIDAD');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0009', 'VISTA AL SOL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0001', '0010', 'YOCOIMA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0002', '0001', 'ALTAGRACIA');
commit;
--prompt 900 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0002', '0002', 'ASCENSION FARRERAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0002', '0003', 'CAICARA DEL ORINOCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0006', '0002', '0004', 'GUANIAMO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0008', '0005', 'SAN FCO DE MACAIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0008', '0006', 'SAN RAFAEL DE ORITUCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0008', '0007', 'SOUBLETTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0009', '0001', 'ORTIZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0009', '0002', 'S LORENZO DE TIZNADOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0009', '0003', 'SAN FCO. DE TIZNADOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0009', '0004', 'SAN JOSE DE TIZNADOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0010', '0001', 'SAN RAFAEL DE LAYA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0010', '0002', 'TUCUPIDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0011', '0001', 'CANTAGALLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0011', '0002', 'PARAPARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0011', '0003', 'SAN JUAN DE LOS MORROS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0012', '0001', 'SAN JOSE DE GUARIBE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0013', '0001', 'ALTAMIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0013', '0002', 'SANTA MARIA DE IPIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0014', '0001', 'CAZORLA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0014', '0002', 'GUAYABAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0015', '0001', 'SAN JOSE DE UNARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0012', '0015', '0002', 'ZARAZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0001', '0001', 'PIO TAMAYO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0001', '0002', 'QBDA. HONDA DE GUACHE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0001', '0003', 'YACAMBU');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0002', '0001', 'FREITEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0002', '0002', 'JOSE MARIA BLANCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0001', 'AGUEDO F. ALVARADO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0002', 'BUENA VISTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0003', 'CATEDRAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0004', 'EL CUJI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0005', 'JUAN DE VILLEGAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0006', 'JUAREZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0007', 'LA CONCEPCION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0008', 'SANTA ROSA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0009', 'TAMACA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0003', '0010', 'UNION');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0004', '0001', 'CRNEL. MARIANO PERAZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0004', '0002', 'CUARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0004', '0003', 'DIEGO DE LOZADA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0004', '0004', 'JOSE BERNARDO DORANTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0004', '0005', 'JUAN B RODRIGUEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0004', '0006', 'PARAISO DE SAN JOSE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0004', '0007', 'SAN MIGUEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0004', '0008', 'TINTORERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0005', '0001', 'ANZOATEGUI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0005', '0002', 'BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0005', '0003', 'GUARICO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0005', '0004', 'HILARIO LUNA Y LUNA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0005', '0005', 'HUMOCARO ALTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0005', '0006', 'HUMOCARO BAJO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0005', '0007', 'LA CANDELARIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0005', '0008', 'MORAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0006', '0001', 'AGUA VIVA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0006', '0002', 'CABUDARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0006', '0003', 'JOSE G. BASTIDAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0007', '0001', 'BURIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0007', '0002', 'GUSTAVO VEGAS LEON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0007', '0003', 'SARARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0001', 'ALTAGRACIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0002', 'ANTONIO DIAZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0003', 'CAMACARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0004', 'CASTA�EDA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0005', 'CECILIO ZUBILLAGA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0006', 'CHIQUINQUIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0007', 'EL BLANCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0008', 'ESPINOZA LOS MONTEROS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0009', 'HERIBERTO ARROYO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0010', 'LARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0011', 'LAS MERCEDES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0012', 'MANUEL MORILLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0013', 'MONTA A VERDE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0014', 'MONTES DE OCA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0015', 'REYES VARGAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0016', 'TORRES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0008', '0017', 'TRINIDAD SAMUEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0009', '0001', 'MOROTURO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0009', '0002', 'SAN MIGUEL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0009', '0003', 'SIQUISIQUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0013', '0009', '0004', 'XAGUAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0001', '0001', 'ARAGUITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0001', '0002', 'AREVALO GONZALEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0001', '0003', 'CAPAYA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0001', '0004', 'CAUCAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0001', '0005', 'EL CAFE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0001', '0006', 'MARIZAPA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0001', '0007', 'PANAQUIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0001', '0008', 'RIBAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0002', '0001', 'CUMBO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0002', '0002', 'SAN JOSE DE BARLOVENTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0003', '0001', 'BARUTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0003', '0002', 'EL CAFETAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0003', '0003', 'LAS MINAS DE BARUTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0004', '0001', 'CURIEPE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0004', '0002', 'HIGUEROTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0004', '0003', 'TACARIGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0005', '0001', 'MAMPORAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0006', '0001', 'CARRIZAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0007', '0001', 'CHACAO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0008', '0001', 'CHARALLAVE');
commit;
--prompt 1000 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0008', '0002', 'LAS BRISAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0009', '0001', 'EL HATILLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0010', '0001', 'ALTAGRACIA DE LA M');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0010', '0002', 'CECILIO ACOSTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0010', '0003', 'EL JARILLO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0010', '0004', 'LOS TEQUES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0010', '0005', 'PARACOTOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0010', '0006', 'SAN PEDRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0010', '0007', 'TACATA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0011', '0001', 'EL CARTANAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0011', '0002', 'STA TERESA DEL TUY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0012', '0001', 'LA DEMOCRACIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0012', '0002', 'OCUMARE DEL TUY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0012', '0003', 'SANTA BARBARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0013', '0001', 'SAN ANTONIO LOS ALTOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0014', '0001', 'SANTA LUCIA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0015', '0001', 'CUPIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0015', '0002', 'MACHURUCUTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0016', '0001', 'GUARENAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0017', '0001', 'EL GUAPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0017', '0002', 'PAPARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0017', '0003', 'RIO CHICO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0017', '0004', 'SAN FERNANDO DEL GUAPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0017', '0005', 'TACARIGUA DE LA LAGUNA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0018', '0001', 'SAN ANTONIO DE YARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0018', '0002', 'SAN FCO DE YARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0019', '0001', 'CAUCAGUITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0019', '0002', 'FILAS DE MARICHES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0019', '0003', 'LA DOLORITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0019', '0004', 'LEONCIO MARTINEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0019', '0005', 'PETARE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0020', '0001', 'CUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0020', '0002', 'NUEVA CUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0021', '0001', 'BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0014', '0021', '0002', 'GUATIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0001', '0001', 'SAN ANTONIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0001', '0002', 'SAN FRANCISCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0002', '0001', 'AGUASAY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0003', '0001', 'CARIPITO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0004', '0001', 'CARIPE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0004', '0002', 'EL GUACHARO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0004', '0003', 'LA GUANOTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0004', '0004', 'SABANA DE PIEDRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0004', '0005', 'SAN AGUSTIN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0004', '0006', 'TERESEN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0005', '0001', 'AREO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0005', '0002', 'CAICARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0005', '0003', 'SAN FELIX');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0005', '0004', 'VIENTO FRESCO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0006', '0001', 'EL TEJERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0006', '0002', 'PUNTA DE MATA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0007', '0001', 'CHAGUARAMAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0007', '0002', 'LAS ALHUACAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0007', '0003', 'TABASCA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0007', '0004', 'TEMBLADOR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0001', 'ALTO DE LOS GODOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0002', 'BOQUERON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0003', 'EL COROZO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0004', 'EL FURRIAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0005', 'JUSEPIN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0006', 'LA PICA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0007', 'LAS COCUIZAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0008', 'SAN SIMON');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0009', 'SAN VICENTE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0008', '0010', 'SANTA CRUZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0009', '0001', 'APARICIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0009', '0002', 'ARAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0009', '0003', 'CHAGUARAMAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0009', '0004', 'EL PINTO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0009', '0005', 'GUANAGUANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0009', '0006', 'LA TOSCANA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0009', '0007', 'TAGUAYA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0010', '0001', 'CACHIPO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0010', '0002', 'QUIRIQUIRE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0011', '0001', 'SANTA BARBARA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0012', '0001', 'BARRANCAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0012', '0002', 'LOS BARRANCOS DE FAJARDO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0015', '0013', '0001', 'URACOA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0001', '0001', 'GABRIEL PICON G.');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0001', '0002', 'HECTOR AMABLE MORA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0001', '0003', 'JOSE NUCETE SARDI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0001', '0004', 'PRESIDENTE BETANCOURT');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0001', '0005', 'PRESIDENTE PAEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0001', '0006', 'PTE. ROMULO GALLEGOS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0001', '0007', 'PULIDO MENDEZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0002', '0001', 'LA AZULITA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0003', '0001', 'MESA BOLIVAR');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0003', '0002', 'MESA DE LAS PALMAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0003', '0003', 'STA CRUZ DE MORA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0004', '0001', 'ARICAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0004', '0002', 'SAN ANTONIO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0005', '0001', 'CANAGUA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0005', '0002', 'CAPURI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0005', '0003', 'CHACANTA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0005', '0004', 'EL MOLINO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0005', '0005', 'GUAIMARAL');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0005', '0006', 'MUCUCHACHI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0005', '0007', 'MUCUTUY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0006', '0001', 'ACEQUIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0006', '0002', 'FERNANDEZ PE�A');
commit;
--prompt 1100 records committed...
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0006', '0003', 'JAJI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0006', '0004', 'LA MESA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0006', '0005', 'MATRIZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0006', '0006', 'MONTALBAN');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0006', '0007', 'SAN JOSE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0007', '0001', 'FLORENCIO RAMIREZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0007', '0002', 'TUCANI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0008', '0001', 'LAS PIEDRAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0008', '0002', 'SANTO DOMINGO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0009', '0001', 'GUARAQUE');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0009', '0002', 'MESA DE QUINTERO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0009', '0003', 'RIO NEGRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0010', '0001', 'ARAPUEY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0010', '0002', 'PALMIRA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0011', '0001', 'SAN CRISTOBAL DE TORONDOY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0011', '0002', 'TORONDOY');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0001', 'ANTONIO SPINETTI DINI');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0002', 'ARIAS');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0003', 'CARACCIOLO PARRA P');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0004', 'DOMINGO PE�A');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0005', 'EL LLANO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0006', 'EL MORRO');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0007', 'GONZALO PICON FEBRES');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0008', 'JACINTO PLAZA');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0009', 'JUAN RODRIGUEZ SUAREZ');
insert into FORDEFPAR (CODEST, CODMUN, CODPAR, DESPAR)
values ('0016', '0012', '0010', 'LASSO DE LA VEGA');
commit;
--prompt 1125 records loaded
--prompt Loading FORDEFSEC...
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0001', 'DIRECCION SUPERIOR DEL ESTADO');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0002', 'SEGURIDAD Y DEFENSA');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0003', 'AGRICOLA');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0004', 'ENERGIA, MINAS Y PETROLEO');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0005', 'INDUSTRIA Y COMERCIO');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0006', 'TURISMO Y RECREACION');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0007', 'TRANSPORTE Y COMUNICACIONES');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0008', 'EDUCACION');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0009', 'CULTURA Y COMUNICACION SOCIAL');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0010', 'CIENCIA Y TECNOLOGIA');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0011', 'VIVIENDA, DESARROLLO URBANO Y SERVICIO CONEXOS');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0012', 'SALUD');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0013', 'DESARROLLO SOCIAL Y PARTICIPACION');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0014', 'SEGURIDAD SOCIAL');
insert into FORDEFSEC (CODSEC, NOMSEC)
values ('0015', 'GASTOS NO CLASIFICADOS SECTORIALMENTE');
commit;
--prompt 15 records loaded
--prompt Loading FORDEFSITPRE...

insert into FORDEFSITPRE (CODSITPRE, DESSITPRE)
values ('01', 'POR INICIAR');
insert into FORDEFSITPRE (CODSITPRE, DESSITPRE)
values ('02', 'A REACTIVAR');
insert into FORDEFSITPRE (CODSITPRE, DESSITPRE)
values ('03', 'EN EJECUCION');
commit;
--prompt 3 records loaded
--prompt Loading FORDEFSTA...
insert into FORDEFSTA (CODSTA, DESSTA)
values ('01', 'IDEA');
insert into FORDEFSTA (CODSTA, DESSTA)
values ('02', 'ESTUDIO PRELIMINAR');
insert into FORDEFSTA (CODSTA, DESSTA)
values ('03', 'PRE FACTIBILIDAD');
insert into FORDEFSTA (CODSTA, DESSTA)
values ('04', 'FACTIBILIDAD');
insert into FORDEFSTA (CODSTA, DESSTA)
values ('05', 'FORMULADO');
insert into FORDEFSTA (CODSTA, DESSTA)
values ('06', 'EN OPERACION');
insert into FORDEFSTA (CODSTA, DESSTA)
values ('07', 'EN EJECUCION');
commit;
--prompt 7 records loaded
--prompt Loading FORDEFSUBOBJ...
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('01', '006', 'ALCANZAR LA SOSTENIBILIDAD FISCAL');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('01', '001', 'ALCANZAR UN CRECIMIENTO SOSTENIDO Y  DIVERSIFICADO' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('01', '002', 'ELIMINAR LA VOLATILIDAD ECONOMICA' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('01', '003', 'INTERNACIONALIZAR LOS HIDROCARBUROS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('01', '004', 'DESARROLLAR LA ECONOMIA SOCIAL' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('01', '005', 'INCREMENTAR EL AHORRO Y LA INVERSION' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('02', '001', 'GARANTIZAR EL DISFRUTE DE LOS DERECHOS SOCIALES DE FORMA UNIVERSALY EQUITATIVA' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('02', '002', 'MEJORAR LA DISTRIBUCION DEL INGRESO Y LA RIQUEZA' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('02', '003', 'FORTALECER LA PARTICIPACION SOCIAL Y GENERAR PODER CIUDADANO, EN ESPACIOS PUBLICOS DE DECISION' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('03', '001', 'CONSOLIDAR ESTABILIDAD POLITICA Y SOCIAL' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('03', '002', 'DESARROLLAR EL NUEVO MARCO JURIDICO INSTITUCIONAL' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('03', '003', 'CONTRIBUIR AL ESTABLECIMIENTO DE LA DEMOCRACIA PARTICIPATIVA Y PROTAGONICA' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('04', '001', 'AUMENTAR LAS ACTIVIDADES PRODUCTIVAS Y LA POBLACION EN AREAS DE DESCONCENTRACION' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('04', '002', 'INCREMENTAR LA SUPERFICIE OCUPADA' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('04', '003', 'MEJORAR LA INFRAESTRUCTURA FISICA Y SOCIAL PARA TODO EL PAIS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('05', '001', 'IMPULSAR LA MULTIPOLARIDAD DE LA SOCIEDAD INTERNACIONAL' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('05', '002', 'PROMOVER LA INTEGRACION LATINOAMERICANA Y CARIBE�A' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('05', '003', 'CONSOLIDAR Y DIVERSIFICAR LAS RELACIONES INTERNACIONALES' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('05', '004', 'FORTALECER EL POSICIONAMIENTO DE VENEZUELA EN LA ECONOMIA INTERNACIONAL' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBOBJ (CODEQU, CODSUBOBJ, DESSUBOBJ)
values ('05', '005', 'PROMOVER UN NUEVO REGIMEN DE SEGURIDAD INTEGRAL HEMISFERICO' || chr(13) || '' || chr(10) || '');
commit;
--prompt 20 records loaded
--prompt Loading FORDEFSUBSEC...

insert into FORDEFSUBSEC (CODSEC, CODSUBSEC, NOMSUBSEC)
values ('0003', '0001', 'SUB SECTOR AGRICOLA 1');
insert into FORDEFSUBSEC (CODSEC, CODSUBSEC, NOMSUBSEC)
values ('0003', '0002', 'SUB SECTOR AGRICOLA 2');
commit;
--prompt 2 records loaded
--prompt Loading FORDEFSUBSUBOBJ...
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '006', '001', 'OPTIMIZAR LA TRIBUTACION PETROLERA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '006', '002', 'AUMENTAR Y DIVERSIFICAR RECAUDACION NO PETROLERA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '006', '003', 'RACIONALIZAR GASTO PRIMARIO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '006', '004', 'GESTION DE LA DEUDA PUBLICA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '005', '001', 'INCENTIVAR Y CREA CONDICIONES PARA EL AHORRO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '005', '002', 'DESARROLLAR EL MERCADO DE CAPITALES');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '005', '003', 'DESARROLLAR LAS CADENAS FINANCIERAS');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '005', '004', 'REGIMEN DE SEGURIDAD Y FONDOS DE PENSIONES');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '005', '005', 'PROMOCION DE INVERSION PRODUCTIVA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '003', '001', 'INCENTIVAR EL DESARROLLO DE REDES SOCIALES');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '003', '002', 'PROMOVER LAS ORGANIZACIONES DE BASE');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '003', '003', 'ESTIMULAR LA SOCIEDAD CONTRALORA DE LO PUBLICO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '003', '004', 'FOMENTAR LA CORRESPONSABILIDAD CIUDADANA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '001', 'EDUCACION DE CALIDAD PARA TODOS');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '002', 'SALUD Y CALIDAD DE VIDA PARA TODOS');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '003', 'SEGURIDAD SOCIAL UNIVERSAL');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '004', 'VIVIVIENDA Y AMBIENTE SANO, SEGURO Y ECOLOGICAMENTE EQUILIBRADO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '005', 'SEGURIDAD CIUDADANA PERMANENTE');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '006', 'ACCESO PLENO A LA CULTURA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '007', 'UNIVERSALIZAR EL DEPORTE Y FORTALECER EL DEPORTE DE ALTO RENDIMIENTO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '008', 'ATENCION ESPECIAL PARA LA POBLACION EN POBREZA EXTREMA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '009', 'RECREACION AL ALCANCE DE LAS MAYORIAS');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '001', '010', 'INFORMACION VERAZ Y OPORTUNA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '002', '001', 'FORTALECER LA ECONOMIA SOCIAL');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '002', '002', 'DEMOCRATIZAR LA PROPIEDAD DE LA TIERRA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '002', '003', 'GENERAR EMPLEO PRODUCTIVO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('02', '002', '004', 'REESTRUCTURAR EL REGIMEN DE REMUNERACIONES');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('03', '001', '001', 'DISE�AR E IMPLEMENTAR EL SISTEMA NACIONAL DE PLANIFICACION');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('03', '001', '002', 'MEJORAR LA CALIDAD DE LA GESTION PUBLICA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('03', '001', '003', 'FORTALECER LA CAPACIDAD DE NEGOCIACION  ESTRATEGICA DEL PODER EJECUTIVO NACIONAL');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('03', '002', '001', 'FORMAR LAS LEYES D ELA NUEVA INSTITUCIONALIDAD');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('03', '002', '002', 'CONSTRUIR EL NUEVO ESQUEMA INSTITUCIONAL DE FUNCIONAMIENTO DE LA ADMINISTRACION PUBLICA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('03', '003', '001', 'PROPICIAR Y CREAR MECANISMOS E INSTANCIAS PARA LA PARTICIPACION CIUDADANA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('03', '003', '002', 'CONSTRUIR EL ESTADO FEDERAL DESCENTRALIZADO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('03', '003', '003', 'ESTABLECER SISTEMAS DE RENDICION DE CUENTAS');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '001', '001', 'CONFIGURAR UN SISTEMA MUNDIAL MAS EQUILIBRADO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '001', '002', 'PROMOVER LA DEMOCRACIA PARTICIPATIVA Y PROTAGONICA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '001', '003', 'COADYUVAR A LA PROMOCION Y PROTECCION DE LOS DERECHOS HUMANOS');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '001', '004', 'INTENSIFICAR EL APOYO AL PROCESO DE PACIFICACION REGIONAL');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '002', '001', 'IMPULSAR LA INTEGRACION POLITICA COMO OPCION ESTRATEGICA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '002', '002', 'IMPULSAR UN NUEVO MODELO DE INTEGRACION ECONOMICA EN AMERICA LATINA Y EL CARIBE');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '002', '003', 'POTENCIAR EL INTERCAMBIO CULTURAL Y HUMANO EN EL AREA LATINOAMERICANA Y DEL CARIBE');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '002', '004', 'PROPULSAR EL ACERCAMIENTO DE AMERICA LATINA CON OTROS PAISES Y REGIONES');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '003', '001', 'REAFIRMAR LAS RELACIONES CON PAISES VECINOS Y LOS SOCIOS ECONOMICOS DE VENEZUELA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '003', '002', 'FORTALECER LA COOPERACION SUR-SUR');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '003', '003', 'AMPLIAR LAS RELACIONES CON OTRAS REGIONES Y PAISES');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '004', '001', 'AFIANZAR LA VIGENCIA Y LA PROYECCION DE LA OPEP');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '004', '002', 'ACELERAR LA INTERNACIONALIZACION DE LA ECONOMICA DE VENEZUELA');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '004', '003', 'CONTRIBUIR AL INCREMENTO DE LAS ASOCIACIONES ESTRATEGICAS');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '005', '001', 'IMPLEMENTAR EL NUEVO MODELO DE LA FUERZA ARMADA NACIONAL');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('05', '005', '002', 'FORTALECER LA DEFENSA REGIONAL');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '001', '001', 'DIVERSIFICAR LA PRODUCCION');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '001', '003', 'GARANTIZAR LA SEGURIDAD ALIMENTARIA' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '001', '004', 'AUMENTAR Y FORTALECER LA PYME' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '001', '005', 'INCORPORAR Y ADAPTAR NUEVAS TECNOLOGIAS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '001', '006', 'CONSOLIDAR EL SECTOR FINANCIERO' || chr(13) || '' || chr(10) || '' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '002', '001', 'LOGRAR LAS CONDICIONES MACROECONOMICAS PARA UN CRECIMIENTO ESTABLE' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '002', '002', 'ESTABILIZAR EL TIPO DE CAMBIO' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '002', '003', 'LOGRAR EL FUNCIONAMIENTO DEL MERCADO MONETARIO');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '002', '004', 'GARANTIZAR LA SEGURIDAD JURIDICA Y LEGISLACION ESTABLE' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '003', '001', 'ASEGURAR LA COLOCACION DE CRUDOS Y PRODUCTOS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '003', '002', 'CREAR LA INDUSTRIA DE GAS LIBRE' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '003', '003', 'INTERNALIZAR LA ACTIVIDAD PETROLERA Y RACIONALIZAR EL MERCADO INTERNO' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '003', '004', 'TRANSFORMAR LOS CRUDOS EN PESADOS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '004', '001', 'FORTALECER LA MICROEMPRESA Y LAS COOPERATIVAS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '004', '002', 'ORGANIZAR EL SISTEMA DE MICROFINANZAS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '004', '003', 'DEMOCRATIZAR LA PROPIEDAD DE LA TIERRA' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('01', '001', '002', 'FORTALECER LA INTEGRACION DE LAS CADENAS PRODUCTIVAS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '001', '001', 'MEJORAR LOS SERVICIOS PUBLICOS Y LAS CONDICIONES AMBIENTALES EN LAS AREAS DE DESCONCENTRACION' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '001', '002', 'ESTABLECER PROGRAMAS DE DESARROLLO RURAL INTEGRAL' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '001', '003', 'PROMOVER INCENTIVOS PARA LA LOCALIZACION DE ACTIVIDADES PRODUCTIVAS Y DE POBLACION' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '001', '004', 'PROMOVER EL ESTABLECIMIENTO DE ZONAS ESPECIALES DE DESARROLLO' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '002', '001', 'RACIONALIZAR EL USO DE LOS RECURSOS NATURALES' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '002', '002', 'DOTAR DE TIERRAS E INSUMOS PARA LA PRODUCCION' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '002', '003', 'INCREMENTAR LA INFRAESTRUCTURA DE APOYO A LA PRODUCCION' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '002', '004', 'PROMOVER LAS ACTIVIDADES AGRICOLAS, INDUSTRIALES, TURISTICAS, MINERAS Y ENERGETICAS' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '003', '001', 'INCREMENTAR EL EQUIPAMIENTO DE CENTROS POBLADOS RACIONALIZADOS EL ORDENAMIENTO URBANO' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '003', '002', 'MEJORAR LA VIALIDAD Y EL TRANSPORTE MULTIMODAL' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '003', '003', 'MEJORAR Y CONSTRUIR SISTEMAS DE INFORMACION Y COMUNICACION' || chr(13) || '' || chr(10) || '');
insert into FORDEFSUBSUBOBJ (CODEQU, CODSUBOBJ, CODSUBSUBOBJ, DESSUBSUBOBJ)
values ('04', '003', '004', 'CONSTRUIR SISTEMAS DE GENERACION, TRANSMISION Y DISTRIBUCION DE NEERGIA' || chr(13) || '' || chr(10) || '');
commit;
--prompt 80 records loaded
--prompt Loading FORDEFTIPCNX...
insert into FORDEFTIPCNX (CODTIPCNX, DESTIPCNX)
values ('001', 'RESPONSABLE');
insert into FORDEFTIPCNX (CODTIPCNX, DESTIPCNX)
values ('002', 'EJECUTOR');
insert into FORDEFTIPCNX (CODTIPCNX, DESTIPCNX)
values ('003', 'REQUIERE CONTRIBUCION');
insert into FORDEFTIPCNX (CODTIPCNX, DESTIPCNX)
values ('004', 'CONTRIBUYE A LA GESTION');
commit;

