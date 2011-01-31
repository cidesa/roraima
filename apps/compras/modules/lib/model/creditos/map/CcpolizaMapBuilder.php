<?php



class CcpolizaMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcpolizaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccpoliza');
		$tMap->setPhpName('Ccpoliza');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccpoliza_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NUMPOL', 'Numpol', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NOMASE', 'Nomase', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ANOSEG', 'Anoseg', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONTOSEG', 'Montoseg', 'double', CreoleTypes::DOUBLE, false, null);

		$tMap->addForeignKey('CCVEHICU_ID', 'CcvehicuId', 'int', CreoleTypes::INTEGER, 'ccvehicu', 'ID', true, null);

	} 
} 