<?php



class OptipretMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OptipretMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('optipret');
		$tMap->setPhpName('Optipret');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('optipret_SEQ');

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('BASIMP', 'Basimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORRET', 'Porret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('UNITRI', 'Unitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORSUS', 'Porsus', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FACTOR', 'Factor', 'double', CreoleTypes::NUMERIC, false, 16);

		$tMap->addColumn('CODTIPSEN', 'Codtipsen', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('MBASMI', 'Mbasmi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 