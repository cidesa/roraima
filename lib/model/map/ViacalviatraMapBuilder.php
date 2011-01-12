<?php



class ViacalviatraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViacalviatraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viacalviatra');
		$tMap->setPhpName('Viacalviatra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viacalviatra_SEQ');

		$tMap->addColumn('NUMCAL', 'Numcal', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECCAL', 'Feccal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('TIPCOM', 'Tipcom', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('REFSOL', 'Refsol', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('CODCAT', 'Codcat', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addColumn('DIACONPER', 'Diaconper', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DIASINPER', 'Diasinper', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('STATUS', 'Status', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addColumn('OBSERVACIONES', 'Observaciones', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('REFCOM', 'Refcom', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 
