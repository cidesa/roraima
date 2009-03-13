SET SEARCH_PATH TO "SIMA002";


-----------------------------------------------------------------------------
-- inabonos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "inabonos_seq" CASCADE;

CREATE SEQUENCE "inabonos_seq";


ALTER TABLE "inabonos" DROP COLUMN ID;



ALTER TABLE "inabonos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('inabonos_seq'::regclass);


ALTER TABLE "inabonos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- inajuoc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "inajuoc_seq" CASCADE;

CREATE SEQUENCE "inajuoc_seq";


ALTER TABLE "inajuoc" DROP COLUMN ID;



ALTER TABLE "inajuoc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('inajuoc_seq'::regclass);


ALTER TABLE "inajuoc" ADD PRIMARY KEY ("id");




-----------------------------------------------------------------------------
-- inventario
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "inventario_seq" CASCADE;

CREATE SEQUENCE "inventario_seq";


ALTER TABLE "inventario" DROP COLUMN ID;



ALTER TABLE "inventario" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('inventario_seq'::regclass);


ALTER TABLE "inventario" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- migrar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "migrar_seq" CASCADE;

CREATE SEQUENCE "migrar_seq";


ALTER TABLE "migrar" DROP COLUMN ID;



ALTER TABLE "migrar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('migrar_seq'::regclass);


ALTER TABLE "migrar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- migrar2
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "migrar2_seq" CASCADE;

CREATE SEQUENCE "migrar2_seq";


ALTER TABLE "migrar2" DROP COLUMN ID;



ALTER TABLE "migrar2" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('migrar2_seq'::regclass);


ALTER TABLE "migrar2" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- plannuevo
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "plannuevo_seq" CASCADE;

CREATE SEQUENCE "plannuevo_seq";


ALTER TABLE "plannuevo" DROP COLUMN ID;



ALTER TABLE "plannuevo" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('plannuevo_seq'::regclass);


ALTER TABLE "plannuevo" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- planunico
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "planunico_seq" CASCADE;

CREATE SEQUENCE "planunico_seq";


ALTER TABLE "planunico" DROP COLUMN ID;



ALTER TABLE "planunico" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('planunico_seq'::regclass);


ALTER TABLE "planunico" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- reimpcau
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "reimpcau_seq" CASCADE;

CREATE SEQUENCE "reimpcau_seq";


ALTER TABLE "reimpcau" DROP COLUMN ID;



ALTER TABLE "reimpcau" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('reimpcau_seq'::regclass);


ALTER TABLE "reimpcau" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- reimpcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "reimpcom_seq" CASCADE;

CREATE SEQUENCE "reimpcom_seq";


ALTER TABLE "reimpcom" DROP COLUMN ID;



ALTER TABLE "reimpcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('reimpcom_seq'::regclass);


ALTER TABLE "reimpcom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- reimppag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "reimppag_seq" CASCADE;

CREATE SEQUENCE "reimppag_seq";


ALTER TABLE "reimppag" DROP COLUMN ID;



ALTER TABLE "reimppag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('reimppag_seq'::regclass);


ALTER TABLE "reimppag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- reimpprc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "reimpprc_seq" CASCADE;

CREATE SEQUENCE "reimpprc_seq";


ALTER TABLE "reimpprc" DROP COLUMN ID;



ALTER TABLE "reimpprc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('reimpprc_seq'::regclass);


ALTER TABLE "reimpprc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bdcampos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bdcampos_seq" CASCADE;

CREATE SEQUENCE "bdcampos_seq";


ALTER TABLE "bdcampos" DROP COLUMN ID;



ALTER TABLE "bdcampos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bdcampos_seq'::regclass);


ALTER TABLE "bdcampos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bdcriterio
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bdcriterio_seq" CASCADE;

CREATE SEQUENCE "bdcriterio_seq";


ALTER TABLE "bdcriterio" DROP COLUMN ID;



ALTER TABLE "bdcriterio" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bdcriterio_seq'::regclass);


ALTER TABLE "bdcriterio" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bdreporte
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bdreporte_seq" CASCADE;

CREATE SEQUENCE "bdreporte_seq";


ALTER TABLE "bdreporte" DROP COLUMN ID;



ALTER TABLE "bdreporte" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bdreporte_seq'::regclass);


ALTER TABLE "bdreporte" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- temp1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "temp1_seq" CASCADE;

CREATE SEQUENCE "temp1_seq";


ALTER TABLE "temp1" DROP COLUMN ID;



ALTER TABLE "temp1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('temp1_seq'::regclass);


ALTER TABLE "temp1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- temporal1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "temporal1_seq" CASCADE;

CREATE SEQUENCE "temporal1_seq";


ALTER TABLE "temporal1" DROP COLUMN ID;



ALTER TABLE "temporal1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('temporal1_seq'::regclass);


ALTER TABLE "temporal1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npaccadm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npaccadm_seq" CASCADE;

CREATE SEQUENCE "npaccadm_seq";


ALTER TABLE "npaccadm" DROP COLUMN ID;



ALTER TABLE "npaccadm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npaccadm_seq'::regclass);


ALTER TABLE "npaccadm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npaccrac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npaccrac_seq" CASCADE;

CREATE SEQUENCE "npaccrac_seq";


ALTER TABLE "npaccrac" DROP COLUMN ID;



ALTER TABLE "npaccrac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npaccrac_seq'::regclass);


ALTER TABLE "npaccrac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npacumulacpt
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npacumulacpt_seq" CASCADE;

CREATE SEQUENCE "npacumulacpt_seq";


ALTER TABLE "npacumulacpt" DROP COLUMN ID;



ALTER TABLE "npacumulacpt" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npacumulacpt_seq'::regclass);


ALTER TABLE "npacumulacpt" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npadeint
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npadeint_seq" CASCADE;

CREATE SEQUENCE "npadeint_seq";


ALTER TABLE "npadeint" DROP COLUMN ID;



ALTER TABLE "npadeint" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npadeint_seq'::regclass);


ALTER TABLE "npadeint" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npantpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npantpre_seq" CASCADE;

CREATE SEQUENCE "npantpre_seq";


ALTER TABLE "npantpre" DROP COLUMN ID;



ALTER TABLE "npantpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npantpre_seq'::regclass);


ALTER TABLE "npantpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasicaremp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasicaremp_seq" CASCADE;

CREATE SEQUENCE "npasicaremp_seq";


ALTER TABLE "npasicaremp" DROP COLUMN ID;



ALTER TABLE "npasicaremp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasicaremp_seq'::regclass);


ALTER TABLE "npasicaremp" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npasicaremp" ON "npasicaremp" ("codnom","status","codemp");

CREATE INDEX "i02npasicaremp" ON "npasicaremp" ("codemp");

-----------------------------------------------------------------------------
-- npasicarnom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasicarnom_seq" CASCADE;

CREATE SEQUENCE "npasicarnom_seq";


ALTER TABLE "npasicarnom" DROP COLUMN ID;



ALTER TABLE "npasicarnom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasicarnom_seq'::regclass);


ALTER TABLE "npasicarnom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasicarpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasicarpre_seq" CASCADE;

CREATE SEQUENCE "npasicarpre_seq";


ALTER TABLE "npasicarpre" DROP COLUMN ID;



ALTER TABLE "npasicarpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasicarpre_seq'::regclass);


ALTER TABLE "npasicarpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasicarracemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasicarracemp_seq" CASCADE;

CREATE SEQUENCE "npasicarracemp_seq";


ALTER TABLE "npasicarracemp" DROP COLUMN ID;



ALTER TABLE "npasicarracemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasicarracemp_seq'::regclass);


ALTER TABLE "npasicarracemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasicatconemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasicatconemp_seq" CASCADE;

CREATE SEQUENCE "npasicatconemp_seq";


ALTER TABLE "npasicatconemp" DROP COLUMN ID;



ALTER TABLE "npasicatconemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasicatconemp_seq'::regclass);


ALTER TABLE "npasicatconemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasicodpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasicodpre_seq" CASCADE;

CREATE SEQUENCE "npasicodpre_seq";


ALTER TABLE "npasicodpre" DROP COLUMN ID;



ALTER TABLE "npasicodpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasicodpre_seq'::regclass);


ALTER TABLE "npasicodpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasicon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasicon_seq" CASCADE;

CREATE SEQUENCE "npasicon_seq";


ALTER TABLE "npasicon" DROP COLUMN ID;



ALTER TABLE "npasicon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasicon_seq'::regclass);


ALTER TABLE "npasicon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasiconemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasiconemp_seq" CASCADE;

CREATE SEQUENCE "npasiconemp_seq";


ALTER TABLE "npasiconemp" DROP COLUMN ID;



ALTER TABLE "npasiconemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasiconemp_seq'::regclass);


ALTER TABLE "npasiconemp" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npasiconemp" ON "npasiconemp" ("activo","codemp","codcar","codcon");

CREATE INDEX "i02npasiconemp" ON "npasiconemp" ("activo","fecini","fecexp","codemp","codcar","calcon","frecon");

-----------------------------------------------------------------------------
-- npasiconempbck
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasiconempbck_seq" CASCADE;

CREATE SEQUENCE "npasiconempbck_seq";


ALTER TABLE "npasiconempbck" DROP COLUMN ID;



ALTER TABLE "npasiconempbck" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasiconempbck_seq'::regclass);


ALTER TABLE "npasiconempbck" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasiconnom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasiconnom_seq" CASCADE;

CREATE SEQUENCE "npasiconnom_seq";


ALTER TABLE "npasiconnom" DROP COLUMN ID;



ALTER TABLE "npasiconnom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasiconnom_seq'::regclass);


ALTER TABLE "npasiconnom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasiconnom_aux
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasiconnom_aux_seq" CASCADE;

CREATE SEQUENCE "npasiconnom_aux_seq";


ALTER TABLE "npasiconnom_aux" DROP COLUMN ID;



ALTER TABLE "npasiconnom_aux" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasiconnom_aux_seq'::regclass);


ALTER TABLE "npasiconnom_aux" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasiconsue
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasiconsue_seq" CASCADE;

CREATE SEQUENCE "npasiconsue_seq";


ALTER TABLE "npasiconsue" DROP COLUMN ID;



ALTER TABLE "npasiconsue" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasiconsue_seq'::regclass);


ALTER TABLE "npasiconsue" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasiempcont
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasiempcont_seq" CASCADE;

CREATE SEQUENCE "npasiempcont_seq";


ALTER TABLE "npasiempcont" DROP COLUMN ID;



ALTER TABLE "npasiempcont" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasiempcont_seq'::regclass);


ALTER TABLE "npasiempcont" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasinomcont
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasinomcont_seq" CASCADE;

CREATE SEQUENCE "npasinomcont_seq";


ALTER TABLE "npasinomcont" DROP COLUMN ID;



ALTER TABLE "npasinomcont" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasinomcont_seq'::regclass);


ALTER TABLE "npasinomcont" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasipre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasipre_seq" CASCADE;

CREATE SEQUENCE "npasipre_seq";


ALTER TABLE "npasipre" DROP COLUMN ID;



ALTER TABLE "npasipre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasipre_seq'::regclass);


ALTER TABLE "npasipre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasoconcla
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasoconcla_seq" CASCADE;

CREATE SEQUENCE "npasoconcla_seq";


ALTER TABLE "npasoconcla" DROP COLUMN ID;



ALTER TABLE "npasoconcla" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasoconcla_seq'::regclass);


ALTER TABLE "npasoconcla" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasocontra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasocontra_seq" CASCADE;

CREATE SEQUENCE "npasocontra_seq";


ALTER TABLE "npasocontra" DROP COLUMN ID;



ALTER TABLE "npasocontra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasocontra_seq'::regclass);


ALTER TABLE "npasocontra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npbancos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npbancos_seq" CASCADE;

CREATE SEQUENCE "npbancos_seq";


ALTER TABLE "npbancos" DROP COLUMN ID;



ALTER TABLE "npbancos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npbancos_seq'::regclass);


ALTER TABLE "npbancos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npbenemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npbenemp_seq" CASCADE;

CREATE SEQUENCE "npbenemp_seq";


ALTER TABLE "npbenemp" DROP COLUMN ID;



ALTER TABLE "npbenemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npbenemp_seq'::regclass);


ALTER TABLE "npbenemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npbonocont
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npbonocont_seq" CASCADE;

CREATE SEQUENCE "npbonocont_seq";


ALTER TABLE "npbonocont" DROP COLUMN ID;



ALTER TABLE "npbonocont" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npbonocont_seq'::regclass);


ALTER TABLE "npbonocont" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcajaho
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcajaho_seq" CASCADE;

CREATE SEQUENCE "npcajaho_seq";


ALTER TABLE "npcajaho" DROP COLUMN ID;



ALTER TABLE "npcajaho" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcajaho_seq'::regclass);


ALTER TABLE "npcajaho" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcalcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcalcon_seq" CASCADE;

CREATE SEQUENCE "npcalcon_seq";


ALTER TABLE "npcalcon" DROP COLUMN ID;



ALTER TABLE "npcalcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcalcon_seq'::regclass);


ALTER TABLE "npcalcon" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npcalcon" ON "npcalcon" ("codcon","codnom");

-----------------------------------------------------------------------------
-- npcalconcol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcalconcol_seq" CASCADE;

CREATE SEQUENCE "npcalconcol_seq";


ALTER TABLE "npcalconcol" DROP COLUMN ID;



ALTER TABLE "npcalconcol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcalconcol_seq'::regclass);


ALTER TABLE "npcalconcol" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcalislr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcalislr_seq" CASCADE;

CREATE SEQUENCE "npcalislr_seq";


ALTER TABLE "npcalislr" DROP COLUMN ID;



ALTER TABLE "npcalislr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcalislr_seq'::regclass);


ALTER TABLE "npcalislr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcalvac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcalvac_seq" CASCADE;

CREATE SEQUENCE "npcalvac_seq";


ALTER TABLE "npcalvac" DROP COLUMN ID;



ALTER TABLE "npcalvac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcalvac_seq'::regclass);


ALTER TABLE "npcalvac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcargos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcargos_seq" CASCADE;

CREATE SEQUENCE "npcargos_seq";


ALTER TABLE "npcargos" DROP COLUMN ID;



ALTER TABLE "npcargos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcargos_seq'::regclass);


ALTER TABLE "npcargos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcargosocp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcargosocp_seq" CASCADE;

CREATE SEQUENCE "npcargosocp_seq";


ALTER TABLE "npcargosocp" DROP COLUMN ID;



ALTER TABLE "npcargosocp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcargosocp_seq'::regclass);


ALTER TABLE "npcargosocp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcargosrac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcargosrac_seq" CASCADE;

CREATE SEQUENCE "npcargosrac_seq";


ALTER TABLE "npcargosrac" DROP COLUMN ID;



ALTER TABLE "npcargosrac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcargosrac_seq'::regclass);


ALTER TABLE "npcargosrac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcarocp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcarocp_seq" CASCADE;

CREATE SEQUENCE "npcarocp_seq";


ALTER TABLE "npcarocp" DROP COLUMN ID;



ALTER TABLE "npcarocp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcarocp_seq'::regclass);


ALTER TABLE "npcarocp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcarpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcarpre_seq" CASCADE;

CREATE SEQUENCE "npcarpre_seq";


ALTER TABLE "npcarpre" DROP COLUMN ID;



ALTER TABLE "npcarpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcarpre_seq'::regclass);


ALTER TABLE "npcarpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcarrac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcarrac_seq" CASCADE;

CREATE SEQUENCE "npcarrac_seq";


ALTER TABLE "npcarrac" DROP COLUMN ID;



ALTER TABLE "npcarrac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcarrac_seq'::regclass);


ALTER TABLE "npcarrac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcatpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcatpre_seq" CASCADE;

CREATE SEQUENCE "npcatpre_seq";


ALTER TABLE "npcatpre" DROP COLUMN ID;



ALTER TABLE "npcatpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcatpre_seq'::regclass);


ALTER TABLE "npcatpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcatprehis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcatprehis_seq" CASCADE;

CREATE SEQUENCE "npcatprehis_seq";


ALTER TABLE "npcatprehis" DROP COLUMN ID;



ALTER TABLE "npcatprehis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcatprehis_seq'::regclass);


ALTER TABLE "npcatprehis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcertificados
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcertificados_seq" CASCADE;

CREATE SEQUENCE "npcertificados_seq";


ALTER TABLE "npcertificados" DROP COLUMN ID;



ALTER TABLE "npcertificados" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcertificados_seq'::regclass);


ALTER TABLE "npcertificados" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcestatickets
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcestatickets_seq" CASCADE;

CREATE SEQUENCE "npcestatickets_seq";


ALTER TABLE "npcestatickets" DROP COLUMN ID;



ALTER TABLE "npcestatickets" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcestatickets_seq'::regclass);


ALTER TABLE "npcestatickets" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcienom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcienom_seq" CASCADE;

CREATE SEQUENCE "npcienom_seq";


ALTER TABLE "npcienom" DROP COLUMN ID;



ALTER TABLE "npcienom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcienom_seq'::regclass);


ALTER TABLE "npcienom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npciudad
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npciudad_seq" CASCADE;

CREATE SEQUENCE "npciudad_seq";


ALTER TABLE "npciudad" DROP COLUMN ID;



ALTER TABLE "npciudad" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npciudad_seq'::regclass);


ALTER TABLE "npciudad" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcodpostal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcodpostal_seq" CASCADE;

CREATE SEQUENCE "npcodpostal_seq";


ALTER TABLE "npcodpostal" DROP COLUMN ID;



ALTER TABLE "npcodpostal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcodpostal_seq'::regclass);


ALTER TABLE "npcodpostal" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcomocp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcomocp_seq" CASCADE;

CREATE SEQUENCE "npcomocp_seq";


ALTER TABLE "npcomocp" DROP COLUMN ID;



ALTER TABLE "npcomocp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcomocp_seq'::regclass);


ALTER TABLE "npcomocp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconaho
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconaho_seq" CASCADE;

CREATE SEQUENCE "npconaho_seq";


ALTER TABLE "npconaho" DROP COLUMN ID;



ALTER TABLE "npconaho" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconaho_seq'::regclass);


ALTER TABLE "npconaho" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconarc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconarc_seq" CASCADE;

CREATE SEQUENCE "npconarc_seq";


ALTER TABLE "npconarc" DROP COLUMN ID;



ALTER TABLE "npconarc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconarc_seq'::regclass);


ALTER TABLE "npconarc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconasi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconasi_seq" CASCADE;

CREATE SEQUENCE "npconasi_seq";


ALTER TABLE "npconasi" DROP COLUMN ID;



ALTER TABLE "npconasi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconasi_seq'::regclass);


ALTER TABLE "npconasi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconasi_old
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconasi_old_seq" CASCADE;

CREATE SEQUENCE "npconasi_old_seq";


ALTER TABLE "npconasi_old" DROP COLUMN ID;



ALTER TABLE "npconasi_old" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconasi_old_seq'::regclass);


ALTER TABLE "npconasi_old" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconceptosbono
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconceptosbono_seq" CASCADE;

CREATE SEQUENCE "npconceptosbono_seq";


ALTER TABLE "npconceptosbono" DROP COLUMN ID;



ALTER TABLE "npconceptosbono" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconceptosbono_seq'::regclass);


ALTER TABLE "npconceptosbono" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconceptoscategoria
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconceptoscategoria_seq" CASCADE;

CREATE SEQUENCE "npconceptoscategoria_seq";


ALTER TABLE "npconceptoscategoria" DROP COLUMN ID;



ALTER TABLE "npconceptoscategoria" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconceptoscategoria_seq'::regclass);


ALTER TABLE "npconceptoscategoria" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconceptosdeducciones
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconceptosdeducciones_seq" CASCADE;

CREATE SEQUENCE "npconceptosdeducciones_seq";


ALTER TABLE "npconceptosdeducciones" DROP COLUMN ID;



ALTER TABLE "npconceptosdeducciones" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconceptosdeducciones_seq'::regclass);


ALTER TABLE "npconceptosdeducciones" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconceptosprima
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconceptosprima_seq" CASCADE;

CREATE SEQUENCE "npconceptosprima_seq";


ALTER TABLE "npconceptosprima" DROP COLUMN ID;



ALTER TABLE "npconceptosprima" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconceptosprima_seq'::regclass);


ALTER TABLE "npconceptosprima" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconceptossalario
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconceptossalario_seq" CASCADE;

CREATE SEQUENCE "npconceptossalario_seq";


ALTER TABLE "npconceptossalario" DROP COLUMN ID;



ALTER TABLE "npconceptossalario" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconceptossalario_seq'::regclass);


ALTER TABLE "npconceptossalario" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconcomp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconcomp_seq" CASCADE;

CREATE SEQUENCE "npconcomp_seq";


ALTER TABLE "npconcomp" DROP COLUMN ID;



ALTER TABLE "npconcomp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconcomp_seq'::regclass);


ALTER TABLE "npconcomp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconfon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconfon_seq" CASCADE;

CREATE SEQUENCE "npconfon_seq";


ALTER TABLE "npconfon" DROP COLUMN ID;



ALTER TABLE "npconfon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconfon_seq'::regclass);


ALTER TABLE "npconfon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconian
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconian_seq" CASCADE;

CREATE SEQUENCE "npconian_seq";


ALTER TABLE "npconian" DROP COLUMN ID;



ALTER TABLE "npconian" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconian_seq'::regclass);


ALTER TABLE "npconian" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconpri
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconpri_seq" CASCADE;

CREATE SEQUENCE "npconpri_seq";


ALTER TABLE "npconpri" DROP COLUMN ID;



ALTER TABLE "npconpri" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconpri_seq'::regclass);


ALTER TABLE "npconpri" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconret
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconret_seq" CASCADE;

CREATE SEQUENCE "npconret_seq";


ALTER TABLE "npconret" DROP COLUMN ID;



ALTER TABLE "npconret" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconret_seq'::regclass);


ALTER TABLE "npconret" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconsalint
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconsalint_seq" CASCADE;

CREATE SEQUENCE "npconsalint_seq";


ALTER TABLE "npconsalint" DROP COLUMN ID;



ALTER TABLE "npconsalint" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconsalint_seq'::regclass);


ALTER TABLE "npconsalint" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npconsueldo
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npconsueldo_seq" CASCADE;

CREATE SEQUENCE "npconsueldo_seq";


ALTER TABLE "npconsueldo" DROP COLUMN ID;



ALTER TABLE "npconsueldo" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npconsueldo_seq'::regclass);


ALTER TABLE "npconsueldo" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcontipaporet
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcontipaporet_seq" CASCADE;

CREATE SEQUENCE "npcontipaporet_seq";


ALTER TABLE "npcontipaporet" DROP COLUMN ID;



ALTER TABLE "npcontipaporet" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcontipaporet_seq'::regclass);


ALTER TABLE "npcontipaporet" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcontra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcontra_seq" CASCADE;

CREATE SEQUENCE "npcontra_seq";


ALTER TABLE "npcontra" DROP COLUMN ID;



ALTER TABLE "npcontra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcontra_seq'::regclass);


ALTER TABLE "npcontra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcontrato
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcontrato_seq" CASCADE;

CREATE SEQUENCE "npcontrato_seq";


ALTER TABLE "npcontrato" DROP COLUMN ID;



ALTER TABLE "npcontrato" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcontrato_seq'::regclass);


ALTER TABLE "npcontrato" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npcuentas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npcuentas_seq" CASCADE;

CREATE SEQUENCE "npcuentas_seq";


ALTER TABLE "npcuentas" DROP COLUMN ID;



ALTER TABLE "npcuentas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npcuentas_seq'::regclass);


ALTER TABLE "npcuentas" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefcla
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefcla_seq" CASCADE;

CREATE SEQUENCE "npdefcla_seq";


ALTER TABLE "npdefcla" DROP COLUMN ID;



ALTER TABLE "npdefcla" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefcla_seq'::regclass);


ALTER TABLE "npdefcla" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefconcasep
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefconcasep_seq" CASCADE;

CREATE SEQUENCE "npdefconcasep_seq";


ALTER TABLE "npdefconcasep" DROP COLUMN ID;



ALTER TABLE "npdefconcasep" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefconcasep_seq'::regclass);


ALTER TABLE "npdefconcasep" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefcpt
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefcpt_seq" CASCADE;

CREATE SEQUENCE "npdefcpt_seq";


ALTER TABLE "npdefcpt" DROP COLUMN ID;



ALTER TABLE "npdefcpt" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefcpt_seq'::regclass);


ALTER TABLE "npdefcpt" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefctb
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefctb_seq" CASCADE;

CREATE SEQUENCE "npdefctb_seq";


ALTER TABLE "npdefctb" DROP COLUMN ID;



ALTER TABLE "npdefctb" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefctb_seq'::regclass);


ALTER TABLE "npdefctb" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefgen
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefgen_seq" CASCADE;

CREATE SEQUENCE "npdefgen_seq";


ALTER TABLE "npdefgen" DROP COLUMN ID;



ALTER TABLE "npdefgen" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefgen_seq'::regclass);


ALTER TABLE "npdefgen" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefjorlab
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefjorlab_seq" CASCADE;

CREATE SEQUENCE "npdefjorlab_seq";


ALTER TABLE "npdefjorlab" DROP COLUMN ID;



ALTER TABLE "npdefjorlab" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefjorlab_seq'::regclass);


ALTER TABLE "npdefjorlab" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefmov
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefmov_seq" CASCADE;

CREATE SEQUENCE "npdefmov_seq";


ALTER TABLE "npdefmov" DROP COLUMN ID;



ALTER TABLE "npdefmov" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefmov_seq'::regclass);


ALTER TABLE "npdefmov" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefpagext
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefpagext_seq" CASCADE;

CREATE SEQUENCE "npdefpagext_seq";


ALTER TABLE "npdefpagext" DROP COLUMN ID;



ALTER TABLE "npdefpagext" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefpagext_seq'::regclass);


ALTER TABLE "npdefpagext" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefpar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefpar_seq" CASCADE;

CREATE SEQUENCE "npdefpar_seq";


ALTER TABLE "npdefpar" DROP COLUMN ID;



ALTER TABLE "npdefpar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefpar_seq'::regclass);


ALTER TABLE "npdefpar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefpreliq
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefpreliq_seq" CASCADE;

CREATE SEQUENCE "npdefpreliq_seq";


ALTER TABLE "npdefpreliq" DROP COLUMN ID;



ALTER TABLE "npdefpreliq" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefpreliq_seq'::regclass);


ALTER TABLE "npdefpreliq" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefrepdin
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefrepdin_seq" CASCADE;

CREATE SEQUENCE "npdefrepdin_seq";


ALTER TABLE "npdefrepdin" DROP COLUMN ID;



ALTER TABLE "npdefrepdin" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefrepdin_seq'::regclass);


ALTER TABLE "npdefrepdin" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdefvar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdefvar_seq" CASCADE;

CREATE SEQUENCE "npdefvar_seq";


ALTER TABLE "npdefvar" DROP COLUMN ID;



ALTER TABLE "npdefvar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdefvar_seq'::regclass);


ALTER TABLE "npdefvar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdepban
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdepban_seq" CASCADE;

CREATE SEQUENCE "npdepban_seq";


ALTER TABLE "npdepban" DROP COLUMN ID;



ALTER TABLE "npdepban" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdepban_seq'::regclass);


ALTER TABLE "npdepban" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npdepban" ON "npdepban" ("numlin");

-----------------------------------------------------------------------------
-- npdepbanfid
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdepbanfid_seq" CASCADE;

CREATE SEQUENCE "npdepbanfid_seq";


ALTER TABLE "npdepbanfid" DROP COLUMN ID;



ALTER TABLE "npdepbanfid" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdepbanfid_seq'::regclass);


ALTER TABLE "npdepbanfid" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdepbanusu
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdepbanusu_seq" CASCADE;

CREATE SEQUENCE "npdepbanusu_seq";


ALTER TABLE "npdepbanusu" DROP COLUMN ID;



ALTER TABLE "npdepbanusu" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdepbanusu_seq'::regclass);


ALTER TABLE "npdepbanusu" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npdepbanusu" ON "npdepbanusu" ("numlin");

-----------------------------------------------------------------------------
-- npdepcajaho
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdepcajaho_seq" CASCADE;

CREATE SEQUENCE "npdepcajaho_seq";


ALTER TABLE "npdepcajaho" DROP COLUMN ID;



ALTER TABLE "npdepcajaho" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdepcajaho_seq'::regclass);


ALTER TABLE "npdepcajaho" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdepfid
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdepfid_seq" CASCADE;

CREATE SEQUENCE "npdepfid_seq";


ALTER TABLE "npdepfid" DROP COLUMN ID;



ALTER TABLE "npdepfid" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdepfid_seq'::regclass);


ALTER TABLE "npdepfid" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdepfide
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdepfide_seq" CASCADE;

CREATE SEQUENCE "npdepfide_seq";


ALTER TABLE "npdepfide" DROP COLUMN ID;



ALTER TABLE "npdepfide" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdepfide_seq'::regclass);


ALTER TABLE "npdepfide" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdesniv
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdesniv_seq" CASCADE;

CREATE SEQUENCE "npdesniv_seq";


ALTER TABLE "npdesniv" DROP COLUMN ID;



ALTER TABLE "npdesniv" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdesniv_seq'::regclass);


ALTER TABLE "npdesniv" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdiaadicnom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdiaadicnom_seq" CASCADE;

CREATE SEQUENCE "npdiaadicnom_seq";


ALTER TABLE "npdiaadicnom" DROP COLUMN ID;



ALTER TABLE "npdiaadicnom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdiaadicnom_seq'::regclass);


ALTER TABLE "npdiaadicnom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdiaext
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdiaext_seq" CASCADE;

CREATE SEQUENCE "npdiaext_seq";


ALTER TABLE "npdiaext" DROP COLUMN ID;



ALTER TABLE "npdiaext" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdiaext_seq'::regclass);


ALTER TABLE "npdiaext" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npdisccesta
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npdisccesta_seq" CASCADE;

CREATE SEQUENCE "npdisccesta_seq";


ALTER TABLE "npdisccesta" DROP COLUMN ID;



ALTER TABLE "npdisccesta" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npdisccesta_seq'::regclass);


ALTER TABLE "npdisccesta" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npdisccesta" ON "npdisccesta" ("numlin");

-----------------------------------------------------------------------------
-- npempjorlab
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npempjorlab_seq" CASCADE;

CREATE SEQUENCE "npempjorlab_seq";


ALTER TABLE "npempjorlab" DROP COLUMN ID;



ALTER TABLE "npempjorlab" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npempjorlab_seq'::regclass);


ALTER TABLE "npempjorlab" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npempleados_banco
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npempleados_banco_seq" CASCADE;

CREATE SEQUENCE "npempleados_banco_seq";


ALTER TABLE "npempleados_banco" DROP COLUMN ID;



ALTER TABLE "npempleados_banco" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npempleados_banco_seq'::regclass);


ALTER TABLE "npempleados_banco" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npempvac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npempvac_seq" CASCADE;

CREATE SEQUENCE "npempvac_seq";


ALTER TABLE "npempvac" DROP COLUMN ID;



ALTER TABLE "npempvac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npempvac_seq'::regclass);


ALTER TABLE "npempvac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npescalas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npescalas_seq" CASCADE;

CREATE SEQUENCE "npescalas_seq";


ALTER TABLE "npescalas" DROP COLUMN ID;



ALTER TABLE "npescalas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npescalas_seq'::regclass);


ALTER TABLE "npescalas" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npescsue
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npescsue_seq" CASCADE;

CREATE SEQUENCE "npescsue_seq";


ALTER TABLE "npescsue" DROP COLUMN ID;



ALTER TABLE "npescsue" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npescsue_seq'::regclass);


ALTER TABLE "npescsue" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npescuelas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npescuelas_seq" CASCADE;

CREATE SEQUENCE "npescuelas_seq";


ALTER TABLE "npescuelas" DROP COLUMN ID;



ALTER TABLE "npescuelas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npescuelas_seq'::regclass);


ALTER TABLE "npescuelas" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npestado
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npestado_seq" CASCADE;

CREATE SEQUENCE "npestado_seq";


ALTER TABLE "npestado" DROP COLUMN ID;



ALTER TABLE "npestado" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npestado_seq'::regclass);


ALTER TABLE "npestado" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npestorg
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npestorg_seq" CASCADE;

CREATE SEQUENCE "npestorg_seq";


ALTER TABLE "npestorg" DROP COLUMN ID;



ALTER TABLE "npestorg" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npestorg_seq'::regclass);


ALTER TABLE "npestorg" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npexplab
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npexplab_seq" CASCADE;

CREATE SEQUENCE "npexplab_seq";


ALTER TABLE "npexplab" DROP COLUMN ID;



ALTER TABLE "npexplab" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npexplab_seq'::regclass);


ALTER TABLE "npexplab" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npfalper
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npfalper_seq" CASCADE;

CREATE SEQUENCE "npfalper_seq";


ALTER TABLE "npfalper" DROP COLUMN ID;



ALTER TABLE "npfalper" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npfalper_seq'::regclass);


ALTER TABLE "npfalper" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npfideicomiso
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npfideicomiso_seq" CASCADE;

CREATE SEQUENCE "npfideicomiso_seq";


ALTER TABLE "npfideicomiso" DROP COLUMN ID;



ALTER TABLE "npfideicomiso" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npfideicomiso_seq'::regclass);


ALTER TABLE "npfideicomiso" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npfondoprestaciones
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npfondoprestaciones_seq" CASCADE;

CREATE SEQUENCE "npfondoprestaciones_seq";


ALTER TABLE "npfondoprestaciones" DROP COLUMN ID;



ALTER TABLE "npfondoprestaciones" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npfondoprestaciones_seq'::regclass);


ALTER TABLE "npfondoprestaciones" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npforcaremp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npforcaremp_seq" CASCADE;

CREATE SEQUENCE "npforcaremp_seq";


ALTER TABLE "npforcaremp" DROP COLUMN ID;



ALTER TABLE "npforcaremp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npforcaremp_seq'::regclass);


ALTER TABLE "npforcaremp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npgrulab
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npgrulab_seq" CASCADE;

CREATE SEQUENCE "npgrulab_seq";


ALTER TABLE "npgrulab" DROP COLUMN ID;



ALTER TABLE "npgrulab" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npgrulab_seq'::regclass);


ALTER TABLE "npgrulab" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npgrunom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npgrunom_seq" CASCADE;

CREATE SEQUENCE "npgrunom_seq";


ALTER TABLE "npgrunom" DROP COLUMN ID;



ALTER TABLE "npgrunom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npgrunom_seq'::regclass);


ALTER TABLE "npgrunom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npguarde
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npguarde_seq" CASCADE;

CREATE SEQUENCE "npguarde_seq";


ALTER TABLE "npguarde" DROP COLUMN ID;



ALTER TABLE "npguarde" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npguarde_seq'::regclass);


ALTER TABLE "npguarde" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nphiineg
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphiineg_seq" CASCADE;

CREATE SEQUENCE "nphiineg_seq";


ALTER TABLE "nphiineg" DROP COLUMN ID;



ALTER TABLE "nphiineg" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphiineg_seq'::regclass);


ALTER TABLE "nphiineg" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nphisasicaremp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphisasicaremp_seq" CASCADE;

CREATE SEQUENCE "nphisasicaremp_seq";


ALTER TABLE "nphisasicaremp" DROP COLUMN ID;



ALTER TABLE "nphisasicaremp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphisasicaremp_seq'::regclass);


ALTER TABLE "nphisasicaremp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nphiscon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphiscon_seq" CASCADE;

CREATE SEQUENCE "nphiscon_seq";


ALTER TABLE "nphiscon" DROP COLUMN ID;



ALTER TABLE "nphiscon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_seq'::regclass);


ALTER TABLE "nphiscon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nphiscon_06022007_sincambio
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphiscon_06022007_sincambio_seq" CASCADE;

CREATE SEQUENCE "nphiscon_06022007_sincambio_seq";


ALTER TABLE "nphiscon_06022007_sincambio" DROP COLUMN ID;



ALTER TABLE "nphiscon_06022007_sincambio" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_06022007_sincambio_seq'::regclass);


ALTER TABLE "nphiscon_06022007_sincambio" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nphiscon_borra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphiscon_borra_seq" CASCADE;

CREATE SEQUENCE "nphiscon_borra_seq";


ALTER TABLE "nphiscon_borra" DROP COLUMN ID;



ALTER TABLE "nphiscon_borra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_borra_seq'::regclass);


ALTER TABLE "nphiscon_borra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nphiscon_old
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphiscon_old_seq" CASCADE;

CREATE SEQUENCE "nphiscon_old_seq";


ALTER TABLE "nphiscon_old" DROP COLUMN ID;



ALTER TABLE "nphiscon_old" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_old_seq'::regclass);


ALTER TABLE "nphiscon_old" ADD PRIMARY KEY ("id");

CREATE INDEX "i01nphiscon" ON "nphiscon_old" ("codnom","codemp","codcar","codcon","fecnom");

CREATE INDEX "i02nphiscon" ON "nphiscon_old" ("codnom","codcon","fecnom");

-----------------------------------------------------------------------------
-- nphiscon_r
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphiscon_r_seq" CASCADE;

CREATE SEQUENCE "nphiscon_r_seq";


ALTER TABLE "nphiscon_r" DROP COLUMN ID;



ALTER TABLE "nphiscon_r" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphiscon_r_seq'::regclass);


ALTER TABLE "nphiscon_r" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nphispre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphispre_seq" CASCADE;

CREATE SEQUENCE "nphispre_seq";


ALTER TABLE "nphispre" DROP COLUMN ID;



ALTER TABLE "nphispre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphispre_seq'::regclass);


ALTER TABLE "nphispre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nphojint
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphojint_seq" CASCADE;

CREATE SEQUENCE "nphojint_seq";


ALTER TABLE "nphojint" DROP COLUMN ID;



ALTER TABLE "nphojint" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphojint_seq'::regclass);


ALTER TABLE "nphojint" ADD PRIMARY KEY ("id");

ALTER TABLE "nphojint" ADD CONSTRAINT "un_nphojint" UNIQUE ("cedemp");

-----------------------------------------------------------------------------
-- nphojintban
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nphojintban_seq" CASCADE;

CREATE SEQUENCE "nphojintban_seq";


ALTER TABLE "nphojintban" DROP COLUMN ID;



ALTER TABLE "nphojintban" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nphojintban_seq'::regclass);


ALTER TABLE "nphojintban" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npimppresoc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npimppresoc_seq" CASCADE;

CREATE SEQUENCE "npimppresoc_seq";


ALTER TABLE "npimppresoc" DROP COLUMN ID;



ALTER TABLE "npimppresoc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npimppresoc_seq'::regclass);


ALTER TABLE "npimppresoc" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npimppresoc" ON "npimppresoc" ("codemp","feccor");

-----------------------------------------------------------------------------
-- npimppresoc1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npimppresoc1_seq" CASCADE;

CREATE SEQUENCE "npimppresoc1_seq";


ALTER TABLE "npimppresoc1" DROP COLUMN ID;



ALTER TABLE "npimppresoc1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npimppresoc1_seq'::regclass);


ALTER TABLE "npimppresoc1" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npimppresoc1" ON "npimppresoc1" ("codemp","feccor");

-----------------------------------------------------------------------------
-- npimppresocant
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npimppresocant_seq" CASCADE;

CREATE SEQUENCE "npimppresocant_seq";


ALTER TABLE "npimppresocant" DROP COLUMN ID;



ALTER TABLE "npimppresocant" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npimppresocant_seq'::regclass);


ALTER TABLE "npimppresocant" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npimppresocant" ON "npimppresocant" ("codemp","feccor");

-----------------------------------------------------------------------------
-- npinfadi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npinfadi_seq" CASCADE;

CREATE SEQUENCE "npinfadi_seq";


ALTER TABLE "npinfadi" DROP COLUMN ID;



ALTER TABLE "npinfadi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npinfadi_seq'::regclass);


ALTER TABLE "npinfadi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npinfcur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npinfcur_seq" CASCADE;

CREATE SEQUENCE "npinfcur_seq";


ALTER TABLE "npinfcur" DROP COLUMN ID;



ALTER TABLE "npinfcur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npinfcur_seq'::regclass);


ALTER TABLE "npinfcur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npinfcur_rene
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npinfcur_rene_seq" CASCADE;

CREATE SEQUENCE "npinfcur_rene_seq";


ALTER TABLE "npinfcur_rene" DROP COLUMN ID;



ALTER TABLE "npinfcur_rene" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npinfcur_rene_seq'::regclass);


ALTER TABLE "npinfcur_rene" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npinffam
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npinffam_seq" CASCADE;

CREATE SEQUENCE "npinffam_seq";


ALTER TABLE "npinffam" DROP COLUMN ID;



ALTER TABLE "npinffam" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npinffam_seq'::regclass);


ALTER TABLE "npinffam" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npinstitutos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npinstitutos_seq" CASCADE;

CREATE SEQUENCE "npinstitutos_seq";


ALTER TABLE "npinstitutos" DROP COLUMN ID;



ALTER TABLE "npinstitutos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npinstitutos_seq'::regclass);


ALTER TABLE "npinstitutos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npinteresesprestaciones
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npinteresesprestaciones_seq" CASCADE;

CREATE SEQUENCE "npinteresesprestaciones_seq";


ALTER TABLE "npinteresesprestaciones" DROP COLUMN ID;



ALTER TABLE "npinteresesprestaciones" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npinteresesprestaciones_seq'::regclass);


ALTER TABLE "npinteresesprestaciones" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npintfecref
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npintfecref_seq" CASCADE;

CREATE SEQUENCE "npintfecref_seq";


ALTER TABLE "npintfecref" DROP COLUMN ID;



ALTER TABLE "npintfecref" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npintfecref_seq'::regclass);


ALTER TABLE "npintfecref" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npintfecrefdaniel
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npintfecrefdaniel_seq" CASCADE;

CREATE SEQUENCE "npintfecrefdaniel_seq";


ALTER TABLE "npintfecrefdaniel" DROP COLUMN ID;



ALTER TABLE "npintfecrefdaniel" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npintfecrefdaniel_seq'::regclass);


ALTER TABLE "npintfecrefdaniel" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npintfid
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npintfid_seq" CASCADE;

CREATE SEQUENCE "npintfid_seq";


ALTER TABLE "npintfid" DROP COLUMN ID;



ALTER TABLE "npintfid" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npintfid_seq'::regclass);


ALTER TABLE "npintfid" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npintpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npintpre_seq" CASCADE;

CREATE SEQUENCE "npintpre_seq";


ALTER TABLE "npintpre" DROP COLUMN ID;



ALTER TABLE "npintpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npintpre_seq'::regclass);


ALTER TABLE "npintpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npislr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npislr_seq" CASCADE;

CREATE SEQUENCE "npislr_seq";


ALTER TABLE "npislr" DROP COLUMN ID;



ALTER TABLE "npislr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npislr_seq'::regclass);


ALTER TABLE "npislr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npjefes
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npjefes_seq" CASCADE;

CREATE SEQUENCE "npjefes_seq";


ALTER TABLE "npjefes" DROP COLUMN ID;



ALTER TABLE "npjefes" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npjefes_seq'::regclass);


ALTER TABLE "npjefes" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npliqemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npliqemp_seq" CASCADE;

CREATE SEQUENCE "npliqemp_seq";


ALTER TABLE "npliqemp" DROP COLUMN ID;



ALTER TABLE "npliqemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npliqemp_seq'::regclass);


ALTER TABLE "npliqemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npliquidacion_det
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npliquidacion_det_seq" CASCADE;

CREATE SEQUENCE "npliquidacion_det_seq";


ALTER TABLE "npliquidacion_det" DROP COLUMN ID;



ALTER TABLE "npliquidacion_det" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npliquidacion_det_seq'::regclass);


ALTER TABLE "npliquidacion_det" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npmemcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npmemcon_seq" CASCADE;

CREATE SEQUENCE "npmemcon_seq";


ALTER TABLE "npmemcon" DROP COLUMN ID;



ALTER TABLE "npmemcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npmemcon_seq'::regclass);


ALTER TABLE "npmemcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npmemos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npmemos_seq" CASCADE;

CREATE SEQUENCE "npmemos_seq";


ALTER TABLE "npmemos" DROP COLUMN ID;



ALTER TABLE "npmemos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npmemos_seq'::regclass);


ALTER TABLE "npmemos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npmotant
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npmotant_seq" CASCADE;

CREATE SEQUENCE "npmotant_seq";


ALTER TABLE "npmotant" DROP COLUMN ID;



ALTER TABLE "npmotant" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npmotant_seq'::regclass);


ALTER TABLE "npmotant" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npmotfal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npmotfal_seq" CASCADE;

CREATE SEQUENCE "npmotfal_seq";


ALTER TABLE "npmotfal" DROP COLUMN ID;



ALTER TABLE "npmotfal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npmotfal_seq'::regclass);


ALTER TABLE "npmotfal" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npmotliq
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npmotliq_seq" CASCADE;

CREATE SEQUENCE "npmotliq_seq";


ALTER TABLE "npmotliq" DROP COLUMN ID;



ALTER TABLE "npmotliq" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npmotliq_seq'::regclass);


ALTER TABLE "npmotliq" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npmovian
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npmovian_seq" CASCADE;

CREATE SEQUENCE "npmovian_seq";


ALTER TABLE "npmovian" DROP COLUMN ID;



ALTER TABLE "npmovian" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npmovian_seq'::regclass);


ALTER TABLE "npmovian" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npmovrac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npmovrac_seq" CASCADE;

CREATE SEQUENCE "npmovrac_seq";


ALTER TABLE "npmovrac" DROP COLUMN ID;



ALTER TABLE "npmovrac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npmovrac_seq'::regclass);


ALTER TABLE "npmovrac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npmunicipios
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npmunicipios_seq" CASCADE;

CREATE SEQUENCE "npmunicipios_seq";


ALTER TABLE "npmunicipios" DROP COLUMN ID;



ALTER TABLE "npmunicipios" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npmunicipios_seq'::regclass);


ALTER TABLE "npmunicipios" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npnivedu
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npnivedu_seq" CASCADE;

CREATE SEQUENCE "npnivedu_seq";


ALTER TABLE "npnivedu" DROP COLUMN ID;



ALTER TABLE "npnivedu" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npnivedu_seq'::regclass);


ALTER TABLE "npnivedu" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npnomcal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npnomcal_seq" CASCADE;

CREATE SEQUENCE "npnomcal_seq";


ALTER TABLE "npnomcal" DROP COLUMN ID;



ALTER TABLE "npnomcal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npnomcal_seq'::regclass);


ALTER TABLE "npnomcal" ADD PRIMARY KEY ("id");

CREATE INDEX "i01npnomcal" ON "npnomcal" ("codnom","codemp","codcar","codcon");

-----------------------------------------------------------------------------
-- npnomcal_temp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npnomcal_temp_seq" CASCADE;

CREATE SEQUENCE "npnomcal_temp_seq";


ALTER TABLE "npnomcal_temp" DROP COLUMN ID;



ALTER TABLE "npnomcal_temp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npnomcal_temp_seq'::regclass);


ALTER TABLE "npnomcal_temp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npnomcalhcm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npnomcalhcm_seq" CASCADE;

CREATE SEQUENCE "npnomcalhcm_seq";


ALTER TABLE "npnomcalhcm" DROP COLUMN ID;



ALTER TABLE "npnomcalhcm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npnomcalhcm_seq'::regclass);


ALTER TABLE "npnomcalhcm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npnomespconnomtip
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npnomespconnomtip_seq" CASCADE;

CREATE SEQUENCE "npnomespconnomtip_seq";


ALTER TABLE "npnomespconnomtip" DROP COLUMN ID;



ALTER TABLE "npnomespconnomtip" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npnomespconnomtip_seq'::regclass);


ALTER TABLE "npnomespconnomtip" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npnomespnomtip
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npnomespnomtip_seq" CASCADE;

CREATE SEQUENCE "npnomespnomtip_seq";


ALTER TABLE "npnomespnomtip" DROP COLUMN ID;



ALTER TABLE "npnomespnomtip" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npnomespnomtip_seq'::regclass);


ALTER TABLE "npnomespnomtip" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npnomesptipos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npnomesptipos_seq" CASCADE;

CREATE SEQUENCE "npnomesptipos_seq";


ALTER TABLE "npnomesptipos" DROP COLUMN ID;



ALTER TABLE "npnomesptipos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npnomesptipos_seq'::regclass);


ALTER TABLE "npnomesptipos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npnomina
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npnomina_seq" CASCADE;

CREATE SEQUENCE "npnomina_seq";


ALTER TABLE "npnomina" DROP COLUMN ID;



ALTER TABLE "npnomina" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npnomina_seq'::regclass);


ALTER TABLE "npnomina" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npordpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npordpag_seq" CASCADE;

CREATE SEQUENCE "npordpag_seq";


ALTER TABLE "npordpag" DROP COLUMN ID;



ALTER TABLE "npordpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npordpag_seq'::regclass);


ALTER TABLE "npordpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nppagint
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nppagint_seq" CASCADE;

CREATE SEQUENCE "nppagint_seq";


ALTER TABLE "nppagint" DROP COLUMN ID;



ALTER TABLE "nppagint" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nppagint_seq'::regclass);


ALTER TABLE "nppagint" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nppais
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nppais_seq" CASCADE;

CREATE SEQUENCE "nppais_seq";


ALTER TABLE "nppais" DROP COLUMN ID;



ALTER TABLE "nppais" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nppais_seq'::regclass);


ALTER TABLE "nppais" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nppercar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nppercar_seq" CASCADE;

CREATE SEQUENCE "nppercar_seq";


ALTER TABLE "nppercar" DROP COLUMN ID;



ALTER TABLE "nppercar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nppercar_seq'::regclass);


ALTER TABLE "nppercar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npperemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npperemp_seq" CASCADE;

CREATE SEQUENCE "npperemp_seq";


ALTER TABLE "npperemp" DROP COLUMN ID;



ALTER TABLE "npperemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npperemp_seq'::regclass);


ALTER TABLE "npperemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npperfil
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npperfil_seq" CASCADE;

CREATE SEQUENCE "npperfil_seq";


ALTER TABLE "npperfil" DROP COLUMN ID;



ALTER TABLE "npperfil" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npperfil_seq'::regclass);


ALTER TABLE "npperfil" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npperxdis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npperxdis_seq" CASCADE;

CREATE SEQUENCE "npperxdis_seq";


ALTER TABLE "npperxdis" DROP COLUMN ID;



ALTER TABLE "npperxdis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npperxdis_seq'::regclass);


ALTER TABLE "npperxdis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nppreliq
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nppreliq_seq" CASCADE;

CREATE SEQUENCE "nppreliq_seq";


ALTER TABLE "nppreliq" DROP COLUMN ID;



ALTER TABLE "nppreliq" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nppreliq_seq'::regclass);


ALTER TABLE "nppreliq" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nppresoc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nppresoc_seq" CASCADE;

CREATE SEQUENCE "nppresoc_seq";


ALTER TABLE "nppresoc" DROP COLUMN ID;



ALTER TABLE "nppresoc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nppresoc_seq'::regclass);


ALTER TABLE "nppresoc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nppresocant
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nppresocant_seq" CASCADE;

CREATE SEQUENCE "nppresocant_seq";


ALTER TABLE "nppresocant" DROP COLUMN ID;



ALTER TABLE "nppresocant" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nppresocant_seq'::regclass);


ALTER TABLE "nppresocant" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nppresta
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nppresta_seq" CASCADE;

CREATE SEQUENCE "nppresta_seq";


ALTER TABLE "nppresta" DROP COLUMN ID;



ALTER TABLE "nppresta" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nppresta_seq'::regclass);


ALTER TABLE "nppresta" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npprocar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npprocar_seq" CASCADE;

CREATE SEQUENCE "npprocar_seq";


ALTER TABLE "npprocar" DROP COLUMN ID;



ALTER TABLE "npprocar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npprocar_seq'::regclass);


ALTER TABLE "npprocar" ADD PRIMARY KEY ("id");

ALTER TABLE "npprocar" ADD CONSTRAINT "npprocar_FK_1" FOREIGN KEY ("codprofes") REFERENCES "npprofesion" ("codprofes");

ALTER TABLE "npprocar" ADD CONSTRAINT "npprocar_FK_2" FOREIGN KEY ("codcar") REFERENCES "npcargos" ("codcar");

-----------------------------------------------------------------------------
-- npprofesion
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npprofesion_seq" CASCADE;

CREATE SEQUENCE "npprofesion_seq";


ALTER TABLE "npprofesion" DROP COLUMN ID;



ALTER TABLE "npprofesion" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npprofesion_seq'::regclass);


ALTER TABLE "npprofesion" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nprac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nprac_seq" CASCADE;

CREATE SEQUENCE "nprac_seq";


ALTER TABLE "nprac" DROP COLUMN ID;



ALTER TABLE "nprac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nprac_seq'::regclass);


ALTER TABLE "nprac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nprelcajaho
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nprelcajaho_seq" CASCADE;

CREATE SEQUENCE "nprelcajaho_seq";


ALTER TABLE "nprelcajaho" DROP COLUMN ID;



ALTER TABLE "nprelcajaho" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nprelcajaho_seq'::regclass);


ALTER TABLE "nprelcajaho" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nprelconqui
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nprelconqui_seq" CASCADE;

CREATE SEQUENCE "nprelconqui_seq";


ALTER TABLE "nprelconqui" DROP COLUMN ID;



ALTER TABLE "nprelconqui" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nprelconqui_seq'::regclass);


ALTER TABLE "nprelconqui" ADD PRIMARY KEY ("id");

CREATE INDEX "nprelconqui01" ON "nprelconqui" ("codemp","codcon");

CREATE INDEX "nprelconqui02" ON "nprelconqui" ("codemp");

CREATE INDEX "nprelconqui03" ON "nprelconqui" ("codcon");

-----------------------------------------------------------------------------
-- npsalint
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npsalint_seq" CASCADE;

CREATE SEQUENCE "npsalint_seq";


ALTER TABLE "npsalint" DROP COLUMN ID;



ALTER TABLE "npsalint" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_seq'::regclass);


ALTER TABLE "npsalint" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npsalint_03022007
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npsalint_03022007_seq" CASCADE;

CREATE SEQUENCE "npsalint_03022007_seq";


ALTER TABLE "npsalint_03022007" DROP COLUMN ID;



ALTER TABLE "npsalint_03022007" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_03022007_seq'::regclass);


ALTER TABLE "npsalint_03022007" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npsalint_05022007
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npsalint_05022007_seq" CASCADE;

CREATE SEQUENCE "npsalint_05022007_seq";


ALTER TABLE "npsalint_05022007" DROP COLUMN ID;



ALTER TABLE "npsalint_05022007" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_05022007_seq'::regclass);


ALTER TABLE "npsalint_05022007" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npsalint_06022007
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npsalint_06022007_seq" CASCADE;

CREATE SEQUENCE "npsalint_06022007_seq";


ALTER TABLE "npsalint_06022007" DROP COLUMN ID;



ALTER TABLE "npsalint_06022007" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npsalint_06022007_seq'::regclass);


ALTER TABLE "npsalint_06022007" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npseghcm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npseghcm_seq" CASCADE;

CREATE SEQUENCE "npseghcm_seq";


ALTER TABLE "npseghcm" DROP COLUMN ID;



ALTER TABLE "npseghcm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npseghcm_seq'::regclass);


ALTER TABLE "npseghcm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npsitemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npsitemp_seq" CASCADE;

CREATE SEQUENCE "npsitemp_seq";


ALTER TABLE "npsitemp" DROP COLUMN ID;



ALTER TABLE "npsitemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npsitemp_seq'::regclass);


ALTER TABLE "npsitemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npsso
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npsso_seq" CASCADE;

CREATE SEQUENCE "npsso_seq";


ALTER TABLE "npsso" DROP COLUMN ID;



ALTER TABLE "npsso" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npsso_seq'::regclass);


ALTER TABLE "npsso" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npsucban
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npsucban_seq" CASCADE;

CREATE SEQUENCE "npsucban_seq";


ALTER TABLE "npsucban" DROP COLUMN ID;



ALTER TABLE "npsucban" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npsucban_seq'::regclass);


ALTER TABLE "npsucban" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptabpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptabpre_seq" CASCADE;

CREATE SEQUENCE "nptabpre_seq";


ALTER TABLE "nptabpre" DROP COLUMN ID;



ALTER TABLE "nptabpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptabpre_seq'::regclass);


ALTER TABLE "nptabpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptasfid
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptasfid_seq" CASCADE;

CREATE SEQUENCE "nptasfid_seq";


ALTER TABLE "nptasfid" DROP COLUMN ID;



ALTER TABLE "nptasfid" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptasfid_seq'::regclass);


ALTER TABLE "nptasfid" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipact_seq" CASCADE;

CREATE SEQUENCE "nptipact_seq";


ALTER TABLE "nptipact" DROP COLUMN ID;



ALTER TABLE "nptipact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipact_seq'::regclass);


ALTER TABLE "nptipact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipadi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipadi_seq" CASCADE;

CREATE SEQUENCE "nptipadi_seq";


ALTER TABLE "nptipadi" DROP COLUMN ID;



ALTER TABLE "nptipadi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipadi_seq'::regclass);


ALTER TABLE "nptipadi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipaportes
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipaportes_seq" CASCADE;

CREATE SEQUENCE "nptipaportes_seq";


ALTER TABLE "nptipaportes" DROP COLUMN ID;



ALTER TABLE "nptipaportes" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipaportes_seq'::regclass);


ALTER TABLE "nptipaportes" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipcar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipcar_seq" CASCADE;

CREATE SEQUENCE "nptipcar_seq";


ALTER TABLE "nptipcar" DROP COLUMN ID;



ALTER TABLE "nptipcar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipcar_seq'::regclass);


ALTER TABLE "nptipcar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipcla
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipcla_seq" CASCADE;

CREATE SEQUENCE "nptipcla_seq";


ALTER TABLE "nptipcla" DROP COLUMN ID;



ALTER TABLE "nptipcla" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipcla_seq'::regclass);


ALTER TABLE "nptipcla" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipcon_seq" CASCADE;

CREATE SEQUENCE "nptipcon_seq";


ALTER TABLE "nptipcon" DROP COLUMN ID;



ALTER TABLE "nptipcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipcon_seq'::regclass);


ALTER TABLE "nptipcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipcon_old
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipcon_old_seq" CASCADE;

CREATE SEQUENCE "nptipcon_old_seq";


ALTER TABLE "nptipcon_old" DROP COLUMN ID;



ALTER TABLE "nptipcon_old" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipcon_old_seq'::regclass);


ALTER TABLE "nptipcon_old" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipded
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipded_seq" CASCADE;

CREATE SEQUENCE "nptipded_seq";


ALTER TABLE "nptipded" DROP COLUMN ID;



ALTER TABLE "nptipded" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipded_seq'::regclass);


ALTER TABLE "nptipded" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipesp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipesp_seq" CASCADE;

CREATE SEQUENCE "nptipesp_seq";


ALTER TABLE "nptipesp" DROP COLUMN ID;



ALTER TABLE "nptipesp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipesp_seq'::regclass);


ALTER TABLE "nptipesp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipgas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipgas_seq" CASCADE;

CREATE SEQUENCE "nptipgas_seq";


ALTER TABLE "nptipgas" DROP COLUMN ID;



ALTER TABLE "nptipgas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipgas_seq'::regclass);


ALTER TABLE "nptipgas" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipniv
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipniv_seq" CASCADE;

CREATE SEQUENCE "nptipniv_seq";


ALTER TABLE "nptipniv" DROP COLUMN ID;



ALTER TABLE "nptipniv" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipniv_seq'::regclass);


ALTER TABLE "nptipniv" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptippag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptippag_seq" CASCADE;

CREATE SEQUENCE "nptippag_seq";


ALTER TABLE "nptippag" DROP COLUMN ID;



ALTER TABLE "nptippag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptippag_seq'::regclass);


ALTER TABLE "nptippag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptippar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptippar_seq" CASCADE;

CREATE SEQUENCE "nptippar_seq";


ALTER TABLE "nptippar" DROP COLUMN ID;



ALTER TABLE "nptippar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptippar_seq'::regclass);


ALTER TABLE "nptippar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipper
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipper_seq" CASCADE;

CREATE SEQUENCE "nptipper_seq";


ALTER TABLE "nptipper" DROP COLUMN ID;



ALTER TABLE "nptipper" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipper_seq'::regclass);


ALTER TABLE "nptipper" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptippre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptippre_seq" CASCADE;

CREATE SEQUENCE "nptippre_seq";


ALTER TABLE "nptippre" DROP COLUMN ID;



ALTER TABLE "nptippre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptippre_seq'::regclass);


ALTER TABLE "nptippre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptipret
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptipret_seq" CASCADE;

CREATE SEQUENCE "nptipret_seq";


ALTER TABLE "nptipret" DROP COLUMN ID;



ALTER TABLE "nptipret" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptipret_seq'::regclass);


ALTER TABLE "nptipret" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nptitulos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nptitulos_seq" CASCADE;

CREATE SEQUENCE "nptitulos_seq";


ALTER TABLE "nptitulos" DROP COLUMN ID;



ALTER TABLE "nptitulos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nptitulos_seq'::regclass);


ALTER TABLE "nptitulos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npunicat
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npunicat_seq" CASCADE;

CREATE SEQUENCE "npunicat_seq";


ALTER TABLE "npunicat" DROP COLUMN ID;



ALTER TABLE "npunicat" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npunicat_seq'::regclass);


ALTER TABLE "npunicat" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npunieje
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npunieje_seq" CASCADE;

CREATE SEQUENCE "npunieje_seq";


ALTER TABLE "npunieje" DROP COLUMN ID;



ALTER TABLE "npunieje" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npunieje_seq'::regclass);


ALTER TABLE "npunieje" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacaciones
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacaciones_seq" CASCADE;

CREATE SEQUENCE "npvacaciones_seq";


ALTER TABLE "npvacaciones" DROP COLUMN ID;



ALTER TABLE "npvacaciones" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacaciones_seq'::regclass);


ALTER TABLE "npvacaciones" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacant
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacant_seq" CASCADE;

CREATE SEQUENCE "npvacant_seq";


ALTER TABLE "npvacant" DROP COLUMN ID;



ALTER TABLE "npvacant" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacant_seq'::regclass);


ALTER TABLE "npvacant" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvaccol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvaccol_seq" CASCADE;

CREATE SEQUENCE "npvaccol_seq";


ALTER TABLE "npvaccol" DROP COLUMN ID;



ALTER TABLE "npvaccol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvaccol_seq'::regclass);


ALTER TABLE "npvaccol" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacdefgen
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacdefgen_seq" CASCADE;

CREATE SEQUENCE "npvacdefgen_seq";


ALTER TABLE "npvacdefgen" DROP COLUMN ID;



ALTER TABLE "npvacdefgen" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacdefgen_seq'::regclass);


ALTER TABLE "npvacdefgen" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacdiadis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacdiadis_seq" CASCADE;

CREATE SEQUENCE "npvacdiadis_seq";


ALTER TABLE "npvacdiadis" DROP COLUMN ID;



ALTER TABLE "npvacdiadis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacdiadis_seq'::regclass);


ALTER TABLE "npvacdiadis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacdiafer
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacdiafer_seq" CASCADE;

CREATE SEQUENCE "npvacdiafer_seq";


ALTER TABLE "npvacdiafer" DROP COLUMN ID;



ALTER TABLE "npvacdiafer" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacdiafer_seq'::regclass);


ALTER TABLE "npvacdiafer" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacdiasbonovac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacdiasbonovac_seq" CASCADE;

CREATE SEQUENCE "npvacdiasbonovac_seq";


ALTER TABLE "npvacdiasbonovac" DROP COLUMN ID;



ALTER TABLE "npvacdiasbonovac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacdiasbonovac_seq'::regclass);


ALTER TABLE "npvacdiasbonovac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacdisfrute
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacdisfrute_seq" CASCADE;

CREATE SEQUENCE "npvacdisfrute_seq";


ALTER TABLE "npvacdisfrute" DROP COLUMN ID;



ALTER TABLE "npvacdisfrute" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacdisfrute_seq'::regclass);


ALTER TABLE "npvacdisfrute" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacfra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacfra_seq" CASCADE;

CREATE SEQUENCE "npvacfra_seq";


ALTER TABLE "npvacfra" DROP COLUMN ID;



ALTER TABLE "npvacfra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacfra_seq'::regclass);


ALTER TABLE "npvacfra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacjorlab
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacjorlab_seq" CASCADE;

CREATE SEQUENCE "npvacjorlab_seq";


ALTER TABLE "npvacjorlab" DROP COLUMN ID;



ALTER TABLE "npvacjorlab" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacjorlab_seq'::regclass);


ALTER TABLE "npvacjorlab" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacliquidacion
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacliquidacion_seq" CASCADE;

CREATE SEQUENCE "npvacliquidacion_seq";


ALTER TABLE "npvacliquidacion" DROP COLUMN ID;



ALTER TABLE "npvacliquidacion" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacliquidacion_seq'::regclass);


ALTER TABLE "npvacliquidacion" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacregcalnom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacregcalnom_seq" CASCADE;

CREATE SEQUENCE "npvacregcalnom_seq";


ALTER TABLE "npvacregcalnom" DROP COLUMN ID;



ALTER TABLE "npvacregcalnom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacregcalnom_seq'::regclass);


ALTER TABLE "npvacregcalnom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacregcondis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacregcondis_seq" CASCADE;

CREATE SEQUENCE "npvacregcondis_seq";


ALTER TABLE "npvacregcondis" DROP COLUMN ID;



ALTER TABLE "npvacregcondis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacregcondis_seq'::regclass);


ALTER TABLE "npvacregcondis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacregsal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacregsal_seq" CASCADE;

CREATE SEQUENCE "npvacregsal_seq";


ALTER TABLE "npvacregsal" DROP COLUMN ID;



ALTER TABLE "npvacregsal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacregsal_seq'::regclass);


ALTER TABLE "npvacregsal" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacsalidas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacsalidas_seq" CASCADE;

CREATE SEQUENCE "npvacsalidas_seq";


ALTER TABLE "npvacsalidas" DROP COLUMN ID;



ALTER TABLE "npvacsalidas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacsalidas_seq'::regclass);


ALTER TABLE "npvacsalidas" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npvacsalidas_det
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npvacsalidas_det_seq" CASCADE;

CREATE SEQUENCE "npvacsalidas_det_seq";


ALTER TABLE "npvacsalidas_det" DROP COLUMN ID;



ALTER TABLE "npvacsalidas_det" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npvacsalidas_det_seq'::regclass);


ALTER TABLE "npvacsalidas_det" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npasiparcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npasiparcon_seq" CASCADE;

CREATE SEQUENCE "npasiparcon_seq";


ALTER TABLE "npasiparcon" DROP COLUMN ID;



ALTER TABLE "npasiparcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npasiparcon_seq'::regclass);


ALTER TABLE "npasiparcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- npordfid
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "npordfid_seq" CASCADE;

CREATE SEQUENCE "npordfid_seq";


ALTER TABLE "npordfid" DROP COLUMN ID;



ALTER TABLE "npordfid" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('npordfid_seq'::regclass);


ALTER TABLE "npordfid" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocactcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocactcom_seq" CASCADE;

CREATE SEQUENCE "ocactcom_seq";


ALTER TABLE "ocactcom" DROP COLUMN ID;



ALTER TABLE "ocactcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocactcom_seq'::regclass);


ALTER TABLE "ocactcom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocasiact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocasiact_seq" CASCADE;

CREATE SEQUENCE "ocasiact_seq";


ALTER TABLE "ocasiact" DROP COLUMN ID;



ALTER TABLE "ocasiact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocasiact_seq'::regclass);


ALTER TABLE "ocasiact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- occiudad
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "occiudad_seq" CASCADE;

CREATE SEQUENCE "occiudad_seq";


ALTER TABLE "occiudad" DROP COLUMN ID;



ALTER TABLE "occiudad" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('occiudad_seq'::regclass);


ALTER TABLE "occiudad" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocdatste
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocdatste_seq" CASCADE;

CREATE SEQUENCE "ocdatste_seq";


ALTER TABLE "ocdatste" DROP COLUMN ID;



ALTER TABLE "ocdatste" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocdatste_seq'::regclass);


ALTER TABLE "ocdatste" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocdefemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocdefemp_seq" CASCADE;

CREATE SEQUENCE "ocdefemp_seq";


ALTER TABLE "ocdefemp" DROP COLUMN ID;



ALTER TABLE "ocdefemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocdefemp_seq'::regclass);


ALTER TABLE "ocdefemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocdefequ
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocdefequ_seq" CASCADE;

CREATE SEQUENCE "ocdefequ_seq";


ALTER TABLE "ocdefequ" DROP COLUMN ID;



ALTER TABLE "ocdefequ" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocdefequ_seq'::regclass);


ALTER TABLE "ocdefequ" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocdeforg
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocdeforg_seq" CASCADE;

CREATE SEQUENCE "ocdeforg_seq";


ALTER TABLE "ocdeforg" DROP COLUMN ID;



ALTER TABLE "ocdeforg" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocdeforg_seq'::regclass);


ALTER TABLE "ocdeforg" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocdefpar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocdefpar_seq" CASCADE;

CREATE SEQUENCE "ocdefpar_seq";


ALTER TABLE "ocdefpar" DROP COLUMN ID;



ALTER TABLE "ocdefpar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocdefpar_seq'::regclass);


ALTER TABLE "ocdefpar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocdefper
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocdefper_seq" CASCADE;

CREATE SEQUENCE "ocdefper_seq";


ALTER TABLE "ocdefper" DROP COLUMN ID;



ALTER TABLE "ocdefper" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocdefper_seq'::regclass);


ALTER TABLE "ocdefper" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocdocact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocdocact_seq" CASCADE;

CREATE SEQUENCE "ocdocact_seq";


ALTER TABLE "ocdocact" DROP COLUMN ID;



ALTER TABLE "ocdocact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocdocact_seq'::regclass);


ALTER TABLE "ocdocact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocestado
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocestado_seq" CASCADE;

CREATE SEQUENCE "ocestado_seq";


ALTER TABLE "ocestado" DROP COLUMN ID;



ALTER TABLE "ocestado" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocestado_seq'::regclass);


ALTER TABLE "ocestado" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocinginsobr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocinginsobr_seq" CASCADE;

CREATE SEQUENCE "ocinginsobr_seq";


ALTER TABLE "ocinginsobr" DROP COLUMN ID;



ALTER TABLE "ocinginsobr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocinginsobr_seq'::regclass);


ALTER TABLE "ocinginsobr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocingrescon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocingrescon_seq" CASCADE;

CREATE SEQUENCE "ocingrescon_seq";


ALTER TABLE "ocingrescon" DROP COLUMN ID;



ALTER TABLE "ocingrescon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocingrescon_seq'::regclass);


ALTER TABLE "ocingrescon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocinscon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocinscon_seq" CASCADE;

CREATE SEQUENCE "ocinscon_seq";


ALTER TABLE "ocinscon" DROP COLUMN ID;



ALTER TABLE "ocinscon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocinscon_seq'::regclass);


ALTER TABLE "ocinscon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocinsval
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocinsval_seq" CASCADE;

CREATE SEQUENCE "ocinsval_seq";


ALTER TABLE "ocinsval" DROP COLUMN ID;



ALTER TABLE "ocinsval" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocinsval_seq'::regclass);


ALTER TABLE "ocinsval" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocmunici
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocmunici_seq" CASCADE;

CREATE SEQUENCE "ocmunici_seq";


ALTER TABLE "ocmunici" DROP COLUMN ID;



ALTER TABLE "ocmunici" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocmunici_seq'::regclass);


ALTER TABLE "ocmunici" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocobrfot
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocobrfot_seq" CASCADE;

CREATE SEQUENCE "ocobrfot_seq";


ALTER TABLE "ocobrfot" DROP COLUMN ID;



ALTER TABLE "ocobrfot" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocobrfot_seq'::regclass);


ALTER TABLE "ocobrfot" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocofeser
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocofeser_seq" CASCADE;

CREATE SEQUENCE "ocofeser_seq";


ALTER TABLE "ocofeser" DROP COLUMN ID;



ALTER TABLE "ocofeser" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocofeser_seq'::regclass);


ALTER TABLE "ocofeser" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocofeserval
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocofeserval_seq" CASCADE;

CREATE SEQUENCE "ocofeserval_seq";


ALTER TABLE "ocofeserval" DROP COLUMN ID;



ALTER TABLE "ocofeserval" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocofeserval_seq'::regclass);


ALTER TABLE "ocofeserval" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocpais
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocpais_seq" CASCADE;

CREATE SEQUENCE "ocpais_seq";


ALTER TABLE "ocpais" DROP COLUMN ID;



ALTER TABLE "ocpais" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocpais_seq'::regclass);


ALTER TABLE "ocpais" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocparcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocparcon_seq" CASCADE;

CREATE SEQUENCE "ocparcon_seq";


ALTER TABLE "ocparcon" DROP COLUMN ID;



ALTER TABLE "ocparcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocparcon_seq'::regclass);


ALTER TABLE "ocparcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocparins
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocparins_seq" CASCADE;

CREATE SEQUENCE "ocparins_seq";


ALTER TABLE "ocparins" DROP COLUMN ID;



ALTER TABLE "ocparins" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocparins_seq'::regclass);


ALTER TABLE "ocparins" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocparroq
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocparroq_seq" CASCADE;

CREATE SEQUENCE "ocparroq_seq";


ALTER TABLE "ocparroq" DROP COLUMN ID;



ALTER TABLE "ocparroq" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocparroq_seq'::regclass);


ALTER TABLE "ocparroq" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocparval
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocparval_seq" CASCADE;

CREATE SEQUENCE "ocparval_seq";


ALTER TABLE "ocparval" DROP COLUMN ID;



ALTER TABLE "ocparval" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocparval_seq'::regclass);


ALTER TABLE "ocparval" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocpreobr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocpreobr_seq" CASCADE;

CREATE SEQUENCE "ocpreobr_seq";


ALTER TABLE "ocpreobr" DROP COLUMN ID;



ALTER TABLE "ocpreobr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocpreobr_seq'::regclass);


ALTER TABLE "ocpreobr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocproequ
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocproequ_seq" CASCADE;

CREATE SEQUENCE "ocproequ_seq";


ALTER TABLE "ocproequ" DROP COLUMN ID;



ALTER TABLE "ocproequ" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocproequ_seq'::regclass);


ALTER TABLE "ocproequ" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocproesp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocproesp_seq" CASCADE;

CREATE SEQUENCE "ocproesp_seq";


ALTER TABLE "ocproesp" DROP COLUMN ID;



ALTER TABLE "ocproesp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocproesp_seq'::regclass);


ALTER TABLE "ocproesp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocproper
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocproper_seq" CASCADE;

CREATE SEQUENCE "ocproper_seq";


ALTER TABLE "ocproper" DROP COLUMN ID;



ALTER TABLE "ocproper" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocproper_seq'::regclass);


ALTER TABLE "ocproper" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocprovee
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocprovee_seq" CASCADE;

CREATE SEQUENCE "ocprovee_seq";


ALTER TABLE "ocprovee" DROP COLUMN ID;



ALTER TABLE "ocprovee" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocprovee_seq'::regclass);


ALTER TABLE "ocprovee" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocregact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocregact_seq" CASCADE;

CREATE SEQUENCE "ocregact_seq";


ALTER TABLE "ocregact" DROP COLUMN ID;



ALTER TABLE "ocregact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocregact_seq'::regclass);


ALTER TABLE "ocregact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocregcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocregcon_seq" CASCADE;

CREATE SEQUENCE "ocregcon_seq";


ALTER TABLE "ocregcon" DROP COLUMN ID;



ALTER TABLE "ocregcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocregcon_seq'::regclass);


ALTER TABLE "ocregcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocregobr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocregobr_seq" CASCADE;

CREATE SEQUENCE "ocregobr_seq";


ALTER TABLE "ocregobr" DROP COLUMN ID;



ALTER TABLE "ocregobr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocregobr_seq'::regclass);


ALTER TABLE "ocregobr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocregsol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocregsol_seq" CASCADE;

CREATE SEQUENCE "ocregsol_seq";


ALTER TABLE "ocregsol" DROP COLUMN ID;



ALTER TABLE "ocregsol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocregsol_seq'::regclass);


ALTER TABLE "ocregsol" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocregval
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocregval_seq" CASCADE;

CREATE SEQUENCE "ocregval_seq";


ALTER TABLE "ocregval" DROP COLUMN ID;



ALTER TABLE "ocregval" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocregval_seq'::regclass);


ALTER TABLE "ocregval" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocressol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocressol_seq" CASCADE;

CREATE SEQUENCE "ocressol_seq";


ALTER TABLE "ocressol" DROP COLUMN ID;



ALTER TABLE "ocressol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocressol_seq'::regclass);


ALTER TABLE "ocressol" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocretcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocretcon_seq" CASCADE;

CREATE SEQUENCE "ocretcon_seq";


ALTER TABLE "ocretcon" DROP COLUMN ID;



ALTER TABLE "ocretcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocretcon_seq'::regclass);


ALTER TABLE "ocretcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocretval
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocretval_seq" CASCADE;

CREATE SEQUENCE "ocretval_seq";


ALTER TABLE "ocretval" DROP COLUMN ID;



ALTER TABLE "ocretval" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocretval_seq'::regclass);


ALTER TABLE "ocretval" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocsector
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocsector_seq" CASCADE;

CREATE SEQUENCE "ocsector_seq";


ALTER TABLE "ocsector" DROP COLUMN ID;



ALTER TABLE "ocsector" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocsector_seq'::regclass);


ALTER TABLE "ocsector" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octartip
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octartip_seq" CASCADE;

CREATE SEQUENCE "octartip_seq";


ALTER TABLE "octartip" DROP COLUMN ID;



ALTER TABLE "octartip" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octartip_seq'::regclass);


ALTER TABLE "octartip" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipact_seq" CASCADE;

CREATE SEQUENCE "octipact_seq";


ALTER TABLE "octipact" DROP COLUMN ID;



ALTER TABLE "octipact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipact_seq'::regclass);


ALTER TABLE "octipact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipcar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipcar_seq" CASCADE;

CREATE SEQUENCE "octipcar_seq";


ALTER TABLE "octipcar" DROP COLUMN ID;



ALTER TABLE "octipcar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipcar_seq'::regclass);


ALTER TABLE "octipcar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipcon_seq" CASCADE;

CREATE SEQUENCE "octipcon_seq";


ALTER TABLE "octipcon" DROP COLUMN ID;



ALTER TABLE "octipcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipcon_seq'::regclass);


ALTER TABLE "octipcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipesp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipesp_seq" CASCADE;

CREATE SEQUENCE "octipesp_seq";


ALTER TABLE "octipesp" DROP COLUMN ID;



ALTER TABLE "octipesp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipesp_seq'::regclass);


ALTER TABLE "octipesp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipobr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipobr_seq" CASCADE;

CREATE SEQUENCE "octipobr_seq";


ALTER TABLE "octipobr" DROP COLUMN ID;



ALTER TABLE "octipobr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipobr_seq'::regclass);


ALTER TABLE "octipobr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octiporg
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octiporg_seq" CASCADE;

CREATE SEQUENCE "octiporg_seq";


ALTER TABLE "octiporg" DROP COLUMN ID;



ALTER TABLE "octiporg" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octiporg_seq'::regclass);


ALTER TABLE "octiporg" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipprl
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipprl_seq" CASCADE;

CREATE SEQUENCE "octipprl_seq";


ALTER TABLE "octipprl" DROP COLUMN ID;



ALTER TABLE "octipprl" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipprl_seq'::regclass);


ALTER TABLE "octipprl" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octippro
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octippro_seq" CASCADE;

CREATE SEQUENCE "octippro_seq";


ALTER TABLE "octippro" DROP COLUMN ID;



ALTER TABLE "octippro" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octippro_seq'::regclass);


ALTER TABLE "octippro" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipret
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipret_seq" CASCADE;

CREATE SEQUENCE "octipret_seq";


ALTER TABLE "octipret" DROP COLUMN ID;



ALTER TABLE "octipret" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipret_seq'::regclass);


ALTER TABLE "octipret" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipsol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipsol_seq" CASCADE;

CREATE SEQUENCE "octipsol_seq";


ALTER TABLE "octipsol" DROP COLUMN ID;



ALTER TABLE "octipsol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipsol_seq'::regclass);


ALTER TABLE "octipsol" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipste
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipste_seq" CASCADE;

CREATE SEQUENCE "octipste_seq";


ALTER TABLE "octipste" DROP COLUMN ID;



ALTER TABLE "octipste" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipste_seq'::regclass);


ALTER TABLE "octipste" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- octipval
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "octipval_seq" CASCADE;

CREATE SEQUENCE "octipval_seq";


ALTER TABLE "octipval" DROP COLUMN ID;



ALTER TABLE "octipval" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('octipval_seq'::regclass);


ALTER TABLE "octipval" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ocunidad
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ocunidad_seq" CASCADE;

CREATE SEQUENCE "ocunidad_seq";


ALTER TABLE "ocunidad" DROP COLUMN ID;



ALTER TABLE "ocunidad" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ocunidad_seq'::regclass);


ALTER TABLE "ocunidad" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caajuoc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caajuoc_seq" CASCADE;

CREATE SEQUENCE "caajuoc_seq";


ALTER TABLE "caajuoc" DROP COLUMN ID;



ALTER TABLE "caajuoc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caajuoc_seq'::regclass);


ALTER TABLE "caajuoc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartalm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartalm_seq" CASCADE;

CREATE SEQUENCE "caartalm_seq";


ALTER TABLE "caartalm" DROP COLUMN ID;



ALTER TABLE "caartalm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartalm_seq'::regclass);


ALTER TABLE "caartalm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartaoc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartaoc_seq" CASCADE;

CREATE SEQUENCE "caartaoc_seq";


ALTER TABLE "caartaoc" DROP COLUMN ID;



ALTER TABLE "caartaoc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartaoc_seq'::regclass);


ALTER TABLE "caartaoc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartdph
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartdph_seq" CASCADE;

CREATE SEQUENCE "caartdph_seq";


ALTER TABLE "caartdph" DROP COLUMN ID;



ALTER TABLE "caartdph" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartdph_seq'::regclass);


ALTER TABLE "caartdph" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartdphser
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartdphser_seq" CASCADE;

CREATE SEQUENCE "caartdphser_seq";


ALTER TABLE "caartdphser" DROP COLUMN ID;



ALTER TABLE "caartdphser" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartdphser_seq'::regclass);


ALTER TABLE "caartdphser" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartfec
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartfec_seq" CASCADE;

CREATE SEQUENCE "caartfec_seq";


ALTER TABLE "caartfec" DROP COLUMN ID;



ALTER TABLE "caartfec" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartfec_seq'::regclass);


ALTER TABLE "caartfec" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartord
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartord_seq" CASCADE;

CREATE SEQUENCE "caartord_seq";


ALTER TABLE "caartord" DROP COLUMN ID;



ALTER TABLE "caartord" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartord_seq'::regclass);


ALTER TABLE "caartord" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartreq
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartreq_seq" CASCADE;

CREATE SEQUENCE "caartreq_seq";


ALTER TABLE "caartreq" DROP COLUMN ID;



ALTER TABLE "caartreq" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartreq_seq'::regclass);


ALTER TABLE "caartreq" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartsol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartsol_seq" CASCADE;

CREATE SEQUENCE "caartsol_seq";


ALTER TABLE "caartsol" DROP COLUMN ID;



ALTER TABLE "caartsol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartsol_seq'::regclass);


ALTER TABLE "caartsol" ADD PRIMARY KEY ("id");

CREATE INDEX "i_caartsol" ON "caartsol" ("codart");

-----------------------------------------------------------------------------
-- caconpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caconpag_seq" CASCADE;

CREATE SEQUENCE "caconpag_seq";


ALTER TABLE "caconpag" DROP COLUMN ID;



ALTER TABLE "caconpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caconpag_seq'::regclass);


ALTER TABLE "caconpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cacorrel
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cacorrel_seq" CASCADE;

CREATE SEQUENCE "cacorrel_seq";


ALTER TABLE "cacorrel" DROP COLUMN ID;



ALTER TABLE "cacorrel" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cacorrel_seq'::regclass);


ALTER TABLE "cacorrel" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadefalm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadefalm_seq" CASCADE;

CREATE SEQUENCE "cadefalm_seq";


ALTER TABLE "cadefalm" DROP COLUMN ID;



ALTER TABLE "cadefalm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadefalm_seq'::regclass);


ALTER TABLE "cadefalm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadefubi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadefubi_seq" CASCADE;

CREATE SEQUENCE "cadefubi_seq";


ALTER TABLE "cadefubi" DROP COLUMN ID;



ALTER TABLE "cadefubi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadefubi_seq'::regclass);


ALTER TABLE "cadefubi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadescto
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadescto_seq" CASCADE;

CREATE SEQUENCE "cadescto_seq";


ALTER TABLE "cadescto" DROP COLUMN ID;



ALTER TABLE "cadescto" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadescto_seq'::regclass);


ALTER TABLE "cadescto" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadetcot
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadetcot_seq" CASCADE;

CREATE SEQUENCE "cadetcot_seq";


ALTER TABLE "cadetcot" DROP COLUMN ID;



ALTER TABLE "cadetcot" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadetcot_seq'::regclass);


ALTER TABLE "cadetcot" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadetordc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadetordc_seq" CASCADE;

CREATE SEQUENCE "cadetordc_seq";


ALTER TABLE "cadetordc" DROP COLUMN ID;



ALTER TABLE "cadetordc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadetordc_seq'::regclass);


ALTER TABLE "cadetordc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadettra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadettra_seq" CASCADE;

CREATE SEQUENCE "cadettra_seq";


ALTER TABLE "cadettra" DROP COLUMN ID;



ALTER TABLE "cadettra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadettra_seq'::regclass);


ALTER TABLE "cadettra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadisrgo
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadisrgo_seq" CASCADE;

CREATE SEQUENCE "cadisrgo_seq";


ALTER TABLE "cadisrgo" DROP COLUMN ID;



ALTER TABLE "cadisrgo" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadisrgo_seq'::regclass);


ALTER TABLE "cadisrgo" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadphart
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadphart_seq" CASCADE;

CREATE SEQUENCE "cadphart_seq";


ALTER TABLE "cadphart" DROP COLUMN ID;



ALTER TABLE "cadphart" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadphart_seq'::regclass);


ALTER TABLE "cadphart" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadphartser
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadphartser_seq" CASCADE;

CREATE SEQUENCE "cadphartser_seq";


ALTER TABLE "cadphartser" DROP COLUMN ID;



ALTER TABLE "cadphartser" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadphartser_seq'::regclass);


ALTER TABLE "cadphartser" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caforent
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caforent_seq" CASCADE;

CREATE SEQUENCE "caforent_seq";


ALTER TABLE "caforent" DROP COLUMN ID;



ALTER TABLE "caforent" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caforent_seq'::regclass);


ALTER TABLE "caforent" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- camotfal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "camotfal_seq" CASCADE;

CREATE SEQUENCE "camotfal_seq";


ALTER TABLE "camotfal" DROP COLUMN ID;



ALTER TABLE "camotfal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('camotfal_seq'::regclass);


ALTER TABLE "camotfal" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caordcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caordcon_seq" CASCADE;

CREATE SEQUENCE "caordcon_seq";


ALTER TABLE "caordcon" DROP COLUMN ID;



ALTER TABLE "caordcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caordcon_seq'::regclass);


ALTER TABLE "caordcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caordconpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caordconpag_seq" CASCADE;

CREATE SEQUENCE "caordconpag_seq";


ALTER TABLE "caordconpag" DROP COLUMN ID;



ALTER TABLE "caordconpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caordconpag_seq'::regclass);


ALTER TABLE "caordconpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caordforent
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caordforent_seq" CASCADE;

CREATE SEQUENCE "caordforent_seq";


ALTER TABLE "caordforent" DROP COLUMN ID;



ALTER TABLE "caordforent" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caordforent_seq'::regclass);


ALTER TABLE "caordforent" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caramart
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caramart_seq" CASCADE;

CREATE SEQUENCE "caramart_seq";


ALTER TABLE "caramart" DROP COLUMN ID;



ALTER TABLE "caramart" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caramart_seq'::regclass);


ALTER TABLE "caramart" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- carancot
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "carancot_seq" CASCADE;

CREATE SEQUENCE "carancot_seq";


ALTER TABLE "carancot" DROP COLUMN ID;



ALTER TABLE "carancot" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('carancot_seq'::regclass);


ALTER TABLE "carancot" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- carazcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "carazcom_seq" CASCADE;

CREATE SEQUENCE "carazcom_seq";


ALTER TABLE "carazcom" DROP COLUMN ID;



ALTER TABLE "carazcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('carazcom_seq'::regclass);


ALTER TABLE "carazcom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- carcpart
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "carcpart_seq" CASCADE;

CREATE SEQUENCE "carcpart_seq";


ALTER TABLE "carcpart" DROP COLUMN ID;



ALTER TABLE "carcpart" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('carcpart_seq'::regclass);


ALTER TABLE "carcpart" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- carecarg
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "carecarg_seq" CASCADE;

CREATE SEQUENCE "carecarg_seq";


ALTER TABLE "carecarg" DROP COLUMN ID;



ALTER TABLE "carecarg" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('carecarg_seq'::regclass);


ALTER TABLE "carecarg" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- carecaud
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "carecaud_seq" CASCADE;

CREATE SEQUENCE "carecaud_seq";


ALTER TABLE "carecaud" DROP COLUMN ID;



ALTER TABLE "carecaud" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('carecaud_seq'::regclass);


ALTER TABLE "carecaud" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- carecpro
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "carecpro_seq" CASCADE;

CREATE SEQUENCE "carecpro_seq";


ALTER TABLE "carecpro" DROP COLUMN ID;



ALTER TABLE "carecpro" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('carecpro_seq'::regclass);


ALTER TABLE "carecpro" ADD PRIMARY KEY ("id");

ALTER TABLE "carecpro" ADD CONSTRAINT "carecpro_FK_1" FOREIGN KEY ("codpro") REFERENCES "caprovee" ("codpro");

ALTER TABLE "carecpro" ADD CONSTRAINT "carecpro_FK_2" FOREIGN KEY ("codrec") REFERENCES "carecaud" ("codrec");

-----------------------------------------------------------------------------
-- careqart
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "careqart_seq" CASCADE;

CREATE SEQUENCE "careqart_seq";


ALTER TABLE "careqart" DROP COLUMN ID;



ALTER TABLE "careqart" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('careqart_seq'::regclass);


ALTER TABLE "careqart" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- careqartser
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "careqartser_seq" CASCADE;

CREATE SEQUENCE "careqartser_seq";


ALTER TABLE "careqartser" DROP COLUMN ID;



ALTER TABLE "careqartser" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('careqartser_seq'::regclass);


ALTER TABLE "careqartser" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caresordcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caresordcom_seq" CASCADE;

CREATE SEQUENCE "caresordcom_seq";


ALTER TABLE "caresordcom" DROP COLUMN ID;



ALTER TABLE "caresordcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caresordcom_seq'::regclass);


ALTER TABLE "caresordcom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caretser
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caretser_seq" CASCADE;

CREATE SEQUENCE "caretser_seq";


ALTER TABLE "caretser" DROP COLUMN ID;



ALTER TABLE "caretser" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caretser_seq'::regclass);


ALTER TABLE "caretser" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cargosol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cargosol_seq" CASCADE;

CREATE SEQUENCE "cargosol_seq";


ALTER TABLE "cargosol" DROP COLUMN ID;



ALTER TABLE "cargosol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cargosol_seq'::regclass);


ALTER TABLE "cargosol" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- casolart
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "casolart_seq" CASCADE;

CREATE SEQUENCE "casolart_seq";


ALTER TABLE "casolart" DROP COLUMN ID;



ALTER TABLE "casolart" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('casolart_seq'::regclass);


ALTER TABLE "casolart" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- catalogo
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "catalogo_seq" CASCADE;

CREATE SEQUENCE "catalogo_seq";


ALTER TABLE "catalogo" DROP COLUMN ID;



ALTER TABLE "catalogo" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('catalogo_seq'::regclass);


ALTER TABLE "catalogo" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- catipent
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "catipent_seq" CASCADE;

CREATE SEQUENCE "catipent_seq";


ALTER TABLE "catipent" DROP COLUMN ID;



ALTER TABLE "catipent" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('catipent_seq'::regclass);


ALTER TABLE "catipent" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- catippro
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "catippro_seq" CASCADE;

CREATE SEQUENCE "catippro_seq";


ALTER TABLE "catippro" DROP COLUMN ID;



ALTER TABLE "catippro" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('catippro_seq'::regclass);


ALTER TABLE "catippro" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- catiprec
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "catiprec_seq" CASCADE;

CREATE SEQUENCE "catiprec_seq";


ALTER TABLE "catiprec" DROP COLUMN ID;



ALTER TABLE "catiprec" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('catiprec_seq'::regclass);


ALTER TABLE "catiprec" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- catipsal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "catipsal_seq" CASCADE;

CREATE SEQUENCE "catipsal_seq";


ALTER TABLE "catipsal" DROP COLUMN ID;



ALTER TABLE "catipsal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('catipsal_seq'::regclass);


ALTER TABLE "catipsal" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartpar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartpar_seq" CASCADE;

CREATE SEQUENCE "caartpar_seq";


ALTER TABLE "caartpar" DROP COLUMN ID;



ALTER TABLE "caartpar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartpar_seq'::regclass);


ALTER TABLE "caartpar" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caregart
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caregart_seq" CASCADE;

CREATE SEQUENCE "caregart_seq";


ALTER TABLE "caregart" DROP COLUMN ID;



ALTER TABLE "caregart" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caregart_seq'::regclass);


ALTER TABLE "caregart" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caordcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caordcom_seq" CASCADE;

CREATE SEQUENCE "caordcom_seq";


ALTER TABLE "caordcom" DROP COLUMN ID;



ALTER TABLE "caordcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caordcom_seq'::regclass);


ALTER TABLE "caordcom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cacatsnc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cacatsnc_seq" CASCADE;

CREATE SEQUENCE "cacatsnc_seq";


ALTER TABLE "cacatsnc" DROP COLUMN ID;



ALTER TABLE "cacatsnc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cacatsnc_seq'::regclass);


ALTER TABLE "cacatsnc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- catipempsnc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "catipempsnc_seq" CASCADE;

CREATE SEQUENCE "catipempsnc_seq";


ALTER TABLE "catipempsnc" DROP COLUMN ID;



ALTER TABLE "catipempsnc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('catipempsnc_seq'::regclass);


ALTER TABLE "catipempsnc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- camedcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "camedcom_seq" CASCADE;

CREATE SEQUENCE "camedcom_seq";


ALTER TABLE "camedcom" DROP COLUMN ID;



ALTER TABLE "camedcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('camedcom_seq'::regclass);


ALTER TABLE "camedcom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caprocom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caprocom_seq" CASCADE;

CREATE SEQUENCE "caprocom_seq";


ALTER TABLE "caprocom" DROP COLUMN ID;



ALTER TABLE "caprocom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caprocom_seq'::regclass);


ALTER TABLE "caprocom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caprovee
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caprovee_seq" CASCADE;

CREATE SEQUENCE "caprovee_seq";


ALTER TABLE "caprovee" DROP COLUMN ID;



ALTER TABLE "caprovee" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caprovee_seq'::regclass);


ALTER TABLE "caprovee" ADD PRIMARY KEY ("id");

ALTER TABLE "caprovee" ADD CONSTRAINT "u_caprovee" UNIQUE ("rifpro");

-----------------------------------------------------------------------------
-- caprocomart
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caprocomart_seq" CASCADE;

CREATE SEQUENCE "caprocomart_seq";


ALTER TABLE "caprocomart" DROP COLUMN ID;



ALTER TABLE "caprocomart" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caprocomart_seq'::regclass);


ALTER TABLE "caprocomart" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadefart
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadefart_seq" CASCADE;

CREATE SEQUENCE "cadefart_seq";


ALTER TABLE "cadefart" DROP COLUMN ID;



ALTER TABLE "cadefart" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadefart_seq'::regclass);


ALTER TABLE "cadefart" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cacotiza
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cacotiza_seq" CASCADE;

CREATE SEQUENCE "cacotiza_seq";


ALTER TABLE "cacotiza" DROP COLUMN ID;



ALTER TABLE "cacotiza" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cacotiza_seq'::regclass);


ALTER TABLE "cacotiza" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartalmubi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartalmubi_seq" CASCADE;

CREATE SEQUENCE "caartalmubi_seq";


ALTER TABLE "caartalmubi" DROP COLUMN ID;



ALTER TABLE "caartalmubi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartalmubi_seq'::regclass);


ALTER TABLE "caartalmubi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caalmubi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caalmubi_seq" CASCADE;

CREATE SEQUENCE "caalmubi_seq";


ALTER TABLE "caalmubi" DROP COLUMN ID;



ALTER TABLE "caalmubi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caalmubi_seq'::regclass);


ALTER TABLE "caalmubi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caentalm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caentalm_seq" CASCADE;

CREATE SEQUENCE "caentalm_seq";


ALTER TABLE "caentalm" DROP COLUMN ID;



ALTER TABLE "caentalm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caentalm_seq'::regclass);


ALTER TABLE "caentalm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- casalalm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "casalalm_seq" CASCADE;

CREATE SEQUENCE "casalalm_seq";


ALTER TABLE "casalalm" DROP COLUMN ID;



ALTER TABLE "casalalm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('casalalm_seq'::regclass);


ALTER TABLE "casalalm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadetent
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadetent_seq" CASCADE;

CREATE SEQUENCE "cadetent_seq";


ALTER TABLE "cadetent" DROP COLUMN ID;



ALTER TABLE "cadetent" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadetent_seq'::regclass);


ALTER TABLE "cadetent" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cadetsal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cadetsal_seq" CASCADE;

CREATE SEQUENCE "cadetsal_seq";


ALTER TABLE "cadetsal" DROP COLUMN ID;


ALTER TABLE "cadetsal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cadetsal_seq'::regclass);


ALTER TABLE "cadetsal" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cainvfis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cainvfis_seq" CASCADE;

CREATE SEQUENCE "cainvfis_seq";


ALTER TABLE "cainvfis" DROP COLUMN ID;



ALTER TABLE "cainvfis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cainvfis_seq'::regclass);


ALTER TABLE "cainvfis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- catraalm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "catraalm_seq" CASCADE;

CREATE SEQUENCE "catraalm_seq";


ALTER TABLE "catraalm" DROP COLUMN ID;



ALTER TABLE "catraalm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('catraalm_seq'::regclass);


ALTER TABLE "catraalm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- caartreqser
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "caartreqser_seq" CASCADE;

CREATE SEQUENCE "caartreqser_seq";


ALTER TABLE "caartreqser" DROP COLUMN ID;



ALTER TABLE "caartreqser" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartreqser_seq'::regclass);


ALTER TABLE "caartreqser" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rharecur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rharecur_seq" CASCADE;

CREATE SEQUENCE "rharecur_seq";


ALTER TABLE "rharecur" DROP COLUMN ID;



ALTER TABLE "rharecur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rharecur_seq'::regclass);


ALTER TABLE "rharecur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhasicur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhasicur_seq" CASCADE;

CREATE SEQUENCE "rhasicur_seq";


ALTER TABLE "rhasicur" DROP COLUMN ID;



ALTER TABLE "rhasicur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhasicur_seq'::regclass);


ALTER TABLE "rhasicur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhclacur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhclacur_seq" CASCADE;

CREATE SEQUENCE "rhclacur_seq";


ALTER TABLE "rhclacur" DROP COLUMN ID;



ALTER TABLE "rhclacur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhclacur_seq'::regclass);


ALTER TABLE "rhclacur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhdateva
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhdateva_seq" CASCADE;

CREATE SEQUENCE "rhdateva_seq";


ALTER TABLE "rhdateva" DROP COLUMN ID;



ALTER TABLE "rhdateva" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhdateva_seq'::regclass);


ALTER TABLE "rhdateva" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhdefcur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhdefcur_seq" CASCADE;

CREATE SEQUENCE "rhdefcur_seq";


ALTER TABLE "rhdefcur" DROP COLUMN ID;



ALTER TABLE "rhdefcur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhdefcur_seq'::regclass);


ALTER TABLE "rhdefcur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhdefemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhdefemp_seq" CASCADE;

CREATE SEQUENCE "rhdefemp_seq";


ALTER TABLE "rhdefemp" DROP COLUMN ID;



ALTER TABLE "rhdefemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhdefemp_seq'::regclass);


ALTER TABLE "rhdefemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhdefind
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhdefind_seq" CASCADE;

CREATE SEQUENCE "rhdefind_seq";


ALTER TABLE "rhdefind" DROP COLUMN ID;



ALTER TABLE "rhdefind" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhdefind_seq'::regclass);


ALTER TABLE "rhdefind" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhdefniv
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhdefniv_seq" CASCADE;

CREATE SEQUENCE "rhdefniv_seq";


ALTER TABLE "rhdefniv" DROP COLUMN ID;



ALTER TABLE "rhdefniv" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhdefniv_seq'::regclass);


ALTER TABLE "rhdefniv" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhdefobj
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhdefobj_seq" CASCADE;

CREATE SEQUENCE "rhdefobj_seq";


ALTER TABLE "rhdefobj" DROP COLUMN ID;



ALTER TABLE "rhdefobj" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhdefobj_seq'::regclass);


ALTER TABLE "rhdefobj" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhdefvalins
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhdefvalins_seq" CASCADE;

CREATE SEQUENCE "rhdefvalins_seq";


ALTER TABLE "rhdefvalins" DROP COLUMN ID;



ALTER TABLE "rhdefvalins" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhdefvalins_seq'::regclass);


ALTER TABLE "rhdefvalins" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhevaconcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhevaconcom_seq" CASCADE;

CREATE SEQUENCE "rhevaconcom_seq";


ALTER TABLE "rhevaconcom" DROP COLUMN ID;



ALTER TABLE "rhevaconcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhevaconcom_seq'::regclass);


ALTER TABLE "rhevaconcom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhevaempobj
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhevaempobj_seq" CASCADE;

CREATE SEQUENCE "rhevaempobj_seq";


ALTER TABLE "rhevaempobj" DROP COLUMN ID;



ALTER TABLE "rhevaempobj" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhevaempobj_seq'::regclass);


ALTER TABLE "rhevaempobj" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhindniv
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhindniv_seq" CASCADE;

CREATE SEQUENCE "rhindniv_seq";


ALTER TABLE "rhindniv" DROP COLUMN ID;



ALTER TABLE "rhindniv" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhindniv_seq'::regclass);


ALTER TABLE "rhindniv" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhinscur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhinscur_seq" CASCADE;

CREATE SEQUENCE "rhinscur_seq";


ALTER TABLE "rhinscur" DROP COLUMN ID;



ALTER TABLE "rhinscur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhinscur_seq'::regclass);


ALTER TABLE "rhinscur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhnotcur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhnotcur_seq" CASCADE;

CREATE SEQUENCE "rhnotcur_seq";


ALTER TABLE "rhnotcur" DROP COLUMN ID;



ALTER TABLE "rhnotcur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhnotcur_seq'::regclass);


ALTER TABLE "rhnotcur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhrelobjind
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhrelobjind_seq" CASCADE;

CREATE SEQUENCE "rhrelobjind_seq";


ALTER TABLE "rhrelobjind" DROP COLUMN ID;



ALTER TABLE "rhrelobjind" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhrelobjind_seq'::regclass);


ALTER TABLE "rhrelobjind" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhtipcur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhtipcur_seq" CASCADE;

CREATE SEQUENCE "rhtipcur_seq";


ALTER TABLE "rhtipcur" DROP COLUMN ID;



ALTER TABLE "rhtipcur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhtipcur_seq'::regclass);


ALTER TABLE "rhtipcur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhtitcur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhtitcur_seq" CASCADE;

CREATE SEQUENCE "rhtitcur_seq";


ALTER TABLE "rhtitcur" DROP COLUMN ID;



ALTER TABLE "rhtitcur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhtitcur_seq'::regclass);


ALTER TABLE "rhtitcur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rhvalniv
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rhvalniv_seq" CASCADE;

CREATE SEQUENCE "rhvalniv_seq";


ALTER TABLE "rhvalniv" DROP COLUMN ID;



ALTER TABLE "rhvalniv" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rhvalniv_seq'::regclass);


ALTER TABLE "rhvalniv" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- numeros
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "numeros_seq" CASCADE;

CREATE SEQUENCE "numeros_seq";


ALTER TABLE "numeros" DROP COLUMN ID;



ALTER TABLE "numeros" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('numeros_seq'::regclass);


ALTER TABLE "numeros" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- numerosnew
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "numerosnew_seq" CASCADE;

CREATE SEQUENCE "numerosnew_seq";


ALTER TABLE "numerosnew" DROP COLUMN ID;



ALTER TABLE "numerosnew" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('numerosnew_seq'::regclass);


ALTER TABLE "numerosnew" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnclafun
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnclafun_seq" CASCADE;

CREATE SEQUENCE "bnclafun_seq";


ALTER TABLE "bnclafun" DROP COLUMN ID;



ALTER TABLE "bnclafun" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnclafun_seq'::regclass);


ALTER TABLE "bnclafun" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bncobseg
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bncobseg_seq" CASCADE;

CREATE SEQUENCE "bncobseg_seq";


ALTER TABLE "bncobseg" DROP COLUMN ID;



ALTER TABLE "bncobseg" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bncobseg_seq'::regclass);


ALTER TABLE "bncobseg" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndefact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndefact_seq" CASCADE;

CREATE SEQUENCE "bndefact_seq";


ALTER TABLE "bndefact" DROP COLUMN ID;



ALTER TABLE "bndefact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndefact_seq'::regclass);


ALTER TABLE "bndefact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndefcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndefcon_seq" CASCADE;

CREATE SEQUENCE "bndefcon_seq";


ALTER TABLE "bndefcon" DROP COLUMN ID;



ALTER TABLE "bndefcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndefcon_seq'::regclass);


ALTER TABLE "bndefcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndefconi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndefconi_seq" CASCADE;

CREATE SEQUENCE "bndefconi_seq";


ALTER TABLE "bndefconi" DROP COLUMN ID;



ALTER TABLE "bndefconi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndefconi_seq'::regclass);


ALTER TABLE "bndefconi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndefcons
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndefcons_seq" CASCADE;

CREATE SEQUENCE "bndefcons_seq";


ALTER TABLE "bndefcons" DROP COLUMN ID;



ALTER TABLE "bndefcons" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndefcons_seq'::regclass);


ALTER TABLE "bndefcons" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndefins
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndefins_seq" CASCADE;

CREATE SEQUENCE "bndefins_seq";


ALTER TABLE "bndefins" DROP COLUMN ID;



ALTER TABLE "bndefins" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndefins_seq'::regclass);


ALTER TABLE "bndefins" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndefins_resp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndefins_resp_seq" CASCADE;

CREATE SEQUENCE "bndefins_resp_seq";


ALTER TABLE "bndefins_resp" DROP COLUMN ID;



ALTER TABLE "bndefins_resp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndefins_resp_seq'::regclass);


ALTER TABLE "bndefins_resp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndepact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndepact_seq" CASCADE;

CREATE SEQUENCE "bndepact_seq";


ALTER TABLE "bndepact" DROP COLUMN ID;



ALTER TABLE "bndepact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndepact_seq'::regclass);


ALTER TABLE "bndepact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndepactdet
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndepactdet_seq" CASCADE;

CREATE SEQUENCE "bndepactdet_seq";


ALTER TABLE "bndepactdet" DROP COLUMN ID;



ALTER TABLE "bndepactdet" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndepactdet_seq'::regclass);


ALTER TABLE "bndepactdet" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndisbie
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndisbie_seq" CASCADE;

CREATE SEQUENCE "bndisbie_seq";


ALTER TABLE "bndisbie" DROP COLUMN ID;



ALTER TABLE "bndisbie" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndisbie_seq'::regclass);


ALTER TABLE "bndisbie" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndisinm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndisinm_seq" CASCADE;

CREATE SEQUENCE "bndisinm_seq";


ALTER TABLE "bndisinm" DROP COLUMN ID;



ALTER TABLE "bndisinm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndisinm_seq'::regclass);


ALTER TABLE "bndisinm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndismue
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndismue_seq" CASCADE;

CREATE SEQUENCE "bndismue_seq";


ALTER TABLE "bndismue" DROP COLUMN ID;



ALTER TABLE "bndismue" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndismue_seq'::regclass);


ALTER TABLE "bndismue" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bndissem
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bndissem_seq" CASCADE;

CREATE SEQUENCE "bndissem_seq";


ALTER TABLE "bndissem" DROP COLUMN ID;



ALTER TABLE "bndissem" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bndissem_seq'::regclass);


ALTER TABLE "bndissem" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnipcact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnipcact_seq" CASCADE;

CREATE SEQUENCE "bnipcact_seq";


ALTER TABLE "bnipcact" DROP COLUMN ID;



ALTER TABLE "bnipcact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnipcact_seq'::regclass);


ALTER TABLE "bnipcact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnmotdis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnmotdis_seq" CASCADE;

CREATE SEQUENCE "bnmotdis_seq";


ALTER TABLE "bnmotdis" DROP COLUMN ID;



ALTER TABLE "bnmotdis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnmotdis_seq'::regclass);


ALTER TABLE "bnmotdis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnparbie
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnparbie_seq" CASCADE;

CREATE SEQUENCE "bnparbie_seq";


ALTER TABLE "bnparbie" DROP COLUMN ID;



ALTER TABLE "bnparbie" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnparbie_seq'::regclass);


ALTER TABLE "bnparbie" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnreginm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnreginm_seq" CASCADE;

CREATE SEQUENCE "bnreginm_seq";


ALTER TABLE "bnreginm" DROP COLUMN ID;



ALTER TABLE "bnreginm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnreginm_seq'::regclass);


ALTER TABLE "bnreginm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnregmue
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnregmue_seq" CASCADE;

CREATE SEQUENCE "bnregmue_seq";


ALTER TABLE "bnregmue" DROP COLUMN ID;



ALTER TABLE "bnregmue" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnregmue_seq'::regclass);


ALTER TABLE "bnregmue" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnregsem
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnregsem_seq" CASCADE;

CREATE SEQUENCE "bnregsem_seq";


ALTER TABLE "bnregsem" DROP COLUMN ID;



ALTER TABLE "bnregsem" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnregsem_seq'::regclass);


ALTER TABLE "bnregsem" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnrevact
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnrevact_seq" CASCADE;

CREATE SEQUENCE "bnrevact_seq";


ALTER TABLE "bnrevact" DROP COLUMN ID;



ALTER TABLE "bnrevact" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnrevact_seq'::regclass);


ALTER TABLE "bnrevact" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnsegmue
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnsegmue_seq" CASCADE;

CREATE SEQUENCE "bnsegmue_seq";


ALTER TABLE "bnsegmue" DROP COLUMN ID;



ALTER TABLE "bnsegmue" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnsegmue_seq'::regclass);


ALTER TABLE "bnsegmue" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnsegsem
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnsegsem_seq" CASCADE;

CREATE SEQUENCE "bnsegsem_seq";


ALTER TABLE "bnsegsem" DROP COLUMN ID;



ALTER TABLE "bnsegsem" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnsegsem_seq'::regclass);


ALTER TABLE "bnsegsem" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnubibie
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnubibie_seq" CASCADE;

CREATE SEQUENCE "bnubibie_seq";


ALTER TABLE "bnubibie" DROP COLUMN ID;



ALTER TABLE "bnubibie" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnubibie_seq'::regclass);


ALTER TABLE "bnubibie" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- bnubica
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "bnubica_seq" CASCADE;

CREATE SEQUENCE "bnubica_seq";


ALTER TABLE "bnubica" DROP COLUMN ID;



ALTER TABLE "bnubica" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('bnubica_seq'::regclass);


ALTER TABLE "bnubica" ADD PRIMARY KEY ("id");


-----------------------------------------------------------------------------
-- cpadidis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpadidis_seq" CASCADE;

CREATE SEQUENCE "cpadidis_seq";


ALTER TABLE "cpadidis" DROP COLUMN ID;



ALTER TABLE "cpadidis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpadidis_seq'::regclass);


ALTER TABLE "cpadidis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpajuste
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpajuste_seq" CASCADE;

CREATE SEQUENCE "cpajuste_seq";


ALTER TABLE "cpajuste" DROP COLUMN ID;



ALTER TABLE "cpajuste" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpajuste_seq'::regclass);


ALTER TABLE "cpajuste" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpasiini
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpasiini_seq" CASCADE;

CREATE SEQUENCE "cpasiini_seq";


ALTER TABLE "cpasiini" DROP COLUMN ID;



ALTER TABLE "cpasiini" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpasiini_seq'::regclass);


ALTER TABLE "cpasiini" ADD PRIMARY KEY ("id");

CREATE INDEX "i02cpasiini" ON "cpasiini" ("codpre");

CREATE INDEX "i03cpasiini" ON "cpasiini" ("codpre","perpre");

-----------------------------------------------------------------------------
-- cpcompro
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpcompro_seq" CASCADE;

CREATE SEQUENCE "cpcompro_seq";


ALTER TABLE "cpcompro" DROP COLUMN ID;



ALTER TABLE "cpcompro" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpcompro_seq'::regclass);


ALTER TABLE "cpcompro" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdefniv
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdefniv_seq" CASCADE;

CREATE SEQUENCE "cpdefniv_seq";


ALTER TABLE "cpdefniv" DROP COLUMN ID;



ALTER TABLE "cpdefniv" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdefniv_seq'::regclass);


ALTER TABLE "cpdefniv" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdeftit
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdeftit_seq" CASCADE;

CREATE SEQUENCE "cpdeftit_seq";


ALTER TABLE "cpdeftit" DROP COLUMN ID;



ALTER TABLE "cpdeftit" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdeftit_seq'::regclass);


ALTER TABLE "cpdeftit" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdiscre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdiscre_seq" CASCADE;

CREATE SEQUENCE "cpdiscre_seq";


ALTER TABLE "cpdiscre" DROP COLUMN ID;



ALTER TABLE "cpdiscre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdiscre_seq'::regclass);


ALTER TABLE "cpdiscre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdisfuefin
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdisfuefin_seq" CASCADE;

CREATE SEQUENCE "cpdisfuefin_seq";


ALTER TABLE "cpdisfuefin" DROP COLUMN ID;



ALTER TABLE "cpdisfuefin" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdisfuefin_seq'::regclass);


ALTER TABLE "cpdisfuefin" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdocaju
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdocaju_seq" CASCADE;

CREATE SEQUENCE "cpdocaju_seq";


ALTER TABLE "cpdocaju" DROP COLUMN ID;



ALTER TABLE "cpdocaju" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdocaju_seq'::regclass);


ALTER TABLE "cpdocaju" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdoccau
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdoccau_seq" CASCADE;

CREATE SEQUENCE "cpdoccau_seq";


ALTER TABLE "cpdoccau" DROP COLUMN ID;



ALTER TABLE "cpdoccau" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdoccau_seq'::regclass);


ALTER TABLE "cpdoccau" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdoccom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdoccom_seq" CASCADE;

CREATE SEQUENCE "cpdoccom_seq";


ALTER TABLE "cpdoccom" DROP COLUMN ID;



ALTER TABLE "cpdoccom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdoccom_seq'::regclass);


ALTER TABLE "cpdoccom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdocpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdocpag_seq" CASCADE;

CREATE SEQUENCE "cpdocpag_seq";


ALTER TABLE "cpdocpag" DROP COLUMN ID;



ALTER TABLE "cpdocpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdocpag_seq'::regclass);


ALTER TABLE "cpdocpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpdocprc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdocprc_seq" CASCADE;

CREATE SEQUENCE "cpdocprc_seq";


ALTER TABLE "cpdocprc" DROP COLUMN ID;



ALTER TABLE "cpdocprc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdocprc_seq'::regclass);


ALTER TABLE "cpdocprc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpimpcau
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpimpcau_seq" CASCADE;

CREATE SEQUENCE "cpimpcau_seq";


ALTER TABLE "cpimpcau" DROP COLUMN ID;



ALTER TABLE "cpimpcau" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpimpcau_seq'::regclass);


ALTER TABLE "cpimpcau" ADD PRIMARY KEY ("id");

CREATE INDEX "i01cpimpcau" ON "cpimpcau" ("refcau");

CREATE INDEX "i02cpimpcau" ON "cpimpcau" ("refcau","refere","refprc","codpre");

CREATE INDEX "i03cpimpcau" ON "cpimpcau" ("codpre");

-----------------------------------------------------------------------------
-- cpimpcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpimpcom_seq" CASCADE;

CREATE SEQUENCE "cpimpcom_seq";


ALTER TABLE "cpimpcom" DROP COLUMN ID;



ALTER TABLE "cpimpcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpimpcom_seq'::regclass);


ALTER TABLE "cpimpcom" ADD PRIMARY KEY ("id");

CREATE INDEX "i01cpimpcom" ON "cpimpcom" ("refcom");

CREATE INDEX "i02cpimpcom" ON "cpimpcom" ("refcom","refere","codpre");

CREATE INDEX "i03cpimpcom" ON "cpimpcom" ("codpre");

-----------------------------------------------------------------------------
-- cpimppag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpimppag_seq" CASCADE;

CREATE SEQUENCE "cpimppag_seq";


ALTER TABLE "cpimppag" DROP COLUMN ID;



ALTER TABLE "cpimppag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpimppag_seq'::regclass);


ALTER TABLE "cpimppag" ADD PRIMARY KEY ("id");

CREATE INDEX "i01cpimppag" ON "cpimppag" ("refpag");

CREATE INDEX "i02cpimppag" ON "cpimppag" ("codpre");

-----------------------------------------------------------------------------
-- cpimpprc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpimpprc_seq" CASCADE;

CREATE SEQUENCE "cpimpprc_seq";


ALTER TABLE "cpimpprc" DROP COLUMN ID;



ALTER TABLE "cpimpprc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpimpprc_seq'::regclass);


ALTER TABLE "cpimpprc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpmovadi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpmovadi_seq" CASCADE;

CREATE SEQUENCE "cpmovadi_seq";


ALTER TABLE "cpmovadi" DROP COLUMN ID;



ALTER TABLE "cpmovadi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpmovadi_seq'::regclass);


ALTER TABLE "cpmovadi" ADD PRIMARY KEY ("id");

CREATE INDEX "i01cpmovadi" ON "cpmovadi" ("refadi");

-----------------------------------------------------------------------------
-- cpmovaju
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpmovaju_seq" CASCADE;

CREATE SEQUENCE "cpmovaju_seq";


ALTER TABLE "cpmovaju" DROP COLUMN ID;



ALTER TABLE "cpmovaju" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpmovaju_seq'::regclass);


ALTER TABLE "cpmovaju" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cppagos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cppagos_seq" CASCADE;

CREATE SEQUENCE "cppagos_seq";


ALTER TABLE "cppagos" DROP COLUMN ID;



ALTER TABLE "cppagos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cppagos_seq'::regclass);


ALTER TABLE "cppagos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpprecom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpprecom_seq" CASCADE;

CREATE SEQUENCE "cpprecom_seq";


ALTER TABLE "cpprecom" DROP COLUMN ID;



ALTER TABLE "cpprecom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpprecom_seq'::regclass);


ALTER TABLE "cpprecom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpsoltrasla
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpsoltrasla_seq" CASCADE;

CREATE SEQUENCE "cpsoltrasla_seq";


ALTER TABLE "cpsoltrasla" DROP COLUMN ID;



ALTER TABLE "cpsoltrasla" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpsoltrasla_seq'::regclass);


ALTER TABLE "cpsoltrasla" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpartley
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpartley_seq" CASCADE;

CREATE SEQUENCE "cpartley_seq";


ALTER TABLE "cpartley" DROP COLUMN ID;



ALTER TABLE "cpartley" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpartley_seq'::regclass);


ALTER TABLE "cpartley" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpcausad
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpcausad_seq" CASCADE;

CREATE SEQUENCE "cpcausad_seq";


ALTER TABLE "cpcausad" DROP COLUMN ID;



ALTER TABLE "cpcausad" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpcausad_seq'::regclass);


ALTER TABLE "cpcausad" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpsolmovadi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpsolmovadi_seq" CASCADE;

CREATE SEQUENCE "cpsolmovadi_seq";


ALTER TABLE "cpsolmovadi" DROP COLUMN ID;



ALTER TABLE "cpsolmovadi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpsolmovadi_seq'::regclass);


ALTER TABLE "cpsolmovadi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpsolmovtra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpsolmovtra_seq" CASCADE;

CREATE SEQUENCE "cpsolmovtra_seq";


ALTER TABLE "cpsolmovtra" DROP COLUMN ID;



ALTER TABLE "cpsolmovtra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpsolmovtra_seq'::regclass);


ALTER TABLE "cpsolmovtra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpsoladidis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpsoladidis_seq" CASCADE;

CREATE SEQUENCE "cpsoladidis_seq";


ALTER TABLE "cpsoladidis" DROP COLUMN ID;



ALTER TABLE "cpsoladidis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpsoladidis_seq'::regclass);


ALTER TABLE "cpsoladidis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpmovfuefin
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpmovfuefin_seq" CASCADE;

CREATE SEQUENCE "cpmovfuefin_seq";


ALTER TABLE "cpmovfuefin" DROP COLUMN ID;



ALTER TABLE "cpmovfuefin" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpmovfuefin_seq'::regclass);


ALTER TABLE "cpmovfuefin" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpniveles
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpniveles_seq" CASCADE;

CREATE SEQUENCE "cpniveles_seq";


ALTER TABLE "cpniveles" DROP COLUMN ID;



ALTER TABLE "cpniveles" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpniveles_seq'::regclass);


ALTER TABLE "cpniveles" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cppereje
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cppereje_seq" CASCADE;

CREATE SEQUENCE "cppereje_seq";


ALTER TABLE "cppereje" DROP COLUMN ID;



ALTER TABLE "cppereje" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cppereje_seq'::regclass);


ALTER TABLE "cppereje" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cptrasla
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cptrasla_seq" CASCADE;

CREATE SEQUENCE "cptrasla_seq";


ALTER TABLE "cptrasla" DROP COLUMN ID;



ALTER TABLE "cptrasla" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cptrasla_seq'::regclass);


ALTER TABLE "cptrasla" ADD PRIMARY KEY ("id");

CREATE INDEX "i01cptrasla" ON "cptrasla" ("reftra","fectra");

-----------------------------------------------------------------------------
-- cpimpapa
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpimpapa_seq" CASCADE;

CREATE SEQUENCE "cpimpapa_seq";


ALTER TABLE "cpimpapa" DROP COLUMN ID;



ALTER TABLE "cpimpapa" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpimpapa_seq'::regclass);


ALTER TABLE "cpimpapa" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpimprel
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpimprel_seq" CASCADE;

CREATE SEQUENCE "cpimprel_seq";


ALTER TABLE "cpimprel" DROP COLUMN ID;



ALTER TABLE "cpimprel" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpimprel_seq'::regclass);


ALTER TABLE "cpimprel" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cpmovtra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpmovtra_seq" CASCADE;

CREATE SEQUENCE "cpmovtra_seq";


ALTER TABLE "cpmovtra" DROP COLUMN ID;



ALTER TABLE "cpmovtra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpmovtra_seq'::regclass);


ALTER TABLE "cpmovtra" ADD PRIMARY KEY ("id");

CREATE INDEX "i01cpmovtra" ON "cpmovtra" ("reftra");

-----------------------------------------------------------------------------
-- cpmovadifin
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpmovadifin_seq" CASCADE;

CREATE SEQUENCE "cpmovadifin_seq";


ALTER TABLE "cpmovadifin" DROP COLUMN ID;



ALTER TABLE "cpmovadifin" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpmovadifin_seq'::regclass);


ALTER TABLE "cpmovadifin" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cprelapa
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cprelapa_seq" CASCADE;

CREATE SEQUENCE "cprelapa_seq";


ALTER TABLE "cprelapa" DROP COLUMN ID;



ALTER TABLE "cprelapa" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cprelapa_seq'::regclass);


ALTER TABLE "cprelapa" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nomcarocp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nomcarocp_seq" CASCADE;

CREATE SEQUENCE "nomcarocp_seq";


ALTER TABLE "nomcarocp" DROP COLUMN ID;



ALTER TABLE "nomcarocp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nomcarocp_seq'::regclass);


ALTER TABLE "nomcarocp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- nomtipded
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "nomtipded_seq" CASCADE;

CREATE SEQUENCE "nomtipded_seq";


ALTER TABLE "nomtipded" DROP COLUMN ID;



ALTER TABLE "nomtipded" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('nomtipded_seq'::regclass);


ALTER TABLE "nomtipded" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- acdestina
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "acdestina_seq" CASCADE;

CREATE SEQUENCE "acdestina_seq";


ALTER TABLE "acdestina" DROP COLUMN ID;



ALTER TABLE "acdestina" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('acdestina_seq'::regclass);


ALTER TABLE "acdestina" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- acunidad
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "acunidad_seq" CASCADE;

CREATE SEQUENCE "acunidad_seq";


ALTER TABLE "acunidad" DROP COLUMN ID;



ALTER TABLE "acunidad" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('acunidad_seq'::regclass);


ALTER TABLE "acunidad" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- faltan
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "faltan_seq" CASCADE;

CREATE SEQUENCE "faltan_seq";


ALTER TABLE "faltan" DROP COLUMN ID;



ALTER TABLE "faltan" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('faltan_seq'::regclass);


ALTER TABLE "faltan" ADD PRIMARY KEY ("id");

CREATE INDEX "i01faltan" ON "faltan" ("codpre");

-----------------------------------------------------------------------------
-- removadi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "removadi_seq" CASCADE;

CREATE SEQUENCE "removadi_seq";


ALTER TABLE "removadi" DROP COLUMN ID;



ALTER TABLE "removadi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('removadi_seq'::regclass);


ALTER TABLE "removadi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- removaju
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "removaju_seq" CASCADE;

CREATE SEQUENCE "removaju_seq";


ALTER TABLE "removaju" DROP COLUMN ID;



ALTER TABLE "removaju" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('removaju_seq'::regclass);


ALTER TABLE "removaju" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- removtra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "removtra_seq" CASCADE;

CREATE SEQUENCE "removtra_seq";


ALTER TABLE "removtra" DROP COLUMN ID;



ALTER TABLE "removtra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('removtra_seq'::regclass);


ALTER TABLE "removtra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- contaba
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "contaba_seq" CASCADE;

CREATE SEQUENCE "contaba_seq";


ALTER TABLE "contaba" DROP COLUMN ID;



ALTER TABLE "contaba" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('contaba_seq'::regclass);


ALTER TABLE "contaba" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- contaba1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "contaba1_seq" CASCADE;

CREATE SEQUENCE "contaba1_seq";


ALTER TABLE "contaba1" DROP COLUMN ID;



ALTER TABLE "contaba1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('contaba1_seq'::regclass);


ALTER TABLE "contaba1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- contabb
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "contabb_seq" CASCADE;

CREATE SEQUENCE "contabb_seq";


ALTER TABLE "contabb" DROP COLUMN ID;



ALTER TABLE "contabb" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('contabb_seq'::regclass);


ALTER TABLE "contabb" ADD PRIMARY KEY ("id");

CREATE INDEX "i02contabb" ON "contabb" ("codcta","fecini","feccie");

CREATE INDEX "i10contabb" ON "contabb" ("codcta","cargab");

-----------------------------------------------------------------------------
-- contabb1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "contabb1_seq" CASCADE;

CREATE SEQUENCE "contabb1_seq";


ALTER TABLE "contabb1" DROP COLUMN ID;



ALTER TABLE "contabb1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('contabb1_seq'::regclass);


ALTER TABLE "contabb1" ADD PRIMARY KEY ("id");

CREATE INDEX "i01contabb1" ON "contabb1" ("codcta");

CREATE INDEX "i02contabb1" ON "contabb1" ("codcta","fecini","feccie");

CREATE INDEX "i05contabb1" ON "contabb1" ("codcta","pereje");

CREATE INDEX "i06contabb1" ON "contabb1" ("codcta","pereje","fecini","feccie");

ALTER TABLE "contabb1" ADD CONSTRAINT "contabb1_FK_1" FOREIGN KEY ("codcta") REFERENCES "contabb" ("codcta");

-----------------------------------------------------------------------------
-- contabc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "contabc_seq" CASCADE;

CREATE SEQUENCE "contabc_seq";


ALTER TABLE "contabc" DROP COLUMN ID;



ALTER TABLE "contabc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('contabc_seq'::regclass);


ALTER TABLE "contabc" ADD PRIMARY KEY ("id");

CREATE INDEX "i03contabc" ON "contabc" ("stacom");

-----------------------------------------------------------------------------
-- contabc1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "contabc1_seq" CASCADE;

CREATE SEQUENCE "contabc1_seq";


ALTER TABLE "contabc1" DROP COLUMN ID;



ALTER TABLE "contabc1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('contabc1_seq'::regclass);


ALTER TABLE "contabc1" ADD PRIMARY KEY ("id");

CREATE INDEX "i01contabc1" ON "contabc1" ("numcom");

CREATE INDEX "i02contabc1" ON "contabc1" ("codcta");

-----------------------------------------------------------------------------
-- ciadidis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ciadidis_seq" CASCADE;

CREATE SEQUENCE "ciadidis_seq";


ALTER TABLE "ciadidis" DROP COLUMN ID;



ALTER TABLE "ciadidis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ciadidis_seq'::regclass);


ALTER TABLE "ciadidis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ciajuste
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ciajuste_seq" CASCADE;

CREATE SEQUENCE "ciajuste_seq";


ALTER TABLE "ciajuste" DROP COLUMN ID;



ALTER TABLE "ciajuste" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ciajuste_seq'::regclass);


ALTER TABLE "ciajuste" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ciasiini
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ciasiini_seq" CASCADE;

CREATE SEQUENCE "ciasiini_seq";


ALTER TABLE "ciasiini" DROP COLUMN ID;



ALTER TABLE "ciasiini" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ciasiini_seq'::regclass);


ALTER TABLE "ciasiini" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ciconrep
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ciconrep_seq" CASCADE;

CREATE SEQUENCE "ciconrep_seq";


ALTER TABLE "ciconrep" DROP COLUMN ID;



ALTER TABLE "ciconrep" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ciconrep_seq'::regclass);


ALTER TABLE "ciconrep" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cidefniv
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cidefniv_seq" CASCADE;

CREATE SEQUENCE "cidefniv_seq";


ALTER TABLE "cidefniv" DROP COLUMN ID;



ALTER TABLE "cidefniv" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cidefniv_seq'::regclass);


ALTER TABLE "cidefniv" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cideftit
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cideftit_seq" CASCADE;

CREATE SEQUENCE "cideftit_seq";


ALTER TABLE "cideftit" DROP COLUMN ID;



ALTER TABLE "cideftit" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cideftit_seq'::regclass);


ALTER TABLE "cideftit" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cidisniv
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cidisniv_seq" CASCADE;

CREATE SEQUENCE "cidisniv_seq";


ALTER TABLE "cidisniv" DROP COLUMN ID;



ALTER TABLE "cidisniv" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cidisniv_seq'::regclass);


ALTER TABLE "cidisniv" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cierre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cierre_seq" CASCADE;

CREATE SEQUENCE "cierre_seq";


ALTER TABLE "cierre" DROP COLUMN ID;



ALTER TABLE "cierre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cierre_seq'::regclass);


ALTER TABLE "cierre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ciimping
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ciimping_seq" CASCADE;

CREATE SEQUENCE "ciimping_seq";


ALTER TABLE "ciimping" DROP COLUMN ID;



ALTER TABLE "ciimping" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ciimping_seq'::regclass);


ALTER TABLE "ciimping" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cimovadi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cimovadi_seq" CASCADE;

CREATE SEQUENCE "cimovadi_seq";


ALTER TABLE "cimovadi" DROP COLUMN ID;



ALTER TABLE "cimovadi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cimovadi_seq'::regclass);


ALTER TABLE "cimovadi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cimovaju
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cimovaju_seq" CASCADE;

CREATE SEQUENCE "cimovaju_seq";


ALTER TABLE "cimovaju" DROP COLUMN ID;



ALTER TABLE "cimovaju" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cimovaju_seq'::regclass);


ALTER TABLE "cimovaju" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cimovtra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cimovtra_seq" CASCADE;

CREATE SEQUENCE "cimovtra_seq";


ALTER TABLE "cimovtra" DROP COLUMN ID;



ALTER TABLE "cimovtra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cimovtra_seq'::regclass);


ALTER TABLE "cimovtra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ciniveles
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ciniveles_seq" CASCADE;

CREATE SEQUENCE "ciniveles_seq";


ALTER TABLE "ciniveles" DROP COLUMN ID;



ALTER TABLE "ciniveles" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ciniveles_seq'::regclass);


ALTER TABLE "ciniveles" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cipereje
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cipereje_seq" CASCADE;

CREATE SEQUENCE "cipereje_seq";


ALTER TABLE "cipereje" DROP COLUMN ID;



ALTER TABLE "cipereje" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cipereje_seq'::regclass);


ALTER TABLE "cipereje" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- cireging
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cireging_seq" CASCADE;

CREATE SEQUENCE "cireging_seq";


ALTER TABLE "cireging" DROP COLUMN ID;



ALTER TABLE "cireging" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cireging_seq'::regclass);


ALTER TABLE "cireging" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- ciregingr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ciregingr_seq" CASCADE;

CREATE SEQUENCE "ciregingr_seq";


ALTER TABLE "ciregingr" DROP COLUMN ID;



ALTER TABLE "ciregingr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ciregingr_seq'::regclass);


ALTER TABLE "ciregingr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- citiping
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "citiping_seq" CASCADE;

CREATE SEQUENCE "citiping_seq";


ALTER TABLE "citiping" DROP COLUMN ID;



ALTER TABLE "citiping" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('citiping_seq'::regclass);


ALTER TABLE "citiping" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- citrasla
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "citrasla_seq" CASCADE;

CREATE SEQUENCE "citrasla_seq";


ALTER TABLE "citrasla" DROP COLUMN ID;



ALTER TABLE "citrasla" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('citrasla_seq'::regclass);


ALTER TABLE "citrasla" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- unidades
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "unidades_seq" CASCADE;

CREATE SEQUENCE "unidades_seq";


ALTER TABLE "unidades" DROP COLUMN ID;



ALTER TABLE "unidades" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('unidades_seq'::regclass);


ALTER TABLE "unidades" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- unidades2
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "unidades2_seq" CASCADE;

CREATE SEQUENCE "unidades2_seq";


ALTER TABLE "unidades2" DROP COLUMN ID;



ALTER TABLE "unidades2" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('unidades2_seq'::regclass);


ALTER TABLE "unidades2" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- pagdocume
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "pagdocume_seq" CASCADE;

CREATE SEQUENCE "pagdocume_seq";


ALTER TABLE "pagdocume" DROP COLUMN ID;



ALTER TABLE "pagdocume" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('pagdocume_seq'::regclass);


ALTER TABLE "pagdocume" ADD PRIMARY KEY ("id");

CREATE INDEX "iipagdocume" ON "pagdocume" ("refdoc","codpro","codmov","fecemi");

-----------------------------------------------------------------------------
-- pagforpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "pagforpag_seq" CASCADE;

CREATE SEQUENCE "pagforpag_seq";


ALTER TABLE "pagforpag" DROP COLUMN ID;



ALTER TABLE "pagforpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('pagforpag_seq'::regclass);


ALTER TABLE "pagforpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- pagtransa
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "pagtransa_seq" CASCADE;

CREATE SEQUENCE "pagtransa_seq";


ALTER TABLE "pagtransa" DROP COLUMN ID;



ALTER TABLE "pagtransa" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('pagtransa_seq'::regclass);


ALTER TABLE "pagtransa" ADD PRIMARY KEY ("id");

CREATE INDEX "iipagtransa" ON "pagtransa" ("numtra","codpro","codmov","fectra");

-----------------------------------------------------------------------------
-- rcpadidis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rcpadidis_seq" CASCADE;

CREATE SEQUENCE "rcpadidis_seq";


ALTER TABLE "rcpadidis" DROP COLUMN ID;



ALTER TABLE "rcpadidis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rcpadidis_seq'::regclass);


ALTER TABLE "rcpadidis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- rcpmovadi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "rcpmovadi_seq" CASCADE;

CREATE SEQUENCE "rcpmovadi_seq";


ALTER TABLE "rcpmovadi" DROP COLUMN ID;



ALTER TABLE "rcpmovadi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('rcpmovadi_seq'::regclass);


ALTER TABLE "rcpmovadi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- atestados
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atestados_seq" CASCADE;

CREATE SEQUENCE "atestados_seq";


ALTER TABLE "atestados" DROP COLUMN ID;



ALTER TABLE "atestados" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atestados_seq'::regclass);


ALTER TABLE "atestados" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- atmunicipios
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atmunicipios_seq" CASCADE;

CREATE SEQUENCE "atmunicipios_seq";


ALTER TABLE "atmunicipios" DROP COLUMN ID;



ALTER TABLE "atmunicipios" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atmunicipios_seq'::regclass);


ALTER TABLE "atmunicipios" ADD PRIMARY KEY ("id");

ALTER TABLE "atmunicipios" ADD CONSTRAINT "atmunicipios_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

-----------------------------------------------------------------------------
-- atparroquias
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atparroquias_seq" CASCADE;

CREATE SEQUENCE "atparroquias_seq";


ALTER TABLE "atparroquias" DROP COLUMN ID;



ALTER TABLE "atparroquias" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atparroquias_seq'::regclass);


ALTER TABLE "atparroquias" ADD PRIMARY KEY ("id");

ALTER TABLE "atparroquias" ADD CONSTRAINT "atparroquias_FK_1" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

-----------------------------------------------------------------------------
-- attipayu
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "attipayu_seq" CASCADE;

CREATE SEQUENCE "attipayu_seq";


ALTER TABLE "attipayu" DROP COLUMN ID;



ALTER TABLE "attipayu" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('attipayu_seq'::regclass);


ALTER TABLE "attipayu" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- atrecayu
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atrecayu_seq" CASCADE;

CREATE SEQUENCE "atrecayu_seq";


ALTER TABLE "atrecayu" DROP COLUMN ID;



ALTER TABLE "atrecayu" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atrecayu_seq'::regclass);


ALTER TABLE "atrecayu" ADD PRIMARY KEY ("id");

ALTER TABLE "atrecayu" ADD CONSTRAINT "atrecayu_FK_1" FOREIGN KEY ("attipayu_id") REFERENCES "attipayu" ("id");

ALTER TABLE "atrecayu" ADD CONSTRAINT "atrecayu_FK_2" FOREIGN KEY ("atrecaud_id") REFERENCES "atrecaud" ("id");

-----------------------------------------------------------------------------
-- atrecaud
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atrecaud_seq" CASCADE;

CREATE SEQUENCE "atrecaud_seq";


ALTER TABLE "atrecaud" DROP COLUMN ID;



ALTER TABLE "atrecaud" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atrecaud_seq'::regclass);


ALTER TABLE "atrecaud" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- atsolici
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atsolici_seq" CASCADE;

CREATE SEQUENCE "atsolici_seq";


ALTER TABLE "atsolici" DROP COLUMN ID;



ALTER TABLE "atsolici" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atsolici_seq'::regclass);


ALTER TABLE "atsolici" ADD PRIMARY KEY ("id");

ALTER TABLE "atsolici" ADD CONSTRAINT "atsolici_FK_1" FOREIGN KEY ("atestados_id") REFERENCES "atestados" ("id");

ALTER TABLE "atsolici" ADD CONSTRAINT "atsolici_FK_2" FOREIGN KEY ("atmunicipios_id") REFERENCES "atmunicipios" ("id");

ALTER TABLE "atsolici" ADD CONSTRAINT "atsolici_FK_3" FOREIGN KEY ("atparroquias_id") REFERENCES "atparroquias" ("id");

-----------------------------------------------------------------------------
-- atayudas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atayudas_seq" CASCADE;

CREATE SEQUENCE "atayudas_seq";


ALTER TABLE "atayudas" DROP COLUMN ID;



ALTER TABLE "atayudas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atayudas_seq'::regclass);


ALTER TABLE "atayudas" ADD PRIMARY KEY ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_1" FOREIGN KEY ("atsolici_id") REFERENCES "atsolici" ("id");

ALTER TABLE "atayudas" ADD CONSTRAINT "atayudas_FK_2" FOREIGN KEY ("attipayu_id") REFERENCES "attipayu" ("id");

-----------------------------------------------------------------------------
-- atdetrecayu
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atdetrecayu_seq" CASCADE;

CREATE SEQUENCE "atdetrecayu_seq";


ALTER TABLE "atdetrecayu" DROP COLUMN ID;



ALTER TABLE "atdetrecayu" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atdetrecayu_seq'::regclass);


ALTER TABLE "atdetrecayu" ADD PRIMARY KEY ("id");

ALTER TABLE "atdetrecayu" ADD CONSTRAINT "atdetrecayu_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

ALTER TABLE "atdetrecayu" ADD CONSTRAINT "atdetrecayu_FK_2" FOREIGN KEY ("atrecaud_id") REFERENCES "atrecaud" ("id");

-----------------------------------------------------------------------------
-- atdetayu
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atdetayu_seq" CASCADE;

CREATE SEQUENCE "atdetayu_seq";


ALTER TABLE "atdetayu" DROP COLUMN ID;



ALTER TABLE "atdetayu" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atdetayu_seq'::regclass);


ALTER TABLE "atdetayu" ADD PRIMARY KEY ("id");

ALTER TABLE "atdetayu" ADD CONSTRAINT "atdetayu_FK_1" FOREIGN KEY ("atayudas_id") REFERENCES "atayudas" ("id");

-----------------------------------------------------------------------------
-- atunidades
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atunidades_seq" CASCADE;

CREATE SEQUENCE "atunidades_seq";


ALTER TABLE "atunidades" DROP COLUMN ID;



ALTER TABLE "atunidades" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atunidades_seq'::regclass);


ALTER TABLE "atunidades" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- atreclamos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atreclamos_seq" CASCADE;

CREATE SEQUENCE "atreclamos_seq";


ALTER TABLE "atreclamos" DROP COLUMN ID;



ALTER TABLE "atreclamos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atreclamos_seq'::regclass);


ALTER TABLE "atreclamos" ADD PRIMARY KEY ("id");

ALTER TABLE "atreclamos" ADD CONSTRAINT "atreclamos_FK_1" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- atdenuncias
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "atdenuncias_seq" CASCADE;

CREATE SEQUENCE "atdenuncias_seq";


ALTER TABLE "atdenuncias" DROP COLUMN ID;



ALTER TABLE "atdenuncias" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('atdenuncias_seq'::regclass);


ALTER TABLE "atdenuncias" ADD PRIMARY KEY ("id");

ALTER TABLE "atdenuncias" ADD CONSTRAINT "atdenuncias_FK_1" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- ataudiencias
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "ataudiencias_seq" CASCADE;

CREATE SEQUENCE "ataudiencias_seq";


ALTER TABLE "ataudiencias" DROP COLUMN ID;



ALTER TABLE "ataudiencias" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('ataudiencias_seq'::regclass);


ALTER TABLE "ataudiencias" ADD PRIMARY KEY ("id");

ALTER TABLE "ataudiencias" ADD CONSTRAINT "ataudiencias_FK_1" FOREIGN KEY ("atsolici_id") REFERENCES "atsolici" ("id");

ALTER TABLE "ataudiencias" ADD CONSTRAINT "ataudiencias_FK_2" FOREIGN KEY ("atunidades_id") REFERENCES "atunidades" ("id");

-----------------------------------------------------------------------------
-- tabla1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla1_seq" CASCADE;

CREATE SEQUENCE "tabla1_seq";


ALTER TABLE "tabla1" DROP COLUMN ID;



ALTER TABLE "tabla1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla1_seq'::regclass);


ALTER TABLE "tabla1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla10
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla10_seq" CASCADE;

CREATE SEQUENCE "tabla10_seq";


ALTER TABLE "tabla10" DROP COLUMN ID;



ALTER TABLE "tabla10" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla10_seq'::regclass);


ALTER TABLE "tabla10" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla11
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla11_seq" CASCADE;

CREATE SEQUENCE "tabla11_seq";


ALTER TABLE "tabla11" DROP COLUMN ID;



ALTER TABLE "tabla11" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla11_seq'::regclass);


ALTER TABLE "tabla11" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla12
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla12_seq" CASCADE;

CREATE SEQUENCE "tabla12_seq";


ALTER TABLE "tabla12" DROP COLUMN ID;



ALTER TABLE "tabla12" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla12_seq'::regclass);


ALTER TABLE "tabla12" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla13
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla13_seq" CASCADE;

CREATE SEQUENCE "tabla13_seq";


ALTER TABLE "tabla13" DROP COLUMN ID;



ALTER TABLE "tabla13" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla13_seq'::regclass);


ALTER TABLE "tabla13" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla14
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla14_seq" CASCADE;

CREATE SEQUENCE "tabla14_seq";


ALTER TABLE "tabla14" DROP COLUMN ID;



ALTER TABLE "tabla14" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla14_seq'::regclass);


ALTER TABLE "tabla14" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla15
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla15_seq" CASCADE;

CREATE SEQUENCE "tabla15_seq";


ALTER TABLE "tabla15" DROP COLUMN ID;



ALTER TABLE "tabla15" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla15_seq'::regclass);


ALTER TABLE "tabla15" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla16
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla16_seq" CASCADE;

CREATE SEQUENCE "tabla16_seq";


ALTER TABLE "tabla16" DROP COLUMN ID;



ALTER TABLE "tabla16" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla16_seq'::regclass);


ALTER TABLE "tabla16" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla17
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla17_seq" CASCADE;

CREATE SEQUENCE "tabla17_seq";


ALTER TABLE "tabla17" DROP COLUMN ID;



ALTER TABLE "tabla17" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla17_seq'::regclass);


ALTER TABLE "tabla17" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla18
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla18_seq" CASCADE;

CREATE SEQUENCE "tabla18_seq";


ALTER TABLE "tabla18" DROP COLUMN ID;



ALTER TABLE "tabla18" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla18_seq'::regclass);


ALTER TABLE "tabla18" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla19
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla19_seq" CASCADE;

CREATE SEQUENCE "tabla19_seq";


ALTER TABLE "tabla19" DROP COLUMN ID;



ALTER TABLE "tabla19" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla19_seq'::regclass);


ALTER TABLE "tabla19" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla2
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla2_seq" CASCADE;

CREATE SEQUENCE "tabla2_seq";


ALTER TABLE "tabla2" DROP COLUMN ID;



ALTER TABLE "tabla2" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla2_seq'::regclass);


ALTER TABLE "tabla2" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla20
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla20_seq" CASCADE;

CREATE SEQUENCE "tabla20_seq";


ALTER TABLE "tabla20" DROP COLUMN ID;



ALTER TABLE "tabla20" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla20_seq'::regclass);


ALTER TABLE "tabla20" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla21
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla21_seq" CASCADE;

CREATE SEQUENCE "tabla21_seq";


ALTER TABLE "tabla21" DROP COLUMN ID;



ALTER TABLE "tabla21" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla21_seq'::regclass);


ALTER TABLE "tabla21" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla22
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla22_seq" CASCADE;

CREATE SEQUENCE "tabla22_seq";


ALTER TABLE "tabla22" DROP COLUMN ID;



ALTER TABLE "tabla22" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla22_seq'::regclass);


ALTER TABLE "tabla22" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla23
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla23_seq" CASCADE;

CREATE SEQUENCE "tabla23_seq";


ALTER TABLE "tabla23" DROP COLUMN ID;



ALTER TABLE "tabla23" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla23_seq'::regclass);


ALTER TABLE "tabla23" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla24
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla24_seq" CASCADE;

CREATE SEQUENCE "tabla24_seq";


ALTER TABLE "tabla24" DROP COLUMN ID;



ALTER TABLE "tabla24" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla24_seq'::regclass);


ALTER TABLE "tabla24" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla25
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla25_seq" CASCADE;

CREATE SEQUENCE "tabla25_seq";


ALTER TABLE "tabla25" DROP COLUMN ID;



ALTER TABLE "tabla25" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla25_seq'::regclass);


ALTER TABLE "tabla25" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla26
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla26_seq" CASCADE;

CREATE SEQUENCE "tabla26_seq";


ALTER TABLE "tabla26" DROP COLUMN ID;



ALTER TABLE "tabla26" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla26_seq'::regclass);


ALTER TABLE "tabla26" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla27
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla27_seq" CASCADE;

CREATE SEQUENCE "tabla27_seq";


ALTER TABLE "tabla27" DROP COLUMN ID;



ALTER TABLE "tabla27" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla27_seq'::regclass);


ALTER TABLE "tabla27" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla28
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla28_seq" CASCADE;

CREATE SEQUENCE "tabla28_seq";


ALTER TABLE "tabla28" DROP COLUMN ID;



ALTER TABLE "tabla28" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla28_seq'::regclass);


ALTER TABLE "tabla28" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla29
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla29_seq" CASCADE;

CREATE SEQUENCE "tabla29_seq";


ALTER TABLE "tabla29" DROP COLUMN ID;



ALTER TABLE "tabla29" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla29_seq'::regclass);


ALTER TABLE "tabla29" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla3
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla3_seq" CASCADE;

CREATE SEQUENCE "tabla3_seq";


ALTER TABLE "tabla3" DROP COLUMN ID;



ALTER TABLE "tabla3" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla3_seq'::regclass);


ALTER TABLE "tabla3" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla30
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla30_seq" CASCADE;

CREATE SEQUENCE "tabla30_seq";


ALTER TABLE "tabla30" DROP COLUMN ID;



ALTER TABLE "tabla30" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla30_seq'::regclass);


ALTER TABLE "tabla30" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla31
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla31_seq" CASCADE;

CREATE SEQUENCE "tabla31_seq";


ALTER TABLE "tabla31" DROP COLUMN ID;



ALTER TABLE "tabla31" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla31_seq'::regclass);


ALTER TABLE "tabla31" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla32
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla32_seq" CASCADE;

CREATE SEQUENCE "tabla32_seq";


ALTER TABLE "tabla32" DROP COLUMN ID;



ALTER TABLE "tabla32" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla32_seq'::regclass);


ALTER TABLE "tabla32" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla33
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla33_seq" CASCADE;

CREATE SEQUENCE "tabla33_seq";


ALTER TABLE "tabla33" DROP COLUMN ID;



ALTER TABLE "tabla33" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla33_seq'::regclass);


ALTER TABLE "tabla33" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla34
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla34_seq" CASCADE;

CREATE SEQUENCE "tabla34_seq";


ALTER TABLE "tabla34" DROP COLUMN ID;



ALTER TABLE "tabla34" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla34_seq'::regclass);


ALTER TABLE "tabla34" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla35
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla35_seq" CASCADE;

CREATE SEQUENCE "tabla35_seq";


ALTER TABLE "tabla35" DROP COLUMN ID;



ALTER TABLE "tabla35" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla35_seq'::regclass);


ALTER TABLE "tabla35" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla36
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla36_seq" CASCADE;

CREATE SEQUENCE "tabla36_seq";


ALTER TABLE "tabla36" DROP COLUMN ID;



ALTER TABLE "tabla36" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla36_seq'::regclass);


ALTER TABLE "tabla36" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla37
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla37_seq" CASCADE;

CREATE SEQUENCE "tabla37_seq";


ALTER TABLE "tabla37" DROP COLUMN ID;



ALTER TABLE "tabla37" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla37_seq'::regclass);


ALTER TABLE "tabla37" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla38
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla38_seq" CASCADE;

CREATE SEQUENCE "tabla38_seq";


ALTER TABLE "tabla38" DROP COLUMN ID;



ALTER TABLE "tabla38" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla38_seq'::regclass);


ALTER TABLE "tabla38" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla39
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla39_seq" CASCADE;

CREATE SEQUENCE "tabla39_seq";


ALTER TABLE "tabla39" DROP COLUMN ID;



ALTER TABLE "tabla39" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla39_seq'::regclass);


ALTER TABLE "tabla39" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla4
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla4_seq" CASCADE;

CREATE SEQUENCE "tabla4_seq";


ALTER TABLE "tabla4" DROP COLUMN ID;



ALTER TABLE "tabla4" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla4_seq'::regclass);


ALTER TABLE "tabla4" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla40
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla40_seq" CASCADE;

CREATE SEQUENCE "tabla40_seq";


ALTER TABLE "tabla40" DROP COLUMN ID;



ALTER TABLE "tabla40" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla40_seq'::regclass);


ALTER TABLE "tabla40" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla41
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla41_seq" CASCADE;

CREATE SEQUENCE "tabla41_seq";


ALTER TABLE "tabla41" DROP COLUMN ID;



ALTER TABLE "tabla41" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla41_seq'::regclass);


ALTER TABLE "tabla41" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla42
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla42_seq" CASCADE;

CREATE SEQUENCE "tabla42_seq";


ALTER TABLE "tabla42" DROP COLUMN ID;



ALTER TABLE "tabla42" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla42_seq'::regclass);


ALTER TABLE "tabla42" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla43
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla43_seq" CASCADE;

CREATE SEQUENCE "tabla43_seq";


ALTER TABLE "tabla43" DROP COLUMN ID;



ALTER TABLE "tabla43" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla43_seq'::regclass);


ALTER TABLE "tabla43" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla44
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla44_seq" CASCADE;

CREATE SEQUENCE "tabla44_seq";


ALTER TABLE "tabla44" DROP COLUMN ID;



ALTER TABLE "tabla44" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla44_seq'::regclass);


ALTER TABLE "tabla44" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla45
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla45_seq" CASCADE;

CREATE SEQUENCE "tabla45_seq";


ALTER TABLE "tabla45" DROP COLUMN ID;



ALTER TABLE "tabla45" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla45_seq'::regclass);


ALTER TABLE "tabla45" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla46
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla46_seq" CASCADE;

CREATE SEQUENCE "tabla46_seq";


ALTER TABLE "tabla46" DROP COLUMN ID;



ALTER TABLE "tabla46" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla46_seq'::regclass);


ALTER TABLE "tabla46" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla47
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla47_seq" CASCADE;

CREATE SEQUENCE "tabla47_seq";


ALTER TABLE "tabla47" DROP COLUMN ID;



ALTER TABLE "tabla47" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla47_seq'::regclass);


ALTER TABLE "tabla47" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla48
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla48_seq" CASCADE;

CREATE SEQUENCE "tabla48_seq";


ALTER TABLE "tabla48" DROP COLUMN ID;



ALTER TABLE "tabla48" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla48_seq'::regclass);


ALTER TABLE "tabla48" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla49
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla49_seq" CASCADE;

CREATE SEQUENCE "tabla49_seq";


ALTER TABLE "tabla49" DROP COLUMN ID;



ALTER TABLE "tabla49" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla49_seq'::regclass);


ALTER TABLE "tabla49" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla5
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla5_seq" CASCADE;

CREATE SEQUENCE "tabla5_seq";


ALTER TABLE "tabla5" DROP COLUMN ID;



ALTER TABLE "tabla5" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla5_seq'::regclass);


ALTER TABLE "tabla5" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla50
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla50_seq" CASCADE;

CREATE SEQUENCE "tabla50_seq";


ALTER TABLE "tabla50" DROP COLUMN ID;



ALTER TABLE "tabla50" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla50_seq'::regclass);


ALTER TABLE "tabla50" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla51
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla51_seq" CASCADE;

CREATE SEQUENCE "tabla51_seq";


ALTER TABLE "tabla51" DROP COLUMN ID;



ALTER TABLE "tabla51" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla51_seq'::regclass);


ALTER TABLE "tabla51" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla52
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla52_seq" CASCADE;

CREATE SEQUENCE "tabla52_seq";


ALTER TABLE "tabla52" DROP COLUMN ID;



ALTER TABLE "tabla52" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla52_seq'::regclass);


ALTER TABLE "tabla52" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla53
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla53_seq" CASCADE;

CREATE SEQUENCE "tabla53_seq";


ALTER TABLE "tabla53" DROP COLUMN ID;



ALTER TABLE "tabla53" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla53_seq'::regclass);


ALTER TABLE "tabla53" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla54
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla54_seq" CASCADE;

CREATE SEQUENCE "tabla54_seq";


ALTER TABLE "tabla54" DROP COLUMN ID;



ALTER TABLE "tabla54" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla54_seq'::regclass);


ALTER TABLE "tabla54" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla6
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla6_seq" CASCADE;

CREATE SEQUENCE "tabla6_seq";


ALTER TABLE "tabla6" DROP COLUMN ID;



ALTER TABLE "tabla6" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla6_seq'::regclass);


ALTER TABLE "tabla6" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla7
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla7_seq" CASCADE;

CREATE SEQUENCE "tabla7_seq";


ALTER TABLE "tabla7" DROP COLUMN ID;



ALTER TABLE "tabla7" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla7_seq'::regclass);


ALTER TABLE "tabla7" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla8
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla8_seq" CASCADE;

CREATE SEQUENCE "tabla8_seq";


ALTER TABLE "tabla8" DROP COLUMN ID;



ALTER TABLE "tabla8" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla8_seq'::regclass);


ALTER TABLE "tabla8" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tabla9
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tabla9_seq" CASCADE;

CREATE SEQUENCE "tabla9_seq";


ALTER TABLE "tabla9" DROP COLUMN ID;



ALTER TABLE "tabla9" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tabla9_seq'::regclass);


ALTER TABLE "tabla9" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- hisconb
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "hisconb_seq" CASCADE;

CREATE SEQUENCE "hisconb_seq";


ALTER TABLE "hisconb" DROP COLUMN ID;



ALTER TABLE "hisconb" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('hisconb_seq'::regclass);


ALTER TABLE "hisconb" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- hisconb1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "hisconb1_seq" CASCADE;

CREATE SEQUENCE "hisconb1_seq";


ALTER TABLE "hisconb1" DROP COLUMN ID;



ALTER TABLE "hisconb1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('hisconb1_seq'::regclass);


ALTER TABLE "hisconb1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- hisconc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "hisconc_seq" CASCADE;

CREATE SEQUENCE "hisconc_seq";


ALTER TABLE "hisconc" DROP COLUMN ID;



ALTER TABLE "hisconc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('hisconc_seq'::regclass);


ALTER TABLE "hisconc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- hisconc1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "hisconc1_seq" CASCADE;

CREATE SEQUENCE "hisconc1_seq";


ALTER TABLE "hisconc1" DROP COLUMN ID;



ALTER TABLE "hisconc1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('hisconc1_seq'::regclass);


ALTER TABLE "hisconc1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- historico
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "historico_seq" CASCADE;

CREATE SEQUENCE "historico_seq";


ALTER TABLE "historico" DROP COLUMN ID;



ALTER TABLE "historico" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('historico_seq'::regclass);


ALTER TABLE "historico" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- usuarios
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "usuarios_seq" CASCADE;

CREATE SEQUENCE "usuarios_seq";


ALTER TABLE "usuarios" DROP COLUMN ID;



ALTER TABLE "usuarios" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('usuarios_seq'::regclass);


ALTER TABLE "usuarios" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- dfatendoc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "dfatendoc_seq" CASCADE;

CREATE SEQUENCE "dfatendoc_seq";


ALTER TABLE "dfatendoc" DROP COLUMN ID;



ALTER TABLE "dfatendoc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('dfatendoc_seq'::regclass);


ALTER TABLE "dfatendoc" ADD PRIMARY KEY ("id");

ALTER TABLE "dfatendoc" ADD CONSTRAINT "dfatendoc_FK_1" FOREIGN KEY ("id_dftabtip") REFERENCES "dftabtip" ("id");

-----------------------------------------------------------------------------
-- dfatendocdet
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "dfatendocdet_seq" CASCADE;

CREATE SEQUENCE "dfatendocdet_seq";


ALTER TABLE "dfatendocdet" DROP COLUMN ID;



ALTER TABLE "dfatendocdet" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('dfatendocdet_seq'::regclass);


ALTER TABLE "dfatendocdet" ADD PRIMARY KEY ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_1" FOREIGN KEY ("id_dfatendoc") REFERENCES "dfatendoc" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_2" FOREIGN KEY ("id_usuario") REFERENCES "usuarios" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_3" FOREIGN KEY ("id_acunidad_ori") REFERENCES "acunidad" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_4" FOREIGN KEY ("id_acunidad_des") REFERENCES "acunidad" ("id");

ALTER TABLE "dfatendocdet" ADD CONSTRAINT "dfatendocdet_FK_5" FOREIGN KEY ("id_dfrutadoc") REFERENCES "dfrutadoc" ("id");

-----------------------------------------------------------------------------
-- dfrutadoc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "dfrutadoc_seq" CASCADE;

CREATE SEQUENCE "dfrutadoc_seq";


ALTER TABLE "dfrutadoc" DROP COLUMN ID;



ALTER TABLE "dfrutadoc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('dfrutadoc_seq'::regclass);


ALTER TABLE "dfrutadoc" ADD PRIMARY KEY ("id");

ALTER TABLE "dfrutadoc" ADD CONSTRAINT "dfrutadoc_FK_1" FOREIGN KEY ("id_acunidad") REFERENCES "acunidad" ("id");

ALTER TABLE "dfrutadoc" ADD CONSTRAINT "dfrutadoc_FK_2" FOREIGN KEY ("id_dftabtip") REFERENCES "dftabtip" ("id");

-----------------------------------------------------------------------------
-- dftabtip
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "dftabtip_seq" CASCADE;

CREATE SEQUENCE "dftabtip_seq";


ALTER TABLE "dftabtip" DROP COLUMN ID;



ALTER TABLE "dftabtip" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('dftabtip_seq'::regclass);


ALTER TABLE "dftabtip" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- dftemporal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "dftemporal_seq" CASCADE;

CREATE SEQUENCE "dftemporal_seq";


ALTER TABLE "dftemporal" DROP COLUMN ID;



ALTER TABLE "dftemporal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('dftemporal_seq'::regclass);


ALTER TABLE "dftemporal" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcabonos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcabonos_seq" CASCADE;

CREATE SEQUENCE "fcabonos_seq";


ALTER TABLE "fcabonos" DROP COLUMN ID;



ALTER TABLE "fcabonos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcabonos_seq'::regclass);


ALTER TABLE "fcabonos" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcacceso
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcacceso_seq" CASCADE;

CREATE SEQUENCE "fcacceso_seq";


ALTER TABLE "fcacceso" DROP COLUMN ID;



ALTER TABLE "fcacceso" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcacceso_seq'::regclass);


ALTER TABLE "fcacceso" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcactcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcactcom_seq" CASCADE;

CREATE SEQUENCE "fcactcom_seq";


ALTER TABLE "fcactcom" DROP COLUMN ID;



ALTER TABLE "fcactcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcactcom_seq'::regclass);


ALTER TABLE "fcactcom" ADD PRIMARY KEY ("id");

CREATE INDEX "fcactcom_i01fcactcom" ON "fcactcom" ("codact");

-----------------------------------------------------------------------------
-- fcactpic
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcactpic_seq" CASCADE;

CREATE SEQUENCE "fcactpic_seq";


ALTER TABLE "fcactpic" DROP COLUMN ID;



ALTER TABLE "fcactpic" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcactpic_seq'::regclass);


ALTER TABLE "fcactpic" ADD PRIMARY KEY ("id");

CREATE INDEX "fcactpic_i01fcactpic" ON "fcactpic" ("codact","numdoc");

CREATE INDEX "fcactpic_i2fcactpic" ON "fcactpic" ("numdoc");

-----------------------------------------------------------------------------
-- fcajuste
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcajuste_seq" CASCADE;

CREATE SEQUENCE "fcajuste_seq";


ALTER TABLE "fcajuste" DROP COLUMN ID;



ALTER TABLE "fcajuste" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcajuste_seq'::regclass);


ALTER TABLE "fcajuste" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcaliinm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcaliinm_seq" CASCADE;

CREATE SEQUENCE "fcaliinm_seq";


ALTER TABLE "fcaliinm" DROP COLUMN ID;



ALTER TABLE "fcaliinm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcaliinm_seq'::regclass);


ALTER TABLE "fcaliinm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcaliuso
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcaliuso_seq" CASCADE;

CREATE SEQUENCE "fcaliuso_seq";


ALTER TABLE "fcaliuso" DROP COLUMN ID;



ALTER TABLE "fcaliuso" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcaliuso_seq'::regclass);


ALTER TABLE "fcaliuso" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcapulic
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcapulic_seq" CASCADE;

CREATE SEQUENCE "fcapulic_seq";


ALTER TABLE "fcapulic" DROP COLUMN ID;



ALTER TABLE "fcapulic" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcapulic_seq'::regclass);


ALTER TABLE "fcapulic" ADD PRIMARY KEY ("id");

CREATE INDEX "fcapulic_i02fcapulic" ON "fcapulic" ("rifcon");

-----------------------------------------------------------------------------
-- fcbanent
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcbanent_seq" CASCADE;

CREATE SEQUENCE "fcbanent_seq";


ALTER TABLE "fcbanent" DROP COLUMN ID;



ALTER TABLE "fcbanent" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcbanent_seq'::regclass);


ALTER TABLE "fcbanent" ADD PRIMARY KEY ("id");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_1" FOREIGN KEY ("codfun") REFERENCES "fcdeffun" ("codfun");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_2" FOREIGN KEY ("codentext") REFERENCES "fcdefentext" ("codentext");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_3" FOREIGN KEY ("codtipdoc") REFERENCES "fcdeftipdoc" ("codtipdoc");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_4" FOREIGN KEY ("codubifis") REFERENCES "fcdefubifis" ("codubifis");

ALTER TABLE "fcbanent" ADD CONSTRAINT "fcbanent_FK_5" FOREIGN KEY ("codubimag") REFERENCES "fcdefubimag" ("codubimag");

-----------------------------------------------------------------------------
-- fcbansal
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcbansal_seq" CASCADE;

CREATE SEQUENCE "fcbansal_seq";


ALTER TABLE "fcbansal" DROP COLUMN ID;



ALTER TABLE "fcbansal" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcbansal_seq'::regclass);


ALTER TABLE "fcbansal" ADD PRIMARY KEY ("id");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_1" FOREIGN KEY ("codfun") REFERENCES "fcdeffun" ("codfun");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_2" FOREIGN KEY ("codentext") REFERENCES "fcdefentext" ("codentext");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_3" FOREIGN KEY ("codtipdoc") REFERENCES "fcdeftipdoc" ("codtipdoc");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_4" FOREIGN KEY ("codubifis") REFERENCES "fcdefubifis" ("codubifis");

ALTER TABLE "fcbansal" ADD CONSTRAINT "fcbansal_FK_5" FOREIGN KEY ("codubimag") REFERENCES "fcdefubimag" ("codubimag");

-----------------------------------------------------------------------------
-- fccajero
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fccajero_seq" CASCADE;

CREATE SEQUENCE "fccajero_seq";


ALTER TABLE "fccajero" DROP COLUMN ID;



ALTER TABLE "fccajero" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fccajero_seq'::regclass);


ALTER TABLE "fccajero" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fccarinm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fccarinm_seq" CASCADE;

CREATE SEQUENCE "fccarinm_seq";


ALTER TABLE "fccarinm" DROP COLUMN ID;



ALTER TABLE "fccarinm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fccarinm_seq'::regclass);


ALTER TABLE "fccarinm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fccatfis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fccatfis_seq" CASCADE;

CREATE SEQUENCE "fccatfis_seq";


ALTER TABLE "fccatfis" DROP COLUMN ID;



ALTER TABLE "fccatfis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fccatfis_seq'::regclass);


ALTER TABLE "fccatfis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcclaesp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcclaesp_seq" CASCADE;

CREATE SEQUENCE "fcclaesp_seq";


ALTER TABLE "fcclaesp" DROP COLUMN ID;



ALTER TABLE "fcclaesp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcclaesp_seq'::regclass);


ALTER TABLE "fcclaesp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fccobrad
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fccobrad_seq" CASCADE;

CREATE SEQUENCE "fccobrad_seq";


ALTER TABLE "fccobrad" DROP COLUMN ID;



ALTER TABLE "fccobrad" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fccobrad_seq'::regclass);


ALTER TABLE "fccobrad" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fccon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fccon_seq" CASCADE;

CREATE SEQUENCE "fccon_seq";


ALTER TABLE "fccon" DROP COLUMN ID;



ALTER TABLE "fccon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fccon_seq'::regclass);


ALTER TABLE "fccon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcconpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcconpag_seq" CASCADE;

CREATE SEQUENCE "fcconpag_seq";


ALTER TABLE "fcconpag" DROP COLUMN ID;



ALTER TABLE "fcconpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcconpag_seq'::regclass);


ALTER TABLE "fcconpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcconrep
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcconrep_seq" CASCADE;

CREATE SEQUENCE "fcconrep_seq";


ALTER TABLE "fcconrep" DROP COLUMN ID;



ALTER TABLE "fcconrep" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep_seq'::regclass);


ALTER TABLE "fcconrep" ADD PRIMARY KEY ("id");

CREATE INDEX "fcconrep_ifcconrep_rifcon" ON "fcconrep" ("rifcon");

-----------------------------------------------------------------------------
-- fcconrep1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcconrep1_seq" CASCADE;

CREATE SEQUENCE "fcconrep1_seq";


ALTER TABLE "fcconrep1" DROP COLUMN ID;



ALTER TABLE "fcconrep1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep1_seq'::regclass);


ALTER TABLE "fcconrep1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcconrep2
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcconrep2_seq" CASCADE;

CREATE SEQUENCE "fcconrep2_seq";


ALTER TABLE "fcconrep2" DROP COLUMN ID;



ALTER TABLE "fcconrep2" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcconrep2_seq'::regclass);


ALTER TABLE "fcconrep2" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcconrepco
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcconrepco_seq" CASCADE;

CREATE SEQUENCE "fcconrepco_seq";


ALTER TABLE "fcconrepco" DROP COLUMN ID;



ALTER TABLE "fcconrepco" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcconrepco_seq'::regclass);


ALTER TABLE "fcconrepco" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcconrepres1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcconrepres1_seq" CASCADE;

CREATE SEQUENCE "fcconrepres1_seq";


ALTER TABLE "fcconrepres1" DROP COLUMN ID;



ALTER TABLE "fcconrepres1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcconrepres1_seq'::regclass);


ALTER TABLE "fcconrepres1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdecatp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdecatp_seq" CASCADE;

CREATE SEQUENCE "fcdecatp_seq";


ALTER TABLE "fcdecatp" DROP COLUMN ID;



ALTER TABLE "fcdecatp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdecatp_seq'::regclass);


ALTER TABLE "fcdecatp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdeclar
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdeclar_seq" CASCADE;

CREATE SEQUENCE "fcdeclar_seq";


ALTER TABLE "fcdeclar" DROP COLUMN ID;



ALTER TABLE "fcdeclar" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdeclar_seq'::regclass);


ALTER TABLE "fcdeclar" ADD PRIMARY KEY ("id");

ALTER TABLE "fcdeclar" ADD CONSTRAINT "fcdeclar_uk31046193420811" UNIQUE ("numdec","numref","fueing","numero","fecven","edodec");

CREATE INDEX "fcdeclar_i01fcdeclar" ON "fcdeclar" ("rifcon");

CREATE INDEX "fcdeclar_i02fcdeclar" ON "fcdeclar" ("rifcon","numref");

CREATE INDEX "fcdeclar_i03fcdeclar" ON "fcdeclar" ("fueing");

CREATE INDEX "fcdeclar_i04fcdeclar" ON "fcdeclar" ("numref");

-----------------------------------------------------------------------------
-- fcdeclar2
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdeclar2_seq" CASCADE;

CREATE SEQUENCE "fcdeclar2_seq";


ALTER TABLE "fcdeclar2" DROP COLUMN ID;



ALTER TABLE "fcdeclar2" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdeclar2_seq'::regclass);


ALTER TABLE "fcdeclar2" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdecpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdecpag_seq" CASCADE;

CREATE SEQUENCE "fcdecpag_seq";


ALTER TABLE "fcdecpag" DROP COLUMN ID;



ALTER TABLE "fcdecpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdecpag_seq'::regclass);


ALTER TABLE "fcdecpag" ADD PRIMARY KEY ("id");

CREATE INDEX "fcdecpag_i01fcdecpag" ON "fcdecpag" ("numpag");

CREATE INDEX "fcdecpag_i02fcdecpag" ON "fcdecpag" ("fueing");

CREATE INDEX "fcdecpag_i03fcdecpag" ON "fcdecpag" ("numdec","numref","fecven","numero");

-----------------------------------------------------------------------------
-- fcdefdesc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefdesc_seq" CASCADE;

CREATE SEQUENCE "fcdefdesc_seq";


ALTER TABLE "fcdefdesc" DROP COLUMN ID;



ALTER TABLE "fcdefdesc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdesc_seq'::regclass);


ALTER TABLE "fcdefdesc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefdetsol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefdetsol_seq" CASCADE;

CREATE SEQUENCE "fcdefdetsol_seq";


ALTER TABLE "fcdefdetsol" DROP COLUMN ID;



ALTER TABLE "fcdefdetsol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdetsol_seq'::regclass);


ALTER TABLE "fcdefdetsol" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefdetsol2
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefdetsol2_seq" CASCADE;

CREATE SEQUENCE "fcdefdetsol2_seq";


ALTER TABLE "fcdefdetsol2" DROP COLUMN ID;



ALTER TABLE "fcdefdetsol2" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefdetsol2_seq'::regclass);


ALTER TABLE "fcdefdetsol2" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefentext
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefentext_seq" CASCADE;

CREATE SEQUENCE "fcdefentext_seq";


ALTER TABLE "fcdefentext" DROP COLUMN ID;



ALTER TABLE "fcdefentext" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefentext_seq'::regclass);


ALTER TABLE "fcdefentext" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdeffun
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdeffun_seq" CASCADE;

CREATE SEQUENCE "fcdeffun_seq";


ALTER TABLE "fcdeffun" DROP COLUMN ID;



ALTER TABLE "fcdeffun" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdeffun_seq'::regclass);


ALTER TABLE "fcdeffun" ADD PRIMARY KEY ("id");

ALTER TABLE "fcdeffun" ADD CONSTRAINT "fcdeffun_FK_1" FOREIGN KEY ("coduniadm") REFERENCES "fcdefuniadm" ("coduniadm");

-----------------------------------------------------------------------------
-- fcdefins
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefins_seq" CASCADE;

CREATE SEQUENCE "fcdefins_seq";


ALTER TABLE "fcdefins" DROP COLUMN ID;



ALTER TABLE "fcdefins" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefins_seq'::regclass);


ALTER TABLE "fcdefins" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefnca
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefnca_seq" CASCADE;

CREATE SEQUENCE "fcdefnca_seq";


ALTER TABLE "fcdefnca" DROP COLUMN ID;



ALTER TABLE "fcdefnca" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefnca_seq'::regclass);


ALTER TABLE "fcdefnca" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefpgi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefpgi_seq" CASCADE;

CREATE SEQUENCE "fcdefpgi_seq";


ALTER TABLE "fcdefpgi" DROP COLUMN ID;



ALTER TABLE "fcdefpgi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefpgi_seq'::regclass);


ALTER TABLE "fcdefpgi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefrecdes
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefrecdes_seq" CASCADE;

CREATE SEQUENCE "fcdefrecdes_seq";


ALTER TABLE "fcdefrecdes" DROP COLUMN ID;



ALTER TABLE "fcdefrecdes" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefrecdes_seq'::regclass);


ALTER TABLE "fcdefrecdes" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefrecint
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefrecint_seq" CASCADE;

CREATE SEQUENCE "fcdefrecint_seq";


ALTER TABLE "fcdefrecint" DROP COLUMN ID;



ALTER TABLE "fcdefrecint" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefrecint_seq'::regclass);


ALTER TABLE "fcdefrecint" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdeftipdoc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdeftipdoc_seq" CASCADE;

CREATE SEQUENCE "fcdeftipdoc_seq";


ALTER TABLE "fcdeftipdoc" DROP COLUMN ID;



ALTER TABLE "fcdeftipdoc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdeftipdoc_seq'::regclass);


ALTER TABLE "fcdeftipdoc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefubifis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefubifis_seq" CASCADE;

CREATE SEQUENCE "fcdefubifis_seq";


ALTER TABLE "fcdefubifis" DROP COLUMN ID;



ALTER TABLE "fcdefubifis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefubifis_seq'::regclass);


ALTER TABLE "fcdefubifis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefubimag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefubimag_seq" CASCADE;

CREATE SEQUENCE "fcdefubimag_seq";


ALTER TABLE "fcdefubimag" DROP COLUMN ID;



ALTER TABLE "fcdefubimag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefubimag_seq'::regclass);


ALTER TABLE "fcdefubimag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdefuniadm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdefuniadm_seq" CASCADE;

CREATE SEQUENCE "fcdefuniadm_seq";


ALTER TABLE "fcdefuniadm" DROP COLUMN ID;



ALTER TABLE "fcdefuniadm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdefuniadm_seq'::regclass);


ALTER TABLE "fcdefuniadm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdesveh
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdesveh_seq" CASCADE;

CREATE SEQUENCE "fcdesveh_seq";


ALTER TABLE "fcdesveh" DROP COLUMN ID;



ALTER TABLE "fcdesveh" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdesveh_seq'::regclass);


ALTER TABLE "fcdesveh" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdetabo
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdetabo_seq" CASCADE;

CREATE SEQUENCE "fcdetabo_seq";


ALTER TABLE "fcdetabo" DROP COLUMN ID;



ALTER TABLE "fcdetabo" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdetabo_seq'::regclass);


ALTER TABLE "fcdetabo" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdetcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdetcon_seq" CASCADE;

CREATE SEQUENCE "fcdetcon_seq";


ALTER TABLE "fcdetcon" DROP COLUMN ID;



ALTER TABLE "fcdetcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdetcon_seq'::regclass);


ALTER TABLE "fcdetcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdetconfue
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdetconfue_seq" CASCADE;

CREATE SEQUENCE "fcdetconfue_seq";


ALTER TABLE "fcdetconfue" DROP COLUMN ID;



ALTER TABLE "fcdetconfue" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdetconfue_seq'::regclass);


ALTER TABLE "fcdetconfue" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdetpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdetpag_seq" CASCADE;

CREATE SEQUENCE "fcdetpag_seq";


ALTER TABLE "fcdetpag" DROP COLUMN ID;



ALTER TABLE "fcdetpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdetpag_seq'::regclass);


ALTER TABLE "fcdetpag" ADD PRIMARY KEY ("id");

ALTER TABLE "fcdetpag" ADD CONSTRAINT "fcdetpag_FK_1" FOREIGN KEY ("numpag") REFERENCES "fcpagos" ("numpag");

ALTER TABLE "fcdetpag" ADD CONSTRAINT "fcdetpag_FK_2" FOREIGN KEY ("tippag") REFERENCES "fctippag" ("tippag") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- fcdetreccob
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdetreccob_seq" CASCADE;

CREATE SEQUENCE "fcdetreccob_seq";


ALTER TABLE "fcdetreccob" DROP COLUMN ID;



ALTER TABLE "fcdetreccob" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdetreccob_seq'::regclass);


ALTER TABLE "fcdetreccob" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdetrep
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdetrep_seq" CASCADE;

CREATE SEQUENCE "fcdetrep_seq";


ALTER TABLE "fcdetrep" DROP COLUMN ID;



ALTER TABLE "fcdetrep" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdetrep_seq'::regclass);


ALTER TABLE "fcdetrep" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdetret
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdetret_seq" CASCADE;

CREATE SEQUENCE "fcdetret_seq";


ALTER TABLE "fcdetret" DROP COLUMN ID;



ALTER TABLE "fcdetret" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdetret_seq'::regclass);


ALTER TABLE "fcdetret" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcdeucon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcdeucon_seq" CASCADE;

CREATE SEQUENCE "fcdeucon_seq";


ALTER TABLE "fcdeucon" DROP COLUMN ID;



ALTER TABLE "fcdeucon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcdeucon_seq'::regclass);


ALTER TABLE "fcdeucon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcesppub
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcesppub_seq" CASCADE;

CREATE SEQUENCE "fcesppub_seq";


ALTER TABLE "fcesppub" DROP COLUMN ID;



ALTER TABLE "fcesppub" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcesppub_seq'::regclass);


ALTER TABLE "fcesppub" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcestado
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcestado_seq" CASCADE;

CREATE SEQUENCE "fcestado_seq";


ALTER TABLE "fcestado" DROP COLUMN ID;



ALTER TABLE "fcestado" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcestado_seq'::regclass);


ALTER TABLE "fcestado" ADD PRIMARY KEY ("id");

ALTER TABLE "fcestado" ADD CONSTRAINT "fcestado_FK_1" FOREIGN KEY ("codpai") REFERENCES "fcpais" ("codpai");

-----------------------------------------------------------------------------
-- fcesting
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcesting_seq" CASCADE;

CREATE SEQUENCE "fcesting_seq";


ALTER TABLE "fcesting" DROP COLUMN ID;



ALTER TABLE "fcesting" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcesting_seq'::regclass);


ALTER TABLE "fcesting" ADD PRIMARY KEY ("id");

CREATE INDEX "fcesting_i01fcesting" ON "fcesting" ("codpar");

CREATE INDEX "fcesting_i02fcesting" ON "fcesting" ("codpar","perest","ano");

-----------------------------------------------------------------------------
-- fcfuentesmul
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcfuentesmul_seq" CASCADE;

CREATE SEQUENCE "fcfuentesmul_seq";


ALTER TABLE "fcfuentesmul" DROP COLUMN ID;



ALTER TABLE "fcfuentesmul" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcfuentesmul_seq'::regclass);


ALTER TABLE "fcfuentesmul" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcfuentesrec
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcfuentesrec_seq" CASCADE;

CREATE SEQUENCE "fcfuentesrec_seq";


ALTER TABLE "fcfuentesrec" DROP COLUMN ID;



ALTER TABLE "fcfuentesrec" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcfuentesrec_seq'::regclass);


ALTER TABLE "fcfuentesrec" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcfuepre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcfuepre_seq" CASCADE;

CREATE SEQUENCE "fcfuepre_seq";


ALTER TABLE "fcfuepre" DROP COLUMN ID;



ALTER TABLE "fcfuepre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcfuepre_seq'::regclass);


ALTER TABLE "fcfuepre" ADD PRIMARY KEY ("id");

CREATE INDEX "fcfuepre_i02fcfuepre" ON "fcfuepre" ("codprei");

-----------------------------------------------------------------------------
-- fcinmcam
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcinmcam_seq" CASCADE;

CREATE SEQUENCE "fcinmcam_seq";


ALTER TABLE "fcinmcam" DROP COLUMN ID;



ALTER TABLE "fcinmcam" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcinmcam_seq'::regclass);


ALTER TABLE "fcinmcam" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcinmmod
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcinmmod_seq" CASCADE;

CREATE SEQUENCE "fcinmmod_seq";


ALTER TABLE "fcinmmod" DROP COLUMN ID;



ALTER TABLE "fcinmmod" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcinmmod_seq'::regclass);


ALTER TABLE "fcinmmod" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcmodapu
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcmodapu_seq" CASCADE;

CREATE SEQUENCE "fcmodapu_seq";


ALTER TABLE "fcmodapu" DROP COLUMN ID;



ALTER TABLE "fcmodapu" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcmodapu_seq'::regclass);


ALTER TABLE "fcmodapu" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcmodesp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcmodesp_seq" CASCADE;

CREATE SEQUENCE "fcmodesp_seq";


ALTER TABLE "fcmodesp" DROP COLUMN ID;



ALTER TABLE "fcmodesp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcmodesp_seq'::regclass);


ALTER TABLE "fcmodesp" ADD PRIMARY KEY ("id");

ALTER TABLE "fcmodesp" ADD CONSTRAINT "fcmodesp_FK_1" FOREIGN KEY ("nrocon") REFERENCES "fcesppub" ("nrocon") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- fcmodinm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcmodinm_seq" CASCADE;

CREATE SEQUENCE "fcmodinm_seq";


ALTER TABLE "fcmodinm" DROP COLUMN ID;



ALTER TABLE "fcmodinm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcmodinm_seq'::regclass);


ALTER TABLE "fcmodinm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcmodpro
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcmodpro_seq" CASCADE;

CREATE SEQUENCE "fcmodpro_seq";


ALTER TABLE "fcmodpro" DROP COLUMN ID;



ALTER TABLE "fcmodpro" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcmodpro_seq'::regclass);


ALTER TABLE "fcmodpro" ADD PRIMARY KEY ("id");

ALTER TABLE "fcmodpro" ADD CONSTRAINT "fcmodpro_FK_1" FOREIGN KEY ("nrocon") REFERENCES "fcprolic" ("nrocon") ON DELETE CASCADE;

-----------------------------------------------------------------------------
-- fcmodveh
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcmodveh_seq" CASCADE;

CREATE SEQUENCE "fcmodveh_seq";


ALTER TABLE "fcmodveh" DROP COLUMN ID;



ALTER TABLE "fcmodveh" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcmodveh_seq'::regclass);


ALTER TABLE "fcmodveh" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcmultas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcmultas_seq" CASCADE;

CREATE SEQUENCE "fcmultas_seq";


ALTER TABLE "fcmultas" DROP COLUMN ID;



ALTER TABLE "fcmultas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcmultas_seq'::regclass);


ALTER TABLE "fcmultas" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcmunici
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcmunici_seq" CASCADE;

CREATE SEQUENCE "fcmunici_seq";


ALTER TABLE "fcmunici" DROP COLUMN ID;



ALTER TABLE "fcmunici" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcmunici_seq'::regclass);


ALTER TABLE "fcmunici" ADD PRIMARY KEY ("id");

ALTER TABLE "fcmunici" ADD CONSTRAINT "fcmunici_FK_1" FOREIGN KEY ("codpai") REFERENCES "fcestado" ("codpai");

-----------------------------------------------------------------------------
-- fconrep
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fconrep_seq" CASCADE;

CREATE SEQUENCE "fconrep_seq";


ALTER TABLE "fconrep" DROP COLUMN ID;



ALTER TABLE "fconrep" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fconrep_seq'::regclass);


ALTER TABLE "fconrep" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcotring
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcotring_seq" CASCADE;

CREATE SEQUENCE "fcotring_seq";


ALTER TABLE "fcotring" DROP COLUMN ID;



ALTER TABLE "fcotring" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcotring_seq'::regclass);


ALTER TABLE "fcotring" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcpaging
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcpaging_seq" CASCADE;

CREATE SEQUENCE "fcpaging_seq";


ALTER TABLE "fcpaging" DROP COLUMN ID;



ALTER TABLE "fcpaging" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcpaging_seq'::regclass);


ALTER TABLE "fcpaging" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcpagos
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcpagos_seq" CASCADE;

CREATE SEQUENCE "fcpagos_seq";


ALTER TABLE "fcpagos" DROP COLUMN ID;



ALTER TABLE "fcpagos" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcpagos_seq'::regclass);


ALTER TABLE "fcpagos" ADD PRIMARY KEY ("id");

CREATE INDEX "fcpagos_i02fcpagos" ON "fcpagos" ("rifcon");

CREATE INDEX "fcpagos_i03fcpagos" ON "fcpagos" ("fecpag");

CREATE INDEX "fcpagos_i04fcpagos" ON "fcpagos" ("edopag");

-----------------------------------------------------------------------------
-- fcpais
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcpais_seq" CASCADE;

CREATE SEQUENCE "fcpais_seq";


ALTER TABLE "fcpais" DROP COLUMN ID;



ALTER TABLE "fcpais" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcpais_seq'::regclass);


ALTER TABLE "fcpais" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcparroq
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcparroq_seq" CASCADE;

CREATE SEQUENCE "fcparroq_seq";


ALTER TABLE "fcparroq" DROP COLUMN ID;



ALTER TABLE "fcparroq" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcparroq_seq'::regclass);


ALTER TABLE "fcparroq" ADD PRIMARY KEY ("id");

ALTER TABLE "fcparroq" ADD CONSTRAINT "fcparroq_FK_1" FOREIGN KEY ("codpai") REFERENCES "fcmunici" ("codpai");

-----------------------------------------------------------------------------
-- fcpreing
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcpreing_seq" CASCADE;

CREATE SEQUENCE "fcpreing_seq";


ALTER TABLE "fcpreing" DROP COLUMN ID;



ALTER TABLE "fcpreing" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcpreing_seq'::regclass);


ALTER TABLE "fcpreing" ADD PRIMARY KEY ("id");

CREATE INDEX "fcpreing_i01fcpreing" ON "fcpreing" ("codpar");

CREATE INDEX "fcpreing_i02fcpreing" ON "fcpreing" ("codpar","estima");

-----------------------------------------------------------------------------
-- fcprolic
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcprolic_seq" CASCADE;

CREATE SEQUENCE "fcprolic_seq";


ALTER TABLE "fcprolic" DROP COLUMN ID;



ALTER TABLE "fcprolic" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcprolic_seq'::regclass);


ALTER TABLE "fcprolic" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrangosdes
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrangosdes_seq" CASCADE;

CREATE SEQUENCE "fcrangosdes_seq";


ALTER TABLE "fcrangosdes" DROP COLUMN ID;



ALTER TABLE "fcrangosdes" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosdes_seq'::regclass);


ALTER TABLE "fcrangosdes" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrangosmul
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrangosmul_seq" CASCADE;

CREATE SEQUENCE "fcrangosmul_seq";


ALTER TABLE "fcrangosmul" DROP COLUMN ID;



ALTER TABLE "fcrangosmul" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosmul_seq'::regclass);


ALTER TABLE "fcrangosmul" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrangosrec
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrangosrec_seq" CASCADE;

CREATE SEQUENCE "fcrangosrec_seq";


ALTER TABLE "fcrangosrec" DROP COLUMN ID;



ALTER TABLE "fcrangosrec" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrangosrec_seq'::regclass);


ALTER TABLE "fcrangosrec" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcreccob
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcreccob_seq" CASCADE;

CREATE SEQUENCE "fcreccob_seq";


ALTER TABLE "fcreccob" DROP COLUMN ID;



ALTER TABLE "fcreccob" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcreccob_seq'::regclass);


ALTER TABLE "fcreccob" ADD PRIMARY KEY ("id");

CREATE INDEX "fcreccob_i_fcreccob" ON "fcreccob" ("codcob");

-----------------------------------------------------------------------------
-- fcreccon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcreccon_seq" CASCADE;

CREATE SEQUENCE "fcreccon_seq";


ALTER TABLE "fcreccon" DROP COLUMN ID;



ALTER TABLE "fcreccon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcreccon_seq'::regclass);


ALTER TABLE "fcreccon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrecdes
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrecdes_seq" CASCADE;

CREATE SEQUENCE "fcrecdes_seq";


ALTER TABLE "fcrecdes" DROP COLUMN ID;



ALTER TABLE "fcrecdes" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdes_seq'::regclass);


ALTER TABLE "fcrecdes" ADD PRIMARY KEY ("id");

CREATE INDEX "fcrecdes_i01fcrecdes" ON "fcrecdes" ("recdes");

-----------------------------------------------------------------------------
-- fcrecdesg
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrecdesg_seq" CASCADE;

CREATE SEQUENCE "fcrecdesg_seq";


ALTER TABLE "fcrecdesg" DROP COLUMN ID;



ALTER TABLE "fcrecdesg" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdesg_seq'::regclass);


ALTER TABLE "fcrecdesg" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrecdespag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrecdespag_seq" CASCADE;

CREATE SEQUENCE "fcrecdespag_seq";


ALTER TABLE "fcrecdespag" DROP COLUMN ID;



ALTER TABLE "fcrecdespag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrecdespag_seq'::regclass);


ALTER TABLE "fcrecdespag" ADD PRIMARY KEY ("id");

CREATE INDEX "fcrecdespag_i02fcrecdespag" ON "fcrecdespag" ("numpag");

ALTER TABLE "fcrecdespag" ADD CONSTRAINT "fcrecdespag_FK_1" FOREIGN KEY ("codrede") REFERENCES "fcdefdesc" ("coddes");

-----------------------------------------------------------------------------
-- fcrecibo
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrecibo_seq" CASCADE;

CREATE SEQUENCE "fcrecibo_seq";


ALTER TABLE "fcrecibo" DROP COLUMN ID;



ALTER TABLE "fcrecibo" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrecibo_seq'::regclass);


ALTER TABLE "fcrecibo" ADD PRIMARY KEY ("id");

CREATE INDEX "fcrecibo_i01fcrecibo" ON "fcrecibo" ("rifcon","fecrec");

CREATE INDEX "fcrecibo_i02fcrecibo" ON "fcrecibo" ("numlic");

-----------------------------------------------------------------------------
-- fcrecurso
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrecurso_seq" CASCADE;

CREATE SEQUENCE "fcrecurso_seq";


ALTER TABLE "fcrecurso" DROP COLUMN ID;



ALTER TABLE "fcrecurso" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrecurso_seq'::regclass);


ALTER TABLE "fcrecurso" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcreginm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcreginm_seq" CASCADE;

CREATE SEQUENCE "fcreginm_seq";


ALTER TABLE "fcreginm" DROP COLUMN ID;



ALTER TABLE "fcreginm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm_seq'::regclass);


ALTER TABLE "fcreginm" ADD PRIMARY KEY ("id");

CREATE INDEX "fcreginm_ifcreginm_codcatinm" ON "fcreginm" ("codcatinm");

-----------------------------------------------------------------------------
-- fcreginm1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcreginm1_seq" CASCADE;

CREATE SEQUENCE "fcreginm1_seq";


ALTER TABLE "fcreginm1" DROP COLUMN ID;



ALTER TABLE "fcreginm1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm1_seq'::regclass);


ALTER TABLE "fcreginm1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcreginm2
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcreginm2_seq" CASCADE;

CREATE SEQUENCE "fcreginm2_seq";


ALTER TABLE "fcreginm2" DROP COLUMN ID;



ALTER TABLE "fcreginm2" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm2_seq'::regclass);


ALTER TABLE "fcreginm2" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcreginm3
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcreginm3_seq" CASCADE;

CREATE SEQUENCE "fcreginm3_seq";


ALTER TABLE "fcreginm3" DROP COLUMN ID;



ALTER TABLE "fcreginm3" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcreginm3_seq'::regclass);


ALTER TABLE "fcreginm3" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcregveh
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcregveh_seq" CASCADE;

CREATE SEQUENCE "fcregveh_seq";


ALTER TABLE "fcregveh" DROP COLUMN ID;



ALTER TABLE "fcregveh" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcregveh_seq'::regclass);


ALTER TABLE "fcregveh" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcregveh1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcregveh1_seq" CASCADE;

CREATE SEQUENCE "fcregveh1_seq";


ALTER TABLE "fcregveh1" DROP COLUMN ID;



ALTER TABLE "fcregveh1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcregveh1_seq'::regclass);


ALTER TABLE "fcregveh1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrenlic
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrenlic_seq" CASCADE;

CREATE SEQUENCE "fcrenlic_seq";


ALTER TABLE "fcrenlic" DROP COLUMN ID;



ALTER TABLE "fcrenlic" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrenlic_seq'::regclass);


ALTER TABLE "fcrenlic" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrepfis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrepfis_seq" CASCADE;

CREATE SEQUENCE "fcrepfis_seq";


ALTER TABLE "fcrepfis" DROP COLUMN ID;



ALTER TABLE "fcrepfis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrepfis_seq'::regclass);


ALTER TABLE "fcrepfis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrepliq
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrepliq_seq" CASCADE;

CREATE SEQUENCE "fcrepliq_seq";


ALTER TABLE "fcrepliq" DROP COLUMN ID;



ALTER TABLE "fcrepliq" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrepliq_seq'::regclass);


ALTER TABLE "fcrepliq" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcretencion
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcretencion_seq" CASCADE;

CREATE SEQUENCE "fcretencion_seq";


ALTER TABLE "fcretencion" DROP COLUMN ID;



ALTER TABLE "fcretencion" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcretencion_seq'::regclass);


ALTER TABLE "fcretencion" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrutas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrutas_seq" CASCADE;

CREATE SEQUENCE "fcrutas_seq";


ALTER TABLE "fcrutas" DROP COLUMN ID;



ALTER TABLE "fcrutas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrutas_seq'::regclass);


ALTER TABLE "fcrutas" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcrutcob
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcrutcob_seq" CASCADE;

CREATE SEQUENCE "fcrutcob_seq";


ALTER TABLE "fcrutcob" DROP COLUMN ID;



ALTER TABLE "fcrutcob" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcrutcob_seq'::regclass);


ALTER TABLE "fcrutcob" ADD PRIMARY KEY ("id");

ALTER TABLE "fcrutcob" ADD CONSTRAINT "fcrutcob_FK_1" FOREIGN KEY ("codcob") REFERENCES "fccobrad" ("codcob") ON DELETE CASCADE;

ALTER TABLE "fcrutcob" ADD CONSTRAINT "fcrutcob_FK_2" FOREIGN KEY ("codrut") REFERENCES "fcrutas" ("codrut");

-----------------------------------------------------------------------------
-- fcsitjurinm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcsitjurinm_seq" CASCADE;

CREATE SEQUENCE "fcsitjurinm_seq";


ALTER TABLE "fcsitjurinm" DROP COLUMN ID;



ALTER TABLE "fcsitjurinm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcsitjurinm_seq'::regclass);


ALTER TABLE "fcsitjurinm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcsollic
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcsollic_seq" CASCADE;

CREATE SEQUENCE "fcsollic_seq";


ALTER TABLE "fcsollic" DROP COLUMN ID;



ALTER TABLE "fcsollic" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcsollic_seq'::regclass);


ALTER TABLE "fcsollic" ADD PRIMARY KEY ("id");

ALTER TABLE "fcsollic" ADD CONSTRAINT "fcsollic_i01fcsollic" UNIQUE ("numsol");

CREATE INDEX "fcsollic_i02fcsollic" ON "fcsollic" ("numlic");

-----------------------------------------------------------------------------
-- fcsollic1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcsollic1_seq" CASCADE;

CREATE SEQUENCE "fcsollic1_seq";


ALTER TABLE "fcsollic1" DROP COLUMN ID;



ALTER TABLE "fcsollic1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcsollic1_seq'::regclass);


ALTER TABLE "fcsollic1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcsolneg
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcsolneg_seq" CASCADE;

CREATE SEQUENCE "fcsolneg_seq";


ALTER TABLE "fcsolneg" DROP COLUMN ID;



ALTER TABLE "fcsolneg" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcsolneg_seq'::regclass);


ALTER TABLE "fcsolneg" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcsolvencia
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcsolvencia_seq" CASCADE;

CREATE SEQUENCE "fcsolvencia_seq";


ALTER TABLE "fcsolvencia" DROP COLUMN ID;



ALTER TABLE "fcsolvencia" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcsolvencia_seq'::regclass);


ALTER TABLE "fcsolvencia" ADD PRIMARY KEY ("id");

CREATE INDEX "fcsolvencia_i01fcsolvencia" ON "fcsolvencia" ("codsol");

ALTER TABLE "fcsolvencia" ADD CONSTRAINT "fcsolvencia_FK_1" FOREIGN KEY ("codtip") REFERENCES "fctipsol" ("codtip");

-----------------------------------------------------------------------------
-- fcsuscan
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcsuscan_seq" CASCADE;

CREATE SEQUENCE "fcsuscan_seq";


ALTER TABLE "fcsuscan" DROP COLUMN ID;



ALTER TABLE "fcsuscan" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcsuscan_seq'::regclass);


ALTER TABLE "fcsuscan" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctasban
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctasban_seq" CASCADE;

CREATE SEQUENCE "fctasban_seq";


ALTER TABLE "fctasban" DROP COLUMN ID;



ALTER TABLE "fctasban" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctasban_seq'::regclass);


ALTER TABLE "fctasban" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctipapu
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctipapu_seq" CASCADE;

CREATE SEQUENCE "fctipapu_seq";


ALTER TABLE "fctipapu" DROP COLUMN ID;



ALTER TABLE "fctipapu" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctipapu_seq'::regclass);


ALTER TABLE "fctipapu" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctipesp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctipesp_seq" CASCADE;

CREATE SEQUENCE "fctipesp_seq";


ALTER TABLE "fctipesp" DROP COLUMN ID;



ALTER TABLE "fctipesp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctipesp_seq'::regclass);


ALTER TABLE "fctipesp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctippag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctippag_seq" CASCADE;

CREATE SEQUENCE "fctippag_seq";


ALTER TABLE "fctippag" DROP COLUMN ID;



ALTER TABLE "fctippag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctippag_seq'::regclass);


ALTER TABLE "fctippag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctippro
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctippro_seq" CASCADE;

CREATE SEQUENCE "fctippro_seq";


ALTER TABLE "fctippro" DROP COLUMN ID;



ALTER TABLE "fctippro" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctippro_seq'::regclass);


ALTER TABLE "fctippro" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctipsol
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctipsol_seq" CASCADE;

CREATE SEQUENCE "fctipsol_seq";


ALTER TABLE "fctipsol" DROP COLUMN ID;



ALTER TABLE "fctipsol" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctipsol_seq'::regclass);


ALTER TABLE "fctipsol" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctrainm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctrainm_seq" CASCADE;

CREATE SEQUENCE "fctrainm_seq";


ALTER TABLE "fctrainm" DROP COLUMN ID;



ALTER TABLE "fctrainm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctrainm_seq'::regclass);


ALTER TABLE "fctrainm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctralic
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctralic_seq" CASCADE;

CREATE SEQUENCE "fctralic_seq";


ALTER TABLE "fctralic" DROP COLUMN ID;



ALTER TABLE "fctralic" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctralic_seq'::regclass);


ALTER TABLE "fctralic" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fctraveh
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fctraveh_seq" CASCADE;

CREATE SEQUENCE "fctraveh_seq";


ALTER TABLE "fctraveh" DROP COLUMN ID;



ALTER TABLE "fctraveh" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fctraveh_seq'::regclass);


ALTER TABLE "fctraveh" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcunimon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcunimon_seq" CASCADE;

CREATE SEQUENCE "fcunimon_seq";


ALTER TABLE "fcunimon" DROP COLUMN ID;



ALTER TABLE "fcunimon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcunimon_seq'::regclass);


ALTER TABLE "fcunimon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcusoinm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcusoinm_seq" CASCADE;

CREATE SEQUENCE "fcusoinm_seq";


ALTER TABLE "fcusoinm" DROP COLUMN ID;



ALTER TABLE "fcusoinm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcusoinm_seq'::regclass);


ALTER TABLE "fcusoinm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcusoveh
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcusoveh_seq" CASCADE;

CREATE SEQUENCE "fcusoveh_seq";


ALTER TABLE "fcusoveh" DROP COLUMN ID;



ALTER TABLE "fcusoveh" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcusoveh_seq'::regclass);


ALTER TABLE "fcusoveh" ADD PRIMARY KEY ("anovig");

-----------------------------------------------------------------------------
-- fcvalinm
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcvalinm_seq" CASCADE;

CREATE SEQUENCE "fcvalinm_seq";


ALTER TABLE "fcvalinm" DROP COLUMN ID;



ALTER TABLE "fcvalinm" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcvalinm_seq'::regclass);


ALTER TABLE "fcvalinm" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- fcvalinm1
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "fcvalinm1_seq" CASCADE;

CREATE SEQUENCE "fcvalinm1_seq";


ALTER TABLE "fcvalinm1" DROP COLUMN ID;



ALTER TABLE "fcvalinm1" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('fcvalinm1_seq'::regclass);


ALTER TABLE "fcvalinm1" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opasiordapr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opasiordapr_seq" CASCADE;

CREATE SEQUENCE "opasiordapr_seq";


ALTER TABLE "opasiordapr" DROP COLUMN ID;



ALTER TABLE "opasiordapr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opasiordapr_seq'::regclass);


ALTER TABLE "opasiordapr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opautpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opautpag_seq" CASCADE;

CREATE SEQUENCE "opautpag_seq";


ALTER TABLE "opautpag" DROP COLUMN ID;



ALTER TABLE "opautpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opautpag_seq'::regclass);


ALTER TABLE "opautpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opbenefi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opbenefi_seq" CASCADE;

CREATE SEQUENCE "opbenefi_seq";


ALTER TABLE "opbenefi" DROP COLUMN ID;



ALTER TABLE "opbenefi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opbenefi_seq'::regclass);


ALTER TABLE "opbenefi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opbenefi2
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opbenefi2_seq" CASCADE;

CREATE SEQUENCE "opbenefi2_seq";


ALTER TABLE "opbenefi2" DROP COLUMN ID;



ALTER TABLE "opbenefi2" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opbenefi2_seq'::regclass);


ALTER TABLE "opbenefi2" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opbenfonava
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opbenfonava_seq" CASCADE;

CREATE SEQUENCE "opbenfonava_seq";


ALTER TABLE "opbenfonava" DROP COLUMN ID;



ALTER TABLE "opbenfonava" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opbenfonava_seq'::regclass);


ALTER TABLE "opbenfonava" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opcheper
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opcheper_seq" CASCADE;

CREATE SEQUENCE "opcheper_seq";


ALTER TABLE "opcheper" DROP COLUMN ID;



ALTER TABLE "opcheper" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opcheper_seq'::regclass);


ALTER TABLE "opcheper" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opcominc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opcominc_seq" CASCADE;

CREATE SEQUENCE "opcominc_seq";


ALTER TABLE "opcominc" DROP COLUMN ID;



ALTER TABLE "opcominc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opcominc_seq'::regclass);


ALTER TABLE "opcominc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opconinc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opconinc_seq" CASCADE;

CREATE SEQUENCE "opconinc_seq";


ALTER TABLE "opconinc" DROP COLUMN ID;



ALTER TABLE "opconinc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opconinc_seq'::regclass);


ALTER TABLE "opconinc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opconnom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opconnom_seq" CASCADE;

CREATE SEQUENCE "opconnom_seq";


ALTER TABLE "opconnom" DROP COLUMN ID;



ALTER TABLE "opconnom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opconnom_seq'::regclass);


ALTER TABLE "opconnom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opdefemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opdefemp_seq" CASCADE;

CREATE SEQUENCE "opdefemp_seq";


ALTER TABLE "opdefemp" DROP COLUMN ID;



ALTER TABLE "opdefemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opdefemp_seq'::regclass);


ALTER TABLE "opdefemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opdetaut
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opdetaut_seq" CASCADE;

CREATE SEQUENCE "opdetaut_seq";


ALTER TABLE "opdetaut" DROP COLUMN ID;



ALTER TABLE "opdetaut" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opdetaut_seq'::regclass);


ALTER TABLE "opdetaut" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opdetfac
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opdetfac_seq" CASCADE;

CREATE SEQUENCE "opdetfac_seq";


ALTER TABLE "opdetfac" DROP COLUMN ID;



ALTER TABLE "opdetfac" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opdetfac_seq'::regclass);


ALTER TABLE "opdetfac" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opdetord
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opdetord_seq" CASCADE;

CREATE SEQUENCE "opdetord_seq";


ALTER TABLE "opdetord" DROP COLUMN ID;



ALTER TABLE "opdetord" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opdetord_seq'::regclass);


ALTER TABLE "opdetord" ADD PRIMARY KEY ("id");

CREATE INDEX "i01opdetord" ON "opdetord" ("numord","codpre");

CREATE INDEX "i02opdetord" ON "opdetord" ("codpre");

-----------------------------------------------------------------------------
-- opdetper
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opdetper_seq" CASCADE;

CREATE SEQUENCE "opdetper_seq";


ALTER TABLE "opdetper" DROP COLUMN ID;



ALTER TABLE "opdetper" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opdetper_seq'::regclass);


ALTER TABLE "opdetper" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opdisfue
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opdisfue_seq" CASCADE;

CREATE SEQUENCE "opdisfue_seq";


ALTER TABLE "opdisfue" DROP COLUMN ID;



ALTER TABLE "opdisfue" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opdisfue_seq'::regclass);


ALTER TABLE "opdisfue" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opfactur
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opfactur_seq" CASCADE;

CREATE SEQUENCE "opfactur_seq";


ALTER TABLE "opfactur" DROP COLUMN ID;



ALTER TABLE "opfactur" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opfactur_seq'::regclass);


ALTER TABLE "opfactur" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opordche
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opordche_seq" CASCADE;

CREATE SEQUENCE "opordche_seq";


ALTER TABLE "opordche" DROP COLUMN ID;



ALTER TABLE "opordche" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opordche_seq'::regclass);


ALTER TABLE "opordche" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opordpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opordpag_seq" CASCADE;

CREATE SEQUENCE "opordpag_seq";


ALTER TABLE "opordpag" DROP COLUMN ID;



ALTER TABLE "opordpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opordpag_seq'::regclass);


ALTER TABLE "opordpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opordper
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opordper_seq" CASCADE;

CREATE SEQUENCE "opordper_seq";


ALTER TABLE "opordper" DROP COLUMN ID;



ALTER TABLE "opordper" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opordper_seq'::regclass);


ALTER TABLE "opordper" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opretcon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opretcon_seq" CASCADE;

CREATE SEQUENCE "opretcon_seq";


ALTER TABLE "opretcon" DROP COLUMN ID;



ALTER TABLE "opretcon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opretcon_seq'::regclass);


ALTER TABLE "opretcon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- opretord
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "opretord_seq" CASCADE;

CREATE SEQUENCE "opretord_seq";


ALTER TABLE "opretord" DROP COLUMN ID;



ALTER TABLE "opretord" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('opretord_seq'::regclass);


ALTER TABLE "opretord" ADD PRIMARY KEY ("id");

CREATE INDEX "i01opretord" ON "opretord" ("numord","codtip");

-----------------------------------------------------------------------------
-- optipben
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "optipben_seq" CASCADE;

CREATE SEQUENCE "optipben_seq";


ALTER TABLE "optipben" DROP COLUMN ID;



ALTER TABLE "optipben" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('optipben_seq'::regclass);


ALTER TABLE "optipben" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- optipret
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "optipret_seq" CASCADE;

CREATE SEQUENCE "optipret_seq";


ALTER TABLE "optipret" DROP COLUMN ID;



ALTER TABLE "optipret" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('optipret_seq'::regclass);


ALTER TABLE "optipret" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsantici
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsantici_seq" CASCADE;

CREATE SEQUENCE "tsantici_seq";


ALTER TABLE "tsantici" DROP COLUMN ID;



ALTER TABLE "tsantici" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsantici_seq'::regclass);


ALTER TABLE "tsantici" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsantord
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsantord_seq" CASCADE;

CREATE SEQUENCE "tsantord_seq";


ALTER TABLE "tsantord" DROP COLUMN ID;



ALTER TABLE "tsantord" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsantord_seq'::regclass);


ALTER TABLE "tsantord" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsasifte
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsasifte_seq" CASCADE;

CREATE SEQUENCE "tsasifte_seq";


ALTER TABLE "tsasifte" DROP COLUMN ID;



ALTER TABLE "tsasifte" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsasifte_seq'::regclass);


ALTER TABLE "tsasifte" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tscheemi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tscheemi_seq" CASCADE;

CREATE SEQUENCE "tscheemi_seq";


ALTER TABLE "tscheemi" DROP COLUMN ID;



ALTER TABLE "tscheemi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tscheemi_seq'::regclass);


ALTER TABLE "tscheemi" ADD PRIMARY KEY ("id");

CREATE INDEX "itscheemi2" ON "tscheemi" ("numcue","cedrif");

CREATE INDEX "itscheemi3" ON "tscheemi" ("cedrif");

CREATE INDEX "itscheemi4" ON "tscheemi" ("fecemi");

-----------------------------------------------------------------------------
-- tscomprobantes
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tscomprobantes_seq" CASCADE;

CREATE SEQUENCE "tscomprobantes_seq";


ALTER TABLE "tscomprobantes" DROP COLUMN ID;



ALTER TABLE "tscomprobantes" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tscomprobantes_seq'::regclass);


ALTER TABLE "tscomprobantes" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsconcil
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsconcil_seq" CASCADE;

CREATE SEQUENCE "tsconcil_seq";


ALTER TABLE "tsconcil" DROP COLUMN ID;



ALTER TABLE "tsconcil" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsconcil_seq'::regclass);


ALTER TABLE "tsconcil" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsconcilhis
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsconcilhis_seq" CASCADE;

CREATE SEQUENCE "tsconcilhis_seq";


ALTER TABLE "tsconcilhis" DROP COLUMN ID;



ALTER TABLE "tsconcilhis" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsconcilhis_seq'::regclass);


ALTER TABLE "tsconcilhis" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsconuni
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsconuni_seq" CASCADE;

CREATE SEQUENCE "tsconuni_seq";


ALTER TABLE "tsconuni" DROP COLUMN ID;



ALTER TABLE "tsconuni" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsconuni_seq'::regclass);


ALTER TABLE "tsconuni" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsdefban
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsdefban_seq" CASCADE;

CREATE SEQUENCE "tsdefban_seq";


ALTER TABLE "tsdefban" DROP COLUMN ID;



ALTER TABLE "tsdefban" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsdefban_seq'::regclass);


ALTER TABLE "tsdefban" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsdefchequera
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsdefchequera_seq" CASCADE;

CREATE SEQUENCE "tsdefchequera_seq";


ALTER TABLE "tsdefchequera" DROP COLUMN ID;



ALTER TABLE "tsdefchequera" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsdefchequera_seq'::regclass);


ALTER TABLE "tsdefchequera" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsdefemp
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsdefemp_seq" CASCADE;

CREATE SEQUENCE "tsdefemp_seq";


ALTER TABLE "tsdefemp" DROP COLUMN ID;



ALTER TABLE "tsdefemp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsdefemp_seq'::regclass);


ALTER TABLE "tsdefemp" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsdefrengas
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsdefrengas_seq" CASCADE;

CREATE SEQUENCE "tsdefrengas_seq";


ALTER TABLE "tsdefrengas" DROP COLUMN ID;



ALTER TABLE "tsdefrengas" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsdefrengas_seq'::regclass);


ALTER TABLE "tsdefrengas" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsdepfonpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsdepfonpre_seq" CASCADE;

CREATE SEQUENCE "tsdepfonpre_seq";


ALTER TABLE "tsdepfonpre" DROP COLUMN ID;



ALTER TABLE "tsdepfonpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsdepfonpre_seq'::regclass);


ALTER TABLE "tsdepfonpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsdesmon
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsdesmon_seq" CASCADE;

CREATE SEQUENCE "tsdesmon_seq";


ALTER TABLE "tsdesmon" DROP COLUMN ID;



ALTER TABLE "tsdesmon" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsdesmon_seq'::regclass);


ALTER TABLE "tsdesmon" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsdettra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsdettra_seq" CASCADE;

CREATE SEQUENCE "tsdettra_seq";


ALTER TABLE "tsdettra" DROP COLUMN ID;



ALTER TABLE "tsdettra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsdettra_seq'::regclass);


ALTER TABLE "tsdettra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsentislr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsentislr_seq" CASCADE;

CREATE SEQUENCE "tsentislr_seq";


ALTER TABLE "tsentislr" DROP COLUMN ID;



ALTER TABLE "tsentislr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsentislr_seq'::regclass);


ALTER TABLE "tsentislr" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsfonpre
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsfonpre_seq" CASCADE;

CREATE SEQUENCE "tsfonpre_seq";


ALTER TABLE "tsfonpre" DROP COLUMN ID;



ALTER TABLE "tsfonpre" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsfonpre_seq'::regclass);


ALTER TABLE "tsfonpre" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tslibcom
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tslibcom_seq" CASCADE;

CREATE SEQUENCE "tslibcom_seq";


ALTER TABLE "tslibcom" DROP COLUMN ID;



ALTER TABLE "tslibcom" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tslibcom_seq'::regclass);


ALTER TABLE "tslibcom" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsmaetra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsmaetra_seq" CASCADE;

CREATE SEQUENCE "tsmaetra_seq";


ALTER TABLE "tsmaetra" DROP COLUMN ID;



ALTER TABLE "tsmaetra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsmaetra_seq'::regclass);


ALTER TABLE "tsmaetra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsmovban
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsmovban_seq" CASCADE;

CREATE SEQUENCE "tsmovban_seq";


ALTER TABLE "tsmovban" DROP COLUMN ID;



ALTER TABLE "tsmovban" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsmovban_seq'::regclass);


ALTER TABLE "tsmovban" ADD PRIMARY KEY ("id");

CREATE INDEX "itsmovban2" ON "tsmovban" ("numcue","tipmov","fecban");

-----------------------------------------------------------------------------
-- tsmovlib
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsmovlib_seq" CASCADE;

CREATE SEQUENCE "tsmovlib_seq";


ALTER TABLE "tsmovlib" DROP COLUMN ID;



ALTER TABLE "tsmovlib" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsmovlib_seq'::regclass);


ALTER TABLE "tsmovlib" ADD PRIMARY KEY ("id");

CREATE INDEX "i01tsmovlib" ON "tsmovlib" ("numcue");

CREATE INDEX "i02tsmovlib" ON "tsmovlib" ("tipmov","numcue");

CREATE INDEX "i03tsmovlib" ON "tsmovlib" ("tipmov");

CREATE INDEX "i04tsmovlib" ON "tsmovlib" ("numcue","feclib");

CREATE INDEX "i06movlib" ON "tsmovlib" ("reflib");

CREATE INDEX "i07movlib" ON "tsmovlib" ("feclib");

CREATE INDEX "itsmovlib2" ON "tsmovlib" ("numcue","tipmov","feclib");

-----------------------------------------------------------------------------
-- tsmovtra
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsmovtra_seq" CASCADE;

CREATE SEQUENCE "tsmovtra_seq";


ALTER TABLE "tsmovtra" DROP COLUMN ID;



ALTER TABLE "tsmovtra" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsmovtra_seq'::regclass);


ALTER TABLE "tsmovtra" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tspararc
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tspararc_seq" CASCADE;

CREATE SEQUENCE "tspararc_seq";


ALTER TABLE "tspararc" DROP COLUMN ID;



ALTER TABLE "tspararc" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tspararc_seq'::regclass);


ALTER TABLE "tspararc" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsrelfonvia
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsrelfonvia_seq" CASCADE;

CREATE SEQUENCE "tsrelfonvia_seq";


ALTER TABLE "tsrelfonvia" DROP COLUMN ID;



ALTER TABLE "tsrelfonvia" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsrelfonvia_seq'::regclass);


ALTER TABLE "tsrelfonvia" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsrepret
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsrepret_seq" CASCADE;

CREATE SEQUENCE "tsrepret_seq";


ALTER TABLE "tsrepret" DROP COLUMN ID;



ALTER TABLE "tsrepret" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsrepret_seq'::regclass);


ALTER TABLE "tsrepret" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tsretiva
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tsretiva_seq" CASCADE;

CREATE SEQUENCE "tsretiva_seq";


ALTER TABLE "tsretiva" DROP COLUMN ID;



ALTER TABLE "tsretiva" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tsretiva_seq'::regclass);


ALTER TABLE "tsretiva" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tssecofi
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tssecofi_seq" CASCADE;

CREATE SEQUENCE "tssecofi_seq";


ALTER TABLE "tssecofi" DROP COLUMN ID;



ALTER TABLE "tssecofi" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tssecofi_seq'::regclass);


ALTER TABLE "tssecofi" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tssolpag
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tssolpag_seq" CASCADE;

CREATE SEQUENCE "tssolpag_seq";


ALTER TABLE "tssolpag" DROP COLUMN ID;



ALTER TABLE "tssolpag" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tssolpag_seq'::regclass);


ALTER TABLE "tssolpag" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tstipcue
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tstipcue_seq" CASCADE;

CREATE SEQUENCE "tstipcue_seq";


ALTER TABLE "tstipcue" DROP COLUMN ID;



ALTER TABLE "tstipcue" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tstipcue_seq'::regclass);


ALTER TABLE "tstipcue" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tstipfte
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tstipfte_seq" CASCADE;

CREATE SEQUENCE "tstipfte_seq";


ALTER TABLE "tstipfte" DROP COLUMN ID;



ALTER TABLE "tstipfte" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tstipfte_seq'::regclass);


ALTER TABLE "tstipfte" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tstipmov
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tstipmov_seq" CASCADE;

CREATE SEQUENCE "tstipmov_seq";


ALTER TABLE "tstipmov" DROP COLUMN ID;



ALTER TABLE "tstipmov" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tstipmov_seq'::regclass);


ALTER TABLE "tstipmov" ADD PRIMARY KEY ("id");

-----------------------------------------------------------------------------
-- tstipren
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "tstipren_seq" CASCADE;

CREATE SEQUENCE "tstipren_seq";


ALTER TABLE "tstipren" DROP COLUMN ID;



ALTER TABLE "tstipren" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('tstipren_seq'::regclass);


ALTER TABLE "tstipren" ADD PRIMARY KEY ("id");


-----------------------------------------------------------------------------
-- cpdefapr
-----------------------------------------------------------------------------

DROP SEQUENCE IF EXISTS "cpdefapr_seq" CASCADE;

CREATE SEQUENCE "cpdefapr_seq";


ALTER TABLE "cpdefapr" DROP COLUMN ID;



ALTER TABLE "cpdefapr" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('cpdefapr_seq'::regclass);


ALTER TABLE "cpdefapr" ADD PRIMARY KEY ("id");

-------------------------------------------------------------

-----------------------------------------------------------------------------
-- casolraz
-----------------------------------------------------------------------------


CREATE SEQUENCE "casolraz_seq";


ALTER TABLE "casolraz" DROP COLUMN ID;



ALTER TABLE "casolraz" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('casolraz_seq'::regclass);



-----------------------------------------------------------------------------
-- caartrcp
-----------------------------------------------------------------------------


CREATE SEQUENCE "caartrcp_seq";


ALTER TABLE "caartrcp" DROP COLUMN ID;



ALTER TABLE "caartrcp" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartrcp_seq'::regclass);



-----------------------------------------------------------------------------
-- caartreqser
-----------------------------------------------------------------------------


CREATE SEQUENCE "caartreqser_seq";


ALTER TABLE "caartreqser" DROP COLUMN ID;



ALTER TABLE "caartreqser" ADD COLUMN "id" INTEGER  NOT NULL DEFAULT nextval('caartreqser_seq'::regclass);



