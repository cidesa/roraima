<?php



class CatipempsncMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CatipempsncMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catipempsnc');
		$tMap->setPhpName('Catipempsnc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catipempsnc_SEQ');

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 