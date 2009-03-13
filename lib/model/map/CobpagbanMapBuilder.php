<?php



class CobpagbanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobpagbanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cobpagban');
		$tMap->setPhpName('Cobpagban');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobpagban_SEQ');

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMBAN', 'Nomban', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRBAN', 'Dirban', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELBAN', 'Telban', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FAXBAN', 'Faxban', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('EMABAN', 'Emaban', 'string', CreoleTypes::VARCHAR, false, 40);

		$tMap->addColumn('CONBAN', 'Conban', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 