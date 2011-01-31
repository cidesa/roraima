ALTER TABLE "opdefemp"
  ADD COLUMN ordcre character varying(4);

ALTER TABLE "npliquidacion_det"
   ALTER dias TYPE numeric(14, 2);