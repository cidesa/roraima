<?php



class CareqartMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CareqartMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('careqart');
		$tMap->setPhpName('Careqart');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('careqart_SEQ');

		$tMap->addColumn('REQART', 'Reqart', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECREQ', 'Fecreq', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('DESREQ', 'Desreq', 'string', CreoleTypes::VARCHAR, false, 500);

		$tMap->addColumn('MONREQ', 'Monreq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STAREQ', 'Stareq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('UNISOL', 'Unisol', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODCATREQ', 'Codcatreq', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('APRREQ', 'Aprreq', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('NUMMEMO', 'Nummemo', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('JUSTIF', 'Justif', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODCEN', 'Codcen', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
