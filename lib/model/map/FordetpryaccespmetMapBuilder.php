<?php



class FordetpryaccespmetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordetpryaccespmetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordetpryaccespmet');
		$tMap->setPhpName('Fordetpryaccespmet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordetpryaccespmet_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACCESP', 'Codaccesp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODUNIEJE', 'Codunieje', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DISPER', 'Disper', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('UBIGEO', 'Ubigeo', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('POBAPX', 'Pobapx', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('JUSINS', 'Jusins', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CANINS', 'Canins', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANINSREP', 'Caninsrep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPREREP', 'Monprerep', 'double', CreoleTypes::NUMERIC, false, 18);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 