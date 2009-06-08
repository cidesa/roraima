<?php



class AtproveeMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtproveeMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atprovee');
		$tMap->setPhpName('Atprovee');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atprovee_SEQ');

		$tMap->addColumn('NOMPRO', 'Nompro', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('RIFPRO', 'Rifpro', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('NITPRO', 'Nitpro', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRPRO', 'Dirpro', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('TELPRO', 'Telpro', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 