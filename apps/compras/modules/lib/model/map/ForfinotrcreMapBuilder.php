<?php



class ForfinotrcreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForfinotrcreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forfinotrcre');
		$tMap->setPhpName('Forfinotrcre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forfinotrcre_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODPAREGR', 'Codparegr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPARING', 'Codparing', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONFIN', 'Monfin', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
