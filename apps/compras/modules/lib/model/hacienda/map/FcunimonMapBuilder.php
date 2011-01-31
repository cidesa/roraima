<?php



class FcunimonMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcunimonMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcunimon');
		$tMap->setPhpName('Fcunimon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcunimon_SEQ');

		$tMap->addColumn('CODUNIMON', 'Codunimon', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMUNIMON', 'Nomunimon', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('VALUNIMON', 'Valunimon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 