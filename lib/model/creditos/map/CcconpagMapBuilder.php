<?php



class CcconpagMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcconpagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccconpag');
		$tMap->setPhpName('Ccconpag');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccconpag_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DEBCOMCON', 'Debcomcon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('HABCOMCON', 'Habcomcon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMCON', 'Numcon', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ESSUM', 'Essum', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('INTDEV', 'Intdev', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, false, null);

	} 
} 