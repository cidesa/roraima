<?php



class OcinginsobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcinginsobrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocinginsobr');
		$tMap->setPhpName('Ocinginsobr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocinginsobr_SEQ');

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CEDINS', 'Cedins', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMINS', 'Nomins', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMCIV', 'Numciv', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 