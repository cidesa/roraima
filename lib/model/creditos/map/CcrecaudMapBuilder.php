<?php



class CcrecaudMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcrecaudMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccrecaud');
		$tMap->setPhpName('Ccrecaud');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccrecaud_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMREC', 'Nomrec', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESREC', 'Desrec', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ALIAS', 'Alias', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 