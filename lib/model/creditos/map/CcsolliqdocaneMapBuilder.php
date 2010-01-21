<?php



class CcsolliqdocaneMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsolliqdocaneMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsolliqdocane');
		$tMap->setPhpName('Ccsolliqdocane');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsolliqdocane_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCSOLLIQ_ID', 'CcsolliqId', 'int', CreoleTypes::INTEGER, 'ccsolliq', 'ID', true, null);

		$tMap->addForeignKey('CCDOCANE_ID', 'CcdocaneId', 'int', CreoleTypes::INTEGER, 'ccdocane', 'ID', true, null);

	} 
} 