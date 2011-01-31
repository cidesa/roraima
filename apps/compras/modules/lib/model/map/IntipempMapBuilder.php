<?php



class IntipempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IntipempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('intipemp');
		$tMap->setPhpName('Intipemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('intipemp_SEQ');

		$tMap->addColumn('CODTIPEMP', 'Codtipemp', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIPEMP', 'Destipemp', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 