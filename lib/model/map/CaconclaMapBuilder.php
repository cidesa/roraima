<?php



class CaconclaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaconclaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caconcla');
		$tMap->setPhpName('Caconcla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caconcla_SEQ');

		$tMap->addColumn('ORDCON', 'Ordcon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESCLA', 'Descla', 'string', CreoleTypes::VARCHAR, false, 3000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 