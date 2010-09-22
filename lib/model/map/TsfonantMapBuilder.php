<?php



class TsfonantMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsfonantMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsfonant');
		$tMap->setPhpName('Tsfonant');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsfonant_SEQ');

		$tMap->addColumn('REFFON', 'Reffon', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECFON', 'Fecfon', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('DESFON', 'Desfon', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONFON', 'Monfon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAFON', 'Stafon', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('CODFON', 'Codfon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 