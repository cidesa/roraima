<?php



class FcmodespMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcmodespMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcmodesp');
		$tMap->setPhpName('Fcmodesp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcmodesp_SEQ');

		$tMap->addColumn('REFMOD', 'Refmod', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECMOD', 'Fecmod', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NOMESP', 'Nomesp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRESP', 'Diresp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECESP', 'Fecesp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORESP', 'Horesp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPESP', 'Tipesp', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NROENT', 'Nroent', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONENT', 'Monent', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NOMRES', 'Nomres', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRRES', 'Dirres', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELRES', 'Telres', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NOMESPANT', 'Nomespant', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRESPANT', 'Direspant', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECESPANT', 'Fecespant', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORESPANT', 'Horespant', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPESPANT', 'Tipespant', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NROENTANT', 'Nroentant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONENTANT', 'Monentant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONIMPANT', 'Monimpant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NOMRESANT', 'Nomresant', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRRESANT', 'Dirresant', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELRESANT', 'Telresant', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 