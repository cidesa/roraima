<?php



class FafaclibMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FafaclibMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fafaclib');
		$tMap->setPhpName('Fafaclib');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fafaclib_SEQ');

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMCTR', 'Numctr', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('TOTFAC', 'Totfac', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('VALFOB', 'Valfob', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('VENEXEC', 'Venexec', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('VENEXON', 'Venexon', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('BASIMP', 'Basimp', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('PORIVA', 'Poriva', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('CREFIS', 'Crefis', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('MONIVA', 'Moniva', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 