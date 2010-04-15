<?php



class AcatencionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.AcatencionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('acatencion');
		$tMap->setPhpName('Acatencion');

		$tMap->setUseIdGenerator(false);

		$tMap->addColumn('DOCATE', 'Docate', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('ESTADO', 'Estado', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('FECREC', 'Fecrec', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('HORREC', 'Horrec', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECATE', 'Fecate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HORATE', 'Horate', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('NUMUNI', 'Numuni', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('NUMUNIORI', 'Numuniori', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('OBSDOC', 'Obsdoc', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('STAATE', 'Staate', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 