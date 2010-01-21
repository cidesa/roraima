<?php



class CccodareMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CccodareMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cccodare');
		$tMap->setPhpName('Cccodare');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('cccodare_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('CODAREA', 'Codarea', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addColumn('LOCCEL', 'Loccel', 'string', CreoleTypes::VARCHAR, false, 1);

	} 
} 