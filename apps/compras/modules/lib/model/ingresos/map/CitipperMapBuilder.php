<?php



class CitipperMapBuilder {

	
	const CLASS_NAME = 'lib.model.ingresos.map.CitipperMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('citipper');
		$tMap->setPhpName('Citipper');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('citipper_SEQ');

		$tMap->addColumn('CODTIPPER', 'Codtipper', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESTIPPER', 'Destipper', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 