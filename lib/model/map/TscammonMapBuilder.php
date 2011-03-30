<?php



class TscammonMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TscammonMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tscammon');
		$tMap->setPhpName('Tscammon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tscammon_SEQ');

		$tMap->addColumn('CODMON', 'Codmon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, true, 12);

		$tMap->addColumn('FECMON', 'Fecmon', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 