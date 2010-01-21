<?php



class CcpartidMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcpartidMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccpartid');
		$tMap->setPhpName('Ccpartid');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccpartid_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODCON', 'Codcon', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 