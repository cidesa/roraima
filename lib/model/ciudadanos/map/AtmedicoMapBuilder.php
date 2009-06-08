<?php



class AtmedicoMapBuilder {

	
	const CLASS_NAME = 'lib.model.ciudadanos.map.AtmedicoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('atmedico');
		$tMap->setPhpName('Atmedico');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('atmedico_SEQ');

		$tMap->addColumn('CEDRIFMED', 'Cedrifmed', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('NOMBREMED', 'Nombremed', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('APELLIMED', 'Apellimed', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DIRHABMED', 'Dirhabmed', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('DIRTRAMED', 'Dirtramed', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('TELUNOMED', 'Telunomed', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('TELDOSMED', 'Teldosmed', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addColumn('NROCOLMED', 'Nrocolmed', 'string', CreoleTypes::VARCHAR, false, 25);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 