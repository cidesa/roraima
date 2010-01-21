<?php



class CcfreactMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcfreactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccfreact');
		$tMap->setPhpName('Ccfreact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccfreact_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CCFRENECO_ID', 'CcfrenecoId', 'int', CreoleTypes::INTEGER, 'ccfreneco', 'ID', true, null);

		$tMap->addForeignKey('CCACTECO_ID', 'CcactecoId', 'int', CreoleTypes::INTEGER, 'ccacteco', 'ID', true, null);

	} 
} 