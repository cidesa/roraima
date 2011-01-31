<?php



class ViadetcalviatraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadetcalviatraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadetcalviatra');
		$tMap->setPhpName('Viadetcalviatra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadetcalviatra_SEQ');

		$tMap->addColumn('NUMCAL', 'Numcal', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECCAL', 'Feccal', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODRUB', 'Codrub', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMDIA', 'Numdia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONDIA', 'Mondia', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 