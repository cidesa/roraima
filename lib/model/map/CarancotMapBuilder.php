<?php



class CarancotMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CarancotMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('carancot');
		$tMap->setPhpName('Carancot');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('carancot_SEQ');

		$tMap->addColumn('CANDES', 'Candes', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CANHAS', 'Canhas', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CANCOT', 'Cancot', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('NRORAN', 'Nroran', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 