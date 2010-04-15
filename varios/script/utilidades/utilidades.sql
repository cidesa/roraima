set search_path to "SIMA002";

CREATE OR REPLACE FUNCTION "SIMA002".elimina_datos(esquema character varying, tabla character varying)
  RETURNS boolean AS
$BODY$
DECLARE
    REGISTRO RECORD;
    TABLAS CURSOR IS SELECT TABLE_NAME FROM "information_schema".TABLES
                     WHERE table_schema=ESQUEMA
                     AND TABLE_TYPE='BASE TABLE' AND TABLE_NAME LIKE TABLA
                     AND TABLE_TYPE='BASE TABLE'
                     ORDER BY TABLE_NAME;
begin
  OPEN TABLAS;
  FETCH TABLAS INTO REGISTRO;
  IF FOUND THEN
     LOOP
        EXECUTE 'DELETE FROM '||REGISTRO.TABLE_NAME;
  FETCH TABLAS INTO REGISTRO;
        IF NOT FOUND THEN
           EXIT;
        END IF;
     END LOOP;
  END IF;
  CLOSE TABLAS;
  return(true);
end;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".elimina_datos(character varying, character varying) OWNER TO postgres;


CREATE OR REPLACE FUNCTION "SIMA002".crea_id(esquema character varying)
  RETURNS boolean AS
$BODY$
DECLARE
    REGISTRO RECORD;
    TABLAS CURSOR IS SELECT TABLE_NAME FROM "information_schema".TABLES
                     WHERE table_schema=ESQUEMA
                     AND TABLE_TYPE='BASE TABLE'
                     ORDER BY TABLE_NAME;
begin
  OPEN TABLAS;
  FETCH TABLAS INTO REGISTRO;
  IF FOUND THEN
     LOOP
        IF EXISTS (SELECT * FROM "information_schema".COLUMNS
                   WHERE table_schema=ESQUEMA
                   and TABLE_NAME=REGISTRO.TABLE_NAME
                   and COLUMN_NAME='id') THEN
           EXECUTE 'ALTER TABLE '||REGISTRO.TABLE_NAME||' DROP COLUMN ID CASCADE';
        END IF;
        IF EXISTS (SELECT relname
          FROM pg_class
         WHERE relkind = 'S'
           AND relnamespace IN (
                SELECT oid
                  FROM pg_namespace
                 WHERE nspname NOT LIKE 'pg_%'
                        AND relname = REGISTRO.TABLE_NAME||'_seq'
                   AND nspname = ESQUEMA)) THEN
           EXECUTE 'DROP SEQUENCE "'||ESQUEMA||'".'||REGISTRO.TABLE_NAME||'_seq CASCADE';
        END IF;
    IF EXISTS (SELECT relname
          FROM pg_class
         WHERE relkind = 'S'
           AND relnamespace IN (
                SELECT oid
                  FROM pg_namespace
                 WHERE nspname NOT LIKE 'pg_%'
                        AND relname = REGISTRO.TABLE_NAME||'_id_seq'
                   AND nspname = ESQUEMA)) THEN
           EXECUTE 'DROP SEQUENCE "'||ESQUEMA||'".'||REGISTRO.TABLE_NAME||'_id_seq CASCADE';
        END IF;
        EXECUTE 'CREATE SEQUENCE "'||ESQUEMA||'".'||REGISTRO.TABLE_NAME||'_seq';
        EXECUTE 'ALTER TABLE '||REGISTRO.TABLE_NAME||' ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval(''"'||ESQUEMA||'".'||REGISTRO.TABLE_NAME||'_seq''::regclass)';
        EXECUTE 'ALTER TABLE '||REGISTRO.TABLE_NAME||' ADD CONSTRAINT unique_'||REGISTRO.TABLE_NAME||'_id UNIQUE (id);';
        FETCH TABLAS INTO REGISTRO;
        IF NOT FOUND THEN
           EXIT;
        END IF;
     END LOOP;
  END IF;
  CLOSE TABLAS;
  return(true);
end;
$BODY$
  LANGUAGE 'plpgsql' VOLATILE;
ALTER FUNCTION "SIMA002".crea_id(esquema character varying) OWNER TO postgres;