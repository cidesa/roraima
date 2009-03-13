<?php



class HisconbMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.HisconbMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hisconb');
		$tMap->setPhpName('Hisconb');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hisconb_SEQ');

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, true, 18);

		$tMap->addColumn('DESCTA', 'Descta', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('SALANT', 'Salant', 'double', CreoleTypes::NUMERIC, false, 12);

		$tMap->addColumn('DEBCRE', 'Debcre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CARGAB', 'Cargab', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('SALPRGPER', 'Salprgper', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALACUPER', 'Salacuper', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 