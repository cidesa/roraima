<?php



class NpinteresesprestacionesMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpinteresesprestacionesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinteresesprestaciones');
		$tMap->setPhpName('Npinteresesprestaciones');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinteresesprestaciones_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECPAGO', 'Fecpago', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECCALCULO', 'Feccalculo', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('ACUFONDOANTIGUEDAD', 'Acufondoantiguedad', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ACUINTERES', 'Acuinteres', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 