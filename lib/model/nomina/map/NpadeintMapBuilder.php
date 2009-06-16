<?php



class NpadeintMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpadeintMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npadeint');
		$tMap->setPhpName('Npadeint');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npadeint_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECADE', 'Fecade', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('MONADE', 'Monade', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('OBSERVACION', 'Observacion', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 