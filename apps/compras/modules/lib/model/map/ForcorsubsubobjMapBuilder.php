<?php



class ForcorsubsubobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForcorsubsubobjMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forcorsubsubobj');
		$tMap->setPhpName('Forcorsubsubobj');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CODSUBOBJ', 'Codsubobj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CORSUBSUBOBJ', 'Corsubsubobj', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 