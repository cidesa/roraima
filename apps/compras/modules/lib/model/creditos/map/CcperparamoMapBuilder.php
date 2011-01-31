<?php



class CcperparamoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcperparamoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccperparamo');
		$tMap->setPhpName('Ccperparamo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccperparamo_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPER', 'Nomper', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESPER', 'Desper', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 