<?php



class OpdisfueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpdisfueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opdisfue');
		$tMap->setPhpName('Opdisfue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opdisfue_SEQ');

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('FUEFIN', 'Fuefin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('MONFUE', 'Monfue', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CORREL', 'Correl', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('ORIGEN', 'Origen', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 