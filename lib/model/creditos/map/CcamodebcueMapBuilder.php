<?php



class CcamodebcueMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcamodebcueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccamodebcue');
		$tMap->setPhpName('Ccamodebcue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccamodebcue_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCAMOACT_ID', 'CcamoactId', 'int', CreoleTypes::INTEGER, 'ccamoact', 'ID', true, null);

		$tMap->addForeignKey('CCDEBCUE_ID', 'CcdebcueId', 'int', CreoleTypes::INTEGER, 'ccdebcue', 'ID', true, null);

	} 
} 