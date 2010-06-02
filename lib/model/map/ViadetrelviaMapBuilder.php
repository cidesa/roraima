<?php



class ViadetrelviaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadetrelviaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadetrelvia');
		$tMap->setPhpName('Viadetrelvia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadetrelvia_SEQ');

		$tMap->addColumn('NUMREL', 'Numrel', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECREL', 'Fecrel', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECFAC', 'Fecfac', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONTONET', 'Montonet', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOREC', 'Montorec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('REFSOL', 'Refsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 