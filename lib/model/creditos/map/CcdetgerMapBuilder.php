<?php



class CcdetgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdetgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdetger');
		$tMap->setPhpName('Ccdetger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdetger_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('LOGIN', 'Login', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('NOMFOR', 'Nomfor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PRIUSU', 'Priusu', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

	} 
} 