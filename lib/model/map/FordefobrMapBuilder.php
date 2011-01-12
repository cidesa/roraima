<?php



class FordefobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefobrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefobr');
		$tMap->setPhpName('Fordefobr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefobr_SEQ');

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('NOMOBR', 'Nomobr', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addColumn('CODPAREGR', 'Codparegr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('OBSOBR', 'Obsobr', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 