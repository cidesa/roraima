<?php



class AttrasocMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AttrasocMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('attrasoc');
		$tMap->setPhpName('Attrasoc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('attrasoc_SEQ');

		$tMap->addColumn('CEDTRA', 'Cedtra', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('NOMTRA', 'Nomtra', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('APETRA', 'Apetra', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NROCOL', 'Nrocol', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 