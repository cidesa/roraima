<?php



class ApliUserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ApliUserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('apli_user');
		$tMap->setPhpName('ApliUser');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('apli_user_SEQ');

		$tMap->addColumn('CODAPL', 'Codapl', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('LOGUSE', 'Loguse', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 3);

		$tMap->addColumn('NOMOPC', 'Nomopc', 'string', CreoleTypes::VARCHAR, false, 50);

		$tMap->addColumn('PRIUSE', 'Priuse', 'string', CreoleTypes::VARCHAR, false, 2);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 