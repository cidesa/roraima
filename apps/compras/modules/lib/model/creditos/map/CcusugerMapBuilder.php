<?php



class CcusugerMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcusugerMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccusuger');
		$tMap->setPhpName('Ccusuger');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccusuger_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

		$tMap->addForeignKey('CCUSUINT_ID', 'CcusuintId', 'int', CreoleTypes::INTEGER, 'ccusuint', 'ID', true, null);

	} 
} 