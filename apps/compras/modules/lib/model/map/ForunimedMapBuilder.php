<?php



class ForunimedMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForunimedMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forunimed');
		$tMap->setPhpName('Forunimed');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forunimed_SEQ');

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 