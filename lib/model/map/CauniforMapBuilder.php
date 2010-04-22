<?php



class CauniforMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CauniforMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caunifor');
		$tMap->setPhpName('Caunifor');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caunifor_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PREFIJ', 'Prefij', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CORUNI', 'Coruni', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 