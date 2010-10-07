<?php



class ForasounicatMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForasounicatMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forasounicat');
		$tMap->setPhpName('Forasounicat');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forasounicat_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 