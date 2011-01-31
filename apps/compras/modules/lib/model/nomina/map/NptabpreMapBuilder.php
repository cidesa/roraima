<?php



class NptabpreMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NptabpreMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('nptabpre');
		$tMap->setPhpName('Nptabpre');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('nptabpre_SEQ');

		$tMap->addColumn('FECPRE', 'Fecpre', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CODCON', 'Codcon', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('DIAMES', 'Diames', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('DIAANO', 'Diaano', 'double', CreoleTypes::NUMERIC, true, 2);

		$tMap->addColumn('INTERES', 'Interes', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 