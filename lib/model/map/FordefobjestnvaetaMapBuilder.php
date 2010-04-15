<?php



class FordefobjestnvaetaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefobjestnvaetaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefobjestnvaeta');
		$tMap->setPhpName('Fordefobjestnvaeta');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefobjestnvaeta_SEQ');

		$tMap->addColumn('CODOBJNVAETA', 'Codobjnvaeta', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESOBJNVAETA', 'Desobjnvaeta', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 