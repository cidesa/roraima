<?php



class AtrecaudMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AtrecaudMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atrecaud');
		$tMap->setPhpName('Atrecaud');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atrecaud_SEQ');

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESREC', 'Desrec', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('REQUERIDO', 'Requerido', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 