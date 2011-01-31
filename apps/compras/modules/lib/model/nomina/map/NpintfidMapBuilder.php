<?php



class NpintfidMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpintfidMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npintfid');
		$tMap->setPhpName('Npintfid');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npintfid_SEQ');

		$tMap->addColumn('FECDESDE', 'Fecdesde', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHASTA', 'Fechasta', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECHAINT', 'Fechaint', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DEPOS', 'Depos', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DEPOSACUM', 'Deposacum', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CAPITAL', 'Capital', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TASA', 'Tasa', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTERES', 'Interes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTERESACUM', 'Interesacum', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 