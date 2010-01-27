<?php



class AtmisionesMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtmisionesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atmisiones');
		$tMap->setPhpName('Atmisiones');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atmisiones_SEQ');

		$tMap->addColumn('DESMIS', 'Desmis', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 