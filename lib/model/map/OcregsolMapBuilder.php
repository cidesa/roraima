<?php



class OcregsolMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.OcregsolMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('ocregsol');
		$tMap->setPhpName('Ocregsol');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('ocregsol_SEQ');

		$tMap->addColumn('NUMSOL', 'Numsol', 'string', CreoleTypes::VARCHAR, true, 8);

		$tMap->addColumn('DESSOL', 'Dessol', 'string', CreoleTypes::VARCHAR, true, 250);

		$tMap->addColumn('CEDSTE', 'Cedste', 'string', CreoleTypes::VARCHAR, true, 15);

		$tMap->addColumn('CODSOL', 'Codsol', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('CODORG', 'Codorg', 'string', CreoleTypes::VARCHAR, false, 4);

		$tMap->addColumn('FECSOL', 'Fecsol', 'int', CreoleTypes::DATE, true, null);

		$tMap->addColumn('FECRES', 'Fecres', 'int', CreoleTypes::DATE, false, null);

		$tMap->addColumn('OBSSOL', 'Obssol', 'string', CreoleTypes::VARCHAR, false, 250);

		$tMap->addColumn('CODEMP', 'Codemp', 'string', CreoleTypes::VARCHAR, false, 16);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 