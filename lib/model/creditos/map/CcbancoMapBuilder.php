<?php



class CcbancoMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcbancoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccbanco');
		$tMap->setPhpName('Ccbanco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccbanco_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMBAN', 'Nomban', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('ABRBAN', 'Abrban', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DIRBAN', 'Dirban', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('NOMPERCON', 'Nompercon', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('TELPERCON', 'Telpercon', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODARETEL', 'Codaretel', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('CODSUDEBAN', 'Codsudeban', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('CCPARROQ_ID', 'CcparroqId', 'int', CreoleTypes::INTEGER, 'ccparroq', 'ID', true, null);

	} 
} 