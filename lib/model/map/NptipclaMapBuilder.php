<?php



class NptipclaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipclaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipcla');
		$tMap->setPhpName('Nptipcla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipcla_SEQ');

		$tMap->addColumn('CODTIPCLA', 'Codtipcla', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESTIPCLA', 'Destipcla', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 