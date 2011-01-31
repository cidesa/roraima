<?php



class ForcormunMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForcormunMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forcormun');
		$tMap->setPhpName('Forcormun');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CORMUN', 'Cormun', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 