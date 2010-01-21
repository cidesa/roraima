<?php



class CcsolliqtipliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsolliqtipliqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsolliqtipliq');
		$tMap->setPhpName('Ccsolliqtipliq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsolliqtipliq_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCSOLLIQ_ID', 'CcsolliqId', 'int', CreoleTypes::INTEGER, 'ccsolliq', 'ID', true, null);

		$tMap->addForeignKey('CCTIPLIQ_ID', 'CctipliqId', 'int', CreoleTypes::INTEGER, 'cctipliq', 'ID', true, null);

	} 
} 