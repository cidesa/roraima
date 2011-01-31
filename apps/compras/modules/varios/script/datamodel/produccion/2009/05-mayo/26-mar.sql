-----------------------------------------------------------------
---Cambiar la longitud del campo CODPRO a 15, ya que en algunas BD (logicasa, IDEA) estaba de 10
----------------------------------------------------------------
ALTER TABLE caprovee ALTER codpro TYPE character varying(15);