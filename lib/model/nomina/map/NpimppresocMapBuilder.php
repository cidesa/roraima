<?php



class NpimppresocMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpimppresocMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npimppresoc');
		$tMap->setPhpName('Npimppresoc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npimppresoc_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECCOR', 'Feccor', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('SALEMP', 'Salemp', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('SALEMPDIA', 'Salempdia', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ALIUTI', 'Aliuti', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ALIBONO', 'Alibono', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('SALTOT', 'Saltot', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DIAART108', 'Diaart108', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('CAPEMP', 'Capemp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ANTACUM', 'Antacum', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('VALART108', 'Valart108', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('DIADIF', 'Diadif', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('INTDEV', 'Intdev', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTACUM', 'Intacum', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ADEANT', 'Adeant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ADEPRE', 'Adepre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REGPRE', 'Regpre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('SALADI', 'Saladi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ANOSER', 'Anoser', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 