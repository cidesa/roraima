<?php



class OcparconMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcparconMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocparcon');
		$tMap->setPhpName('Ocparcon');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocparcon_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('CANCON', 'Cancon', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CANVAL', 'Canval', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('PORCON', 'Porcon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODTIPFTE', 'Codtipfte', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 