<?php



class NpasiconMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpasiconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasicon');
		$tMap->setPhpName('Npasicon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasicon_SEQ');

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMSUS', 'Nomsus', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('SALCON', 'Salcon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, false, 17);

		$tMap->addColumn('CANMON', 'Canmon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CALCON', 'Calcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ACTCON', 'Actcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FRECON', 'Frecon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MONMEN', 'Monmen', 'double', CreoleTypes::NUMERIC, false, 17);

		$tMap->addColumn('FRECUE', 'Frecue', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 