<?php



class CobreggesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobreggesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cobregges');
		$tMap->setPhpName('Cobregges');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobregges_SEQ');

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMGES', 'Numges', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECGES', 'Fecges', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OBSGES', 'Obsges', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 