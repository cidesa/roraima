<?php



class RhevaconcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RhevaconcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rhevaconcom');
		$tMap->setPhpName('Rhevaconcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rhevaconcom_SEQ');

		$tMap->addColumn('CODEVDO', 'Codevdo', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODVALINS', 'Codvalins', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('PESVAL', 'Pesval', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PUNVAL', 'Punval', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 