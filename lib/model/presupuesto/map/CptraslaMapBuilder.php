<?php



class CptraslaMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CptraslaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cptrasla');
		$tMap->setPhpName('Cptrasla');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cptrasla_SEQ');

		$tMap->addColumn('REFTRA', 'Reftra', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOTRA', 'Anotra', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('PERTRA', 'Pertra', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESTRA', 'Destra', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TOTTRA', 'Tottra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STATRA', 'Statra', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NRODEC', 'Nrodec', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
