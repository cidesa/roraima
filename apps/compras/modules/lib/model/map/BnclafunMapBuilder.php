<?php



class BnclafunMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnclafunMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnclafun');
		$tMap->setPhpName('Bnclafun');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnclafun_SEQ');

		$tMap->addColumn('CODCLA', 'Codcla', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESCLA', 'Descla', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STACLA', 'Stacla', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 