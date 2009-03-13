<?php



class NppresocantMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NppresocantMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nppresocant');
		$tMap->setPhpName('Nppresocant');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nppresocant_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECCOR', 'Feccor', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECCAL', 'Feccal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('DIASER', 'Diaser', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('MESSER', 'Messer', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('ANOSER', 'Anoser', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('DIATRA', 'Diatra', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('MESTRA', 'Mestra', 'double', CreoleTypes::NUMERIC, false, 5);

		$tMap->addColumn('ANOTRA', 'Anotra', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('ANTACU', 'Antacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('INTACU', 'Intacu', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('BONTRA', 'Bontra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ADEPRE', 'Adepre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('ADEINT', 'Adeint', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('PASREGANT', 'Pasregant', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAPRE', 'Stapre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('REGPRE', 'Regpre', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 