<?php



class NpvacdefgenMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacdefgenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacdefgen');
		$tMap->setPhpName('Npvacdefgen');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacdefgen_SEQ');

		$tMap->addColumn('CODNOMVAC', 'Codnomvac', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCONVAC', 'Codconvac', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('PAGOAD', 'Pagoad', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCONCOM', 'Codconcom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCONUTI', 'Codconuti', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VACANT', 'Vacant', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 