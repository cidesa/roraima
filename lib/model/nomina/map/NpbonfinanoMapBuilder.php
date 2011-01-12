<?php



class NpbonfinanoMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpbonfinanoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npbonfinano');
		$tMap->setPhpName('Npbonfinano');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npbonfinano_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESDE', 'Desde', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addColumn('HASTA', 'Hasta', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addColumn('DIAS', 'Dias', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 