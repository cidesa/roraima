<?php



class FcdefubifisMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdefubifisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdefubifis');
		$tMap->setPhpName('Fcdefubifis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdefubifis_SEQ');

		$tMap->addColumn('CODUBIFIS', 'Codubifis', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMUBIFIS', 'Nomubifis', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 