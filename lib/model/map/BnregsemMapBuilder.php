<?php



class BnregsemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BnregsemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bnregsem');
		$tMap->setPhpName('Bnregsem');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bnregsem_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODSEM', 'Codsem', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('DESSEM', 'Dessem', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FECREG', 'Fecreg', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ORDRCP', 'Ordrcp', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FOTSEM', 'Fotsem', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('SEXSEM', 'Sexsem', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('RAZSEM', 'Razsem', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EDASEM', 'Edasem', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('HERSEM', 'Hersem', 'string', CreoleTypes::VARCHAR, false, 45);

		$tMap->addColumn('OBSSEM', 'Obssem', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('VIDUTI', 'Viduti', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('MESDEP', 'Mesdep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALINI', 'Valini', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALRES', 'Valres', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALLIB', 'Vallib', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('VALREX', 'Valrex', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSREP', 'Cosrep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEPMEN', 'Depmen', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEPACU', 'Depacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STASEM', 'Stasem', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 