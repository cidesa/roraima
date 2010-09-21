<?php



class FcconpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcconpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcconpag');
		$tMap->setPhpName('Fcconpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcconpag_SEQ');

		$tMap->addColumn('REFCON', 'Refcon', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ESTCON', 'Estcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('OBSCON', 'Obscon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONCUO', 'Moncuo', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('TOTCUO', 'Totcuo', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('PORINI', 'Porini', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONINI', 'Monini', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('PORFIN', 'Porfin', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONFIN', 'Monfin', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DATCED', 'Datced', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('DATNAC', 'Datnac', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('DATNOM', 'Datnom', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DATDIR', 'Datdir', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('DATTEL', 'Dattel', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('DATCAR', 'Datcar', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('DATREG', 'Datreg', 'string', CreoleTypes::VARCHAR, false, 300);

		$tMap->addColumn('DATCON', 'Datcon', 'string', CreoleTypes::VARCHAR, false, 300);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 