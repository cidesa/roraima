<?php



class FcaccesoMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcaccesoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcacceso');
		$tMap->setPhpName('Fcacceso');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcacceso_SEQ');

		$tMap->addColumn('CEDULA', 'Cedula', 'string', CreoleTypes::VARCHAR, false, 14);

		$tMap->addColumn('NOMUSU', 'Nomusu', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('PASUSU', 'Pasusu', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('AUTSOL', 'Autsol', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('ANUPAG', 'Anupag', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 