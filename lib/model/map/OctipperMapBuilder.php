<?php



class OctipperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octipper');
		$tMap->setPhpName('Octipper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octipper_SEQ');

		$tMap->addColumn('CODTIPPER', 'Codtipper', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPPER', 'Destipper', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 