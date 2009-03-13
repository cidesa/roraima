<?php



class NptipperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipper');
		$tMap->setPhpName('Nptipper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipper_SEQ');

		$tMap->addColumn('CODPER', 'Codper', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESPER', 'Desper', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 