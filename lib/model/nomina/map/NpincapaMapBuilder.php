<?php



class NpincapaMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpincapaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npincapa');
		$tMap->setPhpName('Npincapa');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npincapa_SEQ');

		$tMap->addColumn('CODINC', 'Codinc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESINC', 'Desinc', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('OBSINC', 'Obsinc', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 