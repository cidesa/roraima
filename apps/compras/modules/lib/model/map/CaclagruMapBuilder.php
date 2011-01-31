<?php



class CaclagruMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaclagruMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caclagru');
		$tMap->setPhpName('Caclagru');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caclagru_SEQ');

		$tMap->addColumn('CODGRU', 'Codgru', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODINS', 'Codins', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 