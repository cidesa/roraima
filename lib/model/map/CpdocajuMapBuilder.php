<?php



class CpdocajuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpdocajuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdocaju');
		$tMap->setPhpName('Cpdocaju');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpdocaju_SEQ');

		$tMap->addColumn('TIPAJU', 'Tipaju', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMEXT', 'Nomext', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFIER', 'Refier', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 