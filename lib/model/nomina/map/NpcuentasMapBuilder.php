<?php



class NpcuentasMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpcuentasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcuentas');
		$tMap->setPhpName('Npcuentas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcuentas_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 