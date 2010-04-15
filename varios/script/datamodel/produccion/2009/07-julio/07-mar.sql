CREATE  SEQUENCE npmaeemb_seq;

create table NPMAEEMB(
        CODEMB    VARCHAR(4) NOT NULL,
        DESEMB    VARCHAR(200),
        CODJUZ    VARCHAR(4) NOT NULL,        
        CODEMP    VARCHAR(16) NOT NULL,                
        FECREGEMB DATE,
        CODCONEMB VARCHAR(3) NOT NULL,        
        TIPDIS    VARCHAR(1),
        TIPCAL    VARCHAR(1),                
        MONTOTEMB numeric(14,2),        
	id integer NOT NULL DEFAULT nextval('npmaeemb_seq'::regclass)
        );
ALTER TABLE npmaeemb OWNER TO postgres;                
  
-- Add comments to the columns 
comment on column NPMAEEMB.CODEMB   is 'Código del Embargo:';
comment on column NPMAEEMB.DESEMB   is 'Descripción del Embargo:';
comment on column NPMAEEMB.CODJUZ  is 'Código del Juzgado:';
comment on column NPMAEEMB.CODEMP   is 'Código del Empleado:';
comment on column NPMAEEMB.FECREGEMB   is 'Fecha Desde el Embargo:';
comment on column NPMAEEMB.CODCONEMB   is 'Código de Concepto Asociado al Embargo:';
comment on column NPMAEEMB.TIPDIS   is 'Tipo de Distribución del Embargo M.-Monto Fijo, P.-Porcentaje:';
comment on column NPMAEEMB.TIPCAL   is 'Tipo de Calculo del Embargo M.-Monto Fijo, P.-Porcentaje:';
comment on column NPMAEEMB.MONTOTEMB   is 'Monto Total del Embargo:';

create SEQUENCE npdetembben_seq;

create table NPDETEMBBEN(
        CODEMB    VARCHAR(4) NOT NULL,
        CODEMP    VARCHAR(16) NOT NULL,                
        CEDRIFBEN VARCHAR(16) NOT NULL,        
        TIPREL    VARCHAR(3), 
        VALEMB    numeric(14,2),        
	id integer NOT NULL DEFAULT nextval('npdetembben_seq'::regclass)
        );
ALTER TABLE npdetembben OWNER TO postgres;                
 
-- Add comments to the columns 
comment on column NPDETEMBBEN.CODEMB   is 'Código del Embargo:';
comment on column NPDETEMBBEN.CODEMP   is 'Código del Empleado:';
comment on column NPDETEMBBEN.CEDRIFBEN  is 'Cédula Rif del Beneficiario del Embargo:';
comment on column NPDETEMBBEN.TIPREL  is 'Tipo de Relación entre el Trabajador y el Beneficiario del Embargo:';
comment on column NPDETEMBBEN.VALEMB   is 'Valor del Embargo:';

create SEQUENCE npdetembcon_seq;

create table NPDETEMBCON(
        CODEMB    VARCHAR(4) NOT NULL,
        CODEMP    VARCHAR(16) NOT NULL,                
        CODCON    VARCHAR(3) NOT NULL,        
        PORCON    numeric(8,2),        
	id integer NOT NULL DEFAULT nextval('npdetembcon_seq'::regclass)
        );
ALTER TABLE npdetembcon OWNER TO postgres;
-- Add comments to the columns 
comment on column NPDETEMBCON.CODEMB   is 'Código del Embargo:';
comment on column NPDETEMBCON.CODEMP   is 'Código del Empleado:';
comment on column NPDETEMBCON.CODCON  is 'Código del Concepto Asociado al Embargo:';
comment on column NPDETEMBCON.PORCON   is 'Porcentaje de Aporte al Embargo:';
