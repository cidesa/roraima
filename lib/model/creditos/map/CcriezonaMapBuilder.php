<?php



class CcriezonaMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcriezonaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccriezona');
		$tMap->setPhpName('Ccriezona');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccriezona_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMRIEZONA', 'Nomriezona', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DESRIEZONA', 'Desriezona', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 