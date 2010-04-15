<?php



class CptipobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CptipobrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cptipobr');
		$tMap->setPhpName('Cptipobr');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODTIPOBR', 'Codtipobr', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESTIPOBR', 'Destipobr', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 