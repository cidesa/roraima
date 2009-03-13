<?php



class CpconejeMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpconejeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpconeje');
		$tMap->setPhpName('Cpconeje');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('NOMPRE', 'Nompre', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('MONDIS', 'Mondis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTRA', 'Montra', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONADI', 'Monadi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('REF', 'Ref', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECHA', 'Fecha', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('DESCRIP', 'Descrip', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONAJU', 'Monaju', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MONDIM', 'Mondim', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTRN', 'Montrn', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 