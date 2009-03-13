<?php



class TsasifteMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsasifteMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsasifte');
		$tMap->setPhpName('Tsasifte');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsasifte_SEQ');

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODTIPFTE', 'Codtipfte', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 