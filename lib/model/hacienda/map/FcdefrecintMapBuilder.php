<?php



class FcdefrecintMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcdefrecintMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcdefrecint');
		$tMap->setPhpName('Fcdefrecint');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcdefrecint_SEQ');

		$tMap->addColumn('CODREC', 'Codrec', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NOMREC', 'Nomrec', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('MODO', 'Modo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PERIODO', 'Periodo', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('PROMEDIO', 'Promedio', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 