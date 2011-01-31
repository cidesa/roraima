<?php



class OcregconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcregconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocregcon');
		$tMap->setPhpName('Ocregcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocregcon_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('TIPCON', 'Tipcon', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONEXT', 'Monext', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONMUL', 'Monmul', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONMOD', 'Monmod', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('FECLIC', 'Feclic', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECBUEPRO', 'Fecbuepro', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECPROINI', 'Fecproini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPAR', 'Fecpar', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREI', 'Fecrei', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECPRO', 'Fecpro', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECRECPROV', 'Fecrecprov', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECRECDEF', 'Fecrecdef', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PORIVA', 'Poriva', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONIVA', 'Moniva', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('TIEEJECON', 'Tieejecon', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('PLATIE', 'Platie', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECFINMOD', 'Fecfinmod', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('GASREE', 'Gasree', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SUBTOT', 'Subtot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONFUL', 'Monful', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DESPRE', 'Despre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 