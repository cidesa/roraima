<?php



class CatciuMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatciuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catciu');
		$tMap->setPhpName('Catciu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catciu_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CATEST_ID', 'CatestId', 'int', CreoleTypes::INTEGER, 'catest', 'ID', true, null);

		$tMap->addColumn('NOMCIU', 'Nomciu', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('ALICIU', 'Aliciu', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 