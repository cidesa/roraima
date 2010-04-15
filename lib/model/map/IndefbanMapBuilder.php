<?php



class IndefbanMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IndefbanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('indefban');
		$tMap->setPhpName('Indefban');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('indefban_SEQ');

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESBAN', 'Desban', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 