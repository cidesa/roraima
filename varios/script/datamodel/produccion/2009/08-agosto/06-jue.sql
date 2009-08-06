--CARLOS RAMIREZ
alter table nphojint
  add column seghcm varchar(1),
  add column porseghcm numeric(5,2);
alter table npinffam
  add column porseghcm numeric(5,2);

--Se agrego el campo numcom en la tabla de Nota de Entrega de Facturacion para grabar
-- el numero de comprobante asociado
ALTER TABLE "fanotent"
  ADD COLUMN "numcom" VARCHAR(8);
  
alter table npseghcm
  add column codconapo varchar(3);