<?php



class FctipapuMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FctipapuMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fctipapu');
		$tMap->setPhpName('Fctipapu');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fctipapu_SEQ');

		$tMap->addColumn('TIPAPU', 'Tipapu', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('PORMON', 'Pormon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ALIMON', 'Alimon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STATIP', 'Statip', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('UNIPAR', 'Unipar', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FREPAR', 'Frepar', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PARAPU', 'Parapu', 'string', CreoleTypes::VARCHAR, false, 300);

		$tMap->addColumn('EXOAPU', 'Exoapu', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 