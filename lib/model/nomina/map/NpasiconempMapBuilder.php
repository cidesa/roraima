<?php



class NpasiconempMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpasiconempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npasiconemp');
		$tMap->setPhpName('Npasiconemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npasiconemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('NOMEMP', 'Nomemp', 'string', CreoleTypes::VARCHAR, true, 31);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMCAR', 'Nomcar', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECEXP', 'Fecexp', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FRECON', 'Frecon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ASIDED', 'Asided', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ACUCON', 'Acucon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CALCON', 'Calcon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ACTIVO', 'Activo', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ACUMULADO', 'Acumulado', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 