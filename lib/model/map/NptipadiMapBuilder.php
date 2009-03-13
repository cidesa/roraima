<?php



class NptipadiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NptipadiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptipadi');
		$tMap->setPhpName('Nptipadi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptipadi_SEQ');

		$tMap->addColumn('CODTIT', 'Codtit', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESTIT', 'Destit', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('CODADI', 'Codadi', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESADI', 'Desadi', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 