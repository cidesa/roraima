<?php



class CacorrelMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CacorrelMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cacorrel');
		$tMap->setPhpName('Cacorrel');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cacorrel_SEQ');

		$tMap->addColumn('CORCOM', 'Corcom', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORSER', 'Corser', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORSOL', 'Corsol', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORREQ', 'Correq', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORREC', 'Correc', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORDES', 'Cordes', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORCOT', 'Corcot', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORTRA', 'Cortra', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORENT', 'Corent', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORSAL', 'Corsal', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORPRO', 'Corpro', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addColumn('CORPAG', 'Corpag', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 