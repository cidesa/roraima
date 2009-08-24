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

		$tMap->addColumn('CORCOM', 'Corcom', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORSER', 'Corser', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORSOL', 'Corsol', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORREQ', 'Correq', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORREC', 'Correc', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORDES', 'Cordes', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORCOT', 'Corcot', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORTRA', 'Cortra', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORENT', 'Corent', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORSAL', 'Corsal', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORPRO', 'Corpro', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addColumn('CORPAG', 'Corpag', 'int', CreoleTypes::INTEGER, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 