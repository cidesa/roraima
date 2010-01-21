<?php



class CcregionMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcregionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccregion');
		$tMap->setPhpName('Ccregion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccregion_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMREG', 'Nomreg', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESREG', 'Desreg', 'string', CreoleTypes::VARCHAR, false, 255);

	} 
} 