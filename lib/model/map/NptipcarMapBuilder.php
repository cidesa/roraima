<?php



class NptipcarMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipcarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipcar');
		$tMap->setPhpName('Nptipcar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipcar_SEQ');

		$tMap->addColumn('CODTIPCAR', 'Codtipcar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPCAR', 'Destipcar', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 