<?php



class FormetdisperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FormetdisperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('formetdisper');
		$tMap->setPhpName('Formetdisper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('formetdisper_SEQ');

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('PERMET', 'Permet', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('CANMET', 'Canmet', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
