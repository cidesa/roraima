<?php



class CctipprobieMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipprobieMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipprobie');
		$tMap->setPhpName('Cctipprobie');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipprobie_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPPROBIE', 'Nomtipprobie', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 