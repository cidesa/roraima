<?php



class CcestcreMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcestcreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccestcre');
		$tMap->setPhpName('Ccestcre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccestcre_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, false, null);

		$tMap->addForeignKey('CCESTATU_ID', 'CcestatuId', 'int', CreoleTypes::INTEGER, 'ccestatu', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

		$tMap->addForeignKey('CCUSUINT_ID', 'CcusuintId', 'int', CreoleTypes::INTEGER, 'ccusuint', 'ID', true, null);

	} 
} 