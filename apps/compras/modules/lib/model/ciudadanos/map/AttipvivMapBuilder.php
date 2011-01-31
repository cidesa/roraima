<?php



class AttipvivMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AttipvivMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('attipviv');
		$tMap->setPhpName('Attipviv');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('attipviv_SEQ');

		$tMap->addColumn('TIPVIV', 'Tipviv', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 