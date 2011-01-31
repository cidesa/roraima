<?php



class NpvacregcalnomMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacregcalnomMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacregcalnom');
		$tMap->setPhpName('Npvacregcalnom');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacregcalnom_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('FECHASALIDA', 'Fechasalida', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAENTRADA', 'Fechaentrada', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('PERIODOS', 'Periodos', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('FECHANOMINA', 'Fechanomina', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIASBONO', 'Diasbono', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 