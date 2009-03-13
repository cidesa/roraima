<?php



class CpsitgenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpsitgenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpsitgen');
		$tMap->setPhpName('Cpsitgen');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('MESSIT', 'Messit', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECSIT', 'Fecsit', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('EXPSIT', 'Expsit', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('PROSIT', 'Prosit', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 