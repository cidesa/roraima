<?php



class TsdefempMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TsdefempMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('tsdefemp');
		$tMap->setPhpName('Tsdefemp');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('tsdefemp_SEQ');

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('FECCON', 'Feccon', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECBAN', 'Fecban', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('TIPMON', 'Tipmon', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 