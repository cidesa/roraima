<?php



class CcparroqMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcparroqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccparroq');
		$tMap->setPhpName('Ccparroq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccparroq_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMPAR', 'Nompar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('CCMUNICI_ID', 'CcmuniciId', 'int', CreoleTypes::INTEGER, 'ccmunici', 'ID', true, null);

	} 
} 