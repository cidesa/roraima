<?php



class RhrelobjindMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhrelobjindMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhrelobjind');
		$tMap->setPhpName('Rhrelobjind');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhrelobjind_SEQ');

		$tMap->addColumn('CODEVDO', 'Codevdo', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODOBJ', 'Codobj', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODIND', 'Codind', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('PESOBJ', 'Pesobj', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PLAOBJ', 'Plaobj', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 