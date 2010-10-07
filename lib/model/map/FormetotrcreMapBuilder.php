<?php



class FormetotrcreMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FormetotrcreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('formetotrcre');
		$tMap->setPhpName('Formetotrcre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('formetotrcre_SEQ');

		$tMap->addColumn('CODMET', 'Codmet', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODPRO', 'Codpro', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 5);

		$tMap->addColumn('CANACT', 'Canact', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CODPAREGR', 'Codparegr', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('MONPRE', 'Monpre', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODTIP', 'Codtip', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('OBSERV', 'Observ', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODFIN', 'Codfin', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
