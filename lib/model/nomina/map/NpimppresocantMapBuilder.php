<?php



class NpimppresocantMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpimppresocantMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npimppresocant');
		$tMap->setPhpName('Npimppresocant');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npimppresocant_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECCOR', 'Feccor', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('SALEMP', 'Salemp', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('TASINT', 'Tasint', 'double', CreoleTypes::NUMERIC, false, 6);

		$tMap->addColumn('CAPEMP', 'Capemp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTDEV', 'Intdev', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ANTACUM', 'Antacum', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('ANOSER', 'Anoser', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('ADEANT', 'Adeant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTACUM', 'Intacum', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DIADIF', 'Diadif', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('REGPRE', 'Regpre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('DIAART108', 'Diaart108', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('VALART108', 'Valart108', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ADEPRE', 'Adepre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DIASER', 'Diaser', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('MESSER', 'Messer', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('DIATRA', 'Diatra', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('MESTRA', 'Mestra', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('ANOTRA', 'Anotra', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('STAPRE', 'Stapre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ADEINT', 'Adeint', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ANTACU', 'Antacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 