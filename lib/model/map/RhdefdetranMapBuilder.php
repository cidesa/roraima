<?php



class RhdefdetranMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhdefdetranMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhdefdetran');
		$tMap->setPhpName('Rhdefdetran');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhdefdetran_SEQ');

		$tMap->addColumn('CODRAN', 'Codran', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('VALRAN', 'Valran', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DESDET', 'Desdet', 'string', CreoleTypes::VARCHAR, true, 60);

		$tMap->addColumn('VALDES', 'Valdes', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('VALHAS', 'Valhas', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 