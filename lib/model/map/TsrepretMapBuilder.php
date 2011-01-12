<?php



class TsrepretMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsrepretMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsrepret');
		$tMap->setPhpName('Tsrepret');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsrepret_SEQ');

		$tMap->addColumn('CODREP', 'Codrep', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addForeignKey('CODRET', 'Codret', 'string', CreoleTypes::VARCHAR, 'optipret', 'CODTIP', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 