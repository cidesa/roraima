<?php



class CccredenMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccredenMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccreden');
		$tMap->setPhpName('Cccreden');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccreden_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMCRE', 'Nomcre', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 