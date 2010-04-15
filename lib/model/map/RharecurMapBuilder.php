<?php



class RharecurMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RharecurMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('rharecur');
		$tMap->setPhpName('Rharecur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('rharecur_SEQ');

		$tMap->addColumn('CODARECUR', 'Codarecur', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESARECUR', 'Desarecur', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 