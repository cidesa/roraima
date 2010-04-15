--Se creo este campo para agregar el Numero de Forma Preimpresa que se va generar con la Forma Preimpresa
-- de la Orden de Pago Desireé Martínez
ALTER TABLE "opordpag"
  ADD COLUMN "numforpre" VARCHAR(8);

--Se agrego el campo numcom en la tabla de Nota de Entrega de Facturacion para grabar
-- el numero de comprobante asociado
ALTER TABLE "fanotent"
  ADD COLUMN "numcom" VARCHAR(8);
--CARLOS RAMIREZ
alter table nphojint
  add column seghcm varchar(1),
  add column porseghcm numeric(5,2);
alter table npinffam 
  add column porseghcm numeric(5,2);    