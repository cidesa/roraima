<?php



class FccominmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FccominmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fccominm');
		$tMap->setPhpName('Fccominm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fccominm_SEQ');

		$tMap->addColumn('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESCOM', 'Descom', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('AFEINM', 'Afeinm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OPECOM', 'Opecom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('VALCOM', 'Valcom', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 