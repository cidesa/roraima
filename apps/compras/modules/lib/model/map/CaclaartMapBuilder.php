<?php



class CaclaartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaclaartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caclaart');
		$tMap->setPhpName('Caclaart');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCLAART', 'Codclaart', 'double', CreoleTypes::NUMERIC, true, 4);

		$tMap->addColumn('CLASIFICACION', 'Clasificacion', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 