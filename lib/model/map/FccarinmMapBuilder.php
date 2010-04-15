<?php



class FccarinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FccarinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fccarinm');
		$tMap->setPhpName('Fccarinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fccarinm_SEQ');

		$tMap->addColumn('CODCARINM', 'Codcarinm', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMCARINM', 'Nomcarinm', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('STACARINM', 'Stacarinm', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 