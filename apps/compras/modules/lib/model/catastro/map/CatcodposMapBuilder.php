<?php



class CatcodposMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatcodposMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catcodpos');
		$tMap->setPhpName('Catcodpos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catcodpos_SEQ');

		$tMap->addColumn('DESPOS', 'Despos', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 