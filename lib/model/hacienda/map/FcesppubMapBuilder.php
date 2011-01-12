<?php



class FcesppubMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcesppubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcesppub');
		$tMap->setPhpName('Fcesppub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcesppub_SEQ');

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('NOMESP', 'Nomesp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRESP', 'Diresp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECESP', 'Fecesp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORESP', 'Horesp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPESP', 'Tipesp', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('NROENT', 'Nroent', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONENT', 'Monent', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NOMRES', 'Nomres', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRRES', 'Dirres', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELRES', 'Telres', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STAESP', 'Staesp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STADEC', 'Stadec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 