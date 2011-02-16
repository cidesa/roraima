<?php



class LiptocueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiptocueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liptocue');
		$tMap->setPhpName('Liptocue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liptocue_SEQ');

		$tMap->addColumn('NUMPTOCUE', 'Numptocue', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODLIC', 'Codlic', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 