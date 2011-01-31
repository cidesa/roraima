<?php



class NpintfecrefdanielMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpintfecrefdanielMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npintfecrefdaniel');
		$tMap->setPhpName('Npintfecrefdaniel');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npintfecrefdaniel_SEQ');

		$tMap->addColumn('FECINIREF', 'Feciniref', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFINREF', 'Fecfinref', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('TASINTPRO', 'Tasintpro', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addColumn('TASINTPAS', 'Tasintpas', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addColumn('TASINTACT', 'Tasintact', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 