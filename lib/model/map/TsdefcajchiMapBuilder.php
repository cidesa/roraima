<?php



class TsdefcajchiMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdefcajchiMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdefcajchi');
		$tMap->setPhpName('Tsdefcajchi');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdefcajchi_SEQ');

		$tMap->addColumn('CODCAJ', 'Codcaj', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DESCAJ', 'Descaj', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('TIPCAU', 'Tipcau', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONAPE', 'Monape', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORREP', 'Porrep', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('NUMINI', 'Numini', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 