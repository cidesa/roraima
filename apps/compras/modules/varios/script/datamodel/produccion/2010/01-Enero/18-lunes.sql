--NOTA: En caso de que existan registros  en blanco se debe hacer un update al campo del constraint.

--Formulario de Recaudos
ALTER TABLE carecaud ADD CONSTRAINT unique_carecaud_codrec UNIQUE (codrec);
ALTER TABLE "carecpro" ADD CONSTRAINT "carecpro_FK_2" FOREIGN KEY ("codrec") REFERENCES "carecaud" ("codrec");

--Formulario de Condicion de Pago
ALTER TABLE caordcom ALTER conpag TYPE character varying(1000);
ALTER TABLE caordcom
   ALTER COLUMN conpag SET NOT NULL;
ALTER TABLE caconpag ADD CONSTRAINT unique_caconpag_codconpag UNIQUE (codconpag);
ALTER TABLE "caordcom" ADD CONSTRAINT "caordcom_FK_1" FOREIGN KEY ("conpag") REFERENCES "caconpag" ("codconpag");

--Formulario  Tiempo de Entrega
ALTER TABLE caforent ADD CONSTRAINT unique_caforent_codforent UNIQUE (codforent);
ALTER TABLE caordcom ALTER forent TYPE character varying(1000);
ALTER TABLE caordcom
   ALTER COLUMN forent SET NOT NULL;
ALTER TABLE "caordcom" ADD CONSTRAINT "caordcom_FK_2" FOREIGN KEY ("forent") REFERENCES "caforent" ("codforent");

--Formulario Razon de Compra
ALTER TABLE carazcom ADD CONSTRAINT unique_carazcom_codrazcom UNIQUE (codrazcom);
ALTER TABLE "casolraz" ADD CONSTRAINT "casolraz_FK_1" FOREIGN KEY ("codrazcom") REFERENCES "carazcom" ("codrazcom");

--Formulario Motivo de Faltante
ALTER TABLE camotfal ADD CONSTRAINT pkey_codfal PRIMARY KEY (codfal);
ALTER TABLE "caartrcp" ADD CONSTRAINT "caartrcp_FK_1" FOREIGN KEY ("codfal") REFERENCES "camotfal" ("codfal");

--Formulario Tipo de Entradas
ALTER TABLE catipent ALTER codtipent TYPE character varying(3);
ALTER TABLE catipent
   ALTER COLUMN codtipent SET NOT NULL;
ALTER TABLE catipent ALTER destipent TYPE character varying(50);
ALTER TABLE catipent
   ALTER COLUMN destipent SET NOT NULL;
ALTER TABLE catipent ADD CONSTRAINT unique_catipent_codtipent UNIQUE (codtipent);
ALTER TABLE caentalm ALTER tipmov TYPE character varying(3);
ALTER TABLE caentalm
   ALTER COLUMN tipmov SET NOT NULL;
ALTER TABLE "caentalm" ADD CONSTRAINT "caentalm_FK_1" FOREIGN KEY ("tipmov") REFERENCES "catipent" ("codtipent");

--Formulario Tipo de Salidas
ALTER TABLE catipsal ALTER codtipsal TYPE character varying(3);
ALTER TABLE catipsal
   ALTER COLUMN codtipsal SET NOT NULL;
ALTER TABLE catipsal ALTER destipsal TYPE character varying(50);
ALTER TABLE catipsal
   ALTER COLUMN destipsal SET NOT NULL;
ALTER TABLE catipsal ADD CONSTRAINT unique_catipsal_codtipsal UNIQUE (codtipsal);
ALTER TABLE casalalm ALTER tipmov TYPE character varying(3);
ALTER TABLE casalalm
   ALTER COLUMN tipmov SET NOT NULL;
ALTER TABLE "casalalm" ADD CONSTRAINT "casalalm_FK_1" FOREIGN KEY ("tipmov") REFERENCES "catipsal" ("codtipsal");

--Formulario de Grupo de Recaudos
ALTER TABLE catiprec ALTER destiprec TYPE character varying(100);
ALTER TABLE catiprec
   ALTER COLUMN destiprec SET NOT NULL;
ALTER TABLE catiprec ADD CONSTRAINT unique_catiprec_codtiprec UNIQUE (codtiprec);
ALTER TABLE "carecaud" ADD CONSTRAINT "carecaud_FK_1" FOREIGN KEY ("codtiprec") REFERENCES "catiprec" ("codtiprec");

--Formulario de Proveedores
ALTER TABLE "caordcom" ADD CONSTRAINT "caordcom_FK_4" FOREIGN KEY ("codpro") REFERENCES "caprovee" ("codpro");

--Formulario de Ubicación
ALTER TABLE cadefubi ADD CONSTRAINT unique_cadefubi_codubi UNIQUE (codubi);
ALTER TABLE caalmubi ALTER codubi TYPE character varying(20);
ALTER TABLE caalmubi
   ALTER COLUMN codubi SET NOT NULL;
ALTER TABLE "caalmubi" ADD CONSTRAINT "caalmubi_FK_1" FOREIGN KEY ("codubi") REFERENCES "cadefubi" ("codubi");
ALTER TABLE caartalmubi ALTER codubi TYPE character varying(20);
ALTER TABLE caartalmubi
   ALTER COLUMN codubi SET NOT NULL;
ALTER TABLE "caartalmubi" ADD CONSTRAINT "caartalmubi_FK_1" FOREIGN KEY ("codubi") REFERENCES "cadefubi" ("codubi");

--Formulario de Recargos
ALTER TABLE carecarg ADD CONSTRAINT unique_carecarg_codrgo UNIQUE (codrgo);
ALTER TABLE "cargosol" ADD CONSTRAINT "cargosol_FK_1" FOREIGN KEY ("codrgo") REFERENCES "carecarg" ("codrgo");