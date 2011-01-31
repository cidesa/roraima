<?php



class CadetordsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadetordsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadetords');
		$tMap->setPhpName('Cadetords');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('ORDSER', 'Ordser', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('PRESER', 'Preser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DTOSER', 'Dtoser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('RGOSER', 'Rgoser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TOTSER', 'Totser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DESSER', 'Desser', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('MONSER', 'Monser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CANSER', 'Canser', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODRGO', 'Codrgo', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 