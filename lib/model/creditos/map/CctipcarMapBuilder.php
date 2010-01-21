<?php



class CctipcarMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipcarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipcar');
		$tMap->setPhpName('Cctipcar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipcar_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPCAR', 'Nomtipcar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESTIPCAR', 'Destipcar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('FECINI', 'Fecini', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('FECVEN', 'Fecven', 'int', CreoleTypes::DATE, false, null);

	} 
} 