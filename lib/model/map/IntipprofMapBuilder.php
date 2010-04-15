<?php



class IntipprofMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IntipprofMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('intipprof');
		$tMap->setPhpName('Intipprof');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('intipprof_SEQ');

		$tMap->addColumn('CODTIPPROF', 'Codtipprof', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPPROF', 'Destipprof', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 