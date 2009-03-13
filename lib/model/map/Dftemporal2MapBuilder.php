<?php



class Dftemporal2MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Dftemporal2MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('dftemporal2');
		$tMap->setPhpName('Dftemporal2');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODIGO', 'Codigo', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ABR', 'Abr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('BEN', 'Ben', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('ESTAD', 'Estad', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NOMTAB', 'Nomtab', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('VIDA', 'Vida', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 