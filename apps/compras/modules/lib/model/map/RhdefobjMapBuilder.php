<?php



class RhdefobjMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdefobjMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhdefobj');
		$tMap->setPhpName('Rhdefobj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhdefobj_SEQ');

		$tMap->addColumn('CODOBJ', 'Codobj', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESOBJ', 'Desobj', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 