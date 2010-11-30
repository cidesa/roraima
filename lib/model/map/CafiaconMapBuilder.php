<?php



class CafiaconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CafiaconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cafiacon');
		$tMap->setPhpName('Cafiacon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cafiacon_SEQ');

		$tMap->addColumn('ORDCON', 'Ordcon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECFIA', 'Fecfia', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('INSFIN', 'Insfin', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPFIA', 'Tipfia', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMFIA', 'Numfia', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MONFIA', 'Monfia', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 