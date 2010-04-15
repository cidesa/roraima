<?php



class FordefinstMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FordefinstMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fordefinst');
		$tMap->setPhpName('Fordefinst');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fordefinst_SEQ');

		$tMap->addColumn('NROFOR', 'Nrofor', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESFOR', 'Desfor', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 