<?php



class FordefdetcatpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefdetcatpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefdetcatpre');
		$tMap->setPhpName('Fordefdetcatpre');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODVOLTRA', 'Codvoltra', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESVOLTRA', 'Desvoltra', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODUNIMED', 'Codunimed', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CANVOLTRA', 'Canvoltra', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('PERSEG', 'Perseg', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 