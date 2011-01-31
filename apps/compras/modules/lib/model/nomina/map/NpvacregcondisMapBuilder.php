<?php



class NpvacregcondisMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacregcondisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacregcondis');
		$tMap->setPhpName('Npvacregcondis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacregcondis_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('FECHASALIDA', 'Fechasalida', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAENTRADA', 'Fechaentrada', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHANOMINA', 'Fechanomina', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIADIS', 'Diadis', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 