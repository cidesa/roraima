<?php



class NpprimaprofesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpprimaprofesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npprimaprofes');
		$tMap->setPhpName('Npprimaprofes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npprimaprofes_SEQ');

		$tMap->addColumn('GRADO', 'Grado', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('PRIMA', 'Prima', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 