<?php



class FafacturMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FafacturMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fafactur');
		$tMap->setPhpName('Fafactur');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fafactur_SEQ');

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('DESFAC', 'Desfac', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TIPREF', 'Tipref', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('MONFAC', 'Monfac', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONDESC', 'Mondesc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCONPAG', 'Codconpag', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('REAPOR', 'Reapor', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('VALMON', 'Valmon', 'double', CreoleTypes::NUMERIC, false, 12);

		$tMap->addColumn('NUMCOMORD', 'Numcomord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMCOMINV', 'Numcominv', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('SUCURSAL', 'Sucursal', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('MOTANU', 'Motanu', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('VUELTO', 'Vuelto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCAJ', 'Codcaj', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 