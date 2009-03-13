<?php



class NpliqempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpliqempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npliqemp');
		$tMap->setPhpName('Npliqemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npliqemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NUMORD', 'Numord', 'double', CreoleTypes::NUMERIC, true, 8);

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFCAU', 'Refcau', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPPRC', 'Tipprc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFPRC', 'Refprc', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 24);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('NUMRIF', 'Numrif', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CONPAG', 'Conpag', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CAUPAG', 'Caupag', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCUE', 'Codcue', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODBAN', 'Codban', 'string', CreoleTypes::VARCHAR, true, 2);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('NOMDES', 'Nomdes', 'string', CreoleTypes::VARCHAR, true, 18);

		$tMap->addColumn('CODCUEDES', 'Codcuedes', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('DESPAG', 'Despag', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 