<?php



class CccuebanMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccuebanMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccueban');
		$tMap->setPhpName('Cccueban');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccueban_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCTIPCUE_ID', 'CctipcueId', 'int', CreoleTypes::INTEGER, 'cctipcue', 'ID', true, null);

		$tMap->addForeignKey('CCBANCO_ID', 'CcbancoId', 'int', CreoleTypes::INTEGER, 'ccbanco', 'ID', true, null);

	} 
} 