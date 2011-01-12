<?php



class CcpregunMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcpregunMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccpregun');
		$tMap->setPhpName('Ccpregun');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccpregun_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('PREGUN', 'Pregun', 'string', CreoleTypes::VARCHAR, false, 150);

	} 
} 