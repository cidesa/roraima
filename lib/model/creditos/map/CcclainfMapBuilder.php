<?php



class CcclainfMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcclainfMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccclainf');
		$tMap->setPhpName('Ccclainf');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccclainf_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMINF', 'Nominf', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESINF', 'Desinf', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('APLBAR', 'Aplbar', 'string', CreoleTypes::VARCHAR, false, 1);

	} 
} 