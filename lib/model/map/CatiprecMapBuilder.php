<?php



class CatiprecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CatiprecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catiprec');
		$tMap->setPhpName('Catiprec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catiprec_SEQ');

		$tMap->addColumn('CODTIPREC', 'Codtiprec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPREC', 'Destiprec', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 