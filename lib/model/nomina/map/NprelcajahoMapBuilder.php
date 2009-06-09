<?php



class NprelcajahoMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NprelcajahoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nprelcajaho');
		$tMap->setPhpName('Nprelcajaho');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nprelcajaho_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addColumn('CONRET', 'Conret', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CONAPO', 'Conapo', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CONPRE', 'Conpre', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('CONSEG', 'Conseg', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 