<?php



class BnsegmueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnsegmueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnsegmue');
		$tMap->setPhpName('Bnsegmue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnsegmue_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NROSEGMUE', 'Nrosegmue', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('FECSEGMUE', 'Fecsegmue', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMSEGMUE', 'Nomsegmue', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('COBSEGMUE', 'Cobsegmue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MONSEGMUE', 'Monsegmue', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECSEGVEN', 'Fecsegven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PROSEGMUE', 'Prosegmue', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('OBSSEGMUE', 'Obssegmue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STASEGMUE', 'Stasegmue', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 