<?php



class Tabla52MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Tabla52MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tabla52');
		$tMap->setPhpName('Tabla52');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tabla52_SEQ');

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCAU', 'Feccau', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 