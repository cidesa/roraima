<?php



class CiadidisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CiadidisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ciadidis');
		$tMap->setPhpName('Ciadidis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ciadidis_SEQ');

		$tMap->addColumn('REFADI', 'Refadi', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECADI', 'Fecadi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ANOADI', 'Anoadi', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESADI', 'Desadi', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('ADIDIS', 'Adidis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TOTADI', 'Totadi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAADI', 'Staadi', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 