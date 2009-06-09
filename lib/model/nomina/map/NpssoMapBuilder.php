<?php



class NpssoMapBuilder {

	
	const CLASS_NAME = 'lib.model.nomina.map.NpssoMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('npsso');
		$tMap->setPhpName('Npsso');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('npsso_SEQ');

		$tMap->addColumn('NUMSSO', 'Numsso', 'string', CreoleTypes::VARCHAR, true, 4);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, true, 16);

		$tMap->addColumn('FECINICOT', 'Fecinicot', 'int', CreoleTypes::DATE, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 