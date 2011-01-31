<?php



class CctipdesMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipdesMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipdes');
		$tMap->setPhpName('Cctipdes');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipdes_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPDES', 'Nomtipdes', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESTIPDES', 'Destipdes', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 