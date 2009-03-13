<?php



class LitipsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LitipsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('litipsol');
		$tMap->setPhpName('Litipsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('litipsol_SEQ');

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TIPSOL', 'Tipsol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MAXDIA', 'Maxdia', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('STASOL', 'Stasol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 