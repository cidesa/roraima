<?php



class CccorrelMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccorrelMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccorrel');
		$tMap->setPhpName('Cccorrel');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccorrel_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CORNUMSOL', 'Cornumsol', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORSOLLIQ', 'Corsolliq', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORCREDIT', 'Corcredit', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORSOLDES', 'Corsoldes', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CORPAG', 'Corpag', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 