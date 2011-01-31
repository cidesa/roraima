<?php



class FaallbancosMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FaallbancosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('faallbancos');
		$tMap->setPhpName('Faallbancos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('faallbancos_SEQ');

		$tMap->addColumn('BANCO', 'Banco', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CTABAN', 'Ctaban', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 