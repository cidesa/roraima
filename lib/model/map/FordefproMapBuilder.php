<?php



class FordefproMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefproMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefpro');
		$tMap->setPhpName('Fordefpro');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefpro_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('DESPRO', 'Despro', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('DESABR', 'Desabr', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 