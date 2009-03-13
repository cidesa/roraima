<?php



class TspararcMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TspararcMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tspararc');
		$tMap->setPhpName('Tspararc');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tspararc_SEQ');

		$tMap->addColumn('NUMCUE', 'Numcue', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('INICUE', 'Inicue', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINCUE', 'Fincue', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INIREF', 'Iniref', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINREF', 'Finref', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INIFEC', 'Inifec', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINFEC', 'Finfec', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INITIP', 'Initip', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINTIP', 'Fintip', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INIDES', 'Inides', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINDES', 'Findes', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('INIMON', 'Inimon', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addColumn('FINMON', 'Finmon', 'double', CreoleTypes::NUMERIC, true, 3);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 