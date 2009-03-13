<?php



class CadetordcMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadetordcMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadetordc');
		$tMap->setPhpName('Cadetordc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadetordc_SEQ');

		$tMap->addColumn('ORDCON', 'Ordcon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESCON', 'Descon', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONCON', 'Moncon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANCON', 'Cancon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 