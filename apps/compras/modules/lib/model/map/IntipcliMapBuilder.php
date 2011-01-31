<?php



class IntipcliMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IntipcliMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('intipcli');
		$tMap->setPhpName('Intipcli');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('intipcli_SEQ');

		$tMap->addColumn('CODTIPCLI', 'Codtipcli', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPCLI', 'Destipcli', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 