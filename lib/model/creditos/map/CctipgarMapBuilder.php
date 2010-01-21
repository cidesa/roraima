<?php



class CctipgarMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CctipgarMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cctipgar');
		$tMap->setPhpName('Cctipgar');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cctipgar_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMTIPGAR', 'Nomtipgar', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('DESTIPGAR', 'Destipgar', 'string', CreoleTypes::VARCHAR, false, null);

	} 
} 