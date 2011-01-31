<?php



class OcressolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcressolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocressol');
		$tMap->setPhpName('Ocressol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocressol_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMCOR', 'Numcor', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('CEDEMI', 'Cedemi', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CEDFIR', 'Cedfir', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('UBIARC', 'Ubiarc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('FECRES', 'Fecres', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIR', 'Fecfir', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 