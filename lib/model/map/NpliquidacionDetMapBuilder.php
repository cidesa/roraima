<?php



class NpliquidacionDetMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpliquidacionDetMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npliquidacion_det');
		$tMap->setPhpName('NpliquidacionDet');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npliquidacion_det_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CONCEPTO', 'Concepto', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ASIDED', 'Asided', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMREG', 'Numreg', 'double', CreoleTypes::NUMERIC, false, 4);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('NUMORD', 'Numord', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DIAS', 'Dias', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 