--Se creo este campo para agregar el Numero de Forma Preimpresa que se va generar con la Forma Preimpresa
-- de la Orden de Pago Desireé Martínez
ALTER TABLE "opordpag"
  ADD COLUMN "numforpre" VARCHAR(8);

--Definicion de Articulos
ALTER TABLE "cadefart"
  ADD COLUMN "tipdocpre" varchar(4);
