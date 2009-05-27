<?php



class NpintconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpintconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npintcon');
		$tMap->setPhpName('Npintcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npintcon_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPTAS', 'Tiptas', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 