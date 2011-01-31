<?php



class NpsucbanMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpsucbanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npsucban');
		$tMap->setPhpName('Npsucban');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npsucban_SEQ');

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NOMBAN', 'Nomban', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODSUC', 'Codsuc', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 