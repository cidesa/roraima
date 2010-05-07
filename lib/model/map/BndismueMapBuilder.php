<?php



class BndismueMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndismueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndismue');
		$tMap->setPhpName('Bndismue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndismue_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NRODISMUE', 'Nrodismue', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('MOTDISMUE', 'Motdismue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPDISMUE', 'Tipdismue', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECDISMUE', 'Fecdismue', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECDEVDIS', 'Fecdevdis', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONDISMUE', 'Mondismue', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DETDISMUE', 'Detdismue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODUBIORI', 'Codubiori', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODUBIDES', 'Codubides', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('OBSDISMUE', 'Obsdismue', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STADISMUE', 'Stadismue', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODMOT', 'Codmot', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('VIDUTIL', 'Vidutil', 'double', CreoleTypes::NUMERIC, false, 4);

		$tMap->addColumn('LOGUSU', 'Logusu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 