<?php



class NptipcatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipcatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipcat');
		$tMap->setPhpName('Nptipcat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipcat_SEQ');

		$tMap->addColumn('CODTIPCAT', 'Codtipcat', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPCAT', 'Destipcat', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 