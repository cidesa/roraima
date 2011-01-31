<?php



class CasolrazMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CasolrazMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('casolraz');
		$tMap->setPhpName('Casolraz');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('casolraz_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addForeignKey('CODRAZCOM', 'Codrazcom', 'string', CreoleTypes::VARCHAR, 'carazcom', 'CODRAZCOM', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 