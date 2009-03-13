<?php



class LiaspfincrievaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiaspfincrievaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liaspfincrieva');
		$tMap->setPhpName('Liaspfincrieva');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liaspfincrieva_SEQ');

		$tMap->addColumn('CODCRI', 'Codcri', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESCRI', 'Descri', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('PUNTAJE', 'Puntaje', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 