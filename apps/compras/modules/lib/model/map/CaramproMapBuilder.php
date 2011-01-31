<?php



class CaramproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaramproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('carampro');
		$tMap->setPhpName('Carampro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('carampro_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('RAMART', 'Ramart', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 