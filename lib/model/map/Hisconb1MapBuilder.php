<?php



class Hisconb1MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.Hisconb1MapBuilder';

	
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

		$tMap = $this->dbMap->addTable('hisconb1');
		$tMap->setPhpName('Hisconb1');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('hisconb1_SEQ');

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, true, 18);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('PEREJE', 'Pereje', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('TOTDEB', 'Totdeb', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTCRE', 'Totcre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALACT', 'Salact', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 