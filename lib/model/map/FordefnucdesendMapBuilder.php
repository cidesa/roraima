<?php



class FordefnucdesendMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefnucdesendMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefnucdesend');
		$tMap->setPhpName('Fordefnucdesend');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODNUCDES', 'Codnucdes', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESNUCDES', 'Desnucdes', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 