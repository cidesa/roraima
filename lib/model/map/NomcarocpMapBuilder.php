<?php



class NomcarocpMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NomcarocpMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nomcarocp');
		$tMap->setPhpName('Nomcarocp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nomcarocp_SEQ');

		$tMap->addColumn('CODOCP', 'Codocp', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESOCP', 'Desocp', 'string', CreoleTypes::VARCHAR, true, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 