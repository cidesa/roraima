<?php



class NpcarracMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcarracMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcarrac');
		$tMap->setPhpName('Npcarrac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcarrac_SEQ');

		$tMap->addColumn('CODCARRAC', 'Codcarrac', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNIVORG', 'Codnivorg', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('SUELDO', 'Sueldo', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('DESCAR', 'Descar', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANCAR', 'Cancar', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 