<?php



class LiplieactMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LiplieactMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('liplieact');
		$tMap->setPhpName('Liplieact');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('liplieact_SEQ');

		$tMap->addColumn('NUMPLIE', 'Numplie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('DESACT', 'Desact', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('FECDES', 'Fecdes', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORDES', 'Hordes', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECHAS', 'Fechas', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORHAS', 'Horhas', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('LUGAR', 'Lugar', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('DIREC', 'Direc', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 