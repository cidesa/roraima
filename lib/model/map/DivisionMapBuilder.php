<?php



class DivisionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DivisionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('division');
		$tMap->setPhpName('Division');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('division_SEQ');

		$tMap->addColumn('CODDIV', 'Coddiv', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESDIV', 'Desdiv', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 