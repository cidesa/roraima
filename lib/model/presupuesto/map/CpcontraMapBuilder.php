<?php



class CpcontraMapBuilder {

	
	const CLASS_NAME = 'lib.model.presupuesto.map.CpcontraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cpcontra');
		$tMap->setPhpName('Cpcontra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cpcontra_SEQ');

		$tMap->addColumn('CODPARMA', 'Codparma', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('CODPARDE', 'Codparde', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 