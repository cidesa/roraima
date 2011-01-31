--Carlos Ramirez
alter table npantpre
  add column fecsolant date;

alter table npadeint 
  add column fecsolade date;
  
alter table npnomesptipos
  add column nomintpre varchar(1);  
  
alter table npdefespparpre
 add column codpar varchar(32);