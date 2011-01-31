<?php



class NpcarpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpcarpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcarpre');
		$tMap->setPhpName('Npcarpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcarpre_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CANPRE', 'Canpre', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANHPRE', 'Canhpre', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANMPRE', 'Canmpre', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANASI', 'Canasi', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANHOM', 'Canhom', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANMUJ', 'Canmuj', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANVAC', 'Canvac', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANHVAC', 'Canhvac', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('CANMVAC', 'Canmvac', 'double', CreoleTypes::NUMERIC, true, 6);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, true, 17);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, true, 17);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
