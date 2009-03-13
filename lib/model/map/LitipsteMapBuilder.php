<?php



class LitipsteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LitipsteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('litipste');
		$tMap->setPhpName('Litipste');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('litipste_SEQ');

		$tMap->addColumn('DESSTE', 'Desste', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 