<?php



class FordeforggobMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordeforggobMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordeforggob');
		$tMap->setPhpName('Fordeforggob');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMORG', 'Nomorg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMGAC', 'Numgac', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ACTORG', 'Actorg', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONEST', 'Monest', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 