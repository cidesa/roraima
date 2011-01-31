<?php



class CatproterMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatproterMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catproter');
		$tMap->setPhpName('Catproter');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catproter_SEQ');

		$tMap->addColumn('DESCATPROTER', 'Descatproter', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 