<?php



class LipliepubMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LipliepubMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lipliepub');
		$tMap->setPhpName('Lipliepub');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('lipliepub_SEQ');

		$tMap->addColumn('NUMPLIE', 'Numplie', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('NUMEXP', 'Numexp', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('MEDIO', 'Medio', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECFIN', 'Fecfin', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('DIAS', 'Dias', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PAGINA', 'Pagina', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('CUERPO', 'Cuerpo', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 