<?php



class BndisinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndisinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndisinm');
		$tMap->setPhpName('Bndisinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndisinm_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODMUE', 'Codmue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NRODISINM', 'Nrodisinm', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('MOTDISINM', 'Motdisinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPDISINM', 'Tipdisinm', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECDISINM', 'Fecdisinm', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECDEVDIS', 'Fecdevdis', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONDISINM', 'Mondisinm', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DETDISINM', 'Detdisinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODUBIORI', 'Codubiori', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODUBIDES', 'Codubides', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('OBSDISINM', 'Obsdisinm', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STADISINM', 'Stadisinm', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 