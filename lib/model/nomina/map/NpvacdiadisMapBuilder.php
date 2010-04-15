<?php



class NpvacdiadisMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpvacdiadisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npvacdiadis');
		$tMap->setPhpName('Npvacdiadis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npvacdiadis_SEQ');

		$tMap->addColumn('RANGODESDE', 'Rangodesde', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('RANGOHASTA', 'Rangohasta', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('DIADIS', 'Diadis', 'double', CreoleTypes::NUMERIC, false, 2);

		$tMap->addColumn('CODNOM', 'Codnom', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('JORNADA', 'Jornada', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 