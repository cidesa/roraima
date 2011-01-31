<?php



class CcdetbalgerMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdetbalgerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdetbalger');
		$tMap->setPhpName('Ccdetbalger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdetbalger_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONBALGER', 'Monbalger', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECDETBALGER', 'Fecdetbalger', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CCBALGER_ID', 'CcbalgerId', 'int', CreoleTypes::INTEGER, 'ccbalger', 'ID', true, null);

		$tMap->addForeignKey('CCCONBALGER_ID', 'CcconbalgerId', 'int', CreoleTypes::INTEGER, 'ccconbalger', 'ID', true, null);

	} 
} 