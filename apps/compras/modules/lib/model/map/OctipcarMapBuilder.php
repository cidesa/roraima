<?php



class OctipcarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipcarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octipcar');
		$tMap->setPhpName('Octipcar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octipcar_SEQ');

		$tMap->addColumn('CODTIPCAR', 'Codtipcar', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPCAR', 'Destipcar', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 