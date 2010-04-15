<?php



class BndepactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndepactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndepact');
		$tMap->setPhpName('Bndepact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndepact_SEQ');

		$tMap->addColumn('FECDEP', 'Fecdep', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONMUE', 'Monmue', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONINM', 'Moninm', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONSEM', 'Monsem', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 