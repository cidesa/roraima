<?php



class CctipliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipliqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipliq');
		$tMap->setPhpName('Cctipliq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipliq_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPLIQ', 'Nomtipliq', 'string', CreoleTypes::VARCHAR, true, null);

		$tMap->addColumn('DESTIPLIQ', 'Destipliq', 'string', CreoleTypes::VARCHAR, true, null);

	} 
} 