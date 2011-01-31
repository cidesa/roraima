<?php



class ViaregactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViaregactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viaregact');
		$tMap->setPhpName('Viaregact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viaregact_SEQ');

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, true, 254);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 