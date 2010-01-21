<?php



class CcvehcreparconMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcvehcreparconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccvehcreparcon');
		$tMap->setPhpName('Ccvehcreparcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccvehcreparcon_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCPARCRECON_ID', 'CcparcreconId', 'int', CreoleTypes::INTEGER, 'ccparcrecon', 'ID', true, null);

		$tMap->addForeignKey('CCVEHICU_ID', 'CcvehicuId', 'int', CreoleTypes::INTEGER, 'ccvehicu', 'ID', true, null);

	} 
} 