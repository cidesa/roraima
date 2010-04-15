-- Matriz Nueva de Barcelona Agregar si los Cheque de la cuenta son o no endosable. Desireé M.

ALTER TABLE "tsdefban"
  ADD COLUMN "endosable" varchar(1);
  
--CARLOS RAMIREZ
ALTER TABLE npasipre
  ADD COLUMN afealibv varchar(1),
  ADD COLUMN afealibf varchar(1);