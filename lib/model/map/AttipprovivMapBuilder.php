<?php



class AttipprovivMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AttipprovivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('attipproviv');
		$tMap->setPhpName('Attipproviv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('attipproviv_SEQ');

		$tMap->addColumn('TIPPROVIV', 'Tipproviv', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 