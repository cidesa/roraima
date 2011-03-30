<?php



class LiprioconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiprioconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lipriocon');
		$tMap->setPhpName('Lipriocon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lipriocon_SEQ');

		$tMap->addColumn('CODPRIO', 'Codprio', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESPRIO', 'Desprio', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 