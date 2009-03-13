<?php



class NpniveduMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpniveduMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npnivedu');
		$tMap->setPhpName('Npnivedu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npnivedu_SEQ');

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESNIV', 'Desniv', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 