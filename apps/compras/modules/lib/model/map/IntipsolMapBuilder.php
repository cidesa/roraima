<?php



class IntipsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IntipsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('intipsol');
		$tMap->setPhpName('Intipsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('intipsol_SEQ');

		$tMap->addColumn('CODTIPSOL', 'Codtipsol', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPSOL', 'Destipsol', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 