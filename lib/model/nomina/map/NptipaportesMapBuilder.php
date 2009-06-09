<?php



class NptipaportesMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptipaportesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipaportes');
		$tMap->setPhpName('Nptipaportes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipaportes_SEQ');

		$tMap->addColumn('CODTIPAPO', 'Codtipapo', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPAPO', 'Destipapo', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('PORRET', 'Porret', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('PORAPO', 'Porapo', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 