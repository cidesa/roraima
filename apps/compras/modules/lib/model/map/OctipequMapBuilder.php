<?php



class OctipequMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctipequMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octipequ');
		$tMap->setPhpName('Octipequ');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octipequ_SEQ');

		$tMap->addColumn('CODTIPEQU', 'Codtipequ', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPEQU', 'Destipequ', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 