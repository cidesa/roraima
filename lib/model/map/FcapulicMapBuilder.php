<?php



class FcapulicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcapulicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcapulic');
		$tMap->setPhpName('Fcapulic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcapulic_SEQ');

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('TIPAPU', 'Tipapu', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DESAPU', 'Desapu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRAPU', 'Dirapu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONAPU', 'Monapu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('STAAPU', 'Staapu', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('STADEC', 'Stadec', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('SEMDIA', 'Semdia', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('EXOAPU', 'Exoapu', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TEXEXO', 'Texexo', 'string', CreoleTypes::VARCHAR, false, 300);

		$tMap->addColumn('FECAPU', 'Fecapu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SERAPUI', 'Serapui', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('SERAPUF', 'Serapuf', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('HORAPU', 'Horapu', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 