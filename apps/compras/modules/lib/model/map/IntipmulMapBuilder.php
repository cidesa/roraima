<?php



class IntipmulMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IntipmulMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('intipmul');
		$tMap->setPhpName('Intipmul');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('intipmul_SEQ');

		$tMap->addColumn('CODTIPMUL', 'Codtipmul', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPMUL', 'Destipmul', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 