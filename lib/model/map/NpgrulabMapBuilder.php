<?php



class NpgrulabMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpgrulabMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npgrulab');
		$tMap->setPhpName('Npgrulab');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npgrulab_SEQ');

		$tMap->addColumn('CODGRULAB', 'Codgrulab', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESGRULAB', 'Desgrulab', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 