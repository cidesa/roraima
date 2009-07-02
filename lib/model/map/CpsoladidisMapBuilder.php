<?php



class CpsoladidisMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpsoladidisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpsoladidis');
		$tMap->setPhpName('Cpsoladidis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpsoladidis_SEQ');

		$tMap->addColumn('DESPRE', 'Despre', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('JUSTIFICACION', 'Justificacion', 'string', CreoleTypes::VARCHAR, false, 4000);

		$tMap->addColumn('ENUNCIADO', 'Enunciado', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('REFADI', 'Refadi', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECADI', 'Fecadi', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('ANOADI', 'Anoadi', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESADI', 'Desadi', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('DESANU', 'Desanu', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TOTADI', 'Totadi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAADI', 'Staadi', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ADIDIS', 'Adidis', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STAGOB', 'Stagob', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECGOB', 'Fecgob', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESGOB', 'Desgob', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STAPRE', 'Stapre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECPRE', 'Fecpre', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 