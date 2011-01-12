<?php



class OpsolpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OpsolpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('opsolpag');
		$tMap->setPhpName('Opsolpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('opsolpag_SEQ');

		$tMap->addColumn('REFSOL', 'Refsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, 'cpcompro', 'REFCOM', false, 8);

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONSOL', 'Monsol', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STASOL', 'Stasol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMBEN', 'Nomben', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NUMSOLCRE', 'Numsolcre', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMCRE', 'Numcre', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 