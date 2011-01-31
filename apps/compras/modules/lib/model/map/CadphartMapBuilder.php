<?php



class CadphartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadphartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadphart');
		$tMap->setPhpName('Cadphart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadphart_SEQ');

		$tMap->addColumn('DPHART', 'Dphart', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('FECDPH', 'Fecdph', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESDPH', 'Desdph', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODORI', 'Codori', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('STADPH', 'Stadph', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REFPAG', 'Refpag', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPDPH', 'Tipdph', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONDPH', 'Mondph', 'double', CreoleTypes::NUMERIC, false, 16);

		$tMap->addColumn('OBSDPH', 'Obsdph', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FORDESP', 'Fordesp', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TIPREF', 'Tipref', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECEMIOV', 'Fecemiov', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCAROV', 'Feccarov', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('LOCORI', 'Locori', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIRECCION', 'Direccion', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('RUBRO', 'Rubro', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CANKG', 'Cankg', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('TOTPASREAL', 'Totpasreal', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('LOCREC', 'Locrec', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('EMPTRA', 'Emptra', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('NOMREP', 'Nomrep', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TELEMP', 'Telemp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CHOVEH', 'Choveh', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CEDCHO', 'Cedcho', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('TELCHO', 'Telcho', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMCONFORDES', 'Nomconfordes', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CEDCONFORDES', 'Cedconfordes', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('HORSALCONFORDES', 'Horsalconfordes', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NOMCONFORREC', 'Nomconforrec', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CEDCONFORREC', 'Cedconforrec', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('HORLLECONFORREC', 'Horlleconforrec', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
