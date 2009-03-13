<?php



class CamedcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CamedcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('camedcom');
		$tMap->setPhpName('Camedcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('camedcom_SEQ');

		$tMap->addColumn('CODMEDCOM', 'Codmedcom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESMEDCOM', 'Desmedcom', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 