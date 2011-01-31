<?php



class BndissemMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndissemMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndissem');
		$tMap->setPhpName('Bndissem');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndissem_SEQ');

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, true, 30);

		$tMap->addColumn('CODSEM', 'Codsem', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('NRODISSEM', 'Nrodissem', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('MOTDISSEM', 'Motdissem', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPDISSEM', 'Tipdissem', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FECDISSEM', 'Fecdissem', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECDEVDIS', 'Fecdevdis', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('MONDISSEM', 'Mondissem', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('DETDISSEM', 'Detdissem', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODUBIORI', 'Codubiori', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('CODUBIDES', 'Codubides', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('OBSDISSEM', 'Obsdissem', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STADISSEM', 'Stadissem', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 