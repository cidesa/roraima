<?php



class OcdefparMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcdefparMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocdefpar');
		$tMap->setPhpName('Ocdefpar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocdefpar_SEQ');

		$tMap->addColumn('RENPAR', 'Renpar', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('COSUNI', 'Cosuni', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CODUNI', 'Coduni', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODPAR', 'Codpar', 'string', CreoleTypes::VARCHAR, true, 32);

		$tMap->addColumn('DESPAR', 'Despar', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODTIPPAR', 'Codtippar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('COSCOLING', 'Coscoling', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('COSCONSTRUC', 'Cosconstruc', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 