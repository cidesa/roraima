<?php



class CpestformMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpestformMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpestform');
		$tMap->setPhpName('Cpestform');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NOMPRE', 'Nompre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ANOMES', 'Anomes', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('ESTIMADO', 'Estimado', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REAL', 'Real', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIFERENCIA', 'Diferencia', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORC', 'Porc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ESTIMADO2', 'Estimado2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REAL2', 'Real2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIFERENCIA2', 'Diferencia2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORC2', 'Porc2', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PERPRE', 'Perpre', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 