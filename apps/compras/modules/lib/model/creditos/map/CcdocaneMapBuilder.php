<?php



class CcdocaneMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcdocaneMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccdocane');
		$tMap->setPhpName('Ccdocane');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccdocane_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMDOCANE', 'Nomdocane', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('DESDOCANE', 'Desdocane', 'string', CreoleTypes::VARCHAR, true, null);

	} 
} 