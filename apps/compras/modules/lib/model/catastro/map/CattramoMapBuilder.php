<?php



class CattramoMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CattramoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cattramo');
		$tMap->setPhpName('Cattramo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cattramo_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CATDIVGEO_ID', 'CatdivgeoId', 'int', CreoleTypes::INTEGER, 'catdivgeo', 'ID', false, null);

		$tMap->addColumn('NOMTRAMO', 'Nomtramo', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('ALITRAMO', 'Alitramo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addForeignKey('CATTIPVIA_ID', 'CattipviaId', 'int', CreoleTypes::INTEGER, 'cattipvia', 'ID', false, null);

		$tMap->addForeignKey('CATSENVIA_ID', 'CatsenviaId', 'int', CreoleTypes::INTEGER, 'catsenvia', 'ID', false, null);

		$tMap->addForeignKey('CATDIRVIA_ID', 'CatdirviaId', 'int', CreoleTypes::INTEGER, 'catdirvia', 'ID', false, null);

	} 
} 