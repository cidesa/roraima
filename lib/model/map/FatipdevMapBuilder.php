<?php



class FatipdevMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FatipdevMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fatipdev');
		$tMap->setPhpName('Fatipdev');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fatipdev_SEQ');

		$tMap->addColumn('NOMTIDEV', 'Nomtidev', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 