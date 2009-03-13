<?php



class CondefbalgenMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CondefbalgenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('condefbalgen');
		$tMap->setPhpName('Condefbalgen');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('TIPREP', 'Tiprep', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DESCTA', 'Descta', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NIVEL', 'Nivel', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('ORDEN', 'Orden', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 