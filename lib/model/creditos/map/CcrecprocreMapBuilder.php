<?php



class CcrecprocreMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcrecprocreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccrecprocre');
		$tMap->setPhpName('Ccrecprocre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccrecprocre_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUSUREC', 'Codusurec', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('FECRECCEN', 'Fecreccen', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUSUCEN', 'Codusucen', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('ESTATU', 'Estatu', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCRECAUD_ID', 'CcrecaudId', 'int', CreoleTypes::INTEGER, 'ccrecaud', 'ID', true, null);

		$tMap->addForeignKey('CCPROGRA_ID', 'CcprograId', 'int', CreoleTypes::INTEGER, 'ccprogra', 'ID', true, null);

		$tMap->addForeignKey('CCCREDIT_ID', 'CccreditId', 'int', CreoleTypes::INTEGER, 'cccredit', 'ID', true, null);

	} 
} 