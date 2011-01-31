<?php



class InespeciMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InespeciMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('inespeci');
		$tMap->setPhpName('Inespeci');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('inespeci_SEQ');

		$tMap->addColumn('CODESPECI', 'Codespeci', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESESPECI', 'Desespeci', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 