<?php



class LianaofefinMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LianaofefinMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lianaofefin');
		$tMap->setPhpName('Lianaofefin');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lianaofefin_SEQ');

		$tMap->addColumn('NUMANAOFE', 'Numanaofe', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODCRI', 'Codcri', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PUNEMP', 'Punemp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('POREMP', 'Poremp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 