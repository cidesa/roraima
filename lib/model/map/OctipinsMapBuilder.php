<?php



class OctipinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipinsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octipins');
		$tMap->setPhpName('Octipins');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octipins_SEQ');

		$tMap->addColumn('CODTIPINS', 'Codtipins', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPINS', 'Destipins', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 