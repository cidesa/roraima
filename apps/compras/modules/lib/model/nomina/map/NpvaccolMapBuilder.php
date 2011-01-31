<?php



class NpvaccolMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvaccolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvaccol');
		$tMap->setPhpName('Npvaccol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvaccol_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DISDES', 'Disdes', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DISHAS', 'Dishas', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAVAC', 'Diavac', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('DIANHAB', 'Dianhab', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('STAREG', 'Stareg', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 