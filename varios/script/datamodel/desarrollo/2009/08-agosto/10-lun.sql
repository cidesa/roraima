--Se creo el campo tipo para indicar si el ajuste es por arriba o por debajo
ALTER TABLE "faajuste"
  ADD COLUMN "tipo" VARCHAR(8);

--CARLOS RAMIREZ
ALTER TABLE NPVACDIADIS
  ADD COLUMN JORNADA VARCHAR(1);
