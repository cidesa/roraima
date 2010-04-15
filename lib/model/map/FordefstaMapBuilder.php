<?php



class FordefstaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefstaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefsta');
		$tMap->setPhpName('Fordefsta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefsta_SEQ');

		$tMap->addColumn('CODSTA', 'Codsta', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESSTA', 'Dessta', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 