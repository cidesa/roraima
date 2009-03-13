<?php



class ContabbtempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ContabbtempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('contabbtemp');
		$tMap->setPhpName('Contabbtemp');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESCTA', 'Descta', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('SALANT', 'Salant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEBCRE', 'Debcre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CARGAB', 'Cargab', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('SALPRGPER', 'Salprgper', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALACUPER', 'Salacuper', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALPRGPERFOR', 'Salprgperfor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 