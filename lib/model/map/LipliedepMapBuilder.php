<?php



class LipliedepMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LipliedepMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lipliedep');
		$tMap->setPhpName('Lipliedep');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lipliedep_SEQ');

		$tMap->addColumn('NUMPLIE', 'Numplie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NOMCUE', 'Nomcue', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPCUE', 'Tipcue', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 