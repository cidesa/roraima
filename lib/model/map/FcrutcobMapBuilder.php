<?php



class FcrutcobMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcrutcobMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcrutcob');
		$tMap->setPhpName('Fcrutcob');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcrutcob_SEQ');

		$tMap->addForeignKey('CODCOB', 'Codcob', 'string', CreoleTypes::VARCHAR, 'fccobrad', 'CODCOB', true, 3);

		$tMap->addForeignKey('CODRUT', 'Codrut', 'string', CreoleTypes::VARCHAR, 'fcrutas', 'CODRUT', true, 6);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 