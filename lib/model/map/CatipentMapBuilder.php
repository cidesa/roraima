<?php



class CatipentMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CatipentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catipent');
		$tMap->setPhpName('Catipent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catipent_SEQ');

		$tMap->addColumn('CODTIPENT', 'Codtipent', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPENT', 'Destipent', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 