<?php



class NpdefpagextMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpdefpagextMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefpagext');
		$tMap->setPhpName('Npdefpagext');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefpagext_SEQ');

		$tMap->addColumn('CODGRUNOM', 'Codgrunom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECHA1', 'Fecha1', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECHA2', 'Fecha2', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 