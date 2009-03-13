<?php



class NpintfecrefMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpintfecrefMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npintfecref');
		$tMap->setPhpName('Npintfecref');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npintfecref_SEQ');

		$tMap->addColumn('FECINIREF', 'Feciniref', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFINREF', 'Fecfinref', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('TASINTPRO', 'Tasintpro', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addColumn('TASINTPAS', 'Tasintpas', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addColumn('TASINTACT', 'Tasintact', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 