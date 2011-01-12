<?php



class NpestempMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpestempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npestemp');
		$tMap->setPhpName('Npestemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npestemp_SEQ');

		$tMap->addColumn('CODESTEMP', 'Codestemp', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('DESESTEMP', 'Desestemp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 