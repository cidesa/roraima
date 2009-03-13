
-----------------------------------------------------------------------------
-- apli_user
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "apli_user_seq" CASCADE;

CREATE SEQUENCE "apli_user_seq";


ALTER TABLE "apli_user" DROP COLUMN ID;



ALTER TABLE "apli_user" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('apli_user_seq'::regclass);


ALTER TABLE "apli_user" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- empresa
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "empresa_seq" CASCADE;

CREATE SEQUENCE "empresa_seq";


ALTER TABLE "empresa" DROP COLUMN ID;



ALTER TABLE "empresa" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('empresa_seq'::regclass);


ALTER TABLE "empresa" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- usuarios
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "usuarios_seq" CASCADE;

CREATE SEQUENCE "usuarios_seq";


ALTER TABLE "usuarios" DROP COLUMN ID;



ALTER TABLE "usuarios" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('usuarios_seq'::regclass);


ALTER TABLE "usuarios" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- aplifor
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "aplifor_seq" CASCADE;

CREATE SEQUENCE "aplifor_seq";


ALTER TABLE "aplifor" DROP COLUMN ID;



ALTER TABLE "aplifor" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('aplifor_seq'::regclass);


ALTER TABLE "aplifor" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- aplicacion
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "aplicacion_seq" CASCADE;

CREATE SEQUENCE "aplicacion_seq";


ALTER TABLE "aplicacion" DROP COLUMN ID;



ALTER TABLE "aplicacion" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('aplicacion_seq'::regclass);


ALTER TABLE "aplicacion" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- division
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "division_seq" CASCADE;

CREATE SEQUENCE "division_seq";


ALTER TABLE "division" DROP COLUMN ID;



ALTER TABLE "division" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('division_seq'::regclass);


ALTER TABLE "division" ADD PRIMARY KEY ("id");
