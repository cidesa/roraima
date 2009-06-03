<?php



class CatcarterMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatcarterMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catcarter');
		$tMap->setPhpName('Catcarter');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catcarter_SEQ');

		$tMap->addColumn('TERTIP', 'Tertip', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('DESTER', 'Dester', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 