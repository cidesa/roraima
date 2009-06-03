<?php



class CatdivgeoMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatdivgeoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catdivgeo');
		$tMap->setPhpName('Catdivgeo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catdivgeo_SEQ');

		$tMap->addColumn('CODDIVGEO', 'Coddivgeo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESDIVGEO', 'Desdivgeo', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 