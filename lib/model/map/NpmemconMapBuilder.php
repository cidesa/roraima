<?php



class NpmemconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpmemconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmemcon');
		$tMap->setPhpName('Npmemcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmemcon_SEQ');

		$tMap->addColumn('CODMEN', 'Codmen', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 