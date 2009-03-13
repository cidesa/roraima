<?php



class AtinsrefierMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtinsrefierMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atinsrefier');
		$tMap->setPhpName('Atinsrefier');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atinsrefier_SEQ');

		$tMap->addColumn('DESINSREF', 'Desinsref', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 