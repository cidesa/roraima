<?php



class FcinmcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcinmcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcinmcom');
		$tMap->setPhpName('Fcinmcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcinmcom_SEQ');

		$tMap->addColumn('NROINM', 'Nroinm', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('ANOAVA', 'Anoava', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('VALCOM', 'Valcom', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 