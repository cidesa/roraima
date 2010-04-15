<?php



class OctipobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipobrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octipobr');
		$tMap->setPhpName('Octipobr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octipobr_SEQ');

		$tMap->addColumn('CODTIPOBR', 'Codtipobr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPOBR', 'Destipobr', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 