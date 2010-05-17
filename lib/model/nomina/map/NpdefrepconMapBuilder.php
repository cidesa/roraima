<?php



class NpdefrepconMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpdefrepconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npdefrepcon');
		$tMap->setPhpName('Npdefrepcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npdefrepcon_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODREP', 'Codrep', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESREP', 'Desrep', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('NUMCOL', 'Numcol', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DESCOL', 'Descol', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('SUMTOT', 'Sumtot', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SUMVAL', 'Sumval', 'string', CreoleTypes::VARCHAR, false, 1);

	} 
} 