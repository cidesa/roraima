<?php



class CatestMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatestMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catest');
		$tMap->setPhpName('Catest');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catest_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMEST', 'Nomest', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 