<?php



class NptipnivMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipnivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipniv');
		$tMap->setPhpName('Nptipniv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipniv_SEQ');

		$tMap->addColumn('CODTIPNIV', 'Codtipniv', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MAXSUE', 'Maxsue', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('MEDSUE', 'Medsue', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('MINSUE', 'Minsue', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('CODTIPCLA', 'Codtipcla', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 