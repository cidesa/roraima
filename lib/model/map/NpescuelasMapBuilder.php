<?php



class NpescuelasMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NpescuelasMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npescuelas');
		$tMap->setPhpName('Npescuelas');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npescuelas_SEQ');

		$tMap->addColumn('CODESCUELA', 'Codescuela', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('NOMBREESCUELA', 'Nombreescuela', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('CODMUNICIPIO', 'Codmunicipio', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('NOMBREMUNICIPIO', 'Nombremunicipio', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 