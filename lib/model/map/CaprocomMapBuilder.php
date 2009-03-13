<?php



class CaprocomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaprocomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caprocom');
		$tMap->setPhpName('Caprocom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caprocom_SEQ');

		$tMap->addColumn('CODPROCOM', 'Codprocom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESPROCOM', 'Desprocom', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 