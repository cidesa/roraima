<?php



class AtpriayuMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtpriayuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atpriayu');
		$tMap->setPhpName('Atpriayu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atpriayu_SEQ');

		$tMap->addColumn('DESPRIAYU', 'Despriayu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 