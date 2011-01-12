<?php



class CcfuefinMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcfuefinMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccfuefin');
		$tMap->setPhpName('Ccfuefin');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccfuefin_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMFUEFIN', 'Nomfuefin', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ALIAS', 'Alias', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('RIF', 'Rif', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CONTABB_ID', 'ContabbId', 'int', CreoleTypes::INTEGER, 'contabb', 'ID', true, null);

	} 
} 