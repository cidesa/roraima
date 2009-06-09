<?php



class NphisconMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NphisconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nphiscon');
		$tMap->setPhpName('Nphiscon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nphiscon_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODESCUELA', 'Codescuela', 'string', CreoleTypes::VARCHAR, false, 7);

		$tMap->addColumn('CODNIV', 'Codniv', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODTIPGAS', 'Codtipgas', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NUMREC', 'Numrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('FECNOMDES', 'Fecnomdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESPECIAL', 'Especial', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECNOMESPDES', 'Fecnomespdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECNOMESPHAS', 'Fecnomesphas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODNOMESP', 'Codnomesp', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NOMNOMESP', 'Nomnomesp', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 