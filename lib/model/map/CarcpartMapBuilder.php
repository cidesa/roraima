<?php



class CarcpartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CarcpartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('carcpart');
		$tMap->setPhpName('Carcpart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('carcpart_SEQ');

		$tMap->addColumn('RCPART', 'Rcpart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECRCP', 'Fecrcp', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESRCP', 'Desrcp', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('MONRCP', 'Monrcp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STARCP', 'Starcp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, false, 6);

		$tMap->addColumn('CTRPER', 'Ctrper', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('GENORD', 'Genord', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NROENT', 'Nroent', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODUBI', 'Codubi', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NOMCLI', 'Nomcli', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CANCAJ', 'Cancaj', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('CANJAU', 'Canjau', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
