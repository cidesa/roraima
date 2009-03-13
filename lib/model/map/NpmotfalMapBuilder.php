<?php



class NpmotfalMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpmotfalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmotfal');
		$tMap->setPhpName('Npmotfal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmotfal_SEQ');

		$tMap->addColumn('CODMOTFAL', 'Codmotfal', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESMOTFAL', 'Desmotfal', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CAUSA', 'Causa', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 