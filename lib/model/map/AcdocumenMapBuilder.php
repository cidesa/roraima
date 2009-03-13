<?php



class AcdocumenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AcdocumenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('acdocumen');
		$tMap->setPhpName('Acdocumen');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('DOCATE', 'Docate', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPDOC', 'Tipdoc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ASUDOC', 'Asudoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECDOC', 'Fecdoc', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('STADOC', 'Stadoc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMARC', 'Nomarc', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CONTENT', 'Content', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 