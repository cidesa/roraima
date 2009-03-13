<?php



class FcconrepMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcconrepMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcconrep');
		$tMap->setPhpName('Fcconrep');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcconrep_SEQ');

		$tMap->addColumn('CEDCON', 'Cedcon', 'string', CreoleTypes::VARCHAR, false, 11);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('REPCON', 'Repcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DIRCON', 'Dircon', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TELCON', 'Telcon', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EMACON', 'Emacon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODSEC', 'Codsec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NITCON', 'Nitcon', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('CODMUN', 'Codmun', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEDO', 'Codedo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAI', 'Codpai', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CIUCON', 'Ciucon', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CPOCON', 'Cpocon', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('APOCON', 'Apocon', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('URLCON', 'Urlcon', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NACCON', 'Naccon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPCON', 'Tipcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FAXCON', 'Faxcon', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('CLACON', 'Clacon', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addColumn('FECDESCON', 'Fecdescon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECACTCON', 'Fecactcon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ORIGEN', 'Origen', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NOMNEG', 'Nomneg', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('RECCON', 'Reccon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TEM', 'Tem', 'double', CreoleTypes::NUMERIC, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 