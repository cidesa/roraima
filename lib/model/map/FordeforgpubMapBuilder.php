<?php



class FordeforgpubMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordeforgpubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordeforgpub');
		$tMap->setPhpName('Fordeforgpub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordeforgpub_SEQ');

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('NOMORG', 'Nomorg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMGAC', 'Numgac', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('UBIORG', 'Ubiorg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ACTORG', 'Actorg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPORG', 'Tiporg', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONEST', 'Monest', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PREANU', 'Preanu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAPSOC', 'Capsoc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 