<?php



class AtestayuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtestayuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atestayu');
		$tMap->setPhpName('Atestayu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atestayu_SEQ');

		$tMap->addColumn('DESEST', 'Desest', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('COMEST', 'Comest', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 