<?php



class CcsecsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsecsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsecsol');
		$tMap->setPhpName('Ccsecsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsecsol_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCSECECO_ID', 'CcsececoId', 'int', CreoleTypes::INTEGER, 'ccsececo', 'ID', true, null);

		$tMap->addForeignKey('CCBIEADQ_ID', 'CcbieadqId', 'int', CreoleTypes::INTEGER, 'ccbieadq', 'ID', true, null);

	} 
} 