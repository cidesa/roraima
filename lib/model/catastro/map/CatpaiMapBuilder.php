<?php



class CatpaiMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatpaiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catpai');
		$tMap->setPhpName('Catpai');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catpai_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPAI', 'Nompai', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 