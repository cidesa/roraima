<?php



class NpuniejeMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpuniejeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npunieje');
		$tMap->setPhpName('Npunieje');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npunieje_SEQ');

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMUNI', 'Nomuni', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 