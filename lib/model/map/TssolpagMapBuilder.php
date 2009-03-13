<?php



class TssolpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TssolpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tssolpag');
		$tMap->setPhpName('Tssolpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tssolpag_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NUMAEP', 'Numaep', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMOPP', 'Numopp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('MONSOL', 'Monsol', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CEDSOL', 'Cedsol', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMSOL', 'Nomsol', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 