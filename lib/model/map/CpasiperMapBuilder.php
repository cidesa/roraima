<?php



class CpasiperMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpasiperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpasiper');
		$tMap->setPhpName('Cpasiper');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 34);

		$tMap->addColumn('ASIPER', 'Asiper', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 