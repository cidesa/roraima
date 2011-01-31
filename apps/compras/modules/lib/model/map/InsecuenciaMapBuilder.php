<?php



class InsecuenciaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.InsecuenciaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('insecuencia');
		$tMap->setPhpName('Insecuencia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('insecuencia_SEQ');

		$tMap->addColumn('SECFAC', 'Secfac', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 