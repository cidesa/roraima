<?php



class CadevdphMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadevdphMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadevdph');
		$tMap->setPhpName('Cadevdph');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('DEVDPH', 'Devdph', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECDEV', 'Fecdev', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DPHART', 'Dphart', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('DESDEV', 'Desdev', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONDEV', 'Mondev', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STADEV', 'Stadev', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 