<?php



class OctipsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octipsol');
		$tMap->setPhpName('Octipsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octipsol_SEQ');

		$tMap->addColumn('CODSOL', 'Codsol', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('TIPSOL', 'Tipsol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MAXDIA', 'Maxdia', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('STASOL', 'Stasol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 