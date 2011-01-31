<?php



class FcdetinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdetinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdetinm');
		$tMap->setPhpName('Fcdetinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdetinm_SEQ');

		$tMap->addColumn('NROINM', 'Nroinm', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('ANOAVA', 'Anoava', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CODZON', 'Codzon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('ANOCON', 'Anocon', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('VALTER', 'Valter', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('VALCON', 'Valcon', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('MTRTER', 'Mtrter', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('MTRCON', 'Mtrcon', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addColumn('DPRCON', 'Dprcon', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 