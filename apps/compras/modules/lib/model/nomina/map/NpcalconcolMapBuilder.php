<?php



class NpcalconcolMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpcalconcolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcalconcol');
		$tMap->setPhpName('Npcalconcol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcalconcol_SEQ');

		$tMap->addColumn('CODCTR', 'Codctr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CANTRA', 'Cantra', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addColumn('MONCLA', 'Moncla', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('TOTCLA', 'Totcla', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('BASCAL', 'Bascal', 'string', CreoleTypes::VARCHAR, true, 2500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 