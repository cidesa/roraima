<?php



class LisicactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LisicactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lisicact');
		$tMap->setPhpName('Lisicact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lisicact_SEQ');

		$tMap->addColumn('DESSICACT', 'Dessicact', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 