<?php



class NpinstitutosMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpinstitutosMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npinstitutos');
		$tMap->setPhpName('Npinstitutos');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npinstitutos_SEQ');

		$tMap->addColumn('CODINS', 'Codins', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMINS', 'Nomins', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 