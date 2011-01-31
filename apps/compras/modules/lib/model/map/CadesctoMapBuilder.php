<?php



class CadesctoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CadesctoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cadescto');
		$tMap->setPhpName('Cadescto');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cadescto_SEQ');

		$tMap->addColumn('CODDESC', 'Coddesc', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESDESC', 'Desdesc', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TIPDESC', 'Tipdesc', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('MONDESC', 'Mondesc', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('DIASAPL', 'Diasapl', 'double', CreoleTypes::NUMERIC, true, 4);

		$tMap->addColumn('CODCTA', 'Codcta', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('TIPRET', 'Tipret', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 