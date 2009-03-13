<?php



class FaconpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaconpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faconpag');
		$tMap->setPhpName('Faconpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faconpag_SEQ');

		$tMap->addColumn('DESCONPAG', 'Desconpag', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('TIPCONPAG', 'Tipconpag', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('NUMDIA', 'Numdia', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('GENERAOP', 'Generaop', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ASIPARREC', 'Asiparrec', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('GENERACOM', 'Generacom', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MERCON', 'Mercon', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CTADEV', 'Ctadev', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CTAVCO', 'Ctavco', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('UNIVTA', 'Univta', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 