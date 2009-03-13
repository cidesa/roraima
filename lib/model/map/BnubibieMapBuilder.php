<?php



class BnubibieMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnubibieMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnubibie');
		$tMap->setPhpName('Bnubibie');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnubibie_SEQ');

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('DESUBI', 'Desubi', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STACOD', 'Stacod', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DIRUBI', 'Dirubi', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 