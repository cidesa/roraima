<?php



class IningprofMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IningprofMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('iningprof');
		$tMap->setPhpName('Iningprof');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('iningprof_SEQ');

		$tMap->addForeignKey('INTIPSOL_ID', 'IntipsolId', 'int', CreoleTypes::INTEGER, 'intipsol', 'ID', false, null);

		$tMap->addColumn('CODINGPROF', 'Codingprof', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESINGPROF', 'Desingprof', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 