<?php



class NpcajahoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpcajahoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcajaho');
		$tMap->setPhpName('Npcajaho');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcajaho_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCONPAT', 'Codconpat', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCONTRA', 'Codcontra', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCONPRE', 'Codconpre', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCONAMO', 'Codconamo', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCONINT', 'Codconint', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 