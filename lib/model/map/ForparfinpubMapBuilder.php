<?php



class ForparfinpubMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForparfinpubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forparfinpub');
		$tMap->setPhpName('Forparfinpub');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CUOPAR', 'Cuopar', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 1500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 