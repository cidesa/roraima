<?php



class CatsenviaMapBuilder {

	
	const CLASS_NAME = 'lib.model.catastro.map.CatsenviaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catsenvia');
		$tMap->setPhpName('Catsenvia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catsenvia_SEQ');

		$tMap->addColumn('DESSEN', 'Dessen', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 