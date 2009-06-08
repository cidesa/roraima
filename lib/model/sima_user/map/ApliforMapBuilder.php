<?php



class ApliforMapBuilder {

	
	const CLASS_NAME = 'lib.model.sima_user.map.ApliforMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('aplifor');
		$tMap->setPhpName('Aplifor');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('aplifor_SEQ');

		$tMap->addColumn('CODAPL', 'Codapl', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('CODDIV', 'Coddiv', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMOPC', 'Nomopc', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESOCP', 'Desocp', 'string', CreoleTypes::VARCHAR, true, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 