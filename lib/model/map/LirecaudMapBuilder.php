<?php



class LirecaudMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LirecaudMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lirecaud');
		$tMap->setPhpName('Lirecaud');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lirecaud_SEQ');

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESREC', 'Desrec', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('REQUERIDO', 'Requerido', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 