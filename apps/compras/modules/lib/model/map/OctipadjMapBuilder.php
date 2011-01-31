<?php



class OctipadjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipadjMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octipadj');
		$tMap->setPhpName('Octipadj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octipadj_SEQ');

		$tMap->addColumn('CODTIPADJ', 'Codtipadj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPADJ', 'Destipadj', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 