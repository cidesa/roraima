<?php



class CcorimatpriMapBuilder {

	
	const CLASS_NAME = 'lib.model.creditos.map.CcorimatpriMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ccorimatpri');
		$tMap->setPhpName('Ccorimatpri');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ccorimatpri_SEQ');

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NOMORIMATPRI', 'Nomorimatpri', 'string', CreoleTypes::VARCHAR, false, 50);

	} 
} 