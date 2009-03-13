<?php



class FordefmunMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefmunMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefmun');
		$tMap->setPhpName('Fordefmun');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefmun_SEQ');

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESMUN', 'Desmun', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 