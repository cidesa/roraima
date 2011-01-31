<?php



class CatraalmMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CatraalmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('catraalm');
		$tMap->setPhpName('Catraalm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('catraalm_SEQ');

		$tMap->addColumn('CODTRA', 'Codtra', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECTRA', 'Fectra', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DESTRA', 'Destra', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ALMORI', 'Almori', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CODUBIORI', 'Codubiori', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('ALMDES', 'Almdes', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('CODUBIDES', 'Codubides', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 