<?php



class CatrutMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatrutMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catrut');
		$tMap->setPhpName('Catrut');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catrut_SEQ');

		$tMap->addColumn('DESRUT', 'Desrut', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 