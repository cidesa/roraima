<?php



class CadefserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadefserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadefser');
		$tMap->setPhpName('Cadefser');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODSER', 'Codser', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NOMSER', 'Nomser', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 