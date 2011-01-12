<?php



class CcreccreMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcreccreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccreccre');
		$tMap->setPhpName('Ccreccre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccreccre_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESTATUS', 'Estatus', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCUSUINT_ID', 'CcusuintId', 'int', CreoleTypes::INTEGER, 'ccusuint', 'ID', true, null);

		$tMap->addForeignKey('CCRECAUD_ID', 'CcrecaudId', 'int', CreoleTypes::INTEGER, 'ccrecaud', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

	} 
} 