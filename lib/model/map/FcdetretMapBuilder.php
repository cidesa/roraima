<?php



class FcdetretMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdetretMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdetret');
		$tMap->setPhpName('Fcdetret');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdetret_SEQ');

		$tMap->addColumn('NUMRET', 'Numret', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMREF', 'Numref', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONABO', 'Monabo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDEU', 'Mondeu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 