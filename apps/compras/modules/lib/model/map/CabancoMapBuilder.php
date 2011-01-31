<?php



class CabancoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CabancoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cabanco');
		$tMap->setPhpName('Cabanco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cabanco_SEQ');

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESBAN', 'Desban', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 