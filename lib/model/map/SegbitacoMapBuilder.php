<?php



class SegbitacoMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SegbitacoMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap('sima_user');

		$tMap = $this->dbMap->addTable('segbitaco');
		$tMap->setPhpName('Segbitaco');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('segbitaco_SEQ');

		$tMap->addColumn('REFMOV', 'Refmov', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('CODOFI', 'Codofi', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODAPL', 'Codapl', 'string', CreoleTypes::VARCHAR, false, 3);

		$tMap->addColumn('CODINTUSU', 'Codintusu', 'string', CreoleTypes::VARCHAR, false, 8);

		$tMap->addColumn('FECOPE', 'Fecope', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('HOROPE', 'Horope', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('VALCLA', 'Valcla', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('CODMOD', 'Codmod', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('TIPOPE', 'Tipope', 'string', CreoleTypes::VARCHAR, false, 1);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 