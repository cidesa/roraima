<?php



class CsdefforMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CsdefforMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('csdeffor');
		$tMap->setPhpName('Csdeffor');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODFOR', 'Codfor', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMFOR', 'Nomfor', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 