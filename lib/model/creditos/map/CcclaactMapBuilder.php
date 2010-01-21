<?php



class CcclaactMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcclaactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccclaact');
		$tMap->setPhpName('Ccclaact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccclaact_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCLAACT', 'Nomclaact', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESCLAACT', 'Desclaact', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 