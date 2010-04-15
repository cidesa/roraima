<?php



class CpestablecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpestablecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpestablec');
		$tMap->setPhpName('Cpestablec');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODENT', 'Codent', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('HOSAMB', 'Hosamb', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('TIPEST', 'Tipest', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DIREST', 'Direst', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DESEST', 'Desest', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('URBRUR', 'Urbrur', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPRUR', 'Tiprur', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NROCAM', 'Nrocam', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ATEFIR', 'Atefir', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 