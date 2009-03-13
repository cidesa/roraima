<?php



class OcactcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcactcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocactcom');
		$tMap->setPhpName('Ocactcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocactcom_SEQ');

		$tMap->addColumn('CODACTCOM', 'Codactcom', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESACTCOM', 'Desactcom', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STAACTCOM', 'Staactcom', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 