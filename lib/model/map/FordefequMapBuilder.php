<?php



class FordefequMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefequMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefequ');
		$tMap->setPhpName('Fordefequ');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefequ_SEQ');

		$tMap->addColumn('CODEQU', 'Codequ', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('DESEQU', 'Desequ', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESOBJ', 'Desobj', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 