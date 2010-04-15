<?php



class FcfuepreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FcfuepreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcfuepre');
		$tMap->setPhpName('Fcfuepre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcfuepre_SEQ');

		$tMap->addColumn('CODFUE', 'Codfue', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NOMFUE', 'Nomfue', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addColumn('NOMABR', 'Nomabr', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FRECOB', 'Frecob', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('MONMOR', 'Monmor', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PERMOR', 'Permor', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('PROPAG', 'Propag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PERPPG', 'Perppg', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('LIQACT', 'Liqact', 'double', CreoleTypes::NUMERIC, false, 15);

		$tMap->addColumn('DEUFEC', 'Deufec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('RECFEC', 'Recfec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECUFA', 'Fecufa', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('INGREC', 'Ingrec', 'string', CreoleTypes::VARCHAR, false, 18);

		$tMap->addColumn('FUEING', 'Fueing', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('INIEJE', 'Inieje', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FINEJE', 'Fineje', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAVSO', 'Diavso', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('CODPREI', 'Codprei', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('DEUFRA', 'Deufra', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('AUTLIQ', 'Autliq', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('SIMPRE', 'Simpre', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('FECCIE', 'Feccie', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPMUL', 'Tipmul', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECEST', 'Fecest', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAVEN', 'Diaven', 'double', CreoleTypes::NUMERIC, false, 10);

		$tMap->addColumn('TIPVEN', 'Tipven', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('TIPFUE', 'Tipfue', 'string', CreoleTypes::CHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 