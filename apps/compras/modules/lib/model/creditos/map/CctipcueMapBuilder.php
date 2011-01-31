<?php



class CctipcueMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipcueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipcue');
		$tMap->setPhpName('Cctipcue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipcue_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPCUE', 'Nomtipcue', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 