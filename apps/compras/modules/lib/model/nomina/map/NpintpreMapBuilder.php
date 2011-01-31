<?php



class NpintpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpintpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npintpre');
		$tMap->setPhpName('Npintpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npintpre_SEQ');

		$tMap->addColumn('NUMDEC', 'Numdec', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('DESPRE', 'Despre', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('HASPRE', 'Haspre', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('PORPRE', 'Porpre', 'double', CreoleTypes::NUMERIC, true, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 