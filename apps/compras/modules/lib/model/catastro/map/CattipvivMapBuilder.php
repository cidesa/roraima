<?php



class CattipvivMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CattipvivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cattipviv');
		$tMap->setPhpName('Cattipviv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cattipviv_SEQ');

		$tMap->addColumn('DESTIPVIV', 'Destipviv', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 