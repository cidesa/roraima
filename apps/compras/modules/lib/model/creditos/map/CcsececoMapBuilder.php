<?php



class CcsececoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcsececoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccsececo');
		$tMap->setPhpName('Ccsececo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccsececo_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMSECECO', 'Nomsececo', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('DESSECECO', 'Dessececo', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 