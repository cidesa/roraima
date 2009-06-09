<?php



class NpdepcajahoMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdepcajahoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdepcajaho');
		$tMap->setPhpName('Npdepcajaho');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdepcajaho_SEQ');

		$tMap->addColumn('NUMLIN', 'Numlin', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESDEP', 'Desdep', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 