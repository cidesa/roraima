<?php



class FordeftipcnxMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordeftipcnxMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordeftipcnx');
		$tMap->setPhpName('Fordeftipcnx');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordeftipcnx_SEQ');

		$tMap->addColumn('CODTIPCNX', 'Codtipcnx', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPCNX', 'Destipcnx', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 