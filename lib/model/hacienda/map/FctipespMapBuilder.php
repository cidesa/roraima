<?php



class FctipespMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FctipespMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fctipesp');
		$tMap->setPhpName('Fctipesp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fctipesp_SEQ');

		$tMap->addColumn('TIPESP', 'Tipesp', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('ANOVIG', 'Anovig', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('DESTIP', 'Destip', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('PORMON', 'Pormon', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('ALIMON', 'Alimon', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STATIP', 'Statip', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('UNIPAR', 'Unipar', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('FREPAR', 'Frepar', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PARESP', 'Paresp', 'string', CreoleTypes::VARCHAR, false, 300);

		$tMap->addColumn('EXOESP', 'Exoesp', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 