<?php



class FcdetconfueMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdetconfueMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdetconfue');
		$tMap->setPhpName('Fcdetconfue');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdetconfue_SEQ');

		$tMap->addColumn('REFCON', 'Refcon', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('MONCUO', 'Moncuo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMCUO', 'Numcuo', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('MONPAG', 'Monpag', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('OBSCUO', 'Obscuo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DESCUO', 'Descuo', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FUENTE', 'Fuente', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 