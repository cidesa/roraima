<?php



class CpplaobrMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpplaobrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpplaobr');
		$tMap->setPhpName('Cpplaobr');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODEST', 'Codest', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODOBR', 'Codobr', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NROCON', 'Nrocon', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONREA', 'Monrea', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONVAR', 'Monvar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORFIS', 'Porfis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORPRE', 'Porpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANEQU', 'Canequ', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESEQU', 'Desequ', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CANOBR', 'Canobr', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESOBR', 'Desobr', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CANREP', 'Canrep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESREP', 'Desrep', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('STAPLA', 'Stapla', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 