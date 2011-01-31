<?php



class IndefdesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IndefdesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('indefdes');
		$tMap->setPhpName('Indefdes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('indefdes_SEQ');

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESDES', 'Desdes', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('TIPDES', 'Tipdes', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('VALDES', 'Valdes', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DIADES', 'Diades', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TIPRET', 'Tipret', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CUECON', 'Cuecon', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 