--CARLOS RAMIREZ
alter table npvacdisfrute
  add column diasbonovac numeric(14,2),
  add column diasbonovacpag numeric(14,2);


alter table npvacsalidas_det
  add column diasbonovac numeric(14,2),
  add column diasbonovacpag numeric(14,2);

alter table npvacsalidas
  add column fecpagbonvac date;

alter table npbonocont
  add column diapro numeric(3,0);

alter table NPACUMULACPT
  add column codnom varchar(3);