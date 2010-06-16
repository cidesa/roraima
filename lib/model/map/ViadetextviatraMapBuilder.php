<?php



class ViadetextviatraMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ViadetextviatraMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('viadetextviatra');
		$tMap->setPhpName('Viadetextviatra');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('viadetextviatra_SEQ');

		$tMap->addColumn('NUMEXT', 'Numext', 'string', CreoleTypes::VARCHAR, false, 10);

		$tMap->addColumn('FECEXT', 'Fecext', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('CODRUB', 'Codrub', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addColumn('NUMDIA', 'Numdia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('MONDIA', 'Mondia', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('MONTOT', 'Montot', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('TIPO', 'Tipo', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 