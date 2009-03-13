<?php



class FctiplicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FctiplicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fctiplic');
		$tMap->setPhpName('Fctiplic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fctiplic_SEQ');

		$tMap->addColumn('CODTIPLIC', 'Codtiplic', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESTIPLIC', 'Destiplic', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 