<?php



class RhdefindMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdefindMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhdefind');
		$tMap->setPhpName('Rhdefind');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhdefind_SEQ');

		$tMap->addColumn('CODIND', 'Codind', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESIND', 'Desind', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPIND', 'Tipind', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 