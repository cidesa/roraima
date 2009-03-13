<?php



class OcdefequMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcdefequMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocdefequ');
		$tMap->setPhpName('Ocdefequ');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocdefequ_SEQ');

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESEQU', 'Desequ', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CODTIPEQU', 'Codtipequ', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 