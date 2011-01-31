<?php



class CatbarurbMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatbarurbMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catbarurb');
		$tMap->setPhpName('Catbarurb');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catbarurb_SEQ');

		$tMap->addForeignKey('CATDIVGEO_ID', 'CatdivgeoId', 'int', CreoleTypes::INTEGER, 'catdivgeo', 'ID', false, null);

		$tMap->addColumn('NOMBARURB', 'Nombarurb', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ALIBARURB', 'Alibarurb', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 