<?php



class NpguardeMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpguardeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npguarde');
		$tMap->setPhpName('Npguarde');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npguarde_SEQ');

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMGUA', 'Nomgua', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('NOMCON', 'Nomcon', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('RIFGUA', 'Rifgua', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('NINSME', 'Ninsme', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('SOLMEVIG', 'Solmevig', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
