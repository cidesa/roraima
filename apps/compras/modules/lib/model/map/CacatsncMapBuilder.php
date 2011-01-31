<?php



class CacatsncMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CacatsncMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cacatsnc');
		$tMap->setPhpName('Cacatsnc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cacatsnc_SEQ');

		$tMap->addColumn('CODSNC', 'Codsnc', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESSNC', 'Dessnc', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 