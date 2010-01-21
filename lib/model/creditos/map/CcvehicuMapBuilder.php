<?php



class CcvehicuMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcvehicuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccvehicu');
		$tMap->setPhpName('Ccvehicu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccvehicu_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMVEH', 'Nomveh', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MARCA', 'Marca', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ANOVEH', 'Anoveh', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PLACA', 'Placa', 'string', CreoleTypes::VARCHAR, false, 20);

	} 
} 