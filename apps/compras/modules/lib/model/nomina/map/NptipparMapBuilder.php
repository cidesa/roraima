<?php



class NptipparMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptipparMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptippar');
		$tMap->setPhpName('Nptippar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptippar_SEQ');

		$tMap->addColumn('TIPPAR', 'Tippar', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESPAR', 'Despar', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 