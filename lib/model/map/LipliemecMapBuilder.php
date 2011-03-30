<?php



class LipliemecMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LipliemecMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lipliemec');
		$tMap->setPhpName('Lipliemec');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lipliemec_SEQ');

		$tMap->addColumn('NUMPLIE', 'Numplie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODMEC', 'Codmec', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECSOB1', 'Fecsob1', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORSOB1', 'Horsob1', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECSOB2', 'Fecsob2', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORSOB2', 'Horsob2', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('DIROFE', 'Dirofe', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 