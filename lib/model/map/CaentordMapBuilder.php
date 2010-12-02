<?php



class CaentordMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CaentordMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('caentord');
		$tMap->setPhpName('Caentord');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('caentord_SEQ');

		$tMap->addColumn('ORDCOM', 'Ordcom', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('CODART', 'Codart', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CODALM', 'Codalm', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('CANENT', 'Canent', 'double', CreoleTypes::NUMERIC, true, 14);

		$tMap->addColumn('CANREC', 'Canrec', 'double', CreoleTypes::NUMERIC, false, 14);

		$tMap->addColumn('FECENT', 'Fecent', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 