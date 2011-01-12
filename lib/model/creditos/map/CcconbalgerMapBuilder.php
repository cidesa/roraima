<?php



class CcconbalgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcconbalgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccconbalger');
		$tMap->setPhpName('Ccconbalger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccconbalger_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCONBALGER', 'Nomconbalger', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('CODIGO', 'Codigo', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('SUMRES', 'Sumres', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addForeignKey('CCVARIAB_ID', 'CcvariabId', 'int', CreoleTypes::INTEGER, 'ccvariab', 'ID', true, null);

	} 
} 