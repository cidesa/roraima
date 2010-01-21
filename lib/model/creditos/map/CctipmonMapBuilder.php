<?php



class CctipmonMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipmonMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipmon');
		$tMap->setPhpName('Cctipmon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipmon_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPMON', 'Nomtipmon', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ABRTIPMON', 'Abrtipmon', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('EQUIVALBOL', 'Equivalbol', 'double', CreoleTypes::NUMERIC, false, 14);

	} 
} 