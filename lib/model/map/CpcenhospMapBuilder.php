<?php



class CpcenhospMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpcenhospMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpcenhosp');
		$tMap->setPhpName('Cpcenhosp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESCEN', 'Descen', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 