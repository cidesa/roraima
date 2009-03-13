<?php



class NpcalvacMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcalvacMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcalvac');
		$tMap->setPhpName('Npcalvac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcalvac_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CAUDES', 'Caudes', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CAUHAS', 'Cauhas', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DISDES', 'Disdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DISHAS', 'Dishas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREI', 'Fecrei', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAVAC', 'Diavac', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('DIANHAB', 'Dianhab', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('DIAANT', 'Diaant', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('DIAPAG', 'Diapag', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('DIADIS', 'Diadis', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('DIABON', 'Diabon', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('MONVAC', 'Monvac', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONBON', 'Monbon', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('STAPAG', 'Stapag', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 