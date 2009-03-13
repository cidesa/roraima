<?php



class NpempvacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpempvacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npempvac');
		$tMap->setPhpName('Npempvac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npempvac_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CAUDES', 'Caudes', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CAUHAS', 'Cauhas', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('BONVAC', 'Bonvac', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('VACACI', 'Vacaci', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 