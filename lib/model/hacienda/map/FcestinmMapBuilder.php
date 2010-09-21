<?php



class FcestinmMapBuilder {

	
	const CLASS_NAME = 'lib.model.hacienda.map.FcestinmMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('fcestinm');
		$tMap->setPhpName('Fcestinm');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('fcestinm_SEQ');

		$tMap->addColumn('CODESTINM', 'Codestinm', 'string', CreoleTypes::VARCHAR, true, 6);

		$tMap->addColumn('DESESTINM', 'Desestinm', 'string', CreoleTypes::VARCHAR, false, 1000);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 