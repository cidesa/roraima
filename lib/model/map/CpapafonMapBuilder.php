<?php



class CpapafonMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpapafonMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpapafon');
		$tMap->setPhpName('Cpapafon');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFAPA', 'Refapa', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPAPA', 'Tipapa', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('FECAPA', 'Fecapa', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOAPA', 'Anoapa', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESAPA', 'Desapa', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONAPA', 'Monapa', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALCOM', 'Salcom', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALCAU', 'Salcau', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALPAG', 'Salpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALAJU', 'Salaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAAPA', 'Staapa', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('ESTCIE', 'Estcie', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONCIE', 'Moncie', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 