<?php



class CcestcivMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcestcivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccestciv');
		$tMap->setPhpName('Ccestciv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccestciv_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMESTCIV', 'Nomestciv', 'string', CreoleTypes::VARCHAR, false, 100);

	} 
} 