<?php



class CaalmunisolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaalmunisolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caalmunisol');
		$tMap->setPhpName('Caalmunisol');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODUNISOL', 'Codunisol', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESUNISOL', 'Desunisol', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 