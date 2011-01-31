<?php



class CcentfinMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcentfinMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccentfin');
		$tMap->setPhpName('Ccentfin');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccentfin_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMENTFIN', 'Nomentfin', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 