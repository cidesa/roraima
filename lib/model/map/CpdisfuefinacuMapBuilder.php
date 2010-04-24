<?php



class CpdisfuefinacuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CpdisfuefinacuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpdisfuefinacu');
		$tMap->setPhpName('Cpdisfuefinacu');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('CORREL', 'Correl', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('ORIGEN', 'Origen', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('FUEFIN', 'Fuefin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECDIS', 'Fecdis', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODPRE', 'Codpre', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('MONASI', 'Monasi', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('REFDIS', 'Refdis', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 