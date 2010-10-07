<?php



class FormetdistraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FormetdistraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('formetdistra');
		$tMap->setPhpName('Formetdistra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('formetdistra_SEQ');

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODPAREGR', 'Codparegr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('MONTO', 'Monto', 'double', CreoleTypes::NUMERIC, false, 32);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 