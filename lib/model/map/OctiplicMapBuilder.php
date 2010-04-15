<?php



class OctiplicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OctiplicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('octiplic');
		$tMap->setPhpName('Octiplic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('octiplic_SEQ');

		$tMap->addColumn('CODTIPLIC', 'Codtiplic', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPLIC', 'Destiplic', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 