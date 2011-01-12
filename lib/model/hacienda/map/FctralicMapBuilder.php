<?php



class FctralicMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FctralicMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fctralic');
		$tMap->setPhpName('Fctralic');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fctralic_SEQ');

		$tMap->addColumn('NUMTRA', 'Numtra', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('RIFCON', 'Rifcon', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('RIFREP', 'Rifrep', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('RIFCONANT', 'Rifconant', 'string', CreoleTypes::VARCHAR, true, 14);

		$tMap->addColumn('RIFREPANT', 'Rifrepant', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('FUNREC', 'Funrec', 'string', CreoleTypes::VARCHAR, true, 40);

		$tMap->addColumn('NUMLIC', 'Numlic', 'string', CreoleTypes::VARCHAR, false, 12);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 