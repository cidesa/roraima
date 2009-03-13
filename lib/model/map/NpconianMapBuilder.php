<?php



class NpconianMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpconianMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npconian');
		$tMap->setPhpName('Npconian');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npconian_SEQ');

		$tMap->addColumn('CONIAN', 'Conian', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CONCID', 'Concid', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 