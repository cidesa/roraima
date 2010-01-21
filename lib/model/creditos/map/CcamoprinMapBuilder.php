<?php



class CcamoprinMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcamoprinMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccamoprin');
		$tMap->setPhpName('Ccamoprin');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccamoprin_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CAPINI', 'Capini', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONINT', 'Monint', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('MONPRI', 'Monpri', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('MONSALCAP', 'Monsalcap', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCAMOACT_ID', 'CcamoactId', 'int', CreoleTypes::INTEGER, 'ccamoact', 'ID', true, null);

		$tMap->addForeignKey('CCDEFAMO_ID', 'CcdefamoId', 'int', CreoleTypes::INTEGER, 'ccdefamo', 'ID', true, null);

	} 
} 