<?php



class CcresbarMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcresbarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccresbar');
		$tMap->setPhpName('Ccresbar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccresbar_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DESCRI', 'Descri', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('RANMEN', 'Ranmen', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('RANMAY', 'Ranmay', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCGERENC_ID', 'CcgerencId', 'int', CreoleTypes::INTEGER, 'ccgerenc', 'ID', true, null);

	} 
} 