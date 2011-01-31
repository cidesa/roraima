<?php



class NpbancosMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpbancosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npbancos');
		$tMap->setPhpName('Npbancos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npbancos_SEQ');

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NOMBAN', 'Nomban', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 