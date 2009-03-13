<?php



class Fcreginm1MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Fcreginm1MapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('fcreginm1');
		$tMap->setPhpName('Fcreginm1');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcreginm1_SEQ');

		$tMap->addColumn('SERIAL', 'Serial', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPO_BOLET', 'TipoBolet', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NOMBRE_PRO', 'NombrePro', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CI_RIF_PRO', 'CiRifPro', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DIR_INMUEB', 'DirInmueb', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELEFONO', 'Telefono', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELEFONO2', 'Telefono2', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NOMB_AD_EC', 'NombAdEc', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('DIR_ADM_EN', 'DirAdmEn', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('N_DOCUMENT', 'NDocument', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECHA_DOCU', 'FechaDocu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('USO_INMUEB', 'UsoInmueb', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TENENCIA', 'Tenencia', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('AREA', 'Area', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('AREA2', 'Area2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('UBICACION', 'Ubicacion', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('UBICACION2', 'Ubicacion2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPO2', 'Tipo2', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('IMP_ANUAL', 'ImpAnual', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IMP_ANUAL2', 'ImpAnual2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IMP_TRIM', 'ImpTrim', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('IMP_TRIM2', 'ImpTrim2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONT_IMP', 'MontImp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSERVACIO', 'Observacio', 'string', CreoleTypes::VARCHAR, false, 110);

		$tMap->addColumn('COD_CATAST', 'CodCatast', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECHA_ELAB', 'FechaElab', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('UBI_INMUEB', 'UbiInmueb', 'string', CreoleTypes::VARCHAR, false, 110);

		$tMap->addColumn('NORTE', 'Norte', 'string', CreoleTypes::VARCHAR, false, 80);

		$tMap->addColumn('SUR', 'Sur', 'string', CreoleTypes::VARCHAR, false, 80);

		$tMap->addColumn('ESTE', 'Este', 'string', CreoleTypes::VARCHAR, false, 80);

		$tMap->addColumn('OESTE', 'Oeste', 'string', CreoleTypes::VARCHAR, false, 80);

		$tMap->addColumn('ADQUIERE', 'Adquiere', 'string', CreoleTypes::VARCHAR, false, 110);

		$tMap->addColumn('F_INSCRIPC', 'FInscripc', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FOLIOS', 'Folios', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TOMO', 'Tomo', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('TRIM', 'Trim', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('PROT', 'Prot', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FRENTE', 'Frente', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FONDO', 'Fondo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PRECIO', 'Precio', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIR_PROPIE', 'DirPropie', 'string', CreoleTypes::VARCHAR, false, 110);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 