<?php



class NpcomocpMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpcomocpMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npcomocp');
		$tMap->setPhpName('Npcomocp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npcomocp_SEQ');

		$tMap->addColumn('PASCAR', 'Pascar', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('GRACAR', 'Gracar', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('SUECAR', 'Suecar', 'double', CreoleTypes::NUMERIC, false, null);

		$tMap->addColumn('CODTIPCAR', 'Codtipcar', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 