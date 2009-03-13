<?php



class FcmodapuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcmodapuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcmodapu');
		$tMap->setPhpName('Fcmodapu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcmodapu_SEQ');

		$tMap->addColumn('REFMOD', 'Refmod', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECMOD', 'Fecmod', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TIPAPU', 'Tipapu', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESAPU', 'Desapu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONAPU', 'Monapu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPAPUANT', 'Tipapuant', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESAPUANT', 'Desapuant', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONAPUANT', 'Monapuant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONIMPANT', 'Monimpant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 