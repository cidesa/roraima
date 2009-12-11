<?php



class ApernueperMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.ApernueperMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('apernueper');
		$tMap->setPhpName('Apernueper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('apernueper_SEQ');

		$tMap->addColumn('NOMTAB', 'Nomtab', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODMOD', 'Codmod', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 