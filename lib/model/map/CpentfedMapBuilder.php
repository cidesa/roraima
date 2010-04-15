<?php



class CpentfedMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpentfedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpentfed');
		$tMap->setPhpName('Cpentfed');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODENT', 'Codent', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESENT', 'Desent', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('ASIENT', 'Asient', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DISENT', 'Disent', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 