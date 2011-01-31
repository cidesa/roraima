<?php



class CcvarbalgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcvarbalgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccvarbalger');
		$tMap->setPhpName('Ccvarbalger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccvarbalger_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECVARBALGER', 'Fecvarbalger', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONVARBALGER', 'Monvarbalger', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addForeignKey('CCBALGER_ID', 'CcbalgerId', 'int', CreoleTypes::INTEGER, 'ccbalger', 'ID', true, null);

		$tMap->addForeignKey('CCVARIAB_ID', 'CcvariabId', 'int', CreoleTypes::INTEGER, 'ccvariab', 'ID', true, null);

	} 
} 