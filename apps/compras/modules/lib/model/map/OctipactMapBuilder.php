<?php



class OctipactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octipact');
		$tMap->setPhpName('Octipact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octipact_SEQ');

		$tMap->addColumn('CODTIPACT', 'Codtipact', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPACT', 'Destipact', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 