<?php



class OptipbenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OptipbenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('optipben');
		$tMap->setPhpName('Optipben');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('optipben_SEQ');

		$tMap->addColumn('CODTIPBEN', 'Codtipben', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPBEN', 'Destipben', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 