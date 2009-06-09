<?php



class NpmotantMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpmotantMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npmotant');
		$tMap->setPhpName('Npmotant');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npmotant_SEQ');

		$tMap->addColumn('CODMOTANT', 'Codmotant', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESMOTANT', 'Desmotant', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 