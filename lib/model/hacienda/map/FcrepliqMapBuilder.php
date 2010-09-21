<?php



class FcrepliqMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcrepliqMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcrepliq');
		$tMap->setPhpName('Fcrepliq');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcrepliq_SEQ');

		$tMap->addColumn('NUMREP', 'Numrep', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('ANO', 'Ano', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODACT', 'Codact', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('MONING', 'Moning', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONIMP', 'Monimp', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONFIS', 'Monfis', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('PORALI', 'Porali', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONLIQ', 'Monliq', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 