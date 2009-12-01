<?php



class Hisconc1MapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.Hisconc1MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hisconc1');
		$tMap->setPhpName('Hisconc1');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hisconc1_SEQ');

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DEBCRE', 'Debcre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, true, 18);

		$tMap->addColumn('NUMASI', 'Numasi', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('REFASI', 'Refasi', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESASI', 'Desasi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 