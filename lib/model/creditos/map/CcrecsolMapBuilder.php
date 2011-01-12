<?php



class CcrecsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcrecsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccrecsol');
		$tMap->setPhpName('Ccrecsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccrecsol_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CCSTATUS', 'Ccstatus', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCRECAUD_ID', 'CcrecaudId', 'int', CreoleTypes::INTEGER, 'ccrecaud', 'ID', true, null);

		$tMap->addForeignKey('CCSOLICI_ID', 'CcsoliciId', 'int', CreoleTypes::INTEGER, 'ccsolici', 'ID', true, null);

	} 
} 