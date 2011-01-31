<?php



class AttipingMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AttipingMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('attiping');
		$tMap->setPhpName('Attiping');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('attiping_SEQ');

		$tMap->addColumn('TIPING', 'Tiping', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 