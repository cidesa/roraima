<?php



class FordefpryaccactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefpryaccactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefpryaccact');
		$tMap->setPhpName('Fordefpryaccact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefpryaccact_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACCESP', 'Codaccesp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODUNIMED', 'Codunimed', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 