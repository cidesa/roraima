<?php



class CaordconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaordconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caordcon');
		$tMap->setPhpName('Caordcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caordcon_SEQ');

		$tMap->addColumn('ORDCON', 'Ordcon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TIPCON', 'Tipcon', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('OBJCON', 'Objcon', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECCUL', 'Feccul', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MULATRINI', 'Mulatrini', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('LAPGAR', 'Lapgar', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MULATRCUL', 'Mulatrcul', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STACON', 'Stacon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECANU', 'Fecanu', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CANCUO', 'Cancuo', 'double', CreoleTypes::NUMERIC, false, 3);

		$tMap->addColumn('FECPTO', 'Fecpto', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMCON', 'Numcon', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('NUMPTO', 'Numpto', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('NUMRES', 'Numres', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('OTORGA', 'Otorga', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('FECFIR', 'Fecfir', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OTOANT', 'Otoant', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('MONOTO', 'Monoto', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PAMOPAG', 'Pamopag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CUMRESP', 'Cumresp', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('OTOESP', 'Otoesp', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('MONAES', 'Monaes', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
