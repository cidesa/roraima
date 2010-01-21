<?php



class CcperiodMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcperiodMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccperiod');
		$tMap->setPhpName('Ccperiod');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccperiod_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DESPER', 'Desper', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ALIAS', 'Alias', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CANTID', 'Cantid', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 