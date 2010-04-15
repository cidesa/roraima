<?php



class OctipparMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipparMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octippar');
		$tMap->setPhpName('Octippar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octippar_SEQ');

		$tMap->addColumn('CODTIPPAR', 'Codtippar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPPAR', 'Destippar', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 