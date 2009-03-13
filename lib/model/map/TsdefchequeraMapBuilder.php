<?php



class TsdefchequeraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdefchequeraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdefchequera');
		$tMap->setPhpName('Tsdefchequera');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdefchequera_SEQ');

		$tMap->addColumn('CODCHQ', 'Codchq', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('NUMCHE', 'Numche', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCHEDES', 'Numchedes', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('NUMCHEHAS', 'Numchehas', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ACTIVA', 'Activa', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 