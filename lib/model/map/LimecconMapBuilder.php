<?php



class LimecconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LimecconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('limeccon');
		$tMap->setPhpName('Limeccon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('limeccon_SEQ');

		$tMap->addColumn('CODMEC', 'Codmec', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESMEC', 'Desmec', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 