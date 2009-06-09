<?php



class NpislrMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpislrMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npislr');
		$tMap->setPhpName('Npislr');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npislr_SEQ');

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODCONPOR', 'Codconpor', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODCONIMP', 'Codconimp', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 