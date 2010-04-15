<?php



class BndepactdetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndepactdetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndepactdet');
		$tMap->setPhpName('Bndepactdet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndepactdet_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('FECDEP', 'Fecdep', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DEPMUE', 'Depmue', 'double', CreoleTypes::NUMERIC, true, 18);

		$tMap->addColumn('DEPACU', 'Depacu', 'double', CreoleTypes::NUMERIC, true, 18);

		$tMap->addColumn('VALLIB', 'Vallib', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 