<?php



class CctipupsMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipupsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipups');
		$tMap->setPhpName('Cctipups');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipups_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPUPS', 'Nomtipups', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESTIPUPS', 'Destipups', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 