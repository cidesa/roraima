<?php



class FcrepfisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrepfisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcrepfis');
		$tMap->setPhpName('Fcrepfis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcrepfis_SEQ');

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('FECREP', 'Fecrep', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NUMREP', 'Numrep', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('MONREP', 'Monrep', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CONREP', 'Conrep', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MODO', 'Modo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONADI', 'Monadi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FUEREP', 'Fuerep', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FUESAN', 'Fuesan', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 