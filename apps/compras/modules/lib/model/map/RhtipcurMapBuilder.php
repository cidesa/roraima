<?php



class RhtipcurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhtipcurMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhtipcur');
		$tMap->setPhpName('Rhtipcur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhtipcur_SEQ');

		$tMap->addColumn('CODTIPCUR', 'Codtipcur', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPCUR', 'Destipcur', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODARECUR', 'Codarecur', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 