<?php



class CatnivcatMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatnivcatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catnivcat');
		$tMap->setPhpName('Catnivcat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catnivcat_SEQ');

		$tMap->addColumn('CATPAR', 'Catpar', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('LONNIV', 'Lonniv', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FORCODCAT', 'Forcodcat', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ESSECTOR', 'Essector', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 