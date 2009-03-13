<?php



class FcdefubimagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcdefubimagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdefubimag');
		$tMap->setPhpName('Fcdefubimag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdefubimag_SEQ');

		$tMap->addColumn('CODUBIMAG', 'Codubimag', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMUBIMAG', 'Nomubimag', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 