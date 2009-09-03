<?php



class GiproanuMapBuilder {

	
	const CLASS_NAME = 'lib.model.gestionindicadores.map.GiproanuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('giproanu');
		$tMap->setPhpName('Giproanu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('giproanu_SEQ');

		$tMap->addColumn('NUMINDG', 'Numindg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('ANOINDG', 'Anoindg', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('REVANOINDG', 'Revanoindg', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NUMTRIM', 'Numtrim', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('PROGTRIM', 'Progtrim', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EJECTRIM', 'Ejectrim', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTTRIM', 'Esttrim', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECCIERRE', 'Feccierre', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 