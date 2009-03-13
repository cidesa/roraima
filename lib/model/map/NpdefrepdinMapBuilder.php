<?php



class NpdefrepdinMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpdefrepdinMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefrepdin');
		$tMap->setPhpName('Npdefrepdin');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefrepdin_SEQ');

		$tMap->addColumn('CODREP', 'Codrep', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODCOL', 'Codcol', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMCOL', 'Nomcol', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('VALDES', 'Valdes', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('VALHAS', 'Valhas', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('ORDEN', 'Orden', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('TIPCOL', 'Tipcol', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('LONCOL', 'Loncol', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 