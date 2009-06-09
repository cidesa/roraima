<?php



class NpcargoscolMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpcargoscolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcargoscol');
		$tMap->setPhpName('Npcargoscol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcargoscol_SEQ');

		$tMap->addColumn('CODCARCOL', 'Codcarcol', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('DESCARCOL', 'Descarcol', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PRIMA', 'Prima', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 