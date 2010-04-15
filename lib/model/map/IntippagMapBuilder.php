<?php



class IntippagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IntippagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('intippag');
		$tMap->setPhpName('Intippag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('intippag_SEQ');

		$tMap->addColumn('CODTIPPAG', 'Codtippag', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPPAG', 'Destippag', 'string', CreoleTypes::VARCHAR, true, 200);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 