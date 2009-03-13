<?php



class ForencpryaccespmetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ForencpryaccespmetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('forencpryaccespmet');
		$tMap->setPhpName('Forencpryaccespmet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('forencpryaccespmet_SEQ');

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODACCESP', 'Codaccesp', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CANMET', 'Canmet', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANACT', 'Canact', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTPRE', 'Totpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 