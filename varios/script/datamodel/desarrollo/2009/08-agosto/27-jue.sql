-- Se le modifico el tamaño ala campo
ALTER TABLE bndismue
  ALTER tipdismue TYPE character varying(100);
  
--CARLSO RAMIREZ
alter table npdefespparpre  
  add column tipsalajunodep character varying(2),
  add column tipsalbonfinanofra character varying(2),
  add column factorbonfinanofra numeric(14,2),
  add column tipsalbonvacfra character varying(2),
  add column factorbonvacfra numeric(14,2),
  add column descripclau character varying(250),
  add column codret character varying(2),
  add column numdiaant integer,
  add column poranoant character varying(1),
  add column tipsaldiaant character varying(2);