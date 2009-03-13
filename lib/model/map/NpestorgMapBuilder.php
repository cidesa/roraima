<?php



class NpestorgMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpestorgMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npestorg');
		$tMap->setPhpName('Npestorg');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npestorg_SEQ');

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('DESNIV', 'Desniv', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('TELEXT', 'Telext', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 