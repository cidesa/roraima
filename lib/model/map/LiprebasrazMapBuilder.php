<?php



class LiprebasrazMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiprebasrazMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liprebasraz');
		$tMap->setPhpName('Liprebasraz');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liprebasraz_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addForeignKey('CODRAZCOM', 'Codrazcom', 'string', CreoleTypes::VARCHAR, 'carazcom', 'CODRAZCOM', true, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 