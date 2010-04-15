<?php



class FcdprinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdprinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdprinm');
		$tMap->setPhpName('Fcdprinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdprinm_SEQ');

		$tMap->addColumn('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ANTINM', 'Antinm', 'double', CreoleTypes::NUMERIC, true, null);

		$tMap->addColumn('CODESTINM', 'Codestinm', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('MONDPR', 'Mondpr', 'double', CreoleTypes::NUMERIC, true, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 