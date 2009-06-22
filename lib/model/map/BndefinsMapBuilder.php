<?php



class BndefinsMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.BndefinsMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('bndefins');
		$tMap->setPhpName('Bndefins');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('bndefins_SEQ');

		$tMap->addColumn('CODINS', 'Codins', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('NOMINS', 'Nomins', 'string', CreoleTypes::VARCHAR, false, 35);

		$tMap->addColumn('DIRINS', 'Dirins', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELINS', 'Telins', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('FAXINS', 'Faxins', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('EMAIL', 'Email', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('EDOINS', 'Edoins', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('MUNINS', 'Munins', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('PAQINS', 'Paqins', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('FORACT', 'Foract', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LONACT', 'Lonact', 'int', CreoleTypes::INTEGER, false, 3);

		$tMap->addColumn('FORUBI', 'Forubi', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('DESUBI', 'Desubi', 'string', CreoleTypes::VARCHAR, false, 30);

		$tMap->addColumn('LONUBI', 'Lonubi', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECPER', 'Fecper', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECEJE', 'Feceje', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODDES', 'Coddes', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('CODINC', 'Codinc', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('PORREV', 'Porrev', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 