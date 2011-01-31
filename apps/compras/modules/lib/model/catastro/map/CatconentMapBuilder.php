<?php



class CatconentMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatconentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catconent');
		$tMap->setPhpName('Catconent');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catconent_SEQ');

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 