<?php



class NpperxdisMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpperxdisMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npperxdis');
		$tMap->setPhpName('Npperxdis');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npperxdis_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('PERINI', 'Perini', 'double', CreoleTypes::NUMERIC, false, 4);

		$tMap->addColumn('PERFIN', 'Perfin', 'double', CreoleTypes::NUMERIC, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 