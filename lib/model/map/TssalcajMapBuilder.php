<?php



class TssalcajMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TssalcajMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tssalcaj');
		$tMap->setPhpName('Tssalcaj');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tssalcaj_SEQ');

		$tMap->addColumn('REFSAL', 'Refsal', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('FECSAL', 'Fecsal', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, false, 15);

		$tMap->addColumn('DESSAL', 'Dessal', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addColumn('MONSAL', 'Monsal', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('STASAL', 'Stasal', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 