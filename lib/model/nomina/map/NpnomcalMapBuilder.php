<?php



class NpnomcalMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpnomcalMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npnomcal');
		$tMap->setPhpName('Npnomcal');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npnomcal_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCAR', 'Codcar', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FRECON', 'Frecon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ASIDED', 'Asided', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECNOM', 'Fecnom', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NOMNOM', 'Nomnom', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CANTIDAD', 'Cantidad', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ACUCON', 'Acucon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ACUMULADO', 'Acumulado', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALDO', 'Saldo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMREC', 'Numrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECNOMDES', 'Fecnomdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ESPECIAL', 'Especial', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECNOMESPDES', 'Fecnomespdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECNOMESPHAS', 'Fecnomesphas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODNOMESP', 'Codnomesp', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NOMNOMESP', 'Nomnomesp', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 