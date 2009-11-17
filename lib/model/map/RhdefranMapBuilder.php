<?php



class RhdefranMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdefranMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhdefran');
		$tMap->setPhpName('Rhdefran');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhdefran_SEQ');

		$tMap->addColumn('CODRAN', 'Codran', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESRAN', 'Desran', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 