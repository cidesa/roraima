<?php



class FabancosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FabancosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fabancos');
		$tMap->setPhpName('Fabancos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fabancos_SEQ');

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMBAN', 'Nomban', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 