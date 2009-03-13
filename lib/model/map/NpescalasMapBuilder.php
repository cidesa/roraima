<?php



class NpescalasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpescalasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npescalas');
		$tMap->setPhpName('Npescalas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npescalas_SEQ');

		$tMap->addColumn('GRADO', 'Grado', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PASO', 'Paso', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('SALARIO', 'Salario', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 