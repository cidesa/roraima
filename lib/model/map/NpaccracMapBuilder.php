<?php



class NpaccracMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpaccracMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npaccrac');
		$tMap->setPhpName('Npaccrac');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npaccrac_SEQ');

		$tMap->addColumn('CODACCADM', 'Codaccadm', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CODRAC', 'Codrac', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 