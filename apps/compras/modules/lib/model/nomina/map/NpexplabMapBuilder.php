<?php



class NpexplabMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpexplabMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npexplab');
		$tMap->setPhpName('Npexplab');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npexplab_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, false, 60);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('DESCAR', 'Descar', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECTER', 'Fecter', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SUEOBT', 'Sueobt', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STACAR', 'Stacar', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('COMPOBT', 'Compobt', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DUREXP', 'Durexp', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPORG', 'Tiporg', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MONTOPRES', 'Montopres', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DEDICA', 'Dedica', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
