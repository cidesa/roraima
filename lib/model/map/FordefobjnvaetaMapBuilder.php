<?php



class FordefobjnvaetaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefobjnvaetaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefobjnvaeta');
		$tMap->setPhpName('Fordefobjnvaeta');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODOBJNVAETA', 'Codobjnvaeta', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESOBJNVAETA', 'Desobjnvaeta', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 