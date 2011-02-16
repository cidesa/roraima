<?php



class LicomintMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LicomintMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('licomint');
		$tMap->setPhpName('Licomint');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('licomint_SEQ');

		$tMap->addColumn('NUMCOMINT', 'Numcomint', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECCOMINT', 'Feccomint', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODCOM', 'Codcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 