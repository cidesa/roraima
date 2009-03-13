<?php



class CobdocumeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CobdocumeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cobdocume');
		$tMap->setPhpName('Cobdocume');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cobdocume_SEQ');

		$tMap->addColumn('REFDOC', 'Refdoc', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODCLI', 'Codcli', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ORIDOC', 'Oridoc', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DESDOC', 'Desdoc', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONDOC', 'Mondoc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('RECDOC', 'Recdoc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DSCDOC', 'Dscdoc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ABODOC', 'Abodoc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALDOC', 'Saldoc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('STADOC', 'Stadoc', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMCOM', 'Numcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECCOM', 'Feccom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('REFFAC', 'Reffac', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addForeignKey('FATIPMOV_ID', 'FatipmovId', 'int', CreoleTypes::INTEGER, 'fatipmov', 'ID', true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 