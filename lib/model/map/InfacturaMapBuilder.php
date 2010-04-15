<?php



class InfacturaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InfacturaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('infactura');
		$tMap->setPhpName('Infactura');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('infactura_SEQ');

		$tMap->addColumn('NUMFAC', 'Numfac', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('TIPPER', 'Tipper', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('CEDRIF', 'Cedrif', 'string', CreoleTypes::VARCHAR, true, 12);

		$tMap->addColumn('TIPCONC', 'Tipconc', 'string', CreoleTypes::VARCHAR, true, 1);

		$tMap->addColumn('IDCONC', 'Idconc', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MONCAN', 'Moncan', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addForeignKey('INDEFBAN_ID', 'IndefbanId', 'int', CreoleTypes::INTEGER, 'indefban', 'ID', false, null);

		$tMap->addColumn('NUMDEP', 'Numdep', 'string', CreoleTypes::VARCHAR, false, 100);

		$tMap->addColumn('FECEMI', 'Fecemi', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 