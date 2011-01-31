<?php



class CarazcomMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CarazcomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('carazcom');
		$tMap->setPhpName('Carazcom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('carazcom_SEQ');

		$tMap->addColumn('CODRAZCOM', 'Codrazcom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESRAZCOM', 'Desrazcom', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 