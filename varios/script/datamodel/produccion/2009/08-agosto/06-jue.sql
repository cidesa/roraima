--CARLOS RAMIREZ
alter table nphojint
  add column seghcm varchar(1),
  add column porseghcm numeric(5,2);
alter table npinffam 
  add column porseghcm numeric(5,2);  