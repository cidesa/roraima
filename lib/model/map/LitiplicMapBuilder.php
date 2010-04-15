<?php



class LitiplicMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LitiplicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('litiplic');
		$tMap->setPhpName('Litiplic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('litiplic_SEQ');

		$tMap->addColumn('DESTIPLIC', 'Destiplic', 'string', CreoleTypes::VARCHAR, true, 500);

		$tMap->addColumn('MAXUNITRI', 'Maxunitri', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ARTLEY', 'Artley', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 